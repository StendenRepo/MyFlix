<?php

/**
 * Get the video information from the database if video is accepted
 * @param $id
 * @param $isModerator default false
 * @return bool|array|null
 */
function getVideo($id, $isModerator = false): bool|array|null
{

    // Checks if the provided id is a number
    if (!is_numeric($id)) {
        return false;
    }

    $mysqli = dbConnect();


    $query = "SELECT c.`studioName`, c.`id`, f.`path`, f.`name`, f.`length`, f.`thumbnail`
              FROM `film` as f 
              JOIN `account` as a on f.`accountId`=a.`id` 
              JOIN `company` as c on a.`companyId`=c.`id` 
              WHERE f.`id`=?";

    if (!$isModerator) {
        $query .= " AND f.`accepted`=1";
    }


    // Prepare the statement and bind the params to it
    $stmt = mysqli_prepare($mysqli, $query);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    // Execute the mysql query
    mysqli_stmt_execute($stmt);

    $res = mysqli_stmt_get_result($stmt);
    // Returns an array with the video information
    return mysqli_fetch_array($res, MYSQLI_ASSOC);
}

function acceptVideo($id)
{
    $db = dbConnect();
    $query = "UPDATE film SET accepted=1 WHERE id=?";

    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, 's', $id);
    mysqli_stmt_execute($stmt);
}

function declineVideo($id)
{
    $db = dbConnect();
    $query = "DELETE FROM film WHERE id=?";

    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, 's', $id);
    mysqli_stmt_execute($stmt);
}
