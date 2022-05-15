<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "config.php";
require_once "functions.php";
$user = queryDB("SELECT * FROM users WHERE username = '" . $_SESSION["username"] . "'", $link);

$evenUser = queryDB("SELECT * FROM evenquizstats WHERE userId = '" . $user["id"] . "'", $link);

$polishUser = queryDB("SELECT * FROM polishcowmilkerstats WHERE userId = '" . $user["id"] . "'", $link);
