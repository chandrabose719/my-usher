CREATE TABLE `precision_details` (
  `precision_id` int(100) NOT NULL,
  `precision_name` varchar(100) NOT NULL,
  `precision_image` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `precision_details` (`precision_id`, `precision_name`, `precision_image`, `status`, `date`) VALUES
(1, 'I am Not Sure', 'assets/images/design/3DUsher-DescribeProject-Precision-1.png', 'active', unix_timestamp()),
(2, 'High', 'assets/images/design/3DUsher-DescribeProject-Precision-2.png', 'active', unix_timestamp()),
(3, 'Medium', 'assets/images/design/3DUsher-DescribeProject-Precision-3.png', 'active', unix_timestamp()),
(4, 'Low', 'assets/images/design/3DUsher-DescribeProject-Precision-4.png', 'active', unix_timestamp());

ALTER TABLE `precision_details`
  ADD PRIMARY KEY (`precision_id`);

ALTER TABLE `precision_details`
  MODIFY `precision_id` int(100) NOT NULL AUTO_INCREMENT;
