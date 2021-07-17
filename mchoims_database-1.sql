-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2019 at 04:35 PM
-- Server version: 5.6.16-log
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mchoims_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `usertype` varchar(20) DEFAULT NULL,
  `barangay` varchar(25) DEFAULT NULL,
  `ai_id` int(11) NOT NULL,
  PRIMARY KEY (`account_id`),
  KEY `ai_id` (`ai_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `username`, `password`, `usertype`, `barangay`, `ai_id`) VALUES
(3, 'admin', 'pass', 'admin', 'Datu Saber', 6),
(4, 'amerah', 'pass', 'officer', 'Basak Malutlut', 7),
(5, 'amer', 'pass', 'user', 'Bangon', 8),
(6, 'hanif', 'pass', 'user', 'Rapasun MSU', 9),
(7, 'madz', 'pass', 'officer', 'Fort', 11);

-- --------------------------------------------------------

--
-- Table structure for table `acc_info`
--

CREATE TABLE IF NOT EXISTS `acc_info` (
  `ai_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) DEFAULT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `bdate` varchar(25) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ai_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `acc_info`
--

INSERT INTO `acc_info` (`ai_id`, `fname`, `lname`, `bdate`, `gender`, `email`) VALUES
(6, 'Mermellah', 'Angni', '1996-12-01', 'Female', 'angni.01@gmail.com'),
(7, 'Amerah', 'Disomangcop', '1998-12-03', 'Female', 'noctiscaelum01@gmail.com'),
(8, 'Amerhussien', 'Sarangani', '2019-01-10', 'Male', 'amer@gmail.com'),
(9, 'Hanif', 'Abdulhalim', '2019-02-14', 'Male', 'hanifa@gmail.com'),
(11, 'Madania', 'Pangandaman', '1996-07-16', 'Female', 'madania@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `acc_req`
--

CREATE TABLE IF NOT EXISTS `acc_req` (
  `ar_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) DEFAULT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `bdate` varchar(25) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `usertype` varchar(25) DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `act_id` int(11) NOT NULL AUTO_INCREMENT,
  `actidnumber` varchar(25) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `actdate` tinytext,
  PRIMARY KEY (`act_id`),
  UNIQUE KEY `actidnumber` (`actidnumber`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`act_id`, `actidnumber`, `name`, `description`, `actdate`) VALUES
(7, '7567234', 'BLOOD DONATION PROGRAM', '   Republic Act No. 7719, also known as the National Blood Services Act of 1994, promotes voluntary blood donation to provide sufficient supply of safe blood and to regulate blood banks. This act aims to inculcate public awareness that blood donation is a humanitarian act.\r\n\r\n                 The National Voluntary Blood Services Program (NVBSP) of the Department of Health is targeting the youth as volunteers in its blood donation program this year. In accordance with RA No. 7719, it aims to create public consciousness on the importance of blood donation in saving the lives of millions of Filipinos.\r\n\r\n                 Based from the data from the National Voluntary Blood Services Program, a total of 654,763 blood units were collected in 2009. Fifty-eight percent of which was from voluntary blood donation and the remaining from replacement donation. This year, particular provinces have already achieved 100% voluntary blood donation. The DOH is hoping that many individuals will become regular voluntary unpaid donors to guarantee sufficient supply of safe blood and to meet national blood necessities.', '2018-08-20'),
(9, '143442', 'HEALTH AND WELLNESS PROGRAM FOR SENIOR CITIZEN', 'In support of the RA 9257 (The Expanded Senior Citizens Act of 2003) and the RA 9994 (Expanded Senior Citizen Act of 2010), the Department of Health issued Administrative Orders for health implementors to undertake and promote the health and wellness of senior citizens as well as to alleviate the conditions of older persons who are encountering degenerative diseases.  ', '2017-05-20'),
(12, '2341', 'MENTAL HEALTH PROGRAM', 'Mental health and well-being is a concern of all. Addressing concerns related to MNS contributes to the attainment of the SDGs. Through a comprehensive mental health program that includes a wide range of promotive, preventive, treatment and rehabilitative services; that is for all individuals across the life course especially those at risk of and suffering from MNS disorders; integrated in various treatment settings from community to facility that is implemented from the national to the barangay level; and backed with institutional support mechanisms from different government agencies and CSOs, we hope to attain the highest possible level of health for the nation because there is no Universal Health Care without mental health', '2018-10-09'),
(14, '43523', 'RABIES PREVENTION AND CONTROL PROGRAM', 'Rabies is a human infection that occurs after a transdermal bite or scratch by an infected animal, like dogs and cats. It can be transmitted when infectious material, usually saliva, comes into direct contact with a victimâ€™s fresh skin lesions. Rabies may also occur, though in very rare cases, through inhalation of virus-containing spray or through organ transplants.\r\n\r\nRabies is considered to be a neglected disease, which is 100% fatal though 100% preventable. It is not among the leading causes of mortality and morbidity in the country but it is regarded as a significant public health problem because (1) it is one of the most acutely fatal infection and (2) it is responsible for the death of 200-300 Filipinos annually.', '2019-01-21'),
(16, '4533', 'MALARIA CONTROL PROGRAM', 'Malaria is a life-threatening disease caused by plasmodium parasites transmitted by anopheles mosquito or rarely through blood transfusion and sharing of contaminated needles causing acute febrile illness and symptoms in the form of fever, headache and chills. Untreated, P. falciparum malaria may progress to severe illness and possibly, death.\r\n\r\nThe Philippines carry a high burden of malaria disease in the past but with the unrelenting efforts of the DOH- National Malaria Control and Elimination Program, cases and deaths has been reduced significantly, that the country is now inching towards elimination. DOH-NMCEP aims to eliminate malaria by adopting a health system focused approach to achieve universal coverage with quality-assured malaria diagnosis and treatment, strengthen governance and human resources, maintain the financial support needed, and ensure timely and accurate information management.', '2019-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `barangay`
--

CREATE TABLE IF NOT EXISTS `barangay` (
  `brgy_id` int(11) NOT NULL AUTO_INCREMENT,
  `brgy_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`brgy_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `barangay`
--

INSERT INTO `barangay` (`brgy_id`, `brgy_name`) VALUES
(1, 'Ambolong'),
(2, 'Bacolod Chico Proper'),
(3, 'Banga'),
(4, 'Bangco'),
(5, 'Banggolo Poblacion'),
(6, 'Bangon'),
(7, 'Biaba-Damag'),
(8, 'Bito Buadi Itowa'),
(9, 'Bito Buadi Parba'),
(10, 'Bubonga Pagalamatan'),
(11, 'Bubonga Lilod Madaya'),
(12, 'Boganga'),
(13, 'Boto Ambolong'),
(14, 'Bubonga Cadayonan'),
(15, 'Bubong Lumbac'),
(16, 'Bubonga Marawi'),
(17, 'Bubonga Punod'),
(18, 'Cabasaran'),
(19, 'Cabingan'),
(20, 'Cadayonan'),
(21, 'Cadayonan I'),
(22, 'Calocan East'),
(23, 'Calocan West'),
(24, 'Kormatan Matampay'),
(25, 'Daguduban'),
(26, 'Dansalan'),
(27, 'Datu Sa Dansalan'),
(28, 'Dayawan'),
(29, 'Dimaluna'),
(30, 'Dulay'),
(31, 'Dulay West'),
(32, 'East Basak'),
(33, 'Emie Punud'),
(34, 'Fort'),
(35, 'Gadongan'),
(36, 'Buadi Sacayo'),
(37, 'Guimba'),
(38, 'Kapantaran'),
(39, 'Kilala'),
(40, 'Lilod Madaya'),
(41, 'Lilod Saduc'),
(42, 'Lomidong'),
(43, 'Lumbaca Madaya'),
(44, 'Lumbac Marinaut'),
(45, 'Lumbaca Toros'),
(46, 'Malimono'),
(47, 'Basak Malutlut'),
(48, 'Gadongan Mapantao'),
(49, 'Amito Marantao'),
(50, 'Marinaut East'),
(51, 'Marinaut West'),
(52, 'Matampay'),
(53, 'Langcaf'),
(54, 'Mipaga Proper'),
(55, 'Moncado Colony'),
(56, 'Moncado Kadingilan'),
(57, 'Moriatao Loksadato'),
(58, 'Datu Naga'),
(59, 'Datu Saber'),
(60, 'Olawa Ambolong'),
(61, 'Pagalamatan Gambai'),
(62, 'Pagayawan'),
(63, 'Panggao Saduc'),
(64, 'Papandayan'),
(65, 'Paridi'),
(66, 'Patani'),
(67, 'Pindolonan'),
(68, 'Poona Marantao'),
(69, 'Pugaan'),
(70, 'Rapasun MSU'),
(71, 'Raya Madaya I'),
(72, 'Raya Madaya II'),
(73, 'Raya Saduc'),
(74, 'Rorogagus Proper'),
(75, 'Rorogagus East'),
(76, 'Sabala Manao'),
(77, 'Sabala Manao Proper'),
(78, 'Saduc Proper'),
(79, 'Sagonsongan'),
(80, 'Sangcay Dansalan'),
(81, 'Somiorang'),
(82, 'South Madaya Proper'),
(83, 'Sugod Proper'),
(84, 'Tampilong'),
(85, 'Timbangalan'),
(86, 'Tuca Ambolong'),
(87, 'Tolali'),
(88, 'Toros'),
(89, 'Tuca Marinaut'),
(90, 'Tongantongan-Tuca Timbang'),
(91, 'Wawalayan Calocan'),
(92, 'Wawalayan Marinaut'),
(93, 'Marawi Poblacion'),
(94, 'Norhaya Village'),
(95, 'Papandayan Caniogan');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE IF NOT EXISTS `contact_info` (
  `ci_id` int(11) NOT NULL AUTO_INCREMENT,
  `home_no` varchar(10) DEFAULT NULL,
  `barangay` varchar(30) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `province` varchar(30) DEFAULT NULL,
  `contact_no` int(11) DEFAULT NULL,
  PRIMARY KEY (`ci_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`ci_id`, `home_no`, `barangay`, `street`, `city`, `province`, `contact_no`) VALUES
(5, '123', 'Rapasun MSU', 'First Street', 'Manila City', '', 2147483647),
(15, '123', 'Bangon', ' 2nd Street', 'Marawi', 'Marawi', 2100000000),
(16, '34', 'Rapasun MSU', ' First Street', 'Marawi', 'Marawi', 2100000000),
(27, '45', 'Bangon', '', 'Marawi City', ' Lanao del Sur', 909),
(39, '043', 'Datu Saber', '', 'Marawi City', ' Lanao del Sur', 2147483647),
(40, '043', 'Datu Saber', '', 'Marawi City', ' Lanao del Sur', 2147483647),
(41, '043', 'Datu Saber', '', 'Marawi City', ' Lanao del Sur', 2147483647),
(42, '043', 'Ambolong', '', 'Marawi City', ' Lanao del Sur', 2147483647),
(43, '043', 'Datu Saber', '', 'Marawi City', ' Lanao del Sur', 2147483647),
(44, '13', 'Cabingan', '', 'Marawi City', ' Lanao del Sur', 2147483647),
(45, '45', 'Bangon', '', 'Marawi City', ' Lanao del Sur', 2147483647),
(46, '34', 'Rapasun MSU', '', 'Marawi City', ' Lanao del Sur', 2147483647),
(47, '034', 'Boganga', '', 'Marawi City', ' Lanao del Sur', 2147483647),
(48, '87', 'Bubonga Marawi', '', 'Marawi City', ' Lanao del Sur', 2147483647),
(49, '12', 'Langcaf', '', 'Marawi City', ' Lanao del Sur', 2147483647),
(50, '', 'Fort', '', 'Marawi City', 'lanao de sur', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(25) DEFAULT NULL,
  `lname` varchar(25) DEFAULT NULL,
  `specialization` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `fname`, `lname`, `specialization`) VALUES
(1, 'Juan', 'Dela Cruz', 'Dentist'),
(2, 'Philip', 'Aquino', 'Pediatrician'),
(3, 'Hassan', 'Abdullah', 'Cardiologist'),
(4, 'Anthony', 'Ejercito', 'Pediatrician'),
(6, 'Jhon Michael', 'Agad', 'Dentist'),
(8, 'Myleen', 'Rosette', 'Opthalmologist');

-- --------------------------------------------------------

--
-- Table structure for table `educ_employ`
--

CREATE TABLE IF NOT EXISTS `educ_employ` (
  `ee_id` int(11) NOT NULL AUTO_INCREMENT,
  `educ_attainment` varchar(30) DEFAULT NULL,
  `employ_status` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `educ_employ`
--

INSERT INTO `educ_employ` (`ee_id`, `educ_attainment`, `employ_status`) VALUES
(5, 'Highschool', 'None/Unemployed'),
(15, 'College', 'Student'),
(16, 'Highschool', 'Student'),
(27, 'College', 'Student'),
(39, 'College', 'Student'),
(40, 'College', 'Employed'),
(41, 'College', 'Employed'),
(42, 'College', 'Student'),
(43, 'College', 'Student'),
(44, 'College', 'Student'),
(45, 'College', 'Student'),
(46, 'College', 'Student'),
(47, 'College', 'Student'),
(48, 'College', 'Student'),
(49, 'College', 'Student'),
(50, 'College', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `for_chu_rhu`
--

CREATE TABLE IF NOT EXISTS `for_chu_rhu` (
  `fcr_id` int(11) NOT NULL AUTO_INCREMENT,
  `mode_transaction` varchar(15) DEFAULT NULL,
  `date_consultation` varchar(20) DEFAULT NULL,
  `time_consultation` text,
  `blood_pressure` text,
  `height` text,
  `temperature` varchar(20) DEFAULT NULL,
  `weight` varchar(20) DEFAULT NULL,
  `name_of_attending` varchar(50) DEFAULT NULL,
  `age` int(11) NOT NULL,
  PRIMARY KEY (`fcr_id`),
  KEY `fcr_id` (`fcr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `for_chu_rhu`
--

INSERT INTO `for_chu_rhu` (`fcr_id`, `mode_transaction`, `date_consultation`, `time_consultation`, `blood_pressure`, `height`, `temperature`, `weight`, `name_of_attending`, `age`) VALUES
(25, 'Walk-in', '2019-02-12', '09:26', '90/110', '150', '37', '52', 'Mermellah Angni', 20),
(26, 'Walk-in', '2019-02-12', '08:30', '90/110', '160', '36.1', '52', 'Mermellah Angni', 23),
(27, 'Walk-in', '2019-02-12', '20:48', '89/105', '149', '36.2', '53', 'Mermellah Angni', 19);

-- --------------------------------------------------------

--
-- Table structure for table `indiv_treat_rec`
--

CREATE TABLE IF NOT EXISTS `indiv_treat_rec` (
  `itr_id` int(11) NOT NULL AUTO_INCREMENT,
  `fcr_id` int(11) DEFAULT NULL,
  `treatment_id` int(11) DEFAULT NULL,
  `ref_tran_id` int(11) DEFAULT NULL,
  `pe_id` int(11) NOT NULL,
  `added_by` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `archived_by` varchar(50) NOT NULL,
  PRIMARY KEY (`itr_id`),
  UNIQUE KEY `pe_id` (`pe_id`),
  KEY `fcr_id` (`fcr_id`),
  KEY `treatment_id` (`treatment_id`),
  KEY `ref_tran_id` (`ref_tran_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `indiv_treat_rec`
--

INSERT INTO `indiv_treat_rec` (`itr_id`, `fcr_id`, `treatment_id`, `ref_tran_id`, `pe_id`, `added_by`, `status`, `archived_by`) VALUES
(6, 25, 20, 20, 36, 'Madania Pangandaman', 'active', ''),
(7, 26, 21, 21, 37, 'Madania Pangandaman', 'active', ''),
(8, 27, 22, 22, 38, 'Madania Pangandaman', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `name`
--

CREATE TABLE IF NOT EXISTS `name` (
  `n_id` int(11) NOT NULL AUTO_INCREMENT,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `suffix` varchar(10) NOT NULL,
  PRIMARY KEY (`n_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=163 ;

--
-- Dumping data for table `name`
--

INSERT INTO `name` (`n_id`, `lname`, `fname`, `mname`, `suffix`) VALUES
(12, 'Cardo', 'Dalisay', 'Coco', ''),
(127, 'cruzsadas', 'juan', 'Coco', 'Jr'),
(128, 'Joseph', 'Cruz', 'Colina', ''),
(139, 'Pangandaman', 'Madania', 'Pangandaman', ''),
(151, 'Angni', 'Mermellah', 'Magandia', ''),
(152, 'Angni', 'Mellhakim', 'Magandia', ''),
(153, 'Angni', 'Merhannah', 'Magandia', ''),
(154, 'Angni', 'Mellhabib', 'Magandia', ''),
(155, 'Angni', 'Mernissah', 'Magandia', ''),
(156, 'Ali', 'Almira', 'Marilan', ''),
(157, 'Aba', 'Haniah', 'M.', ''),
(158, 'Marohom', 'Abdulmatin', 'A.', ''),
(159, 'Bayabao', 'Abdulracman', 'D.', ''),
(160, 'Palala', 'Abduljalil', 'M.', ''),
(161, 'Marohomsalic', 'Raihanah', 'Enriquez', ''),
(162, 'Sani', 'Jehan', 'Colmpang', '');

-- --------------------------------------------------------

--
-- Table structure for table `other_info`
--

CREATE TABLE IF NOT EXISTS `other_info` (
  `oi_id` int(11) NOT NULL AUTO_INCREMENT,
  `sex` varchar(10) DEFAULT NULL,
  `b_date` varchar(20) DEFAULT NULL,
  `b_place` varchar(30) DEFAULT NULL,
  `bloodtype` varchar(10) DEFAULT NULL,
  `civil_stat` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`oi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `other_info`
--

INSERT INTO `other_info` (`oi_id`, `sex`, `b_date`, `b_place`, `bloodtype`, `civil_stat`) VALUES
(5, 'Male', '1996-06-26', 'Tondo, Manila City', 'A', 'Single'),
(15, 'Male', '4/12/1996', 'Tondo, Manila City', 'A', 'Single'),
(16, 'Male', '7/23/1998', 'Tondo, Manila City', 'AB', 'Single'),
(27, 'female', '2019-02-06', 'Marawi City', 'AB', 'Single'),
(39, 'female', '1996-12-01', '', 'A', 'Single'),
(40, 'male', '1991-10-23', 'Marawi City', 'A', 'Single'),
(41, 'female', '1993-06-27', 'Marawi City', 'AB', 'Single'),
(42, 'male', '1995-01-28', 'Iligan City', '', 'Married'),
(43, 'female', '1998-09-27', 'Iligan City', 'AB', 'Single'),
(44, 'female', '1997-09-07', 'Cagayan de Oro', 'AB', 'Single'),
(45, 'female', '1993-10-18', 'Marawi City', '', 'Single'),
(46, 'male', '1998-07-29', 'Marawi City', 'O', 'Single'),
(47, 'male', '1995-09-15', 'Marawi City', 'AB', 'Single'),
(48, 'male', '1997-06-23', 'Marawi City', 'A', 'Single'),
(49, 'female', '1997-06-22', 'Marawi City', 'A', 'Single'),
(50, 'female', '1997-06-17', 'Marawi City', 'A', 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `patient_enrollment`
--

CREATE TABLE IF NOT EXISTS `patient_enrollment` (
  `pe_id` int(11) NOT NULL AUTO_INCREMENT,
  `family_serial_no` int(11) NOT NULL,
  `n_id` int(11) DEFAULT NULL,
  `oi_id` int(11) DEFAULT NULL,
  `ri_id` int(11) DEFAULT NULL,
  `ci_id` int(11) DEFAULT NULL,
  `ee_id` int(11) DEFAULT NULL,
  `pi_id` int(11) DEFAULT NULL,
  `added_by` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `archived_by` varchar(50) NOT NULL,
  PRIMARY KEY (`pe_id`),
  KEY `n_id` (`n_id`),
  KEY `oi_id` (`oi_id`),
  KEY `ri_id` (`ri_id`),
  KEY `ci_id` (`ci_id`),
  KEY `ec_id` (`ee_id`),
  KEY `pi_id` (`pi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `patient_enrollment`
--

INSERT INTO `patient_enrollment` (`pe_id`, `family_serial_no`, `n_id`, `oi_id`, `ri_id`, `ci_id`, `ee_id`, `pi_id`, `added_by`, `status`, `archived_by`) VALUES
(2, 123456789, 12, 5, 5, 5, 5, 5, '', 'inactive', 'Amerah Disomangcop'),
(12, 234654, 127, 15, 15, 15, 15, 15, '', 'inactive', 'Amerah Disomangcop'),
(13, 756345, 128, 16, 16, 16, 16, 16, '', 'inactive', 'Amerah Disomangcop'),
(19, 678456, 139, 27, 27, 27, 27, 27, '', 'inactive', 'Amerah Disomangcop'),
(31, 51, 151, 39, 39, 39, 39, 39, 'Amerah Disomangcop', 'active', ''),
(32, 52, 152, 40, 40, 40, 40, 40, 'Amerah Disomangcop', 'active', ''),
(33, 53, 153, 41, 41, 41, 41, 41, 'Amerah Disomangcop', 'active', ''),
(34, 54, 154, 42, 42, 42, 42, 42, 'Amerah Disomangcop', 'active', ''),
(35, 55, 155, 43, 43, 43, 43, 43, 'Amerah Disomangcop', 'active', ''),
(36, 56, 156, 44, 44, 44, 44, 44, 'Madania Pangandaman', 'active', ''),
(37, 57, 157, 45, 45, 45, 45, 45, 'Madania Pangandaman', 'active', ''),
(38, 58, 158, 46, 46, 46, 46, 46, 'Madania Pangandaman', 'active', ''),
(39, 59, 159, 47, 47, 47, 47, 47, 'Madania Pangandaman', 'active', ''),
(40, 60, 160, 48, 48, 48, 48, 48, 'Madania Pangandaman', 'active', ''),
(41, 61, 161, 49, 49, 49, 49, 49, ' Amerah Disomangcop', 'active', ''),
(42, 62, 162, 50, 50, 50, 50, 50, 'Amerah Disomangcop', 'active', '');

-- --------------------------------------------------------

--
-- Table structure for table `phil_info`
--

CREATE TABLE IF NOT EXISTS `phil_info` (
  `pi_id` int(11) NOT NULL AUTO_INCREMENT,
  `ph_member` varchar(5) DEFAULT NULL,
  `ph_no` int(11) DEFAULT NULL,
  `member_category` varchar(15) DEFAULT NULL,
  `facility_no` varchar(20) NOT NULL,
  `dswdnhts` varchar(10) NOT NULL,
  PRIMARY KEY (`pi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `phil_info`
--

INSERT INTO `phil_info` (`pi_id`, `ph_member`, `ph_no`, `member_category`, `facility_no`, `dswdnhts`) VALUES
(5, 'Yes', 9348934, 'Yes', '123asdfdfd', 'No'),
(15, 'No', 0, 'No', '123asdfdfd', 'No'),
(16, 'No', 0, 'No', '124354', 'No'),
(27, 'No', 0, 'No', '456234', 'No'),
(29, 'No', 0, 'No', '', 'No'),
(30, 'No', 0, 'No', '', 'No'),
(31, 'Yes', 20, 'Yes', '', 'No'),
(32, 'No', 0, 'No', '', 'No'),
(33, 'No', 0, 'No', '', 'No'),
(34, 'No', 0, 'No', '98', 'No'),
(35, 'No', 0, 'No', '78', 'No'),
(36, 'No', 0, 'No', '23', 'No'),
(37, 'No', 0, 'No', '', 'No'),
(38, 'No', 0, 'No', '123542', 'No'),
(39, 'No', 0, 'No', '123456', 'No'),
(40, 'No', 0, 'No', '123456', 'No'),
(41, 'None', 0, 'None', '123456', 'No'),
(42, 'No', 0, 'No', '123456', 'No'),
(43, 'No', 0, 'No', '123456', 'No'),
(44, 'No', 0, 'No', '567345', 'No'),
(45, 'No', 0, 'No', '127892', 'No'),
(46, 'No', 0, 'No', '387465', 'No'),
(47, 'No', 0, 'No', '647392', 'No'),
(48, 'No', 0, 'No', '645762', 'No'),
(49, 'No', 0, 'No', '45623', 'No'),
(50, 'No', 0, 'No', '5637', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `referral_transaction`
--

CREATE TABLE IF NOT EXISTS `referral_transaction` (
  `ref_tran_id` int(11) NOT NULL AUTO_INCREMENT,
  `referred_from` varchar(50) DEFAULT NULL,
  `referred_to` varchar(50) DEFAULT NULL,
  `reason_of_referral` text,
  `referred_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ref_tran_id`),
  KEY `ref_tran_id` (`ref_tran_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `referral_transaction`
--

INSERT INTO `referral_transaction` (`ref_tran_id`, `referred_from`, `referred_to`, `reason_of_referral`, `referred_by`) VALUES
(20, '', '', '', ''),
(21, '', '', '', ''),
(22, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `related_info`
--

CREATE TABLE IF NOT EXISTS `related_info` (
  `ri_id` int(11) NOT NULL AUTO_INCREMENT,
  `spouse_name` varchar(60) DEFAULT NULL,
  `mothers_name` varchar(60) DEFAULT NULL,
  `fam_position` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ri_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `related_info`
--

INSERT INTO `related_info` (`ri_id`, `spouse_name`, `mothers_name`, `fam_position`) VALUES
(5, 'Juana dela cruz', 'Carda Dalisay', 'Son'),
(15, 'N/A', 'Carda Dalisay', 'Son'),
(16, 'N/A', 'Josepha Cruz', 'Son'),
(27, 'N/A', 'Farida Pangandaman', 'Daughter'),
(39, '', 'Melba Angni', 'Daughter'),
(40, '', 'Melba Angni', 'Son'),
(41, '', 'Melba Angni', 'Daughter'),
(42, 'Johara Bayabao', 'Melba Angni', 'Son'),
(43, '', 'Melba Angni', 'Daughter'),
(44, '', 'Mother Ali', 'Daughter'),
(45, '', 'Mother Haniah Aba', 'Daughter'),
(46, '', 'Mrs. Marohom', 'Son'),
(47, '', 'Mrs. Bayabao', 'Son'),
(48, '', 'Mrs. Palala', 'Son'),
(49, '', 'Mrs. Marohomsalic', 'Daughter'),
(50, '', 'Mrs. Sani', 'Daughter');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `barangay` varchar(30) DEFAULT NULL,
  `no_itr` int(11) DEFAULT NULL,
  `prenatal` int(11) NOT NULL,
  `dental_care` int(11) NOT NULL,
  `child_care` int(11) NOT NULL,
  `child_nutri` int(11) NOT NULL,
  `injury` int(11) NOT NULL,
  `adult_immu` int(11) NOT NULL,
  `family_plan` int(11) NOT NULL,
  `postpartum` int(11) NOT NULL,
  `tuberculosis` int(11) NOT NULL,
  `child_immu` int(11) NOT NULL,
  `sick_child` int(11) NOT NULL,
  `firecracker_injury` int(11) NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `barangay`, `no_itr`, `prenatal`, `dental_care`, `child_care`, `child_nutri`, `injury`, `adult_immu`, `family_plan`, `postpartum`, `tuberculosis`, `child_immu`, `sick_child`, `firecracker_injury`) VALUES
(1, 'Ambolong', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'Bacolod Chico Proper', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Banga', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'Bangco', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'Banggolo Poblacion', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'Bangon', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'Biaba-Damag', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'Bito Buadi Itowa', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 'Bito Buadi Parba', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 'Bubonga Pagalamatan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 'Bubonga Lilod Madaya', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 'Boganga', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 'Boto Ambolong', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 'Bubonga Cadayonan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 'Bubong Lumbac', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 'Bubonga Marawi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(17, 'Bubonga Punod', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(18, 'Cabasaran', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(19, 'Cabingan', 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(20, 'Cadayonan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(21, 'Cadayonan I', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(22, 'Calocan East', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(23, 'Calocan West', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(24, 'Kormatan Matampay', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, 'Daguduban', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, 'Dansalan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, 'Datu Sa Dansalan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, 'Dayawan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, 'Dimaluna', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, 'Dulay', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, 'Dulay West', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, 'East Basak', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, 'Emie Punud', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, 'Fort', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, 'Gadongan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, 'Buadi Sacayo', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, 'Guimba', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(38, 'Kapantaran', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(39, 'Kilala', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(40, 'Lilod Madaya', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(41, 'Lilod Saduc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(42, 'Lomidong', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(43, 'Lumbaca Madaya', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(44, 'Lumbac Marinaut', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(45, 'Lumbaca Toros', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(46, 'Malimono', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(47, 'Basak Malutlut', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(48, 'Gadongan Mapantao', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(49, 'Amito Marantao', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(50, 'Marinaut East', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(51, 'Marinaut West', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(52, 'Matampay', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(53, 'Langcaf', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(54, 'Mipaga Proper', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(55, 'Moncado Colony', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(56, 'Moncado Kadingilan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(57, 'Moriatao Loksadato', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(58, 'Datu Naga', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(59, 'Datu Saber', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(60, 'Olawa Ambolong', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(61, 'Pagalamatan Gambai', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(62, 'Pagayawan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(63, 'Panggao Saduc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(64, 'Papandayan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(65, 'Paridi', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(66, 'Patani', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(67, 'Pindolonan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(68, 'Poona Marantao', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(69, 'Pugaan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(70, 'Rapasun MSU', 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(71, 'Raya Madaya I', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(72, 'Raya Madaya II', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(73, 'Raya Saduc', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(74, 'Rorogagus Proper', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(75, 'Rorogagus East', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(76, 'Sabala Manao', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(77, 'Sabala Manao Proper', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(78, 'Saduc Proper', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(79, 'Sagonsongan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(80, 'Sangcay Dansalan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(81, 'Somiorang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(82, 'South Madaya Proper', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(83, 'Sugod Proper', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(84, 'Tampilong', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(85, 'Timbangalan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(86, 'Tuca Ambolong', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(87, 'Tolali', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(88, 'Toros', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(89, 'Tuca Marinaut', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(90, 'Tongantongan-Tuca Timbang', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(91, 'Wawalayan Calocan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(92, 'Wawalayan Marinaut', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(93, 'Marawi Poblacion', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(94, 'Norhaya Village', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(95, 'Papandayan Caniogan', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `temp_itr`
--

CREATE TABLE IF NOT EXISTS `temp_itr` (
  `tempitr_id` int(11) NOT NULL AUTO_INCREMENT,
  `family_serial_no` int(11) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `mode_transaction` varchar(20) DEFAULT NULL,
  `date_consultation` varchar(20) DEFAULT NULL,
  `time_consultation` varchar(10) DEFAULT NULL,
  `blood_pressure` varchar(10) DEFAULT NULL,
  `temperature` varchar(15) DEFAULT NULL,
  `height` varchar(10) DEFAULT NULL,
  `weight` varchar(10) DEFAULT NULL,
  `name_of_attending` varchar(50) DEFAULT NULL,
  `nature_of_visit` varchar(25) DEFAULT NULL,
  `chief_complaints` text,
  `diagnosis` text,
  `medication` text,
  `lab_findings` text,
  `name_health_careprovider` varchar(50) DEFAULT NULL,
  `performed_lab_test` text,
  `chronic_disease` varchar(50) DEFAULT NULL,
  `referred_from` varchar(50) DEFAULT NULL,
  `referred_to` varchar(50) DEFAULT NULL,
  `reason_of_referral` varchar(50) DEFAULT NULL,
  `referred_by` varchar(50) DEFAULT NULL,
  `added_by` varchar(20) NOT NULL,
  `submitted_by` varchar(50) NOT NULL,
  PRIMARY KEY (`tempitr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_per`
--

CREATE TABLE IF NOT EXISTS `temp_per` (
  `temPER_id` int(11) NOT NULL AUTO_INCREMENT,
  `family_serial_no` int(11) NOT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `mname` varchar(20) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `b_date` varchar(25) DEFAULT NULL,
  `b_place` varchar(50) DEFAULT NULL,
  `bloodtype` varchar(15) DEFAULT NULL,
  `civil_stat` varchar(15) DEFAULT NULL,
  `spouse_name` varchar(50) DEFAULT NULL,
  `mothers_name` varchar(50) DEFAULT NULL,
  `fam_position` varchar(50) DEFAULT NULL,
  `home_no` varchar(10) DEFAULT NULL,
  `street` varchar(20) DEFAULT NULL,
  `barangay` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `educ_attainment` varchar(25) DEFAULT NULL,
  `employ_status` varchar(25) DEFAULT NULL,
  `ph_member` varchar(10) DEFAULT NULL,
  `ph_no` varchar(15) DEFAULT NULL,
  `member_category` varchar(20) DEFAULT NULL,
  `facility_no` varchar(15) DEFAULT NULL,
  `dswdnhts` varchar(5) DEFAULT NULL,
  `suffix` varchar(15) NOT NULL,
  `added_by` varchar(20) NOT NULL,
  `submitted_by` varchar(50) NOT NULL,
  PRIMARY KEY (`temPER_id`),
  UNIQUE KEY `family_serial_no` (`family_serial_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE IF NOT EXISTS `treatment` (
  `treatment_id` int(11) NOT NULL AUTO_INCREMENT,
  `nature_of_visit` varchar(25) NOT NULL,
  `chief_complaints` text,
  `diagnosis` text,
  `medication` text,
  `lab_findings` text,
  `name_health_careprovider` varchar(60) DEFAULT NULL,
  `performed_lab_test` tinytext,
  `chronic_disease` text NOT NULL,
  PRIMARY KEY (`treatment_id`),
  KEY `treatment_id` (`treatment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`treatment_id`, `nature_of_visit`, `chief_complaints`, `diagnosis`, `medication`, `lab_findings`, `name_health_careprovider`, `performed_lab_test`, `chronic_disease`) VALUES
(20, 'Injury', 'Injured', '', 'Bandaid', '', 'Anthony Ejercito', 'None', 'None'),
(21, 'Prenatal', 'Toothache', 'Cavity', 'Toothpaste', '', 'Myleen Rosette', '', 'None'),
(22, 'Adult Immunization', '', '', '', '', 'Juan Dela Cruz', '', 'None');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`ai_id`) REFERENCES `acc_info` (`ai_id`);

--
-- Constraints for table `indiv_treat_rec`
--
ALTER TABLE `indiv_treat_rec`
  ADD CONSTRAINT `fk_pe_id` FOREIGN KEY (`pe_id`) REFERENCES `patient_enrollment` (`pe_id`),
  ADD CONSTRAINT `indiv_treat_rec_ibfk_2` FOREIGN KEY (`fcr_id`) REFERENCES `for_chu_rhu` (`fcr_id`),
  ADD CONSTRAINT `indiv_treat_rec_ibfk_3` FOREIGN KEY (`treatment_id`) REFERENCES `treatment` (`treatment_id`),
  ADD CONSTRAINT `indiv_treat_rec_ibfk_4` FOREIGN KEY (`ref_tran_id`) REFERENCES `referral_transaction` (`ref_tran_id`);

--
-- Constraints for table `patient_enrollment`
--
ALTER TABLE `patient_enrollment`
  ADD CONSTRAINT `patient_enrollment_ibfk_1` FOREIGN KEY (`n_id`) REFERENCES `name` (`n_id`),
  ADD CONSTRAINT `patient_enrollment_ibfk_2` FOREIGN KEY (`oi_id`) REFERENCES `other_info` (`oi_id`),
  ADD CONSTRAINT `patient_enrollment_ibfk_3` FOREIGN KEY (`ri_id`) REFERENCES `related_info` (`ri_id`),
  ADD CONSTRAINT `patient_enrollment_ibfk_4` FOREIGN KEY (`ci_id`) REFERENCES `contact_info` (`ci_id`),
  ADD CONSTRAINT `patient_enrollment_ibfk_5` FOREIGN KEY (`ee_id`) REFERENCES `educ_employ` (`ee_id`),
  ADD CONSTRAINT `patient_enrollment_ibfk_6` FOREIGN KEY (`pi_id`) REFERENCES `phil_info` (`pi_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
