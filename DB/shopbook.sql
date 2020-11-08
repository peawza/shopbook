-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2020 at 03:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

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
(21, 12, 1, 50, '2020-10-23', '2020-10-30', 1),
(21, 13, 1, 50, '2020-10-23', '2020-10-30', 1),
(21, 15, 1, 45, '2020-10-23', '2020-10-30', 1),
(21, 20, 1, 100, '2020-10-23', '2020-10-30', 1),
(22, 4, 3, 300, '2020-10-23', '2020-10-30', 1),
(23, 13, 1, 50, '2020-10-23', '2020-10-30', 1),
(24, 7, 3, 150, '2020-10-25', '2020-11-01', 0),
(24, 24, 5, 175, '2020-10-25', '2020-11-01', 0),
(25, 8, 10, 500, '2020-10-25', '2020-11-01', 1),
(26, 8, 10, 500, '2020-10-25', '2020-11-01', 1),
(27, 15, 40, 1800, '2020-10-25', '2020-11-01', 1),
(28, 4, 10, 1000, '2020-10-25', '2020-11-01', 1),
(29, 12, 1, 50, '2020-10-25', '2020-11-01', 1),
(29, 23, 10, 300, '2020-10-25', '2020-11-01', 1),
(30, 7, 1, 50, '2020-10-25', '2020-11-01', 1),
(30, 24, 1, 35, '2020-10-25', '2020-11-01', 1),
(31, 12, 1, 50, '2020-10-25', '2020-11-01', 1),
(31, 24, 1, 35, '2020-10-25', '2020-11-01', 1),
(31, 42, 1, 70, '2020-10-25', '2020-11-01', 1),
(32, 23, 1, 30, '2020-10-25', '2020-11-01', 1),
(33, 36, 10, 1000, '2020-10-25', '2020-11-01', 1),
(34, 51, 1, 200, '2020-10-25', '2020-11-04', 1),
(35, 51, 60, 12000, '2020-10-25', '2020-11-04', 1),
(36, 47, 70, 2100, '2020-10-25', '2020-11-01', 0),
(37, 25, 50, 2000, '2020-10-25', '2020-11-01', 0),
(38, 3, 1, 100, '2020-10-27', '2020-11-03', 1),
(39, 16, 1, 75, '2020-10-27', '2020-11-03', 1),
(40, 52, 10, 1000, '2020-10-27', '2020-11-03', 0),
(41, 51, 1, 200, '2020-10-27', '2020-11-06', 0);

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
(21, 13, 0, 150, '2020-10-23'),
(21, 15, 0, 75, '2020-10-23'),
(21, 20, 1, 0, '2020-10-23'),
(22, 4, 3, 0, '2020-10-23'),
(23, 13, 1, 0, '2020-10-23'),
(25, 8, 10, 0, '2020-10-25'),
(26, 8, 10, 0, '2020-10-25'),
(27, 15, 20, 1500, '2020-10-25'),
(28, 4, 5, 1000, '2020-10-25'),
(29, 12, 1, 0, '2020-10-25'),
(29, 23, 10, 0, '2020-10-25'),
(30, 7, 0, 100, '2020-10-25'),
(30, 24, 0, 70, '2020-10-25'),
(31, 12, 1, 0, '2020-10-25'),
(31, 24, 1, 0, '2020-10-25'),
(31, 42, 1, 0, '2020-10-25'),
(32, 23, 1, 0, '2020-10-25'),
(33, 36, 10, 0, '2020-10-25'),
(34, 51, 1, 0, '2020-10-25'),
(35, 51, 60, 0, '2020-10-25'),
(38, 3, 1, 0, '2020-10-27'),
(39, 16, 0, 150, '2020-10-27');

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
(21, 9, 'ชลบุรี', 245, 0, 245, 2),
(22, 9, '', 300, 0, 300, 2),
(23, 9, '123', 50, 0, 50, 2),
(24, 10, 'มกศรช', 325, 0, 325, 0),
(25, 9, 'sdafffsdfdsafdsagdasgaasdfdsag', 500, 0, 500, 2),
(26, 9, 'หฟกหฟกหฟกหฟกกหฟ', 500, 0, 500, 2),
(27, 9, 'adsdsa', 1800, 1500, 3300, 2),
(28, 9, 'asdasdsa', 1000, 1000, 2000, 2),
(29, 11, 'มกศรช', 350, 0, 350, 2),
(30, 11, 'มกศรช ผฟกหกห', 85, 170, 255, 2),
(31, 11, 'ชลบุรี', 155, 0, 155, 2),
(32, 11, '123132', 30, 0, 30, 2),
(33, 11, '123', 1000, 0, 1000, 2),
(34, 11, '123123\r\n', 200, 0, 200, 2),
(35, 11, '1111\r\n\r\n', 12000, 0, 12000, 2),
(36, 11, 'ชลบุรี', 2100, 0, 2100, 0),
(37, 11, 'ชลบุรี', 2000, 0, 2000, 0),
(38, 9, 'ชลบุรี', 100, 0, 100, 2),
(39, 9, 'มก', 75, 150, 225, 2),
(40, 9, 'มก', 1000, 0, 1000, 0),
(41, 12, 'asd', 200, 0, 200, 0);

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
(3, 11, 'บุเพสันนิวาส', 'เกศสุรางค์ หญิงสาวร่างอ้วนจำต้องทะลุมิติไปในรัชกาลสมเด็จพระนารายณ์มหาราช ในร่างของแม่หญิงการะเกดผู้แสนร้ายกาจ และได้พบกับผู้คนมากมายทั้ง หมื่นสุนทรเทวา ผู้เป็นคู่หมั้นคู่หมายของการะเกด ออกญาโหราธิบดี ราชครูของพระนารายณ์ แม่มะลิ บุตรสาวของแขกฟานิกลูกครึ่งญี่ปุ่น โปรตุเกส และผู้คนอีกมากมาย', 100, 200, 10, 7, '9102909146241.jpg', '2020-10-23'),
(4, 11, 'ปริศนามหาเวทย์', 'ปริศนามหาเวทย์', 100, 200, 5, 7, '9102908113900.gif', '2020-10-20'),
(5, 11, 'Sea Witch', 'Sea Witch', 100, 200, 10, 7, '9102908766196.jpg', '2020-10-20'),
(7, 10, 'Onepiece', 'เป็นเรื่องราวในยุคทองของโจรสลัด โจรสลัดทุกคนมีเป้าหมายเดียวกันคือเพื่อค้นหา สมบัติที่เรียกว่า \"วันพีช\" ซึ่งผู้ใดสามารถค้นหาและครอบครองวันพีชอยู่ ผู้นั้นก็คือเจ้าแห่งโจรสลัด(ราชาโจรสลัด) โดยผู้ที่เคยครอบครองวันพีชนั้นมีอยู่คนเดียวตามที่เปิดเผยคือ เจ้าแห่งโจรสลัด โกลด์ ดี โรเจอร์ ซึ่งหลังจากที่ ได้ครอบครองวันพีซแล้ว โกลด์ ดี โรเจอร์ก็ได้มอบตัว และยอมรับโทษการประหารชีวิตที่เกาะโร๊คบ้านเกิดของตนนั่นเอง และก่อนตายโกลด์ ดี โรเจอร์ ได้ทิ้งคำพูดก่อนตายที่เปลี่ยนยุคสมัยของโจรสลัดว่า \"สมบัติของฉันหรอ อยากได้ก็เอาไปซิ ไปหาเอาเลย ฉันเอาทุกอย่างบนโลกไปไว้ที่นั่นหมดแล้ว\" แล้วเหล่า โจรสลัดทั้งหลายจึงมุ่งหน้าสู้แกรนด์ไลน์เพื่อตามหาวันพีซ', 50, 100, 6, 7, '9102907166680.jpg', '2020-10-23'),
(8, 10, 'Naruto', 'นารูโตะเป็นกำพร้าและไม่มีพี่น้อง เติบโตขึ้นโดยไม่รู้ว่าตนเองมีจิ้งจอกเก้าหางอยู่ภาย ในร่างกาย หลังจากสำเร็จการศึกษาเป็นนินจาชั้น เกะนิน (นินจาระดับล่าง) และปฏิบัติหน้าที่ภายใต้การควบคุมของ ฮาตาเกะ คาคาชิ ซึ่งเป็น โจนิน (นินจาระดับสูง) ฉายา ก๊อบปี้นินจา โดยมีสมาชิกร่วมทีมอีกสองคน คือ อุจิวะ ซาสึเกะ และ ฮารุโนะ ซากุระ', 50, 100, 10, 7, '9102907412301.jpg', '2020-10-23'),
(12, 10, 'Fairytail', 'นัตสึ ดรากูนีล\"ดราก้อนสเลเยอร์ไฟ ได้ออกเดินทางเพื่อตามหาอิกนิลหรือมังกรที่เปรียบเสมือนพ่อของนัตสึ ไปกับแมวบินได้และพูดได้ ชื่อ แฮปปี้ โดยระหว่างทางได้พบกับ\"ลูซี่ ฮาร์ทฟิเลีย\"สาวน้อยผู้อัญเชิญเทพแห่งดวงดาวและได้ตกลงเป็นเพื่อนกันเพราะลูซี่นั้นอยากเข้ากิลด์แฟรี่เทล', 50, 100, 10, 7, '9102906035329.png', '2020-10-23'),
(13, 13, 'Time', 'นิตยสาร TIME', 50, 150, 4, 7, '9104350156863.jpg', '2020-10-23'),
(14, 12, '51 คำถาามเพิ่มความรู้เรื่องอาชีพ', 'รวมประเด็นน่าสนใจเกี่ยวกับอาชีพ', 100, 150, 10, 7, '9104350802507.jpg', '2020-10-23'),
(15, 10, 'Doraemon', 'หุ่นยนเเมวที่ส่งมาช่วย โนบิตะ เพื่อให้อนาคตของเขาเปลื่ยนไป', 45, 75, 29, 7, '9104351707679.png', '2020-10-23'),
(16, 10, '3ก๊ก', 'ตำนานของวีรบุรุษที่จะรวมเเผ่นดินทั้ง3เป็น1', 75, 150, 19, 7, '9104352222267.jpg', '2020-10-23'),
(17, 12, '30 สิ่งมหัศจรรย์ของโลกที่น่ารู้', 'สิ่งมหัศจรรย์ของโลก', 50, 100, 5, 7, '9104352622959.jpg', '2020-10-23'),
(18, 12, 'เกร็ดความรู้เเละภาษาอาเซียน', 'ความรู้เเละภาษาอาเซียน', 80, 150, 9, 7, '9104353026534.jpg', '2020-10-23'),
(19, 13, 'BAZAAR', 'BAZAAR', 50, 190, 10, 7, '9104353499954.jpg', '2020-10-23'),
(20, 12, 'วิทยาศาสตร์ฉลาดรู้เรื่องสมอง', 'วิทยาศาสตรที่เกี่ยวความรู้เรื่องสมอง', 100, 170, 20, 7, '9104353867647.gif', '2020-10-23'),
(21, 11, 'The butterfly tree', 'The butterfly tree', 170, 300, 5, 7, '9104354170879.jpg', '2020-10-23'),
(22, 13, 'CAMPUS', 'CAMPUS', 60, 165, 10, 7, '9104354376857.jpg', '2020-10-23'),
(23, 10, 'ชินจังจอมเเก่น', 'เรื่องราวชินจังที่ต้องทำให้คุณต้องหัวเราะ', 30, 85, 50, 7, '9104354830108.gif', '2020-10-23'),
(24, 10, 'โคนัน', 'นักสืบหนุ่มที่ถูกชายชุดดำจับตัวให้ไปกินยา พอตื่นขึ้นมากลับกายเป็นเด็กอีกครั้ง', 35, 70, 44, 7, '9104355382500.jpg', '2020-10-23'),
(25, 10, 'Dragonball', 'ซุนโกคู ในวัยเด็ก ก็ได้รู้เกี่ยวกับ ดราก้อนบอล จาก บลูม่า ซึ่งกำลังตามหาอยู่ แถมโกคูเองก็มี ดราก้อนบอล4ดาว ซึ่งเป็นของต่างหน้าคุณปู่ ซุนโกฮัง อีกด้วย ก็เลยตัดสินใจไปตามหาดราก้อนบอลด้วยกัน ต่อมาก็ได้ อูลอน มาเป็นพวกช่วยหาด้วย แต่ในระหว่างนั้น ก็มี ยามุชา และ ปูอัล กับ ปิลาฟและพรรคพวก คอยตามหาดราก้อนบอลด้วย', 40, 75, 0, 7, '9104355839451.jpg', '2020-10-23'),
(26, 11, 'ECHOES FROM THE PAST', 'Echoes from the past', 190, 300, 10, 7, '9104356230225.jpg', '2020-10-23'),
(27, 13, 'ELLE', 'ELLE', 30, 90, 10, 6, '9104356389396.webp', '2020-10-23'),
(28, 13, 'FIGARO JAPAN', 'FIGARO JAPAN', 60, 150, 3, 4, '9104356627109.jpg', '2020-10-23'),
(29, 12, 'คว้าเกรด A ง่ายกว่าที่คิด', 'คว้าเกรด A ง่ายกว่าที่คิด', 55, 130, 7, 6, '9104356893659.png', '2020-10-23'),
(30, 11, 'Harry Potter', 'Harry Potter', 160, 300, 30, 7, '9104357146935.jpg', '2020-10-23'),
(31, 13, 'L OFFICIEL', 'L OFFICIEL', 30, 70, 10, 7, '9104357596692.jpg', '2020-10-23'),
(32, 12, 'สนุกกับการค้นหาความรู้ข้างในแผนที่โลก', 'สนุกกับการค้นหาความรู้ข้างในแผนที่โลก', 60, 150, 10, 7, '9104357883099.jpg', '2020-10-23'),
(33, 10, 'My Hero Academia', 'ว่าด้วยเรื่องราวในอนาคต เมื่อพลังพิเศษได้ถูกทยอยค้นพบทั่วทุกมุมโลก จนกลายเป็นเรื่องปกติของคนเจนเนอเรชั่นใหม่ ที่ล้วนเป็นผู้มี “อัตลักษณ์” (พลังพิเศษเฉพาะตัว) สังคมยอดมนุษย์จึงได้เริ่มขึ้น ขณะเดียวกันความวุ่นวายจากผู้ใช้พลังพิเศษในทางที่ผิด ก็ยกระดับความรุนแรง ประเทศจึงได้ร่างกฏหมายต่อต้านความรุนแรง โดยให้เหล่าผู้กล้าคอยปราบปรามเหล่าวายร้าย ', 40, 75, 40, 7, '9104359185860.jpg', '2020-10-23'),
(34, 13, 'OK MAGAZINE', 'OK MAGAZINE', 30, 90, 10, 7, '9104359398955.jpg', '2020-10-23'),
(35, 10, 'Pinocchio', 'Pinocchio', 100, 200, 5, 7, '9104359601161.jpg', '2020-10-23'),
(36, 11, 'บ้านทรายทอง', 'บ้านทรายทอง', 100, 250, 10, 7, '9104359808705.jpg', '2020-10-23'),
(37, 12, 'เอาชีวิครอดบนเกาะร้าง', 'เอาชีวิครอดบนเกาะร้าง', 80, 135, 5, 7, '9104360075753.webp', '2020-10-23'),
(38, 13, 'VOGUE', 'VOGUE', 30, 75, 10, 7, '9104360487722.jpg', '2020-10-23'),
(39, 11, 'Twilight', 'Twilight', 240, 300, 20, 7, '9104361247095.jpg', '2020-10-23'),
(40, 11, 'The darkness of light', 'The darkness of light', 150, 250, 6, 7, '9104361459702.jpg', '2020-10-23'),
(41, 12, 'เพศศึกษาที่เราอยากรู้', 'เพศศึกษาที่เราอยากรู้', 60, 150, 10, 7, '9104361760502.jpg', '2020-10-23'),
(42, 10, 'Sailormoon', 'Sailormoon', 70, 125, 50, 7, '9104361988958.png', '2020-10-23'),
(43, 11, 'RISEN', 'RISEN', 150, 350, 10, 7, '9104362289392.jpg', '2020-10-23'),
(44, 11, 'REALM OF RUINS', 'REALM OF RUINS', 180, 300, 4, 7, '9104362809007.jpg', '2020-10-23'),
(45, 10, 'สโนว์ไวท์', 'สโนว์ไวท์', 100, 200, 7, 5, '9104367662917.jpg', '2020-10-23'),
(46, 10, 'อลิซ ท่องเเดนมหัศจรรย์', 'อลิซ ท่องเเดนมหัศจรรย์', 40, 150, 5, 7, '9104367935394.jpg', '2020-10-23'),
(47, 10, 'Bleach', 'Bleach', 30, 75, 0, 7, '9104368159565.jpg', '2020-10-23'),
(48, 10, 'Lion King', 'Lion King', 70, 150, 2, 3, '9104368352654.jpg', '2020-10-23'),
(49, 12, 'รัชการที่ 9', 'ประวัติศาสตร์ของในหลวงรัชกาลที่ 9', 50, 150, 10, 7, '9104368788022.jpg', '2020-10-23'),
(51, 13, 'qweqwe', 'ssadzxc', 200, 500, 69, 10, '9105550929723.png', '2020-10-26'),
(52, 15, 'เลข', 'หนังสือเลข', 100, 200, 40, 7, '9106337351482.jpg', '2020-10-27');

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
(1, 3, 1, 201),
(2, 4, 1, 1),
(5, 5, 1, 200),
(9, 4, 1, 200),
(10, 3, 1, 201),
(11, 13, 1, 150),
(12, 15, 1, 75),
(13, 15, 20, 1500),
(14, 4, 5, 1000),
(15, 24, 1, 70),
(16, 7, 1, 100),
(17, 16, 1, 150);

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
(10, 'หนังสือการ์ตูน'),
(11, 'หนังสือนิยาย'),
(12, 'หนังสือให้ความรู้'),
(13, 'นิตยสาร'),
(14, 'หนังสืออ้างอิง'),
(15, 'หนังสือเรียน');

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
(4, 'admin', '$2y$10$SY4xbwIYnzlGXMpgdZHyf.LPEcYFIsZqluIzuCwKXBq3M3BeEG5Ay', 'saran', 'Deesubin', '0000000001', 'saran.de@ku.th', '9102901537951.png', '2020-09-26', 'admin'),
(9, 'ford', '$2y$10$PMdn09lEjbW1HXQUbcYTxuSygozJvQIxKzWmVceRwvZWU79uc0co2', 'sarann', 'dee', '0983575083', 'fordza1231230@gmail.com', 'profile.png', '2020-10-20', 'admin'),
(10, 'saran', '$2y$10$xXmyvxu.6Nv/xL8ooPsf6uwzp2iGCALRMP7ofoMnBqTHUTzz8pFlC', 'saranza123', 'deeza123', '0123456798', 'ford555@gmail.com', '9105289098934.png', '2020-10-25', 'user'),
(11, 'fordza', '$2y$10$VorVYHQiu9vKXUfmvjVqq.bxwNfPxcRe67GpKwcaU8LfqKm04ecPO', 'fordford', 'zazaza', '0147258369', 'zaza@gmail.com', '9105549518927.jpg', '2020-10-25', 'admin'),
(12, 'asdasd', '$2y$10$F8XcUHvSW4NBR.UZKQddSOY8g.F2t0/vdqPHFuTDspI6tqRk0ydZm', 'asdasd', 'asdasd', '0147258147', 'asd@gmail.com', 'profile.png', '2020-10-27', 'user'),
(13, 'user', '$2y$10$Pw1k2zepH2brdS54XpYJIOsdyI/SlskWDDMMcrrCiCg8F/51VUKwm', 'ศุภชัย', 'แจ้งอรุณ', '0970562607', 'agileza_555@hotmail.com', 'profile.png', '2020-10-29', 'admin'),
(14, 'user2', '$2y$10$Bdcw55H//GAhyWCmsa4CHeFME8wXIUPC1HxJAkJOYH/9U5/u14Ix.', 'ศุภชัย', 'แจ้งอรุณ', '0970562607', 'agileza_555@hotmail.com', 'profile.png', '2020-10-29', 'user');

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
  ADD PRIMARY KEY (`productloss_id`);

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
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `productloss`
--
ALTER TABLE `productloss`
  MODIFY `productloss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `Type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
