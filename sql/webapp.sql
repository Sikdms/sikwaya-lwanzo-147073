-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2022 at 05:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `Client_name` int(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `product_buyingprice` int(11) NOT NULL DEFAULT 0,
  `product_sellingprice` int(11) NOT NULL DEFAULT 0,
  `payment_picture` varchar(60) NOT NULL DEFAULT 'userImage.jpg',
  `isdeleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `product_buyingprice` int(11) NOT NULL DEFAULT 0,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `tbl_order_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(11) NOT NULL,
  `Client_name` int(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_buyingprice` int(11) NOT NULL DEFAULT 0,
  `payment_picture` varchar(60) NOT NULL DEFAULT 'userImage.jpg',
  `isdeleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_product_details` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `product_marketprice` int(11) NOT NULL DEFAULT 0,
  `product_buyingprice` int(11) NOT NULL DEFAULT 0,
  `product_sellingprice` int(11) NOT NULL DEFAULT 0,
  `farmer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product_details`
--

-- --------------------------------------------------------
--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` bigint(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `othername` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(45) NOT NULL DEFAULT '0',
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `userType` varchar(30) NOT NULL,
  `created` bigint(10) NOT NULL DEFAULT 0,
  `isdeleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `firstname`, `lastname`, `othername`, `dob`, `gender`, `username`, `email`, `password`, `userType`,  `created`, `isdeleted`) VALUES
(9, 'john', 'kam', '22', NULL, 'M', 'john', 'john@gmail.com', '$2y$10$IgHG74mQRjCHZgwpn5ImPOvzpCQDhPfZcJwsdlqLuCk6w/RKqjcUC', 'farmer',  0, 0);

-- --------------------------------------------------------


--
-- Table structure for table `tbl_stock`
--
DROP TABLE IF EXISTS `tbl_stock`;
CREATE TABLE IF NOT EXISTS `tbl_stock` (
  `stock_id` bigint(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `quantity` int NOT NULL DEFAULT 0,
  `product_sellingprice` double NOT NULL DEFAULT 0,
  `product_marketprice` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stock`
--
   

--

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_order_id` (`order_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_product_details`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_marketprice` (`product_marketprice`);


--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_product_details`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;



--

--
-- Constraints for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `tbl_order` (`order_id`);
-- AUTO_INCREMENT for table `tbl_stock
   
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
