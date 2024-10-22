<?php
require_once '../app/Database.php';
require_once '../app/Task.php';
require_once '../controllers/TaskController.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$taskController = new TaskController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $taskController->createTask();
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Crea Compito</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <h2 class="text-2xl font-bold">Crea un Nuovo Compito</h2>
        <form action="create_task.php" method="POST" class="mt-4 bg-white p-4 rounded shadow">
            <label for="title" class="block mb-2">Titolo:</label>
            <input type="text" name="title" id="title" required class="border p-2 w-full mb-4">

            <label for="description" class="block mb-2">Descrizione:</label>
            <textarea name="description" id="description" required class="border p-2 w-full mb-4"></textarea>

            <label for="due_date" class="block mb-2">Data di Scadenza:</label>
            <input type="date" name="due_date" id="due_date" required class="border p-2 w-full mb-4">

            <label for="priority" class="block mb-2">Priorità:</label>
            <select name="priority" id="priority" required class="border p-2 w-full mb-4">
                <option value="Bassa">Bassa</option>
                <option value="Media">Media</option>
                <option value="Alta">Alta</option>
            </select>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Crea Compito</button>
        </form>

        <div class="mt-4">
            <a href="tasks.php" class="text-blue-500">Torna alla lista dei compiti</a>
        </div>
    </div>
</body>

</html>