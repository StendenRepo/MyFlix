<?php

include_once "../utils/forms.php";

global $lang;
$inputArray = filter_input_array(INPUT_POST, [
    "username" => FILTER_SANITIZE_STRING,
    "email" => FILTER_VALIDATE_EMAIL,
    "pw" => FILTER_SANITIZE_STRING,
    "confirm-pw" => FILTER_SANITIZE_STRING,
], true);


if (!isset($_POST["submit"])) return;

//Checks whether the array contains a null | "". then loops through the array and find the null value.
//Use the key as a reference point and set a message to it in the errors array
if (in_array(null, $inputArray)) {
    foreach ($inputArray as $key => $value) {
        if (empty($value))
            $errors[$key] = $lang["required"];
    }
    // User has not filled in all fields no point in going further.
    return;
}


if (!checkStrLength($inputArray["username"], 20))
    $errors["username"] = $lang["exceedUsernameLength"];

if (!checkStrLength($inputArray["email"], 64))
    $errors["email"] = $lang["exceedEmailLength"];

if (!isValidPassword($inputArray["pw"]))
    $errors["pw"] = $lang["passwordReq"];

if (!didPasswordMatch($inputArray["pw"], $inputArray["confirm-pw"]))
    $errors["confirm-pw"] = $lang["wrongPassword"];

if (isset($errors)) return;

$errors = register($inputArray["username"], $inputArray["email"], $inputArray["pw"]);