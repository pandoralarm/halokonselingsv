-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Mar 2021 pada 17.04
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hksv`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `idPengajuan` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(16) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `namaBeasiswa` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `tanggalPengajuan` datetime NOT NULL,
  `status` enum('Diproses','Disetujui','Ditolak','') NOT NULL,
  `rekomendasi` text DEFAULT NULL,
  `cv` text NOT NULL,
  `dosenPJ` text NOT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`idPengajuan`, `nama`, `nim`, `prodi`, `namaBeasiswa`, `deadline`, `tanggalPengajuan`, `status`, `rekomendasi`, `cv`, `dosenPJ`, `catatan`) VALUES
(6, 'Akhmad Nazhar Aji S', 'J3C118158', 'Manajemen Informatika', 'BeasiswaDitolak', '2021-03-24', '2021-03-23 17:16:50', 'Ditolak', NULL, '1616494610_11166c16ef0fe980fd37.pdf', '', ''),
(9, 'Akhmad Nazhar Aji S', 'J3C118158', 'Manajemen Informatika', 'd', '2021-03-12', '2021-03-23 21:19:59', 'Diproses', NULL, '1616509199_0cb6fe5977419780c7a9.pdf', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`idPengajuan`),
  ADD UNIQUE KEY `rekomendasi` (`rekomendasi`) USING HASH,
  ADD UNIQUE KEY `cv` (`cv`) USING HASH;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `idPengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
