-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb23.awardspace.net
-- Generation Time: Jun 13, 2021 at 04:03 PM
-- Server version: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2819247_onlineexam`
--
CREATE DATABASE IF NOT EXISTS `2819247_onlineexam` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `2819247_onlineexam`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', '20efd036dd2c2b36d8b63cdf940e1a23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `correctAns` int(11) DEFAULT '0',
  `ans` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `correctAns`, `ans`) VALUES
(80, 1, 0, 'Dr. E.F. Codd'),
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
(24, 5, 1, ' both (a) and (b)'),
(38, 8, 0, 'To encode X gal'),
(37, 8, 1, 'To encode bita galacosidase'),
(68, 7, 0, 'Civil Science and Engineering'),
(67, 7, 0, 'Chemical Science and Engineering'),
(72, 6, 0, 'D'),
(71, 6, 0, 'C'),
(70, 6, 0, 'B'),
(69, 6, 1, 'A'),
(39, 8, 0, 'To encode Tol plasmid'),
(40, 8, 0, 'To converts phenoxyacetate'),
(41, 9, 0, 'charles darwin'),
(42, 9, 0, 'Rachel carson'),
(43, 9, 0, 'Ernst Haeckel'),
(44, 9, 1, 'Alexander von humboldt'),
(79, 1, 0, 'James A. Gosling'),
(78, 1, 1, 'Dennis Ritchie'),
(77, 1, 0, 'Bjarne Stroustrup'),
(65, 7, 1, 'Computer Science and Engineering'),
(66, 7, 0, 'Communication Science and Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

CREATE TABLE `tbl_ques` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL,
  `ques_for_study` text NOT NULL,
  `ans_for_study` text NOT NULL,
  `exp_for_study` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesNo`, `ques`, `ques_for_study`, `ans_for_study`, `exp_for_study`) VALUES
(1, 1, 'Who is father of C Language?', 'Who is father of C Language?', 'Dennis Ritchie', ''),
(2, 2, 'C Language developed at _____?', 'Where is C Language developed?', 'AT & T\'s Bell Laboratories of USA in 1972', ''),
(3, 3, 'For 16-bit compiler allowable range for integer constants is ______ ?', 'For 16-bit compiler allowable range for integer constants is ______ ?', '-32768 to 32767', 'it is defined by 2^bit number which is 2^16. for negative+positive.'),
(4, 4, 'C programs are converted into machine language with the help of', 'C programs are converted into machine language with the help of?', 'A compiler', NULL),
(6, 5, ' A C variable cannot start with', ' A C variable cannot start with', 'A special symbol other than underscore. And also can not start withnumber.', NULL),
(8, 7, 'What is the full form of CSE?', 'What is the full form of CSE?', 'Computer Science and Engineering', 'demo explanation '),
(9, 6, 'A demo', 'A demo', 'A', ''),
(10, 8, 'what is the use of lacz?', 'what is the use of lacz?', '1', 'lacz is the genetic code in many microorganism.It encode bita galactosidase an intracellular enzyme that cleaves dissacharides lactose into glucose nd galactose.'),
(11, 9, 'Who is the father of ecology ?', 'Who is the father of ecology ?', '4', 'Alexander von Humboldt was th first to take on the study of relationship between organism and environment.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `name`, `username`, `password`, `email`, `status`) VALUES
(7, 'abir', 'abir', '20efd036dd2c2b36d8b63cdf940e1a23', 'abir@mail.com', 0),
(8, 'Hello', 'hello', 'cbd357125a99321c2a08e0206a97622f', 'hello@mail.com', 0),
(9, 'fahmida yesmin', 'fahmidayesmin1995', 'fdaf7382891527c5e6d24f6b4e13ec13', 'fahmidayesmin1995@gmail.com', 0),
(10, 'Fahmida Yesmin', 'fahmidachamak1995', '5019141a7d4a082c95b927f968f7bfa9', 'fahmidayesmin1995@gmail.com', 0),
(11, 'MD. Saniur Rahman Siam', 'Siam', '79fe70474174984383cc980deb9934c9', 'saniursiam@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
