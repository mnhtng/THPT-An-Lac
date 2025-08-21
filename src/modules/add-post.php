<?php
$pageTitle = 'Thêm bài viết mới';
require_once '../components/header.php';

// Get database connection
$database = new Database();
$db = $database->getConnection();

$errors = [];
$success = false;

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
    
    // Check if slug already exists
    $stmt = $db->prepare("SELECT id FROM blog_posts WHERE slug = ?");
    $stmt->execute([$slug]);
    if ($stmt->fetch()) {
        $errors[] = 'Slug đã tồn tại, vui lòng chọn slug khác.';
    }
    
    // Handle file upload
    $featured_image = '';
    if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] == 0) {
        $upload_result = uploadFile($_FILES['featured_image'], '../uploads/');
        if ($upload_result) {
            $featured_image = $upload_result;
        } else {
            $errors[] = 'Có lỗi xảy ra khi tải lên hình ảnh.';
        }
    }
    
    // If no errors, insert post
    if (empty($errors)) {
        $current_user = getCurrentUser();
        $published_at = ($status == 'published') ? date('Y-m-d H:i:s') : null;
        
        $stmt = $db->prepare("INSERT INTO blog_posts (title, slug, content, excerpt, featured_image, author_id, status, category, tags, published_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        if ($stmt->execute([$title, $slug, $content, $excerpt, $featured_image, $current_user['id'], $status, $category, $tags, $published_at])) {
            setFlashMessage('success', 'Bài viết đã được tạo thành công!');
            redirect('posts.php');
        } else {
            $errors[] = 'Có lỗi xảy ra khi tạo bài viết.';
        }
    }
}

// Get categories for dropdown
$stmt = $db->query("SELECT DISTINCT category FROM blog_posts WHERE category IS NOT NULL AND category != '' ORDER BY category");
$existing_categories = $stmt->fetchAll();
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">
        <i class="fas fa-plus-circle me-2"></i>Thêm bài viết mới
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
                               value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : ''; ?>" 
                               required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug (URL) <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="slug" name="slug" 
                               value="<?php echo isset($_POST['slug']) ? htmlspecialchars($_POST['slug']) : ''; ?>" 
                               required>
                        <div class="form-text">URL thân thiện cho bài viết (ví dụ: bai-viet-moi)</div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="content" class="form-label">Nội dung <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="content" name="content" rows="15" required><?php echo isset($_POST['content']) ? htmlspecialchars($_POST['content']) : ''; ?></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Tóm tắt</label>
                        <textarea class="form-control" id="excerpt" name="excerpt" rows="3"><?php echo isset($_POST['excerpt']) ? htmlspecialchars($_POST['excerpt']) : ''; ?></textarea>
                        <div class="form-text">Mô tả ngắn gọn về bài viết (hiển thị trong danh sách)</div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="category" class="form-label">Danh mục</label>
                                <input type="text" class="form-control" id="category" name="category" 
                                       value="<?php echo isset($_POST['category']) ? htmlspecialchars($_POST['category']) : ''; ?>"
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
                                       value="<?php echo isset($_POST['tags']) ? htmlspecialchars($_POST['tags']) : ''; ?>"
                                       placeholder="tag1, tag2, tag3">
                                <div class="form-text">Các tag phân cách bằng dấu phẩy</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="featured_image" class="form-label">Hình ảnh đại diện</label>
                        <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*">
                        <div class="form-text">Hỗ trợ: JPG, PNG, GIF, WebP. Kích thước tối đa: 5MB</div>
                        <img id="image-preview" src="" alt="" style="max-width: 200px; max-height: 200px; display: none; margin-top: 10px;">
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="posts.php" class="btn btn-secondary me-md-2">
                            <i class="fas fa-times me-1"></i>Hủy
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Lưu bài viết
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
                        <option value="draft" <?php echo (isset($_POST['status']) && $_POST['status'] == 'draft') ? 'selected' : ''; ?>>Nháp</option>
                        <option value="published" <?php echo (isset($_POST['status']) && $_POST['status'] == 'published') ? 'selected' : ''; ?>>Xuất bản</option>
                    </select>
                </div>
                
                <div class="alert alert-info">
                    <h6><i class="fas fa-info-circle me-2"></i>Hướng dẫn:</h6>
                    <ul class="mb-0 small">
                        <li>Tiêu đề nên ngắn gọn và hấp dẫn</li>
                        <li>Slug sẽ được tự động tạo từ tiêu đề</li>
                        <li>Sử dụng trình soạn thảo để định dạng nội dung</li>
                        <li>Chọn trạng thái "Nháp" để lưu và chỉnh sửa sau</li>
                        <li>Chọn "Xuất bản" để hiển thị bài viết công khai</li>
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
                    <p class="text-muted">Nội dung xem trước sẽ hiển thị ở đây...</p>
                </div>
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