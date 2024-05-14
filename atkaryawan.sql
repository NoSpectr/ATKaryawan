-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Bulan Mei 2024 pada 06.12
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
-- Database: `atkaryawan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `username` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(10) NOT NULL,
  `id_karyawan` int(10) NOT NULL,
  `nama_karyawan` varchar(20) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `gaji_pokok` varchar(20) NOT NULL,
  `status_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(10) NOT NULL,
  `nama_karyawan` varchar(20) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `jk` enum('Laki - laki','Perempuan','','') NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `ttl` varchar(20) NOT NULL,
  `status_karyawan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id_gaji` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_karyawan`) REFERENCES `gaji` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
