<?php

/**
 * @param string $str
 * @param int $maxLength
 * @return bool returns false if str is longer then max length otherwise true.
 */
function checkStrLength(string $str, int $maxLength): bool
{
    return strlen($str) < $maxLength;
}