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
    <?php include("../php/include/html/bootstrap.php"); ?>
    <title>Admin crud system</title>
</head>

<body>
    <?php include("../php/include/html/header.php"); ?>
    <div class="d-flex flex-column p-3">
        <a class="btn btn-primary m-3" style="max-width: fit-content;" href="./evenquiz/crud_even.php">Edit Even Quiz</a>
        <a class="btn btn-primary m-3" style="max-width: fit-content;" href="./faq/crud_faq.php">Edit FAQ</a>
    </div>
    <?php include("../php/include/html/footer.php") ?>
</body>

</html>