<?php
require_once "../src/config.php";
require_once "../src/indexPHP.php";
showHead("Videos", ['assets/css/home.css']);
?>
    <body>
	<?php showHeader(); ?>

	<?php
	//step 1, 2: connection
	$conn = dbConnect();

	//Genre id for genre 1
	$sql= "SELECT film.thumbnail, genre.name, film.name FROM film INNER JOIN genre ON genre.id = film.genreId WHERE film.id between 1 and 5";
	$stmt = mysqli_prepare($conn, $sql);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_bind_result($stmt, $Thumbnails, $genre, $filmName);
	mysqli_stmt_store_result($stmt);
	mysqli_stmt_num_rows($stmt);

	$sql2= "SELECT film.thumbnail, genre.name, film.name FROM film INNER JOIN genre ON genre.id = film.genreId WHERE film.id between 6 and 10";
	$stmt2 = mysqli_prepare($conn, $sql2);
	mysqli_stmt_execute($stmt2);
	mysqli_stmt_bind_result($stmt2, $Thumbnails2, $genre2, $filmName2);
	mysqli_stmt_store_result($stmt2);
	mysqli_stmt_num_rows($stmt2);



	?>

    <div class="content">
        <h1>Horror</h1>
        <div class="images">
            <?php
            while(mysqli_stmt_fetch($stmt)) {
                echo "<a href='watch.php'><img src='" . $Thumbnails . "' alt='placeholder'></a>";
            }
            mysqli_stmt_close($stmt);
            ?>
        </div>
        <h1>Horror</h1>
        <div class="images">
			<?php
			while(mysqli_stmt_fetch($stmt2)) {
				echo "<a href='watch.php'><img src='" . $Thumbnails2 . "' alt='placeholder'></a>";
			}
			mysqli_stmt_close($stmt2);
			?>
        </div>
    </div>
    </body>
<?php showFooter();
dbClose($conn);

?>