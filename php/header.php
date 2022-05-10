<header class="d-flex flex-column border-bottom p-3">
    <div class="d-flex flex-row justify-content-around">
        <a class="btn btn-primary" href="/terminoppg/index.php">Home</a>
        <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION["loggedIn"])) {
        ?>
            <a class="btn btn-primary" href="user.php"> user page </a>
    </div>
    <p class="align-self-center">Hello
        <strong>
            <?php echo $_SESSION["username"]; ?>
        </strong>
    </p>
    <a class="btn btn-primary align-self-center" href="logout.php">logout</a>
<?php } else { ?>
    </div>
    <div class="d-flex flex-row justify-content-around">
        <a class="btn btn-primary" href="/terminoppg/html/login.php">login</a>
        <a class="btn btn-primary" href="/terminoppg/html/register.php">Register</a>
    </div>
<?php } ?>
</header>