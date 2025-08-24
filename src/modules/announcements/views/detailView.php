<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="src/assets/images/logo-thpt-an-lac.png" type="image/png">

    <link rel="stylesheet" href="src/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="src/assets/css/common.css">
    <link rel="stylesheet" href="src/assets/css/style.css">
    <link rel="stylesheet" href="src/assets/css/announcements.css">

    <title>Chi Tiết Thông Báo</title>
</head>

<body>
    <!-- Header -->
    <?php include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'header.php'; ?>

    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="<?php echo create_url('announcements'); ?>">Thông Báo</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi Tiết Thông Báo</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Announcement Detail Section -->
    <section class="announcement-detail-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php if (isset($announcement_item)): ?>
                        <div class="announcement-detail">
                            <!-- Announcement Header -->
                            <div class="announcement-header mb-4">
                                <div class="mb-3">
                                    <span class="badge bg-<?php
                                                            echo $announcement_item['priority'] === 'high' ? 'danger' : ($announcement_item['priority'] === 'medium' ? 'warning' : 'secondary');
                                                            ?> me-2">
                                        <?php
                                        echo $announcement_item['priority'] === 'high' ? 'Quan Trọng' : ($announcement_item['priority'] === 'medium' ? 'Trung Bình' : 'Thông Thường');
                                        ?>
                                    </span>
                                    <span class="badge bg-primary">
                                        <?php echo $announcement_item['category']; ?>
                                    </span>
                                </div>

                                <h1 class="announcement-title"><?php echo $announcement_item['title']; ?></h1>

                                <div class="announcement-meta d-flex flex-wrap align-items-center text-muted mb-4">
                                    <span class="me-3">
                                        <i class="fas fa-calendar"></i>
                                        <?php echo date('d/m/Y H:i', strtotime($announcement_item['date'])); ?>
                                    </span>
                                    <span class="me-3">
                                        <i class="fas fa-user"></i>
                                        <?php echo $announcement_item['author'] ?? 'Ban Giám Hiệu'; ?>
                                    </span>
                                    <span class="text-muted">
                                        <i class="fas fa-eye"></i>
                                        <?php echo number_format($announcement_item['views'] ?? 1); ?> lượt xem
                                    </span>
                                </div>
                            </div>

                            <!-- Announcement Summary -->
                            <?php if (!empty($announcement_item['summary'])): ?>
                                <div class="announcement-summary mb-4">
                                    <div class="alert alert-info">
                                        <h5><i class="fas fa-info-circle me-2"></i>Tóm Tắt</h5>
                                        <p class="mb-0 lead"><?php echo $announcement_item['summary']; ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Announcement Content -->
                            <div class="announcement-content">
                                <div class="content-text">
                                    <?php echo $announcement_item['content']; ?>
                                </div>
                            </div>

                            <!-- Attachment Files -->
                            <?php if (isset($announcement_item['attachments']) && !empty($announcement_item['attachments'])): ?>
                                <div class="announcement-attachments mt-4">
                                    <h4><i class="fas fa-paperclip me-2"></i>Tài Liệu Đính Kèm</h4>
                                    <div class="attachments-list">
                                        <?php foreach ($announcement_item['attachments'] as $file): ?>
                                            <div class="attachment-item d-flex align-items-center p-3 border rounded mb-2">
                                                <div class="file-icon me-3">
                                                    <i
                                                        class="fas fa-file-<?php echo pathinfo($file['name'], PATHINFO_EXTENSION) === 'pdf' ? 'pdf' : 'alt'; ?> fa-2x text-danger"></i>
                                                </div>
                                                <div class="file-info flex-grow-1">
                                                    <h6 class="mb-1"><?php echo $file['name']; ?></h6>
                                                    <small class="text-muted">
                                                        Kích thước: <?php echo $file['size'] ?? 'N/A'; ?> </small>
                                                </div>
                                                <a href="<?php echo $file['url']; ?>" class="btn btn-outline-primary btn-sm"
                                                    download>
                                                    <i class="fas fa-download me-1"></i>Tải Xuống
                                                </a>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Navigation -->
                            <div class="announcement-navigation mt-4 pt-4 border-top">
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php if (isset($prev_announcement)): ?>
                                            <a href="<?php echo create_url('announcements/index/detail?id=' . $prev_announcement['id']); ?>"
                                                class="btn btn-outline-primary">
                                                <i class="fas fa-arrow-left me-2"></i>Thông báo trước
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <?php if (isset($next_announcement)): ?>
                                            <a href="<?php echo create_url('announcements/index/detail?id=' . $next_announcement['id']); ?>"
                                                class="btn btn-outline-primary">
                                                Thông báo sau<i class="fas fa-arrow-right ms-2"></i>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <!-- No Announcement Found -->
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="fas fa-exclamation-triangle fa-4x text-warning"></i>
                            </div>
                            <h3>Không Tìm Thấy Thông Báo</h3>
                            <p class="text-muted mb-4">Thông báo bạn đang tìm kiếm không tồn tại hoặc đã bị xóa.</p>
                            <a href="<?php echo create_url('announcements/index/index'); ?>" class="btn btn-primary">
                                <i class="fas fa-arrow-left me-2"></i>Quay Lại Danh Sách
                            </a>
                        </div>
                    <?php endif; ?>

                    <!-- Related Announcements -->
                    <?php if (isset($related_announcements) && !empty($related_announcements)): ?>
                        <section class="related-announcements mt-5 pt-5 border-top">
                            <h3 class="mb-4">Thông Báo Liên Quan</h3>
                            <div class="row">
                                <?php foreach ($related_announcements as $related): ?>
                                    <div class="col-md-6 mb-4">
                                        <div class="card h-100 border-0 shadow-sm">
                                            <div class="card-body">
                                                <div class="mb-2">
                                                    <span class="badge bg-<?php
                                                                            echo $related['priority'] === 'high' ? 'danger' : ($related['priority'] === 'medium' ? 'warning' : 'secondary');
                                                                            ?> me-2">
                                                        <?php echo $related['category']; ?>
                                                    </span>
                                                </div>
                                                <h6 class="card-title">
                                                    <a href="<?php echo create_url('announcements/index/detail?id=' . $related['id']); ?>"
                                                        title="<?php echo htmlspecialchars($related['title']); ?>"
                                                        class="text-decoration-none"><?php echo substr($related['title'], 0, 100) . (strlen($related['title']) > 100 ? '...' : ''); ?></a>
                                                </h6>
                                                <p class="card-text text-muted small">
                                                    <?php echo substr(strip_tags($related['summary']), 0, 150) . (strlen(strip_tags($related['summary'])) > 150 ? '...' : ''); ?>
                                                </p>
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar"></i>
                                                    <?php echo date('d/m/Y', strtotime($related['date'])); ?>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    <?php endif; ?>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Back to List -->
                        <div class="widget">
                            <a href="<?php echo create_url('announcements/index/index'); ?>"
                                class="btn btn-primary w-100 mb-3">
                                <i class="fas fa-list me-2"></i>Danh Sách Thông Báo
                            </a>
                        </div>

                        <!-- Recent Announcements -->
                        <div class="widget">
                            <h4>Thông Báo Mới Nhất</h4>
                            <div class="recent-announcements">
                                <?php if (isset($related_announcements) && is_array($related_announcements)): ?>
                                    <?php foreach ($related_announcements as $recent): ?>
                                        <div class="recent-item mb-3 pb-3 border-bottom">
                                            <h6>
                                                <a href="<?php echo create_url('announcements/index/detail?id=' . $recent['id']); ?>"
                                                    title="<?php echo htmlspecialchars($recent['title']); ?>"
                                                    class="text-decoration-none"><?php echo substr($recent['title'], 0, 100) . (strlen($recent['title']) > 100 ? '...' : ''); ?></a>
                                            </h6>

                                            <small class="text-muted">
                                                <i class="fas fa-calendar"></i>
                                                <?php echo date('d/m/Y', strtotime($recent['date'])); ?>
                                                <span class="badge bg-<?php
                                                                        echo $recent['priority'] === 'high' ? 'danger' : ($recent['priority'] === 'medium' ? 'warning' : 'secondary');
                                                                        ?> ms-2"><?php echo $recent['category']; ?></span>
                                            </small>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="widget">
                            <h4>Liên Hệ Văn Phòng</h4>
                            <div class="contact-info">
                                <p><i class="fas fa-phone text-primary"></i> (028) 38750022</p>
                                <p><i class="fas fa-envelope text-primary"></i> c3anlac.tphcm@moet.edu.vn</p>
                                <p><i class="fas fa-clock text-primary"></i> Thứ 2 - Thứ 6: 7:00 - 17:00</p>
                                <div class="alert alert-info mt-3">
                                    <small>
                                        <i class="fas fa-info-circle"></i>
                                        Để nhận thông báo mới nhất, vui lòng theo dõi website hoặc fanpage của trường.
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'footer.php'; ?>

    <!-- Scripts -->
    <script src="src/assets/js/jquery/jquery-3.7.1.min.js"></script>
    <script src="src/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="src/assets/js/script.js"></script>

    <script>
        // Copy link to clipboard
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                // Show toast notification
                const toast = document.createElement('div');
                toast.className = 'alert alert-success position-fixed';
                toast.style.top = '20px';
                toast.style.right = '20px';
                toast.style.zIndex = '9999';
                toast.innerHTML = '<i class="fas fa-check-circle me-2"></i>Đã sao chép link!';
                document.body.appendChild(toast);

                setTimeout(() => {
                    toast.remove();
                }, 3000);
            });
        }

        // Auto-scroll to content on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Add fade-in animation to content
            const content = document.querySelector('.announcement-detail');
            if (content) {
                content.classList.add('fade-in');
            }

            // Update view count (you can implement this via AJAX)
            // updateViewCount();
        });

        // Print styles
        const printStyles = `
            <style type="text/css" media="print">
                .sidebar, .breadcrumb-section, .social-share, .announcement-navigation {
                    display: none !important;
                }
                .col-lg-8 {
                    width: 100% !important;
                }
                .announcement-detail {
                    padding: 0 !important;
                }
                body {
                    font-size: 12px !important;
                }
            </style>
        `;
        document.head.insertAdjacentHTML('beforeend', printStyles);
    </script>
</body>

</html>