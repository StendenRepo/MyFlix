<?php
require_once "../src/config.php";
showHead("Videos", ['assets/css/home.css']);
// Make a connection with the database
$conn = dbConnect();

// Define the SQL Query
$sql = "SELECT *, genre.`id` as genreId, genre.name AS genreName 
        FROM genre JOIN film ON genre.id = film.genreId 
        WHERE film.accepted = 1
        ORDER BY genreName, film.name";

// Get results from the database
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Creates an empty array
$genres = [];

// Give nested array a name
foreach ($data as $row) {
    $genres[$row['genreName']][] = $row;
}

?>
    <body>
        <?php showHeader(); ?>
        <div class="content">
            <?php
            // Loop through array and get the data.
            foreach ($genres as $genre => $items) {
                // Check if there are enough videos in the genre.
                $amount = min(5, count($items));
                echo "<div class='genre'>"; ?>
                <a href="search.php?genre=<?= htmlspecialchars($items[0]['genreId']) ?>" class="noLink">
                    <h1><?= htmlspecialchars($genre) ?></h1>
                </a>
                <?php echo "<div class='images'>";
                // Takes 5 videos from the genre
                for ($id = 0; $id < $amount; $id++) {
                    echo "<a href='watch.php?v=" . $items[$id]['id'] . "'>
					<img src='" . $items[$id]['thumbnail'] . "' alt='" . $items[$id]['name'] . "'></a>";
                }
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </body>
<?php showFooter(); ?>