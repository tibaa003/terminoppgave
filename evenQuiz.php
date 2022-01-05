<?php
session_start();
require_once "config.php";
if (!isset($_SESSION["loggedIn"])) {
    header("Location: ./login.php?evenQuiz");
}

$result = $link->query("SELECT username FROM evenusers WHERE username = '" . $_SESSION['username'] . "'")->fetch_assoc();

if (!isset($result["username"])) {
    $link->query("INSERT INTO evenusers (currentQuestion, correctAnswers, username) VALUES (1,0, '" . $_SESSION['username'] . "')");
}
$question = $link->query("SELECT currentQuestion FROM evenusers WHERE username = '" . $_SESSION['username'] . "'")->fetch_assoc();
$questionAmount = $link->query("SELECT COUNT(*) as total FROM evenquiz")->fetch_assoc();
if ($question["currentQuestion"] == $questionAmount["total"]+1) {
    header("Location: user.php");
}
$question = $link->query("SELECT currentQuestion FROM evenusers WHERE username = '" . $_SESSION['username'] . "'")->fetch_assoc();
$options = $link->query("SELECT questionAnswer, questionOption1, questionOption2, questionOption3, question, questionImg FROM evenquiz WHERE questionId = " . $question['currentQuestion'] . "")->fetch_assoc();
$randomQuestion = array("questionOption1", "questionOption2", "questionOption3", "questionAnswer");

$question1 = $randomQuestion[rand(0, count($randomQuestion) - 1)];
unset($randomQuestion[array_search($question1, $randomQuestion)]);
$randomQuestion = array_values($randomQuestion);

$question2 = $randomQuestion[rand(0, count($randomQuestion) - 1)];
unset($randomQuestion[array_search($question2, $randomQuestion)]);
$randomQuestion = array_values($randomQuestion);

$question3 = $randomQuestion[rand(0, count($randomQuestion) - 1)];
unset($randomQuestion[array_search($question3, $randomQuestion)]);
$randomQuestion = array_values($randomQuestion);

$question4 = $randomQuestion[0];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Even quiz</title>
</head>

<body>
    <?php require_once("header.php") ?>
    <form action="quizResult.php" method="POST" id="evenQuiz">
        <div class="questionContainer" id="question1">
            <img src="<?php echo $options["questionImg"] ?>" alt="">
            <h3><?php echo $options["question"] ?></h3>
            <div class="questions">
                <div class="questionsRow">
                    <label for="question1Input1">
                        <div class="question">
                            <input type="radio" name="questionInput" id="question1Input1" value="<?php echo $options[$question1] ?>">
                            <?php echo $options[$question1] ?>
                        </div>
                    </label>
                    <label for="question1Input2">
                        <div class="question">
                            <input type="radio" name="questionInput" id="question1Input2" value="<?php echo $options[$question2] ?>">
                            <?php echo $options[$question2] ?>
                        </div>
                    </label>
                </div>
                <div class="questionsRow">
                    <label for="question1Input3">
                        <div class="question">
                            <input type="radio" name="questionInput" id="question1Input3" value="<?php echo $options[$question3] ?>">
                            <?php echo $options[$question3] ?>
                        </div>
                    </label>
                    <label for="question1Input4">
                        <div class="question">
                            <input type="radio" name="questionInput" id="question1Input4" value="<?php echo $options[$question4] ?>">
                            <?php echo $options[$question4] ?>
                        </div>
                    </label>
                </div>
                <input class="submit" type="submit" value="submit">
            </div>
        </div>
    </form>
    <script src="./quiz.js"></script>
</body>

</html>