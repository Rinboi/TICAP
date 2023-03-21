-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 04:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taguig_integrated_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) DEFAULT NULL,
  `admin_password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'admin', '$2y$10$ddsm9XkNm9zkm1ytyrKJbuEtpwkR8hl5AdG7NkfQJ7wwjzqn7PRU2');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcement_id` int(11) NOT NULL,
  `announcement_title` varchar(256) NOT NULL,
  `announcement_content` varchar(1000) NOT NULL,
  `announcement_date` varchar(100) NOT NULL,
  `announcement_time` varchar(100) NOT NULL,
  `announcement_author` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(256) NOT NULL,
  `news_content` varchar(1000) NOT NULL,
  `news_date` varchar(100) NOT NULL,
  `news_time` varchar(100) NOT NULL,
  `news_author` varchar(100) NOT NULL,
  `image` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `school_address` varchar(200) DEFAULT NULL,
  `contact_number` varchar(200) DEFAULT NULL,
  `school_logo` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `school_name`, `school_address`, `contact_number`, `school_logo`) VALUES
(1, 'Taguig Integrated School', 'LIWAYWAY STREET, STA. ANA TAGUIG CITY 1632', '275-51-09', '63f56f5a629c38.98721623.png');

-- --------------------------------------------------------

--
-- Table structure for table `student_registration`
--

CREATE TABLE `student_registration` (
  `student_id` varchar(100) NOT NULL,
  `student_type` varchar(100) NOT NULL,
  `student_grade_level` varchar(100) NOT NULL,
  `student_firstname` varchar(100) NOT NULL,
  `student_middlename` varchar(100) DEFAULT NULL,
  `student_lastname` varchar(100) NOT NULL,
  `student_birthdate` varchar(100) NOT NULL,
  `student_gender` varchar(100) NOT NULL,
  `student_street_address` varchar(100) NOT NULL,
  `student_city` varchar(100) NOT NULL,
  `student_province` varchar(100) NOT NULL,
  `guardian_relationship` varchar(100) NOT NULL,
  `guardian_firstname` varchar(100) NOT NULL,
  `guardian_middlename` varchar(100) NOT NULL,
  `guardian_lastname` varchar(100) NOT NULL,
  `guardian_mobile` varchar(100) NOT NULL,
  `guardian_email` varchar(100) NOT NULL,
  `registration_date` varchar(100) NOT NULL,
  `registration_time` varchar(100) NOT NULL,
  `registration_status` varchar(100) NOT NULL,
  `studpassword` varchar(1000) NOT NULL,
  `studpicture` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `student_registration`
--
ALTER TABLE `student_registration`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
