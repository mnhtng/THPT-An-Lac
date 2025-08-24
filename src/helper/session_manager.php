<?php
function start_secure_session()
{
    if (session_status() === PHP_SESSION_NONE) {
        // --- Config an toàn cho session ---
        ini_set('session.use_strict_mode', 1);          // tránh PHP chấp nhận session ID chưa tồn tại/lạ (ngăn hijack)
        ini_set('session.use_only_cookies', 1);         // không cho truyền session ID qua URL
        ini_set('session.cookie_httponly', 1);          // ngăn JavaScript đọc cookie
        ini_set('session.cookie_secure', (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 1 : 0); // nếu HTTPS → cookie chỉ gửi qua HTTPS
        ini_set('session.cookie_samesite', 'Strict');   // Ngăn CSRF basic (tránh gửi cookie cross-site)

        // --- Bắt đầu session ---
        session_start();

        // --- Regenerate ID nếu là lần đầu hoặc quá 30 phút ---
        if (!isset($_SESSION['session_started']) || (time() - $_SESSION['session_started'] > 1800)) {
            $_SESSION['session_started'] = time();
            session_regenerate_id(true);
        }

        // --- Idle timeout (tự logout nếu không hoạt động 15 phút) ---
        if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 900)) {
            session_unset();
            session_destroy();
            session_start();
        }

        $_SESSION['last_activity'] = time();
    }
}
