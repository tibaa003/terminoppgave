<?php
include("../../php/include/config.php");
include("../../php/include/functions.php");
session_start();
if ($_SESSION["username"] != "admin") {
    header("Location: ../../index.php");
}

$question_amount = queryDB("SELECT COUNT(*) as total FROM even_quiz_question", $link);
$current_order = queryDB("SELECT order_nr FROM even_quiz_question WHERE question_id = " . $_GET["id"], $link);
$old_order = $question_amount["total"];
insertDB("DELETE FROM even_quiz_question WHERE question_id = " . $_GET["id"], $link);
insertDB("UPDATE even_quiz_question SET order_nr = '" . $current_order["order_nr"] . "' WHERE order_nr = " . $old_order . "", $link);


header("Location: ./crud_even.php");
