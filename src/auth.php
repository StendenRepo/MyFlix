<?php
/**
 * @param string $username
 * @param string $email
 * @param string $pass
 * @return void
 */
function register(string $username, string $email, string $pass)
{
    if (getUserByEmail($email)) {
        echo "User already exists";
        return;
    }

    $db = dbConnect();
    $hashedPass = hashPassword($pass);

    $stmt = mysqli_prepare($db, "INSERT INTO account (username, email, password) VALUES (?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "sss",
        $username, $email, $hashedPass);

    mysqli_stmt_execute($stmt);
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
    echo $email;
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

function hashPassword(string $password): string
{
    return password_hash($password, PASSWORD_BCRYPT);
}