<?php

require_once "../src/config.php";


if (isset($_POST['update'])) {
    $conn = dbConnect();

    $accountId = $_SESSION["userId"];

    $eMail = $_POST['eMail'];
    $studioName = $_POST['studioName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $bankAccount = $_POST['bankAccount'];


    $updateSuccess = "Your profile has been updated.";

    $sqlCompany = "UPDATE company as c 
                   JOIN account as a on a.companyId = c.id 
                   SET a.email=?, c.studioName=?, c.address=?, c.city=?, c.iban=? 
                   WHERE a.id =?";

    if ($stmtCompany = mysqli_prepare($conn, $sqlCompany)) {
        if (mysqli_stmt_bind_param($stmtCompany, "sssssi", $eMail, $studioName, $address, $city,
            $bankAccount, $accountId)) {
            if (!mysqli_stmt_execute($stmtCompany)) {
                echo "Query error in company table." . "<br>";
                die(mysqli_error($conn));
            }
        }
    } else {
        echo "Prepare error in company table." . "<br>";
        die(mysqli_error($conn));
    }

    require_once "profileQuery.php";

    if (empty($_POST['eMail']) || empty($_POST['studioName']) || empty($_POST['address']) || empty($_POST['city']) ||
        empty($_POST['bankAccount'])) {
        echo "One or more fields are empty.";
    } elseif (!empty($_POST['eMail']) && $alreadyExists) {
        echo "This email is already in use.";
    } elseif (!empty($_POST['bankAccount']) && $alreadyExists) {
        echo "Enter a valid bank account number.";
    } else {
        echo $updateSuccess;
    }
}