-- Database structure for THPT An Lac CMS
-- Run this SQL to create the required tables
SET
    SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
    time_zone = "+00:00";

-- Create database if not exists
CREATE DATABASE IF NOT EXISTS `thpt_an_lac` DEFAULT CHARACTER
SET
    utf8mb4 COLLATE utf8mb4_unicode_ci;

USE `thpt_an_lac`;

-- Table structure for table `users`
CREATE TABLE
    `users` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `username` varchar(50) NOT NULL,
        `email` varchar(100) NOT NULL,
        `password` varchar(255) NOT NULL,
        `full_name` varchar(100) DEFAULT NULL,
        `role` enum ('admin', 'editor', 'author') DEFAULT 'author',
        `avatar` varchar(255) DEFAULT NULL,
        `status` enum ('active', 'inactive', 'banned') DEFAULT 'active',
        `last_login` datetime DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        UNIQUE KEY `username` (`username`),
        UNIQUE KEY `email` (`email`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- Table structure for table `categories`
CREATE TABLE
    `categories` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) NOT NULL,
        `slug` varchar(100) NOT NULL,
        `description` text,
        `parent_id` int (11) DEFAULT NULL,
        `sort_order` int (11) DEFAULT 0,
        `status` enum ('active', 'inactive') DEFAULT 'active',
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        UNIQUE KEY `slug` (`slug`),
        KEY `parent_id` (`parent_id`),
        KEY `status` (`status`),
        FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- Table structure for table `posts`
CREATE TABLE
    `posts` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `title` varchar(255) NOT NULL,
        `slug` varchar(255) NOT NULL,
        `content` longtext NOT NULL,
        `excerpt` text,
        `featured_image` varchar(255) DEFAULT NULL,
        `category_id` int (11) DEFAULT NULL,
        `author_id` int (11) NOT NULL,
        `status` enum ('published', 'draft', 'pending', 'private') DEFAULT 'draft',
        `post_type` enum ('post', 'page', 'news', 'announcement') DEFAULT 'post',
        `view_count` int (11) DEFAULT 0,
        `comment_count` int (11) DEFAULT 0,
        `meta_title` varchar(255) DEFAULT NULL,
        `meta_description` text,
        `meta_keywords` text,
        `published_at` datetime DEFAULT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        UNIQUE KEY `slug` (`slug`),
        KEY `category_id` (`category_id`),
        KEY `author_id` (`author_id`),
        KEY `status` (`status`),
        KEY `post_type` (`post_type`),
        KEY `published_at` (`published_at`),
        KEY `created_at` (`created_at`),
        FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
        FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- Table structure for table `post_tags`
CREATE TABLE
    `post_tags` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `post_id` int (11) NOT NULL,
        `tag_name` varchar(50) NOT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `post_id` (`post_id`),
        KEY `tag_name` (`tag_name`),
        FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- Table structure for table `comments`
