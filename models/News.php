<?php
require_once 'config/Database.php';

class News
{
    private $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllNews()
    {
        $query = "SELECT n.*, c.name AS category_name 
                  FROM news n 
                  JOIN categories c ON n.category_id = c.id 
                  ORDER BY n.created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNewsById($id)
    {
        $query = "SELECT n.*, c.name AS category_name 
                  FROM news n 
                  JOIN categories c ON n.category_id = c.id 
                  WHERE n.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function searchNews($keyword)
    {
        $query = "SELECT n.*, c.name AS category_name 
                  FROM news n 
                  JOIN categories c ON n.category_id = c.id 
                  WHERE n.title LIKE :keyword 
                  ORDER BY n.created_at DESC";
        $stmt = $this->conn->prepare($query);
        $keyword = "%$keyword%";
        $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createNews($title, $content, $image, $category_id)
    {
        $query = "INSERT INTO news (title, content, image, category_id, created_at) 
              VALUES (:title, :content, :image, :category_id, NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category_id', $category_id);
        return $stmt->execute();
    }


    public function updateNews($id, $title, $content, $image, $category_id)
    {
        $query = "UPDATE news 
              SET title = :title, content = :content, image = :image, category_id = :category_id 
              WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function deleteNews($id)
    {
        $query = "DELETE FROM news WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
