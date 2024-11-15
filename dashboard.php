<?php
// include("index.php");
session_start();

// If the session doesn't contain a user, redirect to the login page
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit(); // Make sure no code runs after the redirect
}

// Handle logout functionality
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    include("logout.php");
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
    <div class="container-fluid pt-5">

        <div class="container d-flex justify-content-center align-items-center vh-50">
            <div class="w-100 text-left col">

                <div class="row mb-3">
                    <div class="col">
                        <h4 class="">Welcome to the System: <?php echo $_SESSION['user']; ?></h4>
                    </div>

                    <div class="col-1 ">
                        <form method="POST">
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                    </div>
                </div>
                <!-- Grid Layout for Cards -->
                <div class="row">

                    <div class="col-md-5 w-50">
                        <div class="card mb-4">
                            <div class="card-body">

                                <div class="text-center">
                                    <h5 class="card-title">Add a Subject</h5>
                                </div>

                                <div>
                                    <hr>
                                </div>

                                <div>
                                    <p>This section allows you to add a new subject in the system.
                                        Click
                                        the button below to proceed with the adding process.</p>
                                </div>

                                <div>
                                    <button class="btn btn-primary w-100">Add Subject</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Register a Student -->
                    <div class="col-md-5 w-50">
                        <div class="card mb-4">
                            <div class="card-body">

                                <div class="text-center">
                                    <h5 class="card-title">Register a Student</h5>
                                </div>

                                <div>
                                    <hr>
                                </div>

                                <div>
                                    <p>This section allows you to register a new student in the
                                        system.
                                        Click the button below to proceed with the registration process.</p>
                                </div>

                                <div><button class="btn btn-primary w-100">Register</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <?php include "footer.php"; ?>
</body>

</html>


<!-- <div class="position-absolute top-0 start-50 translate-middle-x">
            <span>
                <h3>Welcome to the System: <?php $emailInput = $_SESSION['user'];
                echo $emailInput; ?> </h3>
            </span> -->

<!-- <span>
            <form method="POST">
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </span> -->