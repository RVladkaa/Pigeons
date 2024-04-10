<?php

session_start();
require 'config/init.php';

$route = str_replace('', "", $_SERVER['REQUEST_URI']);
$route = explode('/', $route);

$dbHandle = new PDO("mysql:host=$host;dbname=$db", $username, $password);
$dbHandle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbHandle->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

require_once 'Controllers/UserController.php';

$user = new UserController($dbHandle);
$user->login();




if ($user->loginUser($email, $password)) {
    $_SESSION['msg'] = "Welcome, " . $_SESSION['user'];

    // Отримання ідентифікатора користувача
    $userId = $user->getUserId(); 
    $_SESSION['user_id'] = $userId; // Зберігаємо ідентифікатор користувача в сесії

    header("Location: /");
} else {
    $_SESSION['msg'] = "Error logging in. Check your email and password";
    header("Location: /");
}