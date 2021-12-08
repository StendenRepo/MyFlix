<?php
/**
 * Create the connection to the database
 *
 * @param $install
 * @return false|mysqli|null
 */
function dbConnect($install = false)
{
    if ($install) {
        return mysqli_connect(DB_HOST, DB_USER, DB_PASS);
    } else {
        return mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
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

