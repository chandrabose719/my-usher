CREATE TABLE `facebook_details` (
  `facebook_id` int(100) NOT NULL,
  `facebook_auth_id` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

ALTER TABLE `facebook_details`
  ADD PRIMARY KEY (`facebook_id`);

ALTER TABLE `facebook_details`
  MODIFY `facebook_id` int(100) NOT NULL AUTO_INCREMENT;