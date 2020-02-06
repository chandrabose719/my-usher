
CREATE TABLE `technology_details` (
  `technology_id` int(100) NOT NULL,
  `technology_name` varchar(100) NOT NULL,
  `name_one` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `technology_details` (`technology_id`, `technology_name`, `name_one`, `status`, `date`) VALUES
(1, 'FDM', '', 'active', unix_timestamp()),
(2, 'SLA', '', 'active', unix_timestamp()),
(3, 'SLS', '', 'active', unix_timestamp()),
(4, 'MJF', '', 'active', unix_timestamp()),
(5, 'PJP', '', 'active', unix_timestamp()),
(6, 'CJP', '', 'active', unix_timestamp()),
(7, 'MJP', '', 'active', unix_timestamp()),
(8, 'CNC Machining', '', 'active', unix_timestamp()),
(9, 'Vacuum Casting', '', 'active', unix_timestamp()),
(10, 'Injection Molding', '', 'active', unix_timestamp()),
(11, 'Hand Molding', '', 'active', unix_timestamp()),
(12, 'DMLS', '', 'active', unix_timestamp()),
(13, 'Metal Cast', '', 'active', unix_timestamp());


ALTER TABLE `technology_details`
  ADD PRIMARY KEY (`technology_id`);

ALTER TABLE `technology_details`
  MODIFY `technology_id` int(100) NOT NULL AUTO_INCREMENT;

