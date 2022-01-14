<?php
global $lang;
$userLvl = getUserAccountLevel(getCurrentUserId());
?>
<div class="menubar">
    <ul>
        <h1><?= $lang["manage"] ?></h1>
        <?php if ($userLvl === 0) { ?>
            <li><a class="clickable" href="upgrade.php"><?= $lang["upgrade"] ?></a></li>
        <?php } elseif ($userLvl === 1) { ?>
            <li><a class="clickable" href="search.php?creator=<?= getCurrentUserId() ?>"><?= $lang["myvideos"] ?></a></li>
            <li><a class="clickable" href="uploadVideo.php"><?= $lang["uploadvideos"] ?></a></li>
        <?php } elseif ($userLvl === 2) { ?>
            <li><a class="clickable" href="accountMod.php"><?= $lang["users"] ?></a></li>
            <li><a class="clickable" href="videoMod.php"><?= $lang["allvideos"] ?></a></li>

        <?php } ?>
        <li><a class="clickable" href="changePassword.php"><?= $lang["changepassword"] ?></a></li>
    </ul>
</div>