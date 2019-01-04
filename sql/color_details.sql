CREATE TABLE `color_details` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `technology_id` int(11) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `color_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY(`color_id`)
);

INSERT INTO `color_details` VALUES ( 1, 1, 1, 'WHITE', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 2, 1, 1, 'RED', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 3, 1, 1, 'GREEN', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 4, 1, 2, 'WHITE', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 5, 1, 2, 'RED', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 6, 1, 2, 'GREEN', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 7, 1, 3, 'WHITE', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 8, 1, 3, 'RED', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 9, 1, 3, 'GREEN', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 10, 1, 4, 'WHITE', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 11, 1, 4, 'RED', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 12, 1, 4, 'GREEN', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 13, 2, 5, 'WHITE', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 14, 2, 5, 'BLACK', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 15, 2, 6, 'WHITE', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 16, 2, 6, 'BLACK', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 17, 3, 7, 'WHITE', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 18, 3, 7, 'BLACK', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 19, 3, 8, 'NATURAL', 'active', '9-11-2018');
INSERT INTO `color_details` VALUES ( 20, 3, 9, 'NATURAL', 'active', '9-11-2018');