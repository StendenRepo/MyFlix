<?php

if(isset($_POST["approve"])){
    acceptAccount($id);
}

if(isset($_POST["deny"])){
    denyAccount($id);
}

$companyInfo = getCompanyInfo($id);

function getCompanyInfo($id){

    // DB connection and getting company info
    $conn = dbConnect();
    $infoStmt = mysqli_prepare($conn, "SELECT * FROM `company` WHERE id = ?");
    mysqli_stmt_bind_param($infoStmt, "i", $id);
    mysqli_stmt_execute($infoStmt);
    $result = mysqli_stmt_get_result($infoStmt);

    // puts info into array
    $companyInfo = mysqli_fetch_array($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    dbClose($conn);

    return $companyInfo;
}

function acceptAccount($id){
    global $lang;

    // DB connection and query to accept account
    $conn = dbConnect();
    $query = "UPDATE `company` SET `approved` = 1 WHERE `id` = ?";
    if(!$stmt = mysqli_prepare($conn, $query)){
        echo "DB error: " . mysqli_error($conn);
        die();
    }
    if(!mysqli_stmt_bind_param($stmt, "i", $id) || !mysqli_stmt_execute($stmt)){
        echo "DB error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    dbClose($conn);

    header("Location: accountMod.php?approval=" . $lang["approved"]);
    die();
}

function denyAccount($id){
    global $lang;
    
    // DB connection and query to deny/delete account
    $conn = dbConnect();
    $query = "DELETE FROM `company` WHERE `id` = ?";
    if(!$stmt = mysqli_prepare($conn, $query)){
        echo "DB error: " . mysqli_error($conn);
        die();
    }
    if(!mysqli_stmt_bind_param($stmt, "i", $id) || !mysqli_stmt_execute($stmt)){
        echo "DB error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
    dbClose($conn);

    header("Location: accountMod.php?approval=" . $lang["denied"]);
    die();
}