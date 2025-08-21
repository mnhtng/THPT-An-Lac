<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> - Trường THPT An Lạc</title>
    <link rel="stylesheet" href="<?php echo base_url('src/assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/fontawesome/css/all.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/common.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/announcements.css'); ?>">
    <link rel="icon" href="<?php echo base_url('src/assets/images/logo-thpt-an-lac.png'); ?>" type="image/png">
</head>

<body>
    <!-- Header -->
    <?php include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'header.php'; ?>

    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo create_url('home/index/index'); ?>">Trang Chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Announcements Section -->
    <section class="announcements-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h1><?php echo $page_title; ?></h1>
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
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-bullhorn text-danger fs-4"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="alert-heading">
                                        <a href="<?php echo create_url('announcements/index/detail?id=' . $announcement['id']); ?>"
                                            class="text-decoration-none text-danger"><?php echo $announcement['title']; ?></a>
                                    </h5>
                                    <p class="mb-2"><?php echo $announcement['summary']; ?></p>
                                    <div class="announcement-meta">
                                        <small class="text-muted">
                                            <i class="fas fa-calendar"></i>
                                            <?php echo date('d/m/Y', strtotime($announcement['date'])); ?>
                                            <i class="fas fa-user ms-3"></i> <?php echo $announcement['author']; ?>
                                            <?php if ($announcement['attachment']): ?>
                                            <i class="fas fa-paperclip ms-3"></i> Có file đính kèm
                                            <?php endif; ?>
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
                                        <div class="row">
                                            <div class="col-md-8">
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
                                                        class="text-decoration-none"><?php echo $announcement['title']; ?></a>
                                                </h4>
                                                <p class="card-text text-muted"><?php echo $announcement['summary']; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-4 text-end">
                                                <div class="announcement-date mb-2">
                                                    <div class="date-box">
                                                        <div class="day">
                                                            <?php echo date('d', strtotime($announcement['date'])); ?>
                                                        </div>
                                                        <div class="month">
                                                            Th<?php echo date('m', strtotime($announcement['date'])); ?>
                                                        </div>
                                                        <div class="year">
                                                            <?php echo date('Y', strtotime($announcement['date'])); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if ($announcement['attachment']): ?>
                                                <div class="attachment mb-2">
                                                    <a href="#" class="btn btn-outline-secondary btn-sm">
                                                        <i class="fas fa-download"></i> Tải file
                                                    </a>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="announcement-meta mt-3 pt-3 border-top">
                                            <div class="row align-items-center">
                                                <div class="col-md-6">
                                                    <small class="text-muted">
                                                        <i class="fas fa-user"></i>
                                                        <?php echo $announcement['author']; ?>
                                                        <i class="fas fa-eye ms-3"></i>
                                                        <?php echo number_format($announcement['views']); ?> lượt xem
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
                        <nav aria-label="Phân trang thông báo" class="mt-4">
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
                        </nav>
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
                                    <button class="btn btn-primary" type="submit">
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
                                    <a href="#"
                                        class="d-flex justify-content-between align-items-center text-decoration-none">
                                        <span><i class="fas fa-graduation-cap text-primary me-2"></i>Thi cử</span>
                                        <span class="badge bg-primary">5</span>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#"
                                        class="d-flex justify-content-between align-items-center text-decoration-none">
                                        <span><i class="fas fa-calendar-day text-success me-2"></i>Nghỉ lễ</span>
                                        <span class="badge bg-success">3</span>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#"
                                        class="d-flex justify-content-between align-items-center text-decoration-none">
                                        <span><i class="fas fa-running text-warning me-2"></i>Hoạt động</span>
                                        <span class="badge bg-warning">8</span>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#"
                                        class="d-flex justify-content-between align-items-center text-decoration-none">
                                        <span><i class="fas fa-star text-info me-2"></i>Lễ hội</span>
                                        <span class="badge bg-info">2</span>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a href="#"
                                        class="d-flex justify-content-between align-items-center text-decoration-none">
                                        <span><i class="fas fa-certificate text-danger me-2"></i>Tốt nghiệp</span>
                                        <span class="badge bg-danger">4</span>
                                    </a>
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
                                            class="text-decoration-none"><?php echo substr($announcement['title'], 0, 60) . '...'; ?></a>
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
                                <p><i class="fas fa-phone text-primary"></i> (028) 3858 5555</p>
                                <p><i class="fas fa-envelope text-primary"></i> info@thptanlac.edu.vn</p>
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
    <script src="<?php echo base_url('src/assets/js/jquery/jquery-3.7.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('src/assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('src/assets/js/script.js'); ?>"></script>

    <style>
    .date-box {
        background: linear-gradient(135deg, #1e3a8a, #3b82f6);
        color: white;
        border-radius: 8px;
        padding: 15px;
        text-align: center;
        min-width: 80px;
    }

    .date-box .day {
        font-size: 24px;
        font-weight: bold;
        line-height: 1;
    }

    .date-box .month,
    .date-box .year {
        font-size: 12px;
        opacity: 0.9;
    }

    .announcement-item {
        transition: transform 0.2s ease;
    }

    .announcement-item:hover {
        transform: translateY(-2px);
    }

    .announcement-item .card {
        border-left: 4px solid #1e3a8a;
    }

    .announcement-item .card.priority-high {
        border-left-color: #dc3545;
    }

    .announcement-item .card.priority-medium {
        border-left-color: #ffc107;
    }
    </style>
</body>

</html>