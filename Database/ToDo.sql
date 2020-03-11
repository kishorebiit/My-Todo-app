-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2020 at 06:24 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.0.33-13+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ToDo`
--

-- --------------------------------------------------------

--
-- Table structure for table `employeeDetails`
--

CREATE TABLE `employeeDetails` (
  `empId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `designation` varchar(150) NOT NULL,
  `experience` int(11) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeeDetails`
--

INSERT INTO `employeeDetails` (`empId`, `name`, `age`, `dob`, `mobileNo`, `designation`, `experience`, `createdOn`) VALUES
(1, 'Ajay', 3, '2020-03-12', '8940075896', 'Software developer', 2, '2020-03-10 15:43:15'),
(2, 'Kishore', 23, '1994-03-12', '8940075896', 'Developer', 1, '2020-03-11 09:34:51'),
(3, 'Henry George', 23, '2020-03-12', '8940074455', 'Tester', 1, '2020-03-11 12:05:11'),
(4, 'Rajesh', 34, '1995-03-16', '8940345673', 'Developer', 3, '2020-03-11 12:06:07');

-- --------------------------------------------------------

--
-- Table structure for table `employeeSalaryDetails`
--

CREATE TABLE `employeeSalaryDetails` (
  `empsalId` int(11) NOT NULL,
  `empId` varchar(50) NOT NULL COMMENT 'CONSTRAINT REFERENCES employeeDetails(empId)',
  `year` int(5) NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employeeSalaryDetails`
--

INSERT INTO `employeeSalaryDetails` (`empsalId`, `empId`, `year`, `salary`, `createdOn`) VALUES
(1, '1', 2020, '45.00', '2020-03-11 10:39:20'),
(2, '1', 2022, '45.00', '2020-03-11 10:39:39'),
(3, '1', 2021, '45.00', '2020-03-11 10:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `duedate` date DEFAULT NULL,
  `createdOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `name`, `description`, `duedate`, `createdOn`) VALUES
(11, 'Infant Kishore', 'Edit record', '2020-02-23', '2020-03-11 11:59:19'),
(12, 'Dakshith', 'My Task Today crud applciation', '2020-02-23', '2020-03-11 12:03:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeeDetails`
--
ALTER TABLE `employeeDetails`
  ADD PRIMARY KEY (`empId`);

--
-- Indexes for table `employeeSalaryDetails`
--
ALTER TABLE `employeeSalaryDetails`
  ADD PRIMARY KEY (`empsalId`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeeDetails`
--
ALTER TABLE `employeeDetails`
  MODIFY `empId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `employeeSalaryDetails`
--
ALTER TABLE `employeeSalaryDetails`
  MODIFY `empsalId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
