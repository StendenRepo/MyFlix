<?php
require_once "../src/config.php";
showHead("Upload Video", ['assets/css/uploadvideo.css']);
?>
<body>
    <?php showHeader() ?>
    <form action="../src/uploader.php" method="post" enctype="multipart/form-data">  
        <label for="title">Title</label>
        <input type="text" id="title" name="title">

        <label for="video">Video file</label>
        <input type="file" name="video">

        <label for="thumbnail">Thumbnail file</label>
        <input type="file" name="thumbnail">

        <input type="radio" id="action" name="genre" value="1">
        <label for="action">Action</label>
        <input type="radio" id="horror" name="genre" value="2">
        <label for="horror">Horror</label>
        <input type="radio" id="adventure" name="genre" value="3">
        <label for="adventure">Adventure</label>

        <input type="submit" name="submit_video" value="Upload">
    </form>

    <?php 
        if(isset($_GET["error"])){ ?>
            <p><?=$_GET["error"]?></p>
    <?php } ?>
</body>
<?php showFooter(); ?>