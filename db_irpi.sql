-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 03:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_irpi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang_ilmu`
--

CREATE TABLE `bidang_ilmu` (
  `id_bidang_ilmu` int(11) NOT NULL,
  `nama_bidang_ilmu` varchar(255) NOT NULL,
  `rumpun_bidang_ilmu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang_ilmu`
--

INSERT INTO `bidang_ilmu` (`id_bidang_ilmu`, `nama_bidang_ilmu`, `rumpun_bidang_ilmu`) VALUES
(1, 'Data Mining', 'data mining merupakan ilmu machine learning'),
(3, 'rekayasa perangkat lunak', 'RPL sebuah  ilmu untuk membuat program atau sistem'),
(4, 'manajemen', 'manajemn merpakan ilmu berjiwa sosial atau berorganisasi'),
(5, 'public relation', 'manajemn merpakan ilmu berjiwa sosial atau berorganisasi');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `id_lembaga` int(11) NOT NULL,
  `nama_divisi` varchar(255) NOT NULL,
  `deskripsi_divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `id_lembaga`, `nama_divisi`, `deskripsi_divisi`) VALUES
(1, 3, 'divisi design', 'membuat desain '),
(3, 4, 'dvisi data center', 'merangkul data'),
(4, 1, 'divisi kerohanian', 'membyat acara krohanian');

-- --------------------------------------------------------

--
-- Table structure for table `donwload`
--

CREATE TABLE `donwload` (
  `id_donwload` int(11) NOT NULL,
  `nama_file_donwload` varchar(255) NOT NULL,
  `deskripsi_donwload` varchar(255) NOT NULL,
  `file_donwload` varchar(255) NOT NULL,
  `link_donwload` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `id_narasumber` int(11) NOT NULL,
  `narasumber_pendamping` varchar(255) NOT NULL,
  `tema_event` varchar(255) NOT NULL,
  `subtema_event` varchar(255) NOT NULL,
  `id_kategori_agenda` int(11) NOT NULL,
  `id_bidang_ilmu` int(11) NOT NULL,
  `id_lembaga` int(11) NOT NULL,
  `deskripsi_event` varchar(255) NOT NULL,
  `tanggal_deadline_event` date NOT NULL,
  `tanggal_pelaksanaan_event` date NOT NULL,
  `link_event` varchar(255) NOT NULL,
  `brosur_event` varchar(255) NOT NULL,
  `nomor_informasi_event` varchar(255) NOT NULL,
  `status_event` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `id_narasumber`, `narasumber_pendamping`, `tema_event`, `subtema_event`, `id_kategori_agenda`, `id_bidang_ilmu`, `id_lembaga`, `deskripsi_event`, `tanggal_deadline_event`, `tanggal_pelaksanaan_event`, `link_event`, `brosur_event`, `nomor_informasi_event`, `status_event`) VALUES
