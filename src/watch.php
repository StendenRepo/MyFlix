<?php

/**
 * Get the video information from the database
 * @param $id
 * @return bool|array|null
 */

function getVideo($id): bool|array|null {

    if (!is_numeric($id)) {
        return false;
    }

    $mysqli = dbConnect();

    // Use left join to get results even when there is no studioName
    $query = "SELECT c.`studioName`, c.`id`, f.`path`, f.`name`, f.`length`,f.`thumbnail`
              FROM `film` as f 
              JOIN `account` as a on f.`accountId`=a.`id` 
              JOIN `company` as c on a.`companyId`=c.`id` 
              WHERE f.`id`=? AND f.`accepted`=1";

    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, 's', $id);

    mysqli_stmt_execute($stmt);

    $res = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_array($res, MYSQLI_ASSOC);
}
