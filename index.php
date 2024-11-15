<?php
include("function.php");
$title = "Login";
include "header.php";
include "footer.php";

$loginError = "";
$emailError = "";
$passwordError = "";

if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailInput = $_POST['email'];
    $passwordInput = $_POST['password'];

    // Validate email and password
    if (empty($emailInput)) {
        $emailError = "<span><li>Email is required.</li></span>";
    }

    if (empty($passwordInput)) {
        $passwordError = "<span><li>Password is required.</li></span>";
    }

    // Check for valid login only if no input errors
    if (empty($emailError) && empty($passwordError)) {
        $userFound = false;
        foreach ($validUsers as $user) {
            // Check if email matches and if the password is correct using password_verify
            if ($user['email'] === $emailInput && password_verify($passwordInput, $user['password'])) {
                $_SESSION['user'] = $emailInput; // Store user in session
                header("Location: dashboard.php"); // Redirect to dashboard
                exit(); // Exit after redirect
            }
        }
        // If user not found or incorrect password, set error message
        $loginError = "<span><li>Invalid email.</li></span><div></div><span><li>Invalid password.</li></span>";
    }
}
?>
<div class="container">
    <div class="pt-5 position-absolute top-0 start-50 translate-middle-x">

        <div>
            <?php if ($loginError || $emailError || $passwordError): ?>
                <div id="loginError" class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h5><b>System Errors</b></h5>
                    <?php
                    echo $emailError ? $emailError : "";
                    echo $passwordError ? $passwordError : "";
                    echo $loginError;
                    ?>
                    <!-- Close button to dismiss the alert -->
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                        onclick="closeAlert()"></button>
                </div>
            <?php endif; ?>

            <script>
                function closeAlert() {
                    document.getElementById('loginError').classList.remove('show');
                    document.getElementById('loginError').style.display = 'none';
                }
            </script>
        </div>
        <div class="card " style="width: 300px;">
            <form method="POST">

                <div class="pt-2 ps-3">
                    <div>
                        <h3>Login</h3>
                    </div>

                </div>
                <div>
                    <hr>
                </div>
                <div class="ps-3 pe-3">

                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                    </div>

                    <div class="mb-3 pt-3">
                        <button type="submit" class="btn btn-primary w-100" name="submit">Login</button>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>