<?php
require_once 'models/Book.php';

class BookController {
    private $book;

    public function __construct($db) {
        $this->book = new Book($db);
    }

    public function index() {
        $result = $this->book->getAll();
        require 'views/books/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->book->title = $_POST['title'];
            $this->book->author = $_POST['author'];
            $this->book->published_year = $_POST['published_year'];

            if ($this->book->create()) {
                header("Location: index.php?action=index");
            } else {
                echo "Error creating book.";
            }
        } else {
            require 'views/books/create.php';
        }
    }
}