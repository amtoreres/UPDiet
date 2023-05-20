-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2023 at 08:21 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `updiet`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_cart`
--

CREATE TABLE `customer_cart` (
  `u_id` int(222) NOT NULL,
  `menu_id` int(222) NOT NULL,
  `quantity` int(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_info`
--

CREATE TABLE `customer_info` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `prof_pic` varchar(222) DEFAULT NULL,
  `c_num` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_info`
--

INSERT INTO `customer_info` (`u_id`, `username`, `join_date`, `prof_pic`, `c_num`) VALUES
(1, 'Kyle Enorio', '2023-04-04 09:43:26', 'uploads/img/user/prof-pic/1', '09999999999'),
(17, 'John Doe', '2023-05-18 05:52:42', NULL, '09999999999');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `t_id` int(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `u_id` int(222) NOT NULL,
  `item_count` int(222) NOT NULL,
  `location` varchar(222) NOT NULL,
  `remarks` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`t_id`, `date`, `u_id`, `item_count`, `location`, `remarks`) VALUES
(44, '2023-05-18 07:24:10', 1, 2, 'Miagos', '');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_info`
--

CREATE TABLE `purchase_info` (
  `t_id` int(222) NOT NULL,
  `order_status` varchar(222) NOT NULL,
  `food_name` varchar(222) NOT NULL,
  `store_name` varchar(222) NOT NULL,
  `price` decimal(65,2) NOT NULL,
  `quantity` int(222) NOT NULL,
  `food_img` varchar(222) NOT NULL,
  `store_id` int(222) NOT NULL,
  `menu_id` int(222) NOT NULL,
  `ti_id` int(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_info`
--

INSERT INTO `purchase_info` (`t_id`, `order_status`, `food_name`, `store_name`, `price`, `quantity`, `food_img`, `store_id`, `menu_id`, `ti_id`) VALUES
(44, 'Pending', 'Chicken Adobo', 'Manang Betch', '45.00', 1, 'uploads/img/store/menu/2/29', 2, 29, 17),
(44, 'Pending', 'Rice', 'Store 2', '15.00', 1, 'uploads/img/store/menu/18/39', 18, 39, 18);

-- --------------------------------------------------------

--
-- Table structure for table `store_info`
--

CREATE TABLE `store_info` (
  `u_id` int(222) NOT NULL,
  `location` varchar(222) NOT NULL,
  `is_published` int(222) NOT NULL DEFAULT 0,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `prof_pic` varchar(222) DEFAULT NULL,
  `prof_cover` varchar(222) DEFAULT NULL,
  `name` varchar(222) NOT NULL,
  `c_num` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_info`
--

INSERT INTO `store_info` (`u_id`, `location`, `is_published`, `join_date`, `prof_pic`, `prof_cover`, `name`, `c_num`) VALUES
(2, 'Bulwagang Lean Alejandrino (CUB)', 1, '2023-04-04 17:44:21', 'uploads/img/store/prof_pic/2', 'uploads/img/store/prof_cover/2', 'Manang Betch', '09123456789'),
(18, 'CUB', 1, '2023-05-18 07:00:31', 'uploads/img/store/prof_pic/18', 'uploads/img/store/prof_cover/18', 'Store 2', '09999999999');

-- --------------------------------------------------------

--
-- Table structure for table `store_menu`
--

CREATE TABLE `store_menu` (
  `menu_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `name` varchar(222) NOT NULL,
  `type` varchar(222) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_published` int(222) NOT NULL DEFAULT 1,
  `price` decimal(65,2) NOT NULL,
  `img` varchar(222) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_menu`
--

INSERT INTO `store_menu` (`menu_id`, `u_id`, `name`, `type`, `date`, `is_published`, `price`, `img`) VALUES
(26, 13, 'Coke', 'Beverage', '2023-04-21 02:46:02', 1, '15.00', 'uploads/img/store/menu/13/26'),
(28, 2, 'Rice', 'Add-on', '2023-04-25 01:53:37', 1, '15.00', 'uploads/img/store/menu/2/28'),
(29, 2, 'Chicken Adobo', 'Main Course', '2023-04-28 04:55:33', 1, '45.00', 'uploads/img/store/menu/2/29'),
(31, 2, 'Leche Flan', 'Dessert', '2023-05-02 03:36:12', 1, '45.00', 'uploads/img/store/menu/2/31'),
(32, 2, 'Coke', 'Beverage', '2023-05-02 03:38:12', 1, '30.00', 'uploads/img/store/menu/2/32'),
(39, 18, 'Rice', 'Add-on', '2023-05-18 07:01:12', 1, '15.00', 'uploads/img/store/menu/18/39'),
(40, 2, 'Lechon Kawali', 'Main Course', '2023-05-20 05:59:53', 1, '60.00', 'uploads/img/store/menu/2/40'),
(41, 2, 'Karekare', 'Main Course', '2023-05-20 06:00:08', 1, '50.00', 'uploads/img/store/menu/2/41'),
(42, 2, 'Sinigang', 'Main Course', '2023-05-20 06:00:23', 1, '60.00', 'uploads/img/store/menu/2/42'),
(43, 2, 'Porkchop', 'Main Course', '2023-05-20 06:00:38', 1, '45.00', 'uploads/img/store/menu/2/43'),
(44, 2, 'Caldereta', 'Main Course', '2023-05-20 06:00:55', 1, '50.00', 'uploads/img/store/menu/2/44'),
(45, 2, 'Mechado', 'Main Course', '2023-05-20 06:01:08', 1, '50.00', 'uploads/img/store/menu/2/45'),
(46, 2, 'Pinakbet', 'Main Course', '2023-05-20 06:01:28', 1, '40.00', 'uploads/img/store/menu/2/46'),
(47, 2, 'Ensaladang Talaong', 'Appetizer', '2023-05-20 06:02:15', 1, '40.00', 'uploads/img/store/menu/2/47'),
(48, 2, 'Lumpia', 'Appetizer', '2023-05-20 06:02:37', 1, '10.00', 'uploads/img/store/menu/2/48'),
(49, 2, 'Chicken Inasal', 'Appetizer', '2023-05-20 06:02:59', 1, '12.00', 'uploads/img/store/menu/2/49'),
(50, 2, 'Pork Inasal', 'Appetizer', '2023-05-20 06:03:21', 1, '12.00', 'uploads/img/store/menu/2/50'),
(51, 2, 'Ube Halaya', 'Dessert', '2023-05-20 06:04:48', 1, '20.00', 'uploads/img/store/menu/2/51'),
(52, 2, 'Halohalo', 'Dessert', '2023-05-20 06:05:14', 1, '60.00', 'uploads/img/store/menu/2/52'),
(53, 2, 'Cassava Cake', 'Dessert', '2023-05-20 06:05:32', 1, '15.00', 'uploads/img/store/menu/2/53'),
(54, 2, 'Royal', 'Beverage', '2023-05-20 06:05:52', 1, '20.00', 'uploads/img/store/menu/2/54'),
(55, 2, 'Mountain Dew', 'Beverage', '2023-05-20 06:06:11', 1, '20.00', 'uploads/img/store/menu/2/55'),
(56, 2, 'Orange Juice', 'Beverage', '2023-05-20 06:08:15', 1, '20.00', 'uploads/img/store/menu/2/56'),
(57, 2, 'Iced Tea', 'Beverage', '2023-05-20 06:08:36', 1, '26.00', 'uploads/img/store/menu/2/57'),
(58, 2, 'Lemonade', 'Beverage', '2023-05-20 06:09:13', 1, '45.00', 'uploads/img/store/menu/2/58'),
(59, 2, 'Bottled Water', 'Beverage', '2023-05-20 06:09:33', 1, '20.00', 'uploads/img/store/menu/2/59'),
(60, 2, 'Fried Rice', 'Add-on', '2023-05-20 06:11:03', 1, '12.00', 'uploads/img/store/menu/2/60'),
(61, 2, 'Steamed Siomai', 'Add-on', '2023-05-20 06:11:20', 1, '10.00', 'uploads/img/store/menu/2/61'),
(62, 2, 'Fried Siomai', 'Add-on', '2023-05-20 06:11:53', 1, '10.00', 'uploads/img/store/menu/2/62'),
(63, 2, 'Salted Egg', 'Add-on', '2023-05-20 06:12:10', 1, '25.00', 'uploads/img/store/menu/2/63');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(222) NOT NULL,
  `email` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `u_type` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `email`, `password`, `u_type`) VALUES
(1, 'kmenorio@up.edu.ph', '81dc9bdb52d04dc20036dbd8313ed055', 'user'),
(2, 'manangbetch@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin'),
(17, 'jdoe@up.edu.ph', '202cb962ac59075b964b07152d234b70', 'user'),
(18, 'a@up.edu.ph', '202cb962ac59075b964b07152d234b70', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `purchase_info`
--
ALTER TABLE `purchase_info`
  ADD PRIMARY KEY (`ti_id`);

--
-- Indexes for table `store_info`
--
ALTER TABLE `store_info`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `store_menu`
--
ALTER TABLE `store_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `t_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `purchase_info`
--
ALTER TABLE `purchase_info`
  MODIFY `ti_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `store_menu`
--
ALTER TABLE `store_menu`
  MODIFY `menu_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
