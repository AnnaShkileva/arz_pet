<?php session_start(); ?>
<?php if(!(isset($_SESSION['auth']))):
    header('Location:./index.php');
else:
    ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Личный кабинет</title>
    <?php require 'blocks/head.php'?>
</head>

<body>
    <?php require 'blocks/header.php'?>

    <main class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h4>Личный кабинет пользователя</h4>
                <div id="person_data">
                    <h5><?=$_SESSION['auth_name']?></h5>
                    <p><?=$_SESSION['auth_email']?></p>
                    <button id="edit_person" class="btn btn-success mt-5">Изменить данные</button>
                    <button id="edit_pass" class="btn btn-success mt-5">Сменить пароль</button>
                </div>
                <div id="edit_person_data">
                    <h5>Изменение данных</h5>
                    <form>
                        <label for="username">Ваше имя</label>
                        <input type="text" name="username" id="username" class="form-control">

                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">

                        <button type="button" id="save_data" class="btn btn-success mt-5">Сохранить</button>
                        <button type="button" id="cancel_edit_data" class="btn btn-success mt-5">Отмена</button>
                    </form>
                </div>
                <div id="edit_person_data">
                    <h5>Изменение пароля</h5>
                    <form>
                        <label for="username">Старый пароль</label>
                        <input type="password" name="pass" id="pass" class="form-control">

                        <label for="new_pass_1">Новый пароль</label>
                        <input type="password" name="new_pass_1" id="new_pass_1" class="form-control">

                        <label for="new_pass_2">Повторите пароль</label>
                        <input type="password" name="new_pass_2" id="new_pass_2" class="form-control">

                        <button type="button" id="save_pass" class="btn btn-success mt-5">Сохранить</button>
                        <button type="button" id="cancel_edit_pass" class="btn btn-success mt-5">Отмена</button>
                    </form>
                </div>
                <div class="alert alert-danger mt-2" id="errorBlock"></div>

            </div>
            <?php require 'blocks/aside.php'?>
        </div>
    </main>

    <?php require 'blocks/footer.php'?>

</body>

</html>
<?php endif; ?>
