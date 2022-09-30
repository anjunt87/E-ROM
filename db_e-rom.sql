-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30 Sep 2022 pada 01.30
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_e-rom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_departement`
--

CREATE TABLE IF NOT EXISTS `t_departement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_departement` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `t_departement`
--

INSERT INTO `t_departement` (`id`, `n_departement`) VALUES
(1, 'Pemasaran & Pengembangan Produk'),
(2, 'Jaringan Operasi & Penjualan'),
(3, 'Keuangan & Menejemen Risiko'),
(4, 'Manajemen Risiko'),
(5, 'Teknologi Informasi & Digital'),
(6, 'Human Capital, Legal & Compliance'),
(7, 'Direktur Umum'),
(8, 'Trasnformasi Office'),
(9, 'Satuan Pengawas Intern');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_divisi`
--

CREATE TABLE IF NOT EXISTS `t_divisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_departement` int(11) NOT NULL,
  `n_divisi` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data untuk tabel `t_divisi`
--

INSERT INTO `t_divisi` (`id`, `id_departement`, `n_divisi`) VALUES
(1, 1, 'Kantor Wilayah'),
(2, 1, 'Produk Gadai'),
(3, 1, 'Produk Emas'),
(4, 1, 'Unit Usaha Syariah'),
(5, 1, 'Produk Mikro Fidusia'),
(6, 1, 'Pemasaran'),
(7, 2, 'Jaringan & Operasional'),
(8, 2, 'Penjualan'),
(9, 2, 'Hubungan Kelembagaan'),
(10, 2, 'Corporate Social Responsibilty'),
(11, 3, 'Perencanaan Strategis'),
(12, 3, 'Akuntansi'),
(13, 3, 'Tresuri'),
(14, 3, 'Menejemen Kinerja Perusahaan'),
(15, 4, 'Resiko Kredit & Asuransi'),
(16, 4, 'Menejemen Resiko Operasi & Korporasi'),
(17, 5, 'Strategi, Arsitektur & Perencanaan TI'),
(18, 5, 'Operasional & Infrastuktur TI'),
(19, 5, 'Pengembangan Aplikasi TI'),
(20, 5, 'IT Security'),
(21, 6, 'Operasional Human Capital'),
(22, 6, 'Strategi Human Capital'),
(23, 6, 'Pegadaian Corporate University'),
(24, 6, 'Hukum'),
(25, 6, 'Kepatuhan'),
(26, 7, 'Menejemen Aset Tetap'),
(27, 7, 'Pengadaan & Logistik'),
(28, 8, 'Innovation Center'),
(29, 8, 'PMO & Manajemen Perubahaan'),
(30, 8, 'Manajemen Data TI'),
(31, 8, 'Digital Landing & Payment'),
(32, 8, 'Budaya Kerja'),
(33, 9, 'Inspektorat Pengembangan'),
(34, 9, 'Inspektorat Pusat'),
(35, 9, 'Inspektorat Wilayah 1'),
(36, 9, 'Inspektorat Wilayah 2'),
(37, 9, 'Inspektorat Wilayah 3'),
(38, 9, 'Sekertariat Perusahaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jabatan`
--

CREATE TABLE IF NOT EXISTS `t_jabatan` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `n_jabatan` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `t_jabatan`
--

INSERT INTO `t_jabatan` (`id`, `n_jabatan`) VALUES
(1, 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_profile`
--

CREATE TABLE IF NOT EXISTS `t_profile` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_user` int(12) NOT NULL,
  `id_departement` varchar(128) NOT NULL,
  `id_divisi` varchar(128) NOT NULL,
  `id_jabatan` varchar(128) NOT NULL,
  `id_atasan` int(11) NOT NULL,
  `n_lengkap` varchar(128) NOT NULL,
  `nik_profile` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `img_profile` varchar(128) NOT NULL,
  `qr_code_profile` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik_profile`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `t_profile`
--

INSERT INTO `t_profile` (`id`, `id_user`, `id_departement`, `id_divisi`, `id_jabatan`, `id_atasan`, `n_lengkap`, `nik_profile`, `alamat`, `no_hp`, `img_profile`, `qr_code_profile`) VALUES
(1, 1, '5', '20', '1', 0, 'ADMINISTATOR', '3215010807960007', '65446464164', '6258545', 'avatar.jpg', 'b.jpg'),
(2, 2, '2', '1', '1', 0, 'DIVISI OHC', '15416255201095', 'adaada', '0861622266412', '', 'b.jpg'),
(3, 0, '2', '1', '1', 0, 'DEPARTEMENT', '1541', 'adaada', '0861622266412', '', 'b.jpg'),
(4, 0, '1', '1', '1', 0, 'DIVISION', '416255201095', 'adaada', '0861622266412', '', 'b.jpg'),
(5, 0, '2', '1', '1', 0, 'KEUANGAN', '1541625', 'adaada', '0861622266412', '', 'b.jpg'),
(6, 0, '1', '1', '1', 0, 'User (Karyawan)', 'q109564665', 'adaada', '0861622266412', '', 'b.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_request`
--

CREATE TABLE IF NOT EXISTS `t_request` (
  `id_request` int(11) NOT NULL AUTO_INCREMENT,
  `id_departement` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_atasan` int(11) NOT NULL,
  `n_pegawai` varchar(128) NOT NULL,
  `nik_request` varchar(128) NOT NULL,
  `k_healt` int(17) NOT NULL,
  `rs_dokter` varchar(128) NOT NULL,
  `n_pasien` varchar(128) NOT NULL,
  `ttl_pasien` date NOT NULL,
  `ket` varchar(128) NOT NULL,
  `pisa` varchar(11) NOT NULL,
  `d_sakit` varchar(128) NOT NULL,
  `kronologi` varchar(128) NOT NULL,
  `kuitansi` varchar(128) NOT NULL,
  `tgl_kuitansi` date NOT NULL,
  `u_berobat` varchar(128) NOT NULL,
  `nominal` int(11) NOT NULL,
  `t_pengajuan` int(11) NOT NULL,
  `bukti1` varchar(128) NOT NULL,
  `bukti2` varchar(128) NOT NULL,
  `kep_divisi` varchar(128) NOT NULL,
  `n_kep_divisi` varchar(128) NOT NULL,
  `nik_kep_divisi` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `a_divisi` int(11) NOT NULL,
  `a_departement` int(11) NOT NULL,
  `a_ohc` int(11) NOT NULL,
  `a_keuangan` int(11) NOT NULL,
  PRIMARY KEY (`id_request`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `t_request`
--

INSERT INTO `t_request` (`id_request`, `id_departement`, `id_divisi`, `id_jabatan`, `id_atasan`, `n_pegawai`, `nik_request`, `k_healt`, `rs_dokter`, `n_pasien`, `ttl_pasien`, `ket`, `pisa`, `d_sakit`, `kronologi`, `kuitansi`, `tgl_kuitansi`, `u_berobat`, `nominal`, `t_pengajuan`, `bukti1`, `bukti2`, `kep_divisi`, `n_kep_divisi`, `nik_kep_divisi`, `tgl_pengajuan`, `a_divisi`, `a_departement`, `a_ohc`, `a_keuangan`) VALUES
(1, 1, 1, 1, 1, 'andri', '8071996', 254963488, 'dr.saenudin', 'kobokanaer', '2000-09-01', 'sakit', 'istri', 'panas', '-', 'ada', '2022-09-17', '-', 1500000, 1500000, 'a.jpg', 'b.jpg', 'IT Departement', 'samsudin', 123645855, '2022-09-17', 1, 1, 1, 1),
(2, 1, 2, 1, 1, 'aaa', '0', 0, '', '', '0000-00-00', '', '', '', '', '', '0000-00-00', '', 0, 0, '', '', '', '', 0, '0000-00-00', 1, 1, 1, 0),
(3, 1, 1, 1, 1, 'aaaasas2222', 'q109564665', 45454, 'aaaa', 'aaaa', '2022-09-18', 'aaaa', 'aaaa', 'aaa', 'aaaa', 'aaaa', '2022-09-18', 'aaaa', 165464, 165464, 'a.jpg', '', 'aaaa', 'aaaa', 54646, '2022-09-28', 1, 0, 0, 0),
(4, 2, 1, 1, 1, 'aaaa', '46546464', 0, 'aaaa', 'aaaa', '0000-00-00', 'aaaa', 'aaaa', 'aaaa', 'aaaa', 'aaaa', '2022-09-18', 'aaaa', 165464, 0, '', '', '', '', 0, '2022-09-18', 1, 1, 0, 0),
(5, 1, 1, 1, 1, 'aaaa', '46546464', 0, 'aaaa', 'aaaa', '0000-00-00', 'aaaa', 'aaaa', 'aaaa', 'aaaa', 'aaaa', '2022-09-18', 'aaaa', 165464, 0, '', '', '', '', 0, '2022-09-18', 1, 0, 0, 0),
(6, 1, 1, 1, 1, 'adadad', '3215010807960007', 0, 'dada', 'dada', '0000-00-00', 'ada', 'ada', 'dad', 'dadad', 'dadad', '2022-09-18', 'adaad', 64644, 0, '', '', '', '', 0, '2022-09-18', 1, 0, 0, 0),
(8, 1, 1, 1, 1, 'User (Karyawan)', 'q109564665', 4654, '64646', '46', '0000-00-00', '664', '64', '646', '46', '46', '2002-06-04', '46', 4, 0, '', '', '', '', 0, '2022-09-28', 0, 0, 0, 0),
(9, 1, 1, 1, 1, 'User (Karyawan)', 'q109564665', 5464, '46', '46', '0000-00-00', '66', '646', '46', '464', '64', '2022-04-06', '646', 664, 0, '', '', '', '', 0, '2022-09-28', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_atasan` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `image` varchar(128) NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik`),
  UNIQUE KEY `nik_2` (`nik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_atasan`, `name`, `nik`, `image`, `qr_code`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 0, 'ADMINISTATOR', '3215010807960007', '', '', '$2y$10$u.l0YSNh30NK7tmLqKzbzeLUmJ07fgI21BSzQxli7LUcdVhEr5vL2', 1, 1, 1664447017),
(2, 0, 'DIVISI OHC', '15416255201095', '', '', '$2y$10$LA3BlfLZLiVS/VaPtQjGi.JkSEqrzis1VqLEejM8fNw8go0hr5MZS', 2, 1, 1664020496),
(3, 0, 'DEPARTEMENT', '1541', '', '', '$2y$10$JRd.UDxngl4jRhKIlkMq1uhHtd95gI60b4u/GQwGiVXtiZkoqOsUi', 3, 1, 1663983204),
(4, 0, 'DIVISION', '416255201095', '', '', '$2y$10$Fk/OiAbaDnVcbQ2eTAXW/.pjVklZpDrbAzF60qy39OiLbx2FeJPgS', 4, 1, 1638859895),
(5, 0, 'KEUANGAN', '1541625', '', '', '$2y$10$k.u24BXZZBN186x0i3Aag.WM8pxu2yoJEkHL53kpPFs6Quiilx9Zy', 5, 1, 1664020513),
(6, 1, 'KARYAWAN', 'q109564665', '', '', '$2y$10$dIsokG/saZyO8iiU4dLOfug4CVsWwNIKngFH4o7NPsOfxA7Ug73By', 6, 1, 1609912555);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_acces_menu`
--

CREATE TABLE IF NOT EXISTS `user_acces_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data untuk tabel `user_acces_menu`
--

INSERT INTO `user_acces_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 8),
(3, 1, 7),
(4, 1, 9),
(5, 1, 10),
(6, 1, 11),
(7, 2, 2),
(8, 2, 8),
(9, 2, 7),
(10, 3, 3),
(11, 3, 8),
(12, 3, 7),
(13, 4, 4),
(14, 4, 8),
(15, 4, 7),
(16, 5, 5),
(17, 5, 8),
(18, 5, 7),
(20, 6, 6),
(21, 6, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Divisi OHC'),
(3, 'Kepala Departement'),
(4, 'Kepala Division'),
(5, 'Divisi Keuangan'),
(6, 'Karyawan'),
(7, 'Request Users'),
(8, 'Request'),
(9, 'Menu'),
(10, 'Users Setting'),
(11, 'Position Setting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Divisi OHC'),
(3, 'Kepala Departement'),
(4, 'Kepala Divisi'),
(5, 'Divisi Keuangan'),
(6, 'Users (karyawan)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE IF NOT EXISTS `user_sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Dashboard', 'admin_OHC', 'fas fa-fw fa-tachometer-alt', 1),
(3, 3, 'Dashboard', 'departement', 'fas fa-fw fa-clipboard-list', 1),
(4, 4, 'Dashboard', 'division', 'fas fa-fw fa-clipboard-list', 1),
(5, 5, 'Dashboard', 'keuangan', 'fas fa-fw fa-clipboard-list', 1),
(6, 6, 'Dashboard', 'users', 'fas fa-fw fa-clipboard-list', 1),
(7, 7, 'Request Users', 'request/requestUsers', 'fas fa-fw fa-tachometer-alt', 1),
(8, 7, 'Request History', 'request/historyRequestApp', 'fas fa-fw fa-book', 1),
(9, 8, 'Forms Request', 'request/Tambah', 'fas fa-fw fa-clipboard-list', 1),
(10, 8, 'History Request', 'request/usersRequestHistory', 'fas fa-fw fa-book', 1),
(11, 9, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(12, 9, 'SubMenu Management', 'menu/subMenuManagement', 'fas fa-fw fa-folder-open', 1),
(13, 10, 'Users Role', 'admin/usersRole', 'fas fa-fw fa-user-tie', 1),
(14, 10, 'Users Management', 'admin/usersManagement', 'fas fa-fw fa-user-tie', 1),
(15, 11, 'Departement Setting', 'departement/positionIndex', 'fas fa-fw fa-user', 1),
(16, 11, 'Division Setting', 'division/positionIndex', 'fas fa-fw fa-user', 1),
(17, 11, 'Jabatan Setting', 'jabatan/positionIndex', 'fas fa-fw fa-user', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
