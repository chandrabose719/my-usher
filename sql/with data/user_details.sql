
CREATE TABLE `user_details` (
  `user_id` int(100) NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_mobile` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `billing_address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `billing_address1` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `billing_city` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `billing_state` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `billing_country` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `billing_zipcode` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_address1` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `pin_code` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `google_auth_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_auth_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user_details` (`user_id`, `user_name`, `user_email`, `user_password`, `user_mobile`, `billing_address`, `billing_address1`, `billing_city`, `billing_state`, `billing_country`, `billing_zipcode`, `shipping_address`, `shipping_address1`, `city`, `state`, `country`, `pin_code`, `google_auth_id`, `facebook_auth_id`, `status`, `date`) VALUES
(1, 'User', 'info@3dusher.com', 'ushers', '9988776655', 'Thirupparangundram', 'Madurai', 'Madurai', 'Tamilnadu', 'IN', '624306', 'Thirupparangundram', 'Dindigul', 'Madurai East', 'Tamilnadu', 'IN', '624306', '', '', 'active', '1548056454'),
(2, 'Chandra Bose', 'chandrabose719@gmail.com', '3dushers', '7708573343', 'NGO', 'Dindigul', 'Dindigul', 'Tamilnadu', 'IN', '624306', 'NGO', 'Dindigul', 'Dindigul', 'Tamilnadu', 'AF', '624306', '', '', 'active', '1548056454'),
(3, 'Dhiraj', 'dhiraj@3dusher.com', '123456', '8792308200', '#79,', 'test', 'JP', 'Karnataka', 'IN', '560078', '#79,', '', 'JP', 'Karnataka', 'IN', '560078', '', '', 'active', '1548056454'),
(4, 'Meghan Casey', 'caseymt@lemoyne.edu', 'rosie123', '3156574368', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(5, 'Thea Vinereanu', 'thea@3dusher.com', 'Rouge1951', '6464981909', '357 WEST AVE', '', 'BUFFALO', 'New York', 'US', '14201', '357 WEST AVE', '', 'BUFFALO', 'New York', 'US', '14201', '', '', 'active', '1548056454'),
(6, 'Gopal Krishna', 'gopal@3dusher.com', 'kaalakutta', '8904068880', 'test', 'test', 'test', 'test', 'IN', '500072', 'test', 'test', 'test', 'test', 'IN', '500072', '', '', 'active', '1548056454'),
(7, 'Arshad', 'babaconstructionshyd@gmail.com', '*Faizan123', '9535675956', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(8, 'Arpit', 'shandilya.arpit09@gmail.com', 'arpitaaditi', '7349669376', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(9, 'shreyas', 'shreyas.kudva6@gmail.com', 'tintin#29', '8904068880', '102, Mitchell Hall, Salt Springs Road', '', 'Syracuse', 'New York', 'US', '13214', '102, Mitchell Hall, Salt Springs Road', '', 'Syracuse', 'New York', 'US', '13214', '', '', 'active', '1548056454'),
(10, 'Gaurav Kumar', 'gauravkumar_1992@rediffmail.com', 'narangwal', '9535675922', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(11, 'Faizan Mehdi', 'faizanmehdi.syed@gmail.com', '*Faizan123', '9535675956', 'test', 'test', 'New York', 'Newyorl', 'US', '13214', 'test', 'test', 'New York', 'Newyorl', 'US', '13214', '', '', 'active', '1548056454'),
(12, 'Yashwant ', 'yashwant.1996@gmail.com', '*Yashwant123', '9535675956', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(13, 'Tushaar Bajaj', 'tushaarbajaj@gmail.com', '7590Tush', '9989355377', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(14, 'Gaurav Kumar', 'gauravk25feb@gmail.com', 'Aryabhatta0!', '9535675922', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(15, 'Vandana Ravindra', 'vandanaravindra658@gmail.com', 'anuprarthana', '9102754806', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(16, 'Siddarth', 'siddarth.amaravathi@gmail.com', 'MakeinIndia11!', '9916678755', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(17, 'Faizan Mehdi', 'snf_mehdi@yahoo.co.in', '*Faizan123', '9999999999', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(18, 'GOPAL KRISHNA', 'gkrishna.mit@gmail.com', 'jaisainath1#', '6462699625', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(19, 'Ravi Dubey', 'raviranjandu25@gmail.com', 'raviranjan', '7993471363', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(20, 'pavan davera', 'pavandavera@gmail.com', 'Inspiration', '8897640869', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(21, 'MD EHTESHAM', 'ehtesham1195@gmail.com', 'usher123', '9804458194', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(22, 'Shreyas', 'shreyas@global3dlabs.com', 'tintin#29', '8970000112', 'PLOT NO 23,24 , 2ND FLOOR,', 'PLOT NO 23,24 , 2ND FLOOR,', 'HYDERABAD', 'TELANGANA', 'IN', '500072', '23', '', 'Hyderabad', 'Telangana', 'IN', '500072', '', '', 'active', '1548056454'),
(23, 'Robert Brown', 'robcbrown.jr@gmail.com', 'piano1972', '3152471137', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(24, 'Daya', 'drdaya99@gmail.com', 'Daya@123', '8082188589', '273 Watertree Dr', '', 'East Syracuse', 'NY', 'US', '13057', '273 Watertree Dr', '', 'East Syracuse', 'NY', 'US', '13057', '', '', 'active', '1548056454'),
(25, 'anirudha', 'anirudhasingh71@yahoo.com', 'fuckit2', '7694049793', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(26, 'Matthew Fiedler', 'matthewfiedler@gmail.com', 'ZDN607Sbrk2F', '8323055293', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(27, 'DARVIN DALSANIA', 'darvin.dalsania@gmail.com', '3dusher', '9408965895', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(28, 'aviral kedia', 'avikedia16@gmail.com', 'neverforthissit', '9535270772', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(29, 'Rupesh kumar', 'rupeshkumar1005@gmail.com', 'witcher3', '7388712835', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(30, 'Gaurav Verma', 'gaurav37kikan@gmail.com', 'Gaurav@3799', '9873540435', '6227', '', 'Hydrabad', 'Gggft', 'US', '110041', '6227', '', 'Hydrabad', 'Gggft', 'US', '110041', '', '', 'active', '1548056454'),
(31, 'Aditya', 'adityawadhwani@gmail.com', '3dshit', '9599482639', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(32, 'Salar Jung', 'salarjung.s@gmail.com', 'pawapawa', '9849785006', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(33, 'kranthi', 'kranthikumar384@gmail.com', 'LOgin153@', '7095262274', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(34, 'Rakesh Bhatna', 'r.bhatnagar1949@gmail.com', 'Rakesh49#', '6291441690', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(35, 'Abhishek Gandhi', 'abhishekgandhi089@gmail.com', 'Abhishek@1212', '9426880765', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(36, 'Sagar Singh', 'sagarsingh0712@gmail.com', 'Sagar@111', '7982833320', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(37, 'Prmod Cohan ', 'parmodchouhan734@gmail.com', '7692850185', '6267364896', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(38, 'Rajesh', 'rajeshdv609@gmail.com', 'abiyouth', '9567916573', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(39, 'Chaitanya', 'sriram.gaddipati@gmail.com', 'hello@123', '9133751279', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(40, 'Angu Rajendran ', 'poppysri02@gmail.com', 'angupoppy02', '9842211144', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548056454'),
(41, 'Mayank Pant', 'mayank31793@gmail.com', '3dusher', '0987123345', 'abcd', '', 'bangalore', 'karnataka', 'IN', '212121', 'abcd', '', 'bangalore', 'karnataka', 'IN', '212121', '', '', 'active', '1548131135'),
(42, 'arjun', 'arjunm27395@gmail.com', 'Ipadpro123@', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548131509'),
(43, 'Abhijit', 'abhijit@graspio.com', 'victor34', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548235125'),
(44, 'Mike Howell', 'hakomike@gmail.com', '3dGouda68u', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548431482'),
(45, 'Surendra Reddy', 'surendrai@onchiptech.com', 'noPass@123', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548660703'),
(46, 'Arvind Kumar', 'arvind6020@hotmail.com', 'Mmgx201*', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1548949276'),
(47, 'Shivansh', 'shivansh.chawla.99@gmail.com', 'getz8893', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1549295257'),
(48, 'Nathan Long', 'njlong@syr.edu', 'Grizzlyn8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1549304467'),
(49, 'Eashan', 'printdimension3d@gmail.com', '3dprinted', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1549709245'),
(50, 'Mukesh Gupta', 'mg@cleantech.in', 'sba123', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'active', '1549961100');

ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `user_details`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT;

