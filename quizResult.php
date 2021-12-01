<?php
    session_start();
    require_once "config.php";
    $question = $link->query("SELECT evenQuestionsAnswered FROM users WHERE username = '" . $_SESSION['username'] . "'")->fetch_assoc();
    $sql = $link->query("SELECT questionAnswer FROM evenquiz WHERE questionId = " . $question['evenQuestionsAnswered'] + 1 . "")->fetch_assoc();
    $answer = $_POST["questionInput"];
    $totalCorrect = $question['evenQuestionsAnswered'];

        if($sql["questionAnswer"] == $answer){
            $totalCorrect++;
            $link->query("UPDATE users SET evenQuestionsAnswered = ". $totalCorrect ." WHERE username = '". $_SESSION["username"] . "'");
            echo "correct";
            header("location: evenQuiz.php");
        } else{
            echo "wrong";
            header("location: evenQuiz.php");
        }
?>