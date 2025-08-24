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

    <title>Thông Báo</title>
</head>

<body>
    <!-- Header -->
    <?php include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'header.php'; ?>

    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?">Trang Chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Thông Báo</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Announcements Section -->
    <section class="announcements-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h1>Thông Báo</h1>
                <p class="lead">Cập nhật các thông báo quan trọng từ nhà trường</p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <!-- Important Announcements -->
                    <?php if (isset($important_announcements) && !empty($important_announcements)): ?>
                        <div class="important-announcements mb-5">
                            <h2 class="text-danger mb-4">
                                <i class="fas fa-exclamation-triangle"></i> Thông Báo Quan Trọng
                            </h2>
                            <?php foreach ($important_announcements as $announcement): ?>
                                <div class="alert alert-danger border-start border-danger border-5" role="alert">
                                    <div class="d-flex align-items-center flex-column flex-md-row relative">
                                        <div class="flex-shrink-0">
                                            <a
                                                href="<?php echo create_url('announcements/index/detail?id=' . $announcement['id']); ?>">
                                                <img src="<?php echo !empty($announcement['image']) ? $announcement['image'] : 'src/assets/images/placeholder.php?w=120&h=120&text=' . urlencode('Quan trọng') . '&bg=fee2e2&color=dc2626'; ?>"
                                                    alt="<?php echo htmlspecialchars($announcement['title']); ?>"
                                                    class="announcement-img rounded"
                                                    onerror="this.src='src/assets/images/placeholder.php?w=120&h=120&text=<?php echo urlencode('Lỗi'); ?>&bg=fecaca&color=b91c1c';">
                                            </a>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="alert-heading">
                                                <a href="<?php echo create_url('announcements/index/detail?id=' . $announcement['id']); ?>"
                                                    class="text-decoration-none text-danger"><?php echo $announcement['title']; ?></a>
                                            </h5>

                                            <p class="mb-2"><?php echo $announcement['summary']; ?></p>

                                            <div class="announcement-meta">
                                                <small class="text-muted">
                                                    <span>
                                                        <i class="fas fa-calendar"></i>
                                                        <?php echo date('d/m/Y', strtotime($announcement['date'])); ?>
                                                    </span>

                                                    <span>
                                                        <i class="fas fa-user ms-3"></i>
                                                        <?php echo $announcement['author']; ?>
                                                    </span>

                                                    <span>
                                                        <?php if (isset($announcement['attachments']) && !empty($announcement['attachments'])): ?>
                                                            <i class="fas fa-paperclip ms-3"></i> Có file đính kèm
                                                        <?php endif; ?>
                                                    </span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <!-- All Announcements -->
                    <div class="all-announcements">
                        <h2 class="mb-4">Tất Cả Thông Báo</h2>
                        <div class="announcements-list">
                            <?php if (isset($announcements_list) && is_array($announcements_list)): ?>
                                <?php foreach ($announcements_list as $announcement): ?>
                                    <div class="announcement-item mb-4">
                                        <div class="card border-0 shadow-sm">
                                            <div class="card-body">
                                                <div class="d-flex flex-column-reverse flex-md-row gap-4">
                                                    <div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <span class="badge bg-<?php
                                                                                    echo $announcement['priority'] === 'high' ? 'danger' : ($announcement['priority'] === 'medium' ? 'warning' : 'secondary');
                                                                                    ?> me-2">
                                                                <?php echo $announcement['category']; ?>
                                                            </span>
                                                            <?php if ($announcement['priority'] === 'high'): ?>
                                                                <span class="badge bg-danger">
                                                                    <i class="fas fa-exclamation"></i> Quan trọng
                                                                </span>
                                                            <?php endif; ?>
                                                        </div>

                                                        <h4 class="card-title">
                                                            <a href="<?php echo create_url('announcements/index/detail?id=' . $announcement['id']); ?>"
                                                                class="text-decoration-none">
                                                                <?php echo $announcement['title']; ?>
                                                            </a>
                                                        </h4>

                                                        <p class="card-text text-muted">
                                                            <?php echo $announcement['summary']; ?>
                                                        </p>

                                                        <?php if (isset($announcement['attachments']) && !empty($announcement['attachments'])): ?>
                                                            <div class="attachment mb-2">
                                                                <span
                                                                    class="badge bg-danger bg-opacity-10 text-danger border border-danger border-opacity-25 px-3 py-2">
                                                                    <i class="fas fa-paperclip me-1"></i>
                                                                    <span class="small fw-medium">Có file đính kèm</span>
                                                                </span>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                    <div class="text-end d-flex align-items-center">
                                                        <div class="announcement-image mb-2">
                                                            <a
                                                                href="<?php echo create_url('announcements/index/detail?id=' . $announcement['id']); ?>">
                                                                <img src="<?php echo !empty($announcement['image']) ? $announcement['image'] : 'src/assets/images/placeholder.php?w=200&h=150&text=' . urlencode($announcement['category']) . '&bg=f3f4f6&color=6b7280'; ?>"
                                                                    alt="<?php echo htmlspecialchars($announcement['title']); ?>"
                                                                    class="announcement-img rounded"
                                                                    onerror="this.src='src/assets/images/placeholder.php?w=200&h=150&text=<?php echo urlencode('Hình ảnh lỗi'); ?>&bg=fee2e2&color=dc2626';">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="announcement-meta mt-3 pt-3 border-top">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6">
                                                            <small class="text-muted">
                                                                <i class="fas fa-calendar"></i>
                                                                <?php echo date('d/m/Y', strtotime($announcement['date'])); ?>
                                                                <i class="fas fa-user ms-3"></i>
                                                                <?php echo $announcement['author']; ?>
                                                                <i class="fas fa-eye ms-3"></i>
                                                                <?php echo number_format($announcement['views']); ?>
                                                            </small>
                                                        </div>
                                                        <div class="col-md-6 text-end">
                                                            <a href="<?php echo create_url('announcements/index/detail?id=' . $announcement['id']); ?>"
                                                                class="btn btn-primary btn-sm">
                                                                Xem chi tiết <i class="fas fa-arrow-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <!-- Pagination -->
                        <!-- <nav aria-label="Phân trang thông báo" class="mt-4">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Trước</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Sau</a>
                                </li>
                            </ul>
                        </nav> -->
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Search -->
                        <div class="widget mb-4">
                            <h3>Tìm Kiếm Thông Báo</h3>
                            <form class="search-form">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nhập từ khóa...">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                <select class="form-select">
                                    <option value="">Tất cả danh mục</option>
                                    <option value="exam">Thi cử</option>
                                    <option value="holiday">Nghỉ lễ</option>
                                    <option value="activity">Hoạt động</option>
                                    <option value="ceremony">Lễ hội</option>
                                    <option value="graduation">Tốt nghiệp</option>
                                </select>
                            </form>
                        </div>

                        <!-- Categories -->
                        <div class="widget mb-4">
                            <h3>Danh Mục Thông Báo</h3>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <p class="d-flex justify-content-between align-items-center text-decoration-none">
                                        <span><i class="fas fa-book text-primary me-2"></i>Học tập & Giảng dạy</span>
                                        <span class="badge bg-primary">12</span>
                                    </p>
                                </li>
                                <li class="mb-2">
                                    <p class="d-flex justify-content-between align-items-center text-decoration-none">
                                        <span><i class="fas fa-graduation-cap text-success me-2"></i>Tuyển sinh & Tốt
                                            nghiệp</span>
                                        <span class="badge bg-success">8</span>
                                    </p>
                                </li>
                                <li class="mb-2">
                                    <p class="d-flex justify-content-between align-items-center text-decoration-none">
                                        <span><i class="fas fa-users text-warning me-2"></i>Hoạt động giáo dục</span>
                                        <span class="badge bg-warning">15</span>
                                    </p>
                                </li>
                                <li class="mb-2">
                                    <p class="d-flex justify-content-between align-items-center text-decoration-none">
                                        <span><i class="fas fa-calendar text-info me-2"></i>Thời gian biểu & Lịch
                                            trình</span>
                                        <span class="badge bg-info">6</span>
                                    </p>
                                </li>
                                <li class="mb-2">
                                    <p class="d-flex justify-content-between align-items-center text-decoration-none">
                                        <span><i class="fas fa-dollar-sign text-secondary me-2"></i>Tài chính & Hành
                                            chính</span>
                                        <span class="badge bg-secondary">4</span>
                                    </p>
                                </li>
                                <li class="mb-2">
                                    <p class="d-flex justify-content-between align-items-center text-decoration-none">
                                        <span><i class="fas fa-shield-alt text-danger me-2"></i>Y tế & An toàn</span>
                                        <span class="badge bg-danger">3</span>
                                    </p>
                                </li>
                            </ul>
                        </div>

                        <!-- Recent Announcements -->
                        <div class="widget mb-4">
                            <h3>Thông Báo Gần Đây</h3>
                            <div class="recent-announcements">
                                <?php if (isset($announcements_list) && is_array($announcements_list)): ?>
                                    <?php $recent = array_slice($announcements_list, 0, 3); ?>
                                    <?php foreach ($recent as $announcement): ?>
                                        <div class="recent-item mb-3 pb-3 border-bottom">
                                            <h6>
                                                <a href="<?php echo create_url('announcements/index/detail?id=' . $announcement['id']); ?>"
                                                    title="<?php echo htmlspecialchars($announcement['title']); ?>"
                                                    class="text-decoration-none">
                                                    <?php echo substr($announcement['title'], 0, 100) . (strlen($announcement['title']) > 100 ? '...' : ''); ?>
                                                </a>
                                            </h6>
                                            <small class="text-muted">
                                                <i class="fas fa-calendar"></i>
                                                <?php echo date('d/m/Y', strtotime($announcement['date'])); ?>
                                                <span
                                                    class="badge bg-<?php
                                                                    echo $announcement['priority'] === 'high' ? 'danger' : ($announcement['priority'] === 'medium' ? 'warning' : 'secondary');
                                                                    ?> ms-2"><?php echo $announcement['category']; ?></span>
                                            </small>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="widget">
                            <h3>Liên Hệ Văn Phòng</h3>
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
</body>

</html>