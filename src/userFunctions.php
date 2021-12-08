<?php

/**
 * Verifies if the password is valid.
 * The password requirements are
 * at least 1 Uppercase, 1 Lowercase, 1 Number
 * and 8 characters long
 *
 * @param string $password
 * @return bool returns true if pattern matches the subject, false if it does not.
 */
function isValidPassword(string $password): bool
{
    if (preg_match("/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password)) {
        return true;
    }
    return false;
}

/**
 * Binary comparison
 * matches the password with a confirmed password
 *
 * @param string $password
 * @param string $confirmPassword
 * @return bool returns true if password did match with the confirmed password. else returns false
 */
function didPasswordMatch(string $password, string $confirmPassword): bool
{
    if (strcmp($password, $confirmPassword) === 0) {
        return true;
    }
    return false;
}
