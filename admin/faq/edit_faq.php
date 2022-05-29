<?php
include("../../php/include/config.php");
include("../../php/include/functions.php");
session_start();
if ($_SESSION["username"] != "admin") {
    header("Location: ../../index.php");
}
$question = queryDB("SELECT * FROM faq WHERE faq_id = " . $_GET["id"] . "", $link);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    insertDB("UPDATE faq SET question = '" . $_POST["question"] . "', answer = '" . $_POST["answer"] . "' WHERE faq_id = " . $question['faq_id'], $link);

    header("Location: ./crud_faq.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../../php/include/html/bootstrap.php"); ?>
    <title>edit faq</title>
</head>

<body>
    <?php require_once("../../php/include/html/header.php") ?>
    <div class="m-3" style="max-width: fit-content;">
        <h1>Edit faq question form</h1>
        <p>Please edit values to edit a question</p>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $question["faq_id"]; ?>" method="POST">
            <div class="form-group">
                <label for="question">Question</label>
                <input class="form-control" name="question" type="text" id="question" value="<?php echo $question["question"] ?>" required>
            </div>
            <div class="form-group">
                <label for="answer">Answer</label>
                <input class="form-control" name="answer" type="text" id="answer" value="<?php echo $question["answer"] ?>" required>
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit">
            </div>
        </form>
    </div>
    <?php require_once("../../php/include/html/footer.php") ?>
</body>

</html>