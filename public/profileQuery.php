<?php

    require_once "../src/config.php";

    $conn = dbConnect();
    $accountId = isUserLoggedIn();
    $accountId = $_SESSION["userId"];

    $sql = "SELECT account.firstName, account.lastName, account.username, account.email, company.studioName, company.address, company.city, 
                    company.iban  
                FROM account, company 
                WHERE account.id=? AND company.id=account.companyId";

    if ($result = mysqli_prepare($conn, $sql)) {
        if (mysqli_stmt_bind_param($result, "i", $accountId)) {
            if (!mysqli_stmt_execute($result)) {
                echo "Query error";
                die(mysqli_error($conn));
            }
        }
    } else {
        echo "Prepare error";
        die(mysqli_error($conn));
    }

    mysqli_stmt_bind_result($result, $firstName, $lastName, $username, $email, $studioName, $address, $city, $iban);

    mysqli_stmt_store_result($result);

    if (mysqli_stmt_num_rows($result) > 0) {
        while (mysqli_stmt_fetch($result)) {
            $alreadyExists = "";
        }
    } else {
        echo "No data found";
    }
