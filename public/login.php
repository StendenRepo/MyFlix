<?php
require_once "../src/config.php";
$email = "";
$password = "";
$error = "";
$succes = "";
require_once "../src/loginPHP.php";
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
				<?= $succes; ?>
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="E-mailadress" class="loginInput">

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" class="loginInput">

				<?= $error; ?>

                <input type="submit" value="Log in" class="loginButton">
            </form>
        </div>
        <div class="registerText">
            <p>New to MyFlix?</p>
            <a href="register.php">Register</a>
        </div>
    </div>

    </body>
<?php showFooter(); ?>