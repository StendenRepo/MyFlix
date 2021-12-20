<?php
require_once "../src/config.php";
showHead("Videos", ['assets/css/home.css']);
?>

<?php
//connection database
$conn = dbConnect();

//query
$sql = "SELECT *, genre.name AS genreName 
        FROM genre JOIN film ON genre.id = film.genreId 
        WHERE film.accepted = 1
        ORDER BY genreName, film.name";

//get results
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

//make array
$genres = [];

//give nested array a name
foreach ($data as $row) {
	$genres[$row['genreName']][] = $row;
}


?>
    <body>
	<?php showHeader(); ?>
    <div class="content">
		<?php
        //loop through array and get the data.
		foreach ($genres as $genre => $items) {
            //check if there are enough videos in the genre.
			if (count($items) > 4) {
				echo "<h1>" . $genre . "</h1>";
				echo "<div class='images'>";
                //takes 5 videos from the genre
				for ($id = 0; $id < 5; $id++) {
					echo "<a href='watch.php?v=" . $items[$id]['id'] . "'>
					<img src='" . $items[$id]['thumbnail'] . "' alt='" . $items[$id]['name'] . "'></a>";
				}
				echo "</div>";
			}else{
                $amount = count($items);
				echo "<h1>" . $genre . "</h1>";
				echo "<div class='images'>";
				//takes 5 videos from the genre
				for ($id = 0; $id < $amount; $id++) {
					echo "<a href='watch.php?v=" . $items[$id]['id'] . "'>
					<img src='" . $items[$id]['thumbnail'] . "' alt='" . $items[$id]['name'] . "'></a>";
				}
				echo "</div>";
            }
		}
		?>

    </div>
    </body>
<?php
showFooter();
dbClose($conn);
?>