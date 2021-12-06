<?php
require_once "../src/config.php";
show_header($extra_css = ['assets/css/uploadvideo.css']);
?>
<body>
    <from action="../src/uploadvideos.php" method="POST">
        <label for="title">Title</label>
        <input type="text" id="title" name="title">

        <input type="file" id="upload-video" name="video">

        <input type="checkbox" id="action" name="genre" value="action">
        <label for="action">Action</label>
        <input type="checkbox" id="horror" name="genre" value="horror">
        <label for="horror">Horror</label>
        <input type="checkbox" id="adventure" name="genre" value="adventure">
        <label for="adventure">Adventure</label>

        <button type="submit" name="submit">Upload your video</button>
    </form>
</body>
<?php show_footer(); ?>