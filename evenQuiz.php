<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <?php
            session_start();
            if(isset($_SESSION["loggedin"])){
                echo '<p id="textCenter">Hello ' . $_SESSION["username"] . '</p>';
                echo '<p id="textCenter"> <a class="button" href="./logout.php">logout</a> </p>';
            } else{
                echo '<p id="textCenter"> <a class="button" id="textCenter" href="./login.php">login</a> </p>';
                echo '<p id="textCenter"> <a class="button" id="textCenter" href="register.php">Register</a> </p>';
            }
        ?>
    </header>
    <div class="question" id="question1">
        <img src="./assets/ev1.jpg" alt="">
        <h3>hva heter even?</h3>
        <div class="questions">
            <div class="questions2">
            <button onclick="answer(question1, 'Even')">Even</button>
            <button onclick="answer(question1, 'even')">even</button>
        </div>
        <div class="questions2">
            <button onclick="answer(question1, 'Ev1')">Ev1</button>
            <button onclick="answer(question1, 'Even Myrvoll')">Even Myrvoll</button>
        </div>
        </div>
    </div>
    <div id="startContainer">
        <button>start</button>
    </div>
    <script src="./quiz.js"></script>
</body>
</html>