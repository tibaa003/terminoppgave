<?php
// starter session hvis ikke startet
if (!isset($_SESSION)) {
    session_start();
}

// Hvis bruker ikke logget inn redirect til login.php
if (!isset($_SESSION["loggedIn"])) {
    header("Location: ./login.php");
} else {
    // hvis bruker logget inn hent bruker data
    require_once "../php/userData.php";
}

// legger til db link og noen vanlige funksjoner
require_once "../php/config.php";
require_once "../php/functions.php";

// hvis bruker ikke har evenquiz stats
if (!$evenUser) {
    // lag ny bruker i evenquiz stats
    $inserted = insertDB("INSERT INTO evenquizstats (userId, question, correctAnswers) VALUES (" . $user["id"] . " ,1 ,0)", $link);
    // hvis insert fungerte refresh siden
    if ($inserted) {
        header("Location: ./evenQuiz.php");
    }
}

$questionAmount = queryDB("SELECT COUNT(*) as total FROM evenquizquestions", $link);


if ($evenUser["answeredQuestions"] == $questionAmount["total"]) {
    header("Location: ./user.php");
} else if ($evenUser["finished"]) {
    insertDB("UPDATE evenquizstats SET question = question + 1 WHERE userID = '" . $user["id"] . "'", $link);
    insertDB("UPDATE evenquizstats SET finished = false WHERE userID = '" . $user["id"] . "'", $link);
}

// henter evenuser på nytt for å få med oppdateringer
$evenUser = queryDB("SELECT * FROM evenquizstats WHERE userId = '" . $user["id"] . "'", $link);

$options = queryDB("SELECT * FROM evenquizquestions WHERE ID = " . $evenUser["question"] . "", $link);

// putter alle spørsmål i en array og blander rekkefølge
$questions = array("option1", "option2", "option3", "answer");
shuffle($questions);
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
            <!-- bilde -->
            <div class="text-center">
                <img class="img-fluid m-3" style="max-width: 60%;" src="../assets/evenQuiz/<?php echo $options["imgName"] ?>" alt="">
            </div>
            <h3 class="text-center"><?php echo $options["question"] ?></h3>
            <div class="d-flex flex-row justify-content-around">
                <!-- input 1 -->
                <input class="btn-check" type="radio" name="questionInput" id="input1" value="<?php echo $options[$questions[0]] ?>">
                <label class="btn btn-outline-secondary btn-lg m-3" style="min-width: 20%;" for="input1">
                    <?php echo $options[$questions[0]] ?>
                </label>
                <!-- input 2 -->
                <input class="btn-check" type="radio" name="questionInput" id="input2" value="<?php echo $options[$questions[1]] ?>">
                <label class="btn btn-outline-secondary btn-lg m-3" style="min-width: 20%;" for="input2">
                    <?php echo $options[$questions[1]] ?>
                </label>
            </div>
            <div class="d-flex flex-row justify-content-around">
                <!-- input 3 -->
                <input class="btn-check" type="radio" name="questionInput" id="input3" value="<?php echo $options[$questions[2]] ?>">
                <label class="btn btn-outline-secondary btn-lg m-3" style="min-width: 20%;" for="input3">
                    <?php echo $options[$questions[2]] ?>
                </label>
                <!-- input 4 -->
                <input class="btn-check" type="radio" name="questionInput" id="input4" value="<?php echo $options[$questions[3]] ?>">
                <label class="btn btn-outline-secondary btn-lg m-3" style="min-width: 20%;" for="input4">
                    <?php echo $options[$questions[3]] ?>
                </label>
            </div>
            <!-- submit knapp -->
            <input class="btn btn-success btn-lg" type="submit" value="submit">
        </div>
    </form>
</body>

</html>