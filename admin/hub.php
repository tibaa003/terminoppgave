<?php
session_start();
if ($_SESSION["username"] != "admin") {
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../php/bootstrap.php"); ?>
    <title>Admin crud system</title>
</head>

<body>
    <?php include("../php/header.php"); ?>
    <div class="d-flex flex-column p-3">
        <a class="btn btn-primary m-3" style="max-width: fit-content;" href="./createEvenQuestion.php">Create Even Quiz question</a>
        <a class="btn btn-primary m-3" style="max-width: fit-content;" href="./createFaq.php">Create FAQ question</a>
    </div>
    <?php include("../php/footer.php") ?>
</body>

</html>