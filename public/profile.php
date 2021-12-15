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

        <?php require_once './profileConfig.php'; ?>

        <body>
            <div id="profileContainer">
                <div id = "titleContainer">
                    <h2 id="profileTitle">Your Profile</h2>
                </div>

                <div id = "formContainer">
                    <form action="" method="post" id="myForm">

                        <div class="inputBox">
                            <label for="userName">Username</label>
                            <input type="text" id="userName" name="userName" disabled value="<?php echo $username; ?>">
                        </div>
                        <div class="inputBox">
                            <label for="eMail">E-mail address</label>
                            <input type="email" id="eMail" name="eMail" value="<?php echo $email; ?>">
                        </div>
                        <div class="inputBox">
                            <label for="passWord">Password</label>
                            <input type="password" id="passWord" name="passWord" placeholder="New password">
                        </div>
                        <div class="inputBox">
                            <label for="cPassWord">Confirm password</label>
                            <input type="password" id="cPassWord" name="cPassWord" placeholder="Re-enter new password">
                        </div>
                        <div class="inputBox">
                            <label for="firstName">First name</label>
                            <input type="text" id="firstName" name="firstName" disabled value="<?php echo $firstName; ?>">
                        </div>
                        <div class="inputBox">
                            <label for="lastName">Last name</label>
                            <input type="text" id="lastName" name="lastName" disabled value="<?php echo $lastName; ?>">
                        </div>
                        <div class="inputBox">
                            <label for="companyName">Company name</label>
                            <input type="text" id="companyName" name="companyName" placeholder="Company name">
                        </div>
                        <div class="inputBox">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" placeholder="Address">
                        </div>
                        <div class="inputBox">
                            <label for="postalCode">Postal Code</label>
                            <input type="text" id="postalCode" name="postalCode" placeholder="Postal code">
                        </div>
                        <div class="inputBox">
                            <label for="city">City</label>
                            <input type="text" id="city" name="city" placeholder="City">
                        </div>
                        <div class="inputBox">
                            <label for="country">Country</label>
                            <input type="text" id="country" name="country" placeholder="Country">
                        </div>
                        <div class="inputBox">
                            <label for="bankAccount">Bank Account Number</label>
                            <input type="text" id="bankAccount" name="bankAccount" placeholder="Bank Account Number">
                        </div>
                        <div class="inputBox">
                            <label for="accountType">Account Type</label>
                            <select id="accountType" name="accountType">
                                <option value="viewer">Viewer</option>
                                <option value="contentCreator">Content Creator</option>
                            </select>
                        </div>
                        <div id="button">
                            <input type="submit" value="Update Profile">
                        </div>
                    </form>
                </div>
            </div>

        </body>
    </html>

<?php showFooter(); ?>