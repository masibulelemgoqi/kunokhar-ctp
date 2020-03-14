-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2019 at 08:05 PM
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beneficiary_tb`
--
ALTER TABLE `beneficiary_tb`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beneficiary_tb`
--
ALTER TABLE `beneficiary_tb`
  ADD CONSTRAINT `beneficiary_tb_ibfk_1` FOREIGN KEY (`fk_client_id`) REFERENCES `clients_tb` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
