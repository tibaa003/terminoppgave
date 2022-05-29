<?php
session_start();
include("./include/config.php");
include("./include/functions.php");

$user = queryDB("SELECT * FROM user WHERE username = '" . $_SESSION["username"] . "'", $link);
$polishUser = queryDB("SELECT * FROM polish_cow_milker WHERE user_id = '" . $user["user_id"] . "'", $link);

if (!isset($polishUser["user_id"])) {
    $inserted = insertDB("INSERT INTO polish_cow_milker (user_id, milk, milkers, slaves) VALUES (" . $user["user_id"] . " , " . $_POST["milk"] . " ," . $_POST["milkers"] . "," . $_POST["slaves"] . ")", $link);
    if ($inserted) {
    } else {
        echo "Error: " . mysqli_error($link);
        die();
    }
} else {
    insertDB("UPDATE polish_cow_milker SET milk = " . $_POST["milk"] . ", milkers = " . $_POST["milkers"] . ", slaves = " . $_POST["slaves"] . " WHERE user_id = " . $user["user_id"], $link);
}
