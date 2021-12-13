<?php
require_once "../src/config.php";
showHeader(['assets/css/login.css']);
?>

<?php
$email = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (!empty($_POST["email"]) && !empty($_POST["password"])) {
		$email = $_POST["email"];
		$password = $_POST["password"];
		$sql = "test@test.com";
		$sql2 = "test";
//		$conn = dbConnect();
//        $sql = "SELECT emailadress FROM account WHERE emailadress=$email";
//        $stmtLogin = mysqli_prepare($conn, $sql) OR DIE("stmt errer");
//
//        mysqli_stmt_execute($stmtLogin) OR DIE("stmt execute error");
//
//        mysqli_stmt_close($stmtLogin);
//        $sql2= "SELECT password FROM account WHERE emailadres = $email";
//        if()
		if ($email == $sql) {
			if ($password == $sql2) {
				echo "you are logged in";
			} else {
				echo "wrong information";
			}
		} else {
			echo "wrong information";
		}
	} else {
		echo "please fill in both";
	}
}

?>

    <body>

    <div class="flex-container">
        <div class="LoginImg">
            <img src="assets/img/logo.png">
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
            </form>
        </div>
        <div class="LoginNew">
            <p>New to MyFlix?</p>
            <a href=""">Register</a>
        </div>
    </div>

    </body>
<?php showFooter(); ?>