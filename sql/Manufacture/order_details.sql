
CREATE TABLE `order_details` (
  `order_id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `order` varchar(100) NOT NULL,
  `user_level` varchar(100) NOT NULL,
  `requirement_id` varchar(100) NOT NULL,
  `requirement_custom` varchar(100) NOT NULL,
  `priority_id` varchar(100) NOT NULL,
  `quantity_id` varchar(100) NOT NULL,
  `technology_id` varchar(100) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `order_instruction` varchar(100) NOT NULL,
  `manual_quote` varchar(100) NOT NULL,
  `manual_quote_file` varchar(100) NOT NULL,
  `communication_mode` varchar(100) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `payment_amount` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `delivery_type` varchar(100) NOT NULL,
  `delivery_amount` varchar(100) NOT NULL,
  `discount_id` varchar(100) NOT NULL,
  `discount_amount` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL
);

ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`);

ALTER TABLE `order_details`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT;

