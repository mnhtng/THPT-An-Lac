<?php
defined('APP_PATH') or exit('Do not have access to this section!');

function construct()
{
    // Khởi tạo session
    start_secure_session();
}

function indexAction()
{
    $data = array(
        'page_title' => 'Hoạt Động Giáo Dục',
        'news_list' => getNewsList(),
        'featured_news' => getFeaturedNews()
    );
    load_view('index', $data);
}

function detailAction()
{
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
    $data = array(
        'page_title' => 'Chi Tiết Tin Tức',
        'news_item' => getNewsById($id),
        'related_news' => getRelatedNews($id)
    );
    load_view('detail', $data);
}

function getNewsList()
{
    return array(
        array(
            'id' => 1,
            'title' => 'Chuyên đề hội thi Sản phẩm sáng tạo khoa học kỹ thuật năm 2025',
            'summary' => 'Trường THPT An Lạc tổ chức hội thi sản phẩm sáng tạo khoa học kỹ thuật nhằm khuyến khích tinh thần nghiên cứu và sáng tạo của học sinh.',
            'content' => 'Ngày 15/01/2025, trường THPT An Lạc đã tổ chức thành công hội thi Sản phẩm sáng tạo khoa học kỹ thuật với sự tham gia của 50 đội thi đến từ các lớp 10, 11, 12. Hội thi nhằm tạo sân chơi bổ ích cho học sinh phát huy tài năng, khả năng sáng tạo trong lĩnh vực khoa học kỹ thuật.',
            'image' => 'placeholder.php?w=400&h=300&text=Hội thi KHKT&bg=1e3a8a&color=ffffff',
            'date' => '2025-01-15',
            'author' => 'Ban Biên Tập',
            'views' => 1250,
            'category' => 'Hoạt động học tập'
        ),
        array(
            'id' => 2,
            'title' => 'Học sinh lớp 12A1 đạt giải nhất Olympic Toán cấp thành phố',
            'summary' => 'Em Nguyễn Văn An, học sinh lớp 12A1 đã xuất sắc giành giải nhất Olympic Toán cấp thành phố năm học 2024-2025.',
            'content' => 'Với sự chuẩn bị kỹ lưỡng và sự hướng dẫn tận tình của thầy cô, em Nguyễn Văn An đã vượt qua 200 thí sinh khác để giành giải nhất Olympic Toán. Đây là thành tích đáng tự hào của nhà trường.',
            'image' => 'placeholder.php?w=400&h=300&text=Olympic Toán&bg=10b981&color=ffffff',
            'date' => '2025-01-12',
            'author' => 'Phòng Đào Tạo',
            'views' => 890,
            'category' => 'Thành tích học sinh'
        ),
        array(
            'id' => 3,
            'title' => 'Chương trình tư vấn hướng nghiệp cho học sinh lớp 12',
            'summary' => 'Nhà trường tổ chức chương trình tư vấn hướng nghiệp nhằm giúp học sinh lớp 12 định hướng tương lai và lựa chọn ngành nghề phù hợp.',
            'content' => 'Chương trình tư vấn hướng nghiệp được tổ chức với sự tham gia của các chuyên gia từ nhiều trường đại học và doanh nghiệp. Học sinh được cung cấp thông tin về các ngành nghề, yêu cầu tuyển sinh và triển vọng việc làm.',
            'image' => 'placeholder.php?w=400&h=300&text=Tư vấn hướng nghiệp&bg=3b82f6&color=ffffff',
            'date' => '2025-01-10',
            'author' => 'Phòng Hướng Nghiệp',
            'views' => 567,
            'category' => 'Hoạt động hướng nghiệp'
        )
    );
}

function getFeaturedNews()
{
    $news = getNewsList();
    return $news[0]; // Tin nổi bật đầu tiên
}

function getNewsById($id)
{
    $news = getNewsList();
    foreach ($news as $item) {
        if ($item['id'] == $id) {
            return $item;
        }
    }
    return $news[0]; // Trả về tin đầu tiên nếu không tìm thấy
}

function getRelatedNews($currentId)
{
    $news = getNewsList();
    $related = array();
    foreach ($news as $item) {
        if ($item['id'] != $currentId && count($related) < 3) {
            $related[] = $item;
        }
    }
    return $related;
}
