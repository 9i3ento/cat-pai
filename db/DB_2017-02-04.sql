-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2017 at 07:49 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cat-pai`
--
CREATE DATABASE IF NOT EXISTS `cat-pai` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cat-pai`;

-- --------------------------------------------------------

--
-- Table structure for table `device_data`
--

CREATE TABLE `device_data` (
  `device_data_id` int(6) NOT NULL,
  `device_data_sn` varchar(50) NOT NULL,
  `device_data_device_type_id` int(11) NOT NULL,
  `device_data_cus_name` varchar(100) NOT NULL,
  `device_data_cat_id` varchar(30) NOT NULL,
  `device_data_regis_date` date NOT NULL,
  `device_data_status` varchar(30) NOT NULL,
  `device_data_regis_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `device_data`
--

INSERT INTO `device_data` (`device_data_id`, `device_data_sn`, `device_data_device_type_id`, `device_data_cus_name`, `device_data_cat_id`, `device_data_regis_date`, `device_data_status`, `device_data_regis_datetime`) VALUES
(2, 'SN000284764732A', 3, '', '', '0000-00-00', 'new_device', '2017-01-17 17:23:28'),
(4, '19022A59305243', 2, '', '', '0000-00-00', 'new_device', '2017-01-17 17:29:40'),
(5, '19022A59305244', 2, '', '', '0000-00-00', 'new_device', '2017-01-17 17:38:00'),
(7, '19022A59305247', 2, '', '', '0000-00-00', 'new_device', '2017-01-17 17:50:00'),
(15, '19022A59305249', 2, 'AAAAA', 'BBBBB', '2017-01-18', 'Expired', '2017-01-27 01:01:05'),
(16, 'SN000284764773A', 3, 'MR.X', '000542', '2017-01-19', 'Used', '2017-01-27 00:56:17'),
(17, 'GDN45643SSD', 4, '', '', '0000-00-00', 'new_device', '2017-02-03 04:08:59'),
(18, 'GDN45643SSDS', 4, 'วรพรรณ', '190007654@jhgf', '2017-02-01', 'Used', '2017-02-04 13:41:00'),
(19, 'GDN45643SSDD', 4, '', '', '0000-00-00', 'new_device', '2017-02-03 04:09:54'),
(20, 'GDN45643SSDF', 4, '', '', '0000-00-00', 'new_device', '2017-02-03 04:10:32'),
(21, 'ERITEST', 6, '', '', '0000-00-00', 'new_device', '2017-02-03 04:16:17'),
(22, 'ERITESTERITEST', 6, '', '', '0000-00-00', 'new_device', '2017-02-03 04:16:36'),
(23, 'GDN45643SSDB', 4, 'GDN45643SSD', 'GDN45643SSD', '2017-02-03', 'Used', '2017-02-03 04:29:55'),
(24, 'SNDD567890IYTDDRT', 5, 'KaiKa', '1864479ADFK', '2017-02-03', 'Expired', '2017-02-03 04:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `device_type`
--

CREATE TABLE `device_type` (
  `device_type_id` int(6) NOT NULL,
  `device_type_type` varchar(100) NOT NULL,
  `device_type_model` varchar(100) NOT NULL,
  `device_type_description` varchar(200) NOT NULL,
  `device_type_register_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `device_type`
--

INSERT INTO `device_type` (`device_type_id`, `device_type_type`, `device_type_model`, `device_type_description`, `device_type_register_datetime`) VALUES
(2, 'Broadband Router', 'E1200', 'Linksys E1200', '2017-01-11 17:06:03'),
(3, 'ONU Single Port', 'AT-ON1000', 'Alied Telesis', '2017-01-12 15:23:44'),
(4, 'MAYTEST', 'GDN45643SSD', 'MAYTEST MAYTEST MAYTEST', '2017-02-03 03:10:47'),
(5, 'ERITESTer', 'SNDD567890IYT', 'ERITEST ERITEST ERITEST ERITEST', '2017-02-03 03:23:54'),
(6, 'ERITEST', 'ERITEST', 'ERITESTERITESTERITEST', '2017-02-03 03:33:17');

-- --------------------------------------------------------

--
-- Table structure for table `log_list`
--

CREATE TABLE `log_list` (
  `log_id` int(11) NOT NULL,
  `log_activity` varchar(100) NOT NULL,
  `log_addr` varchar(20) NOT NULL,
  `log_datetime` datetime NOT NULL,
  `log_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_list`
--

INSERT INTO `log_list` (`log_id`, `log_activity`, `log_addr`, `log_datetime`, `log_user_id`) VALUES
(12, 'ผู้ดูแลระบบ chai ออกจากระบบ.', '127.0.0.1', '2017-02-02 08:14:03', 1),
(13, 'ผู้ดูแลระบบ chai เข้าสู่ระบบ.', '127.0.0.1', '2017-02-02 08:14:18', 1),
(14, 'ผู้ดูแลระบบ chai ออกจากระบบ.', '127.0.0.1', '2017-02-02 08:16:36', 1),
(15, 'ผู้ดูแลระบบ chai เข้าสู่ระบบ.', '127.0.0.1', '2017-02-02 08:16:48', 1),
(16, 'ผู้ดูแลระบบ chai ออกจากระบบ.', '192.168.43.228', '2017-02-02 08:30:44', 1),
(17, 'ผู้ดูแลระบบ chai เข้าสู่ระบบ.', '192.168.43.228', '2017-02-02 08:31:15', 1),
(18, 'ผู้ดูแลระบบ chai ออกจากระบบ.', '192.168.43.228', '2017-02-02 08:34:38', 1),
(19, 'ผู้ดูแลระบบ admin เข้าสู่ระบบ.', '192.168.43.228', '2017-02-02 08:34:46', 2),
(20, 'adminเพิ่มข้อมูลชนิด ERITEST.', '192.168.43.228', '2017-02-03 03:21:17', 2),
(21, 'admin แก้ไขข้อมูลชนิด ERITESTer.', '192.168.43.228', '2017-02-03 03:23:54', 2),
(22, 'admin เพิ่มข้อมูลชนิด ERITEST.', '192.168.43.228', '2017-02-03 03:26:28', 2),
(23, 'admin เพิ่มข้อมูลชนิด ERITESTIST.', '192.168.43.228', '2017-02-03 03:27:05', 2),
(24, 'admin แก้ไขข้อมูลชนิด ERITEST.', '192.168.43.228', '2017-02-03 03:30:49', 2),
(25, 'admin แก้ไขข้อมูลชนิด ERITEST.', '192.168.43.228', '2017-02-03 03:31:42', 2),
(26, 'admin แก้ไขข้อมูลชนิด ERITEST.', '192.168.43.228', '2017-02-03 03:32:55', 2),
(27, 'admin แก้ไขข้อมูลชนิด ERITEST.', '192.168.43.228', '2017-02-03 03:33:17', 2),
(28, 'admin ลบชนิด ERITESTIST.', '192.168.43.228', '2017-02-03 03:35:25', 2),
(29, 'adminลบข้อมูลอุปกรณ์ ERITEST ออกจากระบบ.', '192.168.43.228', '2017-02-03 04:07:27', 2),
(30, 'admin เพิ่มข้อมูลอุปกรณ์ใหม่ ERITEST.', '192.168.43.228', '2017-02-03 04:16:17', 2),
(31, 'admin เพิ่มข้อมูลอุปกรณ์ใหม่ ERITESTERITEST.', '192.168.43.228', '2017-02-03 04:16:36', 2),
(32, 'admin เพิ่มข้อมูลอุปกรณ์ GDN45643SSDB.', '192.168.43.228', '2017-02-03 04:29:55', 2),
(33, 'admin เพิ่มข้อมูลอุปกรณ์ SNDD567890IYTDDRT.', '192.168.43.228', '2017-02-03 04:38:17', 2),
(34, 'adminแก้ไขข้อมูลอุปกรณ์  GDN45643SSDS.', '192.168.43.228', '2017-02-04 13:41:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_pw` varchar(20) NOT NULL,
  `user_description` varchar(50) NOT NULL,
  `user_regis_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_pw`, `user_description`, `user_regis_datetime`) VALUES
(1, 'chai', '12345', 'user chai kubb.', '2017-01-27 04:38:24'),
(2, 'admin', 'admin', 'admin InW Piority 1. saddd.', '2017-02-02 08:34:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `device_data`
--
ALTER TABLE `device_data`
  ADD PRIMARY KEY (`device_data_id`),
  ADD KEY `devices_data_devices_type_id` (`device_data_device_type_id`);

--
-- Indexes for table `device_type`
--
ALTER TABLE `device_type`
  ADD PRIMARY KEY (`device_type_id`);

--
-- Indexes for table `log_list`
--
ALTER TABLE `log_list`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `device_data`
--
ALTER TABLE `device_data`
  MODIFY `device_data_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `device_type`
--
ALTER TABLE `device_type`
  MODIFY `device_type_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `log_list`
--
ALTER TABLE `log_list`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `device_data`
--
ALTER TABLE `device_data`
  ADD CONSTRAINT `device_data_ibfk_1` FOREIGN KEY (`device_data_device_type_id`) REFERENCES `device_type` (`device_type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
