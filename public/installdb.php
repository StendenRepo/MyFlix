<?php
require_once "../src/config.php";

$connection = dbConnect(true);

if (mysqli_connect_errno() > 0) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}


$createDatabase = mysqli_prepare($connection, "CREATE DATABASE IF NOT EXISTS `" . DB_DATABASE . "` DEFAULT CHARACTER SET UTF8mb4 COLLATE utf8mb4_general_ci");
mysqli_stmt_execute($createDatabase);
mysqli_select_db($connection, DB_DATABASE);
$sqlPath = "../src/database/db.sql";
$sql = file_get_contents($sqlPath);
$sqlArray = explode(";", $sql);
foreach ($sqlArray as $query) {
    if ($query != "") {
        $stmnt = mysqli_prepare($connection, $query . ";");
        mysqli_stmt_execute($stmnt);
    } else {
        break;
    }
}

dbClose($connection);
header("refresh:2;url= /");
echo "u wordt terug geleid naar de homepagina";

