<?php
require_once "../src/config.php";
session_destroy();
header("refresh: 2; index.php");

global $lang;

showHead($lang['logout'], ["assets/css/logout.css"]);
?>
    <body>
        <a href="index.php">
            <img src="assets/img/logo.png" alt="logoMyflix">
        </a>

        <h1><?= $lang["logoutSuccess"] ?></h1>

        <div class="logoutText">
            <p><?= $lang["logoutRedirect"] ?></p>
        </div>
    </body>
<?php showFooter(); ?>