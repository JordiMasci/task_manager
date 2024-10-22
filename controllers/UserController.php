<?php

require_once "../app/User.php";

class UserController
{
    public function register()
    {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Verifica se l'username esiste già
            $user = new User($username, $password);

            if ($user->usernameExists()) {
                $_SESSION['error'] = "Username già in uso.";
                header("Location: register.php");
                exit();
            }

            // Registra il nuovo utente
            if ($user->register()) {
                header("Location: tasks.php");
                exit();
            } else {
                $_SESSION['error'] = "Errore nella registrazione. Riprova.";
                header("Location: register.php");
                exit();
            }
        }
    }

    public function login()
    {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            // Crea un nuovo oggetto User per il login
            $user = new User($username);

            // Verifica le credenziali dell'utente
            if ($user->login($password)) {
                $_SESSION["user_id"] = $user->getId();
                header("Location: tasks.php");
                exit();
            } else {
                $_SESSION['error'] = "Username o password non corretti.";
                header("Location: login.php");
                exit();
            }
        }
    }

    public function logout()
    {
        session_start(); // Avvia la sessione per accedervi
        session_destroy(); // Distrugge tutte le variabili di sessione
        header("Location: login.php"); // Reindirizza alla pagina di login
        exit(); // Termina lo script per assicurarsi che il reindirizzamento avvenga subito
    }
}
