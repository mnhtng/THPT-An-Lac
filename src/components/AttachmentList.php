<?php

/**
 * Functions để hiển thị danh sách file đính kèm trong thông báo
 * Sử dụng cho việc hiển thị files trên website
 */

/**
 * Render danh sách file đính kèm
 * @param array $files Mảng chứa thông tin các file đính kèm
 * @return string HTML content
 */
function renderAttachmentList($files)
{
    if (empty($files)) {
        return '';
    }

    $html = '<div class="attachment-section mt-4">';
    $html .= '<h5 class="attachment-title">';
    $html .= '<i class="fas fa-paperclip me-2"></i>Tài liệu đính kèm';
    $html .= '</h5>';
    $html .= '<div class="attachment-list">';

    foreach ($files as $file) {
        $html .= renderAttachmentItem($file);
    }

    $html .= '</div>';
    $html .= '</div>';

    return $html;
}

/**
 * Render một item file
 * @param array $file Thông tin file
 * @return string HTML content
 */
function renderAttachmentItem($file)
{
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $fileSize = formatAttachmentFileSize($file['size']);
    $icon = getAttachmentFileIcon($extension);
    $color = getAttachmentFileColor($extension);

    $html = '<div class="attachment-item">';
    $html .= '<div class="attachment-icon" style="background-color: ' . $color . '">';
    $html .= '<i class="' . $icon . '"></i>';
    $html .= '</div>';
    $html .= '<div class="attachment-info">';
    $html .= '<div class="attachment-name">' . htmlspecialchars($file['name']) . '</div>';
    $html .= '<div class="attachment-size">' . $fileSize . '</div>';
    $html .= '</div>';
    $html .= '<div class="attachment-actions">';
    $html .= '<a href="' . $file['url'] . '" class="btn btn-sm btn-outline-primary" download>';
    $html .= '<i class="fas fa-download me-1"></i>Tải xuống';
    $html .= '</a>';

    // Nếu là PDF, thêm nút xem trước
    if ($extension === 'pdf') {
        $html .= '<a href="' . $file['url'] . '" class="btn btn-sm btn-outline-info ms-2" target="_blank">';
        $html .= '<i class="fas fa-eye me-1"></i>Xem';
        $html .= '</a>';
    }

    $html .= '</div>';
    $html .= '</div>';

    return $html;
}

/**
 * Lấy icon cho từng loại file
 * @param string $extension Phần mở rộng file
 * @return string Font Awesome class
 */
function getAttachmentFileIcon($extension)
{
    $icons = [
        'pdf' => 'fas fa-file-pdf',
        'doc' => 'fas fa-file-word',
        'docx' => 'fas fa-file-word',
        'xls' => 'fas fa-file-excel',
        'xlsx' => 'fas fa-file-excel',
        'ppt' => 'fas fa-file-powerpoint',
        'pptx' => 'fas fa-file-powerpoint',
        'txt' => 'fas fa-file-alt',
        'zip' => 'fas fa-file-archive',
        'rar' => 'fas fa-file-archive'
    ];

    return $icons[$extension] ?? 'fas fa-file';
}

/**
 * Lấy màu cho từng loại file
 * @param string $extension Phần mở rộng file
 * @return string Hex color
 */
function getAttachmentFileColor($extension)
{
    $colors = [
        'pdf' => '#dc2626',
        'doc' => '#2563eb',
        'docx' => '#2563eb',
        'xls' => '#059669',
        'xlsx' => '#059669',
        'ppt' => '#d97706',
        'pptx' => '#d97706',
        'txt' => '#374151',
        'zip' => '#7c3aed',
        'rar' => '#7c3aed'
    ];

    return $colors[$extension] ?? '#6b7280';
}

/**
 * Format file size thành dạng dễ đọc
 * @param int $bytes Kích thước file tính bằng bytes
 * @return string Formatted file size
 */
function formatAttachmentFileSize($bytes)
{
    if ($bytes === 0) return '0 Bytes';

    $k = 1024;
    $sizes = ['Bytes', 'KB', 'MB', 'GB'];
    $i = floor(log($bytes) / log($k));

    return round(($bytes / pow($k, $i)), 2) . ' ' . $sizes[$i];
}

/**
 * Render CSS styles cho attachment component
 * @return string CSS styles
 */
function getAttachmentStyles()
{
    return '
    <style>
    .attachment-section {
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        padding: 1.5rem;
        margin-top: 1.5rem;
    }
    
    .attachment-title {
        color: #495057;
        font-size: 1.1rem;
        font-weight: 600;
        margin-bottom: 1rem;
        border-bottom: 2px solid #dee2e6;
        padding-bottom: 0.5rem;
    }
    
    .attachment-list {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }
    
    .attachment-item {
        display: flex;
        align-items: center;
        background: white;
        border: 1px solid #e9ecef;
        border-radius: 6px;
        padding: 1rem;
        transition: all 0.2s ease;
    }
    
    .attachment-item:hover {
        border-color: #adb5bd;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    
    .attachment-icon {
        width: 48px;
        height: 48px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        color: white;
        font-size: 1.2rem;
    }
    
    .attachment-info {
        flex: 1;
    }
    
    .attachment-name {
        font-weight: 500;
        color: #212529;
        margin-bottom: 0.25rem;
        word-break: break-word;
    }
    
    .attachment-size {
        font-size: 0.875rem;
        color: #6c757d;
    }
    
    .attachment-actions {
        display: flex;
        gap: 0.5rem;
    }
    
    @media (max-width: 768px) {
        .attachment-item {
            flex-direction: column;
            text-align: center;
        }
        
        .attachment-icon {
            margin-right: 0;
            margin-bottom: 0.75rem;
        }
        
        .attachment-actions {
            margin-top: 0.75rem;
            justify-content: center;
        }
    }
    </style>';
}

// Ví dụ sử dụng:
/*
$attachments = [
    [
        'name' => 'Thong_bao_hoc_phi.pdf',
        'size' => 2048576,
        'url' => '/uploads/announcements/thong_bao_hoc_phi.pdf'
    ],
    [
        'name' => 'Lich_thi_hoc_ky_I.docx',
        'size' => 512000,
        'url' => '/uploads/announcements/lich_thi_hoc_ky_I.docx'
    ]
];

// Hiển thị styles và attachment list
echo getAttachmentStyles();
echo renderAttachmentList($attachments);
*/
