<?php

namespace App;

use App\Request;

class App
{
    public function __construct()
    {
        $router = new Router;

        $reqController = $router->getController();
        $reqMethod = $router->getMethod();
        $reqParams = $router->getParams();

        $request = new Request($reqParams);

        $controller = new $reqController;
        $controller->{$reqMethod}($request);
    }
}