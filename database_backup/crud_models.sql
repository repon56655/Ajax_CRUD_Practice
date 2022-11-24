-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 09:36 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajax_crud_practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud_models`
--

CREATE TABLE `crud_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crud_models`
--

INSERT INTO `crud_models` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(7, 'Repon', 'repon@gmail.com', '01645758206', 'Mirpur', '2022-11-22 07:34:21', '2022-11-22 07:34:21'),
(8, 'MD Repon', 'mdrepon@gmail.com', '01307156017', 'Dhaka', '2022-11-22 07:35:20', '2022-11-22 07:35:20'),
(9, 'Nur', 'nur@gmail.com', '5553665353', 'mirpur', '2022-11-23 21:56:41', '2022-11-23 21:56:41'),
(10, 'sfsfsf', 'sfsfsd@gmail.com', '69784', 'hhuifs', '2022-11-23 21:59:16', '2022-11-23 21:59:16'),
(11, 'asa', 'asa@gmail.com', '5353', 'fsdf', '2022-11-23 22:00:04', '2022-11-23 22:00:04'),
(12, 'fsdfa', 'sfsfsf@gmail.com', '57326573', 'sfsaff', '2022-11-23 22:04:26', '2022-11-23 22:04:26'),
(13, 'Nuruddin', 'nuruddin@gmail.com', '67836784678', 'dhaka', '2022-11-23 22:06:13', '2022-11-23 22:06:13'),
(14, 'sfsfasf', 'asff@gmail.com', '346534', 'afsdfasdf', '2022-11-23 22:22:49', '2022-11-23 22:22:49'),
(15, 'asasfsd', 'm@gmail.com', '65314', 'asfdff', '2022-11-23 22:23:54', '2022-11-23 22:23:54'),
(16, 'hello', 'hello@gmail.com', '786784', 'asafsd', '2022-11-24 00:32:54', '2022-11-24 00:32:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud_models`
--
ALTER TABLE `crud_models`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud_models`
--
ALTER TABLE `crud_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
