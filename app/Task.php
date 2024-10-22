<?php

require_once __DIR__ . "/Database.php";
class Task extends Database
{
    private $id;
    private $user_id;
    private $title;
    private $description;
    private $due_date;
    private $priority;
    private $status;

    public function __construct($user_id, $title, $description, $due_date, $priority)
    {
        parent::__construct();
        $this->user_id = $user_id;
        $this->title = $title;
        $this->description = $description;
        $this->due_date = $due_date;
        $this->priority = $priority;
        $this->status = "incompleto";
    }

    public function createTask()
    {
        $query = "INSERT INTO tasks (user_id, title, description, due_date, priority, status) VALUE (:user_id, :title, :description, :due_date, :priority, :status) ";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":user_id", $this->user_id);
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":due_date", $this->due_date);
        $stmt->bindParam(":priority", $this->priority);
        $stmt->bindParam(":status", $this->status);
        return $stmt->execute();
    }


    public function getAllTasks()
    {
        $query = "SELECT * FROM tasks"; // Assicurati che il nome della tabella sia corretto
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Restituisci tutti i compiti come array associativo
    }


}