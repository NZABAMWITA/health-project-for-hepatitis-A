-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 01:39 PM
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
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `degree` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `gender`, `location`, `phone`, `email`, `age`, `degree`) VALUES
(6, 'nzabamwit', '', 'nyanza', '0785853898', 'nzabamwitaclement9@gmail.com', 20, '0'),
(7, 'nzabamwita clement', '', '', '0785853898', 'nzabamwitaclement9@gmail.com', 20, '0'),
(9, '', '', 'HUYE', 'KABEZA', 'nzabamwitaclement9@gmail.com', 20, 'A2'),
(10, 'NZARORERA ', '', 'HUYE', 'KABEZA', 'nzabamwitaclement9@gmail.com', 20, 'A2');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `patientacc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `province`, `district`, `sector`, `phone`, `email`, `class`, `patientacc`) VALUES
(7, 'FAIARI', 'NORTHERN', ' MUSANZE', 'kizani', '0721020453', 'nzabb@we', 'General', '23'),
(8, 'MUSANZE', 'NORTHERN', ' MUSANZE', 'kizani', '0721020453', 'nzabb@we', 'General', '23'),
(10, 'CHUK', 'NORTHERN', ' MUSANZE', 'kizani', '0721020453', 'nzabb@we', 'General', '23'),
(11, 'CHUB', 'NORTHERN', ' MUSANZE', 'kizani', '0721020453', 'nzabb@we', 'General', '23'),
(12, 'KANOMBE', 'NORTHERN', ' MUSANZE', 'kizani', '0721020453', 'nzabb@we', 'General', '23');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `sector` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hospital` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `province`, `district`, `sector`, `phone`, `email`, `hospital`) VALUES
(84, 'zebe jerome', 'kigali', 'huye ', 'KINZAZI', '456', 'aimablesemuhungu@gmail.com', 'kigali'),
(85, 'NZABAMWITA CLEMENT', 'huye', 'huye ', 'KINZAZI', '456', 'nzabb@we', 'rukaraaa'),
(87, 'NZABAMWITA CLEMENT', 'kigali', 'huye ', 'KINZAZI', '456', 'nzabb@we', 'rukaraaa'),
(88, 'NZABAMWITA CLEMENT', 'kigali', 'huye ', 'KINZAZI', '456', 'nzabb@we', 'rukaraaa'),
(89, 'NZABAMWITA CLEMENT', 'kigali', 'huye ', 'KINZAZI', '456', 'nzabb@we', 'rukaraaa'),
(90, 'NZABAMWITA CLEMENT', 'kigali', 'huye ', 'KINZAZI', '456', 'nzabb@we', 'rukaraaa'),
(91, 'NZABAMWITA CLEMENT', 'kigali', 'huye ', 'KINZAZI', '456', 'nzabb@we', 'rukaraaa'),
(98, 'NTWALIiiiii', 'df', 'mnv', 'vcx', '0789109612', 'murife@fgmail.comghj', 'nzabamwita t'),
(99, 'zebe jerome', 'qwe', 'fgh', 'KINZAZI', '0721020453', 'aimablesemuhungu@gmail.com', 'MUSANZE'),
(100, 'nzabamwita clement', 'qwe', 'fgh', 'KINZAZI', '0785853898', 'nzabamwitaclement9@gmail.com', 'nzabamwita t'),
(101, 'umuhifgiiiiiii', 'd', 'inkavu', 'd', 'd', 'dgdgdgd@gmail.com', 'MUSANZE'),
(102, 'BOLAS ', 'RWIGAMBA', 'GASABO', 'KIGALI', '567', 'AZX@SDF', 'nzabamwita t'),
(103, 'BOLAS ', 'RWIGAMBA', 'GASABO', 'KIGALI', '567', 'AZX@SDF', 'nzabamwita t'),
(104, 'BOLAS ', 'RWIGAMBA', 'GASABO', 'KIGALI', '567', 'AZX@SDF', 'nzabamwita t'),
(105, 'BOLAS ', 'RWIGAMBA', 'GASABO', 'KIGALI', '567', 'AZX@SDF', 'MUSANZE'),
(106, 'BOLAS ', 'RWIGAMBA', 'GASABO', 'KIGALI', '0721020453', 'aimablesemuhungu@gmail.com', 'MUSANZE');

-- --------------------------------------------------------

--
-- Table structure for table `patientdetails`
--

