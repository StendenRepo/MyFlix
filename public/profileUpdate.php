<?php

require_once "../src/config.php";

if (isset($_POST['update'])) {
    $conn = dbConnect();

    $accountId = $_SESSION["userId"];

    $eMail = filter_var($_POST['eMail'], FILTER_SANITIZE_EMAIL);
    $studioName = filter_var($_POST['studioName'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    $bankAccount = filter_var($_POST['bankAccount'], FILTER_SANITIZE_STRING);

    $error = "";
    $success = "";

    require_once "../src/auth.php";

    if (empty($_POST['eMail']) || empty($_POST['studioName']) || empty($_POST['address']) || empty($_POST['city']) ||
        empty($_POST['bankAccount'])) {
        $error = "One or more fields are empty";
    } else {

        if (checkEmail($eMail, $accountId)) {
            if (checkIban($bankAccount, $accountId)) {
                $sqlCompany = "UPDATE company as c 
                   JOIN account as a on a.companyId = c.id 
                   SET a.email=?, c.studioName=?, c.address=?, c.city=?, c.iban=? 
                   WHERE a.id =?";


                if ($stmtCompany = mysqli_prepare($conn, $sqlCompany)) {
                    if (mysqli_stmt_bind_param($stmtCompany, "sssssi", $eMail, $studioName, $address, $city,
                        $bankAccount, $accountId)) {
                        if (!mysqli_stmt_execute($stmtCompany)) {
                            $error = "Query error in company table <br>";
                            die(mysqli_error($conn));
                        }
                    }
                } else {
                    $error = "Prepare error in company table <br>";
                    die(mysqli_error($conn));
                }
                $success = "Your profile has been updated";


            } else {
                $error = "Invalid IBAN";
            }
        } else {
            $error = "Invalid email";
        }


    }
    dbClose($conn);
}