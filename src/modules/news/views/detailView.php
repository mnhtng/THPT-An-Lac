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

    <title>Chi Tiết Tin Tức</title>
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
                    <li class="breadcrumb-item"><a href="<?php echo create_url('news'); ?>">Hoạt Động Giáo Dục</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi Tiết Tin Tức</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- News Detail Section -->
    <section class="news-detail-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php if (isset($news_item)): ?>
                        <article class="news-detail">
                            <div class="news-header mb-4">
                                <div class="badge bg-primary mb-3"><?php echo $news_item['category']; ?></div>

                                <h1 class="news-title"><?php echo $news_item['title']; ?></h1>

                                <div class="news-meta mb-4">
                                    <span class="text-muted">
                                        <i class="fas fa-calendar"></i>
                                        <?php echo date('d/m/Y H:i', strtotime($news_item['date'])); ?>
                                    </span>
                                    <span class="text-muted ms-3">
                                        <i class="fas fa-user"></i> <?php echo $news_item['author']; ?>
                                    </span>
                                    <span class="text-muted ms-3">
                                        <i class="fas fa-eye"></i> <?php echo number_format($news_item['views']); ?> lượt
                                        xem
                                    </span>
                                </div>
                            </div>

                            <div class="news-image mb-4">
                                <img src="<?php echo !empty($news_item['image']) ? $news_item['image'] : 'src/assets/images/placeholder.php?w=800&h=400&text=' . urlencode($news_item['category']) . '&bg=f3f4f6&color=6b7280'; ?>"
                                    class="img-fluid rounded h-auto"
                                    alt="<?php echo htmlspecialchars($news_item['title']); ?>" loading="lazy"
                                    onerror="this.src='src/assets/images/placeholder.php?w=800&h=400&text=<?php echo urlencode('Hình ảnh lỗi'); ?>&bg=fee2e2&color=dc2626';">
                            </div>

                            <div class="news-content">
                                <?php echo $news_item['content']; ?>
                            </div>
                        </article>
                    <?php endif; ?>

                    <!-- Related News -->
                    <?php if (isset($related_news) && !empty($related_news)): ?>
                        <section class="related-news mt-5 pt-5 border-top">
                            <h3 class="mb-4">Tin Tức Liên Quan</h3>
                            <div class="row">
                                <?php foreach ($related_news as $related): ?>
                                    <div class="col-md-4 mb-4">
                                        <div class="card h-100 border-0 shadow-sm">
                                            <img src="<?php echo !empty($related['image']) ? $related['image'] : 'src/assets/images/placeholder.php?w=400&h=150&text=' . urlencode($related['category']) . '&bg=f3f4f6&color=6b7280'; ?>"
                                                class="card-img-top" alt="<?php echo htmlspecialchars($related['title']); ?>"
                                                style="height: 150px; object-fit: cover;" loading="lazy"
                                                onerror="this.src='src/assets/images/placeholder.php?w=400&h=150&text=<?php echo urlencode('Hình ảnh lỗi'); ?>&bg=fee2e2&color=dc2626';">
                                            <div class="card-body">
                                                <h6 class="card-title">
                                                    <a href="<?php echo create_url('news/index/detail?id=' . $related['id']); ?>"
                                                        title="<?php echo htmlspecialchars($related['title']); ?>"
                                                        class="text-decoration-none"><?php echo substr($related['title'], 0, 100) . (strlen($related['title']) > 100 ? '...' : ''); ?></a>
                                                </h6>
                                                <small class="text-muted">
                                                    <i class="fas fa-calendar"></i>
                                                    <?php echo date('d/m/Y', strtotime($related['date'])); ?>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </section>
                    <?php endif; ?>
                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <!-- Back to News List -->
                        <div class="widget mb-4">
                            <a href="<?php echo create_url('news/index/index'); ?>"
                                class="btn btn-outline-primary w-100">
                                <i class="fas fa-arrow-left"></i> Quay lại danh sách tin tức
                            </a>
                        </div>

                        <!-- Recent News -->
                        <div class="widget mb-4">
                            <h3>Tin Mới Nhất</h3>
                            <?php if (isset($related_news) && !empty($related_news)): ?>
                                <div class="recent-news">
                                    <?php foreach (array_slice($related_news, 0, 3) as $recent): ?>
                                        <div class="recent-item mb-3 pb-3 border-bottom">
                                            <h6><a href="<?php echo create_url('news/index/detail?id=' . $recent['id']); ?>"
                                                    title="<?php echo htmlspecialchars($recent['title']); ?>"
                                                    class="text-decoration-none"><?php echo substr($recent['title'], 0, 100) . (strlen($recent['title']) > 100 ? '...' : ''); ?></a>
                                            </h6>
                                            <small class="text-muted">
                                                <i class="fas fa-calendar"></i>
                                                <?php echo date('d/m/Y', strtotime($recent['date'])); ?>
                                            </small>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Contact Info -->
                        <div class="widget">
                            <h3>Thông Tin Liên Hệ</h3>
                            <div class="contact-info">
                                <p><i class="fas fa-map-marker-alt"></i> 595 Kinh Dương Vương, Phường An Lạc, Thành phố
                                    Hồ Chí Minh</p>
                                <p><i class="fas fa-phone"></i> (028) 38750022</p>
                                <p><i class="fas fa-envelope"></i> c3anlac.tphcm@moet.edu.vn</p>
                                <p><i class="fas fa-clock"></i> Thứ 2 - Thứ 6: 7:00 - 17:00</p>
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