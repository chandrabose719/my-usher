
CREATE TABLE `color_details` (
  `color_id` int(100) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `color_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `color_details` (`color_id`, `material_id`, `color_name`, `status`, `date`) VALUES
(1, '1', 'WHITE', 'inactive', unix_timestamp()),
(2, '1', 'RED', 'inactive', unix_timestamp()),
(3, '1', 'GREEN', 'inactive', unix_timestamp()),
(4, '2', 'WHITE', 'inactive', unix_timestamp()),
(5, '2', 'RED', 'inactive', unix_timestamp()),
(6, '2', 'GREEN', 'inactive', unix_timestamp()),
(7, '3', 'WHITE', 'inactive', unix_timestamp()),
(8, '3', 'RED', 'inactive', unix_timestamp()),
(9, '3', 'GREEN', 'inactive', unix_timestamp()),
(10, '4', 'WHITE', 'inactive', unix_timestamp()),
(11, '4', 'RED', 'inactive', unix_timestamp()),
(12, '4', 'GREEN', 'inactive', unix_timestamp()),
(13, '5', 'WHITE', 'inactive', unix_timestamp()),
(14, '5', 'BLACK', 'inactive', unix_timestamp()),
(15, '6', 'WHITE', 'inactive', unix_timestamp()),
(16, '6', 'BLACK', 'inactive', unix_timestamp()),
(17, '7', 'WHITE', 'inactive', unix_timestamp()),
(18, '7', 'BLACK', 'inactive', unix_timestamp()),
(19, '8', 'NATURAL', 'inactive', unix_timestamp()),
(20, '9', 'NATURAL', 'inactive', unix_timestamp());

ALTER TABLE `color_details`
  ADD PRIMARY KEY (`color_id`);

ALTER TABLE `color_details`
  MODIFY `color_id` int(100) NOT NULL AUTO_INCREMENT;

