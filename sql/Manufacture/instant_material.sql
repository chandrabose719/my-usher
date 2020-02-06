
CREATE TABLE `instant_material` (
  `material_id` int(100) NOT NULL,
  `material_name` varchar(100) NOT NULL,
  `technology_id` varchar(100) NOT NULL,
  `density` varchar(100) NOT NULL,
  `material_cost` varchar(100) NOT NULL,
  `unit_cost` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
);

INSERT INTO `instant_material` (`material_id`, `material_name`, `technology_id`, `density`, `material_cost`, `unit_cost`, `status`, `date`) VALUES
(1, 'ABS', '1', '0.00104', '0.31', '1', 'active', unix_timestamp()),
(2, 'PETG', '1', '0.00127', '0.44', '1', 'active', unix_timestamp()),
(3, 'PLA', '1', '0.00125', '0.25', '1', 'active', unix_timestamp()),
(4, 'PC', '1', '0.00120', '0.69', '1', 'active', unix_timestamp()),
(5, 'Nylon', '1', '0.00115', '0.97', '1', 'active', unix_timestamp()),
(6, 'TPU', '1', '0.00120', '0.42', '1', 'active', unix_timestamp()),

(7, 'Durable (PP-like) Resin', '2', '0.00119', '1.25', '1', 'active', unix_timestamp()),
(8, 'Castable (PC-like) Resin', '2', '0.00121', '1.53', '1', 'active', unix_timestamp()),
(9, 'Tough (ABS-like) Resin', '2', '0.00116', '1.53', '1', 'active', unix_timestamp()),
(10, 'Clear Resin', '2', '0.00118', '1.11', '1', 'active', unix_timestamp()),

(11, 'Nylon (PA 11)', '3', '0.00104', '0.83', '1000', 'active', unix_timestamp()),
(12, 'Nylon (PA 12)', '3', '0.00101', '0.63', '1000', 'active', unix_timestamp()),
(13, 'Glass-filled Nylon', '3', '0.00122', '1.53', '1000', 'active', unix_timestamp()),

(14, 'Nylon (PA 12)', '4', '0.00101', '0.63', '1000', 'active', unix_timestamp()),

(15, 'Agilus30', '5', '0.00115', '5.56', '1000', 'active', unix_timestamp()),
(16, 'Tango', '5', '0.00114', '5.56', '1000', 'active', unix_timestamp()),
(17, 'Vero', '5', '0.00118', '5.56', '1000', 'active', unix_timestamp()),

(18, 'Glass-filled Nylon', '6', '0.00114', '20.83', '16387.064', 'inactive', unix_timestamp()),
(19, 'Sandstone', '6', '0.00114', '14.17', '16387.064', 'active', unix_timestamp()),

(20, 'Stainless', '12', '', '', '', 'inactive', unix_timestamp()),
(21, 'Aluminium AlSi10Mg', '12', '', '', '', 'active', unix_timestamp()),
(22, 'Stainless Steel 316L', '12', '', '', '', 'active', unix_timestamp()),
(23, 'INCONEL 625', '12', '', '', '', 'active', unix_timestamp()),
(24, 'Titanium Ti64', '12', '', '', '', 'active', unix_timestamp()),

(25, 'Clear Resin', '7', '0.00114', '3.47', '1000', 'active', unix_timestamp()),
(26, 'White Resin', '7', '0.00114', '3.47', '1000', 'active', unix_timestamp()),

(27, 'ABS', '9', '', '', '', 'active', unix_timestamp()),
(28, 'Polypropylene', '9', '', '', '', 'active', unix_timestamp()),
(29, 'Polycarbonate', '9', '', '', '', 'active', unix_timestamp()),
(30, 'TPU', '9', '', '', '', 'active', unix_timestamp()),

(31, 'ABS', '10', '', '', '', 'active', unix_timestamp()),
(32, 'Nylon', '10', '', '', '', 'active', unix_timestamp()),
(33, 'Polyurethane', '10', '', '', '', 'active', unix_timestamp()),
(34, 'Polypropylene', '10', '', '', '', 'active', unix_timestamp()),
(35, 'Polycarbonate', '10', '', '', '', 'active', unix_timestamp()),
(36, 'PEEK', '10', '', '', '', 'active', unix_timestamp()),
(37, 'HDPE', '10', '', '', '', 'active', unix_timestamp());


ALTER TABLE `instant_material`
  ADD PRIMARY KEY (`material_id`);

ALTER TABLE `instant_material`
  MODIFY `material_id` int(100) NOT NULL AUTO_INCREMENT;
