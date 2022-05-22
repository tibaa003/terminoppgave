<?php
include("../php/config.php");
include("../php/functions.php");
include("../php/userData.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once("../php/bootstrap.php") ?>
    <title><?php echo $user["username"]; ?> homepage</title>
</head>

<body>
    <?php require_once("../php/header.php") ?>
    <div class="d-flex flex-column align-items-center m-5">

        <div class="card-deck d-flex flex-row">
            <?php if ($evenUser) {
                $correctText = "Correct answers: " . $evenUser["correctAnswers"] . "/" . $evenUser["answeredQuestions"];
                if ($evenUser["finished"]) {
                    $questionText = "Finished";
                } else {
                    $questionAmount = queryDB("SELECT COUNT(*) as total FROM evenquizquestions", $link);
                    $questionText = "Questions answered: " . $evenUser["answeredQuestions"] . "/" . $questionAmount["total"];
                }
            ?>
                <div class="card m-5">
                    <img class="card-img-top" width="516px" height="180px" src="../assets/evenQuiz/ev1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Even Quiz</h5>
                        <p class="card-text"><?php echo $correctText; ?></p>
                        <p class="card-text"> <strong><?php echo $questionText; ?></strong></p>
                    </div>
                </div>
            <?php }
            if ($polishUser) {
                $milkText = "Milk: " . $polishUser["milk"];
                $milkerText = "Milkers: " . $polishUser["milkers"];
                $slaveText = "Slaves: " . $polishUser["slaves"];
            ?>
                <div class="card m-5">
                    <img class="card-img-top" src="../assets/polishCowMilker/cow.png" alt="Card image cap" width="516px" height="180px">
                    <div class="card-body">
                        <h5 class="card-title">Polish Cow Milker</h5>
                        <p class="card-text"><?php echo $milkText; ?></p>
                        <p class="card-text"><?php echo $milkerText; ?></p>
                        <p class="card-text"><?php echo $slaveText; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>