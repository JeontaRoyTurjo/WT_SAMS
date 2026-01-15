<?php
class University {
    public $conn;

    function __construct($db) {
        $this->conn = $db;
    }

    function getProfile($user_id) {
        $sql = "SELECT u.username, u.email, un.name as university_name, un.location, un.description 
                FROM users u 
                LEFT JOIN universities un ON u.id = un.user_id 
                WHERE u.id = '$user_id'";
        
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    function updateProfile($user_id, $university_name, $location, $description) {
        $check = "SELECT * FROM universities WHERE user_id = '$user_id'";
        $result = $this->conn->query($check);

        if ($result->num_rows > 0) {
            $sql = "UPDATE universities SET name='$university_name', location='$location', description='$description' WHERE user_id='$user_id'";
        } else {
            $sql = "INSERT INTO universities (user_id, name, location, description) VALUES ('$user_id', '$university_name', '$location', '$description')";
        }

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function getAll() {
        $sql = "SELECT id, name, location FROM universities";
        $result = $this->conn->query($sql);
        $universities = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $universities[] = $row;
            }
        }
        return $universities;
    }

    function getById($id) {
        $sql = "SELECT * FROM universities WHERE id = '$id'";
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }
}
?>
