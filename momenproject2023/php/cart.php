<?php
session_start();
$username = "root";
$pass = "";
$db = "localhost";
$dbn = "clothing-store";
$database = new PDO("mysql:host=localhost; dbname=clothing-store", $username, $pass);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cart</title>

    <link rel="stylesheet" href="../css/cart.css" />

    <style>
        /* في ملفك ../css/cart.css */

        .pay-button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 10px;
        }

        .pay-button:hover {
            background-color: #45a049;
        }

        /* Add your existing CSS styles */

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        thead th {
            background-color: #ccc;
            padding: 10px;
        }

        tbody td {
            padding: 10px;
            text-align: center;
        }

        .remove {
            background-color: red;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        .remove:hover {
            background-color: darkred;
        }

        table img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 5px;
        }

        tbody td#name {
            font-weight: bold;
        }

        tbody td#price {
            color: green;
        }

        tbody td#quantity {
            color: blue;
        }
    </style>
</head>

<body>
<header class="header">
    <div class="header__top">
        <nav class="nav container">
            <a href="../index.html" class="nav__logo">
                <!-- Add your logo or text for the home link -->
            </a>

            <div class="nav__menu" id="nav-menu">
                <!-- Your navigation menu goes here -->
            </div>

            <div class="header__user-actions">
                <!-- Your user actions go here -->
            </div>
            <a href="home_page.php">Home</a>
        </nav>
    </div>
</header>

<table>
    <thead>
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Remove</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["removeProductId"])) {
            $removeProductId = $_POST["removeProductId"];

            $stmt = $database->prepare("DELETE FROM cart WHERE id = :id");
            $stmt->bindParam(':id', $removeProductId);
            $stmt->execute();
        }
    }

    $stmt = $database->prepare("SELECT * FROM cart");
    $stmt->execute();
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($cartItems as $item) {
        ?>
        <tr>
            <td><img src="../img/<?php echo $item['image']; ?>" alt="Product image"></td>
            <td><?php echo $item['name']; ?></td>
            <td>$<?php echo $item['price']; ?></td>
            <td><?php echo $item['quantity']; ?></td>
            <td>
                <form method="post">
                    <input type="hidden" name="removeProductId" value="<?php echo $item['id']; ?>">
                    <button type="submit" class="remove">Remove</button>
                </form>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
    <tbody>

    </tbody>
    <tfoot>
    <tr>
        <td colspan="5">
            <a href="../pay.html" class="pay-button">Proceed to Payment</a>
        </td>
    </tr>
    </tfoot>
</table>

</table>

</body>

</html>
