<?php
defined('APP_PATH') or exit('Do not have access to this section!');

function construct()
{
    // Khởi tạo session
    start_secure_session();

    load('helper', 'news_module');
    load('helper', 'announcement_module');
}

function indexAction()
{
    $data = [
        'news_item' => getNewsById(1),
        'related_news' => getRelatedNews(1),
        'announcements_list' => list_announcements(),
    ];


    load_view('index', $data);
}
