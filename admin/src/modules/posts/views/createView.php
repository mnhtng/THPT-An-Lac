<?php
$pageTitle = 'Tạo bài viết mới';
$activeMenu = 'posts'; // Set active menu for sidebar
include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'header.php';
?>

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --secondary-gradient: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        --success-gradient: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        --warning-gradient: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        --danger-gradient: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
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
        margin-bottom: 1rem;
    }

    .modern-breadcrumb {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.875rem;
        opacity: 0.8;
        margin-bottom: 0.5rem;
    }

    .modern-breadcrumb a {
        color: white;
        text-decoration: none;
        transition: opacity 0.2s;
    }

    .modern-breadcrumb a:hover {
        opacity: 1;
    }

    .header-actions {
        display: flex;
        gap: 1rem;
        margin-top: 1rem;
    }

    .modern-card {
        background: white;
        border-radius: 20px;
        box-shadow: var(--shadow-md);
        border: 1px solid var(--border-color);
        margin-bottom: 2rem;
        overflow: hidden;
    }

    .modern-card-header {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        padding: 1.5rem 2rem;
        border-bottom: 1px solid var(--border-color);
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .modern-card-header h6 {
        margin: 0;
        font-size: 1.1rem;
        font-weight: 600;
        color: #1a202c;
    }

    .modern-card-body {
        padding: 2rem;
    }

    .modern-form-group {
        margin-bottom: 2rem;
    }

    .modern-form-group label {
        display: block;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.75rem;
        font-size: 0.9rem;
    }

    .modern-input,
    .modern-textarea,
    .modern-select {
        width: 100%;
        padding: 1rem 1.25rem;
        border: 2px solid var(--border-color);
        border-radius: 12px;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background: white;
        line-height: 1.5;
    }

    .modern-input:focus,
    .modern-textarea:focus,
    .modern-select:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .modern-textarea {
        min-height: 150px;
        resize: vertical;
        font-family: inherit;
    }

    .post-type-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .post-type-card {
        background: white;
        border: 2px solid var(--border-color);
        border-radius: 16px;
        padding: 2rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        position: relative;
    }

    .post-type-card:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-lg);
        border-color: #667eea;
    }

    .post-type-card.selected {
        border-color: #667eea;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
    }

    .post-type-card input[type="radio"] {
        position: absolute;
        top: 1rem;
        right: 1rem;
        width: 20px;
        height: 20px;
    }

    .post-type-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        font-size: 1.5rem;
        color: white;
    }

    .post-type-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #1a202c;
        margin-bottom: 0.5rem;
    }

    .post-type-desc {
        color: #6b7280;
        font-size: 0.875rem;
        line-height: 1.5;
    }

    .modern-file-upload {
        border: 2px dashed var(--border-color);
        border-radius: 12px;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        background: var(--light-bg);
    }

    .modern-file-upload:hover {
        border-color: #667eea;
        background: rgba(102, 126, 234, 0.05);
    }

    .modern-file-upload.dragover {
        border-color: #667eea;
        background: rgba(102, 126, 234, 0.1);
    }

    .file-upload-icon {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background: var(--primary-gradient);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        color: white;
        font-size: 1.5rem;
    }

    .file-upload-text {
        font-size: 1rem;
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
    }

    .file-upload-hint {
        font-size: 0.875rem;
        color: #6b7280;
    }

    .modern-btn {
        padding: 1rem 2rem;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.95rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        text-decoration: none;
        line-height: 1;
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

    .modern-btn-secondary {
        background: white;
        color: #6b7280;
        border: 2px solid var(--border-color);
    }

    .modern-btn-secondary:hover {
        background: var(--light-bg);
        color: #374151;
    }

    .modern-btn-outline {
        background: transparent;
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .modern-btn-outline:hover {
        background: rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.5);
        color: white;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
        padding: 2rem;
        background: var(--light-bg);
        border-top: 1px solid var(--border-color);
        margin: 2rem -2rem -2rem -2rem;
    }

    .form-actions-enhanced {
        display: grid;
        grid-template-columns: 1fr auto 1fr;
        gap: 1rem;
        padding: 2rem;
        align-items: center;
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border-radius: 16px;
        margin: 0;
    }

    .actions-left {
        display: flex;
        gap: 0.75rem;
        justify-self: start;
    }

    .actions-center {
        justify-self: center;
    }

    .actions-right {
        justify-self: end;
    }

    .modern-btn.btn-lg {
        padding: 1.2rem 2.5rem;
        font-size: 1rem;
        font-weight: 700;
    }

    /* Tags styling */
    .tags-container {
        background: var(--light-bg);
        border-radius: 12px;
        padding: 1.5rem;
        border: 1px solid var(--border-color);
    }

    .tag-option {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        background: white;
        border: 2px solid var(--border-color);
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 0.875rem;
        font-weight: 500;
        color: #4b5563;
    }

    .tag-option:hover {
        border-color: #667eea;
        background: rgba(102, 126, 234, 0.05);
        color: #667eea;
        transform: translateY(-1px);
    }

    .tag-option.selected {
        background: var(--primary-gradient);
        border-color: #667eea;
        color: white;
        box-shadow: var(--shadow-sm);
    }

    .tag-option.selected:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-md);
    }

    .selected-tags {
        min-height: 60px;
        background: white;
        border-radius: 8px;
        padding: 1rem;
        border: 1px solid var(--border-color);
    }

    .selected-tag {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: var(--success-gradient);
        color: white;
        padding: 0.4rem 1rem;
        border-radius: 16px;
        font-size: 0.8rem;
        font-weight: 500;
        margin: 0.2rem;
        box-shadow: var(--shadow-sm);
    }

    .selected-tag .remove-tag {
        cursor: pointer;
        opacity: 0.8;
        margin-left: 0.25rem;
        transition: opacity 0.2s;
    }

    .selected-tag .remove-tag:hover {
        opacity: 1;
    }

    /* Slug styling */
    .slug-container {
        background: var(--light-bg);
        border-radius: 12px;
        padding: 1rem;
        border: 1px solid var(--border-color);
    }

    .slug-preview {
        background: white;
        padding: 0.75rem;
        border-radius: 8px;
        border: 1px solid var(--border-color);
    }

    #slugPreview {
        font-family: 'Courier New', monospace;
        font-weight: 600;
    }

    /* Responsive form actions */
    @media (max-width: 768px) {
        .form-actions-enhanced {
            grid-template-columns: 1fr;
            gap: 1rem;
            text-align: center;
        }

        .actions-left,
        .actions-center,
        .actions-right {
            justify-self: center;
        }

        .actions-left {
            order: 3;
        }

        .actions-center {
            order: 2;
        }

        .actions-right {
            order: 1;
        }
    }

    .sidebar-sticky {
        position: sticky;
        top: 2rem;
    }

    .status-options {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
    }

    .status-option {
        padding: 1rem;
        border: 2px solid var(--border-color);
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .status-option:hover {
        border-color: #667eea;
        background: rgba(102, 126, 234, 0.05);
    }

    .status-option.selected {
        border-color: #667eea;
        background: rgba(102, 126, 234, 0.1);
    }

    .status-option input[type="radio"] {
        width: 18px;
        height: 18px;
    }

    .status-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        color: white;
    }

    .status-content h6 {
        margin: 0 0 0.25rem 0;
        font-weight: 600;
        color: #1a202c;
    }

    .status-content p {
        margin: 0;
        font-size: 0.875rem;
        color: #6b7280;
    }

    .input-group-text {
        background: var(--light-bg);
        font-weight: 500;
        color: #6b7280;
        border-radius: 12px 0 0 12px;
        border: 2px solid var(--border-color);
    }

    @media (max-width: 768px) {
        .modern-page-header {
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .modern-page-header h1 {
            font-size: 1.5rem;
        }

        .modern-card-body {
            padding: 1.5rem;
        }

        .post-type-grid {
            grid-template-columns: 1fr;
        }

        .form-actions {
            flex-direction: column;
        }

        .header-actions {
            flex-direction: column;
            gap: 0.5rem;
        }
    }
</style>

<!-- Modern Page Header -->
<div class="modern-page-header">
    <div class="content">
        <nav class="modern-breadcrumb">
            <a href="?">Dashboard</a>
            <i class="fas fa-chevron-right"></i>
            <a href="index.php">Bài viết</a>
            <i class="fas fa-chevron-right"></i>
            <span>Tạo mới</span>
        </nav>
        <h1>
            <i class="fas fa-plus-circle"></i>
            Tạo bài viết mới
        </h1>
        <p>Tạo và xuất bản nội dung giáo dục chất lượng cho trang web trường THPT An Lạc</p>
        <div class="header-actions">
            <a href="index.php" class="modern-btn modern-btn-outline">
                <i class="fas fa-arrow-left"></i>
                Quay lại danh sách
            </a>
        </div>
    </div>
</div>

<form id="postForm" method="POST" enctype="multipart/form-data">
    <div class="row">
        <!-- Main Content -->
        <div class="col-lg-8">
            <!-- Post Type Selection -->
            <div class="modern-card">
                <div class="modern-card-header">
                    <i class="fas fa-tags" style="color: #667eea;"></i>
                    <h6>Loại bài đăng</h6>
                </div>
                <div class="modern-card-body">
                    <div class="post-type-grid">
                        <div class="post-type-card" onclick="selectPostType('educational_activity')">
                            <input type="radio" name="post_type" value="educational_activity" id="postTypeEducation">
                            <div class="post-type-icon" style="background: var(--success-gradient);">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="post-type-title">Hoạt động giáo dục</div>
                            <div class="post-type-desc">Sự kiện, hoạt động ngoại khóa, học thuật của trường</div>
                        </div>

                        <div class="post-type-card" onclick="selectPostType('announcement')">
                            <input type="radio" name="post_type" value="announcement" id="postTypeAnnouncement">
                            <div class="post-type-icon" style="background: var(--warning-gradient);">
                                <i class="fas fa-bullhorn"></i>
                            </div>
                            <div class="post-type-title">Thông báo chính thức</div>
                            <div class="post-type-desc">Thông báo từ ban giám hiệu và các phòng ban</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Basic Information -->
            <div class="modern-card">
                <div class="modern-card-header">
                    <i class="fas fa-edit" style="color: #667eea;"></i>
                    <h6>Thông tin cơ bản</h6>
                </div>
                <div class="modern-card-body">
                    <div class="modern-form-group">
                        <label for="title">Tiêu đề bài viết *</label>
                        <input type="text" class="modern-input" name="title" id="title"
                            placeholder="Nhập tiêu đề hấp dẫn cho bài viết..." required maxlength="255">
                        <small class="text-muted">
                            <span id="titleCounter">255</span> ký tự còn lại
                        </small>
                    </div>

                    <div class="modern-form-group">
                        <label for="excerpt">Mô tả ngắn</label>
                        <textarea class="modern-textarea" name="excerpt" id="excerpt" rows="4"
                            placeholder="Tóm tắt ngắn gọn nội dung bài viết (150-200 từ)..." maxlength="300"></textarea>
                        <small class="text-muted">
                            <span id="excerptCounter">300</span> ký tự còn lại
                        </small>
                    </div>

                    <div class="modern-form-group">
                        <label for="slug">URL thân thiện (SEO Slug)</label>
                        <div class="slug-container">
                            <div class="slug-preview mb-2">
                                <small class="text-muted">
                                    <i class="fas fa-link"></i>
                                    URL: <span class="fw-bold">../</span><span id="slugPreview"
                                        class="text-primary">auto-generated-from-title</span>
                                </small>
                            </div>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-globe text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0" name="slug" id="slug"
                                    placeholder="tự-động-tạo-từ-tiêu-đề-hoặc-tùy-chỉnh">
                                <button type="button" class="btn btn-outline-secondary"
                                    onclick="generateSlugFromTitle()">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </div>
                            <small class="form-text text-muted mt-1">
                                <i class="fas fa-info-circle"></i>
                                Để trống để tự động tạo từ tiêu đề. Chỉ sử dụng chữ thường, số và dấu gạch ngang.
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Editor -->
            <div class="modern-card">
                <div class="modern-card-header">
                    <i class="fas fa-file-alt" style="color: #667eea;"></i>
                    <h6>Nội dung bài viết</h6>
                </div>
                <div class="modern-card-body">
                    <div class="modern-form-group">
                        <label for="content">Nội dung chi tiết *</label>
                        <textarea class="modern-textarea" name="content" id="content" rows="25"
                            placeholder="Viết nội dung chi tiết của bài viết..." required
                            style="min-height: 500px; resize: vertical;"></textarea>
                        <small class="text-muted mt-2">
                            <i class="fas fa-lightbulb"></i>
                            Sử dụng trình soạn thảo để định dạng văn bản, chèn hình ảnh và liên kết
                        </small>
                    </div>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="modern-card">
                <div class="modern-card-header">
                    <i class="fas fa-image" style="color: #667eea;"></i>
                    <h6>Hình ảnh đại diện</h6>
                </div>
                <div class="modern-card-body">
                    <div class="modern-file-upload" id="featuredImageUpload"
                        onclick="document.getElementById('featuredImage').click()">
                        <input type="file" name="featured_image" id="featuredImage" accept="image/*"
                            style="display: none;" onchange="handleImageUpload(this)">
                        <div class="file-upload-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="file-upload-text">Tải lên hình ảnh đại diện</div>
                        <div class="file-upload-hint">
                            Kéo thả hoặc nhấp để chọn file. Định dạng: JPG, PNG, GIF (tối đa 5MB)
                        </div>
                    </div>
                    <div class="image-preview mt-3" id="imagePreview" style="display: none;">
                        <img id="previewImg" src="" alt="Preview" style="max-width: 100%; border-radius: 8px;">
                        <button type="button" class="modern-btn modern-btn-secondary mt-2" onclick="removeImage()">
                            <i class="fas fa-trash"></i> Xóa ảnh
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="sidebar-sticky">
                <!-- Publish Settings -->
                <div class="modern-card">
                    <div class="modern-card-header">
                        <i class="fas fa-rocket" style="color: #667eea;"></i>
                        <h6>Xuất bản</h6>
                    </div>
                    <div class="modern-card-body">
                        <div class="status-options">
                            <div class="status-option" onclick="selectStatus('draft')">
                                <input type="radio" name="status" value="draft" id="statusDraft" checked>
                                <div class="status-icon" style="background: var(--warning-gradient);">
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="status-content">
                                    <h6>Bản nháp</h6>
                                    <p>Lưu để chỉnh sửa sau</p>
                                </div>
                            </div>

                            <div class="status-option" onclick="selectStatus('published')">
                                <input type="radio" name="status" value="published" id="statusPublished">
                                <div class="status-icon" style="background: var(--success-gradient);">
                                    <i class="fas fa-globe"></i>
                                </div>
                                <div class="status-content">
                                    <h6>Xuất bản ngay</h6>
                                    <p>Hiển thị trên website</p>
                                </div>
                            </div>

                            <div class="status-option" onclick="selectStatus('scheduled')">
                                <input type="radio" name="status" value="scheduled" id="statusScheduled">
                                <div class="status-icon" style="background: var(--primary-gradient);">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="status-content">
                                    <h6>Lên lịch</h6>
                                    <p>Xuất bản theo thời gian</p>
                                </div>
                            </div>
                        </div>

                        <div class="modern-form-group mt-3" id="scheduleDate" style="display: none;">
                            <label for="publishDate">Thời gian xuất bản</label>
                            <input type="datetime-local" class="modern-input" id="publishDate" name="publish_date"
                                value="<?php echo date('Y-m-d\TH:i'); ?>">
                        </div>
                    </div>
                </div>

                <!-- Categories & Tags -->
                <div class="modern-card" id="categoriesCard" style="display: none;">
                    <div class="modern-card-header">
                        <i class="fas fa-folder-open" style="color: #667eea;"></i>
                        <h6>Phân loại nội dung</h6>
                    </div>
                    <div class="modern-card-body">
                        <!-- Category Selection -->
                        <div class="modern-form-group" id="categorySection">
                            <label>Chọn danh mục *</label>
                            <div id="categoryOptions" class="status-options">
                                <!-- Categories will be loaded dynamically based on post type -->
                            </div>
                        </div>

                        <!-- Tags Selection -->
                        <div class="modern-form-group" id="tagsSection">
                            <label>Tags</label>
                            <div class="tags-container">
                                <div class="available-tags mb-3" id="availableTagsContainer">
                                    <div class="row g-2" id="tagsRow">
                                        <!-- Tags will be loaded dynamically based on post type -->
                                    </div>
                                </div>

                                <div class="custom-tag-input mb-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="customTagInput"
                                            placeholder="Thêm tag tùy chỉnh...">
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="addCustomTag()">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div id="selectedTagsDisplay" class="selected-tags">
                                    <small class="text-muted d-block mb-2">Tags đã chọn:</small>
                                    <div id="tagsList">
                                        <!-- Selected tags will appear here -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Special Fields -->
                <div class="modern-card" id="specialFields" style="display: none;">
                    <div class="modern-card-header">
                        <i class="fas fa-paperclip" style="color: #667eea;"></i>
                        <h6>Tài liệu đính kèm</h6>
                    </div>
                    <div class="modern-card-body">
                        <div class="modern-file-upload" onclick="document.getElementById('announcementFiles').click()">
                            <input type="file" id="announcementFiles" name="announcement_files[]" multiple
                                accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.zip,.rar" style="display: none;">
                            <div class="file-upload-icon" style="background: var(--secondary-gradient);">
                                <i class="fas fa-file-upload"></i>
                            </div>
                            <div class="file-upload-text">Tải lên tài liệu</div>
                            <div class="file-upload-hint">
                                PDF, DOC, XLS, PPT, ZIP (tối đa 10MB mỗi file)
                            </div>
                        </div>
                        <div id="filesList" class="mt-3"></div>
                    </div>
                </div>

                <!-- Post Settings -->
                <div class="modern-card">
                    <div class="modern-card-header">
                        <i class="fas fa-cog" style="color: #667eea;"></i>
                        <h6>Cài đặt nâng cao</h6>
                    </div>
                    <div class="modern-card-body">
                        <div class="status-options">
                            <div class="status-option" onclick="toggleSetting('featured')">
                                <input type="checkbox" id="isFeatured" name="is_featured">
                                <div class="status-icon" style="background: var(--danger-gradient);">
                                    <i class="fas fa-star"></i>
                                </div>
                                <div class="status-content">
                                    <h6>Bài viết nổi bật</h6>
                                    <p>Hiển thị ở vị trí ưu tiên</p>
                                </div>
                            </div>

                            <div class="status-option" onclick="toggleSetting('sticky')">
                                <input type="checkbox" id="isSticky" name="is_sticky">
                                <div class="status-icon" style="background: var(--warning-gradient);">
                                    <i class="fas fa-thumbtack"></i>
                                </div>
                                <div class="status-content">
                                    <h6>Ghim bài viết</h6>
                                    <p>Luôn hiển thị ở đầu danh sách</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Actions -->
    <div class="modern-card">
        <div class="form-actions-enhanced">
            <div class="actions-left">
                <button type="button" class="modern-btn modern-btn-secondary" onclick="window.history.back()">
                    <i class="fas fa-arrow-left"></i>
                    Quay lại
                </button>
                <button type="button" class="modern-btn modern-btn-warning" onclick="saveDraft()">
                    <i class="fas fa-save"></i>
                    Lưu nháp
                </button>
            </div>
            <div class="actions-center">
                <button type="button" class="modern-btn modern-btn-info" onclick="previewPost()">
                    <i class="fas fa-eye"></i>
                    Xem trước
                </button>
            </div>
            <div class="actions-right">
                <button type="button" class="modern-btn modern-btn-success btn-lg" onclick="savePost()">
                    <i class="fas fa-paper-plane"></i>
                    Xuất bản bài viết
                </button>
            </div>
        </div>
    </div>
</form>

<?php include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'footer.php'; ?>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    // Initialize variables
    let editor;
    let selectedTags = [];

    // Initialize page
    document.addEventListener('DOMContentLoaded', function() {
        initializeEditor();
        setupEventListeners();
        updateCounters();

        // Set default status to draft
        selectStatus('draft');

        // Load default tags for educational_activity (default post type)
        loadTagsForType('educational_activity');
    });

    // Initialize CKEditor
    function initializeEditor() {
        ClassicEditor
            .create(document.querySelector('#content'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'link', '|',
                    'bulletedList', 'numberedList', '|',
                    'blockQuote', 'insertTable', '|',
                    'imageUpload', 'mediaEmbed', '|',
                    'undo', 'redo'
                ],
                image: {
                    toolbar: [
                        'imageTextAlternative', 'imageStyle:full', 'imageStyle:side'
                    ]
                }
            })
            .then(newEditor => {
                editor = newEditor;
            })
            .catch(error => {
                console.error('Error initializing editor:', error);
            });
    }

    // Setup event listeners
    function setupEventListeners() {
        // Title slug generation
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');

        titleInput.addEventListener('input', function() {
            if (!slugInput.value || slugInput.hasAttribute('data-auto')) {
                const slug = generateSlug(this.value);
                slugInput.value = slug;
                slugInput.setAttribute('data-auto', 'true');
                updateSlugPreview(slug);
            }
            updateCounters();
        });

        slugInput.addEventListener('input', function() {
            if (this.value) {
                this.removeAttribute('data-auto');
                updateSlugPreview(this.value);
            }
        });

        // Custom tag input Enter key
        const customTagInput = document.getElementById('customTagInput');
        if (customTagInput) {
            customTagInput.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    addCustomTag();
                }
            });
        }

        // File upload drag and drop
        setupFileUpload();

        // Image upload
        document.getElementById('featuredImage').addEventListener('change', function(e) {
            handleImageUpload(this);
        });

        // Initialize slug preview
        updateSlugPreview('');

        // Character counters
        document.getElementById('excerpt').addEventListener('input', updateCounters);
    }

    // Post type selection
    function selectPostType(type) {
        // Remove previous selections
        document.querySelectorAll('.post-type-card').forEach(card => {
            card.classList.remove('selected');
        });

        // Select current
        const targetCard = document.querySelector(`[onclick="selectPostType('${type}')"]`);
        if (targetCard) {
            targetCard.classList.add('selected');
            targetCard.querySelector('input').checked = true;
        }

        // Load categories based on type
        loadCategoriesForType(type);

        // Load tags based on type
        loadTagsForType(type);

        // Show/hide special fields
        showSpecialFields(type);
    }

    // Status selection
    function selectStatus(status) {
        document.querySelectorAll('.status-option').forEach(option => {
            option.classList.remove('selected');
        });

        const targetOption = document.querySelector(`[onclick="selectStatus('${status}')"]`);
        if (targetOption) {
            targetOption.classList.add('selected');
            targetOption.querySelector('input').checked = true;
        }

        // Show/hide schedule date
        const scheduleDate = document.getElementById('scheduleDate');
        if (status === 'scheduled') {
            scheduleDate.style.display = 'block';
        } else {
            scheduleDate.style.display = 'none';
        }
    }

    // Toggle settings
    function toggleSetting(setting) {
        const checkbox = document.getElementById('is' + capitalizeFirst(setting));
        const option = event.currentTarget;

        checkbox.checked = !checkbox.checked;
        if (checkbox.checked) {
            option.classList.add('selected');
        } else {
            option.classList.remove('selected');
        }
    }

    // Handle image upload
    function handleImageUpload(input) {
        const file = input.files[0];
        if (!file) return;

        // Validate file
        if (!file.type.startsWith('image/')) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: 'Vui lòng chọn file hình ảnh hợp lệ'
            });
            return;
        }

        if (file.size > 5 * 1024 * 1024) { // 5MB
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: 'File không được vượt quá 5MB'
            });
            return;
        }

        // Show preview
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('imagePreview').style.display = 'block';

            // Hide upload area content
            const uploadArea = document.querySelector('#featuredImageUpload');
            uploadArea.querySelector('.file-upload-icon').style.display = 'none';
            uploadArea.querySelector('.file-upload-text').style.display = 'none';
            uploadArea.querySelector('.file-upload-hint').style.display = 'none';
        };
        reader.readAsDataURL(file);
    }

    // Remove image
    function removeImage() {
        document.getElementById('featuredImage').value = '';
        document.getElementById('imagePreview').style.display = 'none';

        // Show upload area content
        const uploadArea = document.querySelector('#featuredImageUpload');
        uploadArea.querySelector('.file-upload-icon').style.display = 'flex';
        uploadArea.querySelector('.file-upload-text').style.display = 'block';
        uploadArea.querySelector('.file-upload-hint').style.display = 'block';
    }

    // Handle tag selection (new UI)
    function toggleTag(element) {
        const tag = element.getAttribute('data-tag');

        if (element.classList.contains('selected')) {
            // Remove tag
            element.classList.remove('selected');
            const index = selectedTags.indexOf(tag);
            if (index > -1) {
                selectedTags.splice(index, 1);
            }
            removeTagFromList(tag);
        } else {
            // Add tag
            element.classList.add('selected');
            if (!selectedTags.includes(tag)) {
                selectedTags.push(tag);
                addTagToList(tag);
            }
        }
    }

    // Add custom tag
    function addCustomTag() {
        const input = document.getElementById('customTagInput');
        const tag = input.value.trim();

        if (tag && !selectedTags.includes(tag)) {
            selectedTags.push(tag);
            addTagToList(tag);
            input.value = '';

            // Create visual tag option if it doesn't exist
            createCustomTagOption(tag);
        }
    }

    // Create visual tag option for custom tags
    function createCustomTagOption(tag) {
        const availableTagsContainer = document.querySelector('.available-tags .row');
        const newTagCol = document.createElement('div');
        newTagCol.className = 'col-auto';

        const tagElement = document.createElement('span');
        tagElement.className = 'tag-option selected';
        tagElement.setAttribute('data-tag', tag);
        tagElement.onclick = function() {
            toggleTag(this);
        };
        tagElement.innerHTML = `<i class="fas fa-tag"></i> ${tag}`;

        newTagCol.appendChild(tagElement);
        availableTagsContainer.appendChild(newTagCol);
    }

    // Add tag to selected list with improved UI
    function addTagToList(tag) {
        const tagsList = document.getElementById('tagsList');
        const tagElement = document.createElement('span');
        tagElement.className = 'selected-tag';
        tagElement.setAttribute('data-tag', tag);
        tagElement.innerHTML = `
        <i class="fas fa-tag"></i>
        ${tag}
        <span class="remove-tag" onclick="removeTagFromList('${tag}')">
            <i class="fas fa-times"></i>
        </span>
    `;
        tagsList.appendChild(tagElement);
    }

    // Remove tag from list
    function removeTagFromList(tag) {
        // Remove from selected array
        const index = selectedTags.indexOf(tag);
        if (index > -1) {
            selectedTags.splice(index, 1);
        }

        // Remove from visual list
        const tagsList = document.getElementById('tagsList');
        const tagElement = tagsList.querySelector(`[data-tag="${tag}"]`);
        if (tagElement) {
            tagElement.remove();
        }

        // Unselect visual tag option
        const tagOption = document.querySelector(`.tag-option[data-tag="${tag}"]`);
        if (tagOption) {
            tagOption.classList.remove('selected');
        }
    }

    // Generate slug from title with improved logic
    function generateSlugFromTitle() {
        const titleInput = document.getElementById('title');
        const slugInput = document.getElementById('slug');
        const title = titleInput.value.trim();

        if (title) {
            const slug = generateSlug(title);
            slugInput.value = slug;
            updateSlugPreview(slug);
            slugInput.setAttribute('data-auto', 'true');
        }
    }

    // Update slug preview
    function updateSlugPreview(slug) {
        const preview = document.getElementById('slugPreview');
        if (preview) {
            preview.textContent = slug || 'auto-generated-from-title';
        }
    }

    // Enhanced slug generation
    function generateSlug(text) {
        return text
            .toLowerCase()
            .replace(/[áàạảãâấầậẩẫăắằặẳẵ]/g, 'a')
            .replace(/[éèẹẻẽêếềệểễ]/g, 'e')
            .replace(/[íìịỉĩ]/g, 'i')
            .replace(/[óòọỏõôốồộổỗơớờợởỡ]/g, 'o')
            .replace(/[úùụủũưứừựửữ]/g, 'u')
            .replace(/[ýỳỵỷỹ]/g, 'y')
            .replace(/[đ]/g, 'd')
            .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
            .replace(/\s+/g, '-') // Replace spaces with hyphens
            .replace(/-+/g, '-') // Replace multiple hyphens with single
            .replace(/^-|-$/g, ''); // Remove leading/trailing hyphens
    }

    // Save as draft
    function saveDraft() {
        // Override status to draft
        const draftRadio = document.getElementById('statusDraft');
        if (draftRadio) {
            draftRadio.checked = true;
            selectStatus('draft');
        }

        Swal.fire({
            title: 'Lưu nháp?',
            text: 'Bài viết sẽ được lưu dưới dạng bản nháp',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Lưu nháp',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                savePost();
            }
        });
    }

    // Handle tag input (legacy support)
    function handleTagInput(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
            addCustomTag();
        }
    }

    // Add tag to display list
    function addTagToList(tag) {
        const tagsList = document.getElementById('tagsList');
        const tagElement = document.createElement('span');
        tagElement.className = 'badge bg-primary me-2 mb-2';
        tagElement.innerHTML = `
        ${tag}
        <i class="fas fa-times ms-1" onclick="removeTag('${tag}')" style="cursor: pointer;"></i>
    `;
        tagsList.appendChild(tagElement);
    }

    // Remove tag
    function removeTag(tag) {
        const index = selectedTags.indexOf(tag);
        if (index > -1) {
            selectedTags.splice(index, 1);
        }

        // Remove from display
        const tagsList = document.getElementById('tagsList');
        Array.from(tagsList.children).forEach(child => {
            if (child.textContent.trim().startsWith(tag)) {
                child.remove();
            }
        });
    }

    // Setup file upload
    function setupFileUpload() {
        const uploadArea = document.querySelector('#featuredImageUpload');
        if (!uploadArea) return;

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });

        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, unhighlight, false);
        });

        uploadArea.addEventListener('drop', handleDrop, false);

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        function highlight() {
            uploadArea.classList.add('dragover');
        }

        function unhighlight() {
            uploadArea.classList.remove('dragover');
        }

        function handleDrop(e) {
            const files = e.dataTransfer.files;
            document.getElementById('featuredImage').files = files;
            handleImageUpload(document.getElementById('featuredImage'));
        }
    }

    // Update character counters
    function updateCounters() {
        const titleInput = document.getElementById('title');
        const excerptInput = document.getElementById('excerpt');

        if (titleInput) {
            const remaining = 255 - titleInput.value.length;
            document.getElementById('titleCounter').textContent = remaining;
        }

        if (excerptInput) {
            const remaining = 300 - excerptInput.value.length;
            document.getElementById('excerptCounter').textContent = remaining;
        }
    }

    // Load categories for post type
    function loadCategoriesForType(type) {
        const categories = {
            'educational_activity': [{
                    id: 1,
                    name: 'Hoạt động ngoại khóa'
                },
                {
                    id: 2,
                    name: 'Hoạt động học thuật'
                },
                {
                    id: 3,
                    name: 'Sinh hoạt lớp'
                }
            ],
            'announcement': [{
                    id: 4,
                    name: 'Thông báo chung'
                },
                {
                    id: 5,
                    name: 'Thông báo khẩn'
                },
                {
                    id: 6,
                    name: 'Quy định mới'
                }
            ],
            'news': [{
                    id: 7,
                    name: 'Tin tức trường'
                },
                {
                    id: 8,
                    name: 'Sự kiện'
                },
                {
                    id: 9,
                    name: 'Hoạt động cộng đồng'
                }
            ],
            'achievement': [{
                    id: 10,
                    name: 'Thành tích học tập'
                },
                {
                    id: 11,
                    name: 'Thành tích thể thao'
                },
                {
                    id: 12,
                    name: 'Giải thưởng'
                }
            ]
        };

        const categoryOptions = document.getElementById('categoryOptions');
        categoryOptions.innerHTML = '';

        if (categories[type]) {
            categories[type].forEach(category => {
                const option = document.createElement('div');
                option.className = 'status-option';
                option.onclick = () => selectCategory(category.id, option);
                option.innerHTML = `
                <input type="radio" name="category_id" value="${category.id}">
                <div class="status-icon" style="background: var(--success-gradient);">
                    <i class="fas fa-folder"></i>
                </div>
                <div class="status-content">
                    <h6>${category.name}</h6>
                </div>
            `;
                categoryOptions.appendChild(option);
            });

            document.getElementById('categoriesCard').style.display = 'block';
        }
    }

    // Load tags for post type
    function loadTagsForType(type) {
        const tagSets = {
            'educational_activity': [{
                    tag: 'hoạt động ngoại khóa',
                    icon: 'fas fa-calendar-check'
                },
                {
                    tag: 'học sinh',
                    icon: 'fas fa-user-graduate'
                },
                {
                    tag: 'thể thao',
                    icon: 'fas fa-running'
                },
                {
                    tag: 'văn hóa',
                    icon: 'fas fa-theater-masks'
                },
                {
                    tag: 'nghệ thuật',
                    icon: 'fas fa-palette'
                },
                {
                    tag: 'sinh hoạt lớp',
                    icon: 'fas fa-users'
                },
                {
                    tag: 'thi đấu',
                    icon: 'fas fa-trophy'
                },
                {
                    tag: 'câu lạc bộ',
                    icon: 'fas fa-star'
                }
            ],
            'announcement': [{
                    tag: 'thông báo',
                    icon: 'fas fa-bullhorn'
                },
                {
                    tag: 'khẩn cấp',
                    icon: 'fas fa-exclamation-triangle'
                },
                {
                    tag: 'quy định',
                    icon: 'fas fa-gavel'
                },
                {
                    tag: 'lịch học',
                    icon: 'fas fa-calendar-alt'
                },
                {
                    tag: 'thi cử',
                    icon: 'fas fa-file-alt'
                },
                {
                    tag: 'học phí',
                    icon: 'fas fa-dollar-sign'
                },
                {
                    tag: 'đăng ký',
                    icon: 'fas fa-edit'
                },
                {
                    tag: 'thời khóa biểu',
                    icon: 'fas fa-clock'
                }
            ],
            'news': [{
                    tag: 'tin tức',
                    icon: 'fas fa-newspaper'
                },
                {
                    tag: 'sự kiện',
                    icon: 'fas fa-calendar-star'
                },
                {
                    tag: 'giáo dục',
                    icon: 'fas fa-graduation-cap'
                },
                {
                    tag: 'học sinh giỏi',
                    icon: 'fas fa-medal'
                },
                {
                    tag: 'cộng đồng',
                    icon: 'fas fa-handshake'
                },
                {
                    tag: 'khoa học',
                    icon: 'fas fa-flask'
                },
                {
                    tag: 'công nghệ',
                    icon: 'fas fa-laptop'
                },
                {
                    tag: 'môi trường',
                    icon: 'fas fa-leaf'
                }
            ],
            'achievement': [{
                    tag: 'thành tích',
                    icon: 'fas fa-trophy'
                },
                {
                    tag: 'giải thưởng',
                    icon: 'fas fa-award'
                },
                {
                    tag: 'học sinh xuất sắc',
                    icon: 'fas fa-star'
                },
                {
                    tag: 'olympic',
                    icon: 'fas fa-medal'
                },
                {
                    tag: 'thi văn nghệ',
                    icon: 'fas fa-music'
                },
                {
                    tag: 'thi thể thao',
                    icon: 'fas fa-running'
                },
                {
                    tag: 'khen thưởng',
                    icon: 'fas fa-certificate'
                },
                {
                    tag: 'danh hiệu',
                    icon: 'fas fa-crown'
                }
            ]
        };

        const tagsRow = document.getElementById('tagsRow');
        tagsRow.innerHTML = '';

        if (tagSets[type]) {
            tagSets[type].forEach(tagData => {
                const colDiv = document.createElement('div');
                colDiv.className = 'col-auto';

                const tagElement = document.createElement('span');
                tagElement.className = 'tag-option';
                tagElement.setAttribute('data-tag', tagData.tag);
                tagElement.onclick = () => toggleTag(tagElement);
                tagElement.innerHTML = `
                    <i class="${tagData.icon}"></i> ${tagData.tag}
                `;

                colDiv.appendChild(tagElement);
                tagsRow.appendChild(colDiv);
            });
        }

        // Clear selected tags when switching post type
        selectedTags = [];
        const tagsList = document.getElementById('tagsList');
        tagsList.innerHTML = '';

        // Remove selected class from all tag options
        document.querySelectorAll('.tag-option').forEach(tag => {
            tag.classList.remove('selected');
        });
    }

    // Select category
    function selectCategory(categoryId, element) {
        document.querySelectorAll('#categoryOptions .status-option').forEach(option => {
            option.classList.remove('selected');
        });

        element.classList.add('selected');
        element.querySelector('input').checked = true;
    }

    // Show special fields based on post type
    function showSpecialFields(type) {
        const specialFields = document.getElementById('specialFields');
        if (type === 'announcement') {
            specialFields.style.display = 'block';
        } else {
            specialFields.style.display = 'none';
        }
    }

    // Preview post
    function previewPost() {
        Swal.fire({
            title: 'Xem trước',
            text: 'Tính năng xem trước sẽ được phát triển trong phiên bản tiếp theo',
            icon: 'info',
            confirmButtonText: 'OK'
        });
    }

    // Save post
    function savePost() {
        // Validate form
        if (!validateForm()) {
            return;
        }

        const formData = new FormData(document.getElementById('postForm'));

        // Add editor content
        if (editor) {
            formData.set('content', editor.getData());
        }

        // Add selected tags
        formData.set('tags', JSON.stringify(selectedTags));

        // Show loading
        Swal.fire({
            title: 'Đang lưu...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // Simulate save (replace with actual AJAX call)
        setTimeout(() => {
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: 'Bài viết đã được lưu thành công',
                confirmButtonText: 'Về danh sách'
            }).then(() => {
                window.location.href = 'index.php';
            });
        }, 2000);
    }

    // Validate form
    function validateForm() {
        const title = document.getElementById('title').value.trim();
        const postType = document.querySelector('input[name="post_type"]:checked');
        const status = document.querySelector('input[name="status"]:checked');
        const category = document.querySelector('input[name="category_id"]:checked');

        if (!title) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: 'Vui lòng nhập tiêu đề bài viết'
            });
            return false;
        }

        if (!postType) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: 'Vui lòng chọn loại bài đăng'
            });
            return false;
        }

        if (!status) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: 'Vui lòng chọn trạng thái xuất bản'
            });
            return false;
        }

        if (!category) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: 'Vui lòng chọn danh mục'
            });
            return false;
        }

        if (editor && !editor.getData().trim()) {
            Swal.fire({
                icon: 'error',
                title: 'Lỗi!',
                text: 'Vui lòng nhập nội dung bài viết'
            });
            return false;
        }

        return true;
    }

    // Utility function
    function capitalizeFirst(str) {
        return str.charAt(0).toUpperCase() + str.slice(1);
    }
</script>