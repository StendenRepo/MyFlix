<?php

/**
 * Get the video information from the database
 * @param $id
 * @return bool|array|null
 */

function getVideo($id): bool|array|null {
    // Checks if the provided id is a number
    if (!is_numeric($id)) {
        return false;
    }

    $mysqli = dbConnect();
    // Use left join to get results even when there is no studioName
    $query = "SELECT c.`studioName`, f.`path`, f.`name`, f.`length` 
              FROM `film` as f 
              LEFT JOIN `account` as a on f.`accountId`=a.`id` 
              LEFT JOIN `company` as c on a.`companyId`=c.`id` 
              WHERE f.`id`=? AND f.`accepted`=1";

    // Prepare the statement and bind the params to it
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    // Execute the mysql query
    mysqli_stmt_execute($stmt);

    $res = mysqli_stmt_get_result($stmt);
    // Returns an array with the video information
    return mysqli_fetch_array($res, MYSQLI_ASSOC);
}
