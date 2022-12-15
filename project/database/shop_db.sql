-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2022 at 10:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(69, 1, 'book', 30, 1, 'mamba.jpg'),
(70, 10, 'fasdf', 34, 1, 'Screenshot (5).png'),
(74, 7, 'AVR', 489, 1, 'ARV.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(13, 17, 'Serri', '123456', 'serri@mail.com', 'cash on delivery', 'flat no. 11, asddfg, Vienna, Austria - 1234', ', AVR (1) , SW Ply (1) ', 1039, '14-Dec-2022', 'pending'),
(14, 13, 'nikola', '123456', 'user10@mail.com', 'cash on delivery', 'flat no. 12, 123, Vienna, Austria - 1234', ', Salomon  (1) ', 185, '14-Dec-2022', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(55) DEFAULT NULL,
  `description` varchar(600) DEFAULT NULL,
  `color` varchar(55) DEFAULT NULL,
  `size` varchar(55) DEFAULT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `description`, `color`, `size`, `price`, `image`) VALUES
(11, 'AVR', 'Armada', ' amazing carving feeling super speet nice flow', 'Multy', '190', 489, 'ARV.jpg'),
(12, 'Salomon ', 'Salomon Super Carver', 'The Armada ARV 86 ups the fun factor for park and freestyle riding all over the mountain. It comes with an ash and poplar wood core for more pople', 'Multy', '188', 185, 'ARV 86.jpg'),
(13, 'B Dog', 'Armada', ' The BDOG is adapted exactly to the style of Phil Casabon. It comes with a unique construction and shape, as well as super flexible tips. Straight-line areas.', 'Multy', '157', 690, 'Bdog.jpg'),
(14, 'Bent ', 'Armada', 'The Atomic Bent Chetler 100 is an all-mountain ski with a focus on powder and backcountry skiing.', 'Multy', '176', 550, 'Bent.jpg'),
(15, 'Prodogy 2', 'Armada', 'A Directional Twin Tip shape and a Hybrid Camber profile combined with a poplar woodcore. ', 'Multy', '169', 570, 'Prodigy 2.jpg'),
(16, 'Prodigy 3', 'Armada', 'The 106 mm centre width, combined with a poplar wood core and robust construction.', 'Multy', '165', 680, 'Prodigy 3.jpg'),
(17, ' Poacher ', 'K2', 'The Poacher Jr offers the same freestyle-oriented feel as the big Poacher but scaled down and tuned for young shredders.', 'Multy', '178', 590, 'Poacher.jpg'),
(18, 'Wallisch Shorty ', 'Armada', 'The Tom Wallisch Shorty from Line offers the best quality in a small package.', 'Multy', '188', 690, 'Wallisch.jpg'),
(19, 'Sprayer', 'Armada', 'The Rossignol Sprayer is an all-mountain freestyle ski for young riders', 'Multy', '176', 490, 'Sprayer.jpg'),
(20, ' Revolt W Junior', 'Völkl', 'The Vökl Revolt W Junior vMotion offers a great gateway to the freestyle and freeride scene.', 'Multy', '169', 470, 'Revolt.jpg'),
(21, 'Quantum ', ' Aperture ', 'Whether you want to improve your riding or shred bigger features in the park, the Aperture Quantum', 'Multy', '190', 680, 'Quantum.jpg'),
(22, 'Deep Thinker', 'Burton', 'Whether you want to improve your riding or shred bigger fe Aperture Quantum', 'Multy', '176', 489, 'Thinker.jpg'),
(23, 'Defenders', 'CAPiTA', 'The Defenders Of Awesome has won a Transworld Good Wood Award every year since its', 'Multy', '188', 370, 'Defenders.jpg'),
(24, 'SW Ply', 'DC', 'Stability and lots of pop - the DC Ply is a brilliant park board for versatile riders. ', 'Multy', '169', 550, 'SW Ply.jpg'),
(25, 'Riders', 'Gnu', 'Many pros from the Gnu team use the Riders Choice again and again.', 'Multy', '188', 440, 'Riders.jpg'),
(26, 'Mountain', 'Jones', 'If you want to combine freestyle with freeride, there is only one sensible solution', 'Multy', '157', 590, 'Mountain.jpg'),
(27, 'Skunk Ape II', 'Lib Tech', 'Big boys need light set-ups. Their snowboards are always big, wide and long, so a lighter', 'Multy', '176', 550, 'Skunk Ape 2.jpg'),
(28, 'Nermurai', 'RIPNDIP', 'With the RIPNDIP Nemurai Snowboard you get a board that looks as crazy as the tricks you do. ', 'Multy', '176', 690, 'Nermurai.jpg'),
(29, ' Mechanic', 'Rome', 'Take your turns on the freshly groomed slope, find a line in the woods, take the same side hit', 'Multy', '188', 720, 'Mechanic.jpg'),
(30, 'Sight X', 'Salomon', ' The Sight is an all-mountain snowboard with a freeride inspired shape. ', 'Multy', '169', 590, 'Sight X.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `review` tinytext DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL,
  `fk_product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `fk_user_id`, `fk_product_id`) VALUES
(1, 'Great service', 17, 13),
(3, 'pls work', 17, 13),
(4, 'Thanks for the quick service', 13, 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `lname` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `ban` enum('yes','no') DEFAULT NULL,
  `ban_start` date DEFAULT NULL,
  `ban_end` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `email`, `password`, `image`, `user_type`, `ban`, `ban_start`, `ban_end`) VALUES
(1, 'misa', 'miskovic', 'misa@gmail.com', 'a646e457db47ad218d6d9d3ce325878b', 'mamba.jpg', 'user', 'yes', '2022-12-14', '2022-12-15'),
(5, 'Rocky', 'docky', 'admin@mail.com', '202cb962ac59075b964b07152d234b70', NULL, 'admin', NULL, '0000-00-00', '0000-00-00'),
(6, 'user2', 'User2', 'user2@mail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'admin', 'no', NULL, NULL),
(7, 'user3', 'User3', 'user@mail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'user', 'no', NULL, NULL),
(8, 'user4', 'User4', 'user4@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'user', 'yes', '2022-12-13', '2022-12-14'),
(10, 'misa', 'miskovic', 'misa@gmail.com', 'e517097802ff7ba0bbbfefb1bc13c3a9', 'mamba.jpg', 'user', NULL, NULL, NULL),
(13, 'nikola5', 'sijan1', 'nikola@gmail.com', 'a646e457db47ad218d6d9d3ce325878b', 'ARV.jpg', 'user', NULL, NULL, NULL),
(16, 'lea', 'sijan', 'lea@gmail.com', 'd9b9768a129ccf45eba4ad5762f24da4', '', 'admin', NULL, NULL, NULL),
(17, 'serri', 'trainer', 'serri@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'download.png', 'user', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`fk_user_id`),
  ADD KEY `fk_product_id` (`fk_product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`fk_product_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
