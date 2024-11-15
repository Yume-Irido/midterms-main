<?php
// Start the session at the very beginning of the file
session_start();
// If the session doesn't contain a user, redirect to the login page
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit(); // Make sure no code runs after the redirect
}

// Handle logout functionality
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Unset session variables and destroy the session
    session_unset();
    session_destroy();
    
    // Redirect to login page (index.php)
    header("Location: index.php");
    exit(); // Make sure no code runs after the redirect
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard
        <?php
        // Display the user's email from session in the title
        if (isset($_SESSION['user'])) {
            echo " - " . $_SESSION['user'];
        }
        ?>
    </title>
    <?php include "header.php"; ?>
</head>

<body>
    <div class="container">
        <div class="row col-md-12">
            <h1>Welcome to your dashboard!</h1>

            <!-- Logout Form -->
            <form method="POST">
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>
