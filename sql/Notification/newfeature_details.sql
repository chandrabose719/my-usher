
CREATE TABLE `newfeature_details` (
  `newfeature_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `field_one` varchar(100) NOT NULL,
  `field_two` varchar(100) NOT NULL,
  `field_three` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

ALTER TABLE `newfeature_details`
  ADD PRIMARY KEY (`newfeature_id`);

ALTER TABLE `newfeature_details`
  MODIFY `newfeature_id` int(100) NOT NULL AUTO_INCREMENT;


