<?php
require_once "../src/config.php";
require_once "../src/registration.php";
global $lang;

showHead("Register", ['assets/css/auth.css']);
?>
    <body>
        <a href="index.php">
            <img src="assets/img/logo.png" alt="Myflix logo">
        </a>
        <h1><?= $lang['registerHeader'] ?></h1>
        <form action="<?= htmlentities($_SERVER["PHP_SELF"]) ?>" method="POST">
            <input name="username" type="text" placeholder="<?= $lang["usernameLabel"] ?>"
                   value="<?= $inputArray["username"] ?? "" ?>" autofocus>
            <small class="error"><?= $errors["username"] ?? "" ?></small>
            <input name="email" type="text" placeholder="<?= $lang["emailLabel"] ?>"
                   value="<?= $inputArray["email"] ?? "" ?>">
            <small class="error"><?= $errors["email"] ?? "" ?></small>
            <input name="pw" type="password" placeholder="<?= $lang["passwordLabel"] ?>">
            <small class="error"><?= $errors["pw"] ?? "" ?></small>
            <input name="confirm-pw" type="password"
                   placeholder="<?= $lang["confirmPasswordLabel"] ?>">
            <small class="error"><?= $errors["confirmPw"] ?? "" ?></small>
            <input type="submit" name="submit" value="<?= $lang["registerSubmit"] ?>">
        </form>
        <a href="login.php">
            <small><?= $lang["registerAlreadyAccount"] ?></small>
            <small class="link"><?= $lang["login"] ?></small>
        </a>
    </body>
<?php showFooter(); ?>