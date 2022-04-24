<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/polishCowMilker.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Polish Cow Milker</title>
</head>

<body class="noMargin">
    <?php
    require_once("../php/config.php");
    require_once("../php/header.php");
    ?>
    <div class="page">
        <div class="main">
            <img onclick="milk()" id="Cow" src="../assets/polishCowMilker/PolishCowGif.gif" alt="PolishCow">
        </div>
        <div class="milk">
            <p id="clicks">milk:0</p>
        </div>
        <div class="allShop">
            <!-- hele shoppen -->
            <div class="shop">
                <img id="shopImg" onclick="buymilker()" src="../assets/polishCowMilker/Milker.png" alt="Milker">
                <p class="shopText" id="milkers">milkers:1</p>
                <p class="shopText" id="priceM">price:10</p>
            </div>
            <div class="shop">
                <img class="god" id="shopImg" onclick="buyGod()" src="../assets/polishCowMilker/God.png" alt="God">
                <p class="shopText" id="priceG">price:1 000 000 000 000</p>
                <p class="shopText" id="god">god:not real</p>
            </div>
            <div class="shop">
                <img id="shopImg" onclick="buyslave()" src="../assets/polishCowMilker/Slave.png" alt="Slave">
                <p class="shopText" id="slaves">slaves:0</p>
                <p class="shopText" id="priceS">price:20</p>
            </div>
        </div>
        <div class="allUpgrades">
            <!-- alle upgradesene -->
            <div class="upgrades">
                <img class="upgrade" onclick="upgradeM1()" src="../assets/polishCowMilker/MilkerUpgrade.png" alt="Milker Upgrade">
                <p class="upgradePrice" id="M1price"></p>
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
    <script src="../script/polishCowMilker.js"></script>
    <script>
        <?php
        $logged = require("../php/loggedIn.php");
        if ($logged == false) {
            echo 'alert("Your progress won\'t be saved if you aren\'t logged in");';
        }
        ?>
    </script>
</body>

</html>