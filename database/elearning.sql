-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29 Mar 2017 pada 05.47
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
  `jawaban_benar` varchar(5) NOT NULL,
  `pelajaran` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jwb_quiz`
--

INSERT INTO `jwb_quiz` (`id`, `id_user`, `id_soal`, `jawaban`, `jawaban_benar`, `pelajaran`) VALUES
(16, '1024477940986510', 4, 'B', 'A', 'Ilmu Pengetahuan Alam'),
(17, '1024477940986510', 6, 'C', 'C', 'Ilmu Pengetahuan Alam'),
(18, '1024477940986510', 2, 'B', 'A', 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `id_user` text NOT NULL,
  `komentar` text NOT NULL,
  `pelajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `id_user`, `komentar`, `pelajaran`) VALUES
(3, '1024477940986510', 'sdasd', 'Bahasa Indonesia'),
(4, '1024477940986510', 'adasdsad', 'Bahasa Indonesia'),
(5, '1024477940986510', 'sadas', 'Bahasa Indonesia');

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
(4, 'Ilmu Pengetahuan Alam', 'kenapa pohon harus di siram?', 'karena wajib', 'karena biar tumbuh', 'gag tau', 'salah semua', 'A', 'hoho', 'Professional-Google-SEO-Services.png'),
(5, 'Matematika', 'sebutkan paragraf pertama?', 'lalala', 'lelele', 'luluu', 'yeyeye', 'C', 'okeh...', 'iphone.jpg'),
(6, 'Ilmu Pengetahuan Alam', 'asdsad?', 'sdsad', 'sadsad', 'sadas', 'asdsad', 'C', 'asdsad', 'serverGoogle.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `pass` text NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nis`, `nama`, `pass`, `level`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'tes', 'tes@gmail.com', 'tes12', 'user'),
(9, '212', 'tes', '123', 'user'),
(10, '321', 'sasd', '', 'user'),
(11, '43', 'dimas', '123', 'user'),
(12, '222', 'coba', '123', 'user'),
(13, '1024477940986510', 'Dimas Alamsyah', '', 'userFB');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jwb_quiz`
--
ALTER TABLE `jwb_quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jwb_quiz`
--
ALTER TABLE `jwb_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
