<?php
// Start a user session
session_start();

# Database config for PHP
if (isset($_ENV['MARIADB_HOST'])) {
    // if ENV is set load it from there
    define("dbHost", $_ENV['MARIADB_HOST']);
    define('dbUser', $_ENV['MARIADB_USER']);
    define('dbPass', $_ENV['MARIADB_ROOT_PASSWORD']);
    define('dbDatabase', $_ENV['MARIADB_DATABASE']);
} else {
    // Else load the config from here
    define('dbHost', 'localhost');
    define('dbUser', 'root');
    define('dbPass', '');
    define('dbDatabase', 'myflix');
}

// Load the database
require_once 'database.php';

// Load the auth
require_once 'auth.php';

// Load the templates
require_once 'templates/index.php';

