<?php
/**
 * @param string $username
 * @param string $email
 * @param string $pass
 * @return array|null
 */
function register(string $username, string $email, string $pass): ?array
{
    // TODO: return a session with a error msg "email already exists"
    if (getUserByEmail($email))
        return ["email" => "Email already exists"];

    $db = dbConnect();
    $hashedPass = hashPassword($pass);

    $stmt = mysqli_prepare($db, "INSERT INTO account (username, email, password) VALUES (?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "sss",
        $username, $email, $hashedPass);

    mysqli_stmt_execute($stmt);


    header("Location:login.php?registration=success");
    exit;
}

/**
 * If a user exists returns that user information
 * if a user does not exist returns false
 *
 * @param string $email
 * @return array|false
 */

function getUserByEmail(string $email): bool|array
{
    $db = dbConnect();
    $stmt = mysqli_prepare($db, "SELECT * from account where email = ?");

    if (!mysqli_stmt_bind_param($stmt, "s", $email) || !mysqli_stmt_execute($stmt)) {
        die("Something went wrong with preparing the statements \n" . mysqli_error($db));
    }

    $result = mysqli_stmt_get_result($stmt);
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
    dbClose($db);

    if (mysqli_num_rows($result) === 0) {
        return false;
    }

    return mysqli_fetch_assoc($result);

}

/**
 * hash password with the bcrypt algorithm
 *
 * @param string $password
 * @return string returns hashed password
 */
function hashPassword(string $password): string
{
    return password_hash($password, PASSWORD_BCRYPT);
}

/**
 * Verifies if the password is valid.
 * The password requirements are
 * at least 1 Uppercase, 1 Lowercase, 1 Number
 * and 8 characters long
 *
 * @param string $password
 * @return bool returns true if pattern matches the subject, false if it does not.
 */

function isValidPassword(string $password): bool
{
    if (preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password)) {
        return true;
    }
    return false;
}

/**
 * Binary comparison
 * matches the password with a confirmed password
 *
 * @param string $password
 * @param string $confirmPassword
 * @return bool returns true if password did match with the confirmed password. else returns false
 */
function didPasswordMatch(string $password, string $confirmPassword): bool
{
    if (strcmp($password, $confirmPassword) === 0) {
        return true;
    }
    return false;
}