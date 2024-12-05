<?php

$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerPath = './controllers/' . $controller . 'Controller.php';

if (file_exists($controllerPath)) {
    require_once $controllerPath;
    $controllerClass = $controller . 'Controller';
    $controllerObject = new $controllerClass;

    if (method_exists($controllerObject, $action)) {
        $controllerObject->$action();
    } else {
        echo "404 Not Found: The action does not exist";
    }
} else {
    echo "404 Not Found: The controller does not exist";
}
