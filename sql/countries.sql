-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2018 at 11:35 AM
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
(115, 'KP', 'Korea, Democratic People''s Republic of', 'inactive'),
(116, 'KR', 'Korea, Republic of', 'inactive'),
(117, 'XK', 'Kosovo', 'inactive'),
(118, 'KW', 'Kuwait', 'inactive'),
(119, 'KG', 'Kyrgyzstan', 'inactive'),
(120, 'LA', 'Lao People''s Democratic Republic', 'inactive'),
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
