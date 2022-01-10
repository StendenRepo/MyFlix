<?php
include "genres.php";
if (isset($_POST["submit"])) {
    $firstname = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastName = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $companyName = filter_input(INPUT_POST, "companyName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $iban = filter_input(INPUT_POST, "iban", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    $companyQuery = "INSERT INTO `company`('studioName', 'genre', 'iban', 'address', 'city') VALUES (?,?,?,?,?);";
    $userQuery = "UPDATE account SET `firstName` = ? , `lastName` = ?, `companyId` = ? WHERE `id` = '?';";
    $newGenreQuery = "INSTER INTO 'genre'('name','description')VALUES(?,?);";


    $conn = dbConnect();

    $companyStmt = mysqli_prepare($conn, $companyQuery);
    mysqli_stmt_bind_param($companyStmt, "sssss", $companyName,);

}