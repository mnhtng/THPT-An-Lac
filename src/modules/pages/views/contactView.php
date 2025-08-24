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
    <link rel="stylesheet" href="src/assets/css/contact.css">

    <title>Liên Hệ</title>
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
                                        Tôi đồng ý với chính sách bảo mật và điều khoản sử dụng
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
                        <h2 class="mb-3">Thông Tin Liên Hệ</h2>

                        <div class="contact-item">
                            <div class="contact-icon my-auto">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Địa Chỉ</h4>
                                <p>595 Kinh Dương Vương, Phường An Lạc, Thành phố Hồ Chí Minh</p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon my-auto">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Điện Thoại</h4>
                                <p>
                                    (028) 38750022
                                </p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon my-auto">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Email</h4>
                                <p>
                                    c3anlac.tphcm@moet.edu.vn
                                </p>
                            </div>
                        </div>

                        <div class="contact-item">
                            <div class="contact-icon my-auto">
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
                            <div>
                                <a href="https://www.facebook.com/TruongTHPTAnLac" class="social-link facebook"
                                    target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" fill="url(#facebook__a)"
                                        height="35" width="35">
                                        <defs>
                                            <linearGradient x1="50%" x2="50%" y1="97.078%" y2="0%" id="facebook__a">
                                                <stop offset="0%" stop-color="#0062E0" />
                                                <stop offset="100%" stop-color="#19AFFF" />
                                            </linearGradient>
                                        </defs>
                                        <path
                                            d="M15 35.8C6.5 34.3 0 26.9 0 18 0 8.1 8.1 0 18 0s18 8.1 18 18c0 8.9-6.5 16.3-15 17.8l-1-.8h-4l-1 .8z" />
                                        <path fill="#FFF"
                                            d="m25 23 .8-5H21v-3.5c0-1.4.5-2.5 2.7-2.5H26V7.4c-1.3-.2-2.7-.4-4-.4-4.1 0-7 2.5-7 7v4h-4.5v5H15v12.7c1 .2 2 .3 3 .3s2-.1 3-.3V23h4z" />
                                    </svg>
                                    <span class="ms-3">
                                        Facebook
                                    </span>
                                </a>
                                <a href="https://www.youtube.com/channel/UCewNZWC-ybQuhVLpxYKB6yA"
                                    class="social-link youtube" target="_blank">
                                    <svg viewBox="0 0 256 180" width="35" height="35" xmlns="http://www.w3.org/2000/svg"
                                        preserveAspectRatio="xMidYMid">
                                        <path
                                            d="M250.346 28.075A32.18 32.18 0 0 0 227.69 5.418C207.824 0 127.87 0 127.87 0S47.912.164 28.046 5.582A32.18 32.18 0 0 0 5.39 28.24c-6.009 35.298-8.34 89.084.165 122.97a32.18 32.18 0 0 0 22.656 22.657c19.866 5.418 99.822 5.418 99.822 5.418s79.955 0 99.82-5.418a32.18 32.18 0 0 0 22.657-22.657c6.338-35.348 8.291-89.1-.164-123.134Z"
                                            fill="red" />
                                        <path fill="#FFF" d="m102.421 128.06 66.328-38.418-66.328-38.418z" />
                                    </svg>
                                    <span class="ms-3">
                                        YouTube
                                    </span>
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
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.0361899313148!2d106.61204260273448!3d10.73169219522221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752dc3d2bbe8d7%3A0x13c77a9402182fdc!2sAn%20L%E1%BA%A1c%20High%20School!5e0!3m2!1sen!2sus!4v1755862060214!5m2!1sen!2sus"
                    width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
                <div class="map-overlay">
                    <div class="map-info">
                        <h3>Trường THPT An Lạc</h3>
                        <p><i class="fas fa-map-marker-alt"></i> 595 Kinh Dương Vương, Phường An Lạc, TP.HCM</p>
                        <a href="https://www.google.com/maps/dir/20.9573992,105.7960174/An+L%E1%BA%A1c+High+School,+595+%C4%90.+Kinh+D%C6%B0%C6%A1ng+V%C6%B0%C6%A1ng,+An+L%E1%BA%A1c,+B%C3%ACnh+T%C3%A2n,+H%E1%BB%93+Ch%C3%AD+Minh+71906,+Vietnam/@15.8232651,102.1787156,6z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x31752dc3d2bbe8d7:0x13c77a9402182fdc!2m2!1d106.6120023!2d10.7317582?entry=ttu&g_ep=EgoyMDI1MDgxOS4wIKXMDSoASAFQAw%3D%3D"
                            target="_blank" class="btn btn-primary">
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
                                    Tỷ lệ tốt nghiệp THPT đạt 99%, trong đó 85% học sinh đỗ đại học. Trường thường xuyên
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
    <script src="src/assets/js/jquery/jquery-3.7.1.min.js"></script>
    <script src="src/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="src/assets/js/script.js"></script>

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