
CREATE TABLE `precision_details` (
	`precision_id` int(100) NOT NULL AUTO_INCREMENT,
	`precision_name` varchar(100) NOT NULL,
	`precision_image` varchar(100) NOT NULL,
	`status` varchar(100) NOT NULL,	
	`date` varchar(100) NOT NULL,	
	PRIMARY KEY (`precision_id`)
);

INSERT INTO `precision_details` VALUES 
(1, 'Low', 'assets/images/design/3DUsher-Detailing-Low.png', 'active', '16-11-2018'),
(2, 'Medium', 'assets/images/design/3DUsher-Detailing-Medium.png', 'active', '16-11-2018'),
(3, 'High', 'assets/images/design/3DUsher-Detailing-High.png', 'active', '16-11-2018');