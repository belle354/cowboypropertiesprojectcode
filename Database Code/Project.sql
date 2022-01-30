-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 27, 2021 at 03:21 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EMP_ID` int(11) NOT NULL,
  `Last` varchar(128) DEFAULT NULL,
  `First` varchar(128) DEFAULT NULL,
  `Position` varchar(16) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMP_ID`, `Last`, `First`, `Position`) VALUES
(1, 'Stone', 'Bob', 'Maintenance'),
(2, 'Walhberg', 'Mark', 'Front Desk'),
(3, 'Jobs', 'Steve', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `Lease`
--

CREATE TABLE `Lease` (
  `LEASE_ID` int(15) NOT NULL,
  `UNIT_ID` int(15) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `RENTER_ID` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Period` varchar(16) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Lease`
--

INSERT INTO `Lease` (`LEASE_ID`, `UNIT_ID`, `EMP_ID`, `RENTER_ID`, `Price`, `Period`) VALUES
(1, 100, 1, 100, '1000.00', '1 Year'),
(2, 101, 2, 101, '1000.00', '2 Years'),
(3, 102, 3, 104, '800.00', '6 months'),
(4, 200, 1, 106, '900.00', '3 Years'),
(5, 201, 2, 105, '800.00', '1 Year');

-- --------------------------------------------------------

--
-- Table structure for table `Maintenance`
--

CREATE TABLE `Maintenance` (
  `ID` int(15) NOT NULL,
  `UNIT_ID` int(15) NOT NULL,
  `EMP_ID` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Issue` varchar(128) DEFAULT NULL,
  `Status` varchar(16) DEFAULT 'New'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Maintenance`
--

INSERT INTO `Maintenance` (`ID`, `UNIT_ID`, `EMP_ID`, `Date`, `Issue`, `Status`) VALUES
(1, 100, 1, '2021-01-01', 'Leaking Toilet', 'Pending'),
(2, 200, 1, '2021-03-10', 'Light Bulb', 'New'),
(3, 100, 2, '2021-04-01', 'April Fools', 'New'),
(4, 1, 1, '2021-04-01', 'Test', 'Complete'),
(5, 1, 2, '2021-04-01', 'dasf', 'Complete'),
(6, 100, 2, '2021-04-22', 'April Fools', 'New'),
(7, 100, 3, '2021-04-01', 'April Fools', 'New'),
(8, 100, 3, '2021-04-17', 'tes1', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `PAYMENT_ID` int(15) NOT NULL,
  `LEASE_ID` int(15) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `RENTER_ID` int(11) NOT NULL,
  `Period_in_Months` varchar(16) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Overdue` varchar(12) NOT NULL,
  `Overdue_Amount` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`PAYMENT_ID`, `LEASE_ID`, `EMP_ID`, `RENTER_ID`, `Period_in_Months`, `Date`, `Amount`, `Overdue`, `Overdue_Amount`) VALUES
(1, 1, 2, 100, '1 MONTH', '2021-12-01', '1000.00', 'Yes', '500.00'),
(2, 2, 3, 101, '2 MONTHS', '2021-01-01', '2000.00', 'No', '0.00'),
(3, 3, 2, 104, '1 MONTH', '2021-01-01', '800.00', 'Yes', '200.00'),
(4, 4, 3, 106, '1 MONTH', '2021-01-01', '900.00', 'Yes', '250.00'),
(5, 5, 2, 105, '2 MONTHS', '2021-01-01', '1600.00', 'No', '0.00'),
(6, 123, 2, 100, '1', '2021-04-17', '700.00', 'Yes', '200.00'),
(7, 123, 2, 4000, '1', '2021-04-17', '700.00', 'Yes', '200.00'),
(8, 123, 2, 100, '1', '2021-04-17', '1000.00', 'Yes', '200.00'),
(9, 123, 2, 100, '1', '2021-04-17', '1000.00', 'Yes', '100.00'),
(10, 123, 2, 100, '1', '2021-04-17', '700.00', 'Yes', '400.00'),
(11, 2, 3, 100, '1', '2021-04-17', '700.00', 'Yes', '200.00'),
(12, 2, 3, 100, '1', '2021-04-17', '700.00', 'Yes', '200.00');

-- --------------------------------------------------------

--
-- Table structure for table `Property`
--

CREATE TABLE `Property` (
  `PROPERTY_ID` int(11) NOT NULL,
  `Address` varchar(128) DEFAULT NULL,
  `Manager` varchar(128) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Property`
--

INSERT INTO `Property` (`PROPERTY_ID`, `Address`, `Manager`) VALUES
(1234, '123 Sesame Street', 'Big Bird'),
(1000, '742 Evergreen Terrace', 'Bart Simpson'),
(2000, '21 Jump Street', 'Channing Tatum');

-- --------------------------------------------------------

--
-- Table structure for table `renter`
--

CREATE TABLE `renter` (
  `RENTER_ID` int(11) NOT NULL,
  `Last` varchar(128) DEFAULT NULL,
  `First` varchar(128) NOT NULL,
  `Phone` varchar(128) DEFAULT NULL,
  `Email` varchar(128) DEFAULT NULL,
  `perspective` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renter`
--

INSERT INTO `renter` (`RENTER_ID`, `Last`, `First`, `Phone`, `Email`, `perspective`) VALUES
(100, 'Simpson', 'Marge', '123-4567', 'Myemail@gmail.com', 0),
(101, 'Simpson', 'Homer', '976-9768', 'Youremail@gmail.com', 1),
(104, 'Monster', 'Cookie', '867-5309', 'Fake123@gmail.com', 0),
(105, 'Dracula', 'Count', '909-0980', '', 0),
(106, 'Jones', 'Pauline', '909-4321', 'Please@gmail.com', 1),
(1234, 'Doe', 'Jack', '905-1019', 'jane@gmail.com', 0),
(200, 'Doe', 'Jane', '905-1019', 'jane@gmail.com', 1),
(4000, 'Doe', 'Jack ', '909-1234', 'jack@gmail.com', 0),
(6758, 'Doe', 'Jonny', '654-7895', 'jonny@gmail.com', 1),
(9586, 'Doe', 'Jonny', '123-7798', 'j@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `username`, `role`) VALUES
(1, 'msimps', 'renter'),
(2, 'bstone', 'employee'),
(3, 'mwahlb', 'employee'),
(4, 'sjobs', 'employee'),
(5, 'hsimps', 'renter'),
(7, 'jhill', 'renter'),
(8, 'cmonst', 'renter'),
(9, 'cdracu', 'renter'),
(10, 'bsmith', 'employee'),
(11, 'pjones', 'renter');

-- --------------------------------------------------------

--
-- Table structure for table `Unit`
--

CREATE TABLE `Unit` (
  `UNIT_ID` int(15) NOT NULL,
  `UNIT_NUMBER` int(11) NOT NULL,
  `Bed` int(11) NOT NULL,
  `Bath` int(11) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `PROPERTY_ID` int(11) NOT NULL,
  `Available` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Unit`
--

INSERT INTO `Unit` (`UNIT_ID`, `UNIT_NUMBER`, `Bed`, `Bath`, `Price`, `PROPERTY_ID`, `Available`) VALUES
(100, 1, 3, 2, '1000.00', 1234, 0),
(101, 2, 3, 2, '1000.00', 1234, 0),
(102, 3, 2, 1, '800.00', 1234, 0),
(103, 4, 3, 2, '1000.00', 1234, 1),
(104, 5, 2, 1, '800.00', 1234, 1),
(200, 1, 3, 2, '900.00', 1000, 0),
(201, 2, 2, 2, '800.00', 1000, 0),
(300, 2, 2, 2, '800.00', 2000, 1),
(301, 2, 2, 2, '800.00', 2000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `forename` varchar(128) NOT NULL,
  `surname` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`forename`, `surname`, `username`, `password`) VALUES
('Bill', 'Smith', 'bsmith', '$2y$10$UD/6hteqwRiOWO6VaE/2Bu8EfXOxaZIAZWtwVskPjoNA9qqLGzTDC'),
('Pauline', 'Jones', 'pjones', '$2y$10$pbL521HaZCQXrDnYeMZ7ne69/JNtfwZZq4fZ3ApaM2lwVkq/iNdPq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMP_ID`);

--
-- Indexes for table `Lease`
--
ALTER TABLE `Lease`
  ADD PRIMARY KEY (`LEASE_ID`),
  ADD KEY `UNIT_ID` (`UNIT_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`),
  ADD KEY `RENTER_ID` (`RENTER_ID`);

--
-- Indexes for table `Maintenance`
--
ALTER TABLE `Maintenance`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UNIT_ID` (`UNIT_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`PAYMENT_ID`),
  ADD KEY `LEASE_ID` (`LEASE_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`),
  ADD KEY `RENTER_ID` (`RENTER_ID`);

--
-- Indexes for table `Property`
--
ALTER TABLE `Property`
  ADD PRIMARY KEY (`PROPERTY_ID`);

--
-- Indexes for table `renter`
--
ALTER TABLE `renter`
  ADD PRIMARY KEY (`RENTER_ID`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Unit`
--
ALTER TABLE `Unit`
  ADD PRIMARY KEY (`UNIT_ID`),
  ADD KEY `PROPERTY_ID` (`PROPERTY_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Lease`
--
ALTER TABLE `Lease`
  MODIFY `LEASE_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Maintenance`
--
ALTER TABLE `Maintenance`
  MODIFY `ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `PAYMENT_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `renter`
--
ALTER TABLE `renter`
  MODIFY `RENTER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9587;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `Unit`
--
ALTER TABLE `Unit`
  MODIFY `UNIT_ID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=302;
