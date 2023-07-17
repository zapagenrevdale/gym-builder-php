-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2023 at 01:54 PM
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
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`address_id`, `user_id`, `address_line1`, `address_line2`, `city`, `country`, `postal_code`, `phone_number`) VALUES
(8, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567'),
(9, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(10, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-456'),
(11, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-456'),
(12, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-456'),
(13, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(14, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(15, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(16, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(17, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(18, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(19, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(20, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(21, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(22, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(23, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(24, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(25, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(26, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(27, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(28, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(29, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(30, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(31, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(32, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(33, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aa'),
(34, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+1 (555) 123-4567aaasdfadf'),
(35, 16, '123 Main Street', 'Apt 4B', 'New York', ' United States', '10001', '+639123456789');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emailotp`
--

CREATE TABLE `emailotp` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `expiration_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emailotp`
--

INSERT INTO `emailotp` (`id`, `email`, `otp`, `expiration_time`) VALUES
(61, 'g@tip.edu.pha', 'a05caa', '2023-07-17 19:49:42'),
(62, 'g@tip.edu.pha', '11dc13', '2023-07-17 19:49:49'),
(63, 'g@tip.edu.ph', '34494d', '2023-07-17 19:50:39'),
(64, 'g@tip.edu.ph', 'b7c91a', '2023-07-17 19:51:03'),
(65, 'g@tip.edu.ph', '16df23', '2023-07-17 19:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `error_log`
--

CREATE TABLE `error_log` (
  `id` int(11) NOT NULL,
  `error_message` varchar(255) DEFAULT NULL,
  `error_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `error_log`
--

INSERT INTO `error_log` (`id`, `error_message`, `error_timestamp`) VALUES
(1, 'ORDER ID: 112 | Client error: `POST https://api.paymongo.com/v1/payment_intents` resulted in a `400 Bad Request` response:\n{\"errors\":[{\"code\":\"parameter_blank\",\"detail\":\"The value for statement_descriptor cannot be blank.\",\"source\":{\"pointer\": (truncated.', '2023-07-15 08:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(71, 108, 42, 2, 5600.00),
(72, 108, 42, 2, 5600.00),
(73, 109, 40, 7, 84000.00),
(74, 110, 40, 5, 60000.00),
(75, 111, 39, 5, 7500.00),
(76, 113, 39, 3, 4500.00),
(77, 114, 39, 2, 3000.00),
(78, 115, 39, 2, 3000.00),
(79, 115, 39, 2, 3000.00),
(80, 116, 40, 3, 36000.00),
(81, 116, 40, 3, 36000.00),
(82, 117, 39, 5, 7500.00),
(83, 117, 39, 5, 7500.00),
(84, 118, 41, 19, 522500.00),
(85, 119, 40, 3, 36000.00),
(86, 120, 40, 5, 60000.00),
(87, 121, 40, 6, 72000.00);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `order_date` datetime NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `address_id`, `order_date`, `total_amount`, `status`, `delivery_status`) VALUES
(108, 16, NULL, '2023-07-15 10:21:37', 41700.00, 0, 'processing'),
(109, 16, 35, '2023-07-15 10:47:32', 84100.00, 0, 'processing'),
(110, 16, 35, '2023-07-15 10:47:53', 60100.00, 0, 'processing'),
(111, 16, 35, '2023-07-15 10:48:10', 7600.00, 0, 'processing'),
(112, 16, 35, '2023-07-15 10:48:11', 100.00, 0, 'cancelled'),
(113, 16, 35, '2023-07-15 10:48:20', 4600.00, 0, 'cancelled'),
(114, 16, 35, '2023-07-15 10:48:53', 3100.00, 1, 'processing'),
(115, 16, 35, '2023-07-15 10:49:09', 39100.00, 1, 'processing'),
(116, 16, 35, '2023-07-15 10:49:22', 43600.00, 0, 'processing'),
(117, 16, 35, '2023-07-15 10:49:57', 90100.00, 1, 'processing'),
(118, 16, 35, '2023-07-15 11:22:25', 522600.00, 1, 'processing'),
(119, 16, 35, '2023-07-17 19:49:17', 36100.00, 1, 'processing'),
(120, 16, 35, '2023-07-17 19:49:39', 60100.00, 1, 'processing'),
(121, 16, 35, '2023-07-17 19:53:54', 72100.00, 1, 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_method` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `payment_intent_id` varchar(255) DEFAULT NULL,
  `source_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `payment_method`, `transaction_id`, `amount`, `payment_date`, `payment_intent_id`, `source_id`) VALUES
(29, 108, 'cash', '64B2571182', 41700.00, '0000-00-00 00:00:00', '', ''),
(30, 109, 'cash', '64B25D2417', 84100.00, '0000-00-00 00:00:00', '', ''),
(31, 110, 'cash', '64B25D39C1', 60100.00, '0000-00-00 00:00:00', '', ''),
(32, 111, 'gcash', '64B25D4A02', 7600.00, '2023-07-15 10:48:10', 'pi_K8rY8bfrFJg5cRKk6ubzkW2X', 'src_thKunPY4137sfXdzcTW34iED'),
(33, 113, 'gcash', '64B25D54E1', 4600.00, '2023-07-15 10:48:21', 'pi_eo5dQu6iuH7z79RUwYz6dEGf', 'src_m39mqoJqhcCqDwgNydMSYqRT'),
(34, 114, 'gcash', '64B25D7502', 3100.00, '2023-07-15 10:48:53', 'pi_V7ZLp2ppJM8Ch9aJ2vXPeWZC', 'src_7rqFE9s3dEswWhQQNsqC2bqo'),
(35, 115, 'gcash', '64B25D8558', 39100.00, '2023-07-15 10:49:10', 'pi_GVFVHkXWL2sCrxx9PAHjJ5RD', 'src_n8SHpeCLnmHiCrjGAp3p6VoA'),
(36, 116, 'gcash', '64B25D92F0', 43600.00, '2023-07-15 10:49:24', 'pi_UA6CDhs58vs3Nzs5yGJJe3TC', 'src_NtNK6y1qGaMH1ym25YSLaJWi'),
(37, 117, 'gcash', '64B25DB50F', 90100.00, '2023-07-15 10:49:57', 'pi_wemGs4VpFFwRF2zvTryQ9uTW', 'src_8oGoDB5GqDQZEjGFfeHGfoi9'),
(38, 118, 'gcash', '64B2655212', 522600.00, '2023-07-15 11:22:26', 'pi_rZZqcXbn3LzadtVcqL3qXLLC', 'src_MEUKdSrbLf4df2fXmLE1mRcq'),
(39, 119, 'gcash', '64B52ABD99', 36100.00, '2023-07-17 19:49:19', 'pi_MgR4NKv9QnCh2tY3TeWFagGC', 'src_muWGNqaKkAbaRgmFyDNPEbCf'),
(40, 120, 'gcash', '64B52AD3D7', 60100.00, '2023-07-17 19:49:41', 'pi_FbXGK6TDMtavjNcJQtRHAB4t', 'src_vGokswGpAyvtJnQUNUW5Tpbn'),
(41, 121, 'gcash', '64B52BD21E', 72100.00, '2023-07-17 19:53:55', 'pi_XHuBqhZ2rfg9N1Ci4zDpKtW1', 'src_XPuspeeHD46MUowFyskrwTJG');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `item` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `image_link`, `item`) VALUES
(39, 'Heavy Duty Deadlift Jack', '2x2 BASE (Solid Steel)\r\n2mm Thickness\r\n(Standard)\r\n\r\nMATTE FINISH', 1500.00, '/images/uploads/64a419ac3b0fc_heavy-duty-deadlift-jack.jpg', 31),
(40, 'Heavy Duty Multi Function Power Cage', '2 x 3 BASE\r\n2mm Thickness\r\n(Standard)\r\n\r\nMAX USER WEIGHT: 300KG\r\nMATTE FINISH', 12000.00, '/images/uploads/64a41a1568c39_heavy-duty-multi-function-power-cage.jpg', 140),
(41, 'Heavy Duty Power Cage', '2 x 3 BASE (Solid Steel)\r\n2mm Thickness\r\n(Standard)', 27500.00, '/images/uploads/64a41a635523f_heavy-duty-power-cage.jpg', 28),
(42, 'Heavy Duty Squat Stand', '2 x 3 BASE (Solid Steel) \r\n2mm Thickness \r\n(Standard)\r\n\r\nMAX USER WEIGHT: 300KG\r\nMATTE FINISH', 2800.00, '/images/uploads/64a41a7fd3381_heavy-duty-squat-stand.jpg', 0),
(43, 'Wall Mounted Folding Squat Rack', '2 x 3 BASE (Solid Steel)\r\n2mm Thickness\r\n(Standard)\r\n\r\nMAX USER WEIGHT: 300KG\r\nMATTE FINISH', 7000.00, '/images/uploads/64a41aefd2979_wall-mounted-folding-squat-rack.jpg', 44);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `order_item_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `tutorial_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`tutorial_id`, `product_id`, `title`, `content`, `video_link`, `created_at`) VALUES
(13, 41, 'Heavy Lifting', 'The bench press is a popular exercise for developing upper body strength, particularly targeting the chest, shoulders, and triceps. To perform the bench press, start by setting up a stable bench at the appropriate height and positioning yourself with your back, shoulders, and glutes in contact with the bench. Grip the bar slightly wider than shoulder-width apart and unrack it, ensuring it is directly above your shoulders. Lower the bar in a controlled manner towards your mid-chest, maintaining a slight bend in your elbows and avoiding excessive flaring of the elbows. Press the bar back up, engaging your chest, shoulders, and triceps, while keeping your feet planted and maintaining a natural arch in your lower back. Repeat the movement for your desired number of repetitions, always focusing on maintaining proper form and control. Finally, re-rack the bar safely. Remember to start with an appropriate weight, gradually increase it, and consider having a spotter or using safety catches for', '/images/uploads/64ae966bbe444_bg-video.mp4', '2023-07-12 12:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `admin`, `verified`) VALUES
(13, 'Genrev', 'Dale', 'dale@gmail.com', '$2y$10$jVnDzlSz0M5A/KyCibqNOOR.7k1IoLQmfUao2XbtpiJ0NZuM6QQ7u', 1, 0),
(14, 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$MQNFIn87MVoG/bdrG12Qfu1mIoL7ifFieNMoln58ygcjEUDlR4Wpu', 1, 0),
(16, 'Gold', 'Roger', 'g@tip.edu.ph', '$2y$10$Lfa1WAKivXzg16FmJRyTzerKxzDptfmNqws5oS/DdSkvmKj3mtJma', 0, 1),
(17, 'Name', 'Name', 'z@gmail.com', '$2y$10$hKe8AkQ1YkCFaTkVAT5th.9JTgTYKoagZdUayFjKE5jN2FZIx0UYi', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `emailotp`
--
ALTER TABLE `emailotp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `error_log`
--
ALTER TABLE `error_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `order_item_id` (`order_item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`tutorial_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `emailotp`
--
ALTER TABLE `emailotp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `error_log`
--
ALTER TABLE `error_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `tutorial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`order_item_id`) REFERENCES `orderitems` (`order_item_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD CONSTRAINT `tutorials_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
