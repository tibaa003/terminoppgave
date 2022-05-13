<header class="d-flex flex-column border-bottom p-3">
    <div class="d-flex flex-row justify-content-around">
        <?php
        $url = $_SERVER['REQUEST_URI'];
        // hvis url inneholder index knapp for annen styling
        if (strpos($url, "index")) { ?>
            <a class="btn btn-secondary" href="/terminoppg/index.php">Home</a>
        <?php } else { ?>
            <a class="btn btn-primary" href="/terminoppg/index.php">Home</a>
        <?php }; ?>
        <?php
        // start session hvis ikke startet
        if (!isset($_SESSION)) {
            session_start();
        }
        // hvis person logget inn
        if (isset($_SESSION["loggedIn"])) {
            if (strpos($url, "user")) { ?>
                <a class="btn btn-secondary" href="pages/user.php"> user page </a>
            <?php } else { ?>
                <a class="btn btn-primary" href="pages/user.php"> user page </a>
            <?php }; ?>
    </div>
    <p class="align-self-center">Hello
        <strong>
            <?php echo $_SESSION["username"]; ?>
        </strong>
    </p>
    <a class="btn btn-primary align-self-center" href="php/logout.php">logout</a>
<?php   // hvis person ikke logget inn
        } else { ?>
    </div>
    <div class="d-flex flex-row justify-content-around">
        <a class="btn btn-primary" href="pages/login.php">login</a>
        <a class="btn btn-primary" href="pages/register.php">Register</a>
    </div>
<?php } ?>
</header>