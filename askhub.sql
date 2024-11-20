-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 09:15 AM
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
-- Database: `askhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) NOT NULL,
  `answer` mediumtext NOT NULL,
  `question_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `question_id`, `user_id`) VALUES
(1, 'Yes, PHP is Good to start with, for Beginners.', 1, 1),
(2, 'Yes', 1, 1),
(3, 'Yes, You can', 1, 1),
(4, 'Yes, You can', 3, 3),
(5, 'It Depends on your Budget.', 3, 3),
(7, 'My Favorite Food is Chapathi.', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'mobiles'),
(2, 'food'),
(3, 'coding'),
(4, 'laptop'),
(5, 'general');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `category_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `category_id`, `user_id`) VALUES
(3, 'Can I Buy Iphone', 'Can I buy Iphone. If yes, Then please tell me which one is best...', 1, 2),
(4, 'What Is the Full Form of \"OK\".', 'What is the full form of \"OK\". Please help...', 3, 3),
(5, 'What is Your Favorite Food?', 'What is Your Favorite Food, Please mention Below.', 2, 2),
(6, 'Which laptop to buy under 40000 rupees?', 'Which laptop to buy under 40000 rupees? Please Help...', 4, 4),
(7, 'Is Python a good programming language?', 'Is Python a good programming language? Please Reply for this question... ', 3, 4),
(8, 'Best Garment Brand In India?', 'Best Garment Brand In India? What do you think...', 5, 4),
(9, 'Will Pushpa 2 cross 2000 crores collection?', 'Will Pushpa 2 cross 2000 crores collection All over the world?', 5, 4),
(10, 'Which is the famous JavaScript Framework?', 'Which is the famous JavaScript Framework? Which to learn now in 2024?', 3, 4),
(11, 'Which is the High Rated Laptop?', 'Which is the High Rated Laptop under 45000 rupees?', 4, 4),
(12, 'Best Smart phone under 20000 Rupees?', 'Best Smart phone under 20000 Rupees in India to Buy Now? please Help', 1, 4),
(13, 'Is Oil Food good for health?', 'Is Oil Food good for health? Please Give me the reasons Below...', 2, 4),
(18, 'What is the basic use of laptop?', 'What is the basic use of laptop? please help me.', 4, 3),
(19, 'What are the important questions I need to ask when buying a smartphone?', 'What are the important questions I need to ask when buying a smartphone? Please Help me to buy a best phone.', 1, 3),
(20, 'What is the difference between a hybrid, electric vehicle (EV) and a hybrid electric vehicle (HEV)?', 'What is the difference between a hybrid, electric vehicle (EV) and a hybrid electric vehicle (HEV)?', 5, 2),
(21, 'Is DSA Important for interviews?', 'Is DSA Important for interviews? Please Help', 3, 2),
(22, 'Best day to start gym?', 'Best day to start gym? What do you think?', 5, 2),
(25, 'Should Instagram Be banned in India?', 'Should Instagram Be banned in India? Please Write your views.', 5, 1),
(26, 'Should Instagram Be banned in India?', 'Should Instagram Be banned in India? Write your View.', 5, 1),
(27, 'Online Shopping vs Offline Shopping?', 'Online Shopping vs Offline Shopping? Which is better. Share your comments on this.', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `address`) VALUES
(1, 'Rudra', '$2y$10$LaXbP7qaQlMRjlvnJlUN9OcUgcTHyMe7WXG80ND7Z4bCcL392fpru', 'rudragouda.h2002@gmail.com', 'Bellary'),
(2, 'Karthik', '$2y$10$xl6Ycr6NKU9xCvLcR/u8kOWH5bj.mupv3YOcmaWMbSApEyL4qA4Pe', 'Karthik@gmail.com', 'Mumbai'),
(3, 'Nagaraj', '$2y$10$gN7OzFjwatREkTGlKIffVeVl8U32mPSu9d.0mTeFmhCBQ1Emh4YhS', 'Nagaraj@gmail.com', 'Bangaluru'),
(4, 'Syndicate', '$2y$10$WPVMVyigmAVUJji6ANws8OUBEWFHuNDEsbTNXxOwFXzxicp/o183i', 'syndicate@gmail.com', 'Chennai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
