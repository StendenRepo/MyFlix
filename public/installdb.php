<?php
require_once "../src/config.php";
// TODO add check if the database is installed. if not create the database with all tables.

//
$connection = dbConnect(true);
//test connection and existence of database
if (mysqli_connect_errno()) {
	die("Failed to connect to MySQL: " . mysqli_connect_error());
}
try {
	mysqli_select_db($connection,"myflix");
}catch(mysqli_sql_exception $exception){
	echo "could not connect to database";
}

echo "database does not exist \nwill now install database.";

$createDatabase = mysqli_prepare($connection, "CREATE DATABASE IF NOT EXISTS `myflix` DEFAULT CHARACTER SET UTF8mb4 COLLATE utf8mb4_general_ci");

mysqli_stmt_execute($createDatabase);
echo "created database\n";

mysqli_select_db($connection, "myflix");
echo "using myflix";

$sqlPath = "../src/database/db.sql";

$sql = file_get_contents($sqlPath);
$sqlArray = explode(";", $sql);

foreach ($sqlArray as $query) {
	if ($query != "") {
		$stmnt = mysqli_prepare($connection, $query . ";");
		mysqli_stmt_execute($stmnt);
		echo "<pre>executed statement:\n".$query."</pre><hr>";
	} else {
		exit;
	}
}

mysqli_close($connection);
echo "closed connection";