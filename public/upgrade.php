<?php
require_once __DIR__ . "/../src/config.php";
require_once __DIR__ . "/../src/upgrade.php";
require_once __DIR__ . "/../src/genres.php";

global $lang;

showHead($lang["titleUpgrade"], ['assets/css/upgrade.css', 'assets/css/menu.css']);

?>
    <body>
        <?php showHeader() ?>
        <div class="content">
            <?php
            require_once __DIR__ . "/../src/menubar.php"; ?>
            <div class="upgradeForm">
                <h1 class="header-text"><?= $lang['companyData'] ?></h1>
                <form action="<?= htmlentities($_SERVER["PHP_SELF"]) ?>" id="formContainer" method="POST">
                    <input name="firstName" type="text" placeholder="<?= $lang["firstName"] ?>" autofocus required>
                    <input name="lastName" type="text" placeholder="<?= $lang["lastName"] ?>" required>
                    <input name="companyName" type="text" placeholder="<?= $lang["companyName"] ?>">
                    <input name="iban" type="text" placeholder="<?= $lang["iban"] ?>" required>
                    <textarea name="address" type="text" placeholder="<?= $lang["address"] ?>" required></textarea>
                    <input name="city" type="text" placeholder="<?= $lang["city"] ?>">
                    <div class="genreSetter">
                        <select name="genre">
                            <option value="" disabled selected><?= $lang["genreSellector"] ?></option>
                            <?php foreach (getGenres() as $genre) {
                                echo "<option value ='" . $genre['id'] . "'>" . $genre['name'] . "</option>";
                            } ?>
                        </select>
                    </div>
                    <p><?= $lang['createNewGenre'] ?></p>
                    <input name="newGenre" type="text"
                           placeholder="<?= $lang["genre"] ?>">
                    <input name="genreDescription" type="text"
                           placeholder="<?= $lang["genreDescription"] ?>">
                    <div class="action">
                        <input type="submit" name="submit" value="<?= $lang["upgradeSubmit"] ?>" required>
                    </div>
                </form>
            </div>
        </div>
    </body>
<?php
showFooter();
?>