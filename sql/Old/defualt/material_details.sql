
CREATE TABLE `material_details` (
  `material_id` int(100) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `technology_name` varchar(100) NOT NULL,
  `min_volume` varchar(100) NOT NULL,
  `max_volume` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `material_details` (`material_id`, `material_name`, `technology_name`, `min_volume`, `max_volume`,  `status`, `date`) VALUES
(1, 'PLA', 'FDM', '8', '125000000', 'active', unix_timestamp()),
(2, 'ABS', 'FDM', '8', '125000000', 'active', unix_timestamp()),
(3, 'PETG', 'FDM', '8', '125000000', 'active', unix_timestamp()),
(4, 'PEEK', 'FDM', '8', '125000000', 'active', unix_timestamp()),
(5, 'Standard Nylon', 'SLS', '2', '27000000', 'active', unix_timestamp()),
(6, 'Standard TPU', 'SLS', '2', '27000000', 'active', unix_timestamp()),
(7, 'Standard Resin', 'SLA', '2', '562500000', 'active', unix_timestamp()),
(8, 'Clear Resin', 'SLA', '2', '562500000', 'active', unix_timestamp()),
(9, 'Tough Resin', 'SLA', '2', '562500000', 'active', unix_timestamp());

ALTER TABLE `material_details`
  ADD PRIMARY KEY (`material_id`);

ALTER TABLE `material_details`
  MODIFY `material_id` int(100) NOT NULL AUTO_INCREMENT;
