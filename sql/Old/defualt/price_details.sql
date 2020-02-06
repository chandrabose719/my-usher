
CREATE TABLE `price_details` (
  `price_id` int(100) NOT NULL,
  `material_rate` decimal(16,10) NOT NULL,
  `layer_height_rate` varchar(100) NOT NULL,
  `density` varchar(100) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `layer_height_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `price_details` (`price_id`, `material_rate`, `layer_height_rate`, `density`, `material_name`, `layer_height_name`, `status`, `date`) VALUES
(1, '0.3300000000', '1', '0.00125', 'PLA', '100', 'active', unix_timestamp()),
(2, '0.5000000000', '1', '0.00125', 'PLA', '200', 'active', unix_timestamp()),
(3, '0.5000000000', '1', '0.00125', 'PLA', '300', 'active', unix_timestamp()),
(4, '0.4100000000', '1', '0.00105', 'ABS', '100', 'active', unix_timestamp()),
(5, '0.6000000000', '1', '0.00105', 'ABS', '200', 'active', unix_timestamp()),
(6, '0.6000000000', '1', '0.00105', 'ABS', '300', 'active', unix_timestamp()),
(7, '0.4100000000', '1', '0.00127', 'PETG', '100', 'active', unix_timestamp()),
(8, '0.4100000000', '1', '0.00127', 'PETG', '200', 'active', unix_timestamp()),
(9, '0.4100000000', '1', '0.00127', 'PETG', '300', 'active', unix_timestamp()),
(10, '5.0000000000', '1', '0.00132', 'PEEK', '100', 'active', unix_timestamp()),
(11, '5.0000000000', '1', '0.00132', 'PEEK', '200', 'active', unix_timestamp()),
(12, '5.0000000000', '1', '0.00132', 'PEEK', '300', 'active', unix_timestamp()),
(13, '0.0004078200', '10', 'NULL', 'Standard Nylon', '100', 'active', unix_timestamp()),
(14, '0.0009059400', '25', 'NULL', 'Standard TPU', '100', 'active', unix_timestamp()),
(15, '0.0006445100', '5', 'NULL', 'Standard Resin', '100', 'active', unix_timestamp()),
(16, '0.0007616800', '7', 'NULL', 'Standard Resin', '50', 'active', unix_timestamp()),
(17, '0.0008203200', '9', 'NULL', 'Standard Resin', '25', 'active', unix_timestamp()),
(18, '0.0006825500', '5', 'NULL', 'Clear Resin', '100', 'active', unix_timestamp()),
(19, '0.0007616800', '7', 'NULL', 'Clear Resin', '50', 'active', unix_timestamp()),
(20, '0.0008203200', '9', 'NULL', 'Clear Resin', '25', 'active', unix_timestamp()),
(21, '0.0006445100', '3', 'NULL', 'Tough Resin', '100', 'active', unix_timestamp()),
(22, '0.0007616800', '5', 'NULL', 'Tough Resin', '50', 'active', unix_timestamp()),
(23, '0.0008203200', '3', 'NULL', 'Tough Resin', '25', 'active', unix_timestamp());

ALTER TABLE `price_details`
  ADD PRIMARY KEY (`price_id`);

ALTER TABLE `price_details`
  MODIFY `price_id` int(100) NOT NULL AUTO_INCREMENT;
