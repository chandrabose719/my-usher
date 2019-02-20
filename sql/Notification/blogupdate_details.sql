
CREATE TABLE `blogupdate_details` (
  `blogupdate_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `field_one` varchar(100) NOT NULL,
  `field_two` varchar(100) NOT NULL,
  `field_three` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

ALTER TABLE `blogupdate_details`
  ADD PRIMARY KEY (`blogupdate_id`);

ALTER TABLE `blogupdate_details`
  MODIFY `blogupdate_id` int(100) NOT NULL AUTO_INCREMENT;


