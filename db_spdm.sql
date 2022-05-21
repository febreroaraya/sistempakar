-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2020 at 11:56 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spnaivebayes3`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_lengkap`, `id_session`, `no_telp`, `email`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'My Coding', 'rvdp8mljuvpc97l38l9vhqv282', 2147483647, '401xdssh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `aturan`
--

CREATE TABLE `aturan` (
  `id_aturan` int(4) NOT NULL,
  `kd_penyakit` char(2) NOT NULL,
  `kd_gejala` char(3) NOT NULL,
  `nilai_probabilitas` double(6,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan`
--

INSERT INTO `aturan` (`id_aturan`, `kd_penyakit`, `kd_gejala`, `nilai_probabilitas`) VALUES
(94, 'H2', 'E06', 0.300000),
(93, 'H2', 'E05', 0.300000),
(92, 'H2', 'E04', 0.900000),
(112, 'H3', 'E07', 0.700000),
(89, 'H2', 'E01', 0.700000),
(87, 'H1', 'E06', 0.950000),
(86, 'H1', 'E05', 0.200000),
(85, 'H1', 'E04', 0.200000),
(113, 'H4', 'E07', 0.300000),
(82, 'H1', 'E01', 0.200000),
(96, 'H3', 'E01', 0.700000),
(111, 'H2', 'E07', 0.300000),
(99, 'H3', 'E04', 0.200000),
(100, 'H3', 'E05', 0.200000),
(101, 'H3', 'E06', 0.700000),
(103, 'H4', 'E01', 0.600000),
(110, 'H1', 'E07', 0.300000),
(106, 'H4', 'E04', 0.200000),
(107, 'H4', 'E05', 0.900000),
(108, 'H4', 'E06', 0.300000);

-- --------------------------------------------------------

--
-- Table structure for table `bukutamu`
--

CREATE TABLE `bukutamu` (
  `id_bukutamu` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `captcha` char(6) NOT NULL,
  `tanggal` date NOT NULL,
  `publish` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bukutamu`
--

INSERT INTO `bukutamu` (`id_bukutamu`, `nama`, `email`, `pesan`, `captcha`, `tanggal`, `publish`) VALUES
(2, 'rikko', '401xdssh@gmail.com', 'apakah ada lokasi klinik nya di kota padang?', '3b9ad3', '2020-09-14', 'Y'),
(3, 'dewita', '401xdssh@gmail.com', 'bagaimana menggunakan sistem ini?', '486be5', '2020-09-14', 'Y'),
(4, 'sari', '401xdssh@gmail.com', 'saya tidak sakit tuan!', '16f757', '2020-09-14', 'Y'),
(5, 'linda', '401xdssh@gmail.com', 'saya juga tidak sakit tuan!', '16f757', '2020-09-14', 'Y'),
(6, 'kiki', '401xdssh@gmail.com', 'gimana cara daftar ya pak?', 'aec1a3', '2020-09-14', 'Y'),
(7, 'lesvina', '401xdssh@gmail.com', 'gimana cara daftar jadi pakar?', 'aec1a3', '2020-09-14', 'Y'),
(8, 'dewinda', '401xdssh@gmail.com', 'tolong skripsi saya', '74f23e', '2020-09-14', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosa`
--

CREATE TABLE `diagnosa` (
  `kd_diagnosa` int(11) NOT NULL,
  `kd_gejala` char(3) NOT NULL,
  `kd_penyakit` char(2) NOT NULL,
  `idpasien` int(10) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `jenis_kelamin` varchar(30) DEFAULT NULL,
  `usia` varchar(50) DEFAULT NULL,
  `alamat` varchar(30) DEFAULT NULL,
  `nilai` double(6,6) NOT NULL,
  `tgl_diagnosa` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diagnosa`
--

INSERT INTO `diagnosa` (`kd_diagnosa`, `kd_gejala`, `kd_penyakit`, `idpasien`, `nama`, `jenis_kelamin`, `usia`, `alamat`, `nilai`, `tgl_diagnosa`) VALUES
(590, 'E06', 'H3', 625, 'marpoyah', 'Laki-laki', '26', 'bogor', 0.700000, '2020-09-15'),
(589, 'E05', 'H3', 625, 'marpoyah', 'Laki-laki', '26', 'bogor', 0.200000, '2020-09-15'),
(588, 'E01', 'H3', 625, 'marpoyah', 'Laki-laki', '26', 'bogor', 0.700000, '2020-09-15'),
(587, 'E06', 'H2', 624, 'irul', 'Laki-laki', '15', 'bandung', 0.300000, '2020-09-15'),
(586, 'E05', 'H2', 624, 'irul', 'Laki-laki', '15', 'bandung', 0.300000, '2020-09-15'),
(585, 'E04', 'H2', 624, 'irul', 'Laki-laki', '15', 'bandung', 0.900000, '2020-09-15'),
(584, 'E01', 'H2', 624, 'irul', 'Laki-laki', '15', 'bandung', 0.700000, '2020-09-15'),
(580, 'E05', 'H2', 623, 'dewi', 'Laki-laki', '14', 'jambi', 0.300000, '2020-09-15'),
(579, 'E04', 'H2', 623, 'dewi', 'Laki-laki', '14', 'jambi', 0.900000, '2020-09-15'),
(578, 'E01', 'H2', 623, 'dewi', 'Laki-laki', '14', 'jambi', 0.700000, '2020-09-15'),
(577, 'E05', 'H2', 622, 'dewi', 'Laki-laki', '14', 'jambi', 0.300000, '2020-09-15'),
(576, 'E04', 'H2', 622, 'dewi', 'Laki-laki', '14', 'jambi', 0.900000, '2020-09-15'),
(575, 'E01', 'H2', 622, 'dewi', 'Laki-laki', '14', 'jambi', 0.700000, '2020-09-15'),
(574, 'E07', 'H2', 621, 'gunawan', 'Laki-laki', '25', 'jambi', 0.300000, '2020-09-15'),
(573, 'E05', 'H2', 621, 'gunawan', 'Laki-laki', '25', 'jambi', 0.300000, '2020-09-15'),
(572, 'E04', 'H2', 621, 'gunawan', 'Laki-laki', '25', 'jambi', 0.900000, '2020-09-15'),
(571, 'E07', 'H3', 620, 'dewi', 'Perempuan', '13', 'bandung barat', 0.700000, '2020-09-15'),
(570, 'E06', 'H3', 620, 'dewi', 'Perempuan', '13', 'bandung barat', 0.700000, '2020-09-15'),
(569, 'E05', 'H3', 620, 'dewi', 'Perempuan', '13', 'bandung barat', 0.200000, '2020-09-15'),
(568, 'E07', 'H3', 619, 'dewi', 'Perempuan', '13', 'bandung barat', 0.700000, '2020-09-15'),
(567, 'E06', 'H3', 619, 'dewi', 'Perempuan', '13', 'bandung barat', 0.700000, '2020-09-15'),
(566, 'E05', 'H3', 619, 'dewi', 'Perempuan', '13', 'bandung barat', 0.200000, '2020-09-15'),
(565, 'E07', 'H2', 618, 'indah', 'Perempuan', '35', 'mana aja', 0.300000, '2020-09-15'),
(564, 'E05', 'H2', 618, 'indah', 'Perempuan', '35', 'mana aja', 0.300000, '2020-09-15'),
(563, 'E04', 'H2', 618, 'indah', 'Perempuan', '35', 'mana aja', 0.900000, '2020-09-15'),
(562, 'E07', 'H2', 617, 'rikko', 'Laki-laki', '15', 'jambi', 0.300000, '2020-09-15'),
(561, 'E06', 'H2', 617, 'rikko', 'Laki-laki', '15', 'jambi', 0.300000, '2020-09-15'),
(560, 'E05', 'H2', 617, 'rikko', 'Laki-laki', '15', 'jambi', 0.300000, '2020-09-15'),
(559, 'E04', 'H2', 617, 'rikko', 'Laki-laki', '15', 'jambi', 0.900000, '2020-09-15'),
(558, 'E01', 'H2', 617, 'rikko', 'Laki-laki', '15', 'jambi', 0.700000, '2020-09-15'),
(557, 'E05', 'H2', 616, 'dewita', 'Laki-laki', '13', 'padang', 0.300000, '2020-09-15'),
(556, 'E04', 'H2', 616, 'dewita', 'Laki-laki', '13', 'padang', 0.900000, '2020-09-15'),
(555, 'E01', 'H2', 616, 'dewita', 'Laki-laki', '13', 'padang', 0.700000, '2020-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `kd_gejala` char(3) NOT NULL,
  `nm_gejala` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `nm_gejala`) VALUES
('E06', 'Lemas'),
('E05', 'Pilek'),
('E04', 'Batuk'),
('E01', 'Badan Panas'),
('E07', 'Kedinginan');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `idpasien` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(30) DEFAULT NULL,
  `usia` varchar(50) NOT NULL,
  `alamat` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`idpasien`, `nama`, `jenis_kelamin`, `usia`, `alamat`) VALUES
(625, 'marpoyah', 'Laki-laki', '26', 'bogor'),
(624, 'irul', 'Laki-laki', '15', 'bandung'),
(622, 'dewi', 'Laki-laki', '14', 'jambi'),
(621, 'gunawan', 'Laki-laki', '25', 'jambi'),
(620, 'dewi', 'Perempuan', '13', 'bandung barat'),
(618, 'indah', 'Perempuan', '35', 'mana aja'),
(617, 'rikko', 'Laki-laki', '15', 'jambi'),
(616, 'dewita', 'Laki-laki', '13', 'padang');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kd_penyakit` char(2) NOT NULL,
  `nm_penyakit` varchar(255) NOT NULL,
  `pencegahan` text NOT NULL,
  `pengobatan` text NOT NULL,
  `np_populasi` double(6,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kd_penyakit`, `nm_penyakit`, `pencegahan`, `pengobatan`, `np_populasi`) VALUES
('H1', 'Anemia', 'Pencegahan Penyakit Anemia', 'Solusi Pengobatan Penyakit Anemia', 0.500000),
('H2', 'Bronkhitis', 'Pencegahan Penyakit Bronkhitis', 'Solusi Pengobatan Penyakit Bronkhitis', 0.500000),
('H3', 'Demam', 'Pencegahan Penyakit Demam', 'Solusi Pengobatan Penyakit Demam', 0.500000),
('H4', 'Flu', 'Pencegahan Penyakit Flu', 'Solusi Pengobatan Penyakit Flu', 0.500000);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_diagnosa`
--

CREATE TABLE `tmp_diagnosa` (
  `ID` varchar(100) NOT NULL,
  `kd_penyakit` char(2) NOT NULL,
  `hasil_hitung` double(6,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_diagnosa`
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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `aturan`
--
ALTER TABLE `aturan`
  ADD PRIMARY KEY (`id_aturan`);

--
-- Indexes for table `bukutamu`
--
ALTER TABLE `bukutamu`
  ADD PRIMARY KEY (`id_bukutamu`);

--
-- Indexes for table `diagnosa`
--
ALTER TABLE `diagnosa`
  ADD PRIMARY KEY (`kd_diagnosa`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`kd_gejala`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`idpasien`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aturan`
--
ALTER TABLE `aturan`
  MODIFY `id_aturan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `bukutamu`
--
ALTER TABLE `bukutamu`
  MODIFY `id_bukutamu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `diagnosa`
--
ALTER TABLE `diagnosa`
  MODIFY `kd_diagnosa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=592;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `idpasien` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=626;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
