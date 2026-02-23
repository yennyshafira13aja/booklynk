-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2026 at 04:50 AM
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
-- Database: `booklynk`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukus`
--

CREATE TABLE `bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `cover` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sinopsis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bukus`
--

INSERT INTO `bukus` (`id`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `kategori`, `stok`, `cover`, `created_at`, `updated_at`, `sinopsis`) VALUES
(1, 'Serangkai', 'Valerie Patkar', 'Gramedia', 2021, 'Fiksi', 10, '1771166402.jpg', '2026-02-15 07:40:02', '2026-02-15 07:45:03', 'tess'),
(2, 'Laut Bercerita', 'Leila Chudori', 'Gramedia', 2021, 'Fiksi', 10, '1771447842.jpg', '2026-02-18 13:50:42', '2026-02-18 13:50:42', 'Laut Bercerita dikisahkan dalam beberapa babak. Babak pertama novel berlatar di tahun 1998 mengisahkan tentang seorang mahasiswa bernama Biru Laut yang diculik oleh sekelompok orang tidak dikenal. \r\n\r\nBersama dengan tiga temannya yang lain, ia dibawa ke sebuah tempat tidak dikenal dan disekap selama berbulan-bulan.  Selama disekap keempat sekawan itu diinterogasi, dipukul, ditendang, digantung, dan disetrum agar bersedia membuka suara. \r\n\r\nOrang-orang itu ingin tahu, siapa dalang di balik gerakan aktivis dan mahasiswa kala itu. Masih di tahun yang sama, keluarga Wibisono tengah menjalani aktivitas di hari Minggu seperti biasanya.\r\n\r\nSetelah acara masak bersama, sang ayah menyusun piring di atas meja untuk empat orang, untuk dirinya, untuk sang ibu, untuk si bungsu, dan juga untuk Biru Laut. Namun, meski lama menunggu Biru Laut tidak kunjung muncul.'),
(3, 'The Time We Walk Together', 'Kalya Kutub', 'SMKN 1 GUNUNGPUTRI', 2024, 'Romance', 3, '1771660461.jpg', '2026-02-21 00:54:21', '2026-02-21 00:54:21', 'we wok de tok not only tok de tok'),
(5, 'Ranah 3 Warna', 'A. Fuadi', 'Gramedia', 2021, 'Fiksi', 10, '1771774758_ranah3warna.jpg', '2026-02-22 08:37:19', '2026-02-22 08:39:18', 'tes 123');

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
-- Table structure for table `kategori_bukus`
--

CREATE TABLE `kategori_bukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_bukus`
--

INSERT INTO `kategori_bukus` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(3, 'Fiksi', '2026-02-15 07:33:39', '2026-02-15 07:33:39'),
(4, 'Romance', '2026-02-21 00:50:34', '2026-02-21 00:50:34'),
(6, 'Thriller', '2026-02-22 07:30:26', '2026-02-22 08:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku_relasis`
--

CREATE TABLE `kategori_buku_relasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `koleksi_pribadis`
--

CREATE TABLE `koleksi_pribadis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `koleksi_pribadis`
--

