<?php
include 'db.php';

// Get form data
$productId = $_POST['productId'];
$quantity = $_POST['quantity'];

// Fetch current stock
$query = "SELECT stocks FROM products WHERE id = $productId";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$currentStocks = $row['stocks'];

// Check if there are enough stocks
if ($currentStocks >= $quantity) {
    // Update stock
    $newStocks = $currentStocks - $quantity;
    $updateQuery = "UPDATE products SET stocks = $newStocks WHERE id = $productId";
    mysqli_query($conn, $updateQuery);

    // Return success response
    echo json_encode(['success' => true]);
} else {
    // Return error response
    echo json_encode(['success' => false, 'message' => 'Not enough stocks available.']);
}
?>