<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <!-- css imports -->
    <!-- <link rel="stylesheet" type="text/css" href="../css/polishCowMilker.css">
    <link rel="stylesheet" href="../css/style.css"> -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Polish Cow Milker</title>
</head>

<body>
    <?php
    require_once("../php/config.php");
    require_once("../php/header.php");
    ?>
    <div class="d-flex flex-column">
        <div class="dropdown m-2 align-self-end" id="settings">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Settings
            </button>
            <div class="dropdown-menu">
                <button class="dropdown-item" id="audioButton">Play audio</button>
                <button class="dropdown-item">Save</button>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-around p-5">
            <div class="card m-auto p-3" id="cow">
                <img class="card-img-top" draggable="false" src="../assets/polishCowMilker/cow.png" alt="PolishCow">
                <div class="card-body">
                    <p class="card-text" id="clickText">Milk: 0</p>
                </div>
            </div>
        </div>

        <div class="d-flex flex-row justify-content-around p-5">
            <!-- hele shoppen -->
            <div class="card m-auto p-3" id="milkerShop">
                <img class="card-img-top" draggable="false" src="../assets/polishCowMilker/milker.png" alt="Milker">
                <div class="card-body">
                    <p class="card-text" id="milkerAmount">Milkers: 1</p>
                    <p class="card-text" id="milkerPrice"></p>
                </div>
            </div>
            <div class="card m-auto p-3" id="godShop">
                <img class="card-img-top" draggable="false" src="../assets/polishCowMilker/god.png" alt="God">
                <div class="card-body">
                    <p class="card-text" id="godText">God: Fake</p>
                    <p class="card-text" id="godPrice"></p>
                </div>
            </div>
            <div class="card m-auto p-3" id="slaveShop">
                <img class="card-img-top" draggable="false" src="../assets/polishCowMilker/slave.png" alt="Slave">
                <div class="card-body">
                    <p class="card-text" id="slaveAmount">Slaves: 0</p>
                    <p class="card-text" id="slavePrice"></p>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-around p-5">
            <div class="card m-auto p-3" id="milkerinoShop">
                <img class="card-img-top" draggable="false" src="../assets/polishCowMilker/milkerino.png" alt="Milker Upgrade">
                <div class="card-body">
                    <p class="card-text" id="milkerinoText">Milkerino: In stock</p>
                    <p class="card-text" id="milkerinoPrice"></p>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-center p-5">
            <h1>Milk Stock</h1>
            <canvas class="border" height="200px" width="1000px" id="stockMarket"></canvas>
            <p id="stockValue">Stock value: 100</p>
        </div>
        <div class="d-flex flex-row justify-content-around p-5">
            <div>
                <button id="buyStockBtn">Buy stock</button>
                <button id="buyMaxStockBtn">Buy max stock</button>
            </div>
            <p id="ownedStock">Owned stock: 0</p>
            <div>
                <button id="sellStockBtn">Sell stock</button>
                <button id="sellMaxStockBtn">Sell max stock</button>
            </div>
        </div>
        <audio id="audioFile" loop>
            <source src="../assets/polishCowMilker/PolishCow.mp3" type="audio/mp3">
        </audio>
    </div>
    <?php
    require_once("../php/footer.php");
    ?>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Bootstrap required js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- PHP sjekker om du har logget in -->
    <script>
        $(document).ready(function() {
            <?php
            $loggedIn = require("../php/loggedIn.php");
            if ($loggedIn == false) {
                echo 'alert("Your progress won\'t be saved if you aren\'t logged in");';
            }
            ?>
        })
    </script>
    <!-- Polish cow milker script -->
    <script src="../scripts/polishCowMilker.js"></script>
</body>

</html>