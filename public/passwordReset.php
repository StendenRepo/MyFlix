<?php
require_once "../src/config.php";

global $lang;

showHead($lang["resetPassword"], ['assets/css/auth.css']);
?>
    <body>
        <a href="index.php">
            <img src="assets/img/logo.png" alt="Logo MyFlix">
        </a>
        <div class="resetMsg">
            <p><?= $lang["resetPw"] ?></p>
            <a class="link" href="mailto:administration@myflix.com">administration@myflix.com</a>
        </div>
        <a href="login.php" class="red-btn-filled"><?= $lang["returnTxt"] ?></a>
    </body>
<?php showFooter(); ?>