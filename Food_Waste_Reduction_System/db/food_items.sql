-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2025 at 06:11 AM
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
-- Database: `food_waste`
--

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `expire_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(100) NOT NULL,
  `status` enum('available','taken') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`id`, `name`, `quantity`, `address`, `expire_date`, `created_at`, `email`, `status`) VALUES
(8, 'chips', '10 packet', 'Vasna, Ahmedabad', '2025-11-07', '2025-11-05 10:33:32', 'rutvikmistry1546@gmail.com', 'available'),
(9, 'Roti', '10 piece', 'Vasna, Ahmedabad', '2025-11-06', '2025-11-05 15:14:55', 'rutvikmistry1546@gmail.com', 'available'),
(10, 'Roti', '10 piece', 'Vasna, Ahmedabad', '2025-11-06', '2025-11-05 15:14:55', 'rutvikmistry1546@gmail.com', 'available'),
(11, 'Pizza', '20 piece', 'Vasna, Ahmedabad', '2025-11-06', '2025-11-05 15:17:16', 'rutvikmistry1546@gmail.com', 'available'),
(12, 'Pizza', '20 piece', 'Vasna, Ahmedabad', '2025-11-06', '2025-11-05 15:17:16', 'rutvikmistry1546@gmail.com', 'available'),
(13, 'Burger', '10 piece', 'Vasna, Ahmedabad', '2025-11-06', '2025-11-05 15:20:22', 'rutvikmistry1546@gmail.com', 'available'),
(21, 'Mango', '20 KG', 'Paldi, Ahmedabad', '2025-11-07', '2025-11-06 04:26:06', 'rutvikmistry1546@gmail.com', 'available'),
(30, 'Mango', '20 KG', 'Paldi, Ahmedabad', '2025-11-07', '2025-11-06 04:30:28', 'rutvikmistry1546@gmail.com', 'available'),
(40, 'Apple', '15 KG', 'Vasna, Ahmedabad', '2025-11-08', '2025-11-06 04:36:39', 'rutvikmistry1546@gmail.com', 'available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
