<?php
require_once "../src/config.php";
require_once "../utils/forms.php";

global $lang;

showHead($lang['changePassword'], ['assets/css/.css']);
?>
<?php
if (isset($_POST['submit'])){
    if (!empty($_POST['password']) && !empty($_POST['confirmPassword'])){
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        if (isValidPassword($password) && didPasswordMatch($password, $confirmPassword)){
            echo "Password  is valid and matches";
        }else{
            echo "Password is not valid or does not match.";
        }
    } else {
        echo "Both fields are empty";
    }
}
?>

    <body>

    <?php
    showHeader();
    ?>

        <form method="post" action="changePassword.php">
            <label for="Password"></label>
            <input type="password" name="password">
            <label for="Confirm Password"></label>
            <input type="password" name="confirmPassword">
            <input type="submit" name="submit">
        </form>
    </body>
<?php showFooter(); ?>