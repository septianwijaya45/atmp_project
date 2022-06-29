-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 04:20 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atmp_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `atmps`
--

CREATE TABLE `atmps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atmps`
--

INSERT INTO `atmps` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Plant', '2022-06-11 18:09:45', '2022-06-11 18:09:45'),
(2, 'Produksi', '2022-06-11 18:09:45', '2022-06-11 18:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jenissites`
--

CREATE TABLE `jenissites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `atmp_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenissites`
--

INSERT INTO `jenissites` (`id`, `atmp_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'AGM', '2022-06-11 18:09:45', '2022-06-11 18:09:45'),
(2, 1, 'MME', '2022-06-11 18:09:45', '2022-06-11 18:09:45'),
(3, 1, 'TAJ', '2022-06-11 18:09:45', '2022-06-11 18:09:45'),
(4, 1, 'MAS', '2022-06-23 15:13:58', '2022-06-23 15:13:58'),
(5, 1, 'PMSS', '2022-06-23 15:13:58', '2022-06-23 15:13:58'),
(6, 1, 'HAULING', '2022-06-23 15:13:58', '2022-06-23 15:13:58'),
(7, 1, 'BSSR', '2022-06-23 15:13:58', '2022-06-23 15:13:58'),
(8, 2, 'AGM', '2022-06-23 15:15:45', '2022-06-23 15:15:45'),
(9, 2, 'MME', '2022-06-23 15:15:45', '2022-06-23 15:15:45'),
(10, 2, 'TAJ', '2022-06-23 15:15:45', '2022-06-23 15:15:45'),
(11, 2, 'MAS', '2022-06-23 15:15:45', '2022-06-23 15:15:45'),
(12, 2, 'PMSS', '2022-06-23 15:15:45', '2022-06-23 15:15:45'),
(13, 2, 'HAULING', '2022-06-23 15:15:45', '2022-06-23 15:15:45'),
(14, 2, 'BSSR', '2022-06-23 15:15:45', '2022-06-23 15:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `plantatmp_id` bigint(20) UNSIGNED NOT NULL,
  `produksiatmp_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `user_id`, `plantatmp_id`, `produksiatmp_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 10, '2022-06-27 10:43:56', '2022-06-27 04:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_06_11_201940_create_roles_table', 1),
(5, '2022_06_11_202008_create_users_table', 1),
(6, '2022_06_11_202052_create_atmps_table', 1),
(7, '2022_06_11_202107_create_jenissites_table', 1),
(8, '2022_06_11_202123_create_timeframes_table', 1),
(9, '2022_06_27_100700_create_menu_table', 2);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2022-06-11 18:09:44', '2022-06-11 18:09:44'),
(2, 'Admin', '2022-06-11 18:09:44', '2022-06-11 18:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `timeframes`
--

CREATE TABLE `timeframes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `atmp_id` bigint(20) UNSIGNED NOT NULL,
  `jenissite_id` bigint(20) UNSIGNED NOT NULL,
  `plan_start` date DEFAULT NULL,
  `plan_finish` date DEFAULT NULL,
  `actual_start` date DEFAULT NULL,
  `actual_finish` date DEFAULT NULL,
  `tot_peserta` int(11) DEFAULT NULL,
  `act_peserta` int(11) DEFAULT NULL,
  `achiv_peserta` int(11) DEFAULT NULL,
  `instruktur` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent_achiv_peserta` int(11) DEFAULT NULL,
  `percent_achiv_event_month` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timeframes`
--

INSERT INTO `timeframes` (`id`, `atmp_id`, `jenissite_id`, `plan_start`, `plan_finish`, `actual_start`, `actual_finish`, `tot_peserta`, `act_peserta`, `achiv_peserta`, `instruktur`, `percent_achiv_peserta`, `percent_achiv_event_month`, `created_at`, `updated_at`) VALUES
(6, 1, 2, '2022-06-14', NULL, '2022-06-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-12 23:07:36', '2022-06-12 23:07:57'),
(8, 1, 1, '2022-06-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-15 08:42:59', '2022-06-15 08:43:23'),
(10, 1, 1, '2022-06-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-25 14:13:55', '2022-06-25 14:13:55'),
(11, 1, 1, '2022-06-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-25 14:14:58', '2022-06-25 14:14:58'),
(12, 1, 1, '2022-06-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-26 01:20:40', '2022-06-26 01:20:40'),
(15, 1, 1, '2022-06-27', '2022-06-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-26 01:27:28', '2022-06-26 01:47:40'),
(17, 1, 2, '2022-06-30', NULL, '2022-06-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-27 05:11:56', '2022-06-27 05:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `username`, `nik`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', 'Administrator', '12345678', '$2y$10$IhWa1ZAsoOmxVUDAM1JAZevi4gCJOvAwFb6DJ5WHO7I3GnJe3ALnK', '2022-06-11 18:09:44', '2022-06-27 05:23:41'),
(2, 2, 'Admin', 'Admin', '87654321', '$2y$10$ZpS8j5WE6HhH1lcG5uL9cuWIRxMU7lpQDvN3h6RuEVuSzM15Hl11C', '2022-06-11 18:09:45', '2022-06-27 05:32:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atmps`
--
ALTER TABLE `atmps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jenissites`
--
ALTER TABLE `jenissites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenissites_atmp_id_foreign` (`atmp_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_user_id_foreign` (`user_id`),
  ADD KEY `menus_plantatmp_id_foreign` (`plantatmp_id`),
  ADD KEY `menus_produksiatmp_id_foreign` (`produksiatmp_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeframes`
--
ALTER TABLE `timeframes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timeframes_atmp_id_foreign` (`atmp_id`),
  ADD KEY `timeframes_jenissite_id_foreign` (`jenissite_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atmps`
--
ALTER TABLE `atmps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenissites`
--
ALTER TABLE `jenissites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timeframes`
--
ALTER TABLE `timeframes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jenissites`
--
ALTER TABLE `jenissites`
  ADD CONSTRAINT `jenissites_atmp_id_foreign` FOREIGN KEY (`atmp_id`) REFERENCES `atmps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_plantatmp_id_foreign` FOREIGN KEY (`plantatmp_id`) REFERENCES `jenissites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menus_produksiatmp_id_foreign` FOREIGN KEY (`produksiatmp_id`) REFERENCES `jenissites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timeframes`
--
ALTER TABLE `timeframes`
  ADD CONSTRAINT `timeframes_atmp_id_foreign` FOREIGN KEY (`atmp_id`) REFERENCES `atmps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `timeframes_jenissite_id_foreign` FOREIGN KEY (`jenissite_id`) REFERENCES `jenissites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
