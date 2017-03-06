-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2017 at 01:50 AM
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
  `device_data_status` varchar(50) NOT NULL,
  `device_data_user_fname` varchar(50) NOT NULL,
  `device_data_user_last_fname` varchar(50) NOT NULL,
  `device_data_regis_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_pw` varchar(20) NOT NULL,
  `user_fname` varchar(30) NOT NULL,
  `user_detail` varchar(50) NOT NULL,
  `user_regis_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_pw`, `user_fname`, `user_detail`, `user_regis_datetime`) VALUES
(2, 'admin', 'admin', 'เสี่ยโอ๋', 'admin-ลบคนอื่นได้ แต่ ลบตัวเองไม่ได้', '2017-02-02 08:34:21'),
(3, 'korn', '1234', 'ปกรณ์', 'หล่อเหรี้ยๆ', '2017-02-10 04:41:22'),
(4, 'bento', '1234', 'เบนเองคับ', 'เอาไว้เทสเฉยๆนะพี่', '2017-02-10 07:17:05');

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
  MODIFY `device_data_id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `device_type`
--
ALTER TABLE `device_type`
  MODIFY `device_type_id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log_list`
--
ALTER TABLE `log_list`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `device_data`
--
ALTER TABLE `device_data`
  ADD CONSTRAINT `device_data_ibfk_1` FOREIGN KEY (`device_data_device_type_id`) REFERENCES `device_type` (`device_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
