<?php

/**
 * Get the video information from the database if video is accepted
 * @param $id 
 * @param $isModerator default false
 * @return bool|array|null
 */

function getVideo($id, $isModerator = false): bool|array|null {

    if (!is_numeric($id)) {
        return false;
    }

    $mysqli = dbConnect();

    $query = "SELECT c.`studioName`, f.`path`, f.`name`, f.`length`, f.`accepted` 
              FROM `film` as f 
              JOIN `account` as a on f.`accountId`=a.`id` 
              JOIN `company` as c on a.`companyId`=c.`id` 
              WHERE f.`id`=?";

    if (!$isModerator) {
        $query .= " AND f.`accepted`=1";
    }

    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, 's', $id);

    mysqli_stmt_execute($stmt);

    $res = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_array($res, MYSQLI_ASSOC);
}
