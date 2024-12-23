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
    $oldUsername = $_POST["old_username"];
    $oldEmail = $_POST["old_email"];
    $newUsername = $_POST["new_username"];
    $newEmail = $_POST["new_email"];

    $oldUsername = mysqli_real_escape_string($conn, $oldUsername);
    $oldEmail = mysqli_real_escape_string($conn, $oldEmail);
    $newUsername = mysqli_real_escape_string($conn, $newUsername);
    $newEmail = mysqli_real_escape_string($conn, $newEmail);

    $sql = "UPDATE users SET username='$newUsername', email='$newEmail' WHERE username='$oldUsername' AND email='$oldEmail';";

    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

$conn->close();
?>
