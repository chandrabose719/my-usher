
CREATE TABLE `question_details` (
  `question_id` int(11) NOT NULL,
  `question_type` varchar(100) NOT NULL,
  `question_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `question_details` (`question_id`, `question_type`, `question_name`, `status`, `date`) VALUES
(1, 'Q1', 'Material', 'active', unix_timestamp()),
(2, 'Q2', 'Priority', 'active', unix_timestamp());

ALTER TABLE `question_details`
  ADD PRIMARY KEY (`question_id`);

ALTER TABLE `question_details`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT;

