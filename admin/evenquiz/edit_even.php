<?php
include("../../php/include/config.php");
include("../../php/include/functions.php");
session_start();
if ($_SESSION["username"] != "admin") {
    header("Location: ../../index.php");
}
$question = queryDB("SELECT * FROM even_quiz_question WHERE question_id = " . $_GET["id"] . "", $link);
$question_amount = queryDB("SELECT COUNT(*) as total FROM even_quiz_question", $link);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES["img"]["name"] != "") {
        $imgName = $_FILES["img"]["name"];
        $imgTmpName = $_FILES["img"]["tmp_name"];

        move_uploaded_file($imgTmpName, "../../assets/evenQuiz/" . $imgName);
    } else {
        $imgName = $question["imgName"];
    }
    // set order of item in select order to 0
    insertDB("UPDATE even_quiz_question SET order_nr = 0 WHERE order_nr = " . $_POST["order"], $link);
    // edit the question
    insertDB("UPDATE even_quiz_question SET question = '" . $_POST["question"] . "', answer = '" . $_POST["answer"] . "', option1 = '" . $_POST["option1"] . "', option2 = '" . $_POST["option2"] . "', option3 = '" . $_POST["option3"] . "', img_name = '" . $imgName . "', order_nr = '" . $_POST["order"] . "' WHERE question_id = " . $question['question_id'], $link);
    // set order of item with order 0 til edited items order
    insertDB("UPDATE even_quiz_question SET order_nr = '" . $question["order_nr"] . "' WHERE order_nr = 0", $link);

    header("Location: ./crud_even.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../../php/include/html/bootstrap.php"); ?>
    <title>edit even quiz</title>
</head>

<body>
    <?php require_once("../../php/include/html/header.php") ?>
    <div class="m-3" style="max-width: fit-content;">
        <h1>Edit Even quiz question form</h1>
        <p>Please edit values to edit a question</p>
        <h5>Current Image: </h5>
        <img src="../../assets/evenquiz/<?php echo $question["img_name"] ?>" width="516px" height="180px" alt="">
        <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $question["question_id"]; ?>" method="POST">
            <div class="form-group">
                <label for="question">Question</label>
                <input class="form-control" name="question" type="text" id="question" value="<?php echo $question["question"] ?>" required>
            </div>
            <div class="form-group">
                <label for="answer">Answer</label>
                <input class="form-control" name="answer" type="text" id="answer" value="<?php echo $question["answer"] ?>" required>
            </div>
            <div class="form-group">
                <label for="option1">Option</label>
                <input class="form-control" name="option1" type="text" id="option1" value="<?php echo $question["option1"] ?>">
            </div>
            <div class="form-group">
                <label for="option2">Option</label>
                <input class="form-control" name="option2" type="text" id="option2" value="<?php echo $question["option2"] ?>">
            </div>
            <div class="form-group">
                <label for="Option3">Option</label>
                <input class="form-control" name="option3" type="text" id="option3" value="<?php echo $question["option3"] ?>">
            </div>
            <div class="form-group">
                <label for="order">Order</label>
                <input class="form-control" name="order" type="number" min="1" max="<?php echo $question_amount["total"]; ?>" id="order" value="<?php echo $question["order_nr"] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="img">New image (leave blank to keep old image)</label>
                <input class="form-control" name="img" type="file" id="img" accept="image/png, image/jpeg">
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit">
            </div>
        </form>
    </div>
    <?php require_once("../../php/include/html/footer.php") ?>
</body>

</html>