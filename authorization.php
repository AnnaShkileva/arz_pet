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
                    <label for="login">Логин</label>
                    <input type="text" name="login" id="login" class="form-control">

                    <label for="pass">Пароль</label>
                    <input type="password" name="pass" id="pass" class="form-control">

                    <div class="alert alert-danger mt-2" id="errorBlock"></div>
                    <button type="button" id="auth_user" class="btn btn-success mt-5">Войти</button>

                </form>
            </div>
            <?php require 'blocks/aside.php'?>
        </div>
    </main>

    <?php require 'blocks/footer.php'?>
    <script>
        $('#auth_user').on('click', function(e) {
            e.preventDefault();
            var login = $('#login').val();
            var pass = $('#pass').val();

            $.ajax({
                url: 'ajax/auth.php',
                type: 'POST',
                cache: false,
                data: {
                    'login': login,
                    'pass': pass
                },
                dataType: 'html',
                success: function(data) {
                    if (data == true) {
                        $('#reg_user').text('Готово!');
                        $('#errorBlock').hide();
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
