
CREATE TABLE `needhelp_details` (
	`needhelp_id` int(100) NOT NULL,
	`user_id` varchar(100) NOT NULL,
	`order_id` varchar(100) NOT NULL,
	`order_type` varchar(100) NOT NULL,
	`help_message` varchar(1000) NOT NULL,
	`status` varchar(100) NOT NULL,	
	`date` varchar(100) NOT NULL
);

ALTER TABLE `needhelp_details`
  ADD PRIMARY KEY (`needhelp_id`);

ALTER TABLE `needhelp_details`
  MODIFY `needhelp_id` int(100) NOT NULL AUTO_INCREMENT;