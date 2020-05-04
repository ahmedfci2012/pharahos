-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 05, 2020 at 12:38 AM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elfara3na`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `transport` double DEFAULT NULL,
  `total_bill_price` double DEFAULT NULL,
  `payments` double DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `transport`, `total_bill_price`, `payments`, `created_at`, `updated_at`, `customer_id`) VALUES
(12, 10, 110, 560, '2019-09-14 09:39:05', '2019-09-18 13:26:38', 2),
(13, 10, 110, 0, '2019-09-14 09:39:44', '2019-09-14 09:39:44', 2),
(14, 10, 110, 0, '2019-09-14 09:42:27', '2019-09-14 09:42:27', 2),
(15, 0, 100, 0, '2019-09-14 10:08:06', '2019-09-14 10:08:06', 2),
(16, 0, 100, 0, '2019-09-14 10:20:31', '2019-09-14 10:20:31', 2),
(17, 0, 100, 0, '2019-09-14 10:20:31', '2019-09-14 10:20:31', 2),
(18, 0, 100, 0, '2019-09-18 13:49:07', '2019-09-18 13:49:07', 7),
(19, 0, 50, 0, '2019-09-18 14:07:59', '2019-09-18 14:07:59', 8),
(20, 10, 30, 0, '2019-09-18 14:13:37', '2019-09-18 14:13:37', 8),
(21, 10, 30, 0, '2019-09-18 14:32:43', '2019-09-18 14:32:43', 2),
(22, 10, 30, 0, '2019-09-18 14:34:15', '2019-09-18 14:34:16', 9),
(23, 20, 70, 0, '2019-09-18 14:34:58', '2019-09-18 14:34:58', 9),
(26, 0, 10, 0, '2019-09-18 14:58:13', '2019-09-18 14:58:13', 2),
(28, 10, 20, 0, '2019-09-18 15:18:23', '2019-09-18 15:18:23', 12),
(29, 10, 20, 0, '2019-09-18 15:25:28', '2019-09-18 15:25:28', 12),
(30, 10, 20, 0, '2019-09-18 15:32:17', '2019-09-18 15:32:17', 2),
(31, 10, 20, 0, '2019-09-18 15:32:42', '2019-09-18 15:32:42', 12),
(32, 40, 50, 0, '2019-09-18 15:38:52', '2019-09-18 15:38:52', 12);

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `num` varchar(20) NOT NULL,
  `quantity` double NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`id`, `section_id`, `name`, `num`, `quantity`, `updated_at`, `created_at`) VALUES
(6, 1, 'دلفة جرار سنجل', '5555', 96, '2019-07-27 17:29:58', '2019-07-27 17:29:58'),
(7, 1, 'دلفة جرار دبل ', '6666', 99, '2019-07-27 17:30:20', '2019-07-27 17:30:20'),
(8, 1, 'سلك نصف مقبض', '6667', 96.5, '2019-07-27 17:30:54', '2019-07-27 17:30:54'),
(9, 1, 'سكينة', '1235', 97, '2019-07-27 17:31:11', '2019-07-27 17:31:11'),
(10, 1, '1 نق', '4564', 18, '2019-07-27 17:31:36', '2019-07-27 17:31:36'),
(11, 18, 'مكون الاول ', '1', 30.5, '2019-07-27 17:35:58', '2019-07-27 17:35:58'),
(12, 18, 'المكون الثاني', '2', 47.5, '2019-07-27 17:36:10', '2019-07-27 17:36:10'),
(13, 18, 'نتنتناتلت', '456', 84.5, '2019-07-27 17:40:29', '2019-07-27 17:40:29'),
(17, 18, 'سلك نحاس', '4545', 2, '2019-07-27 20:11:42', '2019-07-27 20:11:42'),
(18, 22, 'حلق مفصلي بدون بار', '1453', 48, '2019-07-29 16:07:05', '2019-07-29 16:07:05'),
(19, 22, 'اتاتتافقبفقف', '7889', 3.5, '2019-07-29 16:11:15', '2019-07-29 16:11:15'),
(20, 22, 'محمد', '7441', 94, '2019-07-29 16:15:49', '2019-07-29 16:15:49'),
(21, 18, 'الاضافة الجديد', '120', 44, '2019-08-22 13:47:26', '2019-08-22 13:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `payment` double NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(15) DEFAULT NULL,
  `address` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `payment`, `created_at`, `updated_at`, `phone`, `address`) VALUES
(2, 'اتتاتنا', -200, '2019-08-29 10:06:14', '2019-09-18 15:32:17', 'ااااااااااااااا', 'اتاتاتلتالات'),
(4, 'hjhjhjkhjk', 0, '2019-08-29 10:12:15', '2019-09-07 11:41:32', '87897 ', '54654'),
(7, 'hghjgjh 0', -100, '2019-08-29 10:29:42', '2019-09-18 13:50:11', '01223568565', '79878 منتنتنمتنم 345456 '),
(8, 'said', -30, '2019-09-18 14:07:13', '2019-09-18 14:13:37', '011276666', '123132'),
(9, 'اسماء', -30, '2019-09-18 14:32:07', '2019-09-18 14:34:58', '0', '12132'),
(12, 'ggg', 0, '2019-09-18 15:17:58', '2019-09-18 15:38:52', '10', '10'),
(13, 'مصطفي عبد العال', 0, '2020-05-04 19:07:44', '2020-05-04 19:07:44', '8899', 'تناتناتناتات');

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
('2019_07_31_172834_create_bills_table', 1);

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
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `num` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `num`, `created_at`, `updated_at`, `quantity`) VALUES
(1, 'حلق جرار بار و سلك ps  صغير', '1235', '2019-07-26 18:24:36', '2019-07-26 18:24:36', 10),
(18, 'احمد سعيد وكريم السيد ', '4596', '2019-07-27 17:35:28', '2019-07-27 17:35:28', 100),
(22, 'السعد', '-----', '2019-07-29 16:06:25', '2019-07-29 16:06:25', 1),
(24, 'hhhhhhh', '', '2019-08-20 14:02:45', '2019-08-20 14:02:45', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_bills`
--

