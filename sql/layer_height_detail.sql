CREATE TABLE `layer_height_detail` (
  `layer_height_id` int(100) NOT NULL AUTO_INCREMENT,
  `layer_height_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY(`layer_height_id`)
);

INSERT INTO `layer_height_detail` VALUES ( 1, '25', 'active', '9-11-2018');
INSERT INTO `layer_height_detail` VALUES ( 2, '50', 'active', '9-11-2018');
INSERT INTO `layer_height_detail` VALUES ( 3, '100', 'active', '9-11-2018');
INSERT INTO `layer_height_detail` VALUES ( 4, '200', 'active', '9-11-2018');
INSERT INTO `layer_height_detail` VALUES ( 5, '300', 'active', '9-11-2018');
