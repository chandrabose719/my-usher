-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2019 at 11:11 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdu_usher`
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
(1, 'Single Part', 'assets/images/design/3DUsher-DescribeProject-Assembly-1.png', 'active', '1547618339'),
(2, 'Multiple Parts (Non Assembly)', 'assets/images/design/3DUsher-DescribeProject-Assembly-2.png', 'active', '1547618339'),
(3, 'Multiple Parts (Assembled)', 'assets/images/design/3DUsher-DescribeProject-Assembly-3.png', 'active', '1547618339');

-- --------------------------------------------------------

--
-- Table structure for table `color_details`
--

CREATE TABLE `color_details` (
  `color_id` int(100) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `color_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color_details`
--

INSERT INTO `color_details` (`color_id`, `material_id`, `color_name`, `status`, `date`) VALUES
(1, '1', 'WHITE', 'inactive', '1547711802'),
(2, '1', 'RED', 'inactive', '1547711802'),
(3, '1', 'GREEN', 'inactive', '1547711802'),
(4, '2', 'WHITE', 'inactive', '1547711802'),
(5, '2', 'RED', 'inactive', '1547711802'),
(6, '2', 'GREEN', 'inactive', '1547711802'),
(7, '3', 'WHITE', 'inactive', '1547711802'),
(8, '3', 'RED', 'inactive', '1547711802'),
(9, '3', 'GREEN', 'inactive', '1547711802'),
(10, '4', 'WHITE', 'inactive', '1547711802'),
(11, '4', 'RED', 'inactive', '1547711802'),
(12, '4', 'GREEN', 'inactive', '1547711802'),
(13, '5', 'WHITE', 'inactive', '1547711802'),
(14, '5', 'BLACK', 'inactive', '1547711802'),
(15, '6', 'WHITE', 'inactive', '1547711802'),
(16, '6', 'BLACK', 'inactive', '1547711802'),
(17, '7', 'WHITE', 'inactive', '1547711802'),
(18, '7', 'BLACK', 'inactive', '1547711802'),
(19, '8', 'NATURAL', 'inactive', '1547711802'),
(20, '9', 'NATURAL', 'inactive', '1547711802');

-- --------------------------------------------------------

--
-- Table structure for table `country_details`
--

CREATE TABLE `country_details` (
  `country_id` int(100) NOT NULL,
  `country_code` varchar(2) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_details`
--

INSERT INTO `country_details` (`country_id`, `country_code`, `country_name`, `status`) VALUES
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
(1, '1', '1', 'Test One', 'Optional One', 'Manufacture', '4', '3', '1', 'Custom Mat', '3', '3', '', 'DO019100', 'PROCESSING', 'active', '1547618852'),
(2, '1', '1', 'Test Two', '', 'Gifting', '6', '2', '2', '', '2', '1', 'Custom Fin', 'DO019101', 'PROCESSING', 'active', '1547621409');

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
(1, 'None of the Above', 'active', '1547618366'),
(2, 'Biomaterial', 'active', '1547618366'),
(3, 'Ceramic\n', 'active', '1547618366'),
(4, 'Sandstone', 'active', '1547618366'),
(5, 'Acrylic', 'active', '1547618366'),
(6, 'Metal', 'active', '1547618366'),
(7, 'Plastic', 'active', '1547618366'),
(8, 'Wood', 'active', '1547618366'),
(9, 'Castable Material', 'active', '1547618366');

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
(1, 1, 'DBmenuTest.png', 'assets/images/design_file/1547618834_DBmenuTest.png', '122881', 'active', '1547618834');

-- --------------------------------------------------------

--
-- Table structure for table `facebook_details`
--

