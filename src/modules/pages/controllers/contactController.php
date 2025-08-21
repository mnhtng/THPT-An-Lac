<?php
defined('APP_PATH') or exit('Do not have access to this section!');

function construct()
{
    // Khởi tạo session
    start_secure_session();
}

function indexAction()
{
    load_view('contact');
}
