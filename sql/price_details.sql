
CREATE TABLE `price_details` (
  `price_id` int(100) NOT NULL AUTO_INCREMENT,
  `material_rate` decimal(16, 10) NOT NULL,
  `layer_height_rate` varchar(100) NOT NULL,
  `density` varchar(100) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `layer_height_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`price_id`)
);

INSERT INTO `price_details` VALUES ( 1, '0.33', '1', '0.00125', 'PLA', '100', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 2, '0.5', '1', '0.00125', 'PLA', '200', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 3, '0.5', '1', '0.00125', 'PLA', '300', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 4, '0.41', '1', '0.00105', 'ABS', '100', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 5, '0.6', '1', '0.00105', 'ABS', '200', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 6, '0.6', '1', '0.00105', 'ABS', '300', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 7, '0.41', '1', '0.00127', 'PETG', '100', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 8, '0.41', '1', '0.00127', 'PETG', '200', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 9, '0.41', '1', '0.00127', 'PETG', '300', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 10, '5', '1', '0.00132', 'PEEK', '100', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 11, '5', '1', '0.00132', 'PEEK', '200', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 12, '5', '1', '0.00132', 'PEEK', '300', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 13, '0.00040782', '10', 'NULL', 'Standard Nylon', '100', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 14, '0.00090594', '25', 'NULL', 'Standard TPU', '100', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 15, '0.00064451', '5', 'NULL', 'Standard Resin', '100', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 16, '0.00076168', '7', 'NULL', 'Standard Resin', '50', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 17, '0.00082032', '9', 'NULL', 'Standard Resin', '25', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 18, '0.00068255', '5', 'NULL', 'Clear Resin', '100', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 19, '0.00076168', '7', 'NULL', 'Clear Resin', '50', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 20, '0.00082032', '9', 'NULL', 'Clear Resin', '25', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 21, '0.00064451', '3', 'NULL', 'Tough Resin', '100', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 22, '0.00076168', '5', 'NULL', 'Tough Resin', '50', 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 23, '0.00082032', '3', 'NULL', 'Tough Resin', '25', 'active', '13-11-2018');

