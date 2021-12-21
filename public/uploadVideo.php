<?php
require_once "../src/config.php";
require_once "../src/genres.php";
require_once "../src/uploader.php";
global $lang;
showHead($lang['uploadVideo'], ['assets/css/uploadvideo.css']);
?>
    <body>
        <?php showHeader() ?>
        <form action="<?= htmlentities($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
            <label for="title">Title</label>
            <input type="text" id="title" name="title">

            <label for="video">Video file</label>
            <input type="file" name="video">

            <label for="thumbnail">Thumbnail file</label>
            <input type="file" name="thumbnail">

            <?php foreach (getGenres() as $genre): ?>
                <input type="radio" name="genre" id="<?= $genre["id"] ?>" value="<?= $genre["id"] ?>">
                <label for="<?= $genre["id"] ?>"><?= $genre["name"] ?></label>
            <?php endforeach ?>

            <input type="submit" name="submitVideo" value="Upload">
        </form>

        <!-- shorthand for isset -->
        <p><?= htmlspecialchars($_GET["error"] ?? ""); ?></p>
        <p><?= htmlspecialchars($_GET["upload"] ?? ""); ?></p>
    </body>
<?php showFooter(); ?>