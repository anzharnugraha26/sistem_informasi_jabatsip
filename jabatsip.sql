-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Nov 2022 pada 04.17
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jabatsip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kabinet`
--

CREATE TABLE `kabinet` (
  `id` int(11) NOT NULL,
  `kode_kabinet` text NOT NULL,
  `nama_kabinet` text NOT NULL,
  `slot` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kabinet`
--

INSERT INTO `kabinet` (`id`, `kode_kabinet`, `nama_kabinet`, `slot`) VALUES
(1, 'L-1', 'Lemari 1', 'A'),
(2, 'L-2', 'Lemari 1', 'B'),
(5, 'L-5', 'Lemari 1', 'C'),
(6, 'L-6', 'Lemari 1', 'D'),
(7, 'L-7', 'Lemari 2', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kode_kategori` varchar(15) DEFAULT NULL,
  `nama_kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kode_kategori`, `nama_kategori`) VALUES
(1, 'K-1', 'Surat Masuk 1'),
(2, 'K-1', 'Surat Masuk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_11_20_110438_create_surat_masuks_table', 2),
(5, '2022_11_21_020812_create_surat_keluars_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE `surat` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(25) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_terima` date NOT NULL,
  `asal_surat` varchar(30) NOT NULL,
  `perihal_surat` text NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` text NOT NULL,
  `sifat_surat` varchar(10) NOT NULL,
  `agenda_persip` varchar(30) NOT NULL,
  `kode_kabinet` varchar(10) NOT NULL,
  `kode_kategori` varchar(10) NOT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id`, `no_surat`, `tanggal_surat`, `tanggal_terima`, `asal_surat`, `perihal_surat`, `keterangan`, `gambar`, `sifat_surat`, `agenda_persip`, `kode_kabinet`, `kode_kategori`, `file`) VALUES
(2, '123456', '2022-01-08', '2022-01-22', 'kodiklatal 1', 'Laporan Kekuatan Personel', 'PNS', 'B-3.gif', 'Rahasia', 'B-30', 'L-2', 'K-1', NULL),
(1, 'B/123/I/2022', '2022-01-18', '2022-01-20', 'Kadisminperal', 'abc', 'NEWS', 'B-1.gif', 'Biasa', 'B-08/4-1-2022', 'L-1', 'K-2', NULL),
(5, '12212', '2022-10-19', '2022-10-01', '21212', 'ds', 'dsds', '102022190853514_pexels-august-de-richelieu-4427611.jpg', 'Rahasia', '21221', 'L-7', 'K-1', NULL),
(6, 'sas', '2022-11-03', '2022-11-03', 'sas', 'sas', 'sa', '112022030236524_Gull_portrait_ca_usa.jpg', 'Biasa', 'sa', 'L-2', 'K-1', NULL),
(7, 'sasasas', '2022-11-09', '2022-11-09', 'sas', 'sasasa', 'sasasa', '112022090203125_Gull_portrait_ca_usa.jpg', 'Rahasia', 'sa', 'L-1', 'K-1', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluars`
--

CREATE TABLE `surat_keluars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_surat_keluar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_agenda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klasifikasi_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_terima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabinet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat_keluars`
--

INSERT INTO `surat_keluars` (`id`, `no_surat_keluar`, `no_agenda`, `tujuan_surat`, `perihal_surat`, `file`, `klasifikasi_surat`, `sifat_surat`, `tgl_surat`, `tgl_terima`, `kabinet`, `created_at`, `updated_at`) VALUES
(1, 'sa1', '21112', '2wqww', 'sasas                                        saas', '112022210209220_Gull_portrait_ca_usa.jpg', 'Surat Keluar', 'rahasia', '2022-11-21', '2022-11-21', 'L-2', '2022-11-20 19:18:09', '2022-11-20 19:18:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuks`
--

CREATE TABLE `surat_masuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_surat_masuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_agenda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klasifikasi_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_terima` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kabinet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `surat_masuks`
--

INSERT INTO `surat_masuks` (`id`, `no_surat_masuk`, `no_agenda`, `asal_surat`, `perihal_surat`, `file`, `klasifikasi_surat`, `sifat_surat`, `tgl_surat`, `tgl_terima`, `kabinet`, `created_at`, `updated_at`) VALUES
(2, 'sasas', 'sasa', 'sasas', 'sasas', '112022201228869_Gull_portrait_ca_usa.jpg', 'Surat Keluar', 'rahasia', '2022-11-04', '2022-11-08', 'L-2', '2022-11-20 05:31:28', '2022-11-20 05:31:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `kode_user`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'anzhar', 'anzharnugraha', '121212', 'anzhar@laravel.com', NULL, '$2y$10$8zqNOELgqG0.4E6jXxs4ReMoeb7aLcZwMJ8ArzbCBgY3WuTFUb2jG', '4zXyP9d5wAqvEkzBxhjmfJzaFpwk51PwFoTV0VNPo2EIBQFtWcHv1nch1lsG', '2022-10-17 19:09:45', '2022-10-17 19:09:45'),
(2, 'test', 'test', '0012', 'test@gmail.com', NULL, '$2y$10$x1BgTsX01cLh/lS2nHIom.LKm/gH2faZ1my9hzR9FcJEu8o2ogKJ6', NULL, '2022-11-08 19:42:22', '2022-11-08 19:42:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kabinet`
--
ALTER TABLE `kabinet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `id_3` (`id`),
  ADD KEY `id_4` (`id`),
  ADD KEY `id_5` (`id`),
  ADD KEY `id_6` (`id`),
  ADD KEY `id_7` (`id`),
  ADD KEY `id_8` (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`tanggal_surat`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `no_surat` (`no_surat`);

--
-- Indeks untuk tabel `surat_keluars`
--
ALTER TABLE `surat_keluars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `surat_masuks`
--
ALTER TABLE `surat_masuks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_kode_user_unique` (`kode_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kabinet`
--
ALTER TABLE `kabinet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `surat_keluars`
--
ALTER TABLE `surat_keluars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `surat_masuks`
--
ALTER TABLE `surat_masuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
