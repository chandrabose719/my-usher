
CREATE TABLE `config_details` (
  `config_id` int(11) NOT NULL,
  `requirement_id` int(11) NOT NULL,
  `quantity_id` int(11) NOT NULL,
  `priority_id` int(11) NOT NULL,
  `technology_id` varchar(5000) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `config_details` (`config_id`, `requirement_id`, `quantity_id`, `priority_id`, `technology_id`, `status`, `date`) VALUES
(1, 1, 1, 5, '2', 'active', unix_timestamp()),
(2, 1, 1, 5, '3', 'active', unix_timestamp()),
(3, 1, 1, 5, '4', 'active', unix_timestamp()),
(4, 1, 1, 5, '5', 'active', unix_timestamp()),
(5, 1, 1, 5, '6', 'active', unix_timestamp()),
(6, 1, 1, 5, '7', 'active', unix_timestamp()),
(7, 1, 1, 6, '1', 'active', unix_timestamp()),
(8, 1, 1, 6, '3', 'active', unix_timestamp()),
(9, 1, 1, 6, '4', 'active', unix_timestamp()),
(10, 1, 1, 7, '2', 'active', unix_timestamp()),
(11, 1, 1, 7, '3', 'active', unix_timestamp()),
(12, 1, 1, 7, '4', 'active', unix_timestamp()),
(13, 1, 1, 7, '5', 'active', unix_timestamp()),
(14, 1, 1, 7, '6', 'active', unix_timestamp()),
(15, 1, 1, 7, '7', 'active', unix_timestamp()),

(16, 1, 2, 5, '8', 'active', unix_timestamp()),
(17, 1, 2, 5, '9', 'active', unix_timestamp()),
(18, 1, 2, 6, '9', 'active', unix_timestamp()),
(19, 1, 2, 7, '2', 'active', unix_timestamp()),
(20, 1, 2, 7, '3', 'active', unix_timestamp()),
(21, 1, 2, 7, '4', 'active', unix_timestamp()),

(22, 1, 3, 5, '8', 'active', unix_timestamp()),
(23, 1, 3, 5, '11', 'active', unix_timestamp()),
(24, 1, 3, 6, '8', 'active', unix_timestamp()),
(25, 1, 3, 6, '11', 'active', unix_timestamp()),
(26, 1, 3, 7, '8', 'active', unix_timestamp()),

(27, 1, 4, 5, '10', 'active', unix_timestamp()),
(28, 1, 4, 6, '8', 'active', unix_timestamp()),
(29, 1, 4, 6, '10', 'active', unix_timestamp()),
(30, 1, 4, 7, '8', 'active', unix_timestamp()),
(31, 1, 4, 7, '10', 'active', unix_timestamp()),

(32, 2, 1, 5, '8', 'active', unix_timestamp()),
(33, 2, 1, 6, '12', 'active', unix_timestamp()),
(34, 2, 1, 7, '8', 'active', unix_timestamp()),
(35, 2, 1, 7, '12', 'active', unix_timestamp()),

(36, 2, 2, 5, '8', 'active', unix_timestamp()),
(37, 2, 2, 6, '12', 'active', unix_timestamp()),
(38, 2, 2, 7, '8', 'active', unix_timestamp()),
(39, 2, 2, 7, '12', 'active', unix_timestamp()),

(40, 2, 3, 5, '8', 'active', unix_timestamp()),
(41, 2, 3, 5, '13', 'active', unix_timestamp()),
(42, 2, 3, 6, '8', 'active', unix_timestamp()),
(43, 2, 3, 7, '8', 'active', unix_timestamp()),

(44, 2, 4, 5, '13', 'active', unix_timestamp()),
(45, 2, 4, 6, '13', 'active', unix_timestamp()),
(46, 2, 4, 7, '13', 'active', unix_timestamp());


ALTER TABLE `config_details`
  ADD PRIMARY KEY (`config_id`);

ALTER TABLE `config_details`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT;

