<?php

    require_once "../src/config.php";



if(isset($_POST['update'])) {
    $conn = dbConnect();

    $accountId = $_SESSION["userId"];
    echo $accountId;

    $eMail = $_POST['eMail'];
    $studioName = $_POST['studioName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $bankAccount = $_POST['bankAccount'];

    // Errors even weer terug zetten.
    $sqlAccount = "UPDATE account SET email=? WHERE id=?";
    $sqlCompany = "UPDATE company SET studioName=?, address=?, city=?, iban=? WHERE id=(SELECT companyId FROM account WHERE id=?)";

    $stmtAccount = mysqli_prepare($conn, $sqlAccount);
    $stmtCompany = mysqli_prepare($conn, $sqlCompany);

    mysqli_stmt_bind_param($stmtAccount, "si", $eMail, $accountId);
    mysqli_stmt_execute($stmtAccount);

    mysqli_stmt_bind_param($stmtCompany, "ssssi", $studioName, $address, $city, $bankAccount, $accountId);
    mysqli_stmt_execute($stmtCompany);

}