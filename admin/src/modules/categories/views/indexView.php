<?php
$pageTitle = 'Quản lý Danh mục & Tags';
defined('APP_PATH') or exit('Do not have access to this section!');
include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'header.php';
?>

<!-- Modern Dashboard Container -->
<div class="dashboard-container">
    <!-- Hero Section with Floating Cards -->
    <div class="hero-section">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title">
                    <i class="fas fa-layer-group"></i>
                    Quản lý Danh mục & Tags
                </h1>
                <p class="hero-subtitle">Tổ chức và phân loại nội dung một cách khoa học</p>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card education-stat">
                    <div class="stat-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="stat-content">
                        <h3><?php echo count($data['educationCategories']) + count($data['educationTags']); ?></h3>
                        <p>Hoạt động Giáo dục</p>
                        <small><?php echo count($data['educationCategories']); ?> danh mục •
                            <?php echo count($data['educationTags']); ?> tags</small>
                    </div>
                </div>

                <div class="stat-card announcement-stat">
                    <div class="stat-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div class="stat-content">
                        <h3><?php echo count($data['announcementCategories']) + count($data['announcementTags']); ?>
                        </h3>
                        <p>Thông báo Nhà trường</p>
                        <small><?php echo count($data['announcementCategories']); ?> danh mục •
                            <?php echo count($data['announcementTags']); ?> tags</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Navigation -->
    <div class="modern-nav-tab">
        <div class="nav-container">
            <div class="nav-tabs-modern" role="tablist">
                <button class="nav-tab active" data-tab="education" role="tab">
                    <div class="tab-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="tab-content">
                        <span class="tab-title">Hoạt động Giáo dục</span>
                        <span class="tab-subtitle">Học tập & Ngoại khóa</span>
                    </div>
                </button>

                <button class="nav-tab" data-tab="announcement" role="tab">
                    <div class="tab-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <div class="tab-content">
                        <span class="tab-title">Thông báo Nhà trường</span>
                        <span class="tab-subtitle">Hành chính & Chính thức</span>
                    </div>
                </button>
            </div>
        </div>
    </div>

    <!-- Content Sections -->
    <div class="content-sections">
        <!-- Education Section -->
        <div class="content-section active" id="education-section">
            <div class="section-header">
                <div class="section-title">
                    <h2><i class="fas fa-graduation-cap me-2"></i>Hoạt động Giáo dục</h2>
                    <p>Quản lý danh mục và tags cho các hoạt động học tập, ngoại khóa</p>
                </div>
                <div class="section-toggle">
                    <div class="toggle-group">
                        <button class="toggle-btn active" data-content="categories">
                            <i class="fas fa-folder"></i>
                            Danh mục
                            <span class="count"><?php echo count($data['educationCategories']); ?></span>
                        </button>
                        <button class="toggle-btn" data-content="tags">
                            <i class="fas fa-tags"></i>
                            Tags
                            <span class="count"><?php echo count($data['educationTags']); ?></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Categories Content -->
            <div class="content-grid active" id="education-categories">
                <div class="masonry-grid">
                    <?php foreach ($data['educationCategories'] as $category): ?>
                        <div class="grid-item category-item" data-category-id="<?php echo $category['id']; ?>">
                            <div class="item-card">
                                <div class="card-header">
                                    <div class="card-icon education">
                                        <i class="fas fa-folder"></i>
                                    </div>
                                    <div class="card-actions">
                                        <button class="action-btn" onclick="editCategory(<?php echo $category['id']; ?>)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn danger"
                                            onclick="deleteCategory(<?php echo $category['id']; ?>)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <h4 class="item-title"><?php echo htmlspecialchars($category['name']); ?></h4>
                                    <div class="item-meta">
                                        <span class="post-count">
                                            <i class="fas fa-file-alt"></i>
                                            <?php echo $category['post_count']; ?> bài viết
                                        </span>
                                        <span class="created-date">
                                            <i class="fas fa-calendar"></i>
                                            <?php echo date('d/m/Y', strtotime($category['created_at'])); ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="progress-bar">
                                        <div class="progress-fill"
                                            style="width: <?php echo min(100, ($category['post_count'] / 10) * 100); ?>%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Add New Category -->
                    <div class="grid-item add-item">
                        <div class="add-card" onclick="showCreateModal('category', 'educational_activity')">
                            <div class="add-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                            <h4>Thêm danh mục mới</h4>
                            <p>Tạo danh mục cho hoạt động giáo dục</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tags Content -->
            <div class="content-grid" id="education-tags">
                <div class="tags-container">
                    <?php foreach ($data['educationTags'] as $tag): ?>
                        <div class="tag-item" data-tag-id="<?php echo $tag['id']; ?>"
                            style="--tag-color: <?php echo $tag['color']; ?>">
                            <div class="tag-chip">
                                <div class="tag-color" style="background-color: <?php echo $tag['color']; ?>"></div>
                                <span class="tag-name"><?php echo htmlspecialchars($tag['name']); ?></span>
                                <div class="tag-meta">
                                    <span class="tag-count"><?php echo $tag['post_count']; ?></span>
                                    <div class="tag-actions">
                                        <button class="tag-action" onclick="editTag(<?php echo $tag['id']; ?>)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="tag-action" onclick="deleteTag(<?php echo $tag['id']; ?>)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Add New Tag -->
                    <div class="tag-item add-tag">
                        <div class="add-tag-chip" onclick="showCreateModal('tag', 'educational_activity')">
                            <i class="fas fa-plus"></i>
                            <span>Thêm tag mới</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Announcement Section -->
        <div class="content-section" id="announcement-section">
            <div class="section-header">
                <div class="section-title">
                    <h2><i class="fas fa-bullhorn me-2"></i>Thông báo Nhà trường</h2>
                    <p>Quản lý danh mục và tags cho thông báo chính thức, hành chính</p>
                </div>
                <div class="section-toggle">
                    <div class="toggle-group">
                        <button class="toggle-btn active" data-content="categories">
                            <i class="fas fa-folder"></i>
                            Danh mục
                            <span class="count"><?php echo count($data['announcementCategories']); ?></span>
                        </button>
                        <button class="toggle-btn" data-content="tags">
                            <i class="fas fa-tags"></i>
                            Tags
                            <span class="count"><?php echo count($data['announcementTags']); ?></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Categories Content -->
            <div class="content-grid active" id="announcement-categories">
                <div class="masonry-grid">
                    <?php foreach ($data['announcementCategories'] as $category): ?>
                        <div class="grid-item category-item" data-category-id="<?php echo $category['id']; ?>">
                            <div class="item-card">
                                <div class="card-header">
                                    <div class="card-icon announcement">
                                        <i class="fas fa-folder"></i>
                                    </div>
                                    <div class="card-actions">
                                        <button class="action-btn" onclick="editCategory(<?php echo $category['id']; ?>)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="action-btn danger"
                                            onclick="deleteCategory(<?php echo $category['id']; ?>)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <h4 class="item-title"><?php echo htmlspecialchars($category['name']); ?></h4>
                                    <div class="item-meta">
                                        <span class="post-count">
                                            <i class="fas fa-file-alt"></i>
                                            <?php echo $category['post_count']; ?> bài viết
                                        </span>
                                        <span class="created-date">
                                            <i class="fas fa-calendar"></i>
                                            <?php echo date('d/m/Y', strtotime($category['created_at'])); ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="progress-bar">
                                        <div class="progress-fill"
                                            style="width: <?php echo min(100, ($category['post_count'] / 10) * 100); ?>%">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Add New Category -->
                    <div class="grid-item add-item">
                        <div class="add-card" onclick="showCreateModal('category', 'announcement')">
                            <div class="add-icon">
                                <i class="fas fa-plus"></i>
                            </div>
                            <h4>Thêm danh mục mới</h4>
                            <p>Tạo danh mục cho thông báo nhà trường</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tags Content -->
            <div class="content-grid" id="announcement-tags">
                <div class="tags-container">
                    <?php foreach ($data['announcementTags'] as $tag): ?>
                        <div class="tag-item" data-tag-id="<?php echo $tag['id']; ?>"
                            style="--tag-color: <?php echo $tag['color']; ?>">
                            <div class="tag-chip">
                                <div class="tag-color" style="background-color: <?php echo $tag['color']; ?>"></div>
                                <span class="tag-name"><?php echo htmlspecialchars($tag['name']); ?></span>
                                <div class="tag-meta">
                                    <span class="tag-count"><?php echo $tag['post_count']; ?></span>
                                    <div class="tag-actions">
                                        <button class="tag-action" onclick="editTag(<?php echo $tag['id']; ?>)">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="tag-action" onclick="deleteTag(<?php echo $tag['id']; ?>)">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <!-- Add New Tag -->
                    <div class="tag-item add-tag">
                        <div class="add-tag-chip" onclick="showCreateModal('tag', 'announcement')">
                            <i class="fas fa-plus"></i>
                            <span>Thêm tag mới</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modern Create/Edit Modal -->
