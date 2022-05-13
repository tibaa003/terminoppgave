<?php
session_start();
require_once "../php/config.php";
require_once "../php/functions.php";

if (!isset($_SESSION["loggedIn"])) {
    header("Location: ../login.php?evenQuiz");
}


// hente ut bruker
$user = queryDB("SELECT * FROM users WHERE username = '" . $_SESSION["username"] . "'", $link);

$evenUser = queryDB("SELECT * FROM evenquizstats WHERE userId = '" . $user["id"] . "'", $link);

if (!$evenUser) {
    // hvis bruker ikke har evenquiz stats
    // lag ny bruker i evenquiz stats
    $inserted = insertDB("INSERT INTO evenquizstats (userId, question, correctAnswers) VALUES (" . $user["id"] . " ,1 ,0)", $link);
    if ($inserted) {
        header("Location: ./evenQuiz.php");
    } else {
        echo "Error: " . mysqli_error($link);
        die();
    }
}
$questionAmount = queryDB("SELECT COUNT(*) as total FROM evenquizquestions", $link);

if ($evenUser["question"] >= $questionAmount["total"]) {
    header("Location: ./user.php");
}


$query = "SELECT * FROM evenquizquestions WHERE ID = " . $evenUser["question"] . "";
$result = $link->query($query);
if ($row = $result->fetch_assoc()) {
    $options = $row;
}


$randomQuestion = array("option1", "option2", "option3", "answer");

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
    <?php require_once "../php/bootstrap.php"; ?>
    <title>Even quiz</title>
</head>

<body>
    <?php require_once("../php/header.php") ?>

    <form class="text-center" action="../php/quizResult.php" method="POST" id="evenQuiz">
        <div style="max-width: 60%; margin: auto;">
            <div class="text-center">
                <img class="img-fluid m-3" style="max-width: 60%;" src="../assets/evenQuiz/<?php echo $options["imgName"] ?>" alt="">
            </div>
            <h3 class="text-center"><?php echo $options["question"] ?></h3>
            <div class="d-flex flex-row justify-content-around">
                <input class="btn-check" type="radio" name="questionInput" id="question1Input1" value="<?php echo $options[$question1] ?>">
                <label class="btn btn-outline-secondary btn-lg m-3" style="min-width: 20%;" for="question1Input1">
                    <?php echo $options[$question1] ?>
                </label>

                <input class="btn-check" type="radio" name="questionInput" id="question1Input2" value="<?php echo $options[$question2] ?>">
                <label class="btn btn-outline-secondary btn-lg m-3" style="min-width: 20%;" for="question1Input2">
                    <?php echo $options[$question2] ?>
                </label>
            </div>
            <div class="d-flex flex-row justify-content-around">
                <input class="btn-check" type="radio" name="questionInput" id="question1Input3" value="<?php echo $options[$question3] ?>">
                <label class="btn btn-outline-secondary btn-lg m-3" style="min-width: 20%;" for="question1Input3">
                    <?php echo $options[$question3] ?>
                </label>

                <input class="btn-check" type="radio" name="questionInput" id="question1Input4" value="<?php echo $options[$question4] ?>">
                <label class="btn btn-outline-secondary btn-lg m-3" style="min-width: 20%;" for="question1Input4">
                    <?php echo $options[$question4] ?>
                </label>
            </div>
            <input class="btn btn-success btn-lg" type="submit" value="submit">
        </div>
    </form>

    <script src="./quiz.js"></script>
</body>

</html>