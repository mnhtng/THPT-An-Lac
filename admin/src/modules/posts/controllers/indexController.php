<?php
defined('APP_PATH') or exit('Do not have access to this section!');

function construct()
{
    // Khởi tạo session
    start_secure_session();
}

function indexAction()
{
    // Get search and filter parameters
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';
    $status_filter = isset($_GET['status']) ? $_GET['status'] : '';
    $category_filter = isset($_GET['category']) ? $_GET['category'] : '';
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'created_at_desc';
    $page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $per_page = 3; // Giảm xuống 3 để test pagination

    // Sample posts data with more entries for testing
    $allPosts = [
        [
            'id' => 1,
            'title' => 'Thông báo tuyển sinh năm học 2024-2025',
            'excerpt' => 'Trường THPT An Lạc thông báo về việc tuyển sinh vào năm học mới với nhiều chính sách ưu đãi dành cho học sinh có thành tích cao...',
            'featured_image' => 'thpt-an-lac.png',
            'category_name' => 'Thông báo',
            'category_id' => 2,
            'author_name' => 'Admin',
            'status' => 'published',
            'views' => 1250,
            'created_at' => '2024-08-20 14:30:00',
            'updated_at' => '2024-08-20 14:30:00'
        ],
        [
            'id' => 2,
            'title' => 'Kế hoạch tổ chức hoạt động ngoại khóa tháng 9',
            'excerpt' => 'Các hoạt động ngoại khóa phong phú được tổ chức nhằm phát triển toàn diện cho học sinh, bao gồm các câu lạc bộ thể thao, văn nghệ...',
            'featured_image' => 'hoat-dong-ngoai-khoa.jpg',
            'category_name' => 'Hoạt động',
            'category_id' => 3,
            'author_name' => 'Giáo viên Văn',
            'status' => 'draft',
            'views' => 0,
            'created_at' => '2024-08-19 09:15:00',
            'updated_at' => '2024-08-19 09:15:00'
        ],
        [
            'id' => 3,
            'title' => 'Kết quả thi học sinh giỏi cấp thành phố',
            'excerpt' => 'Chúc mừng các em học sinh đã đạt được thành tích xuất sắc trong kỳ thi học sinh giỏi cấp thành phố năm học 2023-2024...',
            'featured_image' => 'hsg-thanh-pho.jpg',
            'category_name' => 'Tin tức',
            'category_id' => 1,
            'author_name' => 'Admin',
            'status' => 'published',
            'views' => 850,
            'created_at' => '2024-08-18 16:45:00',
            'updated_at' => '2024-08-18 16:45:00'
        ],
        [
            'id' => 4,
            'title' => 'Lịch thi học kỳ I năm học 2024-2025',
            'excerpt' => 'Ban Giám hiệu nhà trường thông báo lịch thi học kỳ I năm học 2024-2025 cho toàn thể học sinh...',
            'featured_image' => '',
            'category_name' => 'Thông báo',
            'category_id' => 2,
            'author_name' => 'Phòng Đào tạo',
            'status' => 'pending',
            'views' => 324,
            'created_at' => '2024-08-17 11:20:00',
            'updated_at' => '2024-08-17 11:20:00'
        ],
        [
            'id' => 5,
            'title' => 'Chương trình học bổng khuyến học năm 2024',
            'excerpt' => 'Trường THPT An Lạc phối hợp với các nhà tài trợ tổ chức chương trình học bổng khuyến học dành cho học sinh có hoàn cảnh khó khăn...',
            'featured_image' => 'hoc-bong.jpg',
            'category_name' => 'Tin tức',
            'category_id' => 1,
            'author_name' => 'Admin',
            'status' => 'published',
            'views' => 967,
            'created_at' => '2024-08-16 08:30:00',
            'updated_at' => '2024-08-16 08:30:00'
        ],
        [
            'id' => 6,
            'title' => 'Hội thao thể dục thể thao năm học 2024-2025',
            'excerpt' => 'Hội thao thể dục thể thao năm học 2024-2025 sẽ được tổ chức vào cuối tháng 9, với nhiều môn thể thao hấp dẫn...',
            'featured_image' => 'hoi-thao.jpg',
            'category_name' => 'Hoạt động',
            'category_id' => 3,
            'author_name' => 'Tổ Thể dục',
            'status' => 'draft',
            'views' => 0,
            'created_at' => '2024-08-15 14:15:00',
            'updated_at' => '2024-08-15 14:15:00'
        ],
        [
            'id' => 7,
            'title' => 'Quy định về trang phục học sinh',
            'excerpt' => 'Ban Giám hiệu thông báo quy định mới về trang phục học sinh nhằm xây dựng môi trường giáo dục văn minh...',
            'featured_image' => '',
            'category_name' => 'Thông báo',
            'category_id' => 2,
            'author_name' => 'Ban Giám hiệu',
            'status' => 'published',
            'views' => 445,
            'created_at' => '2024-08-14 10:00:00',
            'updated_at' => '2024-08-14 10:00:00'
        ],
        [
            'id' => 8,
            'title' => 'Cuộc thi viết thư UPU lần thứ 53',
            'excerpt' => 'Thông báo về cuộc thi viết thư UPU (Universal Postal Union) lần thứ 53 năm 2024 dành cho học sinh...',
            'featured_image' => 'cuoc-thi-viet-thu.jpg',
            'category_name' => 'Tin tức',
            'category_id' => 1,
            'author_name' => 'Tổ Văn',
            'status' => 'pending',
            'views' => 167,
            'created_at' => '2024-08-13 16:20:00',
            'updated_at' => '2024-08-13 16:20:00'
        ]
    ];

    // Apply filters
    $filteredPosts = $allPosts;

    // Search filter
    if (!empty($search)) {
        $filteredPosts = array_filter($filteredPosts, function ($post) use ($search) {
            return stripos($post['title'], $search) !== false ||
                stripos($post['excerpt'], $search) !== false;
        });
    }

    // Status filter
    if (!empty($status_filter)) {
        $filteredPosts = array_filter($filteredPosts, function ($post) use ($status_filter) {
            return $post['status'] === $status_filter;
        });
    }

    // Category filter
    if (!empty($category_filter)) {
        $filteredPosts = array_filter($filteredPosts, function ($post) use ($category_filter) {
            return $post['category_id'] == $category_filter;
        });
    }

    // Sort posts
    switch ($sort) {
        case 'created_at_asc':
            usort($filteredPosts, function ($a, $b) {
                return strtotime($a['created_at']) - strtotime($b['created_at']);
            });
            break;
        case 'title_asc':
            usort($filteredPosts, function ($a, $b) {
                return strcmp($a['title'], $b['title']);
            });
            break;
        case 'title_desc':
            usort($filteredPosts, function ($a, $b) {
                return strcmp($b['title'], $a['title']);
            });
            break;
        case 'views_desc':
            usort($filteredPosts, function ($a, $b) {
                return $b['views'] - $a['views'];
            });
            break;
        case 'created_at_desc':
        default:
            usort($filteredPosts, function ($a, $b) {
                return strtotime($b['created_at']) - strtotime($a['created_at']);
            });
            break;
    }

    // Calculate statistics
    $stats = [
        'published' => count(array_filter($allPosts, function ($post) {
            return $post['status'] === 'published';
        })),
        'draft' => count(array_filter($allPosts, function ($post) {
            return $post['status'] === 'draft';
        })),
        'pending' => count(array_filter($allPosts, function ($post) {
            return $post['status'] === 'pending';
        })),
        'total_views' => array_sum(array_column($allPosts, 'views'))
    ];

    // Pagination
    $total_posts = count($filteredPosts);
    $total_pages = ceil($total_posts / $per_page);
    $offset = ($page - 1) * $per_page;
    $posts = array_slice($filteredPosts, $offset, $per_page);

    // Categories for filter dropdown
    $categories = [
        1 => 'Tin tức',
        2 => 'Thông báo',
        3 => 'Hoạt động'
    ];

    // Pass data to view
    $data = [
        'posts' => $posts,
        'stats' => $stats,
        'categories' => $categories,
        'search' => $search,
        'status_filter' => $status_filter,
        'category_filter' => $category_filter,
        'sort' => $sort,
        'pagination' => [
            'current_page' => $page,
            'total_pages' => $total_pages,
            'total_posts' => $total_posts,
            'per_page' => $per_page
        ]
    ];

    load_view('index', $data);
}

