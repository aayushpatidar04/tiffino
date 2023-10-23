-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 10:28 AM
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
-- Database: `tiffino`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `home_address` longtext NOT NULL DEFAULT '',
  `work_address` longtext NOT NULL DEFAULT '',
  `other_address_1` longtext NOT NULL DEFAULT '',
  `other_address_2` longtext NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `user_email`, `home_address`, `work_address`, `other_address_1`, `other_address_2`, `created_at`, `updated_at`) VALUES
(1, 4, 'qwerty@gmail.com', 'ytrew', 'pppppp', 'qqqqqqq', 'rrrrrr', '2023-10-19 04:24:59', '2023-10-21 07:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_image` varchar(255) NOT NULL,
  `food_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `user_email`, `food_id`, `quantity`, `price`, `total`, `created_at`, `updated_at`, `food_name`, `food_image`, `food_type`) VALUES
(4, 1, 'paliwaladitya2@gmail.com', 2, 1, 30, 30, '2023-10-23 02:42:30', '2023-10-23 02:42:30', 'Poha Poha', '1690287734.jfif', 'food'),
(5, 1, 'paliwaladitya2@gmail.com', 3, 1, 32, 32, '2023-10-23 02:42:34', '2023-10-23 02:42:34', 'Poha 2', '1690289595.jfif', 'food'),
(6, 4, 'qwerty@gmail.com', 1, 1, 150, 150, '2023-10-23 02:43:02', '2023-10-23 02:43:02', 'Margarita pizza', '1697623073.jpg', 'fastfood'),
(7, 4, 'qwerty@gmail.com', 1, 1, 150, 150, '2023-10-23 02:47:42', '2023-10-23 02:47:42', 'Margarita pizza', '1697623073.jpg', 'fastfood');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boys`
--

CREATE TABLE `delivery_boys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fastfood`
--

CREATE TABLE `fastfood` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fastfood`
--

INSERT INTO `fastfood` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pizza', '2023-10-18 04:12:42', '2023-10-19 07:11:27'),
(2, 'Burger', '2023-10-18 04:13:09', '2023-10-19 07:11:38'),
(3, 'Sandwich', '2023-10-19 05:33:08', '2023-10-19 05:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `fastfood_sub_category`
--

CREATE TABLE `fastfood_sub_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `fastfood_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fastfood_sub_category`
--

INSERT INTO `fastfood_sub_category` (`id`, `name`, `price`, `image`, `description`, `fastfood_id`, `created_at`, `updated_at`) VALUES
(1, 'Margarita pizza', '150', '1697623073.jpg', 'cheese loaded', 1, '2023-10-18 04:27:53', '2023-10-20 05:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `price`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Poha Poha', '30', '1690287734.jfif', 'Poha Poha Poha Poha', '2023-07-25 06:52:14', '2023-07-25 07:15:47'),
(3, 'Poha 2', '32', '1690289595.jfif', 'udhvnskhuv iseufhew du uifshs dfifsodv', '2023-07-25 07:23:15', '2023-07-25 07:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(6, '2023_07_25_112938_create_food_table', 2),
(7, '2023_07_26_110115_create_delivery_boys_table', 3),
(8, '2023_07_27_094537_create_carts_table', 4),
(9, '2023_09_08_121903_create_subscription_category_table', 5),
(10, '2023_09_08_123449_create_subscription_sub_category_table', 6),
(11, '2023_09_08_123853_create_subscription_products_table', 7),
(12, '2023_10_18_072010_create_fastfood_table', 8),
(13, '2023_10_18_072105_create_fastfood_sub_category_table', 8),
(14, '2023_10_19_035134_add_column_to_carts_table', 9),
(15, '2023_10_21_035355_remove_foreign_key_from_table_name', 10),
(16, '2023_10_21_035844_add_column_to_carts_table', 11),
(17, '2023_10_21_074719_add_column_to_carts_table', 12),
(18, '2023_10_23_035840_add_column_to_carts_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_category`
--

CREATE TABLE `subscription_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_category`
--

INSERT INTO `subscription_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Daily Tiffin', NULL, NULL),
(2, 'Make Your Own', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_products`
--

CREATE TABLE `subscription_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `subscription_category_id` bigint(20) UNSIGNED NOT NULL,
  `subscription_sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_products`
--

INSERT INTO `subscription_products` (`id`, `name`, `subscription_category_id`, `subscription_sub_category_id`, `price`, `description`, `image`, `rating`, `created_at`, `updated_at`) VALUES
(2, 'Testing 1', 1, 1, '1', 'testing', '1694600047.jpg', 0, '2023-09-13 04:44:07', '2023-09-13 04:44:07'),
(3, 'Testing 2', 1, 1, '2', 'testing', '1694600074.jfif', 0, '2023-09-13 04:44:34', '2023-09-13 04:44:34'),
(4, 'Testing 3', 1, 1, '3', 'testing', '1694600095.jfif', 0, '2023-09-13 04:44:55', '2023-09-13 04:44:55'),
(5, 'Testing 4', 1, 3, '4', 'testing', '1694600122.jfif', 0, '2023-09-13 04:45:22', '2023-09-13 04:45:22'),
(6, 'Testing 5', 1, 3, '5', 'testing', '1694600171.jfif', 0, '2023-09-13 04:46:11', '2023-09-13 04:46:11'),
(7, 'Testing 6', 1, 3, '6', 'testing', '1694600232.jfif', 0, '2023-09-13 04:47:12', '2023-09-13 04:47:12'),
(8, 'Testing 7', 1, 5, '7', 'testing', '1694600256.jfif', 0, '2023-09-13 04:47:36', '2023-09-13 04:47:36'),
(9, 'Testing 8', 1, 5, '8', 'testing', '1694600277.jfif', 0, '2023-09-13 04:47:57', '2023-09-13 04:47:57'),
(10, 'Testing 9', 1, 5, '9', 'testing', '1694600293.jfif', 0, '2023-09-13 04:48:13', '2023-09-13 04:48:13'),
(11, 'Testing 10', 1, 7, '10', 'testing', '1694600316.jfif', 0, '2023-09-13 04:48:36', '2023-09-13 04:48:36'),
(12, 'Testing 11', 1, 7, '11', 'testing', '1694600332.jfif', 0, '2023-09-13 04:48:52', '2023-09-13 04:48:52'),
(13, 'Testing 12', 1, 7, '12', 'testing', '1694600347.jfif', 0, '2023-09-13 04:49:07', '2023-09-13 04:49:07'),
(14, 'Testing 13', 2, 2, '13', 'testing', '1694600377.jfif', 0, '2023-09-13 04:49:37', '2023-09-13 04:49:37'),
(15, 'Testing 14', 2, 2, '14', 'testing', '1694600393.jfif', 0, '2023-09-13 04:49:53', '2023-09-13 04:49:53'),
(16, 'testing 15', 2, 2, '15', 'testing', '1694600415.jfif', 0, '2023-09-13 04:50:15', '2023-09-13 04:50:15'),
(17, 'testing 16', 2, 4, '16', 'testing', '1694600436.jfif', 0, '2023-09-13 04:50:36', '2023-09-13 04:50:36'),
(18, 'Testing 17', 2, 4, '17', 'testing', '1694600462.jfif', 0, '2023-09-13 04:51:02', '2023-09-13 04:51:02'),
(19, 'Testing 18', 2, 4, '18', 'testing', '1694600483.jfif', 0, '2023-09-13 04:51:23', '2023-09-13 04:51:23'),
(20, 'Testing 19', 2, 6, '19', 'testing', '1694600519.jfif', 0, '2023-09-13 04:51:59', '2023-09-13 04:51:59'),
(21, 'Testing 20', 2, 6, '20', 'testing', '1694600535.jfif', 0, '2023-09-13 04:52:15', '2023-09-13 04:52:15'),
(22, 'testing 21', 2, 6, '21', 'testing', '1694600550.jfif', 0, '2023-09-13 04:52:30', '2023-09-13 04:52:30'),
(23, 'testing 22', 2, 8, '22', 'testing', '1694600569.jfif', 0, '2023-09-13 04:52:50', '2023-09-13 04:52:50'),
(24, 'testing 23', 2, 8, '23', 'testing', '1694600607.jfif', 0, '2023-09-13 04:53:27', '2023-09-13 04:53:27'),
(25, 'testing 24', 2, 8, '24', 'testing', '1694600623.jfif', 0, '2023-09-13 04:53:43', '2023-09-13 04:53:43'),
(26, 'Breakfast1', 1, 1, '10', 'kha lo', '1697438995.jpg', 0, '2023-10-16 06:49:55', '2023-10-16 06:49:55'),
(27, 'dhairya', 1, 1, '500', 'ft', 'dtyju', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_sub_category`
--

CREATE TABLE `subscription_sub_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_sub_category`
--

INSERT INTO `subscription_sub_category` (`id`, `subscription_category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Breakfast', NULL, NULL),
(2, 2, 'Breakfast', NULL, NULL),
(3, 1, 'Lunch', NULL, NULL),
(4, 2, 'Lunch', NULL, NULL),
(5, 1, 'Dinner', NULL, NULL),
(6, 2, 'Dinner', NULL, NULL),
(7, 1, 'Special Thali', NULL, NULL),
(8, 2, 'Special Thali', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `api_token` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `api_token`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Aditya Paliwal', 'paliwaladitya2@gmail.com', NULL, '$2y$10$i6Yljbe6cOdHaixsVusZ6eVmS6E.x0tsnaBwMW23K4YcHC3QuisLO', NULL, '2023-07-24 05:31:39', '2023-07-24 05:31:58'),
(2, NULL, 'Aditya Paliwal 1', 'aditya@gmail.com', NULL, '$2y$10$nrs8DGPDsBS1RPFlW5DBSu8lV4RI/7qbWPsvCHDHgGPJmKQawugdq', NULL, '2023-07-24 05:45:50', '2023-07-24 05:45:50'),
(3, 'ad2IVW4DdmVKInN7kpqIBFk0z0BHeKbSS1yXKGxDN55IRAV5tvP8mzMnwp1k', 'qwe', 'qwe@gmail.com', NULL, '$2y$10$VYNaez4fDNvXpbtYKPPJ1Ox4zbH4hQkDtdiAaZz9g7Qfr9SrG00Qq', NULL, '2023-09-20 11:42:19', '2023-09-20 11:42:19'),
(4, 'wPEVJMpUYNZySoRdyftr98IVnOnA211jHe1YtgRSOynUPg56mjo0tdYUPNpT', 'qwerty', 'qwerty@gmail.com', NULL, '$2y$10$7IhyA9wgcgJFUKmyfye3T.MuAcmQs2c2Viqa/w70dhXmfnaKzz3HK', NULL, '2023-09-20 11:44:02', '2023-10-20 07:13:04'),
(6, 'cAOTCYAKwAUINLZB2AsR3vWWugeuM6tvKF4ZK44Jl6Z1F59zS2Ge1XkbVbfk', 'Aayush Patidar', 'aayushpatidar04@gmail.com', NULL, '$2y$10$ubdVuf/Cajbq7XCCU9Xi1.2hdvLxSGuEI8.Hl1Ov83CKKIsg/Gkf2', NULL, '2023-09-20 14:02:18', '2023-09-20 14:02:18'),
(10, 'QSWvu5ti4r1JFsIt63NRZYk8IKfPalKx4H2ZwJCwk1G1ztnjBgIgWGCcXAMJ', 'qwertyuiop', 'qwertyuiop@gmail.com', NULL, '$2y$10$UIjjYnONUs.G1tcXc3VXZOK0.TqMT/c2t4BKU/Q9iZG59UxL/f36a', NULL, '2023-09-21 10:13:19', '2023-09-21 10:13:19'),
(12, 'qOikfjBRZ1myYd1gle5cZzsrUG4hTD8i9jbSTloa3NICV0YkIVwerJZlbams', 'dhairyahaia', 'dhairyajain299@gmail.com', NULL, '$2y$10$YK/gFOjbGHwH.rCdVwJgn.aOgP2kr8x5Pp9whYyBRH01l36p93fsS', NULL, '2023-10-16 06:06:29', '2023-10-16 06:06:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `address_user_id_unique` (`user_id`),
  ADD KEY `address_user_email_foreign` (`user_email`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fastfood`
--
ALTER TABLE `fastfood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fastfood_sub_category`
--
ALTER TABLE `fastfood_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fastfood_sub_category_fastfood_id_foreign` (`fastfood_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `subscription_category`
--
ALTER TABLE `subscription_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_products`
--
ALTER TABLE `subscription_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_products_subscription_category_id_foreign` (`subscription_category_id`),
  ADD KEY `subscription_products_subscription_sub_category_id_foreign` (`subscription_sub_category_id`);

--
-- Indexes for table `subscription_sub_category`
--
ALTER TABLE `subscription_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_sub_category_subscription_category_id_foreign` (`subscription_category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `delivery_boys`
--
ALTER TABLE `delivery_boys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fastfood`
--
ALTER TABLE `fastfood`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fastfood_sub_category`
--
ALTER TABLE `fastfood_sub_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_category`
--
ALTER TABLE `subscription_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscription_products`
--
ALTER TABLE `subscription_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `subscription_sub_category`
--
ALTER TABLE `subscription_sub_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_user_email_foreign` FOREIGN KEY (`user_email`) REFERENCES `users` (`email`) ON DELETE CASCADE,
  ADD CONSTRAINT `address_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fastfood_sub_category`
--
ALTER TABLE `fastfood_sub_category`
  ADD CONSTRAINT `fastfood_sub_category_fastfood_id_foreign` FOREIGN KEY (`fastfood_id`) REFERENCES `fastfood` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_products`
--
ALTER TABLE `subscription_products`
  ADD CONSTRAINT `subscription_products_subscription_category_id_foreign` FOREIGN KEY (`subscription_category_id`) REFERENCES `subscription_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_products_subscription_sub_category_id_foreign` FOREIGN KEY (`subscription_sub_category_id`) REFERENCES `subscription_sub_category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_sub_category`
--
ALTER TABLE `subscription_sub_category`
  ADD CONSTRAINT `subscription_sub_category_subscription_category_id_foreign` FOREIGN KEY (`subscription_category_id`) REFERENCES `subscription_category` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
