<?php
require_once "../src/config.php";
require_once "../src/login.php";
show_header(['assets/css/login.css']);
?>
    <body>
    <form action="<?= htmlentities($_SERVER["PHP_SELF"]) ?>" method="POST">
        <div>
            <label for="fn">Firstname</label>
            <input id="fn" name="fn" type="text" value="Cedric" autofocus>
            <small><?= $errors["fn"] ?? "" ?></small>
        </div>
        <div>
            <label for="ln">Lastname</label>
            <input id="ln" name="ln" type="text" value="smit">
            <small><?= $errors["ln"] ?? "" ?></small>
        </div>
        <div>
            <label for="email">E-Mail</label>
            <input id="email" name="email" type="text" value="cedsmit@gmail.com">
            <small><?= $errors["email"] ?? "" ?></small>
        </div>
        <div>
            <label for="pw">Password</label>
            <input id="pw" name="pw" type="password" value="Hallo123password">
            <small><?= $errors["pw"] ?? "" ?></small>
        </div>
        <div>
            <label for="confirm-pw">Confirm Password</label>
            <input id="confirm-pw" name="confirm-pw" type="password" value="Hallo123password">
            <small><?= $errors["confirm-pw"] ?? "" ?></small>
        </div>
        <input type="submit" name="submit" value="Submit">
    </form>
    </body>
<?php show_footer(); ?>