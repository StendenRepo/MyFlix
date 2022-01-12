<?php
require_once "../src/config.php";
showHead("videoMod", ['assets/css/videoMod.css']);
?>
   
<?php
//connection database
$conn = dbConnect();

//query
$sql = "SELECT film.id, film.path, film.thumbnail, film.name,  company.studioName
        FROM film
        JOIN account on film.accountId = account.id
        JOIN company on account.companyId=company.id
        WHERE film.accepted = 0
        ORDER BY film.id ASC";

$statement = mysqli_prepare($conn, $sql) OR DIE('prep error');
mysqli_stmt_execute($statement) OR DIE('exec error');
//print_r($statement);
mysqli_stmt_bind_result($statement,$id,$path, $thumbnail, $name, $studio);
mysqli_stmt_store_result($statement);
?>
    <body>
    <?php showHeader(); ?>
        <div class="content">
            <?php
            while (mysqli_stmt_fetch($statement)) {
                
                echo "<div class='container'> 
                        <div class='thumbnail'>
                            <a href='watch.php?v=" . $id . "'>
                            <img src='" . $thumbnail . "' alt='" . $name . "'></a>
                        </div> 
                        <div class-'info'th>
                            $name, $studio
                        </div>
                    </div>";
            }
            ?>
        </div>
    </body>
    <?php
showFooter();
dbClose($conn);
?>