<?php
class Student {
    public $conn;

    function __construct($db) {
        $this->conn = $db;
    }

    function getProfile($user_id) {
        $sql = "SELECT s.id, u.username, u.email, s.name, s.phone, s.current_university, s.address 
                FROM users u 
                LEFT JOIN students s ON u.id = s.user_id 
                WHERE u.id = '$user_id'";
        
        $result = $this->conn->query($sql);
        return $result->fetch_assoc();
    }

    function updateProfile($user_id, $name, $phone, $address) {
        $check = "SELECT * FROM students WHERE user_id = '$user_id'";
        $result = $this->conn->query($check);

        if ($result->num_rows > 0) {
            $sql = "UPDATE students SET name='$name', phone='$phone', address='$address' WHERE user_id='$user_id'";
        } else {
            $sql = "INSERT INTO students (user_id, name, phone, address) VALUES ('$user_id', '$name', '$phone', '$address')";
        }

        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }
}
?>
