<?php

require "../app/Database.php";
class CreateUser extends Database
{

    public function createUser()
    {
        $query = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }
}


$users = new CreateUser();

$users->createUser();