-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 01:26 PM
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
-- Database: `gym_builder`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--
  
INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `image_link`) VALUES
(39, 'Heavy Duty Deadlift Jack', '2x2 BASE (Solid Steel)\r\n2mm Thickness\r\n(Standard)\r\n\r\nMATTE FINISH', 1500.00, '/images/uploads/64a419ac3b0fc_heavy-duty-deadlift-jack.jpg'),
(40, 'Heavy Duty Multi Function Power Cage', '2 x 3 BASE\r\n2mm Thickness\r\n(Standard)\r\n\r\nMAX USER WEIGHT: 300KG\r\nMATTE FINISH', 12000.00, '/images/uploads/64a41a1568c39_heavy-duty-multi-function-power-cage.jpg'),
(41, 'Heavy Duty Power Cage', '2 x 3 BASE (Solid Steel)\r\n2mm Thickness\r\n(Standard)', 27500.00, '/images/uploads/64a41a635523f_heavy-duty-power-cage.jpg'),
(42, 'Heavy Duty Squat Stand', '2 x 3 BASE (Solid Steel) \r\n2mm Thickness \r\n(Standard)\r\n\r\nMAX USER WEIGHT: 300KG\r\nMATTE FINISH', 2800.00, '/images/uploads/64a41a7fd3381_heavy-duty-squat-stand.jpg'),
(43, 'Wall Mounted Folding Squat Rack', '2 x 3 BASE (Solid Steel)\r\n2mm Thickness\r\n(Standard)\r\n\r\nMAX USER WEIGHT: 300KG\r\nMATTE FINISH', 7000.00, '/images/uploads/64a41aefd2979_wall-mounted-folding-squat-rack.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
