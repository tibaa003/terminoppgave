<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../php/bootstrap.php"); ?>
    <title>EvenQuiz CRUD</title>
</head>

<body>
    <?php require_once("../php/header.php") ?>
    <div class="d-flex flex-column align-items-center text-center m-auto">

        <?php
        include("../php/config.php");
        include("../php/functions.php");
        // printe ut even spørsmål 
        $questions = queryRowsDB("SELECT * FROM evenquizquestions", $link);
        $questionAmount = queryDB("SELECT COUNT(*) as total FROM evenquizquestions", $link);
        $rows = [];
        while ($row = mysqli_fetch_array($questions)) {
            $rows[] = $row;
        }

        for ($i = 0; $i < $questionAmount["total"]; $i++) { ?>
            <div class="card m-3">
                <img class="card-img-top" src="../assets/evenQuiz/<?php echo $rows[$i]["imgName"] ?>" width="516px" height="180px" alt="">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $rows[$i]["question"] ?></h3>
                    <p class="card-text"><strong><?php echo $rows[$i]["answer"] ?></strong></p>
                    <p class="card-text"><?php echo $rows[$i]["option1"] ?></p>
                    <p class="card-text"><?php echo $rows[$i]["option2"] ?></p>
                    <p class="card-text"><?php echo $rows[$i]["option3"] ?></p>
                    <div>
                        <a class="btn btn-primary" href="./editEvenQuestion.php?id=<?php echo $rows[$i]["ID"] ?>">Edit</a>
                        <a class="btn btn-primary" href="./deleteEvenQuestion.php?id=<?php echo $rows[$i]["ID"] ?>">Delete</a>
                    </div>
                </div>
            </div>
        <?php }
        ?>
        <a class="btn btn-primary m-5" href="./createEvenQuestion.php">Create question</a>
    </div>
    <?php require_once("../php/footer.php") ?>
</body>

</html>