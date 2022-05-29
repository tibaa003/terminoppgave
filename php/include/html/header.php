<header class="d-flex flex-column border-bottom p-3">
    <div class="d-flex flex-row justify-content-around">

        <?php $url = $_SERVER['REQUEST_URI']; ?>

        <!-- home knapp -->
        <a class="btn btn-primary
        <?php
        // hvis url inneholder index
        if (strpos($url, "/index")) { ?>
            disabled" <?php } else { ?> " <?php }; ?> href=" /terminoppg/index.php">Home</a>

        <?php
        // start session hvis ikke startet
        if (!isset($_SESSION)) {
            session_start();
        }
        // hvis person logget inn
        if (isset($_SESSION["loggedIn"])) {
            if ($_SESSION["username"] == "admin") { ?>
                <a class="btn btn-primary
                <?php if (strpos($url, "hub")) { ?> 
                disabled" <?php } else { ?> " <?php } ?> href=" /terminoppg/admin/crud_hub.php">CRUD systems</a>
    </div>
<?php } else { ?>
    <!-- user home page knapp -->
    <a class="btn btn-primary
        <?php
                // hvis url inneholder user
                if (strpos($url, "user")) { ?>
            disabled" <?php } else { ?> " <?php }; ?> href=" /terminoppg/pages/content/user.php">User page</a>

    </div>
<?php  } ?>
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
        <a class="btn btn-primary
        <?php
            // hvis url inneholder index
            if (strpos($url, "login.php")) { ?>
            disabled" <?php } else { ?> " <?php }; ?> 
            href=" /terminoppg/pages/login/login.php">login</a>

        <a class="btn btn-primary
        <?php if (strpos($url, "register.php")) { ?>
            disabled" <?php } else { ?> " <?php }; ?> 
            href=" /terminoppg/pages/login/register.php">Register</a>
    </div>
<?php } ?>
</header>