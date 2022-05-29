<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../../php/include/html/bootstrap.php"); ?>
    <title>FAQ CRUD</title>
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
        // printe ut faq spørsmål 
        $questions = queryRowsDB("SELECT * FROM faq", $link);
        $rows = [];
        while ($row = mysqli_fetch_array($questions)) {
            $rows[] = $row;
        }
        if (count($rows) < 10) {
            $rowAmount = count($rows);
        } else {
            $rowAmount = 10;
        }

        for ($i = 0; $i < $rowAmount; $i++) { ?>
            <div class="card w-75 m-3">
                <div class="card-body">
                    <h3 class="card-title"><?php echo $rows[$i]["question"] ?></h3>
                    <p class="card-text"><?php echo $rows[$i]["answer"] ?></p>
                </div>
                <div>
                    <a class="btn btn-primary" href="./edit_faq.php?id=<?php echo $rows[$i]["faq_id"] ?>">Edit</a>
                    <a class="btn btn-primary" href="./delete_faq.php?id=<?php echo $rows[$i]["faq_id"] ?>">Delete</a>
                </div>
            </div>
        <?php }
        ?>
        <a class="btn btn-primary m-5" href="./create_faq.php">Create question</a>
    </div>

    <?php require_once("../../php/include/html/footer.php") ?>
</body>

</html>