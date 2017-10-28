-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2017 at 02:58 PM
-- Server version: 5.7.17-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hueanfaikham`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'ต้ม'),
(2, 'ผัด'),
(3, 'แกง'),
(4, 'ทอด'),
(5, 'ส้มตำ'),
(6, 'ของหวาน'),
(7, 'ข้าว'),
(8, 'เครื่องดื่ม');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_menu` varchar(200) NOT NULL,
  `login_id` int(11) NOT NULL,
  `tb_date` date NOT NULL,
  `tb_time` time NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_menu`, `login_id`, `tb_date`, `tb_time`, `price`) VALUES
(3, '38 ', 70, '2017-08-27', '21:57:14', 1500),
(4, '31 ', 70, '2017-08-27', '21:57:14', 2850);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `img` varchar(200) CHARACTER SET utf8 NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `img`, `price`, `name`, `category_id`) VALUES
(30, 'img/27.jpg', 150, 'ปีกไก่ทอด', 4),
(31, 'img/31.jpg', 150, 'ต้มไก่บ้าน', 1),
(32, 'img/32.jpg', 150, 'แกงฟักใส่ไก่', 3),
(33, 'img/33.jpg', 150, 'ผัดผักรวมมิตร', 2),
(34, 'img/34.jpg', 70, 'ส้มตำไทย', 5),
(35, 'img/35.jpg', 30, 'ข้าวสวย', 7),
(36, 'img/36.jpg', 150, 'บิงซูสตรอเบอรี่', 6),
(37, 'img/37.jpg', 200, 'เบียร์', 8),
(38, 'img/38.jpg', 150, 'ต้มจืด', 1),
(39, 'img/39.jpg', 3, '3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbbooktable`
--

