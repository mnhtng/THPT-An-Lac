<?php
$pageTitle = 'Chỉnh sửa bài viết';
require_once '../components/header.php';

// Get database connection
$database = new Database();
$db = $database->getConnection();

$errors = [];
$post = null;

// Get post ID from URL
$post_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!$post_id) {
    setFlashMessage('danger', 'ID bài viết không hợp lệ!');
    redirect('posts.php');
}

// Get post data
$stmt = $db->prepare("SELECT * FROM blog_posts WHERE id = ?");
$stmt->execute([$post_id]);
$post = $stmt->fetch();

if (!$post) {
    setFlashMessage('danger', 'Bài viết không tồn tại!');
    redirect('posts.php');
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = sanitize($_POST['title']);
    $slug = sanitize($_POST['slug']);
    $content = $_POST['content'];
    $excerpt = sanitize($_POST['excerpt']);
    $category = sanitize($_POST['category']);
    $tags = sanitize($_POST['tags']);
    $status = $_POST['status'];
    
    // Validation
    if (empty($title)) {
        $errors[] = 'Tiêu đề không được để trống.';
    }
    
    if (empty($slug)) {
        $errors[] = 'Slug không được để trống.';
    }
    
    if (empty($content)) {
        $errors[] = 'Nội dung không được để trống.';
    }
    
    // Check if slug already exists (excluding current post)
    $stmt = $db->prepare("SELECT id FROM blog_posts WHERE slug = ? AND id != ?");
    $stmt->execute([$slug, $post_id]);
    if ($stmt->fetch()) {
        $errors[] = 'Slug đã tồn tại, vui lòng chọn slug khác.';
    }
    
    // Handle file upload
    $featured_image = $post['featured_image']; // Keep existing image
    if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] == 0) {
        $upload_result = uploadFile($_FILES['featured_image'], '../uploads/');
        if ($upload_result) {
            // Delete old image if exists
            if ($post['featured_image'] && file_exists('../uploads/' . $post['featured_image'])) {
                unlink('../uploads/' . $post['featured_image']);
            }
            $featured_image = $upload_result;
        } else {
            $errors[] = 'Có lỗi xảy ra khi tải lên hình ảnh.';
        }
    }
    
    // If no errors, update post
    if (empty($errors)) {
        $published_at = $post['published_at'];
        if ($status == 'published' && $post['status'] != 'published') {
            $published_at = date('Y-m-d H:i:s');
        } elseif ($status != 'published') {
            $published_at = null;
        }
        
        $stmt = $db->prepare("UPDATE blog_posts SET title = ?, slug = ?, content = ?, excerpt = ?, featured_image = ?, status = ?, category = ?, tags = ?, published_at = ?, updated_at = NOW() WHERE id = ?");
        
        if ($stmt->execute([$title, $slug, $content, $excerpt, $featured_image, $status, $category, $tags, $published_at, $post_id])) {
            setFlashMessage('success', 'Bài viết đã được cập nhật thành công!');
            redirect('posts.php');
        } else {
            $errors[] = 'Có lỗi xảy ra khi cập nhật bài viết.';
        }
    }
}

// Get categories for dropdown
$stmt = $db->query("SELECT DISTINCT category FROM blog_posts WHERE category IS NOT NULL AND category != '' ORDER BY category");
$existing_categories = $stmt->fetchAll();
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-edit me-2"></i>Chỉnh sửa bài viết
    </h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="posts.php" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left me-1"></i>Quay lại
            </a>
        </div>
    </div>
