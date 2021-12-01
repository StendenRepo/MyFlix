<?php

$inputArray = filter_input_array(INPUT_POST, [
    "fn" => FILTER_SANITIZE_STRING,
    "ln" => FILTER_SANITIZE_STRING,
    "email" => FILTER_VALIDATE_EMAIL,
    "pw" => FILTER_SANITIZE_STRING,
    "confirm-pw" => FILTER_SANITIZE_STRING,
], true);
$errorMsg = [
    "default" => "This is required",
    "password" => "Password must be at least 8 characters long and contain 1 Capital letter and 1 number",
    "matchPassword" => "Passwords do NOT match"
];
$errors = [];
$gatheredInfo = [];

//Stop script is there is no POST
if (!isset($_POST["submit"])) return;

//Check if all values are entered
if (in_array(null, $inputArray)) {
    foreach ($inputArray as $key => $value) {
        if (empty($value)) {
            $errors[$key] = ($key != "pw") ? $errorMsg["default"] : $errorMsg["password"];
            return;
        }
    }
}

if ($inputArray["pw"] !== $inputArray["confirm-pw"]) {
    $errors["confirm-pw"] = $errorMsg["matchPassword"];
    return;
}

$gatheredInfo["fn"] = $inputArray["fn"];
$gatheredInfo["ln"] = $inputArray["ln"];
$gatheredInfo["email"] = $inputArray["email"];
$gatheredInfo["hashedPassword"] = password_hash($inputArray["pw"], PASSWORD_BCRYPT);

foreach ($gatheredInfo as $info) {
    echo $info . "<br>";
}







