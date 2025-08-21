<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($news_item['title']) ? $news_item['title'] : 'Chi tiết tin tức'; ?> - Trường THPT An Lạc
    </title>
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
                    <li class="breadcrumb-item"><a href="<?php echo create_url('news/index/index'); ?>">Hoạt Động Giáo
                            Dục</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
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
                            <img src="<?php echo base_url('src/assets/images/' . $news_item['image']); ?>"
                                class="img-fluid rounded" alt="<?php echo $news_item['title']; ?>">
                        </div>

                        <div class="news-summary mb-4">
                            <p class="lead"><?php echo $news_item['summary']; ?></p>
                        </div>

                        <div class="news-content">
                            <div class="content-text">
                                <?php echo nl2br($news_item['content']); ?>

                                <p class="mt-4">Hội thi đã thu hút sự quan tâm đặc biệt từ phía các em học sinh với
                                    nhiều sản phẩm sáng tạo độc đáo. Các sản phẩm tham gia hội thi đều thể hiện được
                                    tính ứng dụng cao trong thực tiễn, góp phần giải quyết các vấn đề trong cuộc sống
                                    hàng ngày.</p>

                                <h3>Các sản phẩm nổi bật</h3>
                                <ul>
                                    <li><strong>Hệ thống tưới nước tự động:</strong> Sản phẩm của đội thi lớp 11A2 giúp
                                        tối ưu hóa việc tưới cây trong vườn trường.</li>
                                    <li><strong>Ứng dụng quản lý học tập:</strong> Đội thi lớp 12B1 phát triển ứng dụng
                                        giúp học sinh theo dõi tiến độ học tập hiệu quả.</li>
                                    <li><strong>Robot dọn dẹp:</strong> Sản phẩm của lớp 10A3 có thể tự động thu gom rác
                                        trong khuôn viên trường.</li>
                                </ul>

                                <p>Ban tổ chức đã trao giải Nhất cho sản phẩm "Hệ thống tưới nước tự động" với những ưu
                                    điểm vượt trội về tính khả thi và ứng dụng thực tế. Đây cũng là dịp để các em học
                                    sinh thể hiện khả năng sáng tạo và tinh thần nghiên cứu khoa học.</p>

                                <blockquote class="blockquote text-center my-4">
                                    <p class="mb-0">"Hội thi không chỉ là sân chơi bổ ích mà còn là cơ hội để các em rèn
                                        luyện kỹ năng làm việc nhóm, tư duy sáng tạo và ứng dụng kiến thức vào thực
                                        tiễn."</p>
                                    <footer class="blockquote-footer mt-2">Thầy Nguyễn Văn Khoa, <cite
                                            title="Hiệu trưởng">Hiệu trưởng nhà trường</cite></footer>
                                </blockquote>

                                <p>Với thành công của hội thi năm nay, nhà trường sẽ tiếp tục duy trì và phát triển hoạt
                                    động này trong những năm tiếp theo, tạo điều kiện cho học sinh phát huy tối đa khả
                                    năng sáng tạo và nghiên cứu khoa học.</p>
                            </div>
                        </div>

                        <!-- Social Share -->
                        <div class="social-share mt-5 pt-4 border-top">
                            <h5 class="mb-3">Chia sẻ bài viết</h5>
                            <div class="share-buttons">
                                <a href="#" class="btn btn-primary btn-sm me-2">
                                    <i class="fab fa-facebook-f"></i> Facebook
                                </a>
                                <a href="#" class="btn btn-info btn-sm me-2">
                                    <i class="fab fa-twitter"></i> Twitter
                                </a>
                                <a href="#" class="btn btn-success btn-sm me-2">
                                    <i class="fab fa-whatsapp"></i> WhatsApp
                                </a>
                                <a href="#" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-link"></i> Copy Link
                                </a>
                            </div>
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
                                    <img src="<?php echo base_url('src/assets/images/' . $related['image']); ?>"
                                        class="card-img-top" alt="<?php echo $related['title']; ?>"
                                        style="height: 150px; object-fit: cover;">
                                    <div class="card-body">
                                        <h6 class="card-title">
                                            <a href="<?php echo create_url('news/index/detail?id=' . $related['id']); ?>"
                                                class="text-decoration-none"><?php echo substr($related['title'], 0, 60) . '...'; ?></a>
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
                                            class="text-decoration-none"><?php echo substr($recent['title'], 0, 70) . '...'; ?></a>
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
                            <h3>Liên Hệ Phòng Đào Tạo</h3>
                            <div class="contact-info">
                                <p><i class="fas fa-phone"></i> (028) 3858 5555 - Ext: 102</p>
                                <p><i class="fas fa-envelope"></i> daotao@thptanlac.edu.vn</p>
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
    <script src="<?php echo base_url('src/assets/js/jquery/jquery-3.7.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('src/assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('src/assets/js/script.js'); ?>"></script>
</body>

</html>