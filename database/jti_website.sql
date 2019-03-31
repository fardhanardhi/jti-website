-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2019 at 03:09 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
  `sakit` int(30) NOT NULL,
  `ijin` int(30) NOT NULL,
  `alfa` int(30) NOT NULL,
  `jumlah` int(30) NOT NULL,
  `id_status_mahasiswa` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_absensi`
--

INSERT INTO `tabel_absensi` (`id_absensi`, `id_mahasiswa`, `sakit`, `ijin`, `alfa`, `jumlah`, `id_status_mahasiswa`) VALUES
(1, 1, 1, 2, 0, 3, 1),
(2, 2, 4, 1, 3, 8, 1),
(3, 3, 1, 0, 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_admin`
--

CREATE TABLE `tabel_admin` (
  `id_admin` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level_user` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_admin`
--

INSERT INTO `tabel_admin` (`id_admin`, `username`, `password`, `level_user`) VALUES
(1, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_attachment`
--

CREATE TABLE `tabel_attachment` (
  `id_attachment` int(30) NOT NULL,
  `tipe` text NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_attachment`
--

INSERT INTO `tabel_attachment` (`id_attachment`, `tipe`, `file`) VALUES
(1, 'GAMBAR1', 'GAMBAR1'),
(2, 'GAMBAR2', 'GAMBAR2'),
(3, 'GAMBAR3', 'GAMBAR3');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_chat`
--

CREATE TABLE `tabel_chat` (
  `id_chat` int(30) NOT NULL,
  `pengirim` int(30) NOT NULL,
  `penerima` int(30) NOT NULL,
  `waktu_tanggal` datetime NOT NULL,
  `isi_chat` text NOT NULL,
  `level_pengirim` int(30) NOT NULL,
  `level_penerima` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_chat`
--

INSERT INTO `tabel_chat` (`id_chat`, `pengirim`, `penerima`, `waktu_tanggal`, `isi_chat`, `level_pengirim`, `level_penerima`) VALUES
(1, 1, 1, '2019-03-13 05:13:00', 'wkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwk', 0, 0),
(2, 2, 3, '2019-03-14 08:12:00', 'wkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwk', 0, 0),
(3, 2, 3, '2019-03-15 09:17:00', 'wkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwk', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_dosen`
--

CREATE TABLE `tabel_dosen` (
  `id_dosen` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_dosen` varchar(200) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gambar` text NOT NULL,
  `waktu` datetime NOT NULL,
  `level_user` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_dosen`
--

INSERT INTO `tabel_dosen` (`id_dosen`, `username`, `nip`, `password`, `nama_dosen`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `gambar`, `waktu`, `level_user`) VALUES
(1, '198107052005011002', '198107052005011002', 'cobacoba', 'Ahmadi Yuli Ananta, ST', 'Malang', 'Laki-laki', 'Pasuruan', '2019-03-26', '', '0000-00-00 00:00:00', 2),
(2, '198108102005012002', '198108102005012002', 'coba1coba1', 'Ariadi Retno Tri Hayati Ririd, S.Kom., M.Kom', 'Pandaan', 'Perempuan', 'Pasuruan', '2019-03-20', '', '0000-00-00 00:00:00', 2),
(3, '197903132008121002', '197903132008121002', 'coba3coba3', 'Arief Prasetyo, S.Kom', 'Sawojajar', 'Laki-laki', 'Malang', '2019-03-19', '', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_info`
--

CREATE TABLE `tabel_info` (
  `id_info` int(30) NOT NULL,
  `id_attachment` int(30) NOT NULL,
  `tipe_info` varchar(250) NOT NULL,
  `judul_info` varchar(250) NOT NULL,
  `isi_info` text NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_info`
--

INSERT INTO `tabel_info` (`id_info`, `id_attachment`, `tipe_info`, `judul_info`, `isi_info`, `waktu`) VALUES
(1, 1, 'PENGUMUMAN', 'PENGUMUMAN 1', 'PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1PENGUMUMAN 1', '09:00:00'),
(2, 3, 'BERITA', 'BERITA', 'BERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITABERITA', '11:00:00'),
(3, 1, 'PENGUMUMAN 2', 'PENGUMUMAN 2', 'PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2PENGUMUMAN 2', '12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_info_beasiswa`
--

CREATE TABLE `tabel_info_beasiswa` (
  `id_beasiswa` int(30) NOT NULL,
  `id_attachment` int(30) NOT NULL,
  `judul_beasiswa` varchar(250) NOT NULL,
  `isi_beasiswa` text NOT NULL,
  `jenis_beasiswa` varchar(250) NOT NULL,
  `jangka_waktu` date NOT NULL,
  `waktu_publish` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_info_beasiswa`
--

INSERT INTO `tabel_info_beasiswa` (`id_beasiswa`, `id_attachment`, `judul_beasiswa`, `isi_beasiswa`, `jenis_beasiswa`, `jangka_waktu`, `waktu_publish`) VALUES
(1, 1, 'INI BEASISWA 1', 'INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1', 'BEASISWA 1', '2019-03-31', '09:00:00'),
(2, 2, 'INI BEASISWA 2', 'INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1', 'BEASISWA 2', '2019-04-04', '10:00:00'),
(3, 3, 'INI BEASISWA 3', 'INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1INI BEASISWA 1', 'BEASISWA 3', '2019-03-27', '14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_info_kelas_kosong`
--

CREATE TABLE `tabel_info_kelas_kosong` (
  `id_info_kelas_kosong` int(30) NOT NULL,
  `id_ruang` int(30) NOT NULL,
  `peminjam` int(30) NOT NULL,
  `jumlah_jam` int(30) NOT NULL,
  `status_dipinjam` enum('Kosong','Dipinjam') NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `waktu_pinjam` datetime NOT NULL,
  `level_peminjam` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_info_kelas_kosong`
--

INSERT INTO `tabel_info_kelas_kosong` (`id_info_kelas_kosong`, `id_ruang`, `peminjam`, `jumlah_jam`, `status_dipinjam`, `waktu_mulai`, `waktu_selesai`, `waktu_pinjam`, `level_peminjam`) VALUES
(1, 1, 1, 6, 'Dipinjam', '08:00:00', '16:00:00', '0000-00-00 00:00:00', 0),
(2, 2, 2, 3, 'Dipinjam', '08:00:00', '11:00:00', '0000-00-00 00:00:00', 0),
(3, 3, 3, 2, 'Dipinjam', '09:00:00', '11:00:00', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_jadwal`
--

CREATE TABLE `tabel_jadwal` (
  `id_jadwal` int(30) NOT NULL,
  `kode_ruang` int(30) NOT NULL,
  `id_kelas` int(30) NOT NULL,
  `id_semester` int(30) NOT NULL,
  `dosen` int(30) NOT NULL,
  `mata_kuliah` varchar(100) NOT NULL,
  `hari` varchar(30) NOT NULL,
  `jam` varchar(30) NOT NULL,
  `sks` varchar(10) NOT NULL,
  `waktu` datetime NOT NULL,
  `tingkat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_jadwal`
--

INSERT INTO `tabel_jadwal` (`id_jadwal`, `kode_ruang`, `id_kelas`, `id_semester`, `dosen`, `mata_kuliah`, `hari`, `jam`, `sks`, `waktu`, `tingkat`) VALUES
(1, 1, 1, 3, 2, 'Desain dan Pemograman Web', 'Senin', '10.00 - 12.00', '2', '0000-00-00 00:00:00', 'tingkat 1'),
(2, 1, 1, 3, 1, 'Alogaritma dan Struktur Data', 'Selasa', '07.00 - 12.00', '4', '0000-00-00 00:00:00', 'tingkat 1'),
(3, 3, 1, 3, 3, 'Proyek 1', 'Rabu', '07.00 - 10.00', '6', '0000-00-00 00:00:00', 'tingkat 1');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kelas`
--

CREATE TABLE `tabel_kelas` (
  `id_kelas` int(30) NOT NULL,
  `kode_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kelas`
--

INSERT INTO `tabel_kelas` (`id_kelas`, `kode_kelas`) VALUES
(1, 'TI-2F'),
(2, 'MI-2G'),
(3, 'TI-2A');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_khs`
--

CREATE TABLE `tabel_khs` (
  `id_khs` int(30) NOT NULL,
  `id_mahasiswa` int(30) NOT NULL,
  `id_kelas` int(30) NOT NULL,
  `semester` int(30) NOT NULL,
  `sks` int(10) NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_khs`
--

INSERT INTO `tabel_khs` (`id_khs`, `id_mahasiswa`, `id_kelas`, `semester`, `sks`, `nama_matkul`, `waktu`) VALUES
(1, 1, 1, 3, 2, 'Desain dan Pemograman Web', '0000-00-00 00:00:00'),
(2, 1, 1, 3, 4, 'Alogaritma dan Struktur Data', '0000-00-00 00:00:00'),
(3, 1, 1, 3, 6, 'Proyek 1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_komentar`
--

CREATE TABLE `tabel_komentar` (
  `id_komentar` int(30) NOT NULL,
  `komentar` text NOT NULL,
  `reply` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_komentar`
--

INSERT INTO `tabel_komentar` (`id_komentar`, `komentar`, `reply`, `waktu`) VALUES
(1, 'wkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkw', 'wkwkwkkwwk', '0000-00-00 00:00:00'),
(2, 'wkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwk', 'wkwkwkkwwkwkwkwkkwwk', '0000-00-00 00:00:00'),
(3, 'wkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwk', 'wkwkwkkwwkwkwkwkkwwkwkwkwkkwwkwkwkwkkwwk', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kompen`
--

CREATE TABLE `tabel_kompen` (
  `id_kompen` int(30) NOT NULL,
  `id_mahasiswa` int(30) NOT NULL,
  `jumlah_kompen` int(30) NOT NULL,
  `hasil_kompen` int(30) NOT NULL,
  `waktu_verifikasi` time NOT NULL,
  `status_verifikasi` enum('sudah terverifikasi','belum terverifikasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kompen`
--

INSERT INTO `tabel_kompen` (`id_kompen`, `id_mahasiswa`, `jumlah_kompen`, `hasil_kompen`, `waktu_verifikasi`, `status_verifikasi`) VALUES
(1, 1, 8, 8, '04:14:20', 'sudah terverifikasi'),
(2, 2, 2, 2, '10:00:00', 'sudah terverifikasi'),
(3, 3, 3, 3, '09:00:00', 'belum terverifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_krs`
--

CREATE TABLE `tabel_krs` (
  `id_krs` int(30) NOT NULL,
  `id_mahasiswa` int(30) NOT NULL,
  `jam` varchar(30) NOT NULL,
  `nilai` float NOT NULL,
  `nama_matkul` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_krs`
--

INSERT INTO `tabel_krs` (`id_krs`, `id_mahasiswa`, `jam`, `nilai`, `nama_matkul`, `waktu`) VALUES
(1, 1, '10.00 - 12.00', 4, 'Desain dan Pemograman Web', '0000-00-00 00:00:00'),
(2, 1, '07.00 - 12.00', 3.9, 'Alogaritma dan Struktur Data', '0000-00-00 00:00:00'),
(3, 1, '07.00 - 10.00', 3, 'Proyek 1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kuisioner`
--

CREATE TABLE `tabel_kuisioner` (
  `id_kuisoner` int(30) NOT NULL,
  `id_mahasiswa` int(30) NOT NULL,
  `id_dosen` int(30) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `nilai` float NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kuisioner`
--

INSERT INTO `tabel_kuisioner` (`id_kuisoner`, `id_mahasiswa`, `id_dosen`, `kelas`, `nilai`, `waktu`) VALUES
(1, 1, 1, 'TI-2F', 5, '0000-00-00 00:00:00'),
(2, 2, 1, 'TI-2F', 4, '0000-00-00 00:00:00'),
(3, 1, 2, 'TI-2F', 6, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_level_user`
--

CREATE TABLE `tabel_level_user` (
  `id_level_user` int(30) NOT NULL,
  `level_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_level_user`
--

INSERT INTO `tabel_level_user` (`id_level_user`, `level_user`) VALUES
(1, 'admin'),
(2, 'dosen'),
(3, 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mahasiswa`
--

CREATE TABLE `tabel_mahasiswa` (
  `id_mahasiswa` int(30) NOT NULL,
  `id_prodi` int(30) NOT NULL,
  `id_kelas` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gambar` text NOT NULL,
  `waktu` datetime NOT NULL,
  `level_user` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_mahasiswa`
--

INSERT INTO `tabel_mahasiswa` (`id_mahasiswa`, `id_prodi`, `id_kelas`, `username`, `nim`, `password`, `nama_mahasiswa`, `alamat`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `gambar`, `waktu`, `level_user`) VALUES
(1, 1, 1, '1741720054', '1741720054', 'coba4coba4', 'Ermi Pristiyaningrum', 'Tulungagung', 'Perempuan', 'Tulungagung', '2019-03-18', '', '0000-00-00 00:00:00', 3),
(2, 1, 1, '1741720053', '1741720053', 'coba5coba5', 'Dimas Shella Charlinawati', 'Bojonegoro', 'Perempuan', 'Bojonegoro', '2019-03-26', '', '0000-00-00 00:00:00', 3),
(3, 2, 2, '1741720058', '1741720058', 'coba6coba6', 'Greggy Gianini Firmansyah', 'Malang', 'Laki-laki', 'Malang', '2019-03-13', '', '0000-00-00 00:00:00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_notifikasi`
--

CREATE TABLE `tabel_notifikasi` (
  `id_notifikasi` int(30) NOT NULL,
  `isi_notifikasi` text NOT NULL,
  `waktu` time NOT NULL,
  `status` enum('Sudah dibaca','Belum dibaca') NOT NULL,
  `id_mahasiswa` int(30) NOT NULL,
  `id_komentar` int(30) NOT NULL,
  `id_info_kelas_kosong` int(30) NOT NULL,
  `id_info` int(30) NOT NULL,
  `id_beasiswa` int(30) NOT NULL,
  `id_chat` int(30) NOT NULL,
  `id_kuisioner` int(30) NOT NULL,
  `id_krs` int(30) NOT NULL,
  `id_khs` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_notifikasi`
--

INSERT INTO `tabel_notifikasi` (`id_notifikasi`, `isi_notifikasi`, `waktu`, `status`, `id_mahasiswa`, `id_komentar`, `id_info_kelas_kosong`, `id_info`, `id_beasiswa`, `id_chat`, `id_kuisioner`, `id_krs`, `id_khs`) VALUES
(1, 'IsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasiIsinotifikasi', '18:06:03', 'Belum dibaca', 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 'fewgIsinotifikasi2Isinotifikasi2Isinotifikasi2Isinotifikasi2Isinotifikasi2Isinotifikasi2Isinotifikasi2Isinotifikasi2Isinotifikasi2Isinotifikasi2Isinotifikasi2Isinotifikasi2Isinotifikasi2Isinotifikasi2', '11:07:12', 'Sudah dibaca', 2, 2, 2, 2, 2, 2, 2, 2, 2),
(3, 'Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1Isinotifikasi1', '15:05:04', 'Belum dibaca', 3, 3, 3, 3, 3, 3, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pekerjaan_kompen`
--

CREATE TABLE `tabel_pekerjaan_kompen` (
  `id_pekerjaan_kompen` int(30) NOT NULL,
  `id_dosen` int(30) NOT NULL,
  `nama_pekerjaan_kompen` varchar(250) NOT NULL,
  `jumlah_mahasiswa` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pekerjaan_kompen`
--

INSERT INTO `tabel_pekerjaan_kompen` (`id_pekerjaan_kompen`, `id_dosen`, `nama_pekerjaan_kompen`, `jumlah_mahasiswa`) VALUES
(1, 1, 'Membersihkan WC', 20),
(2, 2, 'Fotocopy', 12),
(3, 3, 'Menyapu lantai', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_prodi`
--

CREATE TABLE `tabel_prodi` (
  `id_prodi` int(30) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_prodi`
--

INSERT INTO `tabel_prodi` (`id_prodi`, `nama_prodi`) VALUES
(1, 'D-IV Teknik Informatika'),
(2, 'D-III Manajemen Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_ruangan`
--

CREATE TABLE `tabel_ruangan` (
  `id_ruang` int(30) NOT NULL,
  `kode_ruang` varchar(30) NOT NULL,
  `lantai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_ruangan`
--

INSERT INTO `tabel_ruangan` (`id_ruang`, `kode_ruang`, `lantai`) VALUES
(1, 'LKJ01', 'Lantai 7'),
(2, 'LPR02', 'Lantai 7'),
(3, 'LPR03', 'Lantai 7');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_semester`
--

CREATE TABLE `tabel_semester` (
  `id_semester` int(30) NOT NULL,
  `semester` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_semester`
--

INSERT INTO `tabel_semester` (`id_semester`, `semester`) VALUES
(1, 'Semester 1'),
(2, 'Semester 2'),
(3, 'Semester 3');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_status_mahasiswa`
--

CREATE TABLE `tabel_status_mahasiswa` (
  `id_status_mahasiswa` int(30) NOT NULL,
  `status_mahasiswa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_status_mahasiswa`
--

INSERT INTO `tabel_status_mahasiswa` (`id_status_mahasiswa`, `status_mahasiswa`) VALUES
(1, 'SP1'),
(2, 'SP2'),
(3, 'SP3');

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
  ADD KEY `level_user` (`level_user`);

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
  ADD KEY `pengirim` (`pengirim`);

--
-- Indexes for table `tabel_dosen`
--
ALTER TABLE `tabel_dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `level_user` (`level_user`);

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
  ADD KEY `dosen` (`dosen`),
  ADD KEY `id_semester` (`id_semester`),
  ADD KEY `kode_ruang` (`kode_ruang`);

--
-- Indexes for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tabel_khs`
--
ALTER TABLE `tabel_khs`
  ADD PRIMARY KEY (`id_khs`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `semester` (`semester`);

--
-- Indexes for table `tabel_komentar`
--
ALTER TABLE `tabel_komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `tabel_kompen`
--
ALTER TABLE `tabel_kompen`
  ADD PRIMARY KEY (`id_kompen`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `tabel_krs`
--
ALTER TABLE `tabel_krs`
  ADD PRIMARY KEY (`id_krs`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `tabel_kuisioner`
--
ALTER TABLE `tabel_kuisioner`
  ADD PRIMARY KEY (`id_kuisoner`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`);

--
-- Indexes for table `tabel_level_user`
--
ALTER TABLE `tabel_level_user`
  ADD PRIMARY KEY (`id_level_user`);

--
-- Indexes for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `level_user` (`level_user`);

--
-- Indexes for table `tabel_notifikasi`
--
ALTER TABLE `tabel_notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_beasiswa` (`id_beasiswa`),
  ADD KEY `id_chat` (`id_chat`),
  ADD KEY `id_info` (`id_info`),
  ADD KEY `id_info_kelas_kosong` (`id_info_kelas_kosong`),
  ADD KEY `id_khs` (`id_khs`),
  ADD KEY `id_komentar` (`id_komentar`),
  ADD KEY `id_krs` (`id_krs`),
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
-- Indexes for table `tabel_ruangan`
--
ALTER TABLE `tabel_ruangan`
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
  MODIFY `id_admin` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabel_attachment`
--
ALTER TABLE `tabel_attachment`
  MODIFY `id_attachment` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_chat`
--
ALTER TABLE `tabel_chat`
  MODIFY `id_chat` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_dosen`
--
ALTER TABLE `tabel_dosen`
  MODIFY `id_dosen` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_kelas` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_kuisoner` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  MODIFY `id_mahasiswa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_prodi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabel_ruangan`
--
ALTER TABLE `tabel_ruangan`
  MODIFY `id_ruang` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_semester`
--
ALTER TABLE `tabel_semester`
  MODIFY `id_semester` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tabel_status_mahasiswa`
--
ALTER TABLE `tabel_status_mahasiswa`
  MODIFY `id_status_mahasiswa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_absensi`
--
ALTER TABLE `tabel_absensi`
  ADD CONSTRAINT `tabel_absensi_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `tabel_absensi_ibfk_2` FOREIGN KEY (`id_status_mahasiswa`) REFERENCES `tabel_status_mahasiswa` (`id_status_mahasiswa`);

--
-- Constraints for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  ADD CONSTRAINT `tabel_admin_ibfk_1` FOREIGN KEY (`level_user`) REFERENCES `tabel_level_user` (`id_level_user`);

--
-- Constraints for table `tabel_chat`
--
ALTER TABLE `tabel_chat`
  ADD CONSTRAINT `tabel_chat_ibfk_1` FOREIGN KEY (`penerima`) REFERENCES `tabel_dosen` (`id_dosen`),
  ADD CONSTRAINT `tabel_chat_ibfk_2` FOREIGN KEY (`penerima`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `tabel_chat_ibfk_3` FOREIGN KEY (`pengirim`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `tabel_chat_ibfk_4` FOREIGN KEY (`pengirim`) REFERENCES `tabel_dosen` (`id_dosen`);

--
-- Constraints for table `tabel_dosen`
--
ALTER TABLE `tabel_dosen`
  ADD CONSTRAINT `tabel_dosen_ibfk_1` FOREIGN KEY (`level_user`) REFERENCES `tabel_level_user` (`id_level_user`);

--
-- Constraints for table `tabel_info`
--
ALTER TABLE `tabel_info`
  ADD CONSTRAINT `tabel_info_ibfk_1` FOREIGN KEY (`id_attachment`) REFERENCES `tabel_attachment` (`id_attachment`);

--
-- Constraints for table `tabel_info_beasiswa`
--
ALTER TABLE `tabel_info_beasiswa`
  ADD CONSTRAINT `tabel_info_beasiswa_ibfk_1` FOREIGN KEY (`id_attachment`) REFERENCES `tabel_attachment` (`id_attachment`);

--
-- Constraints for table `tabel_info_kelas_kosong`
--
ALTER TABLE `tabel_info_kelas_kosong`
  ADD CONSTRAINT `tabel_info_kelas_kosong_ibfk_4` FOREIGN KEY (`id_ruang`) REFERENCES `tabel_ruangan` (`id_ruang`),
  ADD CONSTRAINT `tabel_info_kelas_kosong_ibfk_5` FOREIGN KEY (`peminjam`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `tabel_info_kelas_kosong_ibfk_6` FOREIGN KEY (`peminjam`) REFERENCES `tabel_dosen` (`id_dosen`);

--
-- Constraints for table `tabel_jadwal`
--
ALTER TABLE `tabel_jadwal`
  ADD CONSTRAINT `tabel_jadwal_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`),
  ADD CONSTRAINT `tabel_jadwal_ibfk_2` FOREIGN KEY (`id_semester`) REFERENCES `tabel_semester` (`id_semester`),
  ADD CONSTRAINT `tabel_jadwal_ibfk_3` FOREIGN KEY (`dosen`) REFERENCES `tabel_dosen` (`id_dosen`),
  ADD CONSTRAINT `tabel_jadwal_ibfk_4` FOREIGN KEY (`kode_ruang`) REFERENCES `tabel_ruangan` (`id_ruang`);

--
-- Constraints for table `tabel_khs`
--
ALTER TABLE `tabel_khs`
  ADD CONSTRAINT `tabel_khs_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`),
  ADD CONSTRAINT `tabel_khs_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`),
  ADD CONSTRAINT `tabel_khs_ibfk_3` FOREIGN KEY (`semester`) REFERENCES `tabel_semester` (`id_semester`);

--
-- Constraints for table `tabel_kompen`
--
ALTER TABLE `tabel_kompen`
  ADD CONSTRAINT `tabel_kompen_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`);

--
-- Constraints for table `tabel_krs`
--
ALTER TABLE `tabel_krs`
  ADD CONSTRAINT `tabel_krs_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`);

--
-- Constraints for table `tabel_kuisioner`
--
ALTER TABLE `tabel_kuisioner`
  ADD CONSTRAINT `tabel_kuisioner_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `tabel_dosen` (`id_dosen`),
  ADD CONSTRAINT `tabel_kuisioner_ibfk_2` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`);

--
-- Constraints for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD CONSTRAINT `tabel_mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tabel_prodi` (`id_prodi`),
  ADD CONSTRAINT `tabel_mahasiswa_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tabel_kelas` (`id_kelas`),
  ADD CONSTRAINT `tabel_mahasiswa_ibfk_3` FOREIGN KEY (`level_user`) REFERENCES `tabel_level_user` (`id_level_user`);

--
-- Constraints for table `tabel_notifikasi`
--
ALTER TABLE `tabel_notifikasi`
  ADD CONSTRAINT `tabel_notifikasi_ibfk_1` FOREIGN KEY (`id_beasiswa`) REFERENCES `tabel_info_beasiswa` (`id_beasiswa`),
  ADD CONSTRAINT `tabel_notifikasi_ibfk_2` FOREIGN KEY (`id_chat`) REFERENCES `tabel_chat` (`id_chat`),
  ADD CONSTRAINT `tabel_notifikasi_ibfk_3` FOREIGN KEY (`id_info`) REFERENCES `tabel_info` (`id_info`),
  ADD CONSTRAINT `tabel_notifikasi_ibfk_4` FOREIGN KEY (`id_info_kelas_kosong`) REFERENCES `tabel_info_kelas_kosong` (`id_info_kelas_kosong`),
  ADD CONSTRAINT `tabel_notifikasi_ibfk_5` FOREIGN KEY (`id_khs`) REFERENCES `tabel_khs` (`id_khs`),
  ADD CONSTRAINT `tabel_notifikasi_ibfk_6` FOREIGN KEY (`id_komentar`) REFERENCES `tabel_komentar` (`id_komentar`),
  ADD CONSTRAINT `tabel_notifikasi_ibfk_7` FOREIGN KEY (`id_krs`) REFERENCES `tabel_krs` (`id_krs`),
  ADD CONSTRAINT `tabel_notifikasi_ibfk_8` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`);

--
-- Constraints for table `tabel_pekerjaan_kompen`
--
ALTER TABLE `tabel_pekerjaan_kompen`
  ADD CONSTRAINT `tabel_pekerjaan_kompen_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `tabel_dosen` (`id_dosen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
