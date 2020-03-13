-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 13, 2020 at 10:57 AM
-- Server version: 10.4.12-MariaDB-1:10.4.12+maria~bionic
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `BCBB`
--

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `boards_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`boards_id`, `name`, `description`) VALUES
(2, 'Development', 'Dev stuff'),
(3, 'General', 'Main stuff'),
(4, 'Smalltalk', 'Small stuff'),
(5, 'Events', 'Events Stuffs');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messages_id` int(11) NOT NULL,
  `content_message` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `edition_date` datetime DEFAULT NULL,
  `active` tinyint(2) DEFAULT 1,
  `users_id` int(11) NOT NULL,
  `topics_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messages_id`, `content_message`, `creation_date`, `edition_date`, `active`, `users_id`, `topics_id`) VALUES
(1, 'La bite a dudule', '2020-03-03 10:06:27', NULL, 1, 1, 1),
(4, 'rtsr', '2020-03-10 09:23:53', NULL, 1, 1, 2),
(5, 'oui ', '2020-03-10 09:24:13', NULL, 1, 1, 1),
(6, 'trololo', '2020-03-12 15:31:47', NULL, 1, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topics_id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT current_timestamp(),
  `users_id` int(11) NOT NULL,
  `boards_id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topics_id`, `title`, `creation_date`, `users_id`, `boards_id`, `content`) VALUES
(1, 'main main', '2020-03-03 10:50:55', 1, 2, ''),
(2, 'Bob = best name ever', '2020-03-03 11:07:10', 1, 4, ''),
(3, 'la mere a dudule', '2020-03-12 13:30:59', 1, 5, 'elle est chouette');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `pwd` varchar(130) NOT NULL,
  `nickname` varchar(45) NOT NULL,
  `signature` varchar(45) DEFAULT NULL,
  `active` tinyint(2) DEFAULT 1,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `gender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `email`, `pwd`, `nickname`, `signature`, `active`, `firstname`, `lastname`, `birthday`, `gender`) VALUES
(1, 'bob@gmail.com', 'bobbob', 'bobby', 'bobby the best', 1, '', '', '0000-00-00', 0),
(5, 'test@gmail.com', 'test', 'test', NULL, 1, 'Me', 'tester', '2008-03-02', 1),
(7, 'test1@gmail.com', 'test', 'Mustafa', NULL, 1, 'Mustafa', 'hadi', '2009-03-03', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`boards_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`messages_id`),
  ADD KEY `fk_messages_users_idx` (`users_id`),
  ADD KEY `fk_messages_topics1_idx` (`topics_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topics_id`),
  ADD UNIQUE KEY `title_UNIQUE` (`title`),
  ADD KEY `fk_topics_users1_idx` (`users_id`),
  ADD KEY `fk_topics_boards1_idx` (`boards_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `nickname_UNIQUE` (`nickname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `boards_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `messages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topics_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
