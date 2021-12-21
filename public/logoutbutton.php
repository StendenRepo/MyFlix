<?php
require_once "../src/config.php";
showHead("Logout button");
?>
    <body>
        <a href="logout.php"><?= $lang["logout"] ?></a>
    </body>
<?php showFooter(); ?>