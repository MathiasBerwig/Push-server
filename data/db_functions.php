<?php

class DB_Functions {

    private $db;

    function __construct() {
        include_once 'db_connect.php';
        // Connect to the database
        $this->db = new DB_Connect();
        $this->db->connect();
    }

    function __destruct() {
        
    }

    public function insertUser($USERNAME, $TOKEN) {
        // Insert user into database
        $sql = "INSERT INTO GCM_USERS (USERNAME, TOKEN) VALUES('$USERNAME','$TOKEN') ON DUPLICATE KEY UPDATE TOKEN = '$TOKEN', USERNAME = '$USERNAME'";
        $conn = $this->db->getConn();
        $result = mysqli_query($conn, $sql);

        return $result ? true : false;
    }

    public function deleteUser($USERNAME, $TOKEN) {
        $sql = "DELETE FROM GCM_USERS WHERE USERNAME = '$USERNAME' OR TOKEN = '$TOKEN'";
        $conn = $this->db->getConn();
        $result = mysqli_query($conn, $sql);

        return $result ? true : false;
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM GCM_USERS";
        $conn = $this->db->getConn();
        $result = mysqli_query($conn, $sql);
        $rows = array();
        while ($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        return json_encode($rows);
    }
}