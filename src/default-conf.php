<?php

// ROOT config
define('APP_DOMAIN', 'localhost');
define('APP_ROOT_DIR', __DIR__);
define('APP_PUBLIC_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'public');
define('IMG_UPLOAD_DIR', __DIR__ . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'asset' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'uploads');

// DB config
define('DB_CONN', 'mysql');
define('DB_HOST', 'localhost');
define('DB_PORT', '8080');
define('DB_NAME', 'db-test');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_CHARSET', 'utf8mb4');

// PHP-Mailer config
define('MAIL_HOST', '');
define('MAIL_PORT', '');
define('MAIL_USERNAME', '');
define('MAIL_PASSWORD', '');
define('MAIL_CHARSET', 'UTF-8');
define('MAIL_ENCODING', 'base64');

// ADMIN MAIL (FALLBACK) --> Die Administrator E-Mail Adresse, für den Versand der "Autor werden" E-Mail --> Diese E-Mail wird nicht benötigt, wenn bereits ein Admin in der USERS Datenbanktabelle besteht. Admin = Permission Level 4
define('ADMIN_MAIL', 'mail@danielhilmer.de');