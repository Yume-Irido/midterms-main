<?php
session_start();
$title = "Dashboard";
include("header.php");
include "footer.php";

// Check if the user is logged in
if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["logout"])) {
        include("logout.php");
    } elseif (isset($_POST["register_subject"])) {
        header("Location: add_subject.php"); // Redirect to the Add Subject page
        exit();
    } elseif (isset($_POST["register_student"])) {
        header("Location: student.php"); // Redirect to the Register Student page
        exit();
    }
}
?>

<div class="container-fluid pt-4">
    <div class="container d-flex justify-content-center align-items-center vh-50">
        <div class="w-100 text-left col">
            <div class="row mb-3">
                <div class="col">
                    <h4>Welcome to the System: <?php echo $_SESSION['user']; ?></h4>
                </div>
                <div class="col-1">
                    <form method="POST">
                        <button type="submit" class="btn btn-danger" name="logout">Logout</button>
                    </form>
                </div>
            </div>
            <!-- Grid Layout for Cards -->
            <div class="row">
                <!-- Add a Subject -->
                <div class="col-md-5 w-50">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="text-center">
                                <h5 class="card-title">Add a Subject</h5>
                            </div>
                            <div><hr></div>
                            <div>
                                <p>This section allows you to add a new subject in the system.
                                    Click the button below to proceed with the adding process.</p>
                            </div>
                            <div>
                                <form method="POST">
                                    <button class="btn btn-primary w-100" name="register_subject">Add Subject</button>
                                </form>
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
                            <div><hr></div>
                            <div>
                                <p>This section allows you to register a new student in the system.
                                    Click the button below to proceed with the registration process.</p>
                            </div>
                            <div>
                                <form method="POST">
                                    <button class="btn btn-primary w-100" name="register_student">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
