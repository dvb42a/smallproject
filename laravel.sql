-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-09-11 23:42:54
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `laravel`
--

-- --------------------------------------------------------

--
-- 資料表結構 `cardata`
--

CREATE TABLE `cardata` (
  `c_id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_sname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ct_id` int(11) DEFAULT NULL,
  `d_id` int(11) DEFAULT NULL,
  `c_photopath` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_photoname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `cardata`
--

INSERT INTO `cardata` (`c_id`, `c_name`, `c_sname`, `ct_id`, `d_id`, `c_photopath`, `c_photoname`, `created_at`, `updated_at`) VALUES
(1, 'EK9 Red', 'EK9R', 1, 1, 'image/53sI9ZSrsPkvZaw2aDPN5Qn3affuF9FkwjXykjXp.jpg', 'EK9RED.jpg', '2022-09-11 21:16:54', NULL),
(2, 'EK9 Spoon Yellow', 'EK9SY', 1, 2, 'image/54SxdR5rYLxFBZe6jitKoj8xcLBbB6m6Pz9lpxuS.jpg', 'ek9Spoon.jpg', '2022-09-11 21:17:10', NULL),
(3, 'EK9 Black', 'EK9B', 1, 3, 'image/hfsgb4DuGgM3LLyUBw29eFqXIugBXkifdK5p4g7u.jpg', 'EK9_black.jpg', '2022-09-11 21:17:27', NULL),
(4, 'Porsche 992 GTS', '992GTS', 2, 1, 'image/FwCNWXE8aGNdZ2dnIwB511T7sMUF4CdCisZWvcbM.jpg', '992-yellow.jpg', '2022-09-11 21:32:26', NULL),
(5, 'FK8 Red', 'FK8R', 4, 3, 'image/kJVGn4a5qtLeZB68O4LK92gqS6YxIafkWbKyVxrV.jpg', 'fk8Red.jpg', '2022-09-11 21:33:44', NULL),
(6, 'S2000 spoon yellow', 'S2kSY', 3, 3, 'image/WSUiRWZK1hRT2F36YVtFZEABnwojZ9lnKfxTHn9O.jpg', 's2000Y.jpg', '2022-09-11 21:34:13', NULL),
(7, 'EK9 Spoon', 'EK9S', 1, 3, 'image/k2YMXoGrdmfcQUhApVplfOPnVdLSf6HlcYeDj1UI.jpg', 'ek9SpoonRacing.jpg', '2022-09-11 21:35:09', NULL),
(8, 'FK8 Mugen RR', 'FK8MRR', 4, 1, 'image/jQLWxxJdMZVqJhdkSsX4XGGb4mBd3YR6Gv3aiPrg.jpg', 'FK8mugen.jpg', '2022-09-11 21:35:49', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `carinraceseries`
--

CREATE TABLE `carinraceseries` (
  `crs_id` bigint(20) UNSIGNED NOT NULL,
  `rs_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `rs_tsource` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `crs_order` int(11) NOT NULL,
  `crs_ranking` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `carinraceseries`
--

INSERT INTO `carinraceseries` (`crs_id`, `rs_id`, `c_id`, `rs_tsource`, `created_at`, `updated_at`, `crs_order`, `crs_ranking`) VALUES
(1, 1, 3, 102, '2022-09-11 21:18:00', '2022-09-11 21:30:37', 2, 3),
(2, 1, 1, 111, '2022-09-11 21:18:00', '2022-09-11 21:30:37', 0, 1),
(3, 1, 2, 82, '2022-09-11 21:18:00', '2022-09-11 21:30:37', 1, 2),
(4, 2, 8, 18, '2022-09-11 21:37:54', '2022-09-11 21:38:41', 1, 2),
(5, 2, 5, 25, '2022-09-11 21:37:54', '2022-09-11 21:38:41', 0, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `cartype`
--

CREATE TABLE `cartype` (
  `ct_id` bigint(20) UNSIGNED NOT NULL,
  `ct_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `cartype`
--

INSERT INTO `cartype` (`ct_id`, `ct_name`, `created_at`, `updated_at`) VALUES
(1, 'Honda EK 1600cc series', '2022-09-11 21:06:39', NULL),
(2, 'Porsche 992 series', '2022-09-11 21:31:42', NULL),
(3, 'Honda S2000 series', '2022-09-11 21:32:39', NULL),
(4, 'Honda FK8 series', '2022-09-11 21:33:09', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `databasesetting`
--

CREATE TABLE `databasesetting` (
  `dbs_id` bigint(20) UNSIGNED NOT NULL,
  `dbs_s` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `driverdata`
--

CREATE TABLE `driverdata` (
  `d_id` bigint(20) UNSIGNED NOT NULL,
  `d_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `driverdata`
--

INSERT INTO `driverdata` (`d_id`, `d_name`, `d_num`, `created_at`, `updated_at`) VALUES
(1, 'Chun', '516', '2022-09-11 21:16:29', NULL),
(2, 'Eric', '818', '2022-09-11 21:16:35', NULL),
(3, 'Ah ka', '816', '2022-09-11 21:16:42', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `failed_jobs`
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
-- 資料表結構 `mapdata`
--

CREATE TABLE `mapdata` (
  `m_id` bigint(20) UNSIGNED NOT NULL,
  `m_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_safe` int(11) NOT NULL,
  `m_smooth` int(11) NOT NULL,
  `m_cont` int(11) NOT NULL,
  `m_design` int(11) NOT NULL,
  `m_pro` int(11) NOT NULL,
  `m_rate` int(11) NOT NULL,
  `m_final` int(11) NOT NULL,
  `m_finalrate` int(11) NOT NULL,
  `m_photopath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_photoname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mrs_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `mapdata`
--

INSERT INTO `mapdata` (`m_id`, `m_name`, `m_safe`, `m_smooth`, `m_cont`, `m_design`, `m_pro`, `m_rate`, `m_final`, `m_finalrate`, `m_photopath`, `m_photoname`, `mrs_id`, `created_at`, `updated_at`) VALUES
(1, 'OG MAP 4 FIA', 10, 10, 9, 9, 10, 10, 58, 10, '202209120507image/c5S13HY0oQAKdg4s0dNmSaA0GFP0x3zACSWu7b5Z.jpg', 'og_map_4.jpg', 1, '2022-09-11 21:07:15', NULL),
(2, 'OG MAP 3 FIA', 10, 10, 8, 9, 10, 10, 57, 10, '202209120507image/fmJmQO3tJf9FJHQRN5r1awfiPG9bLn4bjRd5Whyg.jpg', 'og_map_3.jpg', 1, '2022-09-11 21:07:30', NULL),
(3, 'Aegir GP', 10, 10, 10, 10, 10, 10, 60, 10, '202209120507image/lD7adLSl8SbqxYpMMuiWwYCW11F9yaAE3oHyeVg2.jpg', 'Aegir GP.jpg', 1, '2022-09-11 21:07:47', NULL),
(4, 'Desart GP', 10, 9, 8, 7, 10, 8, 52, 9, '202209120508image/jU3iOVVBnVXU6o0gRIYf6gpXyY3LVsNsEpVOlkgV.jpg', 'Desart GP.jpg', 1, '2022-09-11 21:08:26', NULL),
(5, 'Laguna Seca GP', 10, 7, 7, 7, 7, 8, 46, 8, '202209120508image/j3DX0RcGhKwE5BKS5rj77wIm2gDuwOCF5wgfVDsd.jpg', 'Laguna Seca GP.jpg', 2, '2022-09-11 21:08:46', NULL),
(6, 'GXS GBreh GP', 10, 10, 9, 9, 10, 10, 58, 10, '202209120509image/Pa0y1kwj1rwGcE9O5rPjxDJ5FwH1TXEIxFZizs74.jpg', 'Gunant Breh GP.jpg', 1, '2022-09-11 21:09:17', NULL),
(7, 'Cypress Flats GP', 3, 1, 8, 7, 3, 5, 27, 5, '202209120509image/60xYFq7s7DwyWPWVh5N7dmXkYhxzqmGCfw8qoGHp.jpg', 'Cypress Flats GP.jpg', 3, '2022-09-11 21:09:44', '2022-09-11 21:15:10'),
(8, 'GXS Skanarr GP', 9, 8, 9, 9, 10, 8, 53, 9, '202209120516image/Ly4HbSpUOCA96CmkolzqvREehxqe8aU38FJ4euHJ.jpg', 'Skanarr GP.jpg', 1, '2022-09-11 21:16:20', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `maprankingstate`
--

CREATE TABLE `maprankingstate` (
  `mrs_id` bigint(20) UNSIGNED NOT NULL,
  `mrs_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `maprankingstate`
--

INSERT INTO `maprankingstate` (`mrs_id`, `mrs_name`, `created_at`, `updated_at`) VALUES
(1, 'T1', NULL, NULL),
(2, 'T2', NULL, NULL),
(3, 'T3', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_08_082349_create_userlevel', 1),
(6, '2022_08_08_155234_create_driverdata', 1),
(7, '2022_08_08_160119_create_mapdata', 1),
(8, '2022_08_08_160703_create_cardata', 1),
(9, '2022_08_08_162707_create_cartype', 1),
(10, '2022_08_08_162758_create_raceseries', 1),
(11, '2022_08_08_163924_create_raceseriesmap', 1),
(12, '2022_08_08_164358_create_carinraceseries', 1),
(13, '2022_08_08_164530_create_racehistory', 1),
(14, '2022_08_19_032850_create_raceseriesstate', 1),
(15, '2022_08_24_233818_create_maprankingstate', 1),
(16, '2022_09_08_182719_create_raceseriesgetsource', 1),
(17, '2022_09_08_204733_create_databasesetting', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `personal_access_tokens`
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
-- 資料表結構 `racehistory`
--

CREATE TABLE `racehistory` (
  `rh_id` bigint(20) UNSIGNED NOT NULL,
  `rh_time` char(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `rs_id` int(11) DEFAULT NULL,
  `rs_source` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `racehistory`
--

INSERT INTO `racehistory` (`rh_id`, `rh_time`, `c_id`, `m_id`, `rs_id`, `rs_source`, `created_at`, `updated_at`) VALUES
(1, '1:15.858', 3, 8, 1, 2, '2022-09-11 21:28:32', '2022-09-11 21:28:46'),
(2, '1:15.453', 1, 8, 1, 1, '2022-09-11 21:28:39', '2022-09-11 21:28:46'),
(3, '1:15.898', 2, 8, 1, 3, '2022-09-11 21:28:46', '2022-09-11 21:28:46'),
(4, '1:20.585', 1, 3, 1, 2, '2022-09-11 21:29:11', '2022-09-11 21:29:29'),
(5, '1:19.858', 3, 3, 1, 1, '2022-09-11 21:29:17', '2022-09-11 21:29:29'),
(6, '1:21.202', 2, 3, 1, 3, '2022-09-11 21:29:28', '2022-09-11 21:29:29'),
(7, '1:05.878', 3, 6, 1, 2, '2022-09-11 21:29:37', '2022-09-11 21:29:48'),
(8, '1:05.595', 1, 6, 1, 1, '2022-09-11 21:29:43', '2022-09-11 21:29:48'),
(9, '1:06.011', 2, 6, 1, 3, '2022-09-11 21:29:48', '2022-09-11 21:29:48'),
(10, '1:35.454', 1, 2, 1, 2, '2022-09-11 21:29:54', '2022-09-11 21:30:06'),
(11, '1:34.848', 3, 2, 1, 1, '2022-09-11 21:30:01', '2022-09-11 21:30:06'),
(12, '1:36.858', 2, 2, 1, 3, '2022-09-11 21:30:06', '2022-09-11 21:30:06'),
(13, '1:17.858', 3, 1, 1, 3, '2022-09-11 21:30:27', '2022-09-11 21:30:37'),
(14, '1:17.585', 1, 1, 1, 1, '2022-09-11 21:30:32', '2022-09-11 21:30:37'),
(15, '1:17.656', 2, 1, 1, 2, '2022-09-11 21:30:37', '2022-09-11 21:30:37'),
(16, '1:16.598', 1, 1, NULL, 0, '2022-09-11 21:31:31', NULL),
(17, '1:10.898', 8, 8, 2, 2, '2022-09-11 21:38:34', '2022-09-11 21:38:41'),
(18, '1:10.528', 5, 8, 2, 1, '2022-09-11 21:38:41', '2022-09-11 21:38:41'),
(19, '1:10.585', 4, 1, NULL, 0, '2022-09-11 21:41:27', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `raceseries`
--

CREATE TABLE `raceseries` (
  `rs_id` bigint(20) UNSIGNED NOT NULL,
  `rs_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ct_id` int(11) NOT NULL,
  `rs_photopath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rs_photoname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rss_id` int(11) NOT NULL,
  `rs_mstate` int(11) NOT NULL,
  `rs_cstate` int(11) NOT NULL,
  `rs_morder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `raceseries`
--

INSERT INTO `raceseries` (`rs_id`, `rs_name`, `ct_id`, `rs_photopath`, `rs_photoname`, `created_at`, `updated_at`, `rss_id`, `rs_mstate`, `rs_cstate`, `rs_morder`) VALUES
(1, 'Honda Fun Day', 1, '202209120517image/oJPPtgS99tZwNGQ87qtgRxN506p3qlZX6uCmUXXd.jpg', 'HFD.jpg', '2022-09-11 21:17:41', '2022-09-11 21:18:17', 3, 1, 1, 1),
(2, 'FK8 Racing Day', 4, '202209120537image/6mRkXF1uYlB1c8xyhASv4W9gLhDdDMJeaHdfXm0n.jpg', 'FK8.jpg', '2022-09-11 21:37:41', '2022-09-11 21:38:03', 3, 1, 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `raceseriesgetsource`
--

CREATE TABLE `raceseriesgetsource` (
  `rssgs_id` bigint(20) UNSIGNED NOT NULL,
  `rssgs_s` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `raceseriesgetsource`
--

INSERT INTO `raceseriesgetsource` (`rssgs_id`, `rssgs_s`, `created_at`, `updated_at`) VALUES
(1, 25, NULL, NULL),
(2, 18, NULL, NULL),
(3, 16, NULL, NULL),
(4, 12, NULL, NULL),
(5, 10, NULL, NULL),
(6, 9, NULL, NULL),
(7, 6, NULL, NULL),
(8, 3, NULL, NULL),
(9, 2, NULL, NULL),
(10, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `raceseriesmap`
--

CREATE TABLE `raceseriesmap` (
  `rsm_id` bigint(20) UNSIGNED NOT NULL,
  `rs_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `rsm_mo` int(11) DEFAULT NULL,
  `rsm_extra` int(11) DEFAULT NULL,
  `rsm_state` int(11) DEFAULT NULL,
  `rsm_mcount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `raceseriesmap`
--

INSERT INTO `raceseriesmap` (`rsm_id`, `rs_id`, `m_id`, `rsm_mo`, `rsm_extra`, `rsm_state`, `rsm_mcount`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 0, NULL, 3, 1, '2022-09-11 21:17:53', '2022-09-11 21:38:41'),
(2, 1, 3, 1, NULL, 3, 1, '2022-09-11 21:17:53', '2022-09-11 21:29:29'),
(3, 1, 6, 2, NULL, 3, 1, '2022-09-11 21:17:53', '2022-09-11 21:29:48'),
(4, 1, 2, 3, NULL, 3, 1, '2022-09-11 21:17:53', '2022-09-11 21:30:06'),
(5, 1, 1, 4, NULL, 3, 1, '2022-09-11 21:17:53', '2022-09-11 21:30:37'),
(6, 1, 5, 0, 1, 0, 0, '2022-09-11 21:17:53', NULL),
(7, 2, 8, 0, NULL, 2, 1, '2022-09-11 21:37:49', '2022-09-11 21:38:41'),
(8, 2, 2, 1, NULL, 0, 0, '2022-09-11 21:37:49', NULL),
(9, 2, 6, 2, NULL, 0, 0, '2022-09-11 21:37:49', NULL),
(10, 2, 5, 0, 1, 0, 0, '2022-09-11 21:37:49', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `raceseriesstate`
--

CREATE TABLE `raceseriesstate` (
  `rss_id` bigint(20) UNSIGNED NOT NULL,
  `rss_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `raceseriesstate`
--

INSERT INTO `raceseriesstate` (`rss_id`, `rss_name`, `created_at`, `updated_at`) VALUES
(1, 'Base info done', NULL, NULL),
(2, 'Waiting for confirm', NULL, NULL),
(3, 'Completed', NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `lv_id`) VALUES
(1, 'Dv b42a', 'tszchun516@gmail.com', 'admin', '2022-09-11 20:44:44', '$2y$10$x9Mt8iwQHk2xMUpwXxhLPe7.QSt91BXoExsYf09WGMi80ynLJRlaW', NULL, '2022-09-11 20:44:33', '2022-09-11 21:06:02', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user_level`
--

CREATE TABLE `user_level` (
  `lv_id` bigint(20) UNSIGNED NOT NULL,
  `lv_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `user_level`
--

INSERT INTO `user_level` (`lv_id`, `lv_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `cardata`
--
ALTER TABLE `cardata`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `cardata_c_name_unique` (`c_name`),
  ADD UNIQUE KEY `cardata_c_sname_unique` (`c_sname`);

--
-- 資料表索引 `carinraceseries`
--
ALTER TABLE `carinraceseries`
  ADD PRIMARY KEY (`crs_id`);

--
-- 資料表索引 `cartype`
--
ALTER TABLE `cartype`
  ADD PRIMARY KEY (`ct_id`),
  ADD UNIQUE KEY `cartype_ct_name_unique` (`ct_name`);

--
-- 資料表索引 `databasesetting`
--
ALTER TABLE `databasesetting`
  ADD PRIMARY KEY (`dbs_id`);

--
-- 資料表索引 `driverdata`
--
ALTER TABLE `driverdata`
  ADD PRIMARY KEY (`d_id`),
  ADD UNIQUE KEY `driverdata_d_num_unique` (`d_num`);

--
-- 資料表索引 `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- 資料表索引 `mapdata`
--
ALTER TABLE `mapdata`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `mapdata_m_name_unique` (`m_name`);

--
-- 資料表索引 `maprankingstate`
--
ALTER TABLE `maprankingstate`
  ADD PRIMARY KEY (`mrs_id`);

--
-- 資料表索引 `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- 資料表索引 `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- 資料表索引 `racehistory`
--
ALTER TABLE `racehistory`
  ADD PRIMARY KEY (`rh_id`);

--
-- 資料表索引 `raceseries`
--
ALTER TABLE `raceseries`
  ADD PRIMARY KEY (`rs_id`),
  ADD UNIQUE KEY `raceseries_rs_name_unique` (`rs_name`);

--
-- 資料表索引 `raceseriesgetsource`
--
ALTER TABLE `raceseriesgetsource`
  ADD PRIMARY KEY (`rssgs_id`);

--
-- 資料表索引 `raceseriesmap`
--
ALTER TABLE `raceseriesmap`
  ADD PRIMARY KEY (`rsm_id`);

--
-- 資料表索引 `raceseriesstate`
--
ALTER TABLE `raceseriesstate`
  ADD PRIMARY KEY (`rss_id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- 資料表索引 `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`lv_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cardata`
--
ALTER TABLE `cardata`
  MODIFY `c_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `carinraceseries`
--
ALTER TABLE `carinraceseries`
  MODIFY `crs_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cartype`
--
ALTER TABLE `cartype`
  MODIFY `ct_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `databasesetting`
--
ALTER TABLE `databasesetting`
  MODIFY `dbs_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `driverdata`
--
ALTER TABLE `driverdata`
  MODIFY `d_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `mapdata`
--
ALTER TABLE `mapdata`
  MODIFY `m_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `maprankingstate`
--
ALTER TABLE `maprankingstate`
  MODIFY `mrs_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `racehistory`
--
ALTER TABLE `racehistory`
  MODIFY `rh_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `raceseries`
--
ALTER TABLE `raceseries`
  MODIFY `rs_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `raceseriesgetsource`
--
ALTER TABLE `raceseriesgetsource`
  MODIFY `rssgs_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `raceseriesmap`
--
ALTER TABLE `raceseriesmap`
  MODIFY `rsm_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `raceseriesstate`
--
ALTER TABLE `raceseriesstate`
  MODIFY `rss_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_level`
--
ALTER TABLE `user_level`
  MODIFY `lv_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