</div>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger" role="alert">
        <h5><i class="fas fa-exclamation-triangle me-2"></i>Có lỗi xảy ra:</h5>
        <ul class="mb-0">
            <?php foreach ($errors as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-edit me-2"></i>Nội dung bài viết
                </h5>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề bài viết <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="title" name="title" 
                               value="<?php echo htmlspecialchars($post['title']); ?>" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug (URL) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="slug" name="slug" 
                               value="<?php echo htmlspecialchars($post['slug']); ?>" required>
                        <div class="form-text">URL thân thiện cho bài viết (ví dụ: bai-viet-moi)</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="content" class="form-label">Nội dung <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="content" name="content" rows="15" required><?php echo htmlspecialchars($post['content']); ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Tóm tắt</label>
                        <textarea class="form-control" id="excerpt" name="excerpt" rows="3"><?php echo htmlspecialchars($post['excerpt']); ?></textarea>
                        <div class="form-text">Mô tả ngắn gọn về bài viết (hiển thị trong danh sách)</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category" class="form-label">Danh mục</label>
                                <input type="text" class="form-control" id="category" name="category" 
                                       value="<?php echo htmlspecialchars($post['category']); ?>"
                                       list="categories">
                                <datalist id="categories">
                                    <?php foreach ($existing_categories as $cat): ?>
                                        <option value="<?php echo htmlspecialchars($cat['category']); ?>">
                                    <?php endforeach; ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags</label>
                                <input type="text" class="form-control" id="tags" name="tags" 
                                       value="<?php echo htmlspecialchars($post['tags']); ?>"
                                       placeholder="tag1, tag2, tag3">
                                <div class="form-text">Các tag phân cách bằng dấu phẩy</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="featured_image" class="form-label">Hình ảnh đại diện</label>
                        <?php if ($post['featured_image']): ?>
                            <div class="mb-2">
                                <img src="../uploads/<?php echo htmlspecialchars($post['featured_image']); ?>" 
                                     alt="Current image" style="max-width: 200px; max-height: 200px;" class="img-thumbnail">
                                <div class="form-text">Hình ảnh hiện tại</div>
                            </div>
                        <?php endif; ?>
                        <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*">
                        <div class="form-text">Hỗ trợ: JPG, PNG, GIF, WebP. Kích thước tối đa: 5MB</div>
                        <img id="image-preview" src="" alt="" style="max-width: 200px; max-height: 200px; display: none; margin-top: 10px;">
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="posts.php" class="btn btn-secondary me-md-2">
                            <i class="fas fa-times me-1"></i>Hủy
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Cập nhật bài viết
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-cog me-2"></i>Cài đặt
                </h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="status" class="form-label">Trạng thái</label>
                    <select class="form-select" id="status" name="status">
                        <option value="draft" <?php echo $post['status'] == 'draft' ? 'selected' : ''; ?>>Nháp</option>
                        <option value="published" <?php echo $post['status'] == 'published' ? 'selected' : ''; ?>>Xuất bản</option>
                        <option value="archived" <?php echo $post['status'] == 'archived' ? 'selected' : ''; ?>>Lưu trữ</option>
                    </select>
                </div>
                
                <div class="alert alert-info">
                    <h6><i class="fas fa-info-circle me-2"></i>Thông tin bài viết:</h6>
                    <ul class="mb-0 small">
                        <li><strong>Tác giả:</strong> <?php echo htmlspecialchars(getCurrentUser()['full_name']); ?></li>
                        <li><strong>Ngày tạo:</strong> <?php echo formatDate($post['created_at']); ?></li>
                        <li><strong>Cập nhật lần cuối:</strong> <?php echo formatDate($post['updated_at']); ?></li>
                        <?php if ($post['published_at']): ?>
                            <li><strong>Ngày xuất bản:</strong> <?php echo formatDate($post['published_at']); ?></li>
                        <?php endif; ?>
                        <li><strong>Lượt xem:</strong> <?php echo $post['view_count']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-eye me-2"></i>Xem trước
                </h5>
            </div>
            <div class="card-body">
                <div id="preview-content">
                    <h4><?php echo htmlspecialchars($post['title']); ?></h4>
                    <?php if ($post['excerpt']): ?>
                        <p class="text-muted"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-trash me-2"></i>Xóa bài viết
                </h5>
            </div>
            <div class="card-body">
                <p class="text-muted small">Hành động này không thể hoàn tác. Bài viết sẽ bị xóa vĩnh viễn.</p>
                <a href="posts.php?delete=<?php echo $post['id']; ?>" 
                   class="btn btn-danger btn-sm btn-delete w-100">
                    <i class="fas fa-trash me-1"></i>Xóa bài viết
                </a>
            </div>
        </div>
    </div>
</div>

<script>
// Preview functionality
document.getElementById('title').addEventListener('input', updatePreview);
document.getElementById('excerpt').addEventListener('input', updatePreview);

function updatePreview() {
    const title = document.getElementById('title').value;
    const excerpt = document.getElementById('excerpt').value;
    const previewDiv = document.getElementById('preview-content');
    
    if (title || excerpt) {
        let previewHTML = '';
        if (title) {
            previewHTML += `<h4>${title}</h4>`;
        }
        if (excerpt) {
            previewHTML += `<p class="text-muted">${excerpt}</p>`;
        }
        previewDiv.innerHTML = previewHTML;
    } else {
        previewDiv.innerHTML = '<p class="text-muted">Nội dung xem trước sẽ hiển thị ở đây...</p>';
    }
}
</script>

<?php require_once '../components/footer.php'; ?>