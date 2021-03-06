<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Авторизация на сайте</title>
    <?php require 'blocks/head.php'?>
</head>

<body>
    <?php require 'blocks/header.php'?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <h4>Авторизация</h4>
                <form>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control">

                    <label for="pass">Пароль</label>
                    <input type="password" name="pass" id="pass" class="form-control">

                    <div class="alert alert-danger mt-2" id="errorBlock"></div>
                    <button type="button" id="auth_user" class="btn btn-success mt-5">Войти</button>
                    <div><span>Забыли пароль?</span> <a href="">Восстановить по почте</a></div>

                </form>
            </div>
            <?php require 'blocks/aside.php'?>
        </div>
    </main>

    <?php require 'blocks/footer.php'?>
    <script src="./script/auth.js"> </script>
</body>

</html>
