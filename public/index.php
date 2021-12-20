<?php
require_once "../src/config.php";
showHead("Videos", ['assets/css/home.css']);
?>

<?php
$conn = dbConnect();
$sql = "SELECT *, genre.name AS genreName FROM genre JOIN film ON genre.id = film.genreId ORDER BY genreName, film.name";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

$genres = [];

foreach ($data as $row) {
	$genres[$row['genreName']][] = $row;
}


?>
    <body>
	<?php showHeader(); ?>
    <div class="content">
		<?php
		foreach ($genres as $genre => $items) {
			if (count($items) > 4) {
				echo "<h1>" . $genre . "</h1>";
				echo "<div class='images'>";
				for ($id = 0; $id < 5; $id++) {
					echo "<a href='watch.php?v=" . $items[$id]['id'] . "'><img src='" . $items[$id]['thumbnail'] . "' alt='" . $items[$id]['name'] . "'></a>";
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