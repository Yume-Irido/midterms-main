<?php
    include("function.php");
?>

<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php 
        include "header.php";
    ?>
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

    <?php 
        include "footer.php";
    ?>
</body>

</html>
