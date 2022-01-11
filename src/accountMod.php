<?php

$id = htmlspecialchars($_GET["userId"] ?? "");

$company = getNonApprovedCompany();

function getNonApprovedCompany(){
    // Database connection and SELECT statement
    $conn = dbConnect();
    $stmt = mysqli_query($conn, "SELECT * FROM `company` WHERE approved = 0");


    // puts data into array
    $data = [];
    while($row = mysqli_fetch_assoc($stmt)){
        array_push($data, $row);
    }

    dbClose($conn);

    return $data;
}

function acceptAccount($id){
    global $lang;

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

if(isset($_POST["approve"])){
    acceptAccount($id);
}

if(isset($_POST["deny"])){
    denyAccount($id);
}

function nonePendingMsg(){
    global $lang;
    
    if(empty(getNonApprovedCompany())){
        $status = $lang["nonePedning"];
        return $status;
    }
}