-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 12:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(8) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `created_time`) VALUES
(1, 'PHP', ' PHP(recursive acronym for PHP: Hypertext Preprocessor) is a widely-used open source general-purpose scripting language that is especially suited for web development and can be embedded into HTML.', '2023-08-28 13:03:05'),
(2, 'PYTHON', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation.\nPython is dynamically typed and garbage-collected. It supports multiple programming paradigms, includ', '2023-08-28 13:04:09'),
(3, 'JAVA', 'JAVA was developed by James Gosling at Sun Microsystems Inc in the year 1995, later acquired by Oracle Corporation. It is a simple programming language. Java makes writing, compiling, and debugging programming easy. It helps to create reusable code a.', '2023-08-28 13:05:35'),
(4, 'HTML CSS', 'Css stands for cascading style sheet  language used for describing the presentation of a document written in a markup language sucha as HTML or XML.', '2023-08-29 11:33:45'),
(5, 'C Programming', 'C is a general-purpose Programming language created by Dennnis Ritchie at the Bell Laboratories in 1972.It is very popular language,depsite being old. C is strongly associated with UNIX operating system.', '2023-09-03 12:57:06'),
(6, 'C++', 'C++ is a powerful general-purpose programming language.It can be used to develop opeating system ,browser,games,and so on. C++ support different ways of programming like procedural,object-oriented ,functional,and so on .', '2023-09-03 13:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(20) NOT NULL,
  `comment_by` int(20) NOT NULL,
  `comment_description` varchar(255) NOT NULL,
  `thread_id` int(20) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_by`, `comment_description`, `thread_id`, `comment_time`) VALUES
(1, 3, 'you may check or pip library', 2, '2023-08-31 16:26:43'),
(2, 7, ' you have to go for a java official website', 7, '2023-08-31 16:43:59'),
(3, 8, ' check your editor upto date ', 19, '2023-09-02 11:31:49'),
(12, 9, ' you have to check you insert query carefully', 8, '2023-09-02 20:07:58'),
(15, 9, ' update library', 19, '2023-09-02 20:40:15'),
(16, 9, ' check after some time', 19, '2023-09-02 20:40:33'),
(18, 9, ' library issue', 7, '2023-09-02 20:41:54'),
(19, 10, ' check it ', 21, '2023-09-02 21:14:06'),
(20, 10, ' check your internet', 23, '2023-09-02 21:15:11'),
(21, 11, ' check your php my admin ', 8, '2023-09-03 13:24:50'),
(24, 11, ' &lt;script &gt;alert(\"hello we save from xss attack\");&lt;/script&gt;', 21, '2023-09-04 10:27:38'),
(25, 9, ' if have to use check the syntax carefully like * symbol', 24, '2023-09-04 17:43:13'),
(26, 10, ' you may have to check your official website of bootstrap and select version 4 then copy a cdn link ', 25, '2023-09-05 15:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(20) NOT NULL,
  `contact_name` varchar(20) NOT NULL,
  `contact_email` varchar(20) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `contact_gender` text NOT NULL,
  `contact_feedback` varchar(255) NOT NULL,
  `contact_timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_number`, `contact_gender`, `contact_feedback`, `contact_timestamp`) VALUES
(18, 'vishal chaudhary', 'vishal123@gmail.com', '8219942644', 'Male', ' some of function are not working please check my login id ', '2023-09-04 21:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(20) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_description` varchar(255) NOT NULL,
  `thread_category_id` int(20) NOT NULL,
  `thread_user_id` int(20) NOT NULL,
  `threadtimestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_description`, `thread_category_id`, `thread_user_id`, `threadtimestamp`) VALUES
(1, 'php xampp downloading error', 'if i want to install a xampp it pop up a message unable to download or network error', 1, 3, '2023-08-30 21:32:50'),
(2, 'pip library', 'if we want to install library it show error', 2, 7, '2023-08-30 21:50:01'),
(3, 'php sql error', 'sql may shut down or block port', 1, 8, '2023-08-31 12:37:22'),
(7, 'installation error', ' how to install javajdk8.2.1 without error', 3, 7, '2023-08-31 12:56:22'),
(8, 'error in database', ' if i use a insert query it show a error in databse', 1, 3, '2023-08-31 19:27:29'),
(19, 'editor error', ' some of function are not working ', 2, 8, '2023-09-02 11:10:40'),
(20, 'event handling', ' some error', 3, 3, '2023-09-02 11:47:23'),
(21, 'sourrce code not found', ' some error in code', 3, 10, '2023-09-02 21:13:12'),
(23, 'data error', ' some of file not propely', 1, 10, '2023-09-02 21:14:45'),
(24, 'there is some error in pointer ', ' if we access pointer value it show error like\',', 5, 11, '2023-09-03 13:21:26'),
(25, 'bootstrap error', ' some the function and classes are not working in bootstrap 5 please give me a cdn link of bootstrap 4 version', 4, 11, '2023-09-05 15:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_password`, `user_time`) VALUES
(3, 'akay@gmail.com', '$2y$10$qW5PQs.eofH.tss6B/tyBOEo3r725viQnguA5nAoZa7djO2yju/WK', '2023-09-01 14:47:34'),
(7, 'vishal123@gmail.com', '$2y$10$rETEGdcqAE54oiIxkAl3AuBve0tUcjSs/lzH6jgvodIA4gWEOd0p.', '2023-09-01 21:10:05'),
(8, 'nikhil@gmail.com', '$2y$10$8jxeSss68WYuQ3IghQL7wO1hLRttczWQ5t1U4Dh3KI5FizBRqZVw6', '2023-09-01 22:31:30'),
(9, 'sss@abc', '$2y$10$ANedB1HLRsYp1zTbkBOjCOxp70/yHLY8KT3yYD3beEUoSwHJHWNNK', '2023-09-02 20:05:59'),
(10, 'pankajnanda@gmail.com', '$2y$10$fkhqlASgBIdHe7bhIrm6U.e0NXIAoYbsN0JoX//ELDUvF2nW5xPla', '2023-09-02 21:11:03'),
(11, 'munish@gmail.com', '$2y$10$WAQi5D31cTkLi1oSbxY0ne3SPCpH/HBmOjFN31dTpVlaDqi//6coS', '2023-09-03 13:19:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_description`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
