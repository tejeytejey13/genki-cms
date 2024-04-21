-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 03:30 PM
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
-- Database: `genkicms`
--
CREATE DATABASE IF NOT EXISTS `genkicms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `genkicms`;

-- --------------------------------------------------------

--
-- Table structure for table `clearance_slots`
--

CREATE TABLE `clearance_slots` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(255) NOT NULL,
  `slots` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_initial` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `grade_level` varchar(255) NOT NULL,
  `phone_number` bigint(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `user_id`, `first_name`, `middle_initial`, `last_name`, `email`, `grade_level`, `phone_number`, `password`) VALUES
(1, 1, 'ace', 'a', 'batingal', 'user@gmail.com', '', 123456789, '123456789'),
(2, 5, 'test', 'test1', 'test2', 'test@gmail.com', '', 0, '123456789'),
(3, 6, 'test', 'test1', 'test2', 'test2@gmail.com', '', 0, '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `grade_levels`
--

CREATE TABLE `grade_levels` (
  `id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade_levels`
--

INSERT INTO `grade_levels` (`id`, `level`) VALUES
(1, 'Grade 1'),
(2, 'Grade 2'),
(3, 'Grade 3'),
(4, 'Grade 4'),
(5, 'Grade 5'),
(6, 'Grade 6'),
(7, 'Grade 7'),
(8, 'Grade 8'),
(9, 'Grade 9 '),
(10, 'Grade 10'),
(11, 'Grade 11'),
(12, 'Grade 12');

-- --------------------------------------------------------

--
-- Table structure for table `medical_form`
--

CREATE TABLE `medical_form` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_initial` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `adviser` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `place_of_birth` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `parent_guardian` varchar(255) NOT NULL,
  `rel_to_stud` varchar(255) NOT NULL,
  `contact_num` int(255) NOT NULL,
  `emergency_name` varchar(255) NOT NULL,
  `emergency_num` int(255) NOT NULL,
  `alergy` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `treatment` varchar(255) NOT NULL,
  `immunization` varchar(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `date_med` datetime NOT NULL,
  `time_med` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_form`
--

INSERT INTO `medical_form` (`id`, `user_id`, `first_name`, `middle_initial`, `last_name`, `grade`, `section`, `adviser`, `birthdate`, `place_of_birth`, `address`, `parent_guardian`, `rel_to_stud`, `contact_num`, `emergency_name`, `emergency_num`, `alergy`, `reason`, `treatment`, `immunization`, `date_created`, `date_med`, `time_med`) VALUES
(1, 1, 'ace', 'a', 'batingal', 'Grade 8', '', 'john doe', '0000-00-00', '', '', 'john raven', '', 0, '', 0, 'Alergy Selection', '', '', 'yes', '2024-04-10', '2024-04-11 00:00:00', 'pm');

-- --------------------------------------------------------

--
-- Table structure for table `med_despensary`
--

CREATE TABLE `med_despensary` (
  `id` int(11) NOT NULL,
  `item_id` bigint(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` bigint(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `med_despensary`
--

INSERT INTO `med_despensary` (`id`, `item_id`, `name`, `quantity`, `date_created`, `date_updated`, `status`) VALUES
(2, 1, 'Band-Aids', 100, '2024-04-19 23:31:48', '2024-04-19 23:31:48', 0),
(3, 2, 'Ibuprofen Tablets', 50, '2024-04-19 23:31:48', '2024-04-19 23:31:48', 0),
(4, 3, 'Acetaminophen Tablets', 30, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(5, 4, 'Antihistamine Syrup', 40, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(6, 5, 'Adhesive Tape', 20, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(7, 6, 'Hydrogen Peroxide', 5, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(8, 7, 'Thermometer', 10, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(9, 8, 'Rubbing Alcohol', 15, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(10, 9, 'Burn Cream', 25, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(11, 10, 'Antiseptic Wipes', 50, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(12, 11, 'Cold Compress Packs', 30, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(13, 12, 'Calamine Lotion', 10, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(14, 13, 'Eye Wash Solution', 20, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(15, 14, 'Antacid Tablets', 40, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(16, 15, 'EpiPen', 5, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(17, 16, 'Inhaler', 10, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(18, 17, 'Aloe Vera Gel', 15, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(19, 18, 'Cough Drops', 50, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(20, 19, 'First Aid Manual', 5, '2024-04-19 23:31:49', '2024-04-19 23:31:49', 0),
(21, 20, 'Hand Sanitizer', 30, '2024-04-19 23:31:50', '2024-04-19 23:31:50', 0);

--
-- Triggers `med_despensary`
--
DELIMITER $$
CREATE TRIGGER `set_created_date` BEFORE INSERT ON `med_despensary` FOR EACH ROW BEGIN
    SET NEW.date_created = NOW();
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_date_updated` BEFORE UPDATE ON `med_despensary` FOR EACH ROW BEGIN
    SET NEW.date_updated = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `med_form_status`
--

CREATE TABLE `med_form_status` (
  `id` int(255) NOT NULL,
  `form_id` int(255) NOT NULL,
  `nurse_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_updated` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `med_form_status`
--

INSERT INTO `med_form_status` (`id`, `form_id`, `nurse_id`, `status`, `date_updated`) VALUES
(7, 1, 0, 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_initial` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` int(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `user_id`, `first_name`, `middle_initial`, `last_name`, `email`, `phone_number`, `password`) VALUES
(1, 2, 'john', 'a', 'doe', 'nurse@gmail.com', 987654321, '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `school_id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `school_id`, `email`, `password`) VALUES
(1, 'client', 123456, 'user@gmail.com', '123456789'),
(2, 'nurse', 654321, 'nurse@gmail.com', '123456789'),
(3, 'admin', 615243, 'admin@gmail.com', '123456789'),
(4, 'client', 987654, 'test@gmail.com', '123456789'),
(5, 'client', 321654, 'test1@gmail.com', '123456789'),
(6, 'client', 987654, 'test2@gmail.com', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clearance_slots`
--
ALTER TABLE `clearance_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `grade_levels`
--
ALTER TABLE `grade_levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_form`
--
ALTER TABLE `medical_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `med_despensary`
--
ALTER TABLE `med_despensary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `med_form_status`
--
ALTER TABLE `med_form_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_id` (`form_id`),
  ADD KEY `nurse_id` (`nurse_id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clearance_slots`
--
ALTER TABLE `clearance_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grade_levels`
--
ALTER TABLE `grade_levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `medical_form`
--
ALTER TABLE `medical_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `med_despensary`
--
ALTER TABLE `med_despensary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `med_form_status`
--
ALTER TABLE `med_form_status`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `med_form_status`
--
ALTER TABLE `med_form_status`
  ADD CONSTRAINT `med_form_status_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `medical_form` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nurse`
--
ALTER TABLE `nurse`
  ADD CONSTRAINT `nurse_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
