<?php
session_start();
if ($_SESSION["username"] != "admin") {
    header("Location: ../index.php");
}
require_once "../php/config.php";
require_once "../php/functions.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $questionAmount = queryDB("SELECT COUNT(*) as total FROM evenquizquestions", $link);
    if ($_FILES["img"]) {
        $imgName = $_FILES["img"]["name"];
        $imgTmpName = $_FILES["img"]["tmp_name"];

        move_uploaded_file($imgTmpName, "../assets/evenQuiz/" . $imgName);
    }
    insertDB("INSERT INTO evenquizquestions (id, question, answer, option1, option2, option3, imgName) VALUES ('" . $questionAmount["total"] + 1 . "','" . $_POST["question"] . "','" . $_POST["answer"] . "','" . $_POST["option1"] . "','" . $_POST["option2"] . "','" . $_POST["option3"] . "','" . $_FILES["img"]["name"] . "')", $link);

    header("Location: ./evenQuizCRUD.php");
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "../php/bootstrap.php"; ?>
    <title>Even Quiz create question</title>
</head>

<body>
    <?php require_once("../php/header.php") ?>
    <div class="m-3" style="max-width: fit-content;">
        <h1>Create Even quiz question form</h1>
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
            <div class="form-group">
                <label for="option1">Option</label>
                <input class="form-control" name="option1" type="text" id="option1">
            </div>
            <div class="form-group">
                <label for="option2">Option</label>
                <input class="form-control" name="option2" type="text" id="option2">
            </div>
            <div class="form-group">
                <label for="Option3">Option</label>
                <input class="form-control" name="option3" type="text" id="option3">
            </div>
            <div class="form-group mb-3">
                <label for="img">Image</label>
                <input class="form-control" name="img" type="file" id="img" value="">
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit">
            </div>
        </form>
    </div>
    <?php require_once("../php/footer.php") ?>
</body>

</html>