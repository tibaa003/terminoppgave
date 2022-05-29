<?php
include("../../php/include/config.php");
include("../../php/include/functions.php");
include("../../php/include/user_data.php");
if ($_SESSION["username"] == "admin") {
    header("Location: ../../admin/evenquiz/crud_even.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once("../../php/include/html/bootstrap.php") ?>
    <title><?php echo $user["username"]; ?> homepage</title>
</head>

<body>
    <?php require_once("../../php/include/html/header.php") ?>
    <div class="d-flex flex-column align-items-center m-5">

        <div class="card-deck d-flex flex-row">
            <?php if ($evenUser) {
                $correctText = "Correct answers: " . $evenUser["correct_answers"] . "/" . $evenUser["current_question"];

                $questionAmount = queryDB("SELECT COUNT(*) as total FROM even_quiz_question", $link);
                $questionText = "Questions answered: " . $evenUser["current_question"] . "/" . $questionAmount["total"]; ?>
                <div class="card m-5">
                    <img class="card-img-top" width="516" height="180" src="../../assets/evenquiz/ev1.jpg" alt="Ev1">
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
                    <img class="card-img-top" src="../../assets/polish_cow_milker/cow.png" alt="Polish cow" width="516" height="180">
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
    <?php require_once("../../php/include/html/footer.php"); ?>
</body>

</html>