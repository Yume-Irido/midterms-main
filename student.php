<?php
session_start();

$title = "Register Student";
include("header.php");
include("footer.php");

if (!isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();

}
// Initialize variables for errors and form values
$errors = [];
$studentID = $firstName = $lastName = "";

// Mock database (use a real database in production)
$students = isset($_SESSION['students']) ? $_SESSION['students'] : [];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["dashboard"])) {
        header("Location: dashboard.php");
        exit();
    } else if (isset($_POST["addStudent"])) {
        $studentID = trim($_POST['studentID']);
        $firstName = trim($_POST['firstName']);
        $lastName = trim($_POST['lastName']);

        // Validate fields
        if (empty($studentID)) {
            $errors[] = "Student ID is required";
        } elseif (isset($students[$studentID])) {
            $errors[] = "Student ID is already taken";
        }

        if (empty($firstName)) {
            $errors[] = "First Name is required";
        }

        if (empty($lastName)) {
            $errors[] = "Last Name is required";
        }

        // If no errors, add the student to the session
        if (empty($errors)) {
            $students[$studentID] = ['firstName' => $firstName, 'lastName' => $lastName];
            $_SESSION['students'] = $students; // Store in session

            // Redirect to the same page to refresh the form (if needed)
            header("Location: student.php");
            exit();
        }
    } else if (isset($_POST["edit"])) {
        header("Location: edit.php");
        exit();
    }
    else if (isset($_POST["delete"])) {

    }
    


}

?>

<div class="container mt-5">
    <!-- Breadcrumb with PHP-based Switching -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <form method="POST" style="display:inline;">
                    <button type="submit" name="dashboard" value="goToDashboard"
                        class="btn btn-link p-0">Dashboard</button>
                </form>
            </li>
            <li class="breadcrumb-item active">
                <?php
                echo "Register Student";
                ?>
            </li>
        </ol>
    </nav>

    <!-- Error Alert -->
    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>System Errors</strong>
            <ul class="mb-0">
                <?php foreach ($errors as $error): ?>
                    <li><?= htmlspecialchars($error) ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Register a New Student</h5>
            <form method="POST">
                <div class="mb-3">
                    <label for="studentID" class="form-label">Student ID</label>
                    <input type="number" class="form-control" id="studentID" name="studentID"
                        value="<?= htmlspecialchars($studentID) ?>" placeholder="Enter Student ID">
                </div>
                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName"
                        value="<?= htmlspecialchars($firstName) ?>" placeholder="Enter First Name">
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName"
                        value="<?= htmlspecialchars($lastName) ?>" placeholder="Enter Last Name">
                </div>
                <button type="submit" class="btn btn-primary" name="addStudent">Add Student</button>
            </form>
        </div>
    </div>

    <!-- Student List Table -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Student List</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Student ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($students as $studentID => $student): ?>
                        <tr>
                            <td><?= htmlspecialchars($studentID) ?></td>
                            <td><?= htmlspecialchars($student['firstName']) ?></td>
                            <td><?= htmlspecialchars($student['lastName']) ?></td>
                            <td>
                                
                                <form method="POST" style="display:inline;">
                                    <button type="submit" name="edit" value="edit"
                                        class="btn btn-info btn-sm">Edit</button>
                                </form>
                                <form method="POST" style="display:inline;">
                                    <button type="submit" name="delete" value="delete"
                                        class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                <form method="POST" style="display:inline;">
                                    <button type="submit" name="attachsubject" value="attachSubject"
                                        class="btn btn-warning btn-sm">Attach Subject</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>