<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php require 'blocks/head.php'?>
</head>

<body>
    <?php require 'blocks/header.php'?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8">

                <?php include "db_connect.php";
    
    $query = $mysqli->query("SELECT * FROM `articles`, `type_articles`, `users` WHERE `type_articles`.id = `articles`.type_id AND `users`.id = `articles`.user_id ORDER BY `articles`.id ASC") or die("Ошибка авторизации! Обратитесь к администратору.");
    $article_loss = $query->fetch_array();
    
    echo '<div>
                    <h4>Все объявления</h4>';
    
    do{
        $user = $article_loss['name'];
        $type = $article_loss['type_name'];
        $title = $article_loss['title'];
        $img = $article_loss['img'];
        $text = $article_loss['text'];
        $date = $article_loss['date'];
        $phone_one = $article_loss['phone_one'];
        $phone_two = $article_loss['phone_two'];
        
        if($phone_two != '')
            $phone_two = '<div>'. $phone_two .'</div>';
        
        echo'       <h5>'. $title .'</h5>
                    <h6>'. $type .'</h6>
                    <div>
                    <img src="img/pet/'. $img .'" alt="">
                    <p>'. $text .'</p>
                    </div>
                    <h6>'. $user .'</h6>
                    <div>'. $phone_one .'</div>'. $phone_two;
        
    }while($article_loss = $query->fetch_array());
    
    echo '</div>';
    ?>

            </div>
            <?php require 'blocks/aside.php'?>
        </div>
    </main>

    <?php require 'blocks/footer.php'?>

</body>

</html>
