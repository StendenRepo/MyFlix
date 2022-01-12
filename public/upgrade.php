<?php
require_once "../src/config.php";
require_once "../src/upgrade.php";
require_once "../src/genres.php";
global $lang;

showHead($lang["titleUpgrade"], ['assets/css/upgrade.css']);


?>
    <body>
    <?php showHeader() ?>
    <h1>Add company data</h1>
    <div class="upgradeForm">
        <form action="<?= htmlentities($_SERVER["PHP_SELF"]) ?>" id="formContainer" method="POST">
            <table>
                <tr>
                    <td>
                        <div class="input">
                            <input id="firstName" name="firstName" type="text" placeholder="<?= $lang["firstName"] ?>"
                                   autofocus required>
                        </div>
                    </td>
                    <td>
                        <div class="input">
                            <input id="lastName" name="lastName" type="text" placeholder="<?= $lang["lastName"] ?>"
                                   required>
                        </div>
                    </td>

                <tr>
                    <td>
                        <div class="input">
                            <input id="companyName" name="companyName" type="text"
                                   placeholder="<?= $lang["companyName"] ?>"
                                   required>
                        </div>
                    </td>
                    <td>
                        <div class="input">
                            <input id="iban" name="iban" type="text" placeholder="<?= $lang["iban"] ?>" required>

                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="genreSetter">
                            <div class="input">
                                <select name="genre" id="genre">
                                    <option value="" disabled selected><?= $lang["genreSellector"] ?></option>
                                    <?php

                                    foreach (getGenres() as $genre) {
                                        echo "<option value ='" . $genre['id'] . "'>" . $genre['name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td>
                        <div class="input">
                            <input id="newGenre" name="newGenre" type="text" placeholder="<?= $lang["genre"] ?>">
                        </div>
                    </td>
                    <td>
                        <div class="input">
                            <input id="genreDescription" name="genreDescription" type="text"
                                   placeholder="<?= $lang["genreDescription"] ?>">
                        </div>
                    </td>

                </tr>
                <tr>
                    <td>
                        <div class="input">
                    <textarea id="address" name="address" type="text" placeholder="<?= $lang["address"] ?>"
                              required></textarea>
                        </div>
                    </td>
                    <td>
                        <div class="input">
                            <input id="city" name="city" type="text" placeholder="<?= $lang["city"] ?>" required>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="action">
                <input type="submit" name="submit" value="<?= $lang["upgradeSubmit"] ?>" required>
            </div>
        </form>
    </div>
    </body>
<?php
showFooter();
?>