
CREATE TABLE `tmp_files` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(100) NOT NULL,
  `file_path` varchar(100) NOT NULL,
  `file_size` bigint(100) NOT NULL,
  `cad_result` varchar(1000) NOT NULL,
  `cur_date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY(`file_id`)
);
