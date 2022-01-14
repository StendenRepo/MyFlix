<?php
require_once "../src/config.php";

//connection database
$conn = dbConnect();

//query
$sql = "SELECT film.id, film.path, film.thumbnail, film.name,  company.studioName
        FROM film
        JOIN account on film.accountId = account.id
        JOIN company on account.companyId=company.id
        WHERE film.accepted = 0
        ORDER BY film.id ASC";

$statement = mysqli_prepare($conn, $sql) or die('prep error');
mysqli_stmt_execute($statement) or die('exec error');

mysqli_stmt_bind_result($statement, $id, $path, $thumbnail, $name, $studio);
mysqli_stmt_store_result($statement);

showHead("videoMod", ['assets/css/videoMod.css', 'assets/css/menu.css']);
?>
    <body>
        <?php showHeader(); ?>
        <div class="content">
            <?php
            require_once __DIR__ . "/../src/menubar.php"; ?>
            <div class="videos">
                <h1 class="header-text">Videos that needed approval</h1>
                <?php
                while (mysqli_stmt_fetch($statement)) { ?>
                    <div class="container">
                        <div class="thumbnail">
                            <a href="watch.php?v=<?= htmlspecialchars($id) ?>">
                                <img src="<?= htmlspecialchars($thumbnail) ?>" alt="<?= htmlspecialchars($name) ?>">
                            </a>
                        </div>
                        <div class="info">
                            <h1><?= htmlspecialchars($name) ?></h1>
                            <p><?= htmlspecialchars($studio) ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </body>
<?php
showFooter();
dbClose($conn);
?>