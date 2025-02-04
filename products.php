<?php
// Include the database connection
include 'db.php';
include 'topnav.php';

// Add Product (Create)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stocks = $_POST['stocks'];

    // Handle image upload
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_path = "imgs/" . basename($image_name); // Save the image in 'uploads' directory
    move_uploaded_file($image_tmp, $image_path);

    $query = "INSERT INTO products (name, description, price, stocks, image) VALUES ('$name', '$description', '$price', '$stocks', '$image_path')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Product added successfully.'); window.location.href = 'products.php';</script>";
    } else {
        echo "<script>alert('Error adding product.');</script>";
    }
}

// Edit Product
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit_product'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $stocks = $_POST['stocks'];

    // Handle image upload if new image is provided
    $image_name = $_FILES['image']['name'];
    if ($image_name) {
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = "uploads/" . basename($image_name);
        move_uploaded_file($image_tmp, $image_path);
    } else {
        // Use the old image if no new image is uploaded
        $image_path = $_POST['existing_image'];
    }

    $query = "UPDATE products SET name='$name', description='$description', price='$price', stocks='$stocks', image='$image_path' WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Product updated successfully.'); window.location.href = 'products.php';</script>";
    } else {
        echo "<script>alert('Error updating product.');</script>";
    }
}

// Query to get all products from the table
$query = "SELECT id, name, stocks, price, image, description FROM products";
$result = mysqli_query($conn, $query);

// Check for query error
if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}

// Delete Product (if delete URL is triggered)
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    $query = "DELETE FROM products WHERE id = '$delete_id'";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Product deleted successfully.'); window.location.href = 'products.php';</script>";
    } else {
        echo "<script>alert('Error deleting product.'); window.location.href = 'products.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birkenstock - Manage Products</title>
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
            padding:  0px;    
            margin-top: 55px;
        }
        .add-product-btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 15px;
            margin-left: 1175px;

        }
        .add-product-btn:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        td img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }
        .actions button {
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .actions .view-btn {
            background-color: #007bff;
            color: white;
        }
        .actions .delete-btn {
            background-color: #dc3545;
            color: white;
        }
        .actions button:hover {
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
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
       

        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            margin-top: -120px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            text-align: left;
        }

        .modal-content input, .modal-content textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .modal-content label {
            font-weight: bold;
        }

        .modal-content button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-content button:hover {
            background-color: #218838;
        }

        .close-btn {
            padding: 5px 10px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .close-btn:hover {
            background-color: #c82333;
        }

    </style>
</head>
<body>

<button class="add-product-btn" onclick="openAddModal()">Add Product</button>

<!-- Product Table -->
<table class="product-table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Stocks</th>
            <th>Price</th>
            <th>Image</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch products and display them
        $query = "SELECT * FROM products";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['stocks']}</td>";
                echo "<td>\${$row['price']}</td>";
                echo "<td><img src='{$row['image']}' alt='{$row['name']}' width='50'></td>";
                echo "<td>{$row['description']}</td>";
                echo "<td class='actions'>
                        <button class='view-btn' onclick=\"openEditModal({$row['id']}, '{$row['name']}', '{$row['description']}', '{$row['price']}', '{$row['stocks']}', '{$row['image']}')\">Edit</button>
                        <button class='delete-btn' onclick=\"deleteProduct({$row['id']})\">Delete</button>
                      </td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>

<!-- Modal for Adding Product -->
<div id="addProductModal" class="modal">
    <div class="modal-content">
        <h3>Add Product</h3>
        <form method="POST" enctype="multipart/form-data">
    <label for="name">Product Name:</label>
    <input type="text" name="name" required><br>

    <label for="description">Product Description:</label>
    <textarea name="description" required></textarea><br>

    <label for="price">Price:</label>
    <input type="number" name="price" step="0.01" min="0" required><br>

    <label for="stocks">Stocks:</label>
    <input type="number" name="stocks" min="0" required><br>

    <label for="image">Product Image:</label>
    <input type="file" name="image" accept="image/*"><br>
 

            <button type="submit" name="add_product">Add Product</button>
            <button type="button" class="close-btn" onclick="closeAddModal()">Close</button>
        </form>
    </div>
</div>

<!-- Modal for Editing Product -->
<div id="editProductModal" class="modal">
    <div class="modal-content">
        <h3>Edit Product</h3>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" id="edit_id" name="id">
            <label for="edit_name">Product Name:</label>
            <input type="text" id="edit_name" name="name" required><br><br>

            <label for="edit_description">Product Description:</label>
            <textarea id="edit_description" name="description" required></textarea><br><br>

            <label for="edit_price">Price:</label>
            <input type="number" id="edit_price" name="price" required><br><br>

            <label for="edit_stocks">Stocks:</label>
            <input type="number" id="edit_stocks" name="stocks" required><br><br>

            
            <input type="hidden" id="existing_image" name="existing_image"><br>

            <button type="submit" name="edit_product">Save Changes</button>
            <button type="button" class="close-btn" onclick="closeEditModal()">Close</button>
        </form>
    </div>
</div>

<script>// Open Add Product Modal
function openAddModal() {
    // Show the add product modal
    document.getElementById('addProductModal').style.display = 'flex';
    // Hide the image input in the edit modal (if it was left open by a previous action)
    document.getElementById('edit_image').style.display = 'block'; 
    document.getElementById('add_image').style.display = 'block';
}

// Close Add Product Modal
function closeAddModal() {
    document.getElementById('addProductModal').style.display = 'none';
}

// Open Edit Product Modal
function openEditModal(id, name, description, price, stocks, image) {
    // Show the edit product modal
    document.getElementById('editProductModal').style.display = 'flex';
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_description').value = description;
    document.getElementById('edit_price').value = price;
    document.getElementById('edit_stocks').value = stocks;
    document.getElementById('existing_image').value = image;
    
    // Hide the image upload field in the edit modal
    document.getElementById('edit_image').style.display = 'none';
    document.getElementById('add_image').style.display = 'none';
}

// Close Edit Product Modal
function closeEditModal() {
    document.getElementById('editProductModal').style.display = 'none';
}


// Delete Product
function deleteProduct(id) {
    if (confirm('Are you sure you want to delete this product?')) {
        window.location.href = 'products.php?delete_id=' + id;
    }
}

</script>

</body>
</html>
