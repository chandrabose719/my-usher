CREATE TABLE `google_details` (
  `google_id` int(100) NOT NULL,
  `google_auth_id` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `google_details` (`google_id`, `google_auth_id`, `user_name`, `user_email`, `status`, `date`) VALUES
(1, '114156121863219191187', 'CHANDRA BOSE.K.V', 'chandrabose719.songs@gmail.com', 'active', unix_timestamp());

ALTER TABLE `google_details`
  ADD PRIMARY KEY (`google_id`);

ALTER TABLE `google_details`
  MODIFY `google_id` int(100) NOT NULL AUTO_INCREMENT;