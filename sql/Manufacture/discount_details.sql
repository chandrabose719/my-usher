
CREATE TABLE `discount_details` (
  `discount_id` int(100) NOT NULL,
  `applicable_technology` varchar(100) NOT NULL,
  `coupon_code` varchar(100) NOT NULL,
  `percentage` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `min_value` varchar(100) NOT NULL,
  `max_value` varchar(100) NOT NULL,
  `max_discount_amount` varchar(100) NOT NULL,
  `expiry_date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);


ALTER TABLE `discount_details`
  ADD PRIMARY KEY (`discount_id`);

ALTER TABLE `discount_details`
  MODIFY `discount_id` int(100) NOT NULL AUTO_INCREMENT;

