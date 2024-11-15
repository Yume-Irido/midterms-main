<?php
    session_start();
    session_unset();
    session_destroy();
    
    // Redirect to login page (index.php)
    header("Location: index.php");
    exit();

?>