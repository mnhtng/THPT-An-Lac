<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo base_url('src/assets/images/logo-thpt-an-lac.png'); ?>" type="image/png">

    <link rel="stylesheet" href="<?php echo base_url('src/assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/fontawesome/css/all.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/common.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/style.css'); ?>">

    <title>Trường THPT An Lạc - Trang Chủ</title>
</head>

<body>
    <?php include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'header.php'; ?>

    <!-- Hero Section -->
    <section class="hero">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-bg"
                        style="background-image: url('<?php echo base_url('src/assets/images/placeholder.php?w=1200&h=500&text=Trường THPT An Lạc&bg=1e3a8a&color=ffffff'); ?>')">
                    </div>
                    <div class="carousel-content">
                        <div class="container">
                            <h2>Chào Mừng Đến Với THPT An Lạc</h2>
                            <p>Môi trường giáo dục chất lượng cao, phát triển toàn diện cho học sinh</p>
                            <a href="<?php echo create_url('pages/about/index'); ?>" class="btn btn-primary">Tìm Hiểu
                                Thêm</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-bg"
                        style="background-image: url('<?php echo base_url('src/assets/images/placeholder.php?w=1200&h=500&text=Giáo Dục Toàn Diện&bg=3b82f6&color=ffffff'); ?>')">
                    </div>
                    <div class="carousel-content">
                        <div class="container">
                            <h2>Giáo Dục Toàn Diện</h2>
                            <p>Đào tạo học sinh có kiến thức vững vàng và kỹ năng sống</p>
                            <a href="#" class="btn btn-primary">Chương Trình Học</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-bg"
                        style="background-image: url('<?php echo base_url('src/assets/images/placeholder.php?w=1200&h=500&text=Thành Tích Xuất Sắc&bg=10b981&color=ffffff'); ?>')">
                    </div>
                    <div class="carousel-content">
                        <div class="container">
                            <h2>Thành Tích Xuất Sắc</h2>
                            <p>Tự hào với những thành tích học tập và hoạt động của học sinh</p>
                            <a href="#" class="btn btn-primary">Xem Kết Quả</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    <!-- Quick Access -->
    <section class="quick-access">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="quick-item">
                        <div class="icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h4>Tuyển Sinh</h4>
                        <p>Thông tin tuyển sinh năm 2024</p>
                        <a href="#" class="btn btn-outline-primary">Xem Chi Tiết</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="quick-item">
                        <div class="icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h4>Tra Cứu Điểm</h4>
                        <p>Tra cứu kết quả học tập</p>
                        <a href="<?php echo base_url('../tracuu.thptanlac.edu.vn'); ?>"
                            class="btn btn-outline-primary">Tra Cứu</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="quick-item">
                        <div class="icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h4>Lịch Học</h4>
                        <p>Thời khóa biểu và lịch thi</p>
                        <a href="#" class="btn btn-outline-primary">Xem Lịch</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="quick-item">
                        <div class="icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h4>Liên Hệ</h4>
                        <p>Thông tin liên hệ nhà trường</p>
                        <a href="<?php echo create_url('pages/contact/index'); ?>" class="btn btn-outline-primary">Liên
                            Hệ</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-header">
                        <h2>Tin Tức Mới Nhất</h2>
                        <p>Cập nhật thông tin hoạt động của nhà trường</p>
                    </div>

                    <div class="news-list">
                        <article class="news-item featured">
                            <div class="news-image">
                                <img src="<?php echo base_url('src/assets/images/placeholder.php?w=300&h=200&text=Tin Tức Nổi Bật&bg=f3f4f6&color=374151'); ?>"
                                    alt="Tin tức nổi bật">
                                <div class="news-date">
                                    <span class="day">15</span>
                                    <span class="month">Th12</span>
                                </div>
                            </div>
                            <div class="news-content">
                                <h3><a href="#">Lễ Kỷ Niệm 20 Năm Thành Lập Trường THPT An
                                        Lạc</a></h3>
                                <p>Sáng ngày 15/12, trường THPT An Lạc đã tổ chức lễ kỷ niệm 20 năm thành lập với sự
                                    tham dự của đông đảo cán bộ, giáo viên, học sinh và phụ huynh...</p>
                                <div class="news-meta">
                                    <span><i class="fas fa-user"></i> Ban Biên Tập</span>
                                    <span><i class="fas fa-eye"></i> 1,250 lượt xem</span>
                                </div>
                            </div>
                        </article>

                        <article class="news-item">
                            <div class="news-image">
                                <img src="<?php echo base_url('src/assets/images/placeholder.php?w=150&h=120&text=Tin Tức&bg=e5e7eb&color=374151'); ?>"
                                    alt="Tin tức">
                            </div>
                            <div class="news-content">
                                <h4><a href="#">Học Sinh Lớp 12A1 Đạt Giải Nhất Cuộc Thi Khoa
                                        Học Kỹ Thuật</a></h4>
                                <p>Em Nguyễn Văn An, học sinh lớp 12A1 đã xuất sắc giành giải nhất cuộc thi Khoa học kỹ
                                    thuật cấp thành phố...</p>
                                <div class="news-meta">
                                    <span><i class="fas fa-calendar"></i> 12/12/2023</span>
                                </div>
                            </div>
                        </article>

                        <article class="news-item">
                            <div class="news-image">
                                <img src="<?php echo base_url('src/assets/images/placeholder.php?w=150&h=120&text=Hoạt Động&bg=e5e7eb&color=374151'); ?>"
                                    alt="Tin tức">
                            </div>
                            <div class="news-content">
                                <h4><a href="#">Chương Trình Tư Vấn Hướng Nghiệp Cho Học Sinh
                                        Lớp 12</a></h4>
                                <p>Nhà trường tổ chức chương trình tư vấn hướng nghiệp nhằm giúp học sinh lớp 12 định
                                    hướng tương lai...</p>
                                <div class="news-meta">
                                    <span><i class="fas fa-calendar"></i> 10/12/2023</span>
                                </div>
                            </div>
                        </article>
                    </div>

                    <div class="text-center mt-4">
                        <a href="<?php echo create_url('news/index/index'); ?>" class="btn btn-primary">Xem Tất Cả Tin
                            Tức</a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Thông Báo -->
                        <div class="widget">
                            <h3>Thông Báo <a href="<?php echo create_url('announcements/index/index'); ?>"
                                    class="btn btn-sm btn-outline-primary float-end">Xem tất cả</a></h3>
                            <ul class="announcement-list">
                                <li>
                                    <a href="<?php echo create_url('announcements/index/detail?id=3'); ?>">Lịch thi học
                                        kỳ I năm học 2024-2025</a>
                                    <span class="date">08/01/2025</span>
                                </li>
                                <li>
                                    <a href="<?php echo create_url('announcements/index/detail?id=1'); ?>">Kế hoạch tổ
                                        chức sinh hoạt kỷ niệm Lễ Giỗ Tổ Hùng Vương</a>
                                    <span class="date">20/01/2025</span>
                                </li>
                                <li>
                                    <a href="<?php echo create_url('announcements/index/detail?id=2'); ?>">Thông báo về
                                        việc nhận bằng tốt nghiệp THPT</a>
                                    <span class="date">15/01/2025</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Số Liệu -->
                        <div class="widget stats-widget">
                            <h3>Số Liệu Thống Kê</h3>
                            <div class="stats-list">
                                <div class="stat-item">
                                    <div class="stat-number">1,200</div>
                                    <div class="stat-label">Học Sinh</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">65</div>
                                    <div class="stat-label">Giáo Viên</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">36</div>
                                    <div class="stat-label">Lớp Học</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">20</div>
                                    <div class="stat-label">Năm Kinh Nghiệm</div>
                                </div>
                            </div>
                        </div>

                        <!-- Liên Kết Nhanh -->
                        <div class="widget">
                            <h3>Liên Kết Nhanh</h3>
                            <ul class="quick-links">
                                <li><a href="#"><i class="fas fa-external-link-alt"></i> Bộ Giáo Dục & Đào Tạo</a></li>
                                <li><a href="#"><i class="fas fa-external-link-alt"></i> Sở GD&ĐT TP.HCM</a></li>
                                <li><a href="#"><i class="fas fa-external-link-alt"></i> Phòng GD&ĐT Quận 6</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'footer.php'; ?>

    <!-- Scripts -->
    <script src="<?php echo base_url('src/assets/js/jquery/jquery-3.7.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('src/assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <script src="<?php echo base_url('src/assets/js/script.js'); ?>"></script>
</body>

</html>