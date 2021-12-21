<?php
require_once "../src/config.php";
session_destroy();

showHead("Logout", ["assets/css/logout.css"]);
?>
    <body>
        <a href="index.php">
            <img src="assets/img/logo.png" alt="logoMyflix">
        </a>

        <h1><?= $lang["logoutSuccess"] ?></h1>

        <div>
            <div class="logoutText">
                <p><?= $lang["returnHome"] ?></p>
                <a href="index.php"><?= $lang["home"] ?></a>
            </div>

            <div class="logoutText">
                <p><?= $lang["returnLogin"] ?></p>
                <a href="login.php"><?= $lang["login"] ?></a>
            </div>
        </div>
    </body>
<?php showFooter(); ?>