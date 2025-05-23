-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Bulan Mei 2025 pada 17.03
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
-- Database: `tblbrg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblbrg`
--

CREATE TABLE `tblbrg` (
  `kdbarang` varchar(10) NOT NULL,
  `nmbarang` varchar(30) NOT NULL,
  `harga` int(10) NOT NULL DEFAULT 0,
  `jumlah` int(10) NOT NULL DEFAULT 0,
  `suplier` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tblbrg`
--

INSERT INTO `tblbrg` (`kdbarang`, `nmbarang`, `harga`, `jumlah`, `suplier`) VALUES
('', '', 0, 0, ''),
('A1001', 'PRINTER', 700000, 5, 'PT.TITANS KOMPUTER'),
('A1002', 'MONITOR', 800000, 20, 'IMAGE KOMPUTER'),
('A1003', 'HARDDISK', 400000, 30, 'ELANG KOMPUTER'),
('A1004', 'KEYBOARD', 50000, 5, 'BANDUNG KOMPUTER'),
('A1005', 'MOUSE', 30000, 10, 'BANDUNG KAMPUTER'),
('A1006', 'SPEAKER', 100000, 4, 'IQ KOMPUTER'),
('A1007', 'MIKROFON', 40000, 15, 'BANDUNG KOMPUTER'),
('A1008', 'JOYSTIK', 70000, 7, 'BANDUNG KOMPUTER');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tblbrg`
--
ALTER TABLE `tblbrg`
  ADD PRIMARY KEY (`kdbarang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
