
CREATE TABLE `test_files` (
  `file_id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `file_size` bigint(100) NOT NULL,
  `cad_result` varchar(1000) NOT NULL,
  `file_qty` varchar(100) NOT NULL,
  `file_amount` varchar(100) NOT NULL,
  `file_unit` varchar(100) NOT NULL,
  `file_dx` varchar(100) NOT NULL,
  `file_dy` varchar(100) NOT NULL,
  `file_dz` varchar(100) NOT NULL,
  `file_volume` varchar(100) NOT NULL,
  `file_surface` varchar(100) NOT NULL,
  `file_instruction` varchar(100) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `file_status` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `cur_date` varchar(100) NOT NULL
);


ALTER TABLE `test_files`
  ADD PRIMARY KEY (`file_id`);

ALTER TABLE `test_files`
  MODIFY `file_id` int(100) NOT NULL AUTO_INCREMENT;


