-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 01:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci COMMENT='products that can be added to cart';

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created`, `modified`) VALUES
(1, 'NaviForce NF9233', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warranty ', 2840, '2024-07-11 16:16:30', '2024-07-11 10:31:30'),
(2, 'NaviForce NF9123', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2900, '2024-07-11 16:16:57', '2024-07-11 10:31:57'),
(3, 'NaviForce NF9124', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2950, '2024-07-11 16:17:21', '2024-07-11 10:32:21'),
(4, 'NaviForce NF9125', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2600, '2024-07-11 16:35:49', '2024-07-11 10:50:49'),
(5, 'NaviForce NF9126', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2500, '2024-07-11 16:36:27', '2024-07-11 10:51:27'),
(6, 'NaviForce NF9127', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2300, '2024-07-11 16:37:07', '2024-07-11 10:52:07'),
(7, 'NaviForce NF9128', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2700, '2024-07-11 16:38:09', '2024-07-11 10:53:09'),
(8, 'NaviForce NF9129', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 3000, '2024-07-11 16:38:38', '2024-07-11 10:53:38'),
(9, 'NaviForce NF9111', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 3100, '2024-07-11 16:39:02', '2024-07-11 10:54:02'),
(10, 'NaviForce NF9112', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 3500, '2024-07-11 16:39:32', '2024-07-11 10:54:32'),
(11, 'NaviForce NF9113', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2300, '2024-07-11 16:40:08', '2024-07-11 10:55:08'),
(12, 'NaviForce NF9114', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2200, '2024-07-11 16:40:41', '2024-07-11 10:55:41'),
(13, 'NaviForce NF9115', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2400, '2024-07-11 16:41:14', '2024-07-11 10:56:14'),
(14, 'NaviForce NF9116', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2800, '2024-07-11 16:42:12', '2024-07-11 10:57:12'),
(15, 'NaviForce NF9117', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2450, '2024-07-11 16:42:55', '2024-07-11 10:57:55'),
(16, 'NaviForce NF9118', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2600, '2024-07-11 16:43:20', '2024-07-11 10:58:20'),
(17, 'NaviForce NF9119', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2545, '2024-07-11 16:45:33', '2024-07-11 11:00:33'),
(18, 'NaviForce NF9131', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2500, '2024-07-11 16:45:48', '2024-07-11 11:00:48'),
(19, 'NaviForce NF9132', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2635, '2024-07-11 16:46:01', '2024-07-11 11:01:01'),
(20, 'NaviForce NF9133', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2742, '2024-07-11 16:45:14', '2024-07-11 11:00:14'),
(21, 'NaviForce NF9134', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2656, '2024-07-11 16:46:38', '2024-07-11 11:01:38'),
(22, 'NaviForce NF9135', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2431, '2024-07-11 16:46:59', '2024-07-11 11:01:59'),
(23, 'NaviForce NF91136', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2600, '2024-07-11 16:47:29', '2024-07-11 11:02:29'),
(24, 'NaviForce NF9137', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 2000, '2024-07-11 16:47:50', '2024-07-11 11:02:50'),
(25, 'NaviForce NF9138', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 4000, '2024-07-11 16:48:19', '2024-07-11 11:03:19'),
(26, 'NaviForce NF9139', '100% Genuine NaviForce Watch Brand : NaviForce 1 Year Warrant', 4500, '2024-07-11 13:43:45', '2016-10-28 13:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(512) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='image files related to a product';

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `created`, `modified`) VALUES
(1, 1, '1.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(2, 2, '2.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(3, 3, '3.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(4, 4, '4.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(5, 5, '5.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(6, 6, '6.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(7, 7, '7.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(8, 8, '8.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(9, 9, '9.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(10, 10, '10.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(11, 11, '11.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(12, 12, '12.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(13, 13, '13.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(14, 14, '14.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(15, 15, '15.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(16, 16, '16.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(17, 17, '17.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(18, 18, '18.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(19, 19, '19.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(20, 20, '20.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(21, 21, '21.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(22, 22, '22.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(23, 23, '23.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(24, 24, '24.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(25, 25, '25.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30'),
(26, 26, '26.jpg', '2024-07-11 16:16:30', '2024-07-11 16:16:30');


-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
