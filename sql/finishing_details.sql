
CREATE TABLE `finishing_details` (
	`finishing_id` int(100) NOT NULL AUTO_INCREMENT,
	`finishing_name` varchar(100) NOT NULL,
	`status` varchar(100) NOT NULL,	
	`date` varchar(100) NOT NULL,	
	PRIMARY KEY (`finishing_id`)
);

INSERT INTO `finishing_details` VALUES 
(1, 'No Requirement', 'active', '16-11-2018'),
(2, 'Matte Finish', 'active', '16-11-2018'),
(5, 'Glossy Finish', 'active', '16-11-2018'),
(4, 'none of the Above', 'active', '16-11-2018');