
CREATE TABLE `design_details` (
	`design_id` int(100) NOT NULL,
	`user_id` varchar(100) NOT NULL,
	`industry_id` varchar(100) NOT NULL,	
	`design_name` varchar(100) NOT NULL,	
	`design_description` varchar(1000) NOT NULL,	
	`design_usage` varchar(100) NOT NULL,
	`design_assembly` varchar(100) NOT NULL,
	`design_precision` varchar(100) NOT NULL,	
	`design_material` varchar(100) NOT NULL,	
	`design_material_custom` varchar(100) NOT NULL,
	`design_finishing` varchar(100) NOT NULL,
	`design_finishing_custom` varchar(100) NOT NULL,	
	`design_temperature` varchar(100) NOT NULL,
	`design_temperature_custom` varchar(100) NOT NULL,
	`order_id` varchar(100) NOT NULL,	
	`order_status` varchar(100) NOT NULL,	
	`status` varchar(100) NOT NULL,	
	`design_date` varchar(100) NOT NULL
);

ALTER TABLE `design_details`
  ADD PRIMARY KEY (`design_id`);

ALTER TABLE `design_details`
  MODIFY `design_id` int(100) NOT NULL AUTO_INCREMENT;
