-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2025 at 12:11 PM
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

--
-- Dumping data for table `audit_log`
--

INSERT INTO `audit_log` (`id`, `seller_id`, `product_name`, `price`, `type`, `datetime`) VALUES
(9, 7, 'Shellfish (Tahong)', 200, 'complete', '2025-03-12 15:49:21');

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
(31, 321, 'Buyer', '1', 'Cash on Delivery', '81', '', 'pay', '', '2024-12-03 10:39:52'),
(32, 367, 'Buyer', '3', 'Cash on Delivery', '539', '', 'pay', '', '2025-03-11 16:06:24'),
(33, 366, 'Buyer', '3', 'Cash on Delivery', '590', '', 'complete', '', '2025-03-11 16:06:24'),
(34, 309, 'Buyer', '3', 'Cash on Delivery', '137', '', 'pay', '', '2025-03-11 16:06:24'),
(35, 366, 'Buyer', '4', 'Cash on Delivery', '774', '', 'complete', '', '2025-03-12 15:44:16');

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
  `description` text NOT NULL,
  `minimum_kilo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `seller_id`, `name`, `type`, `location`, `brand`, `price`, `discount`, `current_stock`, `next_month_stock`, `available`, `sold`, `image`, `description`, `minimum_kilo`) VALUES
(308, 7, 'Upo (Bottle Gourd)', 'Crops', 'Pakil', '', '11', '8', '38', '38', 1, 0, 'Upo (Bottle Gourd).jpeg', 'Bottle gourd, typically weighs 1-2 kilos each, with 1-2 pieces per kilo. Ideal for soups and stir-fries. Rich in vitamins and minerals, it is a staple in many Asian cuisines. Its mild flavor makes it versatile for both savory and sweet dishes. It is also known for its high water content, making it hydrating and low in calories.', 4),
(309, 7, 'Ampalaya (Bitter Gourd)', 'Crops', 'Nagcarlan', '', '35', '6', '16', '16', 1, 0, 'Ampalaya (Bitter Gourd).jpeg', 'Bitter gourd, approximately 200-300 grams each, with 3-4 pieces per kilo. Known for its health benefits, it is rich in antioxidants and helps regulate blood sugar levels. Its bitter taste can be balanced with spices and other ingredients. Commonly used in traditional medicine, it is also a popular ingredient in stir-fries and soups. It is a great addition to a healthy diet.', 4),
(310, 7, 'Sitaw (String Beans)', 'Crops', 'Liliw', '', '50', '1', '38', '38', 1, 0, 'Sitaw (String Beans).jpeg', 'String beans, about 20-30 cm long, with 100-120 pieces per kilo. Commonly used in Filipino dishes like adobo and sinigang. They are rich in fiber, vitamins, and minerals, promoting digestive health. Their crisp texture adds a delightful crunch to any meal. They are easy to grow and widely available in local markets.', 3),
(311, 7, 'Okra', 'Crops', 'Calamba', '', '49', '11', '33', '33', 1, 0, 'Okra.jpeg', 'Okra, 8-10 cm long, with 30-40 pieces per kilo. Often used in soups and stews for its slimy texture, which thickens dishes naturally. It is a good source of vitamins C and K, as well as fiber. Okra is also known for its antioxidant properties and ability to support heart health. Its unique texture and flavor make it a favorite in many cuisines.', 5),
(312, 7, 'Talong (Eggplant)', 'Crops', 'Pangil', '', '18', '1', '14', '14', 1, 0, 'Talong (Eggplant).jpeg', 'Eggplant, 15-20 cm long, with 4-6 pieces per kilo. Versatile for grilling, frying, or stewing, it is a staple in many dishes. Rich in fiber and antioxidants, it supports heart health and digestion. Its spongy texture absorbs flavors well, making it ideal for savory dishes. Eggplant is also low in calories, making it a healthy choice for weight management.', 5),
(313, 7, 'Lanzones', 'Fruits', 'Calamba', '', '37', '9', '16', '16', 1, 0, 'Lanzones.jpeg', 'Lanzones, small round fruit, with 40-50 pieces per kilo. Sweet and tangy, perfect for fresh consumption. They are rich in vitamins and minerals, particularly vitamin C and potassium. Lanzones are often enjoyed as a snack or dessert. Their unique flavor and juicy texture make them a favorite during the harvest season.', 3),
(314, 7, 'Rambutan', 'Fruits', 'Pakil', '', '26', '10', '23', '23', 1, 0, 'Rambutan.jpeg', 'Rambutan, spiky red fruit, with 20-25 pieces per kilo. Juicy and sweet, similar to lychee. It is rich in vitamin C and antioxidants, boosting the immune system. Rambutan is often eaten fresh or used in fruit salads. Its exotic appearance and refreshing taste make it a popular tropical fruit.', 3),
(315, 7, 'Mango', 'Fruits', 'Majayjay', '', '20', '8', '24', '24', 1, 0, 'Mango.jpeg', 'Mango, 300-400 grams each, with 2-3 pieces per kilo. Sweet and tangy, ideal for desserts or fresh eating. Known as the \"king of fruits,\" it is rich in vitamins A and C. Mangoes are also a good source of dietary fiber and antioxidants. Their rich flavor and creamy texture make them a favorite in smoothies and salads.', 3),
(316, 7, 'Papaya', 'Fruits', 'Pagsanjan', '', '13', '7', '20', '20', 1, 0, 'Papaya.jpeg', 'Papaya, 1-2 kilos each, with 1 piece per kilo. Mildly sweet, used in salads or smoothies. It is rich in vitamins C and A, promoting skin health and immunity. Papaya also contains digestive enzymes that aid in digestion. Its vibrant color and tropical flavor make it a popular fruit worldwide.', 5),
(317, 7, 'Pineapple', 'Fruits', 'Kalayaan', '', '23', '7', '38', '38', 1, 0, 'Pineapple.jpeg', 'Pineapple, 1.5-2 kilos each, with 1 piece per kilo. Sweet-tart flavor, great for desserts or savory dishes. It is rich in vitamin C and manganese, supporting bone health and immunity. Pineapple also contains bromelain, an enzyme that aids in digestion. Its juicy and refreshing taste makes it a favorite in tropical cuisines.', 5),
(318, 7, 'Rice', 'Crops', 'Los Baños', '', '41', '6', '15', '15', 1, 0, 'Rice.jpeg', 'Rice, 1-kilo packs. A staple grain, commonly steamed or fried. It is a primary source of carbohydrates, providing energy for daily activities. Rice is also gluten-free, making it suitable for those with gluten intolerance. Its versatility makes it a key ingredient in countless dishes worldwide.', 4),
(319, 7, 'Free-range Chicken', 'Meats', 'Pakil', '', '32', '8', '24', '24', 1, 0, 'Free-range Chicken.jpeg', 'Free-range chicken, 1-1.5 kilos each. Lean and flavorful, ideal for grilling or stewing. Raised in natural environments, it is often considered healthier than conventionally raised chicken. It is rich in protein and essential nutrients, supporting muscle growth and repair. Its robust flavor makes it a favorite in many traditional dishes.', 4),
(320, 7, 'Pork', 'Meats', 'Liliw', '', '37', '14', '17', '17', 1, 0, 'Pork.jpeg', 'Pork, 1-kilo packs. Versatile meat for dishes like adobo or lechon. It is rich in protein, vitamins, and minerals, supporting overall health. Pork is also a good source of thiamine, which is essential for energy metabolism. Its rich flavor and tender texture make it a staple in many cuisines.', 3),
(321, 7, 'Beef', 'Meats', 'Pagsanjan', '', '50', '15', '15', '15', 1, 0, 'Beef.jpeg', 'Beef, 1-kilo packs. Rich in protein, used in soups or stews. It is a great source of iron, zinc, and B vitamins, supporting muscle growth and immune function. Beef is also known for its rich, savory flavor, making it a favorite in hearty dishes. Its versatility allows it to be used in a variety of cooking methods.', 3),
(322, 7, 'Duck Eggs', 'Eggs', 'Paete', '', '39', '1', '20', '20', 1, 0, 'Duck Eggs.jpeg', 'Duck eggs, 70-80 grams each, with 12-15 pieces per kilo. Richer yolk, used in balut or salted eggs. They are higher in fat and protein compared to chicken eggs, making them more nutritious. Duck eggs are also a good source of vitamin B12 and selenium. Their unique flavor and texture make them a delicacy in many cultures.', 5),
(323, 7, 'Chicken Eggs', 'Eggs', 'Lumban', '', '41', '1', '30', '30', 1, 0, 'Chicken Eggs.jpeg', 'Chicken eggs, 50-60 grams each, with 16-18 pieces per kilo. Versatile for cooking or baking. They are a great source of high-quality protein and essential nutrients like choline and vitamin D. Eggs are also known for their affordability and ease of preparation. Their versatility makes them a staple in many households.', 4),
(324, 7, 'Tilapia', 'Fishes', 'Paete', '', '18', '11', '30', '30', 1, 0, 'Tilapia.jpeg', 'Tilapia, 300-400 grams each, with 2-3 pieces per kilo. Freshwater fish, commonly grilled or fried. It is a good source of lean protein and omega-3 fatty acids, supporting heart health. Tilapia is also low in calories, making it a healthy choice for weight management. Its mild flavor and firm texture make it a favorite in many dishes.', 5),
(325, 7, 'Freshwater Prawns', 'Seafoods', 'Nagcarlan', '', '43', '14', '36', '36', 1, 0, 'Freshwater Prawns.jpeg', 'Freshwater prawns, 50-60 grams each, with 16-20 pieces per kilo. Sweet and succulent, ideal for grilling. They are rich in protein and low in fat, making them a healthy seafood option. Prawns are also a good source of selenium and vitamin B12. Their delicate flavor and tender texture make them a popular choice in many cuisines.', 5),
(326, 7, 'Bangus', 'Fishes', 'Pila', '', '37', '6', '34', '34', 1, 0, 'Bangus.jpeg', 'Bangus, 500-700 grams each, with 1-2 pieces per kilo. National fish of the Philippines, often fried or grilled. It is rich in omega-3 fatty acids, promoting heart health. Bangus is also a good source of protein and essential vitamins. Its tender flesh and mild flavor make it a favorite in Filipino households.', 5),
(327, 7, 'Kalabasa (Squash)', 'Crops', 'Magdalena', '', '49', '13', '37', '37', 1, 0, 'Kalabasa (Squash).jpeg', 'Squash, 1-2 kilos each, with 1 piece per kilo. Sweet and orange-fleshed, used in stews or soups. It is rich in vitamins A and C, supporting eye health and immunity. Squash is also a good source of fiber, aiding in digestion. Its versatility and sweet flavor make it a popular ingredient in both savory and sweet dishes.', 3),
(328, 7, 'Malunggay (Moringa Leaves)', 'Crops', 'Mabitac', '', '43', '13', '17', '17', 1, 0, 'Malunggay (Moringa Leaves).jpeg', 'Moringa leaves, sold in 100-gram bundles. Nutrient-rich, added to soups or salads. They are packed with vitamins, minerals, and antioxidants, promoting overall health. Moringa is also known for its anti-inflammatory and blood sugar-regulating properties. Its mild, slightly bitter flavor makes it a versatile addition to many dishes.', 3),
(329, 7, 'Kangkong (Water Spinach)', 'Crops', 'Nagcarlan', '', '49', '12', '12', '12', 1, 0, 'Kangkong (Water Spinach).jpeg', 'Water spinach, sold in 200-gram bundles. Tender stems and leaves, ideal for stir-fries. It is rich in iron, vitamins, and antioxidants, supporting blood health and immunity. Water spinach is also low in calories, making it a healthy choice for weight management. Its mild flavor and crisp texture make it a favorite in Asian cuisines.', 4),
(330, 7, 'Kamote Tops (Sweet Potato Leaves)', 'Crops', 'Nagcarlan', '', '12', '2', '15', '15', 1, 0, 'Kamote Tops (Sweet Potato Leaves).jpeg', 'Sweet potato leaves, sold in 200-gram bundles. Commonly boiled or used in salads. They are rich in vitamins A and C, promoting eye health and immunity. Sweet potato leaves are also a good source of fiber, aiding in digestion. Their tender texture and mild flavor make them a versatile ingredient in many dishes.', 3),
(331, 7, 'Gabi (Taro)', 'Crops', 'Famy', '', '37', '1', '32', '32', 1, 0, 'Gabi (Taro).jpeg', 'Taro, 300-500 grams each, with 2-3 pieces per kilo. Starchy root vegetable, used in soups or desserts. It is rich in fiber, vitamins, and minerals, supporting digestive health. Taro is also known for its antioxidant properties, promoting overall health. Its nutty flavor and creamy texture make it a favorite in many cuisines.', 4),
(332, 7, 'Sayote (Chayote)', 'Crops', 'Mabitac', '', '50', '9', '33', '33', 1, 0, 'Sayote (Chayote).jpeg', 'Chayote, 200-300 grams each, with 3-4 pieces per kilo. Mild flavor, used in sautéed dishes or soups. It is rich in vitamins and minerals, particularly vitamin C and folate. Chayote is also low in calories, making it a healthy choice for weight management. Its crisp texture and mild flavor make it a versatile ingredient in many dishes.', 4),
(333, 7, 'Singkamas (Jicama)', 'Crops', 'Liliw', '', '41', '5', '27', '27', 1, 0, 'Singkamas (Jicama).jpeg', 'Jicama, 300-400 grams each, with 2-3 pieces per kilo. Crisp and sweet, eaten raw or in salads. It is rich in fiber, vitamins, and minerals, supporting digestive health. Jicama is also low in calories, making it a healthy snack option. Its refreshing taste and crunchy texture make it a favorite in many cuisines.', 4),
(334, 7, 'Red Onion', 'Crops', 'Cavinti', '', '25', '1', '36', '36', 1, 0, 'Red Onion.jpeg', 'Red onion, 100-150 grams each, with 6-8 pieces per kilo. Pungent, used as a base for sautéing. It is rich in antioxidants and anti-inflammatory compounds, promoting overall health. Red onions are also a good source of vitamin C and fiber. Their bold flavor and vibrant color make them a staple in many dishes.', 4),
(335, 7, 'White Onion', 'Crops', 'Rizal', '', '21', '13', '19', '19', 1, 0, 'White Onion.jpeg', 'White onion, 100-150 grams each, with 6-8 pieces per kilo. Milder flavor, used in soups or stews. It is rich in vitamins and minerals, particularly vitamin C and folate. White onions are also known for their antioxidant properties, supporting immune health. Their mild flavor and versatility make them a key ingredient in many cuisines.', 3),
(336, 7, 'Garlic', 'Crops', 'Majayjay', '', '28', '6', '17', '17', 1, 0, 'Garlic.jpeg', 'Garlic, 20-30 grams per bulb, with 30-40 pieces per kilo. Fragrant, used for savory dishes. It is rich in antioxidants and anti-inflammatory compounds, promoting heart health. Garlic is also known for its immune-boosting properties. Its pungent flavor and aroma make it a staple in many cuisines worldwide.', 5),
(337, 7, 'Tomatoes', 'Crops', 'Pagsanjan', '', '12', '1', '21', '21', 1, 0, 'Tomatoes.jpeg', 'Tomatoes, 100-150 grams each, with 6-8 pieces per kilo. Juicy and tangy, used in salads or cooking. They are rich in vitamins A and C, promoting skin health and immunity. Tomatoes are also a good source of lycopene, an antioxidant that supports heart health. Their vibrant color and refreshing taste make them a favorite in many dishes.', 3),
(338, 7, 'Potatoes', 'Crops', 'Pakil', '', '15', '1', '26', '26', 1, 0, 'Potatoes.jpeg', 'Potatoes, 200-300 grams each, with 3-4 pieces per kilo. Versatile for frying, mashing, or boiling. They are rich in carbohydrates, providing energy for daily activities. Potatoes are also a good source of vitamin C and potassium. Their mild flavor and starchy texture make them a staple in many cuisines.', 5),
(339, 7, 'Carrots', 'Crops', 'Pakil', '', '12', '4', '24', '24', 1, 0, 'Carrots.jpeg', 'Carrots, 100-150 grams each, with 6-8 pieces per kilo. Crunchy and sweet, used in soups or salads. They are rich in beta-carotene, promoting eye health. Carrots are also a good source of fiber, aiding in digestion. Their vibrant color and sweet flavor make them a favorite in many dishes.', 3),
(340, 7, 'Bell Peppers', 'Crops', 'Siniloan', '', '15', '5', '31', '31', 1, 0, 'Bell Peppers.jpeg', 'Bell peppers, 150-200 grams each, with 4-6 pieces per kilo. Sweet and colorful, used in stir-fries. They are rich in vitamins A and C, promoting skin health and immunity. Bell peppers are also low in calories, making them a healthy choice for weight management. Their vibrant colors and crisp texture make them a favorite in many cuisines.', 4),
(341, 7, 'Pechay (Bok Choy)', 'Crops', 'Cavinti', '', '30', '2', '13', '13', 1, 0, 'Pechay (Bok Choy).jpeg', 'Bok choy, sold in 200-gram bundles. Leafy green, used in soups or stir-fries. It is rich in vitamins A and C, promoting eye health and immunity. Bok choy is also a good source of calcium, supporting bone health. Its tender leaves and crisp stems make it a versatile ingredient in many dishes.', 3),
(342, 7, 'Cabbage', 'Crops', 'Calamba', '', '26', '1', '33', '33', 1, 0, 'Cabbage.jpeg', 'Cabbage, 1-1.5 kilos each, with 1 piece per kilo. Crunchy, used in soups or salads. It is rich in vitamins C and K, promoting immune and bone health. Cabbage is also low in calories, making it a healthy choice for weight management. Its mild flavor and versatility make it a staple in many cuisines.', 4),
(343, 7, 'Radish (Labanos)', 'Crops', 'Rizal', '', '48', '9', '14', '14', 1, 0, 'Radish (Labanos).jpeg', 'Radish, 200-300 grams each, with 3-4 pieces per kilo. Crunchy, used in sinigang. It is rich in vitamin C and fiber, promoting digestive health. Radishes are also known for their detoxifying properties. Their peppery flavor and crisp texture make them a favorite in many dishes.', 4),
(344, 7, 'Guava (Bayabas)', 'Fruits', 'Famy', '', '11', '6', '10', '10', 1, 0, 'Guava (Bayabas).jpeg', 'Guava, 100-150 grams each, with 6-8 pieces per kilo. Sweet and tangy, eaten fresh or in jams. It is rich in vitamin C, promoting immune health. Guava is also a good source of dietary fiber, aiding in digestion. Its unique flavor and nutritional benefits make it a favorite in many cuisines.', 4),
(345, 7, 'Pomelo (Suha)', 'Fruits', 'Rizal', '', '32', '14', '23', '23', 1, 0, 'Pomelo (Suha).jpeg', 'Pomelo, 1-1.5 kilos each, with 1 piece per kilo. Sweet and slightly tart, enjoyed fresh. It is rich in vitamin C, promoting immune health. Pomelo is also a good source of fiber, aiding in digestion. Its refreshing taste and juicy texture make it a favorite in many cuisines.', 5),
(346, 7, 'Banana (Saging)', 'Fruits', 'Kalayaan', '', '50', '8', '34', '34', 1, 0, 'Banana (Saging).jpeg', 'Banana, 100-150 grams each, with 6-8 pieces per kilo. Sweet, eaten fresh or cooked. It is rich in potassium, promoting heart health. Bananas are also a good source of dietary fiber, aiding in digestion. Their natural sweetness and creamy texture make them a favorite in many dishes.', 5),
(347, 7, 'Jackfruit (Langka)', 'Fruits', 'Los Baños', '', '31', '14', '30', '30', 1, 0, 'Jackfruit (Langka).jpeg', 'Jackfruit, 5-10 kilos each, with 1 piece per 5 kilos. Sweet flesh, used in desserts or savory dishes. It is rich in vitamins and minerals, particularly vitamin C and potassium. Jackfruit is also a good source of dietary fiber, aiding in digestion. Its unique flavor and versatility make it a favorite in many cuisines.', 5),
(348, 7, 'Avocado', 'Fruits', 'Famy', '', '21', '1', '40', '40', 1, 0, 'Avocado.jpeg', 'Avocado, 200-300 grams each, with 3-4 pieces per kilo. Creamy, used in smoothies or salads. It is rich in healthy fats, promoting heart health. Avocado is also a good source of vitamins E and K, supporting skin and bone health. Its rich flavor and creamy texture make it a favorite in many dishes.', 5),
(349, 7, 'Calamansi', 'Fruits', 'Majayjay', '', '50', '3', '24', '24', 1, 0, 'Calamansi.jpeg', 'Calamansi, 20-30 grams each, with 30-40 pieces per kilo. Tart, used as a condiment or in drinks. It is rich in vitamin C, promoting immune health. Calamansi is also known for its detoxifying properties. Its tangy flavor and refreshing taste make it a favorite in many cuisines.', 3),
(350, 7, 'Coconut (Buko)', 'Fruits', 'Cavinti', '', '28', '4', '37', '37', 1, 0, 'Coconut (Buko).jpeg', 'Coconut, 1-1.5 kilos each, with 1 piece per kilo. Used for water, meat, or milk. It is rich in healthy fats, promoting heart health. Coconut is also a good source of fiber, aiding in digestion. Its refreshing water and creamy flesh make it a favorite in many cuisines.', 3),
(351, 7, 'Melon', 'Fruits', 'Famy', '', '50', '5', '30', '30', 1, 0, 'Melon.jpeg', 'Melon, 1-1.5 kilos each, with 1 piece per kilo. Sweet and juicy, eaten fresh. It is rich in vitamins A and C, promoting skin health and immunity. Melon is also low in calories, making it a healthy choice for weight management. Its refreshing taste and hydrating properties make it a favorite in many cuisines.', 5),
(352, 7, 'Watermelon', 'Fruits', 'Pila', '', '30', '15', '32', '32', 1, 0, 'Watermelon.jpeg', 'Watermelon, 3-5 kilos each, with 1 piece per 3 kilos. Hydrating and sweet. It is rich in vitamins A and C, promoting skin health and immunity. Watermelon is also low in calories, making it a healthy choice for weight management. Its refreshing taste and high water content make it a favorite in many cuisines.', 5),
(353, 7, 'Dragon Fruit', 'Fruits', 'Liliw', '', '42', '15', '29', '29', 1, 0, 'Dragon Fruit.jpeg', 'Dragon fruit, 300-400 grams each, with 2-3 pieces per kilo. Mildly sweet, with crunchy seeds. It is rich in antioxidants, promoting overall health. Dragon fruit is also a good source of fiber, aiding in digestion. Its vibrant color and unique texture make it a favorite in many cuisines.', 4),
(354, 7, 'Chicken Breast', 'Meats', 'Mabitac', '', '37', '1', '16', '16', 1, 0, 'Chicken Breast.jpeg', 'Chicken breast, 200-300 grams each, with 3-4 pieces per kilo. Lean, ideal for grilling or frying. It is rich in protein, supporting muscle growth and repair. Chicken breast is also low in fat, making it a healthy choice for weight management. Its mild flavor and versatility make it a staple in many cuisines.', 3),
(355, 7, 'Chicken Thigh', 'Meats', 'San Pablo', '', '24', '14', '13', '13', 1, 0, 'Chicken Thigh.jpeg', 'Chicken thigh, 150-200 grams each, with 4-6 pieces per kilo. Juicy, used in stews or curries. It is rich in protein and essential nutrients, supporting muscle growth and repair. Chicken thigh is also known for its rich flavor and tender texture. Its versatility makes it a favorite in many dishes.', 5),
(356, 7, 'Pork Belly (Liempo)', 'Meats', 'Siniloan', '', '36', '10', '11', '11', 1, 0, 'Pork Belly (Liempo).jpeg', 'Pork belly, 500-700 grams each, with 1-2 pieces per kilo. Fatty and flavorful, used in adobo or lechon. It is rich in protein and essential nutrients, supporting overall health. Pork belly is also known for its rich flavor and tender texture. Its versatility makes it a favorite in many cuisines.', 3),
(357, 7, 'Ground Pork', 'Meats', 'Rizal', '', '25', '7', '22', '22', 1, 0, 'Ground Pork.jpeg', 'Ground pork, sold in 1-kilo packs. Used in meatballs or giniling. It is rich in protein and essential nutrients, supporting muscle growth and repair. Ground pork is also known for its rich flavor and versatility. Its ease of preparation makes it a staple in many households.', 5),
(358, 7, 'Beef Ribs', 'Meats', 'San Pablo', '', '10', '10', '31', '31', 1, 0, 'Beef Ribs.jpeg', 'Beef ribs, 500-700 grams each, with 1-2 pieces per kilo. Meaty, used in soups or grilled. It is rich in protein and essential nutrients, supporting muscle growth and repair. Beef ribs are also known for their rich flavor and tender texture. Their versatility makes them a favorite in many cuisines.', 5),
(359, 7, 'Beef Shank', 'Meats', 'Pagsanjan', '', '39', '8', '11', '11', 1, 0, 'Beef Shank.jpeg', 'Beef shank, 500-700 grams each, with 1-2 pieces per kilo. Tender, used in slow-cooked dishes. It is rich in protein and essential nutrients, supporting muscle growth and repair. Beef shank is also known for its rich flavor and tender texture. Its versatility makes it a favorite in many cuisines.', 4),
(360, 7, 'Duck Meat', 'Meats', 'Mabitac', '', '15', '10', '40', '40', 1, 0, 'Duck Meat.jpeg', 'Duck meat, 1-1.5 kilos each, with 1 piece per kilo. Rich and flavorful, used in festive dishes. It is rich in protein and essential nutrients, supporting muscle growth and repair. Duck meat is also known for its rich flavor and tender texture. Its unique taste makes it a favorite in many cuisines.', 5),
(361, 7, 'Goat Meat (Chevon)', 'Meats', 'Kalayaan', '', '28', '1', '18', '18', 1, 0, 'Goat Meat (Chevon).jpeg', 'Goat meat, 1-1.5 kilos each, with 1 piece per kilo. Lean and unique in flavor, used in kaldereta. It is rich in protein and essential nutrients, supporting muscle growth and repair. Goat meat is also known for its rich flavor and tender texture. Its unique taste makes it a favorite in many cuisines.', 3),
(362, 7, 'Salted Duck Eggs', 'Eggs', 'Rizal', '', '27', '6', '31', '31', 1, 0, 'Salted Duck Eggs.jpeg', 'Salted duck eggs, 70-80 grams each, with 12-15 pieces per kilo. Rich and savory, paired with tomatoes. They are higher in fat and protein compared to chicken eggs, making them more nutritious. Salted duck eggs are also a good source of vitamin B12 and selenium. Their unique flavor and texture make them a delicacy in many cultures.', 4),
(363, 7, 'Crabs', 'Seafoods', 'Pakil', '', '140', '8', '38', '38', 1, 0, 'Crabs.jpeg', 'Crabs, 300-400 grams each, with 2-3 pieces per kilo. Sweet and succulent, often steamed. They are rich in protein and essential nutrients, supporting muscle growth and repair. Crabs are also a good source of omega-3 fatty acids, promoting heart health. Their delicate flavor and tender texture make them a favorite in many cuisines.', 5),
(364, 7, 'Shrimps', 'Seafoods', 'Magdalena', '', '200', '5', '56', '56', 1, 0, 'Shrimps.jpeg', 'Shrimps, 20-30 grams each, with 30-40 pieces per kilo. Juicy and flavorful, used in various dishes. They are rich in protein and low in fat, making them a healthy seafood option. Shrimps are also a good source of selenium and vitamin B12. Their delicate flavor and tender texture make them a popular choice in many cuisines.', 4),
(365, 7, 'Squid (Pusit)', 'Seafoods', 'Rizal', '', '150', '3', '51', '51', 1, 0, 'Squid (Pusit).jpeg', 'Squid, 200-300 grams each, with 3-4 pieces per kilo. Tender, used in adobo or grilled. It is rich in protein and essential nutrients, supporting muscle growth and repair. Squid is also a good source of omega-3 fatty acids, promoting heart health. Its mild flavor and tender texture make it a favorite in many cuisines.', 3),
(366, 7, 'Shellfish (Tahong)', 'Seafoods', 'Pila', '', '200', '8', '23', '24', 1, 0, 'Shellfish (Tahong).jpeg', 'Mussels, 50-60 grams each, with 16-20 pieces per kilo. Often cooked in coconut milk or sautéed. They are rich in protein and essential nutrients, supporting muscle growth and repair. Mussels are also a good source of omega-3 fatty acids, promoting heart health. Their delicate flavor and tender texture make them a favorite in many cuisines.', 4),
(367, 7, 'Clams (Halaan)', 'Seafoods', 'Pangil', '', '180', '7', '26', '26', 1, 0, 'Clams (Halaan).jpeg', 'Clams, 50-60 grams each, with 16-20 pieces per kilo. Mild flavor, used in soups or stews. They are rich in protein and essential nutrients, supporting muscle growth and repair. Clams are also a good source of omega-3 fatty acids, promoting heart health. Their delicate flavor and tender texture make them a favorite in many cuisines.', 3);

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
(1, 'Buyer', 'buyer@gmail.com', '09761162115', 'Dasmarinas Cavite', 'male', '', 'Buyer1.jpg', '123456', 'online', 'buyer', 'Test User 2buyer.png', 'Test User 2buyer.png', 1),
(7, 'Seller', 'seller@gmail.com', '09563274292', 'AdsasdadSda', '', '', '', '123456', 'online', 'seller', 'Test User 1buyer.png', 'Test User 1buyer.png', 1),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
