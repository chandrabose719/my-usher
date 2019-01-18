CREATE TABLE `precision_details` (
  `precision_id` int(100) NOT NULL,
  `precision_name` varchar(100) NOT NULL,
  `precision_image` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `precision_details` (`precision_id`, `precision_name`, `precision_image`, `status`, `date`) VALUES
(1, 'Low', 'assets/images/design/3DUsher-Detailing-Low.png', 'active', unix_timestamp()),
(2, 'Medium', 'assets/images/design/3DUsher-Detailing-Medium.png', 'active', unix_timestamp()),
(3, 'High', 'assets/images/design/3DUsher-Detailing-High.png', 'active', unix_timestamp());

ALTER TABLE `precision_details`
  ADD PRIMARY KEY (`precision_id`);

ALTER TABLE `precision_details`
  MODIFY `precision_id` int(100) NOT NULL AUTO_INCREMENT;
