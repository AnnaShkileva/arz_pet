<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
    include "../db_connect.php";
    
    $name = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));
    
    $error = '';

    if(strlen($name) <=1)
        $error = 'Введите имя';
    else if(strlen($email) <=3)
        $error = 'Введите email';
    else if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email))
        $error = 'Введите корректный email';
    else if(strlen($pass) <=1)
        $error = 'Введите пароль ';
    else if(preg_match("#^[a-z0-9\-_]+$/i#",$pass)|| strlen($pass) <=4)
        $error = 'Пароль должен состоять минимум из 5 латинских символов и цифр';
    if($error != ''){
        echo $error;
        exit();
    };
    
    $hash = "bI3v9";
    $pass = md5($pass . $hash);
    
    $query = $mysqli->query("INSERT INTO `users` (`name`, `email`, `pass`) VALUES('" . $name . "', '" . $email . "', '" . $pass . "')") or die("Ошибка регистрации нового пользователя! Обратитесь к администраторую");    
    echo true;
        
};

?>
