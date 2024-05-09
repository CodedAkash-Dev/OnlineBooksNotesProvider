<?php
include 'php/db.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstName = $_POST['firstName'] ?? '';
    $lastName = $_POST['lastName'] ?? '';
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($email) || empty($password) || empty($firstName) || empty($lastName) || empty($phone)) {
        $error = "All fields are required!";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, username, email, phone, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $firstName, $lastName, $username, $email, $phone, $hashedPassword);
        if ($stmt->execute()) {
            header("Location: user.php");
            exit();
        } else {
            $error = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

include 'register_form.html';
?>
