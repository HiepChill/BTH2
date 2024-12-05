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
        include_once 'views/admin/dashboard.php';
    }
}
