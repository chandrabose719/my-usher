CREATE TABLE `user_details` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_mobile` varchar(100) NOT NULL,
  `billing_address` varchar(500) NOT NULL,
  `billing_address1` varchar(500) NOT NULL,
  `billing_city` varchar(500) NOT NULL,
  `billing_state` varchar(500) NOT NULL,
  `billing_country` varchar(500) NOT NULL,
  `billing_zipcode` varchar(500) NOT NULL,
  `shipping_address` varchar(500) NOT NULL,
  `shipping_address1` varchar(500) NOT NULL,
  `city` varchar(500) NOT NULL,
  `state` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `pin_code` varchar(500) NOT NULL,
  `google_auth_id` varchar(100) NOT NULL,
  `facebook_auth_id` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `user_details` (`user_id`, `user_name`, `user_email`, `user_password`, `user_mobile`, `billing_address`, `billing_address1`, `billing_city`, `billing_state`, `billing_country`, `billing_zipcode`, `shipping_address`, `shipping_address1`, `city`, `state`, `country`, `pin_code`, `google_auth_id`, `facebook_auth_id`, `status`, `date`) VALUES
(1, 'Bose', 'info@3dusher.com', 'ushers', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', unix_timestamp()),
(2, 'CHANDRA BOSE.K.V', 'chandrabose719.songs@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '114156121863219191187', '', 'active', unix_timestamp());

ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `user_details`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT;
  