<div class="modern-modal" id="createModal">
    <div class="modal-overlay" onclick="closeModal()"></div>
    <div class="modal-container">
        <div class="modal-header">
            <div class="modal-title">
                <i class="fas fa-plus-circle"></i>
                <span id="modalTitle">Tạo mới</span>
            </div>
            <button class="modal-close" onclick="closeModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <form id="createForm" class="modal-content">
            <input type="hidden" id="itemType" name="type">
            <input type="hidden" id="postType" name="post_type">
            <input type="hidden" id="itemId" name="id">

            <!-- Dynamic Form Fields -->
            <div class="form-group">
                <label class="form-label">
                    <span id="nameLabel">Tên</span>
                    <span class="required">*</span>
                </label>
                <div class="input-group">
                    <input type="text" id="itemName" name="name" class="form-control" required
                        placeholder="Nhập tên...">
                </div>
            </div>

            <!-- Color Picker (Only for Tags) -->
            <div class="form-group" id="colorGroup" style="display: none;">
                <label class="form-label">Màu sắc</label>
                <div class="color-picker-wrapper">
                    <input type="color" id="itemColor" name="color" value="#667eea" class="color-input">
                    <div class="color-preview" onclick="document.getElementById('itemColor').click()">
                        <span id="colorValue">#667eea</span>
                    </div>
                </div>

                <div class="color-presets">
                    <button type="button" class="color-preset" data-color="#667eea"
                        style="background: #667eea"></button>
                    <button type="button" class="color-preset" data-color="#f093fb"
                        style="background: #f093fb"></button>
                    <button type="button" class="color-preset" data-color="#4facfe"
                        style="background: #4facfe"></button>
                    <button type="button" class="color-preset" data-color="#43e97b"
                        style="background: #43e97b"></button>
                    <button type="button" class="color-preset" data-color="#fa709a"
                        style="background: #fa709a"></button>
                    <button type="button" class="color-preset" data-color="#ffecd2"
                        style="background: #ffecd2"></button>
                    <button type="button" class="color-preset" data-color="#a8edea"
                        style="background: #a8edea"></button>
                    <button type="button" class="color-preset" data-color="#d299c2"
                        style="background: #d299c2"></button>
                </div>
            </div>

            <!-- Post Type Selection -->
            <div class="form-group" id="typeGroup">
                <label class="form-label">Loại nội dung</label>
                <div class="type-selector">
                    <button type="button" class="type-option" data-type="educational_activity">
                        <div class="type-icon education">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="type-info">
                            <span class="type-title">Hoạt động Giáo dục</span>
                            <span class="type-desc">Học tập & Ngoại khóa</span>
                        </div>
                    </button>

                    <button type="button" class="type-option" data-type="announcement">
                        <div class="type-icon announcement">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="type-info">
                            <span class="type-title">Thông báo Nhà trường</span>
                            <span class="type-desc">Hành chính & Chính thức</span>
                        </div>
                    </button>
                </div>
            </div>
        </form>

        <div class="modal-footer">
            <button type="button" class="btn-secondary" onclick="closeModal()">
                <i class="fas fa-times"></i>
                Hủy bỏ
            </button>
            <button type="submit" form="createForm" class="btn-primary">
                <i class="fas fa-save"></i>
                <span id="submitText">Tạo mới</span>
            </button>
        </div>
    </div>
</div>

<?php include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'footer.php'; ?>

