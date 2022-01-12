<?php
require_once __DIR__ . '/../src/config.php';
require_once __DIR__ . '/../src/watch.php';

// Makes the translation global accessible
global $lang;

// Set the default value on false so when it is not overridden it can generate a error
$videoData = false;

// TODO CHANGE VALUE OF MODERATION BASED ON ROLE
if (getUserAccountLevel(getCurrentUserId()) === 2) {
    $moderation = true;
}
else {
    $moderation = false;
}


// Get the user level and check if user is moderator or higher
$userId = getCurrentUserId();
if (!$userId) {
    header("Location: login.php?error=loginRequired");
    die();
}
$userLvl = getUserAccountLevel($userId);
$moderation = ($userLvl > 1);

// Check if a videoId is provided in the url
if (!empty($_GET['v'])) {
    $videoData = getVideo($_GET['v'], $moderation);
    $formMethod =  htmlentities($_SERVER["PHP_SELF"] . "?v=" . $_GET["v"]);

    
}

$pageTitle = "";

if (!$videoData) {
    // When there is no video data for the video tell the browser the page does not exist
    http_response_code(404);
    $pageTitle = $lang['videoNotFound'];
} elseif (!$videoData["studioName"]) {
    // When there is no studio tell the browser the page is not found
    http_response_code(404);
    $pageTitle = $lang['videoNoStudioTitle'];
} else {
    // Show header with the video title in it
    $pageTitle = htmlspecialchars($videoData['name']);
}

showHead($pageTitle, ["assets/css/video.css"]);

?>
    <body>
        <?php showHeader();
        if(!empty($_GET["accepted"])) {
            if($_GET["accepted"] === "true") {
                echo "Video has been accepted";
                acceptVideo($_GET["v"]);
                $videoData["accepted"]= true;
            } else {
                echo "Video has been declined";
                declineVideo($_GET["v"]);
            }
        }; ?>
        <div class="content">
            <?php if (!$videoData) { ?>
                <h1><?= $lang['videoNotFound'] ?></h1>
            <?php } else { ?>
            <div class="video-wrapper">
                <div class="video-header">
                    <div class="video-info">
                        <h1><?= htmlspecialchars($videoData['name']) ?></h1>
                        <a href="search.php?creator=<?= $videoData['id'] ?>" class="noLink">
                            <h2><?= htmlspecialchars($videoData['studioName']) ?></h2>
                        </a>
                    </div>
                    <div class="moderation">
                        <?php if ($moderation) { ?>
                            <!--check if video is not yet accepted-->
                            <?php if(!$videoData["accepted"]) { ?>

                            <!-- Approve button-->
                            <a href="watch.php?v=<?=$_GET['v']?>&accepted=true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="54" height="40" viewBox="0 0 54 54">
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
                            </a>
                            <?php } ?>
                            
                            <!-- Deny button -->
                            
                            <a href="watch.php?v=<?=$_GET['v']?>&accepted=false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="54" height="40" viewBox="0 0 54 54">
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
                            </a>
                            
                        <?php } ?>
                    </div>
                </div>
                <div class="video-player">
                    <video controls class="video" id="video" preload="metadata" poster="<?= $videoData['thumbnail'] ?>">
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
            </div>
        </div>
    <?php } ?>
        <script src="assets/js/video.js"></script>
    </body>
<?php
showFooter();
