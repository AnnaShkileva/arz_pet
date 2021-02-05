<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
    include "../db_connect.php";
    
    $name = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    
    $error = '';

    if(strlen($name) <=1)
        $error = 'Введите имя';
    else if(strlen($email) <=3)
        $error = 'Введите email';
    else if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $email))
        $error = 'Введите корректный email';
    
    if($error != '')
        exit($error);    
    
    $query = $mysqli->query("SELECT * FROM `users` WHERE `email` = '". $email ."'") or die("Ошибка регистрации! Обратитесь к администратору.");    
    
    $check_user = $query->fetch_array();
    $check_id = $check_user['id'];
    $id = $_SESSION['auth_id'];

    if($check_id == 0 || $check_id == $id){
        $query = $mysqli->query("UPDATE `users` SET `name`= '" . $name . "', `email`= '" . $email . "' WHERE `id`= '". $id ."'") or die("Ошибка редактирования! Обратитесь к администратору.");   
        
        $_SESSION['auth_name'] = $name;
        $_SESSION['auth_email'] = $email;
        
        exit("true");
    }else
        exit("Пользователь с таким email уже существует!");
        
};

?>
