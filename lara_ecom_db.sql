-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2019 at 12:14 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_ecom_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_11_30_021906_create_tbl_admin_table', 1),
(4, '2016_12_11_154228_create_tbl_category_table', 2),
(5, '2016_12_25_130612_create_tbl_manufacturer_table', 3),
(6, '2017_01_04_020417_create_tbl_product_table', 4),
(7, '2017_01_20_191344_create_tbl_customer_table', 5),
(8, '2017_01_30_173839_create_tbl_payment_table', 6),
(9, '2017_01_31_024249_create_tbl_order_table', 7),
(10, '2017_01_31_024340_create_tbl_order_details_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `access_level` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `admin_name`, `admin_email_address`, `admin_password`, `access_level`, `created_at`, `updated_at`) VALUES
(1, 'First Admin', 'admin@gmail.com', 'e3ceb5881a0a1fdaad01296d7554868d', 1, '2016-12-01 18:00:00', '2016-12-01 18:00:00'),
(2, 'Second Admin', 's_admin@gmail.com', 'e3ceb5881a0a1fdaad01296d7554868d', 2, '2016-12-01 18:00:00', '2016-12-01 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'TV', 'test test<br>', 1, NULL, NULL),
(3, 'Men', '-----', 1, NULL, NULL),
(4, 'Women', '-------', 1, NULL, NULL),
(5, 'Kids', '---', 1, NULL, NULL),
(6, 'Mobile', '--', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `first_name`, `last_name`, `email_address`, `password`, `mobile`, `address`, `gender`, `dob`, `city`, `country`, `zip_code`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Hossain', 'admin@gmail.com', '222222', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'davehellmanjr', 'sdf', 'admin@gmail.com', '222222', '123', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'admin', 'sdf', 'shafiul.alam@gmail.com', '111111', '0111112222', 'asd', NULL, NULL, 'we', '2', 'weq', NULL, NULL),
(4, 'eee', 'eee', 'adeemin@gmail.com', '222222', '3333', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'ms', 'hossain', 'ms@gmail.com', '222222', '222222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'msh', 'hossain', 'admin@gmail.com', '222222', '222222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'msh', 'Hossain', 'admin@gmail.com', '222222', '222222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'qqq', 'qqq', 'qq@gmail.com', '222222', '222222', 'aaaaa', NULL, NULL, 'aaaaaaaaaaa', '15', 'aaaaaaaaaaa', NULL, NULL),
(9, 'sdf', 'sdf', 'admin@gmail.com', '222222', '2323', 'Address*', NULL, NULL, '', '0', '', NULL, NULL),
(10, 'zd', 'asd', 'admin@gmail.com', '222222', '24234', 'Address*asd', NULL, NULL, 'asd', '2', 'asd', NULL, NULL),
(11, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'trt', 'rt', 'et@ta.com', 'rt', 'rrr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'cc', 'cc', 'c@c.com', 'cc', 'ccc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'rr', 'rr', 'rr@gmail.com', '222222', 'rrr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'us', 'sd', 'admin@gmail.com', '222222', 'ds', 'Address*', NULL, NULL, '', '0', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturer`
--

CREATE TABLE `tbl_manufacturer` (
  `id` int(10) UNSIGNED NOT NULL,
  `manufacturer_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manufacturer_description` text COLLATE utf8_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_manufacturer`
--

INSERT INTO `tbl_manufacturer` (`id`, `manufacturer_name`, `manufacturer_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'Samsung', 1, NULL, NULL),
(2, 'Nokia', 'Nokia description<br>', 1, NULL, NULL),
(3, 'Walton', '-', 1, NULL, NULL),
(4, 'Apple', '---', 1, NULL, NULL),
(5, 'LG', '----', 1, NULL, NULL),
(6, 'Aptex Ltd', '', 1, NULL, NULL),
(7, 'Aarong', '', 1, NULL, NULL),
(8, 'Lubnan', '', 1, NULL, NULL),
(9, 'Banglar Mela', '', 1, NULL, NULL),
(10, 'Cat''s Eye', '', 1, NULL, NULL),
(11, 'Huawei', '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT '1',
  `order_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_status`, `order_total`, `created_at`, `updated_at`) VALUES
(1, 8, 8, 1, 1, 114950.00, '2017-02-01 03:31:39', NULL),
(2, 9, 9, 2, 1, 73150.00, '2017-02-01 06:04:42', NULL),
(3, 10, 10, 3, 1, 52250.00, '2018-09-18 02:27:42', NULL),
(4, 10, 10, 4, 1, 52250.00, '2018-09-18 02:27:54', NULL),
(5, 16, 16, 5, 1, 198550.00, '2019-01-22 03:06:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `orders_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL COMMENT 'individual product price',
  `product_sales_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`orders_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Iphone 7', 70000.00, 1, NULL, NULL),
(2, 1, 2, 'Walton TV', 40000.00, 1, NULL, NULL),
(3, 2, 4, 'Iphone 7', 70000.00, 1, '2017-02-01 06:04:42', NULL),
(4, 3, 5, 'LG Smart TV', 50000.00, 1, '2018-09-18 02:27:43', NULL),
(5, 5, 2, 'Walton TV', 40000.00, 1, '2019-01-22 03:06:43', NULL),
(6, 5, 5, 'LG Smart TV', 50000.00, 3, '2019-01-22 03:06:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_type`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'cash_on_delivery', 'Pending', '2017-02-01 03:31:39', NULL),
(2, 'paypal', 'Pending', '2017-02-01 06:04:42', NULL),
(3, 'cash_on_delivery', 'Pending', '2018-09-18 02:27:42', NULL),
(4, 'paypal', 'Pending', '2018-09-18 02:27:54', NULL),
(5, 'paypal', 'Pending', '2019-01-22 03:06:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `reorder_level` int(11) NOT NULL,
  `is_featured` tinyint(4) NOT NULL,
  `product_short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_long_description` text COLLATE utf8_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `category_id`, `manufacturer_id`, `product_name`, `product_price`, `product_quantity`, `reorder_level`, `is_featured`, `product_short_description`, `product_long_description`, `product_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 'Nokia Phone', 50000.00, 50, 20, 1, 'short', 'long', 'public/product_image/vFVpilfHdFHjyfY0lCCA.jpg', 1, '2017-01-10 15:39:07', NULL),
(2, 1, 3, 'Walton TV', 40000.00, 30, 10, 1, 'short', 'long', 'public/product_image/hpBP1YpAyXergU2FDBEv.jpg', 1, '2017-01-10 15:39:46', NULL),
(3, 6, 1, 'Samsung S6', 55000.00, 20, 5, 1, 'short', 'long', 'public/product_image/BmrLNkqZs3xnobDHKGF1.jpg', 1, '2017-01-10 15:40:31', NULL),
(4, 6, 4, 'Iphone 7', 70000.00, 50, 10, 1, 'I phone 7 description. Iphone 7 long description. Iphone 7 long description.Iphone 7 long description. Iphone 7 long description', 'Iphone 7 long description. Iphone 7 long description. Iphone 7 long description.Iphone 7 long description. Iphone 7 long description. Iphone 7 long description. Iphone 7 long description.Iphone 7 long description', 'public/product_image/3luVCymQj3IUQJ78ljN3.jpg', 1, '2017-01-16 02:10:42', NULL),
(5, 1, 5, 'LG Smart TV', 50000.00, 45, 5, 1, 'LG TV<br>', 'LG TV long description<br>', 'public/product_image/TWNDcLiSIxveQIJwwxnp.jpg', 1, '2017-01-16 02:13:57', NULL),
(6, 6, 3, 'Walton Mobile S7', 20000.00, 10, 3, 1, 'Short', 'Long dfd<br>', 'public/product_image/SAjJcXQQ548llFmbfGqy.jpg', 1, '2019-01-13 14:58:07', NULL),
(7, 3, 6, 'Men Denim Jeans', 3000.00, 20, 5, 1, 'Men Denim Jeans', 'Men Denim Jeans', 'public/product_image/XIjDWHSBstFiKmnEHwbC.jpg', 1, '2019-01-23 17:52:35', NULL),
(8, 4, 7, 'Women Saree', 2000.00, 20, 5, 1, 'Silk Saree<br>', 'Silk Saree', 'public/product_image/RzHQcpgKdOgmCZ0sX8cH.jpg', 1, '2019-01-23 17:56:19', NULL),
(9, 4, 7, 'Jamdani Saree', 3000.00, 20, 5, 1, 'Jamdani Saree', 'Jamdani Saree', 'public/product_image/GnxuzQL0938kbdP7s4Rc.jpg', 1, '2019-01-23 18:02:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`orders_details_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `orders_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
