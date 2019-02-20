
CREATE TABLE `technical_details` (
  `technical_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `field_one` varchar(100) NOT NULL,
  `field_two` varchar(100) NOT NULL,
  `field_three` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

ALTER TABLE `technical_details`
  ADD PRIMARY KEY (`technical_id`);

ALTER TABLE `technical_details`
  MODIFY `technical_id` int(100) NOT NULL AUTO_INCREMENT;


