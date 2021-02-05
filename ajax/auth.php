<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
    include "../db_connect.php";
    
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

    $error = '';

    if(strlen($email) <=3)
        $error = 'Введите email';
    else if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email))
        $error = 'Введите корректный email';
    else if(strlen($pass) <=1)
        $error = 'Введите пароль';
    else if(preg_match("#^[a-z0-9\-_]+$/i#",$pass)|| strlen($pass) <=4)
            $error = 'Пароль должен состоять минимум из 5 латинских символов и цифр';
    if($error != ''){
       
        exit($error);
    }

    $hash = "bI3v9";
    $pass = md5($pass . $hash);
    $query = $mysqli->query("SELECT * FROM `users` WHERE `email` = '". $email ."' && `pass` = '" . $pass . "'") or die("Ошибка авторизации! Обратитесь к администратору.");    
    
    $user = $query->fetch_array();
    $id = $user['id'];

    if($id == 0)
        exit('Неверный email или пароль!');
    else{
        session_start();
        
        $_SESSION['auth'] ="yes_auth";
        $_SESSION['auth_id'] = $id;
        $_SESSION['auth_name'] = $user['name'];
        $_SESSION['auth_email'] = $user['email'];
        
        exit("true");
    };
};
?>
