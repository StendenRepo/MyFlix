<?php

/**
 * This function redirects a user to the error page
 * @param $errorMsg
 * @return void
 */
function redirectError($errorMsg) {
    header("Location: uploadVideo.php?error=" . $errorMsg);
    die();
}

/**
 * Checks if the genre exists
 * @param $id
 * @return bool|void
 */
function genreExists($id) {
    $conn = dbConnect();
    $query = "SELECT * FROM genre WHERE id=?";
    if (!$stmt = mysqli_prepare($conn, $query)) {
        echo "DB error : " . mysqli_error($conn);
        die();
    }
    if (!mysqli_stmt_bind_param($stmt, "i", $id) ||
        !mysqli_stmt_execute($stmt)) {
        echo "DB error : " . mysqli_error($conn);
        die();
    }
    $res = mysqli_stmt_get_result($stmt);
    $data = mysqli_fetch_array($res, MYSQLI_ASSOC);
    return (sizeof($data) !== 0);

}


if (isset($_POST["submitVideo"])) {
    $video = $_FILES["video"];
    $img = $_FILES["thumbnail"];
    $title = $_POST["title"];

    $accountId = getCurrentUserId();
    $accountLvl = getUserAccountLevel($accountId);

    if (!$accountLvl > 1) {
        redirectError("User has not enough rights");
    }

    $videoData = getFileData($video);
    $imageData = getFileData($img);

    $videoDb = "assets/video/{$videoData['newFilename']}";
    $videoTarget = __DIR__ . "/../public/$videoDb";

    $imageDb = "assets/thumbnail/{$videoData['newFilename']}";
    $imageTarget = __DIR__ . "/../public/$videoDb";

    $genre = $_POST["genre"];

    if (validateUpload($title, $genre, $videoData, $imageData)) {
        uploadVideo($title, $genre, $videoData, $imageData, $videoDb, $videoTarget, $imageDb, $imageTarget, $accountId);
    }


}

/**
 * Moves the video and thumbnail to the right directories and add them to the database
 * @param $title
 * @param $genre
 * @param $videoData
 * @param $imageData
 * @param $videoDb
 * @param $videoTarget
 * @param $imageDb
 * @param $imageTarget
 * @param $accountId
 * @return void
 */
function uploadVideo($title, $genre, $videoData, $imageData, $videoDb, $videoTarget, $imageDb, $imageTarget, $accountId) {
    global $lang;
    $conn = dbConnect();

    // Moves Thumbnail and Video to the public directory
    if (move_uploaded_file($videoData['tmpPath'], $videoTarget)) {
        if (move_uploaded_file($imageData['tmpPath'], $imageTarget)) {

            // Prepare the SQL statement
            if (isUserVerified($accountId)) {
                $query = "INSERT INTO film (accountId, path, thumbnail, genreId, length, name, accepted) VALUES(?, ?, ?, ?, NULL, ?, 1)";
            } else {
                $query = "INSERT INTO film (accountId, path, thumbnail, genreId, length, name) VALUES(?, ?, ?, ?, NULL, ?)";
            }


            if (!$stmt = mysqli_prepare($conn, $query)) {
                echo "DB error : " . mysqli_error($conn);
                die();
            }
            // Bind the parameters and execute the statement
            if (!mysqli_stmt_bind_param($stmt, "issis", $accountId, $videoDb, $imageDb, $genre, $title) ||
                !mysqli_stmt_execute($stmt)) {
                echo "DB error : " . mysqli_error($conn);
                die();
            }

            mysqli_stmt_close($stmt);
            dbClose($conn);


            header("Location: uploadVideo.php?upload=" . $lang["success"]);
            die();
        } else {
            redirectError($lang['uploadPlaceholderError']);
        }
    } else {
        redirectError($lang['uploadVideoError']);
    }
}


/**
 * Validates the provided information of the video
 * @param $title
 * @param $genre
 * @param $videoData
 * @param $imgData
 * @return bool
 */
function validateUpload($title, $genre, $videoData, $imgData) {
    global $lang;

    // Checks if the php file upload trows errors
    if ($videoData['error'] !== UPLOAD_ERR_OK) {
        redirectError($lang['fileError'][$videoData['error']]);
    }
    // Checks if the php file upload trows errors
    if ($imgData['error'] !== UPLOAD_ERR_OK) {
        redirectError($lang['fileError'][$imgData['error']]);
    }

    // Checks if the content/type matches that of a video file
    $allowedExtensions = array("video/mp4", "video/webm", "video/avi", "video/flv");
    if (!in_array($videoData['type'], $allowedExtensions)) {
        redirectError($lang['incType']);
    }

    // Checks if the content/type matches that of a image file
    $allowedImgExt = array("image/png", "image/jpeg");
    if (!in_array($imgData['type'], $allowedImgExt)) {
        redirectError($lang['incImgType']);
    }

    // Checks if a title was filled in
    if (empty($title)) {
        redirectError($lang['noTitle']);
    }

    // Check if the string length is between 5 and 30 characters
    if (strlen($title) < 5 || strlen($title) > 30) {
        redirectError($lang["uploadVideoLength"]);
    }

    // Checks if a genre was selected
    if (empty($genre)) {
        redirectError($lang['noGenre']);
    }

    // Checks if the genre exists
    if (!genreExists($genre)) {
        redirectError($lang['genreDoesNotExist']);
    }

    return true;
}

/**
 * Reads the data from an uploaded file and puts them to an array
 * @param $data
 * @return array
 */
function getFileData($data) {
    $seperatedArray = explode(".", $data["name"]);
    return array(
        "name"        => $data["name"],
        "type"        => $data["type"],
        "tmpPath"     => $data["tmp_name"],
        "error"       => $data["error"],
        "newFilename" => uniqid() . "." . $seperatedArray[sizeof(explode(".", $data["name"])) - 1]
    );
}