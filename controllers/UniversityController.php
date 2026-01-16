<?php
class UniversityController {
    
    public function profile() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?url=login");
            exit();
        }

        require_once 'config/database.php';
        require_once 'models/University.php';

        $database = new Database();
        $db = $database->getConnection();
        $university = new University($db);

        $user_id = $_SESSION['user_id'];
        
        $data = $university->getProfile($user_id);
        
        if (!$data) {
            echo "User not found";
            exit();
        }
        
        require_once 'views/university/profile.php';
    }

    public function updateProfile() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?url=login");
            exit();
        }

        require_once 'config/database.php';
        require_once 'models/University.php';

        $database = new Database();
        $db = $database->getConnection();
        $university = new University($db);

        $user_id = $_SESSION['user_id'];
        $university_name = $_POST['university_name'] ?? '';
        $location = $_POST['location'] ?? '';
        $description = $_POST['description'] ?? '';

        if ($university->updateProfile($user_id, $university_name, $location, $description)) {
            $success = "Profile updated successfully";
        } else {
            $error = "Update failed";
        }
        
        $data = $university->getProfile($user_id);
        require_once 'views/university/profile.php';
    }

    public function getUniversitiesJSON() {
        header('Content-Type: application/json');
        require_once 'config/database.php';
        require_once 'models/University.php';

        $database = new Database();
        $db = $database->getConnection();
        $university = new University($db);

        $universities = $university->getAll();
        echo json_encode($universities);
    }

    public function getUniversityDetailsJSON() {
        header('Content-Type: application/json');
        require_once 'config/database.php';
        require_once 'models/University.php';

        $database = new Database();
        $db = $database->getConnection();
        $university = new University($db);

        require_once 'models/Course.php';

        $id = $_GET['id'] ?? 0;
        $details = $university->getById($id);
        
        if ($details) {
            $courseModel = new Course($db);
            $courses = $courseModel->getCourses($id);
            $details['courses'] = $courses;
        }
        
        echo json_encode($details);
    }
}
?>
