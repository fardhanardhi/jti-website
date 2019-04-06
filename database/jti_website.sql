-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2019 at 12:26 AM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jti_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_absensi`
--

CREATE TABLE `tabel_absensi` (
  `id_absensi` int(30) NOT NULL,
  `id_mahasiswa` int(30) NOT NULL,
  `sakit` int(30) NOT NULL DEFAULT '0',
  `ijin` int(30) NOT NULL DEFAULT '0',
  `alpa` int(30) NOT NULL DEFAULT '0',
  `jumlah` int(30) NOT NULL DEFAULT '0',
  `id_status_mahasiswa` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id_admin` int(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` int(20) NOT NULL,
  `alamat` text,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tangal_lahir` date DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`id_admin`, `nama`, `nip`, `alamat`, `tempat_lahir`, `tangal_lahir`, `id_user`, `waktu_edit`) VALUES
(3, 'Vipkas', 12345, NULL, NULL, NULL, 32, '2019-04-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_attachment`
--

CREATE TABLE `tabel_attachment` (
  `id_attachment` int(30) NOT NULL,
  `tipe` enum('gambar','file') NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_attachment`
--

INSERT INTO `tabel_attachment` (`id_attachment`, `tipe`, `file`) VALUES
(1, 'gambar', 'yan.png'),
(2, 'gambar', 'yuri.png'),
(3, 'gambar', 'ariadi.png'),
(4, 'gambar', 'atiqah.png'),
(5, 'gambar', 'ridwan.png');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_chat`
--

CREATE TABLE `tabel_chat` (
  `id_chat` int(30) NOT NULL,
  `isi` text NOT NULL,
  `pengirim` int(30) NOT NULL,
  `penerima` int(30) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_dosen`
--

CREATE TABLE `tabel_dosen` (
  `id_dosen` int(30) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto` text,
  `id_user` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_dosen`
--

INSERT INTO `tabel_dosen` (`id_dosen`, `nip`, `nama`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `foto`, `id_user`, `waktu_edit`) VALUES
(4, '123456789', 'Ridwan', NULL, 'laki-laki', NULL, NULL, NULL, 31, '2019-04-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_hasil_kuisioner`
--

CREATE TABLE `tabel_hasil_kuisioner` (
  `id_hasil_kuisoner` int(30) NOT NULL,
  `id_mahasiswa` int(30) NOT NULL,
  `id_dosen` int(30) NOT NULL,
  `id_kuisoner` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_info`
--

CREATE TABLE `tabel_info` (
  `id_info` int(30) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `isi` text NOT NULL,
  `tipe` enum('pengumuman','berita') NOT NULL,
  `waktu` datetime NOT NULL,
  `id_attachment` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_info_beasiswa`
--

CREATE TABLE `tabel_info_beasiswa` (
  `id_beasiswa` int(30) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `isi` text NOT NULL,
  `id_attachment` int(30) DEFAULT NULL,
  `waktu_publish` datetime NOT NULL,
  `waktu_berakhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_info_kelas_kosong`
--

CREATE TABLE `tabel_info_kelas_kosong` (
  `id_info_kelas_kosong` int(30) NOT NULL,
  `id_ruang` int(30) NOT NULL,
  `peminjam` int(30) DEFAULT NULL,
  `hari` varchar(30) NOT NULL,
  `jumlah_jam` int(30) NOT NULL,
  `status_dipinjam` enum('kosong','dipinjam') NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `waktu_pinjam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jadwal`
--

CREATE TABLE `tabel_jadwal` (
  `id_jadwal` int(30) NOT NULL,
  `id_ruang` int(30) NOT NULL,
  `id_kelas` int(30) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_semester` int(30) NOT NULL,
  `id_dosen` int(30) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `hari` varchar(30) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `tingkat` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kelas`
--

CREATE TABLE `tabel_kelas` (
  `id_kelas` int(30) NOT NULL,
  `kode_kelas` varchar(50) NOT NULL,
  `id_prodi` int(10) NOT NULL,
  `tingkat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kelas`
--

INSERT INTO `tabel_kelas` (`id_kelas`, `kode_kelas`, `id_prodi`, `tingkat`) VALUES
(4, 'F', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_khs`
--

CREATE TABLE `tabel_khs` (
  `id_khs` int(30) NOT NULL,
  `id_mahasiswa` int(30) NOT NULL,
  `id_kelas` int(30) NOT NULL,
  `id_semester` int(30) NOT NULL,
  `id_matkul` int(11) DEFAULT NULL,
  `nilai` float NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_komentar`
--

CREATE TABLE `tabel_komentar` (
  `id_komentar` int(30) NOT NULL,
  `id_info` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `isi` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kompen`
--

CREATE TABLE `tabel_kompen` (
  `id_kompen` int(30) NOT NULL,
  `id_mahasiswa` int(30) NOT NULL,
  `id_dosen` int(11) DEFAULT NULL,
  `id_semester` int(11) NOT NULL,
  `jumlah_jam` int(30) NOT NULL,
  `waktu` datetime NOT NULL,
  `id_pekerjaan_kompen` int(11) DEFAULT NULL,
  `waktu_verifikasi` datetime NOT NULL,
  `status_verifikasi` enum('sudah terverifikasi','belum terverifikasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_krs`
--

CREATE TABLE `tabel_krs` (
  `id_krs` int(30) NOT NULL,
  `id_mahasiswa` int(30) NOT NULL,
  `id_matkul` int(100) DEFAULT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kuisioner`
--

CREATE TABLE `tabel_kuisioner` (
  `id_kuisioner` int(11) NOT NULL,
  `kriteria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mahasiswa`
--

CREATE TABLE `tabel_mahasiswa` (
  `id_mahasiswa` int(30) NOT NULL,
  `id_prodi` int(30) NOT NULL,
  `id_kelas` int(30) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `foto` text,
  `waktu_edit` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_mahasiswa`
--

INSERT INTO `tabel_mahasiswa` (`id_mahasiswa`, `id_prodi`, `id_kelas`, `id_semester`, `nim`, `nama`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `foto`, `waktu_edit`, `id_user`) VALUES
(33, 3, 4, 7, '1741720144', 'Abdallah Darussalam Candra', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 2),
(34, 3, 4, 7, '1741720008', 'Adn Maulidya Handah Putri', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 3),
(35, 3, 4, 7, '1741720040', 'Aldihamda Sulthon Fuad Prajakusuma', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 4),
(36, 3, 4, 7, '1741720043', 'Amin Anis Kuddah', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 5),
(37, 3, 4, 7, '1741720086', 'Chintya Puspa Dewi', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 6),
(38, 3, 4, 7, '1741720053', 'Dimas Shella Charlinawati', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 7),
(39, 3, 4, 7, '1741720054', 'Ermi Pristiyaningrum', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 8),
(40, 3, 4, 7, '1741720045', 'Fardhan Ardhi Ramadhan', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 9),
(41, 3, 4, 7, '1741720026', 'Galang Yudha Pratama', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 10),
(42, 3, 4, 7, '1741720088', 'Greggy Gianini Firmansyah', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 11),
(43, 3, 4, 7, '1741720192', 'Hafizh Dias Ramadhan', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 12),
(44, 3, 4, 7, '1741720058', 'Haryo Bagus Setyawan', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 13),
(45, 3, 4, 7, '1741720032', 'Hesti Anisa Reski', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 14),
(46, 3, 4, 7, '1741720018', 'Ika Puspa Fairuz Wiwanata', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 15),
(47, 3, 4, 7, '1741720011', 'Ilham Nuswantoro Aji', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 16),
(48, 3, 4, 7, '1741720027', 'Leni Saputri', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 17),
(49, 3, 4, 7, '1741720031', 'Muhammad Aliyul Murtadlo', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 18),
(50, 3, 4, 7, '1741720114', 'Okta Chandika Salsabila', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 19),
(51, 3, 4, 7, '1741720049', 'Panji Awwaludi Dzikriawan', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 20),
(52, 3, 4, 7, '1741720061', 'Rahardhiyan Wahyu Putra', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 21),
(53, 3, 4, 7, '1741720112', 'Reffan Pandu Amirulloh', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 22),
(54, 3, 4, 7, '1741720160', 'Reza Ariestya Putra', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 23),
(55, 3, 4, 7, '1741720111', 'Septa Kusumaningtyas', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 24),
(56, 3, 4, 7, '1741720196', 'Septian Caesar Floresko', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 25),
(57, 3, 4, 7, '1741720158', 'Sulthan Rafif', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 26),
(58, 3, 4, 7, '1741720081', 'Syahdanny Alhamda', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 27),
(59, 3, 4, 7, '1741720203', 'Vian Satria Maulana Navalino', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 28),
(60, 3, 4, 7, '1741720076', 'Vicko Handika Nanda Firdiansyah', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 29),
(61, 3, 4, 7, '1741720036', 'Wiji Prabowo', 'NULL', 'laki-laki', 'NULL', NULL, 'NULL', '2019-04-04 00:00:00', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_matkul`
--

CREATE TABLE `tabel_matkul` (
  `id_matkul` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL,
  `jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_notifikasi`
--

CREATE TABLE `tabel_notifikasi` (
  `id_notifikasi` int(30) NOT NULL,
  `isi` text NOT NULL,
  `waktu` time NOT NULL,
  `status_dibaca` enum('sudah','belum') NOT NULL,
  `id_mahasiswa` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pekerjaan_kompen`
--

CREATE TABLE `tabel_pekerjaan_kompen` (
  `id_pekerjaan_kompen` int(30) NOT NULL,
  `id_dosen` int(30) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_prodi`
--

CREATE TABLE `tabel_prodi` (
  `id_prodi` int(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_prodi`
--

INSERT INTO `tabel_prodi` (`id_prodi`, `nama`, `kode`) VALUES
(3, 'Teknik Informatika', 'TI'),
(4, 'Manajemen Informatika', 'MI');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_reply_komentar`
--

CREATE TABLE `tabel_reply_komentar` (
  `id_reply_komentar` int(11) NOT NULL,
  `isi` text NOT NULL,
  `id_komentar` int(11) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_ruang`
--

CREATE TABLE `tabel_ruang` (
  `id_ruang` int(30) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `lantai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_semester`
--

CREATE TABLE `tabel_semester` (
  `id_semester` int(30) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_semester`
--

INSERT INTO `tabel_semester` (`id_semester`, `semester`) VALUES
(4, 1),
(5, 2),
(6, 3),
(7, 4),
(8, 5),
(9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_status_mahasiswa`
--

CREATE TABLE `tabel_status_mahasiswa` (
  `id_status_mahasiswa` int(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_status_mahasiswa`
--

INSERT INTO `tabel_status_mahasiswa` (`id_status_mahasiswa`, `keterangan`) VALUES
(1, 'SP1'),
(2, 'SP2'),
(3, 'SP3');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` enum('mahasiswa','dosen','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `username`, `password`, `level`) VALUES
(2, '1741720144', '1741720144', 'mahasiswa'),
(3, '1741720008', '1741720008', 'mahasiswa'),
(4, '1741720040', '1741720040', 'mahasiswa'),
(5, '1741720043', '1741720043', 'mahasiswa'),
(6, '1741720086', '1741720086', 'mahasiswa'),
(7, '1741720053', '1741720053', 'mahasiswa'),
(8, '1741720054', '1741720054', 'mahasiswa'),
(9, '1741720045', '1741720045', 'mahasiswa'),
(10, '1741720026', '1741720026', 'mahasiswa'),
(11, '1741720088', '1741720088', 'mahasiswa'),
(12, '1741720192', '1741720192', 'mahasiswa'),
(13, '1741720058', '1741720058', 'mahasiswa'),
(14, '1741720032', '1741720032', 'mahasiswa'),
(15, '1741720018', '1741720018', 'mahasiswa'),
(16, '1741720011', '1741720011', 'mahasiswa'),
(17, '1741720027', '1741720027', 'mahasiswa'),
(18, '1741720031', '1741720031', 'mahasiswa'),
(19, '1741720114', '1741720114', 'mahasiswa'),
(20, '1741720049', '1741720049', 'mahasiswa'),
(21, '1741720061', '1741720061', 'mahasiswa'),
(22, '1741720112', '1741720112', 'mahasiswa'),
(23, '1741720160', '1741720160', 'mahasiswa'),
(24, '1741720111', '1741720111', 'mahasiswa'),
(25, '1741720196', '1741720196', 'mahasiswa'),
(26, '1741720158', '1741720158', 'mahasiswa'),
(27, '1741720081', '1741720081', 'mahasiswa'),
(28, '1741720203', '1741720203', 'mahasiswa'),
(29, '1741720076', '1741720076', 'mahasiswa'),
(30, '1741720036', '1741720036', 'mahasiswa'),
(31, '123456789', '123456789', 'dosen'),
(32, '12345', '12345', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_absensi`
--
ALTER TABLE `tabel_absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_status_mahasiswa` (`id_status_mahasiswa`);

--
-- Indexes for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tabel_attachment`
--
ALTER TABLE `tabel_attachment`
  ADD PRIMARY KEY (`id_attachment`);

--
-- Indexes for table `tabel_chat`
--
ALTER TABLE `tabel_chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `penerima` (`penerima`),
  ADD KEY `pengirim` (`pengirim`),
  ADD KEY `penerima_2` (`penerima`);

--
-- Indexes for table `tabel_dosen`
--
ALTER TABLE `tabel_dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tabel_hasil_kuisioner`
--
ALTER TABLE `tabel_hasil_kuisioner`
  ADD PRIMARY KEY (`id_hasil_kuisoner`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_kuisoner` (`id_kuisoner`);

--
-- Indexes for table `tabel_info`
--
ALTER TABLE `tabel_info`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `id_attachment` (`id_attachment`);

--
-- Indexes for table `tabel_info_beasiswa`
--
ALTER TABLE `tabel_info_beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`),
  ADD KEY `id_attachment` (`id_attachment`);

--
-- Indexes for table `tabel_info_kelas_kosong`
--
ALTER TABLE `tabel_info_kelas_kosong`
  ADD PRIMARY KEY (`id_info_kelas_kosong`),
  ADD KEY `peminjam` (`peminjam`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `tabel_jadwal`
--
ALTER TABLE `tabel_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `dosen` (`id_dosen`),
  ADD KEY `id_semester` (`id_semester`),
  ADD KEY `kode_ruang` (`id_ruang`),
  ADD KEY `id_matkul` (`id_matkul`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indexes for table `tabel_khs`
--
ALTER TABLE `tabel_khs`
  ADD PRIMARY KEY (`id_khs`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `semester` (`id_semester`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indexes for table `tabel_komentar`
--
ALTER TABLE `tabel_komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_info` (`id_info`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tabel_kompen`
--
ALTER TABLE `tabel_kompen`
  ADD PRIMARY KEY (`id_kompen`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_semester` (`id_semester`),
  ADD KEY `id_pekerjaan_kompen` (`id_pekerjaan_kompen`);

--
-- Indexes for table `tabel_krs`
--
ALTER TABLE `tabel_krs`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_matkul` (`id_matkul`);

--
-- Indexes for table `tabel_kuisioner`
--
ALTER TABLE `tabel_kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`);

--
-- Indexes for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_semester` (`id_semester`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tabel_matkul`
--
ALTER TABLE `tabel_matkul`
  ADD PRIMARY KEY (`id_matkul`);

--
-- Indexes for table `tabel_notifikasi`
--
ALTER TABLE `tabel_notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `tabel_pekerjaan_kompen`
--
ALTER TABLE `tabel_pekerjaan_kompen`
  ADD PRIMARY KEY (`id_pekerjaan_kompen`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `tabel_prodi`
--
ALTER TABLE `tabel_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tabel_reply_komentar`
--
ALTER TABLE `tabel_reply_komentar`
  ADD PRIMARY KEY (`id_reply_komentar`),
  ADD KEY `id_komentar` (`id_komentar`);

--
-- Indexes for table `tabel_ruang`
--
ALTER TABLE `tabel_ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tabel_semester`
--
ALTER TABLE `tabel_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indexes for table `tabel_status_mahasiswa`
--
ALTER TABLE `tabel_status_mahasiswa`
  ADD PRIMARY KEY (`id_status_mahasiswa`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_absensi`
--
ALTER TABLE `tabel_absensi`
  MODIFY `id_absensi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `id_admin` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_attachment`
--
ALTER TABLE `tabel_attachment`
  MODIFY `id_attachment` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tabel_chat`
--
ALTER TABLE `tabel_chat`
  MODIFY `id_chat` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_dosen`
--
ALTER TABLE `tabel_dosen`
  MODIFY `id_dosen` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tabel_hasil_kuisioner`
--
ALTER TABLE `tabel_hasil_kuisioner`
  MODIFY `id_hasil_kuisoner` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_info`
--
ALTER TABLE `tabel_info`
  MODIFY `id_info` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_info_beasiswa`
--
ALTER TABLE `tabel_info_beasiswa`
  MODIFY `id_beasiswa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_info_kelas_kosong`
--
ALTER TABLE `tabel_info_kelas_kosong`
  MODIFY `id_info_kelas_kosong` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_jadwal`
--
ALTER TABLE `tabel_jadwal`
  MODIFY `id_jadwal` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  MODIFY `id_kelas` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tabel_khs`
--
ALTER TABLE `tabel_khs`
  MODIFY `id_khs` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_komentar`
--
ALTER TABLE `tabel_komentar`
  MODIFY `id_komentar` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_kompen`
--
ALTER TABLE `tabel_kompen`
  MODIFY `id_kompen` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_krs`
--
ALTER TABLE `tabel_krs`
  MODIFY `id_krs` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_kuisioner`
--
ALTER TABLE `tabel_kuisioner`
  MODIFY `id_kuisioner` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  MODIFY `id_mahasiswa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tabel_matkul`
--
ALTER TABLE `tabel_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_notifikasi`
--
ALTER TABLE `tabel_notifikasi`
  MODIFY `id_notifikasi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_pekerjaan_kompen`
--
ALTER TABLE `tabel_pekerjaan_kompen`
  MODIFY `id_pekerjaan_kompen` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_prodi`
--
ALTER TABLE `tabel_prodi`
  MODIFY `id_prodi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tabel_reply_komentar`
--
ALTER TABLE `tabel_reply_komentar`
  MODIFY `id_reply_komentar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tabel_ruang`
--
ALTER TABLE `tabel_ruang`
  MODIFY `id_ruang` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_semester`
--
ALTER TABLE `tabel_semester`
  MODIFY `id_semester` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tabel_status_mahasiswa`
--
ALTER TABLE `tabel_status_mahasiswa`
  MODIFY `id_status_mahasiswa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_absensi`
--
ALTER TABLE `tabel_absensi`
  ADD CONSTRAINT `tabel_absensi_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_absensi_ibfk_2` FOREIGN KEY (`id_status_mahasiswa`) REFERENCES `tabel_status_mahasiswa` (`id_status_mahasiswa`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD CONSTRAINT `tabel_admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_chat`
--
ALTER TABLE `tabel_chat`
  ADD CONSTRAINT `tabel_chat_ibfk_1` FOREIGN KEY (`pengirim`) REFERENCES `tabel_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_chat_ibfk_2` FOREIGN KEY (`penerima`) REFERENCES `tabel_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_dosen`
--
ALTER TABLE `tabel_dosen`
  ADD CONSTRAINT `tabel_dosen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_hasil_kuisioner`
--
ALTER TABLE `tabel_hasil_kuisioner`
  ADD CONSTRAINT `tabel_hasil_kuisioner_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `tabel_dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_hasil_kuisioner_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_hasil_kuisioner_ibfk_3` FOREIGN KEY (`id_kuisoner`) REFERENCES `tabel_kuisioner` (`id_kuisioner`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_info`
--
ALTER TABLE `tabel_info`
  ADD CONSTRAINT `tabel_info_ibfk_1` FOREIGN KEY (`id_attachment`) REFERENCES `tabel_attachment` (`id_attachment`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tabel_info_beasiswa`
--
ALTER TABLE `tabel_info_beasiswa`
  ADD CONSTRAINT `tabel_info_beasiswa_ibfk_1` FOREIGN KEY (`id_attachment`) REFERENCES `tabel_attachment` (`id_attachment`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tabel_info_kelas_kosong`
--
ALTER TABLE `tabel_info_kelas_kosong`
  ADD CONSTRAINT `tabel_info_kelas_kosong_ibfk_1` FOREIGN KEY (`id_ruang`) REFERENCES `tabel_ruang` (`id_ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_info_kelas_kosong_ibfk_2` FOREIGN KEY (`peminjam`) REFERENCES `tabel_user` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tabel_jadwal`
--
ALTER TABLE `tabel_jadwal`
  ADD CONSTRAINT `tabel_jadwal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_jadwal_ibfk_2` FOREIGN KEY (`id_semester`) REFERENCES `tabel_semester` (`id_semester`),
  ADD CONSTRAINT `tabel_jadwal_ibfk_3` FOREIGN KEY (`id_dosen`) REFERENCES `tabel_dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_jadwal_ibfk_4` FOREIGN KEY (`id_ruang`) REFERENCES `tabel_ruang` (`id_ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_jadwal_ibfk_5` FOREIGN KEY (`id_matkul`) REFERENCES `tabel_matkul` (`id_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_jadwal_ibfk_6` FOREIGN KEY (`id_prodi`) REFERENCES `tabel_prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  ADD CONSTRAINT `tabel_kelas_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tabel_prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_khs`
--
ALTER TABLE `tabel_khs`
  ADD CONSTRAINT `tabel_khs_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_khs_ibfk_2` FOREIGN KEY (`id_semester`) REFERENCES `tabel_semester` (`id_semester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_khs_ibfk_4` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_khs_ibfk_5` FOREIGN KEY (`id_matkul`) REFERENCES `tabel_matkul` (`id_matkul`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tabel_komentar`
--
ALTER TABLE `tabel_komentar`
  ADD CONSTRAINT `tabel_komentar_ibfk_1` FOREIGN KEY (`id_info`) REFERENCES `tabel_info` (`id_info`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_komentar_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_kompen`
--
ALTER TABLE `tabel_kompen`
  ADD CONSTRAINT `tabel_kompen_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_kompen_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `tabel_dosen` (`id_dosen`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_kompen_ibfk_3` FOREIGN KEY (`id_semester`) REFERENCES `tabel_semester` (`id_semester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_kompen_ibfk_4` FOREIGN KEY (`id_pekerjaan_kompen`) REFERENCES `tabel_pekerjaan_kompen` (`id_pekerjaan_kompen`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tabel_krs`
--
ALTER TABLE `tabel_krs`
  ADD CONSTRAINT `tabel_krs_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_krs_ibfk_2` FOREIGN KEY (`id_matkul`) REFERENCES `tabel_matkul` (`id_matkul`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD CONSTRAINT `tabel_mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tabel_prodi` (`id_prodi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_mahasiswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_mahasiswa_ibfk_3` FOREIGN KEY (`id_semester`) REFERENCES `tabel_semester` (`id_semester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_mahasiswa_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tabel_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_notifikasi`
--
ALTER TABLE `tabel_notifikasi`
  ADD CONSTRAINT `tabel_notifikasi_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_pekerjaan_kompen`
--
ALTER TABLE `tabel_pekerjaan_kompen`
  ADD CONSTRAINT `tabel_pekerjaan_kompen_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `tabel_dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_reply_komentar`
--
ALTER TABLE `tabel_reply_komentar`
  ADD CONSTRAINT `tabel_reply_komentar_ibfk_1` FOREIGN KEY (`id_komentar`) REFERENCES `tabel_komentar` (`id_komentar`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
