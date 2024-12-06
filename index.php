<?php

$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerPath = './controllers/' . $controller . 'Controller.php';

if (file_exists($controllerPath)) {
    require_once $controllerPath;
    $controllerClass = $controller . 'Controller';
    $controllerObject = new $controllerClass;

    if (method_exists($controllerObject, $action)) {
        // Kiểm tra nếu action cần tham số (vd: deleteNews cần id)
        if (isset($_GET['id'])) {
            $id = $_GET['id']; // Lấy tham số id từ URL
            $controllerObject->$action($id); // Truyền id vào action
        } else {
            $controllerObject->$action(); // Không có tham số thì gọi trực tiếp
        }
    } else {
        echo "404 Not Found: The action does not exist";
    }
} else {
    echo "404 Not Found: The controller does not exist";
}
