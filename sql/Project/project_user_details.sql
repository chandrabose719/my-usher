CREATE TABLE `project_user_details` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_company` varchar(100) NOT NULL,
  `user_mobile` varchar(100) NOT NULL,
  `user_address` varchar(500) NOT NULL,
  `lead_source_id` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `user_date` varchar(100) NOT NULL
);

ALTER TABLE `project_user_details`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `project_user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
  