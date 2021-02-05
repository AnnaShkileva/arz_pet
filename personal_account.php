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
    <link rel="stylesheet" href="./css/pers_acc.css">
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
                        <input type="text" name="username" id="username" class="form-control" value="<?=$_SESSION['auth_name']?>">

                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?=$_SESSION['auth_email']?>">

                        <button type="button" id="save_data" class="btn btn-success mt-5">Сохранить</button>
                        <button type="button" id="cancel_edit_data" class="btn btn-success mt-5">Отмена</button>
                    </form>
                </div>
                <div id="edit_person_pass">
                    <h5>Изменение пароля</h5>
                    <form>
                        <label for="pass">Старый пароль</label>
                        <input type="password" name="pass" id="pass" class="form-control">

                        <label for="new_pass">Новый пароль</label>
                        <input type="password" name="new_pass" id="new_pass" class="form-control">

                        <label for="new_pass_replay">Повторите пароль</label>
                        <input type="password" name="new_pass_replay" id="new_pass_replay" class="form-control">

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
    <script src="./script/pers_acc.js"></script>

</body>

</html>
<?php endif; ?>
