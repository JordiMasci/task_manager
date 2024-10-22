<?php


require_once __DIR__ . "/../app/Task.php"; // Percorso corretto per Task.php

class TaskController
{
    public function createTask()
    {
        if (!isset($_SESSION["user_id"])) {
            header("Location: login.php");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $user_id = $_SESSION["user_id"];
            $title = isset($_POST["title"]) ? $_POST["title"] : null;
            $description = isset($_POST["description"]) ? $_POST["description"] : null;
            $due_date = isset($_POST["due_date"]) ? $_POST["due_date"] : null;
            $priority = isset($_POST["priority"]) ? $_POST["priority"] : null;

            if ($title && $description && $due_date && $priority) {
                $task = new Task($user_id, $title, $description, $due_date, $priority);
                if ($task->createTask()) {
                    header("Location: tasks.php");
                    exit();
                } else {
                    echo "Errore nella creazione del compito";
                }
            } else {
                echo "Tutti i campi sono obbligatori.";
            }
        }
    }

    public function getTask()
    {
        $task = new Task(0, "", "", "", "");
        return $task->getAllTasks();

    }
}