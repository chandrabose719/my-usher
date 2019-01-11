CREATE TABLE `google_details` (
  `google_id` int(100) NOT NULL,
  `google_auth_id` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

ALTER TABLE `google_details`
  ADD PRIMARY KEY (`google_id`);

ALTER TABLE `google_details`
  MODIFY `google_id` int(100) NOT NULL AUTO_INCREMENT;