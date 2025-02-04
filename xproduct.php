<?php
// Include the database connection
include 'db.php';

// Query to get all products from the table
$query = "SELECT id, name, description, price, image, stocks FROM products";
$result = mysqli_query($conn, $query);

// Check for query error
if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birkenstock - Products</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
            padding: 0px;
            margin-top: 55px; /* Adjust the value as needed */
        }
        /* Product Grid Layout */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        .product-card {
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-10px);
        }
        .product-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .product-card img:hover {
            transform: scale(1.1);
        }
        .product-card h3 {
            font-size: 1.2rem;
            margin: 1rem 0 0.5rem;
            color: #333;
        }
        .product-card p {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1rem;
        }
        .product-card .price {
            font-size: 1.1rem;
            font-weight: bold;
            color: #d4af37; /* Metallic Gold */
            margin-bottom: 1rem;
        }
        .product-card .actions {
            display: flex;
            justify-content: center;
            gap: 1rem;
        }
        .product-card .actions button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }
        .product-card .actions .buy-btn {
            background-color: #28a745;
            color: #fff;
        }
        .product-card .actions .view-btn {
            background-color: #007bff;
            color: #fff;
        }
        .product-card .actions button:hover {
            opacity: 0.9;
        }
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            text-align: center;
        }
        .modal-content h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .modal-content label {
            font-weight: bold;
            margin-bottom: 0.5rem;
            display: block;
        }
        .modal-content input,
        .modal-content select {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .modal-content button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }
        .modal-content .submit-btn {
            background-color: #28a745;
            color: #fff;
        }
        .modal-content .close-btn {
            background-color: #dc3545;
            color: #fff;
        }
        .modal-content button:hover {
            opacity: 0.9;
        }
        /* Image Enlargement Modal */
        .image-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            justify-content: center;
            align-items: center;
        }
        .image-modal img {
            max-width: 90%;
            max-height: 80%;
            border-radius: 10px;
        }
        .image-modal span {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 2rem;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <!-- Include Navigation -->
    <nav class="navbar">
    <div class="logo">Birdenstock</div>
    <ul class="nav-links">
        <li><a href="login.php">Home</a></li>
        <li><a href="login.php">Guide</a></li>
        <li><a href="login.php">Products</a></li>
        <li><a href="login.php">Items</a></li>
        <li><a href="login.php">Contact</a></li>
        <li><a href="#" onclick="openLogoutModal()" class="logout-btn">Logout</a></li>
    </ul>
</nav>
    <!-- Product Grid -->
    <div class="product-grid">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="product-card">
                <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>" onclick="openImageModal('<?php echo $row['image']; ?>')">
                <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
                <p class="price">$<?php echo htmlspecialchars($row['price']); ?></p>
                <p>Stocks: <?php echo htmlspecialchars($row['stocks']); ?></p>
                <div class="actions">
                <button class="buy-btn" 
    onclick="window.location.href='login.php?id=<?php echo $row['id']; ?>&name=<?php echo urlencode($row['name']); ?>&price=<?php echo $row['price']; ?>&stocks=<?php echo $row['stocks']; ?>'">
    Buy
</button>
<button class="view-btn" onclick="openImageModal('<?php echo $row['image']; ?>')">View</button>
</div>
            </div>
        <?php } ?>
    </div>
    <!-- Buy Modal -->
    <div id="buyModal" class="modal">
        <div class="modal-content">
            <h3>Buy Product</h3>
            <form id="purchaseForm">
                <input type="hidden" id="productId" name="productId">
                <label for="productName">Product Name:</label>
                <input type="text" id="productName" readonly>
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" value="1" required>
                <label for="totalPrice">Total Price:</label>
                <input type="text" id="totalPrice" readonly>
                <label for="paymentMethod">Payment Method:</label>
                <select id="paymentMethod" name="paymentMethod">
                    <option value="gcash">GCash</option>
                    <option value="paypal">PayPal</option>
                    <option value="credit">Credit Card</option>
                    <option value="bank">Bank Transfer</option>
                    <option value="applepay">Apple Pay</option>
                    <option value="googlepay">Google Pay</option>
                    <option value="venmo">Venmo</option>
                    <option value="cryptocurrency">Cryptocurrency</option>
                </select>
                <button type="button" class="submit-btn" onclick="confirmPurchase()">Confirm Purchase</button>
                <button type="button" class="close-btn" onclick="closeBuyModal()">Close</button>
            </form>
        </div>
    </div>
    <!-- Image Enlargement Modal -->
    <div id="imageModal" class="image-modal">
        <span onclick="closeImageModal()">&times;</span>
        <img id="enlargedImage" src="" alt="Enlarged Product Image">
    </div>
    <!-- JavaScript for Modals -->
    <script>
        // Open Buy Modal
        function openBuyModal(id, name, price, stocks) {
            const modal = document.getElementById('buyModal');
            document.getElementById('productId').value = id;
            document.getElementById('productName').value = name;
            document.getElementById('totalPrice').value = `$${price}`;
            modal.style.display = 'flex';

            // Update total price dynamically based on quantity
            document.getElementById('quantity').addEventListener('input', function () {
                const quantity = this.value;
                const totalPrice = (quantity * parseFloat(price)).toFixed(2);
                document.getElementById('totalPrice').value = `$${totalPrice}`;
            });
        }

        // Close Buy Modal
        function closeBuyModal() {
            document.getElementById('buyModal').style.display = 'none';
        }

        // Open Image Modal
        function openImageModal(imageSrc) {
            const modal = document.getElementById('imageModal');
            document.getElementById('enlargedImage').src = imageSrc;
            modal.style.display = 'flex';
        }

        // Close Image Modal
        function closeImageModal() {
            document.getElementById('imageModal').style.display = 'none';
        }

        // Confirm Purchase
        function confirmPurchase() {
            if (confirm("Are you sure you want to proceed with the purchase?")) {
                const form = document.getElementById('purchaseForm');
                const formData = new FormData(form);

                fetch('process_purchase.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Purchase successful!");
                        window.location.href = "product.php"; // Redirect to product page
                    } else {
                        alert("Purchase failed: " + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        }
    </script>
</body>
</html>