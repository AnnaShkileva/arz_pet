<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
   <?php require 'blocks/header.php'?>
   
   <main class="container mt-5">
       <div class="row">
           <div class="col-md-8">Основная часть сайта</div>
           <?php require 'blocks/aside.php'?>
       </div>
   </main>
   
   <?php require 'blocks/footer.php'?>
    
</body>
</html>