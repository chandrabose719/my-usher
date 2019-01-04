CREATE TABLE `post_process_details` (
  `post_process_id` int(11) NOT NULL AUTO_INCREMENT,
  `technology_id` int(11) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `post_process_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY(`post_process_id`)
);

INSERT INTO `post_process_details` VALUES ( 1, 1, 1, 'Sanding', 'active', '9-11-2018');
INSERT INTO `post_process_details` VALUES ( 2, 1, 2, 'Sanding', 'active', '9-11-2018');
INSERT INTO `post_process_details` VALUES ( 3, 1, 2, 'Glossy', 'active', '9-11-2018');
