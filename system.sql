-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2023 at 10:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system`
--

-- --------------------------------------------------------

--
-- Table structure for table `melas`
--

CREATE TABLE `melas` (
  `Meal_Id` int(11) NOT NULL,
  `Meal_Name` varchar(50) NOT NULL,
  `Meal_Price` int(11) NOT NULL,
  `Meal_Restaurant` varchar(50) NOT NULL,
  `Meal_Image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `melas`
--

INSERT INTO `melas` (`Meal_Id`, `Meal_Name`, `Meal_Price`, `Meal_Restaurant`, `Meal_Image`) VALUES
(9, 'Burger', 80, 'MAC', '../image/04-30-05Capture2.PNG'),
(13, 'MM', 125, 'KFC', '../image/01-14-28Cup-Of-Creamy-Coffee-500x375.png'),
(14, 'Omar', 4564, 'l;vmel', '../image/01-17-2403-32-506589.png_1200.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_Id` int(11) NOT NULL,
  `User_Id` bigint(11) NOT NULL,
  `Meal_Id` int(11) NOT NULL,
  `Order_Date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_Id`, `User_Id`, `Meal_Id`, `Order_Date`) VALUES
(55, 1, 9, '2023-04-30 10:10:24'),
(81, 2, 9, '2023-05-03 01:07:44'),
(82, 2, 13, '2023-05-03 01:14:08'),
(83, 2, 9, '2023-05-03 20:23:47'),
(84, 2, 9, '2023-05-04 10:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `Roles_Id` int(11) NOT NULL,
  `Roles_Name` varchar(10) NOT NULL DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Roles_Id`, `Roles_Name`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_Id` bigint(20) NOT NULL,
  `User_Name` varchar(50) NOT NULL,
  `Role_Id` int(11) NOT NULL,
  `User_Password` varchar(50) NOT NULL,
  `User_Email` varchar(50) NOT NULL,
  `User_Phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `User_Name`, `Role_Id`, `User_Password`, `User_Email`, `User_Phone`) VALUES
(1, 'Omar Ahmed', 1, '123456', 'Omar@gmail.com', '01151784181'),
(2, 'Open', 2, '012345', 'Open@gmail.com', '01154623458');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `melas`
--
ALTER TABLE `melas`
  ADD PRIMARY KEY (`Meal_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_Id`),
  ADD KEY `c3` (`User_Id`),
  ADD KEY `c4` (`Meal_Id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Roles_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_Id`),
  ADD KEY `c1` (`Role_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `melas`
--
ALTER TABLE `melas`
  MODIFY `Meal_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `Roles_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_Id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `c3` FOREIGN KEY (`User_Id`) REFERENCES `users` (`User_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c4` FOREIGN KEY (`Meal_Id`) REFERENCES `melas` (`Meal_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `c1` FOREIGN KEY (`Role_Id`) REFERENCES `roles` (`Roles_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
