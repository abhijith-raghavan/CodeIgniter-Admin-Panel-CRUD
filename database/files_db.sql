-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 08:40 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `files_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_title` varchar(50) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(20) NOT NULL,
  `file_createtime` datetime NOT NULL DEFAULT current_timestamp(),
  `file_updatetime` datetime NOT NULL DEFAULT current_timestamp(),
  `file_deletetime` datetime NOT NULL,
  `file_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_title`, `file_name`, `file_type`, `file_createtime`, `file_updatetime`, `file_deletetime`, `file_status`) VALUES
(1, 'Test', 'WRG_PHP_Coding_Test.pdf', '.pdf', '2021-12-26 12:09:34', '2021-12-26 12:09:34', '0000-00-00 00:00:00', 1),
(2, 'Test New', 'WRG_PHP_Coding_Test1.pdf', '.pdf', '2021-12-26 12:37:54', '2021-12-26 12:37:54', '2021-12-26 12:20:08', 0),
(3, 'image', '1080p-Nature-HD-Wallpaper.jpg', '.jpg', '2021-12-26 12:38:05', '2021-12-26 12:38:05', '2021-12-26 12:14:51', 0),
(4, 'image', '1080p-Nature-HD-Wallpaper1.jpg', '.jpg', '2021-12-26 12:50:03', '2021-12-26 12:50:03', '0000-00-00 00:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
