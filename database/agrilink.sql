-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2025 at 12:18 PM
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
-- Database: `agrilink`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit_log`
--

CREATE TABLE `audit_log` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `qty` varchar(250) NOT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `buyer_id`, `qty`, `datetime`) VALUES
(45, 366, 1, '1', NULL),
(46, 367, 1, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `buyer` varchar(250) NOT NULL,
  `qty` varchar(250) NOT NULL,
  `payment` varchar(250) NOT NULL,
  `total` varchar(250) NOT NULL,
  `message` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `payment_proof` text NOT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `product_id`, `buyer`, `qty`, `payment`, `total`, `message`, `status`, `payment_proof`, `datetime`) VALUES
(31, 321, 'Buyer', '1', 'Cash on Delivery', '81', '', 'pay', '', '2024-12-03 10:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `album` varchar(250) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `location` text NOT NULL,
  `brand` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `discount` varchar(250) NOT NULL,
  `current_stock` varchar(250) NOT NULL,
  `next_month_stock` varchar(250) NOT NULL,
  `available` tinyint(4) NOT NULL DEFAULT 1,
  `sold` int(11) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `seller_id`, `name`, `type`, `location`, `brand`, `price`, `discount`, `current_stock`, `next_month_stock`, `available`, `sold`, `image`, `description`) VALUES
(308, 7, 'Upo (Bottle Gourd)', 'Crops', 'Pakil', '', '11', '8', '38', '38', 1, 0, 'Upo (Bottle Gourd).jpeg', 'Bottle gourd, typically weighs 1-2 kilos each, with 1-2 pieces per kilo. Ideal for soups and stir-fries.'),
(309, 7, 'Ampalaya (Bitter Gourd)', 'Crops', 'Nagcarlan', '', '35', '6', '16', '16', 1, 0, 'Ampalaya (Bitter Gourd).jpeg', 'Bitter gourd, approximately 200-300 grams each, with 3-4 pieces per kilo. Known for its health benefits.'),
(310, 7, 'Sitaw (String Beans)', 'Crops', 'Liliw', '', '50', '1', '38', '38', 1, 0, 'Sitaw (String Beans).jpeg', 'String beans, about 20-30 cm long, with 100-120 pieces per kilo. Commonly used in Filipino dishes.'),
(311, 7, 'Okra', 'Crops', 'Calamba', '', '49', '11', '33', '33', 1, 0, 'Okra.jpeg', 'Okra, 8-10 cm long, with 30-40 pieces per kilo. Often used in soups and stews for its slimy texture.'),
(312, 7, 'Talong (Eggplant)', 'Crops', 'Pangil', '', '18', '1', '14', '14', 1, 0, 'Talong (Eggplant).jpeg', 'Eggplant, 15-20 cm long, with 4-6 pieces per kilo. Versatile for grilling, frying, or stewing.'),
(313, 7, 'Lanzones', 'Fruits', 'Calamba', '', '37', '9', '16', '16', 1, 0, 'Lanzones.jpeg', 'Lanzones, small round fruit, with 40-50 pieces per kilo. Sweet and tangy, perfect for fresh consumption.'),
(314, 7, 'Rambutan', 'Fruits', 'Pakil', '', '26', '10', '23', '23', 1, 0, 'Rambutan.jpeg', 'Rambutan, spiky red fruit, with 20-25 pieces per kilo. Juicy and sweet, similar to lychee.'),
(315, 7, 'Mango', 'Fruits', 'Majayjay', '', '20', '8', '24', '24', 1, 0, 'Mango.jpeg', 'Mango, 300-400 grams each, with 2-3 pieces per kilo. Sweet and tangy, ideal for desserts or fresh eating.'),
(316, 7, 'Papaya', 'Fruits', 'Pagsanjan', '', '13', '7', '20', '20', 1, 0, 'Papaya.jpeg', 'Papaya, 1-2 kilos each, with 1 piece per kilo. Mildly sweet, used in salads or smoothies.'),
(317, 7, 'Pineapple', 'Fruits', 'Kalayaan', '', '23', '7', '38', '38', 1, 0, 'Pineapple.jpeg', 'Pineapple, 1.5-2 kilos each, with 1 piece per kilo. Sweet-tart flavor, great for desserts or savory dishes.'),
(318, 7, 'Rice', 'Crops', 'Los Baños', '', '41', '6', '15', '15', 1, 0, 'Rice.jpeg', 'Rice, 1-kilo packs. A staple grain, commonly steamed or fried.'),
(319, 7, 'Free-range Chicken', 'Meats', 'Pakil', '', '32', '8', '24', '24', 1, 0, 'Free-range Chicken.jpeg', 'Free-range chicken, 1-1.5 kilos each. Lean and flavorful, ideal for grilling or stewing.'),
(320, 7, 'Pork', 'Meats', 'Liliw', '', '37', '14', '17', '17', 1, 0, 'Pork.jpeg', 'Pork, 1-kilo packs. Versatile meat for dishes like adobo or lechon.'),
(321, 7, 'Beef', 'Meats', 'Pagsanjan', '', '50', '15', '15', '15', 1, 0, 'Beef.jpeg', 'Beef, 1-kilo packs. Rich in protein, used in soups or stews.'),
(322, 7, 'Duck Eggs', 'Eggs', 'Paete', '', '39', '1', '20', '20', 1, 0, 'Duck Eggs.jpeg', 'Duck eggs, 70-80 grams each, with 12-15 pieces per kilo. Richer yolk, used in balut or salted eggs.'),
(323, 7, 'Chicken Eggs', 'Eggs', 'Lumban', '', '41', '1', '30', '30', 1, 0, 'Chicken Eggs.jpeg', 'Chicken eggs, 50-60 grams each, with 16-18 pieces per kilo. Versatile for cooking or baking.'),
(324, 7, 'Tilapia', 'Fishes', 'Paete', '', '18', '11', '30', '30', 1, 0, 'Tilapia.jpeg', 'Tilapia, 300-400 grams each, with 2-3 pieces per kilo. Freshwater fish, commonly grilled or fried.'),
(325, 7, 'Freshwater Prawns', 'Seafoods', 'Nagcarlan', '', '43', '14', '36', '36', 1, 0, 'Freshwater Prawns.jpeg', 'Freshwater prawns, 50-60 grams each, with 16-20 pieces per kilo. Sweet and succulent, ideal for grilling.'),
(326, 7, 'Bangus', 'Fishes', 'Pila', '', '37', '6', '34', '34', 1, 0, 'Bangus.jpeg', 'Bangus, 500-700 grams each, with 1-2 pieces per kilo. National fish of the Philippines, often fried or grilled.'),
(327, 7, 'Kalabasa (Squash)', 'Crops', 'Magdalena', '', '49', '13', '37', '37', 1, 0, 'Kalabasa (Squash).jpeg', 'Squash, 1-2 kilos each, with 1 piece per kilo. Sweet and orange-fleshed, used in stews or soups.'),
(328, 7, 'Malunggay (Moringa Leaves)', 'Crops', 'Mabitac', '', '43', '13', '17', '17', 1, 0, 'Malunggay (Moringa Leaves).jpeg', 'Moringa leaves, sold in 100-gram bundles. Nutrient-rich, added to soups or salads.'),
(329, 7, 'Kangkong (Water Spinach)', 'Crops', 'Nagcarlan', '', '49', '12', '12', '12', 1, 0, 'Kangkong (Water Spinach).jpeg', 'Water spinach, sold in 200-gram bundles. Tender stems and leaves, ideal for stir-fries.'),
(330, 7, 'Kamote Tops (Sweet Potato Leaves)', 'Crops', 'Nagcarlan', '', '12', '2', '15', '15', 1, 0, 'Kamote Tops (Sweet Potato Leaves).jpeg', 'Sweet potato leaves, sold in 200-gram bundles. Commonly boiled or used in salads.'),
(331, 7, 'Gabi (Taro)', 'Crops', 'Famy', '', '37', '1', '32', '32', 1, 0, 'Gabi (Taro).jpeg', 'Taro, 300-500 grams each, with 2-3 pieces per kilo. Starchy root vegetable, used in soups or desserts.'),
(332, 7, 'Sayote (Chayote)', 'Crops', 'Mabitac', '', '50', '9', '33', '33', 1, 0, 'Sayote (Chayote).jpeg', 'Chayote, 200-300 grams each, with 3-4 pieces per kilo. Mild flavor, used in sautéed dishes or soups.'),
(333, 7, 'Singkamas (Jicama)', 'Crops', 'Liliw', '', '41', '5', '27', '27', 1, 0, 'Singkamas (Jicama).jpeg', 'Jicama, 300-400 grams each, with 2-3 pieces per kilo. Crisp and sweet, eaten raw or in salads.'),
(334, 7, 'Red Onion', 'Crops', 'Cavinti', '', '25', '1', '36', '36', 1, 0, 'Red Onion.jpeg', 'Red onion, 100-150 grams each, with 6-8 pieces per kilo. Pungent, used as a base for sautéing.'),
(335, 7, 'White Onion', 'Crops', 'Rizal', '', '21', '13', '19', '19', 1, 0, 'White Onion.jpeg', 'White onion, 100-150 grams each, with 6-8 pieces per kilo. Milder flavor, used in soups or stews.'),
(336, 7, 'Garlic', 'Crops', 'Majayjay', '', '28', '6', '17', '17', 1, 0, 'Garlic.jpeg', 'Garlic, 20-30 grams per bulb, with 30-40 pieces per kilo. Fragrant, used for savory dishes.'),
(337, 7, 'Tomatoes', 'Crops', 'Pagsanjan', '', '12', '1', '21', '21', 1, 0, 'Tomatoes.jpeg', 'Tomatoes, 100-150 grams each, with 6-8 pieces per kilo. Juicy and tangy, used in salads or cooking.'),
(338, 7, 'Potatoes', 'Crops', 'Pakil', '', '15', '1', '26', '26', 1, 0, 'Potatoes.jpeg', 'Potatoes, 200-300 grams each, with 3-4 pieces per kilo. Versatile for frying, mashing, or boiling.'),
(339, 7, 'Carrots', 'Crops', 'Pakil', '', '12', '4', '24', '24', 1, 0, 'Carrots.jpeg', 'Carrots, 100-150 grams each, with 6-8 pieces per kilo. Crunchy and sweet, used in soups or salads.'),
(340, 7, 'Bell Peppers', 'Crops', 'Siniloan', '', '15', '5', '31', '31', 1, 0, 'Bell Peppers.jpeg', 'Bell peppers, 150-200 grams each, with 4-6 pieces per kilo. Sweet and colorful, used in stir-fries.'),
(341, 7, 'Pechay (Bok Choy)', 'Crops', 'Cavinti', '', '30', '2', '13', '13', 1, 0, 'Pechay (Bok Choy).jpeg', 'Bok choy, sold in 200-gram bundles. Leafy green, used in soups or stir-fries.'),
(342, 7, 'Cabbage', 'Crops', 'Calamba', '', '26', '1', '33', '33', 1, 0, 'Cabbage.jpeg', 'Cabbage, 1-1.5 kilos each, with 1 piece per kilo. Crunchy, used in soups or salads.'),
(343, 7, 'Radish (Labanos)', 'Crops', 'Rizal', '', '48', '9', '14', '14', 1, 0, 'Radish (Labanos).jpeg', 'Radish, 200-300 grams each, with 3-4 pieces per kilo. Crunchy, used in sinigang.'),
(344, 7, 'Guava (Bayabas)', 'Fruits', 'Famy', '', '11', '6', '10', '10', 1, 0, 'Guava (Bayabas).jpeg', 'Guava, 100-150 grams each, with 6-8 pieces per kilo. Sweet and tangy, eaten fresh or in jams.'),
(345, 7, 'Pomelo (Suha)', 'Fruits', 'Rizal', '', '32', '14', '23', '23', 1, 0, 'Pomelo (Suha).jpeg', 'Pomelo, 1-1.5 kilos each, with 1 piece per kilo. Sweet and slightly tart, enjoyed fresh.'),
(346, 7, 'Banana (Saging)', 'Fruits', 'Kalayaan', '', '50', '8', '34', '34', 1, 0, 'Banana (Saging).jpeg', 'Banana, 100-150 grams each, with 6-8 pieces per kilo. Sweet, eaten fresh or cooked.'),
(347, 7, 'Jackfruit (Langka)', 'Fruits', 'Los Baños', '', '31', '14', '30', '30', 1, 0, 'Jackfruit (Langka).jpeg', 'Jackfruit, 5-10 kilos each, with 1 piece per 5 kilos. Sweet flesh, used in desserts or savory dishes.'),
(348, 7, 'Avocado', 'Fruits', 'Famy', '', '21', '1', '40', '40', 1, 0, 'Avocado.jpeg', 'Avocado, 200-300 grams each, with 3-4 pieces per kilo. Creamy, used in smoothies or salads.'),
(349, 7, 'Calamansi', 'Fruits', 'Majayjay', '', '50', '3', '24', '24', 1, 0, 'Calamansi.jpeg', 'Calamansi, 20-30 grams each, with 30-40 pieces per kilo. Tart, used as a condiment or in drinks.'),
(350, 7, 'Coconut (Buko)', 'Fruits', 'Cavinti', '', '28', '4', '37', '37', 1, 0, 'Coconut (Buko).jpeg', 'Coconut, 1-1.5 kilos each, with 1 piece per kilo. Used for water, meat, or milk.'),
(351, 7, 'Melon', 'Fruits', 'Famy', '', '50', '5', '30', '30', 1, 0, 'Melon.jpeg', 'Melon, 1-1.5 kilos each, with 1 piece per kilo. Sweet and juicy, eaten fresh.'),
(352, 7, 'Watermelon', 'Fruits', 'Pila', '', '30', '15', '32', '32', 1, 0, 'Watermelon.jpeg', 'Watermelon, 3-5 kilos each, with 1 piece per 3 kilos. Hydrating and sweet.'),
(353, 7, 'Dragon Fruit', 'Fruits', 'Liliw', '', '42', '15', '29', '29', 1, 0, 'Dragon Fruit.jpeg', 'Dragon fruit, 300-400 grams each, with 2-3 pieces per kilo. Mildly sweet, with crunchy seeds.'),
(354, 7, 'Chicken Breast', 'Meats', 'Mabitac', '', '37', '1', '16', '16', 1, 0, 'Chicken Breast.jpeg', 'Chicken breast, 200-300 grams each, with 3-4 pieces per kilo. Lean, ideal for grilling or frying.'),
(355, 7, 'Chicken Thigh', 'Meats', 'San Pablo', '', '24', '14', '13', '13', 1, 0, 'Chicken Thigh.jpeg', 'Chicken thigh, 150-200 grams each, with 4-6 pieces per kilo. Juicy, used in stews or curries.'),
(356, 7, 'Pork Belly (Liempo)', 'Meats', 'Siniloan', '', '36', '10', '11', '11', 1, 0, 'Pork Belly (Liempo).jpeg', 'Pork belly, 500-700 grams each, with 1-2 pieces per kilo. Fatty and flavorful, used in adobo or lechon.'),
(357, 7, 'Ground Pork', 'Meats', 'Rizal', '', '25', '7', '22', '22', 1, 0, 'Ground Pork.jpeg', 'Ground pork, sold in 1-kilo packs. Used in meatballs or giniling.'),
(358, 7, 'Beef Ribs', 'Meats', 'San Pablo', '', '10', '10', '31', '31', 1, 0, 'Beef Ribs.jpeg', 'Beef ribs, 500-700 grams each, with 1-2 pieces per kilo. Meaty, used in soups or grilled.'),
(359, 7, 'Beef Shank', 'Meats', 'Pagsanjan', '', '39', '8', '11', '11', 1, 0, 'Beef Shank.jpeg', 'Beef shank, 500-700 grams each, with 1-2 pieces per kilo. Tender, used in slow-cooked dishes.'),
(360, 7, 'Duck Meat', 'Meats', 'Mabitac', '', '15', '10', '40', '40', 1, 0, 'Duck Meat.jpeg', 'Duck meat, 1-1.5 kilos each, with 1 piece per kilo. Rich and flavorful, used in festive dishes.'),
(361, 7, 'Goat Meat (Chevon)', 'Meats', 'Kalayaan', '', '28', '1', '18', '18', 1, 0, 'Goat Meat (Chevon).jpeg', 'Goat meat, 1-1.5 kilos each, with 1 piece per kilo. Lean and unique in flavor, used in kaldereta.'),
(362, 7, 'Salted Duck Eggs', 'Eggs', 'Rizal', '', '27', '6', '31', '31', 1, 0, 'Salted Duck Eggs.jpeg', 'Salted duck eggs, 70-80 grams each, with 12-15 pieces per kilo. Rich and savory, paired with tomatoes.'),
(363, 7, 'Crabs', 'Seafoods', 'Pakil', '', '140', '8', '38', '38', 1, 0, 'Crabs.jpeg', 'Crabs, 300-400 grams each, with 2-3 pieces per kilo. Sweet and succulent, often steamed.'),
(364, 7, 'Shrimps', 'Seafoods', 'Magdalena', '', '200', '5', '56', '56', 1, 0, 'Shrimps.jpeg', 'Shrimps, 20-30 grams each, with 30-40 pieces per kilo. Juicy and flavorful, used in various dishes.'),
(365, 7, 'Squid (Pusit)', 'Seafoods', 'Rizal', '', '150', '3', '51', '51', 1, 0, 'Squid (Pusit).jpeg', 'Squid, 200-300 grams each, with 3-4 pieces per kilo. Tender, used in adobo or grilled.'),
(366, 7, 'Shellfish (Tahong)', 'Seafoods', 'Pila', '', '200', '8', '24', '24', 1, 0, 'Shellfish (Tahong).jpeg', 'Mussels, 50-60 grams each, with 16-20 pieces per kilo. Often cooked in coconut milk or sautéed.'),
(367, 7, 'Clams (Halaan)', 'Seafoods', 'Pangil', '', '180', '7', '26', '26', 1, 0, 'Clams (Halaan).jpeg', 'Clams, 50-60 grams each, with 16-20 pieces per kilo. Mild flavor, used in soups or stews.');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `id` int(11) NOT NULL,
  `buyer_name` text NOT NULL,
  `order_id` int(11) NOT NULL,
  `reason` text NOT NULL,
  `image` text NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `address` text NOT NULL,
  `gender` varchar(250) NOT NULL,
  `birthdate` varchar(250) NOT NULL,
  `image` text NOT NULL,
  `password` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL,
  `id_image` text NOT NULL,
  `business_permit` text NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `gender`, `birthdate`, `image`, `password`, `status`, `role`, `id_image`, `business_permit`, `is_verified`) VALUES
(1, 'Buyer', 'buyer@gmail.com', '09761162115', 'Dasmarinas Cavite', 'male', '', 'Buyer1.jpg', '123456', 'offline', 'buyer', 'Test User 2buyer.png', 'Test User 2buyer.png', 1),
(7, 'Seller', 'seller@gmail.com', '09563274292', 'AdsasdadSda', '', '', '', '123456', 'offline', 'seller', 'Test User 1buyer.png', 'Test User 1buyer.png', 1),
(8, 'Admin', 'admin@gmail.com', '09563274292', 'AdsasdadSda', '', '', '', '123456', 'offline', 'admin', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_log`
--
ALTER TABLE `audit_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Product Relation` (`product_id`),
  ADD KEY `User Relation` (`buyer_id`) USING BTREE;

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Product` (`product_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Seller` (`seller_id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Order` (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_log`
--
ALTER TABLE `audit_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=373;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `Product Relation` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `Product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Seller` FOREIGN KEY (`seller_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `refund`
--
ALTER TABLE `refund`
  ADD CONSTRAINT `Order` FOREIGN KEY (`order_id`) REFERENCES `checkout` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
