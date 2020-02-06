
CREATE TABLE `promotion_details` (
  `promation_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `field_one` varchar(100) NOT NULL,
  `field_two` varchar(100) NOT NULL,
  `field_three` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `promotion_details` (`promation_id`, `user_id`, `field_one`, `field_two`, `field_three`, `status`, `date`) VALUES
(1,1,'','','','active',unix_timestamp()),
(2,2,'','','','active',unix_timestamp()),
(3,3,'','','','active',unix_timestamp()),
(4,4,'','','','active',unix_timestamp()),
(5,5,'','','','active',unix_timestamp()),
(6,6,'','','','active',unix_timestamp()),
(7,7,'','','','active',unix_timestamp()),
(8,8,'','','','active',unix_timestamp()),
(9,9,'','','','active',unix_timestamp()),
(10,10,'','','','active',unix_timestamp()),
(11,11,'','','','active',unix_timestamp()),
(12,12,'','','','active',unix_timestamp()),
(13,13,'','','','active',unix_timestamp()),
(14,14,'','','','active',unix_timestamp()),
(15,15,'','','','active',unix_timestamp()),
(16,16,'','','','active',unix_timestamp()),
(17,17,'','','','active',unix_timestamp()),
(18,18,'','','','active',unix_timestamp()),
(19,19,'','','','active',unix_timestamp()),
(20,20,'','','','active',unix_timestamp()),
(21,21,'','','','active',unix_timestamp()),
(22,22,'','','','active',unix_timestamp()),
(23,23,'','','','active',unix_timestamp()),
(24,24,'','','','active',unix_timestamp()),
(25,25,'','','','active',unix_timestamp()),
(26,26,'','','','active',unix_timestamp()),
(27,27,'','','','active',unix_timestamp()),
(28,28,'','','','active',unix_timestamp()),
(29,29,'','','','active',unix_timestamp()),
(30,30,'','','','active',unix_timestamp()),
(31,31,'','','','active',unix_timestamp()),
(32,32,'','','','active',unix_timestamp()),
(33,33,'','','','active',unix_timestamp()),
(34,34,'','','','active',unix_timestamp()),
(35,35,'','','','active',unix_timestamp()),
(36,36,'','','','active',unix_timestamp()),
(37,37,'','','','active',unix_timestamp()),
(38,38,'','','','active',unix_timestamp()),
(39,39,'','','','active',unix_timestamp()),
(40,40,'','','','active',unix_timestamp()),
(41,41,'','','','active',unix_timestamp()),
(42,42,'','','','active',unix_timestamp()),
(43,43,'','','','active',unix_timestamp()),
(44,44,'','','','active',unix_timestamp()),
(45,45,'','','','active',unix_timestamp()),
(46,46,'','','','active',unix_timestamp()),
(47,47,'','','','active',unix_timestamp()),
(48,48,'','','','active',unix_timestamp()),
(49,49,'','','','active',unix_timestamp()),
(50,50,'','','','active',unix_timestamp()),
(51,51,'','','','active',unix_timestamp());

ALTER TABLE `promotion_details`
  ADD PRIMARY KEY (`promation_id`);

ALTER TABLE `promotion_details`
  MODIFY `promation_id` int(100) NOT NULL AUTO_INCREMENT;


