<?php
include 'php/db.php';
session_start();

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $error = "Both fields are required!";
    } else {
        $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['otp'] = (100000);
                $_SESSION['username'] = $username;
                header("Location: verify_otp.php");
                exit();
            } else {
                $error = "Invalid login credentials!";
            }
        } else {
            $error = "Invalid login credentials!";
        }
        $stmt->close();
    }
}

include 'login_form.html';
?>
