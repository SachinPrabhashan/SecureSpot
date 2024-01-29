-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 05, 2024 at 08:36 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `securespot`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `locker_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `usage` int DEFAULT NULL,
  `unit_amount` int DEFAULT NULL,
  `key_management` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `locker_id`, `date`, `start_time`, `end_time`, `usage`, `unit_amount`, `key_management`, `status`, `created_at`, `updated_at`, `reference_no`) VALUES
(124, 2, 2, '2024-02-01', '08:00:00', '09:30:00', 3, NULL, 'yes', 'complete', '2024-01-01 05:45:20', '2024-01-01 05:46:53', 'REF00124');

-- --------------------------------------------------------

--
-- Table structure for table `booking_histories`
--

CREATE TABLE `booking_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `bookings_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `locker_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_histories`
--

INSERT INTO `booking_histories` (`id`, `bookings_id`, `user_id`, `locker_id`, `date`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`, `reference_no`) VALUES
(12, 63, 2, 1, '2023-12-20', '08:00:00', '11:00:00', 'DeleteByUser', '2023-12-19 07:49:03', '2023-12-19 07:49:03', ''),
(13, 64, 2, 1, '2023-12-20', '10:00:00', '13:00:00', 'DeleteByUser', '2023-12-19 07:50:44', '2023-12-19 07:50:44', ''),
(14, 65, 2, 1, '2023-12-21', '08:00:00', '11:00:00', 'DeleteByUser', '2023-12-19 09:12:30', '2023-12-19 09:12:30', ''),
(15, 66, 2, 2, '2023-12-22', '08:00:00', '10:30:00', 'DeleteByUser', '2023-12-19 09:12:40', '2023-12-19 09:12:40', ''),
(16, 67, 2, 2, '2023-12-23', '08:00:00', '11:00:00', 'DeleteByUser', '2023-12-19 09:12:51', '2023-12-19 09:12:51', ''),
(17, 68, 2, 1, '2023-12-21', '08:00:00', '08:30:00', 'DeleteByUser', '2023-12-19 09:16:41', '2023-12-19 09:16:41', ''),
(18, 69, 2, 1, '2023-12-29', '08:00:00', '12:00:00', 'DeleteByUser', '2023-12-19 09:16:53', '2023-12-19 09:16:53', ''),
(19, 70, 2, 2, '2023-12-21', '08:00:00', '11:00:00', 'DeleteByUser', '2023-12-19 09:17:02', '2023-12-19 09:17:02', ''),
(20, 71, 2, 1, '2023-12-21', '08:00:00', '08:30:00', 'DeleteByUser', '2023-12-19 09:21:42', '2023-12-19 09:21:42', ''),
(21, 72, 2, 2, '2023-12-30', '08:00:00', '08:30:00', 'DeleteByUser', '2023-12-19 09:21:50', '2023-12-19 09:21:50', ''),
(22, 73, 2, 2, '2023-12-29', '08:00:00', '08:30:00', 'DeleteByUser', '2023-12-19 09:21:59', '2023-12-19 09:21:59', ''),
(23, 74, 2, 4, '2024-01-04', '08:00:00', '10:00:00', 'DeleteByUser', '2023-12-19 09:22:10', '2023-12-19 09:22:10', ''),
(24, 75, 2, 2, '2023-12-22', '08:00:00', '08:30:00', 'complete', '2023-12-19 09:25:19', '2023-12-19 09:25:19', ''),
(25, 76, 2, 4, '2023-12-22', '08:00:00', '11:00:00', 'RejectByAdmin', '2023-12-19 09:25:28', '2023-12-19 09:25:28', ''),
(26, 77, 2, 4, '2023-12-29', '08:00:00', '11:30:00', 'RejectByAdmin', '2023-12-19 09:25:37', '2023-12-19 09:25:37', ''),
(27, 78, 2, 3, '2023-12-22', '08:00:00', '08:30:00', 'RejectByAdmin', '2023-12-20 04:11:14', '2023-12-20 04:11:14', 'REF0076'),
(28, 79, 2, 1, '2023-12-22', '08:00:00', '11:30:00', 'RejectByAdmin', '2023-12-20 04:12:28', '2023-12-20 04:12:28', 'REF0077'),
(29, 80, 2, 3, '2023-12-28', '08:00:00', '11:00:00', 'RejectByAdmin', '2023-12-20 04:15:23', '2023-12-20 04:15:23', 'REF0064'),
(30, 81, 2, 2, '2023-12-21', '08:00:00', '10:30:00', 'RejectByAdmin', '2023-12-20 04:35:03', '2023-12-20 04:35:03', 'REF0081'),
(31, 82, 2, 3, '2023-12-22', '08:00:00', '13:00:00', 'RejectByAdmin', '2023-12-20 04:37:18', '2023-12-20 04:37:18', 'REF0082'),
(32, 83, 2, 1, '2023-12-28', '08:00:00', '10:30:00', 'RejectByAdmin', '2023-12-20 04:43:55', '2023-12-20 04:43:55', 'REF0083'),
(33, 84, 2, 3, '2024-01-06', '08:00:00', '08:30:00', 'RejectByAdmin', '2023-12-20 04:47:36', '2023-12-20 04:47:36', 'REF0084'),
(34, 85, 2, 4, '2023-12-21', '08:00:00', '08:30:00', 'DeleteByUser', '2023-12-20 04:58:30', '2023-12-20 04:58:30', 'REF0085'),
(35, 86, 2, 1, '2023-12-22', '08:00:00', '10:30:00', 'complete', '2023-12-21 04:28:54', '2023-12-21 04:28:54', 'REF0086'),
(36, 87, 2, 1, '2024-01-11', '08:00:00', '11:00:00', 'complete', '2023-12-21 04:33:53', '2023-12-21 04:33:53', 'REF0087'),
(37, 88, 2, 1, '2023-12-22', '08:00:00', '12:30:00', 'complete', '2023-12-21 04:58:16', '2023-12-21 04:58:16', 'REF0088'),
(38, 89, 2, 2, '2023-12-23', '10:00:00', '11:30:00', 'complete', '2023-12-21 05:04:37', '2023-12-21 05:04:37', 'REF0089'),
(39, 90, 4, 3, '2023-12-23', '11:00:00', '14:00:00', 'complete', '2023-12-21 06:23:10', '2023-12-21 06:23:10', 'REF0090'),
(40, 91, 4, 2, '2023-12-30', '08:00:00', '12:30:00', 'complete', '2023-12-21 06:42:22', '2023-12-21 06:42:22', 'REF0091'),
(41, 92, 4, 3, '2023-12-30', '10:30:00', '13:30:00', 'complete', '2023-12-21 08:06:14', '2023-12-21 08:06:14', 'REF0092'),
(42, 93, 2, 1, '2023-12-28', '11:30:00', '13:00:00', 'DeleteByUser', '2023-12-27 03:56:23', '2023-12-27 03:56:23', 'REF0093'),
(43, 94, 2, 2, '2023-12-28', '10:30:00', '14:00:00', 'DeleteByUser', '2023-12-27 03:58:53', '2023-12-27 03:58:53', 'REF0094'),
(44, 95, 2, 1, '2023-12-28', '08:00:00', '09:00:00', 'DeleteByUser', '2023-12-27 04:00:02', '2023-12-27 04:00:02', 'REF0095'),
(45, 96, 2, 1, '2023-12-29', '08:00:00', '09:00:00', 'DeleteByUser', '2023-12-27 04:01:06', '2023-12-27 04:01:06', 'REF0096'),
(46, 97, 2, 1, '2023-12-28', '08:00:00', '09:00:00', 'DeleteByUser', '2023-12-27 04:01:38', '2023-12-27 04:01:38', 'REF0097'),
(47, 98, 2, 2, '2023-12-28', '08:00:00', '09:00:00', 'DeleteByUser', '2023-12-27 04:02:13', '2023-12-27 04:02:13', 'REF0098'),
(48, 99, 2, 2, '2023-12-28', '08:00:00', '09:00:00', 'DeleteByUser', '2023-12-27 04:05:25', '2023-12-27 04:05:25', 'REF0099'),
(49, 100, 2, 2, '2023-12-29', '08:00:00', '09:00:00', 'DeleteByUser', '2023-12-27 04:06:08', '2023-12-27 04:06:08', 'REF00100'),
(50, 101, 2, 3, '2023-12-29', '08:00:00', '09:30:00', 'DeleteByUser', '2023-12-27 04:06:58', '2023-12-27 04:06:58', 'REF00101'),
(51, 102, 2, 1, '2023-12-29', '08:00:00', '09:00:00', 'DeleteByUser', '2023-12-27 04:10:43', '2023-12-27 04:10:43', 'REF00102'),
(52, 103, 2, 4, '2023-12-30', '08:00:00', '09:00:00', 'DeleteByUser', '2023-12-27 04:29:15', '2023-12-27 04:29:15', 'REF00103'),
(53, 104, 2, 2, '2023-12-28', '08:00:00', '09:00:00', 'DeleteByUser', '2023-12-27 04:54:31', '2023-12-27 04:54:31', 'REF00104'),
(54, 105, 2, 1, '2023-12-28', '08:00:00', '09:30:00', 'DeleteByUser', '2023-12-27 05:03:07', '2023-12-27 05:03:07', 'REF00105'),
(55, 106, 2, 3, '2023-12-29', '08:00:00', '09:00:00', 'DeleteByUser', '2023-12-27 05:09:37', '2023-12-27 05:09:37', 'REF00106'),
(56, 107, 2, 2, '2023-12-29', '08:00:00', '08:30:00', 'DeleteByUser', '2023-12-27 05:21:10', '2023-12-27 05:21:10', 'REF00107'),
(57, 108, 2, 4, '2024-01-04', '10:30:00', '11:00:00', 'DeleteByUser', '2023-12-27 05:40:59', '2023-12-27 05:40:59', 'REF00108'),
(58, 109, 2, 1, '2023-12-28', '08:00:00', '08:30:00', 'DeleteByUser', '2023-12-27 09:06:05', '2023-12-27 09:06:05', 'REF00109'),
(59, 110, 2, 1, '2023-12-30', '08:00:00', '09:00:00', 'DeleteByUser', '2023-12-27 09:24:31', '2023-12-27 09:24:31', 'REF00110'),
(60, 111, 2, 3, '2023-12-29', '08:00:00', '16:00:00', 'DeleteByUser', '2023-12-27 10:04:54', '2023-12-27 10:04:54', 'REF00111'),
(61, 112, 4, 2, '2023-12-28', '08:00:00', '18:00:00', 'DeleteByUser', '2023-12-27 10:06:49', '2023-12-27 10:06:49', 'REF00112'),
(62, 113, 2, 1, '2024-01-01', '10:00:00', '12:30:00', 'DeleteByUser', '2023-12-29 05:45:28', '2023-12-29 05:45:28', 'REF00113'),
(63, 114, 2, 1, '2024-01-01', '13:00:00', '14:30:00', 'DeleteByUser', '2023-12-29 05:57:38', '2023-12-29 05:57:38', 'REF00114'),
(64, 115, 2, 2, '2024-01-01', '08:00:00', '10:30:00', 'DeleteByUser', '2023-12-29 06:03:13', '2023-12-29 06:03:13', 'REF00115'),
(65, 116, 2, 1, '2024-01-02', '08:00:00', '08:30:00', 'DeleteByUser', '2023-12-29 06:31:42', '2023-12-29 06:31:42', 'REF00116'),
(66, 117, 2, 2, '2024-01-04', '08:00:00', '08:30:00', 'RejectByAdmin', '2023-12-29 06:57:24', '2023-12-29 06:57:24', 'REF00117'),
(67, 118, 2, 3, '2024-01-02', '08:00:00', '10:00:00', 'complete', '2023-12-29 07:31:18', '2023-12-29 07:31:18', 'REF00118'),
(68, 119, 2, 3, '2024-01-18', '08:00:00', '09:30:00', 'complete', '2024-01-01 03:00:21', '2024-01-01 03:00:21', 'REF00119'),
(69, 120, 2, 1, '2024-01-12', '08:00:00', '09:30:00', 'complete', '2024-01-01 03:38:55', '2024-01-01 03:38:55', 'REF00120'),
(70, 121, 2, 3, '2024-01-12', '08:00:00', '11:00:00', 'complete', '2024-01-01 04:48:03', '2024-01-01 04:48:03', 'REF00121'),
(71, 122, 2, 2, '2024-02-03', '08:00:00', '10:00:00', 'complete', '2024-01-01 04:57:30', '2024-01-01 04:57:30', 'REF00122'),
(72, 123, 2, 3, '2024-01-29', '08:00:00', '10:00:00', 'complete', '2024-01-01 05:24:23', '2024-01-01 05:24:23', 'REF00123'),
(73, 124, 2, 2, '2024-02-01', '08:00:00', '09:30:00', 'complete', '2024-01-01 05:45:20', '2024-01-01 05:45:20', 'REF00124');

