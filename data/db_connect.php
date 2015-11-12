<?php

class DB_Connect
{
    private $conn;

    function __construct()
    {

    }

    function __destruct()
    {

    }

    /**
     * Conecta ao banco de dados utilizando as configurações do arquivo db_config.php.
     * @return resource
     */
    public function connect()
    {
        require_once 'db_config.php';
        // connect to mysql
        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        // Return database handler
        return $this->conn;
    }

    public function getConn()
    {
        return $this->conn;
    }
}
?>