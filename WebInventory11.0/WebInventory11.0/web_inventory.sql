-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 12:29 AM
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
-- Database: `web_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(100) NOT NULL,
  `full_Name` varchar(100) NOT NULL,
  `business_Name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `cityMunicipality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `user_id`, `full_Name`, `business_Name`, `username`, `cityMunicipality`, `address`, `zipcode`, `email`, `phone_number`, `password`, `gender`) VALUES
(1, 0, 'adsd', '', 'admin', '', '', '', 'dgronrussel@gmail.com', 2147483647, '2', 'on'),
(2, 0, 'asdsd asdad ad', '', 'Ron', '', '', '', 'panes741@gmail.com', 2323, 'admin', 'on'),
(3, 0, '', '', '', '', '', '', '', 0, '', ''),
(4, 0, 'qwe', '', 'qwe', '', '', '', 'asdasd@gmail.com', 2147483647, '2', 'on'),
(5, 0, 'qweqeweqeqe', '', 'qweqwe', '', '', '', 'qweqwe@gmail.com', 123454, 'qwe', ''),
(6, 0, 'qweqeweqeqe', '', 'RONNN24', '', '', '', 'bossrr02@gmail.com', 2147483647, '123', 'on'),
(7, 0, 'adsd', '', 'RONNN25', '', '', '', 'bossrr002@gmail.com', 2147483647, '123', 'on'),
(8, 0, 'poo', '', 'poo', '', '', '', 'poo@gmail.com', 2147483647, '123', 'on'),
(9, 0, 'adsd', '', 'zxc', '', '', '', 'zxc@gmail.com', 2147483647, 'zxc', 'Male'),
(10, 0, 'Ron Russel DG', '', 'ronn23', '', '', '', 'ronrussel6@gmail.com', 2147483647, '$2y$10$4sCsmbg4/NGfGRB6Lx1jh.MyCnxGyY43MotSPYVa09l/LnwpI8i1O', 'Male'),
(11, 0, 'Ron Russel DG', '', 'ron244', '', '', '', 'ron244@gmail.com', 2147483647, '$2y$10$GSLjB4n2c2TcNuLsmllatej.qIakafjGLK2SigD/AsY7eKvInQZ8a', 'Male'),
(12, 0, 'rown1', '', 'rown1', '', '', '', 'rown1@gmail.com', 2147483647, '$2y$10$qLGAOWSEFk1mVL9Aopdt2.ZNTtTlVRDnX3FYOPsB8T/brGMKShOm.', 'Male'),
(13, 0, 'ali', 'Hardware Shop', 'rown2', 'sta maria', '912 narra', '3022', 'ronrussel63@gmail.com', 2147483647, '$2y$10$MSjfki44bVTt0gUZWEMGdOD9f.0b57RFmGoZLXyF3Tw5oHNR6Mff2', 'Female'),
(14, 0, 'Mark Russel', 'Lugawan sa kanto', 'Jaeger', 'Marilao Bulacan', 'basta dyan lang', '3019', 'markrussel@gmail.com', 2147483647, '$2y$10$mWj5wZwGD2L259se5yJBTeNjgNMVJt8AvYr2BA8BZgjq5kusvp6fi', 'Male'),
(15, 0, 'Russel Ramores', 'Shabuhan', 'Hannibunch', 'Marilao Bulacan', 'basta dyan lang', '3019', 'markrusselramores@gmail.com', 2147483647, '$2y$10$a4MnT23gF1D4XrWUDVLYy.HV4EcaN7e.eRQ34WyTawM5Ttm7bpO8G', 'Male'),
(16, 0, 'ron', 'ikaw', 'rownn1', 'sdas', '912', '3222', 'ron245@gmail.com', 2147483647, '$2y$10$.B6ZWCgVi74vTbH7ycbJueOm0ymeCOqZE2QOkmrN2IY9CzyvwX3v6', 'Prefer not to say');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_archive_products`
--

