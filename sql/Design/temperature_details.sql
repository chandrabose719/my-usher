
CREATE TABLE `temperature_details` (
  `temperature_id` int(100) NOT NULL,
  `temperature_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `temperature_details` (`temperature_id`, `temperature_name`, `status`, `date`) VALUES
(1, 'I have a requirement', 'active', unix_timestamp()),
(2, 'I do not have a requirement', 'active', unix_timestamp()),
(3, 'I am not sure', 'active', unix_timestamp());

-- INSERT INTO `temperature_details` (`temperature_id`, `temperature_name`, `status`, `date`) VALUES
-- (1, '< 0 C or 32 F', 'inactive', unix_timestamp()),
-- (2, '32 F to 59 F', 'active', unix_timestamp()),
-- (3, '59 F to 104 F', 'active', unix_timestamp()),
-- (4, '104 F to 122 F', 'active', unix_timestamp()),
-- (5, 'Greater than 122 F', 'active', unix_timestamp()),
-- (6, 'Not Sure', 'active', unix_timestamp());

ALTER TABLE `temperature_details`
  ADD PRIMARY KEY (`temperature_id`);

ALTER TABLE `temperature_details`
  MODIFY `temperature_id` int(100) NOT NULL AUTO_INCREMENT;
