<?php
class Database {
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new mysqli("localhost", "root", "", "sams_db");
        } catch(Exception $e) {
            echo "Connection error";
        }
        return $this->conn;
    }
}