CREATE TABLE `tbbooktable` (
  `tb_id` int(11) NOT NULL,
  `tb_number` varchar(50) NOT NULL,
  `tb_date` date NOT NULL,
  `tb_time` time NOT NULL,
  `tb_status` varchar(50) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblogin`
--

CREATE TABLE `tblogin` (
  `login_id` int(11) NOT NULL,
  `login_firstname` varchar(20) NOT NULL,
  `login_lastname` varchar(20) NOT NULL,
  `login_address` text NOT NULL,
  `login_username` varchar(20) NOT NULL,
  `login_password` varchar(256) NOT NULL,
  `login_email` varchar(50) NOT NULL,
  `login_phone` varchar(10) NOT NULL,
  `login_status` enum('0','100','500','') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblogin`
--

INSERT INTO `tblogin` (`login_id`, `login_firstname`, `login_lastname`, `login_address`, `login_username`, `login_password`, `login_email`, `login_phone`, `login_status`) VALUES
(37, 'benjamart', 'yaprom', '60 moo.7 banwan thabo nongkhai 43110', 'benjiezz', 'e42557b49bb4abfe1914010ceaa8d3fec719c83fa1d674e9566bff65176dbe8e', 'benjamart116@gmail.com', '0804019016', '500'),
(38, 'aphinan', 'janthirat', '241/2 banwan muang udonthani 43125', 'nun2514', '11aee439cbb6efe9b725', 'aphinan@hotmail.com', '0922149728', '0'),
(59, 'employee2', 'huean fai kham', '60 moo.7 banwan thabo nongkhai 43110', 'employee2', 'b3b759995ee2772a3c5a', 'benjamart116@gmail.com', '0922149728', '100'),
(61, 'aroon', 'yaprom', '236/58 banwan thabo nongkhai 43110', 'aroon', 'b3b759995ee2772a3c5a', 'aroon@gmail.com', '0832563255', '0'),
(62, 'nook', 'jumpeeprom', '60 moo 7 banwan thabo nongkhai 43110', 'nook', '11aee439cbb6efe9b725', 'xkdfu_a0306@hotmail.com', '0844003256', '0'),
(63, 'member', 'huean fai kham', '60 moo.7 banwan thabo nongkhai 43110', 'member', '11aee439cbb6efe9b725c351524527a92d65947649766a76d6585b3b170c7db8', 'member@hotmail.com', '0874358236', '0'),
(64, 'employee5', 'huean fai kham', 'thabo nongkhai 43110', 'employee5', 'b3b759995ee2772a3c5a4a679107061c04d8c7d325687b5b162844e7f7cc4cb3', 'employee5@gmail.com', '0832652366', '100'),
(68, 'Employee', '1', '-', 'Employee1', 'b3b759995ee2772a3c5a4a679107061c04d8c7d325687b5b162844e7f7cc4cb3', 'Employee1@hotmail.com', '0896859953', '100'),
(69, '4', '4', '4', '4', '5bba9e3ae28bacfda707f92835a070254ea3d6150191f08de5e2f686f9b516e2', '4@ff.f', '4', '0'),
(70, 'ff', 'ff', 'ff', 'ff', 'd80c37332559917afe08a97ea338ac12833e456bd36b5d2a1d9adc9a99018ef8', 'ff@H', 'ff', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbnews`
--

CREATE TABLE `tbnews` (
  `news_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `news_topic` varchar(200) NOT NULL,
  `news_detail` text NOT NULL,
  `news_filename` varchar(100) NOT NULL,
  `news_date` datetime NOT NULL,
  `newstype_id` int(3) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbnews`
--

INSERT INTO `tbnews` (`news_id`, `news_topic`, `news_detail`, `news_filename`, `news_date`, `newstype_id`) VALUES
(000025, 'อาหารอร่อยจากเฮือนฝ้ายคำ', '<p>อาหารอร่อยจากเฮือนฝ้ายคำ</p>\r\n', 'news_59701859d8c64.jpg', '2017-07-20 09:41:29', 003);

-- --------------------------------------------------------

--
-- Table structure for table `tbnewstype`
--

CREATE TABLE `tbnewstype` (
  `newstype_id` int(3) UNSIGNED ZEROFILL NOT NULL,
  `newstype_detail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbnewstype`
--

INSERT INTO `tbnewstype` (`newstype_id`, `newstype_detail`) VALUES
(003, 'เมนูแนะนำ'),
(004, 'สาระน่ารู้เรื่องอาหาร');

-- --------------------------------------------------------

--
-- Table structure for table `tbtable`
--

CREATE TABLE `tbtable` (
  `tb_id` int(11) NOT NULL,
  `tb_number` varchar(50) NOT NULL,
  `tb_num` varchar(50) NOT NULL,
  `tb_status` enum('0','100','500','') NOT NULL DEFAULT '0',
  `zone_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbtable`
--

INSERT INTO `tbtable` (`tb_id`, `tb_number`, `tb_num`, `tb_status`, `zone_id`) VALUES
(32, '32', '2', '0', 0),
(33, '253', '3', '500', 0),
(35, 'e', 'e', '0', 1),
(36, '34', '45', '0', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbzonetable`
--

CREATE TABLE `tbzonetable` (
  `zone_id` int(11) NOT NULL,
  `zone_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbzonetable`
--

INSERT INTO `tbzonetable` (`zone_id`, `zone_name`) VALUES
(1, 'ชั้น1(ในร้าน)'),
(2, 'ชั้น1(ระเบียงริมโขง)'),
(3, 'ชั้น2(ในร้าน)'),
(4, 'ชั้น2(หลังคาเปิดโล่ง)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbbooktable`
--
ALTER TABLE `tbbooktable`
  ADD PRIMARY KEY (`tb_id`);

--
-- Indexes for table `tblogin`
--
ALTER TABLE `tblogin`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `tbnews`
--
ALTER TABLE `tbnews`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbnewstype`
--
ALTER TABLE `tbnewstype`
  ADD PRIMARY KEY (`newstype_id`);

--
-- Indexes for table `tbtable`
--
ALTER TABLE `tbtable`
  ADD PRIMARY KEY (`tb_id`);

--
-- Indexes for table `tbzonetable`
--
ALTER TABLE `tbzonetable`
  ADD PRIMARY KEY (`zone_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbbooktable`
--
ALTER TABLE `tbbooktable`
  MODIFY `tb_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblogin`
--
ALTER TABLE `tblogin`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `tbnews`
--
ALTER TABLE `tbnews`
  MODIFY `news_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tbnewstype`
--
ALTER TABLE `tbnewstype`
  MODIFY `newstype_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbtable`
--
ALTER TABLE `tbtable`
  MODIFY `tb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `tbzonetable`
--
ALTER TABLE `tbzonetable`
  MODIFY `zone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
