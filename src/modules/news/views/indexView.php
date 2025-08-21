<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> - Trường THPT An Lạc</title>
    <link rel="stylesheet" href="<?php echo base_url('src/assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/fontawesome/css/all.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/common.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('src/assets/css/news.css'); ?>">
    <link rel="icon" href="<?php echo base_url('src/assets/images/logo-thpt-an-lac.png'); ?>" type="image/png">
</head>

<body>
    <!-- Header -->
    <?php include_once APP_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'header.php'; ?>

    <!-- Breadcrumb -->
    <section class="breadcrumb-section">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo create_url('home/index/index'); ?>">Trang Chủ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <h1><?php echo $page_title; ?></h1>
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
                                        <img src="<?php echo base_url('src/assets/images/' . $featured_news['image']); ?>"
                                            class="img-fluid rounded-start h-100"
                                            alt="<?php echo $featured_news['title']; ?>" style="object-fit: cover;">
                                    </div>
                                    <div class="col-md-7">
                                        <div class="card-body h-100 d-flex flex-column">
                                            <div class="badge bg-primary mb-2 align-self-start">Tin Nổi Bật</div>
                                            <h3 class="card-title">
                                                <a href="<?php echo create_url('news/index/detail?id=' . $featured_news['id']); ?>"
                                                    class="text-decoration-none"><?php echo $featured_news['title']; ?></a>
                                            </h3>
                                            <p class="card-text flex-grow-1"><?php echo $featured_news['summary']; ?></p>
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
                    <div class="news-list">
                        <h2 class="mb-4">Tất Cả Tin Tức</h2>
                        <div class="row">
                            <?php if (isset($news_list) && is_array($news_list)): ?>
                                <?php foreach ($news_list as $news): ?>
                                    <div class="col-md-6 mb-4">
                                        <div class="card h-100 border-0 shadow-sm">
                                            <img src="<?php echo base_url('src/assets/images/' . $news['image']); ?>"
                                                class="card-img-top" alt="<?php echo $news['title']; ?>"
                                                style="height: 200px; object-fit: cover;">
                                            <div class="card-body d-flex flex-column">
                                                <div class="badge bg-secondary mb-2 align-self-start">
                                                    <?php echo $news['category']; ?></div>
                                                <h5 class="card-title">
                                                    <a href="<?php echo create_url('news/index/detail?id=' . $news['id']); ?>"
                                                        class="text-decoration-none"><?php echo $news['title']; ?></a>
                                                </h5>
                                                <p class="card-text flex-grow-1">
                                                    <?php echo substr($news['summary'], 0, 150) . '...'; ?></p>
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
                        <nav aria-label="Phân trang tin tức" class="mt-4">
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
                        </nav>
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
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Categories -->
                        <div class="widget mb-4">
                            <h3>Danh Mục</h3>
                            <ul class="list-unstyled">
                                <li><a href="#" class="d-flex justify-content-between">
                                        <span>Hoạt động học tập</span>
                                        <span class="badge bg-primary">12</span>
                                    </a></li>
                                <li><a href="#" class="d-flex justify-content-between">
                                        <span>Thành tích học sinh</span>
                                        <span class="badge bg-primary">8</span>
                                    </a></li>
                                <li><a href="#" class="d-flex justify-content-between">
                                        <span>Hoạt động hướng nghiệp</span>
                                        <span class="badge bg-primary">5</span>
                                    </a></li>
                                <li><a href="#" class="d-flex justify-content-between">
                                        <span>Hoạt động ngoại khóa</span>
                                        <span class="badge bg-primary">15</span>
                                    </a></li>
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
                                                <div class="col-4">
                                                    <img src="<?php echo base_url('src/assets/images/' . $news['image']); ?>"
                                                        class="img-fluid rounded" alt="<?php echo $news['title']; ?>">
                                                </div>
                                                <div class="col-8">
                                                    <h6><a href="<?php echo create_url('news/index/detail?id=' . $news['id']); ?>"
                                                            class="text-decoration-none"><?php echo substr($news['title'], 0, 50) . '...'; ?></a>
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

                        <!-- Tags -->
                        <div class="widget">
                            <h3>Thẻ Tag</h3>
                            <div class="tags">
                                <span class="badge bg-outline-primary me-1 mb-1">#KHKT</span>
                                <span class="badge bg-outline-primary me-1 mb-1">#Olympic</span>
                                <span class="badge bg-outline-primary me-1 mb-1">#Hướng nghiệp</span>
                                <span class="badge bg-outline-primary me-1 mb-1">#Học sinh</span>
                                <span class="badge bg-outline-primary me-1 mb-1">#Giáo dục</span>
                                <span class="badge bg-outline-primary me-1 mb-1">#Thành tích</span>
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
    <script src="<?php echo base_url('src/assets/js/jquery/jquery-3.7.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('src/assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('src/assets/js/script.js'); ?>"></script>
</body>

</html>