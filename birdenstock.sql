-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2025 at 03:56 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `birdenstock`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_name`, `quantity`, `price`, `total`, `order_date`) VALUES
(1, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 05:11:18'),
(2, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 05:11:22'),
(3, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 05:11:24'),
(4, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 05:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stocks` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `stocks`, `price`, `image`) VALUES
(1, 'Classic Sandal', 50, 79.99, 'https://bratpackstore.com.ph/cdn/shop/files/42861.jpg?v=1715243265&width=1100'),
(2, 'Leather Clog', 30, 129.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQX5cNmdYdzM-sALO5YaUUbh-YQ_J-lrOmtSQ&s'),
(3, 'Sport Sandal', 70, 99.99, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDd0Y7NiFR4dV549puXxMW_p4xX64tLb_tMA&s'),
(4, 'Cloud-Based Dashboard', 100, 199.99, 'https://via.placeholder.com/300'),
(5, 'AI-Powered Analytics', 150, 249.99, 'https://via.placeholder.com/300'),
(6, 'Slip-On Casuals', 80, 69.99, 'https://via.placeholder.com/300'),
(7, 'Outdoor Hiking Boots', 60, 159.99, 'https://via.placeholder.com/300'),
(8, 'Kids Sandal', 120, 39.99, 'https://via.placeholder.com/300'),
(9, 'Adjustable Slides', 200, 49.99, 'https://via.placeholder.com/300'),
(10, 'Comfortable Mules', 90, 89.99, 'https://via.placeholder.com/300');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `sale_date` datetime DEFAULT current_timestamp(),
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `sale_date`, `total_amount`) VALUES
(1, '2025-01-31 22:12:03', 500.00),
(2, '2025-01-31 22:12:03', 300.50),
(3, '2025-01-31 22:12:03', 1000.75);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
