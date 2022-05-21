<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Polish Cow Milker</title>
</head>

<body>
    <?php
    require_once("../php/config.php");
    require_once("../php/header.php");
    ?>
    <div class="d-flex flex-column">
        <!-- settings knapp -->
        <div class="btn-group dropstart m-2 mr-5 align-self-end" id="settings">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Settings
            </button>
            <!-- settings dropdown -->
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li> <button class="dropdown-item" id="audioButton">Play audio</button></li>
                <li> <button class="dropdown-item" id="saveButton">Save</button></li>
            </ul>
        </div>
        <!-- ku card -->
        <div class="d-flex flex-row justify-content-around p-5">
            <div class="card m-auto p-3" id="cow">
                <img class="card-img-top" draggable="false" src="../assets/polishCowMilker/cow.png" alt="PolishCow">
                <div class="card-body">
                    <p class="card-text" id="clickText">Milk: 0</p>
                </div>
            </div>
        </div>

        <!-- shop container -->
        <div class="d-flex flex-row justify-content-around p-5">
            <!-- milker -->
            <div class="card m-auto p-3" id="milkerShop">
                <img class="card-img-top" draggable="false" src="../assets/polishCowMilker/milker.png" alt="Milker">
                <div class="card-body">
                    <p class="card-text" id="milkerAmount">Milkers: 1</p>
                    <p class="card-text" id="milkerPrice"></p>
                </div>
            </div>
            <!-- god -->
            <div class="card m-auto p-3" id="godShop">
                <img class="card-img-top" draggable="false" src="../assets/polishCowMilker/god.png" alt="God">
                <div class="card-body">
                    <p class="card-text" id="godText">God: Fake</p>
                    <p class="card-text" id="godPrice"></p>
                </div>
            </div>
            <!-- slave -->
            <div class="card m-auto p-3" id="slaveShop">
                <img class="card-img-top" draggable="false" src="../assets/polishCowMilker/slave.png" alt="Slave">
                <div class="card-body">
                    <p class="card-text" id="slaveAmount">Slaves: 0</p>
                    <p class="card-text" id="slavePrice"></p>
                </div>
            </div>
        </div>
        <!-- upgrades -->
        <div class="d-flex flex-row justify-content-around p-5">
            <!-- milkerino -->
            <div class="card m-auto p-3" id="milkerinoShop">
                <img class="card-img-top" draggable="false" src="../assets/polishCowMilker/milkerino.png" alt="Milker Upgrade">
                <div class="card-body">
                    <p class="card-text" id="milkerinoText">Milkerino: In stock</p>
                    <p class="card-text" id="milkerinoPrice"></p>
                </div>
            </div>
        </div>
        <!-- stock market -->
        <div class="d-flex flex-column justify-content-center p-5">
            <h1>Milk Stock</h1>
            <canvas class="border" height="200px" width="1000px" id="stockMarket"></canvas>
            <p id="stockValue">Stock value: 100</p>
        </div>
        <div class="d-flex flex-row justify-content-around p-5">
            <!-- buy/sell buttons -->
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
        <!-- hidden audio file -->
        <audio id="audioFile" loop>
            <source src="../assets/polishCowMilker/PolishCow.mp3" type="audio/mp3">
        </audio>
    </div>
    <?php
    require_once("../php/footer.php");
    ?>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- PHP sjekker om du har logget in -->
    <script>
        $(document).ready(function() {
            <?php
            if (!isset($_SESSION["loggedIn"])) {
                echo 'alert("Your progress won\'t be saved if you aren\'t logged in");';
            }
            ?>
        })
    </script>
    <!-- Polish cow milker script -->
    <script src="../scripts/polishCowMilker.js"></script>
    <script>
        <?php
        require_once "../php/userData.php";
        if ($user) {
            echo "milk = " . $polishUser["milk"] . ";";
            echo "milker['amount'] = " . $polishUser["milkers"] . ";";
            echo "slave['amount'] = " . $polishUser["slaves"] . ";";
        }
        ?>
        milker["price"] *= (milker["amount"] + 1) ** 1.15;
        slave["price"] *= (slave["amount"] + 1) ** 1.15;
    </script>

</body>

</html>