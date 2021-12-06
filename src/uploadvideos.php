<?php

function validateVideo($vid){
    $fileName = $vid["name"];
    $fileTmpName = $vid["tmp_name"];
    $fileSize = $vid["size"];
    $fileError = $vid["error"];
    $fileType = $vid["type"];

    $fileSafeName = uniqid();

    $fileNameSplit = explode(".", $fileName);
    $fileExt strtolower(end($fileNameSplit));

    $allowedExtention = array('mp4');

    if(!in_array($fileExt, $allowedExtention)){
        return false;
    }

    if($fileError !== UPLOAD_ERR_OK){
        return false;
      }
    
    if($fileSize > 1000000){
        return false;
      }
}

if(isset($_POST["submit"])){
    $title = $_POST["title"];
    $video = $_FILES["video"];
    $genre = $_POST["genre"];
}

?>