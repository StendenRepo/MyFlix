<?php

/**
 * Gets all the videos that matches the creator or genre provided
 * @param $creator
 * @param $genre
 * @return array
 */
function getVideos($creator = null, $genre = null): array {
    $conn = dbConnect();
    // Requests from database where creator = $creator or genre = $genre
    $query = "SELECT f.`path`, f.`thumbnail`, f.`id`, f.`name`, c.`studioName`,g.`id` as genreId, g.`name` as genre, 
                     g.`description` as genreDescription
              FROM film as f 
              JOIN account as a on f.`accountId`= a.`id` 
              JOIN company as c ON a.companyId = c.`id`
              JOIN genre as g ON f.`genreId` = g.`id`
              WHERE f.`accepted`=1 AND c.`id`=? OR 
                    f.`accepted`=1 AND g.`id`=?
              ORDER BY f.`id` DESC 
              LIMIT 20";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ii", $creator, $genre);
    mysqli_stmt_execute($stmt);

    $res = mysqli_stmt_get_result($stmt);
    $results = mysqli_fetch_all($res, MYSQLI_ASSOC);
    dbClose($conn);
    return $results;
}