-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 29, 2017 at 12:37 PM
-- Server version: 5.6.30-1
-- PHP Version: 7.0.20-2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital` int(11) NOT NULL,
  `care` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`id`, `type`, `number`, `hospital`, `care`, `created_at`, `updated_at`) VALUES
(1, 'empty', '12', 3, 1, '2017-02-28 02:29:05', '2017-02-28 02:29:05'),
(3, 'empty', '13', 3, 1, '2017-02-28 07:13:10', '2017-02-28 09:34:30'),
(4, 'full', '5', 3, 1, '2017-02-28 07:16:25', '2017-02-28 08:45:00'),
(5, 'full', '55', 1, 4, '2017-02-28 08:33:42', '2017-02-28 09:41:25'),
(6, 'empty', '1', 6, 5, '2017-03-04 07:11:07', '2017-03-10 19:18:03'),
(7, 'full', '22', 6, 5, '2017-03-04 07:21:49', '2017-03-10 19:11:13'),
(8, 'empty', '21', 6, 5, '2017-03-04 07:22:12', '2017-03-04 07:22:12'),
(10, 'empty', '1', 6, 6, '2017-03-04 07:23:20', '2017-03-04 07:23:20'),
(11, 'empty', '6', 6, 6, '2017-03-04 07:23:35', '2017-03-04 07:23:35'),
(12, 'empty', '2', 6, 7, '2017-03-04 07:23:48', '2017-03-04 07:23:48'),
(13, 'full', '9', 6, 7, '2017-03-04 07:23:59', '2017-03-04 07:25:25'),
(14, 'empty', '9', 6, 7, '2017-03-04 07:24:00', '2017-03-04 07:24:00'),
(15, 'empty', '19', 6, 6, '2017-03-04 07:24:48', '2017-03-04 07:24:48'),
(16, 'empty', '1', 7, 9, '2017-03-09 07:46:29', '2017-03-09 07:48:24'),
(17, 'full', '1', 9, 10, '2017-03-10 09:10:38', '2017-03-10 20:16:20'),
(18, 'empty', '2', 9, 10, '2017-03-10 09:11:36', '2017-03-10 09:15:59'),
(19, 'empty', '3', 9, 10, '2017-03-10 09:11:57', '2017-03-10 09:16:14'),
(20, 'full', '4', 9, 10, '2017-03-10 09:13:11', '2017-03-10 20:17:42'),
(21, 'empty', '5', 9, 10, '2017-03-10 09:13:37', '2017-03-10 09:16:35'),
(22, 'empty', '6', 9, 10, '2017-03-10 09:13:49', '2017-03-10 09:16:47'),
(23, 'full', '7', 9, 10, '2017-03-10 09:14:01', '2017-03-10 20:16:51'),
(24, 'empty', '8', 9, 10, '2017-03-10 09:14:32', '2017-03-10 09:18:05'),
(25, 'empty', '1', 9, 11, '2017-03-10 09:19:00', '2017-03-10 09:19:00'),
(26, 'full', '2', 9, 11, '2017-03-10 09:19:12', '2017-03-10 20:23:40'),
(27, 'full', '3', 9, 11, '2017-03-10 09:19:47', '2017-03-10 20:24:35'),
(28, 'empty', '4', 9, 11, '2017-03-10 09:19:59', '2017-03-10 09:19:59'),
(29, 'empty', '5', 9, 11, '2017-03-10 09:20:09', '2017-03-10 09:20:09'),
(30, 'empty', '6', 9, 11, '2017-03-10 09:20:23', '2017-03-10 09:20:23'),
(31, 'empty', '7', 9, 11, '2017-03-10 09:21:01', '2017-03-10 09:21:01'),
(32, 'empty', '8', 9, 11, '2017-03-10 09:21:11', '2017-03-10 09:21:11'),
(33, 'empty', '1', 9, 12, '2017-03-10 09:22:12', '2017-03-10 09:22:12'),
(34, 'empty', '2', 9, 12, '2017-03-10 09:22:23', '2017-03-10 09:22:23'),
(35, 'empty', '3', 9, 12, '2017-03-10 09:22:32', '2017-03-10 09:22:32'),
(36, 'full', '4', 9, 12, '2017-03-10 09:23:04', '2017-03-10 20:25:29'),
(37, 'full', '5', 9, 12, '2017-03-10 09:23:16', '2017-03-10 20:26:30'),
(38, 'empty', '6', 9, 12, '2017-03-10 09:23:40', '2017-03-10 09:23:40'),
(39, 'empty', '1', 9, 13, '2017-03-10 09:24:58', '2017-03-10 09:24:58'),
(40, 'empty', '2', 9, 13, '2017-03-10 09:26:54', '2017-03-10 09:31:38'),
(41, 'full', '3', 9, 13, '2017-03-10 09:27:06', '2017-03-10 20:27:06'),
(42, 'empty', '4', 9, 13, '2017-03-10 09:27:30', '2017-03-10 09:31:10'),
(43, 'full', '1', 9, 14, '2017-03-10 09:31:54', '2017-03-10 20:28:13'),
(44, 'empty', '1', 9, 15, '2017-03-10 09:33:35', '2017-03-10 09:33:35'),
(45, 'full', '2', 9, 15, '2017-03-10 09:34:15', '2017-03-10 20:19:19'),
(46, 'full', '2', 9, 14, '2017-03-10 09:35:01', '2017-03-10 20:28:43'),
(47, 'empty', '3', 9, 14, '2017-03-10 09:35:22', '2017-03-10 09:35:22'),
(48, 'full', '4', 9, 14, '2017-03-10 09:35:35', '2017-03-10 20:29:23'),
(49, 'empty', '5', 9, 14, '2017-03-10 09:35:48', '2017-03-10 09:35:48'),
(50, 'full', '1', 8, 16, '2017-03-10 09:57:12', '2017-03-10 20:31:18'),
(51, 'empty', '2', 8, 16, '2017-03-10 09:57:37', '2017-03-10 09:57:37'),
(52, 'full', '3', 8, 16, '2017-03-10 09:57:59', '2017-03-10 20:31:49'),
(53, 'empty', '4', 8, 16, '2017-03-10 10:02:03', '2017-03-10 10:02:32'),
(54, 'empty', '5', 8, 16, '2017-03-10 10:02:55', '2017-03-10 10:02:55'),
(55, 'empty', '1', 8, 17, '2017-03-10 10:03:20', '2017-03-10 10:03:20'),
(56, 'empty', '2', 8, 17, '2017-03-10 10:03:41', '2017-03-10 10:03:41'),
(57, 'full', '3', 8, 17, '2017-03-10 10:04:01', '2017-03-10 20:32:43'),
(58, 'empty', '4', 8, 17, '2017-03-10 10:04:28', '2017-03-10 10:04:28'),
(59, 'full', '1', 8, 18, '2017-03-10 10:04:47', '2017-03-10 20:33:35'),
(60, 'empty', '2', 8, 18, '2017-03-10 10:06:31', '2017-03-10 10:06:31'),
(61, 'empty', '3', 8, 18, '2017-03-10 10:06:55', '2017-03-10 10:06:55'),
(62, 'full', '4', 8, 18, '2017-03-10 10:07:14', '2017-03-10 20:34:14'),
(63, 'empty', '5', 8, 18, '2017-03-10 10:07:25', '2017-03-10 10:07:25'),
(64, 'empty', '1', 10, 19, '2017-03-25 20:37:23', '2017-03-25 20:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `care`
--

CREATE TABLE `care` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `care`
--

INSERT INTO `care` (`id`, `name`, `hospital`, `created_at`, `updated_at`) VALUES
(1, 'مخ و اعصاب', 3, '2017-02-26 07:34:45', '2017-02-26 07:34:45'),
(3, 'مخ و اعصاب', 4, '2017-02-27 10:18:04', '2017-02-27 10:18:36'),
(4, 'قلب', 1, '2017-02-28 08:33:04', '2017-02-28 08:33:04'),
(5, 'عناية رقم 1', 6, '2017-03-04 06:42:29', '2017-03-04 06:42:29'),
(6, 'عناية رقم 2', 6, '2017-03-04 06:42:38', '2017-03-04 06:42:38'),
(7, 'عناية رقم 3', 6, '2017-03-04 06:42:45', '2017-03-04 06:42:45'),
(8, 'عناية فاضية', 7, '2017-03-09 07:46:03', '2017-03-09 07:46:03'),
(9, 'عناية بسراير', 7, '2017-03-09 07:46:13', '2017-03-09 07:46:13'),
(10, 'عناية التخدير', 9, '2017-03-10 09:07:12', '2017-03-10 09:08:00'),
(11, 'عناية الصدر (1)', 9, '2017-03-10 09:08:27', '2017-03-10 09:08:27'),
(12, 'عناية الصدر (2)', 9, '2017-03-10 09:08:40', '2017-03-10 09:08:40'),
(13, 'عناية القلب والصدر', 9, '2017-03-10 09:09:01', '2017-03-10 09:09:01'),
(14, 'عناية المخ والأعصاب', 9, '2017-03-10 09:09:28', '2017-03-10 09:09:28'),
(15, 'عناية الباطنة', 9, '2017-03-10 09:09:56', '2017-03-10 09:09:56'),
(16, 'عناية الجراحة بالنقاهة (1)', 8, '2017-03-10 09:55:24', '2017-03-10 09:55:24'),
(17, 'عناية الجراحة بالنقاهة (2)', 8, '2017-03-10 09:56:21', '2017-03-10 09:56:21'),
(18, 'عناية الأعصاب بالنقاهة', 8, '2017-03-10 09:56:46', '2017-03-10 09:56:46'),
(19, 'مخ و اعصاب', 10, '2017-03-25 20:35:59', '2017-03-25 20:35:59'),
(20, 'قلب', 10, '2017-03-25 20:36:12', '2017-03-25 20:36:12'),
(21, 'عظام', 10, '2017-03-25 20:36:35', '2017-03-25 20:36:35'),
(22, 'dgdf', 1, '2017-05-13 13:39:26', '2017-05-13 13:39:51'),
(23, 'sfdfdfsd', 11, '2017-05-13 13:40:22', '2017-05-13 13:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `percent` double(8,2) NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hall_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ext` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `named` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedid` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filename`, `path`, `ext`, `named`, `type`, `linkedid`, `created_at`, `updated_at`) VALUES
(1, '1011487923731.jpg', 'uploads/logo/3/', 'jpg', '16934154_1184566651641108_1973676577_n.jpg', 'logo', 3, '2017-02-24 06:08:51', '2017-02-24 06:08:51'),
(2, '59091488101455.jpg', 'uploads/logo/1/', 'jpg', '16681533_1123420081100727_6747953663966087411_n.jpg', 'logo', 1, '2017-02-26 07:30:55', '2017-02-26 07:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `halls`
--

CREATE TABLE `halls` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_en` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lng` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacts` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `byChair` tinyint(1) NOT NULL,
  `chairs` int(11) NOT NULL,
  `vip` tinyint(1) NOT NULL,
  `city_id` int(11) NOT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_07_23_142521_create_roles_table', 2),
('2017_07_23_142710_create_permissions_table', 2),
('2017_07_23_143121_create_categories_table', 2),
('2017_07_23_143713_create_halls_table', 2),
('2017_07_23_145241_create_prices_table', 2),
('2017_07_23_150557_create_discounts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nat_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hospital` int(11) NOT NULL,
  `care` int(11) NOT NULL,
  `bed` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `nat_id`, `hospital`, `care`, `bed`, `created_at`, `updated_at`) VALUES
