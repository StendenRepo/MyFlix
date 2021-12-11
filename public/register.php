<?php
require_once "../src/config.php";
require_once "../src/registration.php";

showHeader(['assets/css/login.css']);
?>
    <body>
    <form action="<?= htmlentities($_SERVER["PHP_SELF"]) ?>" method="POST">
        <div>
            <label for="username">Username</label>
            <input id="username" name="username" type="text" value="username123" autofocus>
            <small class="error"><?= $errors["username"] ?? "" ?></small>
            <small class="error"><?= $_SESSION["username"] ?? "" ?></small>
        </div>
        <div>
            <label for="email">E-Mail</label>
            <input id="email" name="email" type="text" value="cedsmit@gmail.com">
            <small class="error"><?= $errors["email"] ?? "" ?></small>
        </div>
        <div>
            <label for="pw">Password</label>
            <input id="pw" name="pw" type="password" value="Hallo123password">
            <small class="error"><?= $errors["pw"] ?? "" ?></small>
        </div>
        <div>
            <label for="confirm-pw">Confirm Password</label>
            <input id="confirm-pw" name="confirm-pw" type="password" value="Hallo123password">
            <small class="error"><?= $errors["confirm-pw"] ?? "" ?></small>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
    </body>
<?php showFooter(); ?>