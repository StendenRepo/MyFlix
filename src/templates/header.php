<?php function showHeader($hasLogo = true, $hasSearch = true, $hasAccount = true) { ?>
    <div class="header">
        <?= ($hasLogo) ? '<a href="/"><img src="assets/img/logo.png" alt="logo" height="45"></a>' : '' ?>
        <?= ($hasSearch) ? '<input type="text" placeholder="Search">' : '' ?>
        <?= ($hasAccount) ? '<button class="red-btn-filled">My Account</button>' : '' ?>
    </div>
<?php } ?>