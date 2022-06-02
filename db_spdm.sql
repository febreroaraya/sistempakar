-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2022 pada 02.59
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spdm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `id_session` char(100) NOT NULL,
  `no_telp` int(12) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `id_session`, `no_telp`, `email`) VALUES
('admin', 'admin', 'My Coding', 'rvdp8mljuvpc97l38l9vhqv282', 2147483647, '401xdssh@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(11) NOT NULL,
  `kd_penyakit` varchar(64) NOT NULL,
  `kd_gejala` varchar(64) NOT NULL,
  `nilai_probabilitas` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bukutamu`
--

CREATE TABLE `bukutamu` (
  `id_bukutamu` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `captcha` char(6) NOT NULL,
  `tanggal` date NOT NULL,
  `publish` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diagnosa`
--

CREATE TABLE `diagnosa` (
  `kd_diagnosa` varchar(64) NOT NULL,
  `kd_gejala` varchar(64) NOT NULL,
  `kd_penyakit` varchar(64) NOT NULL,
  `id_pasien` int(11) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `jenis_kelamin` varchar(30) DEFAULT NULL,
  `usia` varchar(50) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `nilai` float NOT NULL,
  `tgl_diagnosa` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE `gejala` (
  `kd_gejala` varchar(64) NOT NULL,
  `nm_gejala` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `nm_gejala`) VALUES
('G01', 'Mudah haus'),
('G02', 'Mudah lapar'),
('G03', 'Mudah lelah'),
('G04', 'Usia antara 0-14 tahun'),
('G05', 'Sering kencing lebih dari 8 kali sehari'),
('G06', 'Penurunan berat badan'),
('G07', 'Mata kabur'),
('G08', 'Kesemutan'),
('G09', 'Gatal-gatal pada tubuh tanpa sebab'),
('G10', 'Timbul bisul yang bernanah'),
('G11', 'Impotensi (L) / Keputihan (P)'),
('G12', 'Infeksi'),
('G13', 'Keturunan keluarga'),
('G14', 'Masa kehamilan'),
('G15', 'Peningkatan kadar gula saat masa kehamilan'),
('G16', 'Mempunyai riwayat melahirkan bayi besar'),
('G17', 'Bibir kering'),
('G18', 'Sering mengkonsumsi obat steroid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `usia` varchar(50) NOT NULL,
  `alamat` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE `penyakit` (
  `kd_penyakit` varchar(64) NOT NULL,
  `nm_penyakit` varchar(255) NOT NULL,
  `pencegahan` text NOT NULL,
  `pengobatan` text NOT NULL,
  `np_populasi` double(6,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`kd_penyakit`, `nm_penyakit`, `pencegahan`, `pengobatan`, `np_populasi`) VALUES
('P01', 'Diabetes Mellitus Tipe 1', '', '', 0.000000),
('P02', 'Diabetes Mellitus Tipe 2', '', '', 0.000000),
('P03', 'Diabetes Mellitus Gestasional', '', '', 0.000000),
('P04', 'Diabetes Mellitus Tipe Lain', '', '', 0.000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmp_diagnosa`
--

CREATE TABLE `tmp_diagnosa` (
  `ID` varchar(100) NOT NULL,
  `kd_penyakit` char(2) NOT NULL,
  `hasil_hitung` double(6,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tmp_diagnosa`
--

INSERT INTO `tmp_diagnosa` (`ID`, `kd_penyakit`, `hasil_hitung`) VALUES
('127001', 'H2', 0.000000),
('::1', 'H4', 0.329492),
('::1', 'H3', 0.465085),
('::1', 'H2', 0.128136),
('::1', 'H1', 0.077288);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indeks untuk tabel `bukutamu`
--
ALTER TABLE `bukutamu`
  ADD PRIMARY KEY (`id_bukutamu`);

--
-- Indeks untuk tabel `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`kd_diagnosa`);

--
-- Indeks untuk tabel `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `bukutamu`
--
ALTER TABLE `bukutamu`
  MODIFY `id_bukutamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=626;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
