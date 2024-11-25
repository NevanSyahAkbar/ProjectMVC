<?php
require_once 'config/Database.php';
require_once 'controllers/BookController.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Initialize controller
$bookController = new BookController($db);

// Route the request
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'create':
        $bookController->create();
        break;
    default:
        $bookController->index();
        break;
}