CREATE TABLE `patientdetails` (
  `patient_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `hospital` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `id_card` varchar(50) DEFAULT NULL,
  `insurance_details` varchar(200) DEFAULT NULL,
  `medical_history` text DEFAULT NULL,
  `vital_signs_records` text DEFAULT NULL,
  `physical_examination` text DEFAULT NULL,
  `diagnostic_tests` text DEFAULT NULL,
  `medication_records` text DEFAULT NULL,
  `allergy_information` text DEFAULT NULL,
  `social_lifestyle_factors` text DEFAULT NULL,
  `mental_health_assessment` text DEFAULT NULL,
  `consent_forms` text DEFAULT NULL,
  `insurance_administrative_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patientdetails`
--

INSERT INTO `patientdetails` (`patient_id`, `name`, `gender`, `date_of_birth`, `hospital`, `phone`, `id_card`, `insurance_details`, `medical_history`, `vital_signs_records`, `physical_examination`, `diagnostic_tests`, `medication_records`, `allergy_information`, `social_lifestyle_factors`, `mental_health_assessment`, `consent_forms`, `insurance_administrative_info`) VALUES
(1, 'nzabamwita clement', '', '0000-00-00', '', '0785853898', '', '', '', '', '', '', '', '', '', '', '', ''),
(2, '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 'zebe jerome', '', '0000-00-00', '', '0721020453', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 'zebe jerome', '', '0000-00-00', '', '0721020453', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 'aime fracois', 'M', '0003-12-31', 'musanze', '0721020453', '12345678', 'RMA-GAKO', 'none', 'temp', 'positive', 'O+', 'None', 'none', 'single', 'T', 'T', 'soldier\r\n\r\n'),
(9, 'aime fracois', 'M', '0003-12-31', 'musanze', '0721020453', '12345678', 'RMA-GAKO', 'none', 'temp', 'positive', 'O+', 'None', 'none', 'single', 'T', 'T', 'soldier\r\n\r\n'),
(10, 'aime fracois', 'M', '0003-12-31', 'musanze', '0721020453', '12345678', 'RMA-GAKO', 'none', 'temp', 'positive', 'O+', 'None', 'none', 'single', 'T', 'T', 'soldier\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `patienttransfers`
--

CREATE TABLE `patienttransfers` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(50) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `reason` text NOT NULL,
  `transfer_date` date NOT NULL,
  `transfer_time` time NOT NULL,
  `urgency` enum('urgent','non-urgent') NOT NULL,
  `medical_details` text NOT NULL,
  `patient_condition` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `contact_person_phone` varchar(20) NOT NULL,
  `notes` text DEFAULT NULL,
  `submission_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patienttransfers`
--

INSERT INTO `patienttransfers` (`id`, `patient_id`, `patient_name`, `gender`, `hospital`, `reason`, `transfer_date`, `transfer_time`, `urgency`, `medical_details`, `patient_condition`, `contact_person`, `contact_person_phone`, `notes`, `submission_time`) VALUES
(1, '', ' b they', 'male', 'MUSANZE', 'n', '0000-00-00', '00:00:00', 'urgent', '', '', '', '', '', '2024-01-10 14:28:03'),
(2, '', ' b they', 'male', 'MUSANZE', 'n', '0000-00-00', '00:00:00', 'urgent', '', '', '', '', '', '2024-01-10 14:31:26'),
(3, '', ' b they', 'male', 'MUSANZE', 'n', '0000-00-00', '00:00:00', 'urgent', '', '', '', '', '', '2024-01-10 14:32:52'),
(4, '', ' b they', 'male', 'MUSANZE', 'n', '0000-00-00', '00:00:00', 'urgent', '', '', '', '', '', '2024-01-10 14:32:56'),
(5, '', '', 'male', 'MUSANZE', '', '0000-00-00', '00:00:00', 'urgent', '', '', '', '', '', '2024-01-11 07:01:25'),
(6, '', '', 'male', 'MUSANZE', '', '0000-00-00', '00:00:00', 'urgent', '', '', '', '', '', '2024-01-11 07:01:39'),
(7, '', '', 'male', 'MUSANZE', '', '0000-00-00', '00:00:00', 'urgent', '', '', '', '', '', '2024-01-11 07:01:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientdetails`
--
ALTER TABLE `patientdetails`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `patienttransfers`
--
ALTER TABLE `patienttransfers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `patientdetails`
--
ALTER TABLE `patientdetails`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patienttransfers`
--
ALTER TABLE `patienttransfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
