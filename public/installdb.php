<?php
require_once "../src/config.php";

// Connect to the database
$connection = dbConnect(true);

// Escape the database name
$dbName = mysqli_real_escape_string($connection, DB_DATABASE);

// Remove the database
mysqli_query($connection, "DROP DATABASE `" . $dbName . "`");
// Create a new database
mysqli_query($connection, "CREATE DATABASE `" . $dbName . "` DEFAULT CHARACTER SET UTF8mb4 COLLATE utf8mb4_general_ci");
// Switch to the new database
mysqli_select_db($connection, $dbName);

/**
 * Parses a SQL file and run the sql commands
 * @param $fileName
 * @return void
 */
function loopTroughSQL($fileName) {
    global $connection;
    $sql = file_get_contents($fileName);
    $sqlArray = explode(";", $sql);

    foreach ($sqlArray as $query) {
        if (empty($query)) break;
        $stmt = mysqli_prepare($connection, $query . ";");
        mysqli_stmt_execute($stmt);
    }
}

// Install the database tables
loopTroughSQL(__DIR__ . "/../database/db.sql");
// Add some dummy data
loopTroughSQL(__DIR__ . "/../database/dummy_data.sql");

// Close the database connection
dbClose($connection);
// Redirect user to the home page
header("refresh:2;url=index.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database Install</title>
    <style>
        /* Change the background to dark-mode */
        body {
            background-color: #2d2d2d;
            color: white;
        }
    </style>
</head>
<body>
    <h1>You will be redirected to the home page</h1>
</body>
</html>