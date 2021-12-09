<?php
/**
 * Create the database connection
 * @param bool $install
 * @return false|mysqli
 */
function dbConnect(bool $install = false): bool|mysqli
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    if (mysqli_connect_errno() > 0) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
    if ($install) {
        return $connection;
    }
    mysqli_select_db($connection, DB_DATABASE);
    return $connection;

}

/**
 * Close the mysqli connection to the database
 * @param mysqli $connection
 * @return void
 */
function dbClose(mysqli $connection)
{
    mysqli_close($connection);
}
