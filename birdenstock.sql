-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2025 at 08:40 PM
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
(4, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 05:18:58'),
(5, 'AI-Powered Analytics', 1, 249.99, 249.99, '2025-02-04 15:57:45'),
(6, 'Leather Clog', 3, 129.99, 389.97, '2025-02-04 16:05:50'),
(7, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:07:03'),
(8, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:07:07'),
(9, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:07:11'),
(10, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:07:15'),
(11, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:09:03'),
(12, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:09:25'),
(13, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:09:50'),
(14, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:10:43'),
(15, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:10:59'),
(16, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:00'),
(17, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:00'),
(18, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:00'),
(19, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:00'),
(20, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:00'),
(21, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:01'),
(22, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:08'),
(23, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:08'),
(24, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:09'),
(25, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:09'),
(26, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:17'),
(27, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:27'),
(28, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:28'),
(29, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:28'),
(30, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:28'),
(31, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:33'),
(32, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:34'),
(33, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:35'),
(34, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:35'),
(35, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:38'),
(36, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:38'),
(37, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:38'),
(38, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:38'),
(39, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:41'),
(40, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:41'),
(41, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:47'),
(42, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:47'),
(43, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:47'),
(44, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:47'),
(45, 'Leather Clog', 2, 129.99, 259.98, '2025-02-04 16:11:49'),
(46, 'Leather Clog', 2, 129.99, 259.98, '2025-02-04 16:11:49'),
(47, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:11:55'),
(48, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:12:17'),
(49, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:12:42'),
(50, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:12:47'),
(51, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:13:13'),
(52, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:13:13'),
(53, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:13:13'),
(54, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:13:13'),
(55, 'Classic Sandal', 1, 79.99, 79.99, '2025-02-04 16:13:18'),
(56, 'Classic Sandal', 1, 79.99, 79.99, '2025-02-04 16:13:33'),
(57, 'Classic Sandal', 1, 79.99, 79.99, '2025-02-04 16:13:41'),
(58, 'Classic Sandal', 1, 79.99, 79.99, '2025-02-04 16:14:52'),
(59, 'Classic Sandal', 1, 79.99, 79.99, '2025-02-04 16:14:53'),
(60, 'Classic Sandal', 1, 79.99, 79.99, '2025-02-04 16:14:53'),
(61, 'Classic Sandal', 1, 79.99, 79.99, '2025-02-04 16:14:53'),
(62, 'Classic Sandal', 1, 79.99, 79.99, '2025-02-04 16:14:53'),
(63, 'Classic Sandal', 1, 79.99, 79.99, '2025-02-04 16:14:53'),
(64, 'Classic Sandal', 1, 79.99, 79.99, '2025-02-04 16:14:54'),
(65, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:14:58'),
(66, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:14:58'),
(67, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:14:58'),
(68, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:14:58'),
(69, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:14:59'),
(70, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:14:59'),
(71, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:15:00'),
(72, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:15:00'),
(73, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:15:14'),
(74, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:15:21'),
(75, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:05'),
(76, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:06'),
(77, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:06'),
(78, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:06'),
(79, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:06'),
(80, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:06'),
(81, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:07'),
(82, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:07'),
(83, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:58'),
(84, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:58'),
(85, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:58'),
(86, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:58'),
(87, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:59'),
(88, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:59'),
(89, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:59'),
(90, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:59'),
(91, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:16:59'),
(92, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:17:08'),
(93, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:17:11'),
(94, 'Leather Clog', 1, 129.99, 129.99, '2025-02-04 16:17:39'),
(95, 'Leather Clog', 2, 129.99, 259.98, '2025-02-04 16:17:49'),
(96, 'Leather Clog', 2, 129.99, 259.98, '2025-02-04 16:17:53'),
(97, 'Leather Clog', 2, 129.99, 259.98, '2025-02-04 16:21:04'),
(98, 'Leather Clog', 2, 129.99, 259.98, '2025-02-04 16:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stocks` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `stocks`, `price`, `image`, `description`) VALUES
(2, 'Leather Clogdsa', 3014, 130.00, 'imgs/2.jpg', 'High-quality leather clogs with a sleek design for casual wear.'),
(3, 'Sport Sandal', 62, 99.99, 'imgs/3.jpg', 'Sporty sandals designed for outdoor activities and comfort.'),
(4, 'Cloud-Based Dashboard', 1003, 200.00, 'imgs/4.jpg', 'Cloud-based dashboard offering real-time data visualization.'),
(5, 'AI-Powered Analytics', 150, 249.99, 'imgs/5.jpg', 'AI-powered analytics tool for in-depth business insights.'),
(6, 'Slip-On Casuals', 80, 69.99, 'imgs/6.jpg', 'Casual slip-ons designed for comfort and ease of wear.'),
(7, 'Outdoor Hiking Boots', 60, 159.99, 'imgs/7.jpg', 'Durable outdoor hiking boots for rugged terrain and long hikes.'),
(9, 'Adjustable Slides', 200, 49.99, 'imgs/9.jpg', 'Adjustable slides designed for ultimate comfort and easy wear.'),
(10, 'Comfortable Mules', 90, 89.99, 'imgs/10.jpg', 'Comfortable mules for both casual and semi-formal occasions.'),
(14, 'ds', 32, 3232.00, 'imgs/3.jpg', 'ds');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'ber', 'ber321');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
