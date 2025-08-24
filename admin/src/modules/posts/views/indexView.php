<?php
$pageTitle = 'Quản lý Bài viết';
$activeMenu = 'posts'; // Set active menu for sidebar
include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'header.php';

// Get data from controller
$posts = isset($data['posts']) ? $data['posts'] : [];
$stats = isset($data['stats']) ? $data['stats'] : ['published' => 0, 'draft' => 0, 'pending' => 0, 'total_views' => 0];
$categories = isset($data['categories']) ? $data['categories'] : [];
$search = isset($data['search']) ? $data['search'] : '';
$status_filter = isset($data['status_filter']) ? $data['status_filter'] : '';
$category_filter = isset($data['category_filter']) ? $data['category_filter'] : '';
$sort = isset($data['sort']) ? $data['sort'] : 'created_at_desc';
$pagination = isset($data['pagination']) ? $data['pagination'] : ['current_page' => 1, 'total_pages' => 1, 'total_posts' => 0, 'per_page' => 10];

// Extract pagination variables for easier access
$currentPage = $pagination['current_page'];
$totalPages = $pagination['total_pages'];
$totalPosts = $pagination['total_posts'];
$perPage = isset($pagination['per_page']) ? $pagination['per_page'] : 10;
?>

<style>
:root {
    --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    --danger-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    --dark-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    --light-bg: #f8fafc;
    --border-color: #e2e8f0;
    --shadow-sm: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.modern-page-header {
    background: var(--primary-gradient);
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 2rem;
    color: white;
    position: relative;
    overflow: hidden;
}

.modern-page-header::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='m36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E") repeat;
    opacity: 0.1;
    z-index: 1;
}

.modern-page-header .content {
    position: relative;
    z-index: 2;
}

.modern-page-header h1 {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.modern-page-header p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 0;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1.5rem;
    margin-bottom: 2rem;
}

.stat-card {
    background: white;
    border-radius: 16px;
    padding: 1.5rem;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-color);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: var(--primary-gradient);
}

.stat-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
}

.stat-card .icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: white;
    margin-bottom: 1rem;
}

.stat-card .value {
    font-size: 2rem;
    font-weight: 700;
    color: #1a202c;
    margin-bottom: 0.25rem;
}

.stat-card .label {
    color: #64748b;
    font-size: 0.875rem;
    font-weight: 500;
}

.modern-search-card {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--border-color);
    margin-bottom: 2rem;
}

.modern-search-header {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid var(--light-bg);
}

.modern-search-header h6 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #1a202c;
}

.modern-form-group {
    margin-bottom: 1.5rem;
}

.modern-form-group label {
    display: block;
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
    font-size: 0.875rem;
}

.modern-input {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 2px solid var(--border-color);
    border-radius: 12px;
    font-size: 0.875rem;
    transition: all 0.3s ease;
    background: white;
}

.modern-input:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
}

.modern-input-group {
    position: relative;
}

.modern-input-group .input-icon {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    color: #9ca3af;
    z-index: 2;
}

.modern-input-group .modern-input {
    padding-left: 3rem;
}

.modern-btn {
    padding: 0.75rem 1.5rem;
    border-radius: 12px;
    font-weight: 600;
    font-size: 0.875rem;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
}

.modern-btn:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-md);
}

.modern-btn-primary {
    background: var(--primary-gradient);
    color: white;
}

.modern-btn-success {
    background: var(--success-gradient);
    color: white;
}

.modern-btn-warning {
    background: var(--warning-gradient);
    color: white;
}

.modern-btn-danger {
    background: var(--danger-gradient);
    color: white;
}

.modern-btn-outline {
    background: white;
    color: #6b7280;
    border: 2px solid var(--border-color);
}

.modern-btn-outline:hover {
    background: var(--light-bg);
    color: #374151;
}

.filter-badges {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-top: 1rem;
    padding-top: 1rem;
    border-top: 1px solid var(--border-color);
}

.filter-badge {
    background: var(--primary-gradient);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.filter-badge .remove {
    cursor: pointer;
    opacity: 0.8;
    transition: opacity 0.2s;
}

.filter-badge .remove:hover {
    opacity: 1;
}

.modern-posts-container {
    background: white;
    border-radius: 20px;
    box-shadow: var(--shadow-md);
    border: 1px solid var(--border-color);
    overflow: hidden;
}

.modern-posts-header {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    padding: 1.5rem 2rem;
    border-bottom: 1px solid var(--border-color);
    display: flex;
    align-items: center;
    justify-content: between;
    gap: 1rem;
}

.modern-posts-header h6 {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 600;
    color: #1a202c;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.modern-view-controls {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-left: auto;
}

.modern-sort-select {
    padding: 0.5rem 1rem;
    border: 2px solid var(--border-color);
    border-radius: 8px;
    font-size: 0.875rem;
    background: white;
    min-width: 150px;
}

.modern-posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
    gap: 1.5rem;
    padding: 2rem;
}

