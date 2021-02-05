<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Регистрация на сайте</title>
    <?php require 'blocks/head.php'?>
</head>

<body>
    <?php require 'blocks/header.php'?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <h4>Форма регистрации</h4>
                <form>
                    <label for="username">Ваше имя</label>
                    <input type="text" name="username" id="username" class="form-control">

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">

                    <label for="pass">Пароль</label>
                    <input type="password" name="pass" id="pass" class="form-control">

                    <div class="alert alert-danger mt-2" id="errorBlock"></div>
                    <button type="button" id="reg_user" class="btn btn-success mt-5">Зарегистрироваться</button>

                </form>
                <a class="btn btn-outline-primary" href="./authorization.php">
                    <font style="vertical-align: inherit;">
                        <font style="vertical-align: inherit;">Я уже зарегистрирован</font>
                    </font>
                </a>
            </div>
            <?php require 'blocks/aside.php'?>
        </div>
    </main>

    <?php require 'blocks/footer.php'?>
    <script>
        $('#reg_user').on('click', function(e) {
            e.preventDefault();
            var name = $('#username').val();
            var email = $('#email').val();
            var pass = $('#pass').val();

            $.ajax({
                url: 'ajax/reg.php',
                type: 'POST',
                cache: false,
                data: {
                    'username': name,
                    'email': email,
                    'pass': pass
                },
                dataType: 'html',
                success: function(data) {
                    if (data == "true") {
                        window.location.replace("./authorization.php");
                    } else {
                        $('#errorBlock').show();
                        $('#errorBlock').text(data);

                    }

                }
            });
        });

    </script>
</body>

</html>
