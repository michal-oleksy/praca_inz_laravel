-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2024 at 10:51 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praca_inz_laravel`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `datePublished` date DEFAULT NULL,
  `pages` int(11) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `genre`, `datePublished`, `pages`, `publisher`) VALUES
(1, 'Pan Tadeusz', 'Adam Mickiewicz', 'klasyka', '1906-01-01', 352, 'Ossolineum'),
(2, 'Pan Lodowego Ogrodu', 'Jarosław Grzędowicz', 'fantasy', '2005-01-01', 660, 'Fabryka Słów');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `failed_jobs`
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
-- Struktura tabeli dla tabeli `goals`
--

CREATE TABLE `goals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `yearGoal` int(11) DEFAULT NULL,
  `monthGoal` int(11) DEFAULT NULL,
  `weekGoal` int(11) DEFAULT NULL,
  `dayGoal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `userID`, `yearGoal`, `monthGoal`, `weekGoal`, `dayGoal`) VALUES
(1, 2, 3000, 800, 300, 10),
(5, 4, 3003, 503, 203, 103),
(6, 7, 1000, 300, 50, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_08_212034_add_gender_field_to_users_table', 2),
(5, '2024_12_08_212852_add_gender_field_to_users_table', 3),
(6, '2024_12_09_074934_change_name_for_first_name', 4),
(7, '2024_12_09_075636_new_last_name_column', 5),
(8, '2024_12_09_113838_new_nickname_column', 6),
(9, '2024_12_10_202942_create_pages_table', 7),
(10, '2024_12_16_213951_create_goals_table', 8),
(11, '2024_12_20_222655_create_books_table', 9),
(12, '2024_12_28_092549_add_day_goal_column', 10),
(13, '2024_12_28_162954_add_timestamps_to_reviews_column', 11);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userID` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `userID`, `title`, `date`, `created_at`, `updated_at`) VALUES
(105, 2, 10, '2024-12-10 00:00:00', '2024-12-12 20:18:46', '2024-12-12 20:18:46'),
(106, 2, 20, '2024-12-11 00:00:00', '2024-12-12 20:18:50', '2024-12-12 20:18:50'),
(109, 2, 234, '2024-12-12 00:00:00', '2024-12-12 20:19:51', '2024-12-12 20:21:43'),
(110, 2, 20, '2024-12-18 00:00:00', '2024-12-16 19:33:43', '2024-12-16 19:34:02'),
(111, 3, 999, '2024-12-01 22:15:06', NULL, NULL),
(112, 2, 222, '2024-12-19 00:00:00', '2024-12-20 17:27:30', '2024-12-20 17:27:30'),
(113, 2, 1, '2024-12-17 00:00:00', '2024-12-20 17:27:35', '2024-12-20 17:27:35'),
(114, 2, 9, '2024-12-16 00:00:00', '2024-12-20 17:27:39', '2024-12-22 16:15:14'),
(115, 2, 11, '2024-12-15 00:00:00', '2024-12-20 17:36:47', '2024-12-20 17:36:47'),
(116, 2, 22, '2024-12-20 00:00:00', '2024-12-20 21:55:47', '2024-12-20 21:55:47'),
(117, 2, 21, '2024-12-13 00:00:00', '2024-12-20 21:55:51', '2024-12-20 21:55:51'),
(118, 2, 111, '2024-12-08 00:00:00', '2024-12-20 21:55:55', '2024-12-20 21:55:55'),
(119, 2, 2, '2024-12-05 00:00:00', '2024-12-20 21:56:52', '2024-12-20 21:56:52'),
(120, 2, 123, '2024-12-03 00:00:00', '2024-12-20 21:57:01', '2024-12-20 21:57:01'),
(121, 2, 123, '2024-12-24 00:00:00', '2024-12-21 16:31:56', '2024-12-22 16:08:17'),
(122, 2, 22, '2024-12-04 00:00:00', '2024-12-21 16:45:42', '2024-12-21 16:45:42'),
(123, 2, 1, '2024-12-02 00:00:00', '2024-12-21 16:51:19', '2024-12-21 16:51:19'),
(124, 2, 111, '2024-12-01 00:00:00', '2024-12-21 16:51:48', '2024-12-21 16:51:48'),
(125, 2, 99, '2024-12-09 00:00:00', '2024-12-21 16:52:58', '2024-12-21 16:52:58'),
(126, 2, 100, '2024-11-07 00:00:00', '2024-12-22 15:38:57', '2024-12-22 15:38:57'),
(127, 2, 100, '2023-11-08 00:00:00', '2024-12-22 15:56:59', '2024-12-22 15:56:59'),
(128, 2, 50, '2024-11-06 00:00:00', '2024-12-22 16:18:22', '2024-12-22 16:18:22'),
(129, 2, 20, '2024-12-22 00:00:00', '2024-12-22 16:18:36', '2024-12-22 16:18:36'),
(130, 2, 30, '2024-12-28 00:00:00', '2024-12-28 08:41:36', '2024-12-28 08:41:36'),
(131, 2, 30, '2024-12-29 00:00:00', '2024-12-29 18:26:58', '2024-12-29 18:26:58'),
(132, 2, 10, '2024-12-30 00:00:00', '2024-12-29 18:27:06', '2024-12-29 18:27:27'),
(133, 2, 200, '2024-12-23 00:00:00', '2024-12-29 18:27:17', '2024-12-29 18:27:21');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('michal.oleksy84@gmail.com', '$2y$12$bAVFlzm1mN6YvTjvZWMGfe57ViZh1R3Mcd72/H3R1C12yF1mVBulG', '2024-12-02 20:08:27');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `userID`, `bookID`, `rate`) VALUES
(7, 7, 1, 1),
(9, 1, 1, 5),
(13, 4, 2, 1),
(15, 2, 2, 5),
(17, 2, 1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `userID`, `bookID`, `review`, `created_at`, `updated_at`) VALUES
(4, 2, 1, '<p>rthrthr22</p>', '2024-12-28 17:01:18', '2024-12-29 17:15:53'),
(5, 1, 1, 'Recenzja pierwszego usera', '2024-12-28 17:23:18', '2024-12-28 17:23:18'),
(6, 7, 1, 'www2', '2024-12-28 17:24:30', '2024-12-28 21:43:20'),
(7, 2, 2, '<p><span style=\"background-color:rgb(255,255,255);color:rgb(33,37,41);\">To jest recenzja Tomka o Panu Lodowego Ogrodu</span></p>', '2024-12-28 19:21:04', '2024-12-29 18:10:23'),
(8, 4, 1, 'recenzja test test', '2024-12-28 20:42:46', '2024-12-28 20:42:46');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JP5DRbBr4tXd5jKPYPHgPou041M2e54q3h93Cuvs', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZUtnZEl4UVFTOFFWNXpyZmdSdFE0R1JpcHlURXFSakQ3Q0luekpCRyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ib29rcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzM1NTQ3NjQ4O319', 1735552185);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `userID`, `bookID`, `status`) VALUES
(1, 2, 1, 1),
(2, 2, 2, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gender` bigint(20) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `nickName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `gender`, `lastName`, `nickName`) VALUES
(1, 'Michał', 'test@test', NULL, '$2y$12$laR23yXRnMhybp5KFmo67u0F9KF6gXCD3hYkk7d93rKVf0BglYxGe', NULL, '2024-12-02 19:56:51', '2024-12-02 19:56:51', 0, '', ''),
(2, 'Tomek', 'test2@test', NULL, '$2y$12$kJy0bPjgTJwTboJRz6TGAusE7eAZhmgalhZMJFWpUWS4s/touDh2a', '5X3rhOwAGQcz6xlCNqmvpS77sglueMoL1GIzoUHASArtAbPFJb1OCbwOwCXc', '2024-12-02 19:57:23', '2024-12-02 19:57:23', 0, 'Nowak', 'Tomcio:)'),
(3, 'Klaudiusz', 'michal.oleksy84@gmail.com', NULL, '$2y$12$orF0G8P1ARkNZun1cSC4H.3nkanKdtLKjcKeAi0jvZMrGMs9Z2Cqu', NULL, '2024-12-02 20:07:56', '2024-12-02 20:07:56', 0, '', ''),
(4, 'Arkadiusz', 'test3@test', NULL, '$2y$12$5XQbhodvSV1IA2xS6TBB7e6VtXFbY4S8Tfr5u/577DHAMy5F3e1ry', NULL, '2024-12-08 20:33:39', '2024-12-08 20:33:39', 2, '', ''),
(5, 'Krzysztof', 'test4@test', NULL, '$2y$12$ia6UBfOtt8rbQRYnWnvjuOdiIPZoQfTR/UsSbtrGQlg.fFKH6DTP6', NULL, '2024-12-08 20:34:05', '2024-12-08 20:34:05', 3, '', ''),
(6, 'Paweł', 'test2024@test', NULL, '$2y$12$Nh8Mf0q6YbiyZKLzA1nwi.vyOOtT.5Wi11p/mIQaibVjBtg9.qPNq', NULL, '2024-12-09 06:55:02', '2024-12-09 06:55:02', 2, '', ''),
(7, 'Karol', 'test9238@test', NULL, '$2y$12$KJ8.6R/XSVZ4uEfa3jDs1u9EjKPxUEJVB09sAVmRS/ZzqArM2RIuW', '8MBCmIUHxn9C8qfKAKEWzDHy5osiWTBKPmTMibWaJfbDouAnWlKXySUv56tQ', '2024-12-09 10:41:09', '2024-12-09 10:41:09', 2, 'Karolnazwisko', 'Piesek21');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeksy dla tabeli `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeksy dla tabeli `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeksy dla tabeli `goals`
--
ALTER TABLE `goals`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeksy dla tabeli `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeksy dla tabeli `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeksy dla tabeli `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goals`
--
ALTER TABLE `goals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