CREATE TABLE `sub_bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` decimal(8,2) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `total_price` decimal(8,2) DEFAULT NULL,
  `quantity` double NOT NULL,
  `sub_id` int(10) UNSIGNED NOT NULL,
  `bill_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_bills`
--

INSERT INTO `sub_bills` (`id`, `color`, `weight`, `price`, `total_price`, `quantity`, `sub_id`, `bill_id`, `created_at`, `updated_at`, `section_id`) VALUES
(16, '10', '10.00', '10.00', '100.00', 1, 13, 12, '2019-09-14 09:39:05', '2019-09-14 09:39:05', 18),
(17, '10', '10.00', '10.00', '100.00', 1, 21, 13, '2019-09-14 09:39:44', '2019-09-14 09:39:44', 18),
(18, '10', '10.00', '10.00', '100.00', 1, 12, 14, '2019-09-14 09:42:27', '2019-09-14 09:42:27', 18),
(19, '1', '10.00', '10.00', '100.00', 1, 17, 15, '2019-09-14 10:08:06', '2019-09-14 10:08:06', 18),
(20, '10', '10.00', '10.00', '100.00', 1, 12, 16, '2019-09-14 10:20:31', '2019-09-14 10:20:31', 18),
(21, '10', '10.00', '10.00', '100.00', 1, 12, 17, '2019-09-14 10:20:31', '2019-09-14 10:20:31', 18),
(22, '10', '10.00', '10.00', '100.00', 1, 12, 18, '2019-09-18 13:49:07', '2019-09-18 13:49:07', 18),
(23, '1001', '10.00', '5.00', '50.00', 1, 17, 19, '2019-09-18 14:07:59', '2019-09-18 14:07:59', 18),
(24, '10', '10.00', '2.00', '20.00', 1, 13, 20, '2019-09-18 14:13:37', '2019-09-18 14:13:37', 18),
(25, '10', '10.00', '2.00', '20.00', 1, 12, 21, '2019-09-18 14:32:43', '2019-09-18 14:32:43', 18),
(26, '10', '10.00', '2.00', '20.00', 1, 12, 22, '2019-09-18 14:34:15', '2019-09-18 14:34:15', 18),
(27, '10', '5.00', '10.00', '50.00', 1, 12, 23, '2019-09-18 14:34:58', '2019-09-18 14:34:58', 18),
(33, '10', '10.00', '1.00', '10.00', 1, 13, 26, '2019-09-18 14:58:13', '2019-09-18 14:58:13', 18),
(35, '10', '1.00', '10.00', '10.00', 1, 12, 28, '2019-09-18 15:18:23', '2019-09-18 15:18:23', 18),
(36, '10', '10.00', '1.00', '10.00', 1, 17, 29, '2019-09-18 15:25:28', '2019-09-18 15:25:28', 18),
(37, '10', '10.00', '1.00', '10.00', 1, 6, 30, '2019-09-18 15:32:17', '2019-09-18 15:32:17', 1),
(38, '1', '10.00', '1.00', '10.00', 1, 7, 31, '2019-09-18 15:32:42', '2019-09-18 15:32:42', 1),
(39, '10', '1.00', '10.00', '10.00', 1, 12, 32, '2019-09-18 15:38:52', '2019-09-18 15:38:52', 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `remember_token` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`, `remember_token`) VALUES
(1, 'karim el sayed', 'karim@gmail.com', '20120027', NULL, NULL, NULL),
(2, 'gjhgh', 'a@a.com', '$2y$10$Xi9GWUEsdz6ha', '2019-07-26 14:07:17', '2019-07-26 14:07:17', NULL),
(3, 'sss', 'ed.said@gmail.com', '$2y$10$yJ7rvgnaF.f7f', '2019-07-26 14:09:32', '2019-07-26 14:09:27', 'NRqATvfvNjlOUT7hTGaddCnH1nU0K49gVhCEG6ynd5LSOYavwuoEj5Nerjp7'),
(4, 'Ahmed', 'b@b.com', '$2y$10$eYum7Ov5zKI.jWADsVgGLO182JgBmU3hJpObIeuwJ3/UI5kMYbbTC', '2019-07-26 14:20:31', '2019-07-26 14:16:24', 'RS7AadMVs8RMw7M3DukRv2mTBvWnx8YqE2mkHRmrljyBLekbNVlzEoYnDhZr'),
(5, 'Ahmed', 'ahmed.said@gmail.com', '$2y$10$04Cqm4TUPnyUcFJestdk0u/PA7wmrZnwZqUenaPw4EdE07Vg8B8LO', '2020-05-04 19:22:53', '2019-07-26 14:56:04', 'S47H8h7CQPa61og1YdLuJBCkO2qahsYK1BGmgDu8zSuujlHjfzUPvr6mLVbn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `num` (`num`);

--
-- Indexes for table `sub_bills`
--
ALTER TABLE `sub_bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_id` (`bill_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `sub_bills`
--
ALTER TABLE `sub_bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `components`
--
ALTER TABLE `components`
  ADD CONSTRAINT `components_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_bills`
--
ALTER TABLE `sub_bills`
  ADD CONSTRAINT `sub_bills_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bills` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
