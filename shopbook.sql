-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2020 at 09:43 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderrent`
--

CREATE TABLE `orderrent` (
  `orderrent_id` int(11) NOT NULL,
  `orderrent_productid` int(11) NOT NULL,
  `orderrent_amount` int(11) NOT NULL,
  `orderrent_totalprice` int(11) NOT NULL,
  `orderrent_rentdate` date NOT NULL,
  `orderrent_returndate` date NOT NULL,
  `orderrent_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `orderrent`
--

INSERT INTO `orderrent` (`orderrent_id`, `orderrent_productid`, `orderrent_amount`, `orderrent_totalprice`, `orderrent_rentdate`, `orderrent_returndate`, `orderrent_status`) VALUES
(1, 4, 1, 1232, '2020-09-30', '2020-10-20', 1),
(1, 5, 1, 1232, '2020-09-30', '2020-10-20', 1),
(2, 3, 1, 1232, '2020-09-30', '2020-10-09', 1),
(2, 4, 1, 1232, '2020-09-30', '2020-10-20', 1),
(2, 5, 1, 1232, '2020-09-30', '2020-10-20', 1),
(2, 7, 1, 1232, '2020-09-30', '2020-10-20', 1),
(3, 3, 1, 1232, '2020-09-30', '2020-10-02', 1),
(3, 4, 1, 1232, '2020-09-30', '2020-10-02', 1),
(4, 3, 119, 146608, '2020-09-30', '2020-10-02', 1),
(4, 4, 1, 1232, '2020-09-30', '2020-10-02', 1),
(5, 4, 1, 1232, '2020-10-01', '2020-10-03', 1),
(6, 8, 1, 1232, '2020-10-01', '2020-09-30', 1),
(7, 5, 1, 1232, '2020-10-01', '2020-09-30', 1),
(8, 3, 1, 1232, '2020-10-02', '2020-10-04', 1),
(8, 4, 1, 1232, '2020-10-02', '2020-10-04', 0),
(9, 4, 1, 1232, '2020-10-02', '2020-10-04', 0),
(9, 5, 1, 1232, '2020-10-02', '2020-10-05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderreturn`
--

CREATE TABLE `orderreturn` (
  `orderreturn_id` int(11) NOT NULL,
  `orderreturn_productid` int(11) NOT NULL,
  `orderreturn_amount` int(11) NOT NULL,
  `orderreturn_returnpricefine` float NOT NULL,
  `orderreturn_returndate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `orderreturn`
--

INSERT INTO `orderreturn` (`orderreturn_id`, `orderreturn_productid`, `orderreturn_amount`, `orderreturn_returnpricefine`, `orderreturn_returndate`) VALUES
(1, 4, 0, 1232, '2020-10-01'),
(1, 5, 0, 1232, '2020-10-01'),
(2, 3, 1, 0, '2020-10-01'),
(2, 4, 1, 0, '2020-10-01'),
(2, 5, 1, 0, '2020-10-01'),
(2, 7, 1, 0, '2020-10-01'),
(3, 3, 0, 1232, '2020-10-01'),
(3, 4, 0, 1232, '2020-10-01'),
(4, 3, 119, 0, '2020-10-01'),
(4, 4, 1, 0, '2020-10-01'),
(5, 4, 1, 0, '2020-10-01'),
(6, 8, 0, 41, '2020-10-02'),
(7, 5, 0, 41, '2020-10-02'),
(8, 3, 0, 201, '2020-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Order_addressuser` text COLLATE utf8mb4_bin NOT NULL,
  `orders_renttotal` float NOT NULL DEFAULT 0,
  `orders_returntotal` float NOT NULL DEFAULT 0,
  `orders_sumtotal` float NOT NULL,
  `orders_iscomplete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `User_ID`, `Order_addressuser`, `orders_renttotal`, `orders_returntotal`, `orders_sumtotal`, `orders_iscomplete`) VALUES
(1, 4, 'ฟหดกหฟดกหฟด', 2464, 0, 2464, 2),
(2, 4, 'กหฟดฟหกด', 4928, 0, 4928, 2),
(3, 4, 'dfsgsfdg', 2464, 2464, 4928, 2),
(4, 4, 'sadsad', 147840, 0, 147840, 2),
(5, 4, 'asdasdasd', 1232, 0, 1232, 2),
(6, 4, 'sadas', 1232, 41, 1273, 2),
(7, 4, 'sadfsad', 1232, 41, 1273, 2),
(8, 5, 'ฟดฟกหดฟหก', 2464, 201, 2665, 1),
(9, 7, 'ฟกดหฟกหดหฟดก', 2464, 0, 2464, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(11) NOT NULL,
  `Type_ID` int(11) NOT NULL,
  `Product_Name` text COLLATE utf8mb4_bin NOT NULL,
  `Product_Details` text COLLATE utf8mb4_bin NOT NULL,
  `Product_Price` float NOT NULL,
  `product_buy` int(11) DEFAULT NULL,
  `Product_Balance` int(11) NOT NULL,
  `Product_rentday` int(11) NOT NULL,
  `Product_Photo` text COLLATE utf8mb4_bin NOT NULL,
  `Product_datesave` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Type_ID`, `Product_Name`, `Product_Details`, `Product_Price`, `product_buy`, `Product_Balance`, `Product_rentday`, `Product_Photo`, `Product_datesave`) VALUES
(3, 3, 'sadsazzz', 'asdasd', 1232, 201, 119, 2, '9091656887235.png', '2020-09-30'),
(4, 3, 'sadsazzz', 'asdasd', 1232, 1, 114, 2, '9091656962219.png', '2020-09-30'),
(5, 3, 'sadsazzz', 'asdasd', 1232, 1, 116, 3, '9091657504068.png', '2020-09-30'),
(7, 3, 'DELL Inspiron 15 3593-W566055149THW10 51 views 0 SHARES', 'hjgjkkclnxjbkvjxczkj;vkjbxzckjblv', 1232, 5000, 122, 3, '9092690249200.png', '2020-10-02'),
(8, 4, 'sad', 'asdasd', 1232, 1, 122, 2, '9091686347777.png', '2020-09-30'),
(10, 8, 'saasf', 'asfasd', 1232, 1, 12321, 12, '9093949712061.png', '2020-10-02'),
(11, 6, 'ฟกฟหกฟหasdf', 'safadsf', 20, 500, 10, 3, '9094007723834.png', '2020-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `productloss`
--

CREATE TABLE `productloss` (
  `productloss_id` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `productloss_amount` int(11) NOT NULL,
  `productloss_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `productloss`
--

INSERT INTO `productloss` (`productloss_id`, `Product_ID`, `productloss_amount`, `productloss_price`) VALUES
(1, 3, 1, 201);

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `Type_ID` int(11) NOT NULL,
  `Type_Name` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`Type_ID`, `Type_Name`) VALUES
(3, 'aaaaaaaaaaaaaaaaaaasasaaaaaaaaa'),
(4, 'หม้อหุงข้าว'),
(5, 'lisa'),
(6, 'ฟหกฟหก'),
(8, 'asdfasdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `User_Username` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `User_Password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `User_Firstname` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `User_Lastname` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  `User_Telephonenumber` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `User_Email` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `User_Photo` text COLLATE utf8mb4_bin NOT NULL,
  `User_Createdate` date NOT NULL,
  `User_Type` text COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Username`, `User_Password`, `User_Firstname`, `User_Lastname`, `User_Telephonenumber`, `User_Email`, `User_Photo`, `User_Createdate`, `User_Type`) VALUES
(4, 'user', '$2y$10$fB6aRvLojb8vG3ukgnwcle6rynH6hiaSNAOSCfskrj2DL4A6y8HM6', 'ศุภชัย', 'แจ้งอรุณ', '0970562607', 'agileza_555@hotmail.com', '9091310863447.jpg', '2020-09-26', 'admin'),
(5, 'user1', '$2y$10$sU4vbeu5J6ba7vIztG4nXuNPgEJaOWMaDurvtzP68F41qMfwkVlsm', 'ศุภชัย', 'แจ้งอรุณ', '0970562607', 'agileza_555@hotmail.com', '9091714427710.png', '2020-09-27', 'user'),
(6, 'user3', '$2y$10$8vdVSxWRxGy9m0hJ2acvneXKr5613yUUgxq1hGYyesiRaEDDADFWe', 'ศุภชัย', 'แจ้งอรุณ', '0970562607', 'agileza_555@hotmail.com', '9092689045023.png', '2020-09-29', 'user'),
(7, 'peaw', '$2y$10$ZK/2rNjcH/DwoWATptUXJ.fwHXboo1Y52LZ2OdffIWAdRI/opNtw6', 'asdsa', 'dsadsa', '0970562607', 'agileza_555@hotmail.com', 'profile.png', '2020-10-02', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderrent`
--
ALTER TABLE `orderrent`
  ADD PRIMARY KEY (`orderrent_id`,`orderrent_productid`) USING BTREE,
  ADD KEY `orderrent_productid` (`orderrent_productid`);

--
-- Indexes for table `orderreturn`
--
ALTER TABLE `orderreturn`
  ADD PRIMARY KEY (`orderreturn_id`,`orderreturn_productid`),
  ADD KEY `orderreturn_productid` (`orderreturn_productid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Type_ID` (`Type_ID`);

--
-- Indexes for table `productloss`
--
ALTER TABLE `productloss`
  ADD PRIMARY KEY (`productloss_id`),
  ADD UNIQUE KEY `Product_ID` (`Product_ID`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`Type_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `productloss`
--
ALTER TABLE `productloss`
  MODIFY `productloss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `Type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderrent`
--
ALTER TABLE `orderrent`
  ADD CONSTRAINT `orderrent_ibfk_2` FOREIGN KEY (`orderrent_productid`) REFERENCES `product` (`Product_ID`),
  ADD CONSTRAINT `orderrent_ibfk_3` FOREIGN KEY (`orderrent_id`) REFERENCES `orders` (`orders_id`) ON DELETE CASCADE;

--
-- Constraints for table `orderreturn`
--
ALTER TABLE `orderreturn`
  ADD CONSTRAINT `orderreturn_ibfk_1` FOREIGN KEY (`orderreturn_id`) REFERENCES `orders` (`orders_id`),
  ADD CONSTRAINT `orderreturn_ibfk_2` FOREIGN KEY (`orderreturn_productid`) REFERENCES `product` (`Product_ID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Type_ID`) REFERENCES `producttype` (`Type_ID`);

--
-- Constraints for table `productloss`
--
ALTER TABLE `productloss`
  ADD CONSTRAINT `productloss_ibfk_1` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
