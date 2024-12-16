-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2024 pada 02.02
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan_web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `campaign`
--

CREATE TABLE `campaign` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `dana_terkumpul` double DEFAULT 0,
  `dana_target` double NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `waktu_dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `batas_waktu` date NOT NULL,
  `id_pembuat` int(11) NOT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `campaign`
--

INSERT INTO `campaign` (`id`, `id_kategori`, `nama`, `dana_terkumpul`, `dana_target`, `foto`, `deskripsi`, `waktu_dibuat`, `batas_waktu`, `id_pembuat`, `is_active`) VALUES
(1, 1, 'Sedekah Kaum Dhuafa', 0, 1000000, NULL, 'Bantu anak kaum Dhuafa dan Hafidz Qur\'an ', '2024-12-16 00:19:27', '2024-12-17', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_pembuat` (`id_pembuat`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `campaign`
--
ALTER TABLE `campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `campaign`
--
ALTER TABLE `campaign`
  ADD CONSTRAINT `campaign_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `campaign_ibfk_2` FOREIGN KEY (`id_pembuat`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
