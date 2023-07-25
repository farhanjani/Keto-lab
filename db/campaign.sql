-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 04:28 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campaign`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$kWhT1M9wEjcnmnMAwbMwZOm1nXGmF4egk3SBXzeLoGY0yoIUDVEpu', '2023-01-05 14:21:06', '2023-01-05 14:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crm_id` int(11) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Not Deleted, 1=Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `title`, `crm_id`, `is_deleted`, `created_at`, `updated_at`) VALUES
(10, 'Socks', 3, 0, '2023-01-13 09:06:36', '2023-01-18 04:08:56'),
(11, 'Side', 5, 0, '2023-01-13 09:06:36', '2023-01-13 09:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Not Deleted, 1=Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `created_at`, `updated_at`, `name`, `description`, `image`, `is_deleted`) VALUES
(10, '2023-01-13 09:08:02', '2023-01-13 09:16:25', 'Electric', 'Electric Description', '1673619381.png', 0),
(11, '2023-01-13 09:09:35', '2023-01-13 09:09:35', 'Clothing', 'Clothing Description', '1673618970.jpg', 0),
(12, '2023-01-17 07:17:05', '2023-01-18 04:25:53', 'Slider', 'This is \"Slider\" category.', '1673957820.jpg', 0),
(13, '2023-01-17 07:20:21', '2023-01-18 04:26:10', 'Deal of the Week', 'This is \"Deal of the Week\" category.', '1673958017.jpg', 0),
(14, '2023-01-17 08:49:23', '2023-01-18 04:36:41', 'New Arrival', 'This category belongs to \"New Arrival\".', '1673963357.jpg', 0),
(15, '2023-01-18 05:25:28', '2023-01-18 05:25:28', 'TOP RATED PRODUCTS', 'TOP RATED PRODUCTS Description', '1674037523.png', 0),
(16, '2023-01-18 05:25:55', '2023-01-18 05:25:55', 'BEST SELLERS', 'BEST SELLERS Description', '1674037552.png', 0),
(17, '2023-01-18 08:26:14', '2023-01-18 08:26:14', 'RECOMMENDED PRODUCTS', 'RECOMMENDED PRODUCTS Category', '1674048369.png', 0);

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
(4, '2023_01_05_141824_create_admins_table', 1),
(5, '2023_01_06_092055_create_campaigns_table', 2),
(6, '2023_01_06_134342_create_categories_table', 3),
(7, '2023_01_06_144927_create_products_table', 4),
(8, '2023_01_09_113331_create_offers_table', 5),
(9, '2023_01_13_145923_create_settings_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `crm_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `is_featured` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Not Featured, 1=Featured',
  `discount` int(10) UNSIGNED DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Not Deleted, 1=Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `product_id`, `crm_id`, `title`, `description`, `price`, `is_featured`, `discount`, `is_deleted`, `created_at`, `updated_at`) VALUES
(4, 7, 73, 'Samsung S1', 'Samsung S1 Desciption', '87.14', 1, 22, 0, '2023-01-13 09:12:31', '2023-01-13 09:12:31'),
(5, 8, 120, '3 x LiveTemp Pro + 2 FREE', '70% DISCOUNT ( ₨ 13,607 / EACH )', '22678.00', 0, 70, 0, '2023-01-17 07:41:47', '2023-01-17 07:44:02'),
(6, 8, 108, '2 x LiveTemp Pro + 1 FREE', '67% DISCOUNT ( ₨ 15,043 / EACH )', '45126.00', 0, 67, 0, '2023-01-17 07:43:42', '2023-01-17 07:43:42'),
(7, 8, 108, '1 x LiveTemp Pro', '50% DISCOUNT ( ₨ 22,678 / EACH )', '22678.00', 0, 50, 0, '2023-01-17 07:45:05', '2023-01-17 07:45:05'),
(8, 9, 108, '3 x TacticPhoneX + 2 FREE', '70% DISCOUNT ( ₨ 13,607 / EACH )', '68033.00', 0, 70, 0, '2023-01-17 08:01:34', '2023-01-17 08:01:34'),
(9, 9, 108, '2 x TacticPhoneX + 1 FREE', '67% DISCOUNT ( ₨ 15,043 / EACH )', '45126.00', 0, 67, 0, '2023-01-17 08:02:34', '2023-01-17 08:02:34'),
(10, 9, 108, '1 x TacticPhoneX', '50% DISCOUNT ( ₨ 22,678 / EACH )', '22678.00', 0, 50, 0, '2023-01-17 08:03:21', '2023-01-17 08:03:21'),
(11, 10, 67, '3 x MoskiX Band + 2 FREE', '70% DISCOUNT ( ₨ 12,232 / EACH )', '61161.00', 0, 70, 0, '2023-01-17 08:11:47', '2023-01-17 08:11:47'),
(12, 10, 67, '2 x MoskiX Band + 1 FREE', '67% DISCOUNT ( ₨ 13,515 / EACH )', '40545.00', 0, 67, 0, '2023-01-17 08:12:24', '2023-01-17 08:12:24'),
(13, 10, 67, '1 x MoskiX Band', '50% DISCOUNT ( ₨ 20,387 / EACH )', '20387.00', 0, 50, 0, '2023-01-17 08:12:58', '2023-01-17 08:12:58'),
(14, 11, 108, '3 x ZeroShave Pro + 2 FREE', '71% DISCOUNT ( ₨ 8,979 / EACH )', '44897.00', 0, 71, 0, '2023-01-17 08:52:58', '2023-01-17 08:52:58'),
(15, 11, 108, '2 x ZeroShave Pro + 1 FREE', '67% DISCOUNT ( ₨ 10,232 / EACH )', '30695.00', 0, 67, 0, '2023-01-17 08:53:33', '2023-01-17 08:53:33'),
(16, 11, 108, '1 x ZeroShave Pro', '50% DISCOUNT ( ₨ 15,348 / EACH )', '15348.00', 0, 50, 0, '2023-01-17 08:54:22', '2023-01-17 08:54:22'),
(17, 12, 67, '3 x IOnic Spa Shower + 2 FREE', '76% DISCOUNT ( ₨ 9,072 / EACH )', '45362.00', 1, 76, 0, '2023-01-18 04:23:22', '2023-01-18 04:23:22'),
(18, 12, 67, '2 x IOnic Spa Shower + 1 FREE', '72% DISCOUNT ( ₨ 10,516 / EACH )', '31546.00', 0, 72, 0, '2023-01-18 04:24:07', '2023-01-18 04:24:07'),
(19, 12, 67, '1 x IOnic Spa Shower', '50% DISCOUNT ( ₨ 18,191 / EACH )', '18191.00', 0, 50, 0, '2023-01-18 04:24:45', '2023-01-18 04:24:45'),
(20, 13, 67, '3 x MasterHUD Pro + 2 FREE', '69% DISCOUNT ( ₨ 12,757 / EACH )', '63783.00', 1, 69, 0, '2023-01-18 04:32:32', '2023-01-18 04:32:32'),
(21, 13, 67, '2 x MasterHUD Pro + 1 FREE', '65% DISCOUNT ( ₨ 14,352 / EACH )', '43059.00', 0, 65, 0, '2023-01-18 04:33:07', '2023-01-18 04:33:07'),
(22, 13, 67, '1 x MasterHUD Pro', '50% DISCOUNT ( ₨ 20,493 / EACH )', '20493.00', 0, 50, 0, '2023-01-18 04:33:45', '2023-01-18 04:33:45'),
(23, 14, 67, '3 x StealthHawk Pro + 2 FREE', '70% DISCOUNT ( ₨ 20,585 / EACH )', '102927.00', 1, 70, 0, '2023-01-18 04:34:22', '2023-01-18 04:34:22'),
(24, 14, 67, '2 x StealthHawk Pro + 1 FREE', '67% DISCOUNT ( ₨ 22,796 / EACH )', '68388.00', 0, 67, 0, '2023-01-18 04:34:54', '2023-01-18 04:34:54'),
(25, 14, 67, '1 x StealthHawk Pro', '50% DISCOUNT ( ₨ 34,309 / EACH )', '34309.00', 0, 50, 0, '2023-01-18 04:35:23', '2023-01-18 04:35:23'),
(26, 15, 67, '3 x StableCAM PRO + 2 FREE', '70% DISCOUNT ( ₨ 20,585 / EACH )', '102927.00', 1, 70, 0, '2023-01-18 05:14:31', '2023-01-18 05:14:31'),
(27, 15, 67, '2 x StableCAM PRO + 1 FREE', '67% DISCOUNT ( ₨ 22,796 / EACH )', '68388.00', 0, 67, 0, '2023-01-18 05:15:09', '2023-01-18 05:15:09'),
(28, 15, 67, '1 x StableCAM PRO', '50% DISCOUNT ( ₨ 34,309 / EACH )', '34309.00', 0, 50, 0, '2023-01-18 05:15:40', '2023-01-18 05:15:40'),
(29, 16, 67, '3 x Roseal CuteBear + 2 FREE', '73% DISCOUNT ( ₨ 6,217 / EACH )', '31085.00', 1, 73, 0, '2023-01-18 05:17:37', '2023-01-18 05:17:37'),
(30, 16, 67, '2 x Roseal CuteBear + 1 FREE', '67% DISCOUNT ( ₨ 7,523 / EACH )', '22566.00', 0, 67, 0, '2023-01-18 05:18:14', '2023-01-18 05:18:14'),
(31, 16, 67, '1 x Roseal CuteBear', '50% DISCOUNT ( ₨ 11,283 / EACH )', '11283.00', 0, 50, 0, '2023-01-18 05:18:47', '2023-01-18 05:18:47'),
(32, 17, 67, '3 x Foamatic + 2 FREE', '73% DISCOUNT ( ₨ 6,217 / EACH )', '31085.00', 0, 73, 0, '2023-01-18 05:19:50', '2023-01-18 05:19:50'),
(33, 17, 67, '2 x Foamatic + 1 FREE', '67% DISCOUNT ( ₨ 7,523 / EACH )', '22566.00', 0, 67, 0, '2023-01-18 05:20:59', '2023-01-18 05:20:59'),
(34, 17, 67, '1 x Foamatic', '50% DISCOUNT ( ₨ 11,283 / EACH )', '11283.00', 0, 50, 0, '2023-01-18 05:21:35', '2023-01-18 05:21:35'),
(35, 18, 67, '3 x Smart Fitness + 2 FREE', '70% DISCOUNT ( ₨ 12,388 / EACH )', '61941.00', 1, 70, 0, '2023-01-18 05:22:34', '2023-01-18 05:22:34'),
(36, 18, 67, '2 x Smart Fitness + 1 FREE', '63% DISCOUNT ( ₨ 15,273 / EACH )', '45822.00', 0, 63, 0, '2023-01-18 05:23:07', '2023-01-18 05:23:07'),
(37, 18, 67, '1 x Smart Fitness', '50% DISCOUNT ( ₨ 20,493 / EACH )', '20493.00', 0, 50, 0, '2023-01-18 05:23:38', '2023-01-18 05:23:38'),
(38, 19, 67, '3 x EcoTouch + 2 FREE', '70% DISCOUNT ( ₨ 6,862 / EACH )', '34309.00', 1, 70, 0, '2023-01-18 05:40:47', '2023-01-18 05:40:47'),
(39, 19, 67, '2 x EcoTouch + 1 FREE', '67% DISCOUNT ( ₨ 7,599 / EACH )', '22796.00', 0, 67, 0, '2023-01-18 05:41:29', '2023-01-18 05:41:29'),
(40, 20, 67, '3 x ActivBeat 2.0 + 2 FREE', '70% DISCOUNT ( ₨ 13,678 / EACH )', '68388.00', 1, 70, 0, '2023-01-18 05:43:18', '2023-01-18 05:43:18'),
(41, 20, 67, '2 x ActivBeat 2.0 + 1 FREE', '67% DISCOUNT ( ₨ 15,121 / EACH )', '45362.00', 0, 67, 0, '2023-01-18 05:43:51', '2023-01-18 05:43:51'),
(42, 21, 67, '3 x WaterBOOM 360 + 2 FREE', '73% DISCOUNT ( ₨ 6,217 / EACH )', '31085.00', 1, 73, 0, '2023-01-18 05:45:55', '2023-01-18 05:45:55'),
(43, 21, 67, '2 x WaterBOOM 360 + 1 FREE', '67% DISCOUNT ( ₨ 7,523 / EACH )', '22566.00', 0, 67, 0, '2023-01-18 05:46:39', '2023-01-18 05:46:39'),
(44, 22, 67, '3 x NanoSecure + 2 FREE', '70% DISCOUNT ( ₨ 12,296 / EACH )', '61480.00', 1, 70, 0, '2023-01-18 05:48:34', '2023-01-18 05:48:34'),
(45, 22, 67, '2 x NanoSecure + 1 FREE', '67% DISCOUNT ( ₨ 13,585 / EACH )', '40756.00', 0, 67, 0, '2023-01-18 05:49:10', '2023-01-18 05:49:10'),
(46, 23, 67, '3 x Explore AIR + 2 FREE', '70% DISCOUNT ( ₨ 13,678 / EACH )', '68388.00', 1, 70, 0, '2023-01-18 05:52:54', '2023-01-18 05:52:54'),
(47, 23, 67, '2 x Explore AIR + 1 FREE', '67% DISCOUNT ( ₨ 15,121 / EACH )', '45362.00', 0, 67, 0, '2023-01-18 05:53:31', '2023-01-18 05:53:31'),
(48, 24, 67, '3 x GX SmartWatch + 2 FREE', '70% DISCOUNT ( ₨ 13,678 / EACH )', '68388.00', 1, 70, 0, '2023-01-18 07:26:54', '2023-01-18 07:26:54'),
(49, 24, 67, '2 x GX SmartWatch + 1 FREE', '67% DISCOUNT ( ₨ 15,121 / EACH )', '45362.00', 0, 67, 0, '2023-01-18 07:27:32', '2023-01-18 07:27:32'),
(50, 25, 67, '3 x EcoThermal + 2 FREE', '71% DISCOUNT ( ₨ 9,026 / EACH )', '45131.00', 1, 71, 0, '2023-01-18 07:29:57', '2023-01-18 07:29:57'),
(51, 25, 67, '2 x EcoThermal + 1 FREE', '67% DISCOUNT ( ₨ 10,286 / EACH )', '30855.00', 0, 67, 0, '2023-01-18 07:30:31', '2023-01-18 07:30:31'),
(52, 26, 67, '3 x EcoWarm Pro + 2 FREE', '75% DISCOUNT ( ₨ 6,862 / EACH )', '34309.00', 1, 75, 0, '2023-01-18 07:34:10', '2023-01-18 07:34:10'),
(53, 26, 67, '2 x EcoWarm Pro + 1 FREE', '70% DISCOUNT ( ₨ 8,365 / EACH )', '25099.00', 0, 70, 0, '2023-01-18 07:34:56', '2023-01-18 07:34:56'),
(54, 27, 67, '3 x GermsPurge Pro + 2 FREE', '73% DISCOUNT ( ₨ 6,217 / EACH )', '31085.00', 1, 73, 0, '2023-01-18 07:40:45', '2023-01-18 07:40:45'),
(55, 27, 67, '2 x GermsPurge Pro + 1 FREE', '67% DISCOUNT ( ₨ 7,523 / EACH )', '22566.00', 0, 67, 0, '2023-01-18 07:41:20', '2023-01-18 07:41:20'),
(56, 28, 67, '3 x CleanRobot + 2 FREE', '70% DISCOUNT ( ₨ 12,296 / EACH )', '61480.00', 1, 70, 0, '2023-01-18 07:57:26', '2023-01-18 07:57:26'),
(57, 28, 67, '2 x CleanRobot + 1 FREE', '67% DISCOUNT ( ₨ 13,585 / EACH )', '40756.00', 0, 67, 0, '2023-01-18 07:58:09', '2023-01-18 07:58:09'),
(58, 29, 67, '3 x MemorySafeX + 2 FREE', '75% DISCOUNT ( ₨ 6,862 / EACH )', '34309.00', 1, 75, 0, '2023-01-18 08:02:19', '2023-01-18 08:02:19'),
(59, 30, 67, '3 x BeerBubbler + 2 FREE', '70% DISCOUNT ( ₨ 12,296 / EACH )', '61480.00', 1, 70, 0, '2023-01-18 08:04:33', '2023-01-18 08:04:33'),
(60, 31, 67, '3 x SmartyDrone + 2 FREE', '70% DISCOUNT ( ₨ 13,678 / EACH )', '68388.00', 1, 70, 0, '2023-01-18 08:06:38', '2023-01-18 08:06:38'),
(61, 32, 67, '3 x BigTime Pro + 2 FREE', '75% DISCOUNT ( ₨ 6,862 / EACH )', '34309.00', 1, 75, 0, '2023-01-18 08:09:40', '2023-01-18 08:09:40'),
(62, 33, 67, '3 x LiveGuard360 + 2 FREE', '75% DISCOUNT ( ₨ 6,862 / EACH )', '34309.00', 1, 75, 0, '2023-01-18 08:12:27', '2023-01-18 08:12:27'),
(63, 34, 67, '3 x Moskitron LED + 2 FREE', '70% DISCOUNT ( ₨ 12,296 / EACH )', '61480.00', 1, 70, 0, '2023-01-18 08:20:01', '2023-01-18 08:20:01'),
(64, 35, 67, '3 x LightSafeX + 2 FREE', '72% DISCOUNT ( ₨ 13,125 / EACH )', '65625.00', 1, 72, 0, '2023-01-18 08:22:47', '2023-01-18 08:22:47'),
(65, 36, 67, '3 x DroneX Pro + 2 FREE', '70% DISCOUNT ( ₨ 13,678 / EACH )', '68388.00', 1, 70, 0, '2023-01-18 08:25:09', '2023-01-18 08:25:09'),
(66, 37, 67, '3 x SmartLight + 2 FREE', '70% DISCOUNT ( ₨ 6,862 / EACH )', '34309.00', 1, 70, 0, '2023-01-18 08:43:06', '2023-01-18 08:43:06'),
(67, 37, 67, '2 x SmartLight + 1 FREE', '67% DISCOUNT ( ₨ 7,599 / EACH )', '22796.00', 0, 67, 0, '2023-01-18 08:43:40', '2023-01-18 08:43:40'),
(68, 38, 67, '3 x Tactical Flashlight + 2 FREE', '71% DISCOUNT ( ₨ 9,026 / EACH )', '45131.00', 1, 71, 0, '2023-01-18 08:45:19', '2023-01-18 08:45:19'),
(69, 39, 67, '3 x EcoHeat S + 2 FREE', '69% DISCOUNT ( ₨ 12,757 / EACH )', '63783.00', 1, 69, 0, '2023-01-18 08:56:38', '2023-01-18 08:56:38'),
(70, 40, 67, '3 x SlimShaper + 2 FREE', '71% DISCOUNT ( ₨ 9,026 / EACH )', '45131.00', 1, 71, 0, '2023-01-18 08:58:59', '2023-01-18 08:58:59'),
(71, 41, 67, '3 x Y-Bra + 2 FREE', '75% DISCOUNT ( ₨ 4,559 / EACH )', '22796.00', 1, 75, 0, '2023-01-18 09:00:39', '2023-01-18 09:00:39');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` int(10) UNSIGNED DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Not Deleted, 1=Deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `campaign_id`, `category_id`, `name`, `slug`, `description`, `price`, `logo`, `image`, `discount`, `is_deleted`, `created_at`, `updated_at`) VALUES
(7, 10, 10, 'Samsung Mobile', 'samsungmobile', 'Samsung Mobile Description', '30.00', '1673619076.PNG', '1673619071.png', 10, 0, '2023-01-13 09:11:18', '2023-01-13 09:11:18'),
(8, 11, 12, 'LiveTemp Pro', 'livetemppro', 'The best forehead thermometer is guarantee of your safety', '22678.00', '1673959115.jpg', '1673959112.jpg', 50, 0, '2023-01-17 07:38:37', '2023-01-17 07:38:37'),
(9, 11, 13, 'TacticPhoneX', 'tacticphonex', 'SPECIAL OFFER: TACTICPHONEX', '22678.00', '1673960435.png', '1673960430.png', 50, 0, '2023-01-17 08:00:38', '2023-01-18 04:26:36'),
(10, 10, 13, 'MoskiX Band', 'moskixband', 'SPECIAL OFFER: MOSKIX BAND', '20387.00', '1673961046.jpg', '1673961043.jpg', 50, 0, '2023-01-17 08:10:48', '2023-01-17 08:10:48'),
(11, 11, 14, 'ZEROSHAVE PRO', 'zeroshavepro', 'PRICE: ₨ 30,695 ₨ 15,348 (50% OFF PER UNIT)', '15348.00', '1673963524.png', '1673963518.png', 50, 0, '2023-01-17 08:52:08', '2023-01-17 08:52:08'),
(12, 10, 12, 'IOnic Spa Shower', 'ionicspashower', 'Free yourself from boring shower routine and get toxins-free experience', '17907.00', '1674033744.jpg', '1674033740.jpg', 50, 0, '2023-01-18 04:22:26', '2023-01-18 04:22:26'),
(13, 10, 13, 'MasterHUD Pro', 'masterhudpro', 'SPECIAL OFFER: MASTERHUD PRO', '20174.00', '1674034174.jpg', '1674034171.jpg', 50, 0, '2023-01-18 04:29:36', '2023-01-18 04:29:36'),
(14, 10, 13, 'StealthHawk Pro', 'stealthhawkpro', 'SPECIAL OFFER: STEALTHHAWK PRO', '33774.00', '1674034273.png', '1674034267.png', 50, 0, '2023-01-18 04:31:17', '2023-01-18 04:31:17'),
(15, 10, 14, 'StableCAM PRO', 'stablecampro', 'StableCAM PRO belongs to new arrival category', '33774.00', '1674034828.png', '1674034819.png', 50, 0, '2023-01-18 04:40:30', '2023-01-18 04:40:30'),
(16, 10, 14, 'Roseal CuteBear', 'rosealcutebear', 'Roseal CuteBear belongs to new arrival category.', '11107.00', '1674034904.png', '1674034899.png', 50, 0, '2023-01-18 04:41:46', '2023-01-18 04:41:46'),
(17, 10, 14, 'Foamatic', 'foamatic', 'Foamatic belongs to New Arrival', '11107.00', '1674034976.png', '1674034972.png', 50, 0, '2023-01-18 04:42:58', '2023-01-18 04:42:58'),
(18, 10, 14, 'Smart Fitness', 'smartfitness', 'Smart Fitness belongs to new arrival category', '20174.00', '1674035043.png', '1674035039.png', 50, 0, '2023-01-18 04:44:06', '2023-01-18 04:44:06'),
(19, 10, 15, 'ECOTOUCH', 'ecotouch', 'SPECIAL OFFER: ECOTOUCH', '11283.00', '1674038405.jpg', '1674038401.jpg', 50, 0, '2023-01-18 05:40:07', '2023-01-18 05:40:07'),
(20, 10, 15, 'ACTIVBEAT 2.0', 'activbeat2.0', 'SPECIAL OFFER: ACTIVBEAT 2.0', '22796.00', '1674038554.jpg', '1674038551.jpg', 50, 0, '2023-01-18 05:42:36', '2023-01-18 05:42:36'),
(21, 10, 16, 'WATERBOOM 360', 'waterboom360', 'SPECIAL OFFER: WATERBOOM 360', '11283.00', '1674038710.jpg', '1674038706.jpg', 50, 0, '2023-01-18 05:45:12', '2023-01-18 07:53:20'),
(22, 10, 16, 'NANOSECURE', 'nanosecure', 'SPECIAL OFFER: NANOSECUR', '20493.00', '1674038868.png', '1674038864.png', 50, 0, '2023-01-18 05:47:51', '2023-01-18 07:42:19'),
(23, 10, 15, 'EXPLORE AIR', 'exploreair', 'SPECIAL OFFER: EXPLORE AIR', '22796.00', '1674039104.jpg', '1674039097.jpg', 50, 0, '2023-01-18 05:51:46', '2023-01-18 05:51:46'),
(24, 10, 16, 'GX SMARTWATCH', 'gxsmartwatch', 'SPECIAL OFFER: GX SMARTWATCH', '22796.00', '1674044762.png', '1674044758.png', 50, 0, '2023-01-18 07:26:05', '2023-01-18 07:26:05'),
(25, 10, 16, 'ECOTHERMAL', 'ecothermal', 'SPECIAL OFFER: ECOTHERMAL', '15428.00', '1674044950.jpg', '1674044947.jpg', 50, 0, '2023-01-18 07:29:12', '2023-01-18 07:29:12'),
(26, 10, 16, 'ECOWARM PRO', 'ecowarmpro', 'SPECIAL OFFER: ECOWARM PRO', '13585.00', '1674045139.jpg', '1674045136.jpg', 50, 0, '2023-01-18 07:32:21', '2023-01-18 07:32:21'),
(27, 10, 16, 'GERMSPURGE PRO', 'germspurgepro', 'SPECIAL OFFER: GERMSPURGE PRO', '11283.00', '1674045599.png', '1674045593.png', 50, 0, '2023-01-18 07:40:02', '2023-01-18 07:40:02'),
(28, 10, 16, 'CLEANROBOT', 'cleanrobot', 'SPECIAL OFFER: CLEANROBOT', '20493.00', '1674046600.jpg', '1674046597.jpg', 50, 0, '2023-01-18 07:56:43', '2023-01-18 07:56:43'),
(29, 10, 16, 'MEMORYSAFEX', 'memorysafex', 'SPECIAL OFFER: MEMORYSAFEX', '13585.00', '1674046765.jpg', '1674046762.jpg', 50, 0, '2023-01-18 07:59:27', '2023-01-18 07:59:27'),
(30, 10, 16, 'BEERBUBBLER', 'beerbubbler', 'SPECIAL OFFER: BEERBUBBLER', '20493.00', '1674047013.png', '1674047009.png', 50, 0, '2023-01-18 08:03:35', '2023-01-18 08:03:35'),
(31, 10, 16, 'SMARTYDRONE', 'smartydrone', 'SPECIAL OFFER: SMARTYDRONE', '22796.00', '1674047157.jpg', '1674047153.jpg', 50, 0, '2023-01-18 08:05:58', '2023-01-18 08:05:58'),
(32, 10, 16, 'BIGTIME PRO', 'bigtimepro', 'SPECIAL OFFER: BIGTIME PRO', '13585.00', '1674047327.png', '1674047321.png', 50, 0, '2023-01-18 08:08:51', '2023-01-18 08:08:51'),
(33, 10, 16, 'LIVEGUARD360', 'liveguard360', 'SPECIAL OFFER: LIVEGUARD360', '13585.00', '1674047491.png', '1674047485.png', 50, 0, '2023-01-18 08:11:34', '2023-01-18 08:11:34'),
(34, 10, 16, 'MOSKITRON LED', 'moskitronled', 'SPECIAL OFFER: MOSKITRON LED', '20493.00', '1674047955.png', '1674047951.png', 50, 0, '2023-01-18 08:19:17', '2023-01-18 08:19:17'),
(35, 10, 16, 'LIGHTSAFEX', 'lightsafex', 'SPECIAL OFFER: LIGHTSAFEX', '22796.00', '1674048114.jpg', '1674048111.jpg', 50, 0, '2023-01-18 08:21:56', '2023-01-18 08:21:56'),
(36, 10, 16, 'DRONEX PRO', 'dronexpro', 'SPECIAL OFFER: DRONEX PRO', '22796.00', '1674048258.jpg', '1674048255.jpg', 50, 0, '2023-01-18 08:24:21', '2023-01-18 08:24:21'),
(37, 10, 17, 'SMARTLIGHT', 'smartlight', 'SPECIAL OFFER: SMARTLIGHT', '11283.00', '1674049344.jpg', '1674049341.jpg', 50, 0, '2023-01-18 08:42:26', '2023-01-18 08:42:26'),
(38, 10, 17, 'TACTICAL FLASHLIGHT', 'tacticalflashlight', 'SPECIAL OFFER: TACTICAL FLASHLIGHT', '15428.00', '1674049481.jpg', '1674049477.jpg', 50, 0, '2023-01-18 08:44:43', '2023-01-18 08:44:43'),
(39, 10, 17, 'ECOHEAT S', 'ecoheats', 'SPECIAL OFFER: ECOHEAT S', '20493.00', '1674050156.png', '1674050152.png', 50, 0, '2023-01-18 08:55:59', '2023-01-18 08:55:59'),
(40, 10, 17, 'SLIMSHAPER', 'slimshaper', 'SPECIAL OFFER: SLIMSHAPER', '15428.00', '1674050305.jpg', '1674050301.jpg', 50, 0, '2023-01-18 08:58:27', '2023-01-18 08:58:27'),
(41, 10, 17, 'Y-BRA', 'y-bra', 'SPECIAL OFFER: Y-BRA', '8980.00', '1674050395.jpg', '1674050392.jpg', 50, 0, '2023-01-18 08:59:57', '2023-01-18 08:59:57');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `api_username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` bigint(20) NOT NULL DEFAULT 4,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `api_username`, `api_password`, `template`, `created_at`, `updated_at`) VALUES
(1, 'bigbluebrands', 'b!gB!L!u!3BR@nDS$23M', 1, '2023-01-13 15:29:42', '2023-01-27 10:24:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
