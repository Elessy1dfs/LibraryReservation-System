-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2026 at 05:24 PM
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
-- Database: `dbsaysonsanchez`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblfacilities`
--

CREATE TABLE `tblfacilities` (
  `facility_id` int(11) NOT NULL,
  `facility_name` varchar(100) NOT NULL,
  `facility_type` varchar(50) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblfacilities`
--

INSERT INTO `tblfacilities` (`facility_id`, `facility_name`, `facility_type`, `status`) VALUES
(1, 'Main Reading Room - Pod 1', 'Study Room', 'Available'),
(2, 'Main Reading Room - Pod 2', 'Study Room', 'Available'),
(3, 'Quiet Zone - Cubicle 05', 'Study Room', 'Available'),
(4, 'Collaborative Space - Room 301', 'Discussion Room', 'Available'),
(5, 'Collaborative Space - Room 302', 'Discussion Room', 'Available'),
(6, 'Multimedia Lab - Station 10', 'PC Station', 'Available'),
(7, 'Research Wing - Table 04', 'Study Room', 'Available'),
(8, 'Group Study Loft - North', 'Discussion Room', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `tblreservations`
--

CREATE TABLE `tblreservations` (
  `res_id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `time_slot` varchar(50) NOT NULL,
  `status` varchar(20) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreservations`
--

INSERT INTO `tblreservations` (`res_id`, `student_id`, `facility_id`, `reservation_date`, `time_slot`, `status`) VALUES
(1, '123', 1, '2026-10-02', '08:00 AM - 10:00 AM', 'Approved'),
(2, '143', 5, '2026-12-12', '10:00 AM - 12:00 PM', 'Approved'),
(3, '143', 5, '2222-02-22', '10:00 AM - 12:00 PM', 'Approved'),
(4, '143', 1, '2026-10-02', '08:00 AM - 10:00 AM', 'Approved'),
(5, '143', 1, '2026-10-02', '08:00 AM - 10:00 AM', 'Approved'),
(6, '143', 1, '2026-10-02', '08:00 AM - 10:00 AM', 'Approved'),
(7, '345', 1, '2026-10-02', '08:00 AM - 10:00 AM', 'Rejected'),
(8, '345', 8, '2026-10-02', '03:00 PM - 05:00 PM', 'Rejected'),
(9, '24-1164-681', 1, '2026-04-28', '08:00 AM - 10:00 AM', 'Approved'),
(10, '24-1318-928', 2, '2026-10-02', '08:00 AM - 10:00 AM', 'Pending'),
(11, '24-1318-928', 6, '2026-10-02', '08:00 AM - 10:00 AM', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `student_id` varchar(50) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `program` varchar(100) DEFAULT NULL,
  `yearlevel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`student_id`, `firstname`, `lastname`, `program`, `yearlevel`) VALUES
('123', 'eleonora', 'sayson', 'BSIT', '2'),
('143', 'ele', 'says', 'BSIT', '4'),
('24-1164-681', 'Chan', 'Chanchez', 'BSIT', '3'),
('24-1318-928', 'Eleonora', 'Sayson', 'BSIT', '2'),
('345', 'err', 'eee', 'BSIT', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraccount`
--

CREATE TABLE `tbluseraccount` (
  `account_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluseraccount`
--

INSERT INTO `tbluseraccount` (`account_id`, `username`, `password`, `role`) VALUES
(2, 'Sayson', 'sayson123', 'admin'),
(3, 'Sanchez', 'sanchez123', 'admin'),
(8, '24-1164-681', '$2y$10$JH.Z6cJoiYR5Oq5mFtmseuPvxU.02nf4Mk9Lc0FJvBoLyGey9gpHe', 'student'),
(9, '24-1318-928', '$2y$10$7titt8/sBpK3ROxCMnZWoe5sUP26SNf6euDP8hxRUQGOt31cyvZMi', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tblfacilities`
--
ALTER TABLE `tblfacilities`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `tblreservations`
--
ALTER TABLE `tblreservations`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `facility_id` (`facility_id`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblfacilities`
--
ALTER TABLE `tblfacilities`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblreservations`
--
ALTER TABLE `tblreservations`
  MODIFY `res_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbluseraccount`
--
ALTER TABLE `tbluseraccount`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblreservations`
--
ALTER TABLE `tblreservations`
  ADD CONSTRAINT `tblreservations_ibfk_1` FOREIGN KEY (`facility_id`) REFERENCES `tblfacilities` (`facility_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
