CREATE TABLE `layer_height_details` (
  `layer_height_id` int(11) NOT NULL AUTO_INCREMENT,
  `technology_id` int(11) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `layer_height_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY(`layer_height_id`)
);

INSERT INTO `layer_height_details` VALUES ( 1, 1, 1, '100', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 2, 1, 1, '200', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 3, 1, 1, '300', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 4, 1, 2, '100', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 5, 1, 2, '200', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 6, 1, 2, '300', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 7, 1, 3, '100', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 8, 1, 3, '200', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 9, 1, 3, '300', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 10, 1, 4, '100', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 11, 1, 4, '200', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 12, 1, 4, '300', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 13, 2, 5, '100', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 14, 2, 6, '100', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 15, 3, 7, '25', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 16, 3, 7, '50', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 17, 3, 7, '100', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 18, 3, 8, '25', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 19, 3, 8, '50', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 20, 3, 8, '100', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 21, 3, 9, '25', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 22, 3, 9, '50', 'active', '9-11-2018');
INSERT INTO `layer_height_details` VALUES ( 23, 3, 9, '100', 'active', '9-11-2018');