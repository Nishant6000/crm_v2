-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 07:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `optin_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `sl_no` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `login` time DEFAULT NULL,
  `log_out` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`sl_no`, `username`, `date`, `login`, `log_out`) VALUES
(5, 'nishanth_optin', '2019-08-14', '05:23:00', '08:31:00'),
(30, 'nishanth_optin', '2019-10-04', '02:47:00', '04:13:00'),
(31, 'nishanth_optin', '2019-10-07', '04:59:00', '10:09:00'),
(32, 'nishanth_optin', '2019-10-08', '12:30:00', '05:42:00'),
(33, 'nishanth_optin', '2019-10-09', '01:19:00', '00:00:00'),
(34, 'nishanth_optin', '2019-10-10', '12:53:00', '07:46:00'),
(35, 'nishanth_optin', '2019-10-11', '01:07:00', '00:00:00'),
(36, 'nishanth_optin', '2019-10-15', '01:26:00', '04:23:00'),
(37, 'nishanth_optin', '2019-10-23', '03:12:00', '00:00:00'),
(38, 'nishanth_optin', '2019-10-24', '02:23:00', '00:00:00'),
(39, 'nishanth_optin', '2019-10-25', '05:04:00', '00:00:00'),
(40, 'nishanth_optin', '2019-10-29', '04:50:00', '00:00:00'),
(41, 'nishanth_optin', '2019-10-30', '12:08:00', '00:00:00'),
(42, 'nishanth_optin', '2019-10-31', '01:54:00', '02:32:00'),
(43, 'sam_optin', '2019-10-31', '02:32:00', '02:36:00'),
(44, 'monica_optin', '2019-10-31', '02:36:00', '02:48:00'),
(45, 'nishanth_optin', '2019-11-01', '12:14:00', '00:00:00'),
(46, 'nishanth_optin', '2019-11-04', '03:00:00', '05:56:00'),
(47, 'monica_optin', '2019-11-04', '05:56:00', '00:00:00'),
(48, 'sam_optin', '2019-11-04', '06:40:00', '06:40:00'),
(49, 'nishanth_optin', '2019-11-05', '12:07:00', '00:00:00'),
(50, 'nishanth_optin', '2019-11-06', '11:45:00', '00:00:00'),
(51, 'nishanth_optin', '2019-11-07', '12:33:00', '00:00:00'),
(52, 'nishanth_optin', '2019-11-08', '12:11:00', '00:00:00'),
(53, 'nishanth_optin', '2019-11-11', '12:32:00', '00:00:00'),
(54, 'nishanth_optin', '2019-11-12', '12:07:00', '00:00:00'),
(55, 'nishanth_optin', '2019-11-13', '12:16:00', '00:00:00'),
(56, 'nishanth_optin', '2019-11-14', '12:33:00', '00:00:00'),
(57, 'nishanth_optin', '2019-11-18', '12:31:00', '00:00:00'),
(58, 'nishanth_optin', '2019-11-19', '12:42:00', '00:00:00'),
(59, 'nishanth_optin', '2019-11-21', '06:40:00', '00:00:00'),
(60, 'nishanth_optin', '2019-11-26', '04:14:00', '00:00:00'),
(61, 'nishanth_optin', '2019-12-03', '01:21:00', '00:00:00'),
(62, 'nishanth_optin', '2019-12-04', '06:04:00', '01:04:00'),
(65, 'nishanth_optin', '2019-12-05', '09:07:04', '09:08:00'),
(66, 'infant_optin', '2019-12-05', '09:43:38', '00:00:00'),
(67, 'nishanth_optin', '2019-12-06', '09:53:12', '00:00:00'),
(68, 'nishanth_optin', '2019-12-09', '05:46:44', '00:00:00'),
(69, 'nishanth_optin', '2019-12-11', '07:25:36', '00:00:00'),
(70, 'nishanth_optin', '2019-12-12', '06:51:48', '09:25:00'),
(71, 'nishanth_optin', '2019-12-16', '09:02:41', '00:00:00'),
(72, 'stanley.dave', '2019-12-18', '07:11:12', '00:00:00'),
(73, 'infant_optin', '2019-12-18', '07:39:49', '09:32:00'),
(74, 'nishanth_optin', '2019-12-18', '01:44:15', '00:00:00'),
(75, 'nishanth_optin', '2019-12-19', '11:14:55', '00:00:00'),
(76, 'nishanth_optin', '2020-01-02', '12:05:28', '12:18:00'),
(77, 'sam_optin', '2020-01-02', '12:19:15', '00:00:00'),
(78, 'nishanth_optin', '2020-02-21', '12:08:11', '12:09:00'),
(79, 'nishanth_optin', '2020-02-24', '07:22:55', '12:38:00'),
(80, 'nishanth_optin', '2020-02-25', '01:50:04', '00:00:00'),
(81, 'nishanth_optin', '2020-02-26', '10:10:42', '10:10:00'),
(82, 'nishanth_optin', '2020-02-27', '11:46:55', '06:47:00'),
(83, 'nishanth_optin', '2020-03-02', '06:34:31', '00:00:00'),
(84, 'nishanth_optin', '2020-03-04', '05:49:07', '00:00:00'),
(85, 'nishanth_optin', '2020-03-10', '08:34:47', '07:03:00'),
(86, 'nishanth_optin', '2020-03-11', '07:15:12', '00:00:00'),
(87, 'nishanth_optin', '2020-03-12', '06:57:00', '00:00:00'),
(88, 'nishanth_optin', '2020-03-17', '07:48:28', '00:00:00'),
(89, 'nishanth_optin', '2020-03-18', '09:47:19', '00:00:00'),
(90, 'nishanth_optin', '2020-03-19', '07:34:38', '00:00:00'),
(91, 'nishanth_optin', '2020-03-22', '09:59:19', '00:00:00'),
(92, 'nishanth_optin', '2020-03-23', '03:34:38', '00:00:00'),
(93, 'nishanth_optin', '2020-03-28', '03:31:29', '00:00:00'),
(94, 'nishanth_optin', '2020-03-31', '10:03:12', '00:00:00'),
(95, 'nishanth_optin', '2020-04-01', '09:41:04', '00:00:00'),
(96, 'nishanth_optin', '2020-04-02', '09:22:42', '00:00:00'),
(97, 'nishanth_optin', '2020-04-06', '02:05:36', '00:00:00'),
(98, 'nishanth_optin', '2020-05-27', '02:34:20', '00:00:00'),
(99, 'nishanth_optin', '2020-06-08', '07:54:40', '00:00:00'),
(100, 'nishanth_optin', '2020-06-09', '01:03:50', '00:00:00'),
(101, 'nishanth_optin', '2020-06-11', '11:59:01', '00:00:00'),
(102, 'nishanth_optin', '2020-06-12', '06:45:02', '00:00:00'),
(103, 'nishanth_optin', '2020-06-14', '04:28:14', '00:00:00'),
(104, 'nishanth_optin', '2020-06-15', '03:53:16', '00:00:00'),
(105, 'nishanth_optin', '2020-06-16', '05:41:06', '00:00:00'),
(106, 'nishanth_optin', '2020-06-17', '06:40:23', '00:00:00'),
(107, 'stanley.dave', '2020-06-17', '12:29:17', '00:00:00'),
(108, 'nishanth_optin', '2020-06-18', '07:03:01', '00:00:00'),
(109, 'nishanth_optin', '2020-06-19', '06:08:33', '00:00:00'),
(110, 'nishanth_optin', '2020-06-23', '09:58:08', '00:00:00'),
(111, 'nishanth_optin', '2020-06-24', '06:43:30', '00:00:00'),
(112, 'nishanth_optin', '2020-06-25', '07:10:50', '00:00:00'),
(113, 'nishanth_optin', '2020-06-26', '07:14:24', '00:00:00'),
(114, 'nishanth_optin', '2020-07-02', '08:34:20', '00:00:00'),
(115, 'nishanth_optin', '2020-07-06', '09:23:16', '00:00:00'),
(116, 'nishanth_optin', '2020-07-07', '07:59:27', '00:00:00'),
(117, 'infant_optin', '2020-07-08', '10:11:58', '00:00:00'),
(118, 'infant_optin', '2020-07-17', '11:40:24', '00:00:00'),
(119, 'infant_optin', '2020-07-20', '03:30:48', '00:00:00'),
(120, 'infant_optin', '2020-07-21', '08:26:53', '03:27:00'),
(121, 'nishanth_optin', '2020-07-21', '08:28:06', '00:00:00'),
(122, 'nishanth_optin', '2020-07-22', '03:06:44', '00:00:00'),
(123, 'nishanth_optin', '2020-07-23', '06:10:53', '00:00:00'),
(124, 'nishanth_optin', '2020-07-24', '07:57:13', '00:00:00'),
(125, 'nishanth_optin', '2020-07-27', '07:00:56', '00:00:00'),
(126, 'infant_optin', '2020-08-10', '12:49:55', '00:00:00'),
(127, 'nishanth_optin', '2020-08-10', '01:09:01', '00:00:00'),
(128, 'nishanth_optin', '2020-08-18', '02:09:00', '00:00:00'),
(129, 'nishanth_optin', '2020-08-19', '08:45:30', '00:00:00'),
(130, 'infantsales_optin', '2020-08-19', '01:27:14', '00:00:00'),
(131, 'deepa_optin', '2020-08-19', '01:42:00', '00:00:00'),
(132, 'nishanth_optin', '2020-08-20', '07:01:36', '05:09:00'),
(133, 'santosh_optin', '2020-08-26', '12:03:14', '07:36:00'),
(134, 'sam2_optin', '2020-08-27', '08:46:51', '04:46:00'),
(135, 'infantsales_optin', '2020-09-01', '10:17:40', '08:59:00'),
(136, 'santosh_optin', '2020-09-01', '10:18:04', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `sl_no` int(3) NOT NULL,
  `campaign_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `foldername` varchar(50) NOT NULL,
  `pitch` datetime DEFAULT NULL,
  `campagin_create_date` date NOT NULL,
  `schedule_time_stamp` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`sl_no`, `campaign_name`, `username`, `filename`, `foldername`, `pitch`, `campagin_create_date`, `schedule_time_stamp`) VALUES
(21, 'ford-trade-show-newyork', 'nishanth_optin', 'nishanth_optin-ford-trade-show-newyork.csv', '../optin_db_folder', '0000-00-00 00:00:00', '2019-08-16', '0000-00-00 00:00:00'),
(22, 'iot-expo-bangalore', 'nishanth_optin', 'nishanth_optin-iot-expo-bangalore.csv', '../optin_db_folder', '0000-00-00 00:00:00', '2019-08-19', '0000-00-00 00:00:00'),
(23, 'NSC-Congress-Expo-Expo', 'nishanth_optin', 'nishanth_optin-NSC-Congress-Expo-Expo.csv', '../optin_db_folder', '0000-00-00 00:00:00', '2019-09-11', '0000-00-00 00:00:00'),
(24, 'ford-trade-show-Expo', 'nishanth_optin', 'nishanth_optin-ford-trade-show-Expo.csv', '../optin_db_folder', '0000-00-00 00:00:00', '2019-09-16', '0000-00-00 00:00:00'),
(25, 'Battery-Expo-bangalore', 'nishanth_optin', 'nishanth_optin-Battery-Expo-bangalore.csv', '../optin_db_folder', '0000-00-00 00:00:00', '2019-10-04', '0000-00-00 00:00:00'),
(26, 'Technology-User-List-Technology', 'nishanth_optin', 'nishanth_optin-Technology-User-List-Technology.csv', '../optin_db_folder', '0000-00-00 00:00:00', '2019-11-26', '0000-00-00 00:00:00'),
(27, 'asxs-asd', 'nishanth_optin', 'nishanth_optin-asxs-asd.csv', '../optin_db_folder', NULL, '2019-12-05', NULL),
(28, 'Genric-industry-Technology', 'infant_optin', 'infant_optin-Genric-industry-Technology.csv', '../optin_db_folder', NULL, '2019-12-05', NULL),
(29, 'Technology-User-List-newyork', 'nishanth_optin', 'nishanth_optin-Technology-User-List-newyork.csv', '../optin_db_folder', NULL, '2019-12-11', NULL),
(30, 'edewa-wdewqe', 'nishanth_optin', 'nishanth_optin-edewa-wdewqe.csv', '../optin_db_folder', NULL, '2019-12-11', NULL),
(31, 'gfdtgx-jflf', 'nishanth_optin', 'nishanth_optin-gfdtgx-jflf.csv', '../optin_db_folder', NULL, '2019-12-12', NULL),
(32, 'ford-trade-showsada-asdsads', 'nishanth_optin', 'nishanth_optin-ford-trade-showsada-asdsads.csv', '../optin_db_folder', NULL, '2019-12-16', NULL),
(33, 'nishant-ALFA-R-bangalore-alfa', 'nishanth_optin', 'nishanth_optin-nishant-ALFA-R-bangalore-alfa.csv', '../optin_db_folder', NULL, '2019-12-16', NULL),
(34, 'Campaign-December-Industry', 'stanley.dave', 'stanley.dave-Campaign-December-Industry.csv', '../optin_db_folder', NULL, '2019-12-18', NULL),
(35, 'Expo-URL-Dec', 'infant_optin', 'infant_optin-Expo-URL-Dec.csv', '../optin_db_folder', NULL, '2019-12-18', NULL),
(36, '2020-USA-EXPO', 'nishanth_optin', 'nishanth_optin-2020-USA-EXPO.csv', '../optin_db_folder', NULL, '2020-06-17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE `captcha` (
  `sl` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `capdata` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`sl`, `name`, `capdata`) VALUES
(3, 'WEBSHARE_PROXY', '39|2020-07-23');

-- --------------------------------------------------------

--
-- Table structure for table `crm_auth`
--

