<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$db = 'arz_pet';

$mysqli = new mysqli($host, $user, $password, $db);

    /* проверяем соединение */
if ($mysqli->connect_errno)
{
    echo "<p>Попытка подключения не удалась MySQL</p>";
    exit();
};
$mysqli->set_charset("utf8");
?>
