-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2020 at 05:26 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `F_ID` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `R_ID` int(30) NOT NULL,
  `images_path` varchar(200) DEFAULT NULL,
  `vegan` tinyint(1) NOT NULL COMMENT '1=>veg,2=>non-veg',
  `status` smallint(2) NOT NULL DEFAULT 1 COMMENT '1=>active,0=>inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`F_ID`, `name`, `price`, `description`, `R_ID`, `images_path`, `vegan`, `status`) VALUES
(58, 'Juicy Masala Paneer Kathi Roll', 40, 'Juicy Masala Paneer Kathi Roll loaded with Masala Paneer chunks, onion & Mayo.', 1, 'images/Masala_Paneer_Kathi_Roll.jpg', 1, 0),
(59, 'Meurig Fish', 60, 'Try Meurig - A whole Pomfret fish grilled with tangy marination & served with grilled onions and tomatoes.', 2, 'images/Meurig.jpg', 2, 0),
(60, 'Chocolate Hazelnut Truffle', 99, 'Lose all senses over this very delicious chocolate hazelnut truffle.', 3, 'images/Chocolate_Hazelnut_Truffle.jpg', 1, 0),
(61, 'Happy Happy Choco Chip Shake', 80, 'Happy Happy Choco Chip Shake - a perfect party sweet treat.', 1, 'images/Happy_Happy_Choco_Chip_Shake.jpg', 1, 0),
(62, 'Spring Rolls', 65, 'Delicious Spring Rolls by Dragon Hut, Delhi. Order now!!!', 2, 'images/Spring_Rolls.jpg', 1, 0),
(63, 'Baahubali Thali', 75, 'Baahubali Thali is accompanied by Kattapa Biriyani, Devasena Paratha, Bhalladeva Patiala Lassi', 3, 'images/Baahubali_Thali.jpg', 2, 0),
(65, 'Coffee', 25, 'concentrated coffee made by forcing pressurized water through finely ground coffee beans.', 4, 'images/coffee.jpg', 1, 0),
(66, 'Tea', 20, 'The simple elixir of tea is of our natural world.', 4, 'images/tea.jpg', 1, 0),
(68, 'Paneer', 85, 'it', 6, 'images/paneer pakora.jpg', 1, 0),
(69, 'Coffee', 25, 'concentrated coffee made by forcing pressurized water through finely ground coffee beans.', 2, 'images/coffee.jpg', 1, 0),
(70, 'Tea', 20, 'The simple elixir of tea is of our natural world.', 2, 'images/tea.jpg', 1, 0),
(71, 'Samosa', 40, 'Cocktail Crispy Samosa..', 2, 'images/samosa.jpg', 1, 0),
(72, 'Paneer Pakora', 45, 'it gives whole new dimension even to the most boring or dull vegetable', 2, 'images/paneer pakora.jpg', 1, 0),
(73, 'Puff', 35, 'Vegetable Puff, a snack with crisp-n-flaky outer layer and mixed vegetables stuffing', 2, 'images/puff.jpg', 1, 0),
(74, 'Pizza', 200, 'Good and Tasty ', 2, 'Pizza.jpg', 1, 0),
(75, 'French Fries', 60, 'Pure Veg and Tasty.', 2, 'frenchfries.jpg', 1, 0),
(76, 'Pakora', 35, 'Pure Vegetable and Tasty.', 2, 'images/Pakora.jpg', 1, 0),
(77, 'Pizza', 200, 'Pure Vegetable and Tasty.', 2, 'images/Pizza.jpg', 1, 0),
(78, 'French Fries', 75, 'Pure Veg and Tasty.', 2, 'images/frenchfries.jpg', 1, 0),
(79, 'Pakora', 45, 'TASTY', 2, 'images/Pakora.jpg', 1, 0),
(80, 'qwertt', 20, '454', 1, 'images/food_items/download.jpg', 1, 1),
(81, 'qwertt', 20, '454', 1, 'images/food_items/Baahubali_Thali.jpg', 1, 1),
(82, 'Pizza', 250, 'Pan Pizza', 1, 'images/food_items/Pizza.jpg', 1, 1),
(83, 'himansu', 200, '5656', 1, 'images/food_items/coffee.jpg', 2, 1),
(84, 'fghf', 0, 'hgj', 1, 'images/food_items/dare2liv.jpg', 1, 1),
(85, 'Himanshu Mehta', 0, 'kjhk', 1, 'images/food_items/download.jpg', 2, 1),
(86, 'sdsd', 10, 'hjj', 1, 'images/food_items/download.jpg', 1, 1),
(87, 'sdsd', 546, 'jhj', 1, 'images/food_items/download.jpg', 5, 1),
(88, 'dfdf', 0, 'khj', 1, 'images\\food_items/download.jpg', 1, 1),
(89, 'djh', 0, 'jhgj', 1, 'images/food_items/download.jpg', 1, 1),
(90, 'dfgd', 0, 'kjhk', 1, 'images/food_items/download.jpg', 1, 1),
(91, 'dfg', 0, 'hkj', 1, 'images/food_items/download.jpg', 2, 1),
(92, 'dfd', 0, 'jhgjgj', 1, 'images/food_items/download.jpg', 1, 1),
(93, 'dfjh', 0, 'jgjgjh', 1, 'images/food_items/download.jpg', 1, 1),
(94, 'dfgd', 0, 'jhgj', 1, 'images/food_items/DSC_0978.JPG', 1, 1),
(95, 'fhgf', 10, 'gfgh', 1, 'images/food_items/IMG_20180831_124124.jpg', 1, 1),
(96, 'hgsj', 500, 'khkn', 1, 'images/food_items/dare2liv.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `R_ID` int(30) NOT NULL,
  `F_ID` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_ID`, `user_id`, `R_ID`, `F_ID`, `quantity`, `order_date`) VALUES
(1, 1, 1, 58, 1, '2020-03-17'),
(2, 0, 1, 61, 2, '2020-03-17'),
(3, 1, 1, 61, 2, '2020-03-17'),
(4, 1, 4, 65, 4, '2020-03-17'),
(5, 1, 1, 58, 7, '2020-03-17'),
(6, 1, 4, 65, 2, '2020-03-17'),
(7, 0, 1, 58, 7, '2020-03-17'),
(8, 1, 4, 65, 2, '2020-03-17'),
(9, 0, 3, 60, 1, '2020-03-17'),
(10, 1, 2, 59, 1, '2020-03-18'),
(11, 0, 3, 60, 1, '2020-03-18'),
(12, 0, 4, 65, 1, '2020-03-18'),
(13, 0, 2, 59, 4, '2020-03-18'),
(14, 0, 1, 58, 1, '2020-03-18'),
(15, 0, 3, 60, 4, '2020-03-18'),
(16, 0, 4, 65, 1, '2020-03-18'),
(17, 0, 4, 66, 7, '2020-03-18'),
(18, 0, 2, 59, 5, '2020-03-18'),
(19, 0, 3, 63, 1, '2020-03-18'),
(20, 0, 6, 68, 1, '2020-03-18'),
(21, 0, 2, 62, 1, '2020-03-18'),
(22, 0, 6, 68, 1, '2020-03-18'),
(23, 0, 2, 62, 1, '2020-03-18'),
(24, 0, 4, 65, 1, '2020-03-18'),
(25, 0, 6, 68, 1, '2020-03-18'),
(26, 0, 2, 59, 6, '2020-03-18'),
(27, 0, 1, 58, 1, '2020-03-18'),
(28, 0, 2, 59, 1, '2020-03-18'),
(29, 0, 1, 58, 1, '2020-03-18'),
(30, 0, 3, 60, 1, '2020-03-18'),
(31, 0, 2, 59, 1, '2020-03-18'),
(32, 0, 1, 61, 1, '2020-03-18'),
(33, 0, 3, 60, 1, '2020-03-18'),
(34, 0, 2, 59, 1, '2020-03-18'),
(35, 0, 1, 61, 1, '2020-03-18'),
(36, 0, 2, 62, 1, '2020-03-18'),
(37, 0, 2, 72, 6, '2020-03-18'),
(38, 0, 2, 78, 7, '2020-03-18'),
(39, 0, 2, 78, 1, '2020-03-18'),
(40, 0, 2, 73, 1, '2020-03-18'),
(41, 0, 2, 77, 2, '2019-03-16'),
(42, 0, 2, 70, 1, '2019-03-16'),
(43, 0, 3, 60, 2, '2019-03-16'),
(44, 0, 2, 70, 1, '2019-03-16'),
(45, 0, 3, 60, 2, '2019-03-16'),
(46, 0, 2, 70, 1, '2019-03-16'),
(47, 0, 3, 60, 2, '2019-03-16'),
(48, 0, 3, 60, 4, '2019-03-25'),
(49, 0, 2, 62, 6, '2019-03-25'),
(50, 0, 2, 70, 5, '2019-03-25'),
(51, 0, 2, 73, 3, '2019-03-25'),
(52, 0, 2, 70, 1, '2019-03-30'),
(53, 0, 3, 60, 5, '2019-03-30'),
(54, 0, 2, 69, 7, '2019-03-30'),
(55, 0, 2, 62, 1, '2019-04-01'),
(56, 0, 2, 70, 4, '2019-04-01'),
(57, 0, 2, 70, 1, '2019-04-01'),
(58, 0, 3, 60, 1, '2019-04-01'),
(59, 0, 2, 59, 6, '2019-04-02'),
(60, 0, 1, 61, 1, '2019-04-02'),
(61, 0, 2, 71, 3, '2019-04-17'),
(62, 0, 2, 70, 4, '2019-04-17'),
(63, 0, 2, 72, 2, '2019-04-17'),
(64, 0, 2, 71, 3, '2019-04-17'),
(65, 0, 2, 70, 4, '2019-04-17'),
(66, 0, 2, 72, 2, '2019-04-17'),
(67, 0, 3, 60, 1, '2019-04-18'),
(68, 0, 2, 71, 1, '2019-04-18'),
(69, 2, 1, 81, 1, '2020-03-18'),
(70, 2, 1, 81, 1, '2020-03-18'),
(71, 2, 1, 81, 1, '2020-03-18'),
(72, 2, 1, 81, 1, '2020-03-18'),
(73, 2, 1, 81, 1, '2020-03-18'),
(74, 2, 1, 82, 1, '2020-03-18'),
(75, 2, 1, 82, 1, '2020-03-18'),
(76, 2, 1, 82, 1, '2020-03-18'),
(77, 2, 1, 82, 1, '2020-03-18'),
(78, 2, 1, 82, 1, '2020-03-18'),
(79, 2, 1, 82, 1, '2020-03-18'),
(80, 2, 1, 82, 1, '2020-03-18'),
(81, 2, 1, 82, 1, '2020-03-18'),
(82, 2, 1, 82, 1, '2020-03-18'),
(83, 2, 1, 82, 1, '2020-03-18'),
(84, 2, 1, 82, 1, '2020-03-18'),
(85, 2, 1, 82, 1, '2020-03-18'),
(86, 2, 1, 82, 1, '2020-03-18'),
(87, 2, 1, 82, 1, '2020-03-18'),
(88, 2, 1, 82, 1, '2020-03-18'),
(89, 2, 1, 81, 1, '2020-03-18'),
(90, 2, 1, 83, 3, '2020-03-18'),
(91, 2, 1, 82, 2, '2020-03-18'),
(92, 2, 2, 69, 1, '2020-03-18'),
(93, 2, 1, 61, 3, '2020-03-17'),
(94, 2, 3, 60, 1, '2020-03-18'),
(95, 2, 1, 61, 1, '2020-03-18');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `user_id`, `name`, `contact`, `email`, `address`) VALUES
(1, 1, 'admin', NULL, NULL, NULL),
(2, 8, '565656', NULL, NULL, NULL),
(3, 9, '565656', NULL, NULL, NULL),
(4, 10, 'jhgjigihjg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_role` smallint(2) NOT NULL COMMENT '1=>customer,2=>Restaurant'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_role`) VALUES
(1, 'admin', '1234', 2),
(2, 'user', '1234', 1),
(3, 'user', '1234', 1),
(4, 'user', '54654', 1),
(5, 'jhjg', '65656', 1),
(6, 'gjgjhgj', '1234', 1),
(7, 'gjgjg', '1234', 1),
(8, '5365', '6565', 2),
(9, 'jgj', '1234', 2),
(10, 'hgj', '1234', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `vegan` int(11) DEFAULT NULL COMMENT '1=>vrg,2=>non-veg,3=>both'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `user_id`, `email`, `contact`, `address`, `vegan`) VALUES
(1, 1, 'admin@gmail.com', 2147483647, 'qwerty', 0),
(2, 2, 'user@gmail.com', 9874556, '45666', 1),
(3, 0, 'jgjghj', 65656, '5656', 1),
(4, 8, '636565', 5656, '65656', 0),
(5, 9, 'ggjh', 566, '656', 0),
(6, 10, 'gjhg', 987456321, 'jhgjhgij', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`F_ID`,`R_ID`),
  ADD KEY `R_ID` (`R_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `F_ID` (`F_ID`),
  ADD KEY `R_ID` (`R_ID`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `F_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
