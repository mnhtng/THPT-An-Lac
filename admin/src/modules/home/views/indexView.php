<?php
$pageTitle = 'Dashboard';
$activeMenu = 'home'; // Set active menu for sidebar
include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'header.php';

// Sample data - replace with actual data from your database
$totalPosts = 25;
$publishedPosts = 18;
$draftPosts = 7;
$totalCategories = 8;
$totalTags = 15;
$todayViews = 1234;
$monthlyViews = 18500;
$totalUsers = 156;
$activeUsers = 23;

$recentPosts = [
    [
        'id' => 1,
        'title' => 'Thông báo tuyển sinh năm học 2024-2025',
        'excerpt' => 'Trường THPT An Lạc thông báo về việc tuyển sinh vào năm học mới...',
        'thumbnail' => 'assets/images/news1.jpg',
        'category' => 'Thông báo',
        'status' => 'published',
        'views' => 1250,
        'created_at' => '2024-08-20 14:30:00'
    ],
    [
        'id' => 2,
        'title' => 'Kế hoạch tổ chức hoạt động ngoại khóa tháng 9',
        'excerpt' => 'Các hoạt động ngoại khóa phong phú được tổ chức...',
        'thumbnail' => 'assets/images/news2.jpg',
        'category' => 'Hoạt động',
        'status' => 'draft',
        'views' => 0,
        'created_at' => '2024-08-19 09:15:00'
    ]
];

$recentActivities = [
    ['type' => 'post', 'action' => 'created', 'title' => 'Thông báo học phí mới', 'time' => '5 phút trước', 'color' => 'success'],
    ['type' => 'category', 'action' => 'updated', 'title' => 'Danh mục "Tin tức"', 'time' => '1 giờ trước', 'color' => 'info'],
    ['type' => 'post', 'action' => 'published', 'title' => 'Kết quả thi HSG', 'time' => '3 giờ trước', 'color' => 'primary'],
    ['type' => 'tag', 'action' => 'created', 'title' => 'Tag "Urgent"', 'time' => '1 ngày trước', 'color' => 'warning']
];
?>

