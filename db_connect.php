<?php

$user = 'root';
$password = 'root';
$db = 'arz_pet';
$host = 'localhost';

$dsn = 'mysql:host=' . $host . ';dbname=' . $db;
$pdo = new PDO($dsn, $user, $password);
?>
