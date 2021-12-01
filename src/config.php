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

// Load the database
require_once 'database.php';

// Load the auth
require_once 'auth.php';

// Load the templates
require_once 'templates/index.php';

