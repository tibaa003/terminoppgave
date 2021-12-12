<?php
    session_start();
    require_once "config.php";
    $question = $link->query("SELECT currentQuestion FROM evenusers WHERE username = '" . $_SESSION['username'] . "'")->fetch_assoc();
    $questionAmount = $link->query("SELECT COUNT(*) as total FROM evenquiz")->fetch_assoc();
    $sql = $link->query("SELECT questionAnswer FROM evenquiz WHERE questionId = " . $question['evenQuestionsAnswered'] + 1 . "")->fetch_assoc();
    $answer = $_POST["questionInput"];


        if($sql["questionAnswer"] == $answer){
            $link->query("UPDATE evenusers SET correctAnswers = correctAnswers+1 WHERE username = '". $_SESSION["username"] . "'");
        }
        if ($question['currentQuestion'] == $questionAmount["total"]+1){
            header("location: user.php");
        } else{
            $link->query("UPDATE evenusers SET currentQuestion = currentQuestion+1 WHERE username = '". $_SESSION["username"] . "'");
            header("location: evenQuiz.php");
        }
