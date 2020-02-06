
CREATE TABLE `quantity_details` (
  `quantity_id` int(11) NOT NULL,
  `question_type` varchar(100) NOT NULL,
  `quantity_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `answer_details` (`quantity_id`, `question_type`, `quantity_name`, `status`, `date`) VALUES
(1, 'Q3', '', 'active', unix_timestamp()),
(2, 'Q3', '', 'active', unix_timestamp()),
(3, 'Q3', '', 'active', unix_timestamp()),
(4, 'Q3', '', 'active', unix_timestamp());

ALTER TABLE `quantity_details`
  ADD PRIMARY KEY (`quantity_id`);

ALTER TABLE `quantity_details`
  MODIFY `quantity_id` int(11) NOT NULL AUTO_INCREMENT;

