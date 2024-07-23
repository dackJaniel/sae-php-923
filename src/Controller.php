<?php

namespace App;

use App\Model\Database;
use App\Model\User;
use App\View;

abstract class Controller
{
    protected View $view;
    protected Database $db;
    protected User $user;

    public function __construct()
    {
        $this->db = new Database;
        $this->user = new User($this->db);
        $this->view = new View($this->user);
    }
}