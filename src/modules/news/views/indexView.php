<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="src/assets/images/logo-thpt-an-lac.png" type="image/png">

    <link rel="stylesheet" href="src/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/assets/css/fontawesome/css/all.css">
    <link rel="stylesheet" href="src/assets/css/common.css">
    <link rel="stylesheet" href="src/assets/css/style.css">
    <link rel="stylesheet" href="src/assets/css/news.css">

    <title>Hoạt Động Giáo Dục</title>
</head>

<body>
    <!-- Header -->
    <?php include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'header.php'; ?>

    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="?">Trang Chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hoạt Động Giáo Dục</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h1>Hoạt Động Giáo Dục</h1>
                <p class="lead">Cập nhật các hoạt động giáo dục và tin tức mới nhất của trường THPT An Lạc</p>
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <!-- Featured News -->
                    <?php if (isset($featured_news)): ?>
                        <div class="featured-news mb-5">
                            <div class="card border-0 shadow-sm">
                                <div class="row g-0">
                                    <div class="col-md-5">
                                        <a href="<?php echo create_url('news/index/detail?id=' . $featured_news['id']); ?>">
                                            <img src="<?php echo !empty($featured_news['image']) ? $featured_news['image'] : 'src/assets/images/placeholder.php?w=400&h=250&text=' . urlencode('Tin Nổi Bật') . '&bg=f3f4f6&color=6b7280'; ?>"
                                                class="img-fluid rounded-start h-100"
                                                alt="<?php echo $featured_news['title']; ?>" style="object-fit: cover;"
                                                loading="lazy"
                                                onerror="this.src='src/assets/images/placeholder.php?w=400&h=250&text=<?php echo urlencode('Hình ảnh lỗi'); ?>&bg=fee2e2&color=dc2626';">
                                        </a>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body h-100 d-flex flex-column">
                                            <div class="badge bg-primary mb-2 align-self-start">Tin Nổi Bật</div>
                                            <h3 class="card-title">
                                                <a href="<?php echo create_url('news/index/detail?id=' . $featured_news['id']); ?>"
                                                    class="text-decoration-none"
                                                    title="<?php echo htmlspecialchars($featured_news['title']); ?>">
                                                    <?php echo $featured_news['title']; ?>
                                                </a>
                                            </h3>
                                            <p class="card-text flex-grow-1 truncate"
                                                style="width: 100%; line-clamp: 3; -webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">
                                                <?php echo $featured_news['summary']; ?>
                                            </p>
                                            <div class="news-meta">
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar"></i>
                                                    <?php echo date('d/m/Y', strtotime($featured_news['date'])); ?>
                                                    <i class="fas fa-user ms-3"></i> <?php echo $featured_news['author']; ?>
                                                    <i class="fas fa-eye ms-3"></i>
                                                    <?php echo number_format($featured_news['views']); ?> lượt xem
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- News List -->
                    <div class="newdivist">
                        <h2 class="mb-4">Tất Cả Tin Tức</h2>
                        <div class="row">
                            <?php if (isset($news_list) && is_array($news_list)): ?>
                                <?php foreach ($news_list as $news): ?>
                                    <div class="col-md-6 mb-4">
                                        <div class="card h-100 border-0 shadow-sm">
                                            <a href="<?php echo create_url('news/index/detail?id=' . $news['id']); ?>">
                                                <img src="<?php echo !empty($news['image']) ? $news['image'] : 'src/assets/images/placeholder.php?w=400&h=200&text=' . urlencode($news['category']) . '&bg=f9fafb&color=4b5563'; ?>"
                                                    class="card-img-top" alt="<?php echo $news['title']; ?>"
                                                    style="height: 200px; object-fit: cover;" loading="lazy"
                                                    onerror="this.src='src/assets/images/placeholder.php?w=400&h=200&text=<?php echo urlencode('Hình ảnh lỗi'); ?>&bg=fee2e2&color=dc2626';">
                                            </a>
                                            <div class="card-body d-flex flex-column">
                                                <div class="badge bg-secondary mb-2 align-self-start">
                                                    <?php echo $news['category']; ?></div>
                                                <h5 class="card-title">
                                                    <a href="<?php echo create_url('news/index/detail?id=' . $news['id']); ?>"
                                                        class="text-decoration-none"
                                                        title="<?php echo htmlspecialchars($news['title']); ?>">
                                                        <?php echo $news['title']; ?>
                                                    </a>
                                                </h5>
                                                <p class="card-text flex-grow-1 truncate"
                                                    style="width: 100%; line-clamp: 3; -webkit-line-clamp: 3; display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;">
                                                    <?php echo $news['summary']; ?>
                                                </p>
                                                <div class="news-meta mt-auto">
                                                    <small class="text-muted">
                                                        <i class="fas fa-calendar"></i>
                                                        <?php echo date('d/m/Y', strtotime($news['date'])); ?>
                                                        <i class="fas fa-eye ms-2"></i>
                                                        <?php echo number_format($news['views']); ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>

                        <!-- Pagination -->
                        <!-- <nav aria-label="Phân trang tin tức" class="mt-4">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Trước</a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Sau</a>
                                </li>
                            </ul>
                        </nav> -->
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Search -->
                        <div class="widget mb-4">
                            <h3>Tìm Kiếm</h3>
                            <form class="search-form">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Nhập từ khóa...">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Categories -->
                        <div class="widget mb-4">
                            <h3>Danh Mục</h3>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <p
                                        class="d-flex justify-content-between align-items-center text-decoration-none category-link text-primary">
                                        <span><i class="fas fa-trophy text-warning me-2"></i>Thành tích & Khen
                                            thưởng</span>
                                        <span class="badge bg-primary">2</span>
                                    </p>
                                </li>
                                <li class="mb-2">
                                    <p
                                        class="d-flex justify-content-between align-items-center text-decoration-none category-link text-primary">
                                        <span><i class="fas fa-book text-success me-2"></i>Chương trình học tập</span>
                                        <span class="badge bg-success">0</span>
                                    </p>
                                </li>
                                <li class="mb-2">
                                    <p
                                        class="d-flex justify-content-between align-items-center text-decoration-none category-link text-primary">
                                        <span><i class="fas fa-users text-info me-2"></i>Hoạt động văn hóa - xã
                                            hội</span>
                                        <span class="badge bg-info">0</span>
                                    </p>
                                </li>
                                <li class="mb-2">
                                    <p
                                        class="d-flex justify-content-between align-items-center text-decoration-none category-link text-primary">
                                        <span><i class="fas fa-flask text-danger me-2"></i>Hoạt động trải nghiệm</span>
                                        <span class="badge bg-danger">0</span>
                                    </p>
                                </li>
                                <li class="mb-2">
                                    <p
                                        class="d-flex justify-content-between align-items-center text-decoration-none category-link text-primary">
                                        <span><i class="fas fa-compass text-secondary me-2"></i>Định hướng nghề
                                            nghiệp</span>
                                        <span class="badge bg-secondary">0</span>
                                    </p>
                                </li>
                            </ul>
                        </div>

                        <!-- Recent News -->
                        <div class="widget mb-4">
                            <h3>Tin Mới Nhất</h3>
                            <div class="recent-news">
                                <?php if (isset($news_list) && is_array($news_list)): ?>
                                    <?php $recent = array_slice($news_list, 0, 3); ?>
                                    <?php foreach ($recent as $news): ?>
                                        <div class="recent-item mb-3">
                                            <div class="row g-2">
                                                <div class="col-4 d-flex align-items-center">
                                                    <a href="<?php echo create_url('news/index/detail?id=' . $news['id']); ?>">
                                                        <img src="<?php echo !empty($news['image']) ? $news['image'] : 'src/assets/images/placeholder.php?w=150&h=100&text=' . urlencode('Tin tức') . '&bg=f3f4f6&color=6b7280'; ?>"
                                                            class="img-fluid rounded" alt="<?php echo $news['title']; ?>"
                                                            loading="lazy"
                                                            onerror="this.src='src/assets/images/placeholder.php?w=150&h=100&text=<?php echo urlencode('Lỗi'); ?>&bg=fee2e2&color=dc2626';">
                                                    </a>
                                                </div>
                                                <div class="col-8">
                                                    <h6>
                                                        <a href="<?php echo create_url('news/index/detail?id=' . $news['id']); ?>"
                                                            class="text-decoration-none"
                                                            title="<?php echo htmlspecialchars($news['title']); ?>">
                                                            <?php echo substr($news['title'], 0, 100) . (strlen($news['title']) > 100 ? '...' : ''); ?>
                                                        </a>
                                                    </h6>
                                                    <small class="text-muted">
                                                        <i class="fas fa-calendar"></i>
                                                        <?php echo date('d/m/Y', strtotime($news['date'])); ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'footer.php'; ?>

    <!-- Scripts -->
    <script src="src/assets/js/jquery/jquery-3.7.1.min.js"></script>
    <script src="src/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="src/assets/js/script.js"></script>
</body>

</html>