CREATE TABLE `facebook_details` (
  `facebook_id` int(100) NOT NULL,
  `facebook_auth_id` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file_details`
--

CREATE TABLE `file_details` (
  `file_id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `file_size` bigint(100) NOT NULL,
  `cad_result` varchar(1000) NOT NULL,
  `file_qty` varchar(100) NOT NULL,
  `file_amount` varchar(100) NOT NULL,
  `file_unit` varchar(100) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `layer_height_id` varchar(100) NOT NULL,
  `color_id` varchar(100) NOT NULL,
  `post_process_id` varchar(100) NOT NULL,
  `file_instruction` varchar(100) NOT NULL,
  `delivery_type` varchar(100) NOT NULL,
  `delivery_amount` varchar(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `file_status` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `cur_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_details`
--

INSERT INTO `file_details` (`file_id`, `user_id`, `file_name`, `file_path`, `file_size`, `cad_result`, `file_qty`, `file_amount`, `file_unit`, `material_id`, `layer_height_id`, `color_id`, `post_process_id`, `file_instruction`, `delivery_type`, `delivery_amount`, `order_id`, `file_status`, `status`, `cur_date`) VALUES
(1, '1', 'igs.igs', 'assets/images/cad_file/1547713116_igs.igs', 1206548, '{\"HtmlFile\":\"https://3dusher.online:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', '', '', '', '', '', '', '', '', '', '', '', 'INCOMPLETE', 'active', '1547713116'),
(2, '1', 'igs.igs', 'assets/images/cad_file/1547713526_igs.igs', 1206548, '{\"HtmlFile\":\"https://3dusher.online:8080/Assets/ProcessPreview/igs.igs.html\",\"DimensionX\":34.0000002,\"DimensionY\":34.0000002,\"DimensionZ\":45.2379301999999,\"SurfaceArea\":31.1506304201015,\"Volume\":2391.14}', '', '', '', '', '', '', '', '', '', '', '', 'INCOMPLETE', 'active', '1547713526'),
(3, '1', 'stp.stp', 'assets/images/cad_file/1547797873_stp.stp', 1134138, '{\"HtmlFile\":\"https://3dusher.online:8080/Assets/ProcessPreview/stp.stp.html\",\"DimensionX\":46.5900315509107,\"DimensionY\":46.5900315509107,\"DimensionZ\":55.0266267409692,\"SurfaceArea\":30.1271684511792,\"Volume\":2296.453}', '1', '4.88382632496', 'in', '9', '21', '', '', 'Optional', 'Normal', '10', '1', 'PROCESSING', 'active', '1547797873');

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
(1, 'None of the Above', 'active', '1547618388'),
(2, 'No Requirement', 'active', '1547618388'),
(3, 'Matte Finish', 'active', '1547618388'),
(4, 'Glossy Finish', 'active', '1547618388');

-- --------------------------------------------------------

--
-- Table structure for table `google_details`
--

CREATE TABLE `google_details` (
  `google_id` int(100) NOT NULL,
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
(1, '114156121863219191187', 'CHANDRA BOSE.K.V', 'chandrabose719.songs@gmail.com', 'active', '1547618195');

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
(1, 'Aerospace', 'active', '1547618407'),
(2, 'Architecture', 'active', '1547618407'),
(3, 'Automotive', 'active', '1547618407'),
(4, 'Education', 'active', '1547618407'),
(5, 'Gifting', 'active', '1547618407'),
(6, 'Manufacturing', 'active', '1547618407'),
(7, 'Med-Tech', 'active', '1547618407'),
(8, 'Other', 'active', '1547618407');

-- --------------------------------------------------------

--
-- Table structure for table `layer_height_details`
--

CREATE TABLE `layer_height_details` (
  `layer_height_id` int(100) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `layer_height_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layer_height_details`
--

INSERT INTO `layer_height_details` (`layer_height_id`, `material_id`, `layer_height_name`, `status`, `date`) VALUES
(1, '1', '100', 'active', '1547635573'),
(2, '1', '200', 'inactive', '1547635573'),
(3, '1', '300', 'inactive', '1547635573'),
(4, '2', '100', 'active', '1547635573'),
(5, '2', '200', 'inactive', '1547635573'),
(6, '2', '300', 'inactive', '1547635573'),
(7, '3', '100', 'active', '1547635573'),
(8, '3', '200', 'inactive', '1547635573'),
(9, '3', '300', 'inactive', '1547635573'),
(10, '4', '100', 'active', '1547635573'),
(11, '4', '200', 'inactive', '1547635573'),
(12, '4', '300', 'inactive', '1547635573'),
(13, '5', '100', 'active', '1547635573'),
(14, '6', '100', 'active', '1547635573'),
(15, '7', '25', 'active', '1547635573'),
(16, '7', '50', 'active', '1547635573'),
(17, '7', '100', 'active', '1547635573'),
(18, '8', '25', 'active', '1547635573'),
(19, '8', '50', 'active', '1547635573'),
(20, '8', '100', 'active', '1547635573'),
(21, '9', '25', 'active', '1547635573'),
(22, '9', '50', 'active', '1547635573'),
(23, '9', '100', 'active', '1547635573');

-- --------------------------------------------------------

--
-- Table structure for table `material_details`
--

CREATE TABLE `material_details` (
  `material_id` int(100) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `technology_name` varchar(100) NOT NULL,
  `min_volume` varchar(100) NOT NULL,
  `max_volume` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_details`
--

INSERT INTO `material_details` (`material_id`, `material_name`, `technology_name`, `min_volume`, `max_volume`, `status`, `date`) VALUES
(1, 'PLA', 'FDM', '8', '125000000', 'active', '1547635536'),
(2, 'ABS', 'FDM', '8', '125000000', 'active', '1547635536'),
(3, 'PETG', 'FDM', '8', '125000000', 'active', '1547635536'),
(4, 'PEEK', 'FDM', '8', '125000000', 'active', '1547635536'),
(5, 'Standard Nylon', 'SLS', '2', '27000000', 'active', '1547635536'),
(6, 'Standard TPU', 'SLS', '2', '27000000', 'active', '1547635536'),
(7, 'Standard Resin', 'SLA', '2', '562500000', 'active', '1547635536'),
(8, 'Clear Resin', 'SLA', '2', '562500000', 'active', '1547635536'),
(9, 'Tough Resin', 'SLA', '2', '562500000', 'active', '1547635536');

-- --------------------------------------------------------

--
-- Table structure for table `needhelp_details`
--

CREATE TABLE `needhelp_details` (
  `needhelp_id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `order_type` varchar(100) NOT NULL,
  `help_message` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `needhelp_details`
--

INSERT INTO `needhelp_details` (`needhelp_id`, `user_id`, `order_id`, `order_type`, `help_message`, `status`, `date`) VALUES
(1, '1', '1', 'design', 'Need Help Test One', 'active', '1547619631');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `order` varchar(100) NOT NULL,
  `payment_amount` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `user_id`, `payment_id`, `order`, `payment_amount`, `order_status`, `payment_status`, `order_date`) VALUES
(1, '1', 'ch_1DttewCSoKzHcIqlvH4xWLgB', 'MO019100', '1488', 'PROCESSING', 'succeeded', '1547803749');

-- --------------------------------------------------------

--
-- Table structure for table `post_process_details`
--

CREATE TABLE `post_process_details` (
  `post_process_id` int(100) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `post_process_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_process_details`
--

INSERT INTO `post_process_details` (`post_process_id`, `material_id`, `post_process_name`, `status`, `date`) VALUES
(1, '1', 'Sanding', 'inactive', '1547635606'),
(2, '2', 'Sanding', 'inactive', '1547635606'),
(3, '2', 'Glossy', 'inactive', '1547635606');

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
(1, 'Low', 'assets/images/design/3DUsher-Detailing-Low.png', 'active', '1547618463'),
(2, 'Medium', 'assets/images/design/3DUsher-Detailing-Medium.png', 'active', '1547618463'),
(3, 'High', 'assets/images/design/3DUsher-Detailing-High.png', 'active', '1547618463');

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
(1, '0.3300000000', '1', '0.00125', 'PLA', '100', 'active', '1547707193'),
(2, '0.5000000000', '1', '0.00125', 'PLA', '200', 'active', '1547707193'),
(3, '0.5000000000', '1', '0.00125', 'PLA', '300', 'active', '1547707193'),
(4, '0.4100000000', '1', '0.00105', 'ABS', '100', 'active', '1547707193'),
(5, '0.6000000000', '1', '0.00105', 'ABS', '200', 'active', '1547707193'),
(6, '0.6000000000', '1', '0.00105', 'ABS', '300', 'active', '1547707193'),
(7, '0.4100000000', '1', '0.00127', 'PETG', '100', 'active', '1547707193'),
(8, '0.4100000000', '1', '0.00127', 'PETG', '200', 'active', '1547707193'),
(9, '0.4100000000', '1', '0.00127', 'PETG', '300', 'active', '1547707193'),
(10, '5.0000000000', '1', '0.00132', 'PEEK', '100', 'active', '1547707193'),
(11, '5.0000000000', '1', '0.00132', 'PEEK', '200', 'active', '1547707193'),
(12, '5.0000000000', '1', '0.00132', 'PEEK', '300', 'active', '1547707193'),
(13, '0.0004078200', '10', 'NULL', 'Standard Nylon', '100', 'active', '1547707193'),
(14, '0.0009059400', '25', 'NULL', 'Standard TPU', '100', 'active', '1547707193'),
(15, '0.0006445100', '5', 'NULL', 'Standard Resin', '100', 'active', '1547707193'),
(16, '0.0007616800', '7', 'NULL', 'Standard Resin', '50', 'active', '1547707193'),
(17, '0.0008203200', '9', 'NULL', 'Standard Resin', '25', 'active', '1547707193'),
(18, '0.0006825500', '5', 'NULL', 'Clear Resin', '100', 'active', '1547707193'),
(19, '0.0007616800', '7', 'NULL', 'Clear Resin', '50', 'active', '1547707193'),
(20, '0.0008203200', '9', 'NULL', 'Clear Resin', '25', 'active', '1547707193'),
(21, '0.0006445100', '3', 'NULL', 'Tough Resin', '100', 'active', '1547707193'),
(22, '0.0007616800', '5', 'NULL', 'Tough Resin', '50', 'active', '1547707193'),
(23, '0.0008203200', '3', 'NULL', 'Tough Resin', '25', 'active', '1547707193');

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
(1, '< 0 C or 32 F', 'inactive', '1547618586'),
(2, '32 F to 59 F', 'active', '1547618586'),
(3, '59 F to 104 F', 'active', '1547618586'),
(4, '104 F to 122 F', 'active', '1547618586'),
(5, 'Greater than 122 F', 'active', '1547618586'),
(6, 'Not Sure', 'active', '1547618586');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(100) NOT NULL,
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
  `facebook_auth_id` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_name`, `user_email`, `user_password`, `user_mobile`, `billing_address`, `billing_address1`, `billing_city`, `billing_state`, `billing_country`, `billing_zipcode`, `shipping_address`, `shipping_address1`, `city`, `state`, `country`, `pin_code`, `google_auth_id`, `facebook_auth_id`, `status`, `date`) VALUES
(1, 'Bose', 'info@3dusher.com', 'ushers', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1547616858'),
(2, 'CHANDRA BOSE.K.V', 'chandrabose719.songs@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '114156121863219191187', '', 'active', '1547616858');

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
-- Indexes for table `country_details`
--
ALTER TABLE `country_details`
  ADD PRIMARY KEY (`country_id`);

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
-- Indexes for table `facebook_details`
--
ALTER TABLE `facebook_details`
  ADD PRIMARY KEY (`facebook_id`);

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
-- Indexes for table `needhelp_details`
--
ALTER TABLE `needhelp_details`
  ADD PRIMARY KEY (`needhelp_id`);

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
-- Indexes for table `temperature_details`
--
ALTER TABLE `temperature_details`
  ADD PRIMARY KEY (`temperature_id`);

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
  MODIFY `color_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `country_details`
--
ALTER TABLE `country_details`
  MODIFY `country_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `design_details`
--
ALTER TABLE `design_details`
  MODIFY `design_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `design_material_details`
--
ALTER TABLE `design_material_details`
  MODIFY `design_material_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `design_resource_details`
--
ALTER TABLE `design_resource_details`
  MODIFY `design_resource_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facebook_details`
--
ALTER TABLE `facebook_details`
  MODIFY `facebook_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_details`
--
ALTER TABLE `file_details`
  MODIFY `file_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `finishing_details`
--
ALTER TABLE `finishing_details`
  MODIFY `finishing_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `google_details`
--
ALTER TABLE `google_details`
  MODIFY `google_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industry_details`
--
ALTER TABLE `industry_details`
  MODIFY `industry_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `layer_height_details`
--
ALTER TABLE `layer_height_details`
  MODIFY `layer_height_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `material_details`
--
ALTER TABLE `material_details`
  MODIFY `material_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `needhelp_details`
--
ALTER TABLE `needhelp_details`
  MODIFY `needhelp_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_process_details`
--
ALTER TABLE `post_process_details`
  MODIFY `post_process_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `temperature_details`
--
ALTER TABLE `temperature_details`
  MODIFY `temperature_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
