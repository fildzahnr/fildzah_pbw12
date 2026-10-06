-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 13 Sep 2026 pada 18.24
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praktikum9_pbw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `publikasi`
--

CREATE TABLE `publikasi` (
  `nomor` int(10) NOT NULL,
  `judul` text NOT NULL,
  `tanggal_rilis` date NOT NULL,
  `sampul` varchar(255) NOT NULL,
  `isi_publikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `publikasi`
--

INSERT INTO `publikasi` (`nomor`, `judul`, `tanggal_rilis`, `sampul`, `isi_publikasi`) VALUES
(1, 'Analisis Kondisi Kemiskinan di Provinsi Jambi 2025', '2026-03-13', 'pub1.webp', 'https://jambi.bps.go.id/id/publication/2026/03/13/019769a63b0b99de0a2222fe/analisis-kondisi-kemiskinan-provinsi-jambi-2025.html'),
(2, 'Analisis Pola Konsumsi Masyarakat Provinsi Jambi Tahun 2025', '2026-03-09', 'pub2.webp', ''),
(3, 'Provinsi Jambi dalam Angka Tahun 2026', '2026-02-27', 'pub3.webp', 'https://jambi.bps.go.id/id/publication/2026/02/27/2dadf1db028028730dae8c78/provinsi-jambi-dalam-angka-2026.html'),
(4, 'Statistik Lansia di Jambi', '2025-08-05', 'asset/pub5.webp', 'https://jambi.bps.go.id/id/publication/2026/02/23/4dc693d04845567f1fd52df7/statistik-penduduk-lansia-provinsi-jambi-2025.html');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', '$2y$10$C4kclcaNtuuFEzDQcxP4kepnw.1mo2OIvNXzuigO.30gm6UY7dege'),
('coba', '$2y$10$tIzSDH11kaXPZn3qlgfZou554q8Qtp9m2ZAq3z7wykCXG8cP1sPcC'),
('fildzah', '$2y$10$6D56cptG2hbd6dyfmauEvulERilMO4wU4ObXdek1tD9'),
('tes', '$2y$10$nlh612lA9pWaJ5f54frpkOH7jejd7Lh1SufQ5in1VmWFGe1BaCNu6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `publikasi`
--
ALTER TABLE `publikasi`
  MODIFY `nomor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
