<?php

namespace App;

session_set_cookie_params(['httponly' => true]);
session_start();

// error reporting on
error_reporting(E_ALL);
ini_set('display_errors', '1');

function loadAutoloadFile(): void
{
    // get autoload file
    $autoloadFile = __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
    if (!file_exists($autoloadFile)) {
        trigger_error(
            sprintf(
                _('Die Autoload Datei (%s) existiert nicht.'),
                $autoloadFile
            ),
            E_USER_ERROR
        );
    }

    require_once $autoloadFile;
}


// function loadConfigFile(): void
// {
//     // get config file
//     $configFile = __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . 'conf.php';
//     if (!file_exists($configFile)) {
//         trigger_error(
//             sprintf(
//                 _('Die Config Datei (%s) existiert nicht.'),
//                 $configFile
//             ),
//             E_USER_ERROR
//         );
//     }
//     require_once $configFile;
// }


loadAutoloadFile();
// loadConfigFile();

$app = new App;