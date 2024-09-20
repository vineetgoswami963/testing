<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validate input
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
        // Recipient email
        $to = "vineet.goswami963@gmail.com"; // Replace with your email address
        
        // Email subject and headers
        $subject = "New message from $name";
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Email content
        $emailContent = "Name: $name\n";
        $emailContent .= "Email: $email\n";
        $emailContent .= "Message: \n$message\n";

        // Send email
        if (mail($to, $subject, $emailContent, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Sorry, something went wrong. Please try again.";
        }
    } else {
        echo "Invalid input. Please make sure all fields are filled out correctly.";
    }
} else {
    echo "Invalid request method.";
}
?>
