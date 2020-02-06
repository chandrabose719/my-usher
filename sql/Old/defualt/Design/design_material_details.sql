
CREATE TABLE `design_material_details` (
  `design_material_id` int(100) NOT NULL,
  `design_material_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `design_material_details` (`design_material_id`, `design_material_name`, `status`, `date`) VALUES
(1, 'None of the Above', 'active', unix_timestamp()),
(2, 'Biomaterial', 'active', unix_timestamp()),
(3, 'Ceramic\n', 'active', unix_timestamp()),
(4, 'Sandstone', 'active', unix_timestamp()),
(5, 'Acrylic', 'active', unix_timestamp()),
(6, 'Metal', 'active', unix_timestamp()),
(7, 'Plastic', 'active', unix_timestamp()),
(8, 'Wood', 'active', unix_timestamp()),
(9, 'Castable Material', 'active', unix_timestamp());

ALTER TABLE `design_material_details`
  ADD PRIMARY KEY (`design_material_id`);

ALTER TABLE `design_material_details`
  MODIFY `design_material_id` int(100) NOT NULL AUTO_INCREMENT;
