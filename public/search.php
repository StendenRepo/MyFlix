<?php
require_once __DIR__ . "/../src/config.php";
require_once __DIR__ . "/../src/results.php";

global $lang;

$videos = [];
$title = $lang['searchNoResultTitle'];
$searchType = null;

if (!empty($_GET["creator"])) {
    $videos = getVideos($_GET["creator"]);
    if (!empty($videos)) {
        $searchType = "creator";
    }
} else if (!empty($_GET["genre"])) {
    $videos = getVideos(null, $_GET["genre"]);
    if (!empty($videos)) {
        $searchType = "genre";
    }
}

// Display the genre or studio name in the title
if ($searchType === "genre") {
    $title = $videos[0]["genre"];
} else if ($searchType === "creator") {
    $title = $videos[0]["studioName"];
}
showHead(htmlspecialchars($title), ["assets/css/search.css"]);
?>
    <body>
        <?php showHeader(); ?>
        <div class="content">
            <div class="searchHeader">
                <div class="info">
                    <?php if ($searchType === "creator") { ?>
                        <h1><?= htmlspecialchars($videos[0]["studioName"]) ?></h1>
                        <a href="search.php?genre=<?= htmlspecialchars($videos[0]["genreId"]) ?>" class="noLink">
                            <h2><?= htmlspecialchars($videos[0]["genre"]) ?></h2>
                        </a>
                    <?php } elseif ($searchType === "genre") { ?>
                        <h1><?= htmlspecialchars($videos[0]["genre"]) ?></h1>
                    <?php } elseif ($searchType === null) { ?>
                        <h1><?= $lang["searchNoResult"] ?></h1>
                    <?php } ?>
                </div>
            </div>
            <div class="searchVideos">
                <?php foreach ($videos as $video) { ?>
                    <a href="watch.php?v=<?= $video['id'] ?>">
                        <img src="<?= $video['thumbnail'] ?>" alt="<?= htmlspecialchars($video['name']) ?>">
                    </a>
                <?php } ?>
            </div>
        </div>
    </body>
<?php
showFooter();