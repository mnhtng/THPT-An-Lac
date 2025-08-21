<!-- Footer -->
<footer class="footer">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="footer-about">
                        <h3>TRƯỜNG THPT AN LẠC</h3>
                        <p>Trường Trung học Phổ thông An Lạc cam kết mang đến môi trường giáo dục chất lượng cao, phát
                            triển toàn diện cho học sinh.</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h4>Giới Thiệu</h4>
                    <ul class="footer-links">
                        <li><a
                                href="<?php echo function_exists('create_url') ? create_url('pages/about/index') : '#'; ?>">Về
                                Trường</a></li>
                        <li><a href="#">Lịch Sử</a></li>
                        <li><a href="#">Đội Ngũ</a></li>
                        <li><a href="#">Thành Tích</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-6 mb-4">
                    <h4>Đào Tạo</h4>
                    <ul class="footer-links">
                        <li><a href="#">Chương Trình</a></li>
                        <li><a href="#">Tuyển Sinh</a></li>
                        <li><a href="#">Kết Quả</a></li>
                        <li><a
                                href="<?php echo function_exists('create_url') ? create_url('news/index/index') : '#'; ?>">Hoạt
                                Động Giáo Dục</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 mb-4">
                    <h4>Liên Hệ</h4>
                    <div class="contact-info">
                        <p><i class="fas fa-map-marker-alt"></i> 123 Đường An Lạc, Quận 6, TP.HCM</p>
                        <p><i class="fas fa-phone"></i> (028) 3858 5555</p>
                        <p><i class="fas fa-envelope"></i> info@thptanlac.edu.vn</p>
                        <p><i class="fas fa-globe"></i> www.thptanlac.edu.vn</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <span>&copy; <?php echo date('Y'); ?> Trường THPT An Lạc. Tất cả quyền được bảo lưu.</span>
                </div>
                <div class="col-md-6 text-end">
                    <a href="#">Chính Sách Bảo Mật</a> |
                    <a href="#">Điều Khoản Sử Dụng</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Back to Top Button -->
<button class="back-to-top">
    <i class="fas fa-chevron-up"></i>
</button>

<!-- Notification Container -->
<div id="notification-container"></div>

