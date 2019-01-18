
CREATE TABLE `finishing_details` (
  `finishing_id` int(100) NOT NULL,
  `finishing_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `finishing_details` (`finishing_id`, `finishing_name`, `status`, `date`) VALUES
(1, 'None of the Above', 'active', unix_timestamp()),
(2, 'No Requirement', 'active', unix_timestamp()),
(3, 'Matte Finish', 'active', unix_timestamp()),
(4, 'Glossy Finish', 'active', unix_timestamp());

ALTER TABLE `finishing_details`
  ADD PRIMARY KEY (`finishing_id`);

ALTER TABLE `finishing_details`
  MODIFY `finishing_id` int(100) NOT NULL AUTO_INCREMENT;
