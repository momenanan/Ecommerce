<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "clothing-store";

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST['btn_signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $cpassword = $_POST['con_password'];

    // Validate if username or email already exist
    $checkQuery = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo "Username or email already exists.";
    } elseif ($password != $cpassword) {
        echo "Passwords do not match.";
    } else {
        // Insert new user into the database
        $insertQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        $insertResult = $conn->query($insertQuery);

        if ($insertResult) {
            echo "Registration successful";
            // Redirect to the login page after successful registration
            header("Location: ../login.html");
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            echo "Error: " . $insertResult->error;
        }
    }
}

// Close the database connection
$conn->close();
?>
