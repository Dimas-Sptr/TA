-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2021 pada 19.26
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_karir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pass_adm`
--

CREATE TABLE `pass_adm` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pass_adm`
--

INSERT INTO `pass_adm` (`id`, `kode`, `password`, `nama`, `email`, `level`) VALUES
(2, '123456', 'e10adc3949ba59abbe56e057f20f883e', 'testing CNP', '', 'admin cnp'),
(3, '17074240', '867171113d239ecf3e6cfcb8e36d8604', 'fahrul rozi', 'fahrul123@gmail.com', 'mahasiswa'),
(4, '18511002', '1137790edeb3fe968fbd258558eae934', 'ADINDA IRAWAN', 'adinda@gmail.com', 'mahasiswa'),
(5, '1234567', 'fcea920f7412b5da7be0cf42b8c93759', 'perusahaan test', 'perusahaan444@gmail.com', 'perusahaan'),
(9, '18412016', 'bc317e9739dc541d9586e4661a2a1855', 'DIMAS AJI SAPUTRA', 'dimasaji427@gmail.com', 'mahasiswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cnp`
--

CREATE TABLE `tb_cnp` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_cnp`
--

INSERT INTO `tb_cnp` (`ID`, `username`, `password`, `nama`, `email`, `level`) VALUES
(1, '123456', 'e10adc3949ba59abbe56e057f20f883e', 'testing2', 'test@gmail.com', 'admin cnp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_cvmahasiswa`
--

CREATE TABLE `tb_cvmahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `nama_mahasiswa` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `status_mahasiswa` varchar(20) DEFAULT NULL,
  `perusahaan` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `tahun_angkatan` varchar(20) DEFAULT NULL,
  `ip1` varchar(10) DEFAULT NULL,
  `ip2` varchar(10) DEFAULT NULL,
  `ip3` varchar(10) DEFAULT NULL,
  `ip4` varchar(10) DEFAULT NULL,
  `total` varchar(10) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_cvmahasiswa`
--

INSERT INTO `tb_cvmahasiswa` (`id`, `nim`, `nama_mahasiswa`, `no_hp`, `jurusan`, `status_mahasiswa`, `perusahaan`, `jabatan`, `tahun_angkatan`, `ip1`, `ip2`, `ip3`, `ip4`, `total`, `gambar`) VALUES
(8, '34920', 'testing', '08262626', 'TK', '0', '', '', '2018', NULL, NULL, NULL, NULL, NULL, '534119964_cv Dimas.pdf'),
(13, '1988776', 'ridwan', '0877777', 'AB', '0', '', '', '2018', NULL, NULL, NULL, NULL, NULL, '60716_cv ku.pdf'),
(15, '18412016', 'Dimas Aji Saputra', '0892732', 'TK', '0', '', '', '2018', '3.6', '3.5', '3.4', '3.4', '3.475', '31363-cv Dimas.pdf'),
(21, '11111111', 'test mhs', '', '-', '-', '', '', '', '', '', '', '', '0', '71262-cv Dimas.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lowonganmagang`
--

CREATE TABLE `tb_lowonganmagang` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `posisi` varchar(100) DEFAULT NULL,
  `persyaratan` varchar(255) DEFAULT NULL,
  `tgl_berakhir` varchar(30) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lowonganmagang`
--

INSERT INTO `tb_lowonganmagang` (`id`, `nama_perusahaan`, `posisi`, `persyaratan`, `tgl_berakhir`, `alamat`, `status`) VALUES
(1, 'Pohon Tumbang', 'buat kopi', '<p>apa aja laa</p>\r\n\r\n<p>expert dalam perkopian</p>\r\n', '2021-07-04', 'jl. merak jingga', 1),
(2, 'PT suka suka', 'gaya gaya', '<p>gaya gaya</p>', '2021-07-19', 'disini aja', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` varchar(20) DEFAULT NULL,
  `jenkel` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `angkatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `nim`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `status`, `angkatan`) VALUES
(2, '18511002', 'ADINDA IRAWAN', 'MEDAN ', '2000-07-20', '2', 'Aktif', '2018'),
(3, '18511003', 'AFRIANDA BOANG MANALU', 'MEDAN ', '2000-04-10', '1', 'Aktif', '2018'),
(4, '18511005', 'ALDA SELPIYA RAHMA DANI', 'TANJUNG MORAWA', '2000-12-24', '2', 'Aktif', '2018'),
(5, '18511006', 'AMELLI AKMAL RISKY', 'MEDAN', '2000-10-04', '2', 'Aktif', '2018'),
(6, '18511007', 'ANDIKA RIZKI PRATAMA', 'PEMATANG SIANTAR', '2001-01-22', '1', 'Aktif', '2018'),
(7, '18511008', 'ANDINI THERESIA BR. SINURAYA', 'PEMATANGSIANTAR ', '2000-03-29', '2', 'Aktif', '2018'),
(8, '18511009', 'ANGGREANI AYU LESMANA', 'PANCUR BATU ', '1999-10-23', '2', 'Aktif', '2018'),
(9, '18511010', 'ANGGRENI INDAH MEGAWATI', 'MEDAN ', '1999-06-30', '2', 'Aktif', '2018'),
(10, '18511011', 'ARIANSYAH PUTRA HASIBUAN', 'SIDIKALANG ', '2000-02-02', '1', 'Aktif', '2018'),
(11, '18511013', 'AYU ANDIRA', 'MEDAN ', '1998-09-25', '2', 'Aktif', '2018'),
(12, '18511014', 'AYU SINTIYA', 'BELAWAN', '2001-01-24', '2', 'Aktif', '2018'),
(13, '18511015', 'AZURA TAMIA AMIMI', 'AEK NABARA ', '2000-07-01', '2', 'Aktif', '2018'),
(14, '18511020', 'DAYANA NOVIA RIZKI NST', 'MEDAN ', '2000-11-05', '2', 'Aktif', '2018'),
(15, '18511021', 'DEA CERIA NOVIANI PANE', 'TANJUNG MORAWA', '1999-11-02', '2', 'Aktif', '2018'),
(16, '18511023', 'DHEA YOLLANDA PUTRI', 'MEDAN', '1999-10-30', '2', 'Aktif', '2018'),
(17, '18511024', 'DIMAS AJI PAMUNGKAS', 'MEDAN', '2000-03-15', '1', 'Aktif', '2018'),
(18, '18511025', 'DIMAS RIYANSYAH', 'TITIPAPAN', '2000-10-13', '1', 'Aktif', '2018'),
(19, '18511026', 'DINI AYUNI LESTARI', 'TANJUNG MULIA', '1900-01-00', '2', 'Aktif', '2018'),
(20, '18511027', 'DYLAN BIYOGANTARA', 'MEDAN', '2000-10-13', '1', 'Aktif', '2018'),
(21, '18511028', 'EKA PURNAMA SARI', 'MEDAN ', '1998-04-12', '2', 'Aktif', '2018'),
(22, '18511029', 'ELDINA CLARITTA HUTAGALUNG', 'MEDAN', '2000-06-10', '2', 'Aktif', '2018'),
(23, '18411068', 'ABDULLAH SAFI\'I', 'SUBULUSSALAM', '2000-07-15', '1', 'Aktif', '2018'),
(24, '18411066', 'YOGI FAHMI NORMAL HARAHAP', 'SIBOLGA ', '2000-05-24', '1', 'Aktif', '2018'),
(25, '18411067', 'ABDUL FARHAN BATUBARA', 'MEDAN', '2000-07-20', '1', 'Aktif', '2018'),
(26, '18411064', 'WIWI IRAWATI', 'lawe tua', '1999-12-20', '2', 'Aktif', '2018'),
(27, '18412065', 'YOAN TANAMA PUTRA', 'PANGKALAN BERANDAN', '1998-12-07', '1', 'Aktif', '2018'),
(28, '18411062', 'TEUKU GERYANSYAH', 'SIGLI ', '1999-09-09', '1', 'Aktif', '2018'),
(29, '18411063', 'TRI ISWAN', 'ACEH TIMUR', '1999-02-05', '1', 'Aktif', '2018'),
(30, '18411061', 'SUKRI ISMANTO', 'BATUMBULAN ASLI ', '1997-11-01', '1', 'Aktif', '2018'),
(31, '18412059', 'SRI WAHYUNI', 'PANGKALAN BATU', '1999-10-02', '2', 'Aktif', '2018'),
(32, '18412060', 'SUKRI HAMDANI', 'HALABAN', '2000-11-04', '1', 'Aktif', '2018'),
(33, '18411057', 'RIZKY SYAHRAINI', 'PEMATANG RAYA ', '2000-03-26', '2', 'Aktif', '2018'),
(34, '18411058', 'SITI SARAH', 'TEBING TINGGI', '2000-01-22', '2', 'Aktif', '2018'),
(35, '18411055', 'RIZKI SYAPUTRA HARAHAP', 'DUMAI ', '2000-04-21', '1', 'Aktif', '2018'),
(36, '18411056', 'RIZKY IBRAHIMTA SEBAYANG', 'MEDAN ', '2000-08-04', '1', 'Aktif', '2018'),
(37, '18411052', 'RIFKI IHWAN PRAMUDIAN', 'BANDAR PAMAH', '2000-10-17', '1', 'Aktif', '2018'),
(38, '18411053', 'RIFQI WAN MUGER.S', 'TAKENGON', '1999-02-07', '1', 'Aktif', '2018'),
(39, '18411054', 'RIKO ERIANTO HASUGIAN', 'PARTIBI TEMBE ', '1996-06-26', '1', 'Aktif', '2018'),
(40, '18411051', 'RIDWAN SAPUTRA PARINDURI', 'SUKA MAJU ', '2000-09-26', '1', 'Aktif', '2018'),
(41, '18412048', 'REYNALDI', 'MEDAN', '2000-04-22', '1', 'Aktif', '2018'),
(42, '18411049', 'RIDHO MELSKY', 'MEDAN', '2000-09-27', '1', 'Aktif', '2018'),
(43, '18412050', 'RIDWAN PRANAJAYA', 'SAWIT SEBERANG', '2000-07-24', '1', 'Aktif', '2018'),
(44, '18411047', 'REKA HANS AMIRUL ', 'MEDAN', '1999-03-25', '1', 'Aktif', '2018'),
(45, '18411045', 'PATHAN ABDILLAH', 'PULOKEMIN', '2000-11-22', '1', 'Aktif', '2018'),
(46, '18412046', 'POPY INDRIYANI', 'RINTIS', '2000-08-30', '2', 'Aktif', '2018'),
(47, '18412044', 'OSKAR SINAGA', 'DOLOKSANGGUL', '2000-05-19', '1', 'Aktif', '2018'),
(48, '18411042', 'NOVIANDRY AHMAD NASUTION', 'MEDAN ', '1999-11-27', '1', 'Aktif', '2018'),
(49, '18411043', 'NURUL HIDAYATI HASIBUAN', 'TUALANG', '2000-08-25', '2', 'Aktif', '2018'),
(50, '18412041', 'NOVI ANDRIANI', 'SUKA JADI', '2000-03-03', '2', 'Aktif', '2018'),
(51, '18412040', 'MUHAMMAD YASIRLI DZIKRO', 'HAMPARAN PERAK', '2000-07-26', '1', 'Aktif', '2018'),
(52, '18411039', 'MUHAMMAD RIDHO AKBAR', 'MEDAN ', '2000-06-24', '1', 'Aktif', '2018'),
(53, '18411038', 'MUHAMMAD AZRI MAULANA', 'BANDA ACEH', '1999-10-02', '1', 'Aktif', '2018'),
(54, '18411036', 'MHD. TRI RIZQO WIBOWO', 'MEDAN', '2000-10-13', '1', 'Aktif', '2018'),
(55, '18412037', 'MISNAN', 'BALING KARANG', '1999-11-20', '1', 'Aktif', '2018'),
(56, '18411035', 'MEGA OKTAVIA', 'TEGAL ARUM ', '2000-10-19', '2', 'Aktif', '2018'),
(57, '18411034', 'MARGARETTA MELIA S. SEMBIRING', 'BEKASI ', '2000-03-17', '2', 'Aktif', '2018'),
(58, '18411033', 'M. ALDY TORONG', 'MEDAN ', '2000-10-09', '1', 'Aktif', '2018'),
(59, '18411032', 'KIKI PRAYOGI', 'PEMATANG SIANTAR ', '2000-10-19', '1', 'Aktif', '2018'),
(60, '18411031', 'KHAIRIL ANWAR BUTAR-BUTAR', 'KISARAN ', '2000-10-08', '1', 'Aktif', '2018'),
(61, '18411030', 'JUAN ARISTA', 'MEDAN ', '2001-06-26', '1', 'Aktif', '2018'),
(62, '18411029', 'JOAN CAFITRA', 'MEDAN ', '2001-06-26', '1', 'Aktif', '2018'),
(63, '18411027', 'HAIRYUNA PAUSIAH LUBIS ', 'TEMBUNG', '2000-08-02', '2', 'Aktif', '2018'),
(64, '18412028', 'HANIFAH ULYA', 'MEDAN', '2000-10-23', '2', 'Aktif', '2018'),
(65, '18411026', 'GUSTI YOANDRI', 'PAYA LOMBANG ', '2000-07-21', '1', 'Aktif', '2018'),
(66, '18412025', 'GUNTUR ARMANDA', 'KARANG GADING', '2000-06-23', '1', 'Aktif', '2018'),
(67, '18411024', 'FERRY SYAHPUTRA SILITONGA', 'KETAPANG ', '2000-08-06', '1', 'Aktif', '2018'),
(68, '18411023', 'FEBRI AJI SETIAWAN', 'KISARAN ', '2001-02-23', '1', 'Aktif', '2018'),
(69, '18411022', 'FARIS HERMAWAN SITORUS', 'MEDAN', '1999-07-19', '1', 'Aktif', '2018'),
(70, '18411019', 'DWI NUR AMINI', 'SUGARANG BAYU', '2000-04-20', '2', 'Aktif', '2018'),
(71, '18411020', 'EKO DWI PUTRA IBNU MUHAIDI', 'SAMPIT', '1999-06-24', '1', 'Aktif', '2018'),
(72, '18411021', 'ERIZA HARDIANSYAH', 'MEDAN ', '2001-05-26', '1', 'Aktif', '2018'),
(73, '18412018', 'DINNA DELIMA', 'PANGAKALAN SUSU', '2000-12-25', '2', 'Aktif', '2018'),
(74, '18412016', 'DIMAS AJI SAPUTRA', 'KP BANTEN', '2000-04-01', '1', 'Aktif', '2018'),
(75, '18412017', 'DIMAS SETIAWAN', 'SAMITRISNO', '2000-01-13', '1', 'Aktif', '2018'),
(76, '18411015', 'DEDI ANDY HASIBUAN', 'MEDAN ', '2000-05-11', '1', 'Aktif', '2018'),
(77, '18411013', 'BRIAN FRIDEL JUBET SEMBIRING', 'MEDAN ', '2002-11-08', '1', 'Aktif', '2018'),
(78, '18412014', 'CHIKA ANITIA AGUSTINA', 'ARA CONDONG', '2000-08-15', '2', 'Aktif', '2018'),
(79, '18411012', 'BANI UMAIYAH HARAHAP', 'MARIAH BANDAR ', '2000-06-09', '2', 'Aktif', '2018'),
(80, '18411009', 'ANWAR BUDIANTO MARPAUNG', 'BI NJAI ', '2000-05-03', '1', 'Aktif', '2018'),
(81, '18411010', 'ARIF AKBAR LUBIS ', 'PADANG SIDIMPUAN', '1997-10-14', '1', 'Aktif', '2018'),
(82, '18412011', 'ARISTO WIDODO', 'SIDOARJO', '1998-03-24', '1', 'Aktif', '2018'),
(83, '18411008', 'ANJAS EFERDI T', 'PEKANBARU ', '1999-05-21', '1', 'Aktif', '2018'),
(84, '18411006', 'ANDY KURNIAWAN SEBAYANG', 'medan', '9996-04-20', '1', 'Aktif', '2018'),
(85, '18411007', 'ANGGA TIKSA PINEM', 'PASIR GALA', '1999-09-10', '1', 'Aktif', '2018'),
(86, '18411005', 'ALEXANDER CHRISTIAN TAMPUBOLON', 'SIMPANG PENARA ', '1997-11-25', '1', 'Aktif', '2018'),
(87, '18411004', 'ALDO JEREMIA SIAGIAN', 'MEDAN ', '2000-02-26', '1', 'Aktif', '2018'),
(88, '18411003', 'ADRIAN IRIANTO WIJAYA', 'JAKARTA', '2000-03-29', '1', 'Aktif', '2018'),
(89, '18411001', 'ADITIYA RAMADHANA', 'TANJUNGBALAI ', '2000-07-05', '1', 'Aktif', '2018'),
(90, '18412002', 'ADRIAN ANANDA', 'HAMPARAN PERAK', '2001-03-16', '1', 'Aktif', '2018'),
(91, '18611026', 'VILLA DELFIA BR GINTING', 'BINTANG MERIAH ', '2000-03-27', '1', 'Aktif', '2018'),
(92, '18611024', 'TUNGGUL PRANSISKO MANURUNG', 'RAWANG PSR 5', '2000-10-16', '1', 'Aktif', '2018'),
(93, '18611025', 'UTAMI RAMADHANIA', 'P. BERANDAN ', '2000-12-25', '2', 'Aktif', '2018'),
(94, '18611023', 'SUNIL SANGKER', 'MEDAN', '2000-04-05', '1', 'Aktif', '2018'),
(95, '18611022', 'SITILIS KHADIJAH', 'SEI SEMAYANG ', '2000-01-19', '2', 'Aktif', '2018'),
(96, '18611020', 'RISQAMAYSURI PARDEDE', 'HAJORAN ', '2000-06-30', '2', 'Aktif', '2018'),
(97, '18611021', 'SARI NURWIDIA ASTUTI', 'SUMEDANG ', '1999-10-11', '2', 'Aktif', '2018'),
(98, '18611019', 'RISMA ANJELITA MARBUN', 'MEDAN ', '2000-04-30', '2', 'Aktif', '2018'),
(99, '18611018', 'RIKA PURNAMA SARI', 'KP. SUKOREJO ', '1998-11-20', '2', 'Aktif', '2018'),
(100, '18611017', 'RAMA SYAHPUTRA', 'MEDAN ', '1999-12-12', '1', 'Aktif', '2018'),
(101, '18611016', 'NURUL ARMAYA BR. HASIBUAN', 'KARANG ANYAR ', '1995-01-20', '2', 'Aktif', '2018'),
(102, '18511033', 'EVALINA TAMPUBOLON', 'SUKASARI', '2001-01-13', '2', 'Aktif', '2018'),
(103, '18511034', 'FADILAH YASMIN NUR UMMI SIDDIK', 'MEDAN', '1996-07-04', '2', 'Aktif', '2018'),
(104, '18511035', 'FAHRUL ARY SANDY', 'MEDAN', '2000-03-26', '1', 'Aktif', '2018'),
(105, '18511036', 'FATIMAH HANNUM', 'MEDAN ', '1999-03-09', '2', 'Aktif', '2018'),
(106, '18511037', 'FEBI MONICA BR SINUKABAN', 'DELITUA', '2001-01-07', '2', 'Aktif', '2018'),
(107, '18511038', 'FEBRI VIOLITA PURBA', 'HUTARAJA', '2000-02-07', '2', 'Aktif', '2018'),
(108, '18511039', 'HALIMAH TUSAKDIAH', 'KUTA CANE', '2000-09-06', '2', 'Aktif', '2018'),
(109, '18511040', 'HANA PRATIWI', 'MEDAN', '1999-02-09', '2', 'Aktif', '2018'),
(110, '18511043', 'IBNU MARIFAT LADUNI', 'MEDAN', '2000-11-06', '1', 'Aktif', '2018'),
(111, '18511044', 'ILHAM EFENDI', 'AEK KORSIK ', '2000-11-01', '1', 'Aktif', '2018'),
(112, '18511046', 'IVAN NATANAEL KARO SEKALI', 'HUTARIMBARU ', '1999-12-23', '1', 'Aktif', '2018'),
(113, '18511047', 'JURAIDAH PURBA', 'SUKAMAJU', '1999-03-25', '2', 'Aktif', '2018'),
(114, '18511048', 'KELVIN TANOTO', 'HUTARAJA', '2000-01-17', '1', 'Aktif', '2018'),
(115, '18511049', 'LAKSAMANA PRIMA', 'PEMATANG SIANTAR ', '2000-04-29', '1', 'Aktif', '2018'),
(116, '18511051', 'LESDIANA MARGARETTA BR SINAGA', 'KABANJAHE', '2000-03-21', '2', 'Aktif', '2018'),
(117, '18511052', 'LISBON RUBEN PARNINGOTAN', 'MEDAN', '2000-07-09', '1', 'Aktif', '2018'),
(118, '18511053', 'LISNAWATI', 'MEDAN', '2000-05-15', '2', 'Aktif', '2018'),
(119, '18511056', 'MENDA JUNIATI BR GINTING', 'BINTANG MERIAH', '2000-06-18', '2', 'Aktif', '2018'),
(120, '18511057', 'MEYLISA BR SURBAKTI', 'PANCUR BATU', '1999-05-01', '2', 'Aktif', '2018'),
(121, '18511058', 'MHD. RIFANDI', 'SUKA DAMAI', '1999-04-27', '1', 'Aktif', '2018'),
(122, '18511059', 'MIRANDA PUTRI', 'MEDAN ', '2000-09-30', '2', 'Aktif', '2018'),
(123, '18511060', 'MUHAMMAD AZHRIL AZIZ', 'SUKA MAJU', '2000-03-24', '1', 'Aktif', '2018'),
(124, '18511061', 'MUHAMMAD EQI WINDANI', 'MEDAN ', '1999-11-11', '1', 'Aktif', '2018'),
(125, '18511062', 'MUHAMMAD HERU PRAYUDA', 'MEDAN ', '2000-07-11', '1', 'Aktif', '2018'),
(126, '18511063', 'MUHAMMAD IRFANSYAH', 'PERDAMEAN SIGAMBAL', '2000-01-31', '1', 'Aktif', '2018'),
(127, '18511064', 'MUHAMMAD RIZKI SYAHPUTRA', 'KABANJAHE ', '2000-07-26', '1', 'Aktif', '2018'),
(128, '18511065', 'MUHAMMAD SAFI\'I TARIGAN', 'SELAYANG PULO', '1993-01-11', '1', 'Aktif', '2018'),
(129, '18511066', 'MUTYA FATMA', 'BEKULAP ', '2000-11-22', '2', 'Aktif', '2018'),
(130, '18511067', 'NAADA FADHILLA', 'MEDAN', '1999-06-29', '2', 'Aktif', '2018'),
(131, '18511068', 'NANDA ANGGITA', 'MUARA', '2000-02-06', '2', 'Aktif', '2018'),
(132, '18511070', 'NAYNA BALQIS SALSABILA', 'BINTANG MERIAH ', '1999-11-02', '2', 'Aktif', '2018'),
(133, '18511071', 'NOVA PRATIWI SIREGAR', 'MAYANG', '1999-11-23', '2', 'Aktif', '2018'),
(134, '18511073', 'NOVITA DIA PRASELLA', 'NEGERILAMA', '2000-11-06', '2', 'Aktif', '2018'),
(135, '18511074', 'NUR SUCI WULANDARI', 'SUNGAI PAUH LANGSA', '1998-12-23', '2', 'Aktif', '2018'),
(136, '18511075', 'NURMALA ANGGRAINI', 'DALU SEPULUH-B', '2000-07-24', '2', 'Aktif', '2018'),
(137, '18511076', 'NURUL HASANAH SINAMBELA', 'MEDAN ', '2000-03-13', '2', 'Aktif', '2018'),
(138, '18511077', 'NURVADILA HANIM', 'TANDEM HILIR', '2000-11-07', '2', 'Aktif', '2018'),
(139, '18511079', 'NYELA SANDI', 'MEDAN ', '2000-08-01', '2', 'Aktif', '2018'),
(140, '18511081', 'PERAWATI HARAHAP', 'RANTAU', '1999-12-19', '2', 'Aktif', '2018'),
(141, '18511082', 'PUTRI HANDAYANI', 'SELAYANG PULO', '2000-09-25', '2', 'Aktif', '2018'),
(142, '18511083', 'REGINA ANANDA ERNIZ TANJUNG', 'BEKULAP ', '1999-11-15', '2', 'Aktif', '2018'),
(143, '18511084', 'RENNI BR MANULLANG', 'RANTAU ', '1999-03-21', '2', 'Aktif', '2018'),
(144, '18511085', 'RETNO WULANDARI', 'TG.MORAWA', '2000-03-17', '2', 'Aktif', '2018'),
(145, '18511086', 'REZKY WITRIANTI', 'MEDAN', '2000-09-26', '2', 'Aktif', '2018'),
(146, '18511087', 'RIZKA FADHILLAH HASIBUAN', 'JAKARTA', '1999-10-03', '2', 'Aktif', '2018'),
(147, '18511088', 'RIZKY AULIA', 'MAYANG ', '2000-04-10', '2', 'Aktif', '2018'),
(148, '18511089', 'ROMA ULI TAMPUBOLON', 'MEDAN', '1995-03-12', '2', 'Aktif', '2018'),
(149, '18511090', 'RONI SETIAWAN SIREGAR', 'SUNGGAL KANAN ', '2000-10-30', '1', 'Aktif', '2018'),
(150, '18511091', 'SAGITA TRIANDANI SIMANJUNTAK', 'MERBAU SELATAN', '1999-07-05', '2', 'Aktif', '2018'),
(151, '18511092', 'SARIHOT NAINGGOLAN', 'SENDAYAN II', '1997-12-14', '1', 'Aktif', '2018'),
(152, '18511093', 'SHAWMA RAMADHAN', 'DENAI LAMA ', '2000-01-01', '1', 'Aktif', '2018'),
(153, '18511096', 'SIGIT ARYA', 'KUALA BERINGIN', '2000-11-21', '1', 'Aktif', '2018'),
(154, '18511097', 'SINDI NUR ELIA', 'MEDAN', '1998-12-15', '2', 'Aktif', '2018'),
(155, '18511098', 'SINDY TASYA ANDINI', 'MEDAN ', '2000-07-30', '2', 'Aktif', '2018'),
(156, '18511101', 'SONDANG ELFRIDA SIMANGUNSONG', 'DELITUA', '1997-11-07', '2', 'Aktif', '2018'),
(157, '18511102', 'SRI DWI TANTRI', 'KOTA GALUH', '2000-09-12', '2', 'Aktif', '2018'),
(158, '18511105', 'SURYA NINGSIH ROSSARI', 'RIMO', '2000-08-07', '2', 'Aktif', '2018'),
(159, '18511106', 'TAUFIK HIDAYAT', 'RANTAU PRAPAT ', '1999-10-25', '1', 'Aktif', '2018'),
(160, '18511107', 'TIARA KINANTI SIREGAR', 'SIDODADI RAMUNIA', '2000-10-31', '2', 'Aktif', '2018'),
(161, '18511108', 'TIARA NOVITA SARI PANJAITAN', 'NAMURAMBE', '1999-10-14', '2', 'Aktif', '2018'),
(162, '18511109', 'TIKA RAHMADANI SIREGAR', 'PASAR BINANGA', '2000-05-06', '2', 'Aktif', '2018'),
(163, '18511110', 'TIKA REVIANTI', 'MEDAN ', '1999-10-10', '2', 'Aktif', '2018'),
(164, '18511111', 'TINEKE LEATITIA PURBA', 'MEDAN ', '1999-05-15', '2', 'Aktif', '2018'),
(165, '18511112', 'TITA KARMELIA TAMBUNAN', 'LOBUTOLONG', '2000-10-02', '2', 'Aktif', '2018'),
(166, '18511113', 'TRI INDRIYANI', 'TEBING TINGGI', '2000-11-01', '2', 'Aktif', '2018'),
(167, '18511114', 'VERAWATI R. GINTING', 'SIBOLGA', '2000-05-30', '2', 'Aktif', '2018'),
(168, '18511115', 'WIRA DWIKI SYAHPUTRA', 'SENDAYAN', '1999-05-21', '1', 'Aktif', '2018'),
(169, '18511116', 'YATI SURTINA ARITONANG', 'Kuala Simpang', '2000-02-13', '2', 'Aktif', '2018'),
(170, '18511117', 'YOLANDA MELYA NINGSIH DAMANIK', 'Bukit Bagasan', '2001-03-09', '2', 'Aktif', '2018'),
(171, '18511119', 'YULI SAFITRI', 'BELAWAN', '2000-10-18', '2', 'Aktif', '2018'),
(172, '18511124', 'Mhd. ZA', 'MEDAN ', '1999-09-08', '1', 'Aktif', '2018'),
(173, '18511125', 'KIKI PRATIWI TASLIM', 'MEDAN ', '1999-10-29', '2', 'Aktif', '2018'),
(174, '18512004', 'AFRIDIANI', 'TANDEM HILIR', '1999-04-10', '2', 'Aktif', '2018'),
(175, '18512012', 'AULIA FITRI RAMADHANI', 'PERLANAAN', '2000-12-26', '2', 'Drop Out', '2018'),
(176, '18512016', 'BAMBANG EKO SAPUTRA', 'SAMPALI', '2000-06-11', '1', 'Drop Out', '2018'),
(177, '18512017', 'BAYU DWI SYAHPUTRA', 'DELITUA', '2000-10-11', '1', 'Aktif', '2018'),
(178, '18512018', 'CHAIRANI DEBBY CANDRA', 'KOTA GALUH ', '2000-07-12', '2', 'Aktif', '2018'),
(179, '18512019', 'CICI FADILA JUNISA', 'Tanjung Mulia', '2000-06-16', '2', 'Aktif', '2018'),
(180, '18512022', 'DEBY SILVIA PERDANA', 'MEDAN ', '2000-06-13', '2', 'Drop Out', '2018'),
(181, '18512041', 'HATTA PRATAMA', 'RIMO', '2001-02-01', '1', 'Aktif', '2018'),
(182, '18512042', 'HUSNI RAMADHAN', 'RANTAU PRAPAT ', '1999-12-18', '1', 'Aktif', '2018'),
(183, '18512045', 'INTAN PRATIWI', 'SIDODADI RAMUNIA', '1999-09-29', '2', 'Aktif', '2018'),
(184, '18512050', 'LENY ANDRIANI', 'MEDAN ', '1999-03-04', '2', 'Aktif', '2018'),
(185, '18512054', 'MARINA DWI SENTA SIMBOLON', 'PASAR BINANGAN', '2000-05-31', '2', 'Aktif', '2018'),
(186, '18512055', 'MARISKHI TOGATOROP', 'MEDAN', '2000-05-10', '2', 'Aktif', '2018'),
(187, '18512069', 'NASTASIA DAELI', 'MEDAN', '1997-04-10', '2', 'Aktif', '2018'),
(188, '18512072', 'NOVI ARDANA', 'SIGLI', '2000-05-26', '2', 'Aktif', '2018'),
(189, '18512078', 'NURZANNAH SALSABILLAH HASBY', 'SIBOLGA ', '2000-05-26', '2', 'Aktif', '2018'),
(190, '18512080', 'PANCA MAULANA', 'SIBOLGA ', '1999-06-26', '1', 'Aktif', '2018'),
(191, '18512094', 'SELI ANTASARI', 'Medan', '2000-07-08', '2', 'Aktif', '2018'),
(192, '18512099', 'SITI NURAISYAH', 'JAKARTA ', '2000-10-15', '2', 'Aktif', '2018'),
(193, '18512100', 'SITI QADIZAH', 'BUKIT BAGASAN', '1999-12-02', '2', 'Drop Out', '2018'),
(194, '18512103', 'SRI HAYATI', 'DISKI ', '2000-08-05', '2', 'Aktif', '2018'),
(195, '18512120', 'YULINDA', 'PULAU TAGOR ', '2000-06-20', '2', 'Aktif', '2018'),
(196, '18512121', 'YUSRIA AL-JODRI SIREGAR', 'KOTA DATAR', '1999-05-21', '2', 'Aktif', '2018'),
(197, '18512122', 'AHMAD FAJAR', 'KOTA RANTANG', '1999-02-20', '1', 'Aktif', '2018'),
(198, '18512123', 'ELMEKE ANADIA', 'MEDAN ', '1998-01-09', '2', 'Aktif', '2018'),
(199, '18511126', 'Dwi Azzahra', 'BINJAI', '1999-12-07', '2', 'Aktif', '2018'),
(200, '18611001', 'ANGGA ADITIA', 'MEDAN', '2000-11-07', '1', 'Aktif', '2018'),
(201, '18611002', 'ANNISA AYUNI AZHAR', 'MEDAN', '2000-10-31', '2', 'Aktif', '2018'),
(202, '18611003', 'ANTIKA GLORIA HOSIANNA', 'SUKARAMAI ', '2000-10-21', '2', 'Aktif', '2018'),
(203, '18611004', 'ASYIFA MOUDINA RESTU PUTRI ', 'BANDUNG ', '2000-07-09', '2', 'Aktif', '2018'),
(204, '18611005', 'BOBY IRSANDI', 'AEK RASO', '1997-06-30', '1', 'Aktif', '2018'),
(205, '18611006', 'DINA MARDIKA SITORUS', 'MEDAN', '1999-08-17', '2', 'Aktif', '2018'),
(206, '18611007', 'ELVI ARISKA BR SINAGA', 'KAMPUNG PAJAK', '2000-06-14', '2', 'Aktif', '2018'),
(207, '18611008', 'FITRIA', 'MEDAN ', '2000-07-30', '2', 'Aktif', '2018'),
(208, '18611009', 'HENI SEPRIANI SIAHAAN', 'MEDAN', '2000-09-30', '2', 'Aktif', '2018'),
(209, '18611010', 'HAZRAH ELYA FATMA SIREGAR', 'PADANG BRAHRANG', '2001-06-26', '2', 'Aktif', '2018'),
(210, '18511127', 'JIHAN PUTRI CHAIRIYANI', 'MEDAN', '2001-05-06', '2', 'Aktif', '2018'),
(211, '18611012', 'JUDITH SEREPINA L. TOBING', 'KUALA TUNGKAL ', '2000-03-20', '2', 'Aktif', '2018'),
(212, '18611013', 'LAILAN DWI SAFITRI', 'MULIOREJO ', '2001-01-20', '2', 'Aktif', '2018'),
(213, '18611014', 'MIFTAHUL JANNAH ', 'MEDAN', '2001-06-16', '2', 'Aktif', '2018'),
(214, '18611015', 'NOVIA PRATIWI', 'SAMBIREJO TIMUR', '2000-07-18', '2', 'Aktif', '2018'),
(215, '18511032', 'ERSI KAMA', 'BINJAI', '1999-10-04', '2', 'Aktif', '2018'),
(216, '18511030', 'ELFRIDA SEMBIRING', 'DELI TUA', '1999-05-05', '2', 'Aktif', '2018'),
(217, '18511031', 'ELVINA AYUMI', 'MEDAN ', '1998-03-28', '2', 'Aktif', '2018'),
(218, '18511001', 'A. ARMANDA KELIAT', 'MEDAN ', '2000-06-29', '1', 'Aktif', '2018'),
(219, '195107007', 'DARA HAWIDA ALCA', 'KABANJAHE', '2001-02-23', '2', 'Aktif', '2019'),
(220, '195107006', 'CHRISTIAN TAMPUBOLON', 'MEDAN', '1993-11-30', '1', 'Aktif', '2019'),
(221, '196107001', 'AYU PERMATA SARI', 'MEDAN', '2000-10-01', '2', 'Aktif', '2019'),
(222, '195107005', 'ABDUL FIKRI JENAR', 'SIMPANG EMPAT', '2001-05-03', '1', 'Aktif', '2019'),
(223, '195107008', 'DELA SAFITRI', 'SEI MENCIRIM', '2002-02-21', '2', 'Aktif', '2019'),
(224, '195107009', 'DELLA MONIKA BR SEMBIRING', 'SELESAI', '2001-03-19', '2', 'Aktif', '2019'),
(225, '195107010', 'DESY RAMADANI', 'MEDAN', '2000-12-01', '2', 'Aktif', '2019'),
(226, '195107011', 'EKY LESTARI', 'LANTASAN BARU', '2001-06-11', '2', 'Aktif', '2019'),
(227, '195107012', 'EPIN DWI NOVITA', 'TUNTUNGAN', '2001-03-25', '2', 'Aktif', '2019'),
(228, '195107013', 'HANI TRIANI', 'LAU LANTE', '2001-07-19', '2', 'Aktif', '2019'),
(229, '195107014', 'HENDI QADARYADI', 'TAKENGON', '2000-09-27', '1', 'Aktif', '2019'),
(230, '195107015', 'INTAN NURJANAH', 'KAMPUNG AMAN', '2002-01-17', '2', 'Aktif', '2019'),
(231, '195107016', 'JUNANTI TARIGAN', 'PERBAUNGAN', '2001-09-02', '2', 'Aktif', '2019'),
(232, '195107017', 'KARMILA BR BARUS', 'NAMO PULI', '2000-04-07', '2', 'Aktif', '2019'),
(233, '195107018', 'MARELLA SALSA BILLA BR GINTING', 'KABANJAHE', '2001-11-12', '2', 'Aktif', '2019'),
(234, '195107019', 'MIA ANJANI', 'BINTANG TERANG', '1999-09-01', '2', 'Aktif', '2019'),
(235, '195107020', 'MUHAMMAD ALDI PRANATA', 'SUKA RAMAI', '1999-12-21', '1', 'Aktif', '2019'),
(236, '195107021', 'MUHAMMAD NUR HAKIM', 'SIMPANG EMPAT', '2002-01-19', '1', 'Aktif', '2019'),
(237, '195107022', 'MUTIARA AL HUSNA', 'MARENDAL', '2001-12-03', '2', 'Aktif', '2019'),
(238, '195107023', 'PUTRIANI', 'PONDOK CEMARA', '2001-09-07', '2', 'Aktif', '2019'),
(239, '195107024', 'RANI RUSWAN', 'MEDAN', '2001-02-11', '2', 'Aktif', '2019'),
(240, '195107025', 'RIRIN PRATIWI', 'RANTAU PRAPAT', '2000-06-18', '2', 'Aktif', '2019'),
(241, '195107026', 'SAID IDRUS FAHRI', 'MEDAN', '2001-05-24', '1', 'Aktif', '2019'),
(242, '195107027', 'SRI WAHYUNI BR MANURUNG', 'DISKI', '2001-06-02', '2', 'Aktif', '2019'),
(243, '195107028', 'SURATNA BR SINULINGGA', 'PIARUNG', '2002-01-16', '2', 'Aktif', '2019'),
(244, '195107029', 'TIARA SALSABILA RANGKUTI', 'MEDAN', '2001-12-09', '2', 'Aktif', '2019'),
(245, '195107030', 'ZAHWA SYAHDEWA SINAGA', 'BATANG SERANGAN', '2001-01-15', '1', 'Aktif', '2019'),
(246, '195107031', 'ZUL FIRMAN ZEIN', 'medan', '2001-12-13', '1', 'Aktif', '2019'),
(247, '195107032', 'ADHE PUTRI INDRIANI', 'MEDAN', '2001-02-07', '2', 'Aktif', '2019'),
(248, '196107002', 'ITA PURNAMA SARI BR SITEPU', 'RIMO KAYU', '2002-03-01', '2', 'Aktif', '2019'),
(249, '196107003', 'MAWADDAH HARAHAP', 'SEI SITORUS', '2000-01-02', '2', 'Aktif', '2019'),
(250, '196107004', 'NOVITA SARI SIAHAAN', 'PEMATANG BANDAR', '1998-11-12', '2', 'Aktif', '2019'),
(251, '196107005', 'REKA SYAHPUTRA', 'BATAHAN', '2001-06-05', '1', 'Aktif', '2019'),
(252, '196107006', 'WAWAN ISWANTO', 'KP. TEMPEL I', '2002-03-25', '1', 'Aktif', '2019'),
(253, '196107007', 'RAZA DAUD HASAN', 'MEDAN', '2001-05-12', '2', 'Pindah Prakuliah-F001', '2019'),
(254, '196107008', 'SANTI AUDRA SIMANJUNTAK', 'BELAWAN', '2002-02-18', '2', 'U-30', '2019'),
(255, '196107009', 'SUKMA SARI', 'NEGERI LAMA', '1999-04-04', '2', 'Aktif', '2019'),
(256, '195185001', 'Agus Hidayat', 'Sidotani', '1999-08-17', '1', 'U-30', '2019'),
(257, '194185001', 'Aji Surya', 'Pegajahan', '2001-03-03', '1', 'Aktif', '2019'),
(258, '194185002', 'Alingka Widjaya', 'Sidomulyo', '2002-02-13', '2', 'Aktif', '2019'),
(259, '194185003', 'Alivia Salsyadila', 'Kolam', '2000-01-06', '2', 'U-30', '2019'),
(260, '195185002', 'Anggun Pitaloka', 'Belawan', '2001-11-04', '2', 'Aktif', '2019'),
(261, '195185003', 'Araya Andrian Rangkuti', 'Medan', '2001-08-10', '2', 'Aktif', '2019'),
(262, '195185004', 'Arif Alfian', 'Kota Rantang', '2002-04-16', '1', 'Aktif', '2019'),
(263, '195185005', 'Arifin Bahri Ritonga', 'Kp Dalam', '2001-02-10', '1', 'U-30', '2019'),
(264, '195185006', 'Artina Sahxena Situmorang', 'Huta I Lias Baru', '2001-04-18', '2', 'Aktif', '2019'),
(265, '195185007', 'Aslim Mahendra Sagala', 'Binjai', '2000-07-04', '1', 'Aktif', '2019'),
(266, '195185008', 'Aulia Tazkia', 'Paluh Manan', '2001-03-28', '2', 'Aktif', '2019'),
(267, '195185009', 'Ayunda Pratiwi Rahmah', 'Medan', '2001-10-01', '2', 'Aktif', '2019'),
(268, '194185004', 'Beby Aprilia Kesuma', 'Belawan', '2001-04-26', '2', 'Aktif', '2019'),
(269, '195185010', 'Dea Anggraini', 'Medan', '2000-05-09', '2', 'Aktif', '2019'),
(270, '195185011', 'Dea Fadhila', 'Rembang', '2001-05-13', '2', 'U-30', '2019'),
(271, '195185012', 'Devi Fadia Zenianto', 'Kota Rantang', '2001-08-07', '2', 'Aktif', '2019'),
(272, '194185005', 'Dicky Setiawan', 'Perbaungan', '2001-05-03', '1', 'Aktif', '2019'),
(273, '194185006', 'Dyah Vita Permata Sari', 'Kota Rantang', '2001-05-25', '2', 'Aktif', '2019'),
(274, '195185013', 'Edward Trifin Manullang', 'Jambi', '1999-11-06', '1', 'Aktif', '2019'),
(275, '194185007', 'Fajar Maulana', 'Medan', '1996-07-14', '1', 'Aktif', '2019'),
(276, '194185008', 'Faturrahman Hudaivy Sitorus', 'Aek Songsongan', '2002-03-16', '1', 'Aktif', '2019'),
(277, '194185009', 'Harun Arrasyid', 'Perbaungan', '2001-06-11', '1', 'Aktif', '2019'),
(278, '195185014', 'Indah Widya Astuti', 'Ujung Padang', '2001-02-06', '2', 'U-30', '2019'),
(279, '194185010', 'Indra Gunawan', 'Sentang', '2001-04-16', '1', 'Aktif', '2019'),
(280, '195185015', 'Irene Novelida', 'Kampung Satu', '2002-11-11', '2', 'Aktif', '2019'),
(281, '195185016', 'Isa Belita Br Marpaung', 'Bengkel Sukaramai', '2002-03-30', '2', 'Aktif', '2019'),
(282, '194185011', 'Juan Africal', 'Hamparan Perak', '2001-04-30', '1', 'Aktif', '2019'),
(283, '195185017', 'Laisla Nastary', 'Medan', '2001-10-03', '2', 'U-30', '2019'),
(284, '195185018', 'Mawar Sukma Dewi', 'Medan', '2001-02-24', '2', 'U-30', '2019'),
(285, '194185012', 'Mirwan Aziz Ritonga', 'Panduan', '2002-02-23', '1', 'Aktif', '2019'),
(286, '194185013', 'Muhammad Asrul Azhari', 'Medan', '2001-04-30', '1', 'Aktif', '2019'),
(287, '195185019', 'Muhammad Ikhsan', 'Kampung Banjar', '2001-05-14', '1', 'U-30', '2019'),
(288, '194185014', 'Nanda Wahyubi', 'SImpang Empat', '1999-10-29', '1', 'Aktif', '2019'),
(289, '195185020', 'Nilam Anjelika Br Stp', 'Aman Damai', '2001-03-25', '2', 'U-30', '2019'),
(290, '195185021', 'Nur Halimah', 'Langkat', '2000-02-05', '2', 'Aktif', '2019'),
(291, '195185022', 'Nurul Esa Dewi', 'Bulu CIna', '2001-09-22', '2', 'Aktif', '2019'),
(292, '195185023', 'Nurya Annisa Fitri', 'Pangkalan Susu', '2001-12-18', '2', 'Aktif', '2019'),
(293, '195185024', 'Nyak Kiki Fadilah', 'Medan', '2001-03-24', '2', 'Aktif', '2019'),
(294, '195185025', 'Oktavianita Anggreini Sembiring', 'Medan', '2001-10-18', '2', 'U-30', '2019'),
(295, '195185026', 'Putri Ramadhani', 'Bingkat', '2000-12-18', '2', 'Aktif', '2019'),
(296, '194185015', 'Rafiq Alfarez Badres', 'Lubuk Pakam', '2001-07-25', '1', 'Aktif', '2019'),
(297, '195185027', 'Rizky Ulfa Pradwiyana', 'Pegajahan', '2002-02-01', '2', 'U-30', '2019'),
(298, '194185016', 'Roy Parasian Sitompul', 'Percut', '2001-12-26', '1', 'Aktif', '2019'),
(299, '195185028', 'Samuel Simanjuntak', 'Belawan', '2001-11-23', '1', 'Aktif', '2019'),
(300, '195185029', 'Silvia Dwi Agustin', 'Lubuk Pakam', '2001-08-05', '2', 'Aktif', '2019'),
(301, '194185017', 'Sri Handayani', 'Pulau Raja', '2000-12-17', '2', 'U-30', '2019'),
(302, '194185018', 'Surya Darma', 'Bengabing', '2001-04-10', '1', 'U-30', '2019'),
(303, '195185030', 'Suryani Malau', 'Perdagangan', '2001-02-11', '2', 'Aktif', '2019'),
(304, '195185031', 'Nurhaliza Lubis', 'Medan', '2002-05-20', '2', 'Aktif', '2019'),
(305, '195185032', 'Suryani Ramawulan', 'Labuhan Deli', '2001-11-29', '2', 'Aktif', '2019'),
(306, '195185033', 'Tiara', 'Bengkel Sukaramai', '2000-01-03', '2', 'Non Aktif', '2019'),
(307, '194185019', 'Syahwildan Hamdi', 'Paya Bengkuang', '2002-01-21', '1', 'Aktif', '2019'),
(308, '195185034', 'Tri Angga Widodo', 'Belawan', '2002-03-17', '1', 'Aktif', '2019'),
(309, '195185035', 'Via Alya Huda', 'Tanjung Pura', '2001-06-23', '2', 'U-30', '2019'),
(310, '195185036', 'Vira Yulia Ketaren', 'Medan', '2001-07-13', '2', 'Aktif', '2019'),
(311, '196185001', 'Widya Pratiwi', 'Sei Alim', '2001-09-17', '2', 'U-30', '2019'),
(312, '195185037', 'Yoan Tasya', 'Bingkat', '2001-10-27', '2', 'Aktif', '2019'),
(313, '195185038', 'Yoga Syahputra', 'Alur Gading', '2000-05-27', '1', 'U-30', '2019'),
(314, '195185039', 'Yulia Wati', 'Besitang', '2001-10-09', '2', 'Aktif', '2019'),
(315, '195185040', 'Yosafat Vitorio Simanjuntak', 'Besitang', '2001-10-28', '1', 'Aktif', '2019'),
(316, '195107033', 'HOTNIDA', 'SURODINGIN', '2000-03-05', '2', 'Aktif', '2019'),
(317, '194107001', 'ABDUL AZIZ', 'BATAHAN', '2001-04-10', '1', 'Aktif', '2019'),
(318, '195107034', 'AISYAH', 'MEDAN', '2000-07-01', '2', 'Aktif', '2019'),
(319, '195107079', 'HENNI PURWATI SARAGI', 'KABANJAHE', '2000-10-14', '2', 'Aktif', '2019'),
(320, '196107011', 'MUHAMMAD ILHAM', 'MEDAN', '2001-08-18', '1', 'Aktif', '2019'),
(321, '196107012', 'NILA SARI', 'MERANTI', '2001-07-18', '2', 'Aktif', '2019'),
(322, '194107002', 'PUTRA HIDAYAT ARIFIN', 'MEDAN', '2001-07-27', '1', 'Aktif', '2019'),
(323, '194107003', 'EKA CIPTA SYAHPUTRA', 'PERBAUNGAN', '1996-11-24', '1', 'Aktif', '2019'),
(324, '194107004', 'MUHAMMAD REZA', 'SUKAMULIA', '2000-01-01', '1', 'U-30', '2019'),
(325, '195185041', 'Reza Hafiz Sihombing', 'Teluk Dalam', '2001-05-20', '1', 'Aktif', '2019'),
(326, '195107035', 'DESY FEBY FEBRIANI SARAGIH', 'NEGERI TANI', '2000-07-16', '2', 'Aktif', '2019'),
(327, '195107036', 'HELMI RATNA SARI PUTRI', 'MEDAN', '1999-09-10', '2', 'Aktif', '2019'),
(328, '194107005', 'AZRIL FAHCREZAL AKBAR', 'BANGUN RAKYAT', '2001-04-04', '1', 'U-30', '2019'),
(329, '194107006', 'LILI PERMATA SARI', 'MEDAN', '2001-02-21', '2', 'U-30', '2019'),
(330, '194107007', 'MUHAMMAD DAFFA RAUF', 'MEDAN', '2001-09-24', '1', 'Aktif', '2019'),
(331, '194107008', 'MUHAMMAD RAIHANDANY NST', 'TANNUNG MORAWA', '2001-07-28', '1', 'U-30', '2019'),
(332, '194107009', 'RIZKY ALDI NATA', 'KUALA BERINGIN', '2001-03-24', '1', 'Pindah Prakuliah-A001', '2019'),
(333, '195107037', 'TIKA BERLIANA SITORUS', 'LUBUK PAKAM', '2001-03-19', '2', 'Aktif', '2019'),
(334, '195107038', 'NURHASANAH ASTI', 'BANDAR KHALIPAH', '2001-04-20', '2', 'Aktif', '2019'),
(335, '195107039', 'TIARMA KORNIKA SARI TAMPUBOLON', 'AFD 1 BUKIT LIMA', '2001-07-26', '2', 'Aktif', '2019'),
(336, '195107040', 'FAIRUS HARIS', 'MEDAN', '2001-08-03', '1', 'Aktif', '2019'),
(337, '195107041', 'NADYA DAMAYANTI', 'MEDAN', '2001-03-23', '2', 'Aktif', '2019'),
(338, '195107042', 'AGUS SYAHRIADI', 'SUKASARI', '2001-08-14', '1', 'U-30', '2019'),
(339, '195107043', 'ANDIKA RAMADHAN', 'PIRBUN TINGGI MULIA', '2001-12-08', '1', 'Aktif', '2019'),
(340, '195107044', 'FITRI YANA', 'LW DUA', '2000-01-05', '2', 'U-30', '2019'),
(341, '195107045', 'ANNISA AULIA PUTRI', '-', '2000-07-08', '2', 'U-30', '2019'),
(342, '195107046', 'M. FADHIL RIZKI NOOR', 'MEDAN', '2001-06-09', '1', 'Aktif', '2019'),
(343, '195107047', 'SALVIA TAMARA WARDHANI', 'BINJAI', '2001-11-18', '2', 'Aktif', '2019'),
(344, '194107010', 'YOSUA YOELANDO MARBUN', 'SIDIKALANG', '2000-12-24', '1', 'Aktif', '2019'),
(345, '195107048', 'SUCI PRATIWI', 'SUKA JADI', '2001-10-18', '2', 'U-30', '2019'),
(346, '195107049', 'ANDINY UTAMI', 'MANGGA DUA', '2002-01-09', '2', 'Aktif', '2019'),
(347, '195107050', 'MUHAMMAD FATHURRAHMAN', 'PEMATANG SIANTAR', '2001-02-17', '1', 'U-30', '2019'),
(348, '195107051', 'PUTRI WAHYUNI', '-', '2001-09-07', '2', 'Aktif', '2019'),
(349, '195107052', 'M. YASIN ISMALLIYAH', 'TANJUNG MORAWA', '2001-03-05', '1', 'U-30', '2019'),
(350, '195107053', 'VIKA ANNISA NAYLA YP', 'MEDAN', '2001-01-01', '2', 'U-30', '2019'),
(351, '195107054', 'ADINDA AURA REGITA', 'BANDUNG', '2001-08-26', '2', 'Aktif', '2019'),
(352, '195107055', 'ALDITA HIDAYAT', 'MEDAN', '2001-02-11', '2', 'Aktif', '2019'),
(353, '195107056', 'ANDRI YANI', 'KOTA GALUH', '2001-04-02', '2', 'Aktif', '2019'),
(354, '195107057', 'DIAN NOVITA', 'TANJUNG GUSTA', '2000-06-03', '2', 'U-30', '2019'),
(355, '195107058', 'MIFTAHUL JANNAH PANJAITAN', '-', '2001-01-01', '2', 'Aktif', '2019'),
(356, '195107059', 'SRI WAHYUNI', 'MELATI II', '2000-09-13', '2', 'Aktif', '2019'),
(357, '195107060', 'AMNY DIAN NIRA', 'MEDAN', '1997-08-31', '2', 'Aktif', '2019'),
(358, '195107061', 'ANDRE PRAYOGA', 'SEI BALAI', '2002-09-09', '1', 'Pindah Prakuliah-B001', '2019'),
(359, '195107062', 'DIAN CAHAYA NINGRUM', 'PINANG SORI', '1999-05-30', '2', 'Aktif', '2019'),
(360, '195107063', 'HUSNA ATIKA', 'MEDAN', '2001-12-07', '2', 'Aktif', '2019'),
(361, '195107064', 'JENDRI AWAN', 'SUKA JADI', '2002-01-11', '1', 'U-30', '2019'),
(362, '195107065', 'MHD. ARAMICO WINNAS PAKPAHAN', 'MEDAN', '2001-02-01', '1', 'Aktif', '2019'),
(363, '195107066', 'TRI MAY RANI NDURU', 'MEDAN', '2002-05-10', '2', 'U-30', '2019'),
(364, '195107067', 'TRI PUTRI SANI', 'KUALA', '2000-06-27', '2', 'Aktif', '2019'),
(365, '195107068', 'WINARI HENDRIANI', 'MEDAN', '2001-03-03', '2', 'Aktif', '2019'),
(366, '194107011', 'ANNISA APRILLIA', 'MEDAN', '2002-04-15', '2', 'Aktif', '2019'),
(367, '195107069', 'ELA YOLANDA BANGUN', 'DAMAR HITAM', '2000-12-10', '2', 'Aktif', '2019'),
(368, '194107012', 'RISKI MANURUNG', 'TANJUNG BALAI', '2019-03-12', '1', 'Aktif', '2019'),
(369, '196107013', 'ELISA ENDRIANI', 'SALIM PIPIT', '2001-04-25', '2', 'Aktif', '2019'),
(370, '195107070', 'MUHAMMAD NABIL', 'MEDAN', '2000-11-23', '1', 'Aktif', '2019'),
(371, '195107071', 'RIZKI NUH IQBAL', 'AEK TOROP', '2001-03-27', '1', 'Pindah Prakuliah-F001', '2019'),
(372, '194185020', 'Hose Ronaldo Pangaribuan', 'Palembang', '2000-09-03', '1', 'Aktif', '2019'),
(373, '194185021', 'Ardi Fedrizal', 'Medan', '2001-02-15', '1', 'Aktif', '2019'),
(374, '195185042', 'Nurul Hidayah', 'Bagan Deli', '2001-01-22', '2', 'Aktif', '2019'),
(375, '194307001', 'DANIEL PERANGIN-ANGIN', 'MEDAN', '2000-06-19', '1', 'Aktif', '2019'),
(376, '196107014', 'OKTA SELVIA BR GINTING', 'KABANJAHE', '2001-10-14', '2', 'Aktif', '2019'),
(377, '195207001', 'VALENTINE SYAFITRI', 'MEDAN', '2001-01-20', '2', 'Aktif', '2019'),
(378, '194107014', 'MITRA SETYA DARMA', 'PIR TRANS SOSA II', '2001-03-23', '1', 'Aktif', '2019'),
(379, '195107072', 'CUT RIKA OKTAVIANI', 'PEKAN BARU', '2000-10-26', '2', 'Aktif', '2019'),
(380, '195185043', 'Rai Yanannda Putra', 'Medan', '2001-09-12', '1', 'Aktif', '2019'),
(381, '194107015', 'AEICLASHIAS LUHUT PERDANA M', 'MEDAN', '1999-05-19', '1', 'Aktif', '2019'),
(382, '195107073', 'BRIGITHA VERANICHA BR PS', 'AIR MOLEK', '2000-01-28', '2', 'Aktif', '2019'),
(383, '195107074', 'HAJID ABIYYU MUYASSAR', 'JAWA TENGAH', '2002-04-05', '1', 'Aktif', '2019'),
(384, '195107075', 'IKA RAHMAWATI', 'SUKA RAME BARU', '2001-06-30', '2', 'Aktif', '2019'),
(385, '195107076', 'IMAM MUCHRONI', 'MARINDAL', '2001-04-09', '1', 'Aktif', '2019'),
(386, '195107077', 'LEONARDO SIMATUPANG', 'SOLOK', '2001-01-14', '1', 'Aktif', '2019'),
(387, '195107078', 'SARI PUTRI ULINDA BR SITEPU', 'KABANJAHE', '2001-03-31', '2', 'Aktif', '2019'),
(388, '196107015', 'GAUDENSIUS PURBA', 'HUTARAJA', '2001-02-12', '1', 'Aktif', '2019'),
(389, '195107080', 'GHANIYYAH TARI FADHILAH', 'MEDAN', '2002-02-14', '2', 'Aktif', '2019'),
(390, '195107081', 'INDRIANI SEPTIANTARI', 'KABANJAHE', '2001-09-28', '2', 'Aktif', '2019'),
(391, '196107016', 'BIMA ALFATH SHAYBULLAH', 'PATUMBAK', '1999-06-24', '1', 'Aktif', '2019'),
(392, '194107016', 'M. RIZKI ANSARI', 'KELAMBIR', '2001-01-16', '1', 'Aktif', '2019'),
(393, '195107082', 'RIZKI SAPUTRA', 'TAKENGON', '2001-08-30', '1', 'Aktif', '2019'),
(394, '195107083', 'RIZKY ULFA PRADWIYANA', 'TANAH RAJA', '2002-02-01', '2', 'Aktif', '2019'),
(395, '195107084', 'SITI KHADIJA PUTRI POLII', 'MEDAN', '2000-03-10', '2', 'Aktif', '2019'),
(396, '195107085', 'SUSILAWATI', 'MENGKOPOT', '1999-10-11', '2', 'Pindah Prakuliah-B001', '2019'),
(397, '194107017', 'WILLY STANLY RINDY', 'NIAS', '2001-09-22', '1', 'Pindah Prakuliah-A001', '2019'),
(398, '195107086', 'ADISTY RANDITA SEKARTAJI', 'MEDAN', '2002-04-03', '2', 'Aktif', '2019'),
(399, '195107087', 'AMALIA THUSSYIFA', 'MEDAN', '2000-02-29', '2', 'Aktif', '2019'),
(400, '195107088', 'DHIYAH AYUFITRIA DWISIFA HARAHAP', 'MEDAN', '2001-12-14', '2', 'Aktif', '2019'),
(401, '195107089', 'FADILAH CANTIKA', 'LAWE SIGALA', '2001-08-08', '2', 'Aktif', '2019'),
(402, '195107090', 'FIKRI', 'KRIKIT', '2001-07-21', '1', 'Aktif', '2019'),
(403, '195107091', 'JUMINARTI', 'AIR HITAM', '2001-07-04', '2', 'Aktif', '2019'),
(404, '195107092', 'LALA KARUNA PUTRI', 'LHOKSEUMAWE', '2001-04-02', '2', 'Aktif', '2019'),
(405, '196107017', 'MAHYUNI DESTAGIA BR SIBUEA', 'GURUBENLIA', '2000-12-09', '2', 'Pindah Prakuliah-A001', '2019'),
(406, '195107093', 'MARIA ANJELYNA MANURUNG', 'JAWA DOLOK', '2000-09-22', '2', 'Aktif', '2019'),
(407, '194107018', 'MUHAMMAD REFALDI', 'BATANG SERANGAN', '1999-01-20', '1', 'Aktif', '2019'),
(408, '195107094', 'NANDITO FARHAN', 'KUALA SIMPANG', '2000-10-06', '1', 'U-30', '2019'),
(409, '195107095', 'NISA AL KHAIR', 'KW GUMIT', '2002-11-04', '2', 'Aktif', '2019'),
(410, '196107018', 'NUR KAHFI AL MANSYUR', 'MEDAN', '2001-07-07', '1', 'Aktif', '2019'),
(411, '196107019', 'NURUL AZIZAH', 'DELI TUA', '2000-12-24', '2', 'Aktif', '2019'),
(412, '194107019', 'RANDY PRADANA', 'PERDAGANGAN', '2001-11-11', '1', 'Aktif', '2019'),
(413, '196107020', 'RISMALA NOVA ANGELIA HUTAGAOL', 'MEDAN', '2001-04-13', '2', 'Aktif', '2019'),
(414, '194107020', 'RIYADI WAHYUDA', 'BERASTAGI', '1999-06-12', '1', 'Aktif', '2019'),
(415, '196107021', 'SRI ANDRIYANI', 'PEMATANG SERAI', '2001-04-27', '2', 'Aktif', '2019'),
(416, '194107021', 'TAUFIK RAMADHAN PULUNGAN', 'KWALA GUMIT', '2001-12-10', '1', 'Aktif', '2019'),
(417, '194107022', 'TAUFIQ AKBAR SUTRISNO', 'BATAM', '2000-11-04', '1', 'Aktif', '2019'),
(418, '196107022', 'ULFA NATALIA', 'PUSAKO', '1999-12-11', '2', 'Aktif', '2019'),
(419, '194107023', 'WULANDARI', 'PURWODADI', '2001-09-28', '2', 'Pindah Prakuliah-B001', '2019'),
(420, '194107024', 'FILIP PASRIBU', 'MEDAN', '2000-07-20', '1', 'Pindah Prakuliah-A001', '2019'),
(421, '194107025', 'RIO OKASUGAWA', 'MEDAN', '2001-06-04', '1', 'Aktif', '2019'),
(422, '196107023', 'ISMI IRDA UMAMI SIHITE', 'SIGAMBO-GAMBO', '2001-04-19', '2', 'U-30', '2019'),
(423, '195107096', 'YUNDA AZIZI INDRASWARI', 'HUTA PARIK', '2000-11-14', '2', 'Aktif', '2019'),
(424, '195107097', 'NAZIAH', 'SUKA MAJU', '2001-03-29', '2', 'Aktif', '2019'),
(425, '194185022', 'Dimas Erlangga', 'Kuala', '1999-07-11', '1', 'Aktif', '2019'),
(426, '194185023', 'Heri Maulana', 'Kisaran', '2000-12-29', '1', 'Aktif', '2019'),
(427, '194107026', 'FEPRIADY CHARLES MANIK', 'TARUTUNG', '2000-02-16', '1', 'Aktif', '2019'),
(428, '195107098', 'MORIS GIDION MARPAUNG', 'SEI BALAI', '2002-05-15', '1', 'Aktif', '2019'),
(429, '195107099', 'REGINA MARSELA BR GINTING', 'BINJAI', '2002-03-05', '2', 'Aktif', '2019'),
(430, '194107027', 'HAFIZ PRATAMA', 'PKS LANGKAT', '1999-07-03', '1', 'Aktif', '2019'),
(431, '195107100', 'JULIAN LADISTA', 'KUALA SIMPANG', '1998-07-27', '1', 'Aktif', '2019'),
(432, '195185044', 'Tiara Fadilla Tanjung', 'Bagan Batu', '2000-09-21', '2', 'Aktif', '2019'),
(433, '195107101', 'AMALIA THUSSYIFA', 'MEDAN', '2000-02-29', '2', 'Aktif', '2019'),
(434, '195107102', 'Dhiyah ayufitria dwi sifa harahap', 'Medan', '2001-12-14', '1', 'Aktif', '2019'),
(435, '196107024', 'MARDHATI FATILA', 'DUSUN PULO', '2000-06-01', '2', 'Aktif', '2019'),
(436, '195107103', 'NAZIAH', 'SUKA MAJU', '2001-03-29', '2', 'Aktif', '2019'),
(437, '194107028', 'taufiq akbar strisno', 'batam', '2000-11-04', '1', 'Aktif', '2019'),
(438, '194107029', 'ALFA FRYANTA GINTING', 'MEDAN', '2001-10-06', '1', 'Aktif', '2019'),
(439, '194107030', 'ANDIKA EGI SUHADA', 'PATUMBAK', '2001-11-24', '1', 'Aktif', '2019'),
(440, '195107104', 'DWI PUTRI CAHYA BUNDA', 'SAWIT SEBRANG', '2000-02-08', '2', 'Aktif', '2019'),
(441, '194107031', 'RIO ARNANDA LUBIS', 'SIMPANG P. RAMBUNG', '2001-11-19', '1', 'Aktif', '2019'),
(442, '195107105', 'KIKI WIDIYA SARI', 'BATU LOKONG', '2000-09-18', '2', 'Aktif', '2019'),
(443, '195107106', 'SANTOSO', 'PANTAI CERMIN', '2000-10-10', '1', 'Pindah Prakuliah-B001', '2019'),
(444, '196107025', 'ULFA MAULIDZA SHAFIRA', 'KISARAN', '2001-06-14', '2', 'Aktif', '2019'),
(445, '195107107', 'YOGA RAMA PRAWIRA GINTING', 'MEDAN', '1999-09-28', '1', 'Aktif', '2019'),
(446, '195107108', 'MHD ROBBY NUGRAHA LUBIS', 'PADANG SIDEMPUAN', '1998-09-07', '1', 'U-30', '2019'),
(447, '194107032', 'DIPPOS RIO HASODUNGAN SINURAT', 'SIDIKALANG', '1998-07-27', '1', 'U-30', '2019'),
(448, '196107026', 'YUSNITA ANJANI', 'AEK KANOPAN', '2000-06-04', '2', 'Aktif', '2019'),
(449, '1961070027', 'SANTOSO', 'PANTAI CERMIN', '2000-10-10', '1', 'Pindah Prakuliah-B001', '2019'),
(450, '196107028', 'SANTOSO', 'PANTAI CERMIN', '2000-10-10', '1', 'Aktif', '2019'),
(451, '195107110', 'FILIP PASRIBU', 'MEDAN', '2000-07-20', '1', 'Aktif', '2019'),
(452, '195107111', 'RIZKY ALDI NATA', 'KUALA BERINGIN', '2001-03-24', '1', 'Aktif', '2019'),
(453, '195107112', 'WILLY STANLY RINDY', 'NIAS', '2001-09-22', '1', 'Aktif', '2019'),
(454, '195107113', 'MAHYUNI DESTAGIA BR SIBUEA', 'GURUBENLIA', '2000-12-09', '2', 'Aktif', '2019'),
(455, '196107029', 'ANDRE PRAYOGA', 'SEI BALAI', '2002-09-09', '1', 'Aktif', '2019'),
(456, '194107033', 'RAZA DAUD HASAN', 'MEDAN', '2001-05-12', '2', 'Aktif', '2019'),
(457, '194107034', 'RIZKI NUH IQBAL', 'AEK TOROP', '2001-03-27', '1', 'Aktif', '2019'),
(458, '196107030', 'SUSILAWATI', 'MENGKOPOT', '1999-10-11', '2', 'Aktif', '2019'),
(459, '196107031', 'WULANDARI', 'PURWODADI', '2001-09-28', '2', 'Aktif', '2019'),
(460, '196107032', 'SHINTIA GRACE SIMBOLON', 'SIDIKALANG', '2001-04-28', '2', 'Aktif', '2019'),
(461, '206107001', 'BELA ANGGRAINI', 'SEI SUKA DERAS', '2003-09-30', '2', 'Pindah Prakuliah-A001', '2020'),
(462, '205107001', 'RIZKI SUHAILA', 'KISARAN', '2002-12-21', '1', 'Batal Registrasi', '2020'),
(463, '206107002', 'BUNGA CITRA LESTARI', 'MERANTI', '2002-06-20', '2', 'Batal Registrasi', '2020'),
(464, '206107003', 'INDAH SAPUTRI', 'MERANTI', '2002-04-20', '2', 'Batal Registrasi', '2020'),
(465, '206107004', 'MUTIARA SYAFIRA HASIBUAN', 'TEBING TINGGI', '2003-08-04', '2', 'Batal Registrasi', '2020'),
(466, '204107001', 'ALDI FRANS VERY', 'SIDIKALANG', '2002-04-14', '1', 'Batal Registrasi', '2020'),
(467, '205107002', 'DEWI ORIJA', 'TANJUNG KASAU', '2001-07-22', '2', 'Batal Registrasi', '2020'),
(468, '206107005', 'NUR RAHMADANI', 'JAMBUR DAMULI', '2002-11-14', '2', 'Aktif', '2020'),
(469, '205185001', 'Soraya', 'Ara Condong', '2002-05-24', '2', 'Aktif', '2020'),
(470, '205185002', 'Fernando Dalimunte', 'Tarapung Raya', '2000-05-28', '1', 'Aktif', '2020'),
(471, '204185033', 'Jupinus Paskalis Tamba', 'Medan', '2000-04-03', '1', 'Aktif', '2020'),
(472, '205107003', 'PUTRI AMALIA', 'GUNUNG BERKAT', '2002-03-03', '2', 'Aktif', '2020'),
(473, '205107004', 'TIWA AFRIANDA SINAGA', 'SIBATU - BATU', '2001-04-10', '1', 'Batal Registrasi', '2020'),
(474, '205107005', 'SINALOAN', 'HUTANAULI', '1998-06-23', '1', 'Aktif', '2020'),
(475, '205107006', 'SRI AYULIA DEWI', 'MEDAN', '2002-09-03', '2', 'Batal Registrasi', '2020'),
(476, '205185003', 'Lucy Dinda Ardila', 'Kisaran', '2002-05-28', '2', 'Aktif', '2020'),
(477, '205185004', 'Wulan Ramadhani', 'Klumpang', '2000-12-21', '2', 'Aktif', '2020'),
(478, '206185001', 'Rahma Asmitha Syahri', 'Perkebunan Bilah', '2001-08-12', '2', 'Aktif', '2020'),
(479, '204185001', 'Melani Alka Syahira', 'Kerasaan', '2002-12-30', '2', 'U-30', '2020'),
(480, '206185002', 'Sri Rezeki Damanik', 'Bandar Tengah', '2002-07-02', '2', 'U-30', '2020'),
(481, '206107006', 'PUTRI NADIYA', 'SUKA RAME BARU', '2002-11-13', '2', 'Batal Registrasi', '2020'),
(482, '206185003', 'Hana Az Zahrah Damanik', 'Sei Suka', '2002-10-11', '2', 'U-30', '2020'),
(483, '204185002', 'Sopiana Purba', 'Pematang Bandar', '2003-01-02', '2', 'Aktif', '2020'),
(484, '204185003', 'Elsiyah Khoirunnisa', 'Pasar Baru', '2002-06-23', '2', 'Aktif', '2020'),
(485, '206107007', 'MAYSHIN MERIANA TAMPUBOLON', 'BELAWAN', '1999-05-17', '2', 'Aktif', '2020'),
(486, '204107002', 'MUHAMMAD DIYO BAKTI', 'PULAU RAKYAT PEKAN', '2003-06-01', '1', 'Batal Registrasi', '2020'),
(487, '205107007', 'DEWI AMANAH', 'JATIMULYO', '2002-12-11', '2', 'Batal Registrasi', '2020'),
(488, '206107008', 'Dwi Tria', 'Melati', '2019-11-05', '2', 'Pindah Prakuliah-F001', '2020'),
(489, '206107009', 'INTAN SHAKILA', 'PERBAUNGAN', '2002-05-14', '2', 'Batal Registrasi', '2020'),
(490, '206107010', 'R.Ay. Fatimah Az-zahra Yustisia Putri Priambodo', 'P.SIANTAR', '2002-07-31', '2', 'Aktif', '2020'),
(491, '205107008', 'DEVI SYAHFITRI', 'MERANTI', '2002-03-18', '2', 'Batal Registrasi', '2020'),
(492, '206107011', 'MEGA NANDA KZ', 'BELAWAN', '1999-10-20', '2', 'Batal Registrasi', '2020'),
(493, '204185004', 'Dinda Fatika Ningsih', 'Padang', '2001-06-25', '2', 'Aktif', '2020'),
(494, '206185004', 'Sri Wahyuni', 'Tembung', '2002-11-04', '2', 'Aktif', '2020'),
(495, '205185005', 'Nur Halizah Putri', 'Belawan', '2002-06-07', '2', 'U-30', '2020'),
(496, '204185005', 'Ibnul Asir', 'Klambir V', '2001-10-30', '1', 'Pindah Ke-A001', '2020'),
(497, '205185006', 'Fatma Juliana', 'Medan', '2002-07-01', '2', 'Pindah Ke-B001', '2020'),
(498, '204107003', 'MUHAMMAD DIYO BAKTI', 'PULAU RAKYAT PEKAN', '2003-06-01', '1', 'Batal Registrasi', '2020'),
(499, '205107009', 'SRI WAHYUNI RAHMADANI', 'SEI BELURU', '2001-12-04', '2', 'Aktif', '2020'),
(500, '204107004', 'M. ABDULLAH MALIK', 'PERBAUNGAN', '2002-05-10', '1', 'Aktif', '2020'),
(501, '204107005', 'ANDIKA PERMANA', 'SUKARAYA', '2002-05-09', '1', 'Pindah Prakuliah-A001', '2020'),
(502, '206107012', 'SHERINA ALDAINA', 'MEDAN', '2000-09-22', '2', 'Aktif', '2020'),
(503, '205107010', 'AGUS ADITYA PRANATA', 'MEDAN', '2001-08-15', '1', 'Aktif', '2020'),
(504, '206107013', 'HANIFAH', 'BAHTANGAN', '1999-12-10', '2', 'Aktif', '2020'),
(505, '204107006', 'M. IBNU HAQQI MUBARAQ SEMBIRING', 'MEDAN', '2020-10-28', '1', 'Aktif', '2020'),
(506, '206107014', 'MIMI AMIKA', 'ALUS - ALUS', '2002-03-10', '2', 'Pindah Prakuliah-A001', '2020'),
(507, '204107007', 'REZA KHOIRI', 'MEDAN', '2002-10-31', '1', 'Batal Registrasi', '2020'),
(508, '205185007', 'Fadlin Sakina', 'Belawan', '2003-02-28', '2', 'U-30', '2020'),
(509, '204185006', 'Abdillah Shaomi', 'Simpang Empat', '2002-11-24', '1', 'Aktif', '2020'),
(510, '206107015', 'MAYA SILVIA', 'MEDAN', '2002-05-29', '2', 'Aktif', '2020'),
(511, '206107016', 'NURAISYAH', 'MEDAN', '2002-12-17', '2', 'Aktif', '2020'),
(512, '205107011', 'REZA LAKSAMANA NUSANTARA', 'JAKARTA', '2001-12-15', '1', 'Pindah Prakuliah-F001', '2020'),
(513, '205107012', 'SARAH FADILLAH', 'MEDAN', '2002-06-21', '2', 'Aktif', '2020'),
(514, '205107013', 'SILVI MUDRIKAH HARAHAP', 'PADANG SIDEMPUAN', '2002-08-17', '2', 'Aktif', '2020'),
(515, '205107014', 'NIKO NATA NAIL SARAGIH', 'TEBING TINGGI', '2002-09-10', '1', 'Aktif', '2020'),
(516, '205107015', 'CINTAYA KARINA', 'MEDAN', '2002-03-12', '2', 'Batal Registrasi', '2020'),
(517, '205107016', 'MELINDAH MUTIA SARI', 'MEDAN', '2001-11-12', '2', 'Batal Registrasi', '2020'),
(518, '205185008', 'Adera Dwi Sandi', 'Gunung Para', '2002-05-10', '2', 'Aktif', '2020'),
(519, '204185007', 'Alfia Maulia Ifada', 'Sonomartani', '2002-07-29', '2', 'Aktif', '2020'),
(520, '205185009', 'Dahnial Fiqri', 'Selotong', '2002-07-11', '1', 'Aktif', '2020'),
(521, '204185008', 'Irfan Pratama', 'Medan', '2002-05-23', '1', 'Aktif', '2020'),
(522, '206185005', 'Pril Manda Haviz', 'Karang Gading', '2002-04-30', '1', 'Pindah Prakuliah-', '2020'),
(523, '206185006', 'Nurul Puspita', 'Sibolga', '2002-05-23', '2', 'Pindah Ke-F001', '2020'),
(524, '205107017', 'IMAM WIRANTO', 'MEDAN', '2000-06-25', '1', 'Aktif', '2020'),
(525, '205107018', 'PUTRI APRIZA NST', 'BINJAI', '2002-04-25', '2', 'Batal Registrasi', '2020'),
(526, '205107019', 'DINI LESTARI', 'TUNGGURONO', '2001-03-10', '2', 'Batal Registrasi', '2020'),
(527, '204107008', 'ANISTA MAHARANI PANE', 'KUTACANE', '2002-12-29', '2', 'Aktif', '2020'),
(528, '206107017', 'DINA RAYHAN SYAHFITRI', 'TUNTUNGAN', '2002-12-19', '2', 'Aktif', '2020'),
(529, '205107020', 'WULANDARI', 'GUNUNG GERTAM', '2001-04-02', '2', 'Pindah Prakuliah-B001', '2020'),
(530, '205185010', 'Sri Rahayu', 'Paluh Manan', '2002-12-30', '2', 'Aktif', '2020'),
(531, '205185011', 'Safariah Putri Br Tarigan', 'Medan', '2002-04-23', '2', 'Aktif', '2020'),
(532, '205185012', 'Windah Sari Gultom', 'Jakarta', '2002-06-24', '2', 'Aktif', '2020'),
(533, '205185013', 'Shyva Rainanda', 'Aek Kota Batu', '2002-06-24', '2', 'Pindah Ke-B001', '2020'),
(534, '205107021', 'MELIYANA', 'PAYABAKUNG', '2002-05-24', '2', 'Aktif', '2020'),
(535, '205185014', 'Prita Vinda Fadilla', 'Rantau Prapat', '2001-09-18', '2', 'U-30', '2020'),
(536, '205185015', 'M. Aziez Ramadhan', 'Medan', '2002-11-27', '1', 'U-30', '2020'),
(537, '205185016', 'Fahmi Sari', 'Air Batu', '2002-02-26', '2', 'U-30', '2020'),
(538, '204107009', 'EKO PRAMUDA S', 'PANTAI CERMIN', '2002-06-26', '1', 'U-30', '2020'),
(539, '205107022', 'HIZBULLAH ALFASYIMI', 'JULOK', '2001-01-30', '1', 'Aktif', '2020'),
(540, '205107023', 'SINDI BELA SAPITRI', 'SAWIT REJO', '2001-04-22', '2', 'Batal Registrasi', '2020'),
(541, '204107010', 'ABD. ROSYID TANJUNG', 'SINUNUKAN 3', '2002-10-25', '1', 'Aktif', '2020'),
(542, '205107024', 'WULAN APRITA SARI', 'INDRAPURA', '2002-04-22', '2', 'Aktif', '2020'),
(543, '205107025', 'AMELIA DWI SYAHPUTRI', 'KLUMPANG KEBUN', '2002-05-06', '2', 'Aktif', '2020'),
(544, '206107018', 'HAFIZ RAHMAN', 'KLUMPANG', '2002-08-08', '1', 'Aktif', '2020'),
(545, '205107026', 'AYUNDA AMALLIYA', 'MEDAN', '2002-02-05', '2', 'Aktif', '2020'),
(546, '204107011', 'RAHMAT EGA PASTIKA', 'MEDAN', '2002-12-16', '1', 'Aktif', '2020'),
(547, '205107027', 'DHEA VIONA', 'BAHAPAL', '2002-11-14', '2', 'Aktif', '2020'),
(548, '204107012', 'MUHAMMAD ASWIN', 'MEDAN', '2002-09-26', '1', 'Aktif', '2020'),
(549, '204107013', 'SUHARDI', 'SIHOPUR', '2001-10-10', '1', 'Aktif', '2020'),
(550, '205185017', 'Adella', 'Pondok Tengah', '2001-02-20', '2', 'U-30', '2020'),
(551, '205185018', 'Alisya Anjani', 'Serbelawan', '2002-12-08', '2', 'U-30', '2020'),
(552, '205185019', 'Indah Sari Maulidiah', 'Medan', '2002-06-17', '2', 'Pindah Ke-B001', '2020'),
(553, '205107028', 'MARWA HUTARI', 'TAKENGON', '2001-09-09', '2', 'Aktif', '2020'),
(554, '205185020', 'Febrina Hutagalung', 'Bah Muka', '2002-02-18', '2', 'U-30', '2020'),
(555, '205185021', 'Fika Widiana', 'Medan', '2002-05-18', '2', 'Aktif', '2020'),
(556, '205107029', 'NOVIANDA SUCI MAGHFIRA', 'MEDAN', '2001-11-20', '2', 'Aktif', '2020'),
(557, '205107030', 'HERMA PUTRI BR GINTING', 'KUALA', '2002-07-30', '2', 'Aktif', '2020'),
(558, '204185009', 'Hadhitiya Virya K', 'Medan', '2001-04-14', '1', 'Pindah Ke-A001', '2020'),
(559, '205107031', 'KIKI ELFITRIANI', 'KEBUN KOPI', '2001-12-16', '2', 'Aktif', '2020'),
(560, '205107032', 'TRI DELI TAMY', 'DESA BARU', '2001-09-06', '2', 'Aktif', '2020'),
(561, '205107033', 'NURAINI', 'UJUNG KUBU', '2002-05-02', '2', 'Aktif', '2020'),
(562, '205107034', 'Yusnanda Riani', 'Aek Batu', '2002-05-13', '', 'Aktif', '2020'),
(563, '204185010', 'Richa Handayani', 'Perk Negeri Lama', '2001-12-12', '2', 'U-30', '2020'),
(564, '205185022', 'Khairani Nurhamidah', 'Kota Rantang', '2001-06-05', '2', 'Aktif', '2020'),
(565, '206185007', 'M Fazlan Johan', 'Medan', '2002-07-02', '1', 'U-30', '2020'),
(566, '204185011', 'Erni Ronavli Situmorang', 'Rengas Pulau', '2002-08-13', '2', 'Aktif', '2020');
INSERT INTO `tb_mahasiswa` (`id`, `nim`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `status`, `angkatan`) VALUES
(567, '205107035', 'APRIZA AFIFAH SATORI', 'MEDAN', '2003-04-06', '2', 'Aktif', '2020'),
(568, '205107036', 'NURUL FACHIRA', 'Tanjung Beringin', '2002-08-11', '1', 'Aktif', '2020'),
(569, '205107037', 'Ratih Nirmala', 'seimencirim', '2002-07-17', '1', 'Aktif', '2020'),
(570, '204107025', 'WAHYU ANANDA', '2001-10-27', '2020-06-08', '1', 'Aktif', '2020'),
(571, '205185067', 'Ira Netania Br Sitepu', 'Binjai', '2002-01-25', '2', 'Aktif', '2020'),
(572, '205107054', 'Diki wahyudi', 'Kab. Serdang Bedagai', '2001-09-05', '1', 'Aktif', '2020'),
(573, '204107016', 'MUHAMMAD ALRYOGA AZZIKRY', 'MEDAN', '2003-11-07', '1', 'Batal Registrasi', '2020'),
(574, '205107039', 'DANIEL PRAWIRO SUGANDA', 'MEDAN', '2000-10-27', '1', 'Aktif', '2020'),
(575, '206107024', 'Sinta lestari', 'Kab. Karo', '2001-06-09', '2', 'Aktif', '2020'),
(576, '205107041', 'Andrew Natanael Nainggolan', 'Kota Medan', '2001-12-27', '1', 'Aktif', '2020'),
(577, '204107023', 'Muhammad robi apriansyah', 'Mekar mulio', '2002-04-10', '1', 'Batal Registrasi', '2020'),
(578, '205107052', 'Silva nandita', 'Sei semayang', '2002-06-11', '2', 'Aktif', '2020'),
(579, '204185019', 'Rafli Lubis', 'Medan', '2002-03-10', '1', 'Aktif', '2020'),
(580, '206107023', 'Tarisa Mahendra', 'Kisaran', '2002-03-25', '2', 'Aktif', '2020'),
(581, '205107049', 'Aisya Naomi Yohana Sinaga', 'Jakarta', '2001-09-17', '1', 'Pindah Prakuliah-F001', '2020'),
(582, '204107024', 'Muhammad Tirta Triastama', 'Kisaran', '2002-05-17', '1', 'Aktif', '2020'),
(583, '205107051', 'Yayang Pradita', 'Sei Rumbia', '2002-06-19', '2', 'Aktif', '2020'),
(584, '205107050', 'BIMA RIFANDY NASUTION', 'Kab. Deli Serdang', '2002-10-13', '1', 'Aktif', '2020'),
(585, '204107022', 'Akbar Ramadhan Rusdi', 'Kab. Asahan', '2002-11-27', '1', 'Batal Registrasi', '2020'),
(586, '206107022', 'Dwicka Pradila', 'Lantasan Baru', '2002-03-16', '1', 'Aktif', '2020'),
(587, '204107021', 'Sukri Ismanto', 'Batumbulan asli ', '1997-10-31', '1', 'Aktif', '2020'),
(588, '205107044', 'ALISYAH PUTRI', 'Firdaus,2000-09-16', '2020-06-15', '', 'Aktif', '2020'),
(589, '205107045', 'Nopani Wandira', 'Medan', '2001-11-10', '2', 'Aktif', '2020'),
(590, '205107046', 'DWI SYAFITRI', '2000-12-27', '2020-06-16', '2', 'Aktif', '2020'),
(591, '205107047', 'Abdullah wira akbar', 'Kutacane', '2002-05-18', '1', 'Aktif', '2020'),
(592, '204185021', 'Abdi Saputra', 'Melati II', '2001-05-13', '1', 'Aktif', '2020'),
(593, '206185022', 'Tari Ramadhani', 'Sei Siur', '2002-01-09', '2', 'U-30', '2020'),
(594, '205107048', 'PRIL MANDA HAVIZ', 'KARANG GADING', '2002-04-30', '1', 'U-30', '2020'),
(595, '204107026', 'FIKRI AULIA AL JIBRAN', 'Medan', '2001-08-21', '1', 'Aktif', '2020'),
(596, '205185044', 'Tantri Anggraini', 'Medan', '2001-05-07', '2', 'Aktif', '2020'),
(597, '205107055', 'APRIZA AFIFAH SATORI', 'Medan', '2003-04-06', '1', 'U-30', '2020'),
(598, '205107056', 'FEBRI REANITHA BR KEMIT', 'Pancur batu', '2002-02-23', '2', 'Aktif', '2020'),
(599, '205107057', 'M faruq Abduh baizit', 'Medan', '2002-10-03', '', 'Aktif', '2020'),
(600, '206107025', 'Ezra Tri Cahya Zebua', 'Tetehosi', '2002-09-19', '2', 'Aktif', '2020'),
(601, '205107058', 'Elina Putri Br Milala', 'Medan', '2001-10-07', '1', 'Batal Registrasi', '2020'),
(602, '205107059', 'Setiawan', 'Desa suka maju', '2001-05-25', '1', 'Aktif', '2020'),
(603, '204185022', 'Fedri Septian', 'Melati II', '2002-09-04', '1', 'Aktif', '2020'),
(604, '205185045', 'Siti Nurhalima', 'Pegajahan', '2002-04-04', '2', 'U-30', '2020'),
(605, '205107060', 'SOFHIA ZEIN', 'Langkat', '2003-05-10', '', 'Batal Registrasi', '2020'),
(606, '205107061', 'WENDI SITUMORANG', 'Batam', '2001-03-29', '1', 'Aktif', '2020'),
(607, '204107027', 'djodly ichsan ankami', 'kota Binjai', '2001-07-27', '', 'Batal Registrasi', '2020'),
(608, '205107062', 'Artanti Salsabila', 'rantau prapat', '2002-01-27', '', 'Batal Registrasi', '2020'),
(609, '205185046', 'Salsabillah', 'Medan', '2002-09-19', '2', 'Aktif', '2020'),
(610, '206185023', 'Angga Kurniawan', 'Bulu Cina', '2002-10-26', '1', 'Aktif', '2020'),
(611, '206107026', 'ATIKA VIVIANTI', 'Medan', '2001-06-23', '', 'Pindah Prakuliah-A001', '2020'),
(612, '205107063', 'Alfina damayanti', 'Bekasi', '2002-03-18', '2', 'Aktif', '2020'),
(613, '205107064', 'Dwi putri fariza', 'Sidomulyo', '2002-01-10', '2', 'Aktif', '2020'),
(614, '205107065', 'Adella aprilyanti', 'Simpang kolqm', '2022-04-20', '2', 'Aktif', '2020'),
(615, '205107066', 'dicky andre irawan', 'bandar klippa', '2002-05-04', '1', 'Aktif', '2020'),
(616, '204185023', 'Lisa Juanda', 'Bingkat', '2002-10-06', '2', 'Aktif', '2020'),
(617, '204185024', 'Muhammad Azli Ritonga', 'Purwosari', '2002-06-29', '1', 'U-30', '2020'),
(618, '205185068', 'Mardiana Br Munthe', 'Pulo Jantan', '2002-07-14', '2', 'Pindah Ke-B001', '2020'),
(619, '206185024', 'Padilla Hawanda', 'Perlanaan', '2002-08-14', '2', 'U-30', '2020'),
(620, '204107028', 'FAHMI ASY\'RAFI', 'Medan', '2002-07-17', '1', 'Aktif', '2020'),
(621, '204107029', 'ANDRE STEVANUS SIDAURUK', 'MEDAN', '1997-03-03', '1', 'Aktif', '2020'),
(622, '205107069', 'FAIZATUL IZZATI', 'Pancur Batu', '2000-09-24', '2', 'Aktif', '2020'),
(623, '204185029', 'Adinda Gerardini', 'Medan', '2001-05-09', '2', 'Aktif', '2020'),
(624, '205185070', 'Nur Anisah Sinulingga', 'Kisaran', '2002-08-04', '2', 'Aktif', '2020'),
(625, '205107071', 'MIMI AMIKA', 'ALUS - ALUS', '2002-03-10', '2', 'Aktif', '2020'),
(626, '205107072', 'BELA ANGGRAINI', 'SEI SUKA DERAS', '2003-09-30', '2', 'Aktif', '2020'),
(627, '205107073', 'ATIKA VIVIANTI', 'Medan', '2001-06-23', '2', 'Aktif', '2020'),
(628, '204107030', 'ANDRIAN DWI NUR SHIFA', 'Karanganyar', '1997-02-11', '1', 'Aktif', '2020'),
(629, '204107031', 'EUNIKE MEULINA BR TARIGAN', 'Tanjung Morawa', '2003-08-02', '2', 'Aktif', '2020'),
(630, '204107032', 'Fakhrul Arrasyid', 'Lhokseumawe', '2002-09-09', '1', 'Aktif', '2020'),
(631, '204107033', 'Achmad Fauzi Hasibuan', 'Medan', '1998-05-04', '1', 'Aktif', '2020'),
(632, '204107034', 'MARTHIN KENOI MAKARIOI HUTAGALUNG', 'Medan', '2002-03-12', '', 'Batal Registrasi', '2020'),
(633, '204107035', 'Muhammad Tegar Syah Pratama', 'Kota Medan', '2002-08-29', '', 'Aktif', '2020'),
(634, '204107036', 'Rahel windyta sinambela', 'Pematangsiantar', '2020-08-22', '2', 'Aktif', '2020'),
(635, '204107037', 'Rizky Farhan Hafiz', 'Kutacane', '2002-07-02', '', 'Aktif', '2020'),
(636, '204107038', 'TENGKU AJI IMRON', 'Kisaran', '2003-03-06', '1', 'Aktif', '2020'),
(637, '205107074', 'AYU SEFHIA', 'Binjai', '2002-09-28', '1', 'Batal Registrasi', '2020'),
(638, '205107075', 'GAHALI TEGU PRATAMA', 'P. SIANTAR', '2002-11-15', '1', 'Aktif', '2020'),
(639, '205107076', 'Hanna Izzati Ar- Raudhah', 'Pekan Bahapal', '2002-07-03', '2', 'Batal Registrasi', '2020'),
(640, '205107077', 'Hizkia Purba', 'Medan', '2002-09-22', '1', 'Aktif', '2020'),
(641, '205107078', 'Hotman Sirait', 'Cinta Damai', '2001-04-18', '1', 'Aktif', '2020'),
(642, '205107079', 'Nandito Farhan', 'Kuala Simpang', '2000-10-06', '1', 'Aktif', '2020'),
(643, '205107080', 'Ridho Helmy Dermawan', 'Kutapanjang', '2001-05-01', '1', 'Pindah Ke-F001', '2020'),
(644, '205107081', 'Suci Pratiwi', 'Desa Panam', '2002-06-21', '2', 'Aktif', '2020'),
(645, '205107082', 'SYAHGA IFAZI', 'PUJI MULYO', '2002-03-06', '1', 'Pindah Ke-F001', '2020'),
(646, '205107083', 'TASSYA ANGGELICA SIBARANI', 'DURIRIAU', '2003-01-04', '2', 'Aktif', '2020'),
(647, '206107027', 'Indra Gunawan', 'P. Cengkiring', '2001-10-15', '1', 'U-30', '2020'),
(648, '206107028', 'Suriyana', 'Medan ', '2002-02-28', '', 'Pindah Prakuliah-A001', '2020'),
(649, '204107039', 'Monika merlina sari sihombing', 'Dumai', '2001-08-18', '', 'U-30', '2020'),
(650, '205107084', 'ENY ZULIA MANIK', 'sukandebi', '2002-06-27', '2', 'Aktif', '2020'),
(651, '205107085', 'Try Rezki Kurniawan', 'Medan', '1998-06-29', '1', 'Aktif', '2020'),
(652, '206185025', 'Dea Salsa Bilia', 'Medan', '2002-08-06', '2', 'Aktif', '2020'),
(653, '205185071', 'Yholanda Veranita', 'Kampung Pajak', '2002-02-08', '2', 'Aktif', '2020'),
(654, '206185026', 'Desi Mutia', 'Medan', '2002-02-24', '2', 'Aktif', '2020'),
(655, '205107086', 'Ince Crysti Br Surbakti', 'Berastagi', '2002-03-05', '2', 'Aktif', '2020'),
(656, '206185027', 'Indra Gunawan', 'Pematang Cengkring', '2001-10-15', '1', 'Aktif', '2020'),
(657, '205185072', 'Luthfiah Siska Wardhani', 'Hamparan Perak', '2001-12-14', '2', 'U-30', '2020'),
(658, '206185028', 'Mita Yolanda', 'Sampali', '2002-08-09', '2', 'Aktif', '2020'),
(659, '206185029', 'Nur Annisa', 'Sungai Ular', '2002-11-02', '2', 'U-30', '2020'),
(660, '206185030', 'Putri Nurhaliza', 'Medan', '2001-05-28', '2', 'Aktif', '2020'),
(661, '205185073', 'Rizki Wanda Sari', 'Medan', '2001-12-12', '2', 'Aktif', '2020'),
(662, '205185074', 'Shiva Riski', 'Kota Pinang', '2002-02-05', '1', 'Aktif', '2020'),
(663, '206185031', 'Siti Aqilah Putri Nugroho', 'Jambi', '2002-09-07', '2', 'Aktif', '2020'),
(664, '204185030', 'Tri Armansyah', 'Kampung Banjar', '2002-03-03', '1', 'Aktif', '2020'),
(665, '206185032', 'Tri Heri Sutrisno', 'Rantau Prapat', '2000-04-20', '1', 'Aktif', '2020'),
(666, '206185033', 'Tri Yani', 'Desa Paluh Manis', '2002-01-10', '2', 'Aktif', '2020'),
(667, '205185075', 'Desita Adinda Putri Lubis', 'Bandar Selamat', '2002-08-23', '2', 'U-30', '2020'),
(668, '204107057', 'SYAHGA IFAZI', 'PUJI MULYO', '2002-03-06', '1', 'Aktif', '2020'),
(669, '206107029', 'Zaira chairumi', 'Binjai', '2002-05-26', '2', 'Aktif', '2020'),
(670, '206107030', 'Dinda Araini', 'Tami Delem', '2002-02-09', '2', 'Aktif', '2020'),
(671, '205107087', 'Benny Armando', 'Aek nabara', '2002-07-23', '1', 'Pindah Prakuliah-F001', '2020'),
(672, '204107040', 'Simon Petrus Adrian Pakpahan', 'Siborong-borong', '2001-08-05', '1', 'Aktif', '2020'),
(673, '205107088', 'MELDA DELIA BR ARITONANG', 'BERTAH', '2001-11-05', '2', 'Aktif', '2020'),
(674, '206107031', 'Zata Mayyiza', 'Paya Bakung', '2003-01-21', '2', 'Aktif', '2020'),
(675, '205107089', 'Mikhael Aleksander Hutajulu', 'Balige', '2002-01-06', '1', 'Aktif', '2020'),
(676, '205107090', 'ADRIAN MARITO SITANGGANG', 'DURI', '2002-09-30', '1', 'Aktif', '2020'),
(677, '204107041', 'Dwi Tria', 'Melati', '2019-11-05', '2', 'Aktif', '2020'),
(678, '204107051', 'Alex Sandro Nesta Tampubolon', 'Siborong-borong', '2002-08-28', '1', 'Aktif', '2020'),
(679, '205107091', 'Alexander Robintang Gurning', 'Medan', '1999-09-08', '1', 'Pindah Prakuliah-F001', '2020'),
(680, '205107092', 'Chandra Syahputra', 'Kulon Progo', '2001-08-10', '1', 'Aktif', '2020'),
(681, '205107093', 'Rara Ayu Jingga', 'Medan', '2003-01-22', '2', 'Aktif', '2020'),
(682, '204107042', 'Bagus Suprayitno', 'Medan', '2001-07-17', '1', 'Aktif', '2020'),
(683, '205107094', 'Dini Tri Aprillia', 'Medan', '2001-04-05', '2', 'Aktif', '2020'),
(684, '204185031', 'Benny armando', 'Aek nabara', '2002-07-23', '', 'Aktif', '2020'),
(685, '206185034', 'Nur Aisyah', 'Pangkalan Brandan', '2002-10-22', '2', 'Aktif', '2020'),
(686, '205107095', 'Martha Septiana L. Tobing', 'Medan', '2001-09-27', '2', 'Aktif', '2020'),
(687, '204107043', 'Roelly Wibawa Putra Pamungkas', 'Medan', '2020-01-19', '', 'Pindah Prakuliah-A001', '2020'),
(688, '204107044', 'Andre Stevanus Sidauruk', 'Medan', '1997-03-03', '', 'U-30', '2020'),
(689, '205107096', 'Eni Angraini situmeang', 'Parombunan', '2003-03-06', '2', 'Aktif', '2020'),
(690, '206107032', 'Silvia Liony Br. Manalu', 'Medan', '2002-05-29', '2', 'Aktif', '2020'),
(691, '205107097', 'Fuji bagus cahyono', 'Sei sijenggi', '2000-12-20', '1', 'Aktif', '2020'),
(692, '205107098', 'muhammad wahyu setiawan', 'stabat', '1996-07-28', '', 'Aktif', '2020'),
(693, '204107045', 'Wahyu Ardiansyah', 'Tumpatan NIbung', '2001-07-13', '1', 'Aktif', '2020'),
(694, '206107033', 'Grace Santa Br. Siahaan', 'Tanjungbalai', '2000-05-24', '2', 'Aktif', '2020'),
(695, '205107099', 'Aldo Rizqi Pratama', '1998-02-20', '2020-09-20', '', 'Aktif', '2020'),
(696, '206107034', 'Agustinus Herman Zendrato', 'Hiligodu', '2001-08-10', '1', 'Aktif', '2020'),
(697, '205107100', 'Ayu Amanda Br Napitupulu', 'Besitang', '2003-03-03', '2', 'Aktif', '2020'),
(698, '205107101', 'Roelly Wibawa Putra Pamungkas', 'Medan', '2020-01-19', '1', 'Aktif', '2020'),
(699, '205107102', 'Suriyana', 'Medan ', '2002-02-28', '', 'Aktif', '2020'),
(700, '206107035', 'putri supranningsih caniago', 'Perbaungan', '2002-12-07', '2', 'Pindah Ke-A001', '2020'),
(701, '205185076', 'Fahrur Rozi', 'Lubuk Dendang', '2002-01-24', '1', 'Pindah Ke-B001', '2020'),
(702, '206185035', 'Indah Sarah', 'Medan', '2003-07-23', '2', 'Aktif', '2020'),
(703, '206107036', 'Bangga Josua sinaga', 'Pematang Siantar', '2001-10-23', '', 'Aktif', '2020'),
(704, '204107046', 'MULADJI IBNA', 'Medan', '2001-10-30', '1', 'Aktif', '2020'),
(705, '206107037', 'DINI RAMADHANI', 'Kaban Jahe', '2001-11-25', '', 'Aktif', '2020'),
(706, '205107103', 'Muhammad Dani Pranata', 'Tumpatan NIbung', '2002-04-19', '1', 'Aktif', '2020'),
(707, '204107047', 'Andreas Rofrans Sadewa Sitanggang', 'Medan', '2000-12-08', '1', 'Aktif', '2020'),
(708, '205185077', 'Hadhitiya Virya K', 'Medan', '2001-04-14', '1', 'Aktif', '2020'),
(709, '204185032', 'Nurul Puspita', 'Sibolga', '2002-05-23', '2', 'Aktif', '2020'),
(710, '206185036', 'Shyva Rainanda', 'Aek Kota Batu', '2002-06-24', '2', 'Aktif', '2020'),
(711, '205185078', 'Ibnul Asir', 'Klambir V', '2001-10-30', '1', 'Aktif', '2020'),
(712, '206185037', 'Fahrur Rozi', 'Lubuk Dendang', '2002-01-24', '1', 'Aktif', '2020'),
(713, '206185038', 'Indah Sari Maulidiah', 'Medan', '2002-06-17', '2', 'Aktif', '2020'),
(714, '206185039', 'Mardiana Br Munthe', 'Pulo Jantan', '2002-07-14', '2', 'Aktif', '2020'),
(715, '206185040', 'Fatma Juliana', 'Medan', '2002-07-01', '2', 'Aktif', '2020'),
(716, '205107104', 'ANDIKA PERMANA', 'SUKARAYA', '2002-05-09', '1', 'Aktif', '2020'),
(717, '206107038', 'WULANDARI', 'GUNUNG GERTAM', '2001-04-02', '2', 'Pindah Prakuliah-A001', '2020'),
(718, '204107048', 'Aisya Naomi Yohana Sinaga', 'Jakarta', '2001-09-17', '1', 'Pindah Prakuliah-A001', '2020'),
(719, '204107049', 'Alexander Robintang Gurning', 'Medan', '1999-09-08', '1', 'Aktif', '2020'),
(720, '204107050', 'REZA LAKSAMANA NUSANTARA', 'JAKARTA', '2001-12-15', '1', 'Aktif', '2020'),
(721, '204107052', 'MELISYAH', 'MEDAN', '2002-04-16', '2', 'Aktif', '2020'),
(722, '204107053', 'Benny Armando', 'Aek nabara', '2002-07-23', '1', 'Aktif', '2020'),
(723, '205107105', 'Pril Manda Haviz', '', '1900-01-00', '', 'Aktif', '2020'),
(724, '205107106', 'Aisya Naomi Yohana Sinaga', 'Jakarta', '2001-09-17', '1', 'Pindah Prakuliah-F001', '2020'),
(725, '205107107', 'WULANDARI', 'GUNUNG GERTAM', '2001-04-02', '2', 'Pindah Prakuliah-B001', '2020'),
(726, '206107039', 'ANNIKE PUTRI', 'MEDAN', '2001-11-05', '2', 'Aktif', '2020'),
(727, '205107108', 'Arya Rizky Maulana Harahap', 'Medan', '2001-06-05', '1', 'Aktif', '2020'),
(728, '206107040', 'M. ALWI WAHAB', 'NOGO REJO', '2000-01-05', '1', 'Aktif', '2020'),
(729, '206107042', 'WULANDARI', 'GUNUNG GERTAM', '2001-04-02', '2', 'Aktif', '2020'),
(730, '204107054', 'M. Fakhri ihsan', 'Tebing tinggi ', '2002-09-16', '1', 'Aktif', '2020'),
(731, '204107055', 'Aisya Naomi Yohana Sinaga', 'Jakarta', '2001-09-17', '2', 'Aktif', '2020'),
(732, '205107117', 'putri supranningsih caniago', 'Perbaungan', '2002-12-07', '2', 'Aktif', '2020'),
(733, '204107079', 'Ridho Helmy Dermawan', 'Kutapanjang', '2001-05-01', '1', 'Aktif', '2020'),
(734, '214185001', 'Sevana Rizki Lubis', 'Lubuk Pakam', '2002-06-19', '', 'Aktif', '2021'),
(735, '215185002', 'M Rafly Givari', 'Medan', '2021-02-02', '', 'Aktif', '2021'),
(736, '215185001', 'Juanda Rajwa Putra Negara', 'Medan', '2002-09-16', '', 'Aktif', '2021'),
(737, '214185006', 'Dicky Darmawan', 'Medan', '2021-09-25', '', 'Aktif', '2021'),
(738, '215185004', 'Radika Fitri Hadi', 'Medan', '2003-11-23', '', 'Aktif', '2021'),
(739, '214185005', 'Ahmad Dzikri Fuadi', 'Tegal', '2002-01-13', '', 'Aktif', '2021'),
(740, '214185004', 'Habib Arianto', 'Belawan', '2003-07-09', '', 'Aktif', '2021'),
(741, '214185003', 'Suci Dwitasari', 'Bulu Cina', '2003-12-23', '', 'Aktif', '2021'),
(742, '215185003', 'Nasya Ayu Lestari Horoni', 'Medan', '2003-07-19', '', 'Aktif', '2021'),
(743, '214185002', 'Syafrizal Aditya Pratama', 'Medan', '2003-04-26', '', 'Aktif', '2021'),
(744, '930', 'testing2', 'mana', '2021-04-26', '1', 'Aktif', '2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengajuanmagang`
--

CREATE TABLE `tb_pengajuanmagang` (
  `id` int(11) NOT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `nama_mahasiswa` varchar(100) DEFAULT NULL,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `posisi` varchar(100) DEFAULT NULL,
  `persyaratan` varchar(100) DEFAULT NULL,
  `tgl_berakhir` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengajuanmagang`
--

INSERT INTO `tb_pengajuanmagang` (`id`, `nim`, `nama_mahasiswa`, `nama_perusahaan`, `posisi`, `persyaratan`, `tgl_berakhir`, `alamat`, `status`) VALUES
(1, '18412016', 'Dimas Aji Saputra', 'Pohon Tumbang', 'buat kopi', '<p>apa aja laa</p><p>expert dalam perkopian</p>', '2021-07-04', 'jl. merak jingga', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sppm`
--

CREATE TABLE `tb_sppm` (
  `id` int(10) NOT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `tgl_lahir` varchar(20) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(100) DEFAULT NULL,
  `usia` varchar(20) DEFAULT NULL,
  `nohp` varchar(20) DEFAULT NULL,
  `ipk1` varchar(10) DEFAULT NULL,
  `ipk2` varchar(10) DEFAULT NULL,
  `ipk3` varchar(10) DEFAULT NULL,
  `ipk4` varchar(10) DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL,
  `tahun_angkatan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sppm`
--

INSERT INTO `tb_sppm` (`id`, `nim`, `nama`, `tempat`, `tgl_lahir`, `prodi`, `lokasi_kampus`, `usia`, `nohp`, `ipk1`, `ipk2`, `ipk3`, `ipk4`, `total`, `tahun_angkatan`) VALUES
(23, '34920', 'ridwan', 'gitu la', '2021-06-07', 'TK', 'POLITEKNIK LP3I MEDAN', '23', '08262626', '3.5', '3.4', '2.2', '3.3', '3.1', '2018'),
(24, '1988776', 'testing', 'mana', '2021-05-30', 'AK', 'POLITEKNIK LP3I MEDAN', '23', '08262626', '2', '2', '3.5', '2', '2.375', '2018');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pass_adm`
--
ALTER TABLE `pass_adm`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tb_cnp`
--
ALTER TABLE `tb_cnp`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tb_cvmahasiswa`
--
ALTER TABLE `tb_cvmahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_lowonganmagang`
--
ALTER TABLE `tb_lowonganmagang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pengajuanmagang`
--
ALTER TABLE `tb_pengajuanmagang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_sppm`
--
ALTER TABLE `tb_sppm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pass_adm`
--
ALTER TABLE `pass_adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_cnp`
--
ALTER TABLE `tb_cnp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_cvmahasiswa`
--
ALTER TABLE `tb_cvmahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_lowonganmagang`
--
ALTER TABLE `tb_lowonganmagang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=745;

--
-- AUTO_INCREMENT untuk tabel `tb_pengajuanmagang`
--
ALTER TABLE `tb_pengajuanmagang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_sppm`
--
ALTER TABLE `tb_sppm`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
