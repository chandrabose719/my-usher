-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2018 at 08:56 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdu_ushers`
--

-- --------------------------------------------------------

--
-- Table structure for table `design_material_details`
--

CREATE TABLE `design_material_details` (
  `design_material_id` int(100) NOT NULL,
  `design_material_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `design_material_details`
--

INSERT INTO `design_material_details` (`design_material_id`, `design_material_name`, `status`, `date`) VALUES
(1, 'Biomaterial', 'active', '16-11-2018'),
(2, 'Ceramic\n', 'active', '16-11-2018'),
(3, 'Composites', 'active', '16-11-2018'),
(4, 'Glass', 'active', '16-11-2018'),
(5, 'Metal', 'active', '16-11-2018'),
(6, 'Polymers & Plastic', 'active', '16-11-2018'),
(7, 'Wood', 'active', '16-11-2018');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `design_material_details`
--
ALTER TABLE `design_material_details`
  ADD PRIMARY KEY (`design_material_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `design_material_details`
--
ALTER TABLE `design_material_details`
  MODIFY `design_material_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
