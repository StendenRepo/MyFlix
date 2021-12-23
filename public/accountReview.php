<?php
require_once "../src/config.php";
require_once "../src/accountMod.php";
global $lang;

showHead($lang["accountModeration"], ['assets/css/accountReview.css']);
?>
    <body>
    <?php showHeader(); ?>

        <div id="accountContainer">
            <div class="studioInfo">
                <p class="label"><?= $lang["accountId"] ?></p>
                <p>Place holder</p>
            </div>
            <div class="studioInfo">
                <p class="label"><?= $lang["studioName"]?></p>
                <p>Place holder</p>
            </div>
            <div class="studioInfo">
                <p class="label"><?= $lang["genre"] ?></p>
                <p>Place holder</p>
            </div>
            <div class="studioInfo">
                <p class="label"><?= $lang["address"] ?></p>
                <p>Place holder</p>
            </div>
            <div class="studioInfo">
                <p class="label"><?= $lang["city"] ?></p>
                <p>Place holder</p>
            </div>
        </div>

    <?php






    echo "<pre>";
    echo var_dump($company);
    echo "</pre>";
    ?>

    </body>
<?php showFooter(); ?>