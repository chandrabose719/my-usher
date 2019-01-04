
CREATE TABLE `material_details` (
  `material_id` int(11) NOT NULL AUTO_INCREMENT,
  `technology_id` int(11) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY(`material_id`)
);

INSERT INTO `material_details` VALUES ( 1, 1, 'PLA', 'active', '9-11-2018');
INSERT INTO `material_details` VALUES ( 2, 1, 'ABS', 'active', '9-11-2018');
INSERT INTO `material_details` VALUES ( 3, 1, 'PETG', 'active', '9-11-2018');
INSERT INTO `material_details` VALUES ( 4, 1, 'PEEK', 'active', '9-11-2018');
INSERT INTO `material_details` VALUES ( 5, 2, 'Standard Nylon', 'active', '9-11-2018');
INSERT INTO `material_details` VALUES ( 6, 2, 'Standard TPU', 'active', '9-11-2018');
INSERT INTO `material_details` VALUES ( 7, 3, 'Standard Resin', 'active', '9-11-2018');
INSERT INTO `material_details` VALUES ( 8, 3, 'Clear Resin', 'active', '9-11-2018');
INSERT INTO `material_details` VALUES ( 9, 3, 'Tough Resin', 'active', '9-11-2018');