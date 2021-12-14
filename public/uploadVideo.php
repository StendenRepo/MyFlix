<?php
require_once "../src/config.php";
showHead("Upload Video", ['assets/css/uploadvideo.css']);
?>
<body>
    <?php showHeader() ?>
    <form action="../src/uploader.php" method="post" enctype="multipart/form-data">  
        <label for="title">Title</label>
        <input type="text" id="title" name="title">

        <input type="file" name="video" />

        <input type="checkbox" id="action" name="genre" value="action">
        <label for="action">Action</label>
        <input type="checkbox" id="horror" name="genre" value="horror">
        <label for="horror">Horror</label>
        <input type="checkbox" id="adventure" name="genre" value="adventure">
        <label for="adventure">Adventure</label>

        <input type="submit" name="submit_video" value="Upload" />
    </form>

    <?php 
        if(isset($_GET["error"])){ ?>
            <p><?=$_GET["error"]?></p>
    <?php } ?>
</body>
<?php showFooter(); ?>