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

    function getHistory($student_id) {
        $sql = "SELECT a.id, u.name as university_name, a.course_name, a.status 
                FROM applications a
                JOIN universities u ON a.university_id = u.id
                WHERE a.student_id = '$student_id'";
        $result = $this->conn->query($sql);
        $history = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $history[] = $row;
            }
        }
        return $history;
    }
}
?>
