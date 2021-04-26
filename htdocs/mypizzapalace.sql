-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 11:39 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mypizzapalace`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CID` int(9) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CID`, `First_name`, `Last_name`, `Phone`, `Address`) VALUES
(145412771, 'Philip', 'Borowoy', '6464646464', '64646464'),
(503483724, 'Phil', 'Prick', '1234', 'Sucks');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EID` int(9) NOT NULL,
  `First_name` varchar(255) NOT NULL,
  `Last_name` varchar(255) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Street` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Wage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EID`, `First_name`, `Last_name`, `Phone`, `Street`, `City`, `Country`, `Wage`) VALUES
(111111111, 'Jack', 'Daniels', '519-458-8973', '2216 23 st SW', 'Calgary', 'Canada', '0.00'),
(160683007, 'phil', 'sucks', '123', 'prick', 'prick', 'prick', '-2'),
(440645320, 'Jane', 'Doe', '111-222-3333', '1234 Fake St', 'Here', 'Not Here', '4.00'),
(531324778, 'Kevin', 'Vo', '231-343-2342', '234 Ya man dr', 'Calgary', 'Canada', '4.00'),
(550882530, 'Bob', 'Marley', '456-290-0069', '42 Mary Ln Apt O', 'TT', 'Jamaica', '4.20');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `VID` int(3) NOT NULL,
  `Inv_name` text NOT NULL,
  `Inv_Count` int(11) NOT NULL,
  `Inv_OnOrder` int(11) NOT NULL,
  `Inv_Cost100` int(3) NOT NULL,
  `Ordered_On` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`VID`, `Inv_name`, `Inv_Count`, `Inv_OnOrder`, `Inv_Cost100`, `Ordered_On`) VALUES
(1, 'Pizza Box', 154, 0, 5, '-'),
(2, 'Wing Box', 134, 0, 4, '-'),
(3, 'Salad Box', 84, 0, 3, '-'),
(4, 'Dough', 524, 0, 20, '-'),
(5, 'Cheese', 500, 0, 25, '-'),
(6, 'Pepperoni', 53, 0, 15, '-'),
(7, 'Wings', 312, 0, 5, '-');

-- --------------------------------------------------------

--
-- Table structure for table `menuitem`
--

CREATE TABLE `menuitem` (
  `IID` int(11) NOT NULL,
  `Item_name` varchar(20) NOT NULL,
  `Price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuitem`
--

INSERT INTO `menuitem` (`IID`, `Item_name`, `Price`) VALUES
(1, 'Hawaii', 7),
(2, 'Peppy', 5),
(3, 'Cheesy', 3),
(4, 'Mild Wings', 5),
(5, 'Medium Wings', 5),
(6, 'Hot Wings', 5),
(7, 'Greek', 20),
(8, 'Caesar', 20),
(9, 'Garden', 20),
(10, 'Coke', 2),
(11, 'Sprite', 2),
(12, 'Fanta', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OID` int(11) NOT NULL,
  `Date` varchar(255) NOT NULL,
  `Total` int(11) NOT NULL,
  `Time` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `CID` int(9) NOT NULL,
  `Order_Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `OID` int(11) NOT NULL,
  `ItemIndex` int(3) NOT NULL,
  `IID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `revenue`
--

CREATE TABLE `revenue` (
  `Week` varchar(20) NOT NULL,
  `Cost_Emp` int(10) NOT NULL,
  `Cost_Inv` int(10) NOT NULL,
  `Sales` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revenue`
--

INSERT INTO `revenue` (`Week`, `Cost_Emp`, `Cost_Inv`, `Sales`) VALUES
('2017-W50', 323, 1360, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE `shift` (
  `Week` varchar(12) NOT NULL,
  `EID` int(9) NOT NULL,
  `Day` varchar(10) NOT NULL,
  `Shift_Type` varchar(255) NOT NULL,
  `Position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(255) NOT NULL,
  `ID` int(9) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `User_Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `ID`, `Password`, `User_Type`) VALUES
('bmarley', 550882530, 'pass', 'Driver'),
('jdaniels', 111111111, 'pass', 'Manager'),
('jdoe', 440645320, 'pass', 'Cook'),
('jerk', 503483724, 'pass', 'Customer'),
('kvo', 531324778, 'pass', 'Cook'),
('loser', 160683007, 'pass', 'Driver'),
('pborowoy', 145412771, 'pass', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`VID`);

--
-- Indexes for table `menuitem`
--
ALTER TABLE `menuitem`
  ADD PRIMARY KEY (`IID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OID`),
  ADD KEY `CID` (`CID`),
  ADD KEY `Date` (`Date`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`OID`,`ItemIndex`);

--
-- Indexes for table `revenue`
--
ALTER TABLE `revenue`
  ADD PRIMARY KEY (`Week`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
  ADD PRIMARY KEY (`Week`,`EID`,`Day`,`Shift_Type`,`Position`),
  ADD KEY `Date` (`Week`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`),
  ADD UNIQUE KEY `EID_or_CID` (`ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`EID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `customer` (`CID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
