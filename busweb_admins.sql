-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2025 at 03:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busweb_admins`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'sainihardik31@gmail.com', '$2y$10$cA64c1cyG6cltomCa9C3KeselsJCdzOKtegU0bHIebTLdo1XoZhZe', '2025-04-19 12:04:55', '2025-04-19 12:04:55'),
(2, 'admin@example.com', '$2y$10$8K1p/a0dL1LXMIgoEDFrwOjLSH1F0WXx3X3L3L3L3L3L3L3L3L3L3L3L3', '2025-04-19 12:22:29', '2025-04-19 12:22:29'),
(4, 'swastiksingh288@gmail.com', '$2y$10$.LHYAAEr5xdfReboGFT4weoYR2UiJ60l1D0zIfrw1uo6ZZqxQ109e', '2025-04-20 13:02:31', '2025-04-20 13:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `seller_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `product` varchar(255) NOT NULL,
  `offer` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `category` enum('restaurants','retail','wellness','services','kids','automotive','entertainment','health') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`id`, `seller_name`, `address`, `latitude`, `longitude`, `phone`, `product`, `offer`, `description`, `image_path`, `category`, `created_at`) VALUES
(1, 'Apple Shop', 'Garhi Brahmana', 28.61448416, 77.21157074, '+919671543286', 'Apple', '20%', 'kashmiri apple', 'uploads/68039650a2dfd.png', 'retail', '2025-04-19 12:25:52'),
(2, 'Kashmiri Bat', 'Dal Lake', 34.11413540, 74.85843658, '8873465131', 'Bat', '50%off', 'best bat', 'uploads/68039b68c8fbb.jpg', 'retail', '2025-04-19 12:47:36'),
(3, 'Rajput Gun Shop', 'kashmiri gate', 28.67115560, 77.23110259, '8873465131', 'All types of Weapons', '20%', 'All types of Guns are available', 'uploads/6804f131d00b8.jpg', 'retail', '2025-04-20 13:05:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
