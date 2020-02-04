-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2020 at 12:44 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensita`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id_absen` int(11) NOT NULL,
  `kode_mhs` varchar(100) NOT NULL,
  `npm` varchar(50) NOT NULL,
  `id_matkul` varchar(50) NOT NULL,
  `id_ruang` int(25) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Masuk'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id_absen`, `kode_mhs`, `npm`, `id_matkul`, `id_ruang`, `hari`, `jam`, `tanggal`, `status`) VALUES
(6, '82-28-c3-1e-77', '', '16010106', 3, 'Minggu', '18:02:21', '02-02-2020', 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `kode_mhs` varchar(25) NOT NULL,
  `id_matkul` varchar(25) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `id_ruang` varchar(20) NOT NULL,
  `j_mulai` varchar(10) NOT NULL,
  `m_mulai` varchar(10) NOT NULL,
  `j_akhir` varchar(10) NOT NULL,
  `m_akhir` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Publish'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `kode_mhs`, `id_matkul`, `hari`, `id_ruang`, `j_mulai`, `m_mulai`, `j_akhir`, `m_akhir`, `status`) VALUES
(1, '33-2D-2C-1D-2F', '16010101', 'Kamis', '3', '08', '00', '09', '50', 'Publish'),
(2, '33-BB-D4-1D-41', '16010102', 'Senin', '2', '11', '40', '13', '30', 'Publish'),
(3, '82-28-C3-1E-77', '16010106', 'Minggu', '3', '18', '00', '19', '30', 'Publish'),
(4, '82-B3-D0-1E-FF', '16010104', 'Minggu', '3', '20', '00', '21', '50', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `kodemhs`
--

CREATE TABLE `kodemhs` (
  `id_kode` int(11) NOT NULL,
  `kode_kartu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kodemhs`
--

INSERT INTO `kodemhs` (`id_kode`, `kode_kartu`) VALUES
(1, '52-73-65-1c-58');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `kode_mhs` varchar(50) NOT NULL,
  `npm` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nick` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `ttl` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `progdi` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`kode_mhs`, `npm`, `nama`, `nick`, `email`, `password`, `alamat`, `jenis_kelamin`, `telepon`, `tempat_lahir`, `ttl`, `status`, `progdi`, `kelas`, `gambar`) VALUES
('22-FA-B0-1A-72', '163112706450007', 'Alfin', 'Alfin', 'alfin@gmail.com', '12345678', 'Jl. Krukut, Krukut', 'Laki-laki', '2234567676', 'Kab. Semarang', '1998-04-08', 'Aktif', 'Informatika', 'Reguler', 'alpin2.jpeg'),
('33-2D-2C-1D-2F', '163112706450001', 'Rahmat', 'Rahmat', 'rahmat@gmail.com', '12345678', 'Menteng', 'Laki-laki', '086933589641', 'Kab. Semarang', '1998-04-01', 'Aktif', 'Informatika', 'Reguler', 'rahmat.jpeg'),
('33-BB-D4-1D-41', '163112706450002', 'Arip', 'Arip', 'arip@gmail.com', '12345678', 'Depok', 'Laki-laki', '089628781775', 'Ponorogo', '1998-04-08', 'Aktif', 'Informatika', 'Reguler', 'arip1.jpeg'),
('42-D4-47-1C-CD', '163112706450008', 'Imam', 'Imam', 'imam@gmail.com', '12345678', 'Jl. Krukut, Krukut', 'Laki-laki', '086933254646', 'jakarta', '1998-09-09', 'Aktif', 'Informatika', 'Reguler', 'imam1.jpeg'),
('51-82-27-1E-EA', '163112706450012', 'Pijan', 'Pijan', 'pijan@gmail.com', '12345678', 'Depok', 'Laki-laki', '086933254646', 'Ponorogo', '1998-04-08', 'Aktif', 'Informatika', 'Reguler', 'pijan1.jpeg'),
('61-A-F-1E-7A', '163112706450011', 'Tommy', 'Tommy', 'tommy@gmail.com', '12345678', 'Depok', 'Laki-laki', '086933589641', 'jakarta', '1998-04-01', 'Aktif', 'Informatika', 'Reguler', 'tommy1.jpeg'),
('82-28-C3-1E-77', '163112706450003', 'Singgih Yulianto Bastian', 'Singgih ', 'yuliantitho007@gmail.com', 'q1w23e4r', 'Jl. Nurul Falah, Srengseng, Jagakarsa', 'Laki-laki', '089628781775', 'Kab. Semarang', '1997-07-26', 'Aktif', 'Informatika', 'Reguler', 'user2-j.jpg'),
('82-B3-D0-1E-FF', '163112706450004', 'Moh. Dani Ariawan', 'Dani', 'danii@gmail.com', '12345678', 'Menteng', 'Laki-laki', '086933589641', 'jakarta', '1998-04-08', 'Aktif', 'Informatika', 'Reguler', 'dani1.jpeg'),
('9-51-C8-99-9', '163112706450006', 'Nicko', 'Nicko', 'nicko@gmail.com', '12345678', 'Warsil', 'Laki-laki', '2334564754', 'jakarta', '1998-09-09', 'Aktif', 'Informatika', 'Reguler', 'nicko1.jpeg'),
('A-C4-E7-B-22', '163112706450005', 'Gusti', 'Gusti', 'gusti@gmail.com', '12345678', 'Manggarai', 'Laki-laki', '543431321313', 'jakarta', '1998-04-01', 'Aktif', 'Informatika', 'Reguler', 'gusti1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id_matkul` varchar(15) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `sks` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `nama_matkul`, `sks`) VALUES
('16010101', 'Deep Learning', '2'),
('16010102', 'Animasi Komputer', '3'),
('16010103', 'Praktikum Sistem Basis Data', '2'),
('16010104', 'Praktikum Algoritma dan Pemrograman 1', '2'),
('16010105', 'Praktikum Pemrograman Visual', '2'),
('16010106', 'Data Science', '2'),
('16010107', 'Grafik Komputer', '2'),
('16010108', 'Praktikum Pemrograman Multimedia', '2'),
('16010109', 'Basis Data', '4'),
('16010110', 'Praktikum Pemrograman Berbasis Web 1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`) VALUES
(1, 'Lab. Informatika 1'),
(2, 'Lab. Informatika 2'),
(3, 'Lab. Jaringan Komputer'),
(4, 'Lab. Hardware');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'Singgih', '1fa2ecdfba0c2d4a86a65f2b646c0bc3'),
(3, 'asusgaming', 'ae0d2ffb5efefdfacba83c31e9da271c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kodemhs`
--
ALTER TABLE `kodemhs`
  ADD PRIMARY KEY (`id_kode`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`kode_mhs`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kodemhs`
--
ALTER TABLE `kodemhs`
  MODIFY `id_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
