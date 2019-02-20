CREATE TABLE `subscription_details` (
  `subscription_id` int(100) NOT NULL,
  `subscription_email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

ALTER TABLE `subscription_details`
  ADD PRIMARY KEY (`subscription_id`);

ALTER TABLE `subscription_details`
  MODIFY `subscription_id` int(100) NOT NULL AUTO_INCREMENT;
