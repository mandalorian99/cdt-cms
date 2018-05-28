-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2018 at 11:59 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dev_hdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admincredentials`
--

CREATE TABLE IF NOT EXISTS `admincredentials` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admincredentials`
--

INSERT INTO `admincredentials` (`id`, `username`, `email`, `password`) VALUES
(1, 'Admin', 'admin@zoho.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_details`
--

CREATE TABLE IF NOT EXISTS `attendance_details` (
  `user_id` tinyint(4) NOT NULL,
  `class_attended` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_details`
--

INSERT INTO `attendance_details` (`user_id`, `class_attended`) VALUES
(95, 7),
(96, 3),
(97, 0),
(98, 5),
(99, 7),
(100, 7);

-- --------------------------------------------------------

--
-- Table structure for table `certificate_details`
--

CREATE TABLE IF NOT EXISTS `certificate_details` (
  `user_id` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificate_details`
--

INSERT INTO `certificate_details` (`user_id`, `status`) VALUES
(95, 1),
(96, 1),
(97, 0),
(98, 0),
(99, 0),
(100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `registration_details`
--

CREATE TABLE IF NOT EXISTS `registration_details` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `registration_type` varchar(255) NOT NULL,
  `pass_no` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `registrar_name` varchar(255) NOT NULL,
  `reg_date` varchar(255) NOT NULL,
  `reg_month` varchar(255) NOT NULL,
  `reg_year` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `age` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amt_paid` varchar(255) NOT NULL,
  `amt_due` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=138 ;

--
-- Dumping data for table `registration_details`
--

INSERT INTO `registration_details` (`user_id`, `registration_type`, `pass_no`, `name`, `registrar_name`, `reg_date`, `reg_month`, `reg_year`, `address`, `area`, `city`, `gender`, `age`, `occupation`, `mobile`, `email`, `amt_paid`, `amt_due`) VALUES
(95, 'family', '9994', 'Mahendra Choudhary', 'narendra soni', '16', 'January', 'thecodestuff.com', '1, vaishali', 'amarpali', 'jaipur', 'female', '42', 'House Wife ', '6754732489', 'info.thecodestuff@gmail.com', '200', '00'),
(96, 'family', '1534', 'Mahendra Choudhary', 'narendra soni', '16', 'January', 'thecodestuff.com', '1, vaishali', 'khatipura', 'jaipur', 'male', '24', '', '89365033', 'info.thecodestuff@gmail.com', '200', '30'),
(97, 'single', '1461', 'Bal Krishna', 'narendra soni', '18', 'February', '2018', 'Laxmi Naryan Temple ', 'C- Secheme', 'jaipur', 'male', '29', '', '9509339583', 'balkrishna@rediff.com', '200', '00'),
(98, 'single', '1461', 'Bal Krishna', 'narendra soni', '18', 'February', '2018', 'Laxmi Naryan Temple ', 'C- Secheme', 'jaipur', 'male', '29', '', '9509339583', 'balkrishan2@rediff.com', '200', '128'),
(99, 'single', '1492', 'Ravi Gupta', 'narendra soni', '18', 'February', '2018', 'Pratap Nager  ', 'Jagatpura ', 'jaipur', 'male', '36', '', '9460031891', 'mail.ravigupta@gmail.com', '200', '00'),
(100, 'single', '1493', 'REKHA GOYAL ', 'narendra soni', '18', 'February', '2018', 'Pratap Nager  ', '36', 'jaipur', 'male', '31', '', '', 'rekha334@gmail.com', '200', '00'),
(101, 'single', '1570', 'RAJENDRA KALAL', 'narendra soni', '18', 'February', '2018', 'Sec- pratap nager ', 'Jagatpura ', 'jaipur', '', '32', '', '9571243731', 'rajendra.mail@gmail.com', '200', '100'),
(102, 'single', '1462', 'ANUP DOGRA', 'narendra soni', '25', 'February', '2018', 'Mahima Panorma', 'Jagatpura ', 'jaipur', '', '42', '', '9001882255', 'anup@hotmail.com', '200', '00'),
(103, 'single', '1463', 'KAILASH GANGAL', 'narendra soni', '24', 'February', '2018', 'sfs mansorver', 'mansorver', 'jaipur', '', '54', '', '8949061612', 'khailash@gangal.com', '200', '00'),
(109, 'family', '1534', 'Sonu', 'narendra soni', '16', 'January', '2018', 'down', 'hugli', 'kolkata', 'male', '23', 'dev ops', '7982744320', 'sonu@yahoo.com', '200', '30'),
(110, 'family', '1534', 'Sonu', 'narendra soni', '16', 'January', '2018', 'downtown', 'jaipur', 'jaipr', 'male', '21', '', '74743433', 'sonu@yahoo.com', '200', '30'),
(111, 'family', '1534', 'Sonu', 'narendra soni', '16', 'January', '2018', '', '', '', '', '', '', '999999999', 'sonu@yahoo.com', '200', '30'),
(112, 'family', '7432', 'suman', 'narendra', '5', '24', '2018', '1-chandole', 'chandpole', 'jaipur', 'female', '26', 'house wife', '999999999', 'suman@gmail.com', '1000', '500'),
(137, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(136, 'single', '999', 'don bosko', 'don alec', '24', '5', '2018', 'thompsomn street', 'washington', 'baltimore', 'male', '38', 'analyst', '9890909090', 'don@boss.com', '2000', '00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
