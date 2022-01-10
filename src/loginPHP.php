<?php
if (isset($_SESSION['userId'])){
	header("location: profile.php");
}
else{
	echo "er is geen sessie";
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["email"]) && !empty($_POST["password"])) {
		$email = htmlspecialchars($_POST["email"]);
		$inputPassword = htmlspecialchars($_POST["password"]);
		$conn = dbConnect();

		$sqlLogin = "SELECT id, username, password FROM account WHERE email=?";
		$stmtLogin = mysqli_prepare($conn, $sqlLogin);
		mysqli_stmt_bind_param($stmtLogin, "s", $email);
		mysqli_stmt_execute($stmtLogin);
		mysqli_stmt_bind_result($stmtLogin, $id, $username, $password);
		mysqli_stmt_store_result($stmtLogin);


		if (mysqli_stmt_num_rows($stmtLogin) == 1) {
			while (mysqli_stmt_fetch($stmtLogin)) {
				if (password_verify($inputPassword, $password)) {
					$_SESSION['userId'] = $id;
					$_SESSION['username'] = $username;
					header("location: index.php");
					exit;
				} else {
					$error = "wrong information";
				}
			}
		} else {
			$error = "wrong information";
		}

		mysqli_stmt_close($stmtLogin);
		dbClose($conn);

	} else {
		$error = "please fill in everything";
	}

	if (!empty($_GET['registration'])) {
		if ($_GET['registration'] == 'succes') {
			$succes = "You have successfully made an account, please log in.";
		}
	}

}
?>
