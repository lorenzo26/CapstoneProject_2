-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2017 at 10:47 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examination`
--

-- --------------------------------------------------------

--
-- Table structure for table `createact`
--

CREATE TABLE `createact` (
  `create_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `numque` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `createact`
--

INSERT INTO `createact` (`create_id`, `title`, `numque`, `status`) VALUES
(926930255, 'Quiz 2', 2, 'unlocked'),
(1623270086, 'Exam 1', 10, 'unlocked');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `email_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `unread_email` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `from_id` varchar(255) NOT NULL,
  `messages` text NOT NULL,
  `sentTo_id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `message_id` int(7) NOT NULL,
  `unread_msg` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question` longtext NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `create_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question`, `option1`, `option2`, `option3`, `option4`, `answer`, `create_id`, `question_id`, `id`) VALUES
('From what location are the 1st computer instructions available on boot up?', 'ROM BIOS', 'CPU', 'boot.ini', 'CONFIG.SYS', 'ROM BIOS', 1623270086, 1, 61),
('What could cause a fixed disk error', 'No-CD installed', 'Bad Ram', 'slow processor', 'Incorrect CMOS settings', 'Incorrect CMOS settings', 1623270086, 2, 62),
('Missing slot covers on a computer can cause?', 'over heat', 'power surges', 'EMI', 'incomplete path for ESD', 'over heat', 1623270086, 3, 63),
('When installing PCI NICS you can check the IRQ availability by looking at', 'dip switches', 'CONFIG.SYS', 'jumper settings', 'motherboard BIOS', 'motherboard BIOS', 1623270086, 4, 64),
('With respect to a network interface card, the term 10/100 refers to', 'protocol speed', 'a fiber speed', 'megabits per seconds', 'minimum and maximum server speed', 'megabits per seconds', 1623270086, 5, 65),
('Which Motherboard form factor uses one 20 pin connector', 'ATX', 'AT', 'BABY AT', 'All of the above', 'ATX', 1623270086, 6, 66),
('A hard disk is divided into tracks which are further subdivided into', 'clusters', 'sectors', 'vectors', 'heads', 'sectors', 1623270086, 7, 67),
('A wrist grounding strap contains which of the following', 'Surge protector', 'Capacitor', 'Voltmeter', 'Resistor', 'Resistor', 1623270086, 8, 68),
('Which standard govern parallel communications?', 'RS232', 'RS-232a', 'CAT 5', 'IEEE 1284', 'IEEE 1284', 1623270086, 9, 69),
('In laser printer technology, what happens during the conditioning stage?', 'The corona wire places a uniform positive charge on the paper', 'A uniform negative charge is placed on the photosensitive drum', 'A uniform negative charge is placed on the toner', 'All of the above', 'A uniform negative charge is placed on the photosensitive drum', 1623270086, 10, 70),
('From what location are the 1st computer instructions available on boot up?', 'ROM BIOS', 'CPU', 'boot.ini', 'CONFIG.SYS', 'ROM BIOS', 926930255, 92673, 72),
('What could cause a fixed disk error', 'No-CD installed', 'Bad Ram', 'slow processor', 'Incorrect CMOS settings', 'Incorrect CMOS settings', 926930255, 56179, 73);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `student_answer` varchar(255) NOT NULL,
  `question_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question_num` int(11) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `create_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result_info`
--

CREATE TABLE `result_info` (
  `result_id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `score` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `create_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `quizstate` varchar(255) NOT NULL,
  `examstate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(7) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `avatar` longblob NOT NULL,
  `password` varchar(255) NOT NULL,
  `regdate` varchar(255) NOT NULL,
  `online` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `lastName`, `firstName`, `middleName`, `gender`, `email`, `address`, `role`, `avatar`, `password`, `regdate`, `online`) VALUES
