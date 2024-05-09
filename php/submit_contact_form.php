<?php
// Function to sanitize input data
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if name, email, and message fields are set and not empty
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
        $name = sanitizeInput($_POST['name']);
        $email = sanitizeInput($_POST['email']);
        $message = sanitizeInput($_POST['message']);

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
        } else {
            // Recipient email
            $to = 'Arsahani4@gmail.com'; // where you want to send the emails
            $subject = 'New Contact Message from Online Notes & Books Provider';
            
            // Prepare the email body text
            $body = "You have received a new message from: $name\n";
            $body .= "Email: $email\n";
            $body .= "Message: $message\n";

            // Headers
            $headers = "From: $email" . "\r\n";
            $headers .= "Reply-To: $email" . "\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();

            // Sending email
            if (mail($to, $subject, $body, $headers)) {
                echo "Message sent successfully.";
            } else {
                echo "Failed to send message.";
            }
        }
    } else {
        echo "All fields are required.";
    }
} else {
    // Not a POST request
    echo "Invalid request.";
}
?>
