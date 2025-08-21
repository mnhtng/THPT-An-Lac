<?php
session_start();
require_once '../../helper/functions.php';

// Destroy session
session_destroy();

// Redirect to login page
redirect('login.php');
?>