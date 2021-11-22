-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2021 pada 15.17
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
  `hasil_akhir` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `analisa`
--

INSERT INTO `analisa` (`id`, `nama`, `email`, `hasil_akhir`, `created_at`, `updated_at`) VALUES
('1636042020', 'apip', 'apip@gmail.com', 'G3', '2021-11-04 16:07:00', '2021-11-04 16:07:09'),
('1636042161', 'aaa', 'aaa@aaa', 'G1', '2021-11-04 16:09:21', '2021-11-04 16:13:35'),
('1636042517', 'tes', 'tes@tes', 'G4', '2021-11-04 16:15:17', '2021-11-04 16:15:36'),
('1636112411', 'tes', 'tes@tes', 'G4', '2021-11-05 11:40:11', '2021-11-05 11:40:43'),
('1636135322', 'tes', 'tes@tes', 'failed', '2021-11-05 18:02:02', '2021-11-05 18:02:06'),
('1636135342', 'tes', 'tes@tes', 'G2', '2021-11-05 18:02:22', '2021-11-05 18:02:25'),
('1636135354', 'tes', 'tes@tes', 'G3', '2021-11-05 18:02:34', '2021-11-05 18:02:40'),
('1636135371', 'aaa', 'aaa@aaa', 'G1', '2021-11-05 18:02:51', '2021-11-05 18:02:57'),
('1636136976', 'tes', 'tes@tes', 'G4', '2021-11-05 18:29:36', '2021-11-05 18:29:59'),
('1636288928', 'tes', 'tes@tes', 'G1', '2021-11-07 12:42:08', '2021-11-07 12:42:26'),
('1636288961', 'tes', 'tes@tes', 'failed', '2021-11-07 12:42:41', '2021-11-07 12:43:11'),
('1636289715', 'aaa', 'aaa@aaa', 'G2', '2021-11-07 12:55:15', '2021-11-07 12:55:19'),
('1636290265', 'aaa', 'tes@tes', 'G3', '2021-11-07 13:04:25', '2021-11-07 13:04:36'),
('1637323518', 'tes', 'aaa@aaa', 'G3', '2021-11-19 12:05:18', '2021-11-19 12:07:27'),
('1637323783', 'tes', 'aaa@aaa', 'G2', '2021-11-19 12:09:43', '2021-11-19 12:10:38');

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
('G1', 'Analisis Kimia', '2021-11-07 12:56:43', '2021-11-07 12:56:43'),
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
  `jawaban` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id`, `id_analisa`, `id_premis`, `jawaban`, `created_at`, `updated_at`) VALUES
(474, '1636042020', 'P1', 0, '2021-11-04 16:07:03', '2021-11-04 16:07:03'),
(475, '1636042020', 'P3', 1, '2021-11-04 16:07:05', '2021-11-04 16:07:05'),
(476, '1636042020', 'P4', 0, '2021-11-04 16:07:06', '2021-11-04 16:07:06'),
(477, '1636042020', 'P5', 1, '2021-11-04 16:07:09', '2021-11-04 16:07:09'),
(482, '1636042161', 'P1', 1, '2021-11-04 16:13:29', '2021-11-04 16:13:29'),
(483, '1636042161', 'P2', 0, '2021-11-04 16:13:32', '2021-11-04 16:13:32'),
(484, '1636042161', 'P4', 1, '2021-11-04 16:13:35', '2021-11-04 16:13:35'),
(488, '1636042517', 'P1', 0, '2021-11-04 16:15:31', '2021-11-04 16:15:31'),
(489, '1636042517', 'P2', 1, '2021-11-04 16:15:33', '2021-11-04 16:15:33'),
(490, '1636042517', 'P3', 1, '2021-11-04 16:15:34', '2021-11-04 16:15:34'),
(491, '1636042517', 'P4', 1, '2021-11-04 16:15:35', '2021-11-04 16:15:35'),
(492, '1636042517', 'P5', 1, '2021-11-04 16:15:36', '2021-11-04 16:15:36'),
(496, '1636112411', 'P1', 0, '2021-11-05 11:40:35', '2021-11-05 11:40:35'),
(497, '1636112411', 'P3', 1, '2021-11-05 11:40:37', '2021-11-05 11:40:37'),
(498, '1636112411', 'P4', 1, '2021-11-05 11:40:39', '2021-11-05 11:40:39'),
(499, '1636112411', 'P5', 1, '2021-11-05 11:40:43', '2021-11-05 11:40:43'),
(500, '1636135322', 'P1', 1, '2021-11-05 18:02:04', '2021-11-05 18:02:04'),
(501, '1636135322', 'P2', 0, '2021-11-05 18:02:05', '2021-11-05 18:02:05'),
(502, '1636135322', 'P4', 0, '2021-11-05 18:02:06', '2021-11-05 18:02:06'),
(503, '1636135342', 'P1', 1, '2021-11-05 18:02:24', '2021-11-05 18:02:24'),
(504, '1636135342', 'P2', 1, '2021-11-05 18:02:25', '2021-11-05 18:02:25'),
(505, '1636135354', 'P1', 0, '2021-11-05 18:02:36', '2021-11-05 18:02:36'),
(506, '1636135354', 'P3', 1, '2021-11-05 18:02:37', '2021-11-05 18:02:37'),
(507, '1636135354', 'P4', 0, '2021-11-05 18:02:38', '2021-11-05 18:02:38'),
(508, '1636135354', 'P5', 1, '2021-11-05 18:02:40', '2021-11-05 18:02:40'),
(509, '1636135371', 'P1', 1, '2021-11-05 18:02:55', '2021-11-05 18:02:55'),
(510, '1636135371', 'P2', 0, '2021-11-05 18:02:56', '2021-11-05 18:02:56'),
(511, '1636135371', 'P4', 1, '2021-11-05 18:02:57', '2021-11-05 18:02:57'),
(516, '1636136976', 'P1', 0, '2021-11-05 18:29:54', '2021-11-05 18:29:54'),
(517, '1636136976', 'P3', 1, '2021-11-05 18:29:56', '2021-11-05 18:29:56'),
(518, '1636136976', 'P4', 1, '2021-11-05 18:29:57', '2021-11-05 18:29:57'),
(519, '1636136976', 'P5', 1, '2021-11-05 18:29:59', '2021-11-05 18:29:59'),
(520, '1636288928', 'P1', 1, '2021-11-07 12:42:11', '2021-11-07 12:42:11'),
(521, '1636288928', 'P2', 0, '2021-11-07 12:42:22', '2021-11-07 12:42:22'),
(522, '1636288928', 'P4', 1, '2021-11-07 12:42:26', '2021-11-07 12:42:26'),
(523, '1636288961', 'P1', 0, '2021-11-07 12:42:43', '2021-11-07 12:42:43'),
(524, '1636288961', 'P3', 1, '2021-11-07 12:42:56', '2021-11-07 12:42:56'),
(525, '1636288961', 'P4', 1, '2021-11-07 12:43:04', '2021-11-07 12:43:04'),
(526, '1636288961', 'P5', 0, '2021-11-07 12:43:11', '2021-11-07 12:43:11'),
(527, '1636289715', 'P1', 1, '2021-11-07 12:55:18', '2021-11-07 12:55:18'),
(528, '1636289715', 'P2', 1, '2021-11-07 12:55:19', '2021-11-07 12:55:19'),
(529, '1636290265', 'P1', 0, '2021-11-07 13:04:31', '2021-11-07 13:04:31'),
(530, '1636290265', 'P3', 1, '2021-11-07 13:04:33', '2021-11-07 13:04:33'),
(531, '1636290265', 'P4', 0, '2021-11-07 13:04:34', '2021-11-07 13:04:34'),
(532, '1636290265', 'P5', 1, '2021-11-07 13:04:36', '2021-11-07 13:04:36'),
(533, '1637323518', 'P1', 0, '2021-11-19 12:06:24', '2021-11-19 12:06:24'),
(534, '1637323518', 'P3', 1, '2021-11-19 12:06:52', '2021-11-19 12:06:52'),
(535, '1637323518', 'P4', 0, '2021-11-19 12:07:22', '2021-11-19 12:07:22'),
(536, '1637323518', 'P5', 1, '2021-11-19 12:07:27', '2021-11-19 12:07:27'),
(540, '1637323783', 'P1', 1, '2021-11-19 12:10:30', '2021-11-19 12:10:30'),
(541, '1637323783', 'P2', 1, '2021-11-19 12:10:38', '2021-11-19 12:10:38');

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
(106, 'G1', 'P1', '2021-11-07 12:56:43', '2021-11-07 12:56:43'),
(107, 'G1', 'P4', '2021-11-07 12:56:43', '2021-11-07 12:56:43'),
(111, 'G3', 'P3', '2021-11-19 12:08:51', '2021-11-19 12:08:51'),
(112, 'G3', 'P5', '2021-11-19 12:08:51', '2021-11-19 12:08:51');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=542;

--
-- AUTO_INCREMENT untuk tabel `rule`
--
ALTER TABLE `rule`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
