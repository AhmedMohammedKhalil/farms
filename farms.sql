-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 07:43 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farms`
--
CREATE DATABASE IF NOT EXISTS `farms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `farms`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
(1, 'الادمن', 'admin@farms.com', '$2y$10$/KWPNBjIbQMU7expzACMtuRnmEMcV7l4iu8tcOElLARetp3EBt7bu', 'team-2.jpg', '2022-05-04 16:06:44', '2022-05-07 04:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'open',
  `total` double NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `status`, `total`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'close', 8.4, 1, '2022-05-05 05:56:55', '2022-05-06 04:41:18'),
(3, 'close', 7.2, 1, '2022-05-06 04:41:18', '2022-05-07 03:32:34'),
(4, 'close', 16.1, 1, '2022-05-07 03:32:34', '2022-05-17 08:34:50'),
(7, 'close', 12, 1, '2022-05-17 09:07:16', '2022-05-17 09:10:07'),
(8, 'close', 10, 1, '2022-05-17 09:10:08', '2022-05-17 09:15:28'),
(9, 'open', 0, 1, '2022-05-17 09:15:28', '2022-05-18 01:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'شتلات', 'category_1.jpg', '2022-05-04 15:46:06', '2022-05-04 15:46:10'),
(2, 'خضار', 'category_2.jpg', '2022-05-04 15:46:12', '2022-05-04 15:46:15'),
(3, 'ورقيات', 'category_3.png', '2022-05-04 15:46:17', '2022-05-04 15:46:18'),
(4, 'اعسال', 'category_4.jpeg', '2022-05-04 15:46:20', '2022-05-04 15:46:22'),
(5, 'فواكه', 'category_5.jpeg', '2022-05-04 15:46:24', '2022-05-04 15:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `farms`
--

DROP TABLE IF EXISTS `farms`;
CREATE TABLE IF NOT EXISTS `farms` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `phone` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `farms_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `farms`
--

INSERT INTO `farms` (`id`, `name`, `email`, `password`, `status`, `phone`, `image`, `owner_name`, `address`, `details`, `created_at`, `updated_at`) VALUES
(1, 'مزرعة الخليفة', 'khalifa@farms.com', '$2y$10$/KWPNBjIbQMU7expzACMtuRnmEMcV7l4iu8tcOElLARetp3EBt7bu', 1, '69532152', 'project-4.jpg', 'فهد الداهوم', 'الكويت', 'تفاصيل', '2022-05-05 14:27:31', '2022-05-17 04:24:23'),
(2, 'مزرعة الوهيب', 'waheb@farms.com', '$2y$10$/KWPNBjIbQMU7expzACMtuRnmEMcV7l4iu8tcOElLARetp3EBt7bu', 1, '69537521', NULL, 'علي الحسيان', 'الكويت', 'تفاصيل', '2022-05-05 14:27:31', '2022-05-17 04:24:29'),
(3, 'مزرعة سرايا', 'sraya@farms.com', '$2y$10$/KWPNBjIbQMU7expzACMtuRnmEMcV7l4iu8tcOElLARetp3EBt7bu', 1, '69534951', NULL, 'عادل المهيني', 'الكويت', 'تفاصيل', '2022-05-05 14:27:31', '2022-05-17 04:24:33'),
(6, 'Dolore eligendi ea v', 'duny@mailinator.com', '$2y$10$9asryj7CQICDk6NQdz8ZDut3sNKJEFo55xy4bVc5Crknz3wSAvIA6', 2, '36526512', NULL, 'Vel debitis eveniet', 'Ex proident ducimus', 'Ea quis aliquam enim', '2022-05-15 18:33:18', '2022-05-17 04:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_05_04_031237_create_categories_table', 1),
(4, '2022_05_04_031324_create_admins_table', 1),
(5, '2022_05_04_031337_create_farms_table', 1),
(6, '2022_05_04_031411_create_products_table', 1),
(7, '2022_05_04_031508_create_carts_table', 1),
(8, '2022_05_04_031533_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `qty` double NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `cart_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_product_id_foreign` (`product_id`),
  KEY `orders_cart_id_foreign` (`cart_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `qty`, `product_id`, `cart_id`, `created_at`, `updated_at`) VALUES
(2, 3, 5, 1, '2022-05-06 03:54:16', '2022-05-06 03:54:16'),
(4, 3, 6, 1, '2022-05-06 03:54:41', '2022-05-06 03:54:41'),
(5, 4, 5, 3, '2022-05-07 03:31:41', '2022-05-07 03:31:41'),
(7, 1, 4, 4, '2022-05-17 06:04:32', '2022-05-17 06:04:32'),
(11, 4, 5, 4, '2022-05-17 07:49:34', '2022-05-17 07:49:34'),
(12, 3, 5, 4, '2022-05-17 07:52:11', '2022-05-17 07:52:11'),
(29, 12, 6, 7, '2022-05-17 09:09:56', '2022-05-17 09:09:56'),
(30, 10, 6, 8, '2022-05-17 09:15:08', '2022-05-17 09:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `available` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `price` double NOT NULL,
  `qty` bigint(20) NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `farm_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_farm_id_foreign` (`farm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `available`, `price`, `qty`, `details`, `image`, `category_id`, `farm_id`, `created_at`, `updated_at`) VALUES
(1, 'فراولة', '1', 3.08, 28, 'فراولة', NULL, 5, 1, '2022-05-05 19:34:29', '2022-05-17 06:39:13'),
(2, 'طماطم', '1', 2.65, 26, 'طماطم', NULL, 2, 2, '2022-05-05 19:34:29', '2022-05-05 19:34:29'),
(3, 'بصل', '1', 1.6, 15, 'بصل', NULL, 2, 3, '2022-05-05 19:34:29', '2022-05-05 19:34:29'),
(4, 'عسل', '1', 3.5, 10, 'عسل', NULL, 4, 1, '2022-05-05 19:34:29', '2022-05-05 19:34:29'),
(5, 'جرجير', '1', 1.8, 30, 'جرجير', NULL, 3, 2, '2022-05-05 19:34:29', '2022-05-05 19:34:29'),
(6, 'ثوم', '0', 1, 0, 'ثوم', NULL, 1, 3, '2022-05-05 19:34:29', '2022-05-17 09:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` double NOT NULL DEFAULT 100,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `image`, `balance`, `address`, `created_at`, `updated_at`) VALUES
(1, 'فهد عامر', 'fahd@gmail.com', '$2y$10$/KWPNBjIbQMU7expzACMtuRnmEMcV7l4iu8tcOElLARetp3EBt7bu', '69532952', 'team-b-10.jpg', 91.6, 'الكويت', '2022-05-05 14:27:31', '2022-05-06 03:56:14'),
(2, 'وهيب طلال', 'waheb@gmail.com', '$2y$10$/KWPNBjIbQMU7expzACMtuRnmEMcV7l4iu8tcOElLARetp3EBt7bu', '69537421', NULL, 100, 'الكويت', '2022-05-05 14:27:31', '2022-05-05 14:27:31'),
(3, 'عمير السويلمى', 'o.swilam@gmail.com', '$2y$10$/KWPNBjIbQMU7expzACMtuRnmEMcV7l4iu8tcOElLARetp3EBt7bu', '69534351', NULL, 100, 'الكويت', '2022-05-05 14:27:31', '2022-05-05 14:27:31');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_farm_id_foreign` FOREIGN KEY (`farm_id`) REFERENCES `farms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
