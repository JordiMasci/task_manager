<?php

class Database
{
    private $host = "localhost";
    private $db_name = "task_manager";
    private $username = "root";
    private $password = "root";
    protected $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }


}
