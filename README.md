-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 21, 2024 at 04:29 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gantt_chart`
--

-- --------------------------------------------------------

--
-- Table structure for table `Assigne`
--

CREATE TABLE `Assigne` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Assigne`
--

INSERT INTO `Assigne` (`id`, `name`, `image`, `created_at`, `is_active`) VALUES
(1, 'Sadaf', 'uploads/hello.png', '2024-05-20 19:17:02', 1),
(2, 'Salif', 'uploads/images.jpeg', '2024-05-20 19:17:02', 1),
(5, 'Ash', 'uploads/images (5).jpeg', '2024-05-20 19:17:59', 1),
(6, 'Sub', 'uploads/images (4).jpeg', '2024-05-20 19:17:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int NOT NULL,
  `task_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `assigned` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `task_name`, `start_date`, `end_date`, `assigned`, `created_at`, `is_active`) VALUES
(6, 'Probation task', '2024-05-20', '2024-05-20', 6, '2024-05-21 04:13:50', 1),
(8, 'Probation task two', '2024-05-10', '2024-05-10', 1, '2024-05-21 04:19:11', 1),
(9, 'Probation task three', '2024-05-17', '2024-05-17', 5, '2024-05-21 04:19:35', 1),
(10, 'Probation task four', '2024-05-23', '2024-05-23', 2, '2024-05-21 04:20:18', 1),
(11, 'Calendar Task', '2024-05-21', '2024-05-21', 1, '2024-05-21 04:20:53', 1),
(12, 'ChatBot', '2024-05-15', '2024-05-15', 2, '2024-05-21 04:21:29', 1),
(13, 'Gantt Chart', '2024-05-16', '2024-05-16', 5, '2024-05-21 04:22:04', 1),
(14, 'Patient Login', '2024-05-20', '2024-05-20', 6, '2024-05-21 04:22:46', 1),
(15, 'Admin Login', '2024-05-10', '2024-05-10', 6, '2024-05-21 04:23:13', 1),
(16, 'Doctor Login', '2024-05-16', '2024-05-16', 1, '2024-05-21 04:23:47', 1),
(17, 'Last Task', '2024-05-22', '2024-05-22', 5, '2024-05-21 04:25:22', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Assigne`
--
ALTER TABLE `Assigne`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assigned` (`assigned`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Assigne`
--
ALTER TABLE `Assigne`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`assigned`) REFERENCES `Assigne` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
