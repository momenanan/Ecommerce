<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clothing-store";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldEmail = $_POST["old_email"];
    $newPassword = $_POST["new_password"];
    $confirmPassword = $_POST["confirm_password"];

    $oldEmail = mysqli_real_escape_string($conn, $oldEmail);
    $newPassword = mysqli_real_escape_string($conn, $newPassword);

    // Check if the current password matches the one in the database
    $checkPasswordQuery = "SELECT * FROM users WHERE email='$oldEmail'";
    $result = $conn->query($checkPasswordQuery);

    if ($result->num_rows > 0) {
        // Update the password if the current password matches
        $updatePasswordQuery = "UPDATE users SET password='$newPassword' WHERE email='$oldEmail'";

        if ($conn->query($updatePasswordQuery) === TRUE) {
            header("Location:../login.html");        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Incorrect current password";
    }
}

$conn->close();
?>
