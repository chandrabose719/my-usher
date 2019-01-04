CREATE TABLE `material_detail` (
  `material_id` int(100) NOT NULL AUTO_INCREMENT,
  `material_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY(`material_id`)
);

INSERT INTO `material_detail` VALUES ( 1, 'PLA', 'active', '9-11-2018');
INSERT INTO `material_detail` VALUES ( 2, 'ABS', 'active', '9-11-2018');
INSERT INTO `material_detail` VALUES ( 3, 'Standard Nylon', 'active', '9-11-2018');
INSERT INTO `material_detail` VALUES ( 4, 'Standard TPU', 'active', '9-11-2018');
INSERT INTO `material_detail` VALUES ( 5, 'Standard Resin', 'active', '9-11-2018');
INSERT INTO `material_detail` VALUES ( 6, 'Clear Resin', 'active', '9-11-2018');