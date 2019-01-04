
CREATE TABLE `temperature_details` (
	`temperature_id` int(100) NOT NULL AUTO_INCREMENT,
	`temperature_name` varchar(100) NOT NULL,
	`status` varchar(100) NOT NULL,	
	`date` varchar(100) NOT NULL,	
	PRIMARY KEY (`temperature_id`)
);

INSERT INTO `temperature_details` VALUES 
(1, 'Room Temperature', 'active', '16-11-2018'),
(2, 'High Temperature', 'active', '16-11-2018'),
(3, 'Extremly High Temperature', 'active', '16-11-2018'),
(4, 'Low Temperature', 'active', '16-11-2018'),
(5, 'Extremly Low Temperature', 'active', '16-11-2018');