function createAction()
{
    load_view('create');
}

function editAction()
{
    load_view('edit');
}

function deleteAction()
{
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
        http_response_code(405);
        echo json_encode(['success' => false, 'message' => 'Method not allowed']);
        return;
    }

    $post_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($post_id <= 0) {
        echo json_encode(['success' => false, 'message' => 'ID bài viết không hợp lệ']);
        return;
    }

    // TODO: Add actual delete logic here
    // For now, just simulate success
    echo json_encode([
        'success' => true,
        'message' => 'Bài viết đã được xóa thành công'
    ]);
}

function bulkAction()
{
    header('Content-Type: application/json');

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        http_response_code(405);
        echo json_encode(['success' => false, 'message' => 'Method not allowed']);
        return;
    }

    $input = json_decode(file_get_contents('php://input'), true);

    if (!isset($input['action']) || !isset($input['post_ids'])) {
        echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
        return;
    }

    $action = $input['action'];
    $post_ids = $input['post_ids'];

    if (empty($post_ids)) {
        echo json_encode(['success' => false, 'message' => 'Chưa chọn bài viết nào']);
        return;
    }

    // TODO: Add actual bulk action logic here
    switch ($action) {
        case 'publish':
            $message = 'Đã xuất bản ' . count($post_ids) . ' bài viết';
            break;
        case 'draft':
            $message = 'Đã chuyển ' . count($post_ids) . ' bài viết thành nháp';
            break;
        case 'delete':
            $message = 'Đã xóa ' . count($post_ids) . ' bài viết';
            break;
        default:
            echo json_encode(['success' => false, 'message' => 'Hành động không hợp lệ']);
            return;
    }

    echo json_encode([
        'success' => true,
        'message' => $message
    ]);
}
