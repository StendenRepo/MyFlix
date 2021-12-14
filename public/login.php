<?php
require_once "../src/config.php";
showHead("login",['assets/css/login.css']);
?>

<?php
$email = "";
$password = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["email"]) && !empty($_POST["password"])) {
		$email = $_POST["email"];
		$inputPassword = $_POST["password"];
		$conn = dbConnect();


		$sqlLogin = "SELECT id, username, password FROM account WHERE emailadress=?";
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
}

?>

    <body>

    <div class="flex-container">
        <div class="LoginImg">
            <a href="index.php">
                <img src="assets/img/logo.png">
            </a>
        </div>

        <div class="LoginForm">
            <form method="post" action="login.php">

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="E-mail adress" class="LoginInput">

                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Password" class="LoginInput">
                <div class="test">
                    <input type="submit" value="Log in" class="LoginButton">
                </div>
				<?php echo $error; ?>
            </form>
        </div>
        <div class="LoginNew">
            <p>New to MyFlix?</p>
            <a href=""">Register</a>
        </div>
    </div>

    </body>
<?php showFooter(); ?>