<?php

namespace App\Controller;

use App\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        $this->view->render('register');
    }
}
