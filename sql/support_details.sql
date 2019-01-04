
CREATE TABLE `support_details` (
	`support_id` int(100) NOT NULL AUTO_INCREMENT,
	`user_id` int(100) NOT NULL,
	`order_id` varchar(100) NOT NULL,
	`order_type` varchar(100) NOT NULL,
	`support_query` varchar(1000) NOT NULL,
	`status` varchar(100) NOT NULL,	
	`date` varchar(100) NOT NULL,	
	PRIMARY KEY (`support_id`)
);