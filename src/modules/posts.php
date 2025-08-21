<?php
$pageTitle = 'Quản lý bài viết';
require_once '../components/header.php';

// Get database connection
$database = new Database();
$db = $database->getConnection();

// Handle delete action
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $post_id = $_GET['delete'];
    $stmt = $db->prepare("DELETE FROM blog_posts WHERE id = ?");
    if ($stmt->execute([$post_id])) {
        setFlashMessage('success', 'Bài viết đã được xóa thành công!');
    } else {
        setFlashMessage('danger', 'Có lỗi xảy ra khi xóa bài viết!');
    }
    redirect('posts.php');
}

// Handle status change
if (isset($_GET['status']) && isset($_GET['id']) && is_numeric($_GET['id'])) {
    $post_id = $_GET['id'];
    $status = $_GET['status'];
    
    if (in_array($status, ['draft', 'published', 'archived'])) {
        $stmt = $db->prepare("UPDATE blog_posts SET status = ?, updated_at = NOW() WHERE id = ?");
        if ($stmt->execute([$status, $post_id])) {
            setFlashMessage('success', 'Trạng thái bài viết đã được cập nhật!');
        } else {
            setFlashMessage('danger', 'Có lỗi xảy ra khi cập nhật trạng thái!');
        }
    }
    redirect('posts.php');
}

// Pagination
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

// Search and filter
$search = isset($_GET['search']) ? sanitize($_GET['search']) : '';
$status_filter = isset($_GET['status_filter']) ? $_GET['status_filter'] : '';
$category_filter = isset($_GET['category_filter']) ? $_GET['category_filter'] : '';

// Build query
$where_conditions = [];
$params = [];

if (!empty($search)) {
    $where_conditions[] = "(p.title LIKE ? OR p.content LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
}

if (!empty($status_filter)) {
    $where_conditions[] = "p.status = ?";
    $params[] = $status_filter;
}

if (!empty($category_filter)) {
    $where_conditions[] = "p.category = ?";
    $params[] = $category_filter;
}

$where_clause = !empty($where_conditions) ? 'WHERE ' . implode(' AND ', $where_conditions) : '';

// Get total count
$count_query = "SELECT COUNT(*) as total FROM blog_posts p $where_clause";
$stmt = $db->prepare($count_query);
$stmt->execute($params);
$total_posts = $stmt->fetch()['total'];
$total_pages = ceil($total_posts / $limit);

// Get posts
$query = "SELECT p.*, u.full_name as author_name 
          FROM blog_posts p 
          JOIN admin_users u ON p.author_id = u.id 
          $where_clause 
          ORDER BY p.created_at DESC 
          LIMIT $limit OFFSET $offset";

$stmt = $db->prepare($query);
$stmt->execute($params);
$posts = $stmt->fetchAll();

// Get categories for filter
$stmt = $db->query("SELECT DISTINCT category FROM blog_posts WHERE category IS NOT NULL AND category != '' ORDER BY category");
$categories = $stmt->fetchAll();
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-newspaper me-2"></i>Quản lý bài viết
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="add-post.php" class="btn btn-sm btn-primary">
                <i class="fas fa-plus me-1"></i>Thêm bài viết mới
            </a>
        </div>
    </div>
</div>

