<?php
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

$error = '';

if(strlen($login) <=2)
    $error = 'Введите login';
else if(strlen($pass) <=3)
    $error = 'Введите пароль';
if($error != ''){
    echo $error;
    exit();
}

$hash = "bI3v92inb7fgyDG56Hj";
$pass = md5($pass . $hash);

require_once '../db_connect.php';

$sql = 'SELECT `id` FROM `users` WHERE `login` = ? && `pass` = ?';
$query = $pdo->prepare($sql);
$query->execute([$login, $pass]);

$user = $query->fetch(PDO::FETCH_OBJ);

echo $user;
/*if($user->id == 0)
    echo 'Неверный логин или пароль!';
else{
    setcookie('log', $login, time() + 3600 * 24 * 365);
    echo true;
};*/
?>
