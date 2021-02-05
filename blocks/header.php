<header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <p class="h5 my-0 me-md-auto fw-normal">
        <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Pet Blog</font>
        </font>
    </p>
    <nav class="my-2 my-md-0 me-md-3">
        <!-- <a class="p-2 text-dark" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Возможности </font></font></a>
    -->
    </nav>
    <a href="./index.php">На Главную</a>
    <?php if(!(isset($_SESSION['auth']))):
    ?>
    <a class="btn btn-outline-primary" href="./authorization.php">
        <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Войти</font>
        </font>
    </a>
    <a class="btn btn-outline-primary" href="./registration.php">
        <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">Регистрация</font>
        </font>
    </a>
    <?php else:
    ?>
    <a class="btn btn-outline-primary" href="./ajax/exit.php">
        <font style="vertical-align: inherit;">
            <font style="vertical-align: inherit;">
                <?= $_SESSION['auth_name'] . '<img src="./img/person.ico" alt="">'?>

            </font>
        </font>
    </a>
    <?php
    endif;
    ?>
</header>
