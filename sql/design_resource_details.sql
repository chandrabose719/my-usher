
CREATE TABLE `design_resource_details` (
	`design_resource_id` int(100) NOT NULL AUTO_INCREMENT,
	`design_id` int(100) NOT NULL,
	`design_resource_name` varchar(100) NOT NULL,	
	`design_resource_path` varchar(1000) NOT NULL,	
	`design_resource_size` varchar(100) NOT NULL,
	`status` varchar(100) NOT NULL,	
	`design_resource_date` varchar(100) NOT NULL,	
	PRIMARY KEY (`design_resource_id`)
);

