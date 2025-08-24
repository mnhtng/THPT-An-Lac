<?php
defined('APP_PATH') or exit('Do not have access to this section!');

function construct()
{
    // Khởi tạo session
    start_secure_session();

    load('helper', 'news_module');
}

function indexAction()
{
    $data = array(
        'news_list' => list_news(),
        'featured_news' => getFeaturedNews()
    );

    load_view('index', $data);
}

function detailAction()
{
    $id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
    $data = array(
        'news_item' => getNewsById($id),
        'related_news' => getRelatedNews($id)
    );

    load_view('detail', $data);
}
