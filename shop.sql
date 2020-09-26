-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 เม.ย. 2020 เมื่อ 10:51 AM
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
(66, 68, 'TOSHIBA เครื่องทำน้ำอุ่น (3,800 วัตต์) รุ่น DSK38S5KW', 'ขนาดกำลังไฟฟ้า(วัตต์):3800\r\n\r\nระบบความปลอดภัย:DOUBLE THERMOSTAT\r\n\r\nตัดไฟภายใน(วินาที):0.1\r\n\r\nการเชื่อมต่อได้สูงสุด(จุด):2', 2424.00, 12, '9008247639958.jpg', '2020-04-10', 4),
(67, 68, 'RINNAI เครื่องทำน้ำอุ่น (6,000 วัตต์) รุ่น DENKI 600MP', 'กำลังไฟฟ้า(วัตต์) : 6,000\r\n\r\nระบบความปลอดภัย : ตัดไฟด้วยเบรกเกอร์พร้อมไฟแสดงการทำงานของ ELCB\r\n\r\nตัวทำความร้อน : ฮีสเตอร์ ถูกออกแบบพิเศษให้ความร้อนสูงหนา 1.0 มม. \r\n\r\nระบบควบคุมอุณหภูมิ : ELECTRONIC TEMPERATURE CONTROL ', 1312.00, 222, '9008247962061.jpg', '2020-04-10', 4),
(68, 68, 'STIEBEL ELTRON เครื่องทำน้ำอุ่น (4500 วัตต์) รุ่น AQ45E-3', 'ขนาดกำลังไฟฟ้า(วัตต์):4500\r\n\r\nระบบความปลอดภัย:ELSD\r\n\r\nตัดไฟภายใน(วินาที):0.1ระบบควบคุมอุณหภูมิของน้ำสูงสุด(องศา):42\r\n\r\nการติดตั้ง:แนวตั้ง', 2233.00, 3232, '9008248244662.jpg', '2020-04-10', 4),
(69, 68, 'MAZUMA เครื่องทำน้ำอุ่น (4500 วัตต์, สีทอง) รุ่น MIRACLE 4.5 (GOLD)', '• กำลังไฟฟ้า(วัตต์) : 4,500\r\n\r\n• ระบบความปลอดภัย : ELB\r\n\r\n• ตัดไฟภายใน : 0.1 วินาที\r\n\r\n• การเชื่อมต่อได้สูงสุด(จุด) : 2', 4322.00, 12321, '9008248804634.jpg', '2020-04-10', 4),
(70, 62, 'LG เครื่องปรับอากาศ (12,000 BTU, Inverter) รุ่น IV13RN.SE2', 'Inverter : ใช่\r\n\r\nBTU : 12,000\r\n\r\nRoom size (sqm) : 14 -18 \r\n\r\nBTU Range: 2000-13500', 2344.00, 234, '9008249439433.jpg', '2020-04-10', 4),
(71, 62, 'ACONATIC เครื่องปรับอากาศเคลื่อนที่ (15,000 BTU) รุุ่น AN-PAC15H', 'ขนาด(BTU):15000\r\n\r\nสำหรับห้องขนาด(ตรม):24-30\r\n\r\nรับประกันคอมเพรสเซอร์(ปี):3\r\n\r\nระบบเร่งความเย็น:มี', 1233.00, 363, '9008249858881.jpg', '2020-04-10', 4),
(72, 62, 'MITSUBISHI ELECTRIC เครื่องปรับอากาศ (9,212 BTU) รุ่น MS-GN09VF + ท่อ', 'ขนาด(BTU) : 9,212\r\n\r\nสำหรับห้องขนาด(ตร.ม.) : 9-14\r\n\r\nระบบฟอกอากาศ : AIR CLEANING FILTER\r\n\r\nรับประกันCompressor(ปี) : 5', 234.00, 234, '9008251063315.jpg', '2020-04-10', 4),
(73, 62, 'MITSUBISHI HEAVY DUTY เครื่องปรับอากาศ (12,039 BTU) รุ่น SRK13CVS-W2 + ท่อ', 'ขนาด(BTU):12,039\r\n\r\nสำหรับห้องขนาด(ตรม)9-16\r\n\r\nระบบฟอกอากาศแบบ TITANIUM ENZYME FILTER\r\n\r\nระบบกระจายความเย็น:2 ทิศทาง', 2344.00, 4423, '9008252454080.jpg', '2020-04-10', 4),
(74, 63, 'BEKO ตู้เย็น 2 ประตู (12 คิว) รุ่น RDNT371E50VK', 'ขนาด(คิว):12\r\n\r\nปริมาณความจุ(ลิตร):340\r\n\r\nระบบทำความเย็น:ProSmart Inverter Compressor\r\n\r\nระบบกระจายความเย็น:NeoFrost Triple Cooling', 3455.00, 4325, '9008253773331.jpg', '2020-04-10', 4),
(75, 63, 'BEKO ตู้เย็น 4 ประตู (21.2 คิว) รุ่น GNE60521ZDX', 'ประตู/ขนาด : 4ประตู/21.2คิว/600ลิตร\r\n\r\nระบบทำความเย็น : FIXED SPEEDCOMPRESSOR ใช้สารทำความเย็นR600A\r\n\r\nระบบกระจายความเย็น : NEOFROST DOUBLECOOLING แยกส่วนอิสระภายใน\r\n\r\nระบบกำจัดกลิ่น : ACTIVE ODOUR FILTER กรองกลิ่นภายในตู้เย็น', 2345.00, 23452, '9008254003606.jpg', '2020-04-10', 4),
(76, 63, 'ELECTROLUX ตู้เย็น 3 ประตู (16.7 คิว) รุ่น EHE5', 'ระบบกระจายความเย็น : MULTI-AIR FLOW\r\n\r\nระบบกำจัดกลิ่น : FRESH TASTE DEODORIZER\r\n\r\nรับประกัน Compressor(ปี) : 10\r\n\r\nขนาดเครื่อง (ซม) : 80.0x182.5x72.7', 2344.00, 234, '9008254246495.jpg', '2020-04-10', 4),
(77, 63, 'SHARP ตู้เย็น 2 ประตู (19.6 คิว, สีน้ำตาล ) รุ่น SJ-X550GP-BR', 'ประตู/ขนาด:2ประตู/19.6คิว/556ลิตร\r\n\r\nระบบทำความเย็น:J-TECH INVERTER SYSTEM\r\n\r\nระบบกระจายความเย็น:ADVANCE HYBIRD COOLING ทำให้อาหารสดและคงคุณค่าได้นานกว่า\r\n\r\nขนาดเครื่อง(ซม.): 82.0x187.0x74.0', 23425.00, 35345, '9008255411776.jpg', '2020-04-10', 4),
(78, 69, 'HUAWEI Y9s (128GB, สี Midnight Black)', 'ขนาดจอ(นิ้ว):6.59\r\n\r\nจอแสดงผล:2340 X 1080 PIXELS, PPI: 391\r\n\r\nCHIPSET:HISILICON KIRIN 710F\r\n\r\nระบบปฏิบัติการ:ANDROID 9 +EMUI 9.1', 8080.00, 2342, '9008256245535.jpg', '2020-04-10', 4),
(79, 69, 'Xiaomi Redmi 8 (64GB,Onyx Black)  XIAOMI Redmi 8 (64GB,สีดำ)', 'ขนาดจอ(นิ้ว):6.21\r\n\r\nจอแสดงผล:IPS LCD 24 BIT 720 x 1520 CORNING GORILLA GLASS 5\r\n\r\nCPU:QUALCOMM SNAPDRAGON 439 OCTA CORE 2.0 GHZ\r\n\r\nระบบปฏิบัติการ:MIUI 9 BASED ON ANDROID 9.0 (PIE)', 9000.00, 12321, '9008256517047.png', '2020-04-10', 4),
(80, 69, 'APPLE iPhone XS Max (256GB, Silver)', 'ขนาดจอ(นิ้ว):6.5\r\n\r\nCHIPSET:A12 BIONIC CHIP NEXT-GENERATION NEURAL ENGINE\r\n\r\nระบบปฏิบัติการ:IOS 12\r\n\r\nขนาดเครื่อง (ซม.) : 15.75X0.77X7.74', 20000.00, 444, '9008256826597.jpg', '2020-04-10', 4),
(81, 69, 'SAMSUNG Galaxy S10 (128GB, สี Prism Gree', 'ขนาดจอ(นิ้ว):6.1\r\n\r\nจอแสดงผล:Quad FHD+ (3040x1440) 550 PPI\r\n\r\nCPU:EXYNOS 9820 OCTA CORE 64 BITS, 8NM\r\n\r\nระบบปฏิบัติการ:Android 9\r\n\r\n', 31200.00, 3434, '9008257101947.jpg', '2020-04-10', 4),
(82, 69, 'HUAWEI Media Pad (10.1\", Ram 3 GB) รุ่น HW-T5-LTE(BL)', 'ขนาดหน้าจอ(นิ้ว):10.1\r\n\r\nจอแสดงผล:FHD 1920 x 1200 PIXELS, PPI:224 IPS\r\n\r\nCPU:OCTA-CORE A53, 4 x 2.36 GHz + 4 x 1.7 GHz\r\n\r\nระบบปฏิบัติการ:ANDROID 8.0 (PIE)+ EMUI 8.0', 23000.00, 345, '9008257357111.jpg', '2020-04-10', 4),
(83, 69, 'VIVO วีโว่ S1Pro สีขาว', 'วีโว่ S1Pro สีขาว', 7899.00, 132, '9008258157521.jpg', '2020-04-10', 4),
(84, 69, 'XIAOMI Redmi Note 8 Pro (128GB,สี Mineral Grey)', 'ขนาดจอ(นิ้ว):6.53\r\n\r\nจอแสดงผล:IPS LCD 16M 6.53\" 1080 x 2340 PXI\r\n\r\nCPU:MEDIETEK HELIO G90T\r\n\r\nระบบปฏิบัติการ:ANDROID 9.0(PIE),MIUI 10', 12000.00, 132, '9008259898377.jpg', '2020-04-10', 4),
(85, 70, 'DELL Inspiron 15 3593-W566055149THW10', 'Model\r\nBrand\r\nDELL\r\nModel\r\nDELL Inspiron 15 3593-W566055149THW10\r\nModel Year\r\nQ2 / 2020\r\nCPU\r\nIntel Core i7-1065G7 (1.30 GHz, 8 MB L3 Cache up to 3.90 Ghz)\r\nCPU RANK\r\n#14\r\nAMD Ryzen 7 3750H\r\n2.53%\r\nIntel Core i5-8300H\r\n1.98%\r\nIntel Core i7-1065G7\r\nAMD Ryzen 5 3550H\r\n1.46%\r\nIntel Core i5-8269U\r\n2.1%\r\nTop CPU Ranking\r\nNotebook with this CPU', 24233.00, 423, '9008261157291.jpg', '2020-04-10', 4),
(86, 70, 'DELL Inspiron 15 3593-W566055149THW10', 'DELL Inspiron 15 3593-W566055149THW10\r\nModel\r\nBrand\r\nDELL\r\nModel\r\nDELL Inspiron 15 3593-W566055149THW10\r\nModel Year\r\nQ2 / 2020\r\nCPU\r\nIntel Core i7-1065G7 (1.30 GHz, 8 MB L3 Cache up to 3.90 Ghz)\r\nCPU RANK\r\n#14\r\nAMD Ryzen 7 3750H\r\n2.53%\r\nIntel Core i5-8300H\r\n1.98%\r\nIntel Core i7-1065G7\r\nAMD Ryzen 5 3550H\r\n1.46%\r\nIntel Core i5-8269U\r\n2.1%\r\nTop CPU Ranking\r\nNotebook with this CPU', 21333.00, 123, '9008261979627.jpg', '2020-04-10', 4),
(87, 70, 'DELL Inspiron 15 3593-W566055149THW10', 'DELL Inspiron 15 3593-W566055149THW10\r\nModel\r\nBrand\r\nDELL\r\nModel\r\nDELL Inspiron 15 3593-W566055149THW10\r\nModel Year\r\nQ2 / 2020\r\nCPU\r\nIntel Core i7-1065G7 (1.30 GHz, 8 MB L3 Cache up to 3.90 Ghz)', 31222.00, 1234, '9008262241853.jpg', '2020-04-10', 4),
(88, 70, 'Acer Nitro 7 AN715-51-53UV', 'Acer Nitro 7 AN715-51-53UV\r\nModel\r\nBrand\r\nAcer\r\nModel\r\nAcer Nitro 7 AN715-51-53UV\r\nModel Year\r\nQ1 / 2020\r\nCPU\r\nIntel Core i5-9300H (2.40 GHz, 8 MB L3 Cache, up to 4.10 GHz)\r\nCPU RANK\r\n#11\r\nIntel Core i7-10710U\r\n7.47%\r\nIntel Core i5-9400H\r\n4.69%\r\nIntel Core i5-9300H\r\nAMD Ryzen 7 3750H\r\n0.87%\r\nIntel Core i5-8300H\r\n1.42%\r\nTop CPU Ranking\r\nNotebook with this CPU', 31000.00, 234, '9008263048533.jpg', '2020-04-10', 4),
(89, 70, 'MSI GL65 9SC-059TH', 'MSI GL65 9SC-059TH\r\nModel\r\nBrand\r\nMSI\r\nModel\r\nMSI GL65 9SC-059TH\r\nModel Year\r\nQ1 / 2020\r\nCPU\r\nIntel Core i7-9750H (2.60 GHz, 12 MB L3 Cache, up to 4.50 GHz)', 21000.00, 3456, '9008263793484.jpg', '2020-04-10', 4),
(90, 70, 'MSI Alpha 15 A3DD-014TH', 'MSI Alpha 15 A3DD-014TH\r\nModel\r\nBrand\r\nMSI\r\nModel\r\nMSI Alpha 15 A3DD-014TH\r\nModel Year\r\nQ4 / 2019\r\nCPU\r\nAMD Ryzen 7 3750H (2.30 GHz, 4 MB L3 Cache, up to 4.00 GHz)', 31000.00, 1235, '9008264857372.jpg', '2020-04-10', 4),
(91, 70, 'HP Pavilion Gaming 15-ec0013ax 94.7K views 0 SHARES', 'HP Pavilion Gaming 15-ec0013ax\r\nModel\r\nBrand\r\nHP\r\nModel\r\nHP Pavilion Gaming 15-ec0013ax\r\nModel Year\r\nQ3 / 2019\r\nCPU\r\nAMD Ryzen 5 3550H (2.10 GHz, 4 MB L3 Cache, up to 3.70 GHz)', 42333.00, 546, '9008265140933.jpg', '2020-04-10', 4),
(92, 71, 'AMD Ryzen 9 3900X', 'Model\r\nBrandAMD\r\nModelRyzen 9 3900X\r\nSpecification\r\nSocketAM4\r\nCPU Core / Thread12/24\r\nFrequency3.80 GHz\r\nTurbo4.60 GHz\r\nCPU Bus-\r\nArchitecture7nm\r\nCache L26MB\r\nCache L364MB\r\nPower Peak105W', 19000.00, 234, '9008266637957.png', '2020-04-10', 4),
(93, 71, 'AMD Ryzen 5 3600', 'Model\r\nBrandAMD\r\nModelRyzen 5 3600\r\nSpecification\r\nSocketAM4\r\nCPU Core / Thread6/12\r\nFrequency3.60 GHz\r\nTurbo4.20 GHz\r\nCPU Bus-\r\nArchitecture7nm\r\nCache L23MB\r\nCache L332MB\r\nPower Peak65W', 5400.00, 234, '9008266900183.png', '2020-04-10', 4),
(94, 71, 'INTEL Core i5-9400F', 'Model\r\nBrandINTEL\r\nModelCore i5-9400F\r\nSpecification\r\nSocketLGA1151-v2\r\nCPU Core / Thread6/6\r\nFrequency2.9 GHz\r\nTurbo4.1 GHz\r\nCPU Bus8 GT/s DMI3\r\nArchitecture14 nm\r\nCache L26 x 256KB\r\nCache L39MB\r\nPower Peak65W', 3100.00, 345, '9008268117316.png', '2020-04-10', 4),
(95, 71, 'KINGSTON HyperX FURY RGB DDR4 16GB (8GBx2) 3200', 'Model\r\nBrandKINGSTON\r\nModelHyperX FURY RGB DDR4 16GB (8GBx2) 3200\r\nSpecification\r\nชนิดแรมDDR4\r\nความจุ16GB (8GBx2)\r\nVoltage1.35V\r\nRAM Bus3200\r\nCL Timing16-18-18-38', 4100.00, 234, '9008268541903.png', '2020-04-10', 4),
(96, 71, 'TEAMGROUP DELTA TUF Gaming Alliance RGB DDR4 16GB (8GBx2) 3200', 'Model\r\nBrandTEAMGROUP\r\nModelDELTA TUF Gaming Alliance RGB DDR4 16GB (8GBx2) 3200\r\nSpecification\r\nชนิดแรมDDR4\r\nความจุ16GB (8GBx2)\r\nVoltage1.35V\r\nRAM Bus3200\r\nCL Timing16-18-18-38', 3200.00, 234, '9008269820322.png', '2020-04-10', 4),
(97, 71, 'WESTERN DIGITAL Blue 1TB WD10EZEX', 'Model\r\nBrandWestern Digital\r\nModelBlue 1TB WD10EZEX\r\nSpecification\r\nความจุ1TB\r\nขนาด Harddisk3.5\r\nความเร็วจานหมุน7200\r\nขนาด Buffer64MB', 1299.00, 32, '9008270228482.jpg', '2020-04-10', 4),
(98, 71, 'SAMSUNG 970 EVO Plus 250GB NVMe 0 SHAREShare Facebook', 'Model\r\nBrandSAMSUNG\r\nModel970 EVO Plus 250GB NVMe\r\nSpecification\r\nความจุ250GB\r\nขนาด SSD8.0\r\nความเร็วการอ่าน / เขียน3500 / 2300\r\nMaxRandom 4KUp to 250,000 IOPS : 550,000 IOPS\r\nTechnologySamsung Phoenix Controller', 4500.00, 345, '9008270839521.png', '2020-04-10', 4),
(99, 71, 'HP S700 1TB', 'Model\r\nBrandHP\r\nModelS700 1TB\r\nSpecification\r\nความจุ1TB\r\nขนาด SSD2.5\r\nความเร็วการอ่าน / เขียน570 / 525\r\nMaxRandom 4KUp to 90,000 IOPS : 95,000 IOPS\r\nTechnologySilicon Motion SM2258XT', 5600.00, 3455, '9008271235026.png', '2020-04-10', 4),
(100, 71, 'THERMALTAKE Smart M 750W', 'Model\r\nBrandTHERMALTAKE\r\nModelSmart M 750W\r\nSeriesSmart M Series\r\nSpecification\r\nประเภท Power SupplyATX 12V V2.3\r\nกำลังไฟสูงสุด750W\r\nFan Size1 x 140mm Fan\r\nPower Factor CorrectionActive\r\nMainboard Connector20+4 Pin\r\nPCI Ex Connector4 x 6+2-Pin\r\nSata Connector9\r\nรองรับการ SLIReady\r\nรองรับการ Cross FireReady\r\nสามารถถอดสายได้Modular\r\nอัตราการจ่ายพลังงาน>85%@ Typical Load\r\nมาตรฐานรับรอง80 PLUS Brozne\r\nระบบป้องกันไฟเกินYes\r\nรองรับไฟขาเข้า100 - 240 V\r\nช่วงความถี่ขาเข้า47/63 Hz\r\nจำนวนชั่วโมงการใช้งาน>100,000 Hours\r\nขนาด150mm x 160mm x 86mm\r\nFeature เพิ่มเติม-', 2100.00, 324, '9008271649543.jpg', '2020-04-10', 4),
(101, 71, 'TSUNAMI Protector 1262 Music Sync RGB', 'Model\r\nBrandTsunami\r\nModelProtector 1262 Music Sync RGB\r\nSpecification\r\nประเภทMid Tower\r\nรองรับ MotherboardMini-ITX,Micro-ATX,ATX\r\nMaterialSteel, Plastic, Tempered Glass\r\nขนาด (Dimension)280 x 415 x 427\r\nสีBlack\r\nInput Connector1 x USB 3.0 + 1 x USB 2.0 + HD Audio / Mic\r\nน้ำหนัก7.9 Kg\r\nรองรับ VGA ขนาด400\r\nFan CoolingFront : -\r\nTop : 120mm x 3\r\nBottom : 120mm x 3\r\nSide : 120mm x 3\r\nRear : 120mm x 1', 4200.00, 432, '9008272082227.jpg', '2020-04-10', 4),
(102, 71, 'COOLER MASTER MasterAir MA410M RGB', 'Model\r\nBrandCOOLER MASTER\r\nModelMasterAir MA410M RGB\r\nSeriesMasterAir\r\nSpecification\r\nTypeAir Cooler\r\nCPU Support IntelLGA2066 / 2011-v3 / 2011 / 1366 / 1156 / 1155 / 1151 / 1150\r\nCPU Support AMDAM4 / AM3+ / AM3 / AM2+ / FM2+ / FM2 / FM1\r\nRadiator dimension131 x 112 x 165mm\r\nHeat Sink Material4 Heat Pipes / CDC 2.0 / Aluminum Fins\r\nHeat Sink Weight820g\r\nFan included120mm x 2\r\nFan connector4 Pin', 990.00, 44, '9008272657510.png', '2020-04-10', 4);

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
(64, 'เครื่องทำความร้อน'),
(65, 'กระติกน้ำร้อน'),
(66, 'หม้อหุงข้าว'),
(68, 'เครื่องทำน้ำอุ่น'),
(69, 'SmartPhone'),
(70, 'Notebook'),
(71, 'ComputerComponents');

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
(10, 'user', '$2y$10$ek22gPqcxicPyhmoT.OKqekBPTkD7b1L8AWCqyNXqBJwhvlLqjw72', 'ศุภชัย', 'แจ้งอรุณ', '0970562607', 'agileza_555@hotmail.com', '9008196749079.png', '2020-02-23', 'admin'),
(20, 'Peawza', '$2y$10$wRFnMBVUYWDXpO39APdh9up9yWEFgMqHuGvGQ.7nn9/EI4uWKllWe', 'ศุภชัย', 'แจ้งอรุณ', '0970562607', 'agileza_555@hotmail.com', 'profile.png', '2020-04-11', 'user'),
(21, 'user2', '$2y$10$NLLc9BSIOFkHfu/Yl39V2.4sdP6acJ1T82OLP4Mb9x5z/Hki7OXtm', 'ศุภชัย', 'แจ้งอรุณ', '0970562607', 'agileza_555@hotmail.com', 'profile.png', '2020-04-11', 'user');

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
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `Type_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
