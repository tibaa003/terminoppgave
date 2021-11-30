<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
    <div class="contentContainer">
        <div class="imageContainer">
            <img src="./assets/ev1.jpg" alt="ev1">
        </div>
        <div class="descriptionContainer">
            <h1>even quiz</h1>
        </div>
    </div>
    <div class="contentContainer">
        <div class="descriptionContainer">
            <h1>gamin</h1>
        </div>
        <div class="imageContainer">
            <img src="" alt="">
        </div>
    </div>
</body>
</html>