CREATE TABLE
    `comments` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `post_id` int (11) NOT NULL,
        `parent_id` int (11) DEFAULT NULL,
        `author_name` varchar(100) NOT NULL,
        `author_email` varchar(100) NOT NULL,
        `author_website` varchar(255) DEFAULT NULL,
        `content` text NOT NULL,
        `status` enum ('approved', 'pending', 'spam', 'trash') DEFAULT 'pending',
        `ip_address` varchar(45) DEFAULT NULL,
        `user_agent` text,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `post_id` (`post_id`),
        KEY `parent_id` (`parent_id`),
        KEY `status` (`status`),
        KEY `created_at` (`created_at`),
        FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
        FOREIGN KEY (`parent_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- Table structure for table `media`
CREATE TABLE
    `media` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `filename` varchar(255) NOT NULL,
        `original_name` varchar(255) NOT NULL,
        `file_path` varchar(500) NOT NULL,
        `file_size` bigint (20) NOT NULL,
        `mime_type` varchar(100) NOT NULL,
        `alt_text` varchar(255) DEFAULT NULL,
        `caption` text,
        `uploaded_by` int (11) NOT NULL,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        KEY `uploaded_by` (`uploaded_by`),
        KEY `mime_type` (`mime_type`),
        KEY `created_at` (`created_at`),
        FOREIGN KEY (`uploaded_by`) REFERENCES `users` (`id`) ON DELETE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- Table structure for table `settings`
CREATE TABLE
    `settings` (
        `id` int (11) NOT NULL AUTO_INCREMENT,
        `setting_key` varchar(100) NOT NULL,
        `setting_value` longtext,
        `setting_type` enum ('string', 'number', 'boolean', 'json', 'text') DEFAULT 'string',
        `description` text,
        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id`),
        UNIQUE KEY `setting_key` (`setting_key`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- Insert default admin user
INSERT INTO
    `users` (
        `id`,
        `username`,
        `email`,
        `password`,
        `full_name`,
        `role`,
        `status`
    )
VALUES
    (
        1,
        'admin',
        'admin@thptanlac.edu.vn',
        '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'Administrator',
        'admin',
        'active'
    );

-- Insert default categories
INSERT INTO
    `categories` (
        `id`,
        `name`,
        `slug`,
        `description`,
        `sort_order`,
        `status`
    )
VALUES
    (
        1,
        'Tin tức',
        'tin-tuc',
        'Tin tức chung về trường học',
        1,
        'active'
    ),
    (
        2,
        'Thông báo',
        'thong-bao',
        'Các thông báo quan trọng',
        2,
        'active'
    ),
    (
        3,
        'Sự kiện',
        'su-kien',
        'Các sự kiện, hoạt động của trường',
        3,
        'active'
    ),
    (
        4,
        'Học tập',
        'hoc-tap',
        'Thông tin về học tập, thi cử',
        4,
        'active'
    ),
    (
        5,
        'Hoạt động ngoại khóa',
        'hoat-dong-ngoai-khoa',
        'Các hoạt động ngoại khóa của học sinh',
        5,
        'active'
    ),
    (
        6,
        'Tuyển sinh',
        'tuyen-sinh',
        'Thông tin tuyển sinh',
        6,
        'active'
    );

-- Insert default settings
INSERT INTO
    `settings` (
        `setting_key`,
        `setting_value`,
        `setting_type`,
        `description`
    )
VALUES
    (
        'site_title',
        'THPT An Lạc',
        'string',
        'Tiêu đề website'
    ),
    (
        'site_description',
        'Trường Trung học Phổ thông An Lạc',
        'text',
        'Mô tả website'
    ),
    (
        'site_keywords',
        'THPT An Lạc, trường học, giáo dục',
        'text',
        'Từ khóa SEO'
    ),
    (
        'posts_per_page',
        '10',
        'number',
        'Số bài viết hiển thị trên mỗi trang'
    ),
    (
        'allow_comments',
        '1',
        'boolean',
        'Cho phép bình luận'
    ),
    (
        'moderate_comments',
        '1',
        'boolean',
        'Kiểm duyệt bình luận trước khi hiển thị'
    ),
    (
        'timezone',
        'Asia/Ho_Chi_Minh',
        'string',
        'Múi giờ'
    ),
    (
        'date_format',
        'd/m/Y',
        'string',
        'Định dạng ngày tháng'
    ),
    (
        'time_format',
        'H:i',
        'string',
        'Định dạng thời gian'
    );

-- Insert sample posts
INSERT INTO
    `posts` (
        `title`,
        `slug`,
        `content`,
        `excerpt`,
        `category_id`,
        `author_id`,
        `status`,
        `meta_title`,
        `meta_description`,
        `published_at`,
        `created_at`
    )
VALUES
    (
        'Chào mừng đến với THPT An Lạc',
        'chao-mung-den-voi-thpt-an-lac',
        '<p>Chào mừng quý phụ huynh và các em học sinh đến với website chính thức của Trường Trung học Phổ thông An Lạc.</p><p>Với truyền thống lâu đời trong việc giáo dục và đào tạo, THPT An Lạc luôn cam kết mang đến cho học sinh một môi trường học tập tốt nhất, giúp các em phát triển toàn diện cả về tri thức lẫn nhân cách.</p><h2>Sứ mệnh của chúng tôi</h2><p>Trường THPT An Lạc có sứ mệnh:</p><ul><li>Đào tạo thế hệ trẻ có tri thức vững vàng</li><li>Phát triển tư duy sáng tạo và khả năng giải quyết vấn đề</li><li>Rèn luyện phẩm chất đạo đức và tinh thần trách nhiệm</li><li>Chuẩn bị cho học sinh bước vào đại học và cuộc sống</li></ul><h2>Cơ sở vật chất hiện đại</h2><p>Trường được trang bị:</p><ul><li>Hệ thống phòng học hiện đại với trang thiết bị tiên tiến</li><li>Thư viện với hàng nghìn đầu sách và tài liệu tham khảo</li><li>Phòng thí nghiệm Hóa học, Vật lý, Sinh học đạt chuẩn</li><li>Sân chơi, khu thể thao rộng rãi</li></ul>',
        'Chào mừng đến với website chính thức của Trường THPT An Lạc. Tìm hiểu về sứ mệnh, cơ sở vật chất và môi trường giáo dục chất lượng cao.',
        1,
        1,
        'published',
        'Chào mừng đến với THPT An Lạc - Môi trường giáo dục chất lượng',
        'Website chính thức THPT An Lạc - Trường trung học phổ thông với truyền thống giáo dục lâu đời và cơ sở vật chất hiện đại.',
        NOW (),
        NOW ()
    ),
    (
        'Thông báo lịch thi học kỳ I năm học 2024-2025',
        'thong-bao-lich-thi-hoc-ky-i-nam-hoc-2024-2025',
        '<h2>Thông báo về lịch thi học kỳ I năm học 2024-2025</h2><p>Trường THPT An Lạc thông báo lịch thi học kỳ I năm học 2024-2025 như sau:</p><h3>Thời gian thi:</h3><p><strong>Từ ngày 15/01/2025 đến ngày 25/01/2025</strong></p><h3>Lịch thi chi tiết:</h3><table border="1"><thead><tr><th>Ngày thi</th><th>Môn thi</th><th>Thời gian</th><th>Ghi chú</th></tr></thead><tbody><tr><td>15/01/2025</td><td>Ngữ văn</td><td>7h30 - 11h30</td><td>Khối 10, 11, 12</td></tr><tr><td>16/01/2025</td><td>Toán học</td><td>7h30 - 11h00</td><td>Khối 10, 11, 12</td></tr><tr><td>17/01/2025</td><td>Tiếng Anh</td><td>7h30 - 10h00</td><td>Khối 10, 11, 12</td></tr><tr><td>18/01/2025</td><td>Vật lý</td><td>7h30 - 10h00</td><td>Khối 10, 11, 12</td></tr><tr><td>20/01/2025</td><td>Hóa học</td><td>7h30 - 10h00</td><td>Khối 10, 11, 12</td></tr></tbody></table><h3>Lưu ý quan trọng:</h3><ul><li>Học sinh phải có mặt tại phòng thi trước 15 phút</li><li>Mang theo thẻ học sinh và dụng cụ học tập cần thiết</li><li>Không được mang điện thoại vào phòng thi</li><li>Trang phục gọn gàng, lịch sự</li></ul>',
        'Thông báo lịch thi học kỳ I năm học 2024-2025 cho toàn thể học sinh THPT An Lạc. Xem chi tiết thời gian và môn thi.',
        2,
        1,
        'published',
        'Lịch thi học kỳ I 2024-2025 - THPT An Lạc',
        'Thông báo lịch thi học kỳ I năm học 2024-2025 của trường THPT An Lạc. Thời gian từ 15/01 đến 25/01/2025.',
        NOW (),
        NOW ()
    ),
    (
        'Hội thao học sinh năm 2024',
        'hoi-thao-hoc-sinh-nam-2024',
        '<h2>Hội thao học sinh năm 2024 - "Thể thao để phát triển"</h2><p>Trường THPT An Lạc tổ chức Hội thao học sinh năm 2024 với chủ đề <strong>"Thể thao để phát triển"</strong>.</p><h3>Thời gian và địa điểm:</h3><ul><li><strong>Thời gian:</strong> 8h00 ngày 20/12/2024</li><li><strong>Địa điểm:</strong> Sân vận động trường THPT An Lạc</li></ul><h3>Các môn thi đấu:</h3><ol><li><strong>Điền kinh:</strong> Chạy 100m, 400m, 800m, nhảy xa, nhảy cao</li><li><strong>Bóng đá:</strong> Nam (11 người), Nữ (7 người)</li><li><strong>Bóng chuyền:</strong> Nam, Nữ (6 người)</li><li><strong>Cầu lông:</strong> Đơn nam, Đơn nữ, Đôi nam, Đôi nữ</li><li><strong>Bóng bàn:</strong> Đơn nam, Đơn nữ</li><li><strong>Kéo co:</strong> 10 người (5 nam + 5 nữ)</li></ol><h3>Đối tượng tham gia:</h3><p>Toàn thể học sinh từ khối 10 đến khối 12 chia thành các đội theo lớp.</p><h3>Giải thưởng:</h3><ul><li>Cúp vô địch toàn đoàn</li><li>Giải nhất, nhì, ba từng môn thi đấu</li><li>Giải phong trào</li><li>Giải thể thao sạch</li></ul><p>Mọi thắc mắc xin liên hệ với Ban tổ chức qua tổ Thể dục thể thao của trường.</p>',
        'Hội thao học sinh THPT An Lạc 2024 với chủ đề "Thể thao để phát triển". Nhiều môn thi đấu hấp dẫn và giải thưởng giá trị.',
        3,
        1,
        'published',
        'Hội thao học sinh 2024 - THPT An Lạc',
        'Tham gia Hội thao học sinh THPT An Lạc 2024 với nhiều môn thể thao hấp dẫn và giải thưởng giá trị.',
        NOW (),
        NOW ()
    );

COMMIT;