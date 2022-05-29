<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../../php/include/html/bootstrap.php"); ?>
    <title>EvenQuiz CRUD</title>
</head>

<body>
    <?php require_once("../../php/include/html/header.php");
    if ($_SESSION["username"] != "admin") {
        header("Location: ../index.php");
    } ?>
    <div class="d-flex flex-column align-items-center text-center m-auto">

        <?php
        include("../../php/include/config.php");
        include("../../php/include/functions.php");
        // printe ut even spørsmål 
        $questions = queryRowsDB("SELECT * FROM even_quiz_question ORDER BY order_nr", $link);
        $questionAmount = queryDB("SELECT COUNT(*) as total FROM even_quiz_question", $link);
        $rows = [];
        while ($row = mysqli_fetch_array($questions)) {
            $rows[] = $row;
        }

        for ($i = 0; $i < $questionAmount["total"]; $i++) { ?>
            <div class="card m-3">
                <img class="card-img-top" src="../../assets/evenQuiz/<?php echo $rows[$i]["img_name"] ?>" width="516px" height="180px" alt="">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $rows[$i]["question"] ?></h3>
                    <p class="card-text"><strong><?php echo $rows[$i]["answer"] ?></strong></p>
                    <p class="card-text"><?php echo $rows[$i]["option1"] ?></p>
                    <p class="card-text"><?php echo $rows[$i]["option2"] ?></p>
                    <p class="card-text"><?php echo $rows[$i]["option3"] ?></p>
                    <div>
                        <a class="btn btn-primary" href="./edit_even.php?id=<?php echo $rows[$i]["question_id"] ?>">Edit</a>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete<?php echo $rows[$i]["question_id"] ?>">
                            Delete
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="delete<?php echo $rows[$i]["question_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete evenquiz question</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p> Are you sure you want to delete this question?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a class="btn btn-primary" href="./delete_even.php?id=<?php echo $rows[$i]["question_id"] ?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php }
        ?>
        <a class="btn btn-primary m-5" href="./create_even.php">Create question</a>
    </div>

    <?php require_once("../../php/include/html/footer.php") ?>
</body>

</html>