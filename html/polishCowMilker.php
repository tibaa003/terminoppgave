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

<body class="noMargin">
    <?php
    require_once("../php/config.php");
    require_once("../php/header.php");
    ?>
    <div class="page">
        <div class="main">
            <img id="cow" src="../assets/polishCowMilker/PolishCowGif.gif" alt="PolishCow">
        </div>
        <div class="milk">
            <p id="clicks">milk:0</p>
        </div>
        <div class="allShop">
            <!-- hele shoppen -->
            <div class="shop" id="milkerShop">
                <img class="shopImg" src="../assets/polishCowMilker/Milker.png" alt="Milker">
                <p class="shopText" id="milkers">milkers:1</p>
                <p class="shopText" id="priceM"></p>
            </div>
            <div class="shop" id="godShop">
                <img class="god" class="shopImg" src="../assets/polishCowMilker/God.png" alt="God">
                <p class="shopText" id="priceG"></p>
                <p class="shopText" id="god">god:not real</p>
            </div>
            <div class="shop" id="slaveShop">
                <img class="shopImg" src="../assets/polishCowMilker/Slave.png" alt="Slave">
                <p class="shopText" id="slaves">slaves:0</p>
                <p class="shopText" id="priceS"></p>
            </div>
        </div>
        <div class="allUpgrades">
            <!-- alle upgradesene -->
            <div id="milkerinoShop" class="upgrades">
                <img class="upgrade" src="../assets/polishCowMilker/MilkerUpgrade.png" alt="Milker Upgrade">
                <p class="upgradePrice" id="priceM1"></p>
            </div>
        </div>
        <div id="stockMarket">
            <!-- coming soon stock market -->
        </div>
        <audio id="audio" autoplay loop>
            <!-- lyden -->
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
    <script src="../script/polishCowMilker.js"></script>
</body>

</html>