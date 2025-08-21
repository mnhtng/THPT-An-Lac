<!-- Header -->
<header class="header">
    <div class="top-bar p-0 p-md-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="contact-info d-flex justify-content-between justify-content-md-start">
                        <span><i class="fas fa-phone"></i> (028) 3858 5555</span>
                        <span><i class="fas fa-envelope"></i> info@thptanlac.edu.vn</span>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <div class="social-links text-end">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <?php
            // Xác định trang hiện tại để active tab navbar tương ứng
            $currentUrl = $_SERVER['REQUEST_URI'];

            // Định nghĩa các route chính và url tương ứng
            $routes = [
                'home' => create_url('home'),
                'news' => create_url('news'),
                'announcements' =>  create_url('announcements'),
                'about' =>  create_url('pages/about'),
                'contact' =>  create_url('pages/contact'),
            ];

            // Hàm kiểm tra active cho từng tab
            function is_active($key, $currentUrl, $routes)
            {
                // Trang chủ
                if ($key === 'home') {
                    return (str_contains($routes['home'], $currentUrl));
                }
                // Giới thiệu
                if ($key === 'about') {
                    return (str_contains($routes['about'], $currentUrl));
                }
                // Tin tức/Hoạt động
                if ($key === 'news') {
                    return (str_contains($routes['news'], $currentUrl));
                }
                // Thông báo
                if ($key === 'announcements') {
                    return (str_contains($routes['announcements'], $currentUrl));
                }
                // Liên hệ
                if ($key === 'contact') {
                    return (str_contains($routes['contact'], $currentUrl));
                }
                return false;
            }
            ?>

            <a class="navbar-brand d-flex flex-col align-items-center" href="<?php echo  create_url('home'); ?>">
                <img src="<?php echo base_url('src/assets/images/logo-thpt-an-lac.png'); ?>" alt="Logo THPT An Lạc"
                    class="logo">
                <div class="brand-text d-none d-md-block">
                    <h1>THPT AN LẠC</h1>
                    <p>Chất lượng - Đổi mới - Phát triển</p>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_active('home', $currentUrl, $routes) ? 'active' : ''; ?>"
                            href="<?php echo create_url('home'); ?>">
                            Trang Chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_active('about', $currentUrl, $routes) ? 'active' : ''; ?>"
                            href="<?php echo  create_url('pages/about'); ?>">
                            Giới Thiệu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_active('news', $currentUrl, $routes) ? 'active' : ''; ?>"
                            href="<?php echo  create_url('news'); ?>">
                            Hoạt Động Giáo Dục
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_active('announcements', $currentUrl, $routes) ? 'active' : ''; ?>"
                            href="<?php echo  create_url('announcements'); ?>">
                            Thông Báo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo is_active('contact', $currentUrl, $routes) ? 'active' : ''; ?>"
                            href="<?php echo  create_url('pages/contact'); ?>">
                            Liên Hệ
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>