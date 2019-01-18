
CREATE TABLE `order_details` (
  `order_id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `order` varchar(100) NOT NULL,
  `payment_amount` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL
);

ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

ALTER TABLE `order_details`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT;

