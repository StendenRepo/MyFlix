<?php
/**
 * create the database connection
 *
 * @return false|mysqli
 */
function dbConnect($install = false)
{
    $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
    if (mysqli_connect_errno() > 0) {
        die("Could not connect to database");
    } else {
		if ($install){
			return $connection;
		}
		mysqli_select_db($connection, DB_DATABASE);
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
