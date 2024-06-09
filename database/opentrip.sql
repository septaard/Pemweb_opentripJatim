-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Bulan Mei 2024 pada 19.28
-- Versi server: 8.0.30
-- Versi PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `opentrip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `Id` int NOT NULL,
  `Username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akomodasi`
--

CREATE TABLE `akomodasi` (
  `Id` int NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kontak` int NOT NULL,
  `lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `Id` int NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int NOT NULL,
  `metode` varchar(255) NOT NULL,
  `Id_Admin` int NOT NULL,
  `Id_User` int NOT NULL,
  `Id_Trip` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportasi`
--

CREATE TABLE `transportasi` (
  `Id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `kontak` int NOT NULL,
  `lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `trip`
--

CREATE TABLE `trip` (
  `Id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `destinasi` varchar(255) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_Pulang` date NOT NULL,
  `harga` int NOT NULL,
  `durasi` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `Id_akomodasi` int NOT NULL,
  `Id_Transportasi` int NOT NULL,
  `Id_admin` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `Id` int NOT NULL,
  `Username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `akomodasi`
--
ALTER TABLE `akomodasi`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_Admin` (`Id_Admin`),
  ADD UNIQUE KEY `Id_User` (`Id_User`),
  ADD UNIQUE KEY `Id_Trip` (`Id_Trip`);

--
-- Indeks untuk tabel `transportasi`
--
ALTER TABLE `transportasi`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks untuk tabel `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Id_akomodasi` (`Id_akomodasi`),
  ADD UNIQUE KEY `Id_Transportasi` (`Id_Transportasi`),
  ADD UNIQUE KEY `Id_admin` (`Id_admin`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `akomodasi`
--
ALTER TABLE `akomodasi`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transportasi`
--
ALTER TABLE `transportasi`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `trip`
--
ALTER TABLE `trip`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`Id_Admin`) REFERENCES `admin` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`Id_Trip`) REFERENCES `trip` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `trip_ibfk_1` FOREIGN KEY (`Id_admin`) REFERENCES `admin` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trip_ibfk_2` FOREIGN KEY (`Id_akomodasi`) REFERENCES `akomodasi` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trip_ibfk_3` FOREIGN KEY (`Id_Transportasi`) REFERENCES `transportasi` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
