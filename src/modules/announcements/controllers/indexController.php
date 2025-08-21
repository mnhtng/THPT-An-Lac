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
        'page_title' => 'Thông Báo',
        'announcements_list' => getAnnouncementsList(),
        'important_announcements' => getImportantAnnouncements()
    );
    load_view('index', $data);
}

function detailAction()
{
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
    $data = array(
        'page_title' => 'Chi Tiết Thông Báo',
        'announcement' => getAnnouncementById($id),
        'related_announcements' => getRelatedAnnouncements($id)
    );
    load_view('detail', $data);
}

function getAnnouncementsList()
{
    return array(
        array(
            'id' => 1,
            'title' => 'Kế hoạch tổ chức sinh hoạt kỷ niệm Lễ Giỗ Tổ Hùng Vương 10/3/2025',
            'summary' => 'Thông báo về kế hoạch tổ chức các hoạt động kỷ niệm Lễ Giỗ Tổ Hùng Vương năm 2025 cho toàn thể cán bộ, giáo viên và học sinh.',
            'content' => 'Nhà trường thông báo kế hoạch tổ chức sinh hoạt kỷ niệm Lễ Giỗ Tổ Hùng Vương 10/3 Âm lịch năm 2025. Các hoạt động bao gồm: lễ dâng hương, thi tìm hiểu lịch sử dân tộc, và các hoạt động văn nghệ đặc sắc.',
            'date' => '2025-01-20',
            'author' => 'Ban Giám Hiệu',
            'priority' => 'high',
            'category' => 'Lễ hội',
            'attachment' => null,
            'views' => 2580
        ),
        array(
            'id' => 2,
            'title' => 'Thông báo về việc nhận bằng tốt nghiệp THPT khóa 2021-2024',
            'summary' => 'Học sinh khóa 2021-2024 có thể đến nhận bằng tốt nghiệp THPT tại phòng Đào tạo từ ngày 15/01/2025.',
            'content' => 'Học sinh đã tốt nghiệp khóa 2021-2024 vui lòng đến phòng Đào tạo để nhận bằng tốt nghiệp THPT. Thời gian: từ 7h30 đến 16h30, thứ 2 đến thứ 6. Mang theo CMND/CCCD và giấy báo tốt nghiệp.',
            'date' => '2025-01-15',
            'author' => 'Phòng Đào Tạo',
            'priority' => 'medium',
            'category' => 'Tốt nghiệp',
            'attachment' => 'danh-sach-tot-nghiep.pdf',
            'views' => 1890
        ),
        array(
            'id' => 3,
            'title' => 'Lịch thi học kỳ I năm học 2024-2025',
            'summary' => 'Công bố lịch thi cuối học kỳ I năm học 2024-2025 cho các khối lớp 10, 11, 12.',
            'content' => 'Lịch thi học kỳ I sẽ diễn ra từ ngày 20/01 đến 25/01/2025. Học sinh cần chuẩn bị đầy đủ dụng cụ học tập và có mặt trước giờ thi 15 phút. Danh sách phòng thi sẽ được công bố trước 3 ngày.',
            'date' => '2025-01-08',
            'author' => 'Phòng Khảo Thí',
            'priority' => 'high',
            'category' => 'Thi cử',
            'attachment' => 'lich-thi-hk1.pdf',
            'views' => 3240
        ),
        array(
            'id' => 4,
            'title' => 'Thông báo nghỉ lễ Tết Nguyên Đán 2025',
            'summary' => 'Thông báo lịch nghỉ Tết Nguyên Đán Ất Tỵ 2025 cho cán bộ, giáo viên và học sinh.',
            'content' => 'Nhà trường thông báo lịch nghỉ Tết Nguyên Đán 2025 từ ngày 26/01 đến hết ngày 02/02/2025. Học sinh sẽ trở lại học từ thứ Hai ngày 03/02/2025 theo thời khóa biểu bình thường.',
            'date' => '2025-01-05',
            'author' => 'Ban Giám Hiệu',
            'priority' => 'medium',
            'category' => 'Nghỉ lễ',
            'attachment' => null,
            'views' => 1560
        ),
        array(
            'id' => 5,
            'title' => 'Kế hoạch hoạt động ngoại khóa học kỳ II năm học 2024-2025',
            'summary' => 'Công bố kế hoạch các hoạt động ngoại khóa, câu lạc bộ và đội nhóm trong học kỳ II.',
            'content' => 'Học kỳ II sẽ có nhiều hoạt động ngoại khóa hấp dẫn: câu lạc bộ khoa học, đội tuyển thể thao, nhóm văn nghệ, hoạt động tình nguyện. Học sinh đăng ký tham gia từ ngày 10/02/2025.',
            'date' => '2025-01-03',
            'author' => 'Đoàn Thanh Niên',
            'priority' => 'low',
            'category' => 'Hoạt động',
            'attachment' => 'ke-hoach-ngoai-khoa.pdf',
            'views' => 980
        )
    );
}

function getImportantAnnouncements()
{
    $announcements = getAnnouncementsList();
    $important = array();

    foreach ($announcements as $announcement) {
        if ($announcement['priority'] === 'high') {
            $important[] = $announcement;
        }
    }

    return $important;
}

function getAnnouncementById($id)
{
    $announcements = getAnnouncementsList();
    foreach ($announcements as $announcement) {
        if ($announcement['id'] == $id) {
            return $announcement;
        }
    }
    return $announcements[0]; // Trả về thông báo đầu tiên nếu không tìm thấy
}

function getRelatedAnnouncements($currentId)
{
    $announcements = getAnnouncementsList();
    $related = array();

    foreach ($announcements as $announcement) {
        if ($announcement['id'] != $currentId && count($related) < 3) {
            $related[] = $announcement;
        }
    }

    return $related;
}
