<?php
class DashboardController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?url=login");
            exit();
        }

        if ($_SESSION['role'] == 'student') {
            require_once 'views/dashboard/student.php';
        } else {
            require_once 'views/dashboard/university.php';
        }
    }
}
