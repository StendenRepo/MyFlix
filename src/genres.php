<?php
function getGenres(){

    // Database connection and SELECT statement
    $conn = dbConnect();
    $stmt = mysqli_query($conn, "SELECT `id`, `name` FROM `genre`");

    // Puts statement into 2 arrays
    while($row = mysqli_fetch_array($stmt)){
        $genres[] = $row["name"];
        $ids[] = $row["id"];
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