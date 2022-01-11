<?php
require_once "../src/config.php";
require_once "../utils/forms.php";

global $lang;

showHead($lang['changePassword'], ['assets/css/changePassword.css']);
?>
<?php
$accountId = $_SESSION["userId"];
$success = "";
$error = "";
if (isset($_POST['submit'])) {
	if (!empty($_POST['password']) && !empty($_POST['confirmPassword'])) {
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirmPassword'];
		if (isValidPassword($password) && didPasswordMatch($password, $confirmPassword)) {
			$conn = dbConnect();

			$hashedPassword = hashPassword($password);

			$sql = "UPDATE account
            SET password = ?
            WHERE id = ?";

			if ($stmt = mysqli_prepare($conn, $sql)) {
				if (mysqli_stmt_bind_param($stmt, 'si', $hashedPassword, $accountId)) {
					if (mysqli_stmt_execute($stmt)) {
						$success = "Your password has been updated.";
					} else {
						$error = $lang["queryError"];
					}
				}
			} else {
				$error = $lang["prepareError"];
				die(mysqli_error($conn));
			}
		} else {
			$error = $lang["invalidPassword"];
		}
	} else {
		$error = $lang["empty"];
	}
}
?>

    <body>

	<?php
	showHeader();
	?>
    <div class="body">
        <h2><?= $lang["changePassword"] ?></h2>
        <div class="containerForm">
            <form method="post" action="changePassword.php" class="formContainer">
                <label for="Password"></label>
                <input type="password" name="password" class="input">
                <label for="Confirm Password"></label>
                <input type="password" name="confirmPassword" class="input">
				<?= $success ?>
                <div class="error">
					<?= $error ?>
                </div>
                <input type="submit" name="submit">
            </form>
        </div>
    </div>


    </body>
<?php showFooter(); ?>