<?php
$conn = dbConnect();

if(!$conn) {
    DIE("Database connection failed: " . mysqli_connect_error());
}

$db = mysqli_select_db($conn, "myflix");

if(!$db) {
    DIE('This database does not exist');
}

$sql = "SELECT firstName, lastName, username, email FROM account WHERE id='12345'";
/* ^ Has to later become: WHERE id='{$_SESSION['id']}' or whatever connects the user to the ID */

$result = mysqli_query($conn, $sql);

if($result = mysqli_prepare($conn, $sql)) {
    if(!mysqli_stmt_execute($result)) {
        echo "Query error";
        die(mysqli_error($conn));
    }
}
else{
    echo "Prepare error";
    die(mysqli_error($conn));
}

mysqli_stmt_bind_result($result,$firstName, $lastName, $username, $email);

mysqli_stmt_store_result($result);

if(mysqli_stmt_num_rows($result) > 0) {
    while (mysqli_stmt_fetch($result)) {
    }
} else {
    echo "No data found";
}
?>