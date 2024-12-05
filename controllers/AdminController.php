<?php

require_once "models/Admin.php";

class AdminController
{
    private $admin;

    public function __construct()
    {
        $this->admin = new Admin();
    }

    public function dashboard()
    {
        $users = $this->admin->getUsers();
        require 'views/admin/dashboard.php';
    }

    // MANAGE USERS

    public function showUsers()
    {
        $users = $this->admin->getUsers();
        require 'views/admin/users/index.php';
    }

    public function addUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['username'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $this->admin->addUser($username, $password);
                header('Location: index.php?controller=admin&action=showUsers');
                exit();
            } else {
                echo 'Please provide both username and password.';
            }
        } else {
            require 'views/admin/users/add.php';
        }
    }

    public function editUser()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $user = $this->admin->getUserById($id);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['username'], $_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $this->admin->editUser($id, $username, $password);
                    header('Location: index.php?controller=admin&action=showUsers');
                    exit();
                } else {
                    echo 'Please provide both username and password.';
                }
            } else {
                require 'views/admin/users/edit.php';
            }
        }
    }

    public function deleteUser()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $this->admin->deleteUser($id);
            header('Location: index.php?controller=admin&action=showUsers');
            exit();
        }
    }
}
