<?php
require_once "../src/config.php";
showHead("profile", (['assets/css/profile.css']));
?>

    <!DOCTYPE html>

    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Profile page</title>
    </head>
    <?php
    require_once './profileUpdate.php';
    require_once './profileQuery.php';
    ?>

    <body>

    <?php showHeader(); ?>

    <div id="profileContainer">
        <div id="titleContainer">
            <h2 id="profileTitle">Edit Profile</h2>
        </div>

        <div id="formContainer">
            <form action="" method="post" id="myForm">

                <div class="inputBox">
                    <label for="userName">Username</label>
                    <input type="text" class="input" id="userName" name="userName" disabled
                           value="<?php echo $username; ?>">
                </div>
                <div class="inputBox">
                    <label for="firstName">First name</label>
                    <input type="text" class="input" id="firstName" name="firstName" disabled
                           value="<?php echo $firstName; ?>">
                </div>
                <div class="inputBox">
                    <label for="lastName">Last name</label>
                    <input type="text" class="input" id="lastName" name="lastName" disabled
                           value="<?php echo $lastName; ?>">
                </div>
                <div class="inputBox">
                    <label for="eMail">E-mail address</label>
                    <input type="email" class="input" id="eMail" name="eMail" value="<?php echo $email; ?>">
                </div>
                <div class="inputBox">
                    <label for="companyName">Studio name</label>
                    <input type="text" class="input" id="studioName" name="studioName"
                           value="<?php echo $studioName; ?>">
                </div>
                <div class="inputBox">
                    <label for="address">Address</label>
                    <input type="text" class="input" id="address" name="address" value="<?php echo $address; ?>">
                </div>
                <div class="inputBox">
                    <label for="city">City</label>
                    <input type="text" class="input" id="city" name="city" value="<?php echo $city; ?>">
                </div>
                <div class="inputBox">
                    <label for="bankAccount">Bank Account Number</label>
                    <input type="text" class="input" id="bankAccount" name="bankAccount" value="<?php echo $iban; ?>">
                </div>
                <div id="cancelButton">
                    <input type="submit" id="cancel" name="cancel" value="Cancel">
                </div>
                <div id="updateButton">
                    <input type="submit" name="update" value="Update Profile">
                </div>
                    <?php if($updateSuccess) {
                        echo "<div id='success'>" . $updateSuccess . "</div>";
                    }?>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['cancel'])) {
        header("Location: index.php");
        exit();
    }
    ?>

    </body>
    </html>

<?php showFooter(); ?>