<?php

if (isset($_POST["submitVideo"])) {
    $video = $_FILES["video"];
    $img = $_FILES["thumbnail"];
    $title = $_POST["title"];

    $accountId = $_SESSION['userId'];
    getFileData("video", $video);

    getFileData("img", $img);

    $genre = $_POST["genre"];

    $length = "5";

    $videoPath = "assets/video/$videoSaveName.$videoExtension";
    $imgPath = "assets/thumbnail/$imgSaveName.$imgExtension";

    if(validateUpload($title, $videoType, $videoError, $genre, $imgError, $imgType , $video, $img)){
        uploadVideo($videoTmpName, $videoPath, $accountId, $title, $imgTmpName, $imgPath, $genre, $length);
    }
}

function uploadVideo($videoTmpName, $videoPath, $accountId, $title, $imgTmpName, $imgPath, $genre, $length){
    $conn = dbConnect();
    
    // moves both files
    if(move_uploaded_file($videoTmpName, $videoPath)){
        if(move_uploaded_file($imgTmpName, $imgPath)){
            
            // prepares statment
            $stmt = mysqli_prepare($conn, "INSERT INTO film (accountId, path, thumbnail, genreId, length, name) VALUES(?, ?, ?, ?, ?, ?)");

            // binding parameters and executing statement
            if(!mysqli_stmt_bind_param($stmt, "ississ", $accountId, $videoPath, $imgPath, $genre, $length, $title) ||
                !mysqli_stmt_execute($stmt)){
                die();
            }

            mysqli_stmt_close($stmt);
            dbClose($conn);
            
            global $lang;
            header("Location: uploadvideo.php?upload=" . $lang["success"]);
            die();
        }
    }
}

function validateUpload($title, $type, $error, $genre, $imgError, $imgType, $video, $img){
    global $lang;

    // checks if a video was submitted
    if(empty($video)){
        header("Location: uploadVideo.php?error=" . $lang['noVideo']);
        die();
    }

    // checks if an image was submitted
    if(empty($img)){
        header("Location: uploadVideo?error=" . $lang['noThumbnail']);
        die();
    }

    // checks for errors while uploading video's
    if($error !== 0){
        header("Location: uploadVideo.php?error=" . $lang['fileError']);
        die();
    }

    // checks if it is a video file
    $allowedExtentions = array("video/mp4", "video/webm", "video/avi", "video/flv");
    if(!in_array($type, $allowedExtentions)){
        header("Location: uploadVideo.php?error=" . $lang['incType']);
        die();
    }

    // checks if a tittle was filled in
    if(empty($title)){
        header("Location: uploadVideo.php?error=" . $lang['noTitle']);
        die();
    }

    // checks if a genre was selected
    if(empty($genre)){
        header("Location: uploadVideo.php?error=" . $lang['noGenre']);
        die();
    }

    // checks for errors while uploading image's
    if($imgError !== 0){
        header("Location: uploadVideo.php?error=" . $lang['imgError']);
        die();
    }  

    // checks if it is a image file
    $allowedImgExt = array("image/png", "image/jpeg");
    if(!in_array($imgType, $allowedImgExt)){
        // sends error message's
        header("Location: uploadVideo.php?error=" . $lang['incImgType']);
        die();
    }

    return true;
}

function getFileData($file, $array){

    global ${$file . "Name"};
    global ${$file . "Type"};
    global ${$file . "TmpName"};
    global ${$file . "Error"};
    global ${$file . "SaveName"};
    global ${$file . "NameSpliter"};
    global ${$file . "Extension"};

    ${$file . "Name"} = $array["name"];
    ${$file . "Type"} = $array["type"];
    ${$file . "TmpName"} = $array["tmp_name"];
    ${$file . "Error"} = $array["error"];
    ${$file . "SaveName"} = uniqid();
    ${$file . "NameSpliter"} = explode(".", $array["name"]);
    ${$file . "Extension"} = strtolower(end(${$file . "NameSpliter"}));

}