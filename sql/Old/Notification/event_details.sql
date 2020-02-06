
CREATE TABLE `event_details` (
  `event_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `field_one` varchar(100) NOT NULL,
  `field_two` varchar(100) NOT NULL,
  `field_three` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

ALTER TABLE `event_details`
  ADD PRIMARY KEY (`event_id`);

ALTER TABLE `event_details`
  MODIFY `event_id` int(100) NOT NULL AUTO_INCREMENT;


