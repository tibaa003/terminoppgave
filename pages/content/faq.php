<?php
session_start();
require_once("../../php/include/config.php");
include("../../php/include/functions.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../../php/include/html/bootstrap.php"); ?>
    <title>Frequently asked questions</title>
</head>

<body>
    <?php include("../../php/include/html/header.php"); ?>
    <div class="d-flex flex-column align-items-center text-center m-auto">

        <?php
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
            </div>
        <?php }
        ?>
    </div>
</body>

</html>