CREATE TABLE `tbl_archive_products` (
  `id` int(11) NOT NULL,
  `product_ID` int(200) NOT NULL,
  `product_Name` varchar(255) NOT NULL,
  `product_Category` varchar(255) NOT NULL,
  `product_Measurement` varchar(255) NOT NULL,
  `product_Price` int(255) NOT NULL,
  `product_Quantity` int(255) NOT NULL,
  `time_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `restored` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_of_orders`
--

CREATE TABLE `tbl_list_of_orders` (
  `id` int(11) NOT NULL,
  `product_Name` varchar(200) NOT NULL,
  `full_Name` varchar(255) NOT NULL,
  `phone_Number` int(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `date_of_orders` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `product_Name` varchar(255) NOT NULL,
  `product_ID` int(255) NOT NULL,
  `product_Category` varchar(255) NOT NULL,
  `product_Measurement` varchar(255) NOT NULL,
  `product_Price` int(255) NOT NULL,
  `product_Quantity` int(255) NOT NULL,
  `time_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `product_Name`, `product_ID`, `product_Category`, `product_Measurement`, `product_Price`, `product_Quantity`, `time_date`) VALUES
(39, 'hammer', 2020, 'lightning', 'ounces', 2500, 2, '2023-10-14 23:07:14'),
(42, 'dads', 12, 'powertools', 'inch', 500, 2, '2023-10-14 23:11:24'),
(43, 'hammer', 23, 'powertools', 'inch', 500, 5, '2023-10-14 23:12:14'),
(45, 'hammer', 2020, 'lightning', 'yard', 2500, 5, '2023-10-14 23:13:38'),
(50, 'hammer', 2020, 'powertools', 'ounces', 2500, 2, '2023-10-16 14:59:07'),
(51, 'asdadas', 0, 'lightning', 'ounces', 500, 5, '2023-10-24 17:56:41'),
(52, 'hammer', 2020, 'lightning', 'ounces', 500, 6, '2023-10-29 14:24:07'),
(53, 'sdad', 2020, 'powertools', 'pounds', 500, 5, '2023-10-29 14:29:41'),
(54, 'sdad', 2020, 'plumbing', 'pounds', 500, 69, '2023-10-29 14:29:50'),
(55, 'asdadas', 2020, 'electrical', 'inch', 500, 69, '2023-10-29 14:29:58'),
(56, 'sdad', 2020, 'plumbing', 'pounds', 250000, 2, '2023-10-31 13:44:00'),
(57, 'hammer 23', 2020, 'lawngaren', 'inch', 500, 69, '2023-10-31 13:45:15'),
(58, 'asdadas', 12, 'plumbing', 'pounds', 500, 5, '2023-10-31 23:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `role` enum('Admin','Staff') NOT NULL,
  `gender` enum('Male','Female','Prefer not to say') NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `phone_number`, `role`, `gender`, `address`, `username`, `password`) VALUES
(5, 'Mark Russel', '94641688234', 'Staff', 'Female', 'basta dyan lang', 'mark1', '$2y$10$eNnov0U7EMvg6quLehzhmuR3O9TnUoS06SC/Ge2x0Spc/tH1Y5PPu'),
(6, 'Mark Russel', '94641688234', 'Staff', 'Female', 'basta dyan lang', 'mark1', '$2y$10$dVK3QpFjyGbCvd9zce5NhO2pXi4F6mj3M9DMUd7mFLgLJa0vw.dTu'),
(30, 'Russel Ramores', '99641688234', 'Staff', 'Male', 'basta dyan lang sa tabi mo at sa tabi ko ', 'mark2', '123'),
(31, 'Ron', '09325175124', 'Staff', 'Male', 'dito lang ako sayo', 'ron1', '123'),
(32, 'rr', '12', 'Staff', 'Prefer not to say', '1232', 'staff1', '12345'),
(35, 'ron russel', '09612479632', 'Staff', 'Male', '123 narra', 'staff2', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `gender` (`gender`),
  ADD KEY `password` (`password`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `full_Name` (`full_Name`),
  ADD KEY `email` (`email`),
  ADD KEY `phone_number` (`phone_number`);

--
-- Indexes for table `tbl_archive_products`
--
ALTER TABLE `tbl_archive_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_list_of_orders`
--
ALTER TABLE `tbl_list_of_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_archive_products`
--
ALTER TABLE `tbl_archive_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_list_of_orders`
--
ALTER TABLE `tbl_list_of_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
