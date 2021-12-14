<?php
require_once "../src/config.php";
require_once "../src/registration.php";

showHead("Register", ['assets/css/register.css']);
?>
    <body>
    <img class="company-logo" src="./assets/img/logo.png" alt="Company Logo">
    <h1>Register your MyFlix Account</h1>
    <form action="<?= htmlentities($_SERVER["PHP_SELF"]) ?>" method="POST">
        <div class="input">
            <label for="username">Username</label>
            <input id="username" name="username" type="text" autofocus>
            <small class="error"><?= $errors["username"] ?? "" ?></small>
        </div>
        <div class="input">
            <label for="email">E-mail</label>
            <input id="email" name="email" type="text">
            <small class="error"><?= $errors["email"] ?? "" ?></small>
        </div>
        <div class="input">
            <label for="pw">Password</label>
            <input id="pw" name="pw" type="password">
            <small class="error"><?= $errors["pw"] ?? "" ?></small>
        </div>
        <div class="input">
            <label for="confirm-pw">Confirm Password</label>
            <input id="confirm-pw" name="confirm-pw" type="password">
            <small class="error"><?= $errors["confirm-pw"] ?? "" ?></small>
        </div>
        <div class="action">
            <input type="submit" name="submit" value="Register">
        </div>
    </form>
    </body>
<?php showFooter(); ?>