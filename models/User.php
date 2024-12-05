<?php

require_once "config/Database.php";

class User
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function findByUsername($username)
    {
        $query = "SELECT * FROM users WHERE username = :username";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Return user data as associative array
    }

    public function verifyPassword($inputPassword, $storedPassword)
    {
        return $inputPassword == $storedPassword;
    }
}
