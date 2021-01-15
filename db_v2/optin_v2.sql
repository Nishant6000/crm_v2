-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 09:07 PM
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
-- Database: `optin_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE `campaign` (
  `sl_no` int(3) NOT NULL,
  `campaign_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fileloc` varchar(100) DEFAULT NULL,
  `fileuploaded_time` datetime NOT NULL DEFAULT current_timestamp(),
  `email_gathering` int(20) DEFAULT NULL,
  `mailvalidation` int(20) DEFAULT NULL,
  `output_fileloc` varchar(200) DEFAULT NULL,
  `percentage1` int(11) NOT NULL DEFAULT 0,
  `percentage2` int(11) NOT NULL DEFAULT 0,
  `percentage3` int(11) NOT NULL,
  `tmpcsvfileloc` varchar(200) DEFAULT NULL,
  `typeofsearch` varchar(10) DEFAULT NULL,
  `filecompletedate` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `error_msg` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign`
--

INSERT INTO `campaign` (`sl_no`, `campaign_name`, `username`, `fileloc`, `fileuploaded_time`, `email_gathering`, `mailvalidation`, `output_fileloc`, `percentage1`, `percentage2`, `percentage3`, `tmpcsvfileloc`, `typeofsearch`, `filecompletedate`, `status`, `error_msg`) VALUES
(85, 'Bulk-Search', 'nishanth_optin', '../campagin_db_v2/nishanth_optin/firstbulk.xlsx', '2021-01-14 11:01:59', 2, NULL, NULL, 100, 100, 100, './optin_db_folder_v2/nishanth_optin/abemail-Bulk-Search-22-firstbulk.xlsx', 'BULK', '2021-01-15 03:03:15', 1, 'Data Saved Successfully');

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
(12, 'WEBSHARE_PROXY', '54|2021-01-15');

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
(9061, 1, 'WEBSHARE_PROXY', '10|500|192.186.151.40:8541|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9062, 2, 'WEBSHARE_PROXY', '10|500|45.72.40.128:9222|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9063, 3, 'WEBSHARE_PROXY', '10|500|209.127.170.111:8204|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9064, 4, 'WEBSHARE_PROXY', '10|500|45.95.97.247:8747|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9065, 5, 'WEBSHARE_PROXY', '10|500|209.127.143.234:8333|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9066, 6, 'WEBSHARE_PROXY', '10|500|104.227.13.41:8600|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9067, 7, 'WEBSHARE_PROXY', '10|500|104.227.100.130:8211|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9068, 8, 'WEBSHARE_PROXY', '10|500|192.156.217.149:7223|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9069, 9, 'WEBSHARE_PROXY', '10|500|209.127.191.122:9221|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9070, 10, 'WEBSHARE_PROXY', '10|500|209.127.170.217:8310|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9071, 11, 'WEBSHARE_PROXY', '10|500|209.127.165.239:7331|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9072, 12, 'WEBSHARE_PROXY', '10|500|138.128.78.167:7253|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9073, 13, 'WEBSHARE_PROXY', '10|500|69.58.12.165:8170|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9074, 14, 'WEBSHARE_PROXY', '10|500|104.227.120.123:7197|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9075, 15, 'WEBSHARE_PROXY', '10|500|23.236.183.22:8593|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9076, 16, 'WEBSHARE_PROXY', '10|500|138.128.107.104:8693|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9077, 17, 'WEBSHARE_PROXY', '10|500|45.72.119.174:9250|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9078, 18, 'WEBSHARE_PROXY', '10|500|104.227.223.231:8318|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9079, 19, 'WEBSHARE_PROXY', '10|500|45.72.65.55:8638|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9080, 20, 'WEBSHARE_PROXY', '10|500|138.128.97.169:7759|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9081, 21, 'WEBSHARE_PROXY', '10|500|45.87.243.16:6018|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9082, 22, 'WEBSHARE_PROXY', '10|500|209.127.165.35:7127|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9083, 23, 'WEBSHARE_PROXY', '10|500|45.155.70.212:8222|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9084, 24, 'WEBSHARE_PROXY', '10|500|45.130.127.140:8144|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9085, 25, 'WEBSHARE_PROXY', '10|500|198.154.89.91:6182|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9086, 26, 'WEBSHARE_PROXY', '10|500|138.128.97.64:7654|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9087, 27, 'WEBSHARE_PROXY', '10|500|144.168.241.247:8841|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9088, 28, 'WEBSHARE_PROXY', '10|500|192.186.151.183:8684|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9089, 29, 'WEBSHARE_PROXY', '10|500|138.128.40.35:6038|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9090, 30, 'WEBSHARE_PROXY', '10|500|23.236.183.29:8600|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9091, 31, 'WEBSHARE_PROXY', '10|500|45.86.244.193:6260|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9092, 32, 'WEBSHARE_PROXY', '10|500|5.181.43.116:7178|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9093, 33, 'WEBSHARE_PROXY', '10|500|192.186.172.192:9192|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9094, 34, 'WEBSHARE_PROXY', '10|500|107.152.230.49:9137|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9095, 35, 'WEBSHARE_PROXY', '10|500|23.254.62.154:6227|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9096, 36, 'WEBSHARE_PROXY', '10|500|104.144.3.44:6123|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9097, 37, 'WEBSHARE_PROXY', '10|500|209.127.170.59:8152|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9098, 38, 'WEBSHARE_PROXY', '10|500|45.57.225.93:9175|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9099, 39, 'WEBSHARE_PROXY', '10|500|104.227.223.11:8098|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9100, 40, 'WEBSHARE_PROXY', '10|500|192.156.217.120:7194|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9101, 41, 'WEBSHARE_PROXY', '10|500|104.227.133.226:7288|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9102, 42, 'WEBSHARE_PROXY', '10|500|192.153.171.154:6227|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9103, 43, 'WEBSHARE_PROXY', '10|500|45.72.119.120:9196|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9104, 44, 'WEBSHARE_PROXY', '10|500|45.57.168.167:7171|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9105, 45, 'WEBSHARE_PROXY', '10|500|23.236.168.64:8612|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9106, 46, 'WEBSHARE_PROXY', '10|500|45.155.70.230:8240|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9107, 47, 'WEBSHARE_PROXY', '10|500|45.158.187.24:7033|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9108, 48, 'WEBSHARE_PROXY', '10|500|104.227.145.94:8689|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9109, 49, 'WEBSHARE_PROXY', '10|500|104.227.223.103:8190|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9110, 50, 'WEBSHARE_PROXY', '10|500|104.144.3.242:6321|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9111, 51, 'WEBSHARE_PROXY', '10|500|45.72.119.198:9274|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9112, 52, 'WEBSHARE_PROXY', '10|500|107.152.230.169:9257|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9113, 53, 'WEBSHARE_PROXY', '10|500|104.227.145.145:8740|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9114, 54, 'WEBSHARE_PROXY', '10|500|138.128.40.212:6215|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9115, 55, 'WEBSHARE_PROXY', '10|500|193.27.19.181:7267|4|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9116, 56, 'WEBSHARE_PROXY', '10|500|45.158.185.151:8663|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9117, 57, 'WEBSHARE_PROXY', '10|500|192.166.153.168:8243|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9118, 58, 'WEBSHARE_PROXY', '10|500|45.155.70.102:8112|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9119, 59, 'WEBSHARE_PROXY', '10|500|45.72.40.46:9140|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9120, 60, 'WEBSHARE_PROXY', '10|500|209.127.127.68:7166|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9121, 61, 'WEBSHARE_PROXY', '10|500|45.57.168.160:7164|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9122, 62, 'WEBSHARE_PROXY', '10|500|138.128.78.241:7327|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9123, 63, 'WEBSHARE_PROXY', '10|500|138.128.97.229:7819|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9124, 64, 'WEBSHARE_PROXY', '10|500|209.127.127.42:7140|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9125, 65, 'WEBSHARE_PROXY', '10|500|45.130.127.56:8060|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9126, 66, 'WEBSHARE_PROXY', '10|500|144.168.241.44:8638|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9127, 67, 'WEBSHARE_PROXY', '10|500|23.250.101.224:8276|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9128, 68, 'WEBSHARE_PROXY', '10|500|104.227.172.87:7665|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9129, 69, 'WEBSHARE_PROXY', '10|500|45.158.184.183:9259|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9130, 70, 'WEBSHARE_PROXY', '10|500|104.227.13.213:8772|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9131, 71, 'WEBSHARE_PROXY', '10|500|192.186.172.159:9159|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9132, 72, 'WEBSHARE_PROXY', '10|500|45.72.119.59:9135|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9133, 73, 'WEBSHARE_PROXY', '10|500|193.23.253.44:7616|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9134, 74, 'WEBSHARE_PROXY', '10|500|45.154.58.123:7636|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9135, 75, 'WEBSHARE_PROXY', '10|500|138.128.106.210:8775|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9136, 76, 'WEBSHARE_PROXY', '10|500|192.241.112.191:7693|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9137, 77, 'WEBSHARE_PROXY', '10|500|104.227.173.212:8275|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9138, 78, 'WEBSHARE_PROXY', '10|500|104.144.34.25:7609|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9139, 79, 'WEBSHARE_PROXY', '10|500|104.227.120.23:7097|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9140, 80, 'WEBSHARE_PROXY', '10|500|45.72.40.127:9221|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9141, 81, 'WEBSHARE_PROXY', '10|500|209.127.138.149:7246|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9142, 82, 'WEBSHARE_PROXY', '10|500|45.72.40.92:9186|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9143, 83, 'WEBSHARE_PROXY', '10|500|138.128.97.27:7617|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9144, 84, 'WEBSHARE_PROXY', '10|500|45.72.119.252:9328|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9145, 85, 'WEBSHARE_PROXY', '10|500|104.227.101.234:6295|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9146, 86, 'WEBSHARE_PROXY', '10|500|45.130.127.83:8087|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9147, 87, 'WEBSHARE_PROXY', '10|500|104.227.13.107:8666|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9148, 88, 'WEBSHARE_PROXY', '10|500|23.254.18.38:7610|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9149, 89, 'WEBSHARE_PROXY', '10|500|23.236.182.249:7798|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9150, 90, 'WEBSHARE_PROXY', '10|500|45.158.184.11:9087|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9151, 91, 'WEBSHARE_PROXY', '10|500|138.128.107.154:8743|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9152, 92, 'WEBSHARE_PROXY', '10|500|104.227.120.222:7296|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9153, 93, 'WEBSHARE_PROXY', '10|500|192.186.172.17:9017|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9154, 94, 'WEBSHARE_PROXY', '10|500|209.127.96.114:7709|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9155, 95, 'WEBSHARE_PROXY', '10|500|138.128.106.94:8659|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9156, 96, 'WEBSHARE_PROXY', '10|500|104.227.145.114:8709|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9157, 97, 'WEBSHARE_PROXY', '10|500|69.58.12.249:8254|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9158, 98, 'WEBSHARE_PROXY', '10|500|45.72.65.15:8598|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9159, 99, 'WEBSHARE_PROXY', '10|500|45.57.225.151:9233|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9160, 100, 'WEBSHARE_PROXY', '10|500|209.127.115.233:6329|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9161, 101, 'WEBSHARE_PROXY', '10|500|193.27.10.161:6246|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9162, 102, 'WEBSHARE_PROXY', '10|500|45.158.187.88:7097|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9163, 103, 'WEBSHARE_PROXY', '10|500|104.144.109.37:6122|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9164, 104, 'WEBSHARE_PROXY', '10|500|45.158.185.78:8590|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9165, 105, 'WEBSHARE_PROXY', '10|500|23.254.62.37:6110|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9166, 106, 'WEBSHARE_PROXY', '10|500|104.227.133.96:7158|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9167, 107, 'WEBSHARE_PROXY', '10|500|192.241.94.110:7665|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9168, 108, 'WEBSHARE_PROXY', '10|500|209.127.127.154:7252|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9169, 109, 'WEBSHARE_PROXY', '10|500|45.87.243.86:6088|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9170, 110, 'WEBSHARE_PROXY', '10|500|192.166.153.26:8101|1|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9171, 111, 'WEBSHARE_PROXY', '10|500|104.144.3.152:6231|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9172, 112, 'WEBSHARE_PROXY', '10|500|45.155.70.238:8248|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9173, 113, 'WEBSHARE_PROXY', '10|500|104.227.173.188:8251|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9174, 114, 'WEBSHARE_PROXY', '10|500|45.86.247.128:7196|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9175, 115, 'WEBSHARE_PROXY', '10|500|104.227.172.234:7812|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9176, 116, 'WEBSHARE_PROXY', '10|500|45.95.97.237:8737|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9177, 117, 'WEBSHARE_PROXY', '10|500|138.128.78.174:7260|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9178, 118, 'WEBSHARE_PROXY', '10|500|45.130.127.248:8252|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9179, 119, 'WEBSHARE_PROXY', '10|500|144.168.241.3:8597|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9180, 120, 'WEBSHARE_PROXY', '10|500|104.227.173.1:8064|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9181, 121, 'WEBSHARE_PROXY', '10|500|45.158.185.127:8639|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9182, 122, 'WEBSHARE_PROXY', '10|500|104.227.13.197:8756|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9183, 123, 'WEBSHARE_PROXY', '10|500|5.181.42.111:6172|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9184, 124, 'WEBSHARE_PROXY', '10|500|104.144.235.160:7240|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9185, 125, 'WEBSHARE_PROXY', '10|500|104.144.34.200:7784|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9186, 126, 'WEBSHARE_PROXY', '10|500|104.227.1.110:7706|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9187, 127, 'WEBSHARE_PROXY', '10|500|45.154.58.4:7517|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9188, 128, 'WEBSHARE_PROXY', '10|500|45.95.97.108:8608|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9189, 129, 'WEBSHARE_PROXY', '10|500|209.127.170.23:8116|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9190, 130, 'WEBSHARE_PROXY', '10|500|144.168.241.36:8630|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9191, 131, 'WEBSHARE_PROXY', '10|500|104.227.133.32:7094|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9192, 132, 'WEBSHARE_PROXY', '10|500|45.95.97.32:8532|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9193, 133, 'WEBSHARE_PROXY', '10|500|23.254.62.115:6188|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9194, 134, 'WEBSHARE_PROXY', '10|500|23.254.18.99:7671|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9195, 135, 'WEBSHARE_PROXY', '10|500|209.127.165.72:7164|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9196, 136, 'WEBSHARE_PROXY', '10|500|45.154.58.215:7728|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9197, 137, 'WEBSHARE_PROXY', '10|500|45.158.187.28:7037|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9198, 138, 'WEBSHARE_PROXY', '10|500|138.128.107.53:8642|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9199, 139, 'WEBSHARE_PROXY', '10|500|104.227.100.6:8087|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9200, 140, 'WEBSHARE_PROXY', '10|500|45.130.127.213:8217|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9201, 141, 'WEBSHARE_PROXY', '10|500|104.227.133.196:7258|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9202, 142, 'WEBSHARE_PROXY', '10|500|192.156.217.171:7245|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9203, 143, 'WEBSHARE_PROXY', '10|500|45.158.184.182:9258|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9204, 144, 'WEBSHARE_PROXY', '10|500|45.155.70.131:8141|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9205, 145, 'WEBSHARE_PROXY', '10|500|104.227.223.237:8324|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9206, 146, 'WEBSHARE_PROXY', '10|500|104.227.13.2:8561|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9207, 147, 'WEBSHARE_PROXY', '10|500|104.227.13.6:8565|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9208, 148, 'WEBSHARE_PROXY', '10|500|45.72.119.113:9189|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9209, 149, 'WEBSHARE_PROXY', '10|500|193.27.21.178:8265|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9210, 150, 'WEBSHARE_PROXY', '10|500|104.227.223.64:8151|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9211, 151, 'WEBSHARE_PROXY', '10|500|138.128.78.106:7192|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9212, 152, 'WEBSHARE_PROXY', '10|500|69.58.12.121:8126|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9213, 153, 'WEBSHARE_PROXY', '10|500|107.152.230.23:9111|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9214, 154, 'WEBSHARE_PROXY', '10|500|104.227.172.212:7790|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9215, 155, 'WEBSHARE_PROXY', '10|500|69.58.12.204:8209|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9216, 156, 'WEBSHARE_PROXY', '10|500|138.128.68.97:7165|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9217, 157, 'WEBSHARE_PROXY', '10|500|45.72.65.220:8803|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9218, 158, 'WEBSHARE_PROXY', '10|500|104.144.99.36:7069|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9219, 159, 'WEBSHARE_PROXY', '10|500|144.168.210.32:7077|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9220, 160, 'WEBSHARE_PROXY', '10|500|23.229.119.150:7177|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9221, 161, 'WEBSHARE_PROXY', '10|500|104.227.222.140:9204|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9222, 162, 'WEBSHARE_PROXY', '10|500|23.229.109.68:6094|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9223, 163, 'WEBSHARE_PROXY', '10|500|23.254.91.12:9053|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9224, 164, 'WEBSHARE_PROXY', '10|500|104.144.109.23:6108|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9225, 165, 'WEBSHARE_PROXY', '10|500|144.168.146.44:7587|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9226, 166, 'WEBSHARE_PROXY', '10|500|45.85.160.210:7302|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9227, 167, 'WEBSHARE_PROXY', '10|500|209.127.191.60:9159|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9228, 168, 'WEBSHARE_PROXY', '10|500|192.156.217.145:7219|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9229, 169, 'WEBSHARE_PROXY', '10|500|23.229.109.198:6224|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9230, 170, 'WEBSHARE_PROXY', '10|500|209.127.170.49:8142|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9231, 171, 'WEBSHARE_PROXY', '10|500|104.144.51.234:7765|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9232, 172, 'WEBSHARE_PROXY', '10|500|104.144.233.224:9259|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9233, 173, 'WEBSHARE_PROXY', '10|500|45.95.96.52:8611|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9234, 174, 'WEBSHARE_PROXY', '10|500|45.95.97.249:8749|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9235, 175, 'WEBSHARE_PROXY', '10|500|209.127.183.174:8272|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9236, 176, 'WEBSHARE_PROXY', '10|500|23.250.101.238:8290|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9237, 177, 'WEBSHARE_PROXY', '10|500|138.128.68.238:7306|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9238, 178, 'WEBSHARE_PROXY', '10|500|138.128.38.17:6084|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9239, 179, 'WEBSHARE_PROXY', '10|500|209.127.138.202:7299|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9240, 180, 'WEBSHARE_PROXY', '10|500|45.57.254.90:6128|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9241, 181, 'WEBSHARE_PROXY', '10|500|193.27.21.165:8252|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9242, 182, 'WEBSHARE_PROXY', '10|500|107.152.222.159:9182|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9243, 183, 'WEBSHARE_PROXY', '10|500|23.250.101.45:8097|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9244, 184, 'WEBSHARE_PROXY', '10|500|23.229.101.8:8532|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9245, 185, 'WEBSHARE_PROXY', '10|500|45.72.119.250:9326|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9246, 186, 'WEBSHARE_PROXY', '10|500|209.127.115.155:6251|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9247, 187, 'WEBSHARE_PROXY', '10|500|107.152.190.7:7028|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9248, 188, 'WEBSHARE_PROXY', '10|500|45.57.168.50:7054|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9249, 189, 'WEBSHARE_PROXY', '10|500|23.236.255.186:7237|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9250, 190, 'WEBSHARE_PROXY', '10|500|198.20.191.187:7243|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9251, 191, 'WEBSHARE_PROXY', '10|500|138.128.68.162:7230|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9252, 192, 'WEBSHARE_PROXY', '10|500|107.152.230.183:9271|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9253, 193, 'WEBSHARE_PROXY', '10|500|192.186.172.114:9114|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9254, 194, 'WEBSHARE_PROXY', '10|500|209.127.165.44:7136|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9255, 195, 'WEBSHARE_PROXY', '10|500|104.144.26.38:8568|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9256, 196, 'WEBSHARE_PROXY', '10|500|192.241.94.101:7656|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9257, 197, 'WEBSHARE_PROXY', '10|500|104.144.26.25:8555|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9258, 198, 'WEBSHARE_PROXY', '10|500|45.72.119.177:9253|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9259, 199, 'WEBSHARE_PROXY', '10|500|193.27.19.158:7244|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9260, 200, 'WEBSHARE_PROXY', '10|500|107.152.165.172:7691|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9261, 201, 'WEBSHARE_PROXY', '10|500|23.229.101.94:8618|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9262, 202, 'WEBSHARE_PROXY', '10|500|198.20.185.170:6225|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9263, 203, 'WEBSHARE_PROXY', '10|500|144.168.151.157:6201|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9264, 204, 'WEBSHARE_PROXY', '10|500|23.229.119.94:7121|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9265, 205, 'WEBSHARE_PROXY', '10|500|138.128.40.72:6075|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9266, 206, 'WEBSHARE_PROXY', '10|500|144.168.146.248:7791|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9267, 207, 'WEBSHARE_PROXY', '10|500|104.227.28.23:9081|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9268, 208, 'WEBSHARE_PROXY', '10|500|209.127.170.26:8119|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9269, 209, 'WEBSHARE_PROXY', '10|500|104.144.235.137:7217|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9270, 210, 'WEBSHARE_PROXY', '10|500|104.227.133.123:7185|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9271, 211, 'WEBSHARE_PROXY', '10|500|45.95.97.239:8739|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9272, 212, 'WEBSHARE_PROXY', '10|500|23.229.125.170:9199|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9273, 213, 'WEBSHARE_PROXY', '10|500|144.168.151.99:6143|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9274, 214, 'WEBSHARE_PROXY', '10|500|45.85.160.99:7191|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9275, 215, 'WEBSHARE_PROXY', '10|500|45.57.252.138:8674|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9276, 216, 'WEBSHARE_PROXY', '10|500|69.58.12.231:8236|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9277, 217, 'WEBSHARE_PROXY', '10|500|104.144.147.5:8039|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9278, 218, 'WEBSHARE_PROXY', '10|500|104.144.109.97:6182|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9279, 219, 'WEBSHARE_PROXY', '10|500|69.58.12.217:8222|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9280, 220, 'WEBSHARE_PROXY', '10|500|192.186.172.175:9175|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9281, 221, 'WEBSHARE_PROXY', '10|500|104.227.133.129:7191|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9282, 222, 'WEBSHARE_PROXY', '10|500|107.152.197.237:8259|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9283, 223, 'WEBSHARE_PROXY', '10|500|192.241.116.190:8744|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9284, 224, 'WEBSHARE_PROXY', '10|500|209.127.170.145:8238|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9285, 225, 'WEBSHARE_PROXY', '10|500|45.57.254.128:6166|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9286, 226, 'WEBSHARE_PROXY', '10|500|104.227.76.22:6119|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9287, 227, 'WEBSHARE_PROXY', '10|500|45.72.119.186:9262|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9288, 228, 'WEBSHARE_PROXY', '10|500|107.152.146.97:8615|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9289, 229, 'WEBSHARE_PROXY', '10|500|198.154.89.22:6113|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9290, 230, 'WEBSHARE_PROXY', '10|500|209.127.96.250:7845|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9291, 231, 'WEBSHARE_PROXY', '10|500|45.154.58.87:7600|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9292, 232, 'WEBSHARE_PROXY', '10|500|23.229.119.245:7272|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9293, 233, 'WEBSHARE_PROXY', '10|500|107.152.230.27:9115|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9294, 234, 'WEBSHARE_PROXY', '10|500|193.23.253.208:7780|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9295, 235, 'WEBSHARE_PROXY', '10|500|104.227.222.150:9214|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9296, 236, 'WEBSHARE_PROXY', '10|500|209.127.96.236:7831|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9297, 237, 'WEBSHARE_PROXY', '10|500|69.58.12.155:8160|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9298, 238, 'WEBSHARE_PROXY', '10|500|104.227.173.133:8196|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9299, 239, 'WEBSHARE_PROXY', '10|500|104.144.72.87:6119|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9300, 240, 'WEBSHARE_PROXY', '10|500|192.166.153.96:8171|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9301, 241, 'WEBSHARE_PROXY', '10|500|193.27.21.248:8335|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9302, 242, 'WEBSHARE_PROXY', '10|500|107.152.190.245:7266|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9303, 243, 'WEBSHARE_PROXY', '10|500|144.168.210.179:7224|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9304, 244, 'WEBSHARE_PROXY', '10|500|104.227.100.8:8089|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9305, 245, 'WEBSHARE_PROXY', '10|500|104.227.222.215:9279|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9306, 246, 'WEBSHARE_PROXY', '10|500|23.254.91.70:9111|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9307, 247, 'WEBSHARE_PROXY', '10|500|45.158.184.167:9243|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9308, 248, 'WEBSHARE_PROXY', '10|500|193.27.10.25:6110|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9309, 249, 'WEBSHARE_PROXY', '10|500|138.128.68.106:7174|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9310, 250, 'WEBSHARE_PROXY', '10|500|45.57.168.74:7078|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9311, 251, 'WEBSHARE_PROXY', '10|500|23.229.119.110:7137|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9312, 252, 'WEBSHARE_PROXY', '10|500|45.130.127.113:8117|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9313, 253, 'WEBSHARE_PROXY', '10|500|104.227.13.193:8752|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9314, 254, 'WEBSHARE_PROXY', '10|500|209.127.191.83:9182|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9315, 255, 'WEBSHARE_PROXY', '10|500|45.87.243.7:6009|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9316, 256, 'WEBSHARE_PROXY', '10|500|104.227.1.169:7765|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9317, 257, 'WEBSHARE_PROXY', '10|500|104.144.99.28:7061|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9318, 258, 'WEBSHARE_PROXY', '10|500|192.186.151.181:8682|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9319, 259, 'WEBSHARE_PROXY', '10|500|209.127.170.84:8177|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9320, 260, 'WEBSHARE_PROXY', '10|500|69.58.12.220:8225|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9321, 261, 'WEBSHARE_PROXY', '10|500|23.229.109.10:6036|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9322, 262, 'WEBSHARE_PROXY', '10|500|104.144.109.85:6170|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9323, 263, 'WEBSHARE_PROXY', '10|500|104.227.120.198:7272|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9324, 264, 'WEBSHARE_PROXY', '10|500|209.127.138.25:7122|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9325, 265, 'WEBSHARE_PROXY', '10|500|104.227.172.153:7731|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9326, 266, 'WEBSHARE_PROXY', '10|500|209.127.191.89:9188|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9327, 267, 'WEBSHARE_PROXY', '10|500|209.127.164.48:8105|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9328, 268, 'WEBSHARE_PROXY', '10|500|193.23.253.13:7585|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9329, 269, 'WEBSHARE_PROXY', '10|500|192.186.172.173:9173|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9330, 270, 'WEBSHARE_PROXY', '10|500|69.58.12.90:8095|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9331, 271, 'WEBSHARE_PROXY', '10|500|45.95.97.146:8646|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9332, 272, 'WEBSHARE_PROXY', '10|500|45.57.255.231:7270|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9333, 273, 'WEBSHARE_PROXY', '10|500|23.254.62.200:6273|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9334, 274, 'WEBSHARE_PROXY', '10|500|192.166.153.120:8195|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9335, 275, 'WEBSHARE_PROXY', '10|500|45.87.240.17:8110|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9336, 276, 'WEBSHARE_PROXY', '10|500|45.57.237.240:8315|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9337, 277, 'WEBSHARE_PROXY', '10|500|104.144.34.12:7596|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9338, 278, 'WEBSHARE_PROXY', '10|500|45.95.99.91:7651|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9339, 279, 'WEBSHARE_PROXY', '10|500|104.227.222.233:9297|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9340, 280, 'WEBSHARE_PROXY', '10|500|45.57.254.237:6275|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9341, 281, 'WEBSHARE_PROXY', '10|500|138.128.107.58:8647|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9342, 282, 'WEBSHARE_PROXY', '10|500|104.144.72.3:6035|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9343, 283, 'WEBSHARE_PROXY', '10|500|107.152.177.237:6257|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9344, 284, 'WEBSHARE_PROXY', '10|500|23.236.168.150:8698|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9345, 285, 'WEBSHARE_PROXY', '10|500|45.158.184.199:9275|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9346, 286, 'WEBSHARE_PROXY', '10|500|144.168.220.74:8120|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9347, 287, 'WEBSHARE_PROXY', '10|500|144.168.146.73:7616|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9348, 288, 'WEBSHARE_PROXY', '10|500|23.254.90.104:8144|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9349, 289, 'WEBSHARE_PROXY', '10|500|138.128.78.228:7314|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9350, 290, 'WEBSHARE_PROXY', '10|500|104.227.172.67:7645|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9351, 291, 'WEBSHARE_PROXY', '10|500|23.229.107.44:7569|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9352, 292, 'WEBSHARE_PROXY', '10|500|23.229.109.156:6182|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9353, 293, 'WEBSHARE_PROXY', '10|500|192.241.112.163:7665|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9354, 294, 'WEBSHARE_PROXY', '10|500|193.27.19.140:7226|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9355, 295, 'WEBSHARE_PROXY', '10|500|198.154.89.129:6220|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9356, 296, 'WEBSHARE_PROXY', '10|500|45.154.58.189:7702|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9357, 297, 'WEBSHARE_PROXY', '10|500|104.144.147.173:8207|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9358, 298, 'WEBSHARE_PROXY', '10|500|138.128.40.3:6006|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9359, 299, 'WEBSHARE_PROXY', '10|500|138.128.114.81:7647|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9360, 300, 'WEBSHARE_PROXY', '10|500|209.127.191.18:9117|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9361, 301, 'WEBSHARE_PROXY', '10|500|107.152.146.27:8545|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9362, 302, 'WEBSHARE_PROXY', '10|500|209.127.165.233:7325|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9363, 303, 'WEBSHARE_PROXY', '10|500|104.144.26.246:8776|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9364, 304, 'WEBSHARE_PROXY', '10|500|104.227.222.83:9147|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9365, 305, 'WEBSHARE_PROXY', '10|500|198.20.185.191:6246|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9366, 306, 'WEBSHARE_PROXY', '10|500|45.154.58.194:7707|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9367, 307, 'WEBSHARE_PROXY', '10|500|45.57.237.225:8300|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9368, 308, 'WEBSHARE_PROXY', '10|500|23.236.182.72:7621|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9369, 309, 'WEBSHARE_PROXY', '10|500|23.236.249.101:6151|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9370, 310, 'WEBSHARE_PROXY', '10|500|23.229.122.124:8152|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9371, 311, 'WEBSHARE_PROXY', '10|500|104.144.109.240:6325|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9372, 312, 'WEBSHARE_PROXY', '10|500|45.57.252.2:8538|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9373, 313, 'WEBSHARE_PROXY', '10|500|138.128.106.167:8732|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9374, 314, 'WEBSHARE_PROXY', '10|500|23.236.183.101:8672|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9375, 315, 'WEBSHARE_PROXY', '10|500|23.254.91.32:9073|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9376, 316, 'WEBSHARE_PROXY', '10|500|138.128.69.156:8225|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9377, 317, 'WEBSHARE_PROXY', '10|500|104.227.13.43:8602|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9378, 318, 'WEBSHARE_PROXY', '10|500|138.128.38.38:6105|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9379, 319, 'WEBSHARE_PROXY', '10|500|45.155.70.160:8170|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9380, 320, 'WEBSHARE_PROXY', '10|500|23.250.101.119:8171|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9381, 321, 'WEBSHARE_PROXY', '10|500|144.168.241.240:8834|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9382, 322, 'WEBSHARE_PROXY', '10|500|45.95.97.140:8640|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9383, 323, 'WEBSHARE_PROXY', '10|500|104.144.26.148:8678|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9384, 324, 'WEBSHARE_PROXY', '10|500|45.57.254.244:6282|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9385, 325, 'WEBSHARE_PROXY', '10|500|104.227.173.39:8102|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9386, 326, 'WEBSHARE_PROXY', '10|500|23.236.249.43:6093|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9387, 327, 'WEBSHARE_PROXY', '10|500|104.144.99.196:7229|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9388, 328, 'WEBSHARE_PROXY', '10|500|23.236.168.110:8658|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9389, 329, 'WEBSHARE_PROXY', '10|500|209.127.138.148:7245|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9390, 330, 'WEBSHARE_PROXY', '10|500|107.152.165.135:7654|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9391, 331, 'WEBSHARE_PROXY', '10|500|104.227.1.41:7637|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9392, 332, 'WEBSHARE_PROXY', '10|500|198.154.92.251:9321|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9393, 333, 'WEBSHARE_PROXY', '10|500|104.227.1.209:7805|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9394, 334, 'WEBSHARE_PROXY', '10|500|45.158.184.108:9184|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9395, 335, 'WEBSHARE_PROXY', '10|500|104.227.172.73:7651|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9396, 336, 'WEBSHARE_PROXY', '10|500|104.144.233.93:9128|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9397, 337, 'WEBSHARE_PROXY', '10|500|104.227.222.76:9140|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9398, 338, 'WEBSHARE_PROXY', '10|500|138.128.114.43:7609|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9399, 339, 'WEBSHARE_PROXY', '10|500|23.229.107.11:7536|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9400, 340, 'WEBSHARE_PROXY', '10|500|23.250.48.225:9278|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9401, 341, 'WEBSHARE_PROXY', '10|500|209.127.127.134:7232|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9402, 342, 'WEBSHARE_PROXY', '10|500|45.57.252.133:8669|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9403, 343, 'WEBSHARE_PROXY', '10|500|104.144.72.149:6181|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9404, 344, 'WEBSHARE_PROXY', '10|500|144.168.210.104:7149|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9405, 345, 'WEBSHARE_PROXY', '10|500|138.128.38.68:6135|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9406, 346, 'WEBSHARE_PROXY', '10|500|104.227.28.79:9137|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9407, 347, 'WEBSHARE_PROXY', '10|500|104.144.51.238:7769|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9408, 348, 'WEBSHARE_PROXY', '10|500|209.127.183.179:8277|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9409, 349, 'WEBSHARE_PROXY', '10|500|209.127.164.93:8150|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9410, 350, 'WEBSHARE_PROXY', '10|500|23.250.48.92:9145|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9411, 351, 'WEBSHARE_PROXY', '10|500|104.227.13.239:8798|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9412, 352, 'WEBSHARE_PROXY', '10|500|23.229.109.52:6078|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9413, 353, 'WEBSHARE_PROXY', '10|500|209.127.183.64:8162|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9414, 354, 'WEBSHARE_PROXY', '10|500|45.95.99.9:7569|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9415, 355, 'WEBSHARE_PROXY', '10|500|45.86.247.33:7101|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9416, 356, 'WEBSHARE_PROXY', '10|500|209.127.127.102:7200|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9417, 357, 'WEBSHARE_PROXY', '10|500|107.152.177.169:6189|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9418, 358, 'WEBSHARE_PROXY', '10|500|144.168.146.55:7598|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9419, 359, 'WEBSHARE_PROXY', '10|500|144.168.137.47:8589|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9420, 360, 'WEBSHARE_PROXY', '10|500|192.241.112.40:7542|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9421, 361, 'WEBSHARE_PROXY', '10|500|45.57.254.87:6125|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9422, 362, 'WEBSHARE_PROXY', '10|500|23.250.48.137:9190|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9423, 363, 'WEBSHARE_PROXY', '10|500|107.152.230.40:9128|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9424, 364, 'WEBSHARE_PROXY', '10|500|23.254.90.168:8208|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9425, 365, 'WEBSHARE_PROXY', '10|500|45.57.253.82:7619|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9426, 366, 'WEBSHARE_PROXY', '10|500|45.57.252.25:8561|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9427, 367, 'WEBSHARE_PROXY', '10|500|104.144.147.214:8248|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9428, 368, 'WEBSHARE_PROXY', '10|500|23.254.62.45:6118|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9429, 369, 'WEBSHARE_PROXY', '10|500|23.236.183.221:8792|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9430, 370, 'WEBSHARE_PROXY', '10|500|23.236.249.82:6132|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9431, 371, 'WEBSHARE_PROXY', '10|500|138.128.68.158:7226|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9432, 372, 'WEBSHARE_PROXY', '10|500|138.128.40.41:6044|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9433, 373, 'WEBSHARE_PROXY', '10|500|23.229.119.187:7214|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9434, 374, 'WEBSHARE_PROXY', '10|500|192.241.116.215:8769|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9435, 375, 'WEBSHARE_PROXY', '10|500|23.229.101.241:8765|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9436, 376, 'WEBSHARE_PROXY', '10|500|209.127.191.250:9349|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9437, 377, 'WEBSHARE_PROXY', '10|500|198.154.89.11:6102|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9438, 378, 'WEBSHARE_PROXY', '10|500|209.127.143.105:8204|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9439, 379, 'WEBSHARE_PROXY', '10|500|198.20.191.214:7270|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9440, 380, 'WEBSHARE_PROXY', '10|500|23.236.162.133:9180|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9441, 381, 'WEBSHARE_PROXY', '10|500|209.127.138.166:7263|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9442, 382, 'WEBSHARE_PROXY', '10|500|104.227.76.18:6115|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9443, 383, 'WEBSHARE_PROXY', '10|500|209.127.96.11:7606|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9444, 384, 'WEBSHARE_PROXY', '10|500|107.152.222.169:9192|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9445, 385, 'WEBSHARE_PROXY', '10|500|144.168.151.161:6205|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9446, 386, 'WEBSHARE_PROXY', '10|500|45.57.255.151:7190|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9447, 387, 'WEBSHARE_PROXY', '10|500|23.229.125.216:9245|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9448, 388, 'WEBSHARE_PROXY', '10|500|209.127.127.146:7244|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9449, 389, 'WEBSHARE_PROXY', '10|500|107.152.146.5:8523|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9450, 390, 'WEBSHARE_PROXY', '10|500|104.144.109.153:6238|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9451, 391, 'WEBSHARE_PROXY', '10|500|209.127.164.111:8168|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9452, 392, 'WEBSHARE_PROXY', '10|500|144.168.241.123:8717|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9453, 393, 'WEBSHARE_PROXY', '10|500|45.87.243.12:6014|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9454, 394, 'WEBSHARE_PROXY', '10|500|138.128.38.180:6247|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9455, 395, 'WEBSHARE_PROXY', '10|500|107.152.214.33:8610|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9456, 396, 'WEBSHARE_PROXY', '10|500|104.144.26.70:8600|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9457, 397, 'WEBSHARE_PROXY', '10|500|144.168.146.75:7618|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9458, 398, 'WEBSHARE_PROXY', '10|500|23.229.107.254:7779|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9459, 399, 'WEBSHARE_PROXY', '10|500|104.144.99.3:7036|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9460, 400, 'WEBSHARE_PROXY', '10|500|45.57.255.200:7239|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9461, 401, 'WEBSHARE_PROXY', '10|500|104.144.72.115:6147|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9462, 402, 'WEBSHARE_PROXY', '10|500|23.250.48.38:9091|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9463, 403, 'WEBSHARE_PROXY', '10|500|45.158.187.210:7219|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9464, 404, 'WEBSHARE_PROXY', '10|500|144.168.146.214:7757|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9465, 405, 'WEBSHARE_PROXY', '10|500|23.229.119.74:7101|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9466, 406, 'WEBSHARE_PROXY', '10|500|209.127.115.6:6102|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9467, 407, 'WEBSHARE_PROXY', '10|500|104.144.99.154:7187|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9468, 408, 'WEBSHARE_PROXY', '10|500|23.236.168.16:8564|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9469, 409, 'WEBSHARE_PROXY', '10|500|192.186.151.241:8742|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9470, 410, 'WEBSHARE_PROXY', '10|500|45.130.127.247:8251|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9471, 411, 'WEBSHARE_PROXY', '10|500|138.128.69.155:8224|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9472, 412, 'WEBSHARE_PROXY', '10|500|192.186.151.235:8736|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9473, 413, 'WEBSHARE_PROXY', '10|500|104.227.222.214:9278|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9474, 414, 'WEBSHARE_PROXY', '10|500|23.236.182.230:7779|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9475, 415, 'WEBSHARE_PROXY', '10|500|23.254.18.163:7735|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9476, 416, 'WEBSHARE_PROXY', '10|500|209.127.143.207:8306|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9477, 417, 'WEBSHARE_PROXY', '10|500|209.127.191.99:9198|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9478, 418, 'WEBSHARE_PROXY', '10|500|104.144.72.13:6045|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9479, 419, 'WEBSHARE_PROXY', '10|500|104.227.172.185:7763|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9480, 420, 'WEBSHARE_PROXY', '10|500|138.128.38.130:6197|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9481, 421, 'WEBSHARE_PROXY', '10|500|209.127.138.171:7268|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9482, 422, 'WEBSHARE_PROXY', '10|500|23.229.101.218:8742|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9483, 423, 'WEBSHARE_PROXY', '10|500|138.128.106.140:8705|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9484, 424, 'WEBSHARE_PROXY', '10|500|192.156.217.209:7283|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9485, 425, 'WEBSHARE_PROXY', '10|500|209.127.170.160:8253|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9486, 426, 'WEBSHARE_PROXY', '10|500|193.23.253.91:7663|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9487, 427, 'WEBSHARE_PROXY', '10|500|45.57.253.206:7743|1|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9488, 428, 'WEBSHARE_PROXY', '10|500|144.168.137.170:8712|0|ACTIVE|2021-01-14', 'sbbloliv-dest:h4ae5mht2yks|'),
(9489, 429, 'WEBSHARE_PROXY', '10|500|104.227.145.232:8827|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9490, 430, 'WEBSHARE_PROXY', '10|500|209.127.96.40:7635|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9491, 431, 'WEBSHARE_PROXY', '10|500|107.152.214.247:8824|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9492, 432, 'WEBSHARE_PROXY', '10|500|23.236.168.186:8734|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9493, 433, 'WEBSHARE_PROXY', '10|500|107.152.177.186:6206|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9494, 434, 'WEBSHARE_PROXY', '10|500|23.250.48.175:9228|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9495, 435, 'WEBSHARE_PROXY', '10|500|45.57.225.182:9264|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9496, 436, 'WEBSHARE_PROXY', '10|500|209.127.115.99:6195|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9497, 437, 'WEBSHARE_PROXY', '10|500|104.227.76.104:6201|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9498, 438, 'WEBSHARE_PROXY', '10|500|45.158.184.82:9158|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9499, 439, 'WEBSHARE_PROXY', '10|500|209.127.183.152:8250|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9500, 440, 'WEBSHARE_PROXY', '10|500|45.57.237.60:8135|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9501, 441, 'WEBSHARE_PROXY', '10|500|45.130.127.123:8127|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9502, 442, 'WEBSHARE_PROXY', '10|500|144.168.137.48:8590|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9503, 443, 'WEBSHARE_PROXY', '10|500|104.227.145.70:8665|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9504, 444, 'WEBSHARE_PROXY', '10|500|192.241.94.240:7795|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9505, 445, 'WEBSHARE_PROXY', '10|500|193.27.21.56:8143|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9506, 446, 'WEBSHARE_PROXY', '10|500|23.236.249.7:6057|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9507, 447, 'WEBSHARE_PROXY', '10|500|192.241.112.21:7523|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|');
INSERT INTO `proxy` (`sl`, `server_no`, `name`, `Serverinfo`, `Userpass`) VALUES
(9508, 448, 'WEBSHARE_PROXY', '10|500|104.144.3.135:6214|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9509, 449, 'WEBSHARE_PROXY', '10|500|192.241.94.2:7557|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9510, 450, 'WEBSHARE_PROXY', '10|500|138.128.78.197:7283|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9511, 451, 'WEBSHARE_PROXY', '10|500|104.227.1.155:7751|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9512, 452, 'WEBSHARE_PROXY', '10|500|138.128.69.10:8079|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9513, 453, 'WEBSHARE_PROXY', '10|500|198.154.92.15:9085|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9514, 454, 'WEBSHARE_PROXY', '10|500|144.168.151.68:6112|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9515, 455, 'WEBSHARE_PROXY', '10|500|23.229.119.73:7100|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9516, 456, 'WEBSHARE_PROXY', '10|500|192.241.94.23:7578|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9517, 457, 'WEBSHARE_PROXY', '10|500|209.127.127.179:7277|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9518, 458, 'WEBSHARE_PROXY', '10|500|209.127.143.29:8128|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9519, 459, 'WEBSHARE_PROXY', '10|500|104.227.101.209:6270|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9520, 460, 'WEBSHARE_PROXY', '10|500|193.27.19.14:7100|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9521, 461, 'WEBSHARE_PROXY', '10|500|45.158.185.214:8726|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9522, 462, 'WEBSHARE_PROXY', '10|500|107.152.197.209:8231|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9523, 463, 'WEBSHARE_PROXY', '10|500|107.152.214.102:8679|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9524, 464, 'WEBSHARE_PROXY', '10|500|23.229.122.244:8272|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9525, 465, 'WEBSHARE_PROXY', '10|500|23.229.125.101:9130|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9526, 466, 'WEBSHARE_PROXY', '10|500|138.128.114.152:7718|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9527, 467, 'WEBSHARE_PROXY', '10|500|104.227.28.116:9174|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9528, 468, 'WEBSHARE_PROXY', '10|500|23.236.168.76:8624|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9529, 469, 'WEBSHARE_PROXY', '10|500|45.57.225.223:9305|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9530, 470, 'WEBSHARE_PROXY', '10|500|45.57.255.243:7282|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9531, 471, 'WEBSHARE_PROXY', '10|500|104.227.173.20:8083|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9532, 472, 'WEBSHARE_PROXY', '10|500|107.152.214.179:8756|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9533, 473, 'WEBSHARE_PROXY', '10|500|23.229.107.118:7643|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9534, 474, 'WEBSHARE_PROXY', '10|500|23.254.90.7:8047|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9535, 475, 'WEBSHARE_PROXY', '10|500|104.144.72.142:6174|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9536, 476, 'WEBSHARE_PROXY', '10|500|23.229.125.81:9110|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9537, 477, 'WEBSHARE_PROXY', '10|500|198.154.89.158:6249|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9538, 478, 'WEBSHARE_PROXY', '10|500|23.254.90.193:8233|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9539, 479, 'WEBSHARE_PROXY', '10|500|45.158.187.211:7220|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9540, 480, 'WEBSHARE_PROXY', '10|500|69.58.12.116:8121|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9541, 481, 'WEBSHARE_PROXY', '10|500|138.128.114.121:7687|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9542, 482, 'WEBSHARE_PROXY', '10|500|45.57.237.219:8294|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9543, 483, 'WEBSHARE_PROXY', '10|500|45.72.40.23:9117|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9544, 484, 'WEBSHARE_PROXY', '10|500|138.128.114.217:7783|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9545, 485, 'WEBSHARE_PROXY', '10|500|138.128.78.189:7275|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9546, 486, 'WEBSHARE_PROXY', '10|500|45.158.184.188:9264|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9547, 487, 'WEBSHARE_PROXY', '10|500|193.27.21.43:8130|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9548, 488, 'WEBSHARE_PROXY', '10|500|45.57.253.14:7551|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9549, 489, 'WEBSHARE_PROXY', '10|500|107.152.197.184:8206|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9550, 490, 'WEBSHARE_PROXY', '10|500|209.127.115.93:6189|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9551, 491, 'WEBSHARE_PROXY', '10|500|198.20.185.13:6068|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9552, 492, 'WEBSHARE_PROXY', '10|500|23.236.182.181:7730|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9553, 493, 'WEBSHARE_PROXY', '10|500|104.227.133.54:7116|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9554, 494, 'WEBSHARE_PROXY', '10|500|209.127.191.207:9306|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9555, 495, 'WEBSHARE_PROXY', '10|500|209.127.164.221:8278|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9556, 496, 'WEBSHARE_PROXY', '10|500|138.128.97.134:7724|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9557, 497, 'WEBSHARE_PROXY', '10|500|107.152.214.38:8615|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9558, 498, 'WEBSHARE_PROXY', '10|500|45.57.225.66:9148|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9559, 499, 'WEBSHARE_PROXY', '10|500|104.227.223.242:8329|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|'),
(9560, 500, 'WEBSHARE_PROXY', '10|500|144.168.151.78:6122|10|DEACTIVE|2021-01-15', 'sbbloliv-dest:h4ae5mht2yks|');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `proxy`
--
ALTER TABLE `proxy`
  ADD PRIMARY KEY (`sl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `sl_no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `crm_auth`
--
ALTER TABLE `crm_auth`
  MODIFY `sl_no` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `proxy`
--
ALTER TABLE `proxy`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9561;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
