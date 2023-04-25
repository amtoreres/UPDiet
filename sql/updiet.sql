-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 11:10 AM
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
(1, 'Kyle Enorio', '2023-04-04 09:43:26', 'uploads/img/user/prof-pic/1', '09123456789');

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
(2, 'Somewhere down the road.', 0, '2023-04-04 17:44:21', NULL, NULL, 'Manang Betch', '09123456789');

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
(8, 2, 'Coke', 'Beverage', '2023-04-07 10:19:23', 1, '15.00', 'uploads/img/store/menu/2/8'),
(9, 2, 'Chicken Adobo', 'Main Course', '2023-04-07 16:53:11', 1, '60.00', 'uploads/img/store/menu/2/9'),
(12, 2, 'Flan', 'Dessert', '2023-04-08 04:30:14', 1, '30.00', 'uploads/img/store/menu/2/12'),
(21, 2, 'Rice', 'Main Course', '2023-04-08 04:51:02', 1, '10.00', 'uploads/img/store/menu/2/21');

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
(2, 'manangbetch@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_info`
--
ALTER TABLE `customer_info`
  ADD PRIMARY KEY (`u_id`);

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
-- AUTO_INCREMENT for table `store_menu`
--
ALTER TABLE `store_menu`
  MODIFY `menu_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
