-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2017 at 09:34 PM
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
(659790095, 'Exam', 50, 'locked');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `email_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`email_id`, `name`, `email`, `message`) VALUES
(1, 'benedict lorenzo', 'bhenzkhill26@gmail.com', 'hahahahaha'),
(2, 'benedict lorenzo', 'bhenzkhill26@gmail.com', 'ang ganda po  na iyong website');

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
  `message_id` int(7) NOT NULL
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
('DBMS is a collection of _________ that enables user to create and maintain a database.', 'Keys', 'Translators', 'Program', 'Language Activity', 'Program', 659790095, 1, 364),
('In a relational schema, each tuple is divided into fields called', 'Relations', 'Domains', 'Queries', 'All of the above', 'Domains', 659790095, 2, 365),
('In an ER model, ______ is described in the database by storing its data.', 'Entity', 'Attribute', 'Relationship', 'Notation', 'Entity', 659790095, 3, 366),
('DFD stands for', 'Data Flow Document', 'Data File Diagram', 'Data Flow Diagram', 'Non of the above', 'Data Flow Diagram', 659790095, 4, 367),
('A top-to-bottom relationship among the items in a database is established by a', 'Hierarchical schema', 'Network schema', 'Relational Schema', 'All of the above', 'Hierarchical schema', 659790095, 5, 368),
('_________table store information about database or about the system.', 'SQL', 'Nested', 'System', 'None of these', 'System', 659790095, 6, 369),
('_______ defines the structure of a relation which consists of a fixed set of attribute-domain pairs.', 'Instance', 'Schema', 'Program', 'Super Key', 'Schema', 659790095, 7, 370),
('_______ clause is an additional filter that is applied to the result.', 'Select', 'Group-by', 'Having', 'Order by', 'Having', 659790095, 8, 371),
('A logical schema', 'is the entire database', 'is a standard way of organizing information into accessible parts.', 'Describes how data is actually stored on disk.', 'All of the above', 'is a standard way of organizing information into accessible parts.', 659790095, 9, 372),
('_______ is a full form of SQL.', 'Standard query language', 'Sequential query language', 'Structured query language', 'Server side query language', 'Structured query language', 659790095, 10, 373),
('A relational database developer refers to a record as', 'a criteria', 'a relation', 'a tuple', 'an attribute', 'a tuple', 659790095, 11, 374),
('__________ keyword is used to find the number of values in a column.', 'TOTAL', 'COUNT', 'ADD', 'SUM', 'COUNT', 659790095, 12, 375),
('An advantage of the database management approach is', 'data is dependent on programs', 'data redundancy increases', 'data is integrated and can be accessed by multiple programs', 'none of the above', 'data is integrated and can be accessed by multiple programs', 659790095, 13, 376),
('The collection of information stored in a database at a particular moment is called as _______', 'schema', 'instance of the database', 'data domain', 'independence', 'instance of the database', 659790095, 14, 377),
('Data independence means', 'data is defined separately and not included in programs.', 'programs are not dependent on the physical attributes of data', 'programs are not dependent on the logical attributes of data', 'both B and C', 'both B and C', 659790095, 15, 378),
('A ______ is used to define overall design of the database', 'schema', 'application program', 'data definition language', 'code', 'schema', 659790095, 16, 379),
('Key to represent relationship between tables is called', 'primary key', 'secondary key', 'foreign key', 'none of the above', 'foreign key', 659790095, 17, 380),
('Grant and revoke are ______ statements.', 'DDL', 'TCL', 'DCL', 'DML', 'DCL', 659790095, 18, 381),
('DBMS helps achieve', 'Data independence', 'Centralized control of data', 'Neither A nor B', 'Both A and B', 'Both A and B', 659790095, 19, 382),
('_______ command can be used to modify a column in a table', 'alter', 'update', 'set', 'create', 'alter', 659790095, 20, 383),
('The candidate key is that you choose to identify each row uniquely is called ________', 'Alternate Key', 'Primary Key', 'Foreign Key', 'None of the above', 'Primary Key', 659790095, 21, 384),
('_______is used to determine whether of a table contains duplicate rows.', 'Unique predicate', 'Like Predicate', 'Null predicate', 'In predicate', 'Unique predicate', 659790095, 22, 385),
('To eliminate duplicate rows _________ is used', 'NODUPLICATE', 'ELIMINATE', 'DISTINCT', 'None of these', 'DISTINCT', 659790095, 23, 386),
('State true or false i) A candidate key is a minimal super key. ii) A candidate key can also refer to as surrogate key.', 'i-true, ii-false', 'i-false, ii-true', 'i-true, ii-true', 'i-false, ii-false', 'i-true, ii-true', 659790095, 24, 387),
('DCL stands for', 'Data Control Language', 'Data Console Language', 'Data Console Level', 'Data Control Level', 'Data Control Language', 659790095, 25, 388),
('__________is the process of organizing data into related tables.', 'Normalization', 'Generalization', 'Specialization', 'None of the above', 'Normalization', 659790095, 26, 389),
('A ______ Does not have a distinguishing attribute if its own and mostly are dependent entities, which are part of some another entity.', 'Weak entity', 'Strong entity', 'Non attributes entity', 'Dependent entity', 'Weak entity', 659790095, 27, 390),
('______ is the complex search criteria in the where clause.', 'Sub string', 'Drop Table', 'Predict', 'Predicate', 'Predicate', 659790095, 28, 391),
('______is preferred method for enforcing data integrity', 'Constraints', 'Stored Procedure', 'Triggers', 'Cursors', 'Constraints', 659790095, 29, 392),
('The number of tuples in a relation is called its …………. While the number of attributes in a relation is called it’s _______', 'Degree, Cardinality', 'Cardinality, Degree', 'Rows, Columns', 'Columns, Rows', 'Cardinality, Degree', 659790095, 30, 393),
('The language that requires a user to specify the data to be retrieved without specifying exactly how to get it is', 'Procedural DML', 'Non-Procedural DML', 'Procedural DDL', 'Non-Procedural DDL', 'Non-Procedural DML', 659790095, 31, 394),
('Which two files are used during operation of the DBMS?', 'Query languages and utilities', 'DML and query language', 'Data dictionary and transaction log', 'Data dictionary and query language', 'Data dictionary and transaction log', 659790095, 32, 395),
('The database schema is written in', 'HLL', 'DML', 'DDL', 'DCL', 'DDL', 659790095, 33, 396),
('The way a particular application views the data from the database that the application uses is a', 'module', 'relational model', 'schema', 'sub schema', 'sub schema', 659790095, 34, 397),
('The relational model feature is that there', 'is no need for primary key data', 'is much more data independence than some other database models', 'are explicit relationships among records.', 'are tables with many dimensions', 'is much more data independence than some other database models', 659790095, 35, 398),
('Which one of the following statements is false?', 'The data dictionary is normally maintained by the database administrator', 'Data elements in the database can be modified by changing the data dictionary.', 'The data dictionary contains the name and description of each data element.', 'The data dictionary is a tool used exclusively by the database administrator.', 'Data elements in the database can be modified by changing the data dictionar', 659790095, 36, 399),
('Which of the following are the properties of entities?', 'Groups', 'Table', 'Attributes', 'Switchboards', 'Attributes', 659790095, 37, 400),
('Which database level is closest to the users?', 'External', 'Internal', 'Physical', 'Conceptual', 'External', 659790095, 38, 401),
('Which are the two ways in which entities can participate in a relationship?', 'Passive and active', 'Total and partial', 'Simple and Complex', 'All of the above', 'Total and partial', 659790095, 39, 402),
('________ data type can store unstructured data', 'RAW', 'CHAR', 'NUMERIC', 'VARCHAR', 'RAW', 659790095, 40, 403),
('State true or false. i) Select operator is not a unary operator. ii) Project operator chooses subset of attributes or columns of a relation.', 'i-True, ii-False', 'i-True, ii-True', 'i-False, ii-True', 'i-False, ii-False', 'i-False, ii-True', 659790095, 41, 404),
('___________database is used as template for all databases created.', 'Master', 'Model', 'Tempdb', 'None of the above', 'Model', 659790095, 42, 405),
('One aspect that has to be dealt with by the integrity subsystem is to ensure that only valid values can be assigned to each data items. This is referred to as', 'Data Security', 'Domain access', 'Data Control', 'Domain Integrity', 'Domain Integrity', 659790095, 43, 406),
('________________ operator is basically a join followed by a project on the attributes of first relation.', 'Join', 'Semi-Join', 'Full Join', 'Inner Join', 'Semi-Join', 659790095, 44, 407),
('Which of the following is not a binary operator in relational algebra?', 'Join ', 'Semi-Join', 'Assignment', 'Project', 'Project', 659790095, 45, 408),
('Centralizing the integrity checking directly under the DBMS ______________ Duplication and ensures the consistency and validity of the database.', 'Increases', 'Skips', 'Does not reduce', 'Reduces', 'Reduces', 659790095, 46, 409),
('Which of the following is/are the DDL statements?', 'Create', 'Drop', 'Alter', 'All of the above', 'All of the above', 659790095, 47, 410),
('In snapshot,  __________ clause tells oracle how long to wait between refreshes.', 'Complete', 'Force', 'Next', 'Refresh', 'Refresh', 659790095, 48, 411),
('_______________ defines rules regarding the values allowed in columns and is the standard mechanism for enforcing database integrity.', 'Column', 'Contstraint', 'Index', 'Trigger', 'Contstraint', 659790095, 49, 412),
('For like predicate which of the following is true. i) % matches zero of more characters. ii) _ matches exactly one character.', 'i-only', 'ii-only', 'Both of them', 'None of them', 'Both of them', 659790095, 50, 413);

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
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`student_answer`, `question_id`, `student_id`, `question_num`, `mark`, `id`) VALUES
('DCL', 18, 12345, 1, 'WRONG', 44),
('Program', 1, 12345, 2, 'WRONG', 45),
('i-False, ii-True', 41, 12345, 3, 'WRONG', 46),
('set', 20, 12345, 4, 'Correct', 47),
('Create', 47, 12345, 5, 'WRONG', 48),
('Table', 37, 12345, 6, 'Correct', 49),
('Data independence', 19, 12345, 7, 'WRONG', 50),
('Attribute', 3, 12345, 8, 'WRONG', 51),
('schema', 16, 12345, 9, 'Correct', 52),
('Instance', 7, 12345, 10, 'WRONG', 53),
('Unique predicate', 22, 12345, 11, 'Correct', 54),
('a tuple', 11, 12345, 12, 'Correct', 55),
('Having', 8, 12345, 13, 'WRONG', 56),
('instance of the database', 14, 12345, 14, 'WRONG', 57),
('Sequential query language', 10, 12345, 15, 'WRONG', 58),
('Hierarchical schema', 5, 12345, 16, 'WRONG', 59),
('Relations', 2, 12345, 17, 'WRONG', 60),
('data is defined separately and not included in programs.', 15, 12345, 18, 'WRONG', 61),
('External', 38, 12345, 19, 'Correct', 62),
('Data Security', 43, 12345, 20, 'WRONG', 63),
('Dependent entity', 27, 12345, 21, 'WRONG', 64),
('Cardinality, Degree', 30, 12345, 22, 'WRONG', 65),
('Data Console Language', 25, 12345, 23, 'WRONG', 66),
('HLL', 33, 12345, 24, 'WRONG', 67),
('Model', 42, 12345, 25, 'Correct', 68),
('COUNT', 12, 12345, 26, 'Correct', 69),
('Query languages and utilities', 32, 12345, 27, 'WRONG', 70),
('Normalization', 26, 12345, 28, 'WRONG', 71),
('i-false, ii-true', 24, 12345, 29, 'Correct', 72),
('is no need for primary key data', 35, 12345, 30, 'Correct', 73),
('Drop Table', 28, 12345, 31, 'WRONG', 74),
('Contstraint', 49, 12345, 32, 'Correct', 75),
('Nested', 6, 12345, 33, 'WRONG', 76),
('Non-Procedural DDL', 31, 12345, 34, 'WRONG', 77),
('data is dependent on programs', 13, 12345, 35, 'Correct', 78),
('Complete', 48, 12345, 36, 'WRONG', 79),
('Data Flow Diagram', 4, 12345, 37, 'Correct', 80),
('The data dictionary is normally maintained by the database administrator', 36, 12345, 38, 'WRONG', 81),
('relational model', 34, 12345, 39, 'Correct', 82),
('Semi-Join', 44, 12345, 40, 'WRONG', 83),
('Simple and Complex', 39, 12345, 41, 'Correct', 84),
('is the entire database', 9, 12345, 42, 'WRONG', 85),
('Constraints', 29, 12345, 43, 'WRONG', 86),
('Assignment', 45, 12345, 44, 'Correct', 87),
('CHAR', 40, 12345, 45, 'WRONG', 88),
('None of them', 50, 12345, 46, 'Correct', 89),
('ELIMINATE', 23, 12345, 47, 'WRONG', 90),
('Primary Key', 21, 12345, 48, 'Correct', 91),
('none of the above', 17, 12345, 49, 'WRONG', 92),
('Skips', 46, 12345, 50, 'Correct', 93),
('Translators', 1, 722730, 1, 'WRONG', 94),
('schema', 14, 722730, 2, 'WRONG', 95),
('DML', 33, 722730, 3, 'WRONG', 96),
('Degree, Cardinality', 30, 722730, 4, 'WRONG', 97),
('Total and partial', 39, 722730, 5, 'Correct', 98),
('Data Console Language', 25, 722730, 6, 'WRONG', 99),
('The data dictionary contains the name and description of each data element.', 36, 722730, 7, 'WRONG', 100),
('NODUPLICATE', 23, 722730, 8, 'WRONG', 101),
('Group-by', 8, 722730, 9, 'WRONG', 102),
('TCL', 18, 722730, 10, 'WRONG', 103),
('DML and query language', 32, 722730, 11, 'WRONG', 104),
('Create', 47, 722730, 12, 'WRONG', 105),
('Both of them', 50, 722730, 13, 'Correct', 106),
('Instance', 7, 722730, 14, 'WRONG', 107),
('Project', 45, 722730, 15, 'Correct', 108),
('schema', 16, 722730, 16, 'Correct', 109),
('Unique predicate', 22, 722730, 17, 'Correct', 110),
('is much more data independence than some other database models', 35, 722730, 18, 'Correct', 111),
('Contstraint', 49, 722730, 19, 'Correct', 112),
('Reduces', 46, 722730, 20, 'Correct', 113),
('Attributes', 37, 722730, 21, 'Correct', 114),
('Primary Key', 21, 722730, 22, 'Correct', 115),
('Generalization', 26, 722730, 23, 'WRONG', 116),
('COUNT', 12, 722730, 24, 'Correct', 117),
('programs are not dependent on the physical attributes of data', 15, 722730, 25, 'WRONG', 118),
('Sub string', 28, 722730, 26, 'WRONG', 119),
('Cursors', 29, 722730, 27, 'WRONG', 120),
('Relations', 2, 722730, 28, 'WRONG', 121),
('Standard query language', 10, 722730, 29, 'WRONG', 122),
('Force', 48, 722730, 30, 'WRONG', 123),
('Centralized control of data', 19, 722730, 31, 'WRONG', 124),
('Join', 44, 722730, 32, 'WRONG', 125),
('Data Security', 43, 722730, 33, 'WRONG', 126),
('alter', 20, 722730, 34, 'Correct', 127),
('Relationship', 3, 722730, 35, 'WRONG', 128),
('i-true, ii-true', 24, 722730, 36, 'Correct', 129),
('Data Flow Diagram', 4, 722730, 37, 'Correct', 130),
('a tuple', 11, 722730, 38, 'Correct', 131),
('VARCHAR', 40, 722730, 39, 'WRONG', 132),
('Model', 42, 722730, 40, 'Correct', 133),
('Relational Schema', 5, 722730, 41, 'WRONG', 134),
('i-True, ii-True', 41, 722730, 42, 'WRONG', 135),
('Procedural DML', 31, 722730, 43, 'WRONG', 136),
('External', 38, 722730, 44, 'Correct', 137),
('data is integrated and can be accessed by multiple programs', 13, 722730, 45, 'Correct', 138),
('sub schema', 34, 722730, 46, 'Correct', 139),
('Nested', 6, 722730, 47, 'WRONG', 140),
('Non attributes entity', 27, 722730, 48, 'WRONG', 141),
('All of the above', 9, 722730, 49, 'WRONG', 142),
('none of the above', 17, 722730, 50, 'WRONG', 143);

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
(6, '12345', 'SAPUAY, EYREJEAN LIEZLE TABIOS', 36, '', 'FAILED', '', 659790095),
(7, '722730', ' GUIYAB, Allyza CUEVAS', 38, '', 'FAILED', '', 659790095);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `quizstate` varchar(255) NOT NULL,
  `examstate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `quizstate`, `examstate`) VALUES
