<?php
session_start();
$username ="root";
$pass ="";
$db="localhost";
$dbn="clothing-store";
$database= new PDO("mysql:host=localhost; dbname=clothing-store",$username,$pass);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/detailes.css">
    <title>My Account</title>
    <style>

        .box {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .stat {
            margin-bottom: 20px;
        }

        .stat p {
            margin: 0;
            padding: 5px 0;
        }

        .stat strong {
            color: #3498DB;
        }

        .action-button {
            text-align: center;
        }

        button {
            background-color: #2ECC71;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #27AE60;
        }

    </style>


    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        header {
            background-color: #008CBA;
            color: #fff;
            text-align: center;
            padding: 1em;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            background-color: #333;
            overflow: hidden;
        }

        nav li {
            margin-right: 20px;
            float: left;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 1.2em;
            display: block;
            padding: 14px 16px;
        }

        nav a:hover {
            background-color: #ddd;
            color: #333;
        }

        .content-section {
            display: none;
            background-color: #fff;
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
            max-width: 300px;
            margin: auto;
        }

        label {
            margin-bottom: 8px;
            color: #555;
        }

        input {
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background-color: #008CBA;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #006688;
        }
    </style>
</head>
<body>
<header>
    <h1>My Account</h1>
</header>

<nav>
    <ul>
        <li><a href="home_page.php">Home</a></li>
        <li><a href="#dashboard" onclick="showSection('dashboard')">Dashboard</a></li>
        <li><a href="#orders" onclick="showSection('orders')">Orders</a></li>
        <li><a href="#update-profile" onclick="showSection('update-profile')">Update Profile</a></li>
        <li><a href="#my-address" onclick="showSection('my-address')">My Address</a></li>
        <li><a href="#change-password" onclick="showSection('change-password')">Change Password</a></li>
        <li><a href="#logout" onclick="showSection('logout')">Logout</a></li>
    </ul>
</nav>

<section id="dashboard" class="content-section">
    <div class="box">
        <h2>Dashboard</h2>

        <!-- Improved layout using divs -->
        <div class="stat">
            <p><strong>Stat 1:</strong></p>
            <p>Data 1</p>
        </div>
        <div class="stat">
            <p><strong>Stat 2:</strong></p>
            <p>Data 2</p>
        </div>

        <!-- Example button for some action in the dashboard -->
        <div class="action-button">
            <button type="button" onclick="performDashboardAction()">Do Something</button>
        </div>
    </div>

</section>


<section id="orders" class="content-section">
    <div class="box">
        <h2>Orders</h2>

        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; border-spacing: 0;">

                <!-- Table header -->
                <tr style="background-color: #3498DB; color: #fff;">
                    <th style="padding: 12px; text-align: left;">Order ID</th>
                    <th style="padding: 12px; text-align: left;">Product</th>
                    <th style="padding: 12px; text-align: left;">Quantity</th>
                    <th style="padding: 12px; text-align: left;">Total</th>
                </tr>

                <!-- Sample order entries (replace with dynamic data) -->
                <tr>
                    <td style="padding: 8px;">1</td>
                    <td style="padding: 8px;">Product A</td>
                    <td style="padding: 8px;">2</td>
                    <td style="padding: 8px;">$50.00</td>
                </tr>
                <tr>
                    <td style="padding: 8px;">2</td>
                    <td style="padding: 8px;">Product B</td>
                    <td style="padding: 8px;">1</td>
                    <td style="padding: 8px;">$30.00</td>
                </tr>
                <!-- Add more rows for additional orders -->

                <!-- Example button for some action related to orders -->
                <tr>
                    <td colspan="4" style="text-align: center; padding: 12px;">
                        <button type="button" onclick="viewOrderDetails()" style="background-color: #2ECC71; color: #fff; padding: 10px; border: none; border-radius: 4px; cursor: pointer;">View Order Details</button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>


<section id="update-profile" class="content-section">
    <div class="container">
        <h2>Update Profile</h2>
        <form method="post" action="update_profile.php">
            <!-- Add your form fields here -->
            <label for="old-username">Old Username:</label>
            <input type="text" id="old-username" name="old_username" placeholder="Enter your old username" required>

            <label for="old-email">Old Email:</label>
            <input type="email" id="old-email" name="old_email" placeholder="Enter your old email" required>

            <label for="new-username">New Username:</label>
            <input type="text" id="new-username" name="new_username" placeholder="Enter your new username" required>

            <label for="new-email">New Email:</label>
            <input type="email" id="new-email" name="new_email" placeholder="Enter your new email" required>

            <button type="submit">Update Profile</button>
        </form>
    </div>
</section>


<section id="my-address" class="content-section">
    <div class="box">
        <h2>My Address</h2>
        <div style="text-align: center;">
            <form style="max-width: 400px; margin: auto;">
                <label for="street" style="display: block; margin-bottom: 10px; color: #555;">Street:</label>
                <input type="text" id="street" name="street" style="width: 100%; padding: 10px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px;">

                <label for="city" style="display: block; margin-bottom: 10px; color: #555;">City:</label>
                <input type="text" id="city" name="city" style="width: 100%; padding: 10px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px;">

                <label for="zip-code" style="display: block; margin-bottom: 10px; color: #555;">Zip Code:</label>
                <input type="text" id="zip-code" name="zip-code" style="width: 100%; padding: 10px; margin-bottom: 16px; border: 1px solid #ccc; border-radius: 4px;">

                <button type="button" onclick="updateAddress()" style="background-color: #2ECC71; color: #fff; padding: 10px; border: none; border-radius: 4px; cursor: pointer;">Update Address</button>
            </form>
        </div>
        <p id="address-message" style="text-align: center; color: #2ECC71; margin-top: 10px;"></p>
    </div>
</section>

<section id="change-password" class="content-section">
    <div class="box">
        <h2>Change Password</h2>
        <table>
            <tr>
                <td><label for="old-email">email:</label></td>
                <td><input type="email" id="old-email" name="old-email" required></td>
            </tr>
            <tr>
                <td><label for="current-password">Current Password:</label></td>
                <td><input type="password" id="current-password" name="current-password" required></td>
            </tr>
            <tr>
                <td><label for="new-password">New Password:</label></td>
                <td><input type="password" id="new-password" name="new-password" required></td>
                <td><span class="password-toggle" onclick="togglePasswordVisibility('new-password')">
                    <img src="../img/show-password.png" alt="Toggle Password" width="20" height="20">
                </span></td>
            </tr>
            <tr>
                <td><label for="confirm-password">Confirm New Password:</label></td>
                <td><input type="password" id="confirm-password" name="confirm-password" required></td>
                <td><span class="password-toggle" onclick="togglePasswordVisibility('confirm-password')">
                    <img src="../img/show-password.png" alt="Toggle Password" width="20" height="20">
                </span></td>
            </tr>
            <tr>
                <td colspan="3"><button type="button" onclick="handleChangePassword()">Change Password</button></td>
            </tr>
        </table>
        <p id="error-message"></p>
    </div>
</section>


<section id="logout" class="content-section">
    <div class="box">
        <h2>Logout</h2>
        <div style="text-align: center; padding: 20px;">
            <p>Are you sure you want to logout?</p>
            <a href="../a.html"> <button type="button" onclick="performLogout()" style="background-color: #E74C3C; color: #fff; padding: 10px; border: none; border-radius: 4px; cursor: pointer;">Logout</button></a>
        </div>
    </div>
</section>


<script src="../js/myaccount.js"></script>

<script>
    function togglePasswordVisibility(inputId) {
        const passwordInput = document.getElementById(inputId);
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    }

    function showSection(sectionId) {
        // Hide all sections
        const sections = document.querySelectorAll('.content-section');
        sections.forEach(section => {
            section.style.display = 'none';
        });

        // Show the selected section
        const selectedSection = document.getElementById(sectionId);
        selectedSection.style.display = 'block';
    }
</script>
</body>
</html>
