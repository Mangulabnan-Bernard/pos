<?php
// Include the database connection
include 'db.php';

// Check if product id is passed via URL
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']); // Sanitize input by converting to an integer
    // Fetch product details from the database
    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($conn, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "Product not found.";
        exit;
    }
} else {
    echo "No product specified.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order - <?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/order.css">
    <script>
        // Function to show the modal with order details
        function showOrderConfirmation(total) {
            const modal = document.getElementById('orderModal');
            const totalElement = document.getElementById('totalAmount');
            totalElement.innerText = 'Total: $' + total;
            modal.style.display = 'flex';
        }

        // Function to handle the order confirmation (Proceed or Cancel)
        function handleOrder(action) {
            const modal = document.getElementById('orderModal');
            if (action === 'proceed') {
                alert('Order Proceeding to Payment...');
                // Here you can implement the payment integration
                modal.style.display = 'none';
            } else {
                alert('Order Cancelled');
                modal.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <?php include 'topnav.php'; ?>
    <div class="order-container">
        <h1>Order <?php echo htmlspecialchars($product['name']); ?></h1>
        <div class="product-details">
            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-image">
            <h3><?php echo htmlspecialchars($product['name']); ?></h3>
            <p class="price">Price: $<?php echo htmlspecialchars($product['price']); ?></p>
            <p class="stock">Available Stock: <?php echo htmlspecialchars($product['stocks']); ?></p>
        </div>
        <form action="order.php?id=<?php echo $product['id']; ?>" method="POST" onsubmit="event.preventDefault(); showOrderConfirmation(<?php echo $product['price']; ?> * document.getElementById('quantity').value)">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" min="1" max="<?php echo $product['stocks']; ?>" required>
            <button type="submit">Place Order</button>
        </form>
        <?php
        // Handle the form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $quantity = intval($_POST['quantity']);
            if ($quantity < 1 || $quantity > $product['stocks']) {
                echo "<p class='error'>Invalid quantity selected.</p>";
            } else {
                // Calculate total price
                $total = $product['price'] * $quantity;
                // Insert the order into the orders table
                $order_query = "INSERT INTO orders (product_name, quantity, price, total) VALUES ('" . 
                    mysqli_real_escape_string($conn, $product['name']) . "', $quantity, " . 
                    $product['price'] . ", " . $total . ")";
                if (mysqli_query($conn, $order_query)) {
                    echo "<p class='success'>Order placed successfully!</p>";
                } else {
                    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                }
            }
        }
        ?>

        <!-- Modal for Order Confirmation -->
        <div id="orderModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="document.getElementById('orderModal').style.display='none'">&times;</span>
                <h2>Confirm Your Order</h2>
                <p id="totalAmount"></p>
                <h3>Select Payment Method</h3>
                <select id="paymentMethod" name="paymentMethod" class="payment-dropdown">
                    <option value="gcash">GCash</option>
                    <option value="creditCard">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="bankTransfer">Bank Transfer</option>
                    <option value="cod">Cash on Delivery</option>
                    <option value="debitCard">Debit Card</option>
                    <option value="bitcoin">Bitcoin</option>
                    <option value="stripe">Stripe</option>
                </select>
                <div class="modal-actions">
                    <button class="cancel-btn" onclick="handleOrder('cancel')">Cancel</button>
                    <button class="proceed-btn" onclick="handleOrder('proceed')">Proceed</button>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal Styling -->
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .order-container {
            max-width: 800px;
            margin: 80px auto 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        .product-details {
            margin: 2rem auto;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .product-image {
            width: 300px;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .product-details h3 {
            font-size: 1.5rem;
            color: #28a745;
            margin-bottom: 10px;
        }

        .product-details .price {
            font-size: 1.2rem;
            color: #333;
            font-weight: bold;
        }

        .product-details .stock {
            font-size: 1rem;
            color: #666;
        }

        form {
            margin-top: 2rem;
        }

        label {
            font-size: 1.1rem;
            color: #333;
        }

        input[type="number"] {
            padding: 0.5rem;
            font-size: 1rem;
            width: 80px;
            margin: 0 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 0.5rem 1.5rem;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        .error {
            color: red;
            text-align: center;
            margin-top: 1rem;
        }

        .success {
            color: green;
            text-align: center;
            margin-top: 1rem;
        }

        /* Modal Styling */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 30px;
            border: 1px solid #ddd;
            width: 60%;
            max-width: 500px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
        }

        h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .payment-dropdown {
            font-size: 1.1rem;
            padding: 0.5rem;
            width: 80%;
            margin: 1rem auto;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .modal-actions {
            margin-top: 20px;
        }

        .cancel-btn,
        .proceed-btn {
            padding: 10px 20px;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px;
        }

        .cancel-btn {
            background-color: #dc3545;
            color: #fff;
        }

        .cancel-btn:hover {
            background-color: #c82333;
        }

        .proceed-btn {
            background-color: #28a745;
            color: #fff;
        }

        .proceed-btn:hover {
            background-color: #218838;
        }
    </style>
</body>
</html>
