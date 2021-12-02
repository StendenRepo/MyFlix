<?php

/**
 * The password requirements are
 * at least 1 Uppercase, 1 Lowercase, 1 Number
 * and 8 characters long
 *
 * @param $password
 * @return false|int
 */
function isValidPassword($password): bool|int
{
    return preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password);
}

/**
 * Binary comparison
 *
 * @param $password
 * @param $confirmPassword
 * @return bool
 */
function didPasswordMatch($password, $confirmPassword): bool
{
    if (strcmp($password, $confirmPassword) === 0) {
        return true;
    }
    return false;
}
