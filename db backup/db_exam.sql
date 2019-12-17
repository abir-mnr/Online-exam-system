-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2019 at 06:16 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `adminId` int(11) NOT NULL AUTO_INCREMENT,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(32) NOT NULL,
  PRIMARY KEY (`adminId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

DROP TABLE IF EXISTS `tbl_ans`;
CREATE TABLE IF NOT EXISTS `tbl_ans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quesNo` int(11) NOT NULL,
  `correctAns` int(11) DEFAULT '0',
  `ans` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `correctAns`, `ans`) VALUES
(1, 1, 0, 'Bjarne Stroustrup'),
(2, 1, 1, ' Dennis Ritchie'),
(3, 1, 0, 'James A. Gosling'),
(4, 1, 0, ' Dr. E.F. Codd'),
(5, 2, 1, 'AT & T\'s Bell Laboratories of USA in 1972'),
(6, 2, 0, ' AT & T\'s Bell Laboratories of USA in 1970'),
(7, 2, 0, 'Sun Microsystems in 1973'),
(8, 2, 0, 'Cambridge University in 1972'),
(9, 3, 0, ' -3.4e38 to 3.4e38'),
(10, 3, 0, ' -32767 to 32768'),
(11, 3, 1, ' -32768 to 32767'),
(12, 3, 0, ' -32668 to 32667'),
(13, 4, 0, ' An Editor'),
(14, 4, 1, ' A compiler'),
(15, 4, 0, ' An operating system'),
(16, 4, 0, 'None of the above'),
(23, 5, 0, ' A special symbol other than underscore'),
(22, 5, 0, ' A number'),
(21, 5, 0, 'An alphabet'),
(24, 5, 1, ' both (b) and (c)'),
(25, 6, 0, 'choise a'),
(26, 6, 0, 'choise b'),
(27, 6, 0, 'choise c'),
(28, 6, 1, 'choise d');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

DROP TABLE IF EXISTS `tbl_ques`;
CREATE TABLE IF NOT EXISTS `tbl_ques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesNo`, `ques`) VALUES
(1, 1, 'Who is father of C Language?'),
(2, 2, 'C Language developed at _____?'),
(3, 3, 'For 16-bit compiler allowable range for integer constants is ______ ?'),
(4, 4, 'C programs are converted into machine language with the help of'),
(6, 5, ' A C variable cannot start with'),
(7, 6, 'a ques');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `name`, `username`, `password`, `email`, `status`) VALUES
(1, 'Abir', 'abir', '9ab209d66a9bf2250d7f56cc4b3b125d', 'abir@gmail.com', 0),
(5, 'chamak', 'chamak', 'c8e004a9b21ee6fef12953693a734cee', 'chamak@gmail.com', 0),
(6, 'aperson', 'aperson', '2fac48008787329ecde8fc22ac456835', 'aperson@gmail.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
