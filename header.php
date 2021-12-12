<header>
    <a href="./index.php">Home</a>
    <?php
    if(!isset($_SESSION)){
        session_start();
    }
    if (isset($_SESSION["loggedIn"])) {
        echo '<p id="textCenter">Hello ' . $_SESSION["username"] . '</p>';
        echo '<p id="textCenter"> <a class="button" href="./logout.php">logout</a> </p>';
    } else {
        echo '<p id="textCenter"> <a class="button" id="textCenter" href="./login.php">login</a> </p>';
        echo '<p id="textCenter"> <a class="button" id="textCenter" href="register.php">Register</a> </p>';
    }
    ?>
</header>