-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2019 at 10:02 AM
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
  `id_status_mahasiswa` int(30) DEFAULT NULL,
  `id_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_absensi`
--

INSERT INTO `tabel_absensi` (`id_absensi`, `id_mahasiswa`, `sakit`, `ijin`, `alpa`, `jumlah`, `id_status_mahasiswa`, `id_semester`) VALUES
(1, 33, 0, 0, 0, 0, 7, 7),
(2, 54, 0, 6, 0, 6, 7, 7),
(3, 38, 4, 2, 0, 6, 7, 7),
(4, 41, 0, 0, 22, 22, 1, 7),
(5, 48, 0, 0, 0, 0, 7, 7),
(6, 46, 0, 0, 0, 0, 7, 7);

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
(3, 'Vipkas', 12345, NULL, NULL, NULL, 32, '2019-04-01 00:00:00'),
(4, 'Adan', 123, NULL, NULL, NULL, 45, '2019-04-23 00:00:00');

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

--
-- Dumping data for table `tabel_chat`
--

INSERT INTO `tabel_chat` (`id_chat`, `isi`, `pengirim`, `penerima`, `waktu`) VALUES
(1, 'Assalamualaikum Wr.Wb', 2, 32, '2019-04-11 02:00:00'),
(2, 'Waalaikumsalam Wr.Wb', 32, 2, '2019-04-12 05:00:00'),
(3, 'min, kemarin kan kelas saya ada di LBD.01, waktu kelas saya disana stopkontaknya kok belum ada listriknya ya ', 2, 32, '2019-04-12 11:00:00'),
(4, 'Untuk masalah listrik yang ada di ruangan memang belum kami pasangi listrik semua mbak. soalnya OB nya lagi males untuk mengerjakannya', 32, 2, '2019-04-13 14:00:00'),
(5, 'Baik Min terimakasih :)', 2, 32, '2019-04-13 16:00:00'),
(6, 'Sama sama', 32, 2, '2019-04-21 09:42:00'),
(7, 'P', 32, 45, '2019-04-21 00:00:00'),
(8, 'He!', 32, 45, '2019-04-22 00:00:00'),
(9, 'Opo?', 45, 32, '2019-04-23 00:00:00'),
(10, 'Ngapain?', 32, 45, '2019-04-23 09:56:00'),
(11, 'Nganggur', 45, 32, '2019-04-23 09:57:00'),
(12, 'Bagi dulur-dulur di jawatimur yang mau masuk ke Malang atau mau keluar Malang, disarankan untuk tidak berangkat di hari jumat. Dikarenakan hari jumat tanggal 12 April 2019 Malang raya punya agenda besar  1. Final piala presiden 2019 Arema vs Persebaya 2. Final piala presiden di hadiri RI 1 Joko Widodo 3. Kampanye terbuka Capres 02 Prabowo-Sandi 4. Konvoi Besar Aremania se-Malang Raya  Dan di sarankan untuk dulur-dulur yang memiliki kendaraan dengan Plat Nomor L (surabaya) dan W (sidoarjo) untuk tidak nekat masuk wilayah Malang raya di hari tersebut (atas saran dari POLRI) demi keselamatan dulur semua. Terimakasih dan monggo di bantu share untuk kenyamanan masyarakat jawatimur bersama.', 32, 45, '2019-04-23 09:59:00'),
(13, 'Ikut bro', 32, 45, '2019-04-23 09:59:00'),
(14, 'Makasih', 45, 32, '2019-04-23 09:59:00');

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
(4, '198603182012121001', 'Ridwan Rismanto,SST.,M.KOM', 'Perum Bunul Asri B-20 Malang', 'laki-laki', NULL, NULL, NULL, 31, '2019-04-01 00:00:00'),
(5, '196201051990031002', 'Budi Harijanto, ST., MMkom', 'Perum Giri Palma KAV.113 Malang', 'laki-laki', NULL, NULL, NULL, 33, '2019-04-09 00:00:00'),
(6, '198108102005012002', 'Ariadi Retno Tri Hayati Ririd, S.Kom., M.Kom', 'Jl. Semolo Waru Elok Blok F/38 Malang', 'perempuan', NULL, NULL, NULL, 34, '2019-04-09 00:00:00'),
(7, '197704242008121001', 'Gunawan Budi Prasetyo, ST., MMT', 'Bekasi', 'laki-laki', NULL, NULL, NULL, 35, '2019-04-09 00:00:00'),
(8, '198007162010121002', 'Yuri Ariyanto, S.Kom., M.Kom', 'Jl. Ahila 2 9B/39 Sawojajar 2 Malang', 'laki-laki', NULL, NULL, NULL, 36, '2019-04-09 00:00:00'),
(9, '197606252005012001', 'Atiqah Nurul Asri, S.Pd., M.Pd', 'Jl. Ade Irma Suryani IIIA/332 Malang', 'perempuan', NULL, NULL, NULL, 37, '2019-04-09 00:00:00'),
(10, '198406102008121004', 'Imam Fahrur Rozi, ST., MT', 'Suko Timur Malang', 'laki-laki', NULL, NULL, NULL, 38, '2019-04-09 00:00:00'),
(11, '197111101999031002', 'Rudy Ariyanto, ST, M.Cs', '', 'laki-laki', NULL, NULL, NULL, 39, '2019-04-09 00:00:00'),
(12, '198103182010122002', 'Widaningsih, S.Psi, SH., MH', '', 'perempuan', NULL, NULL, NULL, 40, '2019-04-09 00:00:00'),
(13, '198101052005011005', 'Yan Watequlis Syaifudin, ST., MMT', '', 'laki-laki', NULL, NULL, NULL, 41, '2019-04-09 00:00:00'),
(14, '197305102008011010', 'Indra Dharma Wijaya, ST., MMT', 'Jl. Mayjen Panjaitan 7 RT.4 RW.1 Malang Perum Graha Pelita Asrikatan C-19 Asri', 'laki-laki', NULL, NULL, NULL, 42, '2019-04-09 00:00:00'),
(15, '197903132008121002', 'Arief Prasetyo, S.Kom., M.Kom', 'Permata Jingga Blok Sawo No.11 Malang', 'laki-laki', NULL, NULL, NULL, 43, '2019-04-09 00:00:00'),
(16, '198108092010121002', 'Banni Satria Andoko, S.Kom., MMSI.', 'Sulfat Rivera Residence RI No.7 Malang', 'laki-laki', NULL, NULL, NULL, 44, '2019-04-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_hasil_kuisioner`
--

CREATE TABLE `tabel_hasil_kuisioner` (
  `id_hasil_kuisioner` int(30) NOT NULL,
  `id_mahasiswa` int(30) NOT NULL,
  `id_dosen` int(30) NOT NULL,
  `id_kuisioner` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `waktu_edit` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_hasil_kuisioner`
--

INSERT INTO `tabel_hasil_kuisioner` (`id_hasil_kuisioner`, `id_mahasiswa`, `id_dosen`, `id_kuisioner`, `nilai`, `waktu_edit`) VALUES
(2, 33, 8, 2, 4, '2019-04-09 00:00:00'),
(3, 33, 8, 3, 4, '2019-04-09 00:00:00'),
(4, 33, 8, 4, 2, '2019-04-09 00:00:00'),
(5, 33, 8, 5, 3, '2019-04-09 00:00:00'),
(6, 33, 8, 6, 3, '2019-04-09 00:00:00'),
(7, 34, 7, 5, 3, '2019-04-16 00:00:00');

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

--
-- Dumping data for table `tabel_info`
--

INSERT INTO `tabel_info` (`id_info`, `judul`, `isi`, `tipe`, `waktu`, `id_attachment`) VALUES
(1, '5 Dosen dikirim ke Jepang', 'Dikarenakan dosen bernama : \r\n- Pak Yan \r\n- Pak Rosa \r\n- Pak Vipkas \r\nsedang di tugaskan ke jepang maka kelas yang diajar oleh dosen-dosen tersebut diharap segera menghubungi untuk meminta tugas. \r\n\r\nTerima Kasih...', 'pengumuman', '2019-04-11 03:00:00', 1),
(2, 'Workshop Pembuatan Dokumen Kurikulum', 'Pada hari Selasa, 29 Januari 2019 Jurusan Teknologi Informasi (JTI) menggelar kegiatan Workshop Pembuatan Dokumen Kurikulum yang diikuti oleh seluruh dosen JTI. Acara ini diadakan di Ruang Meeting Dosen Sipil Lantai 4, Politeknik Negeri Malang.\r\n\r\nWorkshop ini menghadirkan pembicara dari Universitas Negeri Malang, Dr. Ir. Sya’ad Patmanthara, M.Pd. Tujuan dari diadakannya workshop ini adalah para dosen dapat membuat Rencana Perkuliahan Semester (RPS),  kontrak perkuliahan dan rubik penilaian untuk semester genap tahun ajaran 2018-2019 dengan lebih baik. Acara yang berlangsung dari pukul 08.00 – 16.00 WIB berlangsung tertib dan lancar.', 'berita', '2019-04-11 07:00:00', NULL),
(3, 'Pengumuman Laporan Akhir dan Skripsi 2018/2019', '1. Pendaftaran untuk usulan dosen pembimbing sudah dibuka\r\n2. Pendaftaran usulan dosen pembimbing berakhir pada tanggal 26 November 2018 pukul 11.00\r\n3. Pengumuman dosen pembimbing dilaksanakan antara tanggal 27-29 November 2018\r\n4. Pendaftaran sidang proposal dan upload proposal dilaksanakan tanggal 29 November-3 Desember 2018\r\n5. Ujian proposal dilaksanakan mulai tanggal 4 Desember 2018', 'pengumuman', '2019-04-11 07:00:00', NULL),
(4, 'PSS (Pelaksanaan Sertifikasi Sektor) thn. 2018 untuk Mahasiswa Jurusan TI', 'PSS merupakan program hibah dari BNSP untuk melakukan sertifikasi kompetensi terhadap mahasiswa. Dan pada tahun 2018 ini, Polinema melalui LSP P1 Polinema, mendapatkan program tersebut dan sebagai tindak lanjutnya wajib melakukan sertifikasi terhadap mahasiswa Polinema. Berkenaan dengan hal tersebut, jurusan TI mendapatkan kuota mahasiswa sejumlah 340 orang untuk diikutkan program PSS tersebut.', 'berita', '2019-04-11 06:00:00', NULL),
(5, 'Update Pembimbing Proposal LA', 'Setelah melalui berbagai pertimbangan dan koreksi oleh panitia, maka update terbaru Pembimbing Proposal LA sebagai berikut:', 'pengumuman', '2019-04-11 03:00:00', NULL);

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

--
-- Dumping data for table `tabel_info_beasiswa`
--

INSERT INTO `tabel_info_beasiswa` (`id_beasiswa`, `judul`, `isi`, `id_attachment`, `waktu_publish`, `waktu_berakhir`) VALUES
(1, 'Pendaftaran Beasiswa 2019', 'Kepada Seluruh mahasiswa Politenik Negeri Malang untuk Jenjang D# maupun D4, diberitahukan dibuka pendaftaran beasiswa : \r\n1. Beasiswa PPA \r\n2. Beasiswa BBP ( BBM) \r\n3. Beasiswa Supersemar Pendaftaran mulai \r\n\r\ntanggal : 17 Maret s.d 4 April 2019 pendaftaran lewat ONLINE ( download di : http:// beasiswa.polinema.ac.id) untuk keterangan lebih lanjut dapat dilihat spanduk yang ada sekitar politeknik atau di poster pada tiap-tiap jurusan . Terima kasih atas perhatiannya', NULL, '2019-03-17 02:00:00', '2019-04-04');

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

--
-- Dumping data for table `tabel_info_kelas_kosong`
--

INSERT INTO `tabel_info_kelas_kosong` (`id_info_kelas_kosong`, `id_ruang`, `peminjam`, `hari`, `jumlah_jam`, `status_dipinjam`, `waktu_mulai`, `waktu_selesai`, `waktu_pinjam`) VALUES
(1, 6, 3, 'senin', 4, 'dipinjam', '08:00:00', '12:00:00', '2019-04-10 07:00:00'),
(2, 3, 27, 'jumat', 2, 'dipinjam', '10:00:00', '13:00:00', '2019-04-10 09:00:00'),
(3, 1, 33, 'kamis', 4, 'dipinjam', '09:00:00', '13:00:00', '2019-04-10 07:00:00'),
(4, 2, 21, 'selasa', 2, 'dipinjam', '08:00:00', '11:00:00', '2019-04-10 07:00:00');

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

--
-- Dumping data for table `tabel_jadwal`
--

INSERT INTO `tabel_jadwal` (`id_jadwal`, `id_ruang`, `id_kelas`, `id_prodi`, `id_semester`, `id_dosen`, `id_matkul`, `hari`, `jam_mulai`, `jam_selesai`, `tingkat`, `waktu_edit`) VALUES
(5, 1, 4, 3, 7, 8, 1, 'Senin', '07:00:00', '10:30:00', 2, '2019-04-09 00:00:00'),
(6, 2, 4, 3, 7, 6, 2, 'Senin', '12:50:00', '18:00:00', 2, '2019-04-09 00:00:00'),
(7, 4, 4, 3, 7, 5, 3, 'Rabu', '07:00:00', '11:20:00', 2, '2019-04-09 00:00:00'),
(8, 2, 4, 3, 7, 5, 4, 'Kamis', '12:50:00', '15:20:00', 2, '2019-04-09 00:00:00'),
(9, 5, 4, 3, 7, 7, 6, 'Jumat', '07:50:00', '11:20:00', 2, '2019-04-09 00:00:00');

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
(4, 'F', 3, 2),
(5, 'A', 3, 2),
(6, 'A', 4, 2),
(7, 'B', 3, 2),
(8, 'B', 4, 2),
(9, 'C', 3, 2),
(10, 'C', 4, 2);

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

--
-- Dumping data for table `tabel_khs`
--

INSERT INTO `tabel_khs` (`id_khs`, `id_mahasiswa`, `id_kelas`, `id_semester`, `id_matkul`, `nilai`, `waktu_edit`) VALUES
(1, 33, 4, 7, 1, 3.5, '2019-04-09 00:00:00'),
(2, 33, 4, 7, 2, 4, '2019-04-09 00:00:00'),
(3, 33, 4, 7, 4, 3.2, '2019-04-09 00:00:00'),
(4, 33, 4, 7, 6, 3, '2019-04-09 00:00:00'),
(5, 34, 4, 7, 1, 3, '2019-04-11 00:00:00');

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

--
-- Dumping data for table `tabel_komentar`
--

INSERT INTO `tabel_komentar` (`id_komentar`, `id_info`, `id_user`, `isi`, `waktu`) VALUES
(1, 1, 3, 'Terimakasih infonyaa', '2019-04-11 00:00:00'),
(2, 1, 15, 'Yeyy asikkk', '2019-04-11 00:00:00'),
(3, 3, 28, 'Semangat kakak kakak skripsinya', '2019-04-11 00:00:00'),
(4, 1, 20, 'Siap min ', '2019-04-11 09:00:00'),
(5, 3, 9, 'Skripsi Skripsi', '2019-04-11 03:00:00');

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
  `status_verifikasi` enum('sudah terverifikasi','belum terverifikasi') NOT NULL DEFAULT 'belum terverifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kompen`
--

INSERT INTO `tabel_kompen` (`id_kompen`, `id_mahasiswa`, `id_dosen`, `id_semester`, `jumlah_jam`, `waktu`, `id_pekerjaan_kompen`, `waktu_verifikasi`, `status_verifikasi`) VALUES
(5, 41, 8, 7, 10, '2019-04-11 00:00:00', 5, '2019-04-14 00:00:00', 'sudah terverifikasi');

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

--
-- Dumping data for table `tabel_krs`
--

INSERT INTO `tabel_krs` (`id_krs`, `id_mahasiswa`, `id_matkul`, `waktu_edit`) VALUES
(1, 33, 1, '2019-04-09 00:00:00'),
(2, 33, 2, '2019-04-09 00:00:00'),
(3, 33, 4, '2019-04-09 00:00:00'),
(4, 33, 6, '2019-04-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kuisioner`
--

CREATE TABLE `tabel_kuisioner` (
  `id_kuisioner` int(11) NOT NULL,
  `kriteria` text NOT NULL,
  `status_aktif` enum('ya','tidak') NOT NULL DEFAULT 'ya'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tabel_kuisioner`
--

INSERT INTO `tabel_kuisioner` (`id_kuisioner`, `kriteria`, `status_aktif`) VALUES
(1, 'Dosen menjelaskan rencana perkuliahan', 'ya'),
(2, 'Dosen menyerahkan kontrak perkuliahan di awal semester', 'ya'),
(3, 'Dosen menjelaskan tujuan dan manfaat kuliah / praktikum	\r\n', 'ya'),
(4, 'Dosen memberikan buku ajar / jobsheet / modul praktikum	\r\n', 'ya'),
(5, 'Buku ajar / jobsheet /modul praktikum yang diberikan sangat membantu dalam memahami perkuliahan', 'ya'),
(6, 'Dosen mengajarkan kuliah / praktikum yang bersangkutan sesuai rencana pengajaran	\r\n', 'ya'),
(7, 'Dosen selalu menggunakan media pembelajaran seperti LCD / alat peraga / software / lainnya	\r\n', 'ya'),
(8, 'Dosen menggunakan buku rujukan atau penunjang (textbook) untuk mata kuliah / praktikum\r\n', 'ya'),
(9, 'Dosen memberikan materi mata kuliah sesuai dengan kurikulum dan silabus yang berlaku', 'ya'),
(10, 'Dosen dapat membangkitkan minat mahasiswa pada pokok materi mata kuliah / praktikum	\r\n', 'ya'),
(11, 'Pada saat mengajar dosen memberi kuliah dengan jelas dan mudah dimengerti	\r\n', 'ya'),
(12, 'Dosen memberi kesempatan bagi mahasiswa untuk bertanya	\r\n', 'ya'),
(13, 'Dosen memberikan tanggapan yang memuaskan terhadap pertanyaan yang diajukan mahasiswa	\r\n', 'ya'),
(14, 'Dosen yang bersangkutan memberi kesempatan untuk berkonsultasi di luar jam mengajar', 'ya'),
(15, 'Dosen menjelaskan sistem evaluasi untuk mata kuliah / praktikum pada awal perkuliahan	\r\n', 'ya'),
(16, 'Dosen memberi penilaian secara obyektif terhadap evaluasi yang dilakukan	\r\n', 'ya'),
(17, 'Dosen menjelaskan hasil ujian yang telah dilakukan mahasiswa	\r\n', 'ya'),
(18, 'Dosen memberi kesempatan untuk memperbaiki nilai ujian	\r\n', 'ya'),
(19, 'Dosen selalu hadir dan menyampaikan materi dalam setiap perkuliahan	\r\n', 'ya'),
(20, 'Dosen selalu memulai dan mengakhiri perkuliahan secara tepat waktu', 'ya'),
(21, 'Perkuliahan sesuai dengan kontrak kuliah yang sudah disepakai sebelumnya', 'ya');

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
(33, 3, 4, 7, '1741720144', 'Abdallah Darussalam Candra', 'Perum Graha Kota Asri Blok D-1 No. 9 Jl. Muharto V', 'laki-laki', 'Sumenep', '1999-10-30', 'NULL', '2019-04-04 00:00:00', 2),
(34, 3, 4, 7, '1741720008', 'Adn Maulidya Handah Putri', 'Jl. Klampok No. 97-A', 'perempuan', 'Malang', '1999-06-25', 'NULL', '2019-04-04 00:00:00', 3),
(35, 3, 4, 7, '1741720040', 'Aldihamda Sulthon Fuad Prajakusuma', 'Jl. Jatirejo', 'laki-laki', 'Trenggalek', '1998-06-26', 'NULL', '2019-04-04 00:00:00', 4),
(36, 3, 4, 7, '1741720043', 'Amin Anis Kuddah', 'Jl. Segara 186', 'laki-laki', 'Pamekasan', '1999-09-27', 'NULL', '2019-04-04 00:00:00', 5),
(37, 3, 4, 7, '1741720086', 'Chintya Puspa Dewi', 'Dsn. Dadapan', 'perempuan', 'Malang', '1999-05-27', 'NULL', '2019-04-04 00:00:00', 6),
(38, 3, 4, 7, '1741720053', 'Dimas Shella Charlinawati', 'Dsn. Dander', 'perempuan', 'Jember', '1999-07-04', 'NULL', '2019-04-04 00:00:00', 7),
(39, 3, 4, 7, '1741720054', 'Ermi Pristiyaningrum', 'Dsn. Banca\'an', 'perempuan', 'Tulungagung', '1998-12-06', 'NULL', '2019-04-04 00:00:00', 8),
(40, 3, 4, 7, '1741720045', 'Fardhan Ardhi Ramadhan', 'Jl. Titas Asri X Blok H No. 12', 'laki-laki', 'Malang', '1999-01-16', 'NULL', '2019-04-04 00:00:00', 9),
(41, 3, 4, 7, '1741720026', 'Galang Yudha Pratama', 'Perum Joyo Grand Blok A No. 8', 'laki-laki', 'Malang', '1998-10-27', 'NULL', '2019-04-04 00:00:00', 10),
(42, 3, 4, 7, '1741720088', 'Greggy Gianini Firmansyah', 'Jl. Gading No. 38', 'laki-laki', 'Malang', '1999-03-22', 'NULL', '2019-04-04 00:00:00', 11),
(43, 3, 4, 7, '1741720192', 'Hafizh Dias Ramadhan', 'Perum Bumi Mondoroko Raya AC-9', 'laki-laki', 'Malang', '1999-01-13', 'NULL', '2019-04-04 00:00:00', 12),
(44, 3, 4, 7, '1741720058', 'Haryo Bagus Setyawan', 'Jl. Ksatrian Dalam No. 15-A', 'laki-laki', 'Medan', '1999-08-31', 'NULL', '2019-04-04 00:00:00', 13),
(45, 3, 4, 7, '1741720032', 'Hesti Anisa Reski', 'Jl. Gang TengaH No. 41', 'perempuan', 'Malang', '1998-12-19', 'NULL', '2019-04-04 00:00:00', 14),
(46, 3, 4, 7, '1741720018', 'Ika Puspa Fairuz Wiwanata', 'Jl. Kesatrian No. 6', 'perempuan', 'Surakarta', '1999-08-21', 'NULL', '2019-04-04 00:00:00', 15),
(47, 3, 4, 7, '1741720011', 'Ilham Nuswantoro Aji', 'Jl. Kh. Achmad Dahlan 11 No.65', 'laki-laki', 'Pasuruan', '2000-04-10', 'NULL', '2019-04-04 00:00:00', 16),
(48, 3, 4, 7, '1741720027', 'Leni Saputri', 'Suwayuwo Kulon Embong RT.01 RW.03', 'perempuan', 'Pasuruan', '1999-07-09', 'NULL', '2019-04-04 00:00:00', 17),
(49, 3, 4, 7, '1741720031', 'Muhammad Aliyul Murtadlo', 'Dsn. Kedawong', 'laki-laki', 'Jombang', '1999-06-04', 'NULL', '2019-04-04 00:00:00', 18),
(50, 3, 4, 7, '1741720114', 'Okta Chandika Salsabila', 'Jl. Ahmad Yani No.191', 'perempuan', 'Malang', '1999-10-20', 'NULL', '2019-04-04 00:00:00', 19),
(51, 3, 4, 7, '1741720049', 'Panji Awwaludi Dzikriawan', 'Dsn. Bebe\'an Lor', 'laki-laki', 'Pasuruan', '1999-04-30', 'NULL', '2019-04-04 00:00:00', 20),
(52, 3, 4, 7, '1741720061', 'Rahardhiyan Wahyu Putra', 'Dsn. Sambiroto', 'laki-laki', 'Sidoarjo', '1999-06-06', 'NULL', '2019-04-04 00:00:00', 21),
(53, 3, 4, 7, '1741720112', 'Reffan Pandu Amirulloh', 'Sukarsid', 'laki-laki', 'Malang', '1998-11-13', 'NULL', '2019-04-04 00:00:00', 22),
(54, 3, 4, 7, '1741720160', 'Reza Ariestya Putra', 'Jl. Katu No. 6', 'laki-laki', 'Jakarta', '1998-04-19', 'NULL', '2019-04-04 00:00:00', 23),
(55, 3, 4, 7, '1741720111', 'Septa Kusumaningtyas', 'Jl. Sumber Bangun D-76', 'perempuan', 'Malang', '1998-09-07', 'NULL', '2019-04-04 00:00:00', 24),
(56, 3, 4, 7, '1741720196', 'Septian Caesar Floresko', 'Perum Sekarsari Indah B-28', 'laki-laki', 'Manggarai', '1998-09-09', 'NULL', '2019-04-04 00:00:00', 25),
(57, 3, 4, 7, '1741720158', 'Sulthan Rafif', 'Jl. Gondosuli No.2', 'laki-laki', 'Malang', '1999-09-05', 'NULL', '2019-04-04 00:00:00', 26),
(58, 3, 4, 7, '1741720081', 'Syahdanny Alhamda', 'Jl. Raya Slamet Wiroto', 'laki-laki', 'Malang', '1998-10-11', 'NULL', '2019-04-04 00:00:00', 27),
(59, 3, 4, 7, '1741720203', 'Vian Satria Maulana Navalino', 'Perum Arjuna Gumilang A-3', 'laki-laki', 'Jakarta', '1999-06-29', 'NULL', '2019-04-04 00:00:00', 28),
(60, 3, 4, 7, '1741720076', 'Vicko Handika Nanda Firdiansyah', 'Jl. Panjaitan No. 1', 'laki-laki', 'Malang', '1998-07-14', 'NULL', '2019-04-04 00:00:00', 29),
(61, 3, 4, 7, '1741720036', 'Wiji Prabowo', 'Dsn. Tlogosari', 'laki-laki', 'Pasuruan ', '1999-10-04', 'NULL', '2019-04-04 00:00:00', 30);

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

--
-- Dumping data for table `tabel_matkul`
--

INSERT INTO `tabel_matkul` (`id_matkul`, `nama`, `sks`, `jam`) VALUES
(1, 'Manajemen Proyek', 4, 4),
(2, 'Analisis Dan Desain Berorientasi Objek', 6, 6),
(3, 'Sistem Manajemen Basisdata', 0, 6),
(4, 'Proyek 1', 0, 5),
(5, 'Komputasi Kognitif', 0, 4),
(6, 'Sistem Informasi', 0, 4),
(7, 'Pemrograman Web Lanjut', 0, 6);

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

--
-- Dumping data for table `tabel_notifikasi`
--

INSERT INTO `tabel_notifikasi` (`id_notifikasi`, `isi`, `waktu`, `status_dibaca`, `id_mahasiswa`) VALUES
(1, 'Anda telah mengganti foto profil', '13:00:00', 'sudah', 33),
(2, 'Anda telah mengganti passord', '18:00:00', 'sudah', 33),
(3, 'Anda telah mempunyai pesan dari admin', '10:00:00', 'belum', 33),
(4, 'Anda telah mempunyai pesan dari admin', '16:00:00', 'belum', 34),
(5, 'Anda telah mengganti foto profil', '13:00:00', 'sudah', 34);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pekerjaan_kompen`
--

CREATE TABLE `tabel_pekerjaan_kompen` (
  `id_pekerjaan_kompen` int(30) NOT NULL,
  `id_dosen` int(30) NOT NULL,
  `nama` text NOT NULL,
  `kuota` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pekerjaan_kompen`
--

INSERT INTO `tabel_pekerjaan_kompen` (`id_pekerjaan_kompen`, `id_dosen`, `nama`, `kuota`, `id_semester`) VALUES
(1, 8, 'Menata mouse dan keyboard di lab', 5, 7),
(2, 8, 'Membeli kertas A4 1 pack', 5, 7),
(3, 8, 'Membeli DDR 2 buah', 5, 7),
(4, 8, 'Menata absensi jurusan', 5, 7),
(5, 8, 'Menstampel kertas Portofolio untuk ujian', 5, 7);

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

--
-- Dumping data for table `tabel_reply_komentar`
--

INSERT INTO `tabel_reply_komentar` (`id_reply_komentar`, `isi`, `id_komentar`, `waktu`) VALUES
(1, 'Jangan lupa untuk minta tugasnya', 2, '2019-04-12 00:00:00'),
(2, 'Semangat juga ', 3, '2019-04-13 02:00:00'),
(3, 'Jangan lupa untuk minta tugasnya', 4, '2019-04-13 03:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_ruang`
--

CREATE TABLE `tabel_ruang` (
  `id_ruang` int(30) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `lantai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_ruang`
--

INSERT INTO `tabel_ruang` (`id_ruang`, `kode`, `lantai`) VALUES
(1, 'KB02', 7),
(2, 'KR01', 5),
(3, 'LBD01', 6),
(4, 'LPJ03', 7),
(5, 'LSI1', 6),
(6, 'LID01', 7);

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
(3, 'SP3'),
(4, 'Cuti Akademik'),
(5, 'Dropout '),
(6, 'Kompen'),
(7, 'Normal');

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
(31, '198603182012121001', '198603182012121001', 'dosen'),
(32, '12345', '12345', 'admin'),
(33, '196201051990031002', '196201051990031002', 'dosen'),
(34, '198108102005012002', '198108102005012002', 'dosen'),
(35, '197704242008121001', '197704242008121001', 'dosen'),
(36, '198007162010121002', '198007162010121002', 'dosen'),
(37, '197606252005012001', '197606252005012001', 'dosen'),
(38, '198406102008121004', '198406102008121004', 'dosen'),
(39, '197111101999031002', '197111101999031002', 'dosen'),
(40, '198103182010122002', '198103182010122002', 'dosen'),
(41, '198101052005011005', '198101052005011005', 'dosen'),
(42, '197305102008011010', '197305102008011010', 'dosen'),
(43, '197903132008121002', '197903132008121002', 'dosen'),
(44, '198108092010121002', '198108092010121002', 'dosen'),
(45, '123', '123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_absensi`
--
ALTER TABLE `tabel_absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_status_mahasiswa` (`id_status_mahasiswa`),
  ADD KEY `id_semester` (`id_semester`);

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
  ADD PRIMARY KEY (`id_hasil_kuisioner`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_mahasiswa` (`id_mahasiswa`),
  ADD KEY `id_kuisoner` (`id_kuisioner`);

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
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `id_semester` (`id_semester`);

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
  MODIFY `id_absensi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tabel_admin`
--
ALTER TABLE `tabel_admin`
  MODIFY `id_admin` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tabel_attachment`
--
ALTER TABLE `tabel_attachment`
  MODIFY `id_attachment` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tabel_chat`
--
ALTER TABLE `tabel_chat`
  MODIFY `id_chat` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tabel_dosen`
--
ALTER TABLE `tabel_dosen`
  MODIFY `id_dosen` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tabel_hasil_kuisioner`
--
ALTER TABLE `tabel_hasil_kuisioner`
  MODIFY `id_hasil_kuisioner` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tabel_info`
--
ALTER TABLE `tabel_info`
  MODIFY `id_info` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tabel_info_beasiswa`
--
ALTER TABLE `tabel_info_beasiswa`
  MODIFY `id_beasiswa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tabel_info_kelas_kosong`
--
ALTER TABLE `tabel_info_kelas_kosong`
  MODIFY `id_info_kelas_kosong` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tabel_jadwal`
--
ALTER TABLE `tabel_jadwal`
  MODIFY `id_jadwal` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tabel_kelas`
--
ALTER TABLE `tabel_kelas`
  MODIFY `id_kelas` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tabel_khs`
--
ALTER TABLE `tabel_khs`
  MODIFY `id_khs` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tabel_komentar`
--
ALTER TABLE `tabel_komentar`
  MODIFY `id_komentar` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tabel_kompen`
--
ALTER TABLE `tabel_kompen`
  MODIFY `id_kompen` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tabel_krs`
--
ALTER TABLE `tabel_krs`
  MODIFY `id_krs` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tabel_kuisioner`
--
ALTER TABLE `tabel_kuisioner`
  MODIFY `id_kuisioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  MODIFY `id_mahasiswa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tabel_matkul`
--
ALTER TABLE `tabel_matkul`
  MODIFY `id_matkul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tabel_notifikasi`
--
ALTER TABLE `tabel_notifikasi`
  MODIFY `id_notifikasi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tabel_pekerjaan_kompen`
--
ALTER TABLE `tabel_pekerjaan_kompen`
  MODIFY `id_pekerjaan_kompen` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tabel_prodi`
--
ALTER TABLE `tabel_prodi`
  MODIFY `id_prodi` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tabel_reply_komentar`
--
ALTER TABLE `tabel_reply_komentar`
  MODIFY `id_reply_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tabel_ruang`
--
ALTER TABLE `tabel_ruang`
  MODIFY `id_ruang` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tabel_semester`
--
ALTER TABLE `tabel_semester`
  MODIFY `id_semester` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tabel_status_mahasiswa`
--
ALTER TABLE `tabel_status_mahasiswa`
  MODIFY `id_status_mahasiswa` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tabel_absensi`
--
ALTER TABLE `tabel_absensi`
  ADD CONSTRAINT `tabel_absensi_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `tabel_mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_absensi_ibfk_2` FOREIGN KEY (`id_status_mahasiswa`) REFERENCES `tabel_status_mahasiswa` (`id_status_mahasiswa`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_absensi_ibfk_3` FOREIGN KEY (`id_semester`) REFERENCES `tabel_semester` (`id_semester`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tabel_hasil_kuisioner_ibfk_3` FOREIGN KEY (`id_kuisioner`) REFERENCES `tabel_kuisioner` (`id_kuisioner`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tabel_pekerjaan_kompen_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `tabel_dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tabel_pekerjaan_kompen_ibfk_2` FOREIGN KEY (`id_semester`) REFERENCES `tabel_semester` (`id_semester`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_reply_komentar`
--
ALTER TABLE `tabel_reply_komentar`
  ADD CONSTRAINT `tabel_reply_komentar_ibfk_1` FOREIGN KEY (`id_komentar`) REFERENCES `tabel_komentar` (`id_komentar`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
