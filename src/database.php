<?php

/**create the database connection
 *
 * @return false|mysqli|null
 */
function dbConnect()
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    if (mysqli_errno() < 0) {
        return false;
    } else {
        return $connection;
    }
}


/**
 * close the connection to the database
 *
 * @param mysqli $connection
 * @return void
 */
function dbClose(mysqli $connection)
{
    mysqli_close($connection);
}

