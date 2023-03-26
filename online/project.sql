-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 06:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `user_email`, `user_role`, `password`) VALUES
('246929894', 'Admin 2', 'admin@admin.com', 'Admin', '$2y$10$Ci5ItKnarUgDtpOrLG4OwubfSzvyZvRhwINhGIrBbCn.AN7hRXV.C'),
('inerne3t123', 'Admin', 'admin@ecitest.com', 'Admin', '$2y$10$GVaKW/x81RHb4IPENUyrQOdPAR9hwuqQV1NJdThrFtZscK2S5vZsu');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `question_id` text NOT NULL,
  `id` text NOT NULL,
  `ids` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`question_id`, `id`, `ids`) VALUES
('55892169bf6a7', '55892169d2efc', 1),
('5589216a3646e', '5589216a48722', 2),
('558922117fcef', '5589221195248', 3),
('55892211e44d5', '55892211f1fa7', 4),
('558922894c453', '558922895ea0a', 5),
('558922899ccaa', '55892289aa7cf', 6),
('558923538f48d', '558923539a46c', 7),
('55892353f05c4', '55892354051be', 8),
('558973f4389ac', '558973f462e61', 9),
('558973f4c46f2', '558973f4d4abe', 10),
('558973f51600d', '558973f526fc5', 11),
('558973f55d269', '558973f57af07', 12),
('558973f5abb1a', '558973f5e764a', 13),
('5589751a63091', '5589751a81bf4', 14),
('5589751ad32b8', '5589751adbdbd', 15),
('5589751b304ef', '5589751b3b04d', 16),
('5589751b749c9', '5589751b9a98c', 17),
('5589751bd02ec', '5589751bdadaq', 18);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `ids` int(11) NOT NULL,
  `exam_id` text NOT NULL,
  `question_total` int(11) NOT NULL,
  `right_score_ans` int(11) NOT NULL,
  `wrong_score_ans` int(11) NOT NULL,
  `instructions` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`ids`, `exam_id`, `question_total`, `right_score_ans`, `wrong_score_ans`, `instructions`, `title`, `time`, `tag`, `date`) VALUES
(1, '558920ff906b8', 18, 1, 0, 'Please answer every question in this quiz!!!', 'PHP QUESTION', 60, 'php, web development', '2021-03-26'),
(6, '60bd60c35c916', 6, 2, 0, 'Please answer every question', 'New', 10, 'new', '2021-06-07');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ids` int(11) NOT NULL,
  `feedback_id` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `feedback` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ids`, `feedback_id`, `email`, `subject`, `feedback`, `date`, `time`) VALUES
(1, '55846be776610', 'sunnygkp10@gmail.com', 'testing', 'testing stART', '2015-06-19', '09:22:15pm'),
(2, '5584ddd0da0ab', 'sunnygkp10@gmail.com', 'feedback', ';mLBLB', '2015-06-20', '05:28:16am'),
(3, '558510a8a1234', 'sunnygkp10@gmail.com', 'dl;dsnklfn', 'fmdsfld fdj', '2015-06-20', '09:05:12am'),
(4, '5585509097ae2', 'sunnygkp10@gmail.com', 'kcsncsk', 'l.mdsavn', '2015-06-20', '01:37:52pm'),
(5, '5586ee27af2c9', 'vikas@gmail.com', 'trial feedback', 'triaal feedbak', '2015-06-21', '07:02:31pm'),
(7, '607547ddb3d99', 'nec@gmail.com', 'Login Issue', 'I cannot login to my account.', '2021-04-13', '09:27:25am'),
(8, '607548192c63a', 'nec@gmail.com', 'Login Issue', 'I cannot login to my account.', '2021-04-13', '09:28:25am'),
(9, '607a303c60472', 'admin@ecitest.com', 'Comment', 'I love your project :)', '2021-04-17', '02:47:56am'),
(10, '607a358672481', 'nec@gmail.com', 'Comment', 'This is just great', '2021-04-17', '03:10:30am'),
(11, '641fbf8c0b1dd', 'ernest.inyama@stu.cu.edu.ng', 'Business', '123', '2023-03-26', '05:44:12am');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `exam_id` text NOT NULL,
  `score` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `email`, `exam_id`, `score`, `date`) VALUES
