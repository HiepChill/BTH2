<?php
require_once 'controllers/HomeController.php';

$url = $_GET['url'] ?? 'home';
$controller = new HomeController();

switch ($url) {
    case 'home':
        $controller->index();
        break;
    case 'home/detail':
        $controller->detail();
        break;
    case 'home/search':
        $controller->search();
        break;
    default:
        echo "Trang không tồn tại!";
        break;
}
