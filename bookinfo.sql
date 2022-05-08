CREATE TABLE `bookinfo` (
  `bk_id` int(11) NOT NULL,
  `bk_date` date,
  `bk_slot` varchar(32) DEFAULT NULL,
  `bk_name` varchar(255) NOT NULL,
  `bk_email` varchar(255) NOT NULL,
  `bk_tel` varchar(60) NOT NULL,
  `bk_notes` text DEFAULT NULL
) ;

ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bk_id`),
  ADD KEY `bk_date` (`bk_date`),
  ADD KEY `bk_slot` (`bk_slot`),
  ADD KEY `bk_name` (`bk_name`),
  ADD KEY `bk_email` (`bk_email`),
  ADD KEY `bk_tel` (`bk_tel`);

ALTER TABLE `bookings`
  MODIFY `bk_id` int(11) NOT NULL AUTO_INCREMENT;
