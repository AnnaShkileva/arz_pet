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
else if(strlen($login) <=3)
    $error = 'login';
else if(strlen($pass) <=3)
    $error = 'пароль';
if($error != ''){
    echo $error;
    exit();
}

$hash = "bI3v92inb7fgyDG56Hj";
$pass = md5($pass . $hash);

$user = 'root';
$password = 'root';
$db = 'arz_pet';
$host = 'localhost';

$dsn = 'mysql:host=' . $host . ';dbname=' . $db;
$pdo = new PDO($dsn, $user, $password);
$sql = 'INSERT INTO users(name, email, login, pass) VALUES(?, ?, ?, ?)';
$query = $pdo->prepare($sql);
$query->execute([$username, $email, $login, $pass]);

echo true;
?>