<!-- Search and Filter -->
<div class="card mb-4">
    <div class="card-body">
        <form method="GET" action="" class="row g-3">
            <div class="col-md-4">
                <label for="search" class="form-label">Tìm kiếm</label>
                <input type="text" class="form-control" id="search" name="search" 
                       value="<?php echo htmlspecialchars($search); ?>" placeholder="Tìm theo tiêu đề hoặc nội dung...">
            </div>
            <div class="col-md-2">
                <label for="status_filter" class="form-label">Trạng thái</label>
                <select class="form-select" id="status_filter" name="status_filter">
                    <option value="">Tất cả</option>
                    <option value="draft" <?php echo $status_filter == 'draft' ? 'selected' : ''; ?>>Nháp</option>
                    <option value="published" <?php echo $status_filter == 'published' ? 'selected' : ''; ?>>Đã xuất bản</option>
                    <option value="archived" <?php echo $status_filter == 'archived' ? 'selected' : ''; ?>>Đã lưu trữ</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="category_filter" class="form-label">Danh mục</label>
                <select class="form-select" id="category_filter" name="category_filter">
                    <option value="">Tất cả</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?php echo htmlspecialchars($cat['category']); ?>" 
                                <?php echo $category_filter == $cat['category'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($cat['category']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">&nbsp;</label>
                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search me-1"></i>Tìm kiếm
                    </button>
                    <a href="posts.php" class="btn btn-secondary">
                        <i class="fas fa-times me-1"></i>Xóa bộ lọc
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Posts Table -->
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            <i class="fas fa-list me-2"></i>Danh sách bài viết 
            <span class="badge bg-primary ms-2"><?php echo $total_posts; ?> bài viết</span>
        </h5>
    </div>
    <div class="card-body">
        <?php if (empty($posts)): ?>
            <div class="text-center py-5">
                <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Không có bài viết nào</h5>
                <p class="text-muted">Hãy tạo bài viết đầu tiên của bạn!</p>
                <a href="add-post.php" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i>Thêm bài viết mới
                </a>
            </div>
        <?php else: ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tiêu đề</th>
                            <th>Tác giả</th>
                            <th>Danh mục</th>
                            <th>Trạng thái</th>
                            <th>Lượt xem</th>
                            <th>Ngày tạo</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($posts as $post): ?>
                            <tr>
                                <td>
                                    <div>
                                        <strong><?php echo htmlspecialchars($post['title']); ?></strong>
                                        <?php if ($post['featured_image']): ?>
                                            <i class="fas fa-image text-info ms-1" title="Có hình ảnh"></i>
                                        <?php endif; ?>
                                    </div>
                                    <small class="text-muted"><?php echo htmlspecialchars($post['slug']); ?></small>
                                </td>
                                <td><?php echo htmlspecialchars($post['author_name']); ?></td>
                                <td>
                                    <span class="badge bg-secondary"><?php echo htmlspecialchars($post['category']); ?></span>
                                </td>
                                <td>
                                    <span class="badge bg-<?php echo $post['status'] == 'published' ? 'success' : ($post['status'] == 'draft' ? 'warning' : 'secondary'); ?>">
                                        <?php echo ucfirst($post['status']); ?>
                                    </span>
                                </td>
                                <td>
                                    <i class="fas fa-eye me-1"></i><?php echo $post['view_count']; ?>
                                </td>
                                <td><?php echo formatDate($post['created_at']); ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="edit-post.php?id=<?php echo $post['id']; ?>" 
                                           class="btn btn-sm btn-outline-primary" title="Chỉnh sửa">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        
                                        <!-- Status dropdown -->
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle" 
                                                    data-bs-toggle="dropdown" title="Thay đổi trạng thái">
                                                <i class="fas fa-toggle-on"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="?status=draft&id=<?php echo $post['id']; ?>">
                                                    <i class="fas fa-edit me-2"></i>Chuyển thành nháp
                                                </a></li>
                                                <li><a class="dropdown-item" href="?status=published&id=<?php echo $post['id']; ?>">
                                                    <i class="fas fa-check me-2"></i>Xuất bản
                                                </a></li>
                                                <li><a class="dropdown-item" href="?status=archived&id=<?php echo $post['id']; ?>">
                                                    <i class="fas fa-archive me-2"></i>Lưu trữ
                                                </a></li>
                                            </ul>
                                        </div>
                                        
                                        <a href="?delete=<?php echo $post['id']; ?>" 
                                           class="btn btn-sm btn-outline-danger btn-delete" title="Xóa">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
                <div class="d-flex justify-content-center mt-4">
                    <?php echo generatePagination($total_pages, $page, 'posts.php' . (!empty($_GET) ? '?' . http_build_query(array_diff_key($_GET, ['page' => ''])) : '')); ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>

<?php require_once '../components/footer.php'; ?>