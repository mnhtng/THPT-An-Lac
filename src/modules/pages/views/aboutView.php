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
    <link rel="stylesheet" href="src/assets/css/about.css">

    <title>Giới Thiệu</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Giới Thiệu</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="content-wrapper">
                        <div class="section-header">
                            <h1 id="ve-truong-thpt-an-lac">Về Trường THPT An Lạc</h1>
                            <p class="lead">Môi trường giáo dục chất lượng cao, phát triển toàn diện cho học sinh</p>
                        </div>

                        <div class="about-content">
                            <div class="about-image">
                                <img src="src/assets/images/about/thpt-an-lac-3.png"
                                    alt="Trường THPT An Lạc"
                                    class="img-fluid rounded"
                                    loading="lazy"
                                    onerror="this.src='src/assets/images/placeholder.php?w=600&h=400&text=<?php echo urlencode('Trường THPT An Lạc'); ?>&bg=f3f4f6&color=6b7280';">
                            </div>

                            <div class="about-text">
                                <h2 id="lich-su" class="mt-3">Lịch Sử Hình Thành và Phát Triển</h2>
                                <div class="history-timeline">
                                    <div class="timeline-item mb-4">
                                        <span class="year badge bg-warning">1974</span>
                                        <p>Trường được thành lập tại địa chỉ: số 595 Kinh Dương Vương, Phường An Lạc,
                                            Quận Bình Tân, TP.HCM.</p>
                                    </div>
                                    <div class="timeline-item mb-4">
                                        <span class="year badge bg-primary">1991-1996</span>
                                        <p>Hoạt động với tên gọi Trường Phổ thông Cấp 2, 3 An Lạc.</p>
                                    </div>
                                    <div class="timeline-item mb-4">
                                        <span class="year badge bg-success">1997-nay</span>
                                        <p>Đổi tên thành Trường Trung học Phổ thông An Lạc, trực thuộc Sở Giáo dục và
                                            Đào tạo Thành phố Hồ Chí Minh.</p>
                                    </div>
                                </div>

                                <div class="about-image">
                                    <img src="src/assets/images/about/thpt-an-lac-4.png"
                                        alt="Trường THPT An Lạc"
                                        class="img-fluid rounded"
                                        loading="lazy"
                                        onerror="this.src='src/assets/images/placeholder.php?w=600&h=400&text=<?php echo urlencode('Cơ sở vật chất'); ?>&bg=f3f4f6&color=6b7280';">
                                </div>

                                <h2 id="co-so-vat-chat" class="mt-3">Cơ Sở Vật Chất</h2>
                                <p>
                                    Trường có khuôn viên riêng biệt với tường rào kiên cố bao quanh, cổng trường và biển
                                    trường đạt chuẩn. Môi trường xanh, sạch, đẹp với nhiều cây xanh tạo cảnh quan sư
                                    phạm, không gian thoáng mát, đảm bảo sức khỏe cho giáo viên và học sinh.
                                </p>
                                <p>
                                    Được trang bị đầy đủ cơ sở vật chất phục vụ việc tổ chức dạy học 2 buổi/ngày, đảm
                                    bảo
                                    an toàn cho mọi hoạt động giáo dục.
                                </p>

                                <div class="about-image">
                                    <img src="src/assets/images/about/thpt-an-lac-5.jpg"
                                        alt="Trường THPT An Lạc"
                                        class="img-fluid rounded"
                                        loading="lazy"
                                        onerror="this.src='src/assets/images/placeholder.php?w=600&h=400&text=<?php echo urlencode('Môi trường học tập'); ?>&bg=f3f4f6&color=6b7280';">
                                </div>

                                <h2 id="muc-tieu-giao-duc" class="mt-3">Mục Tiêu Giáo Dục</h2>
                                <p>
                                    Trường THPT An Lạc hướng đến việc phát triển toàn diện cho học sinh, không chỉ
                                    chú trọng đến kiến thức mà còn rèn luyện kỹ năng sống, phẩm chất đạo đức.
                                </p>

                                <ul class="facility-list">
                                    <li>
                                        <i class="fas fa-check"></i> Coi trọng công tác giáo dục chính trị, tư tưởng đạo
                                        đức cho đội ngũ CB-GV-NV và học sinh
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Chú trọng nâng cao chất lượng dạy và học
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Thực hiện đầy đủ các hoạt động giáo dục
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Chú trọng giáo dục thể chất và thẩm mỹ
                                    </li>
                                    <li>
                                        <i class="fas fa-check"></i> Đảm bảo chăm sóc sức khỏe cho học sinh
                                    </li>
                                </ul>

                                <iframe
                                    src="https://f2.hcm.edu.vn//Media/hcmedu/2023/thptanlac/2023_11/30/clip-thpt-an-lac_3011202313.mp4"
                                    frameborder="0" allowfullscreen width="100%" height="400" style="border:0;"
                                    loading="lazy" title="Video giới thiệu trường THPT An Lạc">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Statistics -->
                        <div class="widget">
                            <h3>Thống Kê Trường</h3>
                            <div class="stats-grid">
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
                                    <div class="stat-number">9,468m²</div>
                                    <div class="stat-label">Diện Tích</div>
                                </div>
                            </div>
                        </div>

                        <!-- Achievements -->
                        <div class="widget">
                            <h3 id="thanh-tich">Thành Tích Nổi Bật</h3>
                            <ul class="achievement-list">
                                <li>
                                    <i class="fas fa-medal text-success"></i>
                                    <span>Bằng khen Thủ tướng</span>
                                </li>
                                <li>
                                    <i class="fas fa-award text-primary"></i>
                                    <span>Bằng khen Bộ Giáo dục và Đào tạo</span>
                                </li>
                                <li>
                                    <i class="fas fa-star text-info"></i>
                                    <span>Kiểm định chất lượng giáo dục cấp độ 1 (2015, 2021)</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Contact Info -->
                        <div class="widget">
                            <h3>Thông Tin Liên Hệ</h3>
                            <div class="contact-info">
                                <p><i class="fas fa-map-marker-alt"></i> 595 Kinh Dương Vương, Phường An Lạc, Thành phố
                                    Hồ Chí Minh</p>
                                <p><i class="fas fa-phone"></i> (028) 38750022</p>
                                <p><i class="fas fa-envelope"></i> c3anlac.tphcm@moet.edu.vn</p>
                                <p><i class="fas fa-clock"></i> Thứ 2 - Thứ 6: 7:00 - 17:00</p>
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