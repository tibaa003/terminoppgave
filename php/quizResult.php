<?php
session_start();
require_once "config.php";
require_once "functions.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = queryDB("SELECT * FROM users WHERE username = '" . $_SESSION["username"] . "'", $link);
    $evenUser = queryDB("SELECT * FROM evenquizstats WHERE userId = '" . $user["id"] . "'", $link);
    $questionAmount = queryDB("SELECT COUNT(*) as total FROM evenquizquestions", $link);
    $question = queryDB("SELECT * FROM evenquizquestions WHERE ID = " . $evenUser['question'] . "", $link);

    $answer = $_POST["questionInput"];


    if ($question["answer"] == $answer) {
        insertDB("UPDATE evenquizstats SET correctAnswers = correctAnswers + 1 WHERE userID = '" . $user["id"] . "'", $link);
    }
    insertDB("UPDATE evenquizstats SET question = question + 1 WHERE userID = '" . $user["id"] . "'", $link);

    header("Location: ../pages/evenQuiz.php");
}
