<?php
require_once "../src/config.php";
include "../src/upgrade.php";
require_once "../src/genres.php";

showHead("Upgrade", ['assets/css/upgrade.css']);

global $lang;

//TODO: remove debug when done
echo "<pre>";
var_dump($_SESSION);
var_dump($_POST);
echo "</pre>";


?>
    <body>
    <?php showHeader() ?>
    <h1>Add your company data</h1>
    <form action="<?= htmlentities($_SERVER["PHP_SELF"]) ?>" method="POST">
        <div class="input">
            <input id="firstName" name="firstName" type="text" placeholder="<?= $lang["firstName"] ?>" autofocus
                   required>
        </div>
        <div class="input">
            <input id="lastName" name="lastName" type="text" placeholder="<?= $lang["lastName"] ?>" required>
        </div>
        <div class="input">
            <input id="companyName" name="companyName" type="text" placeholder="<?= $lang["companyName"] ?>" required>
        </div>
        <div class="genreSetter">
            <div class="input">
                <!--            todo genre dependent from database
                                optional to add new genre-->

                <select name="genre" id="genre">
                    <option value="">genre</option>
                    <?php

                    foreach (getGenres() as $genre) {
                        print "<option value ='" . $genre['id'] . "'>" . $genre['name'] . "</option>";
                    }
                    ?>
                </select>
                <div class="input">
                    <input id="newGenre" name="newGenre" type="text" placeholder="<?= $lang["genre"] ?>">
                    <input id="genreDescription" name="genreDescription" type="text"
                           placeholder="<?= $lang["genreDescription"] ?>">

                </div>

            </div>
        </div>
        <div class="input">
            <input id="iban" name="iban" type="text" placeholder="<?= $lang["iban"] ?>" required>

        </div>
        <div class="input">
            <textarea id="address" name="address" type="text" placeholder="<?= $lang["address"] ?>" required></textarea>
        </div>
        <div class="input">
            <input id="city" name="city" type="text" placeholder="<?= $lang["city"] ?>" required>
        </div>
        <div class="action">
            <input type="submit" name="submit" value="<?= $lang["submit"] ?>" required>
        </div>
    </form>
    </body>
<?php
showFooter();
?>