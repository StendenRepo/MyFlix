<?php
// Start a user session
session_start();

# Database config for PHP
if (isset($_ENV['MARIADB_HOST'])) {
    // if ENV is set load it from there
    define('DB_HOST', $_ENV['MARIADB_HOST']);
    define('DB_USER', $_ENV['MARIADB_USER']);
    define('DB_PASS', $_ENV['MARIADB_ROOT_PASSWORD']);
    define('DB_DATABASE', $_ENV['MARIADB_DATABASE']);
} else {
    // Else load the config from here
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_DATABASE', 'myflix');
}

$langFile = "en";

/**
 * we statically load in the english translate page.
 * this can later be modified to dynamically import the lang of choice.
 *  */
require_once __DIR__ . '/lang/' . $langFile . '.php';


// Load the database
require_once __DIR__ . '/database.php';

// Load the auth
require_once __DIR__ . '/auth.php';

// Load the Authentication for routes
require_once __DIR__ . '/authHandler.php';

// Load the templates
require_once __DIR__ . '/templates/index.php';


//Start the authentication check
authHandler();