<style>
    /* Modern Dashboard Styles */
    .dashboard-container {
        padding: 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        position: relative;
    }

    /* Hero Section */
    .hero-section {
        padding: 3rem 2rem;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 200px;
        height: 200px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    .hero-section::after {
        content: '';
        position: absolute;
        bottom: -30%;
        left: -5%;
        width: 150px;
        height: 150px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        animation: float 8s ease-in-out infinite reverse;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
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

    .hero-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .hero-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        margin: 0;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: transform 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .education-stat .stat-icon {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .announcement-stat .stat-icon {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    }

    .stat-content h3 {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
    }

    .stat-content p {
        margin: 0;
        font-weight: 600;
    }

    .stat-content small {
        opacity: 0.8;
    }

    .quick-actions {
        position: absolute;
        top: 2rem;
        right: 2rem;
        display: flex;
        gap: 1rem;
    }

    .quick-action-btn {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        border-radius: 15px;
        padding: 1rem 1.5rem;
        color: white;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-weight: 600;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .quick-action-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-2px);
    }

    /* Modern Navigation */
    .modern-nav-tab {
        background: white;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        z-index: 100;
    }

    .nav-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 1rem 2rem;
    }

    .nav-tabs-modern {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
    }

    .nav-tab {
        background: transparent;
        border: 2px solid #e9ecef;
        border-radius: 15px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .nav-tab:hover {
        border-color: #667eea;
        background: rgba(102, 126, 234, 0.05);
    }

    .nav-tab.active {
        border-color: #667eea;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .tab-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        background: rgba(102, 126, 234, 0.1);
    }

    .nav-tab.active .tab-icon {
        background: rgba(255, 255, 255, 0.2);
    }

    .tab-title {
        font-size: 1.1rem;
        font-weight: 600;
        display: block;
    }

    .tab-subtitle {
        font-size: 0.9rem;
        opacity: 0.7;
        display: block;
    }

    /* Content Sections */
    .content-sections {
        background: #f8f9fa;
        min-height: calc(100vh - 300px);
    }

    .content-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 3rem 2rem;
        display: none;
    }

    .content-section.active {
        display: block;
        animation: fadeInUp 0.5s ease;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .section-title h2 {
        font-size: 1.8rem;
        font-weight: 700;
        margin: 0;
        color: #2d3748;
    }

    .section-title p {
        margin: 0.5rem 0 0 0;
        color: #718096;
    }

    .toggle-group {
        display: flex;
        background: white;
        border-radius: 15px;
        padding: 0.5rem;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .toggle-btn {
        background: transparent;
        border: none;
        border-radius: 10px;
        padding: 1rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        font-weight: 600;
        color: #718096;
        transition: all 0.3s ease;
    }

    .toggle-btn.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .toggle-btn .count {
        background: rgba(102, 126, 234, 0.2);
        padding: 0.25rem 0.5rem;
        border-radius: 8px;
        font-size: 0.8rem;
    }

    .toggle-btn.active .count {
        background: rgba(255, 255, 255, 0.3);
    }

    /* Content Grids */
    .content-grid {
        display: none;
    }

    .content-grid.active {
        display: block;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    /* Masonry Grid for Categories */
    .masonry-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-top: 1rem;
    }

    .grid-item {
        break-inside: avoid;
    }

    .item-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
    }

    .item-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
    }

    .card-header {
        padding: 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #e9ecef;
    }

    .card-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .card-icon.education {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .card-icon.announcement {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        color: white;
    }

    .card-actions {
        display: flex;
        gap: 0.5rem;
    }

    .action-btn {
        width: 40px;
        height: 40px;
        border: none;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f7fafc;
        color: #4a5568;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .action-btn:hover {
        background: #667eea;
        color: white;
    }

    .action-btn.danger:hover {
        background: #e53e3e;
    }

    .card-body {
        padding: 1.5rem;
    }

    .item-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin: 0 0 1rem 0;
        color: #2d3748;
    }

    .item-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.9rem;
        color: #718096;
    }

    .card-footer {
        padding: 0 1.5rem 1.5rem 1.5rem;
    }

    .progress-bar {
        height: 6px;
        background: #e2e8f0;
        border-radius: 3px;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        border-radius: 3px;
        transition: width 0.3s ease;
    }

    /* Add Cards */
    .add-item {
        display: flex;
        align-items: center;
    }

    .add-card {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.05) 0%, rgba(118, 75, 162, 0.05) 100%);
        border: 2px dashed #667eea;
        border-radius: 20px;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        min-height: 200px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .add-card:hover {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        transform: translateY(-5px);
    }

    .add-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        margin: 0 auto 1rem auto;
    }

    .add-card h4 {
        color: #2d3748;
        margin-bottom: 0.5rem;
    }

    .add-card p {
        color: #718096;
        margin: 0;
    }

    /* Tags Container */
    .tags-container {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-top: 1rem;
    }

    .tag-item {
        animation: slideInUp 0.3s ease;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .tag-chip {
        background: white;
        border-radius: 25px;
        padding: 0.75rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .tag-chip:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        border-color: var(--tag-color, #667eea);
    }

    .tag-color {
        width: 12px;
        height: 12px;
        border-radius: 50%;
    }

    .tag-name {
        font-weight: 600;
        color: #2d3748;
    }

    .tag-meta {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .tag-count {
        background: rgba(113, 128, 150, 0.1);
        padding: 0.25rem 0.5rem;
        border-radius: 10px;
        font-size: 0.8rem;
        color: #718096;
        font-weight: 600;
    }

    .tag-actions {
        display: flex;
        gap: 0.25rem;
    }

    .tag-action {
        width: 30px;
        height: 30px;
        border: none;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: transparent;
        color: #718096;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .tag-action:hover {
        background: #667eea;
        color: white;
    }

    .add-tag-chip {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        border: 2px dashed #667eea;
        border-radius: 25px;
        padding: 0.75rem 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        color: #667eea;
        font-weight: 600;
    }

    .add-tag-chip:hover {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.15) 0%, rgba(118, 75, 162, 0.15) 100%);
        transform: translateY(-2px);
    }

    /* Modern Modal */
    .modern-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
        display: none;
        align-items: center;
        justify-content: center;
        padding: 2rem;
    }

    .modern-modal.show {
        display: flex;
        animation: modalShow 0.3s ease;
    }

    @keyframes modalShow {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .modal-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(5px);
    }

    .modal-container {
        background: white;
        border-radius: 25px;
        width: 100%;
        max-width: 500px;
        max-height: 90vh;
        overflow-y: auto;
        position: relative;
        animation: modalSlide 0.3s ease;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    }

    @keyframes modalSlide {
        from {
            transform: translateY(30px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .modal-header {
        padding: 2rem 2rem 1rem 2rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #e9ecef;
    }

    .modal-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.5rem;
        font-weight: 700;
        color: #2d3748;
    }

    .modal-close {
        width: 40px;
        height: 40px;
        border: none;
        border-radius: 10px;
        background: #f7fafc;
        color: #718096;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .modal-close:hover {
        background: #e2e8f0;
    }

    .modal-content {
        padding: 2rem;
    }

    .form-group {
        margin-bottom: 2rem;
    }

    .form-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-bottom: 0.75rem;
        font-weight: 600;
        color: #2d3748;
    }

    .required {
        color: #e53e3e;
    }

    .form-control {
        width: 100%;
        padding: 1rem;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .color-picker-wrapper {
        display: flex;
        gap: 1rem;
        align-items: center;
        margin-bottom: 1rem;
    }

    .color-input {
        width: 60px;
        height: 60px;
        border: none;
        border-radius: 15px;
        cursor: pointer;
    }

    .color-preview {
        flex: 1;
        height: 60px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .color-preview:hover {
        border-color: #667eea;
    }

    .color-presets {
        display: flex;
        gap: 0.75rem;
        flex-wrap: wrap;
    }

    .color-preset {
        width: 40px;
        height: 40px;
        border: 3px solid white;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    .color-preset:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .type-selector {
        display: grid;
        gap: 1rem;
    }

    .type-option {
        background: white;
        border: 2px solid #e2e8f0;
        border-radius: 15px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .type-option:hover {
        border-color: #667eea;
        background: rgba(102, 126, 234, 0.05);
    }

    .type-option.selected {
        border-color: #667eea;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
    }

    .type-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .type-icon.education {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .type-icon.announcement {
        background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        color: white;
    }

    .type-info {
        display: flex;
        flex-direction: column;
    }

    .type-title {
        font-weight: 600;
        color: #2d3748;
    }

    .type-desc {
        font-size: 0.9rem;
        color: #718096;
    }

    .modal-footer {
        padding: 1rem 2rem 2rem 2rem;
        display: flex;
        gap: 1rem;
        justify-content: flex-end;
    }

    .btn-secondary,
    .btn-primary {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-secondary {
        background: #e2e8f0;
        color: #4a5568;
    }

    .btn-secondary:hover {
        background: #cbd5e0;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .hero-content {
            grid-template-columns: 1fr;
            text-align: center;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .nav-tabs-modern {
            grid-template-columns: 1fr;
        }

        .section-header {
            flex-direction: column;
            gap: 1rem;
            align-items: stretch;
        }

        .masonry-grid {
            grid-template-columns: 1fr;
        }

        .quick-actions {
            position: static;
            justify-content: center;
            margin-top: 2rem;
        }

        .modal-container {
            margin: 1rem;
            max-width: calc(100% - 2rem);
        }
    }

    /* Hide old content */
    .tab-content,
    #categoryTabContent,
    .nav.nav-tabs,
    .nav.nav-pills {
        display: none !important;
    }
</style>

<script>
    // Global variables
    let currentTab = 'education';
    let currentContent = 'categories';

    // Initialize the page
    document.addEventListener('DOMContentLoaded', function() {
        initializeNavigation();
        initializeModal();
        initializeAnimations();
    });

    // Navigation functionality
    function initializeNavigation() {
        const navTabs = document.querySelectorAll('.nav-tab');
        const contentSections = document.querySelectorAll('.content-section');

        navTabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const targetTab = this.getAttribute('data-tab');
                switchTab(targetTab);
            });
        });

        // Initialize toggle buttons
        document.querySelectorAll('.toggle-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const content = this.getAttribute('data-content');
                switchContent(content);
            });
        });
    }

    function switchTab(tabName) {
        currentTab = tabName;

        // Update nav tabs
        document.querySelectorAll('.nav-tab').forEach(tab => {
            tab.classList.toggle('active', tab.getAttribute('data-tab') === tabName);
        });

        // Update content sections
        document.querySelectorAll('.content-section').forEach(section => {
            section.classList.toggle('active', section.id === `${tabName}-section`);
        });

        // Reset to categories view
        switchContent('categories');
    }

    function switchContent(contentType) {
        currentContent = contentType;

        // Update toggle buttons in current section
        const currentSection = document.querySelector(`#${currentTab}-section`);
        currentSection.querySelectorAll('.toggle-btn').forEach(btn => {
            btn.classList.toggle('active', btn.getAttribute('data-content') === contentType);
        });

        // Update content grids
        currentSection.querySelectorAll('.content-grid').forEach(grid => {
            const gridId = grid.id;
            const shouldShow = gridId === `${currentTab}-${contentType}`;
            grid.classList.toggle('active', shouldShow);
        });
    }

    // Modal functionality
    function initializeModal() {
        const colorInput = document.getElementById('itemColor');
        const colorPreview = document.getElementById('colorValue');

        // Color picker functionality
        if (colorInput) {
            colorInput.addEventListener('input', function() {
                colorPreview.textContent = this.value.toUpperCase();
                document.querySelector('.color-preview').style.backgroundColor = this.value;
            });
        }

        // Color presets
        document.querySelectorAll('.color-preset').forEach(preset => {
            preset.addEventListener('click', function() {
                const color = this.getAttribute('data-color');
                colorInput.value = color;
                colorPreview.textContent = color.toUpperCase();
                document.querySelector('.color-preview').style.backgroundColor = color;
            });
        });

        // Type selection
        document.querySelectorAll('.type-option').forEach(option => {
            option.addEventListener('click', function() {
                document.querySelectorAll('.type-option').forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
                document.getElementById('postType').value = this.getAttribute('data-type');
            });
        });

        // Form submission
        document.getElementById('createForm').addEventListener('submit', function(e) {
            e.preventDefault();
            handleFormSubmit();
        });
    }

    function showCreateModal(type, postType = null, id = null) {
        const modal = document.getElementById('createModal');
        const modalTitle = document.getElementById('modalTitle');
        const nameLabel = document.getElementById('nameLabel');
        const submitText = document.getElementById('submitText');
        const colorGroup = document.getElementById('colorGroup');
        const typeGroup = document.getElementById('typeGroup');

        // Reset form
        document.getElementById('createForm').reset();
        document.querySelectorAll('.type-option').forEach(opt => opt.classList.remove('selected'));

        // Set form fields
        document.getElementById('itemType').value = type;
        document.getElementById('itemId').value = id || '';

        if (type === 'category') {
            modalTitle.innerHTML = '<i class="fas fa-folder"></i>' + (id ? 'Chỉnh sửa danh mục' : 'Tạo danh mục mới');
            nameLabel.textContent = 'Tên danh mục';
            submitText.textContent = id ? 'Cập nhật' : 'Tạo danh mục';
            colorGroup.style.display = 'none';
        } else {
            modalTitle.innerHTML = '<i class="fas fa-tag"></i>' + (id ? 'Chỉnh sửa tag' : 'Tạo tag mới');
            nameLabel.textContent = 'Tên tag';
            submitText.textContent = id ? 'Cập nhật' : 'Tạo tag';
            colorGroup.style.display = 'block';
        }

        // Pre-select post type if provided
        if (postType) {
            document.getElementById('postType').value = postType;
            const typeOption = document.querySelector(`.type-option[data-type="${postType}"]`);
            if (typeOption) {
                typeOption.classList.add('selected');
            }
            typeGroup.style.display = 'none';
        } else {
            typeGroup.style.display = 'block';
        }

        // Show modal
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('createModal');
        modal.classList.remove('show');
        document.body.style.overflow = '';
    }

    function handleFormSubmit() {
        const formData = new FormData(document.getElementById('createForm'));
        const type = formData.get('type');
        const name = formData.get('name');
        const id = formData.get('id');

        // Show loading state
        const submitBtn = document.querySelector('.btn-primary');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang xử lý...';
        submitBtn.disabled = true;

        // Simulate API call
        setTimeout(() => {
            // Show success message
            Swal.fire({
                icon: 'success',
                title: 'Thành công!',
                text: `${type === 'category' ? 'Danh mục' : 'Tag'} "${name}" đã được ${id ? 'cập nhật' : 'tạo'} thành công`,
                timer: 2000,
                showConfirmButton: false
            });

            // Reset button
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;

            // Close modal
            closeModal();

            // Refresh page (in real app, update the list dynamically)
            setTimeout(() => location.reload(), 2000);
        }, 1500);
    }

    // Animation initialization
    function initializeAnimations() {
        // Stagger animation for grid items
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe grid items
        document.querySelectorAll('.grid-item, .tag-item').forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            observer.observe(item);
        });
    }

    // CRUD Functions (keeping compatibility with existing code)
    function editCategory(id) {
        // Mock data - in real implementation, fetch from server
        const categories = {
            1: {
                name: 'Hoạt động ngoại khóa'
            },
            2: {
                name: 'Thi đấu thể thao'
            },
            3: {
                name: 'Hoạt động văn nghệ'
            },
            4: {
                name: 'Thông báo học tập'
            },
            5: {
                name: 'Thông báo hành chính'
            },
            6: {
                name: 'Thông báo sự kiện'
            }
        };

        const category = categories[id];
        if (category) {
            showCreateModal('category', currentTab === 'education' ? 'educational_activity' : 'announcement', id);
            document.getElementById('itemName').value = category.name;
        }
    }

    function editTag(id) {
        // Mock data - in real implementation, fetch from server
        const tags = {
            1: {
                name: 'Cuộc thi',
                color: '#667eea'
            },
            2: {
                name: 'Hoạt động nhóm',
                color: '#f093fb'
            },
            3: {
                name: 'Trải nghiệm',
                color: '#4facfe'
            },
            4: {
                name: 'Khẩn cấp',
                color: '#fa709a'
            },
            5: {
                name: 'Lịch học',
                color: '#43e97b'
            },
            6: {
                name: 'Tuyển sinh',
                color: '#ffecd2'
            }
        };

        const tag = tags[id];
        if (tag) {
            showCreateModal('tag', currentTab === 'education' ? 'educational_activity' : 'announcement', id);
            document.getElementById('itemName').value = tag.name;
            document.getElementById('itemColor').value = tag.color;
            document.getElementById('colorValue').textContent = tag.color.toUpperCase();
            document.querySelector('.color-preview').style.backgroundColor = tag.color;
        }
    }

    function deleteCategory(id) {
        Swal.fire({
            title: 'Xác nhận xóa?',
            text: 'Bạn có chắc chắn muốn xóa danh mục này?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e53e3e',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Đã xóa!',
                    text: 'Danh mục đã được xóa thành công',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    location.reload();
                });
            }
        });
    }

    function deleteTag(id) {
        Swal.fire({
            title: 'Xác nhận xóa?',
            text: 'Bạn có chắc chắn muốn xóa tag này?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e53e3e',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    icon: 'success',
                    title: 'Đã xóa!',
                    text: 'Tag đã được xóa thành công',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    location.reload();
                });
            }
        });
    }

    // Keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
        }

        if (e.ctrlKey && e.key === 'n') {
            e.preventDefault();
            showCreateModal('category', currentTab === 'education' ? 'educational_activity' : 'announcement');
        }

        if (e.ctrlKey && e.shiftKey && e.key === 'N') {
            e.preventDefault();
            showCreateModal('tag', currentTab === 'education' ? 'educational_activity' : 'announcement');
        }
    });
