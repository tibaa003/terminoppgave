<?php
session_start();
require_once "config.php";
require_once "functions.php";

$user = queryDB("SELECT * FROM users WHERE username = '" . $_SESSION["username"] . "'", $link);
$polishUser = queryDB("SELECT * FROM polishcowmilkerstats WHERE userId = '" . $user["id"] . "'", $link);

if (!$polishUser) {
    $inserted = insertDB("INSERT INTO polishcowmilkerstats (userId, milk, milkers, slaves) VALUES (" . $user["id"] . " , " . $_POST["milk"] . " ," . $_POST["milkers"] . "," . $_POST["slaves"] . ")", $link);
    if ($inserted) {
    } else {
        echo "Error: " . mysqli_error($link);
        die();
    }
} else {
    insertDB("UPDATE polishcowmilkerstats SET milk = " . $_POST["milk"] . ", milkers = " . $_POST["milkers"] . ", slaves = " . $_POST["slaves"] . " WHERE userId = " . $user["id"], $link);
}
