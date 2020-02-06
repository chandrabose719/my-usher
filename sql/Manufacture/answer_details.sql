
CREATE TABLE `answer_details` (
  `answer_id` int(11) NOT NULL,
  `question_type` varchar(100) NOT NULL,
  `answer_name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `answer_details` (`answer_id`, `question_type`, `answer_name`, `status`, `date`) VALUES
(1, 'Q1', 'Plastic', 'active', unix_timestamp()),
(2, 'Q1', 'Metal', 'active', unix_timestamp()),
(3, 'Q1', 'Not Sure', 'active', unix_timestamp()),
(4, 'Q1', 'Others', 'active', unix_timestamp()),

(5, 'Q2', 'Quality', 'active', unix_timestamp()),
(6, 'Q2', 'Price', 'active', unix_timestamp()),
(7, 'Q2', 'Speed', 'active', unix_timestamp());

ALTER TABLE `answer_details`
  ADD PRIMARY KEY (`answer_id`);

ALTER TABLE `answer_details`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;

