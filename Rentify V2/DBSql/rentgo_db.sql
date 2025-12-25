-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2025 at 04:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentgo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `total_days` int(11) NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `delivery_method` enum('self_pickup','delivery') NOT NULL DEFAULT 'self_pickup',
  `pickup_location` varchar(255) DEFAULT NULL,
  `delivery_address` varchar(255) DEFAULT NULL,
  `return_address` varchar(255) DEFAULT NULL,
  `delivery_fee` bigint(20) NOT NULL DEFAULT 0,
  `billing_info` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `vehicle_id`, `start_date`, `end_date`, `total_days`, `total_price`, `delivery_method`, `pickup_location`, `delivery_address`, `return_address`, `delivery_fee`, `billing_info`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-12-20', '2025-12-30', 9, 7450000, 'self_pickup', 'Jl. Halimun, Setiabudi, Jakarta Selatan', NULL, NULL, 0, '{\"first_name\":\"Kairi\",\"last_name\":\"Rayosdelsol\",\"phone\":\"087788991212\",\"email\":\"kairi@gmail.com\",\"address\":\"jjjjjjjjjjjjjjj\",\"city\":\"Tangerang Selatan\",\"province\":\"All\",\"district\":\"kk\",\"payment_method\":\"qris\"}', 'active', '2025-12-25 00:14:31', '2025-12-25 00:14:31'),
(2, 1, 9, '2025-12-25', '2025-12-26', 1, 200000, 'self_pickup', 'Jl. Halimun, Setiabudi, Jakarta Selatan', NULL, NULL, 0, '{\"first_name\":\"Kairi\",\"last_name\":\"Rayosdelsol\",\"phone\":\"087788991212\",\"email\":\"kairi@gmail.com\",\"address\":\"City\",\"city\":\"Tangerang Selatan\",\"province\":\"All\",\"district\":\"kk\",\"payment_method\":\"qris\"}', 'active', '2025-12-25 08:08:33', '2025-12-25 08:08:33'),
(3, 1, 2, '2025-12-25', '2026-01-01', 6, 3000000, 'delivery', 'Jl. Halimun, Setiabudi, Jakarta Selatan', 'Jl raya bintaro', 'Jl raya bintaro', 350000, '{\"first_name\":\"Kairi\",\"last_name\":\"Rayosdelsol\",\"phone\":\"087788991212\",\"email\":\"kairi@gmail.com\",\"address\":\"City\",\"city\":\"Tangerang Selatan\",\"province\":\"All\",\"district\":\"kk\",\"payment_method\":\"qris\"}', 'active', '2025-12-25 08:15:58', '2025-12-25 08:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(5, '2025_12_14_153023_create_vehicles_table', 2),
(6, '2025_12_14_153105_create_bookings_table', 2),
(7, '2025_12_22_035629_add_status_to_bookings_table', 2),
(8, '2025_12_24_000000_add_plate_number_to_vehicles_table', 3),
(9, '2025_12_28_add_delivery_fields_to_bookings_table', 4),
(10, '2025_12_25_add_role_to_users_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','admin') NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Kairi Rayosdelsol', 'kairi@gmail.com', NULL, '$2y$12$dgtsomOtvVHfhVy9avMVUOqskPP17pgOmRGgxS5wzC8C4.3PvYoke', 'customer', NULL, '2025-12-24 08:16:42', '2025-12-24 08:16:42'),
(2, 'Admin Rentify', 'admin@rentify.com', NULL, '$2y$12$9WjwlaiE0stHOjNLgTLTc.AH0lW9fIvzZRLOmlKxyRxbyVQSh5Cgu', 'admin', NULL, '2025-12-25 05:03:22', '2025-12-25 05:03:22'),
(3, 'David Tendean', 'skylar@gmail.com', NULL, '$2y$12$Yl.WWuwyq88cIbj21owHUuAhae/.59stsqNPYH9fCJ8nLySrJdbES', 'customer', NULL, '2025-12-25 05:09:23', '2025-12-25 05:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('car','motorcycle','bicycle') NOT NULL,
  `description` text DEFAULT NULL,
  `price_per_day` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `plate_number` varchar(255) DEFAULT NULL,
  `transmission` varchar(255) DEFAULT NULL,
  `rating` decimal(3,1) DEFAULT NULL,
  `status` enum('available','rented') NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `type`, `description`, `price_per_day`, `image`, `plate_number`, `transmission`, `rating`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Honda Civic', 'car', 'Sedan sporty dengan performa tinggi', 800000.00, 'civic.png', 'B 0001 UZ', 'automatic', 4.8, 'rented', '2025-12-24 05:24:00', '2025-12-25 00:14:31'),
(2, 'Mitsubishi Xpander', 'car', 'Mobil keluarga praktis dan nyaman', 400000.00, 'xpander.png', 'B 0002 BK', 'manual', 4.6, 'rented', '2025-12-24 05:24:00', '2025-12-25 08:15:58'),
(3, 'Toyota Alphard', 'car', 'MPV premium mewah untuk keluarga', 2500000.00, 'alphard.png', 'B 0003 BF', 'automatic', 4.9, 'available', '2025-12-24 05:24:00', '2025-12-24 08:32:11'),
(4, 'Daihatsu Terios', 'car', 'SUV kompak handal untuk petualangan', 350000.00, 'terios.png', 'B 0004 JG', 'manual', 4.5, 'available', '2025-12-24 05:24:00', '2025-12-24 08:32:11'),
(5, 'Toyota Avanza', 'car', 'Minivan terpercaya untuk keluarga', 350000.00, 'avanza.png', 'B 0005 FQ', 'manual', 4.4, 'available', '2025-12-24 05:24:00', '2025-12-24 08:32:11'),
(6, 'Suzuki Ertiga', 'car', 'MPV efisien dengan interior luas', 380000.00, 'ertiga.png', 'B 0006 FG', 'automatic', 4.3, 'available', '2025-12-24 05:24:00', '2025-12-24 08:32:11'),
(7, 'Honda CB150R', 'motorcycle', 'Motor sport naked dengan desain modern', 120000.00, 'cb150r.png', 'D 0007 FC', 'manual', 4.7, 'available', '2025-12-24 05:24:00', '2025-12-24 08:32:11'),
(8, 'Yamaha NMAX 155', 'motorcycle', 'Skuter maxi dengan performa ekonomis', 100000.00, 'nmax.png', 'D 0008 QN', 'automatic', 4.6, 'available', '2025-12-24 05:24:00', '2025-12-24 08:32:11'),
(9, 'Kawasaki Ninja 250', 'motorcycle', 'Motor sport performa tinggi', 200000.00, 'ninja250.png', 'D 0009 EH', 'manual', 4.8, 'rented', '2025-12-24 05:24:00', '2025-12-25 08:08:33'),
(10, 'Honda CB500F', 'motorcycle', 'Naked bike berkapasitas besar', 250000.00, 'cb500f.png', 'D 0010 QZ', 'manual', 4.7, 'available', '2025-12-24 05:24:00', '2025-12-24 08:32:11'),
(11, 'Suzuki GSX-S150', 'motorcycle', 'Motor sport kompak tangguh', 130000.00, 'gsxs150.png', 'D 0011 UP', 'manual', 4.5, 'available', '2025-12-24 05:24:00', '2025-12-24 08:32:11'),
(12, 'Yamaha MT-09', 'motorcycle', 'Naked bike bertenaga dengan handling sempurna', 280000.00, 'mt09.png', 'D 0012 DE', 'manual', 4.8, 'available', '2025-12-24 05:24:00', '2025-12-24 08:32:11'),
(13, 'Honda PCX 160', 'motorcycle', 'Skuter modern dengan fitur canggih', 95000.00, 'pcx160.png', 'D 0013 PU', 'automatic', 4.6, 'available', '2025-12-24 05:24:00', '2025-12-24 08:32:11'),
(14, 'Yamaha YZF-R1', 'motorcycle', 'Motor sport premium berteknologi tinggi', 450000.00, 'yzfr1.png', 'D 0014 QV', 'manual', 4.9, 'available', '2025-12-24 05:24:00', '2025-12-24 08:32:11'),
(15, 'Honda Beat', 'motorcycle', 'Motor harian ekonomis dan handal', 80000.00, 'beat.png', 'D 0015 QS', 'automatic', 4.2, 'available', '2025-12-24 05:24:00', '2025-12-24 08:32:11'),
(16, 'Polygon Helios C2', 'bicycle', 'Sepeda road bike ringan untuk balap', 80000.00, 'helioc2.png', NULL, 'manual', 4.5, 'available', '2025-12-24 05:24:00', '2025-12-24 05:24:00'),
(17, 'Vtech Mountain Bike Pro', 'bicycle', 'MTB tangguh untuk off-road adventure', 100000.00, 'vtechmtb.png', NULL, 'manual', 4.6, 'available', '2025-12-24 05:24:00', '2025-12-24 05:24:00'),
(18, 'Wimcycle Fantom 1.0', 'bicycle', 'Sepeda hybrid versatil untuk segala medan', 70000.00, 'fantom.png', NULL, 'manual', 4.4, 'available', '2025-12-24 05:24:00', '2025-12-24 05:24:00'),
(19, 'Specialized Rockhopper', 'bicycle', 'Mountain bike entry-level berkualitas', 110000.00, 'rockhopper.png', NULL, 'manual', 4.7, 'available', '2025-12-24 05:24:00', '2025-12-24 05:24:00'),
(20, 'Trek FX 3', 'bicycle', 'Hybrid bike nyaman untuk commuting', 90000.00, 'trekfx3.png', NULL, 'manual', 4.5, 'available', '2025-12-24 05:24:00', '2025-12-24 05:24:00'),
(21, 'Giant Escape 3', 'bicycle', 'Sepeda hybrid ringan dan cepat', 85000.00, 'escape3.jpg', NULL, 'manual', 4.6, 'available', '2025-12-24 05:24:00', '2025-12-24 05:24:00'),
(22, 'Thrill Ravage 1.0', 'bicycle', 'MTB lokal terjangkau dengan performa baik', 60000.00, 'ravage.jpg', NULL, 'manual', 4.3, 'available', '2025-12-24 05:24:00', '2025-12-24 05:24:00'),
(23, 'Brompton M6L', 'bicycle', 'Sepeda lipat ringkas untuk mobilitas urban', 150000.00, 'brompton.jpg', NULL, 'manual', 4.8, 'available', '2025-12-24 05:24:00', '2025-12-24 05:24:00'),
(24, 'Decathlon Triban 120', 'bicycle', 'Road bike budget-friendly untuk pemula', 75000.00, 'triban120.jpg', NULL, 'manual', 4.4, 'available', '2025-12-24 05:24:00', '2025-12-24 05:24:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