.modern-post-card {
    background: white;
    border: 2px solid var(--border-color);
    border-radius: 16px;
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
}

.modern-post-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    border-color: #667eea;
}

.modern-post-card .post-image {
    width: 100%;
    height: 200px;
    overflow: hidden;
    position: relative;
}

.modern-post-card .post-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.modern-post-card:hover .post-image img {
    transform: scale(1.05);
}

.modern-post-card .post-status {
    position: absolute;
    top: 12px;
    right: 12px;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    color: white;
    z-index: 2;
}

.status-published {
    background: var(--success-gradient);
}

.status-draft {
    background: var(--warning-gradient);
}

.status-pending {
    background: var(--danger-gradient);
}

.modern-post-card .post-content {
    padding: 1.5rem;
}

.modern-post-card .post-title {
    font-size: 1.1rem;
    font-weight: 600;
    color: #1a202c;
    line-height: 1.4;
    margin-bottom: 0.75rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.modern-post-card .post-excerpt {
    color: #6b7280;
    font-size: 0.875rem;
    line-height: 1.5;
    margin-bottom: 1rem;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.modern-post-card .post-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1rem;
    font-size: 0.75rem;
    color: #9ca3af;
}

.modern-post-card .post-meta .meta-item {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.modern-post-card .post-actions {
    display: flex;
    gap: 0.5rem;
    padding-top: 1rem;
    border-top: 1px solid var(--border-color);
}

.modern-post-card .action-btn {
    flex: 1;
    padding: 0.5rem;
    border: none;
    border-radius: 8px;
    font-size: 0.875rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    text-decoration: none;
}

.action-btn-primary {
    background: var(--primary-gradient);
    color: white;
}

.action-btn-secondary {
    background: var(--light-bg);
    color: #6b7280;
}

.action-btn-danger {
    background: var(--danger-gradient);
    color: white;
}

.action-btn:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-sm);
}

.modern-post-card .post-checkbox {
    position: absolute;
    top: 12px;
    left: 12px;
    width: 20px;
    height: 20px;
    border-radius: 4px;
    z-index: 2;
}

.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: #6b7280;
}

.empty-state .icon {
    width: 80px;
    height: 80px;
    background: var(--light-bg);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: #9ca3af;
    font-size: 2rem;
}

.empty-state h5 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: #374151;
}

.empty-state p {
    font-size: 1rem;
    margin-bottom: 2rem;
}

/* List View Styles */
.modern-posts-list {
    padding: 0;
}

.modern-list-item {
    background: white;
    border: 1px solid var(--border-color);
    border-radius: 12px;
    padding: 1.5rem;
    margin-bottom: 1rem;
    transition: all 0.3s ease;
    display: flex;
    gap: 1.5rem;
    align-items: flex-start;
    position: relative;
}

.modern-list-item:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-md);
    border-color: #667eea;
}

.modern-list-item .list-checkbox {
    position: absolute;
    top: 1rem;
    left: 1rem;
    width: 18px;
    height: 18px;
    z-index: 2;
}

.modern-list-item .list-image {
    width: 120px;
    height: 80px;
    border-radius: 8px;
    overflow: hidden;
    flex-shrink: 0;
    margin-left: 2rem;
}

.modern-list-item .list-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.modern-list-item .list-content {
    flex: 1;
    min-width: 0;
}

