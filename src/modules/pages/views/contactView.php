<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ - Trường THPT An Lạc</title>
    <link rel="stylesheet" href="<?php echo base_url('src/assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/fontawesome/css/all.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/common.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/contact.css'); ?>">
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
                    <li class="breadcrumb-item"><a href="../index.php">Trang Chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Liên Hệ</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="section-header text-center">
                <h1>Liên Hệ Với Chúng Tôi</h1>
                <p class="lead">Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn</p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="contact-form-wrapper">
                        <h2>Gửi Tin Nhắn</h2>
                        <form id="contactForm" class="contact-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="fullName" class="form-label">Họ và Tên <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Email <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="phone" class="form-label">Số Điện Thoại</label>
                                        <input type="tel" class="form-control" id="phone" name="phone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="subject" class="form-label">Chủ Đề <span
                                                class="text-danger">*</span></label>
                                        <select class="form-control" id="subject" name="subject" required>
                                            <option value="">Chọn chủ đề...</option>
                                            <option value="admission">Tuyển sinh</option>
                                            <option value="curriculum">Chương trình học</option>
                                            <option value="facilities">Cơ sở vật chất</option>
                                            <option value="activities">Hoạt động ngoại khóa</option>
                                            <option value="other">Khác</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="message" class="form-label">Nội Dung <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" id="message" name="message" rows="6" required
                                    placeholder="Nhập nội dung tin nhắn của bạn..."></textarea>
                            </div>

                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                                    <label class="form-check-label" for="agreeTerms">
                                        Tôi đồng ý với <a href="privacy.php">chính sách bảo mật</a> và <a
                                            href="terms.php">điều khoản sử dụng</a>
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane"></i> Gửi Tin Nhắn
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="contact-info-wrapper">
                        <h2>Thông Tin Liên Hệ</h2>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Địa Chỉ</h4>
                                <p>123 Đường An Lạc, Phường 15<br>Quận 6, TP. Hồ Chí Minh</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Điện Thoại</h4>
                                <p>
                                    Văn phòng: (028) 3858 5555<br>
                                    Hotline: 0901 234 567
                                </p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Email</h4>
                                <p>
                                    Chung: info@thptanlac.edu.vn<br>
                                    Tuyển sinh: tuyensinh@thptanlac.edu.vn
                                </p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Giờ Làm Việc</h4>
                                <p>
                                    Thứ 2 - Thứ 6: 7:00 - 17:00<br>
                                    Thứ 7: 7:00 - 11:00<br>
                                    Chủ nhật: Nghỉ
                                </p>
                            </div>
                        </div>

                        <div class="social-media">
                            <h4>Kết Nối Với Chúng Tôi</h4>
                            <div class="social-links">
                                <a href="#" class="social-link facebook">
                                    <i class="fab fa-facebook-f"></i>
                                    Facebook
                                </a>
                                <a href="#" class="social-link youtube">
                                    <i class="fab fa-youtube"></i>
                                    YouTube
                                </a>
                                <a href="#" class="social-link zalo">
                                    <i class="fas fa-comment"></i>
                                    Zalo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container-fluid p-0">
            <div class="map-wrapper">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6304013530704!2d106.6377308147702!3d10.759542692330068!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ee4ecfb1c99%3A0x600e0a3b8d4a7c0!2sAn%20Lac%20High%20School!5e0!3m2!1sen!2s!4v1637659924285!5m2!1sen!2s"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <div class="map-overlay">
                    <div class="map-info">
                        <h3>Trường THPT An Lạc</h3>
                        <p><i class="fas fa-map-marker-alt"></i> 123 Đường An Lạc, Quận 6, TP.HCM</p>
                        <a href="https://maps.google.com/directions" target="_blank" class="btn btn-primary">
                            <i class="fas fa-directions"></i> Chỉ Đường
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="section-header text-center">
                <h2>Câu Hỏi Thường Gặp</h2>
                <p>Những câu hỏi được hỏi nhiều nhất về trường THPT An Lạc</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse1">
                                    Điều kiện tuyển sinh vào trường như thế nào?
                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Trường tuyển sinh theo quy chế của Bộ Giáo dục và Đào tạo. Học sinh cần có học lực
                                    từ khá trở lên và hạnh kiểm tốt. Điểm chuẩn hàng năm dao động từ 7.0 - 7.5 điểm.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse2">
                                    Học phí của trường là bao nhiêu?
                                </button>
                            </h2>
                            <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Học phí hiện tại là 300.000 VNĐ/tháng cho học sinh nội thành và 350.000 VNĐ/tháng
                                    cho học sinh ngoại thành. Phí này đã bao gồm học phí và các hoạt động ngoại khóa.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse3">
                                    Trường có những hoạt động ngoại khóa nào?
                                </button>
                            </h2>
                            <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Trường tổ chức nhiều hoạt động như: CLB Toán, Văn, Anh, đội tuyển thể thao, đội văn
                                    nghệ, câu lạc bộ khoa học kỹ thuật, hoạt động tình nguyện và các chuyến du học văn
                                    hóa.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="faq4">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse4">
                                    Kết quả học tập của trường như thế nào?
                                </button>
                            </h2>
                            <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Tỷ lệ tốt nghiệp THPT đạt 98%, trong đó 85% học sinh đỗ đại học. Trường thường xuyên
                                    có học sinh đạt giải các kỳ thi học sinh giỏi cấp thành phố và quốc gia.
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

    <script>
        // Contact form handling
        $('#contactForm').on('submit', function(e) {
            e.preventDefault();

            // Show loading state
            var $submitBtn = $(this).find('button[type="submit"]');
            var originalText = $submitBtn.html();
            $submitBtn.html('<i class="fas fa-spinner fa-spin"></i> Đang gửi...').prop('disabled', true);

            // Simulate form submission
            setTimeout(function() {
                $submitBtn.html('<i class="fas fa-check"></i> Đã gửi thành công!').removeClass(
                    'btn-primary').addClass('btn-success');

                // Show success message
                if (window.ThptAnLac) {
                    window.ThptAnLac.showNotification(
                        'Tin nhắn của bạn đã được gửi thành công! Chúng tôi sẽ phản hồi sớm nhất có thể.',
                        'success');
                }

                // Reset form after 3 seconds
                setTimeout(function() {
                    $('#contactForm')[0].reset();
                    $submitBtn.html(originalText).removeClass('btn-success').addClass('btn-primary')
                        .prop('disabled', false);
                }, 3000);
            }, 2000);
        });
    </script>
</body>

</html>