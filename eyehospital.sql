-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2015 at 07:37 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eyehospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `acp_log`
--

CREATE TABLE IF NOT EXISTS `acp_log` (
`acp_pid` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `wachtwoord` varchar(20) NOT NULL,
  `spwd` varchar(70) NOT NULL,
  `ssalt` varchar(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `cts` datetime NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acp_log`
--

INSERT INTO `acp_log` (`acp_pid`, `uname`, `wachtwoord`, `spwd`, `ssalt`, `email`, `type`, `status`, `cts`, `mts`) VALUES
(1, 'EyESAP', '$E#y*E&S!A#P@', 'a1941b671423303b8ecb204da197efa590df6b30a1fb299f4cd5cc61b03e636f', '777', 'sandeep.manya@dotweb.in', 'Admin', 'Active', '2015-08-06 10:34:34', '2015-08-06 05:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `allergy_master`
--

CREATE TABLE IF NOT EXISTS `allergy_master` (
`Allergy_ID` int(11) NOT NULL,
  `Allergy_Name` varchar(100) NOT NULL,
  `al_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch_master`
--

CREATE TABLE IF NOT EXISTS `branch_master` (
`Branch_ID` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(200) NOT NULL,
  `pin_code` varchar(100) NOT NULL,
  `Email_ID` varchar(100) NOT NULL,
  `Phone_No` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `designation_master`
--

CREATE TABLE IF NOT EXISTS `designation_master` (
`desig_Id` int(11) NOT NULL,
  `designation_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_master`
--

CREATE TABLE IF NOT EXISTS `employee_master` (
`emp_Id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `doj` varchar(100) NOT NULL,
  `add` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `pin` varchar(100) NOT NULL,
  `ph_no` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `specialisation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_master`
--

CREATE TABLE IF NOT EXISTS `hospital_master` (
`hospital_Id` int(11) NOT NULL,
  `hospital_name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `pin_code` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `investigation_master`
--

CREATE TABLE IF NOT EXISTS `investigation_master` (
`Id` int(11) NOT NULL,
  `investigation` varchar(100) NOT NULL,
  `description` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `optometrist_form`
--

CREATE TABLE IF NOT EXISTS `optometrist_form` (
`ID` int(11) NOT NULL,
  `MRNO` varchar(100) NOT NULL,
  `Date1` date NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `AR_right` varchar(100) NOT NULL,
  `AR_left` varchar(100) NOT NULL,
  `p_right_sphere` varchar(100) NOT NULL,
  `p_right_cyl` varchar(100) NOT NULL,
  `p_right_axis` varchar(100) NOT NULL,
  `p_right_cva` varchar(100) NOT NULL,
  `p_left_sphere` varchar(100) NOT NULL,
  `p_left_cyl` varchar(100) NOT NULL,
  `p_left_axis` varchar(100) NOT NULL,
  `p_left_add` varchar(100) NOT NULL,
  `p_left_cva` varchar(100) NOT NULL,
  `chief_complaints` varchar(100) NOT NULL,
  `past_history` varchar(100) NOT NULL,
  `n_right_UVA` varchar(100) NOT NULL,
  `n_righ_sphere` varchar(100) NOT NULL,
  `n_right_cyl` varchar(100) NOT NULL,
  `n_right_axis` varchar(100) NOT NULL,
  `n_right_add` varchar(100) NOT NULL,
  `n_right_cva` varchar(100) NOT NULL,
  `n_left_uva` varchar(100) NOT NULL,
  `n_left_sphere` varchar(100) NOT NULL,
  `n_left_cyl` varchar(100) NOT NULL,
  `n_left_axis` varchar(100) NOT NULL,
  `n_left_add` varchar(100) NOT NULL,
  `n_left_cva` varchar(100) NOT NULL,
  `dilation` varchar(100) NOT NULL,
  `dominant_eye` varchar(100) NOT NULL,
  `disesase` varchar(100) NOT NULL,
  `allergies` varchar(100) NOT NULL,
  `Treatment` varchar(100) NOT NULL,
  `optmeterist_name` varchar(100) NOT NULL,
  `upoad_report` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patient_registration`
--

CREATE TABLE IF NOT EXISTS `patient_registration` (
`P_ID` int(11) NOT NULL,
  `MRNO` varchar(200) NOT NULL,
  `Date` varchar(200) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `Refernce` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Age` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `phone_No` varchar(100) NOT NULL,
  `Email_Id` varchar(100) NOT NULL,
  `Reg_status` varchar(100) NOT NULL,
  `Fees` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specialisation_master`
--

CREATE TABLE IF NOT EXISTS `specialisation_master` (
`Id` int(11) NOT NULL,
  `Specalisation_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specular_microscope_master`
--

CREATE TABLE IF NOT EXISTS `specular_microscope_master` (
`Id` int(11) NOT NULL,
  `Investigation` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surgery_master`
--

CREATE TABLE IF NOT EXISTS `surgery_master` (
`ID` int(11) NOT NULL,
  `Surgery_Name` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `fees` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test_master`
--

CREATE TABLE IF NOT EXISTS `test_master` (
`Id` int(11) NOT NULL,
  `test_Name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `fees` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
`user_Id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `passwod` varchar(100) NOT NULL,
  `module` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acp_log`
--
ALTER TABLE `acp_log`
 ADD PRIMARY KEY (`acp_pid`);

--
-- Indexes for table `allergy_master`
--
ALTER TABLE `allergy_master`
 ADD PRIMARY KEY (`Allergy_ID`);

--
-- Indexes for table `branch_master`
--
ALTER TABLE `branch_master`
 ADD PRIMARY KEY (`Branch_ID`);

--
-- Indexes for table `designation_master`
--
ALTER TABLE `designation_master`
 ADD PRIMARY KEY (`desig_Id`);

--
-- Indexes for table `employee_master`
--
ALTER TABLE `employee_master`
 ADD PRIMARY KEY (`emp_Id`);

--
-- Indexes for table `hospital_master`
--
ALTER TABLE `hospital_master`
 ADD PRIMARY KEY (`hospital_Id`);

--
-- Indexes for table `investigation_master`
--
ALTER TABLE `investigation_master`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `optometrist_form`
--
ALTER TABLE `optometrist_form`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `patient_registration`
--
ALTER TABLE `patient_registration`
 ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `specialisation_master`
--
ALTER TABLE `specialisation_master`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `specular_microscope_master`
--
ALTER TABLE `specular_microscope_master`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `surgery_master`
--
ALTER TABLE `surgery_master`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `test_master`
--
ALTER TABLE `test_master`
 ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
 ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acp_log`
--
ALTER TABLE `acp_log`
MODIFY `acp_pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `allergy_master`
--
ALTER TABLE `allergy_master`
MODIFY `Allergy_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `branch_master`
--
ALTER TABLE `branch_master`
MODIFY `Branch_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `designation_master`
--
ALTER TABLE `designation_master`
MODIFY `desig_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_master`
--
ALTER TABLE `employee_master`
MODIFY `emp_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hospital_master`
--
ALTER TABLE `hospital_master`
MODIFY `hospital_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `investigation_master`
--
ALTER TABLE `investigation_master`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `optometrist_form`
--
ALTER TABLE `optometrist_form`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patient_registration`
--
ALTER TABLE `patient_registration`
MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `specialisation_master`
--
ALTER TABLE `specialisation_master`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `specular_microscope_master`
--
ALTER TABLE `specular_microscope_master`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `surgery_master`
--
ALTER TABLE `surgery_master`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `test_master`
--
ALTER TABLE `test_master`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
