<?php
require_once __DIR__ . "/Database.php";

class User extends Database
{
    protected $id;
    protected $username;
    public $password;

    public function __construct($username, $password = null)
    {
        parent::__construct();
        $this->username = $username;
        $this->password = $password;
    }

    public function register()
    {
        // Cripta la password qui
        $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users (username, password) VALUES(:username, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":password", $hashedPassword);

        return $stmt->execute();
    }

    public function login($password)
    {
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) {
            $this->id = $user["id"];
            return true;
        }
        return false;
    }

    public function getId()
    {
        return $this->id;
    }

    public function usernameExists()
    {
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":username", $this->username);
        $stmt->execute();

        return $stmt->rowCount() > 0; // Restituisce true se l'username esiste già
    }
}
