<?php
require_once 'controllers/AdminController.php';

$url = isset($_GET['url']) ? $_GET['url'] : 'admin';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$adminController = new AdminController();

if ($url === 'admin') {
    if (method_exists($adminController, $action)) {
        if ($id) {
            $adminController->$action($id);
        } else {
            $adminController->$action();
        }
    }
}
