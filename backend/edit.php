// edit.php

<?php
require './../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($db_connect, "SELECT * FROM products WHERE id = $id");
    $product = mysqli_fetch_assoc($result);

    // Display a form for editing
} else if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Handle the form submission to update the product in the database
    $id = $_POST['id'];
    $newName = $_POST['name'];
    $newPrice = $_POST['price'];

    // Update the product in the database
    $updateQuery = "UPDATE products SET name = '$newName', price = '$newPrice' WHERE id = $id";
    mysqli_query($db_connect, $updateQuery);

    // Redirect to the product list page after editing
    header("Location: index.php");
} else {
    // Handle invalid requests
    echo "Invalid Request";
}
?>
