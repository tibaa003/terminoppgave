<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/polishCowMilker.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!-- jQuery import -->
    <title>Polish Cow Milker</title>
</head>

<body>
    <?php
    require_once("../php/config.php");
    require_once("../php/header.php");
    ?>
    <button id="audioButton">Play audio</button>
    <div class="column spaceBetween">
        <div class="box" id="cow">
            <img draggable="false" src="../assets/polishCowMilker/PolishCowGif.gif" alt="PolishCow">
            <p id="clickText">Milk: 0</p>
        </div>
        <div class="row spaceBetween">
            <!-- hele shoppen -->
            <div class="box" id="milkerShop">
                <img draggable="false" src="../assets/polishCowMilker/Milker.png" alt="Milker">
                <p id="milkerAmount">Milkers: 1</p>
                <p id="milkerPrice"></p>
            </div>
            <div class="box" id="godShop">
                <img draggable="false" src="../assets/polishCowMilker/God.png" alt="God">
                <p id="godText">God: Fake</p>
                <p id="godPrice"></p>
            </div>
            <div class="box" id="slaveShop">
                <img draggable="false" src="../assets/polishCowMilker/Slave.png" alt="Slave">
                <p id="slaveAmount">Slaves: 0</p>
                <p id="slavePrice"></p>
            </div>
        </div>
        <div class="row spaceBetween">
            <div class="box" id="milkerinoShop">
                <img draggable="false" src="../assets/polishCowMilker/MilkerUpgrade.png" alt="Milker Upgrade">
                <p id="milkerinoText">Milkerino: In stock</p>
                <p id="milkerinoPrice"></p>
            </div>
        </div>
        <h1>Milk Stock</h1>
        <canvas height="200px" width="1000px" id="stockMarket"></canvas>
        <p id="stockValue">Stock value: 100</p>
        <div class="row spaceAround">
            <button id="buyStockBtn">Buy stock</button>
            <p id="ownedStock">Owned stock: 0</p>
            <button id="sellStockBtn">Sell stock</button>
        </div>
        <audio id="audioFile" loop>
            <source src="../assets/polishCowMilker/PolishCow.mp3" type="audio/mp3">
        </audio>
    </div>
    <?php
    require_once("../php/footer.php");
    ?>
    <script>
        // sjekker om du er logget inn etter at hele siden har lastet inn.
        $(document).ready(function() {
            <?php
            $loggedIn = require("../php/loggedIn.php");
            if ($loggedIn == false) {
                echo 'alert("Your progress won\'t be saved if you aren\'t logged in");';
            }
            ?>
        })
    </script>
    <script src="../scripts/polishCowMilker.js"></script>
</body>

</html>