.modern-list-item .list-title {
    font-size: 1.125rem;
    font-weight: 600;
    color: #1a202c;
    margin-bottom: 0.5rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.modern-list-item .list-excerpt {
    color: #6b7280;
    font-size: 0.875rem;
    line-height: 1.5;
    margin-bottom: 1rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.modern-list-item .list-meta {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    font-size: 0.75rem;
    color: #9ca3af;
    margin-bottom: 1rem;
    flex-wrap: wrap;
}

.modern-list-item .list-meta .meta-item {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.modern-list-item .list-status {
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 600;
    color: white;
    margin-bottom: 1rem;
    display: inline-block;
}

.modern-list-item .list-actions {
    display: flex;
    gap: 0.5rem;
    margin-top: auto;
}

.modern-list-item .list-action-btn {
    padding: 0.5rem 1rem;
    border: none;
    border-radius: 8px;
    font-size: 0.75rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    gap: 0.25rem;
    text-decoration: none;
}

.modern-list-item .list-actions .list-action-btn:hover {
    transform: translateY(-1px);
    box-shadow: var(--shadow-sm);
}

/* Pagination Styles */
.modern-pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    padding: 1.5rem 0;
}

.modern-pagination .page-btn {
    padding: 0.75rem 1rem;
    border: 2px solid var(--border-color);
    border-radius: 8px;
    background: white;
    color: #6b7280;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.2s;
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 44px;
}

.modern-pagination .page-btn:hover {
    border-color: #667eea;
    color: #667eea;
    transform: translateY(-1px);
}

.modern-pagination .page-btn.active {
    background: var(--primary-gradient);
    border-color: transparent;
    color: white;
}

.modern-pagination .page-btn.disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.modern-pagination .page-btn.disabled:hover {
    transform: none;
    border-color: var(--border-color);
    color: #6b7280;
}

.pagination-info {
    text-align: center;
    color: #6b7280;
    font-size: 0.875rem;
    margin-top: 3rem;
}

/* Enhanced Pagination Styles */
.pagination-info-detailed {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--border-color);
}

.pagination-details {
    color: var(--text-secondary);
    font-size: 0.9rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.pagination-summary {
    background: var(--primary-gradient);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 8px;
    font-size: 0.85rem;
    font-weight: 500;
}

.modern-pagination .prev-btn,
.modern-pagination .next-btn {
    padding: 0.75rem 1.5rem;
    gap: 0.5rem;
    min-width: auto;
}

.modern-pagination .page-btn.ellipsis {
    border: none;
    background: transparent;
    cursor: default;
}

.modern-pagination .page-btn.ellipsis:hover {
    border: none;
    background: transparent;
    transform: none;
}

.pagination-jump {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 1rem;
}

.pagination-jump .input-group {
    max-width: 240px;
}

.pagination-jump .input-group-text {
    background: var(--bg-light);
    border-color: var(--border-color);
    font-size: 0.85rem;
    font-weight: 500;
    color: var(--text-secondary);
}

.pagination-jump .form-control {
    border-color: var(--border-color);
    text-align: center;
    font-weight: 600;
}

.pagination-jump .form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
}

.pagination-jump .btn {
    background: var(--primary-gradient);
    border: none;
    color: white;
    font-weight: 500;
    transition: all 0.3s ease;
}

.pagination-jump .btn:hover {
    background: linear-gradient(135deg, #5a67d8, #667eea, #764ba2);
    transform: translateY(-1px);
}

/* Responsive Design */
@media (max-width: 768px) {
    .pagination-info-detailed {
        flex-direction: column;
        gap: 1rem;
        text-align: center;
    }

    .modern-pagination {
        gap: 0.25rem;
        flex-wrap: wrap;
    }

    .modern-pagination .page-btn {
        min-width: 40px;
        padding: 0.5rem 0.75rem;
        font-size: 0.85rem;
    }

    .modern-pagination .d-none.d-sm-inline {
        display: none !important;
    }

    .pagination-jump {
        margin-top: 1.5rem;
    }
}

@media (max-width: 576px) {
    .modern-pagination .page-btn {
        min-width: 36px;
        height: 36px;
        font-size: 0.8rem;
        padding: 0.25rem 0.5rem;
    }

    .pagination-jump .input-group {
        max-width: 200px;
    }
}

@media (max-width: 768px) {
    .modern-page-header {
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .modern-page-header h1 {
        font-size: 1.5rem;
    }

    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .stat-card {
        padding: 1rem;
    }

    .modern-search-card {
        padding: 1.5rem;
    }

    .modern-posts-grid {
        grid-template-columns: 1fr;
        padding: 1rem;
        gap: 1rem;
    }

    .modern-posts-header {
        flex-direction: column;
        align-items: stretch;
        gap: 1rem;
    }

    .modern-view-controls {
        margin-left: 0;
        justify-content: space-between;
    }
}
</style>

<!-- Modern Page Header -->
<div class="modern-page-header">
    <div class="content">
        <h1>
            <i class="fas fa-newspaper"></i>
            Quản lý Bài viết
        </h1>
        <p>Tạo và quản lý nội dung giáo dục cho trang web trường THPT An Lạc</p>
    </div>
</div>

<!-- Statistics Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="icon" style="background: var(--success-gradient);">
            <i class="fas fa-check-circle"></i>
        </div>
        <div class="value"><?php echo $stats['published']; ?></div>
        <div class="label">Đã xuất bản</div>
    </div>
    <div class="stat-card">
        <div class="icon" style="background: var(--warning-gradient);">
            <i class="fas fa-edit"></i>
        </div>
        <div class="value"><?php echo $stats['draft']; ?></div>
        <div class="label">Bản nháp</div>
    </div>
    <div class="stat-card">
        <div class="icon" style="background: var(--danger-gradient);">
            <i class="fas fa-clock"></i>
        </div>
        <div class="value"><?php echo $stats['pending']; ?></div>
        <div class="label">Chờ duyệt</div>
    </div>
    <div class="stat-card">
        <div class="icon" style="background: var(--primary-gradient);">
            <i class="fas fa-eye"></i>
        </div>
        <div class="value"><?php echo number_format($stats['total_views']); ?></div>
        <div class="label">Tổng lượt xem</div>
    </div>
</div>

<!-- Modern Search and Filter -->
<div class="modern-search-card">
    <div class="modern-search-header">
        <i class="fas fa-search" style="color: #667eea;"></i>
        <h6>Tìm kiếm và lọc bài viết</h6>
        <div class="ms-auto">
            <a href="<?php echo create_url('posts/index/create') ?>" class="modern-btn modern-btn-primary">
                <i class="fas fa-plus"></i>
                Thêm bài viết mới
            </a>
        </div>
    </div>

    <form method="GET">
        <div class="row g-4">
            <!-- Search Input -->
            <div class="col-md-6">
                <div class="modern-form-group">
                    <label for="search">Tìm kiếm theo tiêu đề hoặc nội dung</label>
                    <div class="modern-input-group">
                        <i class="fas fa-search input-icon"></i>
                        <input type="text" class="modern-input" id="search" name="search"
                            placeholder="Nhập từ khóa tìm kiếm..." value="<?php echo htmlspecialchars($search); ?>">
                    </div>
                </div>
            </div>

            <!-- Status Filter -->
            <div class="col-md-3">
                <div class="modern-form-group">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="modern-input">
                        <option value="">Tất cả trạng thái</option>
                        <option value="published" <?php echo ($status_filter === 'published') ? 'selected' : ''; ?>>
                            Đã xuất bản
                        </option>
                        <option value="draft" <?php echo ($status_filter === 'draft') ? 'selected' : ''; ?>>
                            Bản nháp
                        </option>
                        <option value="pending" <?php echo ($status_filter === 'pending') ? 'selected' : ''; ?>>
                            Chờ duyệt
                        </option>
                    </select>
                </div>
            </div>

            <!-- Category Filter -->
            <div class="col-md-3">
                <div class="modern-form-group">
                    <label for="category">Danh mục</label>
                    <select name="category" id="category" class="modern-input">
                        <option value="">Tất cả danh mục</option>
                        <?php foreach ($categories as $cat_id => $cat_name): ?>
                        <option value="<?php echo $cat_id; ?>"
                            <?php echo ($category_filter == $cat_id) ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($cat_name); ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="modern-btn modern-btn-primary">
                <i class="fas fa-search"></i>
                Tìm kiếm
            </button>
            <a href="?" class="modern-btn modern-btn-outline">
                <i class="fas fa-times"></i>
                Xóa bộ lọc
            </a>
        </div>

        <!-- Active Filters -->
        <?php if (!empty($search) || !empty($status_filter) || !empty($category_filter)): ?>
        <div class="filter-badges">
            <small style="color: #6b7280; margin-right: 0.5rem;">Bộ lọc hiện tại:</small>
            <?php if (!empty($search)): ?>
            <div class="filter-badge">
                <i class="fas fa-search"></i>
                "<?php echo htmlspecialchars($search); ?>"
                <span class="remove" onclick="removeFilter('search')">×</span>
            </div>
            <?php endif; ?>
            <?php if (!empty($status_filter)): ?>
            <div class="filter-badge">
                <i class="fas fa-tag"></i>
                <?php echo ucfirst($status_filter); ?>
                <span class="remove" onclick="removeFilter('status')">×</span>
            </div>
            <?php endif; ?>
            <?php if (!empty($category_filter)): ?>
            <div class="filter-badge">
                <i class="fas fa-folder"></i>
                Danh mục <?php echo $category_filter; ?>
                <span class="remove" onclick="removeFilter('category')">×</span>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </form>
</div>

<!-- Modern Bulk Actions -->
<div class="d-none modern-bulk-actions" id="bulkActions">
    <div class="modern-search-card" style="margin-bottom: 1rem; padding: 1.5rem;">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center gap-2">
                    <i class="fas fa-check-circle" style="color: #667eea;"></i>
                    <strong id="bulkCount">0</strong> bài viết được chọn
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="button" class="modern-btn modern-btn-success" onclick="bulkAction('publish')">
                    <i class="fas fa-check"></i>
                    Xuất bản
                </button>
                <button type="button" class="modern-btn modern-btn-warning" onclick="bulkAction('draft')">
                    <i class="fas fa-edit"></i>
                    Chuyển nháp
                </button>
                <button type="button" class="modern-btn modern-btn-danger" onclick="bulkAction('delete')">
                    <i class="fas fa-trash"></i>
                    Xóa
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modern Posts List -->
<div class="modern-posts-container">
    <div class="modern-posts-header">
        <h6>
            <i class="fas fa-newspaper"></i>
            Danh sách bài viết
        </h6>
        <div class="modern-view-controls">
            <select class="modern-sort-select" onchange="changeSortOrder(this.value)">
                <option value="created_at_desc" <?php echo ($sort === 'created_at_desc') ? 'selected' : ''; ?>>Mới nhất
                    trước</option>
                <option value="created_at_asc" <?php echo ($sort === 'created_at_asc') ? 'selected' : ''; ?>>Cũ nhất
                    trước</option>
                <option value="title_asc" <?php echo ($sort === 'title_asc') ? 'selected' : ''; ?>>Tiêu đề A-Z</option>
                <option value="title_desc" <?php echo ($sort === 'title_desc') ? 'selected' : ''; ?>>Tiêu đề Z-A
                </option>
                <option value="views_desc" <?php echo ($sort === 'views_desc') ? 'selected' : ''; ?>>Nhiều lượt xem nhất
                </option>
            </select>
        </div>
    </div>

    <div class="modern-posts-content posts-container">
        <?php if (empty($posts)): ?>
        <div class="empty-state">
            <div class="icon">
                <i class="fas fa-newspaper"></i>
            </div>
            <h5>Chưa có bài viết nào</h5>
            <p>Hãy tạo bài viết đầu tiên để bắt đầu chia sẻ nội dung giáo dục</p>
            <a href="<?php echo create_url('posts/index/create') ?>" class="modern-btn modern-btn-primary">
                <i class="fas fa-plus"></i>
                Tạo bài viết đầu tiên
            </a>
        </div>
        <?php else: ?>
        <!-- Grid View -->
        <div id="gridView" class="modern-posts-grid">
            <?php foreach ($posts as $post): ?>
            <div class="modern-post-card">
                <input class="post-checkbox form-check-input" type="checkbox" value="<?php echo $post['id']; ?>">

                <div class="post-image">
                    <?php if (!empty($post['featured_image'])): ?>
                    <img src="src/assets/images/about/thpt-an-lac.png"
                        alt="<?php echo htmlspecialchars($post['title']); ?>" loading="lazy">
                    <?php else: ?>
                    <div
                        style="width: 100%; height: 200px; background: var(--light-bg); display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-image" style="font-size: 2rem; color: #9ca3af;"></i>
                    </div>
                    <?php endif; ?>

                    <div class="post-status status-<?php echo $post['status']; ?>">
                        <?php
                                switch ($post['status']) {
                                    case 'published':
                                        echo 'Đã xuất bản';
                                        break;
                                    case 'draft':
                                        echo 'Bản nháp';
                                        break;
                                    case 'pending':
                                        echo 'Chờ duyệt';
                                        break;
                                    default:
                                        echo ucfirst($post['status']);
                                }
                                ?>
                    </div>
                </div>

                <div class="post-content">
                    <h5 class="post-title"><?php echo htmlspecialchars($post['title']); ?></h5>
                    <p class="post-excerpt"><?php echo htmlspecialchars($post['excerpt']); ?></p>

                    <div class="post-meta">
                        <div class="meta-item">
                            <i class="fas fa-folder"></i>
                            <span><?php echo htmlspecialchars($post['category_name']); ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-user"></i>
                            <span><?php echo htmlspecialchars($post['author_name']); ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-eye"></i>
                            <span><?php echo number_format($post['views']); ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar"></i>
                            <span><?php echo date('d/m/Y', strtotime($post['created_at'])); ?></span>
                        </div>
                    </div>

                    <div class="post-actions">
                        <a href="<?php echo create_url('posts/index/edit?id=' . $post['id']); ?>"
                            class="action-btn action-btn-primary">
                            <i class="fas fa-edit"></i>
                            Sửa
                        </a>
                        <a href="<?php echo create_url('posts/index/view?id=' . $post['id']); ?>"
                            class="action-btn action-btn-secondary">
                            <i class="fas fa-eye"></i>
                            Xem
                        </a>
                        <button type="button" class="action-btn action-btn-danger"
                            onclick="deletePost(<?php echo $post['id']; ?>)">
                            <i class="fas fa-trash"></i>
                            Xóa
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- List View -->
        <div id="listView" class="modern-posts-list" style="display: none;">
            <?php foreach ($posts as $post): ?>
            <div class="modern-list-item">
                <input class="post-checkbox list-checkbox form-check-input" type="checkbox"
                    value="<?php echo $post['id']; ?>">

                <div class="list-image">
                    <?php if (!empty($post['featured_image']) && $post['featured_image'] !== 'https://via.placeholder.com/300x200'): ?>
                    <img src="src/assets/images/about/thpt-an-lac.png"
                        alt="<?php echo htmlspecialchars($post['title']); ?>" loading="lazy">
                    <?php else: ?>
                    <div
                        style="width: 100%; height: 100%; background: var(--light-bg); display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-image" style="color: #9ca3af;"></i>
                    </div>
                    <?php endif; ?>
                </div>

                <div class="list-content">
                    <h5 class="list-title"><?php echo htmlspecialchars($post['title']); ?></h5>
                    <p class="list-excerpt"><?php echo htmlspecialchars($post['excerpt']); ?></p>

                    <div class="list-status status-<?php echo $post['status']; ?>">
                        <?php
                                switch ($post['status']) {
                                    case 'published':
                                        echo 'Đã xuất bản';
                                        break;
                                    case 'draft':
                                        echo 'Bản nháp';
                                        break;
                                    case 'pending':
                                        echo 'Chờ duyệt';
                                        break;
                                    default:
                                        echo ucfirst($post['status']);
                                }
                                ?>
                    </div>

                    <div class="list-meta">
                        <div class="meta-item">
                            <i class="fas fa-folder"></i>
                            <span><?php echo htmlspecialchars($post['category_name']); ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-user"></i>
                            <span><?php echo htmlspecialchars($post['author_name']); ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-eye"></i>
                            <span><?php echo number_format($post['views']); ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-calendar"></i>
                            <span><?php echo date('d/m/Y H:i', strtotime($post['created_at'])); ?></span>
                        </div>
                    </div>

                    <div class="list-actions">
                        <a href="<?php echo create_url('posts/index/edit?id=' . $post['id']); ?>"
                            class="list-action-btn action-btn-primary">
                            <i class="fas fa-edit"></i>
                            Sửa
                        </a>
                        <a href="<?php echo create_url('posts/index/view?id=' . $post['id']); ?>"
                            class="list-action-btn action-btn-secondary">
                            <i class="fas fa-eye"></i>
                            Xem
                        </a>
                        <button type="button" class="list-action-btn action-btn-danger"
                            onclick="deletePost(<?php echo $post['id']; ?>)">
                            <i class="fas fa-trash"></i>
                            Xóa
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Pagination -->
<div class="pagination-info">
    <div class="pagination-details" style="justify-content: center; margin: 0 auto;">
        <i class="fas fa-info-circle"></i>
        Hiển thị <strong><?php echo (($currentPage - 1) * $perPage + 1); ?></strong> -
        <strong><?php echo min($currentPage * $perPage, $totalPosts); ?></strong>
        trong tổng số <strong><?php echo number_format($totalPosts); ?></strong> bài viết
    </div>
</div>

<?php if ($totalPages >= 1): ?>
<div class="modern-pagination">
    <!-- First Page -->
    <?php if ($currentPage > 3): ?>
    <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => 1])); ?>" class="page-btn" title="Trang đầu">
        <i class="fas fa-angle-double-left"></i>
    </a>
    <?php endif; ?>

    <!-- Previous Page -->
    <?php if ($currentPage > 1): ?>
    <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $currentPage - 1])); ?>"
        class="page-btn prev-btn" title="Trang trước">
        <i class="fas fa-chevron-left"></i>
        <span class="d-none d-sm-inline">Trước</span>
    </a>
    <?php else: ?>
    <span class="page-btn disabled">
        <i class="fas fa-chevron-left"></i>
        <span class="d-none d-sm-inline">Trước</span>
    </span>
    <?php endif; ?>

    <!-- Page Numbers -->
    <?php
        $start_page = max(1, $currentPage - 2);
        $end_page = min($totalPages, $currentPage + 2);

        // Show first page and ellipsis if needed
        if ($start_page > 1): ?>
    <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => 1])); ?>" class="page-btn">1</a>
    <?php if ($start_page > 2): ?>
    <span class="page-btn disabled ellipsis">
        <i class="fas fa-ellipsis-h"></i>
    </span>
    <?php endif; ?>
    <?php endif; ?>

    <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
    <?php if ($i == $currentPage): ?>
    <span class="page-btn active" title="Trang hiện tại">
        <?php echo $i; ?>
    </span>
    <?php else: ?>
    <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $i])); ?>" class="page-btn"
        title="Trang <?php echo $i; ?>">
        <?php echo $i; ?>
    </a>
    <?php endif; ?>
    <?php endfor; ?>

    <!-- Show last page and ellipsis if needed -->
    <?php if ($end_page < $totalPages): ?>
    <?php if ($end_page < $totalPages - 1): ?>
    <span class="page-btn disabled ellipsis">
        <i class="fas fa-ellipsis-h"></i>
    </span>
    <?php endif; ?>
    <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $totalPages])); ?>" class="page-btn"
        title="Trang cuối">
        <?php echo $totalPages; ?>
    </a>
    <?php endif; ?>

    <!-- Next Page -->
    <?php if ($currentPage < $totalPages): ?>
    <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $currentPage + 1])); ?>"
        class="page-btn next-btn" title="Trang sau">
        <span class="d-none d-sm-inline">Sau</span>
        <i class="fas fa-chevron-right"></i>
    </a>
    <?php else: ?>
    <span class="page-btn disabled">
        <span class="d-none d-sm-inline">Sau</span>
        <i class="fas fa-chevron-right"></i>
    </span>
    <?php endif; ?>

    <!-- Last Page -->
    <?php if ($currentPage < $totalPages - 2): ?>
    <a href="?<?php echo http_build_query(array_merge($_GET, ['page' => $totalPages])); ?>" class="page-btn"
        title="Trang cuối">
        <i class="fas fa-angle-double-right"></i>
    </a>
    <?php endif; ?>
