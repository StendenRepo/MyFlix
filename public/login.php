<?php
require_once "../src/config.php";
$email = "";
$password = "";
$error = "";
$success = "";
require_once "../src/loginPHP.php";
global $lang;
showHead("login", ['assets/css/login.css']);
?>
    <body>

    <div class="flex-container">
        <div class="loginImg">
            <a href="index.php">
                <img src="assets/img/logo.png" alt="logoMyflix">
            </a>
        </div>

        <div class="loginForm">
            <form method="post" action="login.php">
                <p id="error"><?= $success; ?><?= $error; ?></p>
                <label for="email"></label>
                <input type="email" id="email" name="email" placeholder="<?= $lang['placeholderEmail'] ?>"
                       class="loginInput">

                <label for="password"></label>
                <input type="password" id="password" name="password" placeholder="<?= $lang['passwordPlaceholder'] ?>"
                       class="loginInput">

                <input type="submit" value="<?= $lang['login'] ?>" class="loginButton">
            </form>
        </div>
        <div class="registerText">
            <p><?= $lang['newUser'] ?></p>
            <a href="register.php"><?= $lang['registerLink'] ?></a>
        </div>
    </div>

    </body>
<?php showFooter(); ?>