CREATE TABLE `assembly_details` (
  `assembly_id` int(100) NOT NULL AUTO_INCREMENT,
  `assembly_name` varchar(100) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`assembly_id`)
);


INSERT INTO `assembly_details` (`assembly_id`, `assembly_name`, `image_path`, `status`, `date`) VALUES
(1, 'Single Part', 'assets/images/design/3DUsher-DescribeProject-Assembly-1.png', 'active', '16-11-2018'),
(2, 'Multiple Parts (Non Assembly)', 'assets/images/design/3DUsher-DescribeProject-Assembly-2.png', 'active', '16-11-2018'),
(3, 'Multiple Parts (Assembled)', 'assets/images/design/3DUsher-DescribeProject-Assembly-3.png', 'active', '16-11-2018');

