-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2022 pada 12.10
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_zahera`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karaoke`
--

CREATE TABLE `tb_karaoke` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `jml_lagu` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_karaoke`
--

INSERT INTO `tb_karaoke` (`id`, `tanggal`, `nama`, `nohp`, `jml_lagu`, `harga`, `total`, `status`) VALUES
(11, '2022-07-14', 'asemka', '3434', '4', '2000', '', 'Selesai'),
(12, '2022-07-14', 'asd', '121222', '4', '2000', '', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id`, `nama_lengkap`, `email`, `pass`, `level`) VALUES
(1, 'zahera kafe 2', 'zahera@gmail.com', 'admin123', 'admin'),
(4, 'ojan', 'ojan@gmail.com', '123', 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_makanan`
--

CREATE TABLE `tb_makanan` (
  `id` int(11) NOT NULL,
  `id_makanan` varchar(255) NOT NULL,
  `nama_makanan` varchar(255) NOT NULL,
  `harga_makanan` varchar(255) NOT NULL,
  `gmb_makanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_makanan`
--

INSERT INTO `tb_makanan` (`id`, `id_makanan`, `nama_makanan`, `harga_makanan`, `gmb_makanan`) VALUES
(11, 'MK001', 'Kentang Goreng', '10000', '4.png'),
(13, 'MK002', 'Pisang Ple’nets Coklat', '10000', '5.png'),
(14, 'MK003', 'Hot Pangsit Ndower', '12000', '6.png'),
(15, 'MK004', 'Nasi Goreng Buah Naga', '17000', '7.png'),
(16, 'MK005', 'Nasi goreng Pattaya Thai ', '20000', '8.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_minuman`
--

CREATE TABLE `tb_minuman` (
  `id` int(11) NOT NULL,
  `id_minuman` varchar(255) NOT NULL,
  `nama_minuman` varchar(255) NOT NULL,
  `harga_minuman` varchar(255) NOT NULL,
  `gmb_minuman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_minuman`
--

INSERT INTO `tb_minuman` (`id`, `id_minuman`, `nama_minuman`, `harga_minuman`, `gmb_minuman`) VALUES
(7, 'MI001', 'Es Teller', '12000', '1.png'),
(8, 'MI002', 'Es Cappucino', '10000', '2.png'),
(9, 'MI003', 'Es Coklat', '10000', '3.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `id_minuman` varchar(255) NOT NULL,
  `id_makanan` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `jml_makanan` varchar(255) NOT NULL,
  `jml_minuman` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `tanggal`, `id_minuman`, `id_makanan`, `nama`, `nohp`, `jml_makanan`, `jml_minuman`, `total`, `status`) VALUES
(37, '2022-07-14', 'MI001', 'MK005', 'waryo', '3434', '2', '2', '', 'Selesai'),
(38, '2022-07-14', 'MI002', 'MK005', 'aryo', '1234', '2', '1', '', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_review`
--

CREATE TABLE `tb_review` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_review`
--

INSERT INTO `tb_review` (`id`, `nama`, `email`, `deskripsi`) VALUES
(5, 'Muhtarom', 'mrtar@gmail.com', 'tempatnya bagus cuk'),
(6, 'mr henz', 'mrhenz@gmail.com', 'mene oh bol'),
(7, 'epic', '1@gm.co', 'hei pujaan hati apakabarmu');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_karaoke`
--
ALTER TABLE `tb_karaoke`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_makanan`
--
ALTER TABLE `tb_makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_minuman`
--
ALTER TABLE `tb_minuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_karaoke`
--
ALTER TABLE `tb_karaoke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_makanan`
--
ALTER TABLE `tb_makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_minuman`
--
ALTER TABLE `tb_minuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `tb_review`
--
ALTER TABLE `tb_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
