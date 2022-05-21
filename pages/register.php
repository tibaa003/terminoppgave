<?php
// Include config file
require_once "../php/config.php";

// Define variables and initialize with empty values
$e_mail = $username = $password = $confirm_password = "";
$e_mail_err = $username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate email 
    if (empty(trim($_POST["e_mail"]))) {
        $e_mail_err = "Please enter an e-mail.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_e_mail);

            // Set parameters
            $param_e_mail = trim($_POST["e_mail"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $e_mail_err = "This e-mail is already taken.";
                } else {
                    $e_mail = trim($_POST["e_mail"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate username 
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($e_mail_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_e_mail);

            // Set parameters
            $param_e_mail = $e_mail;
            $param_username = $username;
            // Minimum argon2id hash options
            $hash_options = [
                'memory_cost' => 39 * 1024, //39 MB = 37 MiB
                'time_cost' => 1,
                'threads' => 1,
            ];
            $param_password = password_hash($password, PASSWORD_ARGON2ID, $hash_options); // Creates a password hash

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page
                header("location: ./login.php");
            } else {
                exit("Oops! Something went wrong. Please try again later.");
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php require_once("../php/bootstrap.php"); ?>
    <title>Sign Up</title>
</head>

<body>
    <div class="p-3" style="max-width: max-content">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="e_mail" class="form-control <?php echo (!empty($e_mail_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $e_mail; ?>">
                <span class="invalid-feedback"><?php echo $e_mail_err; ?></span>
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="passwordInput" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">

                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" id="confirmPasswordInput" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group p-1">
                <label for="showPassword" class="form-check-label">Show password</label>
                <input id="showPassword" class="form-check-input" type="checkbox">
            </div>
            <div class="form-group p-1">
                <input class="btn btn-success" type="submit" name="submit" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a class="button" href="./login.php">Login here</a>.</p>
        </form>
    </div>
    <script>
        const showPasswordBtn = document.getElementById("showPassword");
        showPasswordBtn.addEventListener("click", showPassword)

        function showPassword() {
            var passwordInputEl = document.getElementById("passwordInput");
            var confirmPasswordInputEl = document.getElementById("confirmPasswordInput");
            if (passwordInputEl.type === "password") {
                passwordInputEl.type = "text";
                confirmPasswordInputEl.type = "text";
            } else {
                passwordInputEl.type = "password";
                confirmPasswordInputEl.type = "password";
            }
        }
    </script>
</body>

</html>