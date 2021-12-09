<?php
require_once "../src/config.php";

$errorCode = 404;
$errorCodes = [400, 401, 403, 404, 413, 500];

$errorMsg = [
    400 => [
        'message'    => 'Bad Request',
        'hasHeader'  => true,
        'backButton' => true
    ],
    401 => [
        'message'    => 'Unauthorized',
        'hasHeader'  => true,
        'backButton' => true
    ],
    403 => [
        'message'    => 'Forbidden',
        'hasHeader'  => true,
        'backButton' => true
    ],
    404 => [
        'message'    => 'Not Found',
        'hasHeader'  => true,
        'backButton' => true
    ],
    413 => [
        'message'    => 'Payload Too Large',
        'hasHeader'  => true,
        'backButton' => true
    ],
    500 => [
        'message'    => 'Internal Server Error',
        'hasHeader'  => false,
        'backButton' => false
    ],
];

if (isset($_GET['error_code'])) {
    if (is_numeric($_GET['error_code'])) {
        if (in_array($_GET['error_code'], array_keys($errorMsg))) {
            $errorCode = $_GET['error_code'];
        }
    }
}

http_response_code($errorCode);

showHead(['assets/css/error.css']);
?>
    <body>
        <?php if ($errorMsg[$errorCode]['hasHeader']) {
            showHeader(true, false, false);
        } ?>
        <div class="<?= ($errorMsg[$errorCode]['hasHeader']) ? 'content' : 'content full' ?>">
            <h1>Error <?= $errorCode; ?></h1>
            <h2><?= $errorMsg[$errorCode]['message'] ?></h2>
        </div>
    </body>
<?php showFooter(); ?>