(1, 'sunnygkp10@gmail.com', '558921841f1ec', 4, '2015-06-23 09:31:26'),
(3, 'avantika420@gmail.com', '558921841f1ec', 4, '2015-06-23 14:33:04'),
(4, 'avantika420@gmail.com', '5589222f16b93', 4, '2015-06-23 14:49:39'),
(5, 'sunnygkp10@gmail.com', '5589741f9ed52', 4, '2015-06-23 15:07:16'),
(6, 'mi5@hollywood.com', '5589222f16b93', 4, '2015-06-23 15:12:56'),
(7, 'nik1@gmail.com', '558921841f1ec', 1, '2015-06-23 16:11:50'),
(8, 'sunnygkp10@gmail.com', '5589222f16b93', 1, '2015-06-24 03:22:38'),
(15, 'ernest.inyama@yahoo.com', '558920ff906b8', 6, '2021-04-06 19:49:22');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `question_id` text NOT NULL,
  `option` text NOT NULL,
  `id` text NOT NULL,
  `ids` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`question_id`, `option`, `id`, `ids`) VALUES
('55892169bf6a7', 'usermod', '55892169d2efc', 1),
('55892169bf6a7', 'useradd', '55892169d2f05', 2),
('55892169bf6a7', 'useralter', '55892169d2f09', 3),
('55892169bf6a7', 'groupmod', '55892169d2f0c', 4),
('5589216a3646e', '751', '5589216a48713', 5),
('5589216a3646e', '752', '5589216a4871a', 6),
('5589216a3646e', '754', '5589216a4871f', 7),
('5589216a3646e', '755', '5589216a48722', 8),
('558922117fcef', 'echo', '5589221195248', 9),
('558922117fcef', 'print', '558922119525a', 10),
('558922117fcef', 'printf', '5589221195265', 11),
('558922117fcef', 'cout', '5589221195270', 12),
('55892211e44d5', 'int a', '55892211f1f97', 13),
('55892211e44d5', '$a', '55892211f1fa7', 14),
('55892211e44d5', 'long int a', '55892211f1fb4', 15),
('55892211e44d5', 'int a$', '55892211f1fbd', 16),
('558922894c453', 'cin>>a;', '558922895ea0a', 17),
('558922894c453', 'cin<<a;', '558922895ea26', 18),
('558922894c453', 'cout>>a;', '558922895ea34', 19),
('558922894c453', 'cout<a;', '558922895ea41', 20),
('558922899ccaa', 'cout', '55892289aa7cf', 21),
('558922899ccaa', 'cin', '55892289aa7df', 22),
('558922899ccaa', 'print', '55892289aa7eb', 23),
('558922899ccaa', 'printf', '55892289aa7f5', 24),
('558923538f48d', '255.0.0.0', '558923539a46c', 25),
('558923538f48d', '255.255.255.0', '558923539a480', 26),
('558923538f48d', '255.255.0.0', '558923539a48b', 27),
('558923538f48d', 'none of these', '558923539a495', 28),
('55892353f05c4', '192.168.1.100', '5589235405192', 29),
('55892353f05c4', '172.168.16.2', '55892354051a3', 30),
('55892353f05c4', '10.0.0.0.1', '55892354051b4', 31),
('55892353f05c4', '11.11.11.11', '55892354051be', 32),
('558973f4389ac', 'containing root file-system required during bootup', '558973f462e44', 33),
('558973f4389ac', ' Contains only scripts to be executed during bootup', '558973f462e56', 34),
('558973f4389ac', ' Contains root-file system and drivers required to be preloaded during bootup', '558973f462e61', 35),
('558973f4389ac', 'None of the above', '558973f462e6b', 36),
('558973f4c46f2', 'Kernel', '558973f4d4abe', 37),
('558973f4c46f2', 'Shell', '558973f4d4acf', 38),
('558973f4c46f2', 'Commands', '558973f4d4ad9', 39),
('558973f4c46f2', 'Script', '558973f4d4ae3', 40),
('558973f51600d', 'Boot Loading', '558973f526f9d', 41),
('558973f51600d', ' Boot Record', '558973f526fb9', 42),
('558973f51600d', ' Boot Strapping', '558973f526fc5', 43),
('558973f51600d', ' Booting', '558973f526fce', 44),
('558973f55d269', ' Quick boot', '558973f57aef1', 45),
('558973f55d269', 'Cold boot', '558973f57af07', 46),
('558973f55d269', ' Hot boot', '558973f57af17', 47),
('558973f55d269', ' Fast boot', '558973f57af27', 48),
('558973f5abb1a', 'bash', '558973f5e7623', 49),
('558973f5abb1a', ' Csh', '558973f5e7636', 50),
('558973f5abb1a', ' ksh', '558973f5e7640', 51),
('558973f5abb1a', ' sh', '558973f5e764a', 52),
('5589751a63091', 'q', '5589751a81bd6', 53),
('5589751a63091', 'wq', '5589751a81be8', 54),
('5589751a63091', ' both (a) and (b)', '5589751a81bf4', 55),
('5589751a63091', ' none of the mentioned', '5589751a81bfd', 56),
('5589751ad32b8', ' moves screen down one page', '5589751adbdbd', 57),
('5589751ad32b8', 'moves screen up one page', '5589751adbdce', 58),
('5589751ad32b8', 'moves screen up one line', '5589751adbdd8', 59),
('5589751ad32b8', ' moves screen down one line', '5589751adbde2', 60),
('5589751b304ef', ' yy', '5589751b3b04d', 61),
('5589751b304ef', 'yw', '5589751b3b05e', 62),
('5589751b304ef', 'yc', '5589751b3b069', 63),
('5589751b304ef', ' none of the mentioned', '5589751b3b073', 64),
('5589751b749c9', 'X', '5589751b9a98c', 65),
('5589751b749c9', 'x', '5589751b9a9a5', 66),
('5589751b749c9', 'D', '5589751b9a9b7', 67),
('5589751b749c9', 'd', '5589751b9a9c9', 68),
('5589751bd02ec', 'authentication is not possible in vi editor', '5589751bdadaa', 69),
('5589751bd02ec', 'authentication is possible in vi editor', '5589751bdadaq', 70),
('5589751bd02ec', 'authentication is possible in vi editor sometimes', '5589751bqadaa', 71),
('5589751bd02ec', 'authentication is only possible in vi editor with an IDE', '55897q1bdadaa', 72);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ids` int(11) NOT NULL,
  `id` varchar(255) NOT NULL,
  `exam_id` varchar(255) NOT NULL,
  `qns` text NOT NULL,
  `choice` int(11) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`ids`, `id`, `exam_id`, `qns`, `choice`, `sn`) VALUES
(1, '55892169bf6a7', '558920ff906b8', 'what is command for changing user information?', 4, 1),
(2, '5589216a3646e', '558920ff906b8', 'what is permission for view only for other??', 4, 2),
(3, '558922117fcef', '558920ff906b8', 'what is command for print in php??', 4, 3),
(4, '55892211e44d5', '558920ff906b8', 'which is a variable of php??', 4, 4),
(5, '558922894c453', '558920ff906b8', 'what is correct statement in c++??', 4, 5),
(6, '558922899ccaa', '558920ff906b8', 'which command is use for print the output in c++?', 4, 6),
(7, '558923538f48d', '558920ff906b8', 'what is correct mask for A class IP???', 4, 7),
(8, '55892353f05c4', '558920ff906b8', 'which is not a private IP??', 4, 8),
(9, '558973f4389ac', '558920ff906b8', 'On Linux, initrd is a file?', 4, 9),
(10, '558973f4c46f2', '558920ff906b8', 'Which is loaded into memory when system is booted?', 4, 10),
(11, '558973f51600d', '558920ff906b8', 'The process of starting up a computer is known as?', 4, 11),
(12, '558973f55d269', '558920ff906b8', 'Bootstrapping is also known as?', 4, 12),
(13, '558973f5abb1a', '558920ff906b8', 'The shell used for Single user mode shell is:', 4, 13),
(14, '5589751a63091', '558920ff906b8', 'Which command is used to close the vi editor?', 4, 14),
(15, '5589751ad32b8', '558920ff906b8', 'In vi editor, the key combination CTRL+f?', 4, 15),
(16, '5589751b304ef', '558920ff906b8', 'Which vi editor command copies the current line of the file?', 4, 16),
(17, '5589751b749c9', '558920ff906b8', 'Which command is used to delete the character before the cursor location in vi editor?', 4, 17),
(18, '5589751bd02ec', '558920ff906b8', 'Which one of the following statement is true?', 4, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_created_at` date NOT NULL,
  `user_updated_at` date NOT NULL,
  `user_email` text NOT NULL,
  `email_validation_code` text NOT NULL,
  `email_verification` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` date NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `sex`, `user_role`, `username`, `user_created_at`, `user_updated_at`, `user_email`, `email_validation_code`, `email_verification`, `email_verified_at`, `password`) VALUES
('946479651', 'Admin', 'Admin', 'Male', 'Subscriber', 'Admin', '2021-04-17', '2021-04-17', 'admin@admin.com', 'verified', 1, '2021-04-17', '$2y$10$gRMZH88meNhTdQnLmqpr1eY1uxB52ILxDNgkeuzgGSGANNpYsKb0q');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=529;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ids` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
