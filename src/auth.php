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

    if (!mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPass) ||
        !mysqli_stmt_execute($stmt)) {
        die("Something went wrong with preparing the statement \n" . mysqli_error($db));
    }

    mysqli_stmt_close($stmt);
    dbClose($db);

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

