-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2020 pada 14.37
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbhkj`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `member_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `birth_place` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `tahun` int(4) NOT NULL,
  `asal_sekolah` varchar(255) NOT NULL,
  `asal_gudep` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`member_id`, `fullname`, `birth_place`, `birth_date`, `tahun`, `asal_sekolah`, `asal_gudep`, `address`, `status`) VALUES
(1, 'I Wayan Krisna Artawan', 'Jakarta', '2020-11-01', 2017, 'SMAN 93 Jakarta', '0', 'Jl. Ini', 'anggota'),
(2, 'Muhammad Suryadi', 'Jakarta', '2020-11-10', 2017, 'SMKN 10 Jakarta', '01928', 'Jl. Pecenongan', 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `challenge`
--

CREATE TABLE `challenge` (
  `chall_id` int(11) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `tantangan` text NOT NULL,
  `hukuman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `challenge`
--

INSERT INTO `challenge` (`chall_id`, `warna`, `tantangan`, `hukuman`) VALUES
(1, 'default', 'Salto 12 kali, secara cepat, tepat, dan seimbang, dan diulang selama 30 menit', 'a'),
(2, 'primary', 'Salto 12 kali, secara cepat, tepat, dan seimbang, dan diulang selama 30 menit', 'b'),
(3, 'success', 'Salto 12 kali, secara cepat, tepat, dan seimbang, dan diulang selama 30 menit', 'c'),
(4, 'info', 'Salto 12 kali, secara cepat, tepat, dan seimbang, dan diulang selama 30 menit', 'd'),
(5, 'warning', 'Salto 12 kali, secara cepat, tepat, dan seimbang, dan diulang selama 30 menit', 'e'),
(6, 'danger', 'Salto 12 kali, secara cepat, tepat, dan seimbang, dan diulang selama 30 menit', 'f');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dewan`
--

CREATE TABLE `dewan` (
  `dewan_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `unique_code` varchar(100) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `nama`, `username`, `password`, `address`, `level`) VALUES
(1, 'Dewan SBHKJ', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Jl. Kramat Jati', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`member_id`);

--
-- Indeks untuk tabel `challenge`
--
ALTER TABLE `challenge`
  ADD PRIMARY KEY (`chall_id`);

--
-- Indeks untuk tabel `dewan`
--
ALTER TABLE `dewan`
  ADD PRIMARY KEY (`dewan_id`),
  ADD KEY `fk_member` (`member_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `challenge`
--
ALTER TABLE `challenge`
  MODIFY `chall_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `dewan`
--
ALTER TABLE `dewan`
  MODIFY `dewan_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dewan`
--
ALTER TABLE `dewan`
  ADD CONSTRAINT `fk_member` FOREIGN KEY (`member_id`) REFERENCES `anggota` (`member_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
