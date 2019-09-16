-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 11:46 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stok_ot`
--

-- --------------------------------------------------------

--
-- Table structure for table `barcodes`
--

CREATE TABLE `barcodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 'HKVISION', '2019-09-15 19:49:12', '2019-09-15 19:49:12'),
(2, 'SEAGATE', '2019-09-15 19:49:21', '2019-09-15 19:49:21'),
(3, 'PANASONIC', '2019-09-15 19:49:35', '2019-09-15 19:49:35');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'HDD', '2019-09-15 19:48:00', '2019-09-15 19:48:00'),
(2, 'CAMERA', '2019-09-15 19:48:06', '2019-09-15 19:48:06'),
(3, 'DVR', '2019-09-15 19:48:15', '2019-09-15 19:48:15');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_code`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'CS001', 'CUSTOMER A', 'jl.kinibalu timur raya no 201 semarang timur', '08122828897', '2019-09-15 19:59:03', '2019-09-15 19:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `issuings`
--

CREATE TABLE `issuings` (
  `id` int(10) UNSIGNED NOT NULL,
  `issuing_facture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `grandtotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issuings`
--

INSERT INTO `issuings` (`id`, `issuing_facture`, `date`, `customer_id`, `grandtotal`, `created_at`, `updated_at`) VALUES
(1, 'FS-00001/09/2019', '16-09-2019', 1, '1.350.000', '2019-09-16 00:58:23', '2019-09-16 00:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `issuing_details`
--

CREATE TABLE `issuing_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `issuing_id` int(10) UNSIGNED NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issuing_details`
--

INSERT INTO `issuing_details` (`id`, `product_id`, `issuing_id`, `qty`, `total`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '1', 1350000, '2019-09-16 00:58:23', '2019-09-16 00:58:23');

--
-- Triggers `issuing_details`
--
DELIMITER $$
CREATE TRIGGER `trigger_issuing` AFTER INSERT ON `issuing_details` FOR EACH ROW BEGIN
UPDATE products set stocks = stocks - NEW.qty WHERE id = NEW.product_id;
END
$$
DELIMITER ;

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
(1, '2019_03_05_013739_create_brands_table', 1),
(2, '2019_03_05_013758_create_products_table', 1),
(3, '2019_03_05_013812_create_barcodes_table', 1),
(4, '2019_03_05_013827_create_supliers_table', 1),
(5, '2019_03_05_013850_create_purchases_table', 1),
(6, '2019_03_05_013904_create_purchase_details_table', 1),
(7, '2019_03_05_013926_create_issuings_table', 1),
(8, '2019_03_05_013940_create_issuing_details_table', 1),
(9, '2019_03_05_044150_create_categories_table', 1),
(10, '2019_03_07_060140_add_relationships_to_product_table', 1),
(11, '2019_03_27_093430_add_relationships_to_purchase_detail', 1),
(12, '2019_03_27_093502_add_relationships_to_purchase_table', 1),
(13, '2019_04_08_031141_create_customers_table', 1),
(14, '2019_04_24_153518_add_relationship_to_issuing_table', 1),
(15, '2019_04_24_153741_add_relationship_to_issuing_detail', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `serial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `stocks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `serial`, `product_name`, `category_id`, `brand_id`, `purchase_price`, `sell_price`, `stocks`, `description`, `product_kode`, `created_at`, `updated_at`) VALUES
(1, 'ST3250318AS', 'HDD 2 Tb SEAGATE', 1, 2, 1150000, 1350000, '1', 'NEW STOCK', 'BRG0001', '2019-09-15 19:52:41', '2019-09-15 19:52:41'),
(2, 'PC0TEGGD', 'DVR PANASONIC', 3, 3, 4800000, 5250000, '2', 'NEW MODEL BRAND', 'BRG0002', '2019-09-15 19:55:57', '2019-09-15 19:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_facture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suplier_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`id`, `purchase_facture`, `date`, `suplier_id`, `created_at`, `updated_at`) VALUES
(1, 'PF00001/09/2019', '16-09-2019', 2, '2019-09-15 22:07:59', '2019-09-15 22:07:59'),
(2, 'PF00001/09/2019', '16-09-2019', 2, '2019-09-15 22:07:59', '2019-09-15 22:07:59'),
(3, 'PF00002/09/2019', '16-09-2019', 1, '2019-09-15 22:09:09', '2019-09-15 22:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`id`, `product_id`, `purchase_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '2019-09-15 22:07:59', '2019-09-15 22:07:59'),
(2, 1, 2, '1', '2019-09-15 22:07:59', '2019-09-15 22:07:59'),
(3, 2, 3, '2', '2019-09-15 22:09:09', '2019-09-15 22:09:09');

--
-- Triggers `purchase_detail`
--
DELIMITER $$
CREATE TRIGGER `tigger_purchase` AFTER INSERT ON `purchase_detail` FOR EACH ROW BEGIN
UPDATE products set stocks = stocks + NEW.qty WHERE id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE `supliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `suplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suplier_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`id`, `suplier_name`, `email`, `address`, `suplier_code`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'CV STARCCTV', 'starcctv@gmail.com', 'jl.gayamsari semarang', 'SP001', '024-8547555', '2019-09-15 19:56:40', '2019-09-15 19:56:40'),
(2, 'PT Gunung Sari', 'gunungsari@gmail.com', 'Jl.Lebak Bulus 206 Jakarta selatan', 'SP002', '021-8458888', '2019-09-15 19:57:26', '2019-09-15 19:57:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barcodes`
--
ALTER TABLE `barcodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issuings`
--
ALTER TABLE `issuings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issuings_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `issuing_details`
--
ALTER TABLE `issuing_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issuing_details_product_id_foreign` (`product_id`),
  ADD KEY `issuing_details_issuing_id_foreign` (`issuing_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_suplier_id_foreign` (`suplier_id`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_detail_product_id_foreign` (`product_id`),
  ADD KEY `purchase_detail_purchase_id_foreign` (`purchase_id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barcodes`
--
ALTER TABLE `barcodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `issuings`
--
ALTER TABLE `issuings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `issuing_details`
--
ALTER TABLE `issuing_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issuings`
--
ALTER TABLE `issuings`
  ADD CONSTRAINT `issuings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `issuing_details`
--
ALTER TABLE `issuing_details`
  ADD CONSTRAINT `issuing_details_issuing_id_foreign` FOREIGN KEY (`issuing_id`) REFERENCES `issuings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `issuing_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_suplier_id_foreign` FOREIGN KEY (`suplier_id`) REFERENCES `supliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD CONSTRAINT `purchase_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `purchase_detail_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
