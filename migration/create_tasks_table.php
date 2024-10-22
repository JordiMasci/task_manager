<?php
require "../app/Database.php";

class CreateTask extends Database
{

    public function createTask()
    {

        $query = "CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    due_date DATE,
    priority ENUM('Bassa', 'Media', 'Alta') DEFAULT 'Media',
     status ENUM('incompleto', 'completo') DEFAULT 'incompleto',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);";

        $stmt = $this->conn->prepare($query);
        return $stmt->execute();
    }


}

$create = new CreateTask();

$create->createTask();