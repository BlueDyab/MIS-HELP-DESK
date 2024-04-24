-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 09:18 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mis_help_desk`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment_request_prof`
--

CREATE TABLE `equipment_request_prof` (
  `ID` int(255) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Request Item` varchar(255) NOT NULL,
  `Dept` varchar(50) NOT NULL,
  `Purpose` varchar(255) NOT NULL,
  `Date&Time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment_request_prof`
--

INSERT INTO `equipment_request_prof` (`ID`, `Name`, `Request Item`, `Dept`, `Purpose`, `Date&Time`) VALUES
(1, 'ruen', 'paper', 'CSD', 'for lesson', '2024-03-23 13:59:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_request_stud`
--

CREATE TABLE `equipment_request_stud` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Student_Number` varchar(11) NOT NULL,
  `Requested_Item` varchar(255) NOT NULL,
  `Purpose` varchar(255) NOT NULL,
  `Date&Time` datetime(6) NOT NULL,
  `Dept` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment_request_stud`
--

INSERT INTO `equipment_request_stud` (`ID`, `Name`, `Student_Number`, `Requested_Item`, `Purpose`, `Date&Time`, `Dept`) VALUES
(1, 'ruen', '20210098-S', 'extension', 'secret', '2024-03-23 15:19:00.000000', 'CSD');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_form_db`
--

CREATE TABLE `feedback_form_db` (
  `ID` int(255) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Dept` varchar(100) NOT NULL,
  `Feedback` varchar(255) NOT NULL,
  `Action_Taken` varchar(255) NOT NULL,
  `Recomm` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback_form_db`
--

INSERT INTO `feedback_form_db` (`ID`, `Name`, `Dept`, `Feedback`, `Action_Taken`, `Recomm`, `Date`, `Time`) VALUES
(1, 'ruen', 'CSD', 'nc', 'kill', 'be faster', '2024-03-23', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `message_us_db`
--

CREATE TABLE `message_us_db` (
  `ID` int(255) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message_us_db`
--

INSERT INTO `message_us_db` (`ID`, `Name`, `Email`, `Message`) VALUES
(1, 'ruen', 'malvarruenm213@gmail.com', 'hahhahahahahahha');

-- --------------------------------------------------------

--
-- Table structure for table `service_request_db`
--

CREATE TABLE `service_request_db` (
  `Id` int(255) NOT NULL,
  `Staff_Name` varchar(50) NOT NULL,
  `Dept` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Details` varchar(255) NOT NULL,
  `Action_Taken` varchar(255) NOT NULL,
  `Recommendation` varchar(255) NOT NULL,
  `Time` time NOT NULL,
  `Due_Time` time NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_request_db`
--

INSERT INTO `service_request_db` (`Id`, `Staff_Name`, `Dept`, `Date`, `Details`, `Action_Taken`, `Recommendation`, `Time`, `Due_Time`, `Status`) VALUES
(1, 'ruen malvar', 'registrar', '2024-04-21', 'dasdasda', 'urgent', 'dasdasd', '20:18:00', '13:24:00', ''),
(2, 'ruen malvar', 'registrar', '2024-04-21', 'sdasdas', 'urgent', 'asdasd', '20:49:00', '14:56:00', ''),
(3, 'ruen malvar', 'registrar', '2024-04-21', 'sdasdas', 'urgent', 'asdasd', '20:49:00', '14:56:00', ''),
(4, 'ruen malvar', 'registrar', '2024-04-21', 'sdasdas', 'urgent', 'asdasd', '20:49:00', '14:56:00', ''),
(5, 'aylah', 'registrar', '2024-05-01', 'sdasdsad', 'urgent', 'sdasda', '13:58:00', '14:58:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_account_db`
--

CREATE TABLE `user_account_db` (
  `ID` int(255) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Course` text NOT NULL,
  `Year` smallint(1) NOT NULL,
  `Section` varchar(1) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Position` varchar(50) NOT NULL,
  `Avatar` blob NOT NULL,
  `Editing` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account_db`
--

INSERT INTO `user_account_db` (`ID`, `Name`, `Course`, `Year`, `Section`, `Username`, `Password`, `Position`, `Avatar`, `Editing`) VALUES
(2, 'gggggggggggggggggggggggggg', 'BSEMC', 1, 'B', 'xvsdv', 'vsdvs', 'senior', '', 0),
(5, 'jv,advvkb', 'BSEMC', 1, 'B', 'xvsdv', 'vsdvs', 'senior', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment_request_prof`
--
ALTER TABLE `equipment_request_prof`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `equipment_request_stud`
--
ALTER TABLE `equipment_request_stud`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `feedback_form_db`
--
ALTER TABLE `feedback_form_db`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `message_us_db`
--
ALTER TABLE `message_us_db`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `service_request_db`
--
ALTER TABLE `service_request_db`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user_account_db`
--
ALTER TABLE `user_account_db`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment_request_prof`
--
ALTER TABLE `equipment_request_prof`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `equipment_request_stud`
--
ALTER TABLE `equipment_request_stud`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback_form_db`
--
ALTER TABLE `feedback_form_db`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_us_db`
--
ALTER TABLE `message_us_db`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `service_request_db`
--
ALTER TABLE `service_request_db`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_account_db`
--
ALTER TABLE `user_account_db`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
