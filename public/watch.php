<?php
require_once __DIR__ . '/../src/config.php';
require_once __DIR__ . '/../src/watch.php';

$videoData = false;
// TODO CHANGE VALUE OF MODERATION BASED ON ROLE
$moderation = false;

if (!empty($_GET['v'])) {
    $videoData = getVideo($_GET['v']);
}
if (!$videoData) {
    showHead($lang['videoNotFound'], ["assets/css/video.css"]);
} else {
    // Show header with the video title in it
    showHead(htmlspecialchars($videoData['name']), ["assets/css/video.css"]);
}
?>
    <body>
        <?php showHeader(); ?>
        <div class="content">
            <?php if (!$videoData) { ?>
                <h1><?= $lang['videoNotFound'] ?></h1>
            <?php } else { ?>
                <div class="video-header">
                    <div class="video-info">
                        <h1><?= htmlspecialchars($videoData['name']) ?></h1>
                        <a href="search.php?creator=<?= $videoData['id'] ?>" class="noLink">
                            <h2><?= htmlspecialchars($videoData['studioName']) ?></h2>
                        </a>
                    </div>
                    <div class="moderation">
                        <?php if ($moderation) { ?>
                            <!-- Approve icon-->
                            <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54">
                                <g transform="translate(-1495 -159)">
                                    <rect rx="10" width="54" height="54" fill="var(--green)"
                                          transform="translate(1495 159)"/>
                                    <g transform="translate(1511.542 178.44)">
                                        <line x1="12" y2="22" fill="none" stroke-width="7" stroke-linecap="round"
                                              stroke="var(--background)" transform="translate(9.458 -4.44)"/>
                                        <line x1="9" y1="9" fill="none" stroke-width="7" stroke-linecap="round"
                                              stroke="var(--background)" transform="translate(0.458 8.56)"/>
                                    </g>
                                </g>
                            </svg>
                            <!-- Denied icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54">
                                <g transform="translate(-1566 -159)">
                                    <rect rx="10" width="54" height="54" fill="var(--red)"
                                          transform="translate(1566 159)"/>
                                    <g transform="translate(1585.258 175.243)">
                                        <line x1="15.293" y2="21.657" fill="none" stroke-width="7"
                                              stroke-linecap="round" stroke="var(--background)"/>
                                        <line x2="15.341" y2="21.657" fill="none" stroke-width="7"
                                              stroke-linecap="round" stroke="var(--background)"/>
                                    </g>
                                </g>
                            </svg>

                        <?php } ?>
                    </div>
                </div>

                <div class="video-player">
                    <video controls class="video" id="video" preload="metadata">
                        <source src="<?= htmlspecialchars($videoData['path']) ?>">
                    </video>
                    <svg id="start" class="hidden" xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                         viewBox="0 0 512 512">
                        <path fill="var(--black)"
                              d="M504.1,256C504.1,119,393,7.9,256,7.9C119,7.9,7.9,119,7.9,256C7.9,393,119,504.1,256,504.1C393,504.1,504.1,393,504.1,256z"></path>
                        <path fill="var(--red)"
                              d="M378.7,243.2L203.8,135.7c-4.8-2.9-11.1-3.1-16-0.3c-5,2.8-8.1,8.1-8.1,13.8v214c0,5.7,3.1,11,8,13.8c2.4,1.3,5,2,7.7,2c2.9,0,5.7-0.8,8.2-2.3l174.9-106.6c4.7-2.8,7.6-8,7.6-13.4C386.3,251.2,383.4,246,378.7,243.2z"></path>
                    </svg>
                </div>
            <?php } ?>
        </div>
        <script src="assets/js/video.js"></script>
    </body>
<?php
showFooter();
