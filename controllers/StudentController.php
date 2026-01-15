<?php
class StudentController {
    
    public function profile() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?url=login");
            exit();
        }

        require_once 'config/database.php';
        require_once 'models/Student.php';

        $database = new Database();
        $db = $database->getConnection();
        $student = new Student($db);

        $user_id = $_SESSION['user_id'];
        
        $data = $student->getProfile($user_id);
        
        if (!$data) {
            echo "User not found";
            exit();
        }
        
        require_once 'views/student/profile.php';
    }

    public function universities() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?url=login");
            exit();
        }
        require_once 'views/student/universities.php';
    }

    public function updateProfile() {
        require_once 'config/database.php';
        require_once 'models/Student.php';

        $database = new Database();
        $db = $database->getConnection();
        $student = new Student($db);

        $user_id = $_SESSION['user_id'];
        $name = $_POST['name'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';

        if ($student->updateProfile($user_id, $name, $phone, $address)) {
            $success = "Profile updated successfully";
        } else {
            $error = "Update failed";
        }
        
        $data = $student->getProfile($user_id);
        require_once 'views/student/profile.php';
    }
}
?>
