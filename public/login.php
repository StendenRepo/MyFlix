<?php
require_once "../src/config.php";
$email = "";
$password = "";
$error = "";
$succes = "";
require_once "../src/login.php";

// Makes the translation global accessible
global $lang;

if (isUserLoggedIn()) {
    header("Location: index.php");
    exit;
}

showHead($lang["login"], ['assets/css/login.css']);

?>
    <body>
        <div class="flex-container">
            <a href="index.php">
                <img src="assets/img/logo.png" alt="Myflix Logo">
            </a>

            <h1><?= $lang['loginHeader'] ?></h1>
            <div class="loginForm">
                <form method="post" action="login.php">
                    <?= $succes; ?>
                    <small class="error"><?= $error ?? "" ?></small>
                    <input type="email" name="email" placeholder="<?= $lang["emailLabel"] ?>">

                    <input type="password" name="password" placeholder="<?= $lang["passwordLabel"] ?>">
                    <input type="submit" value="<?= $lang["login"] ?>">
                </form>
            </div>
            <a href="register.php">
                <small><?= $lang["loginNewUser"] ?></small>
                <small class="link"><?= $lang["register"] ?></small>
            </a>
        </div>
    </div>

    </body>
<?php showFooter(); ?>