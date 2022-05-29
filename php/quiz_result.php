<?php
session_start();
require_once "./include/config.php";
require_once "./include/functions.php";
require_once "./include/user_data.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $questionAmount = queryDB("SELECT COUNT(*) as total FROM even_quiz_question", $link);
    $question = queryDB("SELECT * FROM even_quiz_question WHERE order_nr = " . $evenUser['current_question'] + 1 . "", $link);

    $answer = $_POST["questionInput"];


    if ($question["answer"] == $answer) {
        insertDB("UPDATE user_even_quiz SET correct_answers = correct_answers + 1 WHERE user_id = '" . $user["user_id"] . "'", $link);
    }

    insertDB("UPDATE user_even_quiz SET current_question = current_question + 1 WHERE user_id = '" . $user["user_id"] . "'", $link);


    header("Location: ../pages/content/evenquiz.php");
}
