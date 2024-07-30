<?php

namespace App;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;
use Twig\Extension\DebugExtension;


class View
{
    public function render(string $view)
    {
        $loader = new FilesystemLoader(__DIR__ . DIRECTORY_SEPARATOR . 'View');
        $twig = new Environment($loader, [
            'debug' => true,
        ]);

        $twig->addExtension(new DebugExtension);

        echo $twig->render("{$view}.twig");
    }
}
