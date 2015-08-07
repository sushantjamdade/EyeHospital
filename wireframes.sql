-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2015 at 01:45 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wireframes`
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
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`acp_pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acp_log`
--

INSERT INTO `acp_log` (`acp_pid`, `uname`, `wachtwoord`, `spwd`, `ssalt`, `email`, `type`, `status`, `cts`, `mts`) VALUES
(1, 'EyESAP', 'hari12345', '41018bbba58c22ca3bd8dbd74a1ec5bd7e07f9bc34a7a373c81361ac1455bb4c', '422', 'sandeep.manya@dotweb.in', 'Admin', 'Active', '2015-08-06 10:34:34', '2015-08-07 11:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `allergy_master`
--

CREATE TABLE IF NOT EXISTS `allergy_master` (
  `Allergy_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Allergy_Name` varchar(100) NOT NULL,
  `al_desc` varchar(100) NOT NULL,
  `del_flag` varchar(10) NOT NULL,
  `cts` date NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`Allergy_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `branch_master`
--

CREATE TABLE IF NOT EXISTS `branch_master` (
  `Branch_ID` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(100) NOT NULL,
  `addr` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(200) NOT NULL,
  `pin_code` varchar(100) NOT NULL,
  `Email_ID` varchar(100) NOT NULL,
  `Phone_No` varchar(100) NOT NULL,
  `del_flag` varchar(10) NOT NULL,
  `cts` date NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`Branch_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `designation_master`
--

CREATE TABLE IF NOT EXISTS `designation_master` (
  `desig_Id` int(11) NOT NULL AUTO_INCREMENT,
  `designation_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `del_flag` varchar(10) NOT NULL,
  `cts` date NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`desig_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_master`
--

CREATE TABLE IF NOT EXISTS `employee_master` (
  `emp_Id` int(11) NOT NULL AUTO_INCREMENT,
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
  `specialisation` varchar(100) NOT NULL,
  `del_flag` varchar(10) NOT NULL,
  `cts` date NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`emp_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_master`
--

CREATE TABLE IF NOT EXISTS `hospital_master` (
  `hospital_Id` int(11) NOT NULL AUTO_INCREMENT,
  `hospital_name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `pin_code` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  `del_flag` varchar(10) NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Cts` date NOT NULL,
  `user_name` varchar(100) NOT NULL,
  PRIMARY KEY (`hospital_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `investigation_master`
--

CREATE TABLE IF NOT EXISTS `investigation_master` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `investigation` varchar(100) NOT NULL,
  `description` int(100) NOT NULL,
  `del_flag` varchar(10) NOT NULL,
  `cts` date NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `optometrist_form`
--

CREATE TABLE IF NOT EXISTS `optometrist_form` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
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
  `upoad_report` varchar(100) NOT NULL,
  `mts` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `del_flag` varchar(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_registration`
--

CREATE TABLE IF NOT EXISTS `patient_registration` (
  `P_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MRNO` varchar(200) NOT NULL,
  `Date` date NOT NULL,
  `Name` varchar(200) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `Refernce` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Age` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `phone_No` varchar(100) NOT NULL,
  `Email_Id` varchar(100) NOT NULL,
  `Reg_status` varchar(100) NOT NULL,
  `Fees` varchar(100) NOT NULL,
  `del_flag` varchar(10) NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`P_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `specialisation_master`
--

CREATE TABLE IF NOT EXISTS `specialisation_master` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Specalisation_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `del_flag` varchar(10) NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cts` date NOT NULL,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `specular_microscope_master`
--

CREATE TABLE IF NOT EXISTS `specular_microscope_master` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Investigation` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Type` varchar(200) NOT NULL,
  `del_flag` varchar(10) NOT NULL,
  `cts` date NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `surgery_master`
--

CREATE TABLE IF NOT EXISTS `surgery_master` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Surgery_Name` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `fees` varchar(100) NOT NULL,
  `del_flag` varchar(10) NOT NULL,
  `cts` date NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test_master`
--

CREATE TABLE IF NOT EXISTS `test_master` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `test_Name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `fees` varchar(100) NOT NULL,
  `del_flag` varchar(10) NOT NULL,
  `cts` date NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `user_Id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `passwod` varchar(100) NOT NULL,
  `module` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `del_flag` varchar(10) NOT NULL,
  `cts` date NOT NULL,
  `mts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
