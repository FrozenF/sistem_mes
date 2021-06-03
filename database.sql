-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql:3306
-- Waktu pembuatan: 03 Jun 2021 pada 02.12
-- Versi server: 5.7.22
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `short_name` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departments`
--

INSERT INTO `departments` (`id`, `full_name`, `short_name`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(2, 'Perumahan', 'PMH', 1, '2021-02-10 08:35:11', 1, '2021-02-11 03:18:53', 1),
(3, 'Personalia', 'PSN', 1, '2021-02-10 08:47:10', 1, '2021-02-10 08:48:59', 1),
(4, 'Information Technology', 'ITD', 0, '2021-02-11 03:29:38', 1, '2021-02-11 03:29:48', 1),
(5, 'meat preparation', 'mp', 1, '2021-02-11 04:29:41', 1, '2021-02-11 04:29:41', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `nik` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `address` text CHARACTER SET utf8mb4 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `department_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`id`, `nik`, `name`, `address`, `status`, `department_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '2015', 'Farih', 'test', 1, 3, '2021-02-10 09:02:15', 1, '2021-02-11 03:31:37', 1),
(2, '20122', 'Test', 'Jalan 231', 1, 3, '2021-02-10 10:18:47', 1, '2021-02-10 10:18:47', 1),
(3, '123', 'rika', 'hgfh', 1, 3, '2021-02-11 07:46:28', 1, '2021-02-11 07:46:28', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mes`
--

CREATE TABLE `mes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `address` text CHARACTER SET utf8mb4 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `max_room` int(11) NOT NULL DEFAULT '5',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mes`
--

INSERT INTO `mes` (`id`, `name`, `address`, `status`, `max_room`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Mes 1', 'Jalan Bunga', 1, 5, '2021-02-10 09:13:36', 1, '2021-02-11 01:38:50', 1),
(2, 'Mes 2', 'Jlang Mawar', 1, 5, '2021-02-10 10:13:08', 1, '2021-02-10 10:13:08', 1),
(3, 'Mes 3', 'Test', 1, 5, '2021-02-10 10:13:20', 1, '2021-02-10 10:13:20', 1),
(4, 'Mes Baru', 'Jalan Flamboyan', 1, 3, '2021-02-11 04:41:28', 1, '2021-02-11 04:41:28', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `mes_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `max_capacity` int(11) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rooms`
--

INSERT INTO `rooms` (`id`, `mes_id`, `name`, `max_capacity`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Ruangan 1', 1, 1, '2021-02-10 09:22:31', 1, '2021-02-10 09:22:31', 1),
(2, 2, 'Ruangan 1', 1, 1, '2021-02-10 10:13:31', 1, '2021-02-10 10:13:31', 1),
(3, 2, 'Ruangan 2', 1, 1, '2021-02-10 10:13:38', 1, '2021-02-10 10:13:38', 1),
(4, 2, 'Ruangan 3', 1, 1, '2021-02-10 10:13:51', 1, '2021-02-10 10:13:51', 1),
(5, 1, '2', 1, 1, '2021-02-11 04:30:43', 1, '2021-02-11 06:20:09', 1),
(6, 1, 'Test', 1, 1, '2021-02-11 06:12:50', 1, '2021-02-11 06:12:50', 1),
(7, 4, 'Ruangan A01', 2, 1, '2021-02-11 06:13:15', 1, '2021-02-11 07:27:04', 1),
(8, 4, 'Ruangan A02', 1, 1, '2021-02-11 06:13:33', 1, '2021-02-11 07:26:12', 1),
(9, 4, 'Ruangan A03', 1, 1, '2021-02-11 06:13:44', 1, '2021-02-11 07:25:57', 1),
(10, 1, 'farih', 1, 1, '2021-02-11 06:14:49', 1, '2021-02-11 06:14:49', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `room_details`
--

CREATE TABLE `room_details` (
  `id` int(11) NOT NULL,
  `employee_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `out_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `room_details`
--

INSERT INTO `room_details` (`id`, `employee_id`, `room_id`, `date`, `out_date`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 1, 1, '2021-02-10', '2021-02-11', '2021-02-10 10:07:02', 1, '2021-02-11 01:46:11', 1, 0),
(2, 1, 2, '2021-02-10', NULL, '2021-02-10 10:22:37', 1, '2021-02-10 10:22:37', 1, 0),
(3, 2, 1, '2021-02-10', NULL, '2021-02-10 10:23:03', 1, '2021-02-10 10:25:56', 1, 0),
(4, 1, 1, '2021-02-10', NULL, '2021-02-10 10:31:27', 1, '2021-02-10 10:31:27', 1, 0),
(5, 1, 1, '2021-02-10', NULL, '2021-02-10 10:31:53', 1, '2021-02-10 10:31:53', 1, 0),
(6, 2, 2, '2021-02-11', NULL, '2021-02-11 01:39:33', 1, '2021-02-11 01:55:12', 1, 0),
(7, 1, 3, '2021-02-11', '2021-02-11', '2021-02-11 01:46:11', 1, '2021-02-11 01:51:54', 1, 0),
(8, 1, 4, '2021-02-11', '2021-02-12', '2021-02-11 01:51:54', 1, '2021-02-11 01:56:48', 1, 0),
(9, 1, 2, '2021-02-11', '2021-03-11', '2021-02-11 01:57:01', 1, '2021-02-11 04:11:54', 1, 0),
(10, 2, 1, '2021-02-23', '2021-02-28', '2021-02-11 04:11:06', 1, '2021-02-11 04:11:21', 1, 0),
(11, 2, 3, '2021-02-28', '2021-02-11', '2021-02-11 04:11:21', 1, '2021-02-11 07:25:30', 1, 0),
(12, 2, 7, '2021-02-11', '2021-02-11', '2021-02-11 07:25:30', 1, '2021-02-11 07:30:32', 1, 0),
(13, 1, 8, '2021-02-11', '2021-02-11', '2021-02-11 07:27:24', 1, '2021-02-11 07:27:40', 1, 0),
(14, 1, 7, '2021-02-11', NULL, '2021-02-11 07:27:40', 1, '2021-02-11 07:27:40', 1, 1),
(15, 2, 7, '2021-02-12', NULL, '2021-02-11 07:46:06', 1, '2021-02-11 07:46:06', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '$2y$07$asBteZ3l0ikkgNBYfrJZLusUaAqhAihf.wav4r18uz4iq3TtZO5rS', '2021-02-10 07:11:18', '2021-02-10 07:11:18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `short_name` (`short_name`);

--
-- Indeks untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `mes`
--
ALTER TABLE `mes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `room_details`
--
ALTER TABLE `room_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mes`
--
ALTER TABLE `mes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `room_details`
--
ALTER TABLE `room_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
