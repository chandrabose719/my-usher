
CREATE TABLE `project_resource_details` (
	`resource_id` int(11) NOT NULL,
	`project_id` varchar(100) NOT NULL,
	`resource_type` varchar(100) NOT NULL,	
	`resource_name` varchar(100) NOT NULL,	
	`resource_path` varchar(1000) NOT NULL,	
	`resource_size` varchar(100) NOT NULL,
	`status` varchar(100) NOT NULL,	
	`resource_date` varchar(100) NOT NULL
);

ALTER TABLE `project_resource_details`
  ADD PRIMARY KEY (`resource_id`);

ALTER TABLE `project_resource_details`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT;
