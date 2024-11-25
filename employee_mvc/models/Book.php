<?php
class Book {
    private $conn;
    private $table = "books";

    public $id;
    public $title;
    public $author;
    public $published_year;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " 
                 SET title=:title, author=:author, published_year=:published_year";
        
        $stmt = $this->conn->prepare($query);

        // Sanitize input
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->author = htmlspecialchars(strip_tags($this->author));
        $this->published_year = htmlspecialchars(strip_tags($this->published_year));

        // Bind parameters
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":author", $this->author);
        $stmt->bindParam(":published_year", $this->published_year);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}