(2, 'محمد عبدالرحمن شمس محمد', '12435656', 0, 4, 5, '2017-02-28 09:41:25', '2017-02-28 10:10:29'),
(4, 'ام المصريين', '564646', 0, 7, 13, '2017-03-04 07:25:25', '2017-03-04 07:25:25'),
(5, 'ahmed', '012345', 6, 5, 7, '2017-03-10 19:11:13', '2017-03-10 19:11:13'),
(7, 'ali', '222', 6, 5, 9, '2017-03-10 19:19:43', '2017-03-10 19:19:43'),
(8, 'ola', '3333', 6, 5, 9, '2017-03-10 19:20:19', '2017-03-10 19:20:19'),
(9, 'ahmed1', '123', 9, 10, 17, '2017-03-10 20:16:20', '2017-03-10 20:16:20'),
(10, 'ahmed2', '1234', 9, 10, 23, '2017-03-10 20:16:51', '2017-03-10 20:16:51'),
(11, 'ahmed3', '12345', 9, 10, 20, '2017-03-10 20:17:42', '2017-03-10 20:17:42'),
(12, 'ahmed11', '1123', 9, 15, 45, '2017-03-10 20:19:19', '2017-03-10 20:19:19'),
(13, 'Ahmed Ali', '112233', 9, 11, 26, '2017-03-10 20:23:40', '2017-03-10 20:23:40'),
(14, 'Ahmed Ali 2', '1122334455', 9, 11, 27, '2017-03-10 20:24:35', '2017-03-10 20:24:35'),
(15, 'Ali Ahmed', '22114433', 9, 12, 36, '2017-03-10 20:25:29', '2017-03-10 20:25:29'),
(16, 'Ali Ahmed 22', '22334411', 9, 12, 37, '2017-03-10 20:26:30', '2017-03-10 20:26:30'),
(17, 'Mohammed Ali', '552244', 9, 13, 41, '2017-03-10 20:27:06', '2017-03-10 20:27:06'),
(18, 'Mohammed Ali22', '551142', 9, 14, 43, '2017-03-10 20:28:13', '2017-03-10 20:28:13'),
(19, 'Ahmed Mohammed', '634521', 9, 14, 46, '2017-03-10 20:28:43', '2017-03-10 20:28:43'),
(20, 'Ahmed Mohammed123', '3221155', 9, 14, 48, '2017-03-10 20:29:23', '2017-03-10 20:29:23'),
(21, 'احمد محمد ', '13578', 8, 16, 50, '2017-03-10 20:31:18', '2017-03-10 20:31:18'),
(22, 'احمد محمد12', '127733', 8, 16, 52, '2017-03-10 20:31:49', '2017-03-10 20:31:49'),
(23, 'احمد محمود', '62435', 8, 17, 57, '2017-03-10 20:32:43', '2017-03-10 20:32:43'),
(24, 'محمد محمود1', '662244', 8, 18, 59, '2017-03-10 20:33:35', '2017-03-10 20:33:35'),
(25, 'محمد محمود2', '33114422', 8, 18, 62, '2017-03-10 20:34:14', '2017-03-10 20:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `hospital` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone`, `address`, `type`, `hospital`, `filename`, `path`, `password`, `pass`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mohamed Shams', 'm_shams', '010000000000', 'address', 1, 0, '', '', '$2y$10$f2tWJqQH6uZwCVSkkWRt..11sovf0PkIDU1.5xpFNCikHmWv1EJBy', '123456789', 'HRNn3ScO99J60zFdFPwTAkka6BeVHEA6CibqlNqAHaAufDbV1CgNjOCICYW9', '2017-02-23 04:01:06', '2017-05-30 06:42:27'),
(5, 'احمد عبدالرحمن شمس', 'a_shams', '01094985095', 'عنوانjhhh', 2, 3, '', '', '$2y$10$1pTBUiHHv74CgJcKmb2zDO9eYK5FQLNww.jQlWluCnf3UfwjLToFC', '123456', NULL, '2017-02-28 15:06:27', '2017-02-28 15:08:52'),
(10, 'mohamed', 'mohamed', '', '', 0, 0, '', '', '$2y$10$cDWw2QmzFX9kX8w1h8k8c.asJwg1FOYeljAYbF/4zFvcmdcvnduQO', '123456', 'ekM19MZMPOJoVr3Njvwh2bfOJx69ygZ6QCHkovuj5LcjyZMCEPpdajLBneg3', '2017-03-21 16:51:25', '2017-03-25 20:35:12'),
(11, 'hospital', 'h_user', '010000000000', 'address', 0, 0, '', '', '$2y$10$sa24eMl9L/6X2m8eMNsIRuQbi4ZnRdf.kPNIKxyMLROW0RwmK2rcK', '123456789', NULL, '2017-05-12 15:44:37', '2017-05-12 15:44:37'),
(12, 'test', 'test', '010000', 'test', 0, 0, '95291496133726.jpg', 'uploads/logo/', '$2y$10$mI4qWeBPKuPIj0419JGW...cmgvrwBZh0q.WZo.rorRZXZEZzpVBq', '123456', NULL, '2017-05-30 06:42:06', '2017-05-30 06:42:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `care`
--
ALTER TABLE `care`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halls`
--
ALTER TABLE `halls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `care`
--
ALTER TABLE `care`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `halls`
--
ALTER TABLE `halls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
