<?php
/* Database credentials.*/
define('DB_SERVER', 'localhost'); // 192.168.1.234:3306
define('DB_USERNAME', 'root');  // 3s33t
define('DB_PASSWORD', ''); // o78V4T835KU6
define('DB_NAME', 'evenquiz');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
