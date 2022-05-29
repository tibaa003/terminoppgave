<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once "config.php";
require_once "functions.php";
$user = queryDB("SELECT * FROM user WHERE username = '" . $_SESSION["username"] . "'", $link);

$evenUser = queryDB("SELECT * FROM user_even_quiz WHERE user_id = '" . $user["user_id"] . "'", $link);

$polishUser = queryDB("SELECT * FROM polish_cow_milker WHERE user_id = '" . $user["user_id"] . "'", $link);
