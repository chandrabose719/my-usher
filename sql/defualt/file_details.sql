
CREATE TABLE `file_details` (
  `file_id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `file_size` bigint(100) NOT NULL,
  `cad_result` varchar(1000) NOT NULL,
  `file_qty` varchar(100) NOT NULL,
  `file_amount` varchar(100) NOT NULL,
  `file_unit` varchar(100) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `layer_height_id` varchar(100) NOT NULL,
  `color_id` varchar(100) NOT NULL,
  `post_process_id` varchar(100) NOT NULL,
  `file_instruction` varchar(100) NOT NULL,
  `delivery_type` varchar(100) NOT NULL,
  `delivery_amount` varchar(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `file_status` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `cur_date` varchar(100) NOT NULL
);


ALTER TABLE `file_details`
  ADD PRIMARY KEY (`file_id`);

ALTER TABLE `file_details`
  MODIFY `file_id` int(100) NOT NULL AUTO_INCREMENT;


