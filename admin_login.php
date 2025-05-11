<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['admin_email']);
    $password = trim($_POST['admin_password']);

    // Fixed credentials
    $valid_username = 'admin';
    $valid_password = 'admin123';

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password.'); window.location.href = 'admin_login.html';</script>";
    }
}
?>
