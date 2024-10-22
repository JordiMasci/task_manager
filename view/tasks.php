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
$tasks = $taskController->getTask();
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Gestione Compiti</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-5">
        <!-- Navbar -->
        <nav class="bg-white shadow mb-4">
            <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="flex-1 flex items-center justify-start">
                        <h1 class="text-xl font-bold">Gestione Compiti</h1>
                    </div>
                    <div class="absolute inset-y-0 right-0 flex items-center">
                        <form action="logout.php" method="POST">
                            <button type="submit" class="text-red-500 hover:text-red-700">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <h2 class="text-2xl font-bold mt-4 mb-4">I tuoi Compiti</h2>

        <div class="mb-4">
            <a href="create_task.php" class="bg-blue-500 text-white px-4 py-2 rounded">Aggiungi Compito</a>
        </div>

        <h3 class="text-xl">Lista Compiti</h3>
        <ul class="mt-4">
            <?php foreach ($tasks as $task): ?>
                <li class="border p-2 mb-2 rounded bg-white">
                    <strong><?php echo htmlspecialchars($task['title']); ?></strong>
                    - <?php echo htmlspecialchars($task['description']); ?>
                    - Scadenza: <?php echo htmlspecialchars($task['due_date']); ?>
                    - Priorità: <?php echo htmlspecialchars($task['priority']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>