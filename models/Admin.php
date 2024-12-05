<?php

require_once "config/Database.php";

class Admin
{
    private $conn;
    private $user_table = "users";

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    // Get all users
    public function getUsers()
    {
        $query = "SELECT * FROM " . $this->user_table . " WHERE role = 0";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add a new user
    public function addUser($username, $password, $role)
    {
        $query = "INSERT INTO " . $this->user_table . " (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->conn->prepare($query);

        $username = htmlspecialchars(strip_tags($username));
        $password = htmlspecialchars(strip_tags($password));
        $role = htmlspecialchars(strip_tags($role));

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":role", $role);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Update user data
    public function updateUser($id, $username, $password, $role)
    {
        $query = "UPDATE " . $this->user_table . " SET username = :username, password = :password, role = :role WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $username = htmlspecialchars(strip_tags($username));
        $password = htmlspecialchars(strip_tags($password));
        $role = htmlspecialchars(strip_tags($role));
        $id = htmlspecialchars(strip_tags($id));

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":role", $role);
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // Delete a user
    public function deleteUser($id)
    {
        $query = "DELETE FROM " . $this->user_table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $id = htmlspecialchars(strip_tags($id));

        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }
}
