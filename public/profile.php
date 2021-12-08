<?php
require_once "../src/config.php";
showHeader(['assets/css/profile.css']);
?>

<!DOCTYPE html>

    <html>
        <head>
            <meta charset="utf-8">
            <title>Profile page</title>
            <link rel="stylesheet" href="assets/css/profile.css">
        </head>

        <body>
            <?php

            ?>

        <div class="profileContainer">
            <h2>Profile</h2>
            <form action="" method="post">
                <div class="inputBox">
                    <label for="userName">Username</label>
                    <input type="text" id="userName" name="userName" disabled>
                </div>
                <div class="inputBox">
                    <label for="eMail">E-mail address</label>
                    <input type="text" id="eMail" name="eMail">
                </div>
                <div class="inputBox">
                    <label for="passWord">Password</label>
                    <input type="text" id="passWord" name="passWord">
                </div>
                <div class="inputBox">
                    <label for="companyName">Company name</label>
                    <input type="text" id="companyName" name="companyName">
                </div>
                <div class="inputBox">
                    <label for="fullName">Full name</label>
                    <input type="text" id="fullName" name="fullName">
                </div>
                <div class="inputBox">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address">
                </div>
                <div class="inputBox">
                    <label for="postalCode">Postal Code</label>
                    <input type="text" id="postalCode" name="postalCode">
                </div>
                <div class="inputBox">
                    <label for="city">City</label>
                    <input type="text" id="city" name="city">
                </div>
                <div class="inputBox">
                    <label for="country">Country</label>
                    <input type="text" id="country" name="country">
                </div>
                <div class="inputBox">
                    <label for="bankAccount">Bank Account Number</label>
                    <input type="text" id="bankAccount" name="bankAccount">
                </div>
                <div class="inputBox">
                    <label for="accountType">Account Type</label>
                    <select id="accountType" name="accountType">
                        <option value="viewer">Viewer</option>
                        <option value="contentCreator">Content Creator</option>
                    </select>
                </div>
                <div class="inputBox">
                    <button type="submit" class="button">Update Profile</button>
                </div>
            </form>
        </div>

        </body>
    </html>

<?php showFooter(); ?>