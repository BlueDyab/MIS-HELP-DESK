-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2024 at 05:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `Id` int(255) NOT NULL,
  `Professor_Name` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Due_Time` time NOT NULL,
  `Requested_Item` varchar(255) NOT NULL,
  `Purpose` varchar(255) NOT NULL,
  `Remark` varchar(20) NOT NULL,
  `Action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment_request_prof`
--

INSERT INTO `equipment_request_prof` (`Id`, `Professor_Name`, `Department`, `Date`, `Time`, `Due_Time`, `Requested_Item`, `Purpose`, `Remark`, `Action`) VALUES
(2, 'dasdasdas', 'BSIS', '2024-05-02', '07:42:00', '07:41:00', 'dasdasd', 'asdad', '', ''),
(3, 'dsadasdas', 'BSEMC', '2024-05-02', '07:43:00', '07:43:00', 'dasdasd', 'asdasd', '', ''),
(4, 'dasdasda', 'MATH', '2024-05-16', '07:50:00', '07:50:00', 'dasdasd', 'asdasd', '', ''),
(5, 'dasda', 'BSCS', '2024-05-02', '07:51:00', '09:49:00', 'dasdas', 'dasdas', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_request_stud`
--

CREATE TABLE `equipment_request_stud` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Student_No` varchar(11) NOT NULL,
  `Course` varchar(5) NOT NULL,
  `Year` varchar(10) NOT NULL,
  `Section` varchar(1) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `Request Item` varchar(255) NOT NULL,
  `Purpose` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Due_Time` time NOT NULL,
  `Status` varchar(11) NOT NULL,
  `Action` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment_request_stud`
--

INSERT INTO `equipment_request_stud` (`ID`, `Name`, `Student_No`, `Course`, `Year`, `Section`, `Department`, `Request Item`, `Purpose`, `Date`, `Time`, `Due_Time`, `Status`, `Action`) VALUES
(1, 'Ruen Malvar', '20210098-S', 'BSIS', '3rd', 'A', 'BSIS', 'projector', 'lecture\r\n', '2024-05-02', '10:18:00', '15:00:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_form_db`
--

CREATE TABLE `feedback_form_db` (
  `ID` int(255) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Dept` varchar(255) NOT NULL,
  `Feedback` varchar(255) NOT NULL,
  `Recomm` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback_form_db`
--

INSERT INTO `feedback_form_db` (`ID`, `Name`, `Dept`, `Feedback`, `Recomm`, `Date`, `Time`) VALUES
(1, 'ruen', 'CSD', 'nc', 'be faster', '2024-03-23', '00:00:00'),
(2, 'Ruen Malvar', 'BSIS', 'dasdasd', 'adasdas', '2024-05-02', '11:10:00'),
(3, 'dasda', 'BSIS', 'asdasd', 'asdasd', '2024-05-02', '11:13:00');

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
-- Table structure for table `prof_room_request_form_db`
--

CREATE TABLE `prof_room_request_form_db` (
  `Id` int(255) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Dept` varchar(255) NOT NULL,
  `Time_In` time NOT NULL,
  `Time_Out` time NOT NULL,
  `Date` date NOT NULL,
  `Total_Students` varchar(50) NOT NULL,
  `Purpose` varchar(255) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `Action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(5, 'aylah', 'registrar', '2024-05-01', 'sdasdsad', 'urgent', 'sdasda', '13:58:00', '14:58:00', ''),
(6, 'admin', 'registrar', '2024-04-05', 'internet problem', 'urgent', 'bring your tools', '12:11:00', '12:15:00', ''),
(7, 'dasdasda', 'administration', '2024-04-30', 'dsadasdas', 'urgent', 'dasdasd', '11:50:00', '11:50:00', '');

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
(6, 'Ruen Malvar', 'BSIS', 3, 'A', 'admin', 'admion', 'owner', '', 0),
(7, 'Al christoper S.J CO', 'BSIS', 3, 'A', 'admin2', 'admin2', 'owner', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment_request_prof`
--
ALTER TABLE `equipment_request_prof`
  ADD PRIMARY KEY (`Id`);

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
-- Indexes for table `prof_room_request_form_db`
--
ALTER TABLE `prof_room_request_form_db`
  ADD PRIMARY KEY (`Id`);

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
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `equipment_request_stud`
--
ALTER TABLE `equipment_request_stud`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback_form_db`
--
ALTER TABLE `feedback_form_db`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message_us_db`
--
ALTER TABLE `message_us_db`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prof_room_request_form_db`
--
ALTER TABLE `prof_room_request_form_db`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_request_db`
--
ALTER TABLE `service_request_db`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_account_db`
--
ALTER TABLE `user_account_db`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
