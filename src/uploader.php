<?php

if(isset($_POST["submit_video"]) && isset($_FILES["video"])){

    echo "<pre>";
    print_r($_FILES["video"]);
    print_r($_FILES["thumbnail"]);
    echo "</pre>";

    $title = $_POST["title"];

    $accountId = $_SESSION['userId'];

    $videoName = $_FILES["video"]["name"];
    $videoType = $_FILES["video"]["type"];
    $videoTmpName = $_FILES["video"]["tmp_name"];
    $videoError = $_FILES["video"]["error"];
    $videoSaveName = uniqid();
    $videoNameSpliter = explode(".", $videoName);
    $videoExtention = strtolower(end($videoNameSpliter));

    $imgName = $_FILES["thumbnail"]["name"];
    $imgType = $_FILES["thumbnail"]["type"];
    $imgTmpName = $_FILES["thumbnail"]["tmp_name"];
    $imgError = $_FILES["thumbnail"]["error"];
    $imgSaveName = uniqid();
    $imgNameSplitter = explode(".", $imgName);
    $imgExtention = strtolower(end($imgNameSplitter));

    $genre = $_POST["genre"];

    $videoPath = __DIR__ . "../../public/assets/video/$videoSaveName.$videoExtention";
    $imgPath = __DIR__ . "../../public/assets/img/thumbnails/$imgSaveName.$imgExtention";

    if(validateUpload($title, $videoType, $videoError, $genres, $imgError, $imgType)){
        uploadVideo($videoTmpName, $videoPath, $accountId, $title, $imgTmpName, $imgPath, $genre);
    }

} else{
    header("Location: ../public/uploadVideo.php");
}

function uploadVideo($videoTmpName, $videoPath, $accountId, $title, $imgTmpName, $imgPath, $genre){

    if(move_uploaded_file($videoTmpName, $videoPath)){
        if(move_uploaded_file($imgTmpName, $imgPath)){
            echo "Superyay";
        }
        echo "yay";
        // Order: id, accountId, fileName, genreId, length, name, accptedId
        $uploadQuery = "INSERT INTO `film` VALUES('', '$accountId', '$videoPath', '$genre', '', '$title', '')";
    }
}

function validateUpload($title, $type, $error, $genres, $imgError, $imgType){

    if($error === 0){
        $allowedExtentions = array("video/mp4", "video/webm", "video/avi", "video/flv");
        if(in_array($type, $allowedExtentions)){
            if(!empty($title)){
                if(!empty($genres)){
                    if($imgError === 0){
                    $allowedImgExt = array("image/png", "image/jpeg");
                        if(in_array($imgType, $allowedImgExt)){
                            return true;
                        } else{
                            $incImgType = "Make sure to give upload a .png, .jpg image file.";
                            header("Location: ../public/uploadVideo.php?error=$incImgType");
                        }
                    } else{
                        $imgError = "There was an issue with uploading you thumbnail, try again.";
                        header("Location: ../public/uploadVideo.php?error=$imgError");
                    }
                } else{
                    $noGenre = "Make sure to select 1 or more genres.";
                    header("Location: ../public/uploadVideo.php?error=$noGenre");
                }
            } else{
                $noTitle = "Make sure to give your video a title.";
                header("Location: ../public/uploadVideo.php?error=$noTitle");
            }
        } else{
            $incType = "Make sure that you upload a .mp4, .webm, .avi or .flv video file.";
            header("Location: ../public/uploadVideo.php?error=$incType");
        }
    } else{
        $fileError = "There was an issue with uploading your video, try again.";
        header("Location: ../public/uploadVideo.php?error=$fileError");
    }
}

?>