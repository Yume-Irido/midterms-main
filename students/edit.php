<?php
session_start();

$title = "Edit Student";
include("header.php");
include("footer.php");

// Sample data for demonstration
// If you have student data, you would store it in the session
if (!isset($_SESSION['student'])) {
    // Prepopulate session data if not already set
    $_SESSION['student'] = [
        'student_id' => $studentID,
        'first_name' => $firstName,
        'last_name' => $lastName,
    ];
}

// Get the current student data from session
$studentID = $_SESSION['student']['student_id'];
$firstName = $_SESSION['student']['first_name'];
$lastName = $_SESSION['student']['last_name'];

// Handle form submission to update student data in session
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        // Update session with the new data from the form
        $_SESSION['student']['first_name'] = htmlspecialchars($_POST['first-name']);
        $_SESSION['student']['last_name'] = htmlspecialchars($_POST['last-name']);
        
        // Optionally, show a success message or redirect
        echo "<p>Student details updated successfully!</p>";
    }

    if (isset($_POST['dashboard'])) {
        header("Location: dashboard.php");
        exit();
    } else if (isset($_POST['student'])) {
        header("Location: student.php");
        exit();
    }
}

?>

<div class="container">
    <h1>Edit Student</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <form method="POST" style="display:inline;">
                    <button type="submit" name="dashboard" value="goToDashboard" class="btn btn-link p-0">Dashboard</button>
                </form>
            </li>
            <li class="breadcrumb-item">
                <form method="POST" style="display:inline;">
                    <button type="submit" name="student" value="goToDashboard" class="btn btn-link p-0">Register Student</button>
                </form>
            </li>
            <li class="breadcrumb-item active">
                Edit Student
            </li>
        </ol>
    </nav>

    <form method="POST">
        <div class="mb-3">
            <label for="student-id" class="form-label">Student ID:</label>
            <input type="text" class="form-control" id="student-id" value="<?php echo htmlspecialchars($studentID); ?>" name="student-id" disabled>
        </div>
        <div class="mb-3">
            <label for="first-name" class="form-label">First Name:</label>
            <input type="text" class="form-control" id="first-name" name="first-name" value="<?php echo htmlspecialchars($firstName); ?>" required>
        </div>
        <div class="mb-3">
            <label for="last-name" class="form-label">Last Name:</label>
            <input type="text" class="form-control" id="last-name" name="last-name" value="<?php echo htmlspecialchars($lastName); ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Update Student</button>
    </form>
</div>
