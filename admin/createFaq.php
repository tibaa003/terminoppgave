<?php
session_start();
if ($_SESSION["username"] != "admin") {
    header("Location: ../index.php");
}
require_once "../php/config.php";
require_once "../php/functions.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    insertDB("INSERT INTO faqs (question, answer) VALUES ('" . $_POST["question"] . "','" . $_POST["answer"] . "')", $link);

    header("Location: ../index.php");
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once("../php/bootstrap.php") ?>
    <title>Document</title>
</head>

<body>
    <div class="m-3" style="max-width: fit-content;">
        <h1>Create FAQ question form</h1>
        <p>Please fill out form to create a question</p>
        <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="question">Question</label>
                <input class="form-control" name="question" type="text" id="question" required>
            </div>
            <div class="form-group">
                <label for="answer">Answer</label>
                <input class="form-control" name="answer" type="text" id="answer" required>
            </div>
            <div class="form-group pt-3">
                <input class="btn btn-success" type="submit">
            </div>
        </form>
    </div>
</body>

</html>