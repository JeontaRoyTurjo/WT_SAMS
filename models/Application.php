<?php
class Application {
    public $conn;

    function __construct($db) {
        $this->conn = $db;
    }

    function apply($student_id, $university_id, $course_name) {
        $sql = "INSERT INTO applications (student_id, university_id, course_name, status) VALUES ('$student_id', '$university_id', '$course_name', 'pending')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>
