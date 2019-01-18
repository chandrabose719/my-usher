
CREATE TABLE `layer_height_details` (
  `layer_height_id` int(100) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `layer_height_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `layer_height_details` (`layer_height_id`, `material_id`, `layer_height_name`, `status`, `date`) VALUES
(1, '1', '100', 'active', unix_timestamp()),
(2, '1', '200', 'inactive', unix_timestamp()),
(3, '1', '300', 'inactive', unix_timestamp()),
(4, '2', '100', 'active', unix_timestamp()),
(5, '2', '200', 'inactive', unix_timestamp()),
(6, '2', '300', 'inactive', unix_timestamp()),
(7, '3', '100', 'active', unix_timestamp()),
(8, '3', '200', 'inactive', unix_timestamp()),
(9, '3', '300', 'inactive', unix_timestamp()),
(10, '4', '100', 'active', unix_timestamp()),
(11, '4', '200', 'inactive', unix_timestamp()),
(12, '4', '300', 'inactive', unix_timestamp()),
(13, '5', '100', 'active', unix_timestamp()),
(14, '6', '100', 'active', unix_timestamp()),
(15, '7', '25', 'active', unix_timestamp()),
(16, '7', '50', 'active', unix_timestamp()),
(17, '7', '100', 'active', unix_timestamp()),
(18, '8', '25', 'active', unix_timestamp()),
(19, '8', '50', 'active', unix_timestamp()),
(20, '8', '100', 'active', unix_timestamp()),
(21, '9', '25', 'active', unix_timestamp()),
(22, '9', '50', 'active', unix_timestamp()),
(23, '9', '100', 'active', unix_timestamp());

ALTER TABLE `layer_height_details`
  ADD PRIMARY KEY (`layer_height_id`);

ALTER TABLE `layer_height_details`
  MODIFY `layer_height_id` int(100) NOT NULL AUTO_INCREMENT;