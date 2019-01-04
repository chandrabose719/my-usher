
CREATE TABLE `industry_details` (
	`industry_id` int(100) NOT NULL AUTO_INCREMENT,
	`industry_name` varchar(100) NOT NULL,
	`status` varchar(100) NOT NULL,	
	`date` varchar(100) NOT NULL,	
	PRIMARY KEY (`industry_id`)
);

INSERT INTO `industry_details` VALUES 
(1, 'Aerospace', 'active', '16-11-2018'),
(2, 'Architecture', 'active', '16-11-2018'),
(3, 'Automotive', 'active', '16-11-2018'),
(4, 'Education', 'active', '16-11-2018'),
(5, 'Gifting', 'active', '16-11-2018'),
(6, 'Manufacturing', 'active', '16-11-2018'),
(7, 'Med-Tech', 'active', '16-11-2018'),
(8, 'Product Design', 'active', '16-11-2018');