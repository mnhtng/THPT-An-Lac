<?php

/**
 * Set flash message
 */
function set_flash_message($type, $message)
{
    if (!isset($_SESSION)) {
        start_secure_session();
    }

    $_SESSION['flash_messages'][] = [
        'type' => $type,
        'message' => $message
    ];
}

/**
 * Get flash messages
 */
function get_flash_messages()
{
    if (!isset($_SESSION)) {
        start_secure_session();
    }

    $messages = $_SESSION['flash_messages'] ?? [];
    unset($_SESSION['flash_messages']);

    return $messages;
}

/**
 * Check if has flash messages
 */
function has_flash_messages()
{
    if (!isset($_SESSION)) {
        start_secure_session();
    }

    return !empty($_SESSION['flash_messages']);
}

/**
 * Display flash messages HTML
 */
function display_flash_messages()
{
    $messages = get_flash_messages();

    if (empty($messages)) {
        return '';
    }

    $html = '';
    foreach ($messages as $message) {
        $alertClass = '';
        switch ($message['type']) {
            case 'success':
                $alertClass = 'alert-success';
                break;
            case 'error':
                $alertClass = 'alert-danger';
                break;
            case 'warning':
                $alertClass = 'alert-warning';
                break;
            case 'info':
                $alertClass = 'alert-info';
                break;
            default:
                $alertClass = 'alert-primary';
        }

        $html .= '<div class="alert ' . $alertClass . ' alert-dismissible fade show" role="alert">';
        $html .= htmlspecialchars($message['message'], ENT_QUOTES, 'UTF-8');
        $html .= '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        $html .= '</div>';
    }

    return $html;
}
