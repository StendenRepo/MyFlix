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
    "matchPassword" => "Passwords do NOT match"
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
    return;
}

$_SESSION["username"] = $inputArray["username"];

if (!checkStrLength($inputArray["username"], 20))
    return $errors["username"] = "Username cannot exceed 20 characters";

if (!checkStrLength($inputArray["email"], 64))
    return $errors["email"] = "Email cannot exceed 64 characters";

if (!isValidPassword($inputArray["pw"]))
    return $errors["pw"] = $errorMsg["password"];

if (!didPasswordMatch($inputArray["pw"], $inputArray["confirm-pw"]))
    return $errors["confirm-pw"] = $errorMsg["matchPassword"];

//TODO:  Ask leraar voor een beter oplossing dan dit.
//tijdelijk return errors van register en print die op de pagina uit.

$errors = register($inputArray["username"], $inputArray["email"], $inputArray["pw"]);








