<?php
defined('APP_PATH') or exit('Do not have access to this section!');

function construct()
{
    // Khởi tạo session
    start_secure_session();
}

function indexAction()
{
    // Mock data cho demo - trong thực tế sẽ lấy từ database
    $educationCategories = [
        [
            'id' => 1,
            'name' => 'Hoạt động ngoại khóa',
            'description' => 'Các hoạt động ngoài giờ học chính',
            'post_count' => 5,
            'created_at' => '2024-01-15'
        ],
        [
            'id' => 2,
            'name' => 'Thi đấu thể thao',
            'description' => 'Các giải đấu và hoạt động thể thao',
            'post_count' => 3,
            'created_at' => '2024-01-10'
        ],
        [
            'id' => 3,
            'name' => 'Hoạt động văn nghệ',
            'description' => 'Các chương trình văn nghệ, biểu diễn',
            'post_count' => 8,
            'created_at' => '2024-01-08'
        ]
    ];

    $announcementCategories = [
        [
            'id' => 4,
            'name' => 'Thông báo học tập',
            'description' => 'Thông báo về lịch học, kiểm tra',
            'post_count' => 12,
            'created_at' => '2024-01-20'
        ],
        [
            'id' => 5,
            'name' => 'Thông báo hành chính',
            'description' => 'Các thông báo về thủ tục hành chính',
            'post_count' => 7,
            'created_at' => '2024-01-18'
        ],
        [
            'id' => 6,
            'name' => 'Thông báo sự kiện',
            'description' => 'Thông báo về các sự kiện sắp diễn ra',
            'post_count' => 4,
            'created_at' => '2024-01-16'
        ]
    ];

    // Mock data cho tags
    $educationTags = [
        [
            'id' => 1,
            'name' => 'Cuộc thi',
            'description' => 'Các cuộc thi học sinh',
            'post_count' => 8,
            'color' => '#007bff',
            'created_at' => '2024-01-15'
        ],
        [
            'id' => 2,
            'name' => 'Hoạt động nhóm',
            'description' => 'Các hoạt động theo nhóm',
            'post_count' => 12,
            'color' => '#28a745',
            'created_at' => '2024-01-12'
        ],
        [
            'id' => 3,
            'name' => 'Trải nghiệm',
            'description' => 'Hoạt động trải nghiệm thực tế',
            'post_count' => 6,
            'color' => '#ffc107',
            'created_at' => '2024-01-10'
        ]
    ];

    $announcementTags = [
        [
            'id' => 4,
            'name' => 'Khẩn cấp',
            'description' => 'Thông báo khẩn cấp, quan trọng',
            'post_count' => 3,
            'color' => '#dc3545',
            'created_at' => '2024-01-20'
        ],
        [
            'id' => 5,
            'name' => 'Lịch học',
            'description' => 'Liên quan đến lịch học',
            'post_count' => 15,
            'color' => '#6f42c1',
            'created_at' => '2024-01-18'
        ],
        [
            'id' => 6,
            'name' => 'Tuyển sinh',
            'description' => 'Thông báo tuyển sinh',
            'post_count' => 5,
            'color' => '#fd7e14',
            'created_at' => '2024-01-16'
        ]
    ];

    $data = [
        'educationCategories' => $educationCategories,
        'announcementCategories' => $announcementCategories,
        'educationTags' => $educationTags,
        'announcementTags' => $announcementTags
    ];

    load_view('index', $data);
}
