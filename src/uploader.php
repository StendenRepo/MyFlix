<?php

if(isset($_POST["submit_video"]) && isset($_FILES["video"])){

    echo "<pre>";
    print_r($_FILES["video"]);
    echo "</pre>";

    $title = $_POST["title"];

    $videoName = $_FILES["video"]["name"];
    $videoType = $_FILES["video"]["type"];
    $videoTmpName = $_FILES["video"]["tmp_name"];
    $videoError = $_FILES["video"]["error"];
    $videoSaveName = uniqid();
    $videoNameSpliter = explode(".", $videoName);
    $videoExtention = strtolower(end($videoNameSpliter));

    $genres = $_POST["genre"];

    $filePath = __DIR__ . "../../public/assets/video/$videoSaveName.$videoExtention";

    if(validateUpload($title, $videoType, $videoError, $genres)){
        uploadVideo($videoTmpName, $filePath);
    }

} else{
    header("Location: ../public/uploadVideo.php");
}

function uploadVideo($videoSaveName, $filePath){
    if(move_uploaded_file($videoSaveName, $filePath)){
        echo "yay";
        // Order: id, accountId, fileName, genreId, length, name, accptedId
        $uploadQuery = "INSERT INTO `film` VALUES('', '', '$videoSaveName', '', '', '', '')";
    }
}

function validateUpload($title, $type, $error, $genres){

    if($error === 0){
        $allowedExtentions = array("video/mp4", "video/webm", "video/avi", "video/flv");
        if(in_array($type, $allowedExtentions)){
            if(!empty($title)){
                if(!empty($genres)){
                    return true;
                } else{
                    $noGenre = "Make sure to select 1 or more genres.";
                    header("Location: ../public/uploadVideo.php?error=$noGenre");
                }
            } else{
                $noTitle = "Make sure to give your video a title.";
                header("Location: ../public/uploadVideo.php?error=$noTitle");
            }
        } else{
            $incType = "Make sure that you upload a .mp4, .webm, .avi or .flv file.";
            header("Location: ../public/uploadVideo.php?error=$incType");
        }
    } else{
        $fileError = "There was an issue with uploading your file, try again.";
        header("Location: ../public/uploadVideo.php?error=$fileError");
    }
}

?>