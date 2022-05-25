<?php
include("../php/config.php");
include("../php/functions.php");
if ($_SESSION["username"] != "admin") {
    header("Location: ../index.php");
}
$question = queryDB("SELECT * FROM evenquizquestions WHERE ID = " . $_GET["id"] . "", $link);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES["img"]["name"] != "") {
        $imgName = $_FILES["img"]["name"];
        $imgTmpName = $_FILES["img"]["tmp_name"];

        move_uploaded_file($imgTmpName, "../assets/evenQuiz/" . $imgName);
    } else {
        $imgName = $question["imgName"];
    }
    insertDB("UPDATE evenquizquestions SET question = '" . $_POST["question"] . "', answer = '" . $_POST["answer"] . "', option1 = '" . $_POST["option1"] . "', option2 = '" . $_POST["option2"] . "', option3 = '" . $_POST["option3"] . "', imgName = '" . $imgName . "' WHERE ID = " . $question['ID'], $link);

    header("Location: ./evenQuizCRUD.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include("../php/bootstrap.php"); ?>
    <title>Document</title>
</head>

<body>
    <?php require_once("../php/header.php") ?>
    <div class="m-3" style="max-width: fit-content;">
        <h1>Edit Even quiz question form</h1>
        <p>Please edit values to edit a question</p>
        <h5>Current Image: </h5>
        <img src="../assets/evenQuiz/<?php echo $question["imgName"] ?>" width="516px" height="180px" alt="">
        <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $question["ID"]; ?>" method="post">
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
            <div class="form-group mb-3">
                <label for="img">New image (leave blank to keep old image)</label>
                <input class="form-control" name="img" type="file" id="img">
            </div>
            <div class="form-group">
                <input class="btn btn-success" type="submit">
            </div>
        </form>
    </div>
    <?php require_once("../php/footer.php") ?>
</body>

</html>