<!-- Modern Dashboard Container -->
<div class="modern-dashboard">
    <!-- Hero Section -->
    <div class="dashboard-hero">
        <div class="hero-background"></div>
        <div class="hero-content">
            <div class="hero-welcome">
                <div class="welcome-text">
                    <h1 class="hero-title">
                        <span class="greeting">Chào mừng trở lại!</span>
                        <span class="welcome-message">Dashboard Quản trị</span>
                    </h1>
                    <p class="hero-subtitle">
                        <i class="fas fa-calendar-alt me-2"></i>
                        <?php echo date('l, d F Y'); ?>
                        <span class="separator">•</span>
                        <i class="fas fa-clock me-2"></i>
                        <?php echo date('H:i'); ?>
                    </p>
                </div>

                <!-- Quick Stats Overview -->
                <div class="stats-overview">
                    <div class="overview-item">
                        <div class="overview-value"><?php echo $totalPosts; ?></div>
                        <div class="overview-label">Bài viết</div>
                    </div>
                    <div class="overview-item">
                        <div class="overview-value"><?php echo number_format($todayViews); ?></div>
                        <div class="overview-label">Lượt xem hôm nay</div>
                    </div>
                    <div class="overview-item">
                        <div class="overview-value"><?php echo $totalCategories; ?></div>
                        <div class="overview-label">Danh mục</div>
                    </div>
                </div>
            </div>

            <!-- Weather Widget (Optional) -->
            <div class="weather-widget">
                <div class="weather-icon">
                    <i class="fas fa-sun"></i>
                </div>
                <div class="weather-info">
                    <div class="temperature">28°C</div>
                    <div class="location">Hồ Chí Minh</div>
                </div>
            </div>
        </div>

        <!-- Floating Action Buttons -->
        <div class="floating-actions">
            <a href="<?php echo create_url('posts/index/create') ?>" class="fab primary"
                data-tooltip="Tạo bài viết mới">
                <i class="fas fa-plus"></i>
            </a>
            <a href="<?php echo create_url('categories') ?>" class="fab secondary" data-tooltip="Quản lý danh mục">
                <i class="fas fa-tags"></i>
            </a>
        </div>
    </div>

    <!-- Main Dashboard Content -->
    <div class="dashboard-content">
        <!-- Metrics Grid -->
        <div class="metrics-section">
            <div class="section-header">
                <h2 class="section-title">
                    <i class="fas fa-chart-line me-2"></i>
                    Tổng quan hệ thống
                </h2>
                <div class="time-filter">
                    <button class="filter-btn active" data-period="today">Hôm nay</button>
                    <button class="filter-btn" data-period="week">7 ngày</button>
                    <button class="filter-btn" data-period="month">30 ngày</button>
                </div>
            </div>

            <div class="metrics-grid">
                <!-- Total Posts Metric -->
                <div class="metric-card posts">
                    <div class="metric-header">
                        <div class="metric-icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="metric-trend up">
                            <i class="fas fa-arrow-up"></i>
                            <span>12%</span>
                        </div>
                    </div>
                    <div class="metric-body">
                        <div class="metric-value"><?php echo $totalPosts; ?></div>
                        <div class="metric-label">Tổng bài viết</div>
                        <div class="metric-progress">
                            <div class="progress-bar" style="width: 75%"></div>
                        </div>
                        <div class="metric-details">
                            <span class="published"><?php echo $publishedPosts; ?> đã xuất bản</span>
                            <span class="draft"><?php echo $draftPosts; ?> bản nháp</span>
                        </div>
                    </div>
                </div>

                <!-- Views Metric -->
                <div class="metric-card views">
                    <div class="metric-header">
                        <div class="metric-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="metric-trend up">
                            <i class="fas fa-arrow-up"></i>
                            <span>28%</span>
                        </div>
                    </div>
                    <div class="metric-body">
                        <div class="metric-value"><?php echo number_format($monthlyViews); ?></div>
                        <div class="metric-label">Lượt xem tháng này</div>
                        <div class="metric-progress">
                            <div class="progress-bar" style="width: 85%"></div>
                        </div>
                        <div class="metric-details">
                            <span class="today"><?php echo number_format($todayViews); ?> hôm nay</span>
                            <span class="avg">Avg: 617/ngày</span>
                        </div>
                    </div>
                </div>

                <!-- Categories Metric -->
                <div class="metric-card categories">
                    <div class="metric-header">
                        <div class="metric-icon">
                            <i class="fas fa-layer-group"></i>
                        </div>
                        <div class="metric-trend stable">
                            <i class="fas fa-minus"></i>
                            <span>0%</span>
                        </div>
                    </div>
                    <div class="metric-body">
                        <div class="metric-value"><?php echo $totalCategories; ?></div>
                        <div class="metric-label">Danh mục & Tags</div>
                        <div class="metric-progress">
                            <div class="progress-bar" style="width: 60%"></div>
                        </div>
                        <div class="metric-details">
                            <span class="categories"><?php echo $totalCategories; ?> danh mục</span>
                            <span class="tags"><?php echo $totalTags; ?> tags</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="content-grid">
            <!-- Recent Posts -->
            <div class="content-panel recent-posts">
                <div class="panel-header">
                    <div class="panel-title">
                        <i class="fas fa-newspaper me-2"></i>
                        Bài viết gần đây
                    </div>
                    <div class="panel-actions">
                        <button class="panel-action" onclick="refreshPosts()">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                        <a href="<?php echo create_url('posts') ?>" class="panel-action">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>

                <div class="panel-content">
                    <?php if (empty($recentPosts)): ?>
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                            <h4>Chưa có bài viết nào</h4>
                            <p>Hãy tạo bài viết đầu tiên để bắt đầu</p>
                            <button class="btn-primary" onclick="createNewPost()">
                                <i class="fas fa-plus me-2"></i>
                                Tạo bài viết đầu tiên
                            </button>
                        </div>
                    <?php else: ?>
                        <div class="posts-list">
                            <?php foreach ($recentPosts as $post): ?>
                                <div class="post-item" onclick="viewPost(<?php echo $post['id']; ?>)">
                                    <div class="post-thumbnail">
                                        <img src="src/assets/images/about/thpt-an-lac.png"
                                            alt="<?php echo htmlspecialchars($post['title']); ?>">
                                        <div class="post-status <?php echo $post['status']; ?>">
                                            <?php if ($post['status'] === 'published'): ?>
                                                <i class="fas fa-check-circle"></i>
                                            <?php else: ?>
                                                <i class="fas fa-edit"></i>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="post-content">
                                        <div class="post-meta">
                                            <span class="post-category"><?php echo $post['category']; ?></span>
                                            <span
                                                class="post-date"><?php echo date('d/m/Y', strtotime($post['created_at'])); ?></span>
                                        </div>

                                        <h4 class="post-title"><?php echo htmlspecialchars($post['title']); ?></h4>
                                        <p class="post-excerpt">
                                            <?php echo htmlspecialchars(substr($post['excerpt'], 0, 80)) . '...'; ?></p>

                                        <div class="post-stats">
                                            <div class="stat-item">
                                                <i class="fas fa-eye"></i>
                                                <span><?php echo number_format($post['views']); ?></span>
                                            </div>
                                            <div class="post-actions">
                                                <button class="action-btn edit" onclick="editPost(<?php echo $post['id']; ?>)">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button class="action-btn delete"
                                                    onclick="deletePost(<?php echo $post['id']; ?>)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="panel-footer">
                            <a href="<?php echo create_url('posts') ?>" class="view-all-btn">
                                Xem tất cả bài viết
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Analytics Chart -->
            <div class="content-panel analytics-chart">
                <div class="panel-header">
                    <div class="panel-title">
                        <i class="fas fa-chart-bar me-2"></i>
                        Thống kê hoạt động
                    </div>
                    <div class="chart-controls">
                        <select class="chart-select" id="chartPeriod">
                            <option value="7days">7 ngày qua</option>
                            <option value="30days">30 ngày qua</option>
                            <option value="3months">3 tháng qua</option>
                        </select>
                    </div>
                </div>

                <div class="panel-content">
                    <div class="chart-container">
                        <canvas id="trafficChart"></canvas>
                    </div>

                    <div class="chart-legend">
                        <div class="legend-item">
                            <div class="legend-color primary"></div>
                            <span>Hoạt động giáo dục</span>
                        </div>
                        <div class="legend-item">
                            <div class="legend-color secondary"></div>
                            <span>Thông báo</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'footer.php'; ?>

