-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2020 at 11:28 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kunokhar_workspace_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `beneficiary_tb`
--

CREATE TABLE `beneficiary_tb` (
  `b_id` int(11) NOT NULL,
  `fk_client_id` int(11) NOT NULL,
  `b_fname` varchar(100) COLLATE utf8_bin NOT NULL,
  `b_lname` varchar(100) COLLATE utf8_bin NOT NULL,
  `b_id_number` varchar(13) COLLATE utf8_bin NOT NULL,
  `b_date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `beneficiary_tb`
--

INSERT INTO `beneficiary_tb` (`b_id`, `fk_client_id`, `b_fname`, `b_lname`, `b_id_number`, `b_date_added`) VALUES
(1, 2, 'Masibulele', 'Mgoqi', '9810155964086', '2019-12-07 01:12:44'),
(4, 12, 'Rholihlahlaha', 'Vuzane', '515514585', '2019-12-08 11:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `civil_tb`
--

CREATE TABLE `civil_tb` (
  `c_id` int(11) NOT NULL,
  `fk_n_id` int(11) NOT NULL,
  `c_spouse_fname` varchar(50) COLLATE utf8_bin NOT NULL,
  `c_spouse_lname` varchar(50) COLLATE utf8_bin NOT NULL,
  `c_id_number` varchar(13) COLLATE utf8_bin NOT NULL,
  `c_detail_of_marriage` text COLLATE utf8_bin NOT NULL,
  `c_certificate_number` int(50) NOT NULL,
  `c_date_of_issue` date NOT NULL,
  `c_marriage_terms` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `civil_tb`
--

INSERT INTO `civil_tb` (`c_id`, `fk_n_id`, `c_spouse_fname`, `c_spouse_lname`, `c_id_number`, `c_detail_of_marriage`, `c_certificate_number`, `c_date_of_issue`, `c_marriage_terms`) VALUES
(5, 5, 'Masibulele', 'Masibulele', '3112318668560', 'This is a text\n\nchecking', 2147483647, '2020-01-24', 'Out-of-community'),
(9, 7, 'Linda', 'Momoza', '4402295898965', 'this is wrong', 0, '2020-02-12', 'In-community');

-- --------------------------------------------------------

--
-- Table structure for table `clients_tb`
--

CREATE TABLE `clients_tb` (
  `client_id` int(11) NOT NULL,
  `client_fname` varchar(100) COLLATE utf8_bin NOT NULL,
  `client_lname` varchar(100) COLLATE utf8_bin NOT NULL,
  `client_dateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `client_email` varchar(150) COLLATE utf8_bin NOT NULL,
  `client_cellno` varchar(20) COLLATE utf8_bin NOT NULL,
  `client_home_address` varchar(100) COLLATE utf8_bin NOT NULL,
  `client_city` varchar(100) COLLATE utf8_bin NOT NULL,
  `client_zip_code` varchar(20) COLLATE utf8_bin NOT NULL,
  `client_person` varchar(100) COLLATE utf8_bin NOT NULL,
  `client_initials` varchar(5) COLLATE utf8_bin NOT NULL,
  `client_title` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `clients_tb`
--

INSERT INTO `clients_tb` (`client_id`, `client_fname`, `client_lname`, `client_dateCreated`, `client_email`, `client_cellno`, `client_home_address`, `client_city`, `client_zip_code`, `client_person`, `client_initials`, `client_title`) VALUES
(1, 'Masibuleles', 'Mgoqi', '2019-11-16 15:11:32', 'masibulelemgoqi@gmail.com', '0813907361', '', '', '', 'Juristic', '', ''),
(2, 'Linda', 'Momoza', '2019-11-16 16:11:30', 'nontmomoza@gmail.com', '0683244448', '', '', '', 'Natural', '', ''),
(3, 'Sim', 'Ndaba', '2019-11-16 19:11:51', 'smaverns@gmail.com', '0838969798', '', '', '', 'Juristic', '', ''),
(4, 'Sinethemba', 'Mgoqi', '2019-11-18 17:11:01', 'user@user.com', '545236565', 'Bende, PO Box 251', 'Dutywa', '5000', 'Juristic', 'M', 'Mr'),
(6, 'Lilitha', 'Mgoqi', '2019-11-19 18:11:33', 'lmgoqi@gmail.com', '0815524856', '', '', '', 'Natural', '', ''),
(7, 'Sinethemba', 'Mgoqi', '2019-11-23 14:11:17', 'smgoqi@gmail.com', '08455556998', '', '', '', 'Natural', '', ''),
(8, 'Rholihlahla', 'Vuzane', '2019-11-25 13:11:09', 'rvuzane@gmail.com', '0729809238', 'Bende A/A', 'Dutywa', '5000', 'Natural', 'R', 'Mr'),
(12, 'Ahluma ', 'Mgoqi', '2019-12-05 18:12:29', 'rvuzane@gmail.com', '05252256655', 'No. 23 Delville road', 'Mthatha', '5099', 'Natural', 'A', 'Dr.');

-- --------------------------------------------------------

--
-- Table structure for table `company_member_tb`
--

CREATE TABLE `company_member_tb` (
  `cm_id` int(11) NOT NULL,
  `fk_j_id` int(11) NOT NULL,
  `cm_title` varchar(50) COLLATE utf8_bin NOT NULL,
  `cm_fname` varchar(100) COLLATE utf8_bin NOT NULL,
  `cm_lname` varchar(100) COLLATE utf8_bin NOT NULL,
  `cm_id_number` varchar(13) COLLATE utf8_bin NOT NULL,
  `cm_date_of_appointment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `company_member_tb`
--

INSERT INTO `company_member_tb` (`cm_id`, `fk_j_id`, `cm_title`, `cm_fname`, `cm_lname`, `cm_id_number`, `cm_date_of_appointment`) VALUES
(13, 1, 'Mr', 'Dana', 'Steves', '6558552', '2019-11-22 14:04:00'),
(16, 4, 'Mr', 'Sinethemba', 'Mgoqi', '8855585', '2019-12-13 00:00:00'),
(18, 1, 'Mr', 'Stan', 'Vuzane', '65959595263', '2019-12-14 00:00:00'),
(19, 2, 'Mr', 'Rholihlahla', 'Vuzane', '6595956562', '2019-12-13 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customary_spouse_tb`
--

CREATE TABLE `customary_spouse_tb` (
  `cs_id` int(11) NOT NULL,
  `cs_fk_n_id` int(11) NOT NULL,
  `cs_fname` varchar(50) COLLATE utf8_bin NOT NULL,
  `cs_lname` varchar(50) COLLATE utf8_bin NOT NULL,
  `cs_id_number` varchar(13) COLLATE utf8_bin NOT NULL,
  `cs_stages_of_negotiation` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `customary_spouse_tb`
--

INSERT INTO `customary_spouse_tb` (`cs_id`, `cs_fk_n_id`, `cs_fname`, `cs_lname`, `cs_id_number`, `cs_stages_of_negotiation`) VALUES
(3, 6, 'Bongiwe', 'Nocaka', '685458522566', '1');

-- --------------------------------------------------------

--
-- Table structure for table `deligation_tb`
--

CREATE TABLE `deligation_tb` (
  `d_id` int(11) NOT NULL,
  `d_fk_cs_id` int(11) NOT NULL,
  `d_fname` varchar(50) COLLATE utf8_bin NOT NULL,
  `d_lname` varchar(50) COLLATE utf8_bin NOT NULL,
  `d_id_number` varchar(13) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `documents_tb`
--

CREATE TABLE `documents_tb` (
  `document_id` int(11) NOT NULL,
  `fk_client_id` int(11) NOT NULL,
  `document_name` text COLLATE utf8_bin NOT NULL,
  `document_description` varchar(100) COLLATE utf8_bin NOT NULL,
  `document_type` varchar(100) COLLATE utf8_bin NOT NULL,
  `document_size` int(100) NOT NULL,
  `document_date` datetime NOT NULL,
  `document_status` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `documents_tb`
--

INSERT INTO `documents_tb` (`document_id`, `fk_client_id`, `document_name`, `document_description`, `document_type`, `document_size`, `document_date`, `document_status`) VALUES
(9, 4, '771072644120190200000000031782_SK_PELE_IRP5IT3a_PRINT_ONLY.pdf', 'ID Copy', 'pdf', 254783, '2019-12-05 14:12:03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `idea_tb`
--

CREATE TABLE `idea_tb` (
  `idea_id` int(11) NOT NULL,
  `fk_client_id` int(11) NOT NULL,
  `idea_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `idea_trademark` varchar(100) COLLATE utf8_bin NOT NULL,
  `idea_nature` text COLLATE utf8_bin NOT NULL,
  `idea_target_market` text COLLATE utf8_bin NOT NULL,
  `idea_date` datetime NOT NULL DEFAULT current_timestamp(),
  `idea_code` varchar(15) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `idea_tb`
--

INSERT INTO `idea_tb` (`idea_id`, `fk_client_id`, `idea_name`, `idea_trademark`, `idea_nature`, `idea_target_market`, `idea_date`, `idea_code`) VALUES
(18, 4, 'Car key loan', 'pty check check', 'ZHSDHJ SB FS F SJDD FH', 'HDS HDS SHD S SH DHS ', '2019-12-05 14:11:04', 'KU190000'),
(19, 4, 'Faty', 'bluetooth', 'sd sd s hjg sdd hd d', 'fgf d sh hs hs sh ', '2019-12-05 14:11:37', 'KU190001'),
(20, 4, 'jjd', 'dj sjdjd ', 'jsd f dsjf ja kjd klsf jsa f sajf ajh fjsas hfj  sdnf jsdjf k sf kjsan fnaslkf sdjh jash fo', 'ddfh sd hsf jsh djf ajoiaueirwhj foa;aj kasjffl sojd ijsdfj ', '2019-12-06 12:29:35', 'KU190002'),
(21, 4, 'hdhjjs js ', 'djdjsj aka ', 'kdk akajha ka aaja ', 'sj sasks sj skksj k s sjs js sjs jssksj sks sjs ', '2019-12-06 12:32:25', 'KU190003'),
(22, 4, 'jh dsjh sjdhhs j asjdhkja j', 'sajd sjd jslk skja j jsd ajs', 'jdsolksaj jd uii l  jaljdf jals jsda ljkas jdf kjsd jdkla jds alk', 'ksdjds k ak jsjdkj djklajdkd jjkalj d a jsdjd d ', '2019-12-06 12:36:24', 'KU190004');

-- --------------------------------------------------------

--
-- Table structure for table `juristic_tb`
--

CREATE TABLE `juristic_tb` (
  `j_id` int(11) NOT NULL,
  `fk_client_id` int(11) NOT NULL,
  `j_logo` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `j_company_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `j_registration_number` varchar(200) COLLATE utf8_bin NOT NULL,
  `j_registration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `juristic_tb`
--

INSERT INTO `juristic_tb` (`j_id`, `fk_client_id`, `j_logo`, `j_company_name`, `j_registration_number`, `j_registration_date`) VALUES
(1, 1, NULL, 'Some Code', '5555SD52', '2019-11-05 00:00:00'),
(2, 3, NULL, 'Open Sesyme', '2155D522', '2019-12-08 00:00:00'),
(4, 4, NULL, 'Open Sesyme', '5555SD5221', '2019-11-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `log_tb`
--

CREATE TABLE `log_tb` (
  `log_id` int(11) NOT NULL,
  `fk_w_id` int(11) NOT NULL,
  `log_report` text COLLATE utf8_bin NOT NULL,
  `log_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `log_tb`
--

INSERT INTO `log_tb` (`log_id`, `fk_w_id`, `log_report`, `log_date`) VALUES
(44, 10, 'Worker:  Simamkele Ndabeni  Action:  Edited natural details for client . Linda Momoza', '2019-12-08 01:12:19'),
(45, 10, 'Worker:  Simamkele Ndabeni  Action:  Edited natural details for client . Linda Momoza', '2019-12-08 01:12:42'),
(46, 10, 'Worker:  Simamkele Ndabeni  Action:  Logged in', '2019-12-08 01:12:20'),
(47, 10, 'Worker:  Simamkele Ndabeni  Action:  Logged in', '2019-12-08 03:12:44'),
(48, 10, 'Worker:  Simamkele Ndabeni  Action:  Edited client,Sinethemba Mgoqi', '2019-12-08 04:12:44'),
(49, 10, 'Worker:  Simamkele Ndabeni  Action:  Edited client,Sinethemba Mgoqi', '2019-12-08 04:12:16'),
(50, 10, 'Worker:  Simamkele Ndabeni  Action:  Edited client,Sinethemba Mgoqi', '2019-12-08 04:12:44'),
(51, 10, 'Worker:  Simamkele Ndabeni  Action:  Edited client,Sinethemba Mgoqi', '2019-12-08 04:12:56'),
(52, 10, 'Worker:  Simamkele Ndabeni  Action:  Edited client,Sinethemba Mgoqis', '2019-12-08 04:12:14'),
(53, 10, 'Worker:  Simamkele Ndabeni  Action:  edited Juristics info for company, Open Sesyme with registration number 5555SD52hhjj', '2019-12-08 04:12:42'),
(54, 10, 'Worker:  Simamkele Ndabeni  Action:  Logged out', '2019-12-08 04:12:58'),
(55, 8, 'Worker:  Rolihlahla Vuzane  Action:  Logged in', '2019-12-08 04:12:06'),
(56, 8, 'Rolihlahla Vuzane, Logged in', '2020-03-13 11:01:11'),
(57, 8, 'Rolihlahla Vuzane, Logged out', '2020-03-13 11:01:15'),
(58, 8, 'Rolihlahla Vuzane, Logged in', '2020-03-13 11:01:23'),
(59, 8, 'Rolihlahla Vuzane, Logged in', '2020-03-13 11:14:26'),
(60, 8, 'Rolihlahla Vuzane, Logged out', '2020-03-13 11:31:43'),
(61, 8, 'Rolihlahla Vuzane, Logged in', '2020-03-13 15:07:09'),
(62, 8, 'Rolihlahla Vuzane, Edited client,Rholihlahla Vuzane', '2020-03-13 15:09:17'),
(63, 8, 'Rolihlahla Vuzane, Logged in', '2020-03-13 15:33:39'),
(64, 8, 'Rolihlahla Vuzane, Logged in', '2020-03-13 14:27:00'),
(65, 8, 'Rolihlahla Vuzane, added customary spouse Bongiwe Nocaka', '2020-03-13 14:53:44'),
(66, 10, 'Simamkele Ndabeni, Logged in', '2020-03-13 15:03:13'),
(67, 10, 'Simamkele Ndabeni, added civil spouse, Linda  Momoza', '2020-03-13 18:06:17'),
(68, 10, 'Simamkele Ndabeni, Edited natural details for client Mr. Rholihlahla Vuzane', '2020-03-13 18:16:02'),
(69, 10, 'Simamkele Ndabeni, added civil spouse, Linda  Momoza', '2020-03-13 18:18:57'),
(70, 10, 'Simamkele Ndabeni, added civil spouse, Linda  Momoza', '2020-03-13 18:22:14'),
(71, 10, 'Simamkele Ndabeni, added civil spouse, Linda  Momoza', '2020-03-13 18:24:54'),
(72, 8, 'Rolihlahla Vuzane, Logged in', '2020-03-13 18:29:24'),
(73, 8, 'Rolihlahla Vuzane, Logged in', '2020-03-14 09:43:36'),
(74, 8, 'Rolihlahla Vuzane, edited civil spouse, Masibulele  Mgoai', '2020-03-14 09:44:10'),
(75, 8, 'Rolihlahla Vuzane, Logged in', '2020-03-14 09:50:21'),
(76, 8, 'Rolihlahla Vuzane, edited civil spouse, Masibulele  Masibulele', '2020-03-14 10:21:23'),
(77, 8, 'Rolihlahla Vuzane, edited civil spouse, Masibulele  Masibulele', '2020-03-14 10:23:15'),
(78, 8, 'Rolihlahla Vuzane, edited civil spouse, Masibulele  Masibulele', '2020-03-14 10:24:19'),
(79, 8, 'Rolihlahla Vuzane, edited civil spouse, Masibulele  Masibulele', '2020-03-14 10:26:19'),
(80, 8, 'Rolihlahla Vuzane, edited civil spouse, Masibulele  Masibulele', '2020-03-14 10:26:39'),
(81, 8, 'Rolihlahla Vuzane, edited civil spouse, Masibulele  Masibulele', '2020-03-14 10:26:54'),
(82, 8, 'Rolihlahla Vuzane, edited civil spouse, Masibulele  Masibulele', '2020-03-14 10:27:15'),
(83, 8, 'Rolihlahla Vuzane, edited civil spouse, Masibulele  Masibulele', '2020-03-14 10:27:22'),
(84, 8, 'Rolihlahla Vuzane, Logged out', '2020-03-14 11:04:58'),
(85, 8, 'Rolihlahla Vuzane, Logged in', '2020-03-14 11:08:03'),
(86, 8, 'Rolihlahla Vuzane, added beneficiary Sibongiseni Gwina to client, Ahluma   Mgoqi', '2020-03-14 11:16:06'),
(87, 8, 'Rolihlahla Vuzane, Edited natural details for client Dr.. Ahluma  Mgoqi', '2020-03-14 11:20:21'),
(88, 8, 'Rolihlahla Vuzane, added beneficiary Sibongiseni Gwina to client, Ahluma   Mgoqi', '2020-03-14 11:20:51'),
(89, 8, 'Rolihlahla Vuzane, added beneficiary Sibongiseni Gwina to client, Ahluma   Mgoqi', '2020-03-14 11:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `natural_tb`
--

CREATE TABLE `natural_tb` (
  `n_id` int(11) NOT NULL,
  `fk_client_id` int(11) NOT NULL,
  `n_fname` varchar(50) COLLATE utf8_bin NOT NULL,
  `n_lname` varchar(50) COLLATE utf8_bin NOT NULL,
  `n_dob` date NOT NULL,
  `n_id_number` varchar(20) COLLATE utf8_bin NOT NULL,
  `n_marital_status` varchar(10) COLLATE utf8_bin NOT NULL,
  `n_marriage_type` varchar(50) COLLATE utf8_bin NOT NULL,
  `n_middle_name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `natural_tb`
--

INSERT INTO `natural_tb` (`n_id`, `fk_client_id`, `n_fname`, `n_lname`, `n_dob`, `n_id_number`, `n_marital_status`, `n_marriage_type`, `n_middle_name`) VALUES
(4, 2, 'Linda', 'Momoza', '1990-02-18', '8495955959', 'Single', '', 'Nontlantla'),
(5, 6, 'Lilitha', 'Mgoqi', '2019-11-06', '5859968554', 'Married', 'Civil', 'Malili'),
(6, 7, 'Sinethemba', 'Mgoqi', '2019-11-14', '93015655555', 'Married', 'Customary', 'Blacky'),
(7, 8, 'Rholihlahla', 'Vuzane', '2002-06-04', '4402295898964', 'Married', 'Civil', 'Rholi'),
(8, 12, 'Ahluma ', 'Mgoqi', '2000-06-15', '0006158548521', 'Single', '', 'Hlimza');

-- --------------------------------------------------------

--
-- Table structure for table `share_holders_tb`
--

CREATE TABLE `share_holders_tb` (
  `sh_id` int(11) NOT NULL,
  `fk_j_id` int(11) NOT NULL,
  `sh_title` varchar(15) COLLATE utf8_bin NOT NULL,
  `sh_fname` varchar(50) COLLATE utf8_bin NOT NULL,
  `sh_lname` varchar(50) COLLATE utf8_bin NOT NULL,
  `sh_id_number` varchar(13) COLLATE utf8_bin NOT NULL,
  `sh_amount_contributed` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `share_holders_tb`
--

INSERT INTO `share_holders_tb` (`sh_id`, `fk_j_id`, `sh_title`, `sh_fname`, `sh_lname`, `sh_id_number`, `sh_amount_contributed`) VALUES
(10, 1, 'Mr', 'Rholihlahla', 'Vuzane', '855557552', '152222514555'),
(11, 1, 'Mr', 'Masibulele', 'Mgoqi', '9810155964086', '15000000'),
(12, 2, 'Mr', 'Rholihlahla', 'Vuzane', '6595965966', '150000');

-- --------------------------------------------------------

--
-- Table structure for table `update_tb`
--

CREATE TABLE `update_tb` (
  `update_id` int(11) NOT NULL,
  `fk_idea_id` int(11) NOT NULL,
  `update_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_description` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `workers_tb`
--

CREATE TABLE `workers_tb` (
  `w_id` int(11) NOT NULL,
  `w_fname` varchar(100) COLLATE utf8_bin NOT NULL,
  `w_lfname` varchar(100) COLLATE utf8_bin NOT NULL,
  `w_email` varchar(150) COLLATE utf8_bin NOT NULL,
  `w_type` varchar(50) COLLATE utf8_bin NOT NULL,
  `w_password` text COLLATE utf8_bin NOT NULL,
  `w_datecreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `w_active_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `workers_tb`
--

INSERT INTO `workers_tb` (`w_id`, `w_fname`, `w_lfname`, `w_email`, `w_type`, `w_password`, `w_datecreated`, `w_active_status`) VALUES
(1, 'Masibulele', 'Mgoqi', 'masibulelemgoqi@gmail.com', 'Admin', '$2y$10$nYw0uvwGyjNZQhlfaStdue/2g.TcSCvn2KR/QDh27bMmrdQfzu8P6', '2019-11-16 10:11:50', 0),
(2, 'Sinethemba', 'Mgoqi', 'sne@gmail.com', 'Admin', '$2y$10$nYw0uvwGyjNZQhlfaStdue/2g.TcSCvn2KR/QDh27bMmrdQfzu8P6', '2019-11-16 11:11:50', 0),
(8, 'Rolihlahla', 'Vuzane', 'rvuzane@gmail.com', 'CEO', '$2y$10$nYw0uvwGyjNZQhlfaStdue/2g.TcSCvn2KR/QDh27bMmrdQfzu8P6', '2019-11-16 12:11:15', 1),
(10, 'Simamkele', 'Ndabeni', 'smaverns@gmail.com', 'Preparer', '$2y$10$nYw0uvwGyjNZQhlfaStdue/2g.TcSCvn2KR/QDh27bMmrdQfzu8P6', '2019-11-16 12:11:30', 1),
(11, 'Nontlantla', 'Momoza', 'user@user.com', 'Preparer', '$2y$10$nYw0uvwGyjNZQhlfaStdue/2g.TcSCvn2KR/QDh27bMmrdQfzu8P6', '2019-11-19 09:11:44', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beneficiary_tb`
--
ALTER TABLE `beneficiary_tb`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `fk_client_id` (`fk_client_id`);

--
-- Indexes for table `civil_tb`
--
ALTER TABLE `civil_tb`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_certificate_number` (`c_certificate_number`),
  ADD KEY `fk_n_id` (`fk_n_id`);

--
-- Indexes for table `clients_tb`
--
ALTER TABLE `clients_tb`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `company_member_tb`
--
ALTER TABLE `company_member_tb`
  ADD PRIMARY KEY (`cm_id`),
  ADD KEY `fk_j_id` (`fk_j_id`);

--
-- Indexes for table `customary_spouse_tb`
--
ALTER TABLE `customary_spouse_tb`
  ADD PRIMARY KEY (`cs_id`),
  ADD UNIQUE KEY `cs_id_number` (`cs_id_number`),
  ADD KEY `cs_fk_n_id` (`cs_fk_n_id`);

--
-- Indexes for table `deligation_tb`
--
ALTER TABLE `deligation_tb`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `d_fk_cs_id` (`d_fk_cs_id`);

--
-- Indexes for table `documents_tb`
--
ALTER TABLE `documents_tb`
  ADD PRIMARY KEY (`document_id`),
  ADD KEY `fk_client_id` (`fk_client_id`);

--
-- Indexes for table `idea_tb`
--
ALTER TABLE `idea_tb`
  ADD PRIMARY KEY (`idea_id`),
  ADD UNIQUE KEY `idea_code` (`idea_code`),
  ADD KEY `fk_client_id` (`fk_client_id`);

--
-- Indexes for table `juristic_tb`
--
ALTER TABLE `juristic_tb`
  ADD PRIMARY KEY (`j_id`),
  ADD UNIQUE KEY `j_registration_number` (`j_registration_number`),
  ADD KEY `fk_client_id` (`fk_client_id`);

--
-- Indexes for table `log_tb`
--
ALTER TABLE `log_tb`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_w_id` (`fk_w_id`);

--
-- Indexes for table `natural_tb`
--
ALTER TABLE `natural_tb`
  ADD PRIMARY KEY (`n_id`),
  ADD UNIQUE KEY `n_id_number` (`n_id_number`),
  ADD KEY `fk_client_id` (`fk_client_id`);

--
-- Indexes for table `share_holders_tb`
--
ALTER TABLE `share_holders_tb`
  ADD PRIMARY KEY (`sh_id`),
  ADD KEY `fk_j_id` (`fk_j_id`);

--
-- Indexes for table `update_tb`
--
ALTER TABLE `update_tb`
  ADD PRIMARY KEY (`update_id`),
  ADD KEY `fk_client_id` (`fk_idea_id`);

--
-- Indexes for table `workers_tb`
--
ALTER TABLE `workers_tb`
  ADD PRIMARY KEY (`w_id`),
  ADD UNIQUE KEY `w_email` (`w_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beneficiary_tb`
--
ALTER TABLE `beneficiary_tb`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `civil_tb`
--
ALTER TABLE `civil_tb`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clients_tb`
--
ALTER TABLE `clients_tb`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `company_member_tb`
--
ALTER TABLE `company_member_tb`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customary_spouse_tb`
--
ALTER TABLE `customary_spouse_tb`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deligation_tb`
--
ALTER TABLE `deligation_tb`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `documents_tb`
--
ALTER TABLE `documents_tb`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `idea_tb`
--
ALTER TABLE `idea_tb`
  MODIFY `idea_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `juristic_tb`
--
ALTER TABLE `juristic_tb`
  MODIFY `j_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `log_tb`
--
ALTER TABLE `log_tb`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `natural_tb`
--
ALTER TABLE `natural_tb`
  MODIFY `n_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `share_holders_tb`
--
ALTER TABLE `share_holders_tb`
  MODIFY `sh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `update_tb`
--
ALTER TABLE `update_tb`
  MODIFY `update_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `workers_tb`
--
ALTER TABLE `workers_tb`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beneficiary_tb`
--
ALTER TABLE `beneficiary_tb`
  ADD CONSTRAINT `beneficiary_tb_ibfk_1` FOREIGN KEY (`fk_client_id`) REFERENCES `clients_tb` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `civil_tb`
--
ALTER TABLE `civil_tb`
  ADD CONSTRAINT `civil_tb_ibfk_1` FOREIGN KEY (`fk_n_id`) REFERENCES `natural_tb` (`n_id`) ON DELETE CASCADE;

--
-- Constraints for table `company_member_tb`
--
ALTER TABLE `company_member_tb`
  ADD CONSTRAINT `company_member_tb_ibfk_1` FOREIGN KEY (`fk_j_id`) REFERENCES `juristic_tb` (`j_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customary_spouse_tb`
--
ALTER TABLE `customary_spouse_tb`
  ADD CONSTRAINT `customary_spouse_tb_ibfk_1` FOREIGN KEY (`cs_fk_n_id`) REFERENCES `natural_tb` (`n_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deligation_tb`
--
ALTER TABLE `deligation_tb`
  ADD CONSTRAINT `deligation_tb_ibfk_1` FOREIGN KEY (`d_fk_cs_id`) REFERENCES `customary_spouse_tb` (`cs_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `documents_tb`
--
ALTER TABLE `documents_tb`
  ADD CONSTRAINT `documents_tb_ibfk_1` FOREIGN KEY (`fk_client_id`) REFERENCES `clients_tb` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `idea_tb`
--
ALTER TABLE `idea_tb`
  ADD CONSTRAINT `idea_tb_ibfk_1` FOREIGN KEY (`fk_client_id`) REFERENCES `clients_tb` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `juristic_tb`
--
ALTER TABLE `juristic_tb`
  ADD CONSTRAINT `juristic_tb_ibfk_1` FOREIGN KEY (`fk_client_id`) REFERENCES `clients_tb` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `log_tb`
--
ALTER TABLE `log_tb`
  ADD CONSTRAINT `log_tb_ibfk_1` FOREIGN KEY (`fk_w_id`) REFERENCES `workers_tb` (`w_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `natural_tb`
--
ALTER TABLE `natural_tb`
  ADD CONSTRAINT `natural_tb_ibfk_1` FOREIGN KEY (`fk_client_id`) REFERENCES `clients_tb` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `share_holders_tb`
--
ALTER TABLE `share_holders_tb`
  ADD CONSTRAINT `share_holders_tb_ibfk_1` FOREIGN KEY (`fk_j_id`) REFERENCES `juristic_tb` (`j_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `update_tb`
--
ALTER TABLE `update_tb`
  ADD CONSTRAINT `update_tb_ibfk_1` FOREIGN KEY (`fk_idea_id`) REFERENCES `idea_tb` (`idea_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
