<?php

// ROOT config
define('APP_DOMAIN', 'localhost');
define('APP_ROOT_DIR', __DIR__);
define('APP_PUBLIC_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'public');
define('IMG_UPLOAD_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'asset' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'uploads');

// DB config
define('DB_CONN', 'mysql');
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '3306');
define('DB_NAME', 'useless');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_CHARSET', 'utf8mb4');