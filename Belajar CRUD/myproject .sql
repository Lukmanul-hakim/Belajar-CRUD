-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2024 pada 16.18
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectcrud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `myproject`
--

CREATE TABLE `myproject` (
  `id` int(11) NOT NULL,
  `Nama_Project` varchar(50) NOT NULL,
  `Tanggal_Pembuatan` date NOT NULL,
  `Jenis_Project` enum('Pemrograman','Multimedia','Office') NOT NULL,
  `Hasil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `myproject`
--

INSERT INTO `myproject` (`id`, `Nama_Project`, `Tanggal_Pembuatan`, `Jenis_Project`, `Hasil`) VALUES
(8, 'Company Profile', '2024-04-02', 'Pemrograman', 'company.jpg'),
(9, 'ssss', '2024-04-08', 'Multimedia', '6630f8e8e553a.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `myproject`
--
ALTER TABLE `myproject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `myproject`
--
ALTER TABLE `myproject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
