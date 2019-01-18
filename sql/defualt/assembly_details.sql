CREATE TABLE `assembly_details` (
  `assembly_id` int(100) NOT NULL,
  `assembly_name` varchar(100) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `assembly_details` (`assembly_id`, `assembly_name`, `image_path`, `status`, `date`) VALUES
(1, 'Single Part', 'assets/images/design/3DUsher-DescribeProject-Assembly-1.png', 'active', unix_timestamp()),
(2, 'Multiple Parts (Non Assembly)', 'assets/images/design/3DUsher-DescribeProject-Assembly-2.png', 'active', unix_timestamp()),
(3, 'Multiple Parts (Assembled)', 'assets/images/design/3DUsher-DescribeProject-Assembly-3.png', 'active', unix_timestamp());

ALTER TABLE `assembly_details`
  ADD PRIMARY KEY (`assembly_id`);

ALTER TABLE `assembly_details`
  MODIFY `assembly_id` int(100) NOT NULL AUTO_INCREMENT;