</script>

</body>

</html>
<!-- Education Activities Tab -->
<div class="tab-pane fade show active" id="education" role="tabpanel">
    <!-- Sub navigation for Categories and Tags -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="nav nav-pills sub-nav flex-grow-1" id="educationSubNav" role="tablist">
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link active w-100" id="education-categories-tab" data-bs-toggle="pill"
                            data-bs-target="#education-categories" type="button" role="tab">
                            <i class="fas fa-folder me-2"></i>Danh mục
                            (<?php echo count($data['educationCategories']); ?>)
                        </button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="education-tags-tab" data-bs-toggle="pill"
                            data-bs-target="#education-tags" type="button" role="tab">
                            <i class="fas fa-tags me-2"></i>Tags (<?php echo count($data['educationTags']); ?>)
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="tab-content" id="educationTabContent">
        <!-- Education Categories -->
        <div class="tab-pane fade show active" id="education-categories" role="tabpanel">
            <div class="row">
                <?php foreach ($data['educationCategories'] as $category): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card category-card shadow-sm h-100">
                            <div
                                class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-white">
                                    <i class="fas fa-folder me-2"></i><?php echo htmlspecialchars($category['name']); ?>
                                </h6>
                                <div class="dropdown dropstart">
                                    <button class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"
                                                onclick="editCategory(<?php echo $category['id']; ?>)">
                                                <i class="fas fa-edit me-2"></i>Chỉnh sửa
                                            </a></li>
                                        <li><a class="dropdown-item text-danger" href="#"
                                                onclick="deleteCategory(<?php echo $category['id']; ?>)">
                                                <i class="fas fa-trash me-2"></i>Xóa
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="far fa-calendar-alt me-1"></i>
                                        <?php echo date('d/m/Y', strtotime($category['created_at'])); ?>
                                    </small>
                                    <span class="badge bg-primary">
                                        <?php echo $category['post_count']; ?> bài viết
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Add New Category Card -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card add-category-card h-100 text-center" data-bs-toggle="modal"
                        data-bs-target="#createCategoryModal" data-type="educational_activity">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <i class="fas fa-plus-circle fa-3x text-primary mb-3"></i>
                            <h6 class="text-primary">Thêm danh mục mới</h6>
                            <p class="text-muted small">Hoạt động giáo dục</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Education Tags -->
        <div class="tab-pane fade" id="education-tags" role="tabpanel">
            <div class="row">
                <?php foreach ($data['educationTags'] as $tag): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <div class="card tag-card shadow-sm h-100">
                            <div class="card-body text-center p-3">
                                <div class="tag-icon mb-2" style="color: <?php echo $tag['color']; ?>">
                                    <i class="fas fa-tag fa-2x"></i>
                                </div>
                                <h6 class="card-title mb-2"><?php echo htmlspecialchars($tag['name']); ?></h6>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge" style="background-color: <?php echo $tag['color']; ?>">
                                        <?php echo $tag['post_count']; ?> bài viết
                                    </span>
                                    <small class="text-muted">
                                        <?php echo date('d/m/Y', strtotime($tag['created_at'])); ?>
                                    </small>
                                </div>
                                <div class="btn-group btn-group-sm w-100" role="group">
                                    <button type="button" class="btn btn-outline-primary btn-sm"
                                        onclick="editTag(<?php echo $tag['id']; ?>)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                        onclick="deleteTag(<?php echo $tag['id']; ?>)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Add New Tag Card -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card add-tag-card h-100 text-center" data-bs-toggle="modal"
                        data-bs-target="#createTagModal" data-type="educational_activity">
                        <div class="card-body d-flex flex-column justify-content-center p-3">
                            <i class="fas fa-plus-circle fa-2x text-success mb-2"></i>
                            <h6 class="text-success">Thêm tag mới</h6>
                            <p class="text-muted small">Hoạt động giáo dục</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Announcements Tab -->
