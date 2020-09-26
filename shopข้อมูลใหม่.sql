-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08 เม.ย. 2020 เมื่อ 09:41 AM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `delivery`
--

CREATE TABLE `delivery` (
  `Delivery_ID` int(11) NOT NULL,
  `Delivery_Name` text NOT NULL,
  `Delivery_Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `delivery`
--

INSERT INTO `delivery` (`Delivery_ID`, `Delivery_Name`, `Delivery_Price`) VALUES
(1, 'EMS', 200),
(2, 'ธรรมดา', 1000);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `ordersales`
--

CREATE TABLE `ordersales` (
  `Ordersales_ID` int(11) NOT NULL,
  `Delivery_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Ordersales_address` text NOT NULL,
  `Ordersales_Totalprice` int(11) NOT NULL,
  `Ordersales_Day` date NOT NULL,
  `Ordersales_Status` text NOT NULL,
  `ordersales_Paymentstatus` text DEFAULT NULL,
  `ordersales_DayPayment` date DEFAULT NULL,
  `ordersales_ Amountmoney` int(11) DEFAULT NULL,
  `ordersales_Photopayment` text DEFAULT NULL,
  `ordersales_Packagenumber` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `ordersales`
--

INSERT INTO `ordersales` (`Ordersales_ID`, `Delivery_ID`, `User_ID`, `Ordersales_address`, `Ordersales_Totalprice`, `Ordersales_Day`, `Ordersales_Status`, `ordersales_Paymentstatus`, `ordersales_DayPayment`, `ordersales_ Amountmoney`, `ordersales_Photopayment`, `ordersales_Packagenumber`) VALUES
(1, 1, 10, '351411000', 246600, '2020-04-08', 'รอการชำระเงิน', NULL, NULL, NULL, NULL, NULL),
(2, 1, 10, 'ศุภชัย แจ้งอรุณ<br>aa<br>เบอร์โทรติดต่อ  0970562607', 7592, '2020-04-08', 'รอการชำระเงิน', NULL, NULL, NULL, NULL, NULL),
(3, 1, 10, 'ศุภชัย แจ้งอรุณ<br>aaaaaaaaaaa<br>เบอร์โทรติดต่อ  0970562607', 3896, '2020-04-08', 'รอการชำระเงิน', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `ordersalesdetail`
--

CREATE TABLE `ordersalesdetail` (
  `ordersalesDetail_ID` int(11) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `ordersalesDetail_unit` int(11) NOT NULL,
  `ordersalesdetailWarrantyday` int(11) DEFAULT NULL,
  `ordersalesdetail_ price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `ordersalesdetail`
--

INSERT INTO `ordersalesdetail` (`ordersalesDetail_ID`, `product_ID`, `ordersalesDetail_unit`, `ordersalesdetailWarrantyday`, `ordersalesdetail_ price`) VALUES
(1, 61, 200, 12, 246400),
(2, 62, 6, 12, 7392),
(3, 63, 1, 12, 1232),
(3, 64, 1, 12, 1232),
(3, 65, 1, 12, 1232);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `product`
--

CREATE TABLE `product` (
  `Product_ID` int(11) NOT NULL,
  `Type_ID` int(11) NOT NULL,
  `Product_Name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 DEFAULT NULL,
  `Product_Details` text DEFAULT NULL,
  `Product_Price` float(11,2) DEFAULT NULL,
  `Product_Balance` int(11) DEFAULT NULL,
  `Product_Photo` text DEFAULT NULL,
  `date_save` date DEFAULT NULL,
  `Warranty_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `product`
--

INSERT INTO `product` (`Product_ID`, `Type_ID`, `Product_Name`, `Product_Details`, `Product_Price`, `Product_Balance`, `Product_Photo`, `date_save`, `Warranty_ID`) VALUES
(61, 62, '1234', 'asdasdafdasf', 1232.00, 12121, '9007190215380.jpg', '2020-04-08', 4),
(62, 63, 'sadsazzz', 'dasdasd', 1232.00, 117, '9007188829793.jpg', '2020-04-08', 4),
(63, 64, 'sadsazzz', 'asdsadasd', 1232.00, 12320, '9007188915410.jpg', '2020-04-08', 4),
(64, 65, 'ฟฟ', 'adasdas', 1232.00, 12320, '9007189051147.jpg', '2020-04-08', 4),
(65, 68, 'sa', 'dasdadas', 1232.00, 12320, '9007189126714.jpg', '2020-04-08', 4);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `producttype`
--

CREATE TABLE `producttype` (
  `Type_ID` int(11) NOT NULL,
  `Type_Name` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `producttype`
--

INSERT INTO `producttype` (`Type_ID`, `Type_Name`) VALUES
(62, 'แอร์'),
(63, 'ตู้เย็น'),
(64, 'ประเภทเครื่องทำความร้อน'),
(65, 'กระติกน้ำร้อน'),
(66, 'หม้อหุงข้าว'),
(68, 'เครื่องทำน้ำอุ่น');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `User_Username` varchar(30) DEFAULT NULL,
  `User_Password` varchar(255) DEFAULT NULL,
  `User_Firstname` varchar(60) DEFAULT NULL,
  `User_Lastname` varchar(60) DEFAULT NULL,
  `User_Telephonenumber` varchar(20) DEFAULT NULL,
  `User_Email` varchar(100) DEFAULT NULL,
  `User_Photo` text DEFAULT 'profile.png',
  `User_Createdate` date DEFAULT NULL,
  `User_Type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `user`
--

INSERT INTO `user` (`User_ID`, `User_Username`, `User_Password`, `User_Firstname`, `User_Lastname`, `User_Telephonenumber`, `User_Email`, `User_Photo`, `User_Createdate`, `User_Type`) VALUES
(10, 'user', '$2y$10$ek22gPqcxicPyhmoT.OKqekBPTkD7b1L8AWCqyNXqBJwhvlLqjw72', 'ศุภชัย', 'แจ้งอรุณ', '0970562607', 'agileza_555@hotmail.com', '9007190054364.jpg', '2020-02-23', 'admin');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `warranty`
--

CREATE TABLE `warranty` (
  `Warranty_ID` int(11) NOT NULL,
  `Warranty_Name` text NOT NULL,
  `Warranty_Day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- dump ตาราง `warranty`
--

INSERT INTO `warranty` (`Warranty_ID`, `Warranty_Name`, `Warranty_Day`) VALUES
(2, 'ฟฟฟฟฟ', 7),
(4, 'aaaaaa', 12),
(5, 'aaas', 312),
(6, 'asdas', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`Delivery_ID`);

--
-- Indexes for table `ordersales`
--
ALTER TABLE `ordersales`
  ADD PRIMARY KEY (`Ordersales_ID`),
  ADD KEY `Delivery_ID` (`Delivery_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `ordersalesdetail`
--
ALTER TABLE `ordersalesdetail`
  ADD PRIMARY KEY (`ordersalesDetail_ID`,`product_ID`) USING BTREE,
  ADD KEY `product_ID` (`product_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Type_ID` (`Type_ID`) USING BTREE,
  ADD KEY `Warranty_ID` (`Warranty_ID`);

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
-- Indexes for table `warranty`
--
ALTER TABLE `warranty`
  ADD PRIMARY KEY (`Warranty_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `Delivery_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `Type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `warranty`
--
ALTER TABLE `warranty`
  MODIFY `Warranty_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ordersales`
--
ALTER TABLE `ordersales`
  ADD CONSTRAINT `ordersales_ibfk_2` FOREIGN KEY (`Delivery_ID`) REFERENCES `delivery` (`Delivery_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ordersales_ibfk_3` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `ordersalesdetail`
--
ALTER TABLE `ordersalesdetail`
  ADD CONSTRAINT `ordersalesdetail` FOREIGN KEY (`ordersalesDetail_ID`) REFERENCES `ordersales` (`Ordersales_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product` FOREIGN KEY (`product_ID`) REFERENCES `product` (`Product_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Typeproduct` FOREIGN KEY (`Type_ID`) REFERENCES `producttype` (`Type_ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Warranty_ID` FOREIGN KEY (`Warranty_ID`) REFERENCES `warranty` (`Warranty_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
