// delete.php

<?php
require './config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the product from the database
    $deleteQuery = "DELETE FROM products WHERE id = $id";
    mysqli_query($db_connect, $deleteQuery);

    // Redirect to the product list page after deletion
    header("Location: index.php");
} else {
    // Handle invalid requests
    echo "Invalid Request";
}
?>
