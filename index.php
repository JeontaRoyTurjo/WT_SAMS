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
} elseif ($url == 'login_submit') {
    include 'controllers/AuthController.php';
    $auth = new AuthController();
    $auth->loginSubmit();
} elseif ($url == 'register_submit') {
    include 'controllers/AuthController.php';
    $auth = new AuthController();
    $auth->registerSubmit();
} elseif ($url == 'profile') {
    include 'controllers/StudentController.php';
    $studentCallback = new StudentController();
    $studentCallback->profile();
} elseif ($url == 'update_profile') {
    include 'controllers/StudentController.php';
    $studentCallback = new StudentController();
    $studentCallback->updateProfile();
} elseif ($url == 'logout') {
    include 'controllers/AuthController.php';
    $auth = new AuthController();
    $auth->logout();
} elseif ($url == 'reset_password') {
    include 'controllers/AuthController.php';
    $auth = new AuthController();
    $auth->resetPassword();
} elseif ($url == 'reset_password_submit') {
    include 'controllers/AuthController.php';
    $auth = new AuthController();
    $auth->resetPasswordSubmit();
} else {
    echo "404 Page Not Found";
}
