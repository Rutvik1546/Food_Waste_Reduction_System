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
-- Table structure for table `food_items_admin`
--

CREATE TABLE `food_items_admin` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `expire_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `donor_name` varchar(255) NOT NULL,
  `donor_email` varchar(255) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `status` enum('Available','Taken') NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_items_admin`
--

INSERT INTO `food_items_admin` (`id`, `name`, `quantity`, `address`, `expire_date`, `created_at`, `donor_name`, `donor_email`, `receiver_name`, `receiver_email`, `status`) VALUES
(1, 'Burger', '10 piece', 'Vasna, Ahmedabad', '2025-11-06', '2025-11-05 15:22:08', 'Rutvik Mistry', 'rutvikmistry1546@gmail.com', '', '', 'Available'),
(2, 'Potato', '10 KG', 'vasna, Ahmedabad', '2025-11-06', '2025-11-05 15:24:32', 'Rutvik Mistry', 'rutvikmistry1546@gmail.com', '', '', 'Available'),
(3, 'Potato', '10 KG', 'Vasna, Ahmedabad', '2025-11-06', '2025-11-05 15:28:11', 'Rutvik Mistry', 'rutvikmistry1546@gmail.com', '', '', 'Available'),
(21, 'Apple', '40 KG', 'Paldi, Ahmedabad', '2025-11-07', '2025-11-06 04:12:07', 'Rutvik Mistry', 'rutvikmistry1546@gmail.com', '', '', 'Available'),
(30, 'Mango', '20 KG', 'Paldi, Ahmedabad', '2025-11-07', '2025-11-06 04:30:28', 'Rutvik Mistry', 'rutvikmistry1546@gmail.com', '', '', 'Available'),
(40, 'Apple', '15 KG', 'Vasna, Ahmedabad', '2025-11-08', '2025-11-06 04:36:40', 'Rutvik Mistry', 'rutvikmistry1546@gmail.com', '', '', 'Available'),
(41, 'Orange', '50 KG', 'Jivraj,Ahmedabad', '2025-11-09', '2025-11-06 04:41:03', 'Rutvik Mistry', 'rutvikmistry1546@gmail.com', 'Jaymin', '', 'Taken'),
(42, 'Tomato', '30 KG', 'Paldi, Ahmedabad', '2025-11-10', '2025-11-06 05:02:43', 'Rutvik Mistry', 'rutvikmistry1546@gmail.com', 'Jaymin', 'jaymindesai1224@gmail.com', 'Taken');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food_items_admin`
--
ALTER TABLE `food_items_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_items_admin`
--
ALTER TABLE `food_items_admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
