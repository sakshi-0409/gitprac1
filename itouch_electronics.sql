-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 11:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itouch_electronics`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `m_id` bigint(20) UNSIGNED NOT NULL,
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_image` blob NOT NULL,
  `des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `actual_price` double(8,2) NOT NULL,
  `dis_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `m_id`, `p_id`, `u_id`, `p_name`, `p_image`, `des`, `actual_price`, `dis_price`, `created_at`, `updated_at`) VALUES
(7, 2, 1, 3, 'Laptop', 0x313638383437353631302e6a7067, 'Hd display laptop', 43000.00, 42000.00, '2023-07-05 01:09:02', '2023-07-05 01:09:02'),
(21, 6, 4, 4, 'Laptop', 0x313638383437363130342e6a7067, 'Apple Laptop', 95000.00, 94000.00, '2023-07-06 04:22:06', '2023-07-06 04:22:06'),
(151, 11, 8, 2, 'Charger', 0x313638383535313938342e6a7067, 'Charger 002', 1200.00, 1150.00, '2023-07-20 06:25:39', '2023-07-20 06:25:39'),
(154, 6, 10, 2, 'Earbuds01', 0x313638393038303030322e6a7067, 'Earbuds', 3100.00, 3000.00, '2023-07-20 06:34:07', '2023-07-20 06:34:07'),
(177, 10, 15, 2, 'Watch', 0x313638393233343634302e6a7067, 'Watch', 5000.00, 4000.00, '2023-07-21 05:32:17', '2023-07-21 05:32:17'),
(178, 3, 14, 2, 'Television', 0x313638393233343330322e6a7067, 'Test', 41000.00, 40000.00, '2023-07-21 07:17:18', '2023-07-21 07:17:18');

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact`
--

CREATE TABLE `customer_contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivereds`
--

CREATE TABLE `delivereds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivereds`
--

INSERT INTO `delivereds` (`id`, `order_id`, `p_id`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(1, 'ry4yb9mz5au', 10, 1, 3000, '2023-07-21 04:29:04', '2023-07-21 04:29:04'),
(2, 'ry4yflBiQZX', 4, 1, 94000, '2023-07-21 04:45:33', '2023-07-21 04:45:33'),
(3, 'ry4ygrlO8TS', 10, 2, 6000, '2023-07-21 04:50:42', '2023-07-21 04:50:42');

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
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', '2023-07-04 07:26:40', '2023-07-04 07:26:40'),
(2, 'Lenovo', '2023-07-04 07:26:55', '2023-07-04 07:26:55'),
(3, 'LG', '2023-07-04 07:27:04', '2023-07-04 07:27:04'),
(4, 'Oppo', '2023-07-04 07:27:11', '2023-07-04 07:27:11'),
(5, 'Vivo', '2023-07-04 07:27:17', '2023-07-04 07:27:17'),
(6, 'Apple', '2023-07-04 07:34:32', '2023-07-04 07:34:32'),
(7, 'Hp', '2023-07-04 07:34:43', '2023-07-04 07:34:43'),
(8, 'Dell', '2023-07-04 07:34:51', '2023-07-04 07:34:51'),
(9, 'JBL', '2023-07-05 04:39:40', '2023-07-05 04:39:40'),
(10, 'Mi', '2023-07-05 04:39:55', '2023-07-05 04:39:55'),
(11, 'Accessories', '2023-07-05 04:42:24', '2023-07-05 04:42:24');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_23_053115_create_manufacturer_table', 1),
(6, '2023_06_23_065831_create_customer_contact_table', 1),
(7, '2023_06_23_072504_create_products_table', 1),
(8, '2023_06_30_072950_create_trendings_table', 1),
(9, '2023_07_04_122422_create_cart_table', 1),
(10, '2023_07_05_055503_add_pimage_to_cart_table', 2),
(11, '2023_07_05_060207_add_pimage_to_cart', 3),
(12, '2023_07_05_065115_create_wishlists_table', 1),
(13, '2023_07_12_071320_add_deleted_at_to_table', 4),
(14, '2023_07_12_073115_add_deleted_at_to_table', 5),
(15, '2023_07_12_073415_add_deleted_at_to_table', 6),
(16, '2023_07_17_070522_create_orders_table', 7),
(17, '2023_07_21_072837_add_paymode_to_orders_table', 8),
(18, '2023_07_21_092434_create_delivered_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amt` int(11) NOT NULL,
  `paymode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `p_id`, `quantity`, `amt`, `paymode`, `status`, `created_at`, `updated_at`) VALUES
(62, 'ry4ygrlO8TS', 8, 1, 1150, 'COD', 'Pending', '2023-07-21 02:06:27', '2023-07-21 02:06:27'),
(63, 'ry563rKqdne', 14, 1, 40000, 'COD', 'Pending', '2023-07-21 04:51:27', '2023-07-21 04:51:27'),
(64, 'ry563rKqdne', 2, 2, 28000, 'COD', 'Pending', '2023-07-21 04:51:27', '2023-07-21 04:51:27'),
(65, 'ry563rKqdne', 4, 1, 94000, 'COD', 'Pending', '2023-07-21 04:51:28', '2023-07-21 04:51:28'),
(66, 'ry563rKqdne', 10, 2, 6000, 'COD', 'Pending', '2023-07-21 04:51:28', '2023-07-21 04:51:28'),
(67, 'ry563rKqdne', 9, 1, 5100, 'COD', 'Pending', '2023-07-21 04:51:28', '2023-07-21 04:51:28'),
(68, 'ry563rKqdne', 3, 1, 25000, 'COD', 'Pending', '2023-07-21 04:51:28', '2023-07-21 04:51:28'),
(69, 'ry563rKqdne', 16, 2, 108000, 'COD', 'Pending', '2023-07-21 04:51:28', '2023-07-21 04:51:28'),
(70, 'ry564xX5FpZ', 15, 2, 8000, 'COD', 'Pending', '2023-07-21 04:52:09', '2023-07-21 04:52:09'),
(71, 'ry56g6vLW6p', 9, 1, 5100, 'UPI', 'Pending', '2023-07-21 04:58:54', '2023-07-21 04:58:54'),
(72, 'ry56glqwMFW', 2, 2, 28000, 'NET', 'Pending', '2023-07-21 04:59:09', '2023-07-21 04:59:09');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_image` blob NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `actual_price` double(8,2) NOT NULL,
  `dis_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_id`, `p_name`, `p_image`, `color`, `des`, `actual_price`, `dis_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Laptop', 0x313638383437353631302e6a7067, 'gray', 'Hd display laptop', 43000.00, 42000.00, '2023-07-04 07:30:10', '2023-07-12 01:59:17', '2023-07-12 01:59:17'),
(2, 5, 'Headphones', 0x313638383437363033362e77656270, 'blue', 'Headphones', 15000.00, 14000.00, '2023-07-04 07:37:16', '2023-07-21 07:39:58', '2023-07-21 07:39:58'),
(3, 4, 'Mobile', 0x313638383437363037332e6a7067, 'blue', 'A57 Mobile', 26000.00, 25000.00, '2023-07-04 07:37:53', '2023-07-04 07:37:53', NULL),
(4, 6, 'Laptop', 0x313638383437363130342e6a7067, 'gray', 'Apple Laptop', 95000.00, 94000.00, '2023-07-04 07:38:24', '2023-07-04 07:38:24', NULL),
(5, 5, 'Mobile', 0x313638383437363137312e77656270, 'pink', 'Curve Mobile', 65000.00, 64000.00, '2023-07-04 07:39:31', '2023-07-04 07:39:31', NULL),
(6, 1, 'Mobile', 0x313638383437363232372e77656270, 'white', 'Transparent Smart Phone', 94000.00, 93000.00, '2023-07-04 07:40:28', '2023-07-04 07:40:28', NULL),
(7, 9, 'Headphones', 0x313638383535313839382e6a7067, 'black', 'Headphones', 26000.00, 25000.00, '2023-07-05 04:41:38', '2023-07-05 04:41:38', NULL),
(8, 11, 'Charger', 0x313638383535313938342e6a7067, 'white', 'Charger 002', 1200.00, 1150.00, '2023-07-05 04:43:04', '2023-07-05 04:43:04', NULL),
(9, 11, 'Smart Charger', 0x313638383535323032332e6a7067, 'white', 'Smart Wireless Charger', 5500.00, 5100.00, '2023-07-05 04:43:43', '2023-07-05 04:43:43', NULL),
(10, 6, 'Earbuds01', 0x313638393038303030322e6a7067, 'white', 'Earbuds', 3100.00, 3000.00, '2023-07-11 07:23:22', '2023-07-11 07:23:22', NULL),
(11, 9, 'Watch', 0x313638393038303230392e6a7067, 'pink', 'Watch', 5000.00, 4999.00, '2023-07-11 07:26:49', '2023-07-11 07:26:49', NULL),
(12, 8, 'Laptop', 0x313638393038303333362e6a7067, 'black', 'Laptop', 51000.00, 50000.00, '2023-07-11 07:28:56', '2023-07-11 07:28:56', NULL),
(13, 9, 'Speakers', 0x313638393038303537342e6a7067, 'red', 'Speakers', 30000.00, 29999.00, '2023-07-11 07:32:54', '2023-07-11 07:32:54', NULL),
(14, 3, 'Television', 0x313638393233343330322e6a7067, 'black', 'Test', 41000.00, 40000.00, '2023-07-13 02:15:03', '2023-07-13 02:15:03', NULL),
(15, 10, 'Watch', 0x313638393233343634302e6a7067, 'pink', 'Watch', 5000.00, 4000.00, '2023-07-13 02:20:40', '2023-07-13 02:20:40', NULL),
(16, 2, 'Laptop', 0x313638393233343835382e6a7067, 'pink', 'Test', 56000.00, 54000.00, '2023-07-13 02:24:18', '2023-07-13 02:24:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trendings`
--