CREATE TABLE `crm_auth` (
  `sl_no` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `access` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `accosiated` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crm_auth`
--

INSERT INTO `crm_auth` (`sl_no`, `username`, `password`, `access`, `status`, `designation`, `accosiated`) VALUES
(1, 'nishanth_optin', 'aW50ZWxwNA==', '1', 1, 'ADMIN', 'stanley.dave'),
(3, 'stanley.dave', 'MTIzNDU2Nw==', '1', 1, 'ADMIN', 'NA'),
(5, 'sam_optin', 'MTIzNDU2', '2', 1, 'AGENT', 'nishanth_optin'),
(6, 'monica_optin', 'MTIzNDU2', '2', 1, 'AGENT', 'nishanth_optin'),
(7, 'infant_optin', 'aW5mYW50MTIz', '3', 1, 'SALES', 'nishanth_optin'),
(22, 'infantsales_optin', 'b3B0aW5AMTA1', '3', 1, 'SALES', 'sam2_optin'),
(24, 'sam2_optin', 'b3B0aW5AMTA1', '4', 1, 'MANAGER', 'NA'),
(25, 'monica2_optin', 'b3B0aW5AMTA1', '3', 1, 'SALES', 'NA'),
(28, 'santosh_optin', 'b3B0aW5AMTA1', '2', 1, 'AGENT', 'sam2_optin'),
(30, 'sentil_optin', 'b3B0aW5AMTA1', '3', 1, 'SALES', 'NA'),
(31, 'sentil2_optin', 'b3B0aW5AMTA1', '2', 0, 'AGENT', ''),
(32, 'sample_optin', 'b3B0aW5AMTA1', '5', 1, 'SAMPLE', '');

-- --------------------------------------------------------

--
-- Table structure for table `email_db`
--

CREATE TABLE `email_db` (
  `sl_no` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `smtp` varchar(50) NOT NULL,
  `imap` varchar(50) NOT NULL,
  `signature` tinytext NOT NULL,
  `email_sent_day` int(20) DEFAULT NULL,
  `email_sent_month` int(20) DEFAULT NULL,
  `date` date NOT NULL,
  `month` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `leads_db`
--

CREATE TABLE `leads_db` (
  `sl_no` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `curl` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `phoneno` varchar(20) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `follow_up` text DEFAULT NULL,
  `closed` tinyint(1) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `date` date NOT NULL,
  `leadname` varchar(200) DEFAULT NULL,
  `file_loc` varchar(200) DEFAULT NULL,
  `comments` tinytext DEFAULT NULL,
  `samplecriteria` tinytext DEFAULT NULL,
  `samplereqdate` date DEFAULT NULL,
  `followupdate` date DEFAULT NULL,
  `actiontaken` tinyint(1) NOT NULL DEFAULT 0,
  `clientresp` tinytext DEFAULT NULL,
  `samplefile` varchar(200) DEFAULT NULL,
  `hcomments` tinytext DEFAULT NULL,
  `rschcomments` tinytext DEFAULT NULL,
  `notintrested` tinyint(1) NOT NULL DEFAULT 0,
  `closeddata` tinytext DEFAULT NULL,
  `deliverydate` date DEFAULT NULL,
  `closedsamplefile` varchar(200) DEFAULT NULL,
  `closedcontractfile` varchar(200) DEFAULT NULL,
  `industrytype` varchar(100) DEFAULT NULL,
  `delivered` tinyint(1) DEFAULT NULL,
  `routed` tinyint(1) DEFAULT 0,
  `routedto` varchar(100) DEFAULT NULL,
  `routedby` varchar(200) DEFAULT NULL,
  `closedurl` varchar(200) DEFAULT NULL,
  `closedcomm` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leads_db`
--

INSERT INTO `leads_db` (`sl_no`, `firstname`, `lastname`, `company`, `curl`, `email`, `designation`, `phoneno`, `username`, `follow_up`, `closed`, `amount`, `date`, `leadname`, `file_loc`, `comments`, `samplecriteria`, `samplereqdate`, `followupdate`, `actiontaken`, `clientresp`, `samplefile`, `hcomments`, `rschcomments`, `notintrested`, `closeddata`, `deliverydate`, `closedsamplefile`, `closedcontractfile`, `industrytype`, `delivered`, `routed`, `routedto`, `routedby`, `closedurl`, `closedcomm`) VALUES
(3, 'ALFALOX', 'SSA', 'Alfa Romeo', 'alfa.com', 'nishant6000@gmail.com', 'CFO', '2147483647', 'monica_optin', 'DCSCSSA\nDDDAFS\n\n\nADFSDFSDF', 0, 0, '2019-10-31', NULL, NULL, 'nmjmnmj|santosh_optin', 'vmh  mbhvb', '2020-08-28', '2020-08-29', 1, '|', NULL, NULL, 'sddac', 0, 'pending', NULL, NULL, NULL, NULL, NULL, 1, 'infantsales_optin', 'sam2_optin', '', ''),
(4, 'Nasa_name', 'nasa last', 'Nasa', 'nasa.com', 'rubioj@us.ibm.com', 'NSKN', '0', 'sam_optin', 'SADSADSADSADSADSA', 0, 0, '2019-10-31', 'Nasa Lead', NULL, 'Excellent Lead|nishanth_optin', '0', '0000-00-00', '2019-11-12', 1, NULL, '../optin_db_folder/infant_optin/samples/8624-1764028008resp-ac2url-infant_optin-Expo-URL-Dec (1).xlsx', NULL, NULL, 0, 'pending', NULL, NULL, NULL, NULL, NULL, 0, '0', '', '', ''),
(9, 'ASAS', 'ASA', 'ASDS', 'AZZSAS', 'nishant6000@gmail.com', 'ASA', '0', 'sam_optin', 'ASAS', 0, 0, '2019-11-04', 'NASDOK', '../optin_db_folder/sam_optin/excel-lead-resp-ac2url-nishanth_optin-Battery-Expo-bangalore.xlsx', 'nmjmnmj|santosh_optin', 'vmh  mbhvb', '2020-08-28', '2020-08-29', 1, '|', NULL, NULL, 'sddac', 0, 'pending', NULL, NULL, NULL, NULL, NULL, 1, 'infantsales_optin', 'sam2_optin', '', ''),
(10, 'AFDDF', 'AEWDEW', ' hiasdh', 'ALFA', 'stanley@optinprospects.us', 'FCADS', '0', 'nishanth_optin', 'DFCDASCFDS', 1, 1236, '2019-11-06', 'Nishant S', '../optin_db_folder/nishanth_optin/excel-lead-resp-ac2url-nishanth_optin-Battery-Expo-bangalore.xlsx', NULL, '0', '2019-11-07', '2019-11-11', 5, '|Asked To Sent Sample|aqDWDWSD|DSFDSAFDS|', '../optin_db_folder/nishanth_optin/excel-lead-resp-ac2url-nishanth_optin-Battery-Expo-bangalore.xlsx', 'move', 'sxASX', 0, 'INDUSTRY|Software-Antivirus|CEO,CFO|USA|253', '2019-11-14', 'Palakkad.xls', 'Kottayam.xls', 'INDUSTRY', 1, 0, '0', '', '', ''),
(11, 'Nishanth', 'szxsa', 'optin Prospects', 'aws', 'albert2@thetechnologyheadlines.com', 'zsxa', '0', 'nishanth_optin', 'Cadcsec', 0, 0, '2019-11-12', 'Scompany', '../optin_db_folder/nishanth_optin/excel-lead-resp-ac2url-nishanth_optin-Battery-Expo-bangalore.xlsx', NULL, '0', '2019-11-12', '2019-11-15', 1, '|', '../optin_db_folder/nishanth_optin/samples/267-resp-ac2url-nishanth_optin-Battery-Expo-bangalore.xlsx', NULL, 'Please sent it soon', 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '', '', ''),
(12, 'eternal', 'power', 'epc', 'epc', 'nishant@gmail.com', 'sss', '2147483647', 'sam2_optin', 'xwcdcdecdcd', 0, 0, '2020-08-19', 'Optin Prospects', '../optin_db_folder/sam2_optin/excel-lead-1764028008resp-ac2url-infant_optin-Expo-URL-Dec (1).xlsx', 'cdghdcdvfgbg|sam2_optin', 'swsxdx', '2020-08-26', '2020-08-27', 1, '|', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'infantsales_optin', 'sam2_optin', '', ''),
(13, 'eternal', 'power', 'epc', 'epc', 'nishant@eternalpower.co.in', 'sss@n.com', '2147483647', 'nishanth_optin', 'ssssss', 0, 0, '2020-08-20', 'ssss', '../optin_db_folder/nishanth_optin/excel-lead-1764028008resp-ac2url-infant_optin-Expo-URL-Dec.xlsx', 'assss|nishanth_optin', '0', '2020-08-20', '2020-08-22', 1, '|', '../optin_db_folder/nishanth_optin/samples/8638-1764028008resp-ac2url-infant_optin-Expo-URL-Dec.xlsx', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '', '', ''),
(14, 'eternal', 'power', 'xcadscsasc', 'epc', 'nishant@eternalpower.co.inccc', 'xccd', '2147483647', 'nishanth_optin', 'xcadcsdacxs', 0, 0, '2020-08-20', 'sxcadscsc', '../optin_db_folder/nishanth_optin/excel-lead-abemail-nishanth_optin-2020-USA-EXPO.xlsx', NULL, '0', '2020-08-20', '2020-08-22', 1, '|', '../optin_db_folder/nishanth_optin/samples/7438-Batch 1- Compliance Issue 20171.csv', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '', '', ''),
(15, 'asdwdc', 'dscdscv', 'wss', 'dscdc', 'sds', 'ascdsc', '2147483647', 'monica_optin', 'asfdwdw', 0, 0, '2020-08-20', 'qww', '../optin_db_folder/monica_optin/excel-lead-1764028008resp-ac2url-infant_optin-Expo-URL-Dec.xlsx', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '', '', ''),
(16, 'eternal', 'power', 'Nishantr ', 'S', 'nishant@eternalpower.co.inaaaaaaaaaa', 'aaaaaaaaa', '2147483647', 'nishanth_optin', 'xvzdbbfbdbdbg n', 0, 0, '2020-08-21', 'Nishant Sagar', '../optin_db_folder/nishanth_optin/excel-lead-excel-lead-1764028008resp-ac2url-infant_optin-Expo-URL-Dec (2).xlsx', ' n mb,,m|nishanth_optin', 'cdcdcd', '2020-08-21', '2020-08-23', 1, '|', '../optin_db_folder/nishanth_optin/samples/7864-excel-lead-1764028008resp-ac2url-infant_optin-Expo-URL-Dec (1).xlsx', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, '0', '', '', ''),
(17, 'sss', 'sss', 'sss', 'sss', 'sss', 'sss', '0', 'nishanth_optin', 'sssssssssssss', 1, 0, '2020-08-21', 'ssss', '../optin_db_folder/nishanth_optin/excel-lead-excel-lead-1764028008resp-ac2url-infant_optin-Expo-URL-Dec.xlsx', NULL, 'fhjfcjhlc  ijhjggv hkhjhgjgb', '2020-08-21', '2020-08-21', 3, '| b,nvj,b j,ll.hb.|', '../optin_db_folder/nishanth_optin/samples/5200-excel-lead-excel-lead-1764028008resp-ac2url-infant_optin-Expo-URL-Dec.xlsx', 'dcadvcd', 'cbn ', 1, 'EXPO|EXPO|1000', '2020-08-21', '../optin_db_folder/nishanth_optin/closed-lead-2020-08-21-5200-excel-lead-excel-lead-1764028008resp-a', '../optin_db_folder/nishanth_optin/closed-lead-2020-08-21-5200-excel-lead-excel-lead-1764028008resp-a', 'EXPO', 1, 0, '0', '', '', ''),
(18, 'eternal', 'power', 'epc', 'epc', 'nishant@eternalpower.co.inaaaaaaaa', 'aaaaaaaaaaaaaaaaaaa', '2147483647', 'infantsales_optin', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 0, 0, '2020-08-25', 'aaaaaaaa', '../optin_db_folder/infantsales_optin/excel-lead-acemail-nishanth_optin-Battery-Expo-bangalore.xlsx', 'aaaa|infantsales_optin', 'xzcdvdf', '2020-08-26', '2020-08-26', 3, '|fcDSVew|', '../optin_db_folder/sample_optin/samples/2114-5200-excel-lead-excel-lead-1764028008resp-ac2url-infant_optin-Expo-URL-Dec.xlsx', 'zav', 'Sample Not Recived', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'infantsales_optin', 'sam2_optin', '', ''),
(19, 'asdcwv', 'ascwv', 'sssadw', 'sdcdce', 'asdcw', 'sdcewd', '0', 'santosh_optin', 'ascsc', 0, 0, '2020-08-26', 'niushh', '../optin_db_folder/santosh_optin/excel-lead-5200-excel-lead-excel-lead-1764028008resp-ac2url-infant_optin-Expo-URL-Dec.xlsx', 'ZXzax|sam2_optin', 'zxsax', '2020-08-26', '2020-08-29', 1, '|', '../optin_db_folder/sample_optin/samples/8274-5200-excel-lead-excel-lead-1764028008resp-ac2url-infant_optin-Expo-URL-Dec.xlsx', NULL, 'zcd', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'infantsales_optin', 'sam2_optin', '', ''),
(20, 'Nishant', 'power', 'EPC', 'nishant', 'nishant6000@gmail.com', 'ssss', '2147483647', 'santosh_optin', 'sssssssssssssssss', 0, 0, '2020-08-27', 'EXP02020', '../optin_db_folder/santosh_optin/excel-lead-5200-excel-lead-excel-lead-1764028008resp-ac2url-infant_optin-Expo-URL-Dec.xlsx', 'nmjmnmj|santosh_optin', 'vmh  mbhvb', '2020-08-28', '2020-08-29', 1, '|', NULL, NULL, 'sddac', 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'infantsales_optin', 'sam2_optin', '', ''),
(21, 'eternal', 'power', 'epc', 'epc', 'nishant@eternalpower.co.issn', 'sssssssssssss', '2147483647', 'santosh_optin', 'dvaVawr', 0, 0, '2020-09-01', 'Optin Expo', '../optin_db_folder/santosh_optin/excel-lead-response506.xlsx', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `lead_info_table`
--

CREATE TABLE `lead_info_table` (
  `sl_no` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `associated` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_info_table`
--

INSERT INTO `lead_info_table` (`sl_no`, `name`, `username`, `password`, `email`, `contactno`, `address`, `designation`, `associated`, `status`) VALUES
(12, 'infantsales', 'infantsales_optin', 'b3B0aW5AMTA1', 'sam@optin.com', '9986879046', 'blr, india\r\nblr', 'SALES', 'sam2_optin', 1),
(14, 'sam2', 'sam2_optin', 'b3B0aW5AMTA1', 'sam@optin.com', '9986879045', 'blr, india\r\nblr', 'MANAGER', '', 0),
(15, 'monica2', 'monica2_optin', 'b3B0aW5AMTA1', 'sam@optin.com', '9986879046', 'blr, india\r\nblr', 'SALES', 'sam2_optin', 1),
(20, 'sentil', 'sentil_optin', 'b3B0aW5AMTA1', 'nishant@abc.com', 'ssss', 'no-11, 8th cross,postoffice road, ramamurthy nagar,bangalore\r\nno-11, 8th cross,postoffice road, ramamurthy nagar,bangalore', 'SALES', '', 0),
(21, 'sentil2', 'sentil2_optin', 'b3B0aW5AMTA1', 'nishant@eternalpower.co.inaaaaaaaa', '9986879045', 'no-11, 8th cross,postoffice road, ramamurthy nagar,bangalore\r\nno-11, 8th cross,postoffice road, ramamurthy nagar,bangalore', 'AGENT', '', 0),
(22, 'sample', 'sample_optin', 'b3B0aW5AMTA1', 'ssss', '9986879046', 'aaaa', 'SAMPLE', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pitch_sub`
--

CREATE TABLE `pitch_sub` (
  `sl_no` int(10) NOT NULL,
  `campaign_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `pitch` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pitch_sub`
--

INSERT INTO `pitch_sub` (`sl_no`, `campaign_name`, `user_name`, `subject`, `pitch`) VALUES
(28, 'NSC-Congress-Expo-Expo', 'nishanth_optin', 'dfsvfdg', 'dfsgfsdf'),
(30, 'ford-trade-show-newyork', 'nishanth_optin', 'SADADW', 'DADWQdwq');

-- --------------------------------------------------------

--
-- Table structure for table `proxy`
--

CREATE TABLE `proxy` (
  `sl` int(11) NOT NULL,
  `server_no` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `Serverinfo` varchar(300) DEFAULT NULL,
  `Userpass` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proxy`
--

INSERT INTO `proxy` (`sl`, `server_no`, `name`, `Serverinfo`, `Userpass`) VALUES
(5061, 1, 'WEBSHARE_PROXY', '10|500|209.127.127.61:20000|0|ACTIVE|2020-07-21', 'sbbloliv-1:h4ae5mht2yks|'),
(5062, 2, 'WEBSHARE_PROXY', '10|500|209.127.146.215:20001|10|DEACTIVE|2020-07-23', 'sbbloliv-2:h4ae5mht2yks|'),
(5063, 3, 'WEBSHARE_PROXY', '10|500|193.23.245.97:20002|10|DEACTIVE|2020-07-23', 'sbbloliv-3:h4ae5mht2yks|'),
(5064, 4, 'WEBSHARE_PROXY', '10|500|104.227.145.106:20003|10|DEACTIVE|2020-07-23', 'sbbloliv-4:h4ae5mht2yks|'),
(5065, 5, 'WEBSHARE_PROXY', '10|500|104.227.27.126:20004|10|DEACTIVE|2020-07-23', 'sbbloliv-5:h4ae5mht2yks|'),
(5066, 6, 'WEBSHARE_PROXY', '10|500|194.33.29.91:20005|10|DEACTIVE|2020-07-23', 'sbbloliv-6:h4ae5mht2yks|'),
(5067, 7, 'WEBSHARE_PROXY', '10|500|192.3.79.119:20006|10|DEACTIVE|2020-07-23', 'sbbloliv-7:h4ae5mht2yks|'),
(5068, 8, 'WEBSHARE_PROXY', '10|500|23.250.72.247:20007|10|DEACTIVE|2020-07-23', 'sbbloliv-8:h4ae5mht2yks|'),
(5069, 9, 'WEBSHARE_PROXY', '10|500|104.144.10.98:20008|10|DEACTIVE|2020-07-23', 'sbbloliv-9:h4ae5mht2yks|'),
(5070, 10, 'WEBSHARE_PROXY', '10|500|192.156.217.46:20009|11|DEACTIVE|2020-07-23', 'sbbloliv-10:h4ae5mht2yks|'),
(5071, 11, 'WEBSHARE_PROXY', '10|500|192.3.69.28:20010|10|DEACTIVE|2020-07-23', 'sbbloliv-11:h4ae5mht2yks|'),
(5072, 12, 'WEBSHARE_PROXY', '10|500|172.245.49.65:20011|10|DEACTIVE|2020-07-23', 'sbbloliv-12:h4ae5mht2yks|'),
(5073, 13, 'WEBSHARE_PROXY', '10|500|192.186.151.162:20012|10|DEACTIVE|2020-07-23', 'sbbloliv-13:h4ae5mht2yks|'),
(5074, 14, 'WEBSHARE_PROXY', '10|500|192.166.153.103:20013|10|DEACTIVE|2020-07-23', 'sbbloliv-14:h4ae5mht2yks|'),
(5075, 15, 'WEBSHARE_PROXY', '10|500|192.3.79.220:20014|10|DEACTIVE|2020-07-23', 'sbbloliv-15:h4ae5mht2yks|'),
(5076, 16, 'WEBSHARE_PROXY', '10|500|209.127.146.78:20015|10|DEACTIVE|2020-07-23', 'sbbloliv-16:h4ae5mht2yks|'),
(5077, 17, 'WEBSHARE_PROXY', '10|500|209.127.146.156:20016|10|DEACTIVE|2020-07-23', 'sbbloliv-17:h4ae5mht2yks|'),
(5078, 18, 'WEBSHARE_PROXY', '10|500|209.127.127.10:20017|10|DEACTIVE|2020-07-23', 'sbbloliv-18:h4ae5mht2yks|'),
(5079, 19, 'WEBSHARE_PROXY', '10|500|193.27.19.38:20018|10|DEACTIVE|2020-07-23', 'sbbloliv-19:h4ae5mht2yks|'),
(5080, 20, 'WEBSHARE_PROXY', '10|500|138.128.83.83:20019|10|DEACTIVE|2020-07-23', 'sbbloliv-20:h4ae5mht2yks|'),
(5081, 21, 'WEBSHARE_PROXY', '10|500|172.245.166.160:20020|10|DEACTIVE|2020-07-23', 'sbbloliv-21:h4ae5mht2yks|'),
(5082, 22, 'WEBSHARE_PROXY', '10|500|45.158.184.36:20021|10|DEACTIVE|2020-07-23', 'sbbloliv-22:h4ae5mht2yks|'),
(5083, 23, 'WEBSHARE_PROXY', '10|500|5.181.43.202:20022|11|DEACTIVE|2020-07-23', 'sbbloliv-23:h4ae5mht2yks|'),
(5084, 24, 'WEBSHARE_PROXY', '10|500|209.127.127.64:20023|10|DEACTIVE|2020-07-23', 'sbbloliv-24:h4ae5mht2yks|'),
(5085, 25, 'WEBSHARE_PROXY', '10|500|172.245.49.136:20024|10|DEACTIVE|2020-07-23', 'sbbloliv-25:h4ae5mht2yks|'),
(5086, 26, 'WEBSHARE_PROXY', '10|500|107.152.192.18:20025|10|DEACTIVE|2020-07-23', 'sbbloliv-26:h4ae5mht2yks|'),
(5087, 27, 'WEBSHARE_PROXY', '10|500|172.245.203.129:20026|10|DEACTIVE|2020-07-23', 'sbbloliv-27:h4ae5mht2yks|'),
(5088, 28, 'WEBSHARE_PROXY', '10|500|172.245.203.73:20027|10|DEACTIVE|2020-07-23', 'sbbloliv-28:h4ae5mht2yks|'),
(5089, 29, 'WEBSHARE_PROXY', '10|500|23.236.187.108:20028|10|DEACTIVE|2020-07-23', 'sbbloliv-29:h4ae5mht2yks|'),
(5090, 30, 'WEBSHARE_PROXY', '10|500|45.72.66.141:20029|10|DEACTIVE|2020-07-23', 'sbbloliv-30:h4ae5mht2yks|'),
(5091, 31, 'WEBSHARE_PROXY', '10|500|23.236.186.87:20030|10|DEACTIVE|2020-07-23', 'sbbloliv-31:h4ae5mht2yks|'),
(5092, 32, 'WEBSHARE_PROXY', '10|500|138.128.40.171:20031|10|DEACTIVE|2020-07-23', 'sbbloliv-32:h4ae5mht2yks|'),
(5093, 33, 'WEBSHARE_PROXY', '10|500|107.152.192.188:20032|10|DEACTIVE|2020-07-23', 'sbbloliv-33:h4ae5mht2yks|'),
(5094, 34, 'WEBSHARE_PROXY', '10|500|192.3.69.124:20033|10|DEACTIVE|2020-07-23', 'sbbloliv-34:h4ae5mht2yks|'),
(5095, 35, 'WEBSHARE_PROXY', '10|500|138.128.83.152:20034|10|DEACTIVE|2020-07-23', 'sbbloliv-35:h4ae5mht2yks|'),
(5096, 36, 'WEBSHARE_PROXY', '10|500|192.241.112.21:20035|10|DEACTIVE|2020-07-23', 'sbbloliv-36:h4ae5mht2yks|'),
(5097, 37, 'WEBSHARE_PROXY', '10|500|45.72.25.196:20036|10|DEACTIVE|2020-07-23', 'sbbloliv-37:h4ae5mht2yks|'),
(5098, 38, 'WEBSHARE_PROXY', '10|500|45.72.20.181:20037|10|DEACTIVE|2020-07-23', 'sbbloliv-38:h4ae5mht2yks|'),
(5099, 39, 'WEBSHARE_PROXY', '10|500|69.58.12.22:20038|10|DEACTIVE|2020-07-23', 'sbbloliv-39:h4ae5mht2yks|'),
(5100, 40, 'WEBSHARE_PROXY', '10|500|192.166.153.14:20039|5|ACTIVE|2020-07-21', 'sbbloliv-40:h4ae5mht2yks|'),
(5101, 41, 'WEBSHARE_PROXY', '10|500|45.72.82.175:20040|0|ACTIVE|2020-07-21', 'sbbloliv-41:h4ae5mht2yks|'),
(5102, 42, 'WEBSHARE_PROXY', '10|500|192.186.172.26:20041|0|ACTIVE|2020-07-21', 'sbbloliv-42:h4ae5mht2yks|'),
(5103, 43, 'WEBSHARE_PROXY', '10|500|104.144.105.13:20042|0|ACTIVE|2020-07-21', 'sbbloliv-43:h4ae5mht2yks|'),
(5104, 44, 'WEBSHARE_PROXY', '10|500|45.158.184.28:20043|0|ACTIVE|2020-07-21', 'sbbloliv-44:h4ae5mht2yks|'),
(5105, 45, 'WEBSHARE_PROXY', '10|500|45.72.66.64:20044|0|ACTIVE|2020-07-21', 'sbbloliv-45:h4ae5mht2yks|'),
(5106, 46, 'WEBSHARE_PROXY', '10|500|104.144.10.111:20045|0|ACTIVE|2020-07-21', 'sbbloliv-46:h4ae5mht2yks|'),
(5107, 47, 'WEBSHARE_PROXY', '10|500|192.3.200.49:20046|0|ACTIVE|2020-07-21', 'sbbloliv-47:h4ae5mht2yks|'),
(5108, 48, 'WEBSHARE_PROXY', '10|500|107.152.202.165:20047|0|ACTIVE|2020-07-21', 'sbbloliv-48:h4ae5mht2yks|'),
(5109, 49, 'WEBSHARE_PROXY', '10|500|192.156.217.69:20048|0|ACTIVE|2020-07-21', 'sbbloliv-49:h4ae5mht2yks|'),
(5110, 50, 'WEBSHARE_PROXY', '10|500|192.241.112.39:20049|0|ACTIVE|2020-07-21', 'sbbloliv-50:h4ae5mht2yks|'),
(5111, 51, 'WEBSHARE_PROXY', '10|500|192.3.65.153:20050|0|ACTIVE|2020-07-21', 'sbbloliv-51:h4ae5mht2yks|'),
(5112, 52, 'WEBSHARE_PROXY', '10|500|192.3.69.98:20051|0|ACTIVE|2020-07-21', 'sbbloliv-52:h4ae5mht2yks|'),
(5113, 53, 'WEBSHARE_PROXY', '10|500|192.241.112.202:20052|0|ACTIVE|2020-07-21', 'sbbloliv-53:h4ae5mht2yks|'),
(5114, 54, 'WEBSHARE_PROXY', '10|500|104.144.105.222:20053|0|ACTIVE|2020-07-21', 'sbbloliv-54:h4ae5mht2yks|'),
(5115, 55, 'WEBSHARE_PROXY', '10|500|172.245.172.194:20054|0|ACTIVE|2020-07-21', 'sbbloliv-55:h4ae5mht2yks|'),
(5116, 56, 'WEBSHARE_PROXY', '10|500|138.128.41.23:20055|0|ACTIVE|2020-07-21', 'sbbloliv-56:h4ae5mht2yks|'),
(5117, 57, 'WEBSHARE_PROXY', '10|500|209.127.127.29:20056|0|ACTIVE|2020-07-21', 'sbbloliv-57:h4ae5mht2yks|'),
(5118, 58, 'WEBSHARE_PROXY', '10|500|107.152.202.61:20057|0|ACTIVE|2020-07-21', 'sbbloliv-58:h4ae5mht2yks|'),
(5119, 59, 'WEBSHARE_PROXY', '10|500|104.144.10.218:20058|0|ACTIVE|2020-07-21', 'sbbloliv-59:h4ae5mht2yks|'),
(5120, 60, 'WEBSHARE_PROXY', '10|500|172.245.166.178:20059|0|ACTIVE|2020-07-21', 'sbbloliv-60:h4ae5mht2yks|'),
(5121, 61, 'WEBSHARE_PROXY', '10|500|23.236.186.187:20060|0|ACTIVE|2020-07-21', 'sbbloliv-61:h4ae5mht2yks|'),
(5122, 62, 'WEBSHARE_PROXY', '10|500|23.236.200.52:20061|0|ACTIVE|2020-07-21', 'sbbloliv-62:h4ae5mht2yks|'),
(5123, 63, 'WEBSHARE_PROXY', '10|500|104.144.30.141:20062|0|ACTIVE|2020-07-21', 'sbbloliv-63:h4ae5mht2yks|'),
(5124, 64, 'WEBSHARE_PROXY', '10|500|23.236.200.85:20063|0|ACTIVE|2020-07-21', 'sbbloliv-64:h4ae5mht2yks|'),
(5125, 65, 'WEBSHARE_PROXY', '10|500|104.144.30.169:20064|0|ACTIVE|2020-07-21', 'sbbloliv-65:h4ae5mht2yks|'),
(5126, 66, 'WEBSHARE_PROXY', '10|500|193.27.19.246:20065|0|ACTIVE|2020-07-21', 'sbbloliv-66:h4ae5mht2yks|'),
(5127, 67, 'WEBSHARE_PROXY', '10|500|192.186.151.12:20066|0|ACTIVE|2020-07-21', 'sbbloliv-67:h4ae5mht2yks|'),
(5128, 68, 'WEBSHARE_PROXY', '10|500|104.144.30.66:20067|0|ACTIVE|2020-07-21', 'sbbloliv-68:h4ae5mht2yks|'),
(5129, 69, 'WEBSHARE_PROXY', '10|500|107.152.202.97:20068|0|ACTIVE|2020-07-21', 'sbbloliv-69:h4ae5mht2yks|'),
(5130, 70, 'WEBSHARE_PROXY', '10|500|23.236.187.141:20069|0|ACTIVE|2020-07-21', 'sbbloliv-70:h4ae5mht2yks|'),
(5131, 71, 'WEBSHARE_PROXY', '10|500|192.227.148.55:20070|0|ACTIVE|2020-07-21', 'sbbloliv-71:h4ae5mht2yks|'),
(5132, 72, 'WEBSHARE_PROXY', '10|500|138.128.29.216:20071|0|ACTIVE|2020-07-21', 'sbbloliv-72:h4ae5mht2yks|'),
(5133, 73, 'WEBSHARE_PROXY', '10|500|172.245.172.213:20072|0|ACTIVE|2020-07-21', 'sbbloliv-73:h4ae5mht2yks|'),
(5134, 74, 'WEBSHARE_PROXY', '10|500|194.33.29.243:20073|0|ACTIVE|2020-07-21', 'sbbloliv-74:h4ae5mht2yks|'),
(5135, 75, 'WEBSHARE_PROXY', '10|500|138.128.83.214:20074|0|ACTIVE|2020-07-21', 'sbbloliv-75:h4ae5mht2yks|'),
(5136, 76, 'WEBSHARE_PROXY', '10|500|144.168.216.145:20075|0|ACTIVE|2020-07-21', 'sbbloliv-76:h4ae5mht2yks|'),
(5137, 77, 'WEBSHARE_PROXY', '10|500|192.198.103.180:20076|0|ACTIVE|2020-07-21', 'sbbloliv-77:h4ae5mht2yks|'),
(5138, 78, 'WEBSHARE_PROXY', '10|500|45.72.66.71:20077|0|ACTIVE|2020-07-21', 'sbbloliv-78:h4ae5mht2yks|'),
(5139, 79, 'WEBSHARE_PROXY', '10|500|45.130.127.126:20078|0|ACTIVE|2020-07-21', 'sbbloliv-79:h4ae5mht2yks|'),
(5140, 80, 'WEBSHARE_PROXY', '10|500|104.144.50.223:20079|0|ACTIVE|2020-07-21', 'sbbloliv-80:h4ae5mht2yks|'),
(5141, 81, 'WEBSHARE_PROXY', '10|500|138.128.41.252:20080|0|ACTIVE|2020-07-21', 'sbbloliv-81:h4ae5mht2yks|'),
(5142, 82, 'WEBSHARE_PROXY', '10|500|107.152.192.38:20081|0|ACTIVE|2020-07-21', 'sbbloliv-82:h4ae5mht2yks|'),
(5143, 83, 'WEBSHARE_PROXY', '10|500|5.181.43.59:20082|0|ACTIVE|2020-07-21', 'sbbloliv-83:h4ae5mht2yks|'),
(5144, 84, 'WEBSHARE_PROXY', '10|500|104.227.76.33:20083|0|ACTIVE|2020-07-21', 'sbbloliv-84:h4ae5mht2yks|'),
(5145, 85, 'WEBSHARE_PROXY', '10|500|138.128.41.70:20084|0|ACTIVE|2020-07-21', 'sbbloliv-85:h4ae5mht2yks|'),
(5146, 86, 'WEBSHARE_PROXY', '10|500|45.87.243.186:20085|0|ACTIVE|2020-07-21', 'sbbloliv-86:h4ae5mht2yks|'),
(5147, 87, 'WEBSHARE_PROXY', '10|500|192.241.112.97:20086|0|ACTIVE|2020-07-21', 'sbbloliv-87:h4ae5mht2yks|'),
(5148, 88, 'WEBSHARE_PROXY', '10|500|104.227.1.60:20087|0|ACTIVE|2020-07-21', 'sbbloliv-88:h4ae5mht2yks|'),
(5149, 89, 'WEBSHARE_PROXY', '10|500|138.128.83.226:20088|0|ACTIVE|2020-07-21', 'sbbloliv-89:h4ae5mht2yks|'),
(5150, 90, 'WEBSHARE_PROXY', '10|500|138.128.40.116:20089|0|ACTIVE|2020-07-21', 'sbbloliv-90:h4ae5mht2yks|'),
(5151, 91, 'WEBSHARE_PROXY', '10|500|172.245.175.177:20090|0|ACTIVE|2020-07-21', 'sbbloliv-91:h4ae5mht2yks|'),
(5152, 92, 'WEBSHARE_PROXY', '10|500|193.23.245.30:20091|0|ACTIVE|2020-07-21', 'sbbloliv-92:h4ae5mht2yks|'),
(5153, 93, 'WEBSHARE_PROXY', '10|500|192.3.65.7:20092|0|ACTIVE|2020-07-21', 'sbbloliv-93:h4ae5mht2yks|'),
(5154, 94, 'WEBSHARE_PROXY', '10|500|45.72.66.70:20093|0|ACTIVE|2020-07-21', 'sbbloliv-94:h4ae5mht2yks|'),
(5155, 95, 'WEBSHARE_PROXY', '10|500|23.236.200.125:20094|0|ACTIVE|2020-07-21', 'sbbloliv-95:h4ae5mht2yks|'),
(5156, 96, 'WEBSHARE_PROXY', '10|500|104.227.76.62:20095|0|ACTIVE|2020-07-21', 'sbbloliv-96:h4ae5mht2yks|'),
(5157, 97, 'WEBSHARE_PROXY', '10|500|23.236.187.165:20096|0|ACTIVE|2020-07-21', 'sbbloliv-97:h4ae5mht2yks|'),
(5158, 98, 'WEBSHARE_PROXY', '10|500|45.95.97.199:20097|0|ACTIVE|2020-07-21', 'sbbloliv-98:h4ae5mht2yks|'),
(5159, 99, 'WEBSHARE_PROXY', '10|500|104.227.76.188:20098|0|ACTIVE|2020-07-21', 'sbbloliv-99:h4ae5mht2yks|'),
(5160, 100, 'WEBSHARE_PROXY', '10|500|192.3.200.127:20099|0|ACTIVE|2020-07-21', 'sbbloliv-100:h4ae5mht2yks|'),
(5161, 101, 'WEBSHARE_PROXY', '10|500|45.72.25.155:20100|0|ACTIVE|2020-07-21', 'sbbloliv-101:h4ae5mht2yks|'),
(5162, 102, 'WEBSHARE_PROXY', '10|500|192.156.217.115:20101|0|ACTIVE|2020-07-21', 'sbbloliv-102:h4ae5mht2yks|'),
(5163, 103, 'WEBSHARE_PROXY', '10|500|193.27.19.163:20102|0|ACTIVE|2020-07-21', 'sbbloliv-103:h4ae5mht2yks|'),
(5164, 104, 'WEBSHARE_PROXY', '10|500|172.245.203.245:20103|0|ACTIVE|2020-07-21', 'sbbloliv-104:h4ae5mht2yks|'),
(5165, 105, 'WEBSHARE_PROXY', '10|500|192.166.153.82:20104|0|ACTIVE|2020-07-21', 'sbbloliv-105:h4ae5mht2yks|'),
(5166, 106, 'WEBSHARE_PROXY', '10|500|45.72.25.172:20105|0|ACTIVE|2020-07-21', 'sbbloliv-106:h4ae5mht2yks|'),
(5167, 107, 'WEBSHARE_PROXY', '10|500|172.245.166.91:20106|0|ACTIVE|2020-07-21', 'sbbloliv-107:h4ae5mht2yks|'),
(5168, 108, 'WEBSHARE_PROXY', '10|500|172.245.166.136:20107|0|ACTIVE|2020-07-21', 'sbbloliv-108:h4ae5mht2yks|'),
(5169, 109, 'WEBSHARE_PROXY', '10|500|209.127.143.44:20108|0|ACTIVE|2020-07-21', 'sbbloliv-109:h4ae5mht2yks|'),
(5170, 110, 'WEBSHARE_PROXY', '10|500|138.128.40.220:20109|0|ACTIVE|2020-07-21', 'sbbloliv-110:h4ae5mht2yks|'),
(5171, 111, 'WEBSHARE_PROXY', '10|500|192.3.65.179:20110|0|ACTIVE|2020-07-21', 'sbbloliv-111:h4ae5mht2yks|'),
(5172, 112, 'WEBSHARE_PROXY', '10|500|194.33.29.159:20111|0|ACTIVE|2020-07-21', 'sbbloliv-112:h4ae5mht2yks|'),
(5173, 113, 'WEBSHARE_PROXY', '10|500|23.236.200.216:20112|0|ACTIVE|2020-07-21', 'sbbloliv-113:h4ae5mht2yks|'),
(5174, 114, 'WEBSHARE_PROXY', '10|500|193.27.10.107:20113|0|ACTIVE|2020-07-21', 'sbbloliv-114:h4ae5mht2yks|'),
(5175, 115, 'WEBSHARE_PROXY', '10|500|138.128.40.235:20114|0|ACTIVE|2020-07-21', 'sbbloliv-115:h4ae5mht2yks|'),
(5176, 116, 'WEBSHARE_PROXY', '10|500|104.227.1.66:20115|0|ACTIVE|2020-07-21', 'sbbloliv-116:h4ae5mht2yks|'),
(5177, 117, 'WEBSHARE_PROXY', '10|500|172.245.203.164:20116|0|ACTIVE|2020-07-21', 'sbbloliv-117:h4ae5mht2yks|'),
(5178, 118, 'WEBSHARE_PROXY', '10|500|192.186.151.50:20117|0|ACTIVE|2020-07-21', 'sbbloliv-118:h4ae5mht2yks|'),
(5179, 119, 'WEBSHARE_PROXY', '10|500|172.245.49.83:20118|0|ACTIVE|2020-07-21', 'sbbloliv-119:h4ae5mht2yks|'),
(5180, 120, 'WEBSHARE_PROXY', '10|500|192.3.200.230:20119|0|ACTIVE|2020-07-21', 'sbbloliv-120:h4ae5mht2yks|'),
(5181, 121, 'WEBSHARE_PROXY', '10|500|45.158.184.134:20120|0|ACTIVE|2020-07-21', 'sbbloliv-121:h4ae5mht2yks|'),
(5182, 122, 'WEBSHARE_PROXY', '10|500|192.166.153.54:20121|0|ACTIVE|2020-07-21', 'sbbloliv-122:h4ae5mht2yks|'),
(5183, 123, 'WEBSHARE_PROXY', '10|500|107.152.144.79:20122|0|ACTIVE|2020-07-21', 'sbbloliv-123:h4ae5mht2yks|'),
(5184, 124, 'WEBSHARE_PROXY', '10|500|104.227.145.134:20123|0|ACTIVE|2020-07-21', 'sbbloliv-124:h4ae5mht2yks|'),
(5185, 125, 'WEBSHARE_PROXY', '10|500|45.158.184.213:20124|0|ACTIVE|2020-07-21', 'sbbloliv-125:h4ae5mht2yks|'),
(5186, 126, 'WEBSHARE_PROXY', '10|500|45.72.20.193:20125|0|ACTIVE|2020-07-21', 'sbbloliv-126:h4ae5mht2yks|'),
(5187, 127, 'WEBSHARE_PROXY', '10|500|209.127.146.138:20126|0|ACTIVE|2020-07-21', 'sbbloliv-127:h4ae5mht2yks|'),
(5188, 128, 'WEBSHARE_PROXY', '10|500|104.144.40.212:20127|0|ACTIVE|2020-07-21', 'sbbloliv-128:h4ae5mht2yks|'),
(5189, 129, 'WEBSHARE_PROXY', '10|500|138.128.40.77:20128|0|ACTIVE|2020-07-21', 'sbbloliv-129:h4ae5mht2yks|'),
(5190, 130, 'WEBSHARE_PROXY', '10|500|192.3.69.197:20129|0|ACTIVE|2020-07-21', 'sbbloliv-130:h4ae5mht2yks|'),
(5191, 131, 'WEBSHARE_PROXY', '10|500|192.3.65.49:20130|0|ACTIVE|2020-07-21', 'sbbloliv-131:h4ae5mht2yks|'),
(5192, 132, 'WEBSHARE_PROXY', '10|500|138.128.40.149:20131|0|ACTIVE|2020-07-21', 'sbbloliv-132:h4ae5mht2yks|'),
(5193, 133, 'WEBSHARE_PROXY', '10|500|104.144.105.93:20132|0|ACTIVE|2020-07-21', 'sbbloliv-133:h4ae5mht2yks|'),
(5194, 134, 'WEBSHARE_PROXY', '10|500|69.58.12.75:20133|0|ACTIVE|2020-07-21', 'sbbloliv-134:h4ae5mht2yks|'),
(5195, 135, 'WEBSHARE_PROXY', '10|500|192.166.153.83:20134|0|ACTIVE|2020-07-21', 'sbbloliv-135:h4ae5mht2yks|'),
(5196, 136, 'WEBSHARE_PROXY', '10|500|193.23.245.226:20135|0|ACTIVE|2020-07-21', 'sbbloliv-136:h4ae5mht2yks|'),
(5197, 137, 'WEBSHARE_PROXY', '10|500|107.152.202.18:20136|0|ACTIVE|2020-07-21', 'sbbloliv-137:h4ae5mht2yks|'),
(5198, 138, 'WEBSHARE_PROXY', '10|500|45.158.184.153:20137|0|ACTIVE|2020-07-21', 'sbbloliv-138:h4ae5mht2yks|'),
(5199, 139, 'WEBSHARE_PROXY', '10|500|209.127.146.165:20138|0|ACTIVE|2020-07-21', 'sbbloliv-139:h4ae5mht2yks|'),
(5200, 140, 'WEBSHARE_PROXY', '10|500|172.245.175.230:20139|0|ACTIVE|2020-07-21', 'sbbloliv-140:h4ae5mht2yks|'),
(5201, 141, 'WEBSHARE_PROXY', '10|500|172.245.172.185:20140|0|ACTIVE|2020-07-21', 'sbbloliv-141:h4ae5mht2yks|'),
(5202, 142, 'WEBSHARE_PROXY', '10|500|104.144.105.15:20141|0|ACTIVE|2020-07-21', 'sbbloliv-142:h4ae5mht2yks|'),
(5203, 143, 'WEBSHARE_PROXY', '10|500|45.130.127.153:20142|0|ACTIVE|2020-07-21', 'sbbloliv-143:h4ae5mht2yks|'),
(5204, 144, 'WEBSHARE_PROXY', '10|500|193.23.245.33:20143|0|ACTIVE|2020-07-21', 'sbbloliv-144:h4ae5mht2yks|'),
(5205, 145, 'WEBSHARE_PROXY', '10|500|172.245.175.88:20144|0|ACTIVE|2020-07-21', 'sbbloliv-145:h4ae5mht2yks|'),
(5206, 146, 'WEBSHARE_PROXY', '10|500|144.168.216.253:20145|0|ACTIVE|2020-07-21', 'sbbloliv-146:h4ae5mht2yks|'),
(5207, 147, 'WEBSHARE_PROXY', '10|500|23.236.200.201:20146|0|ACTIVE|2020-07-21', 'sbbloliv-147:h4ae5mht2yks|'),
(5208, 148, 'WEBSHARE_PROXY', '10|500|193.23.245.146:20147|0|ACTIVE|2020-07-21', 'sbbloliv-148:h4ae5mht2yks|'),
(5209, 149, 'WEBSHARE_PROXY', '10|500|45.87.243.15:20148|0|ACTIVE|2020-07-21', 'sbbloliv-149:h4ae5mht2yks|'),
(5210, 150, 'WEBSHARE_PROXY', '10|500|192.3.79.225:20149|0|ACTIVE|2020-07-21', 'sbbloliv-150:h4ae5mht2yks|'),
(5211, 151, 'WEBSHARE_PROXY', '10|500|192.198.103.156:20150|0|ACTIVE|2020-07-21', 'sbbloliv-151:h4ae5mht2yks|'),
(5212, 152, 'WEBSHARE_PROXY', '10|500|172.245.49.42:20151|0|ACTIVE|2020-07-21', 'sbbloliv-152:h4ae5mht2yks|'),
(5213, 153, 'WEBSHARE_PROXY', '10|500|107.152.192.166:20152|0|ACTIVE|2020-07-21', 'sbbloliv-153:h4ae5mht2yks|'),
(5214, 154, 'WEBSHARE_PROXY', '10|500|192.241.112.51:20153|0|ACTIVE|2020-07-21', 'sbbloliv-154:h4ae5mht2yks|'),
(5215, 155, 'WEBSHARE_PROXY', '10|500|45.130.127.132:20154|0|ACTIVE|2020-07-21', 'sbbloliv-155:h4ae5mht2yks|'),
(5216, 156, 'WEBSHARE_PROXY', '10|500|104.144.50.45:20155|0|ACTIVE|2020-07-21', 'sbbloliv-156:h4ae5mht2yks|'),
(5217, 157, 'WEBSHARE_PROXY', '10|500|23.250.34.238:20156|0|ACTIVE|2020-07-21', 'sbbloliv-157:h4ae5mht2yks|'),
(5218, 158, 'WEBSHARE_PROXY', '10|500|104.227.1.216:20157|0|ACTIVE|2020-07-21', 'sbbloliv-158:h4ae5mht2yks|'),
(5219, 159, 'WEBSHARE_PROXY', '10|500|5.181.42.189:20158|0|ACTIVE|2020-07-21', 'sbbloliv-159:h4ae5mht2yks|'),
(5220, 160, 'WEBSHARE_PROXY', '10|500|172.245.175.202:20159|0|ACTIVE|2020-07-21', 'sbbloliv-160:h4ae5mht2yks|'),
(5221, 161, 'WEBSHARE_PROXY', '10|500|192.186.172.196:20160|0|ACTIVE|2020-07-21', 'sbbloliv-161:h4ae5mht2yks|'),
(5222, 162, 'WEBSHARE_PROXY', '10|500|192.166.153.37:20161|0|ACTIVE|2020-07-21', 'sbbloliv-162:h4ae5mht2yks|'),
(5223, 163, 'WEBSHARE_PROXY', '10|500|138.128.41.147:20162|0|ACTIVE|2020-07-21', 'sbbloliv-163:h4ae5mht2yks|'),
(5224, 164, 'WEBSHARE_PROXY', '10|500|45.130.127.12:20163|0|ACTIVE|2020-07-21', 'sbbloliv-164:h4ae5mht2yks|'),
(5225, 165, 'WEBSHARE_PROXY', '10|500|45.87.243.138:20164|0|ACTIVE|2020-07-21', 'sbbloliv-165:h4ae5mht2yks|'),
(5226, 166, 'WEBSHARE_PROXY', '10|500|104.227.1.58:20165|0|ACTIVE|2020-07-21', 'sbbloliv-166:h4ae5mht2yks|'),
(5227, 167, 'WEBSHARE_PROXY', '10|500|104.144.50.30:20166|0|ACTIVE|2020-07-21', 'sbbloliv-167:h4ae5mht2yks|'),
(5228, 168, 'WEBSHARE_PROXY', '10|500|192.186.151.93:20167|0|ACTIVE|2020-07-21', 'sbbloliv-168:h4ae5mht2yks|'),
(5229, 169, 'WEBSHARE_PROXY', '10|500|192.3.200.15:20168|0|ACTIVE|2020-07-21', 'sbbloliv-169:h4ae5mht2yks|'),
(5230, 170, 'WEBSHARE_PROXY', '10|500|192.227.148.98:20169|0|ACTIVE|2020-07-21', 'sbbloliv-170:h4ae5mht2yks|'),
(5231, 171, 'WEBSHARE_PROXY', '10|500|104.227.27.80:20170|0|ACTIVE|2020-07-21', 'sbbloliv-171:h4ae5mht2yks|'),
(5232, 172, 'WEBSHARE_PROXY', '10|500|192.156.217.238:20171|0|ACTIVE|2020-07-21', 'sbbloliv-172:h4ae5mht2yks|'),
(5233, 173, 'WEBSHARE_PROXY', '10|500|172.245.175.155:20172|0|ACTIVE|2020-07-21', 'sbbloliv-173:h4ae5mht2yks|'),
(5234, 174, 'WEBSHARE_PROXY', '10|500|138.128.40.26:20173|0|ACTIVE|2020-07-21', 'sbbloliv-174:h4ae5mht2yks|'),
(5235, 175, 'WEBSHARE_PROXY', '10|500|23.236.186.201:20174|0|ACTIVE|2020-07-21', 'sbbloliv-175:h4ae5mht2yks|'),
(5236, 176, 'WEBSHARE_PROXY', '10|500|107.152.202.48:20175|0|ACTIVE|2020-07-21', 'sbbloliv-176:h4ae5mht2yks|'),
(5237, 177, 'WEBSHARE_PROXY', '10|500|192.153.171.32:20176|0|ACTIVE|2020-07-21', 'sbbloliv-177:h4ae5mht2yks|'),
(5238, 178, 'WEBSHARE_PROXY', '10|500|104.144.10.85:20177|0|ACTIVE|2020-07-21', 'sbbloliv-178:h4ae5mht2yks|'),
(5239, 179, 'WEBSHARE_PROXY', '10|500|138.128.40.6:20178|0|ACTIVE|2020-07-21', 'sbbloliv-179:h4ae5mht2yks|'),
(5240, 180, 'WEBSHARE_PROXY', '10|500|192.227.148.44:20179|0|ACTIVE|2020-07-21', 'sbbloliv-180:h4ae5mht2yks|'),
(5241, 181, 'WEBSHARE_PROXY', '10|500|104.227.76.194:20180|0|ACTIVE|2020-07-21', 'sbbloliv-181:h4ae5mht2yks|'),
(5242, 182, 'WEBSHARE_PROXY', '10|500|192.186.172.51:20181|0|ACTIVE|2020-07-21', 'sbbloliv-182:h4ae5mht2yks|'),
(5243, 183, 'WEBSHARE_PROXY', '10|500|172.245.203.173:20182|0|ACTIVE|2020-07-21', 'sbbloliv-183:h4ae5mht2yks|'),
(5244, 184, 'WEBSHARE_PROXY', '10|500|209.127.143.22:20183|0|ACTIVE|2020-07-21', 'sbbloliv-184:h4ae5mht2yks|'),
(5245, 185, 'WEBSHARE_PROXY', '10|500|192.186.151.2:20184|0|ACTIVE|2020-07-21', 'sbbloliv-185:h4ae5mht2yks|'),
(5246, 186, 'WEBSHARE_PROXY', '10|500|138.128.40.76:20185|0|ACTIVE|2020-07-21', 'sbbloliv-186:h4ae5mht2yks|'),
(5247, 187, 'WEBSHARE_PROXY', '10|500|45.57.168.52:20186|0|ACTIVE|2020-07-21', 'sbbloliv-187:h4ae5mht2yks|'),
(5248, 188, 'WEBSHARE_PROXY', '10|500|107.152.192.235:20187|0|ACTIVE|2020-07-21', 'sbbloliv-188:h4ae5mht2yks|'),
(5249, 189, 'WEBSHARE_PROXY', '10|500|23.236.187.64:20188|0|ACTIVE|2020-07-21', 'sbbloliv-189:h4ae5mht2yks|'),
(5250, 190, 'WEBSHARE_PROXY', '10|500|104.227.1.225:20189|0|ACTIVE|2020-07-21', 'sbbloliv-190:h4ae5mht2yks|'),
(5251, 191, 'WEBSHARE_PROXY', '10|500|138.128.83.84:20190|0|ACTIVE|2020-07-21', 'sbbloliv-191:h4ae5mht2yks|'),
(5252, 192, 'WEBSHARE_PROXY', '10|500|23.236.186.141:20191|0|ACTIVE|2020-07-21', 'sbbloliv-192:h4ae5mht2yks|'),
(5253, 193, 'WEBSHARE_PROXY', '10|500|138.128.83.235:20192|0|ACTIVE|2020-07-21', 'sbbloliv-193:h4ae5mht2yks|'),
(5254, 194, 'WEBSHARE_PROXY', '10|500|192.3.65.123:20193|0|ACTIVE|2020-07-21', 'sbbloliv-194:h4ae5mht2yks|'),
(5255, 195, 'WEBSHARE_PROXY', '10|500|172.245.166.112:20194|0|ACTIVE|2020-07-21', 'sbbloliv-195:h4ae5mht2yks|'),
(5256, 196, 'WEBSHARE_PROXY', '10|500|107.152.192.41:20195|0|ACTIVE|2020-07-21', 'sbbloliv-196:h4ae5mht2yks|'),
(5257, 197, 'WEBSHARE_PROXY', '10|500|209.127.127.205:20196|0|ACTIVE|2020-07-21', 'sbbloliv-197:h4ae5mht2yks|'),
(5258, 198, 'WEBSHARE_PROXY', '10|500|192.156.217.28:20197|0|ACTIVE|2020-07-21', 'sbbloliv-198:h4ae5mht2yks|'),
(5259, 199, 'WEBSHARE_PROXY', '10|500|172.245.175.73:20198|0|ACTIVE|2020-07-21', 'sbbloliv-199:h4ae5mht2yks|'),
(5260, 200, 'WEBSHARE_PROXY', '10|500|209.127.146.164:20199|0|ACTIVE|2020-07-21', 'sbbloliv-200:h4ae5mht2yks|'),
(5261, 201, 'WEBSHARE_PROXY', '10|500|209.127.127.47:20200|0|ACTIVE|2020-07-21', 'sbbloliv-201:h4ae5mht2yks|'),
(5262, 202, 'WEBSHARE_PROXY', '10|500|192.227.148.213:20201|0|ACTIVE|2020-07-21', 'sbbloliv-202:h4ae5mht2yks|'),
(5263, 203, 'WEBSHARE_PROXY', '10|500|138.128.83.65:20202|0|ACTIVE|2020-07-21', 'sbbloliv-203:h4ae5mht2yks|'),
(5264, 204, 'WEBSHARE_PROXY', '10|500|209.127.143.25:20203|0|ACTIVE|2020-07-21', 'sbbloliv-204:h4ae5mht2yks|'),
(5265, 205, 'WEBSHARE_PROXY', '10|500|172.245.175.85:20204|0|ACTIVE|2020-07-21', 'sbbloliv-205:h4ae5mht2yks|'),
(5266, 206, 'WEBSHARE_PROXY', '10|500|172.245.166.7:20205|0|ACTIVE|2020-07-21', 'sbbloliv-206:h4ae5mht2yks|'),
(5267, 207, 'WEBSHARE_PROXY', '10|500|192.186.151.248:20206|0|ACTIVE|2020-07-21', 'sbbloliv-207:h4ae5mht2yks|'),
(5268, 208, 'WEBSHARE_PROXY', '10|500|209.127.146.92:20207|0|ACTIVE|2020-07-21', 'sbbloliv-208:h4ae5mht2yks|'),
(5269, 209, 'WEBSHARE_PROXY', '10|500|104.144.10.163:20208|0|ACTIVE|2020-07-21', 'sbbloliv-209:h4ae5mht2yks|'),
(5270, 210, 'WEBSHARE_PROXY', '10|500|172.245.166.83:20209|0|ACTIVE|2020-07-21', 'sbbloliv-210:h4ae5mht2yks|'),
(5271, 211, 'WEBSHARE_PROXY', '10|500|192.241.112.66:20210|0|ACTIVE|2020-07-21', 'sbbloliv-211:h4ae5mht2yks|'),
(5272, 212, 'WEBSHARE_PROXY', '10|500|192.166.153.16:20211|0|ACTIVE|2020-07-21', 'sbbloliv-212:h4ae5mht2yks|'),
(5273, 213, 'WEBSHARE_PROXY', '10|500|45.57.168.187:20212|0|ACTIVE|2020-07-21', 'sbbloliv-213:h4ae5mht2yks|'),
(5274, 214, 'WEBSHARE_PROXY', '10|500|104.144.30.70:20213|0|ACTIVE|2020-07-21', 'sbbloliv-214:h4ae5mht2yks|'),
(5275, 215, 'WEBSHARE_PROXY', '10|500|192.3.69.249:20214|0|ACTIVE|2020-07-21', 'sbbloliv-215:h4ae5mht2yks|'),
(5276, 216, 'WEBSHARE_PROXY', '10|500|104.144.30.35:20215|0|ACTIVE|2020-07-21', 'sbbloliv-216:h4ae5mht2yks|'),
(5277, 217, 'WEBSHARE_PROXY', '10|500|172.245.49.178:20216|0|ACTIVE|2020-07-21', 'sbbloliv-217:h4ae5mht2yks|'),
(5278, 218, 'WEBSHARE_PROXY', '10|500|172.245.175.199:20217|0|ACTIVE|2020-07-21', 'sbbloliv-218:h4ae5mht2yks|'),
(5279, 219, 'WEBSHARE_PROXY', '10|500|192.186.172.11:20218|0|ACTIVE|2020-07-21', 'sbbloliv-219:h4ae5mht2yks|'),
(5280, 220, 'WEBSHARE_PROXY', '10|500|45.57.168.36:20219|0|ACTIVE|2020-07-21', 'sbbloliv-220:h4ae5mht2yks|'),
(5281, 221, 'WEBSHARE_PROXY', '10|500|192.166.153.233:20220|0|ACTIVE|2020-07-21', 'sbbloliv-221:h4ae5mht2yks|'),
(5282, 222, 'WEBSHARE_PROXY', '10|500|107.152.202.226:20221|0|ACTIVE|2020-07-21', 'sbbloliv-222:h4ae5mht2yks|'),
(5283, 223, 'WEBSHARE_PROXY', '10|500|104.144.105.182:20222|0|ACTIVE|2020-07-21', 'sbbloliv-223:h4ae5mht2yks|'),
(5284, 224, 'WEBSHARE_PROXY', '10|500|107.152.192.31:20223|0|ACTIVE|2020-07-21', 'sbbloliv-224:h4ae5mht2yks|'),
(5285, 225, 'WEBSHARE_PROXY', '10|500|194.33.29.133:20224|0|ACTIVE|2020-07-21', 'sbbloliv-225:h4ae5mht2yks|'),
(5286, 226, 'WEBSHARE_PROXY', '10|500|172.245.172.34:20225|0|ACTIVE|2020-07-21', 'sbbloliv-226:h4ae5mht2yks|'),
(5287, 227, 'WEBSHARE_PROXY', '10|500|209.127.146.253:20226|0|ACTIVE|2020-07-21', 'sbbloliv-227:h4ae5mht2yks|'),
(5288, 228, 'WEBSHARE_PROXY', '10|500|23.236.187.46:20227|0|ACTIVE|2020-07-21', 'sbbloliv-228:h4ae5mht2yks|'),
(5289, 229, 'WEBSHARE_PROXY', '10|500|104.227.1.91:20228|0|ACTIVE|2020-07-21', 'sbbloliv-229:h4ae5mht2yks|'),
(5290, 230, 'WEBSHARE_PROXY', '10|500|45.57.168.56:20229|0|ACTIVE|2020-07-21', 'sbbloliv-230:h4ae5mht2yks|'),
(5291, 231, 'WEBSHARE_PROXY', '10|500|209.127.143.0:20230|0|ACTIVE|2020-07-21', 'sbbloliv-231:h4ae5mht2yks|'),
(5292, 232, 'WEBSHARE_PROXY', '10|500|193.27.10.14:20231|0|ACTIVE|2020-07-21', 'sbbloliv-232:h4ae5mht2yks|'),
(5293, 233, 'WEBSHARE_PROXY', '10|500|45.86.247.235:20232|0|ACTIVE|2020-07-21', 'sbbloliv-233:h4ae5mht2yks|'),
(5294, 234, 'WEBSHARE_PROXY', '10|500|192.3.200.86:20233|0|ACTIVE|2020-07-21', 'sbbloliv-234:h4ae5mht2yks|'),
(5295, 235, 'WEBSHARE_PROXY', '10|500|104.227.1.203:20234|0|ACTIVE|2020-07-21', 'sbbloliv-235:h4ae5mht2yks|'),
(5296, 236, 'WEBSHARE_PROXY', '10|500|192.3.65.50:20235|0|ACTIVE|2020-07-21', 'sbbloliv-236:h4ae5mht2yks|'),
(5297, 237, 'WEBSHARE_PROXY', '10|500|209.127.143.233:20236|0|ACTIVE|2020-07-21', 'sbbloliv-237:h4ae5mht2yks|'),
(5298, 238, 'WEBSHARE_PROXY', '10|500|193.27.10.26:20237|0|ACTIVE|2020-07-21', 'sbbloliv-238:h4ae5mht2yks|'),
(5299, 239, 'WEBSHARE_PROXY', '10|500|192.241.112.149:20238|0|ACTIVE|2020-07-21', 'sbbloliv-239:h4ae5mht2yks|'),
(5300, 240, 'WEBSHARE_PROXY', '10|500|192.186.151.234:20239|0|ACTIVE|2020-07-21', 'sbbloliv-240:h4ae5mht2yks|'),
(5301, 241, 'WEBSHARE_PROXY', '10|500|23.236.200.171:20240|0|ACTIVE|2020-07-21', 'sbbloliv-241:h4ae5mht2yks|'),
(5302, 242, 'WEBSHARE_PROXY', '10|500|69.58.12.137:20241|0|ACTIVE|2020-07-21', 'sbbloliv-242:h4ae5mht2yks|'),
(5303, 243, 'WEBSHARE_PROXY', '10|500|104.227.76.218:20242|0|ACTIVE|2020-07-21', 'sbbloliv-243:h4ae5mht2yks|'),
(5304, 244, 'WEBSHARE_PROXY', '10|500|192.3.65.200:20243|0|ACTIVE|2020-07-21', 'sbbloliv-244:h4ae5mht2yks|'),
(5305, 245, 'WEBSHARE_PROXY', '10|500|104.144.105.38:20244|0|ACTIVE|2020-07-21', 'sbbloliv-245:h4ae5mht2yks|'),
(5306, 246, 'WEBSHARE_PROXY', '10|500|192.156.217.187:20245|0|ACTIVE|2020-07-21', 'sbbloliv-246:h4ae5mht2yks|'),
(5307, 247, 'WEBSHARE_PROXY', '10|500|45.158.184.5:20246|0|ACTIVE|2020-07-21', 'sbbloliv-247:h4ae5mht2yks|'),
(5308, 248, 'WEBSHARE_PROXY', '10|500|45.57.168.63:20247|0|ACTIVE|2020-07-21', 'sbbloliv-248:h4ae5mht2yks|'),
(5309, 249, 'WEBSHARE_PROXY', '10|500|23.236.186.107:20248|0|ACTIVE|2020-07-21', 'sbbloliv-249:h4ae5mht2yks|'),
(5310, 250, 'WEBSHARE_PROXY', '10|500|104.144.40.239:20249|0|ACTIVE|2020-07-21', 'sbbloliv-250:h4ae5mht2yks|'),
(5311, 251, 'WEBSHARE_PROXY', '10|500|172.245.172.244:20250|0|ACTIVE|2020-07-21', 'sbbloliv-251:h4ae5mht2yks|'),
(5312, 252, 'WEBSHARE_PROXY', '10|500|192.166.153.199:20251|0|ACTIVE|2020-07-21', 'sbbloliv-252:h4ae5mht2yks|'),
(5313, 253, 'WEBSHARE_PROXY', '10|500|104.144.30.165:20252|0|ACTIVE|2020-07-21', 'sbbloliv-253:h4ae5mht2yks|'),
(5314, 254, 'WEBSHARE_PROXY', '10|500|45.130.127.13:20253|0|ACTIVE|2020-07-21', 'sbbloliv-254:h4ae5mht2yks|'),
(5315, 255, 'WEBSHARE_PROXY', '10|500|209.127.191.225:20254|0|ACTIVE|2020-07-21', 'sbbloliv-255:h4ae5mht2yks|'),
(5316, 256, 'WEBSHARE_PROXY', '10|500|192.3.65.209:20255|0|ACTIVE|2020-07-21', 'sbbloliv-256:h4ae5mht2yks|'),
(5317, 257, 'WEBSHARE_PROXY', '10|500|107.152.202.159:20256|0|ACTIVE|2020-07-21', 'sbbloliv-257:h4ae5mht2yks|'),
(5318, 258, 'WEBSHARE_PROXY', '10|500|107.152.202.141:20257|0|ACTIVE|2020-07-21', 'sbbloliv-258:h4ae5mht2yks|'),
(5319, 259, 'WEBSHARE_PROXY', '10|500|192.166.153.132:20258|0|ACTIVE|2020-07-21', 'sbbloliv-259:h4ae5mht2yks|'),
(5320, 260, 'WEBSHARE_PROXY', '10|500|104.227.145.124:20259|0|ACTIVE|2020-07-21', 'sbbloliv-260:h4ae5mht2yks|'),
(5321, 261, 'WEBSHARE_PROXY', '10|500|192.3.79.145:20260|0|ACTIVE|2020-07-21', 'sbbloliv-261:h4ae5mht2yks|'),
(5322, 262, 'WEBSHARE_PROXY', '10|500|192.186.151.38:20261|0|ACTIVE|2020-07-21', 'sbbloliv-262:h4ae5mht2yks|'),
(5323, 263, 'WEBSHARE_PROXY', '10|500|104.227.1.109:20262|0|ACTIVE|2020-07-21', 'sbbloliv-263:h4ae5mht2yks|'),
(5324, 264, 'WEBSHARE_PROXY', '10|500|45.86.247.203:20263|0|ACTIVE|2020-07-21', 'sbbloliv-264:h4ae5mht2yks|'),
(5325, 265, 'WEBSHARE_PROXY', '10|500|104.227.76.180:20264|0|ACTIVE|2020-07-21', 'sbbloliv-265:h4ae5mht2yks|'),
(5326, 266, 'WEBSHARE_PROXY', '10|500|45.72.82.161:20265|0|ACTIVE|2020-07-21', 'sbbloliv-266:h4ae5mht2yks|'),
(5327, 267, 'WEBSHARE_PROXY', '10|500|138.128.41.26:20266|0|ACTIVE|2020-07-21', 'sbbloliv-267:h4ae5mht2yks|'),
(5328, 268, 'WEBSHARE_PROXY', '10|500|138.128.41.194:20267|0|ACTIVE|2020-07-21', 'sbbloliv-268:h4ae5mht2yks|'),
(5329, 269, 'WEBSHARE_PROXY', '10|500|193.27.21.109:20268|0|ACTIVE|2020-07-21', 'sbbloliv-269:h4ae5mht2yks|'),
(5330, 270, 'WEBSHARE_PROXY', '10|500|107.152.202.66:20269|0|ACTIVE|2020-07-21', 'sbbloliv-270:h4ae5mht2yks|'),
(5331, 271, 'WEBSHARE_PROXY', '10|500|45.158.184.184:20270|0|ACTIVE|2020-07-21', 'sbbloliv-271:h4ae5mht2yks|'),
(5332, 272, 'WEBSHARE_PROXY', '10|500|194.33.29.114:20271|0|ACTIVE|2020-07-21', 'sbbloliv-272:h4ae5mht2yks|'),
(5333, 273, 'WEBSHARE_PROXY', '10|500|104.227.76.18:20272|0|ACTIVE|2020-07-21', 'sbbloliv-273:h4ae5mht2yks|'),
(5334, 274, 'WEBSHARE_PROXY', '10|500|104.144.10.139:20273|0|ACTIVE|2020-07-21', 'sbbloliv-274:h4ae5mht2yks|'),
(5335, 275, 'WEBSHARE_PROXY', '10|500|192.3.69.146:20274|0|ACTIVE|2020-07-21', 'sbbloliv-275:h4ae5mht2yks|'),
(5336, 276, 'WEBSHARE_PROXY', '10|500|192.156.217.239:20275|0|ACTIVE|2020-07-21', 'sbbloliv-276:h4ae5mht2yks|'),
(5337, 277, 'WEBSHARE_PROXY', '10|500|209.127.138.120:20276|0|ACTIVE|2020-07-21', 'sbbloliv-277:h4ae5mht2yks|'),
(5338, 278, 'WEBSHARE_PROXY', '10|500|23.236.187.221:20277|0|ACTIVE|2020-07-21', 'sbbloliv-278:h4ae5mht2yks|'),
(5339, 279, 'WEBSHARE_PROXY', '10|500|192.3.65.22:20278|0|ACTIVE|2020-07-21', 'sbbloliv-279:h4ae5mht2yks|'),
(5340, 280, 'WEBSHARE_PROXY', '10|500|192.166.153.222:20279|0|ACTIVE|2020-07-21', 'sbbloliv-280:h4ae5mht2yks|'),
(5341, 281, 'WEBSHARE_PROXY', '10|500|193.23.245.119:20280|0|ACTIVE|2020-07-21', 'sbbloliv-281:h4ae5mht2yks|'),
(5342, 282, 'WEBSHARE_PROXY', '10|500|209.127.143.79:20281|0|ACTIVE|2020-07-21', 'sbbloliv-282:h4ae5mht2yks|'),
(5343, 283, 'WEBSHARE_PROXY', '10|500|172.245.172.4:20282|0|ACTIVE|2020-07-21', 'sbbloliv-283:h4ae5mht2yks|'),
(5344, 284, 'WEBSHARE_PROXY', '10|500|209.127.127.106:20283|0|ACTIVE|2020-07-21', 'sbbloliv-284:h4ae5mht2yks|'),
(5345, 285, 'WEBSHARE_PROXY', '10|500|144.168.241.70:20284|0|ACTIVE|2020-07-21', 'sbbloliv-285:h4ae5mht2yks|'),
(5346, 286, 'WEBSHARE_PROXY', '10|500|23.236.186.126:20285|0|ACTIVE|2020-07-21', 'sbbloliv-286:h4ae5mht2yks|'),
(5347, 287, 'WEBSHARE_PROXY', '10|500|5.181.42.207:20286|0|ACTIVE|2020-07-21', 'sbbloliv-287:h4ae5mht2yks|'),
(5348, 288, 'WEBSHARE_PROXY', '10|500|104.144.105.191:20287|0|ACTIVE|2020-07-21', 'sbbloliv-288:h4ae5mht2yks|'),
(5349, 289, 'WEBSHARE_PROXY', '10|500|23.250.99.230:20288|0|ACTIVE|2020-07-21', 'sbbloliv-289:h4ae5mht2yks|'),
(5350, 290, 'WEBSHARE_PROXY', '10|500|192.156.217.62:20289|0|ACTIVE|2020-07-21', 'sbbloliv-290:h4ae5mht2yks|'),
(5351, 291, 'WEBSHARE_PROXY', '10|500|107.152.192.201:20290|0|ACTIVE|2020-07-21', 'sbbloliv-291:h4ae5mht2yks|'),
(5352, 292, 'WEBSHARE_PROXY', '10|500|104.227.1.96:20291|0|ACTIVE|2020-07-21', 'sbbloliv-292:h4ae5mht2yks|'),
(5353, 293, 'WEBSHARE_PROXY', '10|500|23.236.186.192:20292|0|ACTIVE|2020-07-21', 'sbbloliv-293:h4ae5mht2yks|'),
(5354, 294, 'WEBSHARE_PROXY', '10|500|23.236.200.42:20293|0|ACTIVE|2020-07-21', 'sbbloliv-294:h4ae5mht2yks|'),
(5355, 295, 'WEBSHARE_PROXY', '10|500|23.236.200.251:20294|0|ACTIVE|2020-07-21', 'sbbloliv-295:h4ae5mht2yks|'),
(5356, 296, 'WEBSHARE_PROXY', '10|500|104.227.1.123:20295|0|ACTIVE|2020-07-21', 'sbbloliv-296:h4ae5mht2yks|'),
(5357, 297, 'WEBSHARE_PROXY', '10|500|23.236.200.67:20296|0|ACTIVE|2020-07-21', 'sbbloliv-297:h4ae5mht2yks|'),
(5358, 298, 'WEBSHARE_PROXY', '10|500|104.227.1.3:20297|0|ACTIVE|2020-07-21', 'sbbloliv-298:h4ae5mht2yks|'),
(5359, 299, 'WEBSHARE_PROXY', '10|500|192.241.112.113:20298|0|ACTIVE|2020-07-21', 'sbbloliv-299:h4ae5mht2yks|'),
(5360, 300, 'WEBSHARE_PROXY', '10|500|192.186.151.19:20299|0|ACTIVE|2020-07-21', 'sbbloliv-300:h4ae5mht2yks|'),
(5361, 301, 'WEBSHARE_PROXY', '10|500|209.127.143.126:20300|0|ACTIVE|2020-07-21', 'sbbloliv-301:h4ae5mht2yks|'),
(5362, 302, 'WEBSHARE_PROXY', '10|500|172.245.49.150:20301|0|ACTIVE|2020-07-21', 'sbbloliv-302:h4ae5mht2yks|'),
(5363, 303, 'WEBSHARE_PROXY', '10|500|192.156.217.193:20302|0|ACTIVE|2020-07-21', 'sbbloliv-303:h4ae5mht2yks|'),
(5364, 304, 'WEBSHARE_PROXY', '10|500|194.33.29.247:20303|0|ACTIVE|2020-07-21', 'sbbloliv-304:h4ae5mht2yks|'),
(5365, 305, 'WEBSHARE_PROXY', '10|500|23.250.34.254:20304|0|ACTIVE|2020-07-21', 'sbbloliv-305:h4ae5mht2yks|'),
(5366, 306, 'WEBSHARE_PROXY', '10|500|144.168.241.197:20305|0|ACTIVE|2020-07-21', 'sbbloliv-306:h4ae5mht2yks|'),
(5367, 307, 'WEBSHARE_PROXY', '10|500|45.72.82.204:20306|0|ACTIVE|2020-07-21', 'sbbloliv-307:h4ae5mht2yks|'),
(5368, 308, 'WEBSHARE_PROXY', '10|500|192.241.112.130:20307|0|ACTIVE|2020-07-21', 'sbbloliv-308:h4ae5mht2yks|'),
(5369, 309, 'WEBSHARE_PROXY', '10|500|104.144.30.18:20308|0|ACTIVE|2020-07-21', 'sbbloliv-309:h4ae5mht2yks|'),
(5370, 310, 'WEBSHARE_PROXY', '10|500|23.236.200.225:20309|0|ACTIVE|2020-07-21', 'sbbloliv-310:h4ae5mht2yks|'),
(5371, 311, 'WEBSHARE_PROXY', '10|500|45.72.25.225:20310|0|ACTIVE|2020-07-21', 'sbbloliv-311:h4ae5mht2yks|'),
(5372, 312, 'WEBSHARE_PROXY', '10|500|138.128.40.41:20311|0|ACTIVE|2020-07-21', 'sbbloliv-312:h4ae5mht2yks|'),
(5373, 313, 'WEBSHARE_PROXY', '10|500|209.127.191.234:20312|0|ACTIVE|2020-07-21', 'sbbloliv-313:h4ae5mht2yks|'),
(5374, 314, 'WEBSHARE_PROXY', '10|500|193.27.19.53:20313|0|ACTIVE|2020-07-21', 'sbbloliv-314:h4ae5mht2yks|'),
(5375, 315, 'WEBSHARE_PROXY', '10|500|69.58.12.234:20314|0|ACTIVE|2020-07-21', 'sbbloliv-315:h4ae5mht2yks|'),
(5376, 316, 'WEBSHARE_PROXY', '10|500|192.227.148.172:20315|0|ACTIVE|2020-07-21', 'sbbloliv-316:h4ae5mht2yks|'),
(5377, 317, 'WEBSHARE_PROXY', '10|500|192.186.151.89:20316|0|ACTIVE|2020-07-21', 'sbbloliv-317:h4ae5mht2yks|'),
(5378, 318, 'WEBSHARE_PROXY', '10|500|23.236.187.60:20317|0|ACTIVE|2020-07-21', 'sbbloliv-318:h4ae5mht2yks|'),
(5379, 319, 'WEBSHARE_PROXY', '10|500|193.27.10.73:20318|0|ACTIVE|2020-07-21', 'sbbloliv-319:h4ae5mht2yks|'),
(5380, 320, 'WEBSHARE_PROXY', '10|500|172.245.175.84:20319|0|ACTIVE|2020-07-21', 'sbbloliv-320:h4ae5mht2yks|'),
(5381, 321, 'WEBSHARE_PROXY', '10|500|104.144.30.8:20320|0|ACTIVE|2020-07-21', 'sbbloliv-321:h4ae5mht2yks|'),
(5382, 322, 'WEBSHARE_PROXY', '10|500|172.245.172.39:20321|0|ACTIVE|2020-07-21', 'sbbloliv-322:h4ae5mht2yks|'),
(5383, 323, 'WEBSHARE_PROXY', '10|500|45.87.243.24:20322|0|ACTIVE|2020-07-21', 'sbbloliv-323:h4ae5mht2yks|'),
(5384, 324, 'WEBSHARE_PROXY', '10|500|209.127.146.27:20323|0|ACTIVE|2020-07-21', 'sbbloliv-324:h4ae5mht2yks|'),
(5385, 325, 'WEBSHARE_PROXY', '10|500|192.227.148.52:20324|0|ACTIVE|2020-07-21', 'sbbloliv-325:h4ae5mht2yks|'),
(5386, 326, 'WEBSHARE_PROXY', '10|500|192.3.200.203:20325|0|ACTIVE|2020-07-21', 'sbbloliv-326:h4ae5mht2yks|'),
(5387, 327, 'WEBSHARE_PROXY', '10|500|107.152.144.224:20326|0|ACTIVE|2020-07-21', 'sbbloliv-327:h4ae5mht2yks|'),
(5388, 328, 'WEBSHARE_PROXY', '10|500|45.87.243.144:20327|0|ACTIVE|2020-07-21', 'sbbloliv-328:h4ae5mht2yks|'),
(5389, 329, 'WEBSHARE_PROXY', '10|500|104.227.145.21:20328|0|ACTIVE|2020-07-21', 'sbbloliv-329:h4ae5mht2yks|'),
(5390, 330, 'WEBSHARE_PROXY', '10|500|192.227.148.8:20329|0|ACTIVE|2020-07-21', 'sbbloliv-330:h4ae5mht2yks|'),
(5391, 331, 'WEBSHARE_PROXY', '10|500|172.245.175.9:20330|0|ACTIVE|2020-07-21', 'sbbloliv-331:h4ae5mht2yks|'),
(5392, 332, 'WEBSHARE_PROXY', '10|500|45.57.168.19:20331|0|ACTIVE|2020-07-21', 'sbbloliv-332:h4ae5mht2yks|'),
(5393, 333, 'WEBSHARE_PROXY', '10|500|45.158.184.166:20332|0|ACTIVE|2020-07-21', 'sbbloliv-333:h4ae5mht2yks|'),
(5394, 334, 'WEBSHARE_PROXY', '10|500|209.127.115.178:20333|0|ACTIVE|2020-07-21', 'sbbloliv-334:h4ae5mht2yks|'),
(5395, 335, 'WEBSHARE_PROXY', '10|500|193.27.19.169:20334|0|ACTIVE|2020-07-21', 'sbbloliv-335:h4ae5mht2yks|'),
(5396, 336, 'WEBSHARE_PROXY', '10|500|138.128.41.236:20335|0|ACTIVE|2020-07-21', 'sbbloliv-336:h4ae5mht2yks|'),
(5397, 337, 'WEBSHARE_PROXY', '10|500|209.127.146.35:20336|0|ACTIVE|2020-07-21', 'sbbloliv-337:h4ae5mht2yks|'),
(5398, 338, 'WEBSHARE_PROXY', '10|500|192.186.151.32:20337|0|ACTIVE|2020-07-21', 'sbbloliv-338:h4ae5mht2yks|'),
(5399, 339, 'WEBSHARE_PROXY', '10|500|193.27.10.120:20338|0|ACTIVE|2020-07-21', 'sbbloliv-339:h4ae5mht2yks|'),
(5400, 340, 'WEBSHARE_PROXY', '10|500|192.3.69.17:20339|0|ACTIVE|2020-07-21', 'sbbloliv-340:h4ae5mht2yks|'),
(5401, 341, 'WEBSHARE_PROXY', '10|500|45.158.184.44:20340|0|ACTIVE|2020-07-21', 'sbbloliv-341:h4ae5mht2yks|'),
(5402, 342, 'WEBSHARE_PROXY', '10|500|192.3.200.102:20341|0|ACTIVE|2020-07-21', 'sbbloliv-342:h4ae5mht2yks|'),
(5403, 343, 'WEBSHARE_PROXY', '10|500|104.144.30.170:20342|0|ACTIVE|2020-07-21', 'sbbloliv-343:h4ae5mht2yks|'),
(5404, 344, 'WEBSHARE_PROXY', '10|500|209.127.146.239:20343|0|ACTIVE|2020-07-21', 'sbbloliv-344:h4ae5mht2yks|'),
(5405, 345, 'WEBSHARE_PROXY', '10|500|192.3.65.216:20344|0|ACTIVE|2020-07-21', 'sbbloliv-345:h4ae5mht2yks|'),
(5406, 346, 'WEBSHARE_PROXY', '10|500|5.181.43.217:20345|0|ACTIVE|2020-07-21', 'sbbloliv-346:h4ae5mht2yks|'),
(5407, 347, 'WEBSHARE_PROXY', '10|500|172.245.175.94:20346|0|ACTIVE|2020-07-21', 'sbbloliv-347:h4ae5mht2yks|'),
(5408, 348, 'WEBSHARE_PROXY', '10|500|192.241.112.48:20347|0|ACTIVE|2020-07-21', 'sbbloliv-348:h4ae5mht2yks|'),
(5409, 349, 'WEBSHARE_PROXY', '10|500|45.158.184.51:20348|0|ACTIVE|2020-07-21', 'sbbloliv-349:h4ae5mht2yks|'),
(5410, 350, 'WEBSHARE_PROXY', '10|500|23.236.200.236:20349|0|ACTIVE|2020-07-21', 'sbbloliv-350:h4ae5mht2yks|'),
(5411, 351, 'WEBSHARE_PROXY', '10|500|192.241.112.107:20350|0|ACTIVE|2020-07-21', 'sbbloliv-351:h4ae5mht2yks|'),
(5412, 352, 'WEBSHARE_PROXY', '10|500|138.128.40.131:20351|0|ACTIVE|2020-07-21', 'sbbloliv-352:h4ae5mht2yks|'),
(5413, 353, 'WEBSHARE_PROXY', '10|500|193.27.10.203:20352|0|ACTIVE|2020-07-21', 'sbbloliv-353:h4ae5mht2yks|'),
(5414, 354, 'WEBSHARE_PROXY', '10|500|192.3.65.12:20353|0|ACTIVE|2020-07-21', 'sbbloliv-354:h4ae5mht2yks|'),
(5415, 355, 'WEBSHARE_PROXY', '10|500|209.127.183.246:20354|0|ACTIVE|2020-07-21', 'sbbloliv-355:h4ae5mht2yks|'),
(5416, 356, 'WEBSHARE_PROXY', '10|500|138.128.83.102:20355|0|ACTIVE|2020-07-21', 'sbbloliv-356:h4ae5mht2yks|'),
(5417, 357, 'WEBSHARE_PROXY', '10|500|172.245.49.82:20356|0|ACTIVE|2020-07-21', 'sbbloliv-357:h4ae5mht2yks|'),
(5418, 358, 'WEBSHARE_PROXY', '10|500|69.58.12.128:20357|0|ACTIVE|2020-07-21', 'sbbloliv-358:h4ae5mht2yks|'),
(5419, 359, 'WEBSHARE_PROXY', '10|500|23.236.187.137:20358|0|ACTIVE|2020-07-21', 'sbbloliv-359:h4ae5mht2yks|'),
(5420, 360, 'WEBSHARE_PROXY', '10|500|104.144.30.237:20359|0|ACTIVE|2020-07-21', 'sbbloliv-360:h4ae5mht2yks|'),
(5421, 361, 'WEBSHARE_PROXY', '10|500|23.250.34.240:20360|0|ACTIVE|2020-07-21', 'sbbloliv-361:h4ae5mht2yks|'),
(5422, 362, 'WEBSHARE_PROXY', '10|500|192.156.217.211:20361|0|ACTIVE|2020-07-21', 'sbbloliv-362:h4ae5mht2yks|'),
(5423, 363, 'WEBSHARE_PROXY', '10|500|192.186.172.49:20362|0|ACTIVE|2020-07-21', 'sbbloliv-363:h4ae5mht2yks|'),
(5424, 364, 'WEBSHARE_PROXY', '10|500|23.236.200.36:20363|0|ACTIVE|2020-07-21', 'sbbloliv-364:h4ae5mht2yks|'),
(5425, 365, 'WEBSHARE_PROXY', '10|500|45.130.127.41:20364|0|ACTIVE|2020-07-21', 'sbbloliv-365:h4ae5mht2yks|'),
(5426, 366, 'WEBSHARE_PROXY', '10|500|192.3.79.160:20365|0|ACTIVE|2020-07-21', 'sbbloliv-366:h4ae5mht2yks|'),
(5427, 367, 'WEBSHARE_PROXY', '10|500|209.127.96.147:20366|0|ACTIVE|2020-07-21', 'sbbloliv-367:h4ae5mht2yks|'),
(5428, 368, 'WEBSHARE_PROXY', '10|500|209.127.138.203:20367|0|ACTIVE|2020-07-21', 'sbbloliv-368:h4ae5mht2yks|'),
(5429, 369, 'WEBSHARE_PROXY', '10|500|194.33.29.174:20368|0|ACTIVE|2020-07-21', 'sbbloliv-369:h4ae5mht2yks|'),
(5430, 370, 'WEBSHARE_PROXY', '10|500|192.3.69.88:20369|0|ACTIVE|2020-07-21', 'sbbloliv-370:h4ae5mht2yks|'),
(5431, 371, 'WEBSHARE_PROXY', '10|500|209.127.138.80:20370|0|ACTIVE|2020-07-21', 'sbbloliv-371:h4ae5mht2yks|'),
(5432, 372, 'WEBSHARE_PROXY', '10|500|23.236.186.9:20371|0|ACTIVE|2020-07-21', 'sbbloliv-372:h4ae5mht2yks|'),
(5433, 373, 'WEBSHARE_PROXY', '10|500|192.166.153.138:20372|0|ACTIVE|2020-07-21', 'sbbloliv-373:h4ae5mht2yks|'),
(5434, 374, 'WEBSHARE_PROXY', '10|500|104.227.145.8:20373|0|ACTIVE|2020-07-21', 'sbbloliv-374:h4ae5mht2yks|'),
(5435, 375, 'WEBSHARE_PROXY', '10|500|194.33.29.156:20374|0|ACTIVE|2020-07-21', 'sbbloliv-375:h4ae5mht2yks|'),
(5436, 376, 'WEBSHARE_PROXY', '10|500|107.152.192.145:20375|0|ACTIVE|2020-07-21', 'sbbloliv-376:h4ae5mht2yks|'),
(5437, 377, 'WEBSHARE_PROXY', '10|500|209.127.146.18:20376|0|ACTIVE|2020-07-21', 'sbbloliv-377:h4ae5mht2yks|'),
(5438, 378, 'WEBSHARE_PROXY', '10|500|172.245.175.178:20377|0|ACTIVE|2020-07-21', 'sbbloliv-378:h4ae5mht2yks|'),
(5439, 379, 'WEBSHARE_PROXY', '10|500|45.57.168.196:20378|0|ACTIVE|2020-07-21', 'sbbloliv-379:h4ae5mht2yks|'),
(5440, 380, 'WEBSHARE_PROXY', '10|500|138.128.40.112:20379|0|ACTIVE|2020-07-21', 'sbbloliv-380:h4ae5mht2yks|'),
(5441, 381, 'WEBSHARE_PROXY', '10|500|209.127.115.25:20380|0|ACTIVE|2020-07-21', 'sbbloliv-381:h4ae5mht2yks|'),
(5442, 382, 'WEBSHARE_PROXY', '10|500|193.23.245.87:20381|0|ACTIVE|2020-07-21', 'sbbloliv-382:h4ae5mht2yks|'),
(5443, 383, 'WEBSHARE_PROXY', '10|500|192.3.79.35:20382|0|ACTIVE|2020-07-21', 'sbbloliv-383:h4ae5mht2yks|'),
(5444, 384, 'WEBSHARE_PROXY', '10|500|209.127.96.28:20383|0|ACTIVE|2020-07-21', 'sbbloliv-384:h4ae5mht2yks|'),
(5445, 385, 'WEBSHARE_PROXY', '10|500|193.27.21.253:20384|0|ACTIVE|2020-07-21', 'sbbloliv-385:h4ae5mht2yks|'),
(5446, 386, 'WEBSHARE_PROXY', '10|500|172.245.172.237:20385|0|ACTIVE|2020-07-21', 'sbbloliv-386:h4ae5mht2yks|'),
(5447, 387, 'WEBSHARE_PROXY', '10|500|192.186.151.179:20386|0|ACTIVE|2020-07-21', 'sbbloliv-387:h4ae5mht2yks|'),
(5448, 388, 'WEBSHARE_PROXY', '10|500|107.152.202.216:20387|0|ACTIVE|2020-07-21', 'sbbloliv-388:h4ae5mht2yks|'),
(5449, 389, 'WEBSHARE_PROXY', '10|500|23.236.200.246:20388|0|ACTIVE|2020-07-21', 'sbbloliv-389:h4ae5mht2yks|'),
(5450, 390, 'WEBSHARE_PROXY', '10|500|45.158.184.251:20389|0|ACTIVE|2020-07-21', 'sbbloliv-390:h4ae5mht2yks|'),
(5451, 391, 'WEBSHARE_PROXY', '10|500|138.128.83.155:20390|0|ACTIVE|2020-07-21', 'sbbloliv-391:h4ae5mht2yks|'),
(5452, 392, 'WEBSHARE_PROXY', '10|500|45.87.243.32:20391|0|ACTIVE|2020-07-21', 'sbbloliv-392:h4ae5mht2yks|'),
(5453, 393, 'WEBSHARE_PROXY', '10|500|192.3.69.131:20392|0|ACTIVE|2020-07-21', 'sbbloliv-393:h4ae5mht2yks|'),
(5454, 394, 'WEBSHARE_PROXY', '10|500|138.128.40.22:20393|0|ACTIVE|2020-07-21', 'sbbloliv-394:h4ae5mht2yks|'),
(5455, 395, 'WEBSHARE_PROXY', '10|500|192.227.148.218:20394|0|ACTIVE|2020-07-21', 'sbbloliv-395:h4ae5mht2yks|'),
(5456, 396, 'WEBSHARE_PROXY', '10|500|104.144.105.101:20395|0|ACTIVE|2020-07-21', 'sbbloliv-396:h4ae5mht2yks|'),
(5457, 397, 'WEBSHARE_PROXY', '10|500|209.127.146.98:20396|0|ACTIVE|2020-07-21', 'sbbloliv-397:h4ae5mht2yks|'),
(5458, 398, 'WEBSHARE_PROXY', '10|500|172.245.172.65:20397|0|ACTIVE|2020-07-21', 'sbbloliv-398:h4ae5mht2yks|'),
(5459, 399, 'WEBSHARE_PROXY', '10|500|193.23.245.130:20398|0|ACTIVE|2020-07-21', 'sbbloliv-399:h4ae5mht2yks|'),
(5460, 400, 'WEBSHARE_PROXY', '10|500|209.127.127.5:20399|0|ACTIVE|2020-07-21', 'sbbloliv-400:h4ae5mht2yks|'),
(5461, 401, 'WEBSHARE_PROXY', '10|500|192.166.153.91:20400|0|ACTIVE|2020-07-21', 'sbbloliv-401:h4ae5mht2yks|'),
(5462, 402, 'WEBSHARE_PROXY', '10|500|45.95.97.80:20401|0|ACTIVE|2020-07-21', 'sbbloliv-402:h4ae5mht2yks|'),
(5463, 403, 'WEBSHARE_PROXY', '10|500|107.152.192.135:20402|0|ACTIVE|2020-07-21', 'sbbloliv-403:h4ae5mht2yks|'),
(5464, 404, 'WEBSHARE_PROXY', '10|500|104.227.27.96:20403|0|ACTIVE|2020-07-21', 'sbbloliv-404:h4ae5mht2yks|'),
(5465, 405, 'WEBSHARE_PROXY', '10|500|193.23.245.135:20404|0|ACTIVE|2020-07-21', 'sbbloliv-405:h4ae5mht2yks|'),
(5466, 406, 'WEBSHARE_PROXY', '10|500|192.241.112.126:20405|0|ACTIVE|2020-07-21', 'sbbloliv-406:h4ae5mht2yks|'),
(5467, 407, 'WEBSHARE_PROXY', '10|500|23.250.99.199:20406|0|ACTIVE|2020-07-21', 'sbbloliv-407:h4ae5mht2yks|'),
(5468, 408, 'WEBSHARE_PROXY', '10|500|193.27.19.18:20407|0|ACTIVE|2020-07-21', 'sbbloliv-408:h4ae5mht2yks|'),
(5469, 409, 'WEBSHARE_PROXY', '10|500|172.245.49.126:20408|0|ACTIVE|2020-07-21', 'sbbloliv-409:h4ae5mht2yks|'),
(5470, 410, 'WEBSHARE_PROXY', '10|500|107.152.192.142:20409|0|ACTIVE|2020-07-21', 'sbbloliv-410:h4ae5mht2yks|'),
(5471, 411, 'WEBSHARE_PROXY', '10|500|194.33.29.170:20410|0|ACTIVE|2020-07-21', 'sbbloliv-411:h4ae5mht2yks|'),
(5472, 412, 'WEBSHARE_PROXY', '10|500|45.72.20.182:20411|0|ACTIVE|2020-07-21', 'sbbloliv-412:h4ae5mht2yks|'),
(5473, 413, 'WEBSHARE_PROXY', '10|500|192.3.200.164:20412|0|ACTIVE|2020-07-21', 'sbbloliv-413:h4ae5mht2yks|'),
(5474, 414, 'WEBSHARE_PROXY', '10|500|192.241.112.210:20413|0|ACTIVE|2020-07-21', 'sbbloliv-414:h4ae5mht2yks|'),
(5475, 415, 'WEBSHARE_PROXY', '10|500|104.227.76.53:20414|0|ACTIVE|2020-07-21', 'sbbloliv-415:h4ae5mht2yks|'),
(5476, 416, 'WEBSHARE_PROXY', '10|500|45.95.97.247:20415|0|ACTIVE|2020-07-21', 'sbbloliv-416:h4ae5mht2yks|'),
(5477, 417, 'WEBSHARE_PROXY', '10|500|23.250.34.159:20416|0|ACTIVE|2020-07-21', 'sbbloliv-417:h4ae5mht2yks|'),
(5478, 418, 'WEBSHARE_PROXY', '10|500|45.72.20.170:20417|0|ACTIVE|2020-07-21', 'sbbloliv-418:h4ae5mht2yks|'),
(5479, 419, 'WEBSHARE_PROXY', '10|500|192.241.112.173:20418|0|ACTIVE|2020-07-21', 'sbbloliv-419:h4ae5mht2yks|'),
(5480, 420, 'WEBSHARE_PROXY', '10|500|192.3.69.114:20419|0|ACTIVE|2020-07-21', 'sbbloliv-420:h4ae5mht2yks|'),
(5481, 421, 'WEBSHARE_PROXY', '10|500|104.227.145.81:20420|0|ACTIVE|2020-07-21', 'sbbloliv-421:h4ae5mht2yks|'),
(5482, 422, 'WEBSHARE_PROXY', '10|500|23.236.187.59:20421|0|ACTIVE|2020-07-21', 'sbbloliv-422:h4ae5mht2yks|'),
(5483, 423, 'WEBSHARE_PROXY', '10|500|192.156.217.149:20422|0|ACTIVE|2020-07-21', 'sbbloliv-423:h4ae5mht2yks|'),
(5484, 424, 'WEBSHARE_PROXY', '10|500|45.72.25.170:20423|0|ACTIVE|2020-07-21', 'sbbloliv-424:h4ae5mht2yks|'),
(5485, 425, 'WEBSHARE_PROXY', '10|500|209.127.191.122:20424|0|ACTIVE|2020-07-21', 'sbbloliv-425:h4ae5mht2yks|'),
(5486, 426, 'WEBSHARE_PROXY', '10|500|104.227.1.13:20425|0|ACTIVE|2020-07-21', 'sbbloliv-426:h4ae5mht2yks|'),
(5487, 427, 'WEBSHARE_PROXY', '10|500|172.245.175.26:20426|0|ACTIVE|2020-07-21', 'sbbloliv-427:h4ae5mht2yks|'),
(5488, 428, 'WEBSHARE_PROXY', '10|500|172.245.166.231:20427|0|ACTIVE|2020-07-21', 'sbbloliv-428:h4ae5mht2yks|'),
(5489, 429, 'WEBSHARE_PROXY', '10|500|172.245.172.137:20428|0|ACTIVE|2020-07-21', 'sbbloliv-429:h4ae5mht2yks|'),
(5490, 430, 'WEBSHARE_PROXY', '10|500|209.127.127.152:20429|0|ACTIVE|2020-07-21', 'sbbloliv-430:h4ae5mht2yks|'),
(5491, 431, 'WEBSHARE_PROXY', '10|500|45.87.243.16:20430|0|ACTIVE|2020-07-21', 'sbbloliv-431:h4ae5mht2yks|'),
(5492, 432, 'WEBSHARE_PROXY', '10|500|138.128.83.252:20431|0|ACTIVE|2020-07-21', 'sbbloliv-432:h4ae5mht2yks|'),
(5493, 433, 'WEBSHARE_PROXY', '10|500|104.227.145.203:20432|0|ACTIVE|2020-07-21', 'sbbloliv-433:h4ae5mht2yks|'),
(5494, 434, 'WEBSHARE_PROXY', '10|500|209.127.143.176:20433|0|ACTIVE|2020-07-21', 'sbbloliv-434:h4ae5mht2yks|'),
(5495, 435, 'WEBSHARE_PROXY', '10|500|104.227.76.182:20434|0|ACTIVE|2020-07-21', 'sbbloliv-435:h4ae5mht2yks|'),
(5496, 436, 'WEBSHARE_PROXY', '10|500|138.128.83.203:20435|0|ACTIVE|2020-07-21', 'sbbloliv-436:h4ae5mht2yks|'),
(5497, 437, 'WEBSHARE_PROXY', '10|500|45.130.127.140:20436|0|ACTIVE|2020-07-21', 'sbbloliv-437:h4ae5mht2yks|'),
(5498, 438, 'WEBSHARE_PROXY', '10|500|138.128.41.62:20437|0|ACTIVE|2020-07-21', 'sbbloliv-438:h4ae5mht2yks|'),
(5499, 439, 'WEBSHARE_PROXY', '10|500|104.144.50.106:20438|0|ACTIVE|2020-07-21', 'sbbloliv-439:h4ae5mht2yks|'),
(5500, 440, 'WEBSHARE_PROXY', '10|500|172.245.203.6:20439|0|ACTIVE|2020-07-21', 'sbbloliv-440:h4ae5mht2yks|'),
(5501, 441, 'WEBSHARE_PROXY', '10|500|144.168.241.247:20440|0|ACTIVE|2020-07-21', 'sbbloliv-441:h4ae5mht2yks|'),
(5502, 442, 'WEBSHARE_PROXY', '10|500|45.86.244.193:20441|0|ACTIVE|2020-07-21', 'sbbloliv-442:h4ae5mht2yks|'),
(5503, 443, 'WEBSHARE_PROXY', '10|500|5.181.43.116:20442|0|ACTIVE|2020-07-21', 'sbbloliv-443:h4ae5mht2yks|'),
(5504, 444, 'WEBSHARE_PROXY', '10|500|192.186.172.27:20443|0|ACTIVE|2020-07-21', 'sbbloliv-444:h4ae5mht2yks|'),
(5505, 445, 'WEBSHARE_PROXY', '10|500|138.128.29.137:20444|0|ACTIVE|2020-07-21', 'sbbloliv-445:h4ae5mht2yks|'),
(5506, 446, 'WEBSHARE_PROXY', '10|500|23.236.186.236:20445|0|ACTIVE|2020-07-21', 'sbbloliv-446:h4ae5mht2yks|'),
(5507, 447, 'WEBSHARE_PROXY', '10|500|104.227.145.29:20446|0|ACTIVE|2020-07-21', 'sbbloliv-447:h4ae5mht2yks|'),
(5508, 448, 'WEBSHARE_PROXY', '10|500|104.227.145.173:20447|0|ACTIVE|2020-07-21', 'sbbloliv-448:h4ae5mht2yks|'),
(5509, 449, 'WEBSHARE_PROXY', '10|500|192.241.112.224:20448|0|ACTIVE|2020-07-21', 'sbbloliv-449:h4ae5mht2yks|'),
(5510, 450, 'WEBSHARE_PROXY', '10|500|192.198.103.150:20449|0|ACTIVE|2020-07-21', 'sbbloliv-450:h4ae5mht2yks|'),
(5511, 451, 'WEBSHARE_PROXY', '10|500|192.156.217.120:20450|0|ACTIVE|2020-07-21', 'sbbloliv-451:h4ae5mht2yks|'),
(5512, 452, 'WEBSHARE_PROXY', '10|500|172.245.49.241:20451|0|ACTIVE|2020-07-21', 'sbbloliv-452:h4ae5mht2yks|'),
(5513, 453, 'WEBSHARE_PROXY', '10|500|172.245.175.160:20452|0|ACTIVE|2020-07-21', 'sbbloliv-453:h4ae5mht2yks|'),
(5514, 454, 'WEBSHARE_PROXY', '10|500|192.153.171.154:20453|0|ACTIVE|2020-07-21', 'sbbloliv-454:h4ae5mht2yks|'),
(5515, 455, 'WEBSHARE_PROXY', '10|500|45.57.168.156:20454|0|ACTIVE|2020-07-21', 'sbbloliv-455:h4ae5mht2yks|'),
(5516, 456, 'WEBSHARE_PROXY', '10|500|209.127.127.156:20455|0|ACTIVE|2020-07-21', 'sbbloliv-456:h4ae5mht2yks|');
INSERT INTO `proxy` (`sl`, `server_no`, `name`, `Serverinfo`, `Userpass`) VALUES
(5517, 457, 'WEBSHARE_PROXY', '10|500|104.227.1.248:20456|0|ACTIVE|2020-07-21', 'sbbloliv-457:h4ae5mht2yks|'),
(5518, 458, 'WEBSHARE_PROXY', '10|500|104.144.30.86:20457|0|ACTIVE|2020-07-21', 'sbbloliv-458:h4ae5mht2yks|'),
(5519, 459, 'WEBSHARE_PROXY', '10|500|45.57.168.104:20458|0|ACTIVE|2020-07-21', 'sbbloliv-459:h4ae5mht2yks|'),
(5520, 460, 'WEBSHARE_PROXY', '10|500|192.166.153.149:20459|0|ACTIVE|2020-07-21', 'sbbloliv-460:h4ae5mht2yks|'),
(5521, 461, 'WEBSHARE_PROXY', '10|500|172.245.172.129:20460|0|ACTIVE|2020-07-21', 'sbbloliv-461:h4ae5mht2yks|'),
(5522, 462, 'WEBSHARE_PROXY', '10|500|23.250.72.155:20461|0|ACTIVE|2020-07-21', 'sbbloliv-462:h4ae5mht2yks|'),
(5523, 463, 'WEBSHARE_PROXY', '10|500|193.27.19.181:20462|0|ACTIVE|2020-07-21', 'sbbloliv-463:h4ae5mht2yks|'),
(5524, 464, 'WEBSHARE_PROXY', '10|500|192.166.153.168:20463|0|ACTIVE|2020-07-21', 'sbbloliv-464:h4ae5mht2yks|'),
(5525, 465, 'WEBSHARE_PROXY', '10|500|209.127.127.188:20464|0|ACTIVE|2020-07-21', 'sbbloliv-465:h4ae5mht2yks|'),
(5526, 466, 'WEBSHARE_PROXY', '10|500|45.130.127.56:20465|0|ACTIVE|2020-07-21', 'sbbloliv-466:h4ae5mht2yks|'),
(5527, 467, 'WEBSHARE_PROXY', '10|500|209.127.143.221:20466|0|ACTIVE|2020-07-21', 'sbbloliv-467:h4ae5mht2yks|'),
(5528, 468, 'WEBSHARE_PROXY', '10|500|144.168.241.44:20467|0|ACTIVE|2020-07-21', 'sbbloliv-468:h4ae5mht2yks|'),
(5529, 469, 'WEBSHARE_PROXY', '10|500|104.144.30.248:20468|0|ACTIVE|2020-07-21', 'sbbloliv-469:h4ae5mht2yks|'),
(5530, 470, 'WEBSHARE_PROXY', '10|500|45.72.30.245:20469|0|ACTIVE|2020-07-21', 'sbbloliv-470:h4ae5mht2yks|'),
(5531, 471, 'WEBSHARE_PROXY', '10|500|104.144.50.191:20470|0|ACTIVE|2020-07-21', 'sbbloliv-471:h4ae5mht2yks|'),
(5532, 472, 'WEBSHARE_PROXY', '10|500|45.158.184.183:20471|0|ACTIVE|2020-07-21', 'sbbloliv-472:h4ae5mht2yks|'),
(5533, 473, 'WEBSHARE_PROXY', '10|500|107.152.202.35:20472|0|ACTIVE|2020-07-21', 'sbbloliv-473:h4ae5mht2yks|'),
(5534, 474, 'WEBSHARE_PROXY', '10|500|192.186.151.222:20473|0|ACTIVE|2020-07-21', 'sbbloliv-474:h4ae5mht2yks|'),
(5535, 475, 'WEBSHARE_PROXY', '10|500|192.3.79.4:20474|0|ACTIVE|2020-07-21', 'sbbloliv-475:h4ae5mht2yks|'),
(5536, 476, 'WEBSHARE_PROXY', '10|500|172.245.203.34:20475|0|ACTIVE|2020-07-21', 'sbbloliv-476:h4ae5mht2yks|'),
(5537, 477, 'WEBSHARE_PROXY', '10|500|107.152.202.128:20476|0|ACTIVE|2020-07-21', 'sbbloliv-477:h4ae5mht2yks|'),
(5538, 478, 'WEBSHARE_PROXY', '10|500|172.245.49.223:20477|0|ACTIVE|2020-07-21', 'sbbloliv-478:h4ae5mht2yks|'),
(5539, 479, 'WEBSHARE_PROXY', '10|500|172.245.203.16:20478|0|ACTIVE|2020-07-21', 'sbbloliv-479:h4ae5mht2yks|'),
(5540, 480, 'WEBSHARE_PROXY', '10|500|209.127.138.149:20479|0|ACTIVE|2020-07-21', 'sbbloliv-480:h4ae5mht2yks|'),
(5541, 481, 'WEBSHARE_PROXY', '10|500|193.23.245.55:20480|0|ACTIVE|2020-07-21', 'sbbloliv-481:h4ae5mht2yks|'),
(5542, 482, 'WEBSHARE_PROXY', '10|500|172.245.203.204:20481|0|ACTIVE|2020-07-21', 'sbbloliv-482:h4ae5mht2yks|'),
(5543, 483, 'WEBSHARE_PROXY', '10|500|192.241.112.211:20482|0|ACTIVE|2020-07-21', 'sbbloliv-483:h4ae5mht2yks|'),
(5544, 484, 'WEBSHARE_PROXY', '10|500|45.130.127.83:20483|0|ACTIVE|2020-07-21', 'sbbloliv-484:h4ae5mht2yks|'),
(5545, 485, 'WEBSHARE_PROXY', '10|500|45.158.184.11:20484|0|ACTIVE|2020-07-21', 'sbbloliv-485:h4ae5mht2yks|'),
(5546, 486, 'WEBSHARE_PROXY', '10|500|192.227.148.118:20485|0|ACTIVE|2020-07-21', 'sbbloliv-486:h4ae5mht2yks|'),
(5547, 487, 'WEBSHARE_PROXY', '10|500|209.127.96.114:20486|0|ACTIVE|2020-07-21', 'sbbloliv-487:h4ae5mht2yks|'),
(5548, 488, 'WEBSHARE_PROXY', '10|500|209.127.115.233:20487|0|ACTIVE|2020-07-21', 'sbbloliv-488:h4ae5mht2yks|'),
(5549, 489, 'WEBSHARE_PROXY', '10|500|192.153.171.165:20488|0|ACTIVE|2020-07-21', 'sbbloliv-489:h4ae5mht2yks|'),
(5550, 490, 'WEBSHARE_PROXY', '10|500|193.27.10.161:20489|0|ACTIVE|2020-07-21', 'sbbloliv-490:h4ae5mht2yks|'),
(5551, 491, 'WEBSHARE_PROXY', '10|500|209.127.127.90:20490|0|ACTIVE|2020-07-21', 'sbbloliv-491:h4ae5mht2yks|'),
(5552, 492, 'WEBSHARE_PROXY', '10|500|192.198.103.205:20491|0|ACTIVE|2020-07-21', 'sbbloliv-492:h4ae5mht2yks|'),
(5553, 493, 'WEBSHARE_PROXY', '10|500|193.23.245.13:20492|0|ACTIVE|2020-07-21', 'sbbloliv-493:h4ae5mht2yks|'),
(5554, 494, 'WEBSHARE_PROXY', '10|500|172.245.203.238:20493|0|ACTIVE|2020-07-21', 'sbbloliv-494:h4ae5mht2yks|'),
(5555, 495, 'WEBSHARE_PROXY', '10|500|209.127.146.234:20494|0|ACTIVE|2020-07-21', 'sbbloliv-495:h4ae5mht2yks|'),
(5556, 496, 'WEBSHARE_PROXY', '10|500|107.152.192.182:20495|0|ACTIVE|2020-07-21', 'sbbloliv-496:h4ae5mht2yks|'),
(5557, 497, 'WEBSHARE_PROXY', '10|500|45.87.243.86:20496|0|ACTIVE|2020-07-21', 'sbbloliv-497:h4ae5mht2yks|'),
(5558, 498, 'WEBSHARE_PROXY', '10|500|138.128.40.249:20497|0|ACTIVE|2020-07-21', 'sbbloliv-498:h4ae5mht2yks|'),
(5559, 499, 'WEBSHARE_PROXY', '10|500|209.127.143.215:20498|0|ACTIVE|2020-07-21', 'sbbloliv-499:h4ae5mht2yks|'),
(5560, 500, 'WEBSHARE_PROXY', '10|500|23.236.186.149:20499|0|ACTIVE|2020-07-21', 'sbbloliv-500:h4ae5mht2yks|');

-- --------------------------------------------------------

--
-- Table structure for table `routing_table`
--

CREATE TABLE `routing_table` (
  `sl_no` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `associated` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routing_table`
--

INSERT INTO `routing_table` (`sl_no`, `username`, `designation`, `associated`, `status`) VALUES
(18, 'sam2_optin', 'MANAGER', 'NA', 1),
(19, 'kiran_optin', 'AGENT', 'sam2_optin', 1),
(20, 'infantsales_optin', 'SALES', 'sam2_optin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `crm_auth`
--
ALTER TABLE `crm_auth`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `email_db`
--
ALTER TABLE `email_db`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `leads_db`
--
ALTER TABLE `leads_db`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `lead_info_table`
--
ALTER TABLE `lead_info_table`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `pitch_sub`
--
ALTER TABLE `pitch_sub`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `proxy`
--
ALTER TABLE `proxy`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `routing_table`
--
ALTER TABLE `routing_table`
  ADD PRIMARY KEY (`sl_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `sl_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `sl_no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crm_auth`
--
ALTER TABLE `crm_auth`
  MODIFY `sl_no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `email_db`
--
ALTER TABLE `email_db`
  MODIFY `sl_no` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads_db`
--
ALTER TABLE `leads_db`
  MODIFY `sl_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `lead_info_table`
--
ALTER TABLE `lead_info_table`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pitch_sub`
--
ALTER TABLE `pitch_sub`
  MODIFY `sl_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `proxy`
--
ALTER TABLE `proxy`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5561;

--
-- AUTO_INCREMENT for table `routing_table`
--
ALTER TABLE `routing_table`
  MODIFY `sl_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