<div class="tab-pane fade" id="announcement" role="tabpanel">
    <!-- Sub navigation for Categories and Tags -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <ul class="nav nav-pills sub-nav flex-grow-1" id="announcementSubNav" role="tablist">
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link active w-100" id="announcement-categories-tab" data-bs-toggle="pill"
                            data-bs-target="#announcement-categories" type="button" role="tab">
                            <i class="fas fa-folder me-2"></i>Danh mục
                            (<?php echo count($data['announcementCategories']); ?>)
                        </button>
                    </li>
                    <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100" id="announcement-tags-tab" data-bs-toggle="pill"
                            data-bs-target="#announcement-tags" type="button" role="tab">
                            <i class="fas fa-tags me-2"></i>Tags
                            (<?php echo count($data['announcementTags']); ?>)
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="tab-content" id="announcementTabContent">
        <!-- Announcement Categories -->
        <div class="tab-pane fade show active" id="announcement-categories" role="tabpanel">
            <div class="row">
                <?php foreach ($data['announcementCategories'] as $category): ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card category-card shadow-sm h-100">
                            <div
                                class="card-header bg-gradient-info text-white d-flex justify-content-between align-items-center">
                                <h6 class="mb-0 text-white">
                                    <i class="fas fa-folder me-2"></i><?php echo htmlspecialchars($category['name']); ?>
                                </h6>
                                <div class="dropdown dropstart">
                                    <button class="btn btn-sm btn-outline-light" type="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#"
                                                onclick="editCategory(<?php echo $category['id']; ?>)">
                                                <i class="fas fa-edit me-2"></i>Chỉnh sửa
                                            </a></li>
                                        <li><a class="dropdown-item text-danger" href="#"
                                                onclick="deleteCategory(<?php echo $category['id']; ?>)">
                                                <i class="fas fa-trash me-2"></i>Xóa
                                            </a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="far fa-calendar-alt me-1"></i>
                                        <?php echo date('d/m/Y', strtotime($category['created_at'])); ?>
                                    </small>
                                    <span class="badge bg-info">
                                        <?php echo $category['post_count']; ?> bài viết
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Add New Category Card -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card add-category-card h-100 text-center" data-bs-toggle="modal"
                        data-bs-target="#createCategoryModal" data-type="announcement">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <i class="fas fa-plus-circle fa-3x text-info mb-3"></i>
                            <h6 class="text-info">Thêm danh mục mới</h6>
                            <p class="text-muted small">Thông báo nhà trường</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Announcement Tags -->
        <div class="tab-pane fade" id="announcement-tags" role="tabpanel">
            <div class="row">
                <?php foreach ($data['announcementTags'] as $tag): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                        <div class="card tag-card shadow-sm h-100">
                            <div class="card-body text-center p-3">
                                <div class="tag-icon mb-2" style="color: <?php echo $tag['color']; ?>">
                                    <i class="fas fa-tag fa-2x"></i>
                                </div>
                                <h6 class="card-title mb-2"><?php echo htmlspecialchars($tag['name']); ?></h6>
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="badge" style="background-color: <?php echo $tag['color']; ?>">
                                        <?php echo $tag['post_count']; ?> bài viết
                                    </span>
                                    <small class="text-muted">
                                        <?php echo date('d/m/Y', strtotime($tag['created_at'])); ?>
                                    </small>
                                </div>
                                <div class="btn-group btn-group-sm w-100" role="group">
                                    <button type="button" class="btn btn-outline-primary btn-sm"
                                        onclick="editTag(<?php echo $tag['id']; ?>)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-sm"
                                        onclick="deleteTag(<?php echo $tag['id']; ?>)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Add New Tag Card -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <div class="card add-tag-card h-100 text-center" data-bs-toggle="modal"
                        data-bs-target="#createTagModal" data-type="announcement">
                        <div class="card-body d-flex flex-column justify-content-center p-3">
                            <i class="fas fa-plus-circle fa-2x text-success mb-2"></i>
                            <h6 class="text-success">Thêm tag mới</h6>
                            <p class="text-muted small">Thông báo nhà trường</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- Create Tag Modal -->
