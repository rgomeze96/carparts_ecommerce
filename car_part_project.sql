-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2021 at 03:13 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_part_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `order_id`, `product_name`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tie Rod End Removal Tool', 179.00, '2021-09-28 14:26:32', '2021-09-28 14:26:32'),
(2, 1, 'Air Impact Gun', 299.00, '2021-09-28 14:26:32', '2021-09-28 14:26:32'),
(5, 3, 'Air Impact Gun', 299.00, '2021-09-28 14:37:30', '2021-09-28 14:37:30'),
(6, 3, 'Crankshaft Pulley Tool', 109.00, '2021-09-28 14:37:30', '2021-09-28 14:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_09_16_000000_create_products_table', 1),
(4, '2021_09_16_000000_create_users_table', 1),
(5, '2021_09_16_131616_add_info_to_users', 1),
(6, '2021_09_17_000000_create_tool_loans_table', 1),
(7, '2021_09_20_000000_create_orders_table', 1),
(8, '2021_09_21_000000_create_items_table', 1),
(9, '2021_09_23_000000_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total` double(8,2) NOT NULL,
  `number_items` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `number_items`, `created_at`, `updated_at`) VALUES
(1, 2, 478.00, 2, '2021-09-28 14:26:32', '2021-09-28 14:26:32'),
(3, 3, 408.00, 2, '2021-09-28 14:37:30', '2021-09-28 14:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` double(8,2) NOT NULL,
  `cost` double(8,2) NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `image_path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `sale_price`, `cost`, `category`, `brand`, `warranty`, `quantity`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Tie Rod End Removal Tool', 'A tool that helps remove most suspension parts not just the tie rod end', 179.00, 109.00, 'Tool', 'Snap On', '1 Year', 3, '/storage/Tie Rod End Removal Tool.jpg', '2021-09-28 14:24:32', '2021-09-28 14:24:32'),
(2, 'Air Impact Gun', 'Helps you get those pesky bolts that just don\'t want to come off but be careful', 299.00, 229.00, 'Tool', 'Integrated Air', '6 Months', 2, '/storage/Air Impact Gun.jpg', '2021-09-28 14:25:30', '2021-09-28 14:25:30'),
(3, 'Crankshaft Pulley Tool', 'A tool that allows you to remove the crankshaft pulley without damaging it', 109.00, 72.00, 'Tool', 'Snap On', '6 Months', 3, '/storage/Crankshaft Pulley Tool.webp', '2021-09-28 14:26:07', '2021-09-28 14:26:07'),
(4, 'Control Arm', 'Connects the wheel assembly to the subframe', 119.00, 82.00, 'Suspension', 'URO', '1 Year', 3, '/storage/Control Arm.webp', '2021-09-28 16:27:04', '2021-09-28 16:27:04'),
(5, 'Ball Joint', 'Allows the control arms and wheel assembly to move in the direction the suspension requires', 99.00, 72.00, 'Suspension', 'Lamfroeder', '1 Year', 2, '/storage/Ball Joint.jpg', '2021-09-28 16:28:18', '2021-09-28 16:28:18'),
(6, 'Outer Tie Rod End', 'Connects the wheel assembly to the steering rack via the inner tie rod end', 79.00, 55.00, 'Suspension', 'Lamfroeder', '1 Year', 2, '/storage/Outer Tie Rod End.jpg', '2021-09-28 16:29:12', '2021-09-28 16:29:12'),
(7, 'Inner Tie Rod End', 'Connects the steering rack to the outer tie rod end', 109.00, 82.00, 'Suspension', 'Lamfroeder', '1 Year', 3, '/storage/Inner Tie Rod End.jpg', '2021-09-28 16:30:44', '2021-09-28 16:30:44'),
(8, 'Valve Cover Gasket', 'The gasket that goes between the valve cover and the cylinder head', 179.00, 109.00, 'Gasket', 'Victor Reinz', '1 Year', 2, '/storage/Valve Cover Gasket.jpg', '2021-09-28 16:32:36', '2021-09-28 16:32:36'),
(9, 'Cylinder Head Gasket', 'Gasket that seals the engine between the cylinder head and engine block', 169.00, 119.00, 'Gasket', 'Victor Reinz', '1 Year', 2, '/storage/Cylinder Head Gasket.jpg', '2021-09-28 16:35:04', '2021-09-28 16:35:04'),
(10, 'Oil Pan Gasket', 'The gasket that seals the engine between the engine block and the oil pan', 89.00, 67.00, 'Gasket', 'Elring', '1 Year', 3, '/storage/Oil Pan Gasket.jpg', '2021-09-28 16:50:36', '2021-09-28 17:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `review_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tool_loans`
--

CREATE TABLE `tool_loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deposit_amount` double(8,2) NOT NULL,
  `loan_date` date NOT NULL,
  `return_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tool_loans`
--

INSERT INTO `tool_loans` (`id`, `user_id`, `product_id`, `description`, `deposit_amount`, `loan_date`, `return_date`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'Loaned to a loyal customer', 179.00, '2021-09-30', '2021-10-08', '2021-09-28 18:08:13', '2021-09-28 18:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `address`, `age`, `city`, `country`, `telephone`, `balance`) VALUES
(1, 'Rafael Gomez', 'gomezr6993@gmail.com', NULL, '$2y$10$zhN4mwjIeCtZYYXMVmp7v.3.VsQvnLBDgJV/jMYC4PUe3/atQrpSO', NULL, '2021-09-28 14:21:42', '2021-09-28 17:56:24', 'admin', 'Calle 40 Sur', 27, 'Medellín', 'Colombia', '3125098477', 1000),
(2, 'Laura Gutierrez', 'rgomez9693@gmail.com', NULL, '$2y$10$gxWAlxmmk9OZmI.ZxofNzO2IEJfexfagtlnmBKmoEzfuhIc/bRw1e', NULL, '2021-09-28 14:22:06', '2021-09-28 17:56:40', 'client', 'Calle 40 Sur', 21, 'Medellín', 'Colombia', '3125098477', 522),
(3, 'Ian Turner', 'rgomeze@eafit.edu.co', NULL, '$2y$10$K/GN5dKq486kjUp9CeKtqOSuTq0LpAl1A7lMy6HbVcGdmrwVHV74S', NULL, '2021-09-28 14:22:40', '2021-09-28 17:57:03', 'client', 'South Beach', 25, 'Miami', 'United States', '5612827892', 592);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_order_id_foreign` (`order_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `tool_loans`
--
ALTER TABLE `tool_loans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tool_loans_user_id_foreign` (`user_id`),
  ADD KEY `tool_loans_product_id_foreign` (`product_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tool_loans`
--
ALTER TABLE `tool_loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tool_loans`
--
ALTER TABLE `tool_loans`
  ADD CONSTRAINT `tool_loans_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `tool_loans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
