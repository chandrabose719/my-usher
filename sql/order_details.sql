
CREATE TABLE `order_details` (
  `order_id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `order` varchar(100) NOT NULL,
  `order_status` varchar(100) NOT NULL,
  `order_date` varchar(100) NOT NULL,
  PRIMARY KEY (`order_id`)
);
