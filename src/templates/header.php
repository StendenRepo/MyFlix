<?php
/**
 * This function shows the header
 * @param bool $showLogo
 * @param bool $showSearch
 * @param bool $showMyAccount
 */
function showHeader(bool $showLogo = true, bool $showSearch = true, bool $showMyAccount = true)
{


    ?>
    <div class="header">
        <?= ($showLogo) ? '<a href="index.php" class="logo"><img src="assets/img/logo.png" alt="logo" height="45"></a>' . "\n" : ''; ?>
        <?= ($showSearch) ? '<input type="text" placeholder="Search">' . "\n" : ''; ?>
        <?= (isUserLoggedIn()) ? '<a href="profile.php" class="red-btn-filled">My Account</a>' . "\n" : '<a href="login.php" class="red-btn-filled">Login</a>' . "\n"; ?>
    </div>
<?php }

