
CREATE TABLE `promotion_details` (
  `promation_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `field_one` varchar(100) NOT NULL,
  `field_two` varchar(100) NOT NULL,
  `field_three` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

ALTER TABLE `promotion_details`
  ADD PRIMARY KEY (`promation_id`);

ALTER TABLE `promotion_details`
  MODIFY `promation_id` int(100) NOT NULL AUTO_INCREMENT;


