<?php
require_once "../src/config.php";
require_once "../src/genres.php";
require_once "../src/uploader.php";
showHead("Upload Video", ['assets/css/uploadvideo.css']);
?>
<body>
    <?php showHeader() ?>
    <form action="uploadVideo.php" method="post" enctype="multipart/form-data">  
        <label for="title">Title</label>
        <input type="text" id="title" name="title">

        <label for="video">Video file</label>
        <input type="file" name="video">

        <label for="thumbnail">Thumbnail file</label>
        <input type="file" name="thumbnail">

        <?php getGenres(); ?>

        <input type="submit" name="submit_video" value="Upload">
    </form>

    <?php 
        if(isset($_GET["error"])){ ?>
            <p><?=$_GET["error"]?></p>
    <?php } ?>
</body>
<?php showFooter(); ?>