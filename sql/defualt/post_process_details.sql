
CREATE TABLE `post_process_details` (
  `post_process_id` int(100) NOT NULL,
  `material_id` varchar(100) NOT NULL,
  `post_process_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `post_process_details` (`post_process_id`, `material_id`, `post_process_name`, `status`, `date`) VALUES
(1, '1', 'Sanding', 'inactive', unix_timestamp()),
(2, '2', 'Sanding', 'inactive', unix_timestamp()),
(3, '2', 'Glossy', 'inactive', unix_timestamp());

ALTER TABLE `post_process_details`
  ADD PRIMARY KEY (`post_process_id`);

ALTER TABLE `post_process_details`
  MODIFY `post_process_id` int(100) NOT NULL AUTO_INCREMENT;
