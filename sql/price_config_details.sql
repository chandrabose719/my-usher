
CREATE TABLE `price_details` (
  `price_config_id` int(100) NOT NULL AUTO_INCREMENT,
  `price_id` int(100) NOT NULL AUTO_INCREMENT,
  `material_id` int(100) NOT NULL,
  `layer_height_id` int(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`price_id`)
);

INSERT INTO `price_details` VALUES ( 1, 1, 3, 1, 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 2, 2, 4, 1, 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 3, 3, 5, 1, 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 4, 4, 5, 2, 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 5, 5, 5, 1, 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 6, 6, 6, 1, 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 7, 7, 6, 2, 'active', '13-11-2018');
INSERT INTO `price_details` VALUES ( 8, 8, 6, 1, 'active', '13-11-2018');