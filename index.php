<?php
session_start();

$url = $_GET['url'] ?? '';

if ($url == '' || $url == 'login') {
    include 'controllers/AuthController.php';
    $auth = new AuthController();
    $auth->login();
} elseif ($url == 'register') {
    include 'controllers/AuthController.php';
    $auth = new AuthController();
    $auth->register();
} elseif ($url == 'dashboard') {
    include 'controllers/DashboardController.php';
    $dash = new DashboardController();
    $dash->index();
} else {
    echo "404 Page Not Found";
}
