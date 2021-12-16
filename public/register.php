<?php
require_once "../src/config.php";
require_once "../src/registration.php";
global $lang;

showHead("Register", ['assets/css/register.css']);
?>
    <body>
    <a href="index.php">
        <img class="company-logo" src="./assets/img/logo.png" alt="Company Logo">
    </a>
    <h1>Register your MyFlix Account</h1>
    <form action="<?= htmlentities($_SERVER["PHP_SELF"]) ?>" method="POST">
        <div class="input">
            <input id="username" name="username" type="text" placeholder="<?= $lang["usernameLabel"] ?>"
                   value="<?= $inputArray["username"] ?? "" ?>" autofocus>
            <small class="error"><?= $errors["username"] ?? "" ?></small>
        </div>
        <div class="input">
            <input id="email" name="email" type="text" placeholder="<?= $lang["emailLabel"] ?>"
                   value="<?= $inputArray["email"] ?? "" ?>">
            <small class="error"><?= $errors["email"] ?? "" ?></small>
        </div>
        <div class="input">
            <input id="pw" name="pw" type="password" placeholder="<?= $lang["passwordLabel"] ?>">
            <small class="error"><?= $errors["pw"] ?? "" ?></small>
        </div>
        <div class="input">
            <input id="confirm-pw" name="confirm-pw" type="password" placeholder="<?= $lang["confirmPasswordLabel"] ?>">
            <small class="error"><?= $errors["confirmPw"] ?? "" ?></small>
        </div>
        <div class="action">
            <input type="submit" name="submit" value="<?= $lang["submit"] ?>">
        </div>
    </form>
    <div class="registerLink">
        <small>Do you already have an account <br>
            <a href="login.php">Log in</a>
        </small>

    </div>

    </body>
<?php showFooter(); ?>