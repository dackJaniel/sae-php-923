<?php

namespace App;

class Request
{
    private array $params;
    private array $getParams;
    private array $postParams;

    public function __construct(array $params)
    {
        $this->params = $params;
        if (isset($_GET['url'])) unset($_GET['url']);
        $this->getParams = $_GET;
        $this->postParams = $_POST;
    }

    public function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getInput(string $inputType = 'post'): array
    {
        $input = match ($inputType) {
            'post' => $this->sanitizeInput($this->postParams),
            'get' => $this->sanitizeInput($this->getParams),
            'page' => $this->params
        };

        return $input;
    }

    private function sanitizeInput(array $input): array
    {
        return array_map(function ($element) {
            return trim($element);
        }, $input);
    }
}