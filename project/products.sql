-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 03:27 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
