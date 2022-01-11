<?php
require_once "../src/config.php";
require_once "../src/accountMod.php";
require_once "../src/accountReview.php";
require_once "../src/genres.php";
global $lang;

showHead($lang["accountModeration"], ['assets/css/accountReview.css']);
?>
    <body>
    <?php showHeader(); ?>

        <div id="accountContainer">
            <div class="studioInfo">
                <p class="label"><?= $lang["accountId"] ?></p>
                <p><?= $companyInfo[0]["id"] ?></p>
            </div>
            <div class="studioInfo">
                <p class="label"><?= $lang["studioName"]?></p>
                <p><?= $companyInfo[0]["studioName"] ?></p>
            </div>
            <div class="studioInfo">
                <p class="label"><?= $lang["genre"] ?></p>
                <p><?= idToGenre($id, $companyInfo) ?></p>
            </div>
            <div class="studioInfo">
                <p class="label"><?= $lang["iban"] ?></p>
                <p><?= $companyInfo[0]["iban"] ?></p>
            </div>
            <div class="studioInfo">
                <p class="label"><?= $lang["address"] ?></p>
                <p><?= $companyInfo[0]["address"] ?></p>
            </div>
            <div class="studioInfo">
                <p class="label"><?= $lang["city"] ?></p>
                <p><?= $companyInfo[0]["city"] ?></p>
            </div>
        </div>

        <form action="<?= htmlentities("accountReview.php?userId=$id") ?>" method="post">
            <input type="submit" name="approve" value="Approve">
            <input type="submit" name="deny" value="Deny">
        </form>

    </body>
<?php showFooter(); ?>