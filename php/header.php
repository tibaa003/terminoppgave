<header class="d-flex flex-column border-bottom p-3">
    <div class="d-flex flex-row justify-content-around">

        <?php $url = $_SERVER['REQUEST_URI']; ?>

        <!-- home knapp -->
        <a class="btn 
        <?php
        // hvis url inneholder index
        if (strpos($url, "index")) { ?>
            btn-secondary 
        <?php } else { ?>
            btn-primary" <?php }; ?> href="/terminoppg/index.php">Home</a>

        <?php
        // start session hvis ikke startet
        if (!isset($_SESSION)) {
            session_start();
        }
        // hvis person logget inn
        if (isset($_SESSION["loggedIn"])) { ?>
            <!-- user home page knapp -->
            <a class="btn
        <?php
            // hvis url inneholder user
            if (strpos($url, "user")) { ?>
            btn-secondary 
        <?php } else { ?>
            btn-primary" <?php }; ?> href="/terminoppg/pages/user.php">User page</a>
    </div>
    <!-- hallo + navn -->
    <p class="align-self-center">Hello
        <strong>
            <?php echo $_SESSION["username"]; ?>
        </strong>
    </p>
    <a class="btn btn-primary align-self-center" href="/terminoppg/php/logout.php">logout</a>
<?php   // hvis person ikke logget inn
        } else { ?>
    </div>
    <!-- login + register knapp -->
    <div class="d-flex flex-row justify-content-around">
        <a class="btn btn-primary" href="/terminoppg/pages/login.php">login</a>
        <a class="btn btn-primary" href="/terminoppg/pages/register.php">Register</a>
    </div>
<?php } ?>
</header>