(115977, 'Hash', 'Erick', 'Aniko', 'Male', 'erick23@yahoo.com', '#998 KITMA ROAD', 'Student', '', '123456', '2017-Jul-12, 01:02:13pm', 0),
(121098, 'Fratts', 'John', 'Oli', 'Male', 'JOHN_FR@GMAIL.COM', '#45 KIAS ROAD, BAGUIO CITY', 'Student', '', '123456', '2017-Jul-12, 12:20:36pm', 0),
(158349, 'Gayao', 'Kyle Gio', 'Degay', 'Male', 'KYLEGIOGAYAO@OUTLOOK.COM', 'FC 123 BALILI, LA TRINIDAD, BENGUET', 'Student', '', '123456', '2017-Jul-12, 12:18:36pm', 0),
(203990, 'Maliwat', 'Daniel', 'Cruz', 'Male', 'DAN_MALIWAT@GMAIL.COM', '#64 MAGSAYSAY RD, BAGUIO CITY', 'Student', '', '123456', '2017-Jul-12, 12:23:33pm', NULL),
(246415, 'Hidalgo', 'Allen', 'Sanrio', 'Female', 'ALLEN_HIDALGO@GMAIL.COM', '#10 KIAS ROAD, BAGUIO CITY', 'Student', '', '123456', '2017-Jul-12, 12:25:20pm', 0),
(259690, 'Amparo', 'Noela', 'Aclopen', 'Female', 'noela@yahoo.com', 'baguio city', 'Student', '', '123456', '2017-Jul-12, 12:11:36pm', NULL),
(294545, 'Halog', 'Benjamin', 'Molina', 'Male', 'BEJANHALOG@YAHOO.COM', '#28 STO ROSARIO VALLEY', 'Student', '', '123456', '2017-Jul-12, 12:30:17pm', NULL),
(297161, 'Mangali', 'Robert', 'Indo', 'Male', 'ROB_MAN@GMAIL.COM', '#12 CITY CAMP, BAGUIO CITY', 'Student', '', '123456', '2017-Jul-12, 12:21:30pm', NULL),
(369587, 'SAPUAY', 'EYREJEAN LIEZLE', 'TABIOS', 'Female', 'EYREJEAN.SAPUAY@GMAIL.COM', 'BLK3 LOT136 GREENWOODS HEIGHTS, DASMARINAS CA', 'Student', '', '123456', '2017-Jul-12, 12:18:58pm', NULL),
(381752, 'Trilyo', 'Dennis', 'Magasanog', 'Male', 'DEHINS_THRILL@GMAIL.COM', '#40 CITY CAMP, BAGUIO CITY', 'Student', '', '123456', '2017-Jul-12, 12:26:20pm', NULL),
(385553, 'Magdayag', 'Christine', 'Masinop', 'Female', 'CM_MADAYAG@GMAIL.COM', '#25 LEPA BARANGAY, BINALONAN', 'Student', '', '123456', '2017-Jul-12, 12:24:50pm', NULL),
(464798, 'Montero', 'Christina', 'Cruz', 'Female', 'CHRISTINA_MONTERO13@GMAIL.COM', '#77 MARCOS HIGHWAY, BAGUIO CITY', 'Student', '', '123456', '2017-Jul-12, 12:29:25pm', NULL),
(603830, 'Tolentino', 'Lenny', 'Manalo', 'Female', 'LENNY_T@YAHOO.COM', '#22 PALAWAN STREET, SAMPALOC MANILA', 'Student', '', '123456', '2017-Jul-12, 12:23:55pm', NULL),
(651628, 'Katapang', 'Ronnie', 'Umali', 'Male', 'RK_KATAPANG@YAHOO.COM', '#05 GUISAD RD, BAGUIO CITY', 'Student', '', '123456', '2017-Jul-12, 12:25:46pm', NULL),
(718350, 'Pecson', 'Andrien', 'Bauzon', 'Male', 'dren.pecason@yahoo.com', '#865 brgy. Lipay Sta.cruz Zamblaes', 'Student', '', '123456', '2017-Jul-12, 12:09:55pm', NULL),
(722802, 'FAN', 'Peter', 'Ortega', 'Male', 'PETER_FAN@GMAIL.COM', '#20 SPRINGVILLE, SANLUIS VILLAGE', 'Student', '', '123456', '2017-Jul-12, 12:19:29pm', 0),
(733476, 'Guiyab', 'Allyza', 'CUEVAS', 'Female', 'AG_GUIYAB@HOTMAIL.COM', '#54 CAMP 7, BAGUIO CITY', 'Student', '', '123456', '2017-Jul-12, 12:27:04pm', NULL),
(763581, 'Lozares', 'Andrew', 'Mahanan', 'Male', 'ANDREWLOZARES@GMAIL.COM', '#87 KISAD RD, BAGUIO CITY', 'Student', '', '123456', '2017-Jul-12, 12:22:02pm', NULL),
(782562, 'Halog', 'Samantha Dhabie Ann', 'Molina', 'Female', 'dhabiehalog@gmail.com', '#28 Sto Rosario Valley, Baguio City', 'Student', '', '123456', '2017-Jul-12, 12:13:14pm', NULL),
(799972, 'Santos', 'Maximaiano', 'Rigo', 'Male', 'MAXSANTOS@GMAIL.COM', '#33 CAMP 7, BAGUIO CITY', 'Student', '', '123456', '2017-Jul-12, 12:27:51pm', NULL),
(836244, 'Mangan', 'Ida', 'Mayo', 'Female', 'IDA_MANANGAN@GMAIL.COM', '#76 IRISAN RD, BAGUIO CITY', 'Student', '', '123456', '2017-Jul-12, 12:22:23pm', NULL),
(837893, 'SAlvador', 'Grace', 'Cahayon', 'Female', 'GRACESALVADOR25@YAHOO.COM', 'MAGNOLIA RD, SANLUIS VILLAGE', 'Student', '', '123456', '2017-Jul-12, 12:24:21pm', NULL),
(902593, 'Dela Cruz', 'Gabriel', 'Masa', 'Male', 'GABRIEL_DELACRUZ@GMAIL.COM', '#12 AURORA HILL, BAGUIO CITY', 'Student', '', '123456', '2017-Jul-12, 12:28:23pm', NULL),
(965631, 'Naulgan', 'Brosnan', 'Molina', 'Male', 'BROSNANNAULGAN@GMAIL.COM', '9321 Kias, Baguio City', 'Student', '', '123456', '2017-Jul-12, 12:12:06pm', NULL),
(999149, 'Naulgan', 'Jame Ernest', 'Molina', 'Male', 'jamesnaulgan@yahoo.com', '9321 Kias, Baguio City', 'Student', '', '123456', '2017-Jul-12, 12:09:00pm', NULL),
(2123122, 'Bueno', 'Benedict Lorenzo', 'F.', 'Male', 'bhenzkhill26@gmial.com', 'manila', 'Admin', '', 'benedict26', '06/18/2017', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `createact`
--
ALTER TABLE `createact`
  ADD PRIMARY KEY (`create_id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`email_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `from_id` (`from_id`),
  ADD KEY `to_id` (`sentTo_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_info`
--
ALTER TABLE `result_info`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `createact`
--
ALTER TABLE `createact`
  MODIFY `create_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1949112479;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;
--
-- AUTO_INCREMENT for table `result_info`
--
ALTER TABLE `result_info`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
