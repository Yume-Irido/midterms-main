<?php
session_start();


$validUsers = [
    ["email" => "user1@email.com", "password" => "pass123"],
    ["email" => "user2@email.com", "password" => "pass123"],
    ["email" => "user3@email.com", "password" => "pass123"],
    ["email" => "user4@email.com", "password" => "pass123"],
    ["email" => "user5@email.com", "password" => "pass123"]
];

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