-- --------------------------------------------------------

--
-- Table structure for table `booking_reviews`
--

CREATE TABLE `booking_reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `bookings_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `locker_id` bigint UNSIGNED NOT NULL,
  `rate` int NOT NULL,
  `user_review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_reviews`
--

INSERT INTO `booking_reviews` (`id`, `bookings_id`, `user_id`, `locker_id`, `rate`, `user_review`, `view_status`, `status`, `created_at`, `updated_at`) VALUES
(7, 67, 2, 3, 5, 'Good Service. Well clean & secure lockers available.', 'unread', 'reviewed', '2023-12-29 07:32:58', '2023-12-29 07:32:58'),
(8, 68, 2, 3, 4, 'S', 'unread', 'reviewed', '2024-01-01 04:47:53', '2024-01-01 04:47:53'),
(9, 69, 2, 1, 4, '.', 'unread', 'reviewed', '2024-01-01 04:55:09', '2024-01-01 04:55:09'),
(10, 70, 2, 3, 3, 'qq', 'unread', 'reviewed', '2024-01-01 05:24:04', '2024-01-01 05:24:04'),
(11, 71, 2, 2, 4, '12', 'unread', 'reviewed', '2024-01-01 05:24:13', '2024-01-01 05:24:13'),
(12, 72, 2, 3, 4, 'fgfgj', 'unread', 'reviewed', '2024-01-01 09:24:46', '2024-01-01 09:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `fullname`, `email`, `phone`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Sachin Rathnayake', 'sachinprabhashan.edu@gmail.com', 760300001, 'Test Msg 01', 'Unread', '2023-12-05 04:35:12', '2023-12-05 04:35:12'),
(2, 4, 'Sahan Udanthe', 'sahan@gmail.com', 767876765, 'Pixel 5 is good phone!', 'Unread', '2023-12-05 04:38:03', '2023-12-05 04:38:03'),
(3, 2, 'Dulaksha Guruge', 'Dguruge@hotmail.com', 789845456, 'I recently used the booking system, and I must say it exceeded my expectations! The interface is user-friendly, making the entire booking process a breeze. The system is fast and efficient, providing real-time updates on availability. I especially appreciate the detailed confirmation emails, which include all the essential information. Kudos to the developers for creating such a seamless and convenient booking experience!', 'Unread', '2023-12-06 03:24:07', '2023-12-06 03:24:07'),
(4, 2, 'Amaya Samanmali', 'amayas@gmail.com', 775434567, 'My experience with the booking system was frustrating, to say the least. The interface is clunky and intuitive, making it difficult to navigate through the various steps. I encountered multiple glitches during the process, causing delays and confusion. Additionally, the lack of clear communication about changes in availability added to the overall dissatisfaction. The system needs a major overhaul to improve user experience and reliability. Disappointing, to say the least.', 'Unread', '2023-12-06 03:24:55', '2023-12-06 03:24:55'),
(5, 4, 'Kasun Kumara', 'kumara@gmail.com', 769956345, 'I stumbled upon this booking system, and I am pleasantly surprised by how well it functions. The layout is intuitive, and the entire process is straightforward. I appreciate the attention to detail, such as the option to save preferences for future bookings. The system also sends timely reminders, making it easy to stay organized. Overall, a great tool for hassle-free bookings!', 'Unread', '2023-12-06 05:20:13', '2023-12-06 05:20:13'),
(6, 4, 'Anjana Rajapaksha', 'anjanaraj@gmail.com', 754632671, 'My first encounter with this booking system was far from ideal. The user interface is confusing, making it hard to understand the steps involved. I experienced a delay in receiving confirmation, which added unnecessary anxiety. The lack of a responsive customer support system further compounded the issue. This booking system needs improvement in terms of clarity and customer service to compete in the market.', 'Unread', '2023-12-06 05:21:00', '2023-12-06 05:21:00'),
(7, 2, 'Kamal Gunarathne', 'kamalg@gmail.com', 714563721, 'I recently used the booking system, and it\'s a game-changer! The sleek design and user-friendly interface made the reservation process a pleasure. The system\'s responsiveness and real-time updates kept me informed every step of the way. I also appreciate the additional features like reviews and ratings for the booked services, helping me make informed decisions. Highly recommended for its efficiency and user-centric approach!', 'Unread', '2023-12-06 05:27:35', '2023-12-06 05:27:35'),
(8, 2, 'Gayan Gamage', 'gayangamage@dialog.lk', 777337827, 'My experience with this booking system was frustrating, to say the least. The interface is outdated and glitchy, making it a struggle to complete a reservation. I encountered errors during payment, and the lack of clear instructions added to the confusion. The system\'s inability to sync with my calendar caused scheduling conflicts. This needs serious improvements in terms of functionality and user interface to be considered reliable.', 'Unread', '2023-12-06 05:28:08', '2023-12-06 05:28:08'),
(9, 2, 'Sachin Rathnayake', 'sachinprabhashan@gmail.com', 714563721, 'Very Good Service. Highly Recommend for all students.', 'Unread', '2023-12-29 09:39:01', '2023-12-29 09:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

CREATE TABLE `event_log` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `event_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lockers`
--

CREATE TABLE `lockers` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` bigint UNSIGNED DEFAULT NULL,
  `locker_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_x` int NOT NULL,
  `position_y` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lockers`
--

INSERT INTO `lockers` (`id`, `booking_id`, `locker_type`, `status`, `position_x`, `position_y`, `created_at`, `updated_at`) VALUES
(1, NULL, 'L1', 'Available', 1, 1, '2023-12-04 05:39:05', '2023-12-18 10:04:55'),
(2, NULL, 'L2', 'Available', 1, 2, '2023-12-04 05:39:13', '2023-12-13 06:48:21'),
(3, NULL, 'L3', 'Available', 1, 3, '2023-12-04 05:39:20', '2023-12-18 10:05:56'),
(4, NULL, 'L4', 'Available', 1, 4, '2023-12-04 05:39:27', '2023-12-07 06:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `lockers_settings`
--

CREATE TABLE `lockers_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `unitprice` int NOT NULL DEFAULT '5',
  `unitsize` int NOT NULL DEFAULT '30',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lockers_settings`
--

INSERT INTO `lockers_settings` (`id`, `unitprice`, `unitsize`, `created_at`, `updated_at`) VALUES
(1, 5, 30, NULL, '2023-12-15 10:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_13_053110_create_module_table', 1),
(6, '2023_11_13_053129_create_permission_table', 1),
(7, '2023_11_13_053139_create_module_permission_table', 1),
(8, '2023_11_13_053149_create_role_table', 1),
(9, '2023_11_13_053159_create_users_table', 1),
(10, '2023_11_13_055615_create_event_log_table', 1),
(11, '2023_11_13_055623_create_booking_table', 1),
(12, '2023_11_13_055639_create_payment_table', 1),
(13, '2023_11_13_055658_create_locker_table', 1),
(14, '2023_11_13_055710_create_operation_date_table', 1),
(15, '2023_11_20_102617_add_foreign_key_to_bookings_table', 1),
(16, '2023_12_04_105542_create_booking_histories_table', 1),
(17, '2023_12_05_091550_create_contacts_table', 2),
(18, '2023_12_12_120303_create_payments_history_table', 3),
(19, '2023_12_12_135025_create_payments_histories_table', 4),
(20, '2023_12_12_140105_create_payments_histories_table', 5),
(21, '2023_12_15_150510_create_locker_settings_table', 6),
(22, '2023_12_15_150828_create_locker_settings_table', 7),
(23, '2023_12_15_151247_create_lockers_settings_table', 8),
(24, '2023_12_18_101519_add_status_to_booking_histories', 9),
(25, '2023_12_18_111817_create_booking_histories_table', 10),
(26, '2023_12_18_122256_create_booking_histories_table', 11),
(27, '2023_12_20_090711_add_reference_no_to_bookings', 12),
(28, '2023_12_20_092344_add_reference_no_to_booking_histories', 13),
(29, '2023_12_20_162422_create_booking_review_table', 14),
(30, '2023_12_20_172258_create_booking_reviews_table', 15),
(31, '2023_12_21_085029_create_booking_reviews_table', 16),
(32, '2023_12_21_103135_create_booking_reviews_table', 17),
(33, '2023_12_27_084344_create_payments_bookings_table', 18),
(34, '2023_12_27_104253_create_payments_bookings_table', 19),
(35, '2023_12_27_144238_create_payments_bookings_table', 20),
(36, '2023_12_27_144649_create_payments_bookings_table', 21),
(37, '2023_12_27_153329_create_payments_bookings_table', 22),
(38, '2023_12_28_161418_add_is_disabled_to_users_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` bigint UNSIGNED NOT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `module_permission`
--

CREATE TABLE `module_permission` (
  `id` bigint UNSIGNED NOT NULL,
  `module_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `module_permission_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `operation_date`
--

CREATE TABLE `operation_date` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments_bookings`
--

CREATE TABLE `payments_bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `booking_his_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `charge_amount` double DEFAULT NULL,
  `refund_amount` double DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refund_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments_bookings`
--

INSERT INTO `payments_bookings` (`id`, `receipt`, `user_id`, `booking_his_id`, `date`, `charge_amount`, `refund_amount`, `status`, `refund_note`, `created_at`, `updated_at`) VALUES
(1, 'BK0REF00111', 2, 60, '2023-12-27', 80, NULL, 'BookingCharge', NULL, '2023-12-27 10:04:54', '2023-12-27 10:04:54'),
(2, 'REFREF00111', 2, 60, '2023-12-27', NULL, 80, 'CancelRefund', NULL, '2023-12-27 10:05:06', '2023-12-27 10:05:06'),
(3, 'BK0REF00112', 4, 61, '2023-12-27', 100, NULL, 'BookingCharge', NULL, '2023-12-27 10:06:49', '2023-12-27 10:06:49'),
(4, 'REFREF00112', 4, 61, '2023-12-27', NULL, 100, 'CancelRefund', NULL, '2023-12-27 10:07:02', '2023-12-27 10:07:02'),
(5, 'BK0REF00113', 2, 62, '2023-12-29', 25, NULL, 'BookingCharge', NULL, '2023-12-29 05:45:28', '2023-12-29 05:45:28'),
(6, 'REFREF00113', 2, 62, '2023-12-29', NULL, 25, 'CancelRefund', NULL, '2023-12-29 05:56:56', '2023-12-29 05:56:56'),
(7, 'BK0REF00114', 2, 63, '2023-12-29', 15, NULL, 'BookingCharge', NULL, '2023-12-29 05:57:38', '2023-12-29 05:57:38'),
(8, 'REFREF00114', 2, 63, '2023-12-29', NULL, 15, 'CancelRefund', NULL, '2023-12-29 06:01:53', '2023-12-29 06:01:53'),
(9, 'BK0REF00115', 2, 64, '2023-12-29', 25, NULL, 'BookingCharge', NULL, '2023-12-29 06:03:13', '2023-12-29 06:03:13'),
(10, 'REFREF00115', 2, 64, '2023-12-29', NULL, 25, 'CancelRefund', NULL, '2023-12-29 06:10:24', '2023-12-29 06:10:24'),
(11, 'BK0REF00116', 2, 65, '2023-12-29', 5, NULL, 'BookingCharge', NULL, '2023-12-29 06:31:42', '2023-12-29 06:31:42'),
(12, 'REFREF00116', 2, 65, '2023-12-29', NULL, 5, 'CancelRefund', NULL, '2023-12-29 06:53:45', '2023-12-29 06:53:45'),
(13, 'BK0REF00117', 2, 66, '2023-12-29', 5, NULL, 'BookingCharge', NULL, '2023-12-29 06:57:24', '2023-12-29 06:57:24'),
(14, 'REFREF00117', 2, 66, '2023-12-29', NULL, 5, 'CancelRefund', NULL, '2023-12-29 06:57:58', '2023-12-29 06:57:58'),
(15, 'BK0REF00118', 2, 67, '2023-12-29', 20, NULL, 'BookingCharge', NULL, '2023-12-29 07:31:19', '2023-12-29 07:31:19'),
(16, 'BK0REF00119', 2, 68, '2024-01-01', 15, NULL, 'BookingCharge', NULL, '2024-01-01 03:00:24', '2024-01-01 03:00:24'),
(17, 'BK0REF00120', 2, 69, '2024-01-01', 15, NULL, 'BookingCharge', NULL, '2024-01-01 03:38:55', '2024-01-01 03:38:55'),
(18, 'BK0REF00121', 2, 70, '2024-01-01', 30, NULL, 'BookingCharge', NULL, '2024-01-01 04:48:03', '2024-01-01 04:48:03'),
(19, 'BK0REF00122', 2, 71, '2024-01-01', 20, NULL, 'BookingCharge', NULL, '2024-01-01 04:57:30', '2024-01-01 04:57:30'),
(24, 'BK0REF00123', 2, 72, '2024-01-01', 20, NULL, 'BookingCharge', NULL, '2024-01-01 05:24:23', '2024-01-01 05:24:23'),
(25, 'BK0REF00124', 2, 73, '2024-01-01', 15, NULL, 'BookingCharge', NULL, '2024-01-01 05:45:20', '2024-01-01 05:45:20'),
(26, 'ExCREF00124', 2, 73, '2024-01-01', 50, NULL, 'KeyExtraCharge', NULL, '2024-01-01 05:46:53', '2024-01-01 05:46:53');

-- --------------------------------------------------------

--
-- Table structure for table `payments_histories`
--

CREATE TABLE `payments_histories` (
  `id` bigint UNSIGNED NOT NULL,
  `receipt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_by` bigint UNSIGNED NOT NULL,
  `created_by_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments_histories`
--

INSERT INTO `payments_histories` (`id`, `receipt`, `amount`, `payment_method`, `user_id`, `created_by`, `created_by_name`, `created_at`, `updated_at`) VALUES
(2, 'RCPTSS1', 100, 'cash', 2, 3, 'Admin', '2023-12-12 08:39:07', '2023-12-12 08:39:07'),
(3, 'RCPTSS2', 500, 'cash', 4, 3, 'Admin', '2023-12-12 08:39:17', '2023-12-12 08:39:17'),
(4, 'RCPTSS3', 600, 'cash', 2, 3, 'Admin', '2023-12-12 08:40:49', '2023-12-12 08:40:49'),
(5, 'RCPTSS4', 900, 'cash', 4, 3, 'Admin', '2023-12-12 08:41:43', '2023-12-12 08:41:43'),
(6, 'RCPTSS5', 600, 'cash', 2, 3, 'Admin', '2023-12-12 08:44:27', '2023-12-12 08:44:27'),
(7, 'SSRCP6', 200, 'cash', 2, 3, 'Admin', '2023-12-12 08:45:36', '2023-12-12 08:45:36'),
(8, 'SSRCP7', 1000, 'cash', 4, 3, 'Admin', '2023-12-14 07:03:38', '2023-12-14 07:03:38'),
(9, 'SSRCP8', 200, 'cash', 2, 3, 'Admin', '2023-12-29 07:42:07', '2023-12-29 07:42:07');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` bigint UNSIGNED NOT NULL,
  `permission_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint UNSIGNED NOT NULL,
  `module_permission_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `module_permission_id`, `name`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin', NULL, NULL),
(2, NULL, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL DEFAULT '2',
  `fname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` double DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_disabled` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `fname`, `lname`, `faculty`, `regno`, `credit`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `is_disabled`) VALUES
(2, 2, 'Sachin', 'Rathnayake', 'Faculty of Applied Science', '2020/SCE/90', 195, 'sachinprabhashan.edu@gmail.com', 760300001, NULL, '$2y$12$LJcrc8cf1BmxXo3RMx7MSOxetljFEuFqSo.goI0r80Tix1Crapv4K', NULL, '2023-12-04 05:36:31', '2024-01-01 05:46:53', 0),
(3, 1, 'Admin', 'Sachin', 'Faculty of Technological Studies', '-', NULL, 'securespot@mail.lk', 760300001, NULL, '$2y$12$tz1Fn0zSTIjOuz8jDwc.8.fW88Sy..AdWpVfQ65jXEv7V4gJE27bq', 'L24y1gSNHCJa00Cap3i65XrLS3RbYRff6QOP4yWxJk2WW8SmM95ioIwR8sNS', '2023-12-04 05:36:59', '2023-12-04 05:36:59', 0),
(4, 2, 'Sahan', 'Udantha', 'Faculty of Business Studies', '2027/ACC/90', 2400, 'asas@d.v', 760300022, NULL, '$2y$12$z3SvxuTRKJBZmlG.1AAUteRY/f1iDo2wW0kl.OqXnhD8ZWGuZE/Uy', NULL, '2023-12-04 08:03:09', '2023-12-29 08:19:59', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_locker_id_foreign` (`locker_id`);

--
-- Indexes for table `booking_histories`
--
ALTER TABLE `booking_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_histories_user_id_foreign` (`user_id`),
  ADD KEY `booking_histories_locker_id_foreign` (`locker_id`),
  ADD KEY `booking_histories_bookings_id_foreign` (`bookings_id`);

--
-- Indexes for table `booking_reviews`
--
ALTER TABLE `booking_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `booking_reviews_locker_id_foreign` (`locker_id`),
  ADD KEY `booking_reviews_user_id_foreign` (`user_id`),
  ADD KEY `booking_reviews_bookings_id_foreign` (`bookings_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `event_log`
--
ALTER TABLE `event_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_log_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lockers`
--
ALTER TABLE `lockers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lockers_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `lockers_settings`
--
ALTER TABLE `lockers_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_permission`
--
ALTER TABLE `module_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_permission_module_id_foreign` (`module_id`),
  ADD KEY `module_permission_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `operation_date`
--
ALTER TABLE `operation_date`
  ADD PRIMARY KEY (`id`),
  ADD KEY `operation_date_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments_bookings`
--
ALTER TABLE `payments_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_bookings_user_id_foreign` (`user_id`),
  ADD KEY `payments_bookings_booking_his_id_foreign` (`booking_his_id`);

--
-- Indexes for table `payments_histories`
--
ALTER TABLE `payments_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_histories_user_id_foreign` (`user_id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_module_permission_id_foreign` (`module_permission_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `booking_histories`
--
ALTER TABLE `booking_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `booking_reviews`
--
ALTER TABLE `booking_reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `event_log`
--
ALTER TABLE `event_log`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lockers`
--
ALTER TABLE `lockers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lockers_settings`
--
ALTER TABLE `lockers_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module_permission`
--
ALTER TABLE `module_permission`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operation_date`
--
ALTER TABLE `operation_date`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments_bookings`
--
ALTER TABLE `payments_bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `payments_histories`
--
ALTER TABLE `payments_histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_locker_id_foreign` FOREIGN KEY (`locker_id`) REFERENCES `lockers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `booking_histories`
--
ALTER TABLE `booking_histories`
  ADD CONSTRAINT `booking_histories_locker_id_foreign` FOREIGN KEY (`locker_id`) REFERENCES `lockers` (`id`),
  ADD CONSTRAINT `booking_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `booking_reviews`
--
ALTER TABLE `booking_reviews`
  ADD CONSTRAINT `booking_reviews_bookings_id_foreign` FOREIGN KEY (`bookings_id`) REFERENCES `booking_histories` (`id`),
  ADD CONSTRAINT `booking_reviews_locker_id_foreign` FOREIGN KEY (`locker_id`) REFERENCES `lockers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `event_log`
--
ALTER TABLE `event_log`
  ADD CONSTRAINT `event_log_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `lockers`
--
ALTER TABLE `lockers`
  ADD CONSTRAINT `lockers_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);

--
-- Constraints for table `module_permission`
--
ALTER TABLE `module_permission`
  ADD CONSTRAINT `module_permission_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `module` (`id`),
  ADD CONSTRAINT `module_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`id`);

--
-- Constraints for table `operation_date`
--
ALTER TABLE `operation_date`
  ADD CONSTRAINT `operation_date_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`);

--
-- Constraints for table `payments_bookings`
--
ALTER TABLE `payments_bookings`
  ADD CONSTRAINT `payments_bookings_booking_his_id_foreign` FOREIGN KEY (`booking_his_id`) REFERENCES `booking_histories` (`id`),
  ADD CONSTRAINT `payments_bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payments_histories`
--
ALTER TABLE `payments_histories`
  ADD CONSTRAINT `payments_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role`
--
ALTER TABLE `role`
  ADD CONSTRAINT `role_module_permission_id_foreign` FOREIGN KEY (`module_permission_id`) REFERENCES `module_permission` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
