<?php
/* Database credentials.*/
define('DB_SERVER', '127.0.0.1'); // Database ip-adress
define('DB_USERNAME', 'root');  // Database username
define('DB_PASSWORD', ''); // Database password
define('DB_NAME', 'evenquiz'); // Database name

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
