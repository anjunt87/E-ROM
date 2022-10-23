-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23 Okt 2022 pada 06.27
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
-- Struktur dari tabel `t_cabang`
--

CREATE TABLE IF NOT EXISTS `t_cabang` (
  `id_cabang` int(11) NOT NULL AUTO_INCREMENT,
  `korwil_id` int(11) NOT NULL,
  `n_cabang` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `telp_cabang` varchar(13) NOT NULL,
  `hp_cabang` varchar(13) NOT NULL,
  PRIMARY KEY (`id_cabang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `t_cabang`
--

INSERT INTO `t_cabang` (`id_cabang`, `korwil_id`, `n_cabang`, `alamat`, `telp_cabang`, `hp_cabang`) VALUES
(1, 1, '', '', '', ''),
(2, 9, 'Pusat Wilayah 8 Jakarta I', 'JL SENEN RAYA NO.36 Senen  Senen Jakarta Pusat  DKI Jakarta', '0213505151', ''),
(3, 9, 'CP PETAMBURAN', 'JALAN KS TUBUN RAYA NO.19 Petamburan Tanah Abang Jakarta Pusat DKI Jakarta', '02153676970', '081110688555'),
(4, 9, 'CP SALEMBA', 'JALAN SALEMBA RAYA NO 2 Kenari Senen Jakarta Pusat DKI Jakarta', '02131930168', '081110689222'),
(5, 9, 'CP PASAR SENEN', 'JALAN SENEN RAYA NO.36 Senen Senen Jakarta Pusat DKI Jakarta', '0213851880', '081119513555'),
(6, 9, 'CP PASAR BARU', 'JALAN KH SAMANHUDI NO 133 Pasar Baru Sawah Besar Jakarta Pusat DKI Jakarta', '0213447305', '081110689555'),
(7, 9, 'CP ITC CEMPAKA MAS', 'ITC CEMPAKA MAS LT. LG NO.102-103 Sumur Batu Kemayoran Jakarta Pusat DKI Jakarta', '02142800714', '081119305333'),
(8, 9, 'CP KEMAYORAN', 'JALAN SERDANG RAYA NO 8 SERDANG Serdang Kemayoran Jakarta Pusat DKI Jakarta', '0214243217', '081110691222'),
(9, 9, 'CP CEMPAKA PUTIH', 'JALAN CEMPAKA PUTIH TENGAH II BLOK B.5 Cempaka Putih Timur Cempaka Putih Jakarta Pusat DKI Jakarta', '02121479607', '081110694333'),
(10, 9, 'CP SUDIRMAN', 'JALAN BENDUNGAN HILIR RAYA NO. 86 Bendungan Hilir Tanah Abang Jakarta Pusat DKI Jakarta', '02157905744', '081110698333');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_departement`
--

CREATE TABLE IF NOT EXISTS `t_departement` (
  `id_departement` int(11) NOT NULL AUTO_INCREMENT,
  `n_departement` varchar(128) NOT NULL,
  PRIMARY KEY (`id_departement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `t_departement`
--

INSERT INTO `t_departement` (`id_departement`, `n_departement`) VALUES
(1, ''),
(2, 'Pemasaran & Pengembangan Produk'),
(3, 'Jaringan Operasi & Penjualan'),
(4, 'Keuangan & Menejemen Risiko'),
(5, 'Manajemen Risiko'),
(6, 'Teknologi Informasi & Digital'),
(7, 'Human Capital, Legal & Compliance'),
(8, 'Direktur Umum'),
(9, 'Trasnformasi Office'),
(10, 'Satuan Pengawas Intern');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_divisi`
--

CREATE TABLE IF NOT EXISTS `t_divisi` (
  `id_divisi` int(11) NOT NULL AUTO_INCREMENT,
  `departement_id` int(11) NOT NULL,
  `n_divisi` varchar(128) NOT NULL,
  PRIMARY KEY (`id_divisi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data untuk tabel `t_divisi`
--

INSERT INTO `t_divisi` (`id_divisi`, `departement_id`, `n_divisi`) VALUES
(1, 1, ''),
(2, 2, ''),
(3, 2, 'Kantor Wilayah'),
(4, 2, 'Produk Gadai'),
(5, 2, 'Produk Emas'),
(6, 2, 'Unit Usaha Syariah'),
(7, 2, 'Produk Mikro Fidusia'),
(8, 2, 'Pemasaran'),
(9, 3, ''),
(10, 3, 'Jaringan & Operasional'),
(11, 3, 'Penjualan'),
(12, 3, 'Hubungan Kelembagaan'),
(13, 3, 'Corporate Social Responsibilty'),
(14, 4, ''),
(15, 4, 'Perencanaan Strategis'),
(16, 4, 'Akuntansi'),
(17, 4, 'Tresuri'),
(18, 4, 'Menejemen Kinerja Perusahaan'),
(19, 5, ''),
(20, 5, 'Resiko Kredit & Asuransi'),
(21, 5, 'Menejemen Resiko Operasi & Korporasi'),
(22, 6, ''),
(23, 6, 'Strategi, Arsitektur & Perencanaan TI'),
(24, 6, 'Operasional & Infrastuktur TI'),
(25, 6, 'Pengembangan Aplikasi TI'),
(26, 6, 'IT Security'),
(27, 7, ''),
(28, 7, 'Operasional Human Capital'),
(29, 7, 'Strategi Human Capital'),
(30, 7, 'Pegadaian Corporate University'),
(31, 7, 'Hukum'),
(32, 7, 'Kepatuhan'),
(33, 8, ''),
(34, 8, 'Menejemen Aset Tetap'),
(35, 8, 'Pengadaan & Logistik'),
(36, 9, ''),
(37, 9, 'Innovation Center'),
(38, 9, 'PMO & Manajemen Perubahaan'),
(39, 9, 'Manajemen Data TI'),
(40, 9, 'Digital Landing & Payment'),
(41, 9, 'Budaya Kerja'),
(42, 10, ''),
(43, 10, 'Inspektorat Pengembangan'),
(44, 10, 'Inspektorat Pusat'),
(45, 10, 'Inspektorat Wilayah 1'),
(46, 10, 'Inspektorat Wilayah 2'),
(47, 10, 'Inspektorat Wilayah 3'),
(48, 10, 'Sekertariat Perusahaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_image`
--

CREATE TABLE IF NOT EXISTS `t_image` (
  `id_image` int(12) NOT NULL AUTO_INCREMENT,
  `request_id` int(12) NOT NULL,
  `n_image` varchar(255) DEFAULT NULL,
  `ket_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_image`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `t_image`
--

INSERT INTO `t_image` (`id_image`, `request_id`, `n_image`, `ket_image`) VALUES
(1, 1, 'Untitled22.png', '1-32150999998765683-2022-10-23'),
(2, 1, 'Untitled221.png', '1-32150999998765683-2022-10-23'),
(3, 1, '', '1-32150999998765683-2022-10-23'),
(4, 1, '', '1-32150999998765683-2022-10-23'),
(5, 1, '', '1-32150999998765683-2022-10-23'),
(6, 2, 'Untitled222.png', '2-32150999998765683-2022-10-23'),
(7, 2, 'Untitled223.png', '2-32150999998765683-2022-10-23'),
(8, 2, '', '2-32150999998765683-2022-10-23'),
(9, 2, '', '2-32150999998765683-2022-10-23'),
(10, 2, '', '2-32150999998765683-2022-10-23'),
(11, 3, 'Untitled224.png', '3-32150999998765683-2022-10-23'),
(12, 3, 'Untitled225.png', '3-32150999998765683-2022-10-23'),
(13, 3, '', '3-32150999998765683-2022-10-23'),
(14, 3, '', '3-32150999998765683-2022-10-23'),
(15, 3, '', '3-32150999998765683-2022-10-23'),
(16, 4, 'Untitled226.png', '4-32150999998765683-2022-10-23'),
(17, 4, 'Untitled227.png', '4-32150999998765683-2022-10-23'),
(18, 4, '', '4-32150999998765683-2022-10-23'),
(19, 4, '', '4-32150999998765683-2022-10-23'),
(20, 4, '', '4-32150999998765683-2022-10-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jabatan`
--

CREATE TABLE IF NOT EXISTS `t_jabatan` (
  `id_jabatan` int(12) NOT NULL AUTO_INCREMENT,
  `n_jabatan` varchar(128) NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `t_jabatan`
--

INSERT INTO `t_jabatan` (`id_jabatan`, `n_jabatan`) VALUES
(1, 'Admin'),
(2, 'Kepala'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_korwil`
--

CREATE TABLE IF NOT EXISTS `t_korwil` (
  `id_korwil` int(11) NOT NULL AUTO_INCREMENT,
  `n_korwil` varchar(128) NOT NULL,
  `n_korwil2` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `telp_korwil` varchar(13) NOT NULL,
  `hp_korwil` varchar(13) NOT NULL,
  PRIMARY KEY (`id_korwil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `t_korwil`
--

INSERT INTO `t_korwil` (`id_korwil`, `n_korwil`, `n_korwil2`, `alamat`, `telp_korwil`, `hp_korwil`) VALUES
(1, 'Kantor Pusat (Konvensional)', 'N/A', 'JALAN KRAMAT RAYA NO 162 Kenari Senen Jakarta Pusat DKI Jakarta', '0213155550', ''),
(2, 'Wilayah 1 Medan', 'Kantor Pusat (Konvensional)', 'JALAN PEGADAIAN NO 112 Polonia Medan Polonia Medan Sumatera Utara', '0614567247', ''),
(3, 'Wilayah 2 Pekanbaru', 'Kantor Pusat (Konvensional)', 'The Gade Tower Pekanbaru Jl. Tuanku Tambusai No. 821 Simpang Empat Pekanbaru Kota Pekanbaru Riau', '076139195', ''),
(4, 'Wilayah 3 Palembang', 'Kantor Pusat (Konvensional)', 'JL.MERDEKA NO.11 19 Ilir Bukit Kecil Palembang Sumatera Selatan', '0711361529', ''),
(5, 'Wilayah 4 Balikpapan', 'Kantor Pusat (Konvensional)', 'JALAN JENDERAL SUDIRMAN STALKUDA Klandasan Ulu Balikpapan Selatan Balikpapan Kalimantan Timur', '0542762002', ''),
(6, 'Wilayah 5 Manado', 'Kantor Pusat (Konvensional)', 'JL.DR.SOETOMO NO.199 Pinaesaan Wenang Manado Sulawesi Utara', '0431869262', ''),
(7, 'Wilayah 6 Makasar', 'Kantor Pusat (Konvensional)', 'JALAN Maricaya  Makassar Makassar  Sulawesi Selatan', '0431869262', ''),
(8, 'Wilayah 7 Denpasar', 'Kantor Pusat (Konvensional)', 'JL RAYA PUPUTAN NO 23.C Dangin Puri  Denpasar Timur Denpasar  Bali', '0361242011', ''),
(9, 'Wilayah 8 Jakarta I', 'Kantor Pusat (Konvensional)', 'JL SENEN RAYA NO.36 Senen  Senen Jakarta Pusat  DKI Jakarta', '0213505151', ''),
(10, 'Wilayah 9 Jakarta II', 'Kantor Pusat (Konvensional)', 'JALAN PASAR SENEN Senen  Senen Jakarta Pusat  DKI Jakarta', '0213450759', ''),
(11, 'Wilayah 10 Bandung', 'Kantor Pusat (Konvensional)', 'JL.PUGKUR NO 125 Balong Gede  Regol Bandung  Jawa Barat', '0224262280', ''),
(12, 'Wilayah 11 Semarang', 'Kantor Pusat (Konvensional)', 'JALAN KIMANGUN SARKORO NO. 7 Kranggan  Semarang Tengah Semarang  Jawa Tengah', '0248415896', ''),
(13, 'Wilayah 12 Surabaya', 'Kantor Pusat (Konvensional)', 'JALAN DINOYOTANGSI Keputran  Tegalsari Surabaya  Jawa Timur', '0315675294', ''),
(14, 'Wilayah 1 Syariah Medan', 'Kantor Pusat (Syariah)', 'JALAN PEGADAIAN NO 112 Polonia  Medan Polonia Medan  Sumatera Utara', '0614567247', ''),
(15, 'Wilayah 2 Syariah Pekanbaru', 'Kantor Pusat (Syariah)', 'The Gade Tower Pekanbaru Jl. Tuanku Tambusai No. 821 Simpang Empat  Pekanbaru Kota Pekanbaru  Riau', '076126065', ''),
(16, 'Wilayah 3 Syariah Palembang', 'Kantor Pusat (Syariah)', 'JL.MERDEKA NO.11 19 Ilir  Bukit Kecil Palembang  Sumatera Selatan', '0711361529', ''),
(17, 'Wilayah 4 Syariah Balikpapan', 'Kantor Pusat (Syariah)', 'JALAN JENDERAL SUDIRMAN STALKUDA Klandasan Ulu  Balikpapan Selatan Balikpapan  Kalimantan Timur', '0542762002', ''),
(18, 'Wilayah 5 Syariah Manado', 'Kantor Pusat (Syariah)', 'JL.DR.SOETOMO NO.199 Pinaesaan  Wenang Manado  Sulawesi Utara', '0411856613', ''),
(19, 'Wilayah 6 Syariah Makasar', 'Kantor Pusat (Syariah)', 'JALAN Maricaya Baru  Makassar Makassar  Sulawesi Selatan', '0431869262', ''),
(20, 'Wilayah 7 Syariah Denpasar', 'Kantor Pusat (Syariah)', 'JL RAYA PUPUTAN NO 23.C Dangin Puri  Denpasar Timur Denpasar  Bali', '0361242011', ''),
(21, 'Wilayah 8 Syariah Jakarta I', 'Kantor Pusat (Syariah)', 'JL SENEN RAYA NO.36 Senen  Senen Jakarta Pusat  DKI Jakarta', '0213505151', ''),
(22, 'Wilayah 9 Syariah Jakarta II', 'Kantor Pusat (Syariah)', 'JL. PASAR SENEN Senen  Senen Jakarta Pusat  DKI Jakarta', '0213450759', ''),
(23, 'Wilayah 10 Syariah Bandung', 'Kantor Pusat (Syariah)', 'JL.PUGKUR NO 125 Balong Gede  Regol Bandung  Jawa Barat', '0224262280', ''),
(24, 'Wilayah 12 Syariah Surabaya', 'Kantor Pusat (Syariah)', 'JALAN DINOYOTANGSI Keputran  Tegalsari Surabaya  Jawa Timur', '0315665214', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_profile`
--

CREATE TABLE IF NOT EXISTS `t_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departement_id` int(11) DEFAULT NULL,
  `divisi_id` int(11) DEFAULT NULL,
  `jabatan_id` int(11) DEFAULT NULL,
  `atasan_id` int(11) DEFAULT NULL,
  `korwil_id` int(12) DEFAULT NULL,
  `cabang_id` int(12) DEFAULT NULL,
  `cabang_unit_id` int(12) DEFAULT NULL,
  `n_lengkap` varchar(128) NOT NULL,
  `nik_profile` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `img_profile` varchar(128) NOT NULL,
  `qr_code_profile` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nik` (`nik_profile`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data untuk tabel `t_profile`
--

INSERT INTO `t_profile` (`id`, `departement_id`, `divisi_id`, `jabatan_id`, `atasan_id`, `korwil_id`, `cabang_id`, `cabang_unit_id`, `n_lengkap`, `nik_profile`, `alamat`, `no_hp`, `img_profile`, `qr_code_profile`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 'ADMINISTATOR', '3215010807960001', '65446464164', '6666233', 'Profile-111022-4fd5a0fcb8.jpg', 'b.jpg'),
(2, 1, 1, 1, 1, 1, 1, 1, 'ADMINISTATOR 2', '3215010807960002', '65446464164', '6666233', 'Profile-111022-4fd5a0fcb8.jpg', 'b.jpg'),
(67, 7, 27, 1, 1, 1, 1, 1, 'Idola Velez', '32150999998765678', '', '', '', ''),
(68, 1, 1, 1, 1, 1, 1, 1, 'Indira Knight', '32150999998765679', '', '', '', ''),
(69, 2, 3, 2, 1, 1, 1, 1, 'Quamar Ryan', '32150999998765680', '', '', '', ''),
(70, 2, 3, 2, 69, 1, 1, 1, 'Leigh Barker', '32150999998765681', '', '', '', ''),
(71, 2, 3, 3, 70, 1, 1, 1, 'Trevor Joyce', '32150999998765682', '', '', '', ''),
(72, 2, 3, 3, 70, 1, 1, 1, 'Chester Bean', '32150999998765683', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_request`
--

CREATE TABLE IF NOT EXISTS `t_request` (
  `id_request` int(11) NOT NULL AUTO_INCREMENT,
  `departement_id` int(11) NOT NULL,
  `divisi_id` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `atasan_id` int(11) NOT NULL,
  `korwil_id` int(12) DEFAULT NULL,
  `cabang_id` int(12) DEFAULT NULL,
  `cabang_unit_id` int(12) DEFAULT NULL,
  `n_pegawai` varchar(128) NOT NULL,
  `nik_request` varchar(128) NOT NULL,
  `k_healt` varchar(17) NOT NULL,
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
  `tgl_pengajuan` date NOT NULL,
  `tgl_exp` date NOT NULL,
  `a_departement` int(11) NOT NULL,
  `a_divisi` int(11) NOT NULL,
  `a_ohc` int(11) NOT NULL,
  `a_keuangan` int(11) NOT NULL,
  `t_approve` int(11) NOT NULL,
  `t_ket` varchar(255) NOT NULL,
  `w_departement` date DEFAULT NULL,
  `w_divisi` date DEFAULT NULL,
  `w_ohc` date DEFAULT NULL,
  `w_keuangan` date DEFAULT NULL,
  PRIMARY KEY (`id_request`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `t_request`
--

INSERT INTO `t_request` (`id_request`, `departement_id`, `divisi_id`, `jabatan_id`, `atasan_id`, `korwil_id`, `cabang_id`, `cabang_unit_id`, `n_pegawai`, `nik_request`, `k_healt`, `rs_dokter`, `n_pasien`, `ttl_pasien`, `ket`, `pisa`, `d_sakit`, `kronologi`, `kuitansi`, `tgl_kuitansi`, `u_berobat`, `nominal`, `t_pengajuan`, `bukti1`, `bukti2`, `tgl_pengajuan`, `tgl_exp`, `a_departement`, `a_divisi`, `a_ohc`, `a_keuangan`, `t_approve`, `t_ket`, `w_departement`, `w_divisi`, `w_ohc`, `w_keuangan`) VALUES
(1, 2, 3, 3, 70, 1, 1, 1, 'Chester Bean', '32150999998765683', 'Sed tenetur facer', 'Eum qui sit molesti', 'Molestias maxime per', '2003-09-21', 'Minima non deleniti ', 'Laboris adi', 'Molestiae sit exped', 'In eos est veniam e', 'Nihil sit rerum non ', '2022-10-23', 'Veritatis officia pr', 26, 26, '', '', '2022-10-23', '2022-12-22', 1, 1, 1, 1, 0, '', '2022-10-23', '2022-10-23', '2022-10-23', '2022-10-23'),
(2, 2, 3, 3, 70, 1, 1, 1, 'Chester Bean', '32150999998765683', 'Sed tenetur facer', 'Eum qui sit molesti', 'Molestias maxime per', '2003-09-21', 'Minima non deleniti ', 'Laboris adi', 'Molestiae sit exped', 'In eos est veniam e', 'Nihil sit rerum non ', '2022-07-22', 'Veritatis officia pr', 26, 26, '', '', '2022-10-23', '2022-12-22', 2, 2, 2, 2, 1, 'Tanggal Kuitansi telah melebihi batas waktu pengajuan, batas pengajuan hanya berlaku selama 3 bulan dari tanggal kuitansi ke tanggal pengajuan.', '2022-10-23', '2022-10-23', '2022-10-23', '2022-10-23'),
(3, 2, 3, 3, 70, 1, 1, 1, 'Chester Bean', '32150999998765683', 'Sed tenetur facer', 'Eum qui sit molesti', 'Molestias maxime per', '2003-09-21', 'Minima non deleniti ', 'Laboris adi', 'Molestiae sit exped', 'In eos est veniam e', 'Nihil sit rerum non ', '2022-10-22', 'Veritatis officia pr', 26, 26, '', '', '2022-10-23', '2022-12-22', 2, 0, 0, 0, 1, 'Request Telah Kadaluarsa', '2022-12-25', NULL, NULL, NULL),
(4, 2, 3, 3, 70, 1, 1, 1, 'Chester Bean', '32150999998765683', 'Sed tenetur facer', 'Eum qui sit molesti', 'Molestias maxime per', '2003-09-21', 'Minima non deleniti ', 'Laboris adi', 'Molestiae sit exped', 'In eos est veniam e', 'Nihil sit rerum non ', '2022-10-22', 'Veritatis officia pr', 26, 26, '', '', '2022-10-23', '2022-12-22', 1, 1, 1, 0, 0, '', '2022-10-23', '2022-10-24', '2022-10-25', '2022-10-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_unit_cabang`
--

CREATE TABLE IF NOT EXISTS `t_unit_cabang` (
  `id_unit` int(11) NOT NULL AUTO_INCREMENT,
  `cabang_id` int(11) NOT NULL,
  `korwil_id` int(11) NOT NULL,
  `n_unit` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `telp_unit` varchar(13) NOT NULL,
  `hp_unit` varchar(13) NOT NULL,
  PRIMARY KEY (`id_unit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `t_unit_cabang`
--

INSERT INTO `t_unit_cabang` (`id_unit`, `cabang_id`, `korwil_id`, `n_unit`, `alamat`, `telp_unit`, `hp_unit`) VALUES
(1, 1, 1, '', '', '', ''),
(2, 1, 9, 'Pusat Wilayah 8 Jakarta I', 'JALAN PASAR SENEN Senen  Senen Jakarta Pusat DKI Jakarta', '0213505151', '0'),
(3, 2, 9, 'UPC GANG LONTAR', 'JALAN LONTAR BAWAH NO.179 Kebon Melati  Tanah Abang Jakarta Pusat  DKI Jakarta', '02131907233', '0'),
(4, 2, 9, 'UPC BIAK', 'PERTOKOAN METRO BIAK JL.BIAK NO.5J Cideng  Gambir Jakarta Pusat  DKI Jakarta', '0216327231', '0'),
(5, 2, 9, 'UPC BLOK B TANAH ABANG', 'BLOK B TANAH ABANG LT.5  ZONA 2 Kebon Melati  Tanah Abang Jakarta Pusat  DKI Jakarta', '02123574211', '0'),
(6, 3, 9, 'UPC THAMRIN', 'JL. H AGUS SALIM NO 60A Gondangdia  Menteng Jakarta Pusat  DKI Jakarta', '0213144938', '0'),
(7, 3, 9, 'UPC CIKINI', 'CIKINI GOLD CENTRE LT.UG NO.AKS076 Cikini  Menteng Jakarta Pusat  DKI Jakarta', '02129578277', '0'),
(8, 3, 9, 'UPC TAMBAK', 'JALAN TAMBAK NO.2 INKOPOL Pegangsaan  Menteng Jakarta Pusat  DKI Jakarta', '0213100699', '0'),
(9, 3, 9, 'UPC PASAR GENJING', 'JALAN RAWAMANGUN NO 41 Rawasari  Cempaka Putih Jakarta Pusat  DKI Jakarta', '0214250245', '0'),
(10, 3, 9, 'UPC PASAR JANGKRIK II', 'JALAN KELAPA SAWIT RAYA 30 Kayu Manis  Matraman Jakarta Timur  DKI Jakarta', '02147483647', '0'),
(11, 3, 9, 'UPC MATRAMAN', 'JALAN MATRAMAN RAYA NO 64 Kebon Manggis  Matraman Jakarta Timur  DKI Jakarta', '02147483647', '0'),
(12, 3, 9, 'UPC PASAR JOHAR', 'JALAN PERCETAKAN NEGARA II / 14 Johar Baru  Johar Baru Jakarta Pusat  DKI Jakarta', '0214205816', '0'),
(13, 3, 9, 'UPC SABANG', 'JALAN H.AGUS SALIM NO 42 Kebon Sirih  Menteng Jakarta Pusat  DKI Jakarta', '02131923566', '0'),
(14, 3, 9, 'UPC UTAN KAYU', 'JALAN UTAN KAYU RAYA NO 76 Utan Kayu Selatan  Matraman Jakarta Timur  DKI Jakarta', '02122856143', '0'),
(15, 3, 9, 'UPC SABANG', 'JALAN H.AGUS SALIM NO 42 Kebon Sirih  Menteng Jakarta Pusat  DKI Jakarta', '02131923566', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_users`
--

CREATE TABLE IF NOT EXISTS `t_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atasan_id` int(11) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data untuk tabel `t_users`
--

INSERT INTO `t_users` (`id`, `atasan_id`, `name`, `nik`, `image`, `qr_code`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 1, 'ADMINISTATOR', '3215010807960001', '', '', '$2y$10$4wV39cLYY53wJ3iqutYBN.aIENowJUxxIPUi4hGTBtHrTrxvilnnC', 1, 1, 2022),
(73, 1, 'Idola Velez', '32150999998765678', '', '', '$2y$10$71E4SybT2OV7iAfNYlRameWu2zCEmNgo3s9vSDbgDq022AYXqJ6M6', 2, 1, 2022),
(74, 1, 'Indira Knight', '32150999998765679', '', '', '$2y$10$ttb7SmOOEc.tlY9vHPrwle91sfsBjWVfGxfVIgQQNufUKlxkKXWT2', 5, 1, 2022),
(75, 1, 'Quamar Ryan', '32150999998765680', '', '', '$2y$10$pBTnO0g6Ir6CvnR0TkricuGsR29J2qWvU3dH2SyDJbRGMyFERkvAO', 3, 1, 2022),
(77, 69, 'Leigh Barker', '32150999998765681', '', '', '$2y$10$GNGM80PVwu0u1wAwiSJCA.dI05Swtx8hw3.DNNoVhwq4.wOp/sfEi', 4, 1, 2022),
(78, 70, 'Trevor Joyce', '32150999998765682', '', '', '$2y$10$ZGZb3Kj1rMJZWfUDeBFpFOhPi0BptxaZ3GVYVe8AKdYr490mKGM06', 6, 1, 2022),
(79, 70, 'Chester Bean', '32150999998765683', '', '', '$2y$10$LdroZaSBd/RtfnisMM5mAeiPBK6gt4zmt2PsgJPRnFUL5JNw3E71y', 6, 1, 2022);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_acces_menu`
--

CREATE TABLE IF NOT EXISTS `user_acces_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

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
(21, 6, 8),
(22, 1, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE IF NOT EXISTS `user_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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
(11, 'Position Setting'),
(12, 'Area Setting');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'Dashboard', 'admin_OHC', 'fas fa-fw fa-tachometer-alt', 1),
(3, 3, 'Dashboard', 'departement', 'fas fa-fw fa-clipboard-list', 1),
(4, 4, 'Dashboard', 'divisi', 'fas fa-fw fa-clipboard-list', 1),
(5, 5, 'Dashboard', 'keuangan', 'fas fa-fw fa-clipboard-list', 1),
(6, 6, 'Dashboard', 'users', 'fas fa-fw fa-clipboard-list', 1),
(7, 7, 'Request Users', 'request/requestUsers', 'fas fa-fw fa-clipboard-list', 1),
(8, 7, 'Request History', 'request/historyRequestApp', 'fas fa-fw fa-book', 1),
(9, 8, 'Forms Request', 'request/Tambah', 'fas fa-fw fa-clipboard-list', 1),
(10, 8, 'History Request', 'request/usersRequestHistory', 'fas fa-fw fa-book', 1),
(11, 9, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(12, 9, 'SubMenu Management', 'menu/subMenuManagement', 'fas fa-fw fa-folder-open', 1),
(13, 10, 'Users Role', 'admin/usersRole', 'fas fa-fw fa-user-tie', 1),
(14, 10, 'Users Management', 'admin/usersManagement', 'fas fa-fw fa-user-tie', 1),
(15, 11, 'Departement Setting', 'departement/positionIndex', 'fas fa-fw fa-user', 1),
(16, 11, 'Divisi Setting', 'divisi/positionIndex', 'fas fa-fw fa-user', 1),
(17, 11, 'Jabatan Setting', 'jabatan/positionIndex', 'fas fa-fw fa-user', 1),
(18, 12, 'Korwil Setting', 'korwil', 'fa fa-map-marker', 1),
(19, 12, 'Cabang Setting', 'cabang', 'fa fa-map-marker', 1),
(20, 12, 'Unit Cabang Setting', 'unit', 'fa fa-map-marker', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