<div class="modal fade" id="createTagModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-tag me-2"></i>Thêm tag mới
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="tagForm">
                <div class="modal-body">
                    <!-- Post Type Selection -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Loại bài viết</label>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="card post-type-card" data-type="educational_activity">
                                    <div class="card-body text-center p-3">
                                        <i class="fas fa-graduation-cap fa-2x text-primary mb-2"></i>
                                        <h6 class="text-primary">Hoạt động giáo dục</h6>
                                        <small class="text-muted">Tags cho hoạt động học tập</small>
                                        <input type="radio" name="post_type" value="educational_activity"
                                            class="form-check-input position-absolute top-0 start-0 m-2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card post-type-card" data-type="announcement">
                                    <div class="card-body text-center p-3">
                                        <i class="fas fa-bullhorn fa-2x text-info mb-2"></i>
                                        <h6 class="text-info">Thông báo nhà trường</h6>
                                        <small class="text-muted">Tags cho thông báo chính thức</small>
                                        <input type="radio" name="post_type" value="announcement"
                                            class="form-check-input position-absolute top-0 start-0 m-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tag Details -->
                    <div class="row g-3">
                        <div class="col-md-8">
                            <label for="tagName" class="form-label fw-bold">Tên tag</label>
                            <input type="text" class="form-control form-control-lg" id="tagName" name="name" required
                                placeholder="Nhập tên tag...">
                        </div>
                        <div class="col-md-4">
                            <label for="tagColor" class="form-label fw-bold">Màu sắc</label>
                            <div class="input-group">
                                <input type="color" class="form-control form-control-color form-control-lg"
                                    id="tagColor" name="color" value="#007bff">
                                <span class="input-group-text fw-bold" id="colorPreview">#007bff</span>
                            </div>
                        </div>
                    </div>

                    <!-- Color Presets -->
                    <div class="mt-4">
                        <label class="form-label fw-bold">Màu sắc gợi ý</label>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn color-preset" data-color="#007bff"
                                style="background-color: #007bff;" title="Blue"></button>
                            <button type="button" class="btn color-preset" data-color="#28a745"
                                style="background-color: #28a745;" title="Green"></button>
                            <button type="button" class="btn color-preset" data-color="#dc3545"
                                style="background-color: #dc3545;" title="Red"></button>
                            <button type="button" class="btn color-preset" data-color="#ffc107"
                                style="background-color: #ffc107;" title="Yellow"></button>
                            <button type="button" class="btn color-preset" data-color="#17a2b8"
                                style="background-color: #17a2b8;" title="Teal"></button>
                            <button type="button" class="btn color-preset" data-color="#6f42c1"
                                style="background-color: #6f42c1;" title="Purple"></button>
                            <button type="button" class="btn color-preset" data-color="#fd7e14"
                                style="background-color: #fd7e14;" title="Orange"></button>
                            <button type="button" class="btn color-preset" data-color="#20c997"
                                style="background-color: #20c997;" title="Cyan"></button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Hủy
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i>Lưu tag
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Tag Modal -->
<div class="modal fade" id="editTagModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Chỉnh sửa tag
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editTagForm">
                <div class="modal-body">
                    <input type="hidden" id="editTagId" name="id">

                    <div class="row g-3">
                        <div class="col-md-8">
                            <label for="editTagName" class="form-label fw-bold">Tên tag</label>
                            <input type="text" class="form-control form-control-lg" id="editTagName" name="name"
                                required placeholder="Nhập tên tag...">
                        </div>
                        <div class="col-md-4">
                            <label for="editTagColor" class="form-label fw-bold">Màu sắc</label>
                            <div class="input-group">
                                <input type="color" class="form-control form-control-color form-control-lg"
                                    id="editTagColor" name="color">
                                <span class="input-group-text fw-bold" id="editColorPreview">#007bff</span>
                            </div>
                        </div>
                    </div>

                    <!-- Color Presets for Edit -->
                    <div class="mt-4">
                        <label class="form-label fw-bold">Màu sắc gợi ý</label>
                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn color-preset-edit" data-color="#007bff"
                                style="background-color: #007bff;" title="Blue"></button>
                            <button type="button" class="btn color-preset-edit" data-color="#28a745"
                                style="background-color: #28a745;" title="Green"></button>
                            <button type="button" class="btn color-preset-edit" data-color="#dc3545"
                                style="background-color: #dc3545;" title="Red"></button>
                            <button type="button" class="btn color-preset-edit" data-color="#ffc107"
                                style="background-color: #ffc107;" title="Yellow"></button>
                            <button type="button" class="btn color-preset-edit" data-color="#17a2b8"
                                style="background-color: #17a2b8;" title="Teal"></button>
                            <button type="button" class="btn color-preset-edit" data-color="#6f42c1"
                                style="background-color: #6f42c1;" title="Purple"></button>
                            <button type="button" class="btn color-preset-edit" data-color="#fd7e14"
                                style="background-color: #fd7e14;" title="Orange"></button>
                            <button type="button" class="btn color-preset-edit" data-color="#20c997"
                                style="background-color: #20c997;" title="Cyan"></button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Hủy
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-1"></i>Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Create Category Modal -->
<div class="modal fade" id="createCategoryModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle me-2"></i>Thêm danh mục mới
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="categoryForm">
                <div class="modal-body">
                    <!-- Post Type Selection -->
                    <div class="mb-4">
                        <label class="form-label fw-bold">Loại bài viết</label>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="card post-type-card" data-type="educational_activity">
                                    <div class="card-body text-center p-3">
                                        <i class="fas fa-graduation-cap fa-2x text-primary mb-2"></i>
                                        <h6 class="text-primary">Hoạt động giáo dục</h6>
                                        <small class="text-muted">Các hoạt động học tập, ngoại khóa</small>
                                        <input type="radio" name="post_type" value="educational_activity"
                                            class="form-check-input position-absolute top-0 start-0 m-2">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card post-type-card" data-type="announcement">
                                    <div class="card-body text-center p-3">
                                        <i class="fas fa-bullhorn fa-2x text-info mb-2"></i>
                                        <h6 class="text-info">Thông báo nhà trường</h6>
                                        <small class="text-muted">Thông báo chính thức, hành chính</small>
                                        <input type="radio" name="post_type" value="announcement"
                                            class="form-check-input position-absolute top-0 start-0 m-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category Details -->
                    <div class="mb-4">
                        <label for="categoryName" class="form-label fw-bold">Tên danh mục</label>
                        <input type="text" class="form-control form-control-lg" id="categoryName" name="name" required
                            placeholder="Nhập tên danh mục...">
                        <div class="form-text">Tên danh mục sẽ được tự động tạo slug cho URL</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Hủy
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Lưu danh mục
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-edit me-2"></i>Chỉnh sửa danh mục
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editCategoryForm">
                <div class="modal-body">
                    <input type="hidden" id="editCategoryId" name="id">

                    <div class="mb-4">
                        <label for="editCategoryName" class="form-label fw-bold">Tên danh mục</label>
                        <input type="text" class="form-control form-control-lg" id="editCategoryName" name="name"
                            required placeholder="Nhập tên danh mục...">
                        <div class="form-text">Tên danh mục sẽ được tự động tạo slug cho URL</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Hủy
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i>Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'footer.php'; ?>

