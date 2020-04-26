-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2020 at 08:43 PM
-- Server version: 10.4.12-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `categoryname` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `categoryname`) VALUES
(1, 'food'),
(2, 'baverage'),
(3, 'furnitures'),
(4, 'tools'),
(5, 'electronics');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `Cust_id` int(11) NOT NULL,
  `f_name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `l_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `Address` varchar(30) CHARACTER SET utf8 NOT NULL,
  `Contact_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`Cust_id`, `f_name`, `l_name`, `username`, `password`, `Address`, `Contact_no`) VALUES
(1, 'kifah', 'andary', 'kifah.andary@gmail.com', 'cc54a7a807a7700448d5955d4185fc70', 'aabadieh', 71173034);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `Orders_id` int(20) NOT NULL,
  `order_date` datetime NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `UnitPrice` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`Orders_id`, `order_date`, `Product_Id`, `UnitPrice`, `Quantity`, `total`, `customer_id`) VALUES
(1, '2020-04-12 00:00:00', 1, 1500, 3, 4500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_cart`
--

CREATE TABLE `products_cart` (
  `id` int(10) NOT NULL,
  `Cust_Id` int(11) DEFAULT NULL,
  `Product_Id` int(11) DEFAULT NULL,
  `num_of_item` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_cart`
--

INSERT INTO `products_cart` (`id`, `Cust_Id`, `Product_Id`, `num_of_item`) VALUES
(6, 1, 1, 1),
(7, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_table`
--

CREATE TABLE `products_table` (
  `Product_Id` int(11) NOT NULL,
  `Product_Name` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Supplier_Id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Original_price` int(11) NOT NULL,
  `Selling_price` int(11) NOT NULL,
  `date` varchar(200) CHARACTER SET latin1 NOT NULL,
  `ProductCode` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_table`
--

INSERT INTO `products_table` (`Product_Id`, `Product_Name`, `Supplier_Id`, `category_id`, `Quantity`, `Original_price`, `Selling_price`, `date`, `ProductCode`) VALUES
(1, 'kitkat', 1, 1, 50, 1000, 1500, '2020-12-12', '1001');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_id` int(11) NOT NULL,
  `supname` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Address` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_id`, `supname`, `Address`) VALUES
(1, 'saed andary', 'aabadieh'),
(2, 'monir saloum', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Cust_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`Orders_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `orderdetails_FK_1` (`Product_Id`);

--
-- Indexes for table `products_cart`
--
ALTER TABLE `products_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cart_FK` (`Product_Id`),
  ADD KEY `products_cart_FK_1` (`Cust_Id`);

--
-- Indexes for table `products_table`
--
ALTER TABLE `products_table`
  ADD PRIMARY KEY (`Product_Id`),
  ADD UNIQUE KEY `products_table_UN` (`ProductCode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `Supplier_Id` (`Supplier_Id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `Cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `Orders_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products_cart`
--
ALTER TABLE `products_cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products_table`
--
ALTER TABLE `products_table`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=960;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_FK` FOREIGN KEY (`customer_id`) REFERENCES `client` (`Cust_id`),
  ADD CONSTRAINT `orderdetails_FK_1` FOREIGN KEY (`Product_Id`) REFERENCES `products_table` (`Product_Id`);

--
-- Constraints for table `products_cart`
--
ALTER TABLE `products_cart`
  ADD CONSTRAINT `products_cart_FK` FOREIGN KEY (`Product_Id`) REFERENCES `products_table` (`Product_Id`),
  ADD CONSTRAINT `products_cart_FK_1` FOREIGN KEY (`Cust_Id`) REFERENCES `client` (`Cust_id`);

--
-- Constraints for table `products_table`
--
ALTER TABLE `products_table`
  ADD CONSTRAINT `products_table_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `products_table_ibfk_2` FOREIGN KEY (`Supplier_Id`) REFERENCES `supplier` (`Supplier_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