<style>
    /* Back to Top Button Styles */
    .back-to-top {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #1e3a8a, #3b82f6);
        color: white;
        border: none;
        border-radius: 50%;
        font-size: 18px;
        cursor: pointer;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
    }

    .back-to-top.show {
        opacity: 1;
        visibility: visible;
    }

    .back-to-top:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    }

    /* Notification Styles */
    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background: white;
        border-radius: 8px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        padding: 15px 20px;
        margin-bottom: 10px;
        z-index: 9999;
        opacity: 0;
        transform: translateX(100%);
        transition: all 0.3s ease;
        max-width: 400px;
        border-left: 4px solid #3b82f6;
    }

    .notification.show {
        opacity: 1;
        transform: translateX(0);
    }

    .notification-success {
        border-left-color: #10b981;
    }

    .notification-error {
        border-left-color: #ef4444;
    }

    .notification-warning {
        border-left-color: #f59e0b;
    }

    .notification .close-notification {
        position: absolute;
        top: 5px;
        right: 10px;
        background: none;
        border: none;
        font-size: 18px;
        cursor: pointer;
        color: #666;
        padding: 5px;
    }

    .notification .close-notification:hover {
        color: #333;
    }

    /* Breadcrumb Styles */
    .breadcrumb-section {
        background: #f8f9fa;
        padding: 15px 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .breadcrumb {
        background: none;
        padding: 0;
        margin: 0;
    }

    .breadcrumb-item+.breadcrumb-item::before {
        content: ">";
        color: #6b7280;
        padding: 0 8px;
    }

    .breadcrumb-item a {
        color: #1e3a8a;
        text-decoration: none;
    }

    .breadcrumb-item a:hover {
        color: #1e40af;
    }

    .breadcrumb-item.active {
        color: #6b7280;
    }

    /* Content Wrapper Styles */
    .content-wrapper {
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .content-wrapper .section-header {
        text-align: left;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 2px solid #e5e7eb;
    }

    .content-wrapper .section-header h1 {
        color: #1e3a8a;
        font-size: 2.5rem;
        margin-bottom: 10px;
    }

    .content-wrapper .section-header .lead {
        color: #666;
        font-size: 1.2rem;
    }

    /* Contact Form Wrapper Styles */
    .contact-form-wrapper {
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .contact-info-wrapper {
        background: white;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .contact-item {
        display: flex;
        margin-bottom: 30px;
    }

    .contact-icon {
        flex: 0 0 60px;
        height: 60px;
        background: linear-gradient(135deg, #1e3a8a, #3b82f6);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        font-size: 20px;
    }

    .contact-details h4 {
        color: #1e3a8a;
        margin-bottom: 8px;
        font-size: 1.1rem;
    }

    .contact-details p {
        color: #666;
        margin: 0;
        line-height: 1.6;
    }

    /* Social Media Styles */
    .social-media {
        margin-top: 30px;
        padding-top: 30px;
        border-top: 1px solid #e5e7eb;
    }

    .social-media h4 {
        color: #1e3a8a;
        margin-bottom: 15px;
    }

    .social-link {
        display: block;
        color: #333;
        text-decoration: none;
        padding: 10px 0;
        transition: color 0.3s;
    }

    .social-link:hover {
        color: #1e3a8a;
    }

    .social-link i {
        margin-right: 10px;
        width: 20px;
    }

    /* Map Styles */
    .map-section {
        position: relative;
    }

    .map-wrapper {
        position: relative;
    }

    .map-overlay {
        position: absolute;
        bottom: 20px;
        left: 20px;
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        z-index: 10;
    }

    .map-info h3 {
        color: #1e3a8a;
        margin-bottom: 10px;
        font-size: 1.2rem;
    }

    .map-info p {
        color: #666;
        margin-bottom: 15px;
    }

    /* FAQ Styles */
    .faq-section {
        padding: 80px 0;
        background: #f8f9fa;
    }

    .accordion-button {
        background: white;
        color: #333;
        border: none;
        font-weight: 500;
    }

    .accordion-button:not(.collapsed) {
        color: #1e3a8a;
        background: #f8f9fa;
    }

    .accordion-button:focus {
        box-shadow: none;
        border-color: #1e3a8a;
    }

    .accordion-item {
        border: 1px solid #e5e7eb;
        margin-bottom: 10px;
        border-radius: 8px;
        overflow: hidden;
    }

    .accordion-body {
        color: #666;
        line-height: 1.6;
    }

    /* Vision Mission Styles */
    .vision-mission {
        margin: 30px 0;
    }

    .vision,
    .mission {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .vision h3,
    .mission h3 {
        color: #1e3a8a;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }

    .vision h3 i,
    .mission h3 i {
        margin-right: 10px;
        font-size: 20px;
    }

    /* Core Values Styles */
    .core-values {
        margin: 30px 0;
    }

    .value-item {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 10px;
    }

    .value-icon {
        flex: 0 0 60px;
        height: 60px;
        background: linear-gradient(135deg, #1e3a8a, #3b82f6);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        font-size: 24px;
    }

    .value-content h4 {
        color: #1e3a8a;
        margin-bottom: 8px;
    }

    .value-content p {
        color: #666;
        margin: 0;
    }

    /* Facility List Styles */
    .facility-list {
        list-style: none;
        padding: 0;
    }

    .facility-list li {
        padding: 8px 0;
        display: flex;
        align-items: center;
    }

    .facility-list i {
        color: #10b981;
        margin-right: 12px;
        font-size: 16px;
    }

    /* Achievement List Styles */
    .achievement-list {
        list-style: none;
        padding: 0;
    }

    .achievement-list li {
        padding: 12px 0;
        display: flex;
        align-items: center;
        border-bottom: 1px solid #e5e7eb;
    }

    .achievement-list li:last-child {
        border-bottom: none;
    }

    .achievement-list i {
        margin-right: 12px;
        font-size: 18px;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>