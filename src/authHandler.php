<?php

$webRoutes = [
    "index" => null,
    "login" => null,
    "register" => null,
    "installdb" => null,
    "upgrade" => 0,
    "template" => null,
    "watch" => 0,
    "uploadVideo" => 1,
    "passwordReset" => null,
    "logout" => null,
    "search" => null,
    "changePassword" => 0,
    "profile" => 0,
    "videoMod" => 2,
    "accountMod" => 2,
    "accountReview" => 2
];


function authHandler()
{
    global $webRoutes;
    $route = getRoute();

    // page cannot be found, or does not exist in the webRoutes array.
    if (!array_key_exists($route, $webRoutes))
        exit("This page does not exists");

    // User can view the page without being logged in.
    if ($webRoutes[$route] === null)
        return;

    /**
     * check if the current page requires a logged-in user.
     * redirects to login.php with get request Error
     */
    if (!isUserLoggedIn()) {
        header("Location: login.php?error=loginRequired");
        echo "You need to be logged in to view this page. you will be redirected to the login page.";
        exit;
    }

    /**
     * check if the user is allowed to view this page.
     * redirects to login.php with get request Error
     */
    if (getUserAccountLevel(getCurrentUserId()) < $webRoutes[$route]) {
        header("refresh:5;url=index.php");
        echo "You are not allowed to view this page. you will be redirected to the homepage.";
        exit;
    }
}

/**
 * Get the current page name without the php extension.
 *
 * @return string returns the current page
 */
function getRoute(): string
{
    return explode(".", basename($_SERVER["PHP_SELF"]))[0];
}

