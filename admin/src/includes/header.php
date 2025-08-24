<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="src/assets/images/logo-thpt-an-lac.png" type="image/png">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- CKEditor 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <!-- Custom Admin CSS -->
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --accent-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --success-color: #48bb78;
            --warning-color: #ed8936;
            --danger-color: #f56565;
            --dark-color: #2d3748;
            --gray-50: #f8f9fa;
            --gray-100: #e9ecef;
            --gray-200: #e2e8f0;
            --gray-500: #718096;
            --gray-700: #4a5568;
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;
            background: var(--gray-50);
            color: var(--dark-color);
            overflow-x: hidden;
        }

        /* Modern Admin Layout */
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }

        /* Modern Sidebar */
        .modern-sidebar {
            width: 280px;
            background: var(--primary-gradient);
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1000;
            transform: translateX(0);
            transition: transform 0.3s ease;
            box-shadow: var(--shadow-lg);
            overflow-y: auto;
            overflow-x: hidden;
        }

        .modern-sidebar.collapsed {
            transform: translateX(-100%);
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        .logo-text h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
        }

        .logo-subtitle {
            font-size: 0.8rem;
            opacity: 0.8;
            margin: 0;
        }

        /* Modern Navigation */
        .modern-nav {
            padding: 1rem 0;
        }

        .nav-section {
            margin-bottom: 2rem;
        }

        .nav-section-title {
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            opacity: 0.6;
            padding: 0 1.5rem;
            margin-bottom: 0.5rem;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
        }

        .nav-item {
            margin: 0.25rem 0;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.875rem 1.5rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            border-radius: 0;
            position: relative;
            font-weight: 500;
        }

        .nav-link:hover,
        .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.1);
            transform: translateX(8px);
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: white;
            border-radius: 0 4px 4px 0;
        }

        .nav-icon {
            width: 20px;
            text-align: center;
            font-size: 1rem;
        }

        /* Modern Header */
        .modern-header {
            background: white;
            padding: 1rem 2rem;
            position: sticky;
            top: 0;
            z-index: 999;
            box-shadow: var(--shadow-sm);
            border-bottom: 1px solid var(--gray-200);
            backdrop-filter: blur(10px);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .mobile-menu-btn {
            width: 40px;
            height: 40px;
            border: none;
            background: var(--gray-100);
            border-radius: 10px;
            display: none;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--gray-700);
        }

        .mobile-menu-btn:hover {
            background: var(--gray-200);
            transform: scale(1.05);
        }

        .page-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .page-title h1 {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin: 0;
        }

        .page-icon {
            width: 36px;
            height: 36px;
            background: var(--primary-gradient);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
        }

        .breadcrumb-modern {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--gray-500);
            margin-top: 0.25rem;
        }

        .breadcrumb-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .breadcrumb-separator {
            opacity: 0.5;
        }

        /* Header Actions */
        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .action-btn {
            width: 40px;
            height: 40px;
            border: none;
            background: var(--gray-100);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            color: var(--gray-700);
            position: relative;
        }

        .action-btn:hover {
            background: var(--gray-200);
            transform: translateY(-2px);
            box-shadow: var(--shadow-md);
        }

        .action-btn.primary {
            background: var(--primary-gradient);
            color: white;
        }

        .action-btn.primary:hover {
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        .notification-badge {
            position: absolute;
            top: -4px;
            right: -4px;
            background: var(--danger-color);
            color: white;
            font-size: 0.7rem;
            padding: 0.15rem 0.4rem;
            border-radius: 10px;
            min-width: 18px;
            text-align: center;
            font-weight: 600;
        }

        /* User Info */
        .user-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: var(--gray-100);
        }

        .user-info:hover {
            background: var(--gray-200);
            transform: translateY(-1px);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: var(--primary-gradient);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
        }

        .user-details h6 {
            font-size: 0.9rem;
            font-weight: 600;
            margin: 0;
        }

        .user-role {
            font-size: 0.75rem;
            color: var(--gray-500);
            margin: 0;
        }

        .dropdown-arrow {
            color: var(--gray-500);
            transition: transform 0.3s ease;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            min-height: 100vh;
            background: var(--gray-50);
            width: calc(100% - 280px);
            flex: 1;
        }

        .content-wrapper {
            padding: 2rem;
            min-height: calc(100vh - 80px);
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .modern-sidebar {
                transform: translateX(-100%);
                z-index: 1050;
            }

            .modern-sidebar.show {
                transform: translateX(0);
            }

            .modern-header {
                margin-left: 0;
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .mobile-menu-btn {
                display: flex;
            }

            .header-actions {
                gap: 0.5rem;
            }

            .content-wrapper {
                padding: 1.5rem;
                min-height: calc(100vh - 70px);
            }
        }

        .mobile-menu-btn {
            display: flex;
        }

        .header-actions {
            gap: 0.5rem;
        }

        @media (max-width: 768px) {
            .modern-header {
                padding: 1rem;
            }

            .content-wrapper {
                padding: 1rem;
                min-height: calc(100vh - 60px);
            }

            .page-title h1 {
                font-size: 1.25rem;
            }

            .breadcrumb-modern {
                display: none;
            }

            .sidebar-header {
                padding: 1.5rem 1rem;
            }

            .modern-nav {
                padding: 0.5rem 0;
            }

            .nav-link {
                padding: 1rem;
                font-size: 0.9rem;
            }

            .user-avatar {
                width: 32px;
                height: 32px;
                font-size: 0.8rem;
            }
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .sidebar-overlay.show {
            opacity: 1;
            visibility: visible;
        }

        /* Animation */
        .modern-sidebar {
            animation: slideInLeft 0.3s ease-out;
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(0);
            }
        }

        /* Custom scrollbar for sidebar */
        .modern-sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .modern-sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        .modern-sidebar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 2px;
        }
    </style>

    <title><?php echo isset($pageTitle) ? $pageTitle . ' - Admin Panel' : 'Admin Panel'; ?></title>
