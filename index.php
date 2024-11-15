<?php
session_start();

// Dummy valid users for authentication
$validUsers = [
    ["email" => "user1@email.com", "password" => "pass123"],
    ["email" => "user2@email.com", "password" => "pass123"],
    ["email" => "user3@email.com", "password" => "pass123"],
    ["email" => "user4@email.com", "password" => "pass123"],
    ["email" => "user5@email.com", "password" => "pass123"]
];

// Variable to hold error messages
$loginError = "";
$emailError = "";
$passwordError = "";

// If user is already logged in, redirect them to the dashboard
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
            if ($user['email'] === $emailInput && $user['password'] === $passwordInput) {
                $_SESSION['user'] = $emailInput; // Store user in session
                header("Location: dashboard.php"); // Redirect to dashboard
                exit();
            }
        }
        // If user not found, set error message
        $loginError = "<span><li>Invalid email.</li></span><div></div><span><li>Invalid password.</li></span>";
    }
}

?>

<!DOCTYPE html>
<html lang="en" >
<!-- data-bs-theme="dark" -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container-fluid">
    <div class="pt-5 position-absolute top-0 start-50 translate-middle-x">
        <div class="" style="width: 300px;">
        <?php if ($loginError || $emailError || $passwordError): ?>
            <div id="loginError" class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php
                // Display the error messages
                echo "<h5><b>System Errors</b></h5>";
                echo $emailError ? $emailError . "" : "";
                echo $passwordError ? $passwordError . "" : "";
                echo $loginError;
                
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- Login form -->
        <form method="POST" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
