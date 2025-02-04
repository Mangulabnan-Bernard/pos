<?php
include 'db.php';

// Fetch trending products
$query = "SELECT id, name, description, price, image FROM products ORDER BY RAND() LIMIT 5";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Database query failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Trending Products</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            overflow-x: hidden;
        }
        .hero-section {
            position: relative;
            width: 100%;
            height: 80vh;
            overflow: hidden;
        }
        .hero-slide {
            position: absolute;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        .hero-slide.active {
            opacity: 1;
        }
        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            background: rgba(0, 0, 0, 0.5);
            padding: 2rem;
            border-radius: 10px;
            color: #fff;
        }
        .hero-content h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .hero-content p {
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        .trending-section {
            margin: 3rem auto;
            text-align: center;
            max-width: 1200px;
            position: relative;
        }
        .trending-section h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }
        .floating-images {
            display: flex;
            justify-content: center;
            gap: 2rem;
            position: relative;
        }
        .floating-images img {
            width: 200px;
            border-radius: 10px;
            transition: transform 1s ease-in-out;
            animation: floatAnimation 4s infinite alternate ease-in-out;
        }
        .floating-images img:nth-child(odd) {
            animation-duration: 5s;
        }
        @keyframes floatAnimation {
            from {
                transform: translateY(0px);
            }
            to {
                transform: translateY(-15px);
            }
        }
        .trending-products {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }
        .product-card {
            background: #fff;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s ease-in-out;
            width: 250px;
        }
        .product-card:hover {
            transform: translateY(-10px);
        }
        .product-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }
        .product-card h3 {
            font-size: 1.2rem;
            margin: 1rem 0;
        }
        .product-card p {
            font-size: 0.9rem;
            color: #666;
        }
        .product-card .price {
            font-size: 1.1rem;
            font-weight: bold;
            color: #d4af37;
        }
        .product-card button {
            margin-top: 1rem;
            padding: 0.5rem 1rem;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
        }
        .product-card button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <?php include 'topnav.php'; ?>

    <div class="hero-section">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="hero-slide" style="background-image: url('<?php echo htmlspecialchars($row['image']); ?>');">
                <div class="hero-content">
                    <h1><?php echo htmlspecialchars($row['name']); ?></h1>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <p class="price">$<?php echo htmlspecialchars($row['price']); ?></p>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="trending-section">
        <h2>Trending Products</h2>
        <div class="floating-images">
            <img src="images/trend1.jpg" alt="Trending 1">
            <img src="images/trend2.jpg" alt="Trending 2">
            <img src="images/trend3.jpg" alt="Trending 3">
        </div>
        <div class="trending-products">
            <?php
            mysqli_data_seek($result, 0);
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="product-card">
                    <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                    <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <p class="price">$<?php echo htmlspecialchars($row['price']); ?></p>
                    <button>View Product</button>
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.hero-slide');

        function showSlide(index) {
            slides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        showSlide(currentSlide);
        setInterval(nextSlide, 2000);
    </script>
</body>
</html>
