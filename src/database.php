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
 * @param $connection object you made by creating the connection to the database
 * @return void
 */
function dbClose($connection)
{
    mysqli_close($connection);
}

/**
 * test if database 'myflix exists'
 *
 * @return bool TRUE if database exists, FALSE if not
 */
function dbExists()
{
    return mysqli_select_db(dbConnect(), "myflix");

}