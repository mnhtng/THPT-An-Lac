<?php
function base_url($url = "")
{
    global $config;
    return $config['base_url'] . $url;
}

function redirect($url = "")
{
    global $config;
    header("Location: " . $config['base_url'] . $url);
}

function create_url($url = "")
{
    global $config;
    // Convert url like "module/controller/action" to proper query string
    $parts = explode('/', trim($url, '/'));

    if (empty($parts) || empty($parts[0])) {
        return $config['base_url'];
    }

    $query_parts = [];

    // Module
    if (isset($parts[0])) {
        $query_parts[] = "mod=" . $parts[0];
    }

    // Controller
    if (isset($parts[1])) {
        $query_parts[] = "controller=" . $parts[1];
    }

    // Action
    if (isset($parts[2])) {
        $query_parts[] = "act=" . $parts[2];
    }

    // Additional parameters (like ?id=5)
    $url_with_params = $url;
    if (strpos($url, '?') !== false) {
        list($base_url_part, $params) = explode('?', $url, 2);
        $parts = explode('/', trim($base_url_part, '/'));

        // Rebuild query parts from clean base
        $query_parts = [];
        if (isset($parts[0])) $query_parts[] = "mod=" . $parts[0];
        if (isset($parts[1])) $query_parts[] = "controller=" . $parts[1];
        if (isset($parts[2])) $query_parts[] = "act=" . $parts[2];

        // Add additional params
        $query_parts[] = $params;
    }

    return $config['base_url'] . '?' . implode('&', $query_parts);
}
