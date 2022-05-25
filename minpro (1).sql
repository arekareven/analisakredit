-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 12:01 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `analis`
--

CREATE TABLE `analis` (
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analis`
--

INSERT INTO `analis` (`nama`, `email`) VALUES
('Mahfud Ansori', ''),
('Sonny Wahyu Sampurno', ''),
('Vera Fernanda', 'vera@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `analisis`
--

CREATE TABLE `analisis` (
  `id_analisis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nama_ao` varchar(50) NOT NULL,
  `file` varchar(128) NOT NULL,
  `catatan` text NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisis`
--

INSERT INTO `analisis` (`id_analisis`, `nama`, `nama_ao`, `file`, `catatan`, `status`) VALUES
(1, 'Vera Fernanda', 'Fatia Larasati', 'Agus Siswanto13-05-22.docx', '', 'Diserahkan');

-- --------------------------------------------------------

--
-- Table structure for table `bismillah`
--

CREATE TABLE `bismillah` (
  `id` int(11) NOT NULL,
  `id_lb` int(11) NOT NULL,
  `no1` varchar(20) DEFAULT NULL,
  `no2` varchar(20) DEFAULT NULL,
  `no3` varchar(20) DEFAULT NULL,
  `no4` varchar(20) DEFAULT NULL,
  `no5` varchar(20) DEFAULT NULL,
  `keterangan1` varchar(128) DEFAULT NULL,
  `keterangan2` varchar(128) DEFAULT NULL,
  `keterangan3` varchar(128) DEFAULT NULL,
  `keterangan4` varchar(128) DEFAULT NULL,
  `keterangan5` varchar(128) DEFAULT NULL,
  `keterangan6` varchar(128) DEFAULT NULL,
  `pemasukan2` varchar(20) DEFAULT NULL,
  `pemasukan3` varchar(20) DEFAULT NULL,
  `pemasukan4` varchar(20) DEFAULT NULL,
  `pemasukan5` varchar(20) DEFAULT NULL,
  `pengeluaran2` varchar(20) DEFAULT NULL,
  `pengeluaran3` varchar(20) DEFAULT NULL,
  `pengeluaran4` varchar(20) DEFAULT NULL,
  `pengeluaran5` varchar(20) DEFAULT NULL,
  `saldo6` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bismillah`
--

INSERT INTO `bismillah` (`id`, `id_lb`, `no1`, `no2`, `no3`, `no4`, `no5`, `keterangan1`, `keterangan2`, `keterangan3`, `keterangan4`, `keterangan5`, `keterangan6`, `pemasukan2`, `pemasukan3`, `pemasukan4`, `pemasukan5`, `pengeluaran2`, `pengeluaran3`, `pengeluaran4`, `pengeluaran5`, `saldo6`) VALUES
(2, 101, 'I', '', '1', '2', '', 'USAHA 1', 'Pendapatan usaha ', 'Pembelian stok', 'Biaya susut', '', 'SURPLUS USAHA 1', '360000000', '0', '0', '0', '0', '240000000', '25000000', '0', '95000000'),
(3, 101, 'II', '', '1', '2', '3', 'USAHA 2', 'Pendapatan usaha travel', 'Biaya perawatan', 'Biaya ganti ban', 'Biaya lain lain', 'SURPLUS USAHA 2', '56000000', '0', '0', '0', '0', '4000000', '6000000', '2000000', '44000000'),
(4, 101, 'V', '', '', '', '', 'BIAYA LAIN LAIN', 'Biaya hidup', 'Biaya Pendidikan', 'Biaya listrik', 'Biaya lain', 'JUMLAH BIAYA LAIN LAIN', '0', '0', '0', '0', '2500000', '350000', '500000', '1000000', '4350000'),
(5, 0, 'VI', '1', '2', '3', '4', 'BIAYA ANGSURAN HUTANG', 'Angsuran BRI', '', '', '', 'JUMLAH ANGSURAN HUTANG', '0', '0', '0', '0', '1266000', '0', '0', '0', '1266000');

-- --------------------------------------------------------

--
-- Table structure for table `capacity`
--

CREATE TABLE `capacity` (
  `id_cap` int(11) NOT NULL,
  `id_lb` int(11) NOT NULL,
  `nama_usaha` varchar(50) DEFAULT NULL,
  `sektor` varchar(50) DEFAULT NULL,
  `bidang` varchar(50) DEFAULT NULL,
  `alamat_usaha` varchar(128) DEFAULT NULL,
  `status_usaha` varchar(50) DEFAULT NULL,
  `tlp_usaha` varchar(13) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_nasabah` date DEFAULT NULL,
  `akta` varchar(50) DEFAULT NULL,
  `tgl_akta` date DEFAULT NULL,
  `npwp` varchar(15) DEFAULT NULL,
  `tgl_npwp` date DEFAULT NULL,
  `usaha_skrg` text,
  `alokasi1` varchar(128) DEFAULT NULL,
  `alokasi2` varchar(128) DEFAULT NULL,
  `alokasi3` varchar(128) DEFAULT NULL,
  `dana1` varchar(20) DEFAULT NULL,
  `dana2` varchar(20) DEFAULT NULL,
  `dana3` varchar(20) DEFAULT NULL,
  `total` varchar(20) DEFAULT NULL,
  `usaha_realisasi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capacity`
--

INSERT INTO `capacity` (`id_cap`, `id_lb`, `nama_usaha`, `sektor`, `bidang`, `alamat_usaha`, `status_usaha`, `tlp_usaha`, `tgl_mulai`, `tgl_nasabah`, `akta`, `tgl_akta`, `npwp`, `tgl_npwp`, `usaha_skrg`, `alokasi1`, `alokasi2`, `alokasi3`, `dana1`, `dana2`, `dana3`, `total`, `usaha_realisasi`) VALUES
(2, 9, 'Dagang ayam pedaging', 'Perdagangan', 'Pedagang ayam potong', 'Pasar gorang gareng', 'Milik Sendiri', '0812345789', '2022-05-26', '2022-05-07', '-', '2022-05-17', '-', '0000-00-00', 'Usaha saat ini .......................', 'Pembelian stok ayam', 'Pembelian 1 unnit isuzu', 'Pelunasan pinjaman bank mandiri', '1200000', '2300000', '16000000', '19500000', 'Usaha setelah realisasi ............................');

-- --------------------------------------------------------

--
-- Table structure for table `capital_a`
--

CREATE TABLE `capital_a` (
  `id_capi` int(10) NOT NULL,
  `id_lb` int(10) NOT NULL,
  `kas` varchar(50) DEFAULT NULL,
  `tabungan` varchar(50) DEFAULT NULL,
  `deposito` varchar(50) DEFAULT NULL,
  `piutang` varchar(50) DEFAULT NULL,
  `peralatan` varchar(50) DEFAULT NULL,
  `barang` varchar(50) DEFAULT NULL,
  `barang2` varchar(20) DEFAULT NULL,
  `barang3` varchar(20) DEFAULT NULL,
  `sewa` varchar(50) DEFAULT NULL,
  `lahan` varchar(50) DEFAULT NULL,
  `gedung` varchar(50) DEFAULT NULL,
  `operasional` varchar(50) DEFAULT NULL,
  `lain` varchar(50) DEFAULT NULL,
  `total_al` varchar(50) DEFAULT NULL,
  `tanah` varchar(50) DEFAULT NULL,
  `bangunan` varchar(50) DEFAULT NULL,
  `kendaraan` varchar(50) DEFAULT NULL,
  `inventaris` varchar(50) DEFAULT NULL,
  `lain2` varchar(50) DEFAULT NULL,
  `total_at` varchar(20) DEFAULT NULL,
  `total_aset` varchar(20) DEFAULT NULL,
  `hutang_jpk` varchar(50) DEFAULT NULL,
  `hutang_jpg` varchar(50) DEFAULT NULL,
  `hutang_lain` varchar(50) DEFAULT NULL,
  `hutang_dagang` varchar(50) DEFAULT NULL,
  `total_hutang` varchar(50) DEFAULT NULL,
  `laba_rugi` varchar(50) DEFAULT NULL,
  `modal` varchar(50) DEFAULT NULL,
  `harta` varchar(50) DEFAULT NULL,
  `total_kjb` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `capital_b`
--

CREATE TABLE `capital_b` (
  `id_capi` int(10) NOT NULL,
  `id_lb` int(10) NOT NULL,
  `kas` varchar(50) DEFAULT NULL,
  `tabungan` varchar(50) DEFAULT NULL,
  `deposito` varchar(50) DEFAULT NULL,
  `piutang` varchar(50) DEFAULT NULL,
  `peralatan` varchar(50) DEFAULT NULL,
  `barang` varchar(50) DEFAULT NULL,
  `barang2` varchar(20) DEFAULT NULL,
  `barang3` varchar(20) DEFAULT NULL,
  `sewa` varchar(50) DEFAULT NULL,
  `lahan` varchar(50) DEFAULT NULL,
  `gedung` varchar(50) DEFAULT NULL,
  `operasional` varchar(50) DEFAULT NULL,
  `lain` varchar(50) DEFAULT NULL,
  `total_al` varchar(50) DEFAULT NULL,
  `tanah` varchar(50) DEFAULT NULL,
  `bangunan` varchar(50) DEFAULT NULL,
  `kendaraan` varchar(50) DEFAULT NULL,
  `inventaris` varchar(50) DEFAULT NULL,
  `lain2` varchar(50) DEFAULT NULL,
  `total_at` varchar(20) DEFAULT NULL,
  `total_aset` varchar(20) DEFAULT NULL,
  `hutang_jpk` varchar(50) DEFAULT NULL,
  `hutang_jpg` varchar(50) DEFAULT NULL,
  `hutang_lain` varchar(50) DEFAULT NULL,
  `hutang_dagang` varchar(50) DEFAULT NULL,
  `total_hutang` varchar(50) DEFAULT NULL,
  `laba_rugi` varchar(50) DEFAULT NULL,
  `modal` varchar(50) DEFAULT NULL,
  `harta` varchar(50) DEFAULT NULL,
  `total_kjb` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capital_b`
--

INSERT INTO `capital_b` (`id_capi`, `id_lb`, `kas`, `tabungan`, `deposito`, `piutang`, `peralatan`, `barang`, `barang2`, `barang3`, `sewa`, `lahan`, `gedung`, `operasional`, `lain`, `total_al`, `tanah`, `bangunan`, `kendaraan`, `inventaris`, `lain2`, `total_at`, `total_aset`, `hutang_jpk`, `hutang_jpg`, `hutang_lain`, `hutang_dagang`, `total_hutang`, `laba_rugi`, `modal`, `harta`, `total_kjb`) VALUES
(4, 9, '2000000', '800000', '0', '0', '10000000', '2000000', '1000000', '0', '5000000', '0', '0', '3000000', '0', '23800000', '150000000', '50000000', '5000000', '0', '0', '205000000', '228800000', '10416434', '0', '0', '0', '10416434', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cashflow_a`
--

CREATE TABLE `cashflow_a` (
  `id_cf` int(11) NOT NULL,
  `id_lb` int(11) NOT NULL,
  `no` varchar(5) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  `pemasukan` varchar(20) DEFAULT NULL,
  `pengeluaran` varchar(20) DEFAULT NULL,
  `saldo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cashflow_b`
--

CREATE TABLE `cashflow_b` (
  `id_cf` int(11) NOT NULL,
  `id_lb` int(11) NOT NULL,
  `kode_perkiraan` varchar(10) DEFAULT NULL,
  `nama_perkiraan` varchar(128) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  `saldo` varchar(20) DEFAULT NULL,
  `kode_jenis` char(1) DEFAULT NULL,
  `jenis` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cashflow_b`
--

INSERT INTO `cashflow_b` (`id_cf`, `id_lb`, `kode_perkiraan`, `nama_perkiraan`, `keterangan`, `saldo`, `kode_jenis`, `jenis`) VALUES
(21, 9, '4.1.1', 'Pendapatan Usaha (Omset) 1', 'pendapatan dari usaha ayam petelur', '61200000', 'K', 'pendapatan'),
(22, 9, '1.1.1', 'Kas', 'pendapatan dari usaha ayam petelur', '61200000', 'D', 'pendapatan'),
(23, 9, '4.1.2', 'Pendapatan Usaha (Omset) 2', 'Pendapatan dari usaha toko kelontong', '48000000', 'K', 'pendapatan'),
(24, 9, '1.1.1', 'Kas', 'Pendapatan dari usaha toko kelontong', '48000000', 'D', 'pendapatan'),
(25, 9, '1.1.1', 'Kas', 'Pembelian pakan polat 530.000/50kg, jagung', '15000000', 'K', 'pengeluaran'),
(26, 9, '5.1.2', 'Biaya Pemeliharaan Usaha 1', 'Pembelian pakan polat 530.000/50kg, jagung', '15000000', 'D', 'pengeluaran'),
(27, 9, '1.1.1', 'Kas', 'Gaji Karyawan', '1500000', 'K', 'pengeluaran'),
(28, 9, '5.1.4', 'Biaya Gaji Karyawan Usaha 1', 'Gaji Karyawan', '1500000', 'D', 'pengeluaran'),
(29, 9, '1.1.1', 'Kas', 'Biaya air', '200000', 'K', 'pengeluaran'),
(30, 9, '5.1.2', 'Biaya Pemeliharaan Usaha 1', 'Biaya air', '200000', 'D', 'pengeluaran');

-- --------------------------------------------------------

--
-- Table structure for table `collateral`
--

CREATE TABLE `collateral` (
  `id_col` int(11) NOT NULL,
  `id_lb` int(11) NOT NULL,
  `roda` varchar(50) DEFAULT NULL,
  `nopol` varchar(10) DEFAULT NULL,
  `nama_stnk` varchar(50) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `type` varchar(128) DEFAULT NULL,
  `jenis` varchar(128) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `warna` varchar(128) DEFAULT NULL,
  `silinder` varchar(20) DEFAULT NULL,
  `no_rangka` varchar(50) DEFAULT NULL,
  `no_mesin` varchar(20) DEFAULT NULL,
  `no_bpkb` varchar(20) DEFAULT NULL,
  `milik` varchar(128) DEFAULT NULL,
  `taksiran` text,
  `nl` varchar(20) DEFAULT NULL,
  `kondisi` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collateral`
--

INSERT INTO `collateral` (`id_col`, `id_lb`, `roda`, `nopol`, `nama_stnk`, `alamat`, `type`, `jenis`, `tahun`, `warna`, `silinder`, `no_rangka`, `no_mesin`, `no_bpkb`, `milik`, `taksiran`, `nl`, `kondisi`) VALUES
(1, 9, '4 (Empat)', 'AE 7359 NA', 'Yuliati', 'Desa Simbatan Kec Nguntoronadi', 'Isuzu / NKR55', 'Mobil Bus', 2014, 'Putih Hijau Kuning', '2771 cc', 'MHCNCKR46545', 'M098799', '085568745', 'Milik Sendiri', '225000000', '150000000', 'Keadaan baik dan terawat'),
(3, 9, '8 (Delapan)', '', 'PT. HELMI HENDRA HARMONI PERKASA', '', '', '', 0000, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `collateral_tanah`
--

CREATE TABLE `collateral_tanah` (
  `id_col2` int(11) NOT NULL,
  `id_lb` int(11) NOT NULL,
  `jenis` varchar(128) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `no_shm` varchar(20) DEFAULT NULL,
  `lokasi` varchar(128) DEFAULT NULL,
  `tgl_ukur` date DEFAULT NULL,
  `no_ukur` varchar(20) DEFAULT NULL,
  `luas_t` varchar(10) DEFAULT NULL,
  `luas_b` varchar(10) DEFAULT NULL,
  `milik` varchar(128) DEFAULT NULL,
  `fisik_jaminan` text,
  `taksasi` text,
  `pertimbangan` varchar(128) DEFAULT NULL,
  `harga_t` varchar(20) DEFAULT NULL,
  `harga_b` varchar(20) DEFAULT NULL,
  `harga_t2` varchar(20) DEFAULT NULL,
  `harga_b2` varchar(20) DEFAULT NULL,
  `ht` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collateral_tanah`
--

INSERT INTO `collateral_tanah` (`id_col2`, `id_lb`, `jenis`, `nama`, `alamat`, `no_shm`, `lokasi`, `tgl_ukur`, `no_ukur`, `luas_t`, `luas_b`, `milik`, `fisik_jaminan`, `taksasi`, `pertimbangan`, `harga_t`, `harga_b`, `harga_t2`, `harga_b2`, `ht`) VALUES
(1, 9, 'Non pertanian', 'Supriyadi', 'Desa sawojajar Kecamatan Takeran', '1519', 'Kelurahan Demangan', '2022-03-10', '1306', '1470', '70', 'Milik Sendiri', 'Sebidang tanah pekarangan ..........', '84', 'Karakter debitur baik, kemampuan ada, jaminan mencukupi', '243000', '429000', '2000000', '1000000', '1650000000'),
(4, 9, 'aaaa', 'fed', '', '1519', '', '0000-00-00', '1306', '', '', 'Milik Sendiri an sendiri', '', '', 'wwwwwww', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `condition`
--

CREATE TABLE `condition` (
  `id_con` int(11) NOT NULL,
  `id_lb` int(11) NOT NULL,
  `kekuatan` text,
  `kelemahan` text,
  `peluang` text,
  `ancaman` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `condition`
--

INSERT INTO `condition` (`id_con`, `id_lb`, `kekuatan`, `kelemahan`, `peluang`, `ancaman`) VALUES
(3, 9, 'aku dan kamu', 'adalah insan', 'yang tidak', 'bisa dipisahkan');

-- --------------------------------------------------------

--
-- Table structure for table `dummy`
--

CREATE TABLE `dummy` (
  `id_cf` int(11) NOT NULL,
  `id_lb` int(11) NOT NULL,
  `dari` int(11) DEFAULT NULL,
  `untuk` int(11) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  `pemasukan` varchar(20) DEFAULT NULL,
  `pengeluaran` varchar(20) DEFAULT NULL,
  `saldo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dummy`
--

INSERT INTO `dummy` (`id_cf`, `id_lb`, `dari`, `untuk`, `keterangan`, `pemasukan`, `pengeluaran`, `saldo`) VALUES
(1, 7, 1, 1, 'Pendapatan usaha daging ayam pedaging', '270000000', NULL, '5'),
(3, 7, 2, 1, 'Pendapatan usaha jasa travel', '42000000', NULL, '5'),
(4, 7, 1, 2, 'Pembelian stok dagangan ayam pedaging', NULL, '12000', '5'),
(5, 7, 1, 2, 'Susut bobot', NULL, '3000', '5');

-- --------------------------------------------------------

--
-- Table structure for table `karakter`
--

CREATE TABLE `karakter` (
  `id_char` int(10) NOT NULL,
  `id_lb` int(10) NOT NULL,
  `info_pribadi` text,
  `info_perilaku` varchar(128) DEFAULT NULL,
  `info_keluarga` varchar(128) DEFAULT NULL,
  `nm1` varchar(50) DEFAULT NULL,
  `nm2` varchar(50) DEFAULT NULL,
  `nm3` varchar(50) NOT NULL,
  `al1` varchar(128) NOT NULL,
  `al2` varchar(128) NOT NULL,
  `al3` varchar(128) NOT NULL,
  `hp1` varchar(15) NOT NULL,
  `hp2` varchar(15) NOT NULL,
  `hp3` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karakter`
--

INSERT INTO `karakter` (`id_char`, `id_lb`, `info_pribadi`, `info_perilaku`, `info_keluarga`, `nm1`, `nm2`, `nm3`, `al1`, `al2`, `al3`, `hp1`, `hp2`, `hp3`) VALUES
(1, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Warsito', 'Mbah Madi', 'Pujiono', 'Rt/Rw 05/04, Desa Sidorejo, Kecamatan Geneng', 'Rt/Rw 05/04, Desa Sidorejo, Kecamatan Geneng', 'Rt/Rw 05/04, Desa Sidorejo, Kecamatan Geneng', '123', '312', '432');

-- --------------------------------------------------------

--
-- Table structure for table `latar_belakang`
--

CREATE TABLE `latar_belakang` (
  `id_lb` int(10) NOT NULL,
  `cif_bank` varchar(7) DEFAULT NULL,
  `tgl_analisa` date DEFAULT NULL,
  `tgl_permohonan` date DEFAULT NULL,
  `plafon` varchar(20) DEFAULT NULL,
  `jangka_waktu` varchar(10) DEFAULT NULL,
  `sifat_kredit` varchar(50) DEFAULT NULL,
  `suku_bunga` varchar(20) DEFAULT NULL,
  `jenis_permohonan` varchar(20) DEFAULT NULL,
  `tujuan_permohonan` varchar(20) DEFAULT NULL,
  `ket_penggunaan` varchar(50) DEFAULT NULL,
  `nama_debitur` varchar(50) DEFAULT NULL,
  `status_kawin` varchar(20) DEFAULT NULL,
  `ttl_nasabah` varchar(50) DEFAULT NULL,
  `ktp` varchar(16) DEFAULT NULL,
  `alamat_ktp_nasabah` varchar(128) DEFAULT NULL,
  `domisili_nasabah` varchar(128) DEFAULT NULL,
  `hp_nasabah` varchar(15) DEFAULT NULL,
  `status_tt` varchar(50) DEFAULT NULL,
  `pekerjaan_nasabah` varchar(50) DEFAULT NULL,
  `tanggungan` varchar(10) DEFAULT NULL,
  `pendidikan` varchar(10) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `masa_laku` varchar(20) DEFAULT NULL,
  `telp_kantor` varchar(20) DEFAULT NULL,
  `lama_tinggal` varchar(20) DEFAULT NULL,
  `nama_pasangan` varchar(50) DEFAULT NULL,
  `ttl_pasangan` varchar(50) DEFAULT NULL,
  `alamat_ktp_pasangan` varchar(128) DEFAULT NULL,
  `domisili_pasangan` varchar(128) DEFAULT NULL,
  `pekerjaan_pasangan` varchar(50) DEFAULT NULL,
  `hp_pasangan` varchar(15) DEFAULT NULL,
  `nama_keluarga` varchar(50) DEFAULT NULL,
  `hubungan_keluarga` varchar(50) DEFAULT NULL,
  `alamat_keluarga` varchar(128) DEFAULT NULL,
  `hp_keluarga` varchar(15) DEFAULT NULL,
  `pf1` varchar(20) DEFAULT NULL,
  `pf2` varchar(20) DEFAULT NULL,
  `pf3` varchar(20) DEFAULT NULL,
  `pf4` varchar(20) DEFAULT NULL,
  `pf5` varchar(20) DEFAULT NULL,
  `st1` varchar(20) DEFAULT NULL,
  `st2` varchar(20) DEFAULT NULL,
  `st3` varchar(20) DEFAULT NULL,
  `st4` varchar(20) DEFAULT NULL,
  `st5` varchar(20) DEFAULT NULL,
  `sd1` varchar(20) DEFAULT NULL,
  `sd2` varchar(20) DEFAULT NULL,
  `sd3` varchar(20) DEFAULT NULL,
  `sd4` varchar(20) DEFAULT NULL,
  `sd5` varchar(20) DEFAULT NULL,
  `sj1` varchar(20) DEFAULT NULL,
  `sj2` varchar(20) DEFAULT NULL,
  `sj3` varchar(20) DEFAULT NULL,
  `sj4` varchar(20) DEFAULT NULL,
  `sj5` varchar(20) DEFAULT NULL,
  `dt1` varchar(20) DEFAULT NULL,
  `dt2` varchar(20) DEFAULT NULL,
  `dt3` varchar(20) DEFAULT NULL,
  `dt4` varchar(20) DEFAULT NULL,
  `dt5` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latar_belakang`
--

INSERT INTO `latar_belakang` (`id_lb`, `cif_bank`, `tgl_analisa`, `tgl_permohonan`, `plafon`, `jangka_waktu`, `sifat_kredit`, `suku_bunga`, `jenis_permohonan`, `tujuan_permohonan`, `ket_penggunaan`, `nama_debitur`, `status_kawin`, `ttl_nasabah`, `ktp`, `alamat_ktp_nasabah`, `domisili_nasabah`, `hp_nasabah`, `status_tt`, `pekerjaan_nasabah`, `tanggungan`, `pendidikan`, `jenis_kelamin`, `masa_laku`, `telp_kantor`, `lama_tinggal`, `nama_pasangan`, `ttl_pasangan`, `alamat_ktp_pasangan`, `domisili_pasangan`, `pekerjaan_pasangan`, `hp_pasangan`, `nama_keluarga`, `hubungan_keluarga`, `alamat_keluarga`, `hp_keluarga`, `pf1`, `pf2`, `pf3`, `pf4`, `pf5`, `st1`, `st2`, `st3`, `st4`, `st5`, `sd1`, `sd2`, `sd3`, `sd4`, `sd5`, `sj1`, `sj2`, `sj3`, `sj4`, `sj5`, `dt1`, `dt2`, `dt3`, `dt4`, `dt5`) VALUES
(9, '75', '2022-05-08', '2022-05-07', '50000000', '24 Bulan', 'Pokok bunga tiap bulan', '11.88% Pertahun', 'Baru', 'Modal Kerja', 'Modal usaha dagang Kentaki ayam', 'Agus Siswanto', 'Menikah', 'Magetan, 03-11-1984', '3520174311840002', 'Desa Jungke Rt/Rw 07/02', 'Desa Jungke Rt/Rw 07/02', '0812134456789', 'Milik Sendiri', 'Wiraswasta', '2 Orang', 'SMA', 'Laki-laki', 'Seumur Hidup', '0', '12 Tahun', 'Damiasih', 'Magetan, 27-11-1979', 'desa jungke', 'desa jungke', 'Ibu Rumah Tangga', '08123456789', 'Bela', 'Saudara Tidak Sekandung', 'Desa Jungke', '085807277785', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notaris`
--

CREATE TABLE `notaris` (
  `notaris` varchar(50) NOT NULL,
  `provisi` varchar(20) NOT NULL,
  `administrasi` varchar(20) NOT NULL,
  `asuransi` varchar(20) NOT NULL,
  `materai` varchar(20) NOT NULL,
  `apht` varchar(20) NOT NULL,
  `skmht` varchar(20) NOT NULL,
  `titipan` varchar(20) NOT NULL,
  `fiduciare` varchar(20) NOT NULL,
  `legalisasi` varchar(20) NOT NULL,
  `lain` varchar(20) NOT NULL,
  `roya` varchar(20) NOT NULL,
  `proses` varchar(20) NOT NULL,
  `sertifikat` varchar(20) NOT NULL,
  `akta` varchar(20) NOT NULL,
  `pendaftaran` varchar(20) NOT NULL,
  `plotting` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notaris`
--

INSERT INTO `notaris` (`notaris`, `provisi`, `administrasi`, `asuransi`, `materai`, `apht`, `skmht`, `titipan`, `fiduciare`, `legalisasi`, `lain`, `roya`, `proses`, `sertifikat`, `akta`, `pendaftaran`, `plotting`) VALUES
('Bambang Riyanto, SH. M.Kn.', '5250000', '5250000', '0', '10000', '1920000', '100000', '0', '1270000', '500000', '0', '0', '400000', '150000', '400000', '50000', '0'),
('Eka Sari Sulistyowati, SH. M.Kn.', '1150000', '1150000', '0', '18000', '1920000', '100000', '0', '0', '500000', '0', '1000000', '280000', '250000', '1000000', '400000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `perkiraan`
--

CREATE TABLE `perkiraan` (
  `kode_perkiraan` varchar(6) NOT NULL,
  `nama_perkiraan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `perkiraan`
--

INSERT INTO `perkiraan` (`kode_perkiraan`, `nama_perkiraan`) VALUES
('1', 'Harta'),
('1.1', 'Harta Lancar'),
('1.1.1', 'Kas'),
('1.1.10', 'Kendaraan Operasional'),
('1.1.11', 'Lain - lain'),
('1.1.12', 'Persediaan Barang Usaha 2'),
('1.1.13', 'Persediaan Barang Usaha 3'),
('1.1.2', 'Tabungan'),
('1.1.3', 'Deposito'),
('1.1.4', 'Piutang'),
('1.1.5', 'Peralatan'),
('1.1.6', 'Persediaan Barang Usaha 1'),
('1.1.7', 'Sewa dibayar di muka'),
('1.1.8', 'Lahan Garap'),
('1.1.9', 'Gedung / Ruko'),
('1.2', 'Harta Tetap'),
('1.2.1', 'Tanah'),
('1.2.2', 'Bangunan'),
('1.2.3', 'Kendaraan Pribadi'),
('1.2.4', 'Inventaris'),
('1.2.5', 'Lain - lain'),
('2', 'Hutang'),
('2.1', 'Hutang'),
('2.1.1', 'Hutang Jangka Pendek'),
('2.1.2', 'Hutang Jangka Panjang'),
('2.1.3', 'Hutang Dagang'),
('2.1.4', 'Hutang Lain'),
('3', 'Modal'),
('3.1', 'Modal'),
('3.1.1', 'Modal'),
('4', 'Pendapatan'),
('4.1', 'Pendapatan'),
('4.1.1', 'Pendapatan Usaha (Omset) 1'),
('4.1.2', 'Pendapatan Usaha (Omset) 2'),
('4.1.3', 'Pendapatan Usaha (Omset) 3'),
('4.1.4', 'Pendapatan Lain / Gaji'),
('5', 'Biaya'),
('5.1', 'Harga Pokok Pembelian'),
('5.1.1', 'Harga Pokok Pembelian 1'),
('5.1.2', 'Biaya Pemeliharaan Usaha 1'),
('5.1.3', 'Biaya Operasional Usaha 1'),
('5.1.4', 'Biaya Gaji Karyawan Usaha 1'),
('5.1.5', 'Biaya Lain - lain Usaha 1'),
('5.2.1', 'Harga Pokok Pembelian 2'),
('5.2.2', 'Biaya Pemeliharaan Usaha 2'),
('5.2.3', 'Biaya Operasional Usaha 2'),
('5.2.4', 'Biaya Gaji Karyawan Usaha 2'),
('5.2.5', 'Biaya Lain - lain Usaha 2'),
('5.3.1', 'Harga Pokok Pembelian Usaha 3'),
('5.3.2', 'Biaya Pemeliharaan Usaha 3'),
('5.3.3', 'Biaya Operasional Usaha 3'),
('5.3.4', 'Biaya Gaji Karyawan Usaha 3'),
('5.3.5', 'Biaya Lain - lain Usaha 3'),
('5.4', 'Biaya Lain - lain (umum)'),
('5.4.1', 'Biaya Lain - lain (umum)'),
('5.5', 'Biaya Angsuran Hutang'),
('5.5.1', 'Biaya Angsuran di BPR EKA DHARMA BHINARAHARJA'),
('5.5.3', 'Biaya Angsuran Hutang Dagang'),
('5.5.4', 'Biaya Angsuran Hutang Lain');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pinjaman`
--

CREATE TABLE `riwayat_pinjaman` (
  `id_rp` int(11) NOT NULL,
  `id_lb` int(11) NOT NULL,
  `plafond` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `saldo` varchar(20) DEFAULT NULL,
  `sejarah` varchar(20) DEFAULT NULL,
  `data` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_pinjaman`
--

INSERT INTO `riwayat_pinjaman` (`id_rp`, `id_lb`, `plafond`, `status`, `saldo`, `sejarah`, `data`) VALUES
(15, 9, '700000000', 'Lunas', '0', 'Baik', 'Tidak Terlampir'),
(16, 9, '1', 'Lunas', '0', 'Tidak Baik', 'Terlampir'),
(17, 9, '2', 'Belum Lunas', '2', 'Baik', 'Terlampir');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Fatia Larasati', 'fatia@gmail.com', 'art-2436545__340.jpg', '$2y$10$iHy9BJuSIDxiVVs53HWea.CdVTWGxQVvjIn403kpBdfISGRWn.PUS', 2, 1, 1644812162),
(6, 'hasantiro', 'admin@gmail.com', 'download.png', '$2y$10$6NxAuuzqcTQZwQVMhilsnOV0Mpm43owg7aPh4l.rs/i6OD7Kaf1Mu', 1, 1, 1644812241),
(7, 'Vera Fernanda', 'vera@gmail.com', 'WhatsApp_Image_2022-03-03_at_20_50_06-removebg-preview.png', '$2y$10$l54DzLz7/2Cj.VkJYooo3eqwIQeJrcSa2a4cC6YlgPM2LR6tUCQHm', 3, 1, 1646887061),
(8, 'Reno Febrian', 'reno@gmail.com', 'default.jpg', '$2y$10$708AN740PJjWkPPMCKybm.7tsdt3vTi5WSkC9jRsPRwmjuepb2VMW', 4, 1, 1647315996),
(9, 'Test', 'test@gmail.com', 'default.jpg', '$2y$10$OfDZBPorrEJ12sYTrMxGMu3T9hfG.KbDrahwm8fdDTIR7lwIK0LMC', 5, 1, 1648089117);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 1, 3),
(5, 1, 4),
(6, 2, 4),
(8, 1, 5),
(14, 3, 2),
(16, 2, 5),
(17, 3, 6),
(18, 4, 2),
(19, 4, 7),
(20, 5, 8),
(21, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Analisa Kredit'),
(5, 'Analisis'),
(6, 'Review'),
(7, 'Kabag'),
(8, 'Tester');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Analis'),
(4, 'Kabag'),
(5, 'Tester');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-users', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(6, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-lock-open', 1),
(8, 4, 'Latar Belakang', 'kredit/lb', 'fas fa-fw fa-id-card', 1),
(13, 5, 'Daftar Kredit', 'analisis', 'fas fa-fw fa-file-word', 1),
(14, 6, 'Daftar analisa', 'analisa', 'fas fa-fw fa-paperclip', 1),
(15, 7, 'Daftar AK', 'kabag', 'fas fa-fw fa-paperclip', 1),
(16, 4, 'Character', 'character?id_lb=', 'fas fa-fw fa-person-booth', 0),
(17, 4, 'Capacity', 'capacity?id_lb=', 'fas fa-fw fa-warehouse', 0),
(18, 4, 'Capital Sebelum Kredit', 'capital?id_lb=', 'fas fa-fw fa-money-bill', 0),
(19, 4, 'Capital Setelah Kredit', 'capital/index2?id_lb=', 'fas fa-fw fa-money-bill-alt', 0),
(20, 4, 'Condition', 'condition?id_lb=', 'fas fa-fw fa-fan', 0),
(21, 4, 'Collateral', 'collateral?id_lb=', 'fas fa-fw fa-hand-holding-usd', 0),
(22, 4, 'Usulan Kredit', 'usulan?id_lb=', 'fas fa-fw fa-credit-card', 0),
(23, 1, 'User', 'admin/user', 'fas fa-fw fa-file-word', 1),
(24, 8, 'Testing', 'dummy', 'fas fa-fw fa-vial', 1),
(25, 4, 'Edit', 'test/edit?id_lb=', 'fas fa-fw fa-paperclip', 1);

-- --------------------------------------------------------

--
-- Table structure for table `usulan`
--

CREATE TABLE `usulan` (
  `id_usulan` int(11) NOT NULL,
  `id_lb` int(11) NOT NULL,
  `character` varchar(10) DEFAULT NULL,
  `capacity` varchar(10) DEFAULT NULL,
  `capital` varchar(10) DEFAULT NULL,
  `kel_hutang` varchar(10) DEFAULT NULL,
  `kel_angsuran` varchar(10) DEFAULT NULL,
  `coe` varchar(10) DEFAULT NULL,
  `collateral` varchar(10) DEFAULT NULL,
  `plafond` varchar(20) DEFAULT NULL,
  `sifat` varchar(128) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `tujuan` varchar(128) DEFAULT NULL,
  `sektor` varchar(50) DEFAULT NULL,
  `waktu` varchar(20) DEFAULT NULL,
  `bunga` varchar(50) DEFAULT NULL,
  `angsuran` varchar(20) DEFAULT NULL,
  `denda` varchar(20) DEFAULT NULL,
  `realisasi` date DEFAULT NULL,
  `tanggungan` varchar(20) DEFAULT NULL,
  `likuidasi` varchar(20) DEFAULT NULL,
  `lainnya` varchar(20) DEFAULT NULL,
  `jaminan` varchar(128) DEFAULT NULL,
  `notaris` varchar(50) NOT NULL,
  `provisi` varchar(20) DEFAULT NULL,
  `administrasi` varchar(20) DEFAULT NULL,
  `asuransi` varchar(20) DEFAULT NULL,
  `materai` varchar(20) DEFAULT NULL,
  `apht` varchar(20) DEFAULT NULL,
  `skmht` varchar(20) DEFAULT NULL,
  `titipan` varchar(20) DEFAULT NULL,
  `fiduciare` varchar(20) DEFAULT NULL,
  `legalisasi` varchar(20) DEFAULT NULL,
  `lain` varchar(20) DEFAULT NULL,
  `roya` varchar(20) DEFAULT NULL,
  `proses` varchar(20) DEFAULT NULL,
  `sertifikat` varchar(20) DEFAULT NULL,
  `akta` varchar(20) DEFAULT NULL,
  `pendaftaran` varchar(20) DEFAULT NULL,
  `plotting` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usulan`
--

INSERT INTO `usulan` (`id_usulan`, `id_lb`, `character`, `capacity`, `capital`, `kel_hutang`, `kel_angsuran`, `coe`, `collateral`, `plafond`, `sifat`, `jenis`, `tujuan`, `sektor`, `waktu`, `bunga`, `angsuran`, `denda`, `realisasi`, `tanggungan`, `likuidasi`, `lainnya`, `jaminan`, `notaris`, `provisi`, `administrasi`, `asuransi`, `materai`, `apht`, `skmht`, `titipan`, `fiduciare`, `legalisasi`, `lain`, `roya`, `proses`, `sertifikat`, `akta`, `pendaftaran`, `plotting`) VALUES
(1, 9, 'Baik', 'Baik', 'Baik', NULL, NULL, 'Baik', 'Cukup', '700000000', 'Pokok Bunga tiap Bulan', 'Ulangan', 'Modal Kerja', 'Perdagangan', '96 Bulan', '12', '14286332', '29123', '2022-05-11', '150000000', '800000000', '0', 'Bus Merk isizu', 'Bambang Riyanto, SH. M.Kn.', '5250000', '5250000', '0', '10000', '1920000', '100000', '0', '1270000', '500000', '', '0', '400000', '150000', '', '50000', '0'),
(2, 9, 'Baik', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', 'Bus Merk Yamaha', 'Eka Sari Sulistyowati, SH. M.Kn.', '1150000', '1150000', '0', '18000', '1920000', '100000', '0', '0', '500000', '', '1000000', '280000', '250000', '', '400000', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analis`
--
ALTER TABLE `analis`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`id_analisis`);

--
-- Indexes for table `bismillah`
--
ALTER TABLE `bismillah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `capacity`
--
ALTER TABLE `capacity`
  ADD PRIMARY KEY (`id_cap`),
  ADD KEY `id_lb` (`id_lb`);

--
-- Indexes for table `capital_a`
--
ALTER TABLE `capital_a`
  ADD PRIMARY KEY (`id_capi`),
  ADD KEY `id_lb` (`id_lb`);

--
-- Indexes for table `capital_b`
--
ALTER TABLE `capital_b`
  ADD PRIMARY KEY (`id_capi`),
  ADD KEY `id_lb` (`id_lb`);

--
-- Indexes for table `cashflow_a`
--
ALTER TABLE `cashflow_a`
  ADD PRIMARY KEY (`id_cf`),
  ADD KEY `id_lb` (`id_lb`);

--
-- Indexes for table `cashflow_b`
--
ALTER TABLE `cashflow_b`
  ADD PRIMARY KEY (`id_cf`),
  ADD KEY `id_lb` (`id_lb`);

--
-- Indexes for table `collateral`
--
ALTER TABLE `collateral`
  ADD PRIMARY KEY (`id_col`),
  ADD KEY `id_lb` (`id_lb`);

--
-- Indexes for table `collateral_tanah`
--
ALTER TABLE `collateral_tanah`
  ADD PRIMARY KEY (`id_col2`),
  ADD KEY `id_lb` (`id_lb`);

--
-- Indexes for table `condition`
--
ALTER TABLE `condition`
  ADD PRIMARY KEY (`id_con`),
  ADD KEY `id_lb` (`id_lb`);

--
-- Indexes for table `dummy`
--
ALTER TABLE `dummy`
  ADD PRIMARY KEY (`id_cf`);

--
-- Indexes for table `karakter`
--
ALTER TABLE `karakter`
  ADD PRIMARY KEY (`id_char`),
  ADD KEY `id_lb` (`id_lb`) USING BTREE;

--
-- Indexes for table `latar_belakang`
--
ALTER TABLE `latar_belakang`
  ADD PRIMARY KEY (`id_lb`);

--
-- Indexes for table `notaris`
--
ALTER TABLE `notaris`
  ADD PRIMARY KEY (`notaris`);

--
-- Indexes for table `perkiraan`
--
ALTER TABLE `perkiraan`
  ADD PRIMARY KEY (`kode_perkiraan`);

--
-- Indexes for table `riwayat_pinjaman`
--
ALTER TABLE `riwayat_pinjaman`
  ADD PRIMARY KEY (`id_rp`),
  ADD KEY `id_lb` (`id_lb`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id_usulan`),
  ADD KEY `id_lb` (`id_lb`),
  ADD KEY `notaris` (`notaris`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisis`
--
ALTER TABLE `analisis`
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bismillah`
--
ALTER TABLE `bismillah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `capacity`
--
ALTER TABLE `capacity`
  MODIFY `id_cap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `capital_a`
--
ALTER TABLE `capital_a`
  MODIFY `id_capi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `capital_b`
--
ALTER TABLE `capital_b`
  MODIFY `id_capi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cashflow_a`
--
ALTER TABLE `cashflow_a`
  MODIFY `id_cf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cashflow_b`
--
ALTER TABLE `cashflow_b`
  MODIFY `id_cf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `collateral`
--
ALTER TABLE `collateral`
  MODIFY `id_col` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collateral_tanah`
--
ALTER TABLE `collateral_tanah`
  MODIFY `id_col2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `condition`
--
ALTER TABLE `condition`
  MODIFY `id_con` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dummy`
--
ALTER TABLE `dummy`
  MODIFY `id_cf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `karakter`
--
ALTER TABLE `karakter`
  MODIFY `id_char` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `latar_belakang`
--
ALTER TABLE `latar_belakang`
  MODIFY `id_lb` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `riwayat_pinjaman`
--
ALTER TABLE `riwayat_pinjaman`
  MODIFY `id_rp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `capacity`
--
ALTER TABLE `capacity`
  ADD CONSTRAINT `capacity_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `capital_a`
--
ALTER TABLE `capital_a`
  ADD CONSTRAINT `capital_a_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `capital_b`
--
ALTER TABLE `capital_b`
  ADD CONSTRAINT `capital_b_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cashflow_a`
--
ALTER TABLE `cashflow_a`
  ADD CONSTRAINT `cashflow_a_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cashflow_b`
--
ALTER TABLE `cashflow_b`
  ADD CONSTRAINT `cashflow_b_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `collateral`
--
ALTER TABLE `collateral`
  ADD CONSTRAINT `collateral_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `collateral_tanah`
--
ALTER TABLE `collateral_tanah`
  ADD CONSTRAINT `collateral_tanah_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `condition`
--
ALTER TABLE `condition`
  ADD CONSTRAINT `condition_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karakter`
--
ALTER TABLE `karakter`
  ADD CONSTRAINT `karakter_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_pinjaman`
--
ALTER TABLE `riwayat_pinjaman`
  ADD CONSTRAINT `riwayat_pinjaman_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usulan`
--
ALTER TABLE `usulan`
  ADD CONSTRAINT `usulan_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usulan_ibfk_2` FOREIGN KEY (`notaris`) REFERENCES `notaris` (`notaris`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
