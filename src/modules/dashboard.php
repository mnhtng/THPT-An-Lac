<?php
$pageTitle = 'Dashboard';
require_once '../components/header.php';

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Get statistics
$stats = [];

// Total posts
$stmt = $db->query("SELECT COUNT(*) as total FROM blog_posts");
$stats['total_posts'] = $stmt->fetch()['total'];

// Published posts
$stmt = $db->query("SELECT COUNT(*) as total FROM blog_posts WHERE status = 'published'");
$stats['published_posts'] = $stmt->fetch()['total'];

// Draft posts
$stmt = $db->query("SELECT COUNT(*) as total FROM blog_posts WHERE status = 'draft'");
$stats['draft_posts'] = $stmt->fetch()['total'];

// Total users
$stmt = $db->query("SELECT COUNT(*) as total FROM admin_users");
$stats['total_users'] = $stmt->fetch()['total'];

// Recent posts
$stmt = $db->query("SELECT p.*, u.full_name as author_name 
                    FROM blog_posts p 
                    JOIN admin_users u ON p.author_id = u.id 
                    ORDER BY p.created_at DESC 
                    LIMIT 5");
$recent_posts = $stmt->fetchAll();

// Popular posts (by view count)
$stmt = $db->query("SELECT p.*, u.full_name as author_name 
                    FROM blog_posts p 
                    JOIN admin_users u ON p.author_id = u.id 
                    WHERE p.status = 'published' 
                    ORDER BY p.view_count DESC 
                    LIMIT 5");
$popular_posts = $stmt->fetchAll();
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="add-post.php" class="btn btn-sm btn-primary">
                <i class="fas fa-plus me-1"></i>Thêm bài viết mới
            </a>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Tổng số bài viết
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['total_posts']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Bài viết đã xuất bản
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['published_posts']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Bài viết nháp
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['draft_posts']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-edit fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Tổng số người dùng
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['total_users']; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Recent Posts -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-clock me-2"></i>Bài viết gần đây
                </h6>
                <a href="posts.php" class="btn btn-sm btn-primary">Xem tất cả</a>
            </div>
            <div class="card-body">
                <?php if (empty($recent_posts)): ?>
                    <p class="text-muted">Chưa có bài viết nào.</p>
                <?php else: ?>
                    <div class="list-group list-group-flush">
                        <?php foreach ($recent_posts as $post): ?>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1"><?php echo htmlspecialchars($post['title']); ?></h6>
                                    <small class="text-muted">
                                        <i class="fas fa-user me-1"></i><?php echo htmlspecialchars($post['author_name']); ?> • 
                                        <i class="fas fa-calendar me-1"></i><?php echo formatDate($post['created_at']); ?>
                                    </small>
                                </div>
                                <span class="badge bg-<?php echo $post['status'] == 'published' ? 'success' : ($post['status'] == 'draft' ? 'warning' : 'secondary'); ?> rounded-pill">
                                    <?php echo ucfirst($post['status']); ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Popular Posts -->
    <div class="col-lg-6 mb-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-fire me-2"></i>Bài viết phổ biến
                </h6>
                <a href="posts.php" class="btn btn-sm btn-primary">Xem tất cả</a>
            </div>
            <div class="card-body">
                <?php if (empty($popular_posts)): ?>
                    <p class="text-muted">Chưa có bài viết nào.</p>
                <?php else: ?>
                    <div class="list-group list-group-flush">
                        <?php foreach ($popular_posts as $post): ?>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1"><?php echo htmlspecialchars($post['title']); ?></h6>
                                    <small class="text-muted">
                                        <i class="fas fa-user me-1"></i><?php echo htmlspecialchars($post['author_name']); ?> • 
                                        <i class="fas fa-eye me-1"></i><?php echo $post['view_count']; ?> lượt xem
                                    </small>
                                </div>
                                <span class="badge bg-primary rounded-pill">
                                    <?php echo $post['view_count']; ?>
                                </span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    <i class="fas fa-bolt me-2"></i>Thao tác nhanh
                </h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="add-post.php" class="btn btn-primary w-100">
                            <i class="fas fa-plus-circle me-2"></i>Thêm bài viết mới
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="posts.php" class="btn btn-info w-100">
                            <i class="fas fa-list me-2"></i>Quản lý bài viết
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="categories.php" class="btn btn-success w-100">
                            <i class="fas fa-tags me-2"></i>Quản lý danh mục
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="users.php" class="btn btn-warning w-100">
                            <i class="fas fa-users me-2"></i>Quản lý người dùng
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once '../components/footer.php'; ?>