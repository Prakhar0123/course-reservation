-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 11:22 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `mail` varchar(255) NOT NULL,
  `crs` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`mail`, `crs`) VALUES
('tyson@gmail.com', ', hksvzaDNLB ;dizhmkuyg'),
('tyson@gmail.com', ', hksvzaDNLB ;dizhmkuyg'),
('tyson@gmail.com', 'knajfuj vxk'),
('jailer@gmail.com', ', hksvzaDNLB ;dizhmkuyg'),
('jailer@gmail.com', 'dlmvidlnb'),
('jailer@gmail.com', ', hksvzaDNLB ;dizh'),
('jailer@gmail.com', ' hysdfguhi'),
('jailer@gmail.com', ', hksvzaDNLB ;dizhmkuyg'),
('sid@gmail.com', ', hksvzaDNLB ;dizhmkuyg'),
('sid@gmail.com', 'klfbhozsdnbl'),
('sid@gmail.com', 'dlmvidlnb'),
('sid@gmail.com', 'njsdbvvdjsh'),
('sid@gmail.com', 'dlmvidlnb'),
('sid@gmail.com', ' hysdfguhi'),
('sid@gmail.com', 'm zhjvzdm .'),
('sid@gmail.com', ', hksvzaDNLB ;dizh'),
('sid@gmail.com', 'knajfuj vxk'),
('sid@gmail.com', ', hksvzaDNLB ;dizhmkuyg'),
('krypton@gmail.com', ', hksvzaDNLB ;dizhmkuyg'),
('sid@gmail.com', ', hksvzaDNLB ;dizh'),
('sid@gmail.com', 'three,two,one,let\'s math'),
('fpofdisugy@gmail.com', 'km'),
('fpofdisugy@gmail.com', 'three,two,one,let\'s math'),
('er@gmail.com', 'km'),
('er@gmail.com', 'nklduisgvHJNfkb'),
('abcde@gmail.com', 'three,two,one,let\'s math');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `crs` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`crs`, `des`) VALUES
(' hysdfguhi', 'meygsfd\r\newckngj h\r\nwqe\'r;gbknjh4w\r\newv][lbpgohi5w4e]r[pogiq7\\w]e\r\n[poq7\\][p87\\q][WAESGHQ\r\nE7W\'\\V;SB]L[PS\r\nCDVS[LDPK OJ8\r\n7\'ae][wsp[o87\\][BPOHJND7\\]['),
(', hksvzaDNLB ;dizh', 'c6\r\nSDFN vsklvbnbzljfeO: 24/wf\'dlnZF4Npzf4HM\'lf\r\nz\'4seg\r\n6}PE{oEg\r\n\r\n\'ho[\r\n\r\nHmOP\r\nGRHm>HR/}LhoJGErh;l|'),
(', hksvzaDNLB ;dizhmkuyg', 'c6\r\nSDFN vsklvbnbzljfeO: 24/wf\'dlnZF4Npzf4HM\'lf\r\nz\'4seg\r\n6}PE{oEg\r\n\r\n\'ho[\r\n\r\nHmOP\r\nGRHm>HR/}LhoJGErh;l|'),
('dlmvidlnb', '.d/fmvlidofhbz,.\r\nz/\r\n[]p[bzb\'\r\n4zsbl;nzb/4\r\n\\;\\sphftx87]s\\j\r\ns4s]sx86j\\js7xj\r\n\'sx8-\\s\r\n]ls'),
('klfbhozsdnbl', '1dFz6bz\\\r\n85zd65\r\n7dx\r\ncgM\r\n]hj;,4\\hj<5\r\nl7\\o;\r\nhio1lg6\r\n7\\\r\njilF\'k4hD\r\n[;z\r\nf]2\\5r\'g\\EF\r\nae/[;f54Fe\r\nW\r\nd42\r\nF\'F\r\nF\r\n7'),
('km', 's,doiGPSDMMBvVtYfuL\'l=]5qs478Ddl\'mnuyfgM,opcsm,\r\n'),
('knajfuj vxk', '><C JZK'),
('m zhjvzdm .', 'mzdjvbx ,\r\n\\JSBVdusI:F\"\r\n\r\nlusovd\r\nB\"NuoDB:fnz7\\E\r\nG\'4a\":pihDSB\r\nz5f\'npozihfvd\r\n]nz86\';r[ojh\'seg_}G/\"E:HuifeKG[;H4\\\r\nZH\'IUGn;'),
('mivuhasnvhjyfv', 'DNUIYGAHILNVM,\r\n]AE;VNUIGEYvhVTFJKKIH2KL;oYPLKILBHBGNSJBtfg'),
('njsdbvvdjsh', 's,ndbvhjsbd;.MN Ds cmDCHn:\">Sc/\r\ns4\\\';;nbckj\r\n]L'),
('nklduisgvHJNfkb', ' kjshcjzvgdx\r\na hkS\r\nD4\'oajfd\r\nzmgn\r\nxm567x\'igh\r\nF\'57\r\nk\r\nzfg\r\nm5h7g\r\nh;;\'x4\r\nm\\\r\n[\\m\r\nx4\r\nh\'m]xpm\'z;]\r\npz\r\nm5h\r\nc\'m]x\\\r\nx4m\\]x'),
('three,two,one,let\'s math', ' djbskvbjvsMC;,kdcvc cscbSMC;/slicho; cC,chj');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `mail` varchar(255) NOT NULL,
  `no` bigint(10) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`mail`, `no`, `pw`, `dt`) VALUES
('123learn@gmail.com', 7410235689, '852.258', '2024-09-16 19:59:25'),
('326453845dcvgf@gmail.com', 9521563842, '3re65', '2024-09-29 19:50:53'),
('abc123@gmail.com', 1234567890, '1234a', '2024-09-17 18:45:37'),
('abc@gmail.com', 6958232159, 'qwertyuiop', '2024-09-29 19:48:25'),
('abcde@gmail.com', 7894561232, 'edcba', '2024-12-12 07:08:54'),
('dfbhugi@gmail.com', 3695464896, 'wrg51et8', '2024-09-29 19:52:29'),
('er25@gmail.com', 3489451358, 'nksudg', '2024-09-29 19:52:07'),
('er@gmail.com', 5648954874, 'poco', '2024-12-05 13:16:19'),
('fpofdisugy@gmail.com', 345565774, '329', '2024-09-29 19:50:18'),
('jailer@gmail.com', 4236523254, '101010', '2024-12-05 08:44:01'),
('jshevcsv@gmail.com', 2845146256, '123456', '2024-10-23 10:55:54'),
('krypton@gmail.com', 7894561230, '123456', '2024-09-16 19:25:44'),
('mkgbuh@gmail.com', 6228168745, 'srkduhi', '2024-09-29 19:51:47'),
('oihuygv@gmail.com', 4875821544, '5985', '2024-09-29 19:49:25'),
('sid@gmail.com', 7894561235, '123456', '2024-10-23 10:56:21'),
('tyson@gmail.com', 254512015456, '123456', '2024-12-04 07:44:54'),
('wyuads@gmail.com', 4789632143, 'lpoihuy', '2024-09-29 19:48:58'),
('zdnsjkuzy@gmail.com', 6856592692, 'oas8696', '2024-09-29 19:49:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`crs`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`mail`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
