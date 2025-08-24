<?php
function getFeaturedNews()
{
    $news = list_news();
    return $news[0]; // Tin nổi bật đầu tiên
}

function getNewsById($id)
{
    $news = list_news();
    foreach ($news as $item) {
        if ($item['id'] == $id) {
            return $item;
        }
    }
    return $news[0]; // Trả về tin đầu tiên nếu không tìm thấy
}

function getRelatedNews($currentId)
{
    $news = list_news();
    $related = array();
    foreach ($news as $item) {
        if ($item['id'] != $currentId && count($related) < 3) {
            $related[] = $item;
        }
    }
    return $related;
}
