
CREATE TABLE `technology_details` (
  `technology_id` int(11) NOT NULL AUTO_INCREMENT,
  `technology_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY(`technology_id`)
);


INSERT INTO `technology_details` VALUES ( 1, 'FDM', 'active', '9-11-2018');
INSERT INTO `technology_details` VALUES ( 2, 'SLS', 'active', '9-11-2018');
INSERT INTO `technology_details` VALUES ( 3, 'SLA', 'active', '9-11-2018');