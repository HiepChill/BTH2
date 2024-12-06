<?php

require_once "models/User.php";

class AuthController
{
    private $userModel;

    public function __construct()
    {

        $this->userModel = new User();
    }

    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            header('Location: views/home/index.php');
            exit();
        }

        require_once "views/auth/login.php";
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            if (empty($username) || empty($password)) {
                require_once "views/auth/login.php";
                echo "Username and password are required!";
                return;
            }

            $user = $this->userModel->findByUsername($username);

            if ($user && $this->userModel->verifyPassword($password, $user['password'])) {
                // If the password is correct, start a session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                // Redirect based on user role (user or admin)
                if ($user['role'] == '1') {
                    require_once 'controllers/AdminController.php';
                    $adminController = new AdminController();
                    $adminController->dashboard();
                } else {
                    require_once 'controllers/HomeController.php';
                    $homeController = new HomeController;
                    $homeController->index();
                }
                exit();
            } else {
                require_once "views/auth/login.php";
                echo "Invalid username or password!";
            }
        }
    }

    public function logout()
    {
        // Destroy the session to log out the user
        session_unset();
        session_destroy();
        header('Location: views/auth/login.php');
        exit();
    }
}
