-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 11:22 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lpg`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `publication_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Household', 1, 1, 1, '2018-11-14 00:28:46', '2018-11-20 05:19:08'),
(2, 'Commercial', 1, 1, 1, '2018-11-14 00:30:33', '2018-11-20 05:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `email_address`, `password`, `mobile`, `address`, `city`, `country`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 'Omar Faruk', 'ofsajeeb@gmail.com', '3fed945280d72e302ebaceee5717f9e8', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Omar Faruk', 'ofsajeeb@gmail.com', '3fed945280d72e302ebaceee5717f9e8', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Omar Faruk', 'ofsajeeb@gmail.com', '3fed945280d72e302ebaceee5717f9e8', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Omar Faruk', 'ofsajeeb@gmail.com', '3fed945280d72e302ebaceee5717f9e8', '01733811596', 'Badda,Dhaka', 'Dhaka', 'Bangladesh', '1212', NULL, NULL),
(5, 'sajeeb', 'ofsajeeb@gmail.com', '3fed945280d72e302ebaceee5717f9e8', '01733811596', 'hjhhk', 'Dhaka', NULL, NULL, NULL, NULL),
(6, 'Omar Faruk', 'ofsajeeb@gmail.com', '3fed945280d72e302ebaceee5717f9e8', '01733811596', 'Badda', 'Dhaka', 'BD', '1212', NULL, NULL),
(7, 'sajeeb', 'ofsajeeb@gmail.com', 'e4da3b7fbbce2345d7772b0674a318d5', '017', 'sdsg', 'sfvsd', 'sfvas', '1212', NULL, NULL),
(8, 'Omar Faruk', 'ofsajeeb@gmail.com', '3fed945280d72e302ebaceee5717f9e8', '01733811596', 'jfdh', 'Dhaka', 'Bangladesh', '1212', NULL, NULL),
(9, 'Omar Faruk', 'ofsajeeb@gmail.com', '3fed945280d72e302ebaceee5717f9e8', '01733811596', 'asdfb', 'Dhaka', 'BD', '1212', NULL, NULL),
(10, 'Habibur Rahaman', 'sajeeb@ahmedamin.com', '66f041e16a60928b05a7e228a89c3799', '01832541833', 'Dhaka', 'dhaka', 'Bangladesh', NULL, NULL, NULL),
(11, 'Kamal Mondol', 'sajeeb@ahmedamin.com', '66f041e16a60928b05a7e228a89c3799', '01733811596', 'Badda', 'Dhaka', 'Bangladesh', NULL, NULL, NULL),
(12, 'Omar Faruk', 'ofsajeeb@gmail.com', '3fed945280d72e302ebaceee5717f9e8', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image_name`, `image_url`, `description`, `publication_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Gallery image 1', 'resources/assets/images/gallery/155123_index.jpg', NULL, 1, 1, 1, NULL, '2018-12-06 09:51:23'),
(2, 'Gallery image 2', 'resources/assets/images/gallery/155148_images.jpg', NULL, 1, 1, 1, NULL, '2018-12-06 09:51:48'),
(3, 'My image 3', 'resources/assets/images/gallery/155341_ima222ges.jpg', NULL, 1, 1, 1, NULL, '2018-12-06 09:53:41'),
(4, 'My image 4', 'resources/assets/images/gallery/155358_imag333es.jpg', NULL, 1, 1, 1, NULL, '2018-12-06 09:53:58'),
(5, 'My image 5', 'resources/assets/images/gallery/123210_pexels-photo-305070.jpeg', NULL, 1, 1, 1, NULL, '2018-12-06 06:32:10'),
(6, 'My image 6', 'resources/assets/images/gallery/123237_pexels-photo-853168.jpeg', NULL, 1, 1, 1, NULL, '2018-12-06 06:32:37'),
(7, 'My image 7', 'resources/assets/images/gallery/154600_gas-cylinder3.jpg', NULL, 1, 1, 1, NULL, '2018-12-06 09:46:00');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_14_054424_create_categories_table', 2),
(4, '2018_11_14_055306_create_products_table', 3),
(5, '2018_11_14_064058_create_gallery_table', 4),
(6, '2018_11_27_092319_create_customer_table', 5),
(7, '2018_11_27_110830_create_shipping_table', 6),
(8, '2018_11_29_101908_create_payment_table', 7),
(9, '2018_11_29_102117_create_order_table', 7),
(10, '2018_11_29_102209_create_order_details', 7);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` double(8,2) NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 9, 7, 1, 8050.00, 'delivired', NULL, NULL),
(4, 9, 7, 4, 2300.00, 'pending', NULL, NULL),
(5, 9, 7, 5, 2300.00, 'pending', NULL, NULL),
(6, 9, 7, 6, 2300.00, 'pending', NULL, NULL),
(7, 9, 7, 7, 2300.00, 'completed', NULL, NULL),
(8, 9, 7, 8, 2300.00, 'pending', NULL, NULL),
(9, 10, 8, 9, 39100.00, 'pending', NULL, NULL),
(10, 11, 9, 10, 34500.00, 'pending', NULL, NULL),
(11, 11, 9, 11, 34500.00, 'pending', NULL, NULL),
(12, 11, 9, 12, 34500.00, 'pending', NULL, NULL),
(13, 11, 9, 13, 34500.00, 'pending', NULL, NULL),
(14, 11, 9, 14, 34500.00, 'pending', NULL, NULL),
(15, 11, 9, 15, 34500.00, 'pending', NULL, NULL),
(16, 11, 9, 16, 34500.00, 'pending', NULL, NULL),
(17, 11, 9, 17, 34500.00, 'pending', NULL, NULL),
(18, 11, 9, 18, 34500.00, 'pending', NULL, NULL),
(19, 11, 9, 19, 34500.00, 'confirmed', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_qty`, `product_price`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'BARAKA LPG 12kg', 1, 2000.00, 2300.00, NULL, NULL),
(3, 1, 2, 'BARAKA LPG 24kg', 1, 5000.00, 5750.00, NULL, NULL),
(4, 4, 1, 'BARAKA LPG 12kg', 1, 2000.00, 2300.00, NULL, NULL),
(5, 5, 1, 'BARAKA LPG 12kg', 1, 2000.00, 2300.00, NULL, NULL),
(6, 6, 1, 'BARAKA LPG 12kg', 1, 2000.00, 2300.00, NULL, NULL),
(7, 7, 1, 'BARAKA LPG 12kg', 1, 2000.00, 2300.00, NULL, NULL),
(8, 8, 1, 'BARAKA LPG 12kg', 1, 2000.00, 2300.00, NULL, NULL),
(9, 9, 1, 'BARAKA LPG 12kg', 1, 2000.00, 2300.00, NULL, NULL),
(10, 9, 2, 'BARAKA LPG 24kg', 5, 5000.00, 28750.00, NULL, NULL),
(11, 9, 3, 'BARAKA LPG 35kg', 1, 7000.00, 8050.00, NULL, NULL),
(12, 10, 1, 'BARAKA LPG 12kg', 2, 2000.00, 4600.00, NULL, NULL),
(13, 10, 2, 'BARAKA LPG 24kg', 1, 5000.00, 5750.00, NULL, NULL),
(14, 10, 3, 'BARAKA LPG 35kg', 3, 7000.00, 24150.00, NULL, NULL),
(15, 11, 1, 'BARAKA LPG 12kg', 2, 2000.00, 4600.00, NULL, NULL),
(16, 11, 2, 'BARAKA LPG 24kg', 1, 5000.00, 5750.00, NULL, NULL),
(17, 11, 3, 'BARAKA LPG 35kg', 3, 7000.00, 24150.00, NULL, NULL),
(18, 12, 1, 'BARAKA LPG 12kg', 2, 2000.00, 4600.00, NULL, NULL),
(19, 12, 2, 'BARAKA LPG 24kg', 1, 5000.00, 5750.00, NULL, NULL),
(20, 12, 3, 'BARAKA LPG 35kg', 3, 7000.00, 24150.00, NULL, NULL),
(21, 13, 1, 'BARAKA LPG 12kg', 2, 2000.00, 4600.00, NULL, NULL),
(22, 13, 2, 'BARAKA LPG 24kg', 1, 5000.00, 5750.00, NULL, NULL),
(23, 13, 3, 'BARAKA LPG 35kg', 3, 7000.00, 24150.00, NULL, NULL),
(24, 14, 1, 'BARAKA LPG 12kg', 2, 2000.00, 4600.00, NULL, NULL),
(25, 14, 2, 'BARAKA LPG 24kg', 1, 5000.00, 5750.00, NULL, NULL),
(26, 14, 3, 'BARAKA LPG 35kg', 3, 7000.00, 24150.00, NULL, NULL),
(27, 15, 1, 'BARAKA LPG 12kg', 2, 2000.00, 4600.00, NULL, NULL),
(28, 15, 2, 'BARAKA LPG 24kg', 1, 5000.00, 5750.00, NULL, NULL),
(29, 15, 3, 'BARAKA LPG 35kg', 3, 7000.00, 24150.00, NULL, NULL),
(30, 16, 1, 'BARAKA LPG 12kg', 2, 2000.00, 4600.00, NULL, NULL),
(31, 16, 2, 'BARAKA LPG 24kg', 1, 5000.00, 5750.00, NULL, NULL),
(32, 16, 3, 'BARAKA LPG 35kg', 3, 7000.00, 24150.00, NULL, NULL),
(33, 17, 1, 'BARAKA LPG 12kg', 2, 2000.00, 4600.00, NULL, NULL),
(34, 17, 2, 'BARAKA LPG 24kg', 1, 5000.00, 5750.00, NULL, NULL),
(35, 17, 3, 'BARAKA LPG 35kg', 3, 7000.00, 24150.00, NULL, NULL),
(36, 18, 1, 'BARAKA LPG 12kg', 2, 2000.00, 4600.00, NULL, NULL),
(37, 18, 2, 'BARAKA LPG 24kg', 1, 5000.00, 5750.00, NULL, NULL),
(38, 18, 3, 'BARAKA LPG 35kg', 3, 7000.00, 24150.00, NULL, NULL),
(39, 19, 1, 'BARAKA LPG 12kg', 2, 2000.00, 4600.00, NULL, NULL),
(40, 19, 2, 'BARAKA LPG 24kg', 1, 5000.00, 5750.00, NULL, NULL),
(41, 19, 3, 'BARAKA LPG 35kg', 3, 7000.00, 24150.00, NULL, NULL);

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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_type`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'cash_on_delivery', 'paid', NULL, NULL),
(4, 'cash_on_delivery', 'pending', NULL, NULL),
(5, 'cash_on_delivery', 'pending', NULL, NULL),
(6, 'cash_on_delivery', 'pending', NULL, NULL),
(7, 'cash_on_delivery', 'pending', NULL, NULL),
(8, 'cash_on_delivery', 'pending', NULL, NULL),
(9, 'cash_on_delivery', 'pending', NULL, NULL),
(10, 'cash_on_delivery', 'pending', NULL, NULL),
(11, 'cash_on_delivery', 'pending', NULL, NULL),
(12, 'cash_on_delivery', 'pending', NULL, NULL),
(13, 'cash_on_delivery', 'pending', NULL, NULL),
(14, 'cash_on_delivery', 'pending', NULL, NULL),
(15, 'cash_on_delivery', 'pending', NULL, NULL),
(16, 'cash_on_delivery', 'pending', NULL, NULL),
(17, 'cash_on_delivery', 'pending', NULL, NULL),
(18, 'cash_on_delivery', 'pending', NULL, NULL),
(19, 'cash_on_delivery', 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valve_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valve_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `product_pic`, `price`, `qty`, `weight`, `valve_size`, `valve_type`, `publication_status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'BARAKA LPG 12kg', 1, 'resources/assets/images/product/18p-1.jpg', '2000.00', '45', '12 kg', '22 mm', 'Compact (Self closing)', 1, 1, 1, '2018-08-29 22:59:54', '2018-11-26 09:39:31'),
(2, 'BARAKA LPG 24kg', 1, 'resources/assets/images/product/17p-3.jpg', '5000.00', '', '24kg (Premium)', '22 mm', 'Compact (Self closing)', 1, 1, 1, '2018-08-30 00:39:53', '2018-11-19 11:09:45'),
(3, 'BARAKA LPG 35kg', 2, 'resources/assets/images/product/20p-2.jpg', '7000.00', '', '35kg', '22 mm', 'Compact & POL type', 1, 1, 0, '2018-08-30 00:58:18', '2018-08-30 00:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `shipping_name`, `mobile`, `address`, `city`, `country`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 'Faruk Sajeeb', '01832541833', 'Badda', 'Dhaka', 'Bangladesh', '1212', NULL, NULL),
(2, 'Faruk Sajeeb', '01832541833', 'Badda', 'Dhaka', 'Bangladesh', '1212', NULL, NULL),
(3, 'Faruk Sajeeb', '01733811596', 'jhjkj', NULL, NULL, NULL, NULL, NULL),
(4, 'Faruk Sajeeb', '01733811596', 'Badda', 'Dhaka', 'BD', '1212', NULL, NULL),
(5, 'safasf', '12312', 'serge', 'sgwe', 'fvsefg', '2222', NULL, NULL),
(6, 'Faruk Sajeeb', '01733811596', 'gjghf', 'Dhaka', 'Bangladesh', '1212', NULL, NULL),
(8, 'Habibur Rahman', '01832541833', 'Dhaka', 'Badda', 'BD', NULL, NULL, NULL),
(9, 'Habibur Rahman', '01733811596', 'Alexander', 'Dhaka', 'Bangladesh', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audit_trial`
--

CREATE TABLE `tbl_audit_trial` (
  `Audit_trialID` int(11) NOT NULL,
  `AffectedTable` varchar(20) NOT NULL,
  `AffectedID` varchar(200) NOT NULL,
  `AffectedDateTime` datetime NOT NULL,
  `UserID` int(3) DEFAULT NULL,
  `MachineIP` varchar(100) NOT NULL,
  `TaskType` varchar(20) NOT NULL COMMENT 'edit,delete,insert,delete forever,active,inactive,restore'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_audit_trial`
--

INSERT INTO `tbl_audit_trial` (`Audit_trialID`, `AffectedTable`, `AffectedID`, `AffectedDateTime`, `UserID`, `MachineIP`, `TaskType`) VALUES
(652, 'categories', '1', '2018-11-17 12:23:12', 1, '127.0.0.1', 'edit'),
(653, 'categories', '2', '2018-11-17 12:38:16', 1, '127.0.0.1', 'edit'),
(654, 'categories', '2', '2018-11-17 12:39:15', 1, '127.0.0.1', 'edit'),
(655, 'categories', '1', '2018-11-17 12:41:24', 1, '127.0.0.1', 'edit'),
(656, 'categories', '1', '2018-11-17 12:42:17', 1, '127.0.0.1', 'edit'),
(657, 'categories', '1', '2018-11-17 13:06:48', 1, '127.0.0.1', 'edit'),
(658, 'categories', '2', '2018-11-17 13:08:01', 1, '127.0.0.1', 'edit'),
(659, 'categories', '1', '2018-11-17 14:24:54', 1, '127.0.0.1', 'edit'),
(660, 'categories', '2', '2018-11-17 14:25:05', 1, '127.0.0.1', 'edit'),
(661, 'categories', '1', '2018-11-17 14:25:10', 1, '127.0.0.1', 'edit'),
(662, 'categories', '2', '2018-11-17 14:25:16', 1, '127.0.0.1', 'edit'),
(663, 'categories', '1', '2018-11-17 14:25:22', 1, '127.0.0.1', 'edit'),
(664, 'categories', '4', '2018-11-17 16:09:44', 1, '127.0.0.1', 'delete'),
(665, 'categories', '1', '2018-11-17 17:16:11', 1, '127.0.0.1', 'edit'),
(666, 'products', '1', '2018-11-17 17:18:34', 1, '127.0.0.1', 'edit'),
(667, 'products', '2', '2018-11-17 17:20:22', 1, '127.0.0.1', 'edit'),
(668, 'products', '1', '2018-11-17 17:21:30', 1, '127.0.0.1', 'edit'),
(669, 'products', '1', '2018-11-17 17:21:38', 1, '127.0.0.1', 'edit'),
(670, 'categories', '3', '2018-11-17 17:28:43', 1, '127.0.0.1', 'delete'),
(671, 'products', '1', '2018-11-19 17:09:41', 1, '127.0.0.1', 'edit'),
(672, 'products', '2', '2018-11-19 17:09:45', 1, '127.0.0.1', 'edit'),
(673, 'products', '1', '2018-11-20 10:57:00', 1, '::1', 'edit'),
(674, 'categories', '1', '2018-11-20 11:19:08', 1, '::1', 'edit'),
(675, 'categories', '2', '2018-11-20 11:19:11', 1, '::1', 'edit'),
(676, 'products', '1', '2018-11-20 12:04:41', 1, '::1', 'edit'),
(677, 'products', '1', '2018-11-20 12:22:56', 1, '::1', 'edit'),
(678, 'products', '1', '2018-11-20 12:28:11', 1, '::1', 'edit'),
(679, 'products', '1', '2018-11-20 12:28:31', 1, '::1', 'edit'),
(680, 'products', '1', '2018-11-20 12:38:27', 1, '::1', 'edit'),
(681, 'products', '4', '2018-11-20 13:23:41', 1, '::1', 'insert'),
(682, 'products', '4', '2018-11-20 13:24:01', 1, '::1', 'edit'),
(683, 'products', '4', '2018-11-20 13:25:36', 1, '::1', 'delete'),
(684, 'products', '1', '2018-11-26 15:39:28', 1, '127.0.0.1', 'edit'),
(685, 'products', '1', '2018-11-26 15:39:31', 1, '127.0.0.1', 'edit'),
(686, 'gallery', '1', '2018-11-26 16:08:12', 1, '127.0.0.1', 'edit'),
(687, 'gallery', '2', '2018-11-26 16:08:16', 1, '127.0.0.1', 'edit'),
(688, 'gallery', '8', '2018-11-26 16:23:09', 1, '127.0.0.1', 'delete'),
(689, 'gallery', '3', '2018-12-06 12:30:29', 1, '127.0.0.1', 'edit');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audit_trial_detail`
--

CREATE TABLE `tbl_audit_trial_detail` (
  `AuditTrialDetailID` int(11) NOT NULL,
  `AuditTrialID` int(11) NOT NULL,
  `ColumnName` varchar(100) NOT NULL,
  `OldValue` text,
  `NewValue` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_audit_trial_detail`
--

INSERT INTO `tbl_audit_trial_detail` (`AuditTrialDetailID`, `AuditTrialID`, `ColumnName`, `OldValue`, `NewValue`) VALUES
(283, 652, 'category_name', 'Household2', 'Household'),
(284, 652, 'publication_status', '0', '1'),
(285, 654, 'category_name', 'Commercial2', 'Commercial'),
(286, 654, 'publication_status', '0', '1'),
(287, 656, 'category_name', 'Household2', 'Household'),
(288, 656, 'publication_status', '0', '1'),
(289, 657, 'publication_status', '1', '0'),
(290, 658, 'publication_status', '1', '0'),
(291, 659, 'publication_status', '0', '1'),
(292, 660, 'publication_status', '0', '1'),
(293, 661, 'publication_status', '1', '0'),
(294, 662, 'publication_status', '1', '0'),
(295, 663, 'publication_status', '0', '1'),
(296, 665, 'publication_status', '1', '0'),
(297, 666, 'publication_status', '1', '0'),
(298, 667, 'publication_status', '1', '0'),
(299, 668, 'publication_status', '0', '1'),
(300, 669, 'publication_status', '1', '0'),
(301, 671, 'publication_status', '0', '1'),
(302, 672, 'publication_status', '0', '1'),
(303, 673, 'publication_status', '1', '0'),
(304, 674, 'publication_status', '0', '1'),
(305, 675, 'publication_status', '0', '1'),
(306, 676, 'publication_status', '0', '1'),
(307, 677, 'price', '0.00', NULL),
(308, 677, 'weight', '12kg ', NULL),
(309, 678, 'price', NULL, '2000'),
(310, 679, 'weight', NULL, '12 kg'),
(311, 680, 'qty', NULL, '45'),
(312, 682, 'publication_status', '1', '0'),
(313, 684, 'publication_status', '1', '0'),
(314, 685, 'publication_status', '0', '1'),
(315, 686, 'publication_status', '0', '1'),
(316, 687, 'publication_status', '1', '0'),
(317, 689, 'publication_status', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sajeeb Ahasan', 'ofsajeeb@gmail.com', '$2y$10$lVtylf2/zz5dDbZhKaHd0eCLLrPmlEGtSuBQ1I/1rVh2Y2XCMJwsK', 'JRydHCqSiq7JxWA8y2uP6gBG6xztvV3G5rjkiVFoY2eet7Q3dMiiplr5Ewr3', '2018-08-12 12:52:08', '2018-08-12 12:52:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_audit_trial`
--
ALTER TABLE `tbl_audit_trial`
  ADD PRIMARY KEY (`Audit_trialID`);

--
-- Indexes for table `tbl_audit_trial_detail`
--
ALTER TABLE `tbl_audit_trial_detail`
  ADD PRIMARY KEY (`AuditTrialDetailID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_audit_trial`
--
ALTER TABLE `tbl_audit_trial`
  MODIFY `Audit_trialID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=690;

--
-- AUTO_INCREMENT for table `tbl_audit_trial_detail`
--
ALTER TABLE `tbl_audit_trial_detail`
  MODIFY `AuditTrialDetailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
