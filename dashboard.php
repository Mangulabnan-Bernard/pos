<?php
// Start session (if needed)
session_start();

// Database connection
$host = 'localhost';
$dbname = 'birdenstock';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Fetch daily sales
$dailySalesQuery = $pdo->query("SELECT SUM(total_amount) AS total_sales FROM sales WHERE DATE(sale_date) = CURDATE()");
$dailySales = $dailySalesQuery->fetch(PDO::FETCH_ASSOC)['total_sales'] ?? 0;

// Fetch inventory count
$inventoryCountQuery = $pdo->query("SELECT COUNT(*) AS total_products FROM products");
$inventoryCount = $inventoryCountQuery->fetch(PDO::FETCH_ASSOC)['total_products'] ?? 0;

// Fetch low stock products
$lowStockQuery = $pdo->query("SELECT name, stock FROM products WHERE stock < 10");
$lowStockProducts = $lowStockQuery->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Birdenstock</title>
  <link rel="stylesheet" href="styles/dash.css">
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar">
    <div class="logo">Birdenstock</div>
    <ul class="nav-links">
      <li><a href="index.html">Home</a></li>
      <li><a href="pos.html">POS</a></li>
      <li><a href="inventory.html">Inventory</a></li>
      <li><a href="reports.html">Reports</a></li>
      <li><a href="settings.html">Settings</a></li>
    </ul>
  </nav>

  <!-- Dashboard Section -->
  <section class="dashboard">
    <h2>Dashboard</h2>
    <div class="stats">
      <div class="stat-card">
        <h3>Daily Sales</h3>
        <p>$<?php echo number_format($dailySales, 2); ?></p>
      </div>
      <div class="stat-card">
        <h3>Total Inventory</h3>
        <p><?php echo $inventoryCount; ?> Products</p>
      </div>
    </div>

    <h3>Low Stock Alerts</h3>
    <div class="low-stock">
      <?php if (!empty($lowStockProducts)): ?>
        <ul>
          <?php foreach ($lowStockProducts as $product): ?>
            <li><?php echo htmlspecialchars($product['name']); ?> - <?php echo $product['stock']; ?> left</li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p>No low stock alerts.</p>
      <?php endif; ?>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <p>&copy; 2023 Birdenstock. All rights reserved.</p>
  </footer>
</body>
</html>