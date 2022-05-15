<?php
session_start();
require_once "config.php";
require_once "functions.php";
require_once "userData.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $questionAmount = queryDB("SELECT COUNT(*) as total FROM evenquizquestions", $link);
    $question = queryDB("SELECT * FROM evenquizquestions WHERE ID = " . $evenUser['question'] . "", $link);

    $answer = $_POST["questionInput"];


    if ($question["answer"] == $answer) {
        insertDB("UPDATE evenquizstats SET correctAnswers = correctAnswers + 1 WHERE userID = '" . $user["id"] . "'", $link);
    }

    insertDB("UPDATE evenquizstats SET answeredQuestions = answeredQuestions + 1 WHERE userID = '" . $user["id"] . "'", $link);

    if ($questionAmount["total"] > $evenUser["answeredQuestions"] + 1) {
        insertDB("UPDATE evenquizstats SET question = question + 1 WHERE userID = '" . $user["id"] . "'", $link);
    } else {
        insertDB("UPDATE evenquizstats SET finished = true WHERE userID = '" . $user["id"] . "'", $link);
    }

    header("Location: ../pages/evenQuiz.php");
}