<style>
    /* Modern Dashboard Styles */
    .modern-dashboard {
        padding: 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        overflow-x: hidden;
    }

    /* Hero Section */
    .dashboard-hero {
        position: relative;
        padding: 3rem 2rem;
        color: white;
        overflow: hidden;
    }

    .hero-background {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background:
            radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.08) 0%, transparent 50%),
            radial-gradient(circle at 40% 80%, rgba(255, 255, 255, 0.06) 0%, transparent 50%);
        animation: heroFloat 20s ease-in-out infinite;
    }

    @keyframes heroFloat {

        0%,
        100% {
            transform: translate(0, 0) rotate(0deg);
        }

        33% {
            transform: translate(30px, -30px) rotate(1deg);
        }

        66% {
            transform: translate(-20px, 20px) rotate(-1deg);
        }
    }

    .hero-content {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 1fr auto;
        gap: 3rem;
        align-items: center;
        position: relative;
        z-index: 1;
    }

    .hero-welcome .greeting {
        display: block;
        font-size: 1.2rem;
        opacity: 0.9;
        margin-bottom: 0.5rem;
    }

    .hero-welcome .welcome-message {
        display: block;
        font-size: 2.5rem;
        font-weight: 700;
        line-height: 1.2;
    }

    .hero-subtitle {
        font-size: 1rem;
        opacity: 0.8;
        margin: 1rem 0 2rem 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .separator {
        opacity: 0.5;
    }

    .stats-overview {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 2rem;
        margin-top: 2rem;
    }

    .overview-item {
        text-align: center;
    }

    .overview-value {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .overview-label {
        font-size: 0.9rem;
        opacity: 0.8;
    }

    .weather-widget {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 2rem;
        text-align: center;
        min-width: 150px;
    }

    .weather-icon i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #ffd700;
    }

    .temperature {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .location {
        opacity: 0.8;
    }

    /* Floating Action Buttons */
    .floating-actions {
        position: fixed;
        top: 50%;
        right: 2rem;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 1rem;
        z-index: 1000;
    }

    .fab {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
    }

    .fab:hover {
        transform: scale(1.1);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
    }

    .fab.primary {
        background: linear-gradient(135deg, #6eef96 0%, #38a169 100%);
        color: white;
    }

    .fab.secondary {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        color: white;
    }

    .notification-badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background: #ff4757;
        color: white;
        font-size: 0.7rem;
        padding: 0.2rem 0.4rem;
        border-radius: 10px;
        min-width: 18px;
        text-align: center;
    }

    .fab[data-tooltip]:hover::before {
        content: attr(data-tooltip);
        position: absolute;
        right: 70px;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.8);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        white-space: nowrap;
        font-size: 0.8rem;
        font-weight: 400;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Arial, sans-serif;
        line-height: 1.4;
        letter-spacing: normal;
        z-index: 1001;
    }

    /* Dashboard Content */
    .dashboard-content {
        background: #f8f9fa;
        min-height: calc(100vh - 300px);
    }

    /* Metrics Section */
    .metrics-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 2rem 2rem 2rem;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .section-title {
        font-size: 1.8rem;
        font-weight: 700;
        color: #2d3748;
        margin: 0;
    }

    .time-filter {
        display: flex;
        background: white;
        border-radius: 12px;
        padding: 0.5rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .filter-btn {
        background: transparent;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #718096;
    }

    .filter-btn.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .metrics-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    .metric-card {
        background: white;
        border-radius: 20px;
        padding: 2rem;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .metric-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .metric-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, var(--metric-color), var(--metric-color-light));
    }

    .metric-card.posts {
        --metric-color: #667eea;
        --metric-color-light: #8b9aef;
    }

    .metric-card.views {
        --metric-color: #fa709a;
        --metric-color-light: #fb8bb1;
    }

    .metric-card.categories {
        --metric-color: #43e97b;
        --metric-color-light: #6eef96;
    }

    .metric-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
    }

    .metric-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        background: linear-gradient(135deg, var(--metric-color), var(--metric-color-light));
        color: white;
    }

    .metric-trend {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        font-size: 0.9rem;
        font-weight: 600;
        padding: 0.5rem 0.75rem;
        border-radius: 10px;
    }

    .metric-trend.up {
        background: #d4edda;
        color: #155724;
    }

    .metric-trend.down {
        background: #f8d7da;
        color: #721c24;
    }

    .metric-trend.stable {
        background: #fff3cd;
        color: #856404;
    }

    .metric-value {
        font-size: 3rem;
        font-weight: 700;
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .metric-label {
        font-size: 1.1rem;
        color: #718096;
        margin-bottom: 1rem;
    }

    .metric-progress {
        height: 6px;
        background: #e2e8f0;
        border-radius: 3px;
        overflow: hidden;
        margin-bottom: 1rem;
    }

    .progress-bar {
        height: 100%;
        background: linear-gradient(90deg, var(--metric-color), var(--metric-color-light));
        border-radius: 3px;
        transition: width 1s ease;
    }

    .metric-details {
        display: flex;
        justify-content: space-between;
        font-size: 0.9rem;
        color: #718096;
    }

    /* Content Grid */
    .content-grid {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem 3rem 2rem;
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 1.5rem;
    }

    .content-panel {
        background: white;
        border-radius: 20px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .content-panel:hover {
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
    }

    .recent-posts {
        grid-column: span 12;
    }

    .analytics-chart {
        grid-column: span 12;
    }

    .panel-header {
        padding: 1.5rem 2rem;
        border-bottom: 1px solid #e9ecef;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f8f9fa;
    }

    .panel-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2d3748;
        display: flex;
        align-items: center;
    }

    .panel-actions {
        display: flex;
        gap: 0.5rem;
    }

    .panel-action {
        width: 36px;
        height: 36px;
        border: none;
        border-radius: 8px;
        background: transparent;
        color: #718096;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .panel-action:hover {
        background: #e2e8f0;
        color: #2d3748;
    }

    .panel-content {
        padding: 2rem;
    }

    .panel-footer {
        padding: 1rem 2rem;
        border-top: 1px solid #e9ecef;
        background: #f8f9fa;
        text-align: center;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
    }

    .empty-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #e2e8f0, #cbd5e0);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: #718096;
        margin: 0 auto 1.5rem auto;
    }

    .empty-state h4 {
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: #718096;
        margin-bottom: 2rem;
    }

    /* Posts List */
    .posts-list {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .post-item {
        display: flex;
        gap: 1rem;
        padding: 1rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .post-item:hover {
        background: #f8f9fa;
    }

    .post-thumbnail {
        position: relative;
        flex-shrink: 0;
    }

    .post-thumbnail img {
        width: 80px;
        height: 60px;
        border-radius: 8px;
        object-fit: cover;
    }

    .post-status {
        position: absolute;
        top: -8px;
        right: -8px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
    }

    .post-status.published {
        background: #48bb78;
        color: white;
    }

    .post-status.draft {
        background: #ed8936;
        color: white;
    }

    .post-content {
        flex: 1;
        min-width: 0;
    }

    .post-meta {
        display: flex;
        gap: 1rem;
        margin-bottom: 0.5rem;
        font-size: 0.8rem;
    }

    .post-category {
        background: #e2e8f0;
        color: #4a5568;
        padding: 0.25rem 0.5rem;
        border-radius: 6px;
        font-weight: 500;
    }

    .post-date {
        color: #718096;
    }

    .post-title {
        font-size: 1rem;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }

    .post-excerpt {
        font-size: 0.9rem;
        color: #718096;
        line-height: 1.5;
        margin-bottom: 1rem;
    }

    .post-stats {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .stat-item {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        font-size: 0.8rem;
        color: #718096;
    }

    .post-actions {
        display: flex;
        gap: 0.25rem;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .post-item:hover .post-actions {
        opacity: 1;
    }

    .action-btn {
        width: 30px;
        height: 30px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        transition: all 0.3s ease;
    }

    .action-btn.edit {
        background: #bee3f8;
        color: #2b6cb0;
    }

    .action-btn.delete {
        background: #fed7d7;
        color: #c53030;
    }

    .action-btn:hover {
        transform: scale(1.1);
    }

    /* Chart */
    .chart-container {
        position: relative;
        height: 300px;
        margin-bottom: 1rem;
    }

    .chart-controls {
        display: flex;
        gap: 1rem;
    }

    .chart-select {
        padding: 0.5rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        background: white;
        cursor: pointer;
    }

    .chart-legend {
        display: flex;
        gap: 2rem;
        justify-content: center;
    }

    .legend-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
    }

    .legend-color {
        width: 12px;
        height: 12px;
        border-radius: 2px;
    }

    .legend-color.primary {
        background: #667eea;
    }

    .legend-color.secondary {
        background: #4facfe;
    }

    /* Activity Timeline - Removed */

    /* Quick Actions Grid - Removed */

    /* System Status - Removed */

    /* Buttons */
    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        color: white;
        text-decoration: none;
    }

    .view-all-btn {
        background: #f7fafc;
        color: #4a5568;
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: 10px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        text-decoration: none;
    }

    .view-all-btn:hover {
        background: #edf2f7;
        color: #2d3748;
        text-decoration: none;
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .content-grid {
            grid-template-columns: repeat(8, 1fr);
        }

        .recent-posts,
        .analytics-chart {
            grid-column: span 8;
        }
    }

    @media (max-width: 768px) {
        .hero-content {
            grid-template-columns: 1fr;
            text-align: center;
            gap: 2rem;
        }

        .stats-overview {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .metrics-grid {
            grid-template-columns: 1fr;
        }

        .content-grid {
            grid-template-columns: 1fr;
            padding: 0 1rem 2rem 1rem;
        }

        .content-panel {
            grid-column: span 1 !important;
        }

        .section-header {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }

        .time-filter {
            justify-content: center;
        }

        .floating-actions {
            position: static;
            flex-direction: row;
            justify-content: center;
            margin: 2rem 0;
            transform: none;
        }
    }

    /* Animation for page load */
    .modern-dashboard {
        animation: dashboardLoad 0.8s ease-out;
    }

    @keyframes dashboardLoad {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Metric cards stagger animation */
    .metric-card {
        animation: metricSlide 0.6s ease-out backwards;
    }

    .metric-card:nth-child(1) {
        animation-delay: 0.1s;
    }

    .metric-card:nth-child(2) {
        animation-delay: 0.2s;
    }

    .metric-card:nth-child(3) {
        animation-delay: 0.3s;
    }

    .metric-card:nth-child(4) {
        animation-delay: 0.4s;
    }

    @keyframes metricSlide {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Content panels stagger */
    .content-panel {
        animation: panelFade 0.8s ease-out backwards;
    }

    .recent-posts {
        animation-delay: 0.1s;
    }

    .analytics-chart {
        animation-delay: 0.2s;
    }

    @keyframes panelFade {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Initialize Dashboard
    document.addEventListener('DOMContentLoaded', function() {
        initializeChart();
        initializeAnimations();
        initializeInteractions();
    });

    // Chart Initialization
    function initializeChart() {
        const ctx = document.getElementById('trafficChart');
        if (!ctx) return;

        const gradient1 = ctx.getContext('2d').createLinearGradient(0, 0, 0, 400);
        gradient1.addColorStop(0, 'rgba(102, 126, 234, 0.3)');
        gradient1.addColorStop(1, 'rgba(102, 126, 234, 0.05)');

        const gradient2 = ctx.getContext('2d').createLinearGradient(0, 0, 0, 400);
        gradient2.addColorStop(0, 'rgba(79, 172, 254, 0.3)');
        gradient2.addColorStop(1, 'rgba(79, 172, 254, 0.05)');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'CN'],
                datasets: [{
                        label: 'Hoạt động giáo dục',
                        data: [2, 1, 3, 2, 1, 2, 1],
                        backgroundColor: gradient1,
                        borderColor: '#667eea',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#667eea',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 3,
                        pointRadius: 6
                    },
                    {
                        label: 'Thông báo',
                        data: [1, 1, 2, 2, 1, 1, 0],
                        backgroundColor: gradient2,
                        borderColor: '#4facfe',
                        borderWidth: 3,
                        fill: true,
                        tension: 0.4,
                        pointBackgroundColor: '#4facfe',
                        pointBorderColor: '#ffffff',
                        pointBorderWidth: 3,
                        pointRadius: 6
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0,0,0,0.05)',
                            drawBorder: false
                        },
                        ticks: {
                            color: '#718096',
                            font: {
                                size: 12
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#718096',
                            font: {
                                size: 12
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            }
        });
    }

    // Animation and Interaction Setup
    function initializeAnimations() {
        // Progress bars animation
        const progressBars = document.querySelectorAll('.progress-bar');
        const observerOptions = {
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const width = entry.target.style.width;
                    entry.target.style.width = '0%';
                    setTimeout(() => {
                        entry.target.style.width = width;
                    }, 100);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        progressBars.forEach(bar => observer.observe(bar));
    }

    function initializeInteractions() {
        // Time filter functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');

                // Update metrics based on period
                const period = this.dataset.period;
                updateMetrics(period);
            });
        });

        // FAB interactions
        document.querySelectorAll('.fab').forEach(fab => {
            fab.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
    }

    function updateMetrics(period) {
        // Simulate metric updates based on time period
        const metrics = {
            today: {
                posts: 25,
                views: 1234,
                categories: 8
            },
            week: {
                posts: 28,
                views: 8650,
                categories: 8
            },
            month: {
                posts: 35,
                views: 18500,
                categories: 9
            }
        };

        const data = metrics[period] || metrics.today;

        // Animate value changes
        animateValue('.posts .metric-value', parseInt(document.querySelector('.posts .metric-value').textContent), data
            .posts, 1000);
        animateValue('.views .metric-value', parseInt(document.querySelector('.views .metric-value').textContent.replace(
            /,/g, '')), data.views, 1000);
        animateValue('.categories .metric-value', parseInt(document.querySelector('.categories .metric-value').textContent),
            data.categories, 1000);
    }

    function animateValue(selector, start, end, duration) {
        const element = document.querySelector(selector);
        const range = end - start;
        const startTime = Date.now();

        function updateValue() {
            const elapsed = Date.now() - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const current = Math.floor(start + (range * progress));

            element.textContent = selector.includes('views') ? current.toLocaleString() : current;

            if (progress < 1) {
                requestAnimationFrame(updateValue);
            }
        }

        requestAnimationFrame(updateValue);
    }

    // Interactive Functions
    function createNewPost() {
        const fab = document.querySelector('.fab.primary');
        if (!fab) return;

        const originalIcon = fab.innerHTML;
        fab.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';

        setTimeout(() => {
            fab.innerHTML = originalIcon;
            window.location.href = '<?php echo create_url("posts/index/create"); ?>';
        }, 1000);
    }

    function refreshPosts() {
        const btn = event.target.closest('.panel-action');
        btn.style.transform = 'rotate(360deg)';

        setTimeout(() => {
            btn.style.transform = '';
            // Simulate refresh
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    icon: 'success',
                    title: 'Đã làm mới!',
                    timer: 1500,
                    showConfirmButton: false
                });
            }
        }, 500);
    }

    function viewPost(id) {
        window.location.href = `<?php echo create_url("posts/index/edit"); ?>/${id}`;
    }

    function editPost(id) {
        event.stopPropagation();
        window.location.href = `<?php echo create_url("posts/index/edit"); ?>/${id}`;
    }

    function deletePost(id) {
        event.stopPropagation();
        if (typeof Swal !== 'undefined') {
            Swal.fire({
                title: 'Xác nhận xóa?',
                text: 'Bạn có chắc chắn muốn xóa bài viết này?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#f56565',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Đã xóa!',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });
        }
    }

    // Auto-refresh stats every 30 seconds
    setInterval(() => {
        const elements = document.querySelectorAll('.overview-value');
        elements.forEach(el => {
            const current = parseInt(el.textContent.replace(/,/g, ''));
            const change = Math.floor(Math.random() * 3) - 1; // Smaller changes
            const newValue = Math.max(0, current + change);
            el.textContent = newValue.toLocaleString();
        });
    }, 30000);
</script>

</body>

</html>