CREATE TABLE `trendings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_image` blob NOT NULL,
  `des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `actual_price` double(8,2) NOT NULL,
  `dis_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trendings`
--

INSERT INTO `trendings` (`id`, `p_id`, `p_name`, `p_image`, `des`, `actual_price`, `dis_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 5, 'Headphones', 0x313638383437363033362e77656270, 'Headphones', 15000.00, 14000.00, '2023-07-04 07:41:04', '2023-07-04 07:41:04', NULL),
(4, 9, 'Headphones', 0x313638383535313839382e6a7067, 'Headphones', 26000.00, 25000.00, '2023-07-05 04:45:11', '2023-07-05 04:45:11', NULL),
(5, 6, 'Laptop', 0x313638383437363130342e6a7067, 'Apple Laptop', 95000.00, 94000.00, '2023-07-12 02:17:34', '2023-07-12 02:17:34', NULL),
(7, 4, 'Mobile', 0x313638383437363037332e6a7067, 'A57 Mobile', 26000.00, 25000.00, '2023-07-12 02:34:25', '2023-07-12 02:34:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$56yLr0hCj5nHD/nd5Le8seS5xZRZulJ2xATh7/MTJrRdX12FrjHSe', NULL, 1, '2023-07-04 07:33:22', '2023-07-04 07:33:22'),
(2, 'sakshi0409', 'sakshi@gmail.com', NULL, '$2y$10$vZXOrJfig7y0WP6jaQ60Ielhuw/4w2OY4cmvC6tsEIAJcDp8YEf3y', '7eX3bghLvEsOFCt0fOub3EpekWQHuTkVWCO1W1AX9jeIaQzDQy30IYKc42IK', NULL, '2023-07-04 07:48:21', '2023-07-06 01:35:42'),
(3, 'test', 'test@gmail.com', NULL, '$2y$10$MhWTAJKiBnS.LE8q2wrTtOevLj3Znb/Oc0R3YCJIZCtgbQ9FyGThC', NULL, NULL, '2023-07-05 01:08:51', '2023-07-05 01:08:51'),
(4, 'sakshi04', 'sakshi04@gmail.com', NULL, '$2y$10$VplSf6QUkPnvAQYz9GLF7uEu/MPbA8Y2bzep.FKpezYs3JEAhxCpG', NULL, NULL, '2023-07-05 04:46:12', '2023-07-05 04:46:12');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `m_id` bigint(20) UNSIGNED NOT NULL,
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `u_id` bigint(20) UNSIGNED NOT NULL,
  `p_image` blob NOT NULL,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `actual_price` double(8,2) NOT NULL,
  `dis_price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `m_id`, `p_id`, `u_id`, `p_image`, `p_name`, `des`, `actual_price`, `dis_price`, `created_at`, `updated_at`) VALUES
(4, 5, 2, 3, 0x313638383437363033362e77656270, 'Headphones', 'Headphones', 15000.00, 14000.00, '2023-07-05 02:23:33', '2023-07-05 02:23:33'),
(5, 11, 9, 4, 0x313638383535323032332e6a7067, 'Smart Charger', 'Smart Wireless Charger', 5500.00, 5100.00, '2023-07-05 04:53:16', '2023-07-05 04:53:16'),
(65, 6, 4, 2, 0x313638383437363130342e6a7067, 'Laptop', 'Apple Laptop', 95000.00, 94000.00, '2023-07-19 06:10:07', '2023-07-19 06:10:07'),
(69, 11, 9, 2, 0x313638383535323032332e6a7067, 'Smart Charger', 'Smart Wireless Charger', 5500.00, 5100.00, '2023-07-20 06:27:00', '2023-07-20 06:27:00'),
(72, 8, 12, 2, 0x313638393038303333362e6a7067, 'Laptop', 'Laptop', 51000.00, 50000.00, '2023-07-20 06:33:46', '2023-07-20 06:33:46'),
(73, 2, 16, 2, 0x313638393233343835382e6a7067, 'Laptop', 'Test', 56000.00, 54000.00, '2023-07-20 06:33:50', '2023-07-20 06:33:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_m_id_foreign` (`m_id`),
  ADD KEY `cart_p_id_foreign` (`p_id`),
  ADD KEY `cart_u_id_foreign` (`u_id`);

--
-- Indexes for table `customer_contact`
--
ALTER TABLE `customer_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivereds`
--
ALTER TABLE `delivereds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_p_id_foreign` (`p_id`);

--
-- Indexes for table `trendings`
--
ALTER TABLE `trendings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `customer_contact`
--
ALTER TABLE `customer_contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivereds`
--
ALTER TABLE `delivereds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `trendings`
--
ALTER TABLE `trendings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `cart_m_id_foreign` FOREIGN KEY (`m_id`) REFERENCES `manufacturers` (`id`),
  ADD CONSTRAINT `cart_p_id_foreign` FOREIGN KEY (`p_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_u_id_foreign` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_p_id_foreign` FOREIGN KEY (`p_id`) REFERENCES `manufacturers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
