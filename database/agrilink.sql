-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 10:44 AM
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
  `buyer` varchar(250) NOT NULL,
  `qty` varchar(250) NOT NULL,
  `datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `buyer`, `qty`, `datetime`) VALUES
(45, 366, 'Buyer', '1', NULL),
(46, 367, 'Buyer', '1', NULL);

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
  `stock` varchar(250) NOT NULL,
  `available` varchar(250) NOT NULL,
  `sold` int(11) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `seller_id`, `name`, `type`, `location`, `brand`, `price`, `discount`, `stock`, `available`, `sold`, `image`, `description`) VALUES
(308, 7, 'Upo (Bottle Gourd)', 'Crops', 'Pakil', '', '11', '8', '38', '', 0, 'Upo (Bottle Gourd).jpeg', 'This huge, green vegetable is a favorite in the kitchen for its easy use, adaptable nature, and mild yet somewhat sweet taste.'),
(309, 7, 'Ampalaya (Bitter Gourd)', 'Crops', 'Nagcarlan', '', '35', '6', '16', '', 0, 'Ampalaya (Bitter Gourd).jpeg', 'Bitter gourd is a green-skinned vegetable with white to translucent flesh and a taste that fits its name.'),
(310, 7, 'Sitaw (String Beans)', 'Crops', 'Liliw', '', '50', '1', '38', '', 0, 'Sitaw (String Beans).jpeg', 'Stringbeans or sitao is one of the most widely grown vegetables in the Philippines. It is a true legume and botanically more closely related to cowpea. The tender pods are edible while the skin is still smooth and before seeds mature or expand.'),
(311, 7, 'Okra', 'Crops', 'Calamba', '', '49', '11', '33', '', 0, 'Okra.jpeg', 'A green, finger-like vegetable with a slimy texture when cooked, often used in soups, stews, and stir-fries for its unique texture and nutritional benefits.'),
(312, 7, 'Talong (Eggplant)', 'Crops', 'Pangil', '', '18', '1', '14', '', 0, 'Talong (Eggplant).jpeg', 'A versatile purple vegetable with a creamy texture when cooked, commonly used in Filipino dishes like tortang talong and pinakbet.'),
(313, 7, 'Lanzones', 'Fruits', 'Calamba', '', '37', '9', '16', '', 0, 'Lanzones.jpeg', 'A small, round, tropical fruit with a sweet and tangy translucent flesh, encased in a thin yellowish skin. Popular in Southeast Asia.'),
(314, 7, 'Rambutan', 'Fruits', 'Pakil', '', '26', '10', '23', '', 0, 'Rambutan.jpeg', 'A spiky red fruit with a juicy and sweet white interior, similar in taste to lychee.'),
(315, 7, 'Mango', 'Fruits', 'Majayjay', '', '20', '8', '24', '', 0, 'Mango.jpeg', 'A tropical fruit with vibrant yellow-orange flesh, known for its sweet and tangy flavor. Philippine mangoes, especially, are prized for their quality.'),
(316, 7, 'Papaya', 'Fruits', 'Pagsanjan', '', '13', '7', '20', '', 0, 'Papaya.jpeg', 'A soft, orange-fleshed fruit with a mild sweetness, rich in vitamins and often enjoyed fresh or as a smoothie ingredient.'),
(317, 7, 'Pineapple', 'Fruits', 'Kalayaan', '', '23', '7', '38', '', 0, 'Pineapple.jpeg', 'A tropical fruit with spiky skin and juicy, sweet-tart golden-yellow flesh, commonly used in both savory dishes and desserts.'),
(318, 7, 'Rice', 'Crops', 'Los Baños', '', '41', '6', '15', '', 0, 'Rice.jpeg', 'A staple grain in many cuisines, typically served steamed, fried, or as an accompaniment to main dishes.'),
(319, 7, 'Free-range Chicken', 'Meats', 'Pakil', '', '32', '8', '24', '', 0, 'Free-range Chicken.jpeg', 'Chicken raised with access to open spaces, known for its leaner meat and richer flavor compared to factory-raised counterparts.'),
(320, 7, 'Pork', 'Meats', 'Liliw', '', '37', '14', '17', '', 0, 'Pork.jpeg', 'Versatile meat widely used in various Filipino dishes like adobo, sisig, and lechon.'),
(321, 7, 'Beef', 'Meats', 'Pagsanjan', '', '50', '15', '15', '', 0, 'Beef.jpeg', 'A protein-rich meat used in dishes like bulalo (beef shank soup) and kaldereta (spicy beef stew).'),
(322, 7, 'Duck Eggs', 'Eggs', 'Paete', '', '39', '1', '20', '', 0, 'Duck Eggs.jpeg', 'Larger than chicken eggs, with a richer yolk, commonly used in dishes like balut or salted duck eggs.'),
(323, 7, 'Chicken Eggs', 'Eggs', 'Lumban', '', '41', '1', '30', '', 0, 'Chicken Eggs.jpeg', 'A dietary staple, used in various dishes and baking, prized for their versatility and nutritional value.'),
(324, 7, 'Tilapia', 'Fishes', 'Paete', '', '18', '11', '30', '', 0, 'Tilapia.jpeg', 'A freshwater fish with firm, white flesh, commonly grilled, fried, or cooked in soups like sinigang.'),
(325, 7, 'Freshwater Prawns', 'Seafoods', 'Nagcarlan', '', '43', '14', '36', '', 0, 'Freshwater Prawns.jpeg', 'Large, succulent prawns known for their sweet flavor, often grilled or used in savory dishes.'),
(326, 7, 'Bangus', 'Fishes', 'Pila', '', '37', '6', '34', '', 0, 'Bangus.jpeg', 'The national fish of the Philippines, prized for its mild flavor and tender meat. Often served as daing na bangus (marinated and fried).'),
(327, 7, 'Kalabasa (Squash)', 'Crops', 'Magdalena', '', '49', '13', '37', '', 0, 'Kalabasa (Squash).jpeg', 'A sweet, orange-fleshed vegetable often used in stews and soups like ginataang kalabasa.'),
(328, 7, 'Malunggay (Moringa Leaves)', 'Crops', 'Mabitac', '', '43', '13', '17', '', 0, 'Malunggay (Moringa Leaves).jpeg', 'Small, nutrient-rich leaves commonly added to soups like tinola for their health benefits.'),
(329, 7, 'Kangkong (Water Spinach)', 'Crops', 'Nagcarlan', '', '49', '12', '12', '', 0, 'Kangkong (Water Spinach).jpeg', 'A leafy green vegetable with tender stems, often stir-fried with garlic or added to soups like sinigang.'),
(330, 7, 'Kamote Tops (Sweet Potato Leaves)', 'Crops', 'Nagcarlan', '', '12', '2', '15', '', 0, 'Kamote Tops (Sweet Potato Leaves).jpeg', 'Edible leaves of the sweet potato plant, commonly boiled or used in salads and broths.'),
(331, 7, 'Gabi (Taro)', 'Crops', 'Famy', '', '37', '1', '32', '', 0, 'Gabi (Taro).jpeg', 'A root vegetable with a starchy texture, used in soups like sinigang na gabi and desserts like ginataang bilo-bilo.'),
(332, 7, 'Sayote (Chayote)', 'Crops', 'Mabitac', '', '50', '9', '33', '', 0, 'Sayote (Chayote).jpeg', 'A light green, pear-shaped vegetable with a mild flavor, commonly added to sautéed dishes or soups.'),
(333, 7, 'Singkamas (Jicama)', 'Crops', 'Liliw', '', '41', '5', '27', '', 0, 'Singkamas (Jicama).jpeg', 'A crisp and sweet root vegetable often eaten raw or used in salads.'),
(334, 7, 'Red Onion', 'Crops', 'Cavinti', '', '25', '1', '36', '', 0, 'Red Onion.jpeg', 'A pungent vegetable used as a base for sautéing or as a garnish in salads.'),
(335, 7, 'White Onion', 'Crops', 'Rizal', '', '21', '13', '19', '', 0, 'White Onion.jpeg', 'A milder onion variety, often used in soups, stews, and marinades.'),
(336, 7, 'Garlic', 'Crops', 'Majayjay', '', '28', '6', '17', '', 0, 'Garlic.jpeg', 'A fragrant bulb used for its strong, savory flavor in countless dishes.'),
(337, 7, 'Tomatoes', 'Crops', 'Pagsanjan', '', '12', '1', '21', '', 0, 'Tomatoes.jpeg', 'Juicy and tangy fruits commonly used as a cooking base or in fresh salads.'),
(338, 7, 'Potatoes', 'Crops', 'Pakil', '', '15', '1', '26', '', 0, 'Potatoes.jpeg', 'Starchy tubers versatile for frying, mashing, or boiling in dishes like stews.'),
(339, 7, 'Carrots', 'Crops', 'Pakil', '', '12', '4', '24', '', 0, 'Carrots.jpeg', 'Crunchy orange vegetables used in soups, stir-fries, and salads for a hint of sweetness.'),
(340, 7, 'Bell Peppers', 'Crops', 'Siniloan', '', '15', '5', '31', '', 0, 'Bell Peppers.jpeg', 'Sweet and colorful vegetables used to add flavor and vibrancy to dishes like menudo and afritada.'),
(341, 7, 'Pechay (Bok Choy)', 'Crops', 'Cavinti', '', '30', '2', '13', '', 0, 'Pechay (Bok Choy).jpeg', 'A leafy green vegetable often added to soups or stir-fries for its mild flavor.'),
(342, 7, 'Cabbage', 'Crops', 'Calamba', '', '26', '1', '33', '', 0, 'Cabbage.jpeg', 'A crunchy vegetable used in soups, stir-fries, or as a fresh side dish in salads.'),
(343, 7, 'Radish (Labanos)', 'Crops', 'Rizal', '', '48', '9', '14', '', 0, 'Radish (Labanos).jpeg', 'A white, crunchy root vegetable often used in sinigang.'),
(344, 7, 'Guava (Bayabas)', 'Fruits', 'Famy', '', '11', '6', '10', '', 0, 'Guava (Bayabas).jpeg', 'A tropical fruit with a sweet, tangy flavor, often eaten fresh or used in jams.'),
(345, 7, 'Pomelo (Suha)', 'Fruits', 'Rizal', '', '32', '14', '23', '', 0, 'Pomelo (Suha).jpeg', 'A large citrus fruit with a sweet, slightly tart flesh, often enjoyed fresh.'),
(346, 7, 'Banana (Saging)', 'Fruits', 'Kalayaan', '', '50', '8', '34', '', 0, 'Banana (Saging).jpeg', 'A staple fruit with a naturally sweet taste, consumed fresh or cooked as minatamis na saging.'),
(347, 7, 'Jackfruit (Langka)', 'Fruits', 'Los Baños', '', '31', '14', '30', '', 0, 'Jackfruit (Langka).jpeg', 'A large tropical fruit with sweet, yellow flesh, often used in desserts or as a meat substitute in savory dishes.'),
(348, 7, 'Avocado', 'Fruits', 'Famy', '', '21', '1', '40', '', 0, 'Avocado.jpeg', 'A creamy fruit often used in smoothies or salads.'),
(349, 7, 'Calamansi', 'Fruits', 'Majayjay', '', '50', '3', '24', '', 0, 'Calamansi.jpeg', 'A small, tart citrus fruit used as a condiment or for making refreshing drinks.'),
(350, 7, 'Coconut (Buko)', 'Fruits', 'Cavinti', '', '28', '4', '37', '', 0, 'Coconut (Buko).jpeg', 'The fruit of the coconut palm, used for its water, meat, or as milk in cooking.'),
(351, 7, 'Melon', 'Fruits', 'Famy', '', '50', '5', '30', '', 0, 'Melon.jpeg', 'A sweet and juicy fruit often eaten fresh or used in beverages.'),
(352, 7, 'Watermelon', 'Fruits', 'Pila', '', '30', '15', '32', '', 0, 'Watermelon.jpeg', 'A hydrating, sweet fruit with a vibrant red interior.'),
(353, 7, 'Dragon Fruit', 'Fruits', 'Liliw', '', '42', '15', '29', '', 0, 'Dragon Fruit.jpeg', 'A visually striking fruit with a mildly sweet taste and crunchy seeds.'),
(354, 7, 'Chicken Breast', 'Meats', 'Mabitac', '', '37', '1', '16', '', 0, 'Chicken Breast.jpeg', 'A lean cut of chicken meat, popular for grilling or frying.'),
(355, 7, 'Chicken Thigh', 'Meats', 'San Pablo', '', '24', '14', '13', '', 0, 'Chicken Thigh.jpeg', 'Juicy, flavorful chicken meat often used in stews and curries.'),
(356, 7, 'Pork Belly (Liempo)', 'Meats', 'Siniloan', '', '36', '10', '11', '', 0, 'Pork Belly (Liempo).jpeg', 'A fatty and flavorful pork cut used in dishes like lechon kawali and adobo.'),
(357, 7, 'Ground Pork', 'Meats', 'Rizal', '', '25', '7', '22', '', 0, 'Ground Pork.jpeg', 'Minced pork commonly used in dishes like meatballs and giniling.'),
(358, 7, 'Beef Ribs', 'Meats', 'San Pablo', '', '10', '10', '31', '', 0, 'Beef Ribs.jpeg', 'Meaty ribs often used in soups like bulalo or grilled as barbecue.'),
(359, 7, 'Beef Shank', 'Meats', 'Pagsanjan', '', '39', '8', '11', '', 0, 'Beef Shank.jpeg', 'A tender cut of beef used in slow-cooked dishes like nilaga.'),
(360, 7, 'Duck Meat', 'Meats', 'Mabitac', '', '15', '10', '40', '', 0, 'Duck Meat.jpeg', 'A rich and flavorful poultry meat used in festive dishes like itikan adobo.'),
(361, 7, 'Goat Meat (Chevon)', 'Meats', 'Kalayaan', '', '28', '1', '18', '', 0, 'Goat Meat (Chevon).jpeg', 'A lean meat with a unique flavor, often used in dishes like kalderetang kambing.'),
(362, 7, 'Salted Duck Eggs', 'Eggs', 'Rizal', '', '27', '6', '31', '', 0, 'Salted Duck Eggs.jpeg', 'Duck eggs cured in brine for a rich, savory flavor, often paired with tomatoes.'),
(363, 7, 'Crabs', 'Seafoods', 'Pakil', '', '140', '8', '38', '', 0, 'Crabs.jpeg', 'Fresh crustaceans with sweet and succulent meat, often steamed or cooked in coconut milk.'),
(364, 7, 'Shrimps', 'Seafoods', 'Magdalena', '', '200', '5', '56', '', 0, 'Shrimps.jpeg', 'Juicy and flavorful seafood used in various Filipino dishes like halabos na hipon.'),
(365, 7, 'Squid (Pusit)', 'Seafoods', 'Rizal', '', '150', '3', '51', '', 0, 'Squid (Pusit).jpeg', 'Tender seafood used in dishes like adobong pusit or grilled.'),
(366, 7, 'Shellfish (Tahong)', 'Seafoods', 'Pila', '', '200', '8', '24', '', 0, 'Shellfish (Tahong).jpeg', 'Mussels often cooked in coconut milk or sautéed with garlic.'),
(367, 7, 'Clams (Halaan)', 'Seafoods', 'Pangil', '', '180', '7', '26', '', 0, 'Clams (Halaan).jpeg', 'Shellfish with a mild flavor, often used in soups or stews.');

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
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `phone`, `address`, `gender`, `birthdate`, `image`, `password`, `status`, `role`, `id_image`, `is_verified`) VALUES
(1, 'Buyer', 'buyer@gmail.com', '09761162115', 'Dasmarinas Cavite', 'male', '', 'Buyer1.jpg', '123456', 'online', 'buyer', 'Test User 2buyer.png', 1),
(7, 'Seller', 'seller@gmail.com', '09563274292', 'AdsasdadSda', '', '', '', '123456', 'offline', 'seller', 'Test User 1buyer.png', 1),
(8, 'Admin', 'admin@gmail.com', '09563274292', 'AdsasdadSda', '', '', '', '123456', 'offline', 'admin', '', 1);

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
  ADD KEY `Product Relation` (`product_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

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
