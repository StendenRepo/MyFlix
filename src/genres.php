<?php
function getGenres(){
    // Database connection and SELECT statement
    $conn = dbConnect();
    $stmt = mysqli_query($conn, "SELECT `id`, `name` FROM `genre`");


    // puts data into array
    $data = [];
    while($row = mysqli_fetch_assoc($stmt)){
        array_push($data, $row);
    }

    dbClose($conn);

    return $data;
}