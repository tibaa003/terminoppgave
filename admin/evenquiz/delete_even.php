<?php
include("../../php/include/config.php");
include("../../php/include/functions.php");
session_start();
if ($_SESSION["username"] != "admin") {
    header("Location: ../../index.php");
}

$question_amount = queryDB("SELECT COUNT(*) as total FROM even_quiz_question", $link);

$deleted_order_nr = queryDB("SELECT order_nr FROM even_quiz_question WHERE question_id = " . $_GET["id"], $link);
$last_in_old_order = $question_amount["total"];
// delete question
insertDB("DELETE FROM even_quiz_question WHERE question_id = " . $_GET["id"], $link);
// set last item to be ordered where deleted item was
insertDB("UPDATE even_quiz_question SET order_nr = '" . $deleted_order_nr["order_nr"] . "' WHERE order_nr = " . $last_in_old_order . "", $link);


header("Location: ./crud_even.php");