<style>
    .category-tabs .nav-link {
        border: none;
        border-bottom: 3px solid transparent;
        border-radius: 0;
        padding: 1rem 1.5rem;
        font-weight: 600;
        color: #6c757d;
        transition: all 0.3s ease;
    }

    .category-tabs .nav-link:hover {
        border-bottom-color: #dee2e6;
        background-color: #f8f9fa;
    }

    .category-tabs .nav-link.active {
        color: #495057;
        background-color: #fff;
        border-bottom-color: #007bff;
    }

    .sub-nav .nav-link {
        border-radius: 25px;
        font-weight: 500;
        transition: all 0.3s ease;
        text-align: center;
        padding: 0.75rem 1rem;
    }

    .sub-nav .nav-link.active {
        background-color: #007bff;
        color: white;
        box-shadow: 0 2px 10px rgba(0, 123, 255, 0.3);
    }

    .sub-nav .nav-link:hover:not(.active) {
        background-color: #f8f9fa;
        color: #007bff;
    }

    .sub-nav {
        background-color: #fff;
        padding: 0.5rem;
        border-radius: 30px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
    }

    .tag-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border: none;
        min-height: 140px;
        border-radius: 12px;
    }

    .tag-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1) !important;
    }

    .add-tag-card {
        border: 2px dashed #28a745;
        background-color: #f8fff9;
        cursor: pointer;
        transition: all 0.3s ease;
        min-height: 140px;
        border-radius: 12px;
    }

    .add-tag-card:hover {
        border-color: #28a745;
        background-color: #e8f5e8;
        transform: translateY(-2px);
    }

    .color-preset,
    .color-preset-edit {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: 3px solid #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        cursor: pointer;
        transition: transform 0.2s ease;
        position: relative;
    }

    .color-preset:hover,
    .color-preset-edit:hover {
        transform: scale(1.15);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        z-index: 10;
    }

    .category-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border: none;
        position: relative;
        z-index: 1;
        border-radius: 12px;
        min-height: 120px;
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
        z-index: 10;
    }

    .category-card .dropdown-menu {
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        border: none;
        border-radius: 8px;
    }

    .category-card .dropdown.show {
        position: relative;
    }

    .add-category-card {
        border: 2px dashed #dee2e6;
        background-color: #f8f9fa;
        cursor: pointer;
        transition: all 0.3s ease;
        border-radius: 12px;
        min-height: 120px;
    }

    .add-category-card:hover {
        border-color: #007bff;
        background-color: #e7f3ff;
        transform: translateY(-2px);
    }

    .post-type-card {
        border: 2px solid #e9ecef;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
    }

    .post-type-card:hover {
        border-color: #007bff;
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.1);
    }

    .post-type-card.selected {
        border-color: #007bff;
        background-color: #e7f3ff;
    }

    .bg-gradient-primary {
        background: linear-gradient(45deg, #007bff, #0056b3);
    }

    .bg-gradient-info {
        background: linear-gradient(45deg, #17a2b8, #138496);
    }

    .form-label {
        color: #495057;
    }

    .dropdown-menu {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border: none;
    }

    .modal-content {
        border-radius: 15px;
        border: none;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
    }

    .modal-header {
        border-bottom: 1px solid #e9ecef;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px 15px 0 0;
    }

    .modal-header .btn-close {
        filter: brightness(0) invert(1);
    }

    .form-control-lg {
        border-radius: 10px;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .form-control-lg:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }

    .btn {
        border-radius: 10px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
    }

    .btn-success {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        border: none;
    }
</style>

<script>
    // Auto generate slug from name (for backend processing)
    function generateSlug(text) {
        return text
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9\s-]/g, '')
            .trim()
            .replace(/\s+/g, '-');
    }

    // Post type selection
    document.querySelectorAll('.post-type-card').forEach(card => {
        card.addEventListener('click', function() {
            // Remove selected class from all cards
            document.querySelectorAll('.post-type-card').forEach(c => c.classList.remove('selected'));

            // Add selected class to clicked card
            this.classList.add('selected');

            // Check the radio button
            this.querySelector('input[type="radio"]').checked = true;
        });
    });

    // Add tag/category buttons in sub-nav click handlers
    document.querySelectorAll('button[data-bs-target="#createTagModal"], button[data-bs-target="#createCategoryModal"]')
        .forEach(btn => {
            btn.addEventListener('click', function() {
                const type = this.dataset.type;
                const modalId = this.getAttribute('data-bs-target');

                if (type && modalId) {
                    // Pre-select the post type based on button's data-type
                    const radio = document.querySelector(`${modalId} input[name="post_type"][value="${type}"]`);
                    if (radio) {
                        // Clear all selections first
                        document.querySelectorAll(`${modalId} .post-type-card`).forEach(c => c.classList.remove(
                            'selected'));

                        radio.checked = true;
                        radio.closest('.post-type-card').classList.add('selected');
                    }
                }
            });
        });

    // Add category card click handler
    document.querySelectorAll('.add-category-card').forEach(card => {
        card.addEventListener('click', function() {
            const type = this.dataset.type;

            // Pre-select the post type
            const radio = document.querySelector(`input[name="post_type"][value="${type}"]`);
            if (radio) {
                radio.checked = true;
                radio.closest('.post-type-card').classList.add('selected');
            }
        });
    });

    // Add tag card click handler
    document.querySelectorAll('.add-tag-card').forEach(card => {
        card.addEventListener('click', function() {
            const type = this.dataset.type;

            // Pre-select the post type
            const radio = document.querySelector(
                `#createTagModal input[name="post_type"][value="${type}"]`);
            if (radio) {
                radio.checked = true;
                radio.closest('.post-type-card').classList.add('selected');
            }
        });
    });

    // Color picker handlers
    document.getElementById('tagColor').addEventListener('input', function() {
        document.getElementById('colorPreview').textContent = this.value;
    });

    document.getElementById('editTagColor').addEventListener('input', function() {
        document.getElementById('editColorPreview').textContent = this.value;
    });

    // Color preset handlers
    document.querySelectorAll('.color-preset').forEach(btn => {
        btn.addEventListener('click', function() {
            const color = this.dataset.color;
            document.getElementById('tagColor').value = color;
            document.getElementById('colorPreview').textContent = color;
        });
    });

    document.querySelectorAll('.color-preset-edit').forEach(btn => {
        btn.addEventListener('click', function() {
            const color = this.dataset.color;
            document.getElementById('editTagColor').value = color;
            document.getElementById('editColorPreview').textContent = color;
        });
    });

    // Tag form submission
    document.getElementById('tagForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        // Show success message
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: 'Tag mới đã được tạo',
            showConfirmButton: false,
            timer: 2000
        }).then(() => {
            // Close modal and reset form
            const modal = bootstrap.Modal.getInstance(document.getElementById('createTagModal'));
            modal.hide();
            this.reset();
            document.querySelectorAll('.post-type-card').forEach(c => c.classList.remove('selected'));
            document.getElementById('colorPreview').textContent = '#007bff';

            // Reload page to show new tag
            location.reload();
        });
    });

    // Form submission
    document.getElementById('categoryForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        // Show success message
        Swal.fire({
            icon: 'success',
            title: 'Thành công!',
            text: 'Danh mục mới đã được tạo',
            showConfirmButton: false,
            timer: 2000
        }).then(() => {
            // Close modal and reset form
            const modal = bootstrap.Modal.getInstance(document.getElementById('createCategoryModal'));
            modal.hide();
            this.reset();
            document.querySelectorAll('.post-type-card').forEach(c => c.classList.remove('selected'));

            // Reload page to show new category
            location.reload();
        });
    });

    // Edit tag function
    function editTag(id) {
        // Mock data - in real implementation, fetch from server
        const tags = {
            1: {
                name: 'Cuộc thi',
                color: '#007bff'
            },
            2: {
                name: 'Hoạt động nhóm',
                color: '#28a745'
            },
            3: {
                name: 'Trải nghiệm',
                color: '#ffc107'
            },
            4: {
                name: 'Khẩn cấp',
                color: '#dc3545'
            },
            5: {
                name: 'Lịch học',
                color: '#6f42c1'
            },
            6: {
                name: 'Tuyển sinh',
                color: '#fd7e14'
            }
        };

        const tag = tags[id];
        if (tag) {
            document.getElementById('editTagId').value = id;
            document.getElementById('editTagName').value = tag.name;
            document.getElementById('editTagColor').value = tag.color;
            document.getElementById('editColorPreview').textContent = tag.color;

            const modal = new bootstrap.Modal(document.getElementById('editTagModal'));
            modal.show();
        }
    }

    // Delete tag function
    function deleteTag(id) {
        Swal.fire({
            title: 'Xác nhận xóa?',
            text: 'Bạn có chắc chắn muốn xóa tag này?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                // In real implementation, make API call to delete
                Swal.fire({
                    icon: 'success',
                    title: 'Đã xóa!',
                    text: 'Tag đã được xóa thành công',
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    location.reload();
                });
            }
        });
    }

    // Edit tag form submission
    document.getElementById('editTagForm').addEventListener('submit', function(e) {
        e.preventDefault();

        Swal.fire({
            icon: 'success',
            title: 'Cập nhật thành công!',
            text: 'Tag đã được cập nhật',
            showConfirmButton: false,
            timer: 2000
        }).then(() => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('editTagModal'));
            modal.hide();
            location.reload();
        });
    });

    // Edit category function
    function editCategory(id) {
        // Mock data - in real implementation, fetch from server
        const categories = {
            1: {
                name: 'Hoạt động ngoại khóa'
            },
            2: {
                name: 'Thi đấu thể thao'
            },
            3: {
                name: 'Hoạt động văn nghệ'
            },
            4: {
                name: 'Thông báo học tập'
            },
            5: {
                name: 'Thông báo hành chính'
            },
            6: {
                name: 'Thông báo sự kiện'
            }
        };

        const category = categories[id];
        if (category) {
            document.getElementById('editCategoryId').value = id;
            document.getElementById('editCategoryName').value = category.name;

            const modal = new bootstrap.Modal(document.getElementById('editCategoryModal'));
            modal.show();
        }
    }

    // Delete category function
    function deleteCategory(id) {
        Swal.fire({
            title: 'Xác nhận xóa?',
            text: 'Bạn có chắc chắn muốn xóa danh mục này?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                // In real implementation, make API call to delete
                Swal.fire({
                    icon: 'success',
                    title: 'Đã xóa!',
                    text: 'Danh mục đã được xóa thành công',
                    showConfirmButton: false,
                    timer: 2000
                }).then(() => {
                    location.reload();
                });
            }
        });
    }

    // Edit form submission
    document.getElementById('editCategoryForm').addEventListener('submit', function(e) {
        e.preventDefault();

        Swal.fire({
            icon: 'success',
            title: 'Cập nhật thành công!',
            text: 'Danh mục đã được cập nhật',
            showConfirmButton: false,
            timer: 2000
        }).then(() => {
            const modal = bootstrap.Modal.getInstance(document.getElementById('editCategoryModal'));
            modal.hide();
            location.reload();
        });
    });

    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

</body>

</html>