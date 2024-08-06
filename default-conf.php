<?php

// ROOT config
define('APP_DOMAIN', $_ENV['APP_DOMAIN']);
define('APP_ROOT_DIR', __DIR__);
define('APP_PUBLIC_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'public');
define('IMG_UPLOAD_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'asset' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'uploads');

// DB config
define('DB_CONN', $_ENV['DB_CONN']);
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_PORT', $_ENV['DB_PORT']);
define('DB_USERNAME', $_ENV['DB_USERNAME']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_CHARSET', $_ENV['DB_CHARSET']);