</head>

<body>
    <div class="admin-layout">
        <!-- Modern Sidebar -->
        <div class="modern-sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo">
                    <div class="logo-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="logo-text">
                        <h3>THPT An Lạc</h3>
                        <p class="logo-subtitle">Admin Panel</p>
                    </div>
                </div>
            </div>

            <div class="modern-nav">
                <div class="nav-section">
                    <div class="nav-section-title">Dashboard</div>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="<?php echo create_url('home'); ?>"
                                class="nav-link <?php echo (isset($activeMenu) && $activeMenu === 'home') ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <span>Tổng quan</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Nội dung</div>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="<?php echo create_url('posts'); ?>"
                                class="nav-link <?php echo (isset($activeMenu) && $activeMenu === 'posts') ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <span>Bài viết</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo create_url('categories'); ?>"
                                class="nav-link <?php echo (isset($activeMenu) && $activeMenu === 'categories') ? 'active' : ''; ?>">
                                <i class="nav-icon fas fa-tags"></i>
                                <span>Danh mục & Tags</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="nav-section">
                    <div class="nav-section-title">Hệ thống</div>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="#" class="nav-link" onclick="confirmLogout()">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <span>Đăng xuất</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sidebar Overlay for mobile -->
        <div class="sidebar-overlay" id="sidebarOverlay"></div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Modern Header -->
            <div class="modern-header">
                <div class="header-content">
                    <div class="header-left">
                        <button class="mobile-menu-btn d-block d-lg-none" id="mobileMenuBtn">
                            <i class="fas fa-bars"></i>
                        </button>

                        <div class="page-title">
                            <div class="page-icon">
                                <?php
                                $pageIcons = [
                                    'Dashboard' => 'fas fa-tachometer-alt',
                                    'Bài viết' => 'fas fa-newspaper',
                                    'Danh mục' => 'fas fa-tags',
                                ];
                                $currentIcon = isset($pageIcons[$pageTitle]) ? $pageIcons[$pageTitle] : 'fas fa-file';
                                ?>
                                <i class="<?php echo $currentIcon; ?>"></i>
                            </div>
                            <div>
                                <h1><?php echo isset($pageTitle) ? $pageTitle : 'Dashboard'; ?></h1>
                                <div class="breadcrumb-modern">
                                    <span class="breadcrumb-item">
                                        <i class="fas fa-home"></i>
                                        <span>Admin</span>
                                    </span>
                                    <i class="fas fa-chevron-right breadcrumb-separator"></i>
                                    <span
                                        class="breadcrumb-item"><?php echo isset($pageTitle) ? $pageTitle : 'Dashboard'; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="header-actions">
                        <div>
                            <div class="user-info">
                                <div class="user-avatar">
                                    A
                                </div>
                                <div class="user-details">
                                    <h6>Admin</h6>
                                    <p class="user-role">Quản trị viên</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Wrapper -->
            <div class="content-wrapper">
                <!-- Content Wrapper -->
                <div class="content-wrapper">

                    <script>
                        // Mobile menu toggle
                        document.addEventListener('DOMContentLoaded', function() {
                            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
                            const sidebar = document.getElementById('sidebar');
                            const overlay = document.getElementById('sidebarOverlay');

                            if (mobileMenuBtn) {
                                mobileMenuBtn.addEventListener('click', function() {
                                    sidebar.classList.toggle('show');
                                    overlay.classList.toggle('show');
                                });
                            }

                            if (overlay) {
                                overlay.addEventListener('click', function() {
                                    sidebar.classList.remove('show');
                                    overlay.classList.remove('show');
                                });
                            }
                        });

                        // Search function
                        function showSearch() {
                            Swal.fire({
                                title: 'Tìm kiếm',
                                input: 'text',
                                inputPlaceholder: 'Nhập từ khóa tìm kiếm...',
                                showCancelButton: true,
                                confirmButtonText: '<i class="fas fa-search"></i> Tìm kiếm',
                                cancelButtonText: 'Hủy',
                                confirmButtonColor: '#667eea',
                                inputValidator: (value) => {
                                    if (!value) {
                                        return 'Vui lòng nhập từ khóa!';
                                    }
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Perform search
                                    console.log('Searching for:', result.value);
                                }
                            });
                        }

                        // Logout confirmation
                        function confirmLogout() {
                            Swal.fire({
                                title: 'Xác nhận đăng xuất',
                                text: 'Bạn có chắc chắn muốn đăng xuất?',
                                icon: 'question',
                                showCancelButton: true,
                                confirmButtonColor: '#f56565',
                                cancelButtonColor: '#6c757d',
                                confirmButtonText: '<i class="fas fa-sign-out-alt"></i> Đăng xuất',
                                cancelButtonText: 'Hủy'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = 'logout.php';
                                }
                            });
                        }
                    </script>