<?php
require_once "../controllers/UserController.php";

$controller = new UserController();
$controller->register(); // Gestisci la registrazione

// Inizializza variabili per messaggi di errore
$errorMessage = "";
if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    unset($_SESSION['error']); // Cancella il messaggio dopo averlo mostrato
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <title>Registrazione</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Registrazione</h2>

        <?php if ($errorMessage): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 p-3 rounded mb-4">
                <?php echo htmlspecialchars($errorMessage); ?>
            </div>
        <?php endif; ?>

        <form action="register.php" method="POST" class="space-y-4">
            <div>
                <label for="username" class="block font-medium">Username</label>
                <input type="text" name="username" id="username" class="border border-gray-300 p-2 w-full rounded"
                    required>
            </div>
            <div>
                <label for="password" class="block font-medium">Password</label>
                <input type="password" name="password" id="password" class="border border-gray-300 p-2 w-full rounded"
                    required>
            </div>
            <button type="submit"
                class="bg-blue-500 text-white p-2 rounded w-full hover:bg-blue-600">Registrati</button>
        </form>

        <p class="mt-4 text-center">Hai già un account? <a href="login.php" class="text-blue-500">Accedi</a></p>
    </div>
</body>

</html>