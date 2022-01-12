<?php
include "genres.php";
if (isset($_POST["submit"])) {
    $firstname = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastName = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $companyName = filter_input(INPUT_POST, "companyName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $iban = filter_input(INPUT_POST, "iban", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $genre = filter_input(INPUT_POST, "genre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $newGenre = filter_input(INPUT_POST, "newGenre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $newGenreDesc = filter_input(INPUT_POST, "genreDescription", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

// Query to create new company record
    $companyQuery = "INSERT INTO `company`(`studioName`, `genre`, `iban`, `address`, `city`) VALUES (?,?,?,?,?);";
// Query to update account record
    $userQuery = "UPDATE account SET `accountLevel`= 1, `firstName` = ? , `lastName` = ?, `companyId` = (SELECT `id` FROM `company` WHERE `studioName` = ?) WHERE `id` = ?;";
// Query for creating a new genre record
    $newGenreQuery = "INSERT INTO `genre`(`name`,`description`)VALUES(?,?);";
// Query for getting the new genre id
    $getNewGenreIdQuery = "SELECT id FROM genre WHERE name = ?";


    $conn = dbConnect();

// creating new genre record in database when there is no existing genre selected
    if (!isset($genre)) {
        $newGenreStmt = mysqli_prepare($conn, $newGenreQuery);
        mysqli_stmt_bind_param($newGenreStmt, "ss", $newGenre, $newGenreDesc);
        mysqli_stmt_execute($newGenreStmt);

// getting the id of the new created genre record
        $getNewGenreIdStmt = mysqli_prepare($conn, $getNewGenreIdQuery);
        mysqli_stmt_bind_param($getNewGenreIdStmt, "s", $newGenre);
        mysqli_stmt_execute($getNewGenreIdStmt);
        mysqli_stmt_bind_result($getNewGenreIdStmt, $genreId);
        mysqli_stmt_fetch($getNewGenreIdStmt);
        $genre = $genreId;
        mysqli_stmt_close($getNewGenreIdStmt);
    }

//    creating the new company record
    $companyStmt = mysqli_prepare($conn, $companyQuery);
    mysqli_stmt_bind_param($companyStmt, "sssss", $companyName, $genre, $iban, $address, $city);
    mysqli_stmt_execute($companyStmt);

//   Updating the user record with the new company and new data
    $userStmt = mysqli_prepare($conn, $userQuery);
    mysqli_stmt_bind_param($userStmt, "ssss", $firstname, $lastName, $companyName, $_SESSION['userId']);
    mysqli_stmt_execute($userStmt);

    dbClose($conn);

    header("location: uploadVideo.php");
}