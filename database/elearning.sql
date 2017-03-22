-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Mar 2017 pada 11.37
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jwb_quiz`
--

CREATE TABLE `jwb_quiz` (
  `id` int(11) NOT NULL,
  `id_user` text NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban` varchar(5) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `pertanyaan` text NOT NULL,
  `soal_A` text NOT NULL,
  `soal_B` text NOT NULL,
  `soal_C` text NOT NULL,
  `soal_D` text NOT NULL,
  `jawaban` varchar(5) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `quiz`
--

INSERT INTO `quiz` (`id`, `kategori`, `pertanyaan`, `soal_A`, `soal_B`, `soal_C`, `soal_D`, `jawaban`, `keterangan`, `gambar`) VALUES
(2, 'Bahasa Indonesia', 'sadas?', 'asdas', 'asdsa', 'asdsa', 'asdsa', 'A', 'asdsa', 'Logo HUT RI ke 71.png'),
(4, 'Ilmu Pengetahuan Alam', 'kenapa pohon harus di siram?', 'karena wajib', 'karena biar tumbuh', 'gag tau', 'salah semua', 'A', 'hoho', 'Professional-Google-SEO-Services.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jwb_quiz`
--
ALTER TABLE `jwb_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jwb_quiz`
--
ALTER TABLE `jwb_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
