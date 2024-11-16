<?php
session_start();
$validUsers = [
    ["email" => "user1@email.com", "password" => password_hash("pass123", PASSWORD_DEFAULT)],
    ["email" => "user2@email.com", "password" => password_hash("pass123", PASSWORD_DEFAULT)],
    ["email" => "user3@email.com", "password" => password_hash("pass123", PASSWORD_DEFAULT)],
    ["email" => "user4@email.com", "password" => password_hash("pass123", PASSWORD_DEFAULT)],
    ["email" => "user5@email.com", "password" => password_hash("pass123", PASSWORD_DEFAULT)]
];

// Check if the user is already logged in (via session)
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}
?>
