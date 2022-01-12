<?php
global $lang;
$userLvl = getUserAccountLevel(getCurrentUserId());
?>
<div class="menubar">
    <ul>
        <h1><?= $lang["manage"] ?></h1>
        <?php if ($userLvl === 0) { ?>
            <li><a href="#"><?= $lang["upgrade"] ?></a></li>
        <?php } elseif ($userLvl === 1) { ?>
            <li><a href="search.php?creator=<?= getCurrentUserId() ?>"><?= $lang["myvideos"] ?></a></li>
            <li><a href="uploadVideo.php"><?= $lang["uploadvideos"] ?></a></li>
        <?php } elseif ($userLvl === 2) { ?>
            <li><a href="userMod.php"><?= $lang["users"] ?></a></li>
            <li><a href="videoMod.php"><?= $lang["allvideos"] ?></a></li>
        <?php } ?>
        <li><a href="changePassword.php"><?= $lang["changepassword"] ?></a></li>
        <li><a href="logout.php"><?= $lang["logout"] ?></a></li>
    </ul>
</div>