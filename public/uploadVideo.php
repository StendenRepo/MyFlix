<?php
require_once "../src/config.php";
require_once "../src/genres.php";
require_once "../src/uploader.php";
global $lang;
showHead($lang['uploadVideo'], ['assets/css/uploadvideo.css']);
?>
    <body>
    <?php showHeader() ?>
    <div class="body">
        <h1>Upload Video</h1>
        <p class="error"><?= htmlspecialchars($_GET["error"] ?? ""); ?></p>
        <form action="<?= htmlentities($_SERVER["PHP_SELF"]) ?>" method="post" enctype="multipart/form-data">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="input">

            <label for="video">Video file</label>
            <input type="file" name="video" class="input">

            <label for="thumbnail">Thumbnail file</label>
            <input type="file" name="thumbnail" class="input">


            <div class="genreSetter">
                <select name="genre">
                    <option value="" disabled selected><?= $lang["genreSellectorUpload"] ?></option>
                    <?php foreach (getGenres() as $genre) {
                        echo "<option id='" . $genre["id"] . "' value ='" . $genre['id'] . "'>" . $genre['name'] . "</option>";
                    } ?>
                </select>
            </div>

            <input type="submit" name="submitVideo" value="Upload">
        </form>

        <!-- shorthand for isset -->
        <p><?= htmlspecialchars($_GET["upload"] ?? ""); ?></p>
    </div>
    </body>
<?php showFooter(); ?>