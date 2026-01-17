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
        $sql = "SELECT a.id, u.name as university_name, a.course_name, a.status, a.feedback 
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

    function getApplicationsByUniversity($university_id) {
        $sql = "SELECT a.id, s.name as student_name, u.username, a.course_name, a.status, a.feedback 
                FROM applications a
                LEFT JOIN students s ON a.student_id = s.id
                LEFT JOIN users u ON s.user_id = u.id
                WHERE a.university_id = '$university_id'";
        $result = $this->conn->query($sql);
        $apps = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if (empty($row['student_name'])) {
                    $row['student_name'] = $row['username'] ?? 'Unknown'; 
                }
                $apps[] = $row;
            }
        }
        return $apps;
    }

    function updateStatus($id, $status) {
        $sql = "UPDATE applications SET status='$status' WHERE id='$id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
    function sendFeedback($id, $feedback) {
        $sql = "UPDATE applications SET feedback='$feedback' WHERE id='$id'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>
