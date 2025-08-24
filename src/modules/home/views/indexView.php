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
    <link rel="stylesheet" href="src/assets/css/home.css">

    <title>Trang Chủ</title>
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
                    <div class="carousel-bg" style="background-image: url('src/assets/images/about/thpt-an-lac-1.jpg')">
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
                    <div class="carousel-bg" style="background-image: url('src/assets/images/about/thpt-an-lac.png')">
                    </div>
                    <div class="carousel-content">
                        <div class="container">
                            <h2>Giáo Dục Toàn Diện</h2>
                            <p>Đào tạo học sinh có kiến thức vững vàng và kỹ năng sống</p>
                            <a href="<?php echo create_url('news'); ?>" class="btn btn-primary">Chương Trình Học</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-bg" style="background-image: url('src/assets/images/about/thpt-an-lac-2.png')">
                    </div>
                    <div class="carousel-content">
                        <div class="container">
                            <h2>Thành Tích Xuất Sắc</h2>
                            <p>Tự hào với những thành tích học tập và hoạt động của học sinh</p>
                            <a href="<?php echo create_url('announcements'); ?>" class="btn btn-primary">Xem Kết Quả</a>
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
                        <p>Thông tin tuyển sinh năm 2025</p>
                        <a href="<?php echo create_url('announcements'); ?>" class="btn btn-outline-primary">Xem Chi
                            Tiết</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="quick-item">
                        <div class="icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h4>Tra Cứu Thông Tin</h4>
                        <p>Tra cứu thông tin học sinh</p>
                        <a href="https://tracuu.thptanlac.edu.vn/" target="_blank" class="btn btn-outline-primary">Tra
                            Cứu</a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="quick-item">
                        <div class="icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <h4>Lịch Học</h4>
                        <p>Thời khóa biểu và lịch thi</p>
                        <a href="<?php echo create_url('announcements'); ?>" class="btn btn-outline-primary">Xem
                            Lịch</a>
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
                                <a href="<?php echo create_url('news/index/detail?id=' . $news_item['id']); ?>">
                                    <img src="<?php echo $news_item['image'] ?? 'src/assets/images/placeholder.php?w=400&h=300&text=' . urlencode('Tin nổi bật') . '&bg=f3f4f6&color=6b7280'; ?>"
                                        alt="Tin tức nổi bật" loading="lazy"
                                        onerror="this.src='src/assets/images/placeholder.php?w=400&h=300&text=<?php echo urlencode('Tin nổi bật'); ?>&bg=f3f4f6&color=6b7280';">
                                </a>
                                <div class="news-date">
                                    <span class="day">
                                        <?php echo isset($news_item['date']) ? date('d', strtotime($news_item['date'])) : ''; ?>
                                    </span>
                                    <span class="month">
                                        Th
                                        <?php echo isset($news_item['date']) ? date('m', strtotime($news_item['date'])) : ''; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="news-content">
                                <h3>
                                    <a href="<?php echo create_url('news/index/detail?id=' . $news_item['id']); ?>">
                                        <?php echo $news_item['title'] ?? 'Tin tức nổi bật'; ?>
                                    </a>
                                </h3>
                                <p>
                                    <?php echo substr($news_item['summary'], 0, 100) . (strlen($news_item['summary']) > 100 ? '...' : ''); ?>
                                </p>
                                <div class="news-meta">
                                    <span>
                                        <i class="fas fa-user"></i>
                                        <?php echo $news_item['author'] ?? 'Ban Biên Tập'; ?>
                                    </span>
                                    <span>
                                        <i class="fas fa-eye"></i>
                                        <?php echo number_format($news_item['views']) ?? 0; ?> lượt xem
                                    </span>
                                </div>
                            </div>
                        </article>

                        <?php foreach ($related_news as $news_item): ?>
                            <article class="news-item">
                                <div class="news-image">
                                    <a href="<?php echo create_url('news/index/detail?id=' . $news_item['id']); ?>">
                                        <img src="<?php echo $news_item['image'] ?? 'src/assets/images/placeholder.php?w=300&h=200&text=' . urlencode('Tin tức'); ?>"
                                            alt="Tin tức" loading="lazy"
                                            onerror="this.src='src/assets/images/placeholder.php?w=300&h=200&text=<?php echo urlencode('Tin tức'); ?>&bg=f3f4f6&color=6b7280';">
                                    </a>
                                </div>
                                <div class="news-content">
                                    <h4>
                                        <a href="<?php echo create_url('news/index/detail?id=' . $news_item['id']); ?>">
                                            <?php echo $news_item['title'] ?? 'Tiêu đề tin tức'; ?>
                                        </a>
                                    </h4>
                                    <p>
                                        <?php echo substr($news_item['summary'], 0, 100) . (strlen($news_item['summary']) > 100 ? '...' : ''); ?>
                                    </p>
                                    <div class="news-meta">
                                        <span><i class="fas fa-calendar"></i>
                                            <?php echo isset($news_item['date']) ? date('d/m/Y', strtotime($news_item['date'])) : ''; ?></span>
                                    </div>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </div>

                    <div class="text-center mt-4">
                        <a href="<?php echo create_url('news'); ?>" class="btn btn-primary">Xem Tất Cả Tin Tức</a>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Thông Báo -->
                        <div class="widget">
                            <div class="h3 d-flex justify-content-between align-items-center">
                                <span>
                                    Thông Báo
                                </span>
                                <a href="<?php echo create_url('announcements'); ?>"
                                    class="btn btn-sm btn-outline-primary">
                                    Xem tất cả
                                </a>
                            </div>

                            <ul class="announcement-list">
                                <?php for ($i = 0; $i < min(3, count($announcements_list)); $i++) : ?>
                                    <li>
                                        <a
                                            href="<?php echo create_url('announcements/index/detail?id=' . $announcements_list[$i]['id']); ?>">
                                            <?php echo substr($announcements_list[$i]['title'], 0, 100) . (strlen($announcements_list[$i]['title']) > 100 ? '...' : ''); ?>
                                        </a>
                                        <span
                                            class="date"><?php echo date('d/m/Y', strtotime($announcements_list[$i]['date'])); ?></span>
                                    </li>
                                <?php endfor; ?>
                            </ul>
                        </div>

                        <!-- Số Liệu -->
                        <div class="widget">
                            <h3>Số Liệu Thống Kê</h3>
                            <div class="stats-list">
                                <div class="stat-item">
                                    <div class="stat-number">2,000+</div>
                                    <div class="stat-label">Học Sinh</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">100+</div>
                                    <div class="stat-label">Giáo Viên</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number">50</div>
                                    <div class="stat-label">Lớp Học</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-number"><?php echo date('Y') - 1974; ?></div>
                                    <div class="stat-label">Năm Phát Triển</div>
                                </div>
                            </div>
                        </div>

                        <!-- Liên Kết Nhanh -->
                        <div class="widget">
                            <h3>Liên Kết Nhanh</h3>
                            <ul class="quick-links">
                                <li>
                                    <a href="https://moet.gov.vn/Pages/home.aspx" target="_blank" rel="noopener">
                                        <i class="fas fa-external-link-alt"></i> Bộ Giáo Dục & Đào Tạo
                                    </a>
                                </li>
                                <li>
                                    <a href="https://dichvugiaoduc.hcm.edu.vn/" target="_blank" rel="noopener">
                                        <i class="fas fa-external-link-alt"></i> Sở GD&ĐT TP.HCM
                                    </a>
                                </li>
                                <li>
                                    <a href="https://pgdquan6.hcm.edu.vn/homegd1412" target="_blank" rel="noopener">
                                        <i class="fas fa-external-link-alt"></i> Phòng GD&ĐT Quận 6
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'footer.php'; ?>

    <!-- Scripts -->
    <script src="src/assets/js/jquery/jquery-3.7.1.min.js"></script>
    <script src="src/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="src/assets/js/script.js"></script>
</body>

</html>