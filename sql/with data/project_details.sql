-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2019 at 04:46 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usher_tduusher`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_details`
--

CREATE TABLE `project_details` (
  `project_id` int(11) NOT NULL,
  `user_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_usage` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `project_technology` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_material` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_finish` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_qty` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_timeline` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_tolerance` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_instruction` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_info` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `project_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `project_details`
--

INSERT INTO `project_details` (`project_id`, `user_id`, `project_name`, `project_usage`, `project_description`, `project_technology`, `project_material`, `project_finish`, `project_qty`, `project_timeline`, `project_tolerance`, `project_instruction`, `project_info`, `order`, `project_status`, `status`, `project_date`) VALUES
(1, '1', 'Via4trend furniture ', ' front store letters ', 'Color black:Via\r\n4 : orange color\r\nTrend: black \r\nFurniture: orange color ', 'Lighted letters ', 'Acrylic I think it’s better price and good material ', 'Please your choose ', '01', '30-04-2019', 'Best of the best kkkkkk', 'Size : Letras : Via4trend Furniture \r\nVia 26 inches \r\n4 : 28 inches\r\nTrend : 13 inches \r\nFurniture: ', 'Color black:Via\r\n4 : orange color\r\nTrend: black \r\nFurniture: orange color ', 'LEAD1', 'COMPLETED', 'active', '1555377932'),
(2, '2', 'Guardrail connection', 'Private use', 'A small piece of plastic to connect a guardrail from a hobby I have.', 'SLA', 'ABS', '', '200', '28-04-2019', '+/- 0,05 mm', 'I would lie to see a close photo of one piece (it\'s a small piece) done by you. I want see how it lo', 'Black', 'LEAD2', 'COMPLETED', 'active', '1555981708');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_details`
--
ALTER TABLE `project_details`
  ADD PRIMARY KEY (`project_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_details`
--
ALTER TABLE `project_details`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
