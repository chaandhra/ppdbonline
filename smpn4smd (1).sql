-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Mar 2017 pada 11.24
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smpn4smd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '!#/)zW¥§C‰JJ€Ã'),
(2, 'agus', 'agus@a.com', 'ýñiU‚BîÊywºÃ'),
(3, 'asep', 'asep@a.com', 'Ü…^û\rÇGg`¯ª(eñ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` int(10) NOT NULL,
  `judul` text NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` text NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `tanggal`, `jenis`, `isi`) VALUES
(1, 'pengumuman libur', '2016-05-05', 'pengumuman', 'besok libur ya gaiss... ok ingat itu..'),
(3, '  judul berita', '2016-05-18', 'Pengumuman', '<p>a</p>\r\n\r\n<p><br />\r\n&lt;div class=&quot;container&quot;&gt;<br />\r\n&lt;div class=&quot;row&quot;&gt;<br />\r\n&lt;div class=&quot;col-md-12&quot;&gt;</p>\r\n\r\n<p>&lt;h3&gt;Berita / Informasi&lt;/h3&gt;</p>\r\n\r\n<p>&lt;div class=&quot;col-md-4&quot;&gt;</p>\r\n\r\n<p>&nbsp; &lt;?php<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ini_set(&quot;display_errors&quot;,0);<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $query = &quot;SELECT * FROM berita&quot;; &nbsp; &nbsp; &nbsp;&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $records_per_page=3;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $newquery = $crud-&gt;paging($query,$records_per_page);<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; $crud-&gt;berita($newquery);<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;?&gt;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n'),
(4, '  apa ajah', '2016-05-17', 'Berita', '<ol>\r\n	<li>Satuan Karya Pramuka Tarunabumi (Pertanian)</li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>Krida Pertanian dan Tanaman Pangan</li>\r\n	<li>Krida Pertanian Tanaman Perkebunan</li>\r\n	<li>Krida Perikanan</li>\r\n	<li>Krida Peternakan</li>\r\n	<li>Krida Pertanian Tanaman Holtikultura\r\n	<ol>\r\n		<li>Satuan Karya Pramuka Wanabakti (Kehutanan)</li>\r\n	</ol>\r\n	</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Krida Pertanian dan Tanaman Pangan</li>\r\n	<li>Krida Pertanian Tanaman Perkebunan</li>\r\n	<li>Krida Perikanan</li>\r\n	<li>Krida Peternakan</li>\r\n</ul>\r\n\r\n<p>Krida Pertanian Tanaman Holtikultura</p>\r\n'),
(5, '   judul berita ', '2016-05-18', 'Pengumuman', '<p><strong>Dilengkapi berbagai layanan terbaik Microsoft</strong></p>\r\n\r\n<p>Lumia 532 Dual SIM adalah smartphone canggih dengan software dan fitur baru Windows yang terbaik. Menggunakan prosesor quad-core Snapdragon&trade; dan dilengkapi layanan populer Microsoft seperti Skype, OneDrive, dan Office.</p>\r\n\r\n<h3>Video call dengan Skype</h3>\r\n\r\n<p>Lumia 532 Dual SIM memiliki kamera depan dan dilengkapi layanan dari Skype. Upgrade video call biasa ke video call Skype, terima telepon Skype kapan saja, dan hubungi teman atau keluarga dengan Skype langsung dari daftar kontak. Video chat dengan orang yang kamu sayangi.</p>\r\n\r\n<h3>Selalu terhubung dengan teman dan keluarga kamu</h3>\r\n\r\n<p>Microsoft Lumia 532 Dual SIM sudah dilengkapi berbagai jejaring sosial media favorit, seperti Instagram, Path, Twitter, Facebook dan lainnya. Selain itu, kamu bisa selalu terhubung dengan berbagai aplikasi chat seperti WhatsApp, BBM dan masih banyak yang lain.</p>\r\n\r\n<h3>Lebih seru dengan berbagai hiburan</h3>\r\n\r\n<p>Nggak ada lagi bosan dengan Microsoft Lumia 532 Dual SIM. Mau dengerin musik? Di MixRadio, ada 21 juta lagu yang bisa kamu nikmati secara gratis. Selain itu kamu juga bisa mainkan berbagai game favorit seperti Candy Crush Saga atau Minecraft dan juga Despicable Me.</p>\r\n\r\n<h3>Atur smartphone kamu jadi lebih personal</h3>\r\n\r\n<p>Lumia 532 Dual SIM memiliki berbagai fitur baru yang hebat dan menambahkan sentuhan yang lebih personal di smartphone kamu. Live Folders memudahkan kamu mengatur Start screen dan Glance Screen memberikan akses cepat ke semua jadwal di kalender dan pemberitahuan dari jaringan sosial.</p>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bk`
--

CREATE TABLE `bk` (
  `id` int(100) NOT NULL,
  `kode_siswa` varchar(100) NOT NULL,
  `kode_kelas` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `catatan` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bk`
--

INSERT INTO `bk` (`id`, `kode_siswa`, `kode_kelas`, `tanggal`, `catatan`, `keterangan`) VALUES
(20, 'S0006', 'K001', '2016-04-30', 'chat ', 'chat'),
(26, 'S0001', 'K001', '2016-05-04', 'kabur w', 'hukuman a'),
(27, 'S0001', 'K001', '2016-05-04', 'pel 2', 'peringatan'),
(28, 'S0002', 'K001', '2016-05-05', 'kabur', 'hukum'),
(29, 'S0002', 'K001', '2016-05-18', 'ghjg', 'kjhjk\r\n'),
(30, 'S0003', 'K001', '2016-11-01', 'kabur', 'kabur'),
(31, 'S0003', 'K001', '2016-11-02', 'bolos', 'bolos'),
(32, 'S0004', 'K001', '2016-11-03', 'kabur', 'kabur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekskul`
--

CREATE TABLE `ekskul` (
  `id` int(10) NOT NULL,
  `nama` text NOT NULL,
  `ketua` text NOT NULL,
  `kontak` text NOT NULL,
  `jadwal` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ekskul`
--

INSERT INTO `ekskul` (`id`, `nama`, `ketua`, `kontak`, `jadwal`, `keterangan`) VALUES
(1, 'Paskibra', 'DEDE', '123', 'Senin', 'ini keterangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `kode_guru` char(5) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `status_aktif` enum('Aktif','Tidak') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`kode_guru`, `nip`, `nama_guru`, `kelamin`, `alamat`, `no_telepon`, `status_aktif`) VALUES
('G0001', '201200001', 'Indah Indriyanna', 'Perempuan', 'Jl. Janti, Agen JNE, Karang Jambe, Yogyakarta', '081911111111', 'Aktif'),
('G0002', '201200002', 'Sulistiyowati', 'Perempuan', 'Jl. Suhada, Labuhan Ratu 1, Way Jepara, Lampung Timur 2', '08522211100011', 'Tidak'),
('G0003', '201200003', 'Juwantod', 'P', 'Jl. Manggarawan, Labuhan Ratu 5 Way Jepara', '0819111122223', 'Aktif'),
('G0004', '201200004', 'Nano Hendrawan', 'L', 'Jl. Margahayu, Labuhan Ratu Baru, Way Jepara, Lampung Timur', '08191111111222', 'Aktif'),
('G0005', '201200005', 'Fitria Prasetiawati', 'P', 'Jl. Parangtritis, 111, Bantulan, Yogyakarta', '08191818181818', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `idprofile`
--

CREATE TABLE `idprofile` (
  `id` int(10) NOT NULL,
  `profile` text NOT NULL,
  `alamat` text NOT NULL,
  `telepon` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `idprofile`
--

INSERT INTO `idprofile` (`id`, `profile`, `alamat`, `telepon`, `email`) VALUES
(1, '<p style="text-align:justify">profile sekolah anda....</p>\r\n', 'alamat sekolah', '0261- 12345      ', 'email@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(5) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_kegiatan` text NOT NULL,
  `keterangan` text NOT NULL,
  `poto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `tanggal`, `nama_kegiatan`, `keterangan`, `poto`) VALUES
(4, '2016-05-11', 'Paskibra', 'merupkan latihan rutin', '133771.jpg'),
(5, '2016-05-20', 'pramuka', 'pramuka', '830828.jpg'),
(6, '2016-05-20', 'pramuka', 'pramuka', '497085.jpg'),
(7, '2016-05-20', 'pramuka', 'pramuka', '254926.jpg'),
(8, '2016-05-20', 'Paskibra', 'merupkan latihan rutin', '567267.jpg'),
(9, '2016-05-20', 'volly', 'merupkan latihan rutin', '693148.jpg'),
(10, '2016-05-20', 'bebas', 'merupkan latihan rutin', '100113.jpg'),
(11, '2016-05-20', 'baslet', 'merupkan latihan rutin', '537450.jpg'),
(12, '2016-05-20', 'sa', 'merupkan latihan rutin', '747141.jpg'),
(13, '2016-11-01', 'belajar', 'bebas abjshaj', '886589.jpg'),
(14, '2016-11-02', 'belajar', 'belajar lagi', '165782.png'),
(15, '2016-11-03', 'belajar deui', 'bebas', '484891.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` char(4) NOT NULL,
  `tahun_ajar` varchar(12) NOT NULL,
  `kelas` char(4) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `kode_guru` char(5) NOT NULL,
  `status_aktif` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `tahun_ajar`, `kelas`, `nama_kelas`, `kode_guru`, `status_aktif`) VALUES
('K001', ' 2014/2015', 'VIII', 'Kelas B', 'G0001', 'Aktif'),
('K002', '  2014/2015', 'VII', 'Kelas B', 'G0003', 'Aktif'),
('K003', '   2014/2015', 'VII', 'Kelas A', 'G0005', 'Aktif'),
('K004', '2020/2010', 'VIII', 'Kelas A', 'G0001', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id` int(5) NOT NULL,
  `kode_kelas` char(4) NOT NULL,
  `kode_siswa` char(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id`, `kode_kelas`, `kode_siswa`) VALUES
(1, 'K003', 'S0001'),
(2, 'K004', 'S0002'),
(3, 'K001', 'S0003'),
(4, 'K001', 'S0004'),
(5, 'K001', 'S0006'),
(12, 'K002', 'S0010'),
(7, 'K002', 'S0008'),
(8, 'K002', 'S0009'),
(11, 'K002', 'S0007'),
(13, 'K002', 'S0005'),
(17, 'K001', 'S0011'),
(18, 'K003', 'S0001'),
(19, 'K003', 'S0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(5) NOT NULL,
  `semester` int(2) NOT NULL,
  `kode_pelajaran` char(4) NOT NULL,
  `kode_guru` char(5) NOT NULL,
  `kode_kelas` char(4) NOT NULL,
  `kode_siswa` char(5) NOT NULL,
  `nilai_tugas1` int(4) NOT NULL,
  `nilai_tugas2` int(4) NOT NULL,
  `nilai_uts` int(4) NOT NULL,
  `nilai_uas` int(4) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `semester`, `kode_pelajaran`, `kode_guru`, `kode_kelas`, `kode_siswa`, `nilai_tugas1`, `nilai_tugas2`, `nilai_uts`, `nilai_uas`, `keterangan`) VALUES
(1, 1, 'P001', 'G0002', 'K002', 'S0001', 74, 75, 90, 85, 'lebih giat belajar  ya '),
(3, 1, 'P001', 'G0002', 'K001', 'S0002', 75, 60, 80, 80, 'tingkatkan belajarnya'),
(4, 1, 'P001', 'G0003', 'K001', 'S0003', 70, 60, 75, 80, 'tingkatkan belajarnya'),
(5, 1, 'P001', 'G0004', 'K001', 'S0004', 75, 80, 75, 80, 'tingkatkan belajarnya'),
(7, 1, 'P001', 'G0001', 'K002', 'S0007', 70, 70, 75, 79, 'belajar terus'),
(8, 1, 'P001', 'G0002', 'K002', 'S0010', 78, 80, 75, 85, 'belajar terus'),
(9, 1, 'P001', 'G0002', 'K002', 'S0009', 78, 80, 75, 80, 'belajar terus ya'),
(10, 1, 'P001', 'G0002', 'K002', 'S0008', 85, 80, 85, 90, 'pertahankan belajarmu'),
(11, 1, 'P001', 'G0002', 'K002', 'S0005', 75, 75, 78, 80, 'kurang rajib belajar ya'),
(12, 1, 'P003', 'G0003', 'K001', 'S0006', 80, 85, 85, 90, 'pertahankan prestasimu'),
(13, 1, 'P003', 'G0002', 'K001', 'S0004', 70, 75, 70, 75, 'harus terus belajar'),
(14, 1, 'P003', 'G0002', 'K001', 'S0001', 75, 80, 80, 85, 'harus terus belajar'),
(15, 1, 'P003', 'G0002', 'K001', 'S0003', 85, 80, 80, 85, 'harus terus belajar'),
(16, 1, 'P003', 'G0002', 'K001', 'S0002', 75, 70, 80, 50, 'harus terus belajar'),
(17, 1, 'P002', 'G0003', 'K001', 'S0006', 78, 75, 80, 80, 'harus terus belajar'),
(18, 1, 'P002', 'G0003', 'K001', 'S0004', 80, 85, 84, 85, 'tingkatkan belajarnya'),
(19, 1, 'P002', 'G0003', 'K001', 'S0001', 85, 88, 86, 85, 'tingkatkan belajarnya'),
(20, 1, 'P002', 'G0003', 'K001', 'S0003', 85, 80, 85, 80, 'tingkatkan belajarnya'),
(21, 1, 'P002', 'G0003', 'K001', 'S0002', 85, 80, 85, 80, 'tingkatkan belajarnya'),
(22, 1, 'P002', 'G0003', 'K002', 'S0007', 75, 80, 85, 80, 'tingkatkan belajarnya'),
(23, 1, 'P002', 'G0003', 'K002', 'S0010', 78, 82, 83, 87, 'pertahankan prestasimu'),
(24, 1, 'P002', 'G0003', 'K002', 'S0008', 80, 85, 85, 90, 'pertahankan prestasimu'),
(25, 1, 'P002', 'G0003', 'K002', 'S0009', 70, 75, 75, 80, 'tingkatkan belajar'),
(26, 1, 'P002', 'G0003', 'K002', 'S0005', 75, 77, 85, 80, 'tingkatkan belajar'),
(27, 1, 'P003', 'G0003', 'K002', 'S0007', 85, 85, 85, 80, 'pertahankan prestasimu'),
(28, 1, 'P003', 'G0003', 'K002', 'S0010', 80, 85, 80, 80, 'pertahankan prestasimu'),
(29, 1, 'P003', 'G0003', 'K002', 'S0008', 85, 85, 85, 85, 'pertahankan prestasimu'),
(30, 1, 'P003', 'G0003', 'K002', 'S0009', 80, 75, 75, 85, 'tingkatkan belajarnya'),
(31, 1, 'P003', 'G0003', 'K002', 'S0005', 80, 85, 85, 85, 'pertahankan prestasimu'),
(32, 2, 'P002', 'G0002', 'K002', 'S0002', 10, 10, 10, 10, 'apa atuh apa    '),
(33, 2, 'P001', 'G0001', 'K003', 'S0002', 90, 80, 80, 80, 'bebas ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelajaran`
--

CREATE TABLE `pelajaran` (
  `kode_pelajaran` char(4) NOT NULL,
  `nama_pelajaran` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelajaran`
--

INSERT INTO `pelajaran` (`kode_pelajaran`, `nama_pelajaran`, `keterangan`) VALUES
('P001', 'Pendidikan Agama islam', 'Wajib'),
('P002', 'Pendidikan Pancasila dan Kewarganegaraan', 'Wajib'),
('P003', 'Bahasa Indonesia', 'Wajib'),
('P004', 'Bahasa Inggris', 'Wajib'),
('P005', 'Matematika', 'Wajib'),
('P006', 'Sejarah Indonesia', 'Wajib');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `id` int(10) NOT NULL,
  `prestasi` text NOT NULL,
  `juara` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`id`, `prestasi`, `juara`, `keterangan`) VALUES
(1, 'Lomba paskibra', 'Juara 2', 'tingkat nasional , diselengagarakan oleh  provinsi'),
(2, 'futsal', '1', 'bebas'),
(3, 'lomba masak', '2', 'bebas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `psb`
--

CREATE TABLE `psb` (
  `no_reg` varchar(100) NOT NULL,
  `nisn` varchar(1000) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `tempat_lahir` varchar(300) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `no_tlpn` int(100) NOT NULL,
  `b_indo` varchar(100) NOT NULL,
  `b_ing` varchar(100) NOT NULL,
  `mtk` varchar(100) NOT NULL,
  `jml` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `psb`
--

INSERT INTO `psb` (`no_reg`, `nisn`, `nama`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `asal_sekolah`, `no_tlpn`, `b_indo`, `b_ing`, `mtk`, `jml`, `status`) VALUES
('FSX016', '11111', 'nurwanda', 'dustan', 'sumedang', '1999-07-03', 'P', 'SD malingping', 89765, '80.00', '80.00', '75.00', '235', 'TIDAK LULUS'),
('GRT016', '989', 'asep', 's', 'smd', '2016-05-18', 'L', 'SDN', 34, '90', '90', '90', '270', 'TIDAK LULUS'),
('LQC016', '12345', 'mamur', 'jasah', 'hajsh', '2012-11-30', 'L', 'ash', 67897, '90', '90', '90', '270', 'TIDAK LULUS');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `kode_siswa` char(5) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `tahun_angkatan` char(4) NOT NULL,
  `status` enum('Aktif','Lulus','Keluar') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`kode_siswa`, `nis`, `nama_siswa`, `kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telepon`, `tahun_angkatan`, `status`) VALUES
('S0001', '2014001', 'Sardi Sudrajad', 'P', 'Islam', 'Way Jepara, Lampung Timur', '1991-02-21', 'Jl. Suhada, Labuhan Ratu 1, Way Jepara, Lampung Timur', '0857279911111', '2014', 'Aktif'),
('S0002', '2014002', 'Susiatun Paritun', 'Perempuan', 'Islam', 'Sukadana, Lampung Timur', '1991-03-20', 'Jl. Suhada, Labuhan Ratu 1, Way Jepara, Lampung Timur', '081911111112222', '2014', 'Aktif'),
('S0003', '2014003', 'Septi Suhesti', 'Perempuan', 'Islam', 'Way Jepara, Lampung Timur', '1990-07-12', 'Way Jepara, Lampung Timur', '08579833212211', '2014', 'Aktif'),
('S0004', '2014004', 'Rizka Dwi Saputra', 'Laki-laki', 'Islam', 'Raman Aji, Lampung Timur', '1993-02-15', 'Raman utara, Lampung Timur', '085743990000811', '2014', 'Aktif'),
('S0005', '2014005', 'Subroto Roto', 'Laki-laki', 'Islam', 'Bandar Sribawono, Lampung Timur', '1990-10-21', 'Jl. Suhada, Way Jepara Lampung Timur', '08191234561111', '2014', 'Aktif'),
('S0006', '2014006', 'Gendon Marselo', 'Laki-laki', 'Islam', 'Yogyakarta', '1992-01-11', 'Jl. Janti, Agen JNE, Karang Jambe, Way Jepara, Lampung Timur', '0819282828211', '2014', 'Aktif'),
('S0007', '2014007', 'Alfa Diony Sardiyon', 'Laki-laki', 'Islam', 'Way Jepara, Lampung Timur', '1990-06-12', 'Jl. Braja Indah, Way Jepara, Lampung Timur', '08572799896911', '2014', 'Aktif'),
('S0008', '2014008', 'Fitria Prasetia Wati', 'Laki-laki', 'Islam', 'Way Jepara, Lampung Timur', '1991-06-02', 'Jl. Pramuka, Labuhan Ratu 1, Way Jepara, Lampung Timur', '082122223333444', '2014', 'Aktif'),
('S0009', '2014009', 'Gunawan Sitompul', 'Laki-laki', 'Kristen', 'Medan', '1990-06-14', 'Jl. Braja Indah, Way Jepara Lampung Timur', '085727998969111', '2014', 'Aktif'),
('S0010', '2014010', 'Evi Fatimah Suntesa', 'Perempuan', 'Islam', 'Pungguragung', '1991-02-05', 'Jl. Braja Asri, Way Jepara Lampung Timur', '085727998969222', '2014', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggal`
--

CREATE TABLE `tanggal` (
  `id` int(10) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tanggal`
--

INSERT INTO `tanggal` (`id`, `tanggal`) VALUES
(1, '2016-11-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_login` int(11) NOT NULL,
  `name_login` varchar(45) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type_login` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_login`, `name_login`, `username`, `password`, `type_login`) VALUES
(1, 'Ghazali Samudra', '2014001', '202cb962ac59075b964b07152d234b70', 'user'),
(2, 'T Ghazali Pidie', '2014002', '6512bd43d9caa6e02c990b0a82652dca', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bk`
--
ALTER TABLE `bk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekskul`
--
ALTER TABLE `ekskul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`kode_guru`);

--
-- Indexes for table `idprofile`
--
ALTER TABLE `idprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`kode_pelajaran`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `psb`
--
ALTER TABLE `psb`
  ADD PRIMARY KEY (`no_reg`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`kode_siswa`);

--
-- Indexes for table `tanggal`
--
ALTER TABLE `tanggal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bk`
--
ALTER TABLE `bk`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `ekskul`
--
ALTER TABLE `ekskul`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `idprofile`
--
ALTER TABLE `idprofile`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tanggal`
--
ALTER TABLE `tanggal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
