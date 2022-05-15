<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    // bootstrap import
    require_once("./php/bootstrap.php")
    ?>

    <title>Quiz le Even</title>
</head>

<body>
    <!-- header import -->
    <?php require_once("./php/header.php") ?>

    <div class="d-flex flex-column align-items-center m-5">

        <!-- even quiz banner -->
        <a href="./pages/evenQuiz.php" class="text-decoration-none" style="max-width: 50%">
            <div class="card mb-3 border-dark">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="img-fluid rounded-start" src="./assets/evenQuiz/ev1.jpg" alt="ev1">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">Even Quiz</h1>
                                <p class="card-text">The famous Even quiz. Try it out for free!</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>

        <!-- polish cow milker banner -->
        <a href="./pages/polishCowMilker.php" class="text-decoration-none" style="max-width: 50%">
            <div class="card mb-3 border-dark">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="img-fluid rounded-start border" src="./assets/polishCowMilker/cow.png" alt="Cow">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h3 class="card-title">Cow of the Polish</h1>
                                <p class="card-text">The famous game: Polish Cow Milker</p>
                                <p>
                                    <small class="text-muted">
                                        New update: Stock market!
                                    </small>
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- footer import -->
    <?php require_once("./php/footer.php") ?>
</body>

</html>