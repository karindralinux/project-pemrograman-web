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
-- Struktur dari tabel `donasi`
--

CREATE TABLE `donasi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_campaign` int(11) NOT NULL,
  `jumlah_donasi` double NOT NULL,
  `metode_pembayaran` varchar(255) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `is_anonim` tinyint(1) DEFAULT 0,
  `status` enum('pending','success','failed') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `donasi`
--

INSERT INTO `donasi` (`id`, `id_user`, `id_campaign`, `jumlah_donasi`, `metode_pembayaran`, `pesan`, `is_anonim`, `status`, `created_at`) VALUES
(1, 2, 1, 100000, 'Shopee', 'Semoga bisa membantu', 0, 'pending', '2024-12-16 00:20:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_campaign` (`id_campaign`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `donasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donasi_ibfk_2` FOREIGN KEY (`id_campaign`) REFERENCES `campaign` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
