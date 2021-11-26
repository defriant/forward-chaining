-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2021 pada 08.34
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

--
-- Dumping data untuk tabel `analisa`
--

INSERT INTO `analisa` (`id`, `nama`, `email`, `hasil_akhir`, `created_at`, `updated_at`) VALUES
('1637911452', 'tes', 'tes@tes', NULL, '2021-11-26 07:24:12', '2021-11-26 07:24:12'),
('1637911505', 'tes', 'tes@tes', 'Analisis Kimia', '2021-11-26 07:25:05', '2021-11-26 07:25:17');

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
('G1', 'Analisis Kimia', '2021-11-26 07:31:58', '2021-11-26 07:31:58'),
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

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id`, `id_analisa`, `id_premis`, `pertanyaan`, `jawaban`, `created_at`, `updated_at`) VALUES
(542, '1637911505', 'P1', 'Meneliti', 1, '2021-11-26 07:25:07', '2021-11-26 07:25:07'),
(543, '1637911505', 'P2', 'Komunikasi', 0, '2021-11-26 07:25:12', '2021-11-26 07:25:12'),
(544, '1637911505', 'P4', 'Pemahaman Matematika', 1, '2021-11-26 07:25:17', '2021-11-26 07:25:17');

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
('P1', 'Meneliti', '2021-10-29 12:14:34', '2021-11-02 10:55:11'),
('P2', 'Komunikasi', '2021-10-30 17:02:53', '2021-11-04 16:14:46'),
('P3', 'Teknologi', '2021-10-29 12:15:48', '2021-11-02 12:07:56'),
('P4', 'Pemahaman Matematika', '2021-10-29 12:15:57', '2021-11-02 12:08:05'),
('P5', 'Problem Solving', '2021-10-29 12:16:08', '2021-10-29 12:16:08');

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
(56, 'G2', 'P1', '2021-11-02 12:40:48', '2021-11-02 12:40:48'),
(94, 'G2', 'P2', '2021-11-04 16:14:46', '2021-11-04 16:14:46'),
(96, 'G4', 'P3', '2021-11-04 16:15:46', '2021-11-04 16:15:46'),
(97, 'G4', 'P4', '2021-11-04 16:15:46', '2021-11-04 16:15:46'),
(98, 'G4', 'P5', '2021-11-04 16:15:46', '2021-11-04 16:15:46'),
(111, 'G3', 'P3', '2021-11-19 12:08:51', '2021-11-19 12:08:51'),
(112, 'G3', 'P5', '2021-11-19 12:08:51', '2021-11-19 12:08:51'),
(113, 'G1', 'P1', '2021-11-26 07:31:58', '2021-11-26 07:31:58'),
(114, 'G1', 'P4', '2021-11-26 07:31:58', '2021-11-26 07:31:58');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=545;

--
-- AUTO_INCREMENT untuk tabel `rule`
--
ALTER TABLE `rule`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
