<?php
function getGenres(){

    // Database connection and SELECT statement
    $conn = dbConnect();
    $idStmt = mysqli_query($conn, "SELECT `id` FROM `genre`");
    $genreStmt = mysqli_query($conn, "SELECT `name` FROM `genre`");

    // Puts ids in array
    while($idRow = mysqli_fetch_array($idStmt)){
        $ids[] = $idRow["id"];
    }

    // Puts genres in array
    while($genreRow = mysqli_fetch_array($genreStmt)){
        $genres[] = $genreRow["name"];
    }

    // Combines both arrays into one
    $combined = array_combine($ids, $genres);

    // Displays the results
    foreach($combined as $id => $genre){
        ?><input type="radio" id="<?= $genre ?>" name="genre" value="<?= $id; ?>">
        <label for="<?= $genre; ?>"><?= $genre; ?></label><?php
    }
}
?>