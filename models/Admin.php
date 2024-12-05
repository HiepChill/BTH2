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

    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);  // Ensure it's an integer
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Add a new user
    public function addUser($username, $password)
    {
        $query = "INSERT INTO " . $this->user_table . " (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $this->conn->prepare($query);

        $username = htmlspecialchars(strip_tags($username));
        $password = htmlspecialchars(strip_tags($password));
        $role = 0;

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":role", $role);

        if ($stmt->execute()) {
            return true; // Update successful
        } else {
            // Check for errors
            $errorInfo = $stmt->errorInfo();
            echo "Error: " . $errorInfo[2];
            return false; // Update failed
        }
    }

    // Update user data
    public function editUser($id, $username, $password)
    {
        $query = "UPDATE " . $this->user_table . " SET username = :username, password = :password WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $username = htmlspecialchars(strip_tags($username));
        $password = htmlspecialchars(strip_tags($password));
        $id = htmlspecialchars(strip_tags($id));

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->bindParam(":id", $id);

        $stmt->execute();
    }

    // Delete a user
    public function deleteUser($id)
    {
        $query = "DELETE FROM " . $this->user_table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $id = htmlspecialchars(strip_tags($id));

        $stmt->bindParam(":id", $id);

        $stmt->execute();
    }
}
