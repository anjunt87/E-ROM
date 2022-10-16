-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Okt 2022 pada 15.37
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `t_jabatan`
--

INSERT INTO `t_jabatan` (`id`, `n_jabatan`) VALUES
(1, 'Admin'),
(2, 'Kepala'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_profile`
--

CREATE TABLE IF NOT EXISTS `t_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_departement` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_atasan` int(11) NOT NULL,
  `n_lengkap` varchar(128) NOT NULL,
  `nik_profile` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `img_profile` varchar(128) NOT NULL,
  `qr_code_profile` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik_profile`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data untuk tabel `t_profile`
--

INSERT INTO `t_profile` (`id`, `id_departement`, `id_divisi`, `id_jabatan`, `id_atasan`, `n_lengkap`, `nik_profile`, `alamat`, `no_hp`, `img_profile`, `qr_code_profile`) VALUES
(1, 1, 1, 1, 1, 'ADMINISTATOR', '3215010807960001', '65446464164', '6666233', '866f3f7526c9d74cf5795b62187dfd19.jpg', 'b.jpg'),
(2, 6, 21, 1, 1, 'Sutriso', '3215010807960002', 'aaaa', '1121', '', ''),
(3, 1, 1, 2, 1, 'Athena Blackwell', '3215010807960003', '', '', '', ''),
(4, 3, 12, 1, 1, 'Aurelia Garza', '3215010807960051', '', '', '785db1990bd459aed51e4e0fcf4ffd0b.jpg', ''),
(11, 2, 7, 2, 1, 'Christen Garner', '3215010807960004', '', '', '', ''),
(12, 3, 11, 2, 1, 'Rahim Mcmahon', '3215010807960005', '', '', '', ''),
(13, 4, 15, 2, 1, 'Ira Hardin', '3215010807960006', '', '', '', ''),
(14, 5, 17, 2, 1, 'Jael Snider', '3215010807960007', '', '', '', ''),
(15, 6, 21, 2, 1, 'Stephanie May', '3215010807960008', '', '', '', ''),
(16, 7, 26, 2, 1, 'Shafira Allison', '3215010807960009', '', '', '', ''),
(17, 8, 28, 2, 1, 'Ian Thornton', '3215010807960010', '', '', '', ''),
(18, 9, 33, 2, 1, 'Isadora Tanner', '3215010807960011', '', '', '', ''),
(19, 1, 1, 2, 3, 'Mikayla Collier', '3215010807960012', '', '', '', ''),
(20, 1, 2, 2, 3, 'Quemby Francis', '3215010807960013', '', '', '', ''),
(21, 1, 3, 2, 3, 'Heidi Horne', '3215010807960014', '', '', '', ''),
(22, 1, 4, 2, 3, 'Nayda Lopez', '3215010807960015', '', '', '', ''),
(23, 1, 5, 2, 3, 'Lucius Cabrera', '3215010807960016', '', '', '', ''),
(24, 1, 6, 2, 3, 'Cedric Hardin', '3215010807960017', '', '', '', ''),
(25, 2, 7, 2, 11, 'Lacey Brennan', '3215010807960018', '', '', '', ''),
(26, 2, 8, 2, 11, 'Alice Carney', '3215010807960019', '', '', '', ''),
(27, 2, 9, 2, 11, 'Kenneth Chavez', '3215010807960020', '', '', '', ''),
(28, 2, 10, 2, 11, 'Ina Macias', '3215010807960021', '', '', '', ''),
(29, 3, 11, 2, 12, 'Keaton Wilkerson', '3215010807960022', '', '', '', ''),
(30, 3, 12, 2, 12, 'Amos Wells', '3215010807960023', '', '', '', ''),
(31, 3, 13, 2, 12, 'Connor Allison', '3215010807960024', '', '', '', ''),
(32, 3, 14, 2, 12, 'Gregory Hays', '3215010807960025', '', '', '', ''),
(33, 4, 15, 2, 13, 'Omar Fuentes', '3215010807960026', '', '', '', ''),
(34, 4, 16, 2, 13, 'Linus Rodgers', '3215010807960027', '', '', '', ''),
(35, 5, 17, 2, 14, 'Shafira Cooper', '3215010807960029', '', '', '', ''),
(36, 5, 18, 2, 14, 'Sybil Gomez', '3215010807960030', '', '', '', ''),
(37, 5, 19, 2, 14, 'Noah Padilla', '3215010807960031', '', '', '', ''),
(38, 5, 20, 2, 14, 'Magee Meadows', '3215010807960032', '', '', '', ''),
(39, 6, 21, 2, 15, 'Kirk Pollard', '3215010807960033', '', '', '', ''),
(40, 6, 22, 2, 15, 'Kiona Mathis', '3215010807960034', '', '', '', ''),
(41, 6, 23, 2, 15, 'Benedict Nguyen', '3215010807960035', '', '', '', ''),
(42, 6, 24, 2, 15, 'Mallory Holmes', '3215010807960036', '', '', '', ''),
(43, 6, 25, 2, 15, 'Reuben Bell', '3215010807960037', '', '', '', ''),
(44, 7, 26, 2, 16, 'Lacey Hale', '3215010807960038', '', '', '', ''),
(45, 7, 27, 2, 16, 'Emery Reilly', '3215010807960039', '', '', '', ''),
(46, 8, 28, 2, 17, 'Magee Neal', '3215010807960040', '', '', '', ''),
(47, 8, 29, 2, 17, 'Marvin Walls', '3215010807960041', '', '', '', ''),
(48, 8, 30, 2, 17, 'Pascale Clayton', '3215010807960042', '', '', '', ''),
(49, 8, 31, 2, 17, 'Rajah Landry', '3215010807960043', '', '', '', ''),
(50, 8, 32, 2, 17, 'Perry Mclaughlin', '3215010807960044', '', '', '', ''),
(51, 9, 33, 2, 18, 'Cora Reid', '3215010807960045', '', '', '', ''),
(52, 9, 34, 2, 18, 'MacKenzie Knapp', '3215010807960046', '', '', '', ''),
(53, 9, 35, 2, 18, 'Malik Oliver', '3215010807960047', '', '', '', ''),
(54, 9, 36, 2, 18, 'William Barr', '3215010807960048', '', '', '', ''),
(55, 9, 37, 2, 18, 'Lawrence Roach', '3215010807960049', '', '', '', ''),
(56, 9, 38, 2, 18, 'Judith Manning', '3215010807960050', '', '', '', ''),
(58, 1, 1, 3, 19, 'Nevada Hebert', '3215010807960052', '', '', '', '');

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
  `tgl_exp` date NOT NULL,
  `a_divisi` int(11) NOT NULL,
  `a_departement` int(11) NOT NULL,
  `a_ohc` int(11) NOT NULL,
  `a_keuangan` int(11) NOT NULL,
  `t_approve` int(11) NOT NULL,
  `t_ket` varchar(128) NOT NULL,
  PRIMARY KEY (`id_request`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `t_request`
--

INSERT INTO `t_request` (`id_request`, `id_departement`, `id_divisi`, `id_jabatan`, `id_atasan`, `n_pegawai`, `nik_request`, `k_healt`, `rs_dokter`, `n_pasien`, `ttl_pasien`, `ket`, `pisa`, `d_sakit`, `kronologi`, `kuitansi`, `tgl_kuitansi`, `u_berobat`, `nominal`, `t_pengajuan`, `bukti1`, `bukti2`, `kep_divisi`, `n_kep_divisi`, `nik_kep_divisi`, `tgl_pengajuan`, `tgl_exp`, `a_divisi`, `a_departement`, `a_ohc`, `a_keuangan`, `t_approve`, `t_ket`) VALUES
(1, 1, 1, 3, 19, 'Nevada Hebert', '3215010807960052', 0, 'Labore perspiciatis', 'Dolore Nam excepteur', '2022-07-25', 'Ut ipsam voluptas qu', 'Duis labore', 'Quia est eum deserun', 'Tempor error magna m', 'Commodo ea aspernatu', '2022-07-14', 'Enim sed non deserun', 71, 71, '', '', '', '', 0, '2022-10-01', '2022-11-30', 1, 1, 1, 2, 1, 'wgdwadgagqegae'),
(2, 1, 1, 3, 19, 'Nevada Hebert', '3215010807960052', 0, 'Cum labore aut paria', 'Est praesentium cons', '2002-07-08', 'Hic eligendi assumen', 'Non quas qu', 'Non nisi minim fugia', 'Optio esse aut faci', 'Non esse nulla dolor', '1979-09-28', 'Rem ipsam aliqua Et', 50, 50, '', '', '', '', 0, '2022-10-02', '2022-12-01', 2, 0, 0, 0, 1, 'data tidak legkap\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_atasan` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `qr_code` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik`),
  UNIQUE KEY `nik_2` (`nik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_atasan`, `name`, `nik`, `image`, `qr_code`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 1, 'ADMINISTATOR', '3215010807960001', '', '', '$2y$10$hw4ugnheQ7kj5qqjHdprX.dLnwT.WUb0qRURtOOyfip4bZYuXfIey', 1, 1, 2022),
(2, 1, 'Sutriso', '3215010807960002', '', '', '$2y$10$jujDuHabyQLJEX4BVJpnJu3iQ25S9SOyU3uKtiAljDv1DeqG0QaO2', 2, 1, 2022),
(3, 1, 'Athena Blackwell', '3215010807960003', '', '', '$2y$10$yRR69I0bg3XhnQLkYE3QJeOth1iXmOkqKWJpJNSuG4Ww.L3Who1Ci', 3, 1, 2022),
(4, 1, 'Aurelia Garza', '3215010807960051', '', '', '$2y$10$Uz.WNwggc46ulHoI1OKBrOQ68NBAiFonPJlg1Zh8MeGnZ0FoAkPpC', 5, 1, 2022),
(11, 1, 'Christen Garner', '3215010807960004', '', '', '$2y$10$pvU7SJF7Pm4Wp8dylxmcAu7dECVDAkOQyqRhwD2BlF49r1wNUX37.', 3, 1, 2022),
(12, 1, 'Rahim Mcmahon', '3215010807960005', '', '', '$2y$10$BZPwwMWSIUv1Vuvg3nrpFutml/rX4sGNAQTb6vLhJESTVIPNlTOo.', 3, 1, 2022),
(14, 1, 'Ira Hardin', '3215010807960006', '', '', '$2y$10$3PnQZoakwASS9srZ9y23t.oKUydovJiZOVnQSD2IgBD2fLEKGs11.', 3, 1, 2022),
(15, 1, 'Jael Snider', '3215010807960007', '', '', '$2y$10$ofIYHuPF60eSSsBJHKtc0OBiHJpO4XiobF6HdXiRfqHDCZIVNCqsK', 3, 1, 2022),
(16, 1, 'Stephanie May', '3215010807960008', '', '', '$2y$10$JpXFW2x2zEyTe/plsLy7xesuYJqctD8tglIGDMK.q/XH1fLGqRQv.', 3, 1, 2022),
(17, 1, 'Shafira Allison', '3215010807960009', '', '', '$2y$10$69oKcGf4CHgiwuzzm/NsFeNeSyB74QJVHCT./lx566Zvh35l.r72m', 3, 1, 2022),
(19, 1, 'Ian Thornton', '3215010807960010', '', '', '$2y$10$7nG6xOx.rg8N893Gdf0n4OmuKhCxd9WNdOfmTrZotJ44/vmDDz9PO', 3, 1, 2022),
(20, 1, 'Isadora Tanner', '3215010807960011', '', '', '$2y$10$mfvms7ChjatlQDPiF1MujOTvHzOCoBQkdb2zzStoX57gy/nKJ4yyC', 3, 1, 2022),
(21, 3, 'Mikayla Collier', '3215010807960012', '', '', '$2y$10$sFqZqguWaDk7RhGgCPkwGeVKwLu3P7LPPM9QTE8keoPvonSRMKrey', 4, 1, 2022),
(22, 3, 'Quemby Francis', '3215010807960013', '', '', '$2y$10$03KiZJaUl2qE7nZlpBaOfeRJmFgriNuQn78lzcNKs5YndMYYCUX4G', 4, 1, 2022),
(25, 3, 'Heidi Horne', '3215010807960014', '', '', '$2y$10$YwZWM5bwFv.sn6F7TU8SNu7hE9nx3hw3hpZnX/kA8NtA/dr53kITu', 4, 1, 2022),
(27, 3, 'Nayda Lopez', '3215010807960015', '', '', '$2y$10$jEhCSbwRgpV6mrF5qKgwge0BdCqpSrpr.E.YbsiNfdKQnGZv388Qi', 4, 1, 2022),
(28, 3, 'Lucius Cabrera', '3215010807960016', '', '', '$2y$10$1qzp5stoHU4uAOrm3PMJseKbOV.V52N7tI0R6M98EZwrlibYGnnsW', 4, 1, 2022),
(29, 3, 'Cedric Hardin', '3215010807960017', '', '', '$2y$10$lMMeDJAHyjnoKNUN3rUmZeeCxvw6sywNDcQQ5snlIRSgvfxUpCbyO', 4, 1, 2022),
(30, 11, 'Lacey Brennan', '3215010807960018', '', '', '$2y$10$VOGOtzkGDB0c3VNJD4PlWerGy/23psvDKd.kxmxszji0h/PWi716u', 4, 1, 2022),
(31, 11, 'Alice Carney', '3215010807960019', '', '', '$2y$10$lDLC0ODCJtHUvJWtev8CYOMNs2NH1UyynVU32a/MMOPc5W1ppjCbe', 4, 1, 2022),
(32, 11, 'Kenneth Chavez', '3215010807960020', '', '', '$2y$10$ukrwuwLu7WCQe.xL7HT9u.39sDslTdDrZhfqdJnyLSPxN60Cgr0U.', 4, 1, 2022),
(33, 11, 'Ina Macias', '3215010807960021', '', '', '$2y$10$8M5FlyI0uU7vtu.N1.Vh8OEe0l6bZYHsr2252jsuo6IKv/rYqzpHy', 4, 1, 2022),
(34, 12, 'Keaton Wilkerson', '3215010807960022', '', '', '$2y$10$dJhddjZj814FbfxECHP1meItrCfDRh4feDzSSPp8Xe.zbwjffsLX6', 4, 1, 2022),
(35, 12, 'Amos Wells', '3215010807960023', '', '', '$2y$10$roySs6jHekTNeS.Rpijh7.1Ee35RWHrWqTRh.RfgA2Hb1j4ZYHnXK', 4, 1, 2022),
(36, 12, 'Connor Allison', '3215010807960024', '', '', '$2y$10$ziBJsAy.qvGaJQpJCvv1Hef1Hrsh66heHWxGcAr/L4RsHmO3SzmB6', 4, 1, 2022),
(37, 12, 'Gregory Hays', '3215010807960025', '', '', '$2y$10$lDHTVwTTQ2m33b3tyrLht.NiC9ghZnfHNsa9MTEaog9IF2K0fSd9a', 4, 1, 2022),
(38, 13, 'Omar Fuentes', '3215010807960026', '', '', '$2y$10$GOwhByrDcFgC13Kh1C2Q3eFLv1Gbg2zML9U.xjzmTxGD8vqLZ9Izm', 4, 1, 2022),
(39, 13, 'Linus Rodgers', '3215010807960027', '', '', '$2y$10$gjxkYC8Prcx1w.pchsGFHOzpLDrd07HSahsrPVDrEpJjL7lzfSylu', 4, 1, 2022),
(40, 14, 'Shafira Cooper', '3215010807960029', '', '', '$2y$10$dU.mpmIJ0gTsE5v/J0PkUO3Y/zwANxx0oqHBoV6MKP4h/qupPd9hG', 4, 1, 2022),
(41, 14, 'Sybil Gomez', '3215010807960030', '', '', '$2y$10$P.Zj2Z/n8DIu3vktcqbdYu6sW.ULxjG6ba5KIvq8D7KAN2VDYN.zS', 4, 1, 2022),
(42, 14, 'Noah Padilla', '3215010807960031', '', '', '$2y$10$cuthB9CsEZh9H5TzpZk4/Op05JqhQ47xaB3EkIObU/8e4vcx9Kjsq', 4, 1, 2022),
(43, 14, 'Magee Meadows', '3215010807960032', '', '', '$2y$10$L99YR5MBTTn7E7.JHheQiOS.3u9JUgp1lzcneoA0leG3wyCgP7QMW', 4, 1, 2022),
(44, 15, 'Kirk Pollard', '3215010807960033', '', '', '$2y$10$CbyMVp27SalppsgO7splEu9bYEHq87yDSerE8PdEMXpiwtlDB63Se', 4, 1, 2022),
(45, 15, 'Kiona Mathis', '3215010807960034', '', '', '$2y$10$/rhVmKr5p/k/bVOgRjP6bOXXaWB/iE1W1x6lS6aLJwpth62dO7nYi', 4, 1, 2022),
(46, 15, 'Benedict Nguyen', '3215010807960035', '', '', '$2y$10$ryQOgM/QfvpMFKNnKVIgcumRWd0dMFQ5MXCInBwFZm1b0mvkoHLEK', 4, 1, 2022),
(47, 15, 'Mallory Holmes', '3215010807960036', '', '', '$2y$10$y4/65dSrah2gwkVrcsB52ORVwdpEq06sCwCdNPaCF0PPy3YCgK1XK', 4, 1, 2022),
(48, 15, 'Reuben Bell', '3215010807960037', '', '', '$2y$10$JUd0fxfbzvJ8Yww5c4M1yOFXZn/U655hfnfZhdXoi1tDYbYf75j/6', 4, 1, 2022),
(49, 16, 'Lacey Hale', '3215010807960038', '', '', '$2y$10$nXjMfrR7a/ZU4Aih6/fYUO2sTjy0YlDKtVRMIEU75SXSIXucdeCIq', 4, 1, 2022),
(50, 16, 'Emery Reilly', '3215010807960039', '', '', '$2y$10$aUyg089E2xtHlqBHdq9jMu49yQug.5KFrJkeq4Ww1MeAIddGZS8AK', 4, 1, 2022),
(51, 17, 'Magee Neal', '3215010807960040', '', '', '$2y$10$ve9mCUDtMG9.GqKI/AVWZOGUM99yz.DieTte6O520KzKxbiRwl.3S', 4, 1, 2022),
(52, 17, 'Marvin Walls', '3215010807960041', '', '', '$2y$10$.J/AE/.5Cs900Fv0oVit8O4wD.pGjYELNS/jX9DCeZkq20d6LdEne', 4, 1, 2022),
(53, 17, 'Pascale Clayton', '3215010807960042', '', '', '$2y$10$V02BJeEWLfrwgIsiqvsxg.8C2EmNcdiZs7bwY9A6sShvcMvUzpQbK', 4, 1, 2022),
(54, 17, 'Rajah Landry', '3215010807960043', '', '', '$2y$10$iFiKcBvErMj7i.Uzyy0pR.qLtlSEap5j.IjNMx7wqF1i1619Kw1HS', 4, 1, 2022),
(55, 17, 'Perry Mclaughlin', '3215010807960044', '', '', '$2y$10$70ZLG2El5zUWTifNuyDfsO3M29Z8V4IrO83qXz2UuSmCP5PzFrfKu', 4, 1, 2022),
(56, 18, 'Cora Reid', '3215010807960045', '', '', '$2y$10$hANZrNffJQYDb57cw29KiuUJaWH4Rq1j/RUHQM.2pWNqkNg3zy8Rq', 4, 1, 2022),
(57, 18, 'MacKenzie Knapp', '3215010807960046', '', '', '$2y$10$OyjPu8f9F7ZfAFl0Qvv2i.IlIxu8xVtbXzE3DZeXglY06KIF2xb22', 4, 1, 2022),
(58, 18, 'Malik Oliver', '3215010807960047', '', '', '$2y$10$wKxN2cwXbJJPBDiwCHakUexbFSY4riwOtl7bUpinEr8HeklNYjKyy', 4, 1, 2022),
(59, 18, 'William Barr', '3215010807960048', '', '', '$2y$10$JhLew2M29WwPrvZoc0d1Kub0BpUPSNVS9ISlSD2.Onkr738jHdyDe', 4, 1, 2022),
(60, 18, 'Lawrence Roach', '3215010807960049', '', '', '$2y$10$Vfpe/qpVo7EOJkV/aNq6Ye.aa1UZaFpFm1IGMTfM7tcuBL5eQohr.', 4, 1, 2022),
(61, 18, 'Judith Manning', '3215010807960050', '', '', '$2y$10$yZY4Ek2ERxqayY8w0IhV3etwuvwIIhd16oPPYRn.hHjgSLDru7zdu', 4, 1, 2022),
(63, 19, 'Nevada Hebert', '3215010807960052', '', '', '$2y$10$GtMiz9rYgPMZ6185u1gVB.b8cD.CSs5XHiVubJ.UOSepXMROE/Yw2', 6, 1, 2022);

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