(1, 'locked', 'unlocked');

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
  `regdate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `lastName`, `firstName`, `middleName`, `gender`, `email`, `address`, `role`, `avatar`, `password`, `regdate`) VALUES
(12345, 'SAPUAY', 'EYREJEAN LIEZLE', 'TABIOS', 'Female', 'EYREJEAN.SAPUAY@GMAIL.COM', 'DASMARINAS CA', 'Student', '', '123456', '30th  June 2017 02:59:34 AM'),
(343881, 'OPULENCIA', 'PAULA VICTORIA', 'AYAP', 'Female', 'PAUVICCIA@GMAIL.COM', 'baguio', 'Student', '', '123456', '30th  June 2017 02:58:30 AM'),
(366789, 'NAULGAN', 'JAMES ERNEST', 'MOLINA', 'Male', 'JAMESNAULGAN@YAHOO.COM', '9321 KIAS', 'Student', '', '123456', '30th  June 2017 02:56:43 AM'),
(401182, 'HIDALGO', 'ALLEN', 'SANRIO', 'Female', 'ALLEN_HIDALGO@GMAIL.COM', ' #10 KIAS ROAD, BAGUIO CITY', 'Student', '', '123456', '30th  June 2017 03:02:41 AM'),
(591494, 'PECSON', 'ANDRIEN', 'BAUZON', 'Male', 'DREN.PECSON@GMAIL.COM', '#685 BRGY. LIPAY STA. CRUZ ZAMBALES', 'Student', '', '123456', '30th  June 2017 02:57:12 AM'),
(659234, 'GAYAO', 'KYLE GIO', 'DEGAY', 'Male', 'KYLEGIOGAYAO@OUTLOOK.COM', 'FC 123 BALILI, LA TRINIDAD, BENGUET', 'Student', '', '123456', '30th  June 2017 02:59:02 AM'),
(722730, ' GUIYAB', 'Allyza', 'CUEVAS', 'Female', 'AG_GUIYAB@HOTMAIL.COM', '#54 CAMP 7, BAGUIO CITY', 'Student', '', '123456', '30th  June 2017 03:00:17 AM'),
(902982, 'NAULGAN', 'BROSNAN', 'MOLINA', 'Male', 'BROSNANNAULGAN@GMAIL.COM', '9321 KIAS', 'Student', '', '123456', '30th  June 2017 02:57:54 AM'),
(2123122, 'Bueno', 'Benedict Lorenzo', 'F.', 'Male', 'bhenzkhill26@gmial.com', 'manila', 'Admin', '', 'benedict26', '06/18/2017');

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
  MODIFY `create_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1504557397;
--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=414;
--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;
--
-- AUTO_INCREMENT for table `result_info`
--
ALTER TABLE `result_info`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
