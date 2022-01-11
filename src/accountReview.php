<?php

$companyInfo = getCompanyInfo($id);

function getCompanyInfo($id){
    $conn = dbConnect();
    $infoStmt = mysqli_query($conn, "SELECT * FROM `company` WHERE id = $id");

    $companyInfo = [];
    while($row = mysqli_fetch_assoc($infoStmt)){
        array_push($companyInfo, $row);
    }

    dbClose($conn);

    return $companyInfo;
}