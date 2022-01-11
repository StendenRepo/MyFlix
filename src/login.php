<?php
global $lang;

// Check if user pushed button with POST.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if email and password are filled in.
    if (!empty($_POST["email"]) && !empty($_POST["password"])) {
        // Filter the input.
        $email = htmlspecialchars($_POST["email"]);
        $inputPassword = htmlspecialchars($_POST["password"]);

        // Connect to database.
        $conn = dbConnect();

        // Get data from database.
        $sqlLogin = "SELECT id, username, password FROM account WHERE email=?";
        $stmtLogin = mysqli_prepare($conn, $sqlLogin);
        mysqli_stmt_bind_param($stmtLogin, "s", $email);
        mysqli_stmt_execute($stmtLogin);
        mysqli_stmt_bind_result($stmtLogin, $id, $username, $password);
        mysqli_stmt_store_result($stmtLogin);

        // Check if there is 1 result.
        if (mysqli_stmt_num_rows($stmtLogin) == 1) {
            while (mysqli_stmt_fetch($stmtLogin)) {
                // If login information is correct, redirect to homepage.
                if (password_verify($inputPassword, $password)) {
                    $_SESSION['userId'] = $id;
                    $_SESSION['username'] = $username;
                    header("location: index.php");
                    exit;
                    // If the information is incorrect give an error.
                } else {
                    $error = $lang['wrongPassword'];
                }
            }
            // If there are more than 1 or 0 result give an error.
        } else {
            $error = $lang['wrongPassword'];
        }

        // Close the statement and the connection.
        mysqli_stmt_close($stmtLogin);
        dbClose($conn);

    } else {
        // If they are not both filled in give an error.
        $error = $lang['forgotInformation'];
    }

    // Check if user comes from registration and successfully made an account.
    if (!empty($_GET['registration'])) {
        if ($_GET['registration'] === "success") {
            $success = $lang['success'];
        }
    }
}
