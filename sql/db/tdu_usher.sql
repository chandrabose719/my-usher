-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2019 at 10:17 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usher_partnerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assembly_details`
--

CREATE TABLE `assembly_details` (
  `assembly_id` int(100) NOT NULL,
  `assembly_name` varchar(100) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assembly_details`
--

INSERT INTO `assembly_details` (`assembly_id`, `assembly_name`, `image_path`, `status`, `date`) VALUES
(1, 'Single Part', 'assets/images/design/3DUsher-DescribeProject-Assembly-1.png', 'active', '16-11-2018'),
(2, 'Multiple Parts (Non Assembly)', 'assets/images/design/3DUsher-DescribeProject-Assembly-2.png', 'active', '16-11-2018'),
(3, 'Multiple Parts (Assembled)', 'assets/images/design/3DUsher-DescribeProject-Assembly-3.png', 'active', '16-11-2018');

-- --------------------------------------------------------

--
-- Table structure for table `color_details`
--

CREATE TABLE `color_details` (
  `color_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `color_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color_details`
--

INSERT INTO `color_details` (`color_id`, `technology_id`, `material_id`, `color_name`, `status`, `date`) VALUES
(1, 1, '1', 'WHITE', 'active', '9-11-2018'),
(2, 1, '1', 'RED', 'active', '9-11-2018'),
(3, 1, '1', 'GREEN', 'active', '9-11-2018'),
(4, 1, '2', 'WHITE', 'active', '9-11-2018'),
(5, 1, '2', 'RED', 'active', '9-11-2018'),
(6, 1, '2', 'GREEN', 'active', '9-11-2018'),
(7, 1, '3', 'WHITE', 'active', '9-11-2018'),
(8, 1, '3', 'RED', 'active', '9-11-2018'),
(9, 1, '3', 'GREEN', 'active', '9-11-2018'),
(10, 1, '4', 'WHITE', 'active', '9-11-2018'),
(11, 1, '4', 'RED', 'active', '9-11-2018'),
(12, 1, '4', 'GREEN', 'active', '9-11-2018'),
(13, 2, '5', 'WHITE', 'active', '9-11-2018'),
(14, 2, '5', 'BLACK', 'active', '9-11-2018'),
(15, 2, '6', 'WHITE', 'active', '9-11-2018'),
(16, 2, '6', 'BLACK', 'active', '9-11-2018'),
(17, 3, '7', 'WHITE', 'active', '9-11-2018'),
(18, 3, '7', 'BLACK', 'active', '9-11-2018'),
(19, 3, '8', 'NATURAL', 'active', '9-11-2018'),
(20, 3, '9', 'NATURAL', 'active', '9-11-2018');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `status`) VALUES
(1, 'AF', 'Afghanistan', 'inactive'),
(2, 'AL', 'Albania', 'inactive'),
(3, 'DZ', 'Algeria', 'inactive'),
(4, 'DS', 'American Samoa', 'inactive'),
(5, 'AD', 'Andorra', 'inactive'),
(6, 'AO', 'Angola', 'inactive'),
(7, 'AI', 'Anguilla', 'inactive'),
(8, 'AQ', 'Antarctica', 'inactive'),
(9, 'AG', 'Antigua and Barbuda', 'inactive'),
(10, 'AR', 'Argentina', 'inactive'),
(11, 'AM', 'Armenia', 'inactive'),
(12, 'AW', 'Aruba', 'inactive'),
(13, 'AU', 'Australia', 'inactive'),
(14, 'AT', 'Austria', 'inactive'),
(15, 'AZ', 'Azerbaijan', 'inactive'),
(16, 'BS', 'Bahamas', 'inactive'),
(17, 'BH', 'Bahrain', 'inactive'),
(18, 'BD', 'Bangladesh', 'inactive'),
(19, 'BB', 'Barbados', 'inactive'),
(20, 'BY', 'Belarus', 'inactive'),
(21, 'BE', 'Belgium', 'inactive'),
(22, 'BZ', 'Belize', 'inactive'),
(23, 'BJ', 'Benin', 'inactive'),
(24, 'BM', 'Bermuda', 'inactive'),
(25, 'BT', 'Bhutan', 'inactive'),
(26, 'BO', 'Bolivia', 'inactive'),
(27, 'BA', 'Bosnia and Herzegovina', 'inactive'),
(28, 'BW', 'Botswana', 'inactive'),
(29, 'BV', 'Bouvet Island', 'inactive'),
(30, 'BR', 'Brazil', 'inactive'),
(31, 'IO', 'British Indian Ocean Territory', 'inactive'),
(32, 'BN', 'Brunei Darussalam', 'inactive'),
(33, 'BG', 'Bulgaria', 'inactive'),
(34, 'BF', 'Burkina Faso', 'inactive'),
(35, 'BI', 'Burundi', 'inactive'),
(36, 'KH', 'Cambodia', 'inactive'),
(37, 'CM', 'Cameroon', 'inactive'),
(38, 'CA', 'Canada', 'inactive'),
(39, 'CV', 'Cape Verde', 'inactive'),
(40, 'KY', 'Cayman Islands', 'inactive'),
(41, 'CF', 'Central African Republic', 'inactive'),
(42, 'TD', 'Chad', 'inactive'),
(43, 'CL', 'Chile', 'inactive'),
(44, 'CN', 'China', 'inactive'),
(45, 'CX', 'Christmas Island', 'inactive'),
(46, 'CC', 'Cocos (Keeling) Islands', 'inactive'),
(47, 'CO', 'Colombia', 'inactive'),
(48, 'KM', 'Comoros', 'inactive'),
(49, 'CG', 'Congo', 'inactive'),
(50, 'CK', 'Cook Islands', 'inactive'),
(51, 'CR', 'Costa Rica', 'inactive'),
(52, 'HR', 'Croatia (Hrvatska)', 'inactive'),
(53, 'CU', 'Cuba', 'inactive'),
(54, 'CY', 'Cyprus', 'inactive'),
(55, 'CZ', 'Czech Republic', 'inactive'),
(56, 'DK', 'Denmark', 'inactive'),
(57, 'DJ', 'Djibouti', 'inactive'),
(58, 'DM', 'Dominica', 'inactive'),
(59, 'DO', 'Dominican Republic', 'inactive'),
(60, 'TP', 'East Timor', 'inactive'),
(61, 'EC', 'Ecuador', 'inactive'),
(62, 'EG', 'Egypt', 'inactive'),
(63, 'SV', 'El Salvador', 'inactive'),
(64, 'GQ', 'Equatorial Guinea', 'inactive'),
(65, 'ER', 'Eritrea', 'inactive'),
(66, 'EE', 'Estonia', 'inactive'),
(67, 'ET', 'Ethiopia', 'inactive'),
(68, 'FK', 'Falkland Islands (Malvinas)', 'inactive'),
(69, 'FO', 'Faroe Islands', 'inactive'),
(70, 'FJ', 'Fiji', 'inactive'),
(71, 'FI', 'Finland', 'inactive'),
(72, 'FR', 'France', 'inactive'),
(73, 'FX', 'France, Metropolitan', 'inactive'),
(74, 'GF', 'French Guiana', 'inactive'),
(75, 'PF', 'French Polynesia', 'inactive'),
(76, 'TF', 'French Southern Territories', 'inactive'),
(77, 'GA', 'Gabon', 'inactive'),
(78, 'GM', 'Gambia', 'inactive'),
(79, 'GE', 'Georgia', 'inactive'),
(80, 'DE', 'Germany', 'inactive'),
(81, 'GH', 'Ghana', 'inactive'),
(82, 'GI', 'Gibraltar', 'inactive'),
(83, 'GK', 'Guernsey', 'inactive'),
(84, 'GR', 'Greece', 'inactive'),
(85, 'GL', 'Greenland', 'inactive'),
(86, 'GD', 'Grenada', 'inactive'),
(87, 'GP', 'Guadeloupe', 'inactive'),
(88, 'GU', 'Guam', 'inactive'),
(89, 'GT', 'Guatemala', 'inactive'),
(90, 'GN', 'Guinea', 'inactive'),
(91, 'GW', 'Guinea-Bissau', 'inactive'),
(92, 'GY', 'Guyana', 'inactive'),
(93, 'HT', 'Haiti', 'inactive'),
(94, 'HM', 'Heard and Mc Donald Islands', 'inactive'),
(95, 'HN', 'Honduras', 'inactive'),
(96, 'HK', 'Hong Kong', 'inactive'),
(97, 'HU', 'Hungary', 'inactive'),
(98, 'IS', 'Iceland', 'inactive'),
(99, 'IN', 'India', 'active'),
(100, 'IM', 'Isle of Man', 'inactive'),
(101, 'ID', 'Indonesia', 'inactive'),
(102, 'IR', 'Iran (Islamic Republic of)', 'inactive'),
(103, 'IQ', 'Iraq', 'inactive'),
(104, 'IE', 'Ireland', 'inactive'),
(105, 'IL', 'Israel', 'inactive'),
(106, 'IT', 'Italy', 'inactive'),
(107, 'CI', 'Ivory Coast', 'inactive'),
(108, 'JE', 'Jersey', 'inactive'),
(109, 'JM', 'Jamaica', 'inactive'),
(110, 'JP', 'Japan', 'inactive'),
(111, 'JO', 'Jordan', 'inactive'),
(112, 'KZ', 'Kazakhstan', 'inactive'),
(113, 'KE', 'Kenya', 'inactive'),
(114, 'KI', 'Kiribati', 'inactive'),
(115, 'KP', 'Korea, Democratic People\'s Republic of', 'inactive'),
(116, 'KR', 'Korea, Republic of', 'inactive'),
(117, 'XK', 'Kosovo', 'inactive'),
(118, 'KW', 'Kuwait', 'inactive'),
(119, 'KG', 'Kyrgyzstan', 'inactive'),
(120, 'LA', 'Lao People\'s Democratic Republic', 'inactive'),
(121, 'LV', 'Latvia', 'inactive'),
(122, 'LB', 'Lebanon', 'inactive'),
(123, 'LS', 'Lesotho', 'inactive'),
(124, 'LR', 'Liberia', 'inactive'),
(125, 'LY', 'Libyan Arab Jamahiriya', 'inactive'),
(126, 'LI', 'Liechtenstein', 'inactive'),
(127, 'LT', 'Lithuania', 'inactive'),
(128, 'LU', 'Luxembourg', 'inactive'),
(129, 'MO', 'Macau', 'inactive'),
(130, 'MK', 'Macedonia', 'inactive'),
(131, 'MG', 'Madagascar', 'inactive'),
(132, 'MW', 'Malawi', 'inactive'),
(133, 'MY', 'Malaysia', 'inactive'),
(134, 'MV', 'Maldives', 'inactive'),
(135, 'ML', 'Mali', 'inactive'),
(136, 'MT', 'Malta', 'inactive'),
(137, 'MH', 'Marshall Islands', 'inactive'),
(138, 'MQ', 'Martinique', 'inactive'),
(139, 'MR', 'Mauritania', 'inactive'),
(140, 'MU', 'Mauritius', 'inactive'),
(141, 'TY', 'Mayotte', 'inactive'),
(142, 'MX', 'Mexico', 'inactive'),
(143, 'FM', 'Micronesia, Federated States of', 'inactive'),
(144, 'MD', 'Moldova, Republic of', 'inactive'),
(145, 'MC', 'Monaco', 'inactive'),
(146, 'MN', 'Mongolia', 'inactive'),
(147, 'ME', 'Montenegro', 'inactive'),
(148, 'MS', 'Montserrat', 'inactive'),
(149, 'MA', 'Morocco', 'inactive'),
(150, 'MZ', 'Mozambique', 'inactive'),
(151, 'MM', 'Myanmar', 'inactive'),
(152, 'NA', 'Namibia', 'inactive'),
(153, 'NR', 'Nauru', 'inactive'),
(154, 'NP', 'Nepal', 'inactive'),
(155, 'NL', 'Netherlands', 'inactive'),
(156, 'AN', 'Netherlands Antilles', 'inactive'),
(157, 'NC', 'New Caledonia', 'inactive'),
(158, 'NZ', 'New Zealand', 'inactive'),
(159, 'NI', 'Nicaragua', 'inactive'),
(160, 'NE', 'Niger', 'inactive'),
(161, 'NG', 'Nigeria', 'inactive'),
(162, 'NU', 'Niue', 'inactive'),
(163, 'NF', 'Norfolk Island', 'inactive'),
(164, 'MP', 'Northern Mariana Islands', 'inactive'),
(165, 'NO', 'Norway', 'inactive'),
(166, 'OM', 'Oman', 'inactive'),
(167, 'PK', 'Pakistan', 'inactive'),
(168, 'PW', 'Palau', 'inactive'),
(169, 'PS', 'Palestine', 'inactive'),
(170, 'PA', 'Panama', 'inactive'),
(171, 'PG', 'Papua New Guinea', 'inactive'),
(172, 'PY', 'Paraguay', 'inactive'),
(173, 'PE', 'Peru', 'inactive'),
(174, 'PH', 'Philippines', 'inactive'),
(175, 'PN', 'Pitcairn', 'inactive'),
(176, 'PL', 'Poland', 'inactive'),
(177, 'PT', 'Portugal', 'inactive'),
(178, 'PR', 'Puerto Rico', 'inactive'),
(179, 'QA', 'Qatar', 'inactive'),
(180, 'RE', 'Reunion', 'inactive'),
(181, 'RO', 'Romania', 'inactive'),
(182, 'RU', 'Russian Federation', 'inactive'),
(183, 'RW', 'Rwanda', 'inactive'),
(184, 'KN', 'Saint Kitts and Nevis', 'inactive'),
(185, 'LC', 'Saint Lucia', 'inactive'),
(186, 'VC', 'Saint Vincent and the Grenadines', 'inactive'),
(187, 'WS', 'Samoa', 'inactive'),
(188, 'SM', 'San Marino', 'inactive'),
(189, 'ST', 'Sao Tome and Principe', 'inactive'),
(190, 'SA', 'Saudi Arabia', 'inactive'),
(191, 'SN', 'Senegal', 'inactive'),
(192, 'RS', 'Serbia', 'inactive'),
(193, 'SC', 'Seychelles', 'inactive'),
(194, 'SL', 'Sierra Leone', 'inactive'),
(195, 'SG', 'Singapore', 'inactive'),
(196, 'SK', 'Slovakia', 'inactive'),
(197, 'SI', 'Slovenia', 'inactive'),
(198, 'SB', 'Solomon Islands', 'inactive'),
(199, 'SO', 'Somalia', 'inactive'),
(200, 'ZA', 'South Africa', 'inactive'),
(201, 'GS', 'South Georgia South Sandwich Islands', 'inactive'),
(202, 'SS', 'South Sudan', 'inactive'),
(203, 'ES', 'Spain', 'inactive'),
(204, 'LK', 'Sri Lanka', 'inactive'),
(205, 'SH', 'St. Helena', 'inactive'),
(206, 'PM', 'St. Pierre and Miquelon', 'inactive'),
(207, 'SD', 'Sudan', 'inactive'),
(208, 'SR', 'Suriname', 'inactive'),
(209, 'SJ', 'Svalbard and Jan Mayen Islands', 'inactive'),
(210, 'SZ', 'Swaziland', 'inactive'),
(211, 'SE', 'Sweden', 'inactive'),
(212, 'CH', 'Switzerland', 'inactive'),
(213, 'SY', 'Syrian Arab Republic', 'inactive'),
(214, 'TW', 'Taiwan', 'inactive'),
(215, 'TJ', 'Tajikistan', 'inactive'),
(216, 'TZ', 'Tanzania, United Republic of', 'inactive'),
(217, 'TH', 'Thailand', 'inactive'),
(218, 'TG', 'Togo', 'inactive'),
(219, 'TK', 'Tokelau', 'inactive'),
(220, 'TO', 'Tonga', 'inactive'),
(221, 'TT', 'Trinidad and Tobago', 'inactive'),
(222, 'TN', 'Tunisia', 'inactive'),
(223, 'TR', 'Turkey', 'inactive'),
(224, 'TM', 'Turkmenistan', 'inactive'),
(225, 'TC', 'Turks and Caicos Islands', 'inactive'),
(226, 'TV', 'Tuvalu', 'inactive'),
(227, 'UG', 'Uganda', 'inactive'),
(228, 'UA', 'Ukraine', 'inactive'),
(229, 'AE', 'United Arab Emirates', 'inactive'),
(230, 'GB', 'United Kingdom', 'inactive'),
(231, 'US', 'United States', 'active'),
(232, 'UM', 'United States minor outlying islands', 'inactive'),
(233, 'UY', 'Uruguay', 'inactive'),
(234, 'UZ', 'Uzbekistan', 'inactive'),
(235, 'VU', 'Vanuatu', 'inactive'),
(236, 'VA', 'Vatican City State', 'inactive'),
(237, 'VE', 'Venezuela', 'inactive'),
(238, 'VN', 'Vietnam', 'inactive'),
(239, 'VG', 'Virgin Islands (British)', 'inactive'),
(240, 'VI', 'Virgin Islands (U.S.)', 'inactive'),
(241, 'WF', 'Wallis and Futuna Islands', 'inactive'),
(242, 'EH', 'Western Sahara', 'inactive'),
(243, 'YE', 'Yemen', 'inactive'),
(244, 'ZR', 'Zaire', 'inactive'),
(245, 'ZM', 'Zambia', 'inactive'),
(246, 'ZW', 'Zimbabwe', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `design_details`
--

CREATE TABLE `design_details` (
  `design_id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `industry_id` varchar(100) NOT NULL,
  `design_name` varchar(100) NOT NULL,
  `design_description` varchar(1000) NOT NULL,
  `design_usage` varchar(100) NOT NULL,
  `design_temperature` varchar(100) NOT NULL,
  `design_assembly` varchar(100) NOT NULL,
  `design_material` varchar(100) NOT NULL,
  `design_material_custom` varchar(100) NOT NULL,
  `design_precision` varchar(100) NOT NULL,
  `design_finishing` varchar(100) NOT NULL,
  `design_finishing_custom` varchar(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `design_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `design_details`
--

INSERT INTO `design_details` (`design_id`, `user_id`, `industry_id`, `design_name`, `design_description`, `design_usage`, `design_temperature`, `design_assembly`, `design_material`, `design_material_custom`, `design_precision`, `design_finishing`, `design_finishing_custom`, `order_id`, `order_status`, `status`, `design_date`) VALUES
(1, '1', '1', 'Test One', '', 'Aerospace', '5', '3', '4', '', '3', '1', 'Custom Fin', 'DO019100', 'PROCESSING', 'active', '1547194033'),
(2, '1', '5', 'Test Two', 'Optional', 'Gifting', '2', '2', '1', 'Custom Mat', '1', '4', '', 'DO019101', 'PROCESSING', 'active', '1547194336'),
(3, '1', '6', 'Test Three', 'Optional Manufacture', 'Manufacture', '1', '2', '5', '', '2', '4', '', 'DO019102', 'PROCESSING', 'active', '1547196133');

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
(1, 'None of the Above', 'active', '16-11-2018'),
(2, 'Biomaterial', 'active', '16-11-2018'),
(3, 'Ceramic\n', 'active', '16-11-2018'),
(4, 'Sandstone', 'active', '16-11-2018'),
(5, 'Acrylic', 'active', '16-11-2018'),
(6, 'Metal', 'active', '16-11-2018'),
(7, 'Plastic', 'active', '16-11-2018'),
(8, 'Wood', 'active', '16-11-2018'),
(9, 'Castable Material', 'active', '16-11-2018');

-- --------------------------------------------------------

--
-- Table structure for table `design_resource_details`
--

CREATE TABLE `design_resource_details` (
  `design_resource_id` int(100) NOT NULL,
  `design_id` int(100) NOT NULL,
  `design_resource_name` varchar(100) NOT NULL,
  `design_resource_path` varchar(1000) NOT NULL,
  `design_resource_size` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `design_resource_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `design_resource_details`
--

INSERT INTO `design_resource_details` (`design_resource_id`, `design_id`, `design_resource_name`, `design_resource_path`, `design_resource_size`, `status`, `design_resource_date`) VALUES
(1, 1, 'DBmenuTest.png', 'assets/images/design_file/1547194033_DBmenuTest.png', '1547194033', 'active', '1547194033'),
(2, 2, 'Design-Orders.jpg', 'assets/images/design_file/1547194336_Design-Orders.jpg', '79016', 'active', '1547194336'),
(3, 2, 'Partner_OngoingJobs.jpg', 'assets/images/design_file/1547194336_Partner_OngoingJobs.jpg', '106283', 'active', '1547194336'),
(4, 3, 'Design-Orders.jpg', 'assets/images/design_file/1547196133_Design-Orders.jpg', '79016', 'active', '1547196133');

-- --------------------------------------------------------

--
-- Table structure for table `file_details`
--

CREATE TABLE `file_details` (
  `file_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `file_size` bigint(100) NOT NULL,
  `cad_result` varchar(1000) NOT NULL,
  `product_qty` varchar(100) NOT NULL,
  `product_amount` varchar(100) NOT NULL,
  `delivery_type` varchar(100) NOT NULL,
  `delivery_amount` varchar(100) NOT NULL,
  `technology_id` varchar(100) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `color_id` varchar(100) NOT NULL,
  `layer_height_id` varchar(100) NOT NULL,
  `post_process_id` varchar(100) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `file_status` varchar(100) NOT NULL,
  `cur_date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_details`
--

INSERT INTO `file_details` (`file_id`, `user_id`, `file_name`, `file_path`, `file_size`, `cad_result`, `product_qty`, `product_amount`, `delivery_type`, `delivery_amount`, `technology_id`, `material_id`, `color_id`, `layer_height_id`, `post_process_id`, `payment_id`, `payment_status`, `order_id`, `file_status`, `cur_date`, `status`) VALUES
(1, 1, 'igs.igs', 'assets/images/cad_file/1542364911_file9.stp', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', '1', '10', 'Normal', '50', '1', '1', '1', '1', '1', 'ch_1DWdSkCSoKzHcIqlyCfJxIw7', 'succeeded', '1', 'ONGOING', '15-11-2018', 'active'),
(2, 1, 'stp.stp', 'assets/images/cad_file/1542259351_stp.stp', 1134138, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/stp.stp.html\",\"DimensionX\":46.5900315509107,\"DimensionY\":46.5900315509107,\"DimensionZ\":55.0266267409692,\"SurfaceArea\":30.1271684511792,\"Volume\":2296.453}', '1', '10.93653946246', 'Normal', '50', '2', '3', '7', '7', 'NULL', 'ch_1DWdSkCSoKzHcIqlyCfJxIw7', 'succeeded', '1', 'ONGOING', '15-11-2018', 'active'),
(3, 2, 'igs.igs', 'assets/images/cad_file/1542268430_igs.igs', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', '1', '10.9614999648', 'Normal', '50', '3', '5', '11', '9', 'NULL', 'ch_1DWfjrCSoKzHcIqlJnzYec3g', 'succeeded', '2', 'PROCESSING', '15-11-2018', 'active'),
(4, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1542275946_20mm_calibration_cube.stl', 6884, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/20mm_calibration_cube.stl.html\",\"DimensionX\":20.0010006043579,\"DimensionY\":20.0009996506836,\"DimensionZ\":20.0010002000475,\"SurfaceArea\":25.616209248265,\"Volume\":7796.068}', '1', '15.39527050176', 'Normal', '50', '3', '6', '13', '12', 'NULL', 'ch_1DWiAwCSoKzHcIql1Y4Itlkf', 'succeeded', '3', 'PROCESSING', '15-11-2018', 'active'),
(5, 2, '20mm_calibration_cube.stl', 'assets/images/cad_file/1542354845_20mm_calibration_cube.stl', 6884, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/20mm_calibration_cube.stl.html\",\"DimensionX\":20.0010006043579,\"DimensionY\":20.0009996506836,\"DimensionZ\":20.0010002000475,\"SurfaceArea\":25.616209248265,\"Volume\":7796.068}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '16-11-2018', 'active'),
(6, 0, 'stp.stp', 'assets/images/cad_file/1542774810_stp.stp', 1134138, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/stp.stp.html\",\"DimensionX\":46.5900315509107,\"DimensionY\":46.5900315509107,\"DimensionZ\":55.0266267409692,\"SurfaceArea\":30.1271684511792,\"Volume\":2296.453}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '21-11-2018', 'active'),
(7, 1, 'stp.stp', 'assets/images/cad_file/1542774877_stp.stp', 1134138, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/stp.stp.html\",\"DimensionX\":46.5900315509107,\"DimensionY\":46.5900315509107,\"DimensionZ\":55.0266267409692,\"SurfaceArea\":30.1271684511792,\"Volume\":2296.453}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '21-11-2018', 'active'),
(8, 1, 'igs.igs', 'assets/images/cad_file/1542776485_igs.igs', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '21-11-2018', 'active'),
(9, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1542780805_20mm_calibration_cube.stl', 6884, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/20mm_calibration_cube.stl.html\",\"DimensionX\":20.0010006043579,\"DimensionY\":20.0009996506836,\"DimensionZ\":20.0010002000475,\"SurfaceArea\":25.616209248265,\"Volume\":7796.068}', '1', '13.17939245176', 'Normal', '50', '2', '3', '7', '7', 'NULL', 'ch_1DYpVNCSoKzHcIqlJ6U4yRrW', 'succeeded', '4', 'PROCESSING', '21-11-2018', 'active'),
(10, 1, 'igs.igs', 'assets/images/cad_file/1542786309_igs.igs', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '21-11-2018', 'active'),
(11, 1, 'igs.igs', 'assets/images/cad_file/1542787525_igs.igs', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '21-11-2018', 'active'),
(12, 1, 'igs.igs', 'assets/images/cad_file/1542790197_igs.igs', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', '1', '8.8212835152', 'Normal', '50', '3', '5', '11', '10', 'NULL', 'ch_1DYsykCSoKzHcIqlDoXcjtcS', 'succeeded', '5', 'PROCESSING', '21-11-2018', 'active'),
(13, 1, 'igs.igs', 'assets/images/cad_file/1542878952_igs.igs', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '22-11-2018', 'active'),
(14, 1, 'igs.igs', 'assets/images/cad_file/1542880863_igs.igs', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '22-11-2018', 'active'),
(15, 1, 'igs.igs', 'assets/images/cad_file/1542881801_igs.igs', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '22-11-2018', 'active'),
(16, 1, 'igs.igs', 'assets/images/cad_file/1542882565_igs.igs', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', '1', '10.9751547148', 'Normal', '50', '2', '3', '7', '7', 'NULL', 'ch_1DZFTZCSoKzHcIqlezcOQxI5', 'succeeded', '6', 'PROCESSING', '22-11-2018', 'active'),
(17, 1, 'igs.igs', 'assets/images/cad_file/1542951501_igs.igs', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '23-11-2018', 'active'),
(18, 1, 'igs.igs', 'assets/images/cad_file/1542953454_igs.igs', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', '2', '8.8212835152', 'Normal', '50', '3', '5', '11', '10', 'NULL', 'ch_1DZYirCSoKzHcIqlP5VwnB3o', 'succeeded', '7', 'PROCESSING', '23-11-2018', 'active'),
(19, 1, 'stp.stp', 'assets/images/cad_file/1542958529_stp.stp', 1134138, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/stp.stp.html\",\"DimensionX\":46.5900315509107,\"DimensionY\":46.5900315509107,\"DimensionZ\":55.0266267409692,\"SurfaceArea\":30.1271684511792,\"Volume\":2296.453}', '2', '8.74916232104', 'Express', '100', '3', '5', '11', '10', 'NULL', 'ch_1DZZHaCSoKzHcIqlGoeMtknj', 'succeeded', '8', 'PROCESSING', '23-11-2018', 'active'),
(20, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1542959200_20mm_calibration_cube.stl', 6884, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/20mm_calibration_cube.stl.html\",\"DimensionX\":20.0010006043579,\"DimensionY\":20.0009996506836,\"DimensionZ\":20.0010002000475,\"SurfaceArea\":25.616209248265,\"Volume\":7796.068}', '2', '15.39527050176', 'Express', '100', '3', '5', '11', '9', 'NULL', 'ch_1DZZO5CSoKzHcIql5cORvNSJ', 'succeeded', '9', 'PROCESSING', '23-11-2018', 'active'),
(21, 1, 'igs.igs', 'assets/images/cad_file/1542961130_igs.igs', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', '1', '27.1662293716', 'Normal', '50', '2', '4', '9', '8', 'NULL', 'ch_1DZZy3CSoKzHcIqlYhNeCGoC', 'succeeded', '10', 'PROCESSING', '23-11-2018', 'active'),
(22, 1, 'igs.igs', 'assets/images/cad_file/1543054916_igs.igs', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', '1', '10.9751547148', 'Normal', '50', '2', '3', '7', '7', 'NULL', 'ch_1DZyIOCSoKzHcIqlK58Wob23', 'succeeded', '11', 'PROCESSING', '24-11-2018', 'active'),
(23, 1, 'igs.igs', 'assets/images/cad_file/1543379733_igs.igs', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '28-11-2018', 'active'),
(24, 1, 'igs.igs', 'assets/images/cad_file/1543397318_igs.igs', 1206548, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', '1', '8.8212835152', 'Normal', '10', '3', '5', '11', '10', 'NULL', 'ch_1DbPOECSoKzHcIqlzj3zMotN', 'succeeded', '12', 'ONGOING', '28-11-2018', 'active'),
(25, 1, 'stp.stp', 'assets/images/cad_file/1543398072_stp.stp', 1134138, '{\"HtmlFile\":\"http://148.72.207.238:8080/Assets/ProcessPreview/stp.stp.html\",\"DimensionX\":46.5900315509107,\"DimensionY\":46.5900315509107,\"DimensionZ\":55.0266267409692,\"SurfaceArea\":30.1271684511792,\"Volume\":2296.453}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '28-11-2018', 'active'),
(26, 1, 'igs.igs', 'assets/images/cad_file/1543399918_igs.igs', 1206548, '{\"HtmlFile\":\"http://3dusher.in:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '28-11-2018', 'active'),
(27, 1, 'igs.igs', 'assets/images/cad_file/1543813110_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '03-12-2018', 'active'),
(28, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1543813149_20mm_calibration_cube.stl', 6884, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '03-12-2018', 'active'),
(29, 1, 'stp.stp', 'assets/images/cad_file/1543813162_stp.stp', 1134138, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '03-12-2018', 'active'),
(30, 1, 'igs.igs', 'assets/images/cad_file/1543997973_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '05-12-2018', 'active'),
(31, 1, 'igs.igs', 'assets/images/cad_file/1543998150_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '05-12-2018', 'active'),
(32, 0, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544157754_20mm_calibration_cube.stl', 6884, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '07-12-2018', 'active'),
(33, 0, '', 'assets/images/cad_file/1544599792_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"assets/images/cad_file/1544599792_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(34, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544600886_20mm_calibration_cube.stl', 6884, '{\"HtmlFile\":\"assets/images/cad_file/1544600886_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(35, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544600961_20mm_calibration_cube.stl', 6884, '{\"HtmlFile\":\"assets/images/cad_file/1544600961_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(36, 1, 'Array', 'assets/images/cad_file/1544601094_Array', 0, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(37, 1, 'Array', 'assets/images/cad_file/1544601095_Array', 0, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(38, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544601094_20mm_calibration_cube.stl', 6884, '{\"HtmlFile\":\"assets/images/cad_file/1544601094_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(39, 1, 'Array', 'assets/images/cad_file/1544601216_Array', 0, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(40, 1, 'igs.igs', 'assets/images/cad_file/1544601511_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(41, 1, 'igs.igs', 'assets/images/cad_file/1544601643_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(42, 1, 'igs.igs', 'assets/images/cad_file/1544601643_20mm_calibration_cube.stl', 1206548, '{\"HtmlFile\":\"assets/images/cad_file/1544601643_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(43, 1, 'stp.stp', 'assets/images/cad_file/1544602471_stp.stp', 1134138, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(44, 1, 'stp.stp', 'assets/images/cad_file/1544602471_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544602471_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(45, 1, 'stp.stp', 'assets/images/cad_file/1544602504_stp.stp', 1134138, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(46, 1, 'stp.stp', 'assets/images/cad_file/1544602504_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544602504_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(47, 1, 'stp.stp', 'assets/images/cad_file/1544602809_stp.stp', 1134138, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(48, 1, 'stp.stp', 'assets/images/cad_file/1544602808_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544602808_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(49, 1, 'igs.igs', 'assets/images/cad_file/1544603981_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(50, 1, 'igs.igs', 'assets/images/cad_file/1544604210_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(51, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544604210_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544604210_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(52, 1, 'igs.igs', 'assets/images/cad_file/1544606151_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(53, 1, 'igs.igs', 'assets/images/cad_file/1544606154_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(54, 1, 'igs.igs', 'assets/images/cad_file/1544606156_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(55, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544606672_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544606672_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(56, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544606836_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544606836_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(57, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544607031_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544607031_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(58, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544607502_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544607502_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(59, 1, 'igs.igs', 'assets/images/cad_file/1544607561_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(60, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544607923_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544607923_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(61, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544607969_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544607969_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(62, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544607978_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544607978_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(63, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544607981_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544607981_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(64, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544607982_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544607982_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(65, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544607982_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544607982_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(66, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544607982_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544607982_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(67, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544607983_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544607983_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(68, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544607984_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544607984_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(69, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544607984_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544607984_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(70, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544607984_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544607984_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(71, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544608617_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544608617_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(72, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544608678_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544608678_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(73, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544608693_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544608693_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(74, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544608708_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544608708_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(75, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544608718_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544608718_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(76, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544608757_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544608757_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(77, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544609074_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544609074_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(78, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544609224_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544609224_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(79, 1, 'igs.igs', 'assets/images/cad_file/1544609246_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(80, 1, 'igs.igs', 'assets/images/cad_file/1544609245_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544609245_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(81, 1, 'igs.igs', 'assets/images/cad_file/1544609735_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(82, 1, 'igs.igs', 'assets/images/cad_file/1544609735_20mm_calibration_cube.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544609735_20mm_calibration_cube.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(83, 1, '20mm.stl', 'assets/images/cad_file/1544609789_20mm.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544609789_20mm.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(84, 1, 'igs.igs', 'assets/images/cad_file/1544609825_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(85, 1, 'stp.stp', 'assets/images/cad_file/1544609854_stp.stp', 0, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(86, 1, 'igs.igs', 'assets/images/cad_file/1544609856_igs.igs', 0, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(87, 1, '20mm.stl', 'assets/images/cad_file/1544609879_20mm.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544609879_20mm.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(88, 1, 'igs.igs', 'assets/images/cad_file/1544610426_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(89, 1, 'igs.igs', 'assets/images/cad_file/1544610426_20mm.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544610426_20mm.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(90, 1, 'igs.igs', 'assets/images/cad_file/1544611994_igs.igs', 0, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(91, 1, 'igs.igs', 'assets/images/cad_file/1544612490_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(92, 1, 'igs.igs', 'assets/images/cad_file/1544612490_20mm.stl', 0, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544612490_20mm.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(93, 1, 'igs.igs', 'assets/images/cad_file/1544612605_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(94, 1, 'igs.igs', 'assets/images/cad_file/1544612604_20mm.stl', 1206548, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544612604_20mm.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(95, 1, 'igs.igs', 'assets/images/cad_file/1544612716_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(96, 1, 'igs.igs', 'assets/images/cad_file/1544612716_20mm.stl', 1206548, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544612716_20mm.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(97, 1, '20mm.stl', 'assets/images/cad_file/1544612883_20mm.stl', 6884, '{\"HtmlFile\":\"https://3dusher.com/assets/images/cad_file/1544612883_20mm.stl.html\",\"DimensionX\":20.00100040435791,\"DimensionY\":20.000999450683594,\"DimensionZ\":20.001000000047497,\"SurfaceArea\":2561.6209248264954,\"Volume\":7796.068134798697}', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(98, 1, '20mm.stl', 'assets/images/cad_file/1544613324_20mm.stl', 6884, 'undefined', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(99, 1, '20mm.stl', 'assets/images/cad_file/1544613393_20mm.stl', 6884, 'undefined', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(100, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544613467_20mm_calibration_cube.stl', 6884, 'undefined', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(101, 1, '20mm.stl', 'assets/images/cad_file/1544613487_20mm.stl', 6884, 'undefined', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(102, 1, '20mm_calibration_cube.stl', 'assets/images/cad_file/1544613546_20mm_calibration_cube.stl', 6884, 'undefined', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(103, 1, '20mm.stl', 'assets/images/cad_file/1544613670_20mm.stl', 6884, 'undefined', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '12-12-2018', 'active'),
(104, 1, 'igs.igs', 'assets/images/cad_file/1545638294_igs.igs', 1206548, '', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '24-12-2018', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `finishing_details`
--

CREATE TABLE `finishing_details` (
  `finishing_id` int(100) NOT NULL,
  `finishing_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `finishing_details`
--

INSERT INTO `finishing_details` (`finishing_id`, `finishing_name`, `status`, `date`) VALUES
(1, 'None of the Above', 'active', '16-11-2018'),
(2, 'No Requirement', 'active', '16-11-2018'),
(3, 'Matte Finish', 'active', '16-11-2018'),
(4, 'Glossy Finish', 'active', '16-11-2018');

-- --------------------------------------------------------

--
-- Table structure for table `google_details`
--

CREATE TABLE `google_details` (
  `google_id` int(11) NOT NULL,
  `google_auth_id` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `google_details`
--

INSERT INTO `google_details` (`google_id`, `google_auth_id`, `user_name`, `user_email`, `status`, `date`) VALUES
(1, '114156121863219191187', 'CHANDRA BOSE.K.V', 'chandrabose719.songs@gmail.com', 'active', '1547192387');

-- --------------------------------------------------------

--
-- Table structure for table `industry_details`
--

CREATE TABLE `industry_details` (
  `industry_id` int(100) NOT NULL,
  `industry_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry_details`
--

INSERT INTO `industry_details` (`industry_id`, `industry_name`, `status`, `date`) VALUES
(1, 'Aerospace', 'active', '16-11-2018'),
(2, 'Architecture', 'active', '16-11-2018'),
(3, 'Automotive', 'active', '16-11-2018'),
(4, 'Education', 'active', '16-11-2018'),
(5, 'Gifting', 'active', '16-11-2018'),
(6, 'Manufacturing', 'active', '16-11-2018'),
(7, 'Med-Tech', 'active', '16-11-2018'),
(8, 'Other', 'active', '16-11-2018');

-- --------------------------------------------------------

--
-- Table structure for table `layer_height_details`
--

CREATE TABLE `layer_height_details` (
  `layer_height_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `layer_height_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layer_height_details`
--

INSERT INTO `layer_height_details` (`layer_height_id`, `technology_id`, `material_id`, `layer_height_name`, `status`, `date`) VALUES
(1, 1, '1', '100', 'active', '9-11-2018'),
(2, 1, '1', '200', 'active', '9-11-2018'),
(3, 1, '1', '300', 'active', '9-11-2018'),
(4, 1, '2', '100', 'active', '9-11-2018'),
(5, 1, '2', '200', 'active', '9-11-2018'),
(6, 1, '2', '300', 'active', '9-11-2018'),
(7, 1, '3', '100', 'active', '9-11-2018'),
(8, 1, '3', '200', 'active', '9-11-2018'),
(9, 1, '3', '300', 'active', '9-11-2018'),
(10, 1, '4', '100', 'active', '9-11-2018'),
(11, 1, '4', '200', 'active', '9-11-2018'),
(12, 1, '4', '300', 'active', '9-11-2018'),
(13, 2, '5', '100', 'active', '9-11-2018'),
(14, 2, '6', '100', 'active', '9-11-2018'),
(15, 3, '7', '25', 'active', '9-11-2018'),
(16, 3, '7', '50', 'active', '9-11-2018'),
(17, 3, '7', '100', 'active', '9-11-2018'),
(18, 3, '8', '25', 'active', '9-11-2018'),
(19, 3, '8', '50', 'active', '9-11-2018'),
(20, 3, '8', '100', 'active', '9-11-2018'),
(21, 3, '9', '25', 'active', '9-11-2018'),
(22, 3, '9', '50', 'active', '9-11-2018'),
(23, 3, '9', '100', 'active', '9-11-2018');

-- --------------------------------------------------------

--
-- Table structure for table `material_details`
--

CREATE TABLE `material_details` (
  `material_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_details`
--

INSERT INTO `material_details` (`material_id`, `technology_id`, `material_name`, `status`, `date`) VALUES
(1, 1, 'PLA', 'active', '9-11-2018'),
(2, 1, 'ABS', 'active', '9-11-2018'),
(3, 1, 'PETG', 'active', '9-11-2018'),
(4, 1, 'PEEK', 'active', '9-11-2018'),
(5, 2, 'Standard Nylon', 'active', '9-11-2018'),
(6, 2, 'Standard TPU', 'active', '9-11-2018'),
(7, 3, 'Standard Resin', 'active', '9-11-2018'),
(8, 3, 'Clear Resin', 'active', '9-11-2018'),
(9, 3, 'Tough Resin', 'active', '9-11-2018');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `order` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `user_id`, `order`, `order_status`, `order_date`) VALUES
(1, '1', 'MO11100', 'PROCESSING', '2018-11-15'),
(2, '2', 'MO11101', 'PROCESSING', '2018-11-15'),
(3, '1', 'MO11102', 'PROCESSING', '2018-11-15'),
(4, '1', 'MO11103', 'ONGOING', '2018-11-21'),
(5, '1', 'MO11104', 'PROCESSING', '2018-11-21'),
(6, '1', 'MO11105', 'PROCESSING', '2018-11-22'),
(7, '1', 'MO11106', 'PROCESSING', '2018-11-23'),
(8, '1', 'MO11107', 'PROCESSING', '2018-11-23'),
(9, '1', 'MO11108', 'PROCESSING', '2018-11-23'),
(10, '1', 'MO11109', 'ONGOING', '2018-11-23'),
(11, '1', 'MO11110', 'ONGOING', '2018-11-24'),
(12, '1', 'MO11111', 'ONGOING', '2018-11-28');

-- --------------------------------------------------------

--
-- Table structure for table `post_process_details`
--

CREATE TABLE `post_process_details` (
  `post_process_id` int(11) NOT NULL,
  `technology_id` int(11) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `post_process_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_process_details`
--

INSERT INTO `post_process_details` (`post_process_id`, `technology_id`, `material_id`, `post_process_name`, `status`, `date`) VALUES
(1, 1, '1', 'Sanding', 'active', '9-11-2018'),
(2, 1, '2', 'Sanding', 'active', '9-11-2018'),
(3, 1, '2', 'Glossy', 'active', '9-11-2018');

-- --------------------------------------------------------

--
-- Table structure for table `precision_details`
--

CREATE TABLE `precision_details` (
  `precision_id` int(100) NOT NULL,
  `precision_name` varchar(100) NOT NULL,
  `precision_image` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `precision_details`
--

INSERT INTO `precision_details` (`precision_id`, `precision_name`, `precision_image`, `status`, `date`) VALUES
(1, 'Low', 'assets/images/design/3DUsher-Detailing-Low.png', 'active', '16-11-2018'),
(2, 'Medium', 'assets/images/design/3DUsher-Detailing-Medium.png', 'active', '16-11-2018'),
(3, 'High', 'assets/images/design/3DUsher-Detailing-High.png', 'active', '16-11-2018');

-- --------------------------------------------------------

--
-- Table structure for table `price_details`
--

CREATE TABLE `price_details` (
  `price_id` int(100) NOT NULL,
  `material_rate` decimal(16,10) NOT NULL,
  `layer_height_rate` varchar(100) NOT NULL,
  `density` varchar(100) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `layer_height_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `price_details`
--

INSERT INTO `price_details` (`price_id`, `material_rate`, `layer_height_rate`, `density`, `material_name`, `layer_height_name`, `status`, `date`) VALUES
(1, '0.3300000000', '1', '0.00125', 'PLA', '100', 'active', '13-11-2018'),
(2, '0.5000000000', '1', '0.00125', 'PLA', '200', 'active', '13-11-2018'),
(3, '0.5000000000', '1', '0.00125', 'PLA', '300', 'active', '13-11-2018'),
(4, '0.4100000000', '1', '0.00105', 'ABS', '100', 'active', '13-11-2018'),
(5, '0.6000000000', '1', '0.00105', 'ABS', '200', 'active', '13-11-2018'),
(6, '0.6000000000', '1', '0.00105', 'ABS', '300', 'active', '13-11-2018'),
(7, '0.4100000000', '1', '0.00127', 'PETG', '100', 'active', '13-11-2018'),
(8, '0.4100000000', '1', '0.00127', 'PETG', '200', 'active', '13-11-2018'),
(9, '0.4100000000', '1', '0.00127', 'PETG', '300', 'active', '13-11-2018'),
(10, '5.0000000000', '1', '0.00132', 'PEEK', '100', 'active', '13-11-2018'),
(11, '5.0000000000', '1', '0.00132', 'PEEK', '200', 'active', '13-11-2018'),
(12, '5.0000000000', '1', '0.00132', 'PEEK', '300', 'active', '13-11-2018'),
(13, '0.0004078200', '10', 'NULL', 'Standard Nylon', '100', 'active', '13-11-2018'),
(14, '0.0009059400', '25', 'NULL', 'Standard TPU', '100', 'active', '13-11-2018'),
(15, '0.0006445100', '5', 'NULL', 'Standard Resin', '100', 'active', '13-11-2018'),
(16, '0.0007616800', '7', 'NULL', 'Standard Resin', '50', 'active', '13-11-2018'),
(17, '0.0008203200', '9', 'NULL', 'Standard Resin', '25', 'active', '13-11-2018'),
(18, '0.0006825500', '5', 'NULL', 'Clear Resin', '100', 'active', '13-11-2018'),
(19, '0.0007616800', '7', 'NULL', 'Clear Resin', '50', 'active', '13-11-2018'),
(20, '0.0008203200', '9', 'NULL', 'Clear Resin', '25', 'active', '13-11-2018'),
(21, '0.0006445100', '3', 'NULL', 'Tough Resin', '100', 'active', '13-11-2018'),
(22, '0.0007616800', '5', 'NULL', 'Tough Resin', '50', 'active', '13-11-2018'),
(23, '0.0008203200', '3', 'NULL', 'Tough Resin', '25', 'active', '13-11-2018');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(100) NOT NULL,
  `country_code` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `state_name`, `country_code`, `date`, `status`) VALUES
(1, 'Karnataka', 'IN', '08-11-18', 'active'),
(2, 'Andhra Pradesh', 'IN', '08-11-18', 'active'),
(3, 'Tamilnadu', 'IN', '08-11-18', 'active'),
(4, 'Kerala', 'IN', '08-11-18', 'active'),
(5, 'New York', 'US', '08-11-18', 'active'),
(6, 'CA', 'US', '08-11-18', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `support_details`
--

CREATE TABLE `support_details` (
  `support_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `order_type` varchar(100) NOT NULL,
  `support_query` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `technology_details`
--

CREATE TABLE `technology_details` (
  `technology_id` int(11) NOT NULL,
  `technology_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technology_details`
--

INSERT INTO `technology_details` (`technology_id`, `technology_name`, `status`, `date`) VALUES
(1, 'FDM', 'active', '9-11-2018'),
(2, 'SLS', 'active', '9-11-2018'),
(3, 'SLA', 'active', '9-11-2018');

-- --------------------------------------------------------

--
-- Table structure for table `temperature_details`
--

CREATE TABLE `temperature_details` (
  `temperature_id` int(100) NOT NULL,
  `temperature_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temperature_details`
--

INSERT INTO `temperature_details` (`temperature_id`, `temperature_name`, `status`, `date`) VALUES
(1, '< 0 C or 32 F', 'active', '16-11-2018'),
(2, '1 C to 15 C or 32 F to 59 F', 'active', '16-11-2018'),
(3, '16 C to 40 C or 59 F to 104 F', 'active', '16-11-2018'),
(4, '41 C to 50 C or 104 F to 122 F', 'active', '16-11-2018'),
(5, '> 50 C or 122 F', 'active', '16-11-2018'),
(6, 'Not Sure', 'active', '16-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_mobile` varchar(100) NOT NULL,
  `billing_address` varchar(500) NOT NULL,
  `billing_address1` varchar(500) NOT NULL,
  `billing_city` varchar(500) NOT NULL,
  `billing_state` varchar(500) NOT NULL,
  `billing_country` varchar(500) NOT NULL,
  `billing_zipcode` varchar(500) NOT NULL,
  `shipping_address` varchar(500) NOT NULL,
  `shipping_address1` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `pin_code` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`user_id`, `user_name`, `user_email`, `user_password`, `user_mobile`, `billing_address`, `billing_address1`, `billing_city`, `billing_state`, `billing_country`, `billing_zipcode`, `shipping_address`, `shipping_address1`, `city`, `state`, `country`, `pin_code`, `status`, `date`) VALUES
(1, 'Chandrabose', 'info@3dusher.com', 'ushers', '9988776655', '', 'Madurai', 'Madurai', 'Tamilnadu', 'IN', '624306', 'Thirupparangundram', 'Madurai', 'Madurai', 'Tamilnadu', 'IN', '624306', 'active', '17-10-2018'),
(2, 'Chandra Bose', 'chandrabose719@gmail.com', '3dusher', '7708573343', 'NGO', 'Dindigul', 'Dindigul', 'Tamilnadu', 'IN', '624306', 'NGO', 'Dindigul', 'Dindigul', 'Tamilnadu', 'AF', '624306', 'active', '15-11-2018'),
(4, 'Chandra', 'chandrabose719.songs@gmail.com', '223942200', '9988776655', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'active', '22-11-2018'),
(5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '08-01-2019'),
(7, 'Bose', 'kumar@3dusher.com', 'kumar123', '9988775565', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '08-01-2019');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_mobile` varchar(100) NOT NULL,
  `billing_address` varchar(500) NOT NULL,
  `billing_address1` varchar(500) NOT NULL,
  `billing_city` varchar(500) NOT NULL,
  `billing_state` varchar(500) NOT NULL,
  `billing_country` varchar(500) NOT NULL,
  `billing_zipcode` varchar(500) NOT NULL,
  `shipping_address` varchar(500) NOT NULL,
  `shipping_address1` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `pin_code` varchar(500) NOT NULL,
  `google_auth_id` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_name`, `user_email`, `user_password`, `user_mobile`, `billing_address`, `billing_address1`, `billing_city`, `billing_state`, `billing_country`, `billing_zipcode`, `shipping_address`, `shipping_address1`, `city`, `state`, `country`, `pin_code`, `google_auth_id`, `status`, `date`) VALUES
(1, 'Bose', 'info@3dusher.com', 'ushers', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1547192224'),
(2, 'CHANDRA BOSE.K.V', 'chandrabose719.songs@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '114156121863219191187', 'active', '1547192387');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assembly_details`
--
ALTER TABLE `assembly_details`
  ADD PRIMARY KEY (`assembly_id`);

--
-- Indexes for table `color_details`
--
ALTER TABLE `color_details`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_details`
--
ALTER TABLE `design_details`
  ADD PRIMARY KEY (`design_id`);

--
-- Indexes for table `design_material_details`
--
ALTER TABLE `design_material_details`
  ADD PRIMARY KEY (`design_material_id`);

--
-- Indexes for table `design_resource_details`
--
ALTER TABLE `design_resource_details`
  ADD PRIMARY KEY (`design_resource_id`);

--
-- Indexes for table `file_details`
--
ALTER TABLE `file_details`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `finishing_details`
--
ALTER TABLE `finishing_details`
  ADD PRIMARY KEY (`finishing_id`);

--
-- Indexes for table `google_details`
--
ALTER TABLE `google_details`
  ADD PRIMARY KEY (`google_id`);

--
-- Indexes for table `industry_details`
--
ALTER TABLE `industry_details`
  ADD PRIMARY KEY (`industry_id`);

--
-- Indexes for table `layer_height_details`
--
ALTER TABLE `layer_height_details`
  ADD PRIMARY KEY (`layer_height_id`);

--
-- Indexes for table `material_details`
--
ALTER TABLE `material_details`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `post_process_details`
--
ALTER TABLE `post_process_details`
  ADD PRIMARY KEY (`post_process_id`);

--
-- Indexes for table `precision_details`
--
ALTER TABLE `precision_details`
  ADD PRIMARY KEY (`precision_id`);

--
-- Indexes for table `price_details`
--
ALTER TABLE `price_details`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `support_details`
--
ALTER TABLE `support_details`
  ADD PRIMARY KEY (`support_id`);

--
-- Indexes for table `technology_details`
--
ALTER TABLE `technology_details`
  ADD PRIMARY KEY (`technology_id`);

--
-- Indexes for table `temperature_details`
--
ALTER TABLE `temperature_details`
  ADD PRIMARY KEY (`temperature_id`);

--
-- Indexes for table `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assembly_details`
--
ALTER TABLE `assembly_details`
  MODIFY `assembly_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `color_details`
--
ALTER TABLE `color_details`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `design_details`
--
ALTER TABLE `design_details`
  MODIFY `design_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `design_material_details`
--
ALTER TABLE `design_material_details`
  MODIFY `design_material_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `design_resource_details`
--
ALTER TABLE `design_resource_details`
  MODIFY `design_resource_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `file_details`
--
ALTER TABLE `file_details`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `finishing_details`
--
ALTER TABLE `finishing_details`
  MODIFY `finishing_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `google_details`
--
ALTER TABLE `google_details`
  MODIFY `google_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industry_details`
--
ALTER TABLE `industry_details`
  MODIFY `industry_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `layer_height_details`
--
ALTER TABLE `layer_height_details`
  MODIFY `layer_height_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `material_details`
--
ALTER TABLE `material_details`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `post_process_details`
--
ALTER TABLE `post_process_details`
  MODIFY `post_process_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `precision_details`
--
ALTER TABLE `precision_details`
  MODIFY `precision_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `price_details`
--
ALTER TABLE `price_details`
  MODIFY `price_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `support_details`
--
ALTER TABLE `support_details`
  MODIFY `support_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technology_details`
--
ALTER TABLE `technology_details`
  MODIFY `technology_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `temperature_details`
--
ALTER TABLE `temperature_details`
  MODIFY `temperature_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
