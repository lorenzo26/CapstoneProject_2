-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2017 at 07:39 AM
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
(1623270086, 'Exam 1', 10, 'unlocked'),
(2081395583, 'Exam 2', 50, 'locked');

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

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`from_id`, `messages`, `sentTo_id`, `date`, `time`, `message_id`, `unread_msg`) VALUES
('115977', 'hai', '2123122', '2017-07-13', '09:03:36', 1, 0),
('2123122', 'hello', '115977', '2017-07-13', '09:06:23', 2, 0),
('2123122', 'musta?', '115977', '2017-07-13', '09:11:35', 3, 0);

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
('What could cause a fixed disk error', 'No-CD installed', 'Bad Ram', 'slow processor', 'Incorrect CMOS settings', 'Incorrect CMOS settings', 926930255, 56179, 73),
('DBMS is a collection of _________ that enables user to create and maintain a database.', 'Keys', 'Translators', 'Program', 'Language Activity', 'Program', 2081395583, 11, 74),
('In a relational schema, each tuple is divided into fields called', 'Relations', 'Domains', 'Queries', 'All of the above', 'Domains', 2081395583, 12, 75),
('In an ER model, ______ is described in the database by storing its data.', 'Entity', 'Attribute', 'Relationship', 'Notation', 'Entity', 2081395583, 13, 76),
('DFD stands for', 'Data Flow Document', 'Data File Diagram', 'Data Flow Diagram', 'Non of the above', 'Data Flow Diagram', 2081395583, 14, 77),
('A top-to-bottom relationship among the items in a database is established by a', 'Hierarchical schema', 'Network schema', 'Relational Schema', 'All of the above', 'Hierarchical schema', 2081395583, 15, 78),
('_________table store information about database or about the system.', 'SQL', 'Nested', 'System', 'None of these', 'System', 2081395583, 16, 79),
('_______ defines the structure of a relation which consists of a fixed set of attribute-domain pairs.', 'Instance', 'Schema', 'Program', 'Super Key', 'Schema', 2081395583, 60, 80),
('_______ clause is an additional filter that is applied to the result.', 'Select', 'Group-by', 'Having', 'Order by', 'Having', 2081395583, 17, 81),
('A logical schema', 'is the entire database', 'is a standard way of organizing information into accessible parts.', 'Describes how data is actually stored on disk.', 'All of the above', 'is a standard way of organizing information into accessible parts.', 2081395583, 18, 82),
('_______ is a full form of SQL.', 'Standard query language', 'Sequential query language', 'Structured query language', 'Server side query language', 'Structured query language', 2081395583, 19, 83),
('A relational database developer refers to a record as', 'a criteria', 'a relation', 'a tuple', 'an attribute', 'a tuple', 2081395583, 20, 84),
('__________ keyword is used to find the number of values in a column.', 'TOTAL', 'COUNT', 'ADD', 'SUM', 'COUNT', 2081395583, 21, 85),
('An advantage of the database management approach is', 'data is dependent on programs', 'data redundancy increases', 'data is integrated and can be accessed by multiple programs', 'none of the above', 'data is integrated and can be accessed by multiple programs', 2081395583, 22, 86),
('The collection of information stored in a database at a particular moment is called as _______', 'schema', 'instance of the database', 'data domain', 'independence', 'instance of the database', 2081395583, 23, 87),
('Data independence means', 'data is defined separately and not included in programs.', 'programs are not dependent on the physical attributes of data', 'programs are not dependent on the logical attributes of data', 'both B and C', 'both B and C', 2081395583, 24, 88),
('A ______ is used to define overall design of the database', 'schema', 'application program', 'data definition language', 'code', 'schema', 2081395583, 25, 89),
('Key to represent relationship between tables is called', 'primary key', 'secondary key', 'foreign key', 'none of the above', 'foreign key', 2081395583, 26, 90),
('Grant and revoke are ______ statements.', 'DDL', 'TCL', 'DCL', 'DML', 'DCL', 2081395583, 27, 91),
('DBMS helps achieve', 'Data independence', 'Centralized control of data', 'Neither A nor B', 'Both A and B', 'Both A and B', 2081395583, 28, 92),
('_______ command can be used to modify a column in a table', 'alter', 'update', 'set', 'create', 'alter', 2081395583, 29, 93),
('The candidate key is that you choose to identify each row uniquely is called ________', 'Alternate Key', 'Primary Key', 'Foreign Key', 'None of the above', 'Primary Key', 2081395583, 30, 94),
('_______is used to determine whether of a table contains duplicate rows.', 'Unique predicate', 'Like Predicate', 'Null predicate', 'In predicate', 'Unique predicate', 2081395583, 31, 95),
('To eliminate duplicate rows _________ is used', 'NODUPLICATE', 'ELIMINATE', 'DISTINCT', 'None of these', 'DISTINCT', 2081395583, 32, 96),
('State true or false i) A candidate key is a minimal super key. ii) A candidate key can also refer to as surrogate key.', 'i-true, ii-false', 'i-false, ii-true', 'i-true, ii-true', 'i-false, ii-false', 'i-true, ii-true', 2081395583, 33, 97),
('DCL stands for', 'Data Control Language', 'Data Console Language', 'Data Console Level', 'Data Control Level', 'Data Control Language', 2081395583, 34, 98),
('__________is the process of organizing data into related tables.', 'Normalization', 'Generalization', 'Specialization', 'None of the above', 'Normalization', 2081395583, 35, 99),
('A ______ Does not have a distinguishing attribute if its own and mostly are dependent entities, which are part of some another entity.', 'Weak entity', 'Strong entity', 'Non attributes entity', 'Dependent entity', 'Weak entity', 2081395583, 36, 100),
('______ is the complex search criteria in the where clause.', 'Sub string', 'Drop Table', 'Predict', 'Predicate', 'Predicate', 2081395583, 37, 101),
('______is preferred method for enforcing data integrity', 'Constraints', 'Stored Procedure', 'Triggers', 'Cursors', 'Constraints', 2081395583, 38, 102),
('The number of tuples in a relation is called its …………. While the number of attributes in a relation is called it’s _______', 'Degree, Cardinality', 'Cardinality, Degree', 'Rows, Columns', 'Columns, Rows', 'Cardinality, Degree', 2081395583, 39, 103),
('The language that requires a user to specify the data to be retrieved without specifying exactly how to get it is', 'Procedural DML', 'Non-Procedural DML', 'Procedural DDL', 'Non-Procedural DDL', 'Non-Procedural DML', 2081395583, 40, 104),
('Which two files are used during operation of the DBMS?', 'Query languages and utilities', 'DML and query language', 'Data dictionary and transaction log', 'Data dictionary and query language', 'Data dictionary and transaction log', 2081395583, 41, 105),
('The database schema is written in', 'HLL', 'DML', 'DDL', 'DCL', 'DDL', 2081395583, 42, 106),
('The way a particular application views the data from the database that the application uses is a', 'module', 'relational model', 'schema', 'sub schema', 'sub schema', 2081395583, 43, 107),
('The relational model feature is that there', 'is no need for primary key data', 'is much more data independence than some other database models', 'are explicit relationships among records.', 'are tables with many dimensions', 'is much more data independence than some other database models', 2081395583, 44, 108),
('Which one of the following statements is false?', 'The data dictionary is normally maintained by the database administrator', 'Data elements in the database can be modified by changing the data dictionary.', 'The data dictionary contains the name and description of each data element.', 'The data dictionary is a tool used exclusively by the database administrator.', 'Data elements in the database can be modified by changing the data dictionar', 2081395583, 45, 109),
('Which of the following are the properties of entities?', 'Groups', 'Table', 'Attributes', 'Switchboards', 'Attributes', 2081395583, 46, 110),
('Which database level is closest to the users?', 'External', 'Internal', 'Physical', 'Conceptual', 'External', 2081395583, 47, 111),
('Which are the two ways in which entities can participate in a relationship?', 'Passive and active', 'Total and partial', 'Simple and Complex', 'All of the above', 'Total and partial', 2081395583, 48, 112),
('________ data type can store unstructured data', 'RAW', 'CHAR', 'NUMERIC', 'VARCHAR', 'RAW', 2081395583, 49, 113),
('State true or false. i) Select operator is not a unary operator. ii) Project operator chooses subset of attributes or columns of a relation.', 'i-True, ii-False', 'i-True, ii-True', 'i-False, ii-True', 'i-False, ii-False', 'i-False, ii-True', 2081395583, 50, 114),
('___________database is used as template for all databases created.', 'Master', 'Model', 'Tempdb', 'None of the above', 'Model', 2081395583, 51, 115),
('One aspect that has to be dealt with by the integrity subsystem is to ensure that only valid values can be assigned to each data items. This is referred to as', 'Data Security', 'Domain access', 'Data Control', 'Domain Integrity', 'Domain Integrity', 2081395583, 52, 116),
('________________ operator is basically a join followed by a project on the attributes of first relation.', 'Join', 'Semi-Join', 'Full Join', 'Inner Join', 'Semi-Join', 2081395583, 53, 117),
('Which of the following is not a binary operator in relational algebra?', 'Join ', 'Semi-Join', 'Assignment', 'Project', 'Project', 2081395583, 54, 118),
('Centralizing the integrity checking directly under the DBMS ______________ Duplication and ensures the consistency and validity of the database.', 'Increases', 'Skips', 'Does not reduce', 'Reduces', 'Reduces', 2081395583, 55, 119),
('Which of the following is/are the DDL statements?', 'Create', 'Drop', 'Alter', 'All of the above', 'All of the above', 2081395583, 56, 120),
('In snapshot,  __________ clause tells oracle how long to wait between refreshes.', 'Complete', 'Force', 'Next', 'Refresh', 'Refresh', 2081395583, 57, 121),
('_______________ defines rules regarding the values allowed in columns and is the standard mechanism for enforcing database integrity.', 'Column', 'Contstraint', 'Index', 'Trigger', 'Contstraint', 2081395583, 58, 122),
('For like predicate which of the following is true. i) % matches zero of more characters. ii) _ matches exactly one character.', 'i-only', 'ii-only', 'Both of them', 'None of them', 'Both of them', 2081395583, 59, 123);

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

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`student_answer`, `question_id`, `student_id`, `question_num`, `mark`, `id`, `create_id`) VALUES
('ATX', 6, 115977, 1, 'Correct', 133, 1623270086),
('megabits per seconds', 5, 115977, 2, 'Correct', 134, 1623270086),
('sectors', 7, 115977, 3, 'Correct', 135, 1623270086),
('A uniform negative charge is placed on the photosensitive drum', 10, 115977, 4, 'Correct', 136, 1623270086),
('CONFIG.SYS', 4, 115977, 5, 'Wrong', 137, 1623270086),
('CAT 5', 9, 115977, 6, 'Wrong', 138, 1623270086),
('Incorrect CMOS settings', 2, 115977, 7, 'Correct', 139, 1623270086),
('Resistor', 8, 115977, 8, 'Correct', 140, 1623270086),
('CPU', 1, 115977, 9, 'Wrong', 141, 1623270086),
('EMI', 3, 115977, 10, 'Wrong', 142, 1623270086),
('ROM BIOS', 92673, 115977, 1, 'Correct', 143, 926930255),
('Incorrect CMOS settings', 56179, 115977, 2, 'Correct', 144, 926930255);

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

--
-- Dumping data for table `result_info`
--

INSERT INTO `result_info` (`result_id`, `student_id`, `student_name`, `score`, `date`, `status`, `type`, `create_id`) VALUES
(15, '115977', 'Hash, Erick Aniko', 60, '', 'FAILED', '', 1623270086),
(16, '115977', 'Hash, Erick Aniko', 100, '', 'PASS', '', 926930255);

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
(535714, 'Bueno', 'Benedict', 'F.', 'Male', 'bhenzkhill26@gmail.com', '#685 BRGY. LIPAY STA. CRUZ ZAMBALES', 'Student', '', '123456', '2017-Jul-13, 12:27:04pm', NULL),
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
(2123122, 'Bueno', 'Benedict Lorenzo', 'F.', 'Male', 'bhenzkhill26@gmial.com', 'manila', 'Admin', '', 'benedict26', '06/18/2017', 1);

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
  MODIFY `create_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2081395584;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT for table `result_info`
--
ALTER TABLE `result_info`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
