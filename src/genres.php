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

function idToGenre($id, $companyInfo){
    $data = getGenres();
    
    foreach ($companyInfo as $key => $val) {
        if ($val["id"] === $id) {
            $key = $key;
        }
    }

    $genre = $data[$key]["name"];

    return $genre;
}