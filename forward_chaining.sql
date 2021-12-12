-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Des 2021 pada 10.12
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_jurusan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$RB1SLw/kPYVNt3LuRdhIRO1IZiREuc.BJKlOYW5qMrn1qeRYGolfK', '2021-10-31 14:52:38', '2021-10-31 14:55:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `analisa`
--

CREATE TABLE `analisa` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `hasil_akhir` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `goal`
--

CREATE TABLE `goal` (
  `id` varchar(10) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `goal`
--

INSERT INTO `goal` (`id`, `jurusan`, `created_at`, `updated_at`) VALUES
('G1', 'Analisis Kimia', '2021-12-06 13:52:22', '2021-12-06 13:52:22'),
('G2', 'Perbankan Syariah', '2021-10-29 12:11:29', '2021-11-02 12:40:48'),
('G3', 'Rekayasa Perangkat Lunak', '2021-10-29 12:11:40', '2021-11-19 12:08:51'),
('G4', 'Teknik Elektronika', '2021-10-29 12:11:50', '2021-11-04 16:15:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id` bigint(20) NOT NULL,
  `id_analisa` varchar(20) NOT NULL,
  `id_premis` varchar(10) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `premis`
--

CREATE TABLE `premis` (
  `id` varchar(10) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `premis`
--

INSERT INTO `premis` (`id`, `pertanyaan`, `created_at`, `updated_at`) VALUES
('P1', 'Apakah kamu suka bersosialisasi di lingkunganmu ?', '2021-10-29 12:14:34', '2021-12-12 08:56:06'),
('P2', 'Apakah kamu tertarik dengan teknologi ?', '2021-10-30 17:02:53', '2021-12-12 08:57:18'),
('P3', 'Apakah kamu menyukai pelajaran matematika ?', '2021-10-29 12:15:48', '2021-12-12 08:57:39'),
('P4', 'Apakah kamu hobi membaca ?', '2021-10-29 12:15:57', '2021-12-12 08:57:58'),
('P5', 'Apabila ada barangmu yang rusak, apakah kamu akan memperbaikinya? daripada menggantinya dengan yang baru !', '2021-10-29 12:16:08', '2021-12-12 09:07:01'),
('P6', 'Apakah kamu menyukai bidang multimedia ?', '2021-12-12 08:59:18', '2021-12-12 08:59:18'),
('P7', 'Apakah kamu ahli dalam bidang managemen ?', '2021-12-12 09:00:37', '2021-12-12 09:00:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rule`
--

CREATE TABLE `rule` (
  `id` bigint(20) NOT NULL,
  `id_goal` varchar(10) NOT NULL,
  `id_premis` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rule`
--

INSERT INTO `rule` (`id`, `id_goal`, `id_premis`, `created_at`, `updated_at`) VALUES
(118, 'G2', 'P1', '2021-12-12 08:56:06', '2021-12-12 08:56:06'),
(119, 'G4', 'P1', '2021-12-12 08:56:06', '2021-12-12 08:56:06'),
(120, 'G3', 'P2', '2021-12-12 08:57:18', '2021-12-12 08:57:18'),
(121, 'G4', 'P2', '2021-12-12 08:57:18', '2021-12-12 08:57:18'),
(122, 'G1', 'P3', '2021-12-12 08:57:39', '2021-12-12 08:57:39'),
(123, 'G3', 'P3', '2021-12-12 08:57:39', '2021-12-12 08:57:39'),
(124, 'G1', 'P4', '2021-12-12 08:57:58', '2021-12-12 08:57:58'),
(125, 'G2', 'P4', '2021-12-12 08:57:58', '2021-12-12 08:57:58'),
(127, 'G3', 'P6', '2021-12-12 08:59:18', '2021-12-12 08:59:18'),
(128, 'G2', 'P7', '2021-12-12 09:00:37', '2021-12-12 09:00:37'),
(129, 'G4', 'P5', '2021-12-12 09:07:01', '2021-12-12 09:07:01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `analisa`
--
ALTER TABLE `analisa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `premis`
--
ALTER TABLE `premis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rule`
--
ALTER TABLE `rule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=565;

--
-- AUTO_INCREMENT untuk tabel `rule`
--
ALTER TABLE `rule`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
