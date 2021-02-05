<?php
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  
    include "../db_connect.php";
    
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));
    $new_pass = trim(filter_var($_POST['new_pass'], FILTER_SANITIZE_STRING));
    $new_pass_replay = trim(filter_var($_POST['new_pass_replay'], FILTER_SANITIZE_STRING));
    
    $error = '';

    if(strlen($pass) ==0 || strlen($new_pass) ==0 || strlen($new_pass_replay) ==0)
        $error = 'Заполните все поля.';
    else if(preg_match("#^[a-z0-9\-_]+$/i#",$pass)|| strlen($pass) <=4 || preg_match("#^[a-z0-9\-_]+$/i#",$new_pass) || strlen($new_pass) <=4 || preg_match("#^[a-z0-9\-_]+$/i#",$new_pass_replay) || strlen($new_pass_replay) <=4)
        $error = 'Пароль должен состоять минимум из 5 латинских символов и цифр.';
    else if($new_pass != $new_pass_replay)
        $error = 'Новый пароль и его повтор должны совпадать.';
    
    if($error != '')
        exit($error);    
    
    $id = $_SESSION['auth_id'];
    
    $query = $mysqli->query("SELECT * FROM `users` WHERE `id` = '". $id ."'") or die("Ошибка регистрации! Обратитесь к администратору.");    
    
    $check_user = $query->fetch_array();
    $check_pass = $check_user['pass'];
    
    $hash = "bI3v9";
    $pass = md5($pass . $hash);
    $new_pass = md5($new_pass . $hash);

    if($check_pass == $pass){
        $query = $mysqli->query("UPDATE `users` SET `pass`= '" . $new_pass . "' WHERE `id`= '". $id ."'") or die("Ошибка редактирования! Обратитесь к администратору.");   
        
        exit("true");
    }else
        exit("Старый пароль введен неверно.");
        
};

?>
