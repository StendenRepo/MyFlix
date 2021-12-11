<?php

include "../utils/forms.php";

$inputArray = filter_input_array(INPUT_POST, [
    "username" => FILTER_SANITIZE_STRING,
    "email" => FILTER_VALIDATE_EMAIL,
    "pw" => FILTER_SANITIZE_STRING,
    "confirm-pw" => FILTER_SANITIZE_STRING,
], true);

/**
 * TODO: Change error msg with the lang file errors
 */
$errorMsg = [
    "required" => "This is field required",
    "password" => "Password must be at least 8 characters long and contain atleast 1 lower case, 1 upper case and 1 numbers",
    "matchPassword" => "Passwords do NOT match",
    "exceedUsernameLength" => "Username cannot exceed 20 characters",
    "exceedEmailLength" => "Email cannot exceed 64 characters",
];

if (!isset($_POST["submit"])) return;

//Checks whether the array contains a null | "". then loops through the array and find the null value.
//Use the key as a reference point and set a message to it in the errors array
if (in_array(null, $inputArray)) {
    foreach ($inputArray as $key => $value) {
        if (empty($value)) {
            $errors[$key] = $errorMsg["required"];
        }
    }
    // User has not filled in all fields no point in going further.
    return;
}


if (!checkStrLength($inputArray["username"], 20))
    $errors["username"] = $errorMsg["exceedUsernameLength"];

if (!checkStrLength($inputArray["email"], 64))
    $errors["email"] = $errorMsg["exceedEmailLength"];

if (!isValidPassword($inputArray["pw"]))
    $errors["pw"] = $errorMsg["password"];

if (!didPasswordMatch($inputArray["pw"], $inputArray["confirm-pw"]))
    $errors["confirm-pw"] = $errorMsg["matchPassword"];

if (isset($errors)) {
    return;
}

//TODO:  Ask leraar voor een beter oplossing dan dit.
//tijdelijk return errors van register en print die op de pagina uit.
//After we make sure every fields meets the requirements then we start the register process.
$errors = register($inputArray["username"], $inputArray["email"], $inputArray["pw"]);