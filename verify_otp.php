<?php
session_start();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entered_otp = $_POST['otp'] ?? '';

    if ($entered_otp == $_SESSION['otp']) {
        unset($_SESSION['otp']);
        unset($_SESSION['username']);
        header("Location: index2.php");
        exit();
    } else {
        $error = "Invalid OTP!";
    }
}

include 'verify_otp_form.html';
?>
