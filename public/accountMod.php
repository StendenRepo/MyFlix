<?php
require_once "../src/config.php";
require_once "../src/accountMod.php";
global $lang;

showHead($lang["accountModeration"], ['assets/css/accountMod.css']);
?>
    <body>
        <?php showHeader(); ?>

        <div id="mainContainer">
            <div id="title">
                <h1><?= $lang["filmStudio"] ?></h1>
                <p><?= htmlspecialchars($_GET["approval"] ?? ""); ?></p>
                <p><?= nonePendingMsg() ?></p>
            </div>

            <?php foreach (getNonApprovedCompany() as $company): ?>
                <div class="studio">
                    <p id="studioName"><?= $company["studioName"] ?></p>
                    <a href="accountReview.php?userId=<?= $company["id"] ?>"><?= $lang["view"] ?></a>
                </div>
            <?php endforeach ?>
        </div>
    </body>
<?php showFooter(); ?>