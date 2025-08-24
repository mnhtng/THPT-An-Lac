<?php
defined('APP_PATH') or exit('Do not have access to this section!');

function construct()
{
    // Khởi tạo session
    start_secure_session();

    load('helper', 'announcement_module');
}

function indexAction()
{
    $data = array(
        'announcements_list' => list_announcements(),
        'important_announcements' => getImportantAnnouncements()
    );

    load_view('index', $data);
}

function detailAction()
{
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
    $announcement = getAnnouncementById($id);

    if (!$announcement) {
        // Redirect to announcements list if not found
        header('Location: ' . create_url('announcements'));
        exit;
    }

    // Update view count (in real implementation, this would update database)
    $announcement['views'] = ($announcement['views'] ?? 0) + 1;

    // Get previous and next announcements
    $navigation = getAnnouncementNavigation($id);

    $data = array(
        'announcement_item' => $announcement,
        'related_announcements' => getRelatedAnnouncements($id),
        'prev_announcement' => $navigation['prev'],
        'next_announcement' => $navigation['next']
    );

    load_view('detail', $data);
}
