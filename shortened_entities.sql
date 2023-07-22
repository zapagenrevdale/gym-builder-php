SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

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

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `defaults` (
  `key_name` varchar(50) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `defaults` (`key_name`, `value`) VALUES
('installation_fee', 500),
('shipping_fee', 2000);

CREATE TABLE `delivery_status` (
  `status_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `emailotp` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `expiration_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `emailotp` (`id`, `email`, `otp`, `expiration_time`) VALUES
(61, 'g@tip.edu.pha', 'a05caa', '2023-07-17 19:49:42'),
(62, 'g@tip.edu.pha', '11dc13', '2023-07-17 19:49:49'),
(63, 'g@tip.edu.ph', '34494d', '2023-07-17 19:50:39'),
(64, 'g@tip.edu.ph', 'b7c91a', '2023-07-17 19:51:03'),
(65, 'g@tip.edu.ph', '16df23', '2023-07-17 19:58:37'),
(66, 'revhea2@gmail.com', '5bcd6c', '2023-07-18 20:48:13'),
(67, 'g@tip.edu.ph', 'cb7c6f', '2023-07-18 20:55:16');

CREATE TABLE `error_log` (
  `id` int(11) NOT NULL,
  `error_message` varchar(255) DEFAULT NULL,
  `error_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `error_log` (`id`, `error_message`, `error_timestamp`) VALUES
(1, 'ORDER ID: 112 | Client error: `POST https://api.paymongo.com/v1/payment_intents` resulted in a `400 Bad Request` response:\n{\"errors\":[{\"code\":\"parameter_blank\",\"detail\":\"The value for statement_descriptor cannot be blank.\",\"source\":{\"pointer\": (truncated.', '2023-07-15 08:48:11');

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `orderitems` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `order_date` datetime NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `item` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `products` (`product_id`, `name`, `description`, `price`, `image_link`, `item`) VALUES
(39, 'Heavy Duty Deadlift Jack', '2x2 BASE (Solid Steel)\r\n2mm Thickness\r\n(Standard)\r\n\r\nMATTE FINISH', 1500.00, '/images/uploads/64a419ac3b0fc_heavy-duty-deadlift-jack.jpg', 473),
(40, 'Heavy Duty Multi Function Power Cage', '2 x 3 BASE\r\n2mm Thickness\r\n(Standard)\r\n\r\nMAX USER WEIGHT: 300KG\r\nMATTE FINISH', 12000.00, '/images/uploads/64a41a1568c39_heavy-duty-multi-function-power-cage.jpg', 85),
(41, 'Heavy Duty Power Cage', '2 x 3 BASE (Solid Steel)\r\n2mm Thickness\r\n(Standard)', 27500.00, '/images/uploads/64a41a635523f_heavy-duty-power-cage.jpg', 461),
(42, 'Heavy Duty Squat Stand', '2 x 3 BASE (Solid Steel) \r\n2mm Thickness \r\n(Standard)\r\n\r\nMAX USER WEIGHT: 300KG\r\nMATTE FINISH', 2800.00, '/images/uploads/64a41a7fd3381_heavy-duty-squat-stand.jpg', 0),
(43, 'Wall Mounted Folding Squat Rack', '2 x 3 BASE (Solid Steel)\r\n2mm Thickness\r\n(Standard)\r\n\r\nMAX USER WEIGHT: 300KG\r\nMATTE FINISH', 7000.00, '/images/uploads/64a41aefd2979_wall-mounted-folding-squat-rack.jpg', 28);

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `order_item_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `tutorials` (
  `tutorial_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tutorials` (`tutorial_id`, `product_id`, `title`, `content`, `video_link`, `created_at`) VALUES
(13, 41, 'Heavy Lifting Tutorial', 'The bench press is a popular exercise for developing upper body strength, particularly targeting the chest, shoulders, and triceps. To perform the bench press, start by setting up a stable bench at the appropriate height and positioning yourself with your back, shoulders, and glutes in contact with the bench. Grip the bar slightly wider than shoulder-width apart and unrack it, ensuring it is directly above your shoulders. Lower the bar in a controlled manner towards your mid-chest, maintaining a slight bend in your elbows and avoiding excessive flaring of the elbows. Press the bar back up, engaging your chest, shoulders, and triceps, while keeping your feet planted and maintaining a natural arch in your lower back. Repeat the movement for your desired number of repetitions, always focusing on maintaining proper form and control. Finally, re-rack the bar safely. Remember to start with an appropriate weight, gradually increase it, and consider having a spotter or using safety catches for', '/images/uploads/64ae966bbe444_bg-video.mp4', '2023-07-12 12:02:51'),
(14, 40, 'Heavy Duty Multi Function Tutorial', 'The bench press is a popular exercise for developing upper body strength, particularly targeting the chest, shoulders, and triceps. To perform the bench press, start by setting up a stable bench at the appropriate height and positioning yourself with your back, shoulders, and glutes in contact with the bench. Grip the bar slightly wider than shoulder-width apart and unrack it, ensuring it is directly above your shoulders. Lower the bar in a controlled manner towards your mid-chest, maintaining a slight bend in your elbows and avoiding excessive flaring of the elbows.', '/images/uploads/64b6865b052dd_bg-video.mp4', '2023-07-18 12:32:27');

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  `verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `admin`, `verified`) VALUES
(13, 'Alexandra', 'Delos Reyes', 'hamewavee@gmail.com', '$2y$10$C8qfX2g9RevqIKklGnxTfujN5vanajseg.7CG.I9WEe4If9Yo5bfi', 0, 1),
(18, 'Admin', 'Admin', 'admin@gymbuilderph.com', '$2y$10$/bf6/uE7jzsMV7oX2Wk98OnBMf/B3sdvanJlrsYJl9hG5Y3jvgVOu', 1, 1);

ALTER TABLE `addresses`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

ALTER TABLE `defaults`
  ADD PRIMARY KEY (`key_name`);

ALTER TABLE `delivery_status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `order_id` (`order_id`);

ALTER TABLE `emailotp`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `error_log`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `product_id` (`product_id`);

ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `address_id` (`address_id`);

ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `order_item_id` (`order_item_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`tutorial_id`),
  ADD KEY `product_id` (`product_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

ALTER TABLE `delivery_status`
  ADD CONSTRAINT `delivery_status_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

ALTER TABLE `orderitems`
  ADD CONSTRAINT `orderitems_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orderitems_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`address_id`) ON DELETE CASCADE;

ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`order_item_id`) REFERENCES `orderitems` (`order_item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

ALTER TABLE `tutorials`
  ADD CONSTRAINT `tutorials_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

COMMIT;
