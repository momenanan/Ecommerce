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
    $oldStreet = $_POST["old_street"];
    $oldCity = $_POST["old_city"];
    $newStreet = $_POST["new_street"];
    $newCity = $_POST["new_city"];

    $oldStreet = mysqli_real_escape_string($conn, $oldStreet);
    $oldCity = mysqli_real_escape_string($conn, $oldCity);
    $newStreet = mysqli_real_escape_string($conn, $newStreet);
    $newCity = mysqli_real_escape_string($conn, $newCity);

    $sql = "UPDATE users SET street='$newStreet', city='$newCity' WHERE street='$oldStreet' AND city='$oldCity';";

    if ($conn->query($sql) === TRUE) {
        echo "Address updated successfully";
    } else {
        echo "Error updating address: " . $conn->error;
    }
}

$conn->close();
?>