</div>

<!-- Quick Jump -->
<div class="pagination-jump">
    <div class="input-group input-group-sm">
        <span class="input-group-text">Đến trang:</span>
        <input type="number" class="form-control" id="jumpPage" min="1" max="<?php echo $totalPages; ?>"
            value="<?php echo $currentPage; ?>" style="width: 70px;">
        <button class="btn btn-outline-secondary" onclick="jumpToPage()">
            <i class="fas fa-arrow-right"></i>
        </button>
    </div>
</div>
<?php endif; ?>
</div>

<script>
// Modern JavaScript functions for posts management
function changeSortOrder(order) {
    const currentUrl = new URL(window.location.href);
    currentUrl.searchParams.set('sort', order);
    window.location.href = currentUrl.toString();
}

function deletePost(postId) {
    Swal.fire({
        title: 'Xác nhận xóa',
        text: 'Bạn có chắc chắn muốn xóa bài viết này?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#f56565',
        cancelButtonColor: '#6c757d',
        confirmButtonText: '<i class="fas fa-trash"></i> Xóa',
        cancelButtonText: 'Hủy',
        background: '#fff',
        customClass: {
            popup: 'swal2-popup-modern'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // AJAX call to delete post
            fetch(`delete_post.php?id=${postId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Đã xóa!',
                            text: 'Bài viết đã được xóa thành công.',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Lỗi!',
                            text: 'Có lỗi xảy ra khi xóa bài viết.',
                            icon: 'error'
                        });
                    }
                });
        }
    });
}

function bulkAction(action) {
    const checkedBoxes = document.querySelectorAll('.post-checkbox:checked');
    const postIds = Array.from(checkedBoxes).map(checkbox => checkbox.value);

    if (postIds.length === 0) {
        Swal.fire({
            title: 'Thông báo',
            text: 'Vui lòng chọn ít nhất một bài viết',
            icon: 'info'
        });
        return;
    }

    let title, text, confirmButton;

    switch (action) {
        case 'publish':
            title = 'Xuất bản bài viết';
            text = `Xuất bản ${postIds.length} bài viết đã chọn?`;
            confirmButton = '<i class="fas fa-check"></i> Xuất bản';
            break;
        case 'draft':
            title = 'Chuyển thành nháp';
            text = `Chuyển ${postIds.length} bài viết thành nháp?`;
            confirmButton = '<i class="fas fa-edit"></i> Chuyển nháp';
            break;
        case 'delete':
            title = 'Xóa bài viết';
            text = `Xóa ${postIds.length} bài viết đã chọn? Hành động này không thể hoàn tác.`;
            confirmButton = '<i class="fas fa-trash"></i> Xóa';
            break;
    }

    Swal.fire({
        title: title,
        text: text,
        icon: action === 'delete' ? 'warning' : 'question',
        showCancelButton: true,
        confirmButtonColor: action === 'delete' ? '#f56565' : '#667eea',
        cancelButtonColor: '#6c757d',
        confirmButtonText: confirmButton,
        cancelButtonText: 'Hủy'
    }).then((result) => {
        if (result.isConfirmed) {
            // AJAX call for bulk action
            fetch(`bulk_action.php`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        action: action,
                        post_ids: postIds
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            title: 'Thành công!',
                            text: data.message,
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire({
                            title: 'Lỗi!',
                            text: data.message,
                            icon: 'error'
                        });
                    }
                });
        }
    });
}

function removeFilter(filterName) {
    const currentUrl = new URL(window.location.href);
    currentUrl.searchParams.delete(filterName);
    window.location.href = currentUrl.toString();
}

// Checkbox handling
document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckbox = document.getElementById('selectAll');
    const postCheckboxes = document.querySelectorAll('.post-checkbox');
    const bulkActions = document.querySelector('.modern-bulk-actions');

    if (selectAllCheckbox) {
        selectAllCheckbox.addEventListener('change', function() {
            postCheckboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateBulkActions();
        });
    }

    postCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', updateBulkActions);
    });

    function updateBulkActions() {
        const checkedBoxes = document.querySelectorAll('.post-checkbox:checked');
        const bulkCount = document.getElementById('bulkCount');

        if (checkedBoxes.length > 0) {
            bulkActions.classList.remove('d-none');
            bulkCount.textContent = checkedBoxes.length;
        } else {
            bulkActions.classList.add('d-none');
        }
    }
});

// Additional CSS for SweetAlert2
document.head.insertAdjacentHTML('beforeend', `
<style>
.swal2-popup-modern {
    border-radius: 20px !important;
    padding: 2rem !important;
}

.swal2-popup-modern .swal2-title {
    font-weight: 600 !important;
    color: #1a202c !important;
}

.swal2-popup-modern .swal2-confirm {
    border-radius: 12px !important;
    padding: 0.75rem 1.5rem !important;
    font-weight: 600 !important;
    background: var(--primary-gradient) !important;
    border: none !important;
}

.swal2-popup-modern .swal2-cancel {
    border-radius: 12px !important;
    padding: 0.75rem 1.5rem !important;
    font-weight: 600 !important;
}

/* Pagination Enhancement */
@keyframes fadeInUp {
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

<script>
    // Pagination JavaScript Functions
    function jumpToPage() {
        const pageInput = document.getElementById('jumpPage');
        const page = parseInt(pageInput.value);
        const totalPages = <?php echo $totalPages; ?>;
        
        if (page >= 1 && page <= totalPages) {
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set('page', page);
            window.location.href = window.location.pathname + '?' + urlParams.toString();
        } else {
            Swal.fire({
                title: 'Lỗi!',
                text: 'Vui lòng nhập số trang từ 1 đến ' + totalPages,
                icon: 'error',
                confirmButtonText: 'Đóng',
                customClass: {
                    popup: 'swal2-popup-modern'
                }
            });
        }
    }

    // Initialize pagination functionality
    document.addEventListener('DOMContentLoaded', function() {
        const jumpInput = document.getElementById('jumpPage');
        if (jumpInput) {
            // Handle Enter key press
            jumpInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    jumpToPage();
                }
            });
            
            // Only allow numbers
            jumpInput.addEventListener('input', function(e) {
                this.value = this.value.replace(/[^0-9]/g, '');
                if (this.value.length > 0) {
                    const page = parseInt(this.value);
                    const totalPages = <?php echo $totalPages; ?>;
                    if (page > totalPages) {
                        this.value = totalPages.toString();
                    }
                }
            });
            
            // Set current page as placeholder
            jumpInput.placeholder = '<?php echo $currentPage; ?>';
        }
    });
</script>

<!-- DEBUG: File được load thành công -->
<script>
console.log('IndexView pagination loaded successfully');
</script>

<?php include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'footer.php'; ?>