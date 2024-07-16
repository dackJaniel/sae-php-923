<?php
require_once 'Model/Database.php';
require_once 'Model/User.php';

$database = new Database();
$user = new User($database);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user->register();
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <h1>Register</h1>
        <form action="" method="POST">
            <label for="name">Name</label>
            <input type="text" name="name">
            <label for="mail">Email</label>
            <input type="email" name="mail">
            <label for="password">Password</label>
            <input type="password" name="password">
            <input type="submit" value="Submit">
        </form>
    </body>

</html>