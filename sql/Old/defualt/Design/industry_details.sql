
CREATE TABLE `industry_details` (
  `industry_id` int(100) NOT NULL,
  `industry_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `industry_details` (`industry_id`, `industry_name`, `status`, `date`) VALUES
(1, 'Aerospace', 'active', unix_timestamp()),
(2, 'Architecture', 'active', unix_timestamp()),
(3, 'Automotive', 'active', unix_timestamp()),
(4, 'Education', 'active', unix_timestamp()),
(5, 'Gifting', 'active', unix_timestamp()),
(6, 'Manufacturing', 'active', unix_timestamp()),
(7, 'Med-Tech', 'active', unix_timestamp()),
(8, 'Other', 'active', unix_timestamp());


ALTER TABLE `industry_details`
  ADD PRIMARY KEY (`industry_id`);

ALTER TABLE `industry_details`
  MODIFY `industry_id` int(100) NOT NULL AUTO_INCREMENT;