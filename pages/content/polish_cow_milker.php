<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0">
    <?php require_once("../../php/include/html/bootstrap.php") ?>
    <style>
        #save_game_text {
            position: absolute;
            top: 200px;
            left: 50%;
            visibility: hidden;
        }
    </style>
    <title>Polish Cow Milker</title>
</head>

<body>
    <?php
    require_once("../../php/include/config.php");
    require_once("../../php/include/html/header.php");
    ?>
    <p id="save_game_text">Saved</p>
    <div class="d-flex flex-column">
        <!-- settings knapp -->
        <div>
            <button class="btn btn-success m-3" id="saveButton">Save</button>
        </div>
        <!-- ku card -->
        <div class="d-flex flex-row justify-content-around p-5">
            <div class="card m-auto p-3" id="cow">
                <img class="card-img-top" draggable="false" src="../../assets/polish_cow_milker/cow.png" alt="PolishCow">
                <div class="card-body">
                    <p class="card-text" id="clickText">Milk: 0</p>
                </div>
            </div>
        </div>

        <!-- shop container -->
        <div class="d-flex flex-row justify-content-around p-5">
            <!-- milker -->
            <div class="card m-auto p-3" id="milkerShop">
                <img class="card-img-top" draggable="false" src="../../assets/polish_cow_milker/Milker.png" alt="Milker">
                <div class="card-body">
                    <p class="card-text" id="milkerAmount">Milkers: 1</p>
                    <p class="card-text" id="milkerPrice"></p>
                </div>
            </div>
            <!-- god -->
            <div class="card m-auto p-3" id="godShop">
                <img class="card-img-top" draggable="false" src="../../assets/polish_cow_milker/God.png" alt="God">
                <div class="card-body">
                    <p class="card-text" id="godText">God: Fake</p>
                    <p class="card-text" id="godPrice"></p>
                </div>
            </div>
            <!-- slave -->
            <div class="card m-auto p-3" id="slaveShop">
                <img class="card-img-top" draggable="false" src="../../assets/polish_cow_milker/Slave.png" alt="Slave">
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
                <img class="card-img-top" draggable="false" src="../../assets/polish_cow_milker/milkerino.png" alt="Milker Upgrade">
                <div class="card-body">
                    <p class="card-text" id="milkerinoText">Milkerino: In stock</p>
                    <p class="card-text" id="milkerinoPrice"></p>
                </div>
            </div>
        </div>
        <!-- stock market -->
        <div class="d-flex flex-column justify-content-center p-5">
            <h1>Milk Stock</h1>
            <canvas class="border" height="200" width="1000" id="stockMarket"></canvas>
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
    </div>
    <?php
    require_once("../../php/include/html/footer.php");
    ?>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
    <script src="../../scripts/polish_cow_milker.js"></script>
    <!-- load inn user data -->
    <script>
        <?php
        require_once("../../php/include/user_data.php");
        if (isset($polishUser)) {
            echo "milk = " . $polishUser["milk"] . ";";
            echo "milker['amount'] = " . $polishUser["milkers"] . ";";
            echo "slave['amount'] = " . $polishUser["slaves"] . ";";
            echo "stock = " . $polishUser["stocks"] . ";";
            echo "milkerino['owned'] = " . $polishUser["milkerino"] . ";";
            echo "god['owned'] = " . $polishUser["god"] . ";";
        }
        ?>
        milker["price"] *= (milker["amount"] + 1) ** 1.15;
        slave["price"] *= (slave["amount"] + 1) ** 1.15;
    </script>

</body>

</html>