<?php
// Adminphp.php

// Database connection
$host = "localhost";
$username = "root";
$password = "";
$dbname = "clothing-store";

$con = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the "Delete" button is clicked
if (isset($_POST['delete_user'])) {
    $user_id = $_POST['delete_user'];

    // Perform the delete operation
    $delete_query = "DELETE FROM users WHERE id = $user_id";
    $result = mysqli_query($con, $delete_query);

    if ($result) {
        echo "User with ID $user_id deleted successfully.";
    } else {
        echo "Error deleting user: " . mysqli_error($con);
    }
}

// Fetch all users from the database
$query = "SELECT * FROM users WHERE type_users != 'admin'";
$result = mysqli_query($con, $query);

// Check if there are any users
if (mysqli_num_rows($result) > 0) {
    // Display users in a table
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['username']}</td>
                <td>{$row['email']}</td>
                <td>{$row['street']}</td>
                <td>{$row['city']}</td>
                <td>
                  <form action='Adminphp.php' method='POST'>
                    <button type='submit' name='delete_user' value='{$row['id']}' class='btn btn-danger'>Delete</button>
                  </form>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No users found.";
}

// Close the database connection
mysqli_close($con);
?>
