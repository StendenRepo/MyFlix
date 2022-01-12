<?php
require_once "../src/config.php";
showHead($lang["profile"], (['assets/css/profile.css', 'assets/css/menu.css']));

$error = "";
$success = "";

require_once './profileUpdate.php';
require_once './profileQuery.php';
require_once '../src/auth.php';
?>
    <body>
        <?php showHeader(); ?>
        <div class="content">
            <?php require_once __DIR__ . "/../src/menubar.php"; ?>
            <div id="profileContainer">
                <div id="titleContainer">
                    <h1 id="profileTitle"><?= $lang["editProfile"] ?></h1>
                    <?php
                    echo $error;
                    echo $success;
                    ?>
                </div>

                <div id="formContainer">
                    <form action="profile.php" method="post" id="myForm">

                        <div class="inputBox">
                            <label for="userName"><?= $lang["usernameLabel"] ?></label>
                            <input type="text" class="input" id="userName" name="userName" disabled
                                   value="<?= $username; ?>">
                        </div>
                        <div class="inputBox">
                            <label for="firstName"><?= $lang["firstName"] ?></label>
                            <input type="text" class="input" id="firstName" name="firstName" disabled
                                   value="<?= $firstName; ?>">
                        </div>
                        <div class="inputBox">
                            <label for="lastName"><?= $lang["lastName"] ?></label>
                            <input type="text" class="input" id="lastName" name="lastName" disabled
                                   value="<?= $lastName; ?>">
                        </div>
                        <div class="inputBox">
                            <label for="eMail"><?= $lang["emailLabel"] ?></label>
                            <input type="email" class="input" id="eMail" name="eMail"
                                   value="<?= $email; ?>">
                        </div>
                        <div class="inputBox">
                            <label for="companyName"><?= $lang["studioNameLabel"] ?></label>
                            <input type="text" class="input" id="studioName" name="studioName"
                                   value="<?= $studioName; ?>">
                        </div>
                        <div class="inputBox">
                            <label for="address"><?= $lang["addressLabel"] ?></label>
                            <input type="text" class="input" id="address" name="address"
                                   value="<?= $address; ?>">
                        </div>
                        <div class="inputBox">
                            <label for="city"><?= $lang["cityLabel"] ?></label>
                            <input type="text" class="input" id="city" name="city"
                                   value="<?= $city; ?>">
                        </div>
                        <div class="inputBox">
                            <label for="bankAccount"><?= $lang["bankLabel"] ?></label>
                            <input type="text" class="input" id="bankAccount" name="bankAccount"
                                   value="<?= $iban; ?>">
                        </div>
                        <div id="updateButton">
                            <input type="submit" name="update"
                                   value="<?= $lang["update"] ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </body>

<?php showFooter(); ?>