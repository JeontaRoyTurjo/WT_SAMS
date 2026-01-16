<?php
class Course {
    public $conn;

    function __construct($db) {
        $this->conn = $db;
    }

    function addCourse($university_id, $department, $course_name) {
        $sql = "INSERT INTO courses (university_id, department, course_name) VALUES ('$university_id', '$department', '$course_name')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function removeCourse($id) {
        $sql = "DELETE FROM courses WHERE id = '$id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function getCourses($university_id) {
        $sql = "SELECT * FROM courses WHERE university_id = '$university_id'";
        $result = $this->conn->query($sql);
        
        $courses = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $courses[] = $row;
            }
        }
        return $courses;
    }
}
?>
