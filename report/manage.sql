-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2017 at 01:16 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `fix`
--

CREATE TABLE `fix` (
  `fix_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `date` varchar(17) NOT NULL,
  `status` varchar(10) NOT NULL,
  `fix_detail` text NOT NULL,
  `Status_fix` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fix`
--

INSERT INTO `fix` (`fix_id`, `date`, `status`, `fix_detail`, `Status_fix`) VALUES
(0028, '2017-10-19', '1', 'ท่อน้ำเเตก', '1');

-- --------------------------------------------------------

--
-- Table structure for table `fix_b`
--

CREATE TABLE `fix_b` (
  `fix_id` int(11) NOT NULL,
  `status` int(5) NOT NULL,
  `fix_detail` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `id_p` varchar(13) NOT NULL,
  `cal` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Status2` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`UserID`, `Username`, `Password`, `Name`, `id_p`, `cal`, `address`, `Status`, `Status2`) VALUES
(1, 'admin', '1234', 'ณัฐกิจ', '1399900005711', '0987654321', '47/19', 'admin', 'admin'),
(45, 'l2', '1234', 'สาวิตรี นานุวง', '1399900005715', '0982213792', ' 119/6', '2', 'user'),
(46, 'l3', '1234', 'วิเศษ นงศา', '1399900005711', '0982213792', ' 119/6', '3', 'user'),
(47, 'l4', '1234', 'มนตรี ยาบาล', '139990005766', '090318887', ' 119/6', '4', 'user'),
(48, 'l5', '1234', 'สรวงศ์ นานุวง', '1399900005711', '0945656354', ' 119/6', '5', 'user'),
(49, 'l6', '1234', 'ดาวิกา เสกสรรณ', '1399900005711', '0945656354', ' 119/6', '6', 'user'),
(50, 'l7', '1234', 'ณัฐกิจ ษานุวง', '1399900005711', '0903188878', ' 119/6', '7', 'user'),
(51, 'l8', '1234', 'จิตไมตรี กามณี', '1399900005711', '0945656354', ' 119/6', '8', 'user'),
(54, 'l1', '1234', 'สุวรรณ  สุวรรณศรี', '1388888889999', '0982213792', '34/66', '1', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `member_old`
--

CREATE TABLE `member_old` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `id_p` varchar(13) NOT NULL,
  `cal` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Status2` enum('admin','user','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `news_topic` varchar(300) NOT NULL,
  `news_detail` text NOT NULL,
  `news_image` varchar(150) NOT NULL,
  `news_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_topic`, `news_detail`, `news_image`, `news_date`) VALUES
(0004, 'ขอขึ้นค่าไฟ', '<p>ขอขึ้นค่าไฟจากเดิม 8บาท/หน่วย เป็น 10บาท/หน่วย</p>\r\n', 'img_59b7c0cc90282.jpg', '2017-09-12 11:11:29'),
(0005, 'ขอขึ้นค่าน้ำ', '<p>ขอขึ้นค่าน้ำจากเดิมหน่วยละ25บาทเป็นหน่วยละ30</p>\r\n', 'img_59b7c389ab9fa.jpg', '2017-09-12 11:22:49');

-- --------------------------------------------------------

--
-- Table structure for table `out1`
--

CREATE TABLE `out1` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `Status` varchar(10) NOT NULL,
  `date_a` date NOT NULL,
  `date_b` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `parcel_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `date` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `parcel_detail` text NOT NULL,
  `parcel_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Status` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16') NOT NULL,
  `Month` varchar(15) NOT NULL,
  `fire` int(5) NOT NULL,
  `fire_af` int(5) NOT NULL,
  `fire_unit` int(5) NOT NULL,
  `total_fire` int(5) NOT NULL,
  `water_bf` int(5) NOT NULL,
  `water_af` int(5) NOT NULL,
  `water_unit` int(5) NOT NULL,
  `total_water` int(5) NOT NULL,
  `Rates` int(5) NOT NULL,
  `total` int(5) NOT NULL,
  `room_c` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`UserID`, `Name`, `Status`, `Month`, `fire`, `fire_af`, `fire_unit`, `total_fire`, `water_bf`, `water_af`, `water_unit`, `total_water`, `Rates`, `total`, `room_c`) VALUES
(80, 'จิตไมตรี กามณี', '8', '2017-10-18', 0, 90, 90, 810, 0, 90, 90, 2700, 2500, 6010, 'ค้างชำระ'),
(82, 'มนตรี ยาบาล', '4', '2017-10-18', 199, 300, 101, 909, 199, 300, 101, 3030, 2500, 6439, 'ค้างชำระ'),
(85, 'สาวิตรี นานุวง', '2', '2017-10-19', 300, 400, 100, 800, 300, 400, 100, 3000, 2500, 6300, 'ชำระเเล้ว'),
(87, 'ดาวิกา เสกสรรณ', '6', '2017-10-18', 150, 200, 50, 450, 150, 200, 50, 1500, 2500, 4450, 'ค้างชำระ'),
(93, 'ณัฐกิจ ษานุวง', '7', '2017-10-18', 0, 100, 100, 900, 0, 100, 100, 3000, 2500, 6400, 'ค้างชำระ'),
(116, 'สุวรรณ  สุวรรณศรี', '1', '2017-10-19', 0, 99, 99, 891, 0, 99, 99, 2970, 2500, 6361, 'ชำระเเล้ว'),
(130, 'ฐานิกา ต่อวาศ', '9', '2017-10-18', 0, 66, 66, 594, 0, 66, 66, 1980, 2500, 5074, 'ค้างชำระ'),
(131, 'ฐานิกา ต่อวาศ', '9', '2017-10-18', 66, 199, 133, 1197, 66, 99, 33, 990, 2500, 4687, 'ค้างชำระ'),
(132, 'ฐานิกา ต่อวาศ', '9', '2017-10-18', 199, 200, 1, 9, 99, 200, 101, 3030, 2500, 5539, 'ค้างชำระ'),
(137, 'สุวรรณ  สุวรรณศรี', '1', '2017-10-19', 99, 199, 100, 800, 99, 199, 100, 3000, 3000, 6800, 'ค้างชำระ'),
(138, 'วิเศษ นงศา', '3', '2017-10-19', 0, 66, 66, 528, 0, 66, 66, 1980, 3000, 5508, 'ชำระเเล้ว');

-- --------------------------------------------------------

--
-- Table structure for table `room_s`
--

CREATE TABLE `room_s` (
  `UserID` int(2) UNSIGNED ZEROFILL NOT NULL,
  `room` varchar(10) CHARACTER SET utf8 NOT NULL,
  `Status` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `room_s`
--

INSERT INTO `room_s` (`UserID`, `room`, `Status`) VALUES
(03, '1', '1'),
(04, '1', '2'),
(05, '1', '3'),
(06, '1', '4'),
(07, '1', '5'),
(08, '1', '6'),
(09, '1', '7'),
(10, '1', '8'),
(20, '2', '9'),
(21, '2', '10'),
(22, '2', '11');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `ID` int(5) NOT NULL,
  `fire1` int(5) NOT NULL,
  `water1` int(5) NOT NULL,
  `retes` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`ID`, `fire1`, `water1`, `retes`) VALUES
(1, 8, 30, 3000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fix`
--
ALTER TABLE `fix`
  ADD PRIMARY KEY (`fix_id`);

--
-- Indexes for table `fix_b`
--
ALTER TABLE `fix_b`
  ADD PRIMARY KEY (`fix_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `member_old`
--
ALTER TABLE `member_old`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `out1`
--
ALTER TABLE `out1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`parcel_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `room_s`
--
ALTER TABLE `room_s`
  ADD PRIMARY KEY (`UserID`);
ALTER TABLE `room_s` ADD FULLTEXT KEY `status` (`Status`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fix`
--
ALTER TABLE `fix`
  MODIFY `fix_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `fix_b`
--
ALTER TABLE `fix_b`
  MODIFY `fix_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `member_old`
--
ALTER TABLE `member_old`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `out1`
--
ALTER TABLE `out1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `parcel_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `room_s`
--
ALTER TABLE `room_s`
  MODIFY `UserID` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
