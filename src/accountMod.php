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

function nonePendingMsg(){
    global $lang;
    
    // Checks if there is data in array
    if(empty(getNonApprovedCompany())){
        $status = $lang["nonePedning"];
        return $status;
    }
}