
CREATE TABLE `change_password_details` (
  `change_password_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `change_password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_date` varchar(100) NOT NULL,
  `updated_date` varchar(100) NOT NULL
);

ALTER TABLE `change_password_details`
  ADD PRIMARY KEY (`change_password_id`);

ALTER TABLE `change_password_details`
  MODIFY `change_password_id` int(11) NOT NULL AUTO_INCREMENT;

