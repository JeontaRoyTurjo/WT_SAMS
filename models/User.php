<?php
class User {
    public $conn;

    function __construct($db) {
        $this->conn = $db;
    }
    function emailExists($email) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $this->conn->query($sql);
        
        if ($result->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function register($username, $email, $password, $role) {
        $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}
?>
