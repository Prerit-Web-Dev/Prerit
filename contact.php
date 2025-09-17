<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Data ko sanitize karna
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $phone = htmlspecialchars(strip_tags(trim($_POST['phone'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // Validation
    if (empty($name) || empty($email) || empty($message)) {
        echo "Sabhi fields ko bharna zaroori hai.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email address valid nahi hai.";
        exit;
    }

    // Email setup
    $to = "mudgalprerit@gmail.com";
    $subject = "Contact Form Submission from $name";
    $body = "Name: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
    $headers = "From: $email";

    // Email bhejna
    if (mail($to, $subject, $body, $headers)) {
        echo "Email bhej diya gaya hai.";
    } else {
        echo "Email bhejne mein samasya aayi.";
    }
}
?><?php
// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize user input to prevent XSS attacks
    // htmlspecialchars converts special characters to HTML entities
    // strip_tags removes HTML and PHP tags
    // trim removes whitespace from the beginning and end
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $phone = htmlspecialchars(strip_tags(trim($_POST['phone'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // --- Validation ---
    // Check if required fields are empty
    if (empty($name) || empty($email) || empty($message)) {
        echo "Sabhi fields ko bharna zaroori hai."; // "All fields are required."
        exit;
    }

    // Validate the email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email address valid nahi hai."; // "Email address is not valid."
        exit;
    }

    // --- Email Setup ---
    // Recipient's email address
    $to = "mudgalprerit@gmail.com";
    
    // Email subject
    $subject = "Contact Form Submission from $name";
    
    // Email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n\n";
    $body .= "Message:\n$message";
    
    // Email headers
    $headers = "From: " . $email;

    // --- Send Email ---
    // Use the mail() function to send the email
    if (mail($to, $subject, $body, aheaders))
     {
        // Success message
        echo "Email bhej diya gaya hai."; // "Email has been sent."
    } else {
        // Failure message
        echo "Email bhejne mein samasya aayi."; // "There was a problem sending the email."
    }
} else {
    // If the form was not submitted via POST, show an error
    echo "Invalid request method.";
}
?>