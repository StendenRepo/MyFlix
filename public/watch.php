<?php

require_once __DIR__ . '/../src/config.php';
$video = "assets/video/super_video.mp4";
$poster = "assets/thumbnail/super_video.jpg";
showHead("Video", ["assets/css/video.css"]);
?>
    <body>
        <?php showHeader(); ?>
        <div class="content">
            <div class="video-player">
                <video controls class="video" id="video" preload="metadata" poster="<?= $poster ?>">
                    <source src="<?= $video ?>">
                </video>
                <svg id="start" class="hidden" xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                     viewBox="0 0 512 512">
                    <path fill="var(--black)"
                          d="M504.1,256C504.1,119,393,7.9,256,7.9C119,7.9,7.9,119,7.9,256C7.9,393,119,504.1,256,504.1C393,504.1,504.1,393,504.1,256z"></path>
                    <path fill="var(--red)"
                          d="M378.7,243.2L203.8,135.7c-4.8-2.9-11.1-3.1-16-0.3c-5,2.8-8.1,8.1-8.1,13.8v214c0,5.7,3.1,11,8,13.8c2.4,1.3,5,2,7.7,2c2.9,0,5.7-0.8,8.2-2.3l174.9-106.6c4.7-2.8,7.6-8,7.6-13.4C386.3,251.2,383.4,246,378.7,243.2z"></path>
                </svg>
            </div>
        </div>
        <script src="assets/js/video.js"></script>
    </body>
<?php
showFooter();
