<?php
function start_secure_session()
{
    if (session_status() === PHP_SESSION_NONE) {
        ini_set('session.use_only_cookies', 1);
        ini_set('session.cookie_httponly', 1);
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            ini_set('session.cookie_secure', 1);
        }
        session_start();
    }
}
