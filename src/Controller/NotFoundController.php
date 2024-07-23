<?php

namespace App\Controller;

use App\Controller;

class NotFoundController extends Controller
{
    public function index()
    {
        $this->view->render('404');
    }
}