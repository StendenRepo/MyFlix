<?php
include_once "userFunctions.php";

$inputArray = filter_input_array(INPUT_POST, [
    "fn" => FILTER_SANITIZE_STRING,
    "ln" => FILTER_SANITIZE_STRING,
    "email" => FILTER_VALIDATE_EMAIL,
    "pw" => FILTER_SANITIZE_STRING,
    "confirm-pw" => FILTER_SANITIZE_STRING,
], true);
$errorMsg = [
    "required" => "This is required",
    "password" => "Password must be at least 8 characters long and contain atleast 1 lower case, 1 upper case and 1 numbers",
    "matchPassword" => "Passwords do NOT match"
];
$errors = [];
$gatheredInfo = [];

//Stop script is there is no POST
if (!isset($_POST["submit"])) return;

//Check if all values are entered
if (in_array(null, $inputArray)) {
    foreach ($inputArray as $key) {
        if (empty($value)) {
            $errors[$key] = $errorMsg["required"];
            return;
        }
    }
}

if (!didPasswordMatch($inputArray["pw"], $inputArray["confirm-pw"]))
    return $errors["confirm-pw"] = $errorMsg["matchPassword"];

if (!isValidPassword($inputArray["pw"]))
    return $errors["pw"] = $errorMsg["password"];

$gatheredInfo["fn"] = $inputArray["fn"];
$gatheredInfo["ln"] = $inputArray["ln"];
$gatheredInfo["email"] = $inputArray["email"];
$gatheredInfo["hashedPassword"] = password_hash($inputArray["pw"], PASSWORD_BCRYPT);

foreach ($gatheredInfo as $info) {
    echo $info . "<br>";
}