INSERT INTO `koleksi_pribadis` (`id`, `user_id`, `buku_id`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2026-02-18 22:38:05', '2026-02-18 22:38:05'),
(2, 3, 2, '2026-02-18 22:42:08', '2026-02-18 22:42:08');

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
(4, '2026_01_19_015058_create_bukus_table', 1),
(5, '2026_01_21_040532_create_ulasans_table', 1),
(6, '2026_01_21_043656_create_kategori_bukus_table', 1),
(7, '2026_01_21_063216_create_kategori_buku_relasis_table', 1),
(8, '2026_01_21_072614_create_peminjaman_table', 1),
(9, '2026_01_22_013947_create_koleksi_pribadis_table', 1),
(10, '2026_02_07_103021_add_status_to_users_table', 1),
(11, '2026_02_15_132111_add_sinopsis_to_bukus_table', 1),
(12, '2026_02_19_051109_create_favorites_table', 2);

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
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `status` enum('dipinjam','dikembalikan') NOT NULL DEFAULT 'dipinjam',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `user_id`, `buku_id`, `tanggal_peminjaman`, `tanggal_pengembalian`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2026-02-15', '2026-02-21', 'dikembalikan', '2026-02-15 08:22:13', '2026-02-15 09:42:37'),
(2, 3, 1, '2026-02-15', '2026-02-21', 'dikembalikan', '2026-02-15 08:22:37', '2026-02-15 09:22:55'),
(3, 3, 1, '2026-02-21', '2026-02-27', 'dikembalikan', '2026-02-17 03:59:12', '2026-02-17 04:28:39'),
(4, 3, 1, '2026-02-01', '2026-02-07', 'dikembalikan', '2026-02-17 04:39:54', '2026-02-17 04:40:03'),
(5, 3, 2, '2026-02-21', '2026-02-27', 'dikembalikan', '2026-02-18 14:28:44', '2026-02-21 00:48:29'),
(6, 3, 3, '2026-02-01', '2026-02-07', 'dipinjam', '2026-02-22 16:43:03', '2026-02-22 16:43:03');

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
-- Table structure for table `ulasans`
--

CREATE TABLE `ulasans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `ulasan` text NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ulasans`
--

INSERT INTO `ulasans` (`id`, `user_id`, `buku_id`, `ulasan`, `rating`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'bbbabbabbabababababbabba', 2, '2026-02-17 05:04:43', '2026-02-17 05:04:43'),
(2, 3, 2, 'baguuss, kerennn, pinterr, baikk', 5, '2026-02-21 00:48:47', '2026-02-21 00:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','peminjam','petugas') NOT NULL DEFAULT 'peminjam',
  `status` varchar(255) NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$12$IKx46SU8y9NGy3tm3JoxSet8mdPpCdk/.Je18vimso7fd52lZPrg6', 'admin', 'aktif', '2026-02-15 07:28:55', '2026-02-15 07:28:55'),
(2, 'Petugas', 'petugas@gmail.com', '$2y$12$8ICUuV2gjH1739PS9XvRcuPvZjolpbEtBtUceWt9m3ddzlZ.kkCB.', 'petugas', 'aktif', '2026-02-15 07:28:57', '2026-02-22 08:10:01'),
(3, 'Siswa', 'siswa@gmail.com', '$2y$12$jYksPRAeFm1K0IloHPMKXuIHY8DIJi/GGM./EfkGcn0apdb.lDB7G', 'peminjam', 'aktif', '2026-02-15 07:28:58', '2026-02-15 07:28:58'),
(4, 'yenny', 'yenny@gmail.com', '$2y$12$KHhX66CaQqWuctJXFl9u4.4BGH4zShB37f.3BfTMM6MKvg7Lk0gju', 'peminjam', 'aktif', '2026-02-22 19:03:11', '2026-02-22 19:03:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukus`
--
ALTER TABLE `bukus`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `kategori_bukus`
--
ALTER TABLE `kategori_bukus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_buku_relasis`
--
ALTER TABLE `kategori_buku_relasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_buku_relasis_buku_id_foreign` (`buku_id`),
  ADD KEY `kategori_buku_relasis_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `koleksi_pribadis`
--
ALTER TABLE `koleksi_pribadis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `koleksi_pribadis_user_id_buku_id_unique` (`user_id`,`buku_id`),
  ADD KEY `koleksi_pribadis_buku_id_foreign` (`buku_id`);

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
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peminjaman_user_id_foreign` (`user_id`),
  ADD KEY `peminjaman_buku_id_foreign` (`buku_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ulasans_buku_id_foreign` (`buku_id`);

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
-- AUTO_INCREMENT for table `bukus`
--
ALTER TABLE `bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `kategori_bukus`
--
ALTER TABLE `kategori_bukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori_buku_relasis`
--
ALTER TABLE `kategori_buku_relasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `koleksi_pribadis`
--
ALTER TABLE `koleksi_pribadis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ulasans`
--
ALTER TABLE `ulasans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategori_buku_relasis`
--
ALTER TABLE `kategori_buku_relasis`
  ADD CONSTRAINT `kategori_buku_relasis_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kategori_buku_relasis_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_buku_relasis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `koleksi_pribadis`
--
ALTER TABLE `koleksi_pribadis`
  ADD CONSTRAINT `koleksi_pribadis_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `koleksi_pribadis_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `peminjaman_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ulasans`
--
ALTER TABLE `ulasans`
  ADD CONSTRAINT `ulasans_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `bukus` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
