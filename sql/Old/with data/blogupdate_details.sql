
CREATE TABLE `blogupdate_details` (
  `blogupdate_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `field_one` varchar(100) NOT NULL,
  `field_two` varchar(100) NOT NULL,
  `field_three` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `blogupdate_details`(`blogupdate_id`,`user_id`,`field_one`,`field_two`,`field_three`,`status`,`date`) VALUES
(1,1,'','','','inactive',unix_timestamp()),
(2,2,'','','','inactive',unix_timestamp()),
(3,3,'','','','inactive',unix_timestamp()),
(4,4,'','','','inactive',unix_timestamp()),
(5,5,'','','','inactive',unix_timestamp()),
(6,6,'','','','inactive',unix_timestamp()),
(7,7,'','','','inactive',unix_timestamp()),
(8,8,'','','','inactive',unix_timestamp()),
(9,9,'','','','inactive',unix_timestamp()),
(10,10,'','','','inactive',unix_timestamp()),
(11,11,'','','','inactive',unix_timestamp()),
(12,12,'','','','inactive',unix_timestamp()),
(13,13,'','','','inactive',unix_timestamp()),
(14,14,'','','','inactive',unix_timestamp()),
(15,15,'','','','inactive',unix_timestamp()),
(16,16,'','','','inactive',unix_timestamp()),
(17,17,'','','','inactive',unix_timestamp()),
(18,18,'','','','inactive',unix_timestamp()),
(19,19,'','','','inactive',unix_timestamp()),
(20,20,'','','','inactive',unix_timestamp()),
(21,21,'','','','inactive',unix_timestamp()),
(22,22,'','','','inactive',unix_timestamp()),
(23,23,'','','','inactive',unix_timestamp()),
(24,24,'','','','inactive',unix_timestamp()),
(25,25,'','','','inactive',unix_timestamp()),
(26,26,'','','','inactive',unix_timestamp()),
(27,27,'','','','inactive',unix_timestamp()),
(28,28,'','','','inactive',unix_timestamp()),
(29,29,'','','','inactive',unix_timestamp()),
(30,30,'','','','inactive',unix_timestamp()),
(31,31,'','','','inactive',unix_timestamp()),
(32,32,'','','','inactive',unix_timestamp()),
(33,33,'','','','inactive',unix_timestamp()),
(34,34,'','','','inactive',unix_timestamp()),
(35,35,'','','','inactive',unix_timestamp()),
(36,36,'','','','inactive',unix_timestamp()),
(37,37,'','','','inactive',unix_timestamp()),
(38,38,'','','','inactive',unix_timestamp()),
(39,39,'','','','inactive',unix_timestamp()),
(40,40,'','','','inactive',unix_timestamp()),
(41,41,'','','','inactive',unix_timestamp()),
(42,42,'','','','inactive',unix_timestamp()),
(43,43,'','','','inactive',unix_timestamp()),
(44,44,'','','','inactive',unix_timestamp()),
(45,45,'','','','inactive',unix_timestamp()),
(46,46,'','','','inactive',unix_timestamp()),
(47,47,'','','','inactive',unix_timestamp()),
(48,48,'','','','inactive',unix_timestamp()),
(49,49,'','','','inactive',unix_timestamp()),
(50,50,'','','','inactive',unix_timestamp()),
(51,51,'','','','inactive',unix_timestamp());

ALTER TABLE `blogupdate_details`
  ADD PRIMARY KEY (`blogupdate_id`);

ALTER TABLE `blogupdate_details`
  MODIFY `blogupdate_id` int(100) NOT NULL AUTO_INCREMENT;


