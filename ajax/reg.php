<?php

$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

$error = '';

if(strlen($username) <=1)
    $error = 'имя';
else if(strlen($email) <=3)
    $error = 'email';
else if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email))
    $error = 'корректный email';
else if(strlen($login) <=2)
    $error = 'login';
else if(strlen($pass) <=3)
    $error = 'пароль';
if($error != ''){
    echo $error;
    exit();
}

$hash = "bI3v92inb7fgyDG56Hj";
$pass = md5($pass . $hash);

require_once '../db_connect.php';

$sql = 'INSERT INTO users(name, email, login, pass) VALUES(?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$username, $email, $login, $pass]);

echo true;
?>
