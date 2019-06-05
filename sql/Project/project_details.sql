
CREATE TABLE `project_details` (
	`project_id` int(11) NOT NULL,
	`user_id` varchar(100) NOT NULL,
	`project_name` varchar(100) NOT NULL,	
	`project_usage` varchar(100) NOT NULL,
	`project_description` varchar(1000) NOT NULL,	
	`project_technology` varchar(100) NOT NULL,
	`project_material` varchar(100) NOT NULL,	
	`project_finish` varchar(100) NOT NULL,
	`project_qty` varchar(100) NOT NULL,
	`project_location` varchar(100) NOT NULL,
	`field_name_one` varchar(100) NOT NULL,
	`field_name_two` varchar(100) NOT NULL,
	`field_name_three` varchar(100) NOT NULL,
	`award_date` varchar(100) NOT NULL,
	`needed_by` varchar(100) NOT NULL,
	`project_tolerance` varchar(100) NOT NULL,
	`project_instruction` varchar(100) NOT NULL,
	`project_info` varchar(100) NOT NULL,
	`order` varchar(100) NOT NULL,	
	`project_status` varchar(100) NOT NULL,	
	`status` varchar(100) NOT NULL,	
	`project_date` varchar(100) NOT NULL
);

ALTER TABLE `project_details`
  ADD PRIMARY KEY (`project_id`);

ALTER TABLE `project_details`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT;
