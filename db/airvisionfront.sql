-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2025 at 10:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airvisionfront`
--

-- --------------------------------------------------------

--
-- Table structure for table `cctv`
--

CREATE TABLE `cctv` (
  `id` int(11) NOT NULL,
  `cctv_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `installation_location` varchar(255) NOT NULL,
  `isLive` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cctv`
--

INSERT INTO `cctv` (`id`, `cctv_id`, `user_id`, `ip_address`, `model`, `installation_location`, `isLive`, `created_at`, `updated_at`) VALUES
(6, 'rtmp://w.gbpl.kr:31935/aidenssss', 1, '', '', '', 0, '2025-05-12 10:41:55', '2025-05-12 10:41:55'),
(9, 'Michael Andrew', 1, '', '', '', 0, '2025-05-13 06:32:40', '2025-05-13 06:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `streamer`
--

CREATE TABLE `streamer` (
  `id` int(11) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `generated_stream` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `callId` varchar(255) NOT NULL,
  `isLive` tinyint(1) NOT NULL,
  `startedAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_stream_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `streamer`
--

INSERT INTO `streamer` (`id`, `stream`, `generated_stream`, `created_at`, `updated_at`, `user_id`, `callId`, `isLive`, `startedAt`, `user_stream_id`) VALUES
(1, 'Tutorial', 'stream_2jwgwx0267', '2025-05-14 04:27:00', '2025-05-14 04:27:00', 1, 'jAIrf6xWd92k', 0, '2025-05-14 04:27:00', 'Luminara_Unduli'),
(2, 'Tutorial', 'stream_vmlxof7717', '2025-05-14 04:41:47', '2025-05-14 04:41:47', 1, 'jAIrf6xWd92k', 0, '2025-05-14 04:41:47', 'Luminara_Unduli'),
(3, 'Tutorial', 'stream_llyfbp2651', '2025-05-14 07:15:22', '2025-05-14 07:15:22', 1, 'jAIrf6xWd92k', 1, '2025-05-14 07:15:22', 'Luminara_Unduli'),
(4, 'Tutorial', 'stream_rujvtj7840', '2025-05-14 08:38:17', '2025-05-14 08:38:17', 1, 'jAIrf6xWd92k', 0, '2025-05-14 08:38:17', 'Luminara_Unduli'),
(5, 'LiveStream', 'stream_ocg8ig9754', '2025-05-14 08:49:29', '2025-05-14 08:49:29', 1, 'jAIrf6xWd92k', 1, '2025-05-14 08:49:29', 'Luminara_Unduli'),
(6, 'LiveStream', 'stream_fl38ma3970', '2025-05-14 09:07:14', '2025-05-14 09:07:14', 1, 'jAIrf6xWd92k', 0, '2025-05-14 09:07:14', 'Luminara_Unduli');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `address`) VALUES
(1, 'Mike', '$2y$10$dvBBbGb5FQeRE6YKZfynf.h/vcZtSuk97l1T.pTVY7RjsKgXwV65i', 'Michael', 'Iligan, Philippines');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cctv`
--
ALTER TABLE `cctv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streamer`
--
ALTER TABLE `streamer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cctv`
--
ALTER TABLE `cctv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `streamer`
--
ALTER TABLE `streamer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
