<!-- Header -->
<header class="header">
    <div class="announcement-bar">
        <div class="container-fluid d-flex align-items-center">
            <marquee behavior="scroll" direction="left" scrollamount="5" onmouseover="this.stop();"
                onmouseout="this.start();">
                <span class="announcement-text">
                    <i class="fas fa-bullhorn me-3"
                        style="color: #da4545; transform: rotate(-20deg) translateY(2px); font-size: 1.2rem;"></i>
                    ĐÂY LÀ WEBSITE CHÍNH THỨC CỦA TRƯỜNG THPT AN LẠC. HOẠT ĐỘNG SONG SONG VỚI WEBSITE:
                    <a href="https://thptanlac.hcm.edu.vn" target="_blank" class="announcement-link">
                        thptanlac.hcm.edu.vn
                    </a>
                </span>
            </marquee>
        </div>
    </div>
    <div class="top-bar p-0 p-md-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="contact-info d-flex justify-content-between justify-content-md-start">
                        <span><i class="fas fa-phone"></i> (028) 38750022</span>
                        <span><i class="fas fa-envelope"></i> c3anlac.tphcm@moet.edu.vn</span>
                    </div>
                </div>
                <div class="col-md-6 d-none d-md-block">
                    <div class="social-links text-end">
                        <a href="https://www.facebook.com/TruongTHPTAnLac" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.youtube.com/channel/UCewNZWC-ybQuhVLpxYKB6yA" target="_blank"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand d-flex flex-col align-items-center" href="<?php echo  create_url('home'); ?>">
                <img src="src/assets/images/logo-thpt-an-lac.png" alt="Logo THPT An Lạc" class="logo" loading="lazy"
                    onerror="this.src='src/assets/images/placeholder.php?w=80&h=80&text=<?php echo urlencode('Logo'); ?>&bg=e3f2fd&color=1976d2';">
                <div class="brand-text d-none d-md-block">
                    <h1>THPT AN LẠC</h1>
                    <p>Chất lượng - Đổi mới - Phát triển</p>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="d-none d-lg-block" id="navOffcanvas">
                <ul class="navbar-nav d-flex flex-row">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo create_url('home'); ?>">
                            <i class="fas fa-home me-1"></i>Trang Chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo  create_url('pages/about'); ?>">
                            <i class="fas fa-info-circle me-1"></i>Giới Thiệu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo  create_url('news'); ?>">
                            <i class="fas fa-graduation-cap me-1"></i>Hoạt Động Giáo Dục
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo  create_url('announcements'); ?>">
                            <i class="fas fa-bullhorn me-1"></i>Thông Báo
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo  create_url('pages/contact'); ?>">
                            <i class="fas fa-envelope me-1"></i>Liên Hệ
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Mobile Menu Trigger -->
            <button class="btn btn-primary d-lg-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#mobileNavOffcanvas" aria-controls="mobileNavOffcanvas">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Mobile Offcanvas Navigation -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="mobileNavOffcanvas"
        aria-labelledby="mobileNavOffcanvasLabel">
        <div class="offcanvas-header">
            <div class="d-flex align-items-center">
                <img src="src/assets/images/logo-thpt-an-lac.png" alt="Logo THPT An Lạc" class="me-3"
                    style="width: 40px; height: 40px; border-radius: 8px;" loading="lazy"
                    onerror="this.src='src/assets/images/placeholder.php?w=40&h=40&text=<?php echo urlencode('Logo'); ?>&bg=e3f2fd&color=1976d2';">
                <div>
                    <h5 class="offcanvas-title mb-0" id="mobileNavOffcanvasLabel">THPT AN LẠC</h5>
                    <small class="">Menu Điều Hướng</small>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">
            <!-- Navigation Menu -->
            <nav class="mobile-nav">
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <a href="<?php echo create_url('home'); ?>" class="nav-link-mobile d-block text-decoration-none"
                            style="color: inherit;">
                            <div class="nav-item-mobile">
                                <div class="nav-icon">
                                    <i class="fas fa-home"></i>
                                </div>
                                <div class="nav-content">
                                    <h6 class="mb-0">Trang Chủ</h6>
                                    <small class="fst-italic">Trang chủ trường THPT An Lạc</small>
                                </div>
                                <div class="nav-arrow">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="mb-3">
                        <a href="<?php echo create_url('pages/about'); ?>"
                            class="nav-link-mobile d-block text-decoration-none" style="color: inherit;">
                            <div class="nav-item-mobile">
                                <div class="nav-icon">
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <div class="nav-content">
                                    <h6 class="mb-0">Giới Thiệu</h6>
                                    <small class="fst-italic">Thông tin về trường học</small>
                                </div>
                                <div class="nav-arrow">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="mb-3">
                        <a href="<?php echo create_url('news'); ?>" class="nav-link-mobile d-block text-decoration-none"
                            style="color: inherit;">
                            <div class="nav-item-mobile">
                                <div class="nav-icon">
                                    <i class="fas fa-graduation-cap"></i>
                                </div>
                                <div class="nav-content">
                                    <h6 class="mb-0">Hoạt Động Giáo Dục</h6>
                                    <small class="fst-italic">Tin tức và hoạt động của trường</small>
                                </div>
                                <div class="nav-arrow">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="mb-3">
                        <a href="<?php echo create_url('announcements'); ?>"
                            class="nav-link-mobile d-block text-decoration-none" style="color: inherit;">
                            <div class="nav-item-mobile">
                                <div class="nav-icon">
                                    <i class="fas fa-bullhorn"></i>
                                </div>
                                <div class="nav-content">
                                    <h6 class="mb-0">Thông Báo</h6>
                                    <small class="fst-italic">Thông báo quan trọng từ nhà trường</small>
                                </div>
                                <div class="nav-arrow">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="mb-3">
                        <a href="<?php echo create_url('pages/contact'); ?>"
                            class="nav-link-mobile d-block text-decoration-none" style="color: inherit;">
                            <div class="nav-item-mobile">
                                <div class="nav-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="nav-content">
                                    <h6 class="mb-0">Liên Hệ</h6>
                                    <small class="fst-italic">Thông tin liên hệ với nhà trường</small>
                                </div>
                                <div class="nav-arrow">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <style>
        .announcement-bar {
            background: linear-gradient(to right, #1a4780, #2766be);
            padding: 8px 0;
        }

        .announcement-text {
            color: #ffffff;
            font-weight: 500;
            letter-spacing: 0.3px;
        }

        .announcement-link {
            color: #ffd700;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .announcement-link:hover {
            color: #fff;
            text-decoration: underline;
        }

        marquee:hover {
            cursor: pointer;
        }
    </style>

    <script>
        const navbarCategories = [
            'about',
            'news',
            'announcements',
            'contact',
            'home',
        ];

        document.addEventListener('DOMContentLoaded', function() {
            let url = window.location.href;

            navbarCategories.forEach(function(category) {
                if (url.includes(category)) {
                    url = category;
                }
            });

            // Desktop navigation active states
            document.querySelectorAll('#navOffcanvas li a').forEach(a => a.classList.remove('active'));
            document.querySelector(`#navOffcanvas li a[href*="${url}"]`)?.classList.add('active');

            // Mobile navigation active states
            document.querySelectorAll('#mobileNavOffcanvas li a').forEach(a => a.classList.remove('active'));
            document.querySelector(`#mobileNavOffcanvas li a[href*="${url}"]`)?.classList.add('active');

            // Find all mobile nav links and add click handlers
            const mobileNavLinks = document.querySelectorAll('.nav-link-mobile');
            mobileNavLinks.forEach(function(link, index) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const href = this.getAttribute('href');

                    // Close offcanvas first
                    const offcanvas = document.getElementById('mobileNavOffcanvas');
                    if (offcanvas && bootstrap && bootstrap.Offcanvas) {
                        const bsOffcanvas = bootstrap.Offcanvas.getInstance(offcanvas) ||
                            new bootstrap.Offcanvas(offcanvas);
                        bsOffcanvas.hide();

                        // Navigate after a short delay
                        setTimeout(() => {
                            window.location.href = href;
                        }, 200);
                    } else {
                        // Direct navigation if bootstrap not available
                        window.location.href = href;
                    }
                });
            });
        });
    </script>
</header>