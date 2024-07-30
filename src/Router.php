<?php

namespace App;

class Router
{
    public string $controller = Controller\HomeController::class;
    private string $method = "index";
    private array $params = [];

    public function __construct()
    {
        $splittedUrl = $this->splitUrl();
        if (!isset($splittedUrl[0])) {
            return;
        }
        $reqController = "App\Controller\\" . ucfirst(strtolower($splittedUrl[0]) . 'Controller');

        if (!class_exists($reqController)) {
            dd($reqController);
            $this->controller = Controller\NotFoundController::class;
        } else {
            $this->controller = $reqController;
        }

        unset($splittedUrl[0]);

        if (!isset($splittedUrl[1]) || !method_exists($this->controller, $splittedUrl[1])) {
            return;
        }
        $this->method = $splittedUrl[1];
        unset($splittedUrl[1]);

        $this->params = array_values($splittedUrl);
    }

    private function splitUrl(): array
    {
        $url = $_SERVER["REQUEST_URI"];
        if ($url === '/') return [];

        $splittedUrl = rtrim($url, "/");
        $splittedUrl = filter_var($url, FILTER_SANITIZE_URL);
        $splittedUrl = explode('/', $splittedUrl);
        unset($splittedUrl[0]);
        return array_values($splittedUrl);
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getMethod(): string
    {
        return (string) $this->method;
    }

    public function getParams(): array
    {
        return $this->params;
    }
}
