-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 07:59 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

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
(55, 8, 'Worker:  Rolihlahla Vuzane  Action:  Logged in', '2019-12-08 04:12:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_tb`
--
ALTER TABLE `log_tb`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `fk_w_id` (`fk_w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_tb`
--
ALTER TABLE `log_tb`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_tb`
--
ALTER TABLE `log_tb`
  ADD CONSTRAINT `log_tb_ibfk_1` FOREIGN KEY (`fk_w_id`) REFERENCES `workers_tb` (`w_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