(3, 'RESEARCH, APPLIED ARTIFICIAL INTELIGENCE &  DATA MINING', 13, 'Dr. Yeni herdiyeni, S.Si., M.Komp', 'data mining', 'data mining ', 1, 1, 3, 'data mining', '2020-12-11', '2020-12-15', 'www.predatech.co.id', 'bc421fd732bd6e1e0b80b17081e0238f.jpg', '001', 0),
(4, 'BIG DATA & BIOINFORMATICS RESEARCH', 13, 'Efendi Zaenudin, M.T., Ph.D(C)', 'Big Data', 'Big Data', 1, 1, 3, 'Big Data', '2020-12-03', '2021-01-07', 'www.predatech.co.id', 'c48c708b33112f702f75d76041ba29ac.jpg', '022', 0),
(5, 'USER EXPERIENCE (UX) DESIGN RESEARCH', 13, 'Reski Mai Candra, ST., M.Sc.', 'UX', 'UX', 1, 3, 3, 'UX', '2021-01-02', '2021-01-06', 'www.predatech.co.id', '3ec605fdf1b17947d2852ec35c06eab2.jpg', '003', 1),
(6, 'FUNDAMENTAL & RESEARCH BIG DATA ANNALYTIC', 13, 'Dr. Yeni herdiyeni, S.Si., M.Komp', 'data mining', 'data mining 4.0', 1, 1, 1, 'data mining', '2020-12-15', '2020-12-26', 'www.predatech.co.id', 'bdcc94ae5ba4549dce12ddc44356266f.jpg', '004', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `nama_kabupaten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`id_kabupaten`, `id_provinsi`, `nama_kabupaten`) VALUES
(3, 10, 'Aceh Besar'),
(4, 11, 'Asahan'),
(7, 12, 'kampar'),
(8, 13, 'Karimun'),
(9, 14, 'Pariaman'),
(10, 15, 'Lebong'),
(11, 16, 'Lampung Tengah'),
(12, 17, 'Bungo');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_agenda`
--

CREATE TABLE `kategori_agenda` (
  `id_kategori_agenda` int(11) NOT NULL,
  `nama_kategori_agenda` varchar(255) NOT NULL,
  `deskripsi_kategori_agenda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_agenda`
--

INSERT INTO `kategori_agenda` (`id_kategori_agenda`, `nama_kategori_agenda`, `deskripsi_kategori_agenda`) VALUES
(1, 'Webinar', 'webinar ini merupakan webinar dengan pserta paling banyak dalam sejarah indonesia'),
(4, 'pelatihan', 'pelatihan android studio'),
(5, 'workshop', 'workshop pelatihan data science'),
(6, 'seminar', 'seminar data mining');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `id_kabupaten`, `nama_kecamatan`) VALUES
(1, 8, 'belat'),
(2, 7, 'singai pinang'),
(3, 3, 'muara takus'),
(5, 8, 'Kundur');

-- --------------------------------------------------------

--
-- Table structure for table `lembaga`
--

CREATE TABLE `lembaga` (
  `id_lembaga` int(11) NOT NULL,
  `nama_lembaga` varchar(255) NOT NULL,
  `deskripsi_lembaga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lembaga`
--

INSERT INTO `lembaga` (`id_lembaga`, `nama_lembaga`, `deskripsi_lembaga`) VALUES
(1, 'FST UIN SUSKA RIAU', 'Kerjasama dalam Bidang Riset dan Publikasi'),
(3, 'PREDATECH UIN SUSKA RIAU', 'kerjasama Kelembagaan dan Organisasi Ilmiah'),
(4, 'ROBOTIC NUSANTARA', 'Kerjasama dalam Bidang Aplikasi dan Robotika'),
(5, ' LPPM UNIV. LANCANG KUNING', 'Kerjasama dalam Bidang Pengembangan dan Pengajaran'),
(6, ' GEMILANG CYBER NUSANTARA', 'Kerjasama dalam Bidang Pengembangan Aplikasi'),
(7, 'RUMAH SAHABAT MADANI', 'Bekerja sama di Bidang Sosial Keagamaan'),
(8, 'PT. TRAKINDO APP INDONESIA', 'Kerjasama Pengembangan Software'),
(9, ' INFORMATIKA UNIV. PAHLAWAN', 'Kerjasama dalam Bidang Riset dan Publikasi'),
(10, 'YAYASAN PENDIDIKAN ISLAM DUMAI', 'Kerjasama dalam Bidang Pendidikan dan Pengajaran');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `narasumber`
--

CREATE TABLE `narasumber` (
  `id_narasumber` int(11) NOT NULL,
  `nama_narasumber` varchar(255) NOT NULL,
  `afiliasi_narasumber` varchar(255) NOT NULL,
  `id_bidang_ilmu` int(11) NOT NULL,
  `email_narasumber` varchar(255) NOT NULL,
  `telp_narasumber` varchar(255) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `foto_narasumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `narasumber`
--

INSERT INTO `narasumber` (`id_narasumber`, `nama_narasumber`, `afiliasi_narasumber`, `id_bidang_ilmu`, `email_narasumber`, `telp_narasumber`, `id_provinsi`, `foto_narasumber`) VALUES
(12, 'gusdizuriadi', 'mahasisawa sistem informasi', 3, 'gusdizuriadi59826@gmail.com', '081265956833', 13, '9daeddfbe9ad4483a7162a9e4cc2ea27.jpg'),
(13, 'mustakim st mkom', 'Ketua organisasi oredatech', 1, 'admin@gmail.com', '081265956833', 12, '4738a3ce447cdd066aff931ac301cb27.jpg'),
(14, 'gusdi', 'mahasisawa sistem informasi', 4, 'gusdizuriadi59826@gmail.com', '081265956833', 14, '63fd4f83276ce449fd7146b62d21b35b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran_peserta`
--

CREATE TABLE `pendaftaran_peserta` (
  `id_peserta` int(11) NOT NULL,
  `nama_peserta` varchar(255) NOT NULL,
  `jenis_kelamin_peserta` varchar(255) NOT NULL,
  `pendidikan_peserta` varchar(255) NOT NULL,
  `afiliasi_peserta` varchar(255) NOT NULL,
  `email_peserta` varchar(255) NOT NULL,
  `telp_peserta` varchar(255) NOT NULL,
  `alamat_peserta` varchar(255) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `status_peserta` enum('biasa','undangan','non_aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran_peserta`
--

INSERT INTO `pendaftaran_peserta` (`id_peserta`, `nama_peserta`, `jenis_kelamin_peserta`, `pendidikan_peserta`, `afiliasi_peserta`, `email_peserta`, `telp_peserta`, `alamat_peserta`, `id_provinsi`, `id_kabupaten`, `id_event`, `status_peserta`) VALUES
(2, 'Gusdizuriadi', 'laki laki', 'S1', 'Mahasiswa sistem informasi uin suska riau', 'gusdizuriadi59826@gmail.com', '081265956855', 'Jln Mustamindo', 13, 8, 5, 'biasa'),
(34, 'Bayu Pribadi', 'laki laki', 'S1', 'Mahasiswa ilmu komunikasi uin suska riau', 'adi@gmail.com', '0812659568090', 'Jln Mustamindo', 14, 9, 4, 'undangan'),
(35, 'Risky Ariansyah', 'laki laki', 'S1', 'Mahasiswa sistem informasi uin suska riau', 'user@gmail.com', '081266778899', 'jln.sukakarya', 12, 7, 6, 'biasa'),
(39, 'MUhammad', 'laki laki', 'S1', 'Mahasiswa sistem informasi uin suska riau', 'gusdizuriadi59826@gmail.com', '081266778899', 'jln. garuda sakti', 12, 7, 6, 'biasa'),
(40, 'gusdi', '', 'S1', 'Mahasiswa sistem informasi uin suska riau', 'gusdizuriadi59826@gmail.com', '081265956855', 'Jln Mustamindo', 13, 8, 3, 'undangan');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `id_pengurus` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `nama_pengurus` varchar(255) NOT NULL,
  `tempat_lahir_pengurus` varchar(255) NOT NULL,
  `tanggal_lahir_pengurus` date NOT NULL,
  `jenis_kelamin_pengurus` varchar(255) NOT NULL,
  `pendidikan_terakhir_pengurus` varchar(255) NOT NULL,
  `id_bidang_ilmu` int(11) NOT NULL,
  `pekerjaan_pengururs` varchar(255) NOT NULL,
  `afiliasi_pengurus` varchar(255) NOT NULL,
  `email_pengurus` varchar(255) NOT NULL,
  `telp_pengurus` varchar(255) NOT NULL,
  `alamat_pengurus` varchar(255) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `foto_pengurus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `gambar` varchar(255) NOT NULL,
  `id_profil` int(11) NOT NULL,
  `nama_profil` varchar(255) NOT NULL,
  `deskripsi_profil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`gambar`, `id_profil`, `nama_profil`, `deskripsi_profil`) VALUES
('11f6b188c8c015708e63d205689a555b.png', 7, 'INSTITUTE OF RESEARCH AND PUBLICATION INDONESIA', 'IRPI Publisher Merupakan Lembaga Dibawah Yayasan Triwara Cendikia Wiyata Yang Berdiri Pada Tanggal 07 Desember 2020 Berdasarkan SK Menkumham No. AHU-0024312.AH.01.04 Tahun 2020. Lembaga Ini Berkedudukan Di Pekanbaru Riau - Indonesia ');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `nama_provinsi` varchar(255) NOT NULL,
  `logo_provinsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`, `logo_provinsi`) VALUES
(10, 'Aceh', 'e04f60c1c15fe13e2966d1bc826474db.png'),
(11, 'Sumatra Utara', 'c6db6314c72d732a6bda927e482e8b37.png'),
(12, 'Riau', '8196fc2981dce7e672a045f976ae1053.png'),
(13, 'Kepulauan Riau', '603a0b71db1d583544331ea232140b96.png'),
(14, 'Sumatra Barat', 'b0698cc68c272f581291653fa369f8bb.png'),
(15, 'Bengkulu', '37fb5a8512e3d3c3017421d6b2d4eeae.png'),
(16, 'Lampung', '824fe576a3c6f96dcc71efa8ccbedf74.png'),
(17, 'Jambi', '01eb2f236de3227a68fdfd6ec6f5429f.png');

-- --------------------------------------------------------

--
-- Table structure for table `stakeholder`
--

CREATE TABLE `stakeholder` (
  `id_sponsor` int(11) NOT NULL,
  `nama_sponsor` varchar(255) NOT NULL,
  `jenis_stakeholder` varchar(255) NOT NULL,
  `logo_stakeholder` varchar(255) NOT NULL,
  `link_stakeholder` varchar(255) NOT NULL,
  `keterangan_stakeholder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stakeholder`
--

INSERT INTO `stakeholder` (`id_sponsor`, `nama_sponsor`, `jenis_stakeholder`, `logo_stakeholder`, `link_stakeholder`, `keterangan_stakeholder`) VALUES
(13, 'PREDATECH UIN SUSKA RIAU', 'Organisasi', '017bcbd16bb982a4d5260a6a18d67d1b.jpg', 'https://predatech.org/', 'Kerjasama Kelembagaan dan Organisasi Ilmiah'),
(14, 'ROBOTIC NUSANTARA', 'Lembaga', '80433b0142ce15be610354906b7ae471.png', 'https://predatech.org/', 'Kerjasama dalam Bidang Aplikasi dan Robotika'),
(16, 'RUMAH SAHABAT MADANI', 'Yayasan', '690b696cdc6d561ed7a498a220ff76c8.jpg', 'https://predatech.org/', 'Kerjasama dalam Bidang Sosial Keagamaan'),
(17, 'LPPM UNIV. LANCANG KUNING', 'Lembaga', '6fdc2ee1d2603ccb0dbb83957884f933.jpg', 'https://lppm.unilak.ac.id/', 'Kerjasama dalam Bidang Pengembangan dan Pengajaran'),
(18, 'PT. TRAKINDO APP INDONESIA', 'Kerjasama', 'e9690bdee1daf0c37128aea139d69547.png', 'https://www.trakindo.co.id/en', 'Kerjasama Pengembangan Software'),
(19, 'YAYASAN PENDIDIKAN ISLAM DUMAI', 'Yayasan', 'ef393253da86af1b54435033a51c4866.png', 'https://www.sttdumai.ac.id/profil-stt-dumai', 'Kerjasama dalam Bidang Pendidikan dan Pengajaran'),
(20, 'INFORMATIKA UNIV. PAHLAWAN', 'Kerjasama', 'acb77aae72ad0cc2208c5925579f4ced.png', 'https://universitaspahlawan.ac.id/', 'Kerjasama dalam Bidang Riset dan Publikasi'),
(21, 'FST UIN SUSKA RIAU', 'Kerjasama', '17c337a5f3c575c41544d0bc0b9846c3.png', 'https://fst.uin-suska.ac.id/', 'Kerjasama dalam Bidang Riset dan Publikasi'),
(22, 'GEMILANG CYBER NUSANTARA', 'Kerjasama', '961591fa668a64c5c6d46a2b10613729.jpg', 'https://www.gemilangnusantara.com/', 'Kerjasama dalam Bidang Pengembangan Aplikasi');

-- --------------------------------------------------------

--
-- Table structure for table `status_event`
--

CREATE TABLE `status_event` (
  `id_status_event` int(11) NOT NULL,
  `nama_status_event` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_event`
--

INSERT INTO `status_event` (`id_status_event`, `nama_status_event`) VALUES
(1, 'Aktif'),
(2, 'NonAktif');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `level_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `foto_user` varchar(255) DEFAULT NULL,
  `status_user` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$ml83HGMMj9/8lQ9yTVmhrO/jIQiGPEwvn0cIXYRP2W3fIaUHeo7G.', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1625251493, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_ilmu`
--
ALTER TABLE `bidang_ilmu`
  ADD PRIMARY KEY (`id_bidang_ilmu`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`),
  ADD KEY `id_lembaga` (`id_lembaga`);

--
-- Indexes for table `donwload`
--
ALTER TABLE `donwload`
  ADD PRIMARY KEY (`id_donwload`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_narasumber` (`id_narasumber`),
  ADD KEY `id_kategori_agenda` (`id_kategori_agenda`),
  ADD KEY `id_bidang_ilmu` (`id_bidang_ilmu`),
  ADD KEY `id_lembaga` (`id_lembaga`),
  ADD KEY `id_status_event` (`status_event`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `kategori_agenda`
--
ALTER TABLE `kategori_agenda`
  ADD PRIMARY KEY (`id_kategori_agenda`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indexes for table `lembaga`
--
ALTER TABLE `lembaga`
  ADD PRIMARY KEY (`id_lembaga`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `narasumber`
--
ALTER TABLE `narasumber`
  ADD PRIMARY KEY (`id_narasumber`),
  ADD KEY `id_bidang_ilmu` (`id_bidang_ilmu`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `pendaftaran_peserta`
--
ALTER TABLE `pendaftaran_peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_provinsi` (`id_provinsi`),
  ADD KEY `id_kabupaten` (`id_kabupaten`),
  ADD KEY `id_event` (`id_event`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`id_pengurus`),
  ADD KEY `id_divisi` (`id_divisi`),
  ADD KEY `id_bidang_ilmu` (`id_bidang_ilmu`),
  ADD KEY `id_provinsi` (`id_provinsi`),
  ADD KEY `id_kabupaten` (`id_kabupaten`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `stakeholder`
--
ALTER TABLE `stakeholder`
  ADD PRIMARY KEY (`id_sponsor`);

--
-- Indexes for table `status_event`
--
ALTER TABLE `status_event`
  ADD PRIMARY KEY (`id_status_event`),
  ADD KEY `nama_status_event` (`nama_status_event`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang_ilmu`
--
ALTER TABLE `bidang_ilmu`
  MODIFY `id_bidang_ilmu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donwload`
--
ALTER TABLE `donwload`
  MODIFY `id_donwload` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategori_agenda`
--
ALTER TABLE `kategori_agenda`
  MODIFY `id_kategori_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lembaga`
--
ALTER TABLE `lembaga`
  MODIFY `id_lembaga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `narasumber`
--
ALTER TABLE `narasumber`
  MODIFY `id_narasumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pendaftaran_peserta`
--
ALTER TABLE `pendaftaran_peserta`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pengurus`
--
ALTER TABLE `pengurus`
  MODIFY `id_pengurus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `stakeholder`
--
ALTER TABLE `stakeholder`
  MODIFY `id_sponsor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `status_event`
--
ALTER TABLE `status_event`
  MODIFY `id_status_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
