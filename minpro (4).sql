-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2022 at 11:55 AM
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
(3, 11, 'Online Shop Salsabila Store', 'Jasa', 'Dagang Pakaian', 'Perumahan Arya Mandiri 2 Blok C No. 2 RT 05 RW 06 Plesungan Gondangrejo Kab. Karanganyar Jawa Tengah', 'Milik Sendiri', '082131049959', '2017-05-30', '2022-05-30', '-', '2022-05-30', '53.552.262.7-52', '2021-12-11', 'Saat ini calon debitur mempunyai usaha Online Shop yang bernama \" SALSABILA STORE\" / \"Focalluresolo\" yang menjual berbagai macam pakaian.', 'Pembelian tanah luas 2.270 m2', '', '', '400000000', '', '', '400000000', 'Setekah mendapat fasilitas pinjaman dari PT. BPR Ekadharma Bhinaraharja calon debitur bisa melunasi kekurangan pembelian tanah tersebut dan otomatis menambah asset calon debitur.');

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

--
-- Dumping data for table `capital_a`
--

INSERT INTO `capital_a` (`id_capi`, `id_lb`, `kas`, `tabungan`, `deposito`, `piutang`, `peralatan`, `barang`, `barang2`, `barang3`, `sewa`, `lahan`, `gedung`, `operasional`, `lain`, `total_al`, `tanah`, `bangunan`, `kendaraan`, `inventaris`, `lain2`, `total_at`, `total_aset`, `hutang_jpk`, `hutang_jpg`, `hutang_lain`, `hutang_dagang`, `total_hutang`, `laba_rugi`, `modal`, `harta`, `total_kjb`) VALUES
(8, 11, '279202000', '10000000', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '344202000', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '799202000', '0', '57647336', '0', '0', '57647336', '24202000', '262352664', '455000000', '799202000'),
(9, 11, '279202000', '10000000', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '344202000', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '799202000', '0', '57647336', '0', '0', '57647336', '24202000', '262352664', '455000000', '799202000'),
(10, 11, '279202000', '10000000', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '344202000', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '799202000', '0', '57647336', '0', '0', '57647336', '24202000', '262352664', '455000000', '799202000'),
(11, 11, '279202000', '10000000', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '344202000', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '799202000', '0', '57647336', '0', '0', '57647336', '24202000', '262352664', '455000000', '799202000'),
(12, 11, '279202000', '10000000', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '344202000', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '799202000', '0', '57647336', '0', '0', '57647336', '24202000', '262352664', '455000000', '799202000'),
(13, 11, '279202000', '10000000', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '344202000', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '799202000', '0', '57647336', '0', '0', '57647336', '24202000', '262352664', '455000000', '799202000'),
(14, 11, '279202000', '10000000', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '344202000', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '799202000', '0', '57647336', '0', '0', '57647336', '24202000', '262352664', '455000000', '799202000');

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
(30, 11, '255000000', '10000000', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '320000000', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '775000000', '0', '57647336', '0', '0', '57647336', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `capital_cache`
--

CREATE TABLE `capital_cache` (
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
  `total_kjb` varchar(50) DEFAULT NULL,
  `total_angsuran` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `capital_cache`
--

INSERT INTO `capital_cache` (`id_capi`, `id_lb`, `kas`, `tabungan`, `deposito`, `piutang`, `peralatan`, `barang`, `barang2`, `barang3`, `sewa`, `lahan`, `gedung`, `operasional`, `lain`, `total_al`, `tanah`, `bangunan`, `kendaraan`, `inventaris`, `lain2`, `total_at`, `total_aset`, `hutang_jpk`, `hutang_jpg`, `hutang_lain`, `hutang_dagang`, `total_hutang`, `laba_rugi`, `modal`, `harta`, `total_kjb`, `total_angsuran`) VALUES
(1, 11, '303404000', '10000000', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '368404000', '550000000', '150000000', '150000000', '0', '5000000', '855000000', '1223404000', '0', '457647336', '0', '0', '457647336', '24202000', '(113,445,336)', '855000000', '1223404000', '0'),
(2, 11, '303404000', '10000000', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '368404000', '550000000', '150000000', '150000000', '0', '5000000', '855000000', '1223404000', '0', '457647336', '0', '0', '457647336', '24202000', '(113,445,336)', '855000000', '1223404000', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cashflow_a`
--

CREATE TABLE `cashflow_a` (
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
-- Dumping data for table `cashflow_a`
--

INSERT INTO `cashflow_a` (`id_cf`, `id_lb`, `kode_perkiraan`, `nama_perkiraan`, `keterangan`, `saldo`, `kode_jenis`, `jenis`) VALUES
(83, 11, '2.1.2', 'Hutang Jangka Panjang', 'Hutang di Ekadharma', '400000000', 'K', 'hutang'),
(84, 11, '1.2.1', 'Tanah', 'Hutang di Ekadharma', '400000000', 'D', 'hutang'),
(85, 11, '4.1.1', 'Pendapatan Usaha (Omset) 1', 'Usaha Online Shop', '108702000', 'K', 'pendapatan'),
(86, 11, '1.1.1', 'Kas', 'Usaha Online Shop', '108702000', 'D', 'pendapatan'),
(87, 11, '1.1.1', 'Kas', 'Pembelian barang dagangan', '80000000', 'K', 'pengeluaran'),
(88, 11, '5.1.1', 'Harga Pokok Pembelian 1', 'Pembelian barang dagangan', '80000000', 'D', 'pengeluaran'),
(89, 11, '1.1.1', 'Kas', 'Biaya operasional', '1500000', 'K', 'pengeluaran'),
(90, 11, '5.1.3', 'Biaya Operasional Usaha 1', 'Biaya operasional', '1500000', 'D', 'pengeluaran'),
(91, 11, '1.1.1', 'Kas', 'Gaji 2 orang karyawan', '3000000', 'K', 'pengeluaran'),
(92, 11, '5.1.4', 'Biaya Gaji Karyawan Usaha 1', 'Gaji 2 orang karyawan', '3000000', 'D', 'pengeluaran'),
(95, 9, '4.1.1', 'Pendapatan Usaha (Omset) 1', 'Pendapatan dari toko kelontong', '27000000', 'K', 'pendapatan'),
(96, 9, '1.1.1', 'Kas', 'Pendapatan dari toko kelontong', '27000000', 'D', 'pendapatan'),
(97, 9, '1.1.1', 'Kas', 'Pembelian dagangan toko', '18000000', 'K', 'pengeluaran'),
(98, 9, '5.1.1', 'Harga Pokok Pembelian 1', 'Pembelian dagangan toko', '18000000', 'D', 'pengeluaran'),
(99, 9, '1.1.1', 'Kas', 'Biaya hidup sehari0hari', '1000000', 'K', 'pengeluaran'),
(100, 9, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya hidup sehari0hari', '1000000', 'D', 'pengeluaran'),
(101, 9, '1.1.1', 'Kas', 'Biaya sekolah', '500000', 'K', 'pengeluaran'),
(102, 9, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya sekolah', '500000', 'D', 'pengeluaran'),
(103, 9, '1.1.1', 'Kas', 'Biaya listrik,air,telpon', '500000', 'K', 'pengeluaran'),
(104, 9, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya listrik,air,telpon', '500000', 'D', 'pengeluaran'),
(105, 9, '1.1.1', 'Kas', 'Biaya lain-lain', '500000', 'K', 'pengeluaran'),
(106, 9, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya lain-lain', '500000', 'D', 'pengeluaran'),
(107, 9, '1.1.1', 'Kas', 'Angsuran bank Ekadarma', '3500000', 'K', 'pengeluaran'),
(108, 9, '5.5.1', 'Biaya Angsuran di BPR EKA DHARMA BHINARAHARJA', 'Angsuran bank Ekadarma', '3500000', 'D', 'pengeluaran');

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
(73, 11, '4.1.1', 'Pendapatan Usaha (Omset) 1', 'Dari usaha Online Shop', '108702000', 'K', 'pendapatan'),
(74, 11, '1.1.1', 'Kas', 'Dari usaha Online Shop', '108702000', 'D', 'pendapatan'),
(75, 11, '1.1.1', 'Kas', 'Pembelian barang dagangan', '80000000', 'K', 'pengeluaran'),
(76, 11, '5.1.1', 'Harga Pokok Pembelian 1', 'Pembelian barang dagangan', '80000000', 'D', 'pengeluaran'),
(77, 11, '1.1.1', 'Kas', 'Biaya operasional ', '1500000', 'K', 'pengeluaran'),
(78, 11, '5.1.3', 'Biaya Operasional Usaha 1', 'Biaya operasional ', '1500000', 'D', 'pengeluaran'),
(79, 11, '1.1.1', 'Kas', 'Gaji 2 orang karyawan', '3000000', 'K', 'pengeluaran'),
(80, 11, '5.1.4', 'Biaya Gaji Karyawan Usaha 1', 'Gaji 2 orang karyawan', '3000000', 'D', 'pengeluaran');

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
  `taksiran` varchar(20) DEFAULT NULL,
  `nl` varchar(20) DEFAULT NULL,
  `usulan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `usulan` text,
  `harga_t` varchar(20) DEFAULT NULL,
  `harga_b` varchar(20) DEFAULT NULL,
  `harga_t2` varchar(20) DEFAULT NULL,
  `harga_b2` varchar(20) DEFAULT NULL,
  `ht` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collateral_tanah`
--

INSERT INTO `collateral_tanah` (`id_col2`, `id_lb`, `jenis`, `nama`, `alamat`, `no_shm`, `lokasi`, `tgl_ukur`, `no_ukur`, `luas_t`, `luas_b`, `milik`, `fisik_jaminan`, `taksasi`, `usulan`, `harga_t`, `harga_b`, `harga_t2`, `harga_b2`, `ht`) VALUES
(5, 11, 'Tanah Pertanian', 'Giri Purnomo', 'Desa Soco RT 05 RW 02 Kec. Jogorogo Kab. Magetan', '252', 'Desa Soco RT 05 RW 02 Kec. Jogorogo Kab. Magetan', '2011-06-09', '05/2011', '2270', NULL, 'Milik sendiri', 'Sebidang tanah pertanian yang sudah dikeringkan terletak di pinggir jalan raya Jogorogo- Paron mempunyai nilai marketable yang baik. (proses balik nama ke calon debitur)', NULL, '-', '81720000', NULL, '681000000', NULL, '500000000');

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
(4, 11, 'Usaha Online Shop milik sendiri dikelola  dengan istri dan dibantu oleh 2 orang karyawan. Mempunyai pelayanan dan kualitas barang yang baik', 'Terkadang barang pesanan jadi tidak sesuai dengan dengan waktu yang ditentukan sebelumnya karena banyak faktor , salah satunya faktor pengiriman.', 'Sudah mempunyai banmyak konsumen, selalu mempunyai inovasi untuk menciptakan produk baru.', 'Munculnya usaha sejenis di wilayah tersebut sehingga mempengaruhi omest penghasilan calon debitur.');

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
(2, 11, 'Berkarakter baik, tidak suka judi, tidak suak minum-minuamn keras dan tidak terlibat dengan penyakit masyarakat lainnya.', 'Tekun Usaha, tidak cepat putus asa, kreatif dan inisiatif.', 'Keluarga harmonis, pergaulan baik, relasi banyak.', 'Andoko', 'Mustaqimi', 'Budi', 'Desa Soco RT 05 RW 02 Kec. Jogorogo Kab. Ngawi ', 'Desa Tanjungasri RT 05 RW 02 Kec. Jogorogo Kab. Ngawi', 'Desa Soco RT 07 RW 2 Kec. Jogogorogo Kab. Magetan', '085784408086', '085749021166', '085890034542');

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
  `user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latar_belakang`
--

INSERT INTO `latar_belakang` (`id_lb`, `cif_bank`, `tgl_analisa`, `tgl_permohonan`, `plafon`, `jangka_waktu`, `sifat_kredit`, `suku_bunga`, `jenis_permohonan`, `tujuan_permohonan`, `ket_penggunaan`, `nama_debitur`, `status_kawin`, `ttl_nasabah`, `ktp`, `alamat_ktp_nasabah`, `domisili_nasabah`, `hp_nasabah`, `status_tt`, `pekerjaan_nasabah`, `tanggungan`, `pendidikan`, `jenis_kelamin`, `masa_laku`, `telp_kantor`, `lama_tinggal`, `nama_pasangan`, `ttl_pasangan`, `alamat_ktp_pasangan`, `domisili_pasangan`, `pekerjaan_pasangan`, `hp_pasangan`, `nama_keluarga`, `hubungan_keluarga`, `alamat_keluarga`, `hp_keluarga`, `user`) VALUES
(11, '00001', '2022-06-02', '2022-06-02', '400000000', '600', 'Pokok bunga tiap bulan', '20 % Flate per tahun', 'Baru', 'Modal Kerja', 'Pembelian tanah luas 2.270 m2', 'RANDY WIJAYA KUSUMA', 'Tidak Menikah', 'Ngawi, 20-07-1994', '3521032007940002', 'Desa Soco RT 05 RW 02 Kec. Jogorogo Kab. Ngawi', 'Perumahan Arya Mandiri 2 Blok C No. 2 RT 05 RW 06 Plesungan Gondangrejo Kab. Karanganyar Jawa Tengah.', '08131049959', 'Milik Sendiri', 'Wiraswasta', ' 3', 'SD', 'Laki-laki', 'Seumur Hidup', '0', ' 2', 'IZZATUL NAJMI ALMANARAH', 'Blitar, 28-11-1997', 'Desa Soco RT 05 RW 02 Kec. Jogorogo Kab. Ngawi', 'Perumahan Arya Mandiri 2 Blok C No. 2 RT 05 RW 06 Plesungan Gondangrejo Kab. Karanganyar Jawa Tengah.', 'Ibu Rumah Tangga', '08131049959', 'ERNING YULI ASTUTIK', 'Anak Kandung', '  Desa Soco RT 05 RW 02 Kec. Jogorogo Kab. Ngawi', '0895704310022', 'fatia@gmail.com');

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
('1.1.11', 'Lain - Lain'),
('1.1.12', 'Persediaan Barang Usaha 2'),
('1.1.13', 'Persediaan Barang Usaha 3'),
('1.1.2', 'Tabungan'),
('1.1.3', 'Deposito'),
('1.1.4', 'Piutang'),
('1.1.5', 'Peralatan'),
('1.1.6', 'Persediaan Barang Usaha 1'),
('1.1.7', 'Sewa Dibayar Dimuka'),
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
(9, 'Test', 'test@gmail.com', 'default.jpg', '$2y$10$OfDZBPorrEJ12sYTrMxGMu3T9hfG.KbDrahwm8fdDTIR7lwIK0LMC', 5, 1, 1648089117),
(10, 'User1', 'user1@gmail.com', 'default.jpg', '$2y$10$9gs/E/aBKGtWHC2u3NEva.jtx8PyDifgMqOKl6UhV3NXREZjmBBmu', 2, 1, 1654236926);

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
(5, 11, 'Baik', 'Baik', 'Baik', NULL, NULL, 'Baik', 'Cukup', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-02', NULL, NULL, NULL, NULL, 'Eka Sari Sulistyowati, SH. M.Kn.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `capital_cache`
--
ALTER TABLE `capital_cache`
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
  MODIFY `id_cap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `capital_a`
--
ALTER TABLE `capital_a`
  MODIFY `id_capi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `capital_b`
--
ALTER TABLE `capital_b`
  MODIFY `id_capi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `capital_cache`
--
ALTER TABLE `capital_cache`
  MODIFY `id_capi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cashflow_a`
--
ALTER TABLE `cashflow_a`
  MODIFY `id_cf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `cashflow_b`
--
ALTER TABLE `cashflow_b`
  MODIFY `id_cf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `collateral`
--
ALTER TABLE `collateral`
  MODIFY `id_col` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collateral_tanah`
--
ALTER TABLE `collateral_tanah`
  MODIFY `id_col2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `condition`
--
ALTER TABLE `condition`
  MODIFY `id_con` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dummy`
--
ALTER TABLE `dummy`
  MODIFY `id_cf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `karakter`
--
ALTER TABLE `karakter`
  MODIFY `id_char` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `latar_belakang`
--
ALTER TABLE `latar_belakang`
  MODIFY `id_lb` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `riwayat_pinjaman`
--
ALTER TABLE `riwayat_pinjaman`
  MODIFY `id_rp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
