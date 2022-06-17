-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 08:49 AM
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
(3, 11, 'Online Shop Salsabila Store', 'Industri', 'Dagang Pakaian', 'Perumahan Arya Mandiri 2 Blok C No. 2 RT 05 RW 06 Plesungan Gondangrejo Kab. Karanganyar Jawa Tengah', 'Milik Sendiri', '082131049959', '2017-05-30', '2022-05-30', '-', '2022-05-30', '53.552.262.7-52', '2021-12-11', 'Saat ini calon debitur mempunyai usaha Online Shop yang bernama \" SALSABILA STORE\" / \"Focalluresolo\" yang menjual berbagai macam pakaian.', 'Pembelian tanah luas 2.270 m2', '', '', '400000000', '', '', '400000000', 'Setekah mendapat fasilitas pinjaman dari PT. BPR Ekadharma Bhinaraharja calon debitur bisa melunasi kekurangan pembelian tanah tersebut dan otomatis menambah asset calon debitur.'),
(4, 17, 'Perdagangan Beras Bpk. Kasdi', 'Perdagangan', 'Perdagangan beras', 'Desa Sawojajar RT 09 RW 02 Kecamatan Takeran Kabupaten Magetan', 'Milik Sendiri', '08753421768', '1999-08-06', '2010-07-08', '-', '0000-00-00', '-', '0000-00-00', '-', 'Tambah modal usaha dagang beras', '', '', '250000000', '', '', '250000000', '-'),
(5, 22, 'Perdagangan toko pracangan', 'Perdagangan', 'Perdagangan toko pracangan', 'Desa Nguri RT01 RW 03, Kec.Lembeyan Kab.Magetan', 'Milik Sendiri', '081335770044', '2022-06-17', '0000-00-00', '0', '0000-00-00', '0', '0000-00-00', 'Usaha saat ini ', 'Pembelian barang dagangan', 'Perbaikan tempat usaha', '-', '20000000', '5000000', '0', '25000000', 'Setelah realisasi'),
(6, 23, 'Debitur seorang PNS di BPN Magetan', 'Pegawai', '-', 'BPN Magetan', 'Instansi', '-', '1999-06-10', '2009-06-10', '-', '0000-00-00', '78.839.051.6-64', '2009-06-20', '-', 'Pembelian mobil', '', '', '200000000', '', '', '200000000', '-');

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
(8, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(9, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(10, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(11, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(12, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(13, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(14, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(15, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(16, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(17, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(18, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(19, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(20, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(21, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(22, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(23, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(24, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002'),
(25, 11, '350962000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '505962002', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '960962002', '0', '57647336', '0', '0', '57647336', '107962000', '340352666', '455000000', '960962002');

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
(30, 11, '255000000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '5000000', '320000000', '150000000', '150000000', '150000000', '0', '5000000', '455000000', '775000000', '0', '57647336', '0', '0', '57647336', NULL, NULL, NULL, NULL),
(31, 17, '25000000', '10000000', '0', '100000000', '75000000', '250000000', '0', '0', '0', '100000000', '200000000', '175000000', '0', '935000000', '200000000', '100000000', '100000000', '0', '0', '400000000', '1335000000', '0', '0', '130653000', '0', '130653000', NULL, NULL, NULL, NULL),
(32, 22, '2500000', '0', '0', '5000000', '7500000', '20000000', '0', '0', '0', '75000000', '25000000', '0', '0', '135000000', '100000000', '125000000', '25000000', '0', '0', '250000000', '385000000', '0', '0', '0', '0', '0', NULL, NULL, NULL, NULL),
(33, 23, '1000000', '0', '0', '0', '0', '0', '0', '0', '0', '451000000', '0', '0', '0', '452000000', '148512000', '240000000', '0', '0', '0', '388512000', '840512000', '3750000', '0', '124028028', '0', '127778028', NULL, NULL, NULL, NULL);

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
(1, 11, '376717000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '18250000', '544967002', '550000000', '150000000', '150000000', '0', '18250000', '868250000', '1413217002', '0', '457647336', '13250000', '0', '470897336', '27405000', '46664666', '868250000', '1413217002', '0'),
(12, 11, '376717000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '18250000', '544967002', '550000000', '150000000', '150000000', '0', '18250000', '868250000', '1413217002', '0', '457647336', '13250000', '0', '470897336', '27405000', '46664666', '868250000', '1413217002', '0'),
(13, 11, '376717000', '100000002', '0', '0', '20000000', '20000000', '0', '0', '0', '0', '0', '10000000', '18250000', '544967002', '550000000', '150000000', '150000000', '0', '18250000', '868250000', '1413217002', '0', '457647336', '13250000', '0', '470897336', '27405000', '46664666', '868250000', '1413217002', '0');

-- --------------------------------------------------------

--
-- Table structure for table `cashflow_a`
--

CREATE TABLE `cashflow_a` (
  `id_cf` int(11) NOT NULL,
  `id_lb` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
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

INSERT INTO `cashflow_a` (`id_cf`, `id_lb`, `kode`, `kode_perkiraan`, `nama_perkiraan`, `keterangan`, `saldo`, `kode_jenis`, `jenis`) VALUES
(83, 11, '1', '2.1.2', 'Hutang Jangka Panjang', 'Hutang di Ekadharma', '400000000', 'K', 'hutang'),
(84, 11, '1', '1.2.1', 'Tanah', 'Hutang di Ekadharma', '400000000', 'D', 'hutang'),
(87, 11, '3', '1.1.1', 'Kas', 'Pembelian barang dagangan', '80000000', 'K', 'pengeluaran'),
(88, 11, '3', '5.1.1', 'Harga Pokok Pembelian 1', 'Pembelian barang dagangan', '80000000', 'D', 'pengeluaran'),
(89, 11, '4', '1.1.1', 'Kas', 'Biaya operasional', '1500000', 'K', 'pengeluaran'),
(90, 11, '4', '5.1.3', 'Biaya Operasional Usaha 1', 'Biaya operasional', '1500000', 'D', 'pengeluaran'),
(91, 11, '5', '1.1.1', 'Kas', 'Gaji 2 orang karyawan', '3000000', 'K', 'pengeluaran'),
(92, 11, '5', '5.1.4', 'Biaya Gaji Karyawan Usaha 1', 'Gaji 2 orang karyawan', '3000000', 'D', 'pengeluaran'),
(121, 17, NULL, '4.1.1', 'Pendapatan Usaha (Omset) 1', 'Dgang beras', '250000000', 'K', 'pendapatan'),
(122, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Dgang beras', '250000000', 'D', 'pendapatan'),
(123, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Pembelian padi', '125000000', 'K', 'pengeluaran'),
(124, 17, NULL, '5.1.1', 'Harga Pokok Pembelian 1', 'Pembelian padi', '125000000', 'D', 'pengeluaran'),
(125, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Penggilingan padi', '15000000', 'K', 'pengeluaran'),
(126, 17, NULL, '5.1.3', 'Biaya Operasional Usaha 1', 'Penggilingan padi', '15000000', 'D', 'pengeluaran'),
(127, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Biaya transport', '10000000', 'K', 'pengeluaran'),
(128, 17, NULL, '5.1.3', 'Biaya Operasional Usaha 1', 'Biaya transport', '10000000', 'D', 'pengeluaran'),
(129, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'gaji karyawan', '10000000', 'K', 'pengeluaran'),
(130, 17, NULL, '5.1.4', 'Biaya Gaji Karyawan Usaha 1', 'gaji karyawan', '10000000', 'D', 'pengeluaran'),
(131, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Biaya lain-lain', '10000000', 'K', 'pengeluaran'),
(132, 17, NULL, '5.1.5', 'Biaya Lain - lain Usaha 1', 'Biaya lain-lain', '10000000', 'D', 'pengeluaran'),
(133, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Hidup sehari-hari', '2500000', 'K', 'pengeluaran'),
(134, 17, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Hidup sehari-hari', '2500000', 'D', 'pengeluaran'),
(135, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Pendidikan anak', '1000000', 'K', 'pengeluaran'),
(136, 17, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Pendidikan anak', '1000000', 'D', 'pengeluaran'),
(137, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'air listrik telp', '500000', 'K', 'pengeluaran'),
(138, 17, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'air listrik telp', '500000', 'D', 'pengeluaran'),
(139, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Lain-lain', '5000000', 'K', 'pengeluaran'),
(140, 17, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Lain-lain', '5000000', 'D', 'pengeluaran'),
(141, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Angsuran jatim', '27323000', 'K', 'pengeluaran'),
(142, 17, NULL, '5.5.4', 'Biaya Angsuran Hutang Lain', 'Angsuran jatim', '27323000', 'D', 'pengeluaran'),
(143, 22, NULL, '4.1.1', 'Pendapatan Usaha (Omset) 1', 'Pendapatan dari toko pracangan', '8500000', 'K', 'pendapatan'),
(144, 22, NULL, '1.1.1', 'Kas', 'Pendapatan dari toko pracangan', '8500000', 'D', 'pendapatan'),
(145, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Angs ekadharma', '14167000', 'K', 'pengeluaran'),
(146, 17, NULL, '5.5.1', 'Biaya Angsuran di BPR EKA DHARMA BHINARAHARJA', 'Angs ekadharma', '14167000', 'D', 'pengeluaran'),
(147, 22, NULL, '4.1.4', 'Pendapatan Lain / Gaji', 'Pendapatan dari sopir', '2500000', 'K', 'pendapatan'),
(148, 22, NULL, '1.1.1', 'Kas', 'Pendapatan dari sopir', '2500000', 'D', 'pendapatan'),
(149, 17, NULL, '2.1.1', 'Hutang Jangka Pendek', 'Pembelian gabah', '250000000', 'K', 'hutang'),
(150, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Pembelian gabah', '250000000', 'D', 'hutang'),
(151, 22, NULL, '1.1.1', 'Kas', 'Pembelian Barang dagangan', '4500000', 'K', 'pengeluaran'),
(152, 22, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Pembelian Barang dagangan', '4500000', 'D', 'pengeluaran'),
(153, 22, NULL, '2.1.1', 'Hutang Jangka Pendek', 'Dana untuk pembelian stok agangand', '20000000', 'K', 'hutang'),
(154, 22, NULL, '1.1.1', 'Kas', 'Dana untuk pembelian stok agangand', '20000000', 'D', 'hutang'),
(155, 22, NULL, '2.1.1', 'Hutang Jangka Pendek', 'Perbaikan tempat usaha', '5000000', 'K', 'hutang'),
(156, 22, NULL, '1.1.9', 'Gedung / Ruko', 'Perbaikan tempat usaha', '5000000', 'D', 'hutang'),
(159, 20, '9', '2.1.1', '', 'Pembelian mobil toyota Avanza tahun 2012', '115000000', 'K', 'hutang'),
(160, 20, '9', '1.2.3', '', 'Pembelian mobil toyota Avanza tahun 2012', '115000000', 'D', 'hutang'),
(161, 22, NULL, '1.1.1', 'Kas', 'Biaya hidup sehari-hari', '1000000', 'K', 'pengeluaran'),
(162, 22, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya hidup sehari-hari', '1000000', 'D', 'pengeluaran'),
(163, 22, NULL, '1.1.1', 'Kas', 'Biaya listrik,air,telpon', '500000', 'K', 'pengeluaran'),
(164, 22, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya listrik,air,telpon', '500000', 'D', 'pengeluaran'),
(165, 22, NULL, '1.1.1', 'Kas', 'Biaya sekolah anak', '500000', 'K', 'pengeluaran'),
(166, 22, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya sekolah anak', '500000', 'D', 'pengeluaran'),
(167, 22, NULL, '1.1.1', 'Kas', 'Biaya lain-lain', '500000', 'K', 'pengeluaran'),
(168, 22, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya lain-lain', '500000', 'D', 'pengeluaran'),
(169, 22, NULL, '1.1.1', 'Kas', 'Pembelian dagangan toko', '4500000', 'K', 'pengeluaran'),
(170, 22, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Pembelian dagangan toko', '4500000', 'D', 'pengeluaran'),
(171, 19, NULL, '4.1.1', 'Pendapatan Usaha (Omset) 1', '-', '10', 'K', 'pendapatan'),
(172, 19, NULL, '1.1.1', 'Kas', '-', '10', 'D', 'pendapatan'),
(187, 11, '2', '4.1.1', 'Pendapatan Usaha (Omset) 1', 'Usaha Online Shop', '108705000', 'K', 'pendapatan'),
(188, 11, '2', '1.1.1', 'Kas', 'Usaha Online Shop', '108705000', 'D', 'pendapatan'),
(191, 11, '6', '4.1.2', 'Pendapatan Usaha (Omset) 2', 'Dari usaha dropshiping', '3200000', 'K', 'pendapatan'),
(192, 11, '6', '1.1.1', 'Kas', 'Dari usaha dropshiping', '3200000', 'D', 'pendapatan'),
(197, 11, '7', '1.1.1', 'Kas', 'Biaya beli laptop asus x540LJ', '1650000', 'K', 'pengeluaran'),
(198, 11, '7', '5.2.3', 'Biaya Operasional Usaha 2', 'Biaya beli laptop asus x540LJ', '1650000', 'D', 'pengeluaran'),
(201, 11, '8', '2.1.4', 'Hutang Lain', 'Hutang tetangga', '13250000', 'K', 'hutang'),
(202, 11, '8', '1.2.5', 'Lain - lain', 'Hutang tetangga', '13250000', 'D', 'hutang');

-- --------------------------------------------------------

--
-- Table structure for table `cashflow_b`
--

CREATE TABLE `cashflow_b` (
  `id_cf` int(11) NOT NULL,
  `id_lb` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
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

INSERT INTO `cashflow_b` (`id_cf`, `id_lb`, `kode`, `kode_perkiraan`, `nama_perkiraan`, `keterangan`, `saldo`, `kode_jenis`, `jenis`) VALUES
(77, 11, '3', '1.1.1', 'Kas', 'Biaya operasional ', '1500000', 'K', 'pengeluaran'),
(78, 11, '3', '5.1.3', 'Biaya Operasional Usaha 1', 'Biaya operasional ', '1500000', 'D', 'pengeluaran'),
(79, 11, '4', '1.1.1', 'Kas', 'Gaji 2 orang karyawan', '3000000', 'K', 'pengeluaran'),
(80, 11, '4', '5.1.4', 'Biaya Gaji Karyawan Usaha 1', 'Gaji 2 orang karyawan', '3000000', 'D', 'pengeluaran'),
(83, 17, NULL, '4.1.1', 'Pendapatan Usaha (Omset) 1', 'dagang beras', '250000000', 'K', 'pendapatan'),
(84, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'dagang beras', '250000000', 'D', 'pendapatan'),
(85, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Beli gabah', '125000000', 'K', 'pengeluaran'),
(86, 17, NULL, '5.1.1', 'Harga Pokok Pembelian 1', 'Beli gabah', '125000000', 'D', 'pengeluaran'),
(87, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Biaya penggilingan padi', '15000000', 'K', 'pengeluaran'),
(88, 17, NULL, '5.1.3', 'Biaya Operasional Usaha 1', 'Biaya penggilingan padi', '15000000', 'D', 'pengeluaran'),
(89, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Biaya transportasi', '10000000', 'K', 'pengeluaran'),
(90, 17, NULL, '5.1.3', 'Biaya Operasional Usaha 1', 'Biaya transportasi', '10000000', 'D', 'pengeluaran'),
(91, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Biaya tenaga kerja', '10000000', 'K', 'pengeluaran'),
(92, 17, NULL, '5.1.4', 'Biaya Gaji Karyawan Usaha 1', 'Biaya tenaga kerja', '10000000', 'D', 'pengeluaran'),
(93, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Lain-lain', '5000000', 'K', 'pengeluaran'),
(94, 17, NULL, '1.2.5', 'Lain - lain', 'Lain-lain', '5000000', 'D', 'pengeluaran'),
(95, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Biaya hidup sehari-hari', '2500000', 'K', 'pengeluaran'),
(96, 17, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya hidup sehari-hari', '2500000', 'D', 'pengeluaran'),
(97, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Biaya pendidikan', '1000000', 'K', 'pengeluaran'),
(98, 17, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya pendidikan', '1000000', 'D', 'pengeluaran'),
(99, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Biaya air, telp, listrik', '500000', 'K', 'pengeluaran'),
(100, 17, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya air, telp, listrik', '500000', 'D', 'pengeluaran'),
(101, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Lain-lain', '5000000', 'K', 'pengeluaran'),
(102, 17, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Lain-lain', '5000000', 'D', 'pengeluaran'),
(103, 17, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Angsuran', '27323000', 'K', 'pengeluaran'),
(104, 17, NULL, '5.5.4', 'Biaya Angsuran Hutang Lain', 'Angsuran', '27323000', 'D', 'pengeluaran'),
(105, 22, NULL, '4.1.1', 'Pendapatan Usaha (Omset) 1', 'Pendapatan toko pracangan', '8000000', 'K', 'pendapatan'),
(106, 22, NULL, '1.1.1', 'Kas', 'Pendapatan toko pracangan', '8000000', 'D', 'pendapatan'),
(107, 22, NULL, '4.1.4', 'Pendapatan Lain / Gaji', 'Pendapatan dari sopir', '2500000', 'K', 'pendapatan'),
(108, 22, NULL, '1.1.1', 'Kas', 'Pendapatan dari sopir', '2500000', 'D', 'pendapatan'),
(109, 22, NULL, '1.1.1', 'Kas', 'Pembeliaan dagangan ', '4000000', 'K', 'pengeluaran'),
(110, 22, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Pembeliaan dagangan ', '4000000', 'D', 'pengeluaran'),
(111, 20, NULL, '1.1.1', '', 'Biaya rumah tangga', '2008750', 'K', 'pengeluaran'),
(112, 20, NULL, '5.4.1', '', 'Biaya rumah tangga', '2008750', 'D', 'pengeluaran'),
(113, 20, '8', '1.1.1', '', 'Angsuran di Bank Ekadharma', '1700000', 'K', 'pengeluaran'),
(114, 20, '8', '5.5.1', '', 'Angsuran di Bank Ekadharma', '1700000', 'D', 'pengeluaran'),
(115, 22, NULL, '1.1.1', 'Kas', 'Biaya hidup sehari-hari', '1000000', 'K', 'pengeluaran'),
(116, 22, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya hidup sehari-hari', '1000000', 'D', 'pengeluaran'),
(117, 22, NULL, '1.1.1', 'Kas', 'Biaya listrik,air,telpon', '500000', 'K', 'pengeluaran'),
(118, 22, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya listrik,air,telpon', '500000', 'D', 'pengeluaran'),
(119, 22, NULL, '1.1.1', 'Kas', 'Biaya seko;ah', '500000', 'K', 'pengeluaran'),
(120, 22, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya seko;ah', '500000', 'D', 'pengeluaran'),
(121, 22, NULL, '1.1.1', 'Kas', 'Biaya lain-lain', '500000', 'K', 'pengeluaran'),
(122, 22, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya lain-lain', '500000', 'D', 'pengeluaran'),
(123, 22, NULL, '1.1.1', 'Kas', 'Pembelian dagangan toko', '4000000', 'K', 'pengeluaran'),
(124, 22, NULL, '1.1.6', 'Persediaan Barang Usaha 1', 'Pembelian dagangan toko', '4000000', 'D', 'pengeluaran'),
(125, 19, NULL, '4.1.1', 'Pendapatan Usaha (Omset) 1', 'Pembelian ...', '0', 'K', 'pendapatan'),
(126, 19, NULL, '1.1.1', 'Kas', 'Pembelian ...', '0', 'D', 'pendapatan'),
(127, 19, NULL, '4.1.1', 'Pendapatan Usaha (Omset) 1', 'sudah', '0', 'K', 'pendapatan'),
(128, 19, NULL, '1.1.1', 'Kas', 'sudah', '0', 'D', 'pendapatan'),
(129, 19, NULL, '1.1.1', 'Kas', 'aaa', '5000', 'K', 'pengeluaran'),
(130, 19, NULL, '5.1.1', 'Harga Pokok Pembelian 1', 'aaa', '5000', 'D', 'pengeluaran'),
(131, 23, NULL, '4.1.4', 'Pendapatan Lain / Gaji', 'Gaji dari BPN', '4968600', 'K', 'pendapatan'),
(132, 23, NULL, '1.1.1', 'Kas', 'Gaji dari BPN', '4968600', 'D', 'pendapatan'),
(133, 23, NULL, '4.1.4', 'Pendapatan Lain / Gaji', 'Uang makan', '632700', 'K', 'pendapatan'),
(134, 23, NULL, '1.1.1', 'Kas', 'Uang makan', '632700', 'D', 'pendapatan'),
(135, 23, NULL, '4.1.4', 'Pendapatan Lain / Gaji', 'Gaji istri', '2167000', 'K', 'pendapatan'),
(136, 23, NULL, '1.1.1', 'Kas', 'Gaji istri', '2167000', 'D', 'pendapatan'),
(137, 23, NULL, '4.1.4', 'Pendapatan Lain / Gaji', 'Fee dari pengukuran tanah', '9000000', 'K', 'pendapatan'),
(138, 23, NULL, '1.1.1', 'Kas', 'Fee dari pengukuran tanah', '9000000', 'D', 'pendapatan'),
(139, 23, NULL, '1.1.1', 'Kas', 'Biaya rumah tangga', '1000000', 'K', 'pengeluaran'),
(140, 23, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya rumah tangga', '1000000', 'D', 'pengeluaran'),
(141, 23, NULL, '1.1.1', 'Kas', 'Biaya air,listrik,telp', '300000', 'K', 'pengeluaran'),
(142, 23, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya air,listrik,telp', '300000', 'D', 'pengeluaran'),
(143, 23, NULL, '1.1.1', 'Kas', 'Biaya lainnya', '200000', 'K', 'pengeluaran'),
(144, 23, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Biaya lainnya', '200000', 'D', 'pengeluaran'),
(145, 23, NULL, '1.1.1', 'Kas', 'Potongan gaji istri', '508750', 'K', 'pengeluaran'),
(146, 23, NULL, '5.4.1', 'Biaya Lain - lain (umum)', 'Potongan gaji istri', '508750', 'D', 'pengeluaran'),
(147, 23, NULL, '1.1.1', 'Kas', 'Angsuran BRI', '1700000', 'K', 'pengeluaran'),
(148, 23, NULL, '5.5.4', 'Biaya Angsuran Hutang Lain', 'Angsuran BRI', '1700000', 'D', 'pengeluaran'),
(149, 23, NULL, '1.1.1', 'Kas', 'Angsuran BPR Jatim', '2000000', 'K', 'pengeluaran'),
(150, 23, NULL, '5.5.4', 'Biaya Angsuran Hutang Lain', 'Angsuran BPR Jatim', '2000000', 'D', 'pengeluaran'),
(151, 23, NULL, '1.1.1', 'Kas', 'Angsuran MPM', '825000', 'K', 'pengeluaran'),
(152, 23, NULL, '5.5.4', 'Biaya Angsuran Hutang Lain', 'Angsuran MPM', '825000', 'D', 'pengeluaran'),
(153, 23, NULL, '1.1.1', 'Kas', 'Angsuran BRI ( istri )', '1625000', 'K', 'pengeluaran'),
(154, 23, NULL, '5.5.4', 'Biaya Angsuran Hutang Lain', 'Angsuran BRI ( istri )', '1625000', 'D', 'pengeluaran'),
(175, 11, '5', '4.1.2', 'Pendapatan Usaha (Omset) 2', 'Dari usaha dropship', '2530000', 'K', 'pendapatan'),
(176, 11, '5', '1.1.1', 'Kas', 'Dari usaha dropship', '2530000', 'D', 'pendapatan'),
(183, 11, '1', '4.1.1', 'Pendapatan Usaha (Omset) 1', 'Dari usaha Online Shop', '1230000', 'K', 'pendapatan'),
(184, 11, '1', '1.1.1', 'Kas', 'Dari usaha Online Shop', '1230000', 'D', 'pendapatan'),
(193, 11, '7', '1.1.1', 'Kas', 'Biaya beli laptop asus', '12000000', 'K', 'pengeluaran'),
(194, 11, '7', '5.2.2', 'Biaya Pemeliharaan Usaha 2', 'Biaya beli laptop asus', '12000000', 'D', 'pengeluaran'),
(195, 11, '2', '4.1.1', 'Pendapatan Usaha (Omset) 1', 'Usaha Online Shopp', '108702000', 'K', 'pendapatan'),
(196, 11, '2', '1.1.1', 'Kas', 'Usaha Online Shopp', '108702000', 'D', 'pendapatan');

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

--
-- Dumping data for table `collateral`
--

INSERT INTO `collateral` (`id_col`, `id_lb`, `roda`, `nopol`, `nama_stnk`, `alamat`, `type`, `jenis`, `tahun`, `warna`, `silinder`, `no_rangka`, `no_mesin`, `no_bpkb`, `milik`, `taksiran`, `nl`, `usulan`) VALUES
(2, 11, '6 (Enam)', 'AE 7359 NA', 'Yuliati', '-', 'Isuzu', 'Microbus', 2013, 'Putih Hijau Kuning', '2771 cc', 'MHCNKR', 'M055107', 'O-05769918', '', '0', '32000000', '-'),
(3, 17, '6 (Enam)', 'AE 9573 NC', 'YAYUK EKAWATI', 'Desa Sawojajar RT 09 RW 02 Kecamatan Takeran Kabupaten Magetan', 'MITSUBISHI/DS FE74 4X2', 'TRUCK', 2008, 'KUNING', '3908', 'MHMFE74P48K023458', '4D34TDX7156', 'K06618732', 'Milik sendiri atas nama sendiri', '165000000', '150000000', 'Diusulkan = Rp 165.000.000,- x 73 % = Rp 120.450.000,-');

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
(5, 11, 'Tanah non Pertanian', 'Giri Purnomo', 'Desa Soco RT 05 RW 02 Kec. Jogorogo Kab. Magetan', '252', 'Desa Soco RT 05 RW 02 Kec. Jogorogo Kab. Magetan', '2011-06-09', '05/2011', '2270', '0', 'Milik sendiri', 'Sebidang tanah pertanian yang sudah dikeringkan terletak di pinggir jalan raya Jogorogo- Paron mempunyai nilai marketable yang baik. (proses balik nama ke calon debitur)', '60', '-', '81720000', '78000', '681000000', '0', '500000000'),
(10, 17, 'Tanah Pertanaian', 'Yayuk Ekawati', 'Desa Sawojajar RT 09 RW 02 Kecamatan Takeran Kabupaten Magetan', '00562', 'Desa Sawojajar, Kecamatan Takeran Kabupaten Magetan', '1987-05-01', '1445', '575', '0', 'Milik sendiri atas nama sendiri', 'Agunan sebidang tanah pertanian yang terletak dipinggir jalan desa akses jalan beraspal lebar 3 meter', '70', 'Diusulkan melebihi taksasi bank dengan perhitungan = Rp 184.000.000,- x 73% = Rp 134.320.000,- dengan pertimbangan karakter baik, usaha lancar, tanah produktif', '27000', '0', '320000', '0', '165000000'),
(11, 22, 'Tanah perkarangan', 'supriyati', 'Desa Nguri RT01 RW 03, Kec.Lembeyan Kab.Magetan', '387', 'Desa Nguri,Lembeyan ,Magetan', '0000-00-00', '387/NGURI/2014', '733', '150', 'SUPRIYATI', 'Tanah pekarangan yang diatasnya berdiri bangunan tembok beratap genting yang dijadikan sebagai rumah tempat tinggal terletak dipinggir jalan desa berjarak 10 kilometer dari kecamatan dan 25 kilometer dari kabupaten terdapat akses  jalan aspal', '60', '-', '20000', '0', '142000', '1500000', '31000000'),
(12, 20, 'Sebidang tanah non pertanian', 'ISRAN', 'Desa Tulung Kecamatan Kab Magetan', '00912', 'Desa Tulung', '2007-03-21', '178/Tulung/2007', '396', '0', 'Milik sendiri', 'Tanah letak di pemukiman padat, jalan beraspal, asilitas listrik, air, telpon', '70', '-', '36000', '0', '357000', '0', '50000000');

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
(4, 11, 'qqUsaha Online Shop milik sendiri dikelola  dengan istri dan dibantu oleh 2 orang karyawan. Mempunyai pelayanan dan kualitas barang yang baikkkkkkkk', 'Terkadang barang pesanan jadi tidak sesuai dengan dengan waktu yang ditentukan sebelumnya karena banyak faktor , salah satunya faktor pengiriman.', 'Sudah mempunyai banyak konsumen, selalu mempunyai inovasi untuk menciptakan produk baru.', 'Munculnya usaha sejenis di wilayah tersebut sehingga mempengaruhi omest penghasilan calon debitur.'),
(5, 17, 'Usaha perdagangan beras sangat prospektif karena beras merupakan kebutuhan pokok, sehingga sampai kapanpun dibutuhkan oleh masyarakat.', 'Kelemahan usaha perdagangan beras diluar musim panen padi yang biasanya permintaan tinggi tapi barang langka', 'Peluang usaha perdagangan beras masih cukup', 'Ancaman'),
(6, 22, 'Usaha calon debitur adalah toko pracangan yang menyediakan kebutuhan pokok masyarakat', 'Kelemahan dari usaha tersebut adalah jika para pembeli tidak membayar cas/langsung maka pendapatan menurun', 'Peluanag usaha masih sangat bagus karena usaha tersebut menjual kebutuhan masyarakat', 'Ancaman terjadi jika ada usaha sejenis didaerah calon debitur'),
(7, 23, '-', '-', '-', '-');

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
(2, 11, 'aaaa', 'abbbb', 'acccd', '', '', '', '', '', '', '', '', ''),
(3, 17, 'a', 'a', 'a', '', '', '', '', '', '', '', '', ''),
(4, 22, 'a', 'a', 'a', '', '', '', '', '', '', '', '', ''),
(5, 23, 'a', 'a', 'a', '', '', '', '', '', '', '', '', ''),
(6, 24, 'a', 'a', 'a', '', '', '', '', '', '', '', '', ''),
(7, 24, 'a', 'a', 'a', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `latar_belakang`
--

CREATE TABLE `latar_belakang` (
  `id_lb` int(10) NOT NULL,
  `cif_bank` varchar(10) DEFAULT NULL,
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
(11, '00001', '2022-06-02', '2022-06-12', '400000000', '600', 'Pokok bunga tiap bulan', '20 % Flate per tahun', 'Baru', 'Modal Kerja', 'Pembelian tanah luas 2.270 m2', 'RANDY WIJAYA KUSUMA', 'Tidak Menikah', 'Ngawi, 20-07-1994', '3521032007940002', 'Desa Soco RT 05 RW 02 Kec. Jogorogo Kab. Ngawi', 'Perumahan Arya Mandiri 2 Blok C No. 2 RT 05 RW 06 Plesungan Gondangrejo Kab. Karanganyar Jawa Tengah.', '08131049959', 'Milik Sendiri', 'Wiraswasta', '3', 'SMA', 'Laki-laki', 'Seumur Hidup', '0', '2', 'IZZATUL NAJMI ALMANARAH', 'Blitar, 28-11-1997', 'Desa Soco RT 05 RW 02 Kec. Jogorogo Kab. Ngawi', 'Perumahan Arya Mandiri 2 Blok C No. 2 RT 05 RW 06 Plesungan Gondangrejo Kab. Karanganyar Jawa Tengah.', 'Ibu Rumah Tangga', '08131049959', 'ERNING YULI ASTUTIK', 'Anak Kandung', 'Desa Soco RT 05 RW 02 Kec. Jogorogo Kab. Ngawi', '0895704310022', 'fatia@gmail.com'),
(17, '00002', '2022-06-09', '2022-06-09', '250000000', '24', 'Pokok bunga tiap bulan', '18', 'Baru', 'Modal Kerja', 'Tambah modal usaha dagang beras', 'KASDI', 'Menikah', 'Magetan, 20-07-1965', '3520042007650001', 'Desa Sawojajar RT 09 RW 02 Kecamatan Takeran Kabupaten Magetan', 'Desa Sawojajar RT 09 RW 02 Kecamatan Takeran Kabupaten Magetan', '081359950159', 'Milik Sendiri', 'Perdagangan ( Beras )', '2', 'SMA', 'Laki-laki', 'Seumur Hidup', '0', '25', 'YAYUK EKAWATI', 'Magetan, 08-12-1973', 'Desa Sawojajar RT 09 RW 02 Kecamatan Takeran Kabupaten Magetan', 'Desa Sawojajar RT 09 RW 02 Kecamatan Takeran Kabupaten Magetan', 'Wiraswasta', '0', 'Wahyu', 'Rekan Kerja', 'Desa Sawojajar RT 09 RW 02 Kecamatan Takeran Kabupaten Magetan', '085735301218', 'arisanaaa82@gmail.com'),
(19, '00002', '2022-06-10', '2022-06-02', '10000000', '12', 'Pokok bunga tiap bulan', '18', 'Baru', 'Konsumsi', 'fsdfsg', 'hfgjhgjhfgg', 'Tidak Menikah', 'gdfgdfgdg', 'dfgdfgdfg', 'gdgdfg', 'gdfgdfg', 'dgdg', 'Milik Sendiri', 'dfgdfg', 'dfgdfg', 'SD', 'Laki-laki', 'Seumur Hidup', 'dfgdfgd', 'gdfgdfg', 'gdfgdf', 'ggdfgdf', 'ggdfgdfg', 'gdfgdfg', '', '', 'gdfgdfg', 'Anak Kandung', 'gdfgdfgdfg', 'dfgdfgdfg', 'fatia@gmail.com'),
(20, '00002', '2022-06-09', '2022-06-09', '200000000', '36', 'Pokok bunga tiap bulan', '12%', 'Top Up', 'Konsumsi', 'Digunakan untuk pembelian mobil toyota avanza tahu', 'ISRAN', 'Menikah', 'Magetan, 05 Februari 1967', '3520050502670001', 'Desa Tulung Rt 03 Rw 05 Kecamatan Kawedanan Kabupaten Magetan', 'Desa Tulung Rt 03 Rw 05 Kecamatan Kawedanan Kabupaten Magetan', '081 217 531 170', 'Milik Sendiri', 'PNS', '4', 'S1', 'Laki-laki', 'Seumur Hidup', '0351', '23', 'DWI HASTUTI', 'Pacitan, 13 November 1970', 'Desa Tulung Rt 03 Rw 05 Kecamatan Kawedanan Kabupaten Magetan\r\n', 'Desa Tulung Rt 03 Rw 05 Kecamatan Kawedanan Kabupaten Magetan\r\n', 'Pegawai KOperasi Sumber Urip', '0856 4101 2220', 'PAUJI', 'Saudara Kandung', 'Surabaya', '081 500 7871', 'handajanisri8@gmail.com'),
(22, '00002', '2022-06-10', '2022-06-10', '25000000', '24', 'Pokok bunga tiap bulan', '18 % flat /tahun', 'Baru', 'Modal Kerja', 'Tambah modal dagang pracangan', 'supriyati', 'Menikah', 'Magetan,08-09-1981', '3520034507860002', 'Desa Nguri RT01 RW 03, Kec.Lembeyan Kab.Magetan', 'Desa Nguri RT01 RW 03, Kec.Lembeyan Kab.Magetan', '08133577044', 'Milik Sendiri', 'Wiraswasta', '2', 'SMA', 'Laki-laki', 'Seumur Hidup', '0', '10', 'Suhadi prayitno', 'Magetan,05-02-1975', 'Desa Nguri RT01 RW 03, Kec.Lembeyan Kab.Magetan', 'Desa Nguri RT01 RW 03, Kec.Lembeyan Kab.Magetan', 'Wiraswasta', '0812345678', 'Suparmi', 'Tetangga', 'Desa Nguri RT01 RW 03, Kec.Lembeyan Kab.Magetan', '08523443221', 'arie29895@gmail.com'),
(23, '00002', '2022-06-03', '2022-05-25', '200000000', '36', 'Pokok bunga tiap bulan', '12 %', 'Ulangan', 'Konsumsi', 'Digunakan untuk pembelian mobil Avanza tahun 2012', 'Isran', 'Menikah', 'Magetan, 05-02-1967', '3520050502670001', 'Ds. Tulung Rt 003 Rw 005 Kec. Kawedanan Kab.Magetan', 'Ds. Tulung Rt 003 Rw 005 Kec. Kawedanan Kab.Magetan', '081217531170', 'Milik Sendiri', 'PNS ( BPN Magetan )', '4', 'S1', 'Laki-laki', 'Seumur Hidup', '0351895097', '23', 'Dwi Hastutik', 'Pacitan, 13-11-1970', 'Ds. Tulung Rt 003 Rw 005 Kec. Kawedanan Kab.Magetan', 'Ds. Tulung Rt 003 Rw 005 Kec. Kawedanan Kab.Magetan', 'Wiraswasta', '085641012220', 'Pauji', 'Saudara Kandung', 'Surabaya', '0815007871', 'mahfutansori@gmail.com'),
(24, '00002', '2022-06-09', '2022-06-08', '100000000', '36', 'Pokok bunga tiap bulan', '18%', 'Baru', 'Konsumsi', 'Renovasi rumah', 'Okee', 'Menikah', 'Magetan, 20081991', '3520062008910001', 'Waru ', 'Waru', '085612345678', 'Milik Sendiri', 'Swasta', '3', 'SMA', 'Laki-laki', 'Seumur Hidup', '', '29', 'Ika', 'Magetan, 09011991', 'Waru', 'Waru', 'Swasta', '081234567890', 'Pake', 'Orang Tua', 'Milangasri', '081098765432', 'avidianski@gmail.com');

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

--
-- Dumping data for table `riwayat_pinjaman`
--

INSERT INTO `riwayat_pinjaman` (`id_rp`, `id_lb`, `plafond`, `status`, `saldo`, `sejarah`, `data`) VALUES
(1, 11, '2413000', 'Lunas', '0', 'Tidak Baik', 'Terlampir'),
(3, 11, '54000', 'Lunas', '0', 'Tidak Baik', 'Terlampir'),
(5, 20, '30000000', 'Belum Lunas', '3750000', 'Tidak Baik', 'Terlampir'),
(6, 23, '10000000', 'Lunas', '0', 'Baik', 'Terlampir'),
(7, 23, '20000000', 'Lunas', '0', 'Baik', 'Terlampir'),
(8, 23, '30000000', 'Lunas', '0', 'Tidak Baik', 'Terlampir'),
(9, 23, '20000000', 'Lunas', '0', 'Baik', 'Terlampir'),
(10, 23, '30000000', 'Lunas', '0', 'Tidak Baik', 'Terlampir'),
(11, 23, '30000000', 'Lunas', '0', 'Tidak Baik', 'Terlampir'),
(12, 23, '25000000', 'Lunas', '0', 'Tidak Baik', 'Terlampir'),
(13, 23, '30000000', 'Belum Lunas', '3750000', 'Tidak Baik', 'Terlampir');

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
(10, 'User1', 'user1@gmail.com', 'default.jpg', '$2y$10$9gs/E/aBKGtWHC2u3NEva.jtx8PyDifgMqOKl6UhV3NXREZjmBBmu', 2, 1, 1654236926),
(11, 'Aris', 'arisanaaa82@gmail.com', 'default.jpg', '$2y$10$H/gXPCLBdzxO1kk4.yh3ieBKoGJNLVq5A9VDf.dumBo6EttOEazCi', 2, 1, 1654759518),
(12, 'SRI HANDAJANI', 'handajanisri8@gmail.com', 'default.jpg', '$2y$10$TPjK3aVUSDpqegBQ/1jQQuZn3pg8DUdXxFjBgi.fbIqvj1zfFt.oa', 2, 1, 1654759611),
(13, 'Bowo', 'arie29895@gmail.com', 'default.jpg', '$2y$10$.CQv1zCNGSw4J98vQztZH.JIFFFLjLlavHoLckMxmLEvuvz2qUFFK', 2, 1, 1654761390),
(14, 'mahfut ansori', 'mahfutansori@gmail.com', 'default.jpg', '$2y$10$bW20nNgN1dn7dI0G5eDwaeA0AWBJESD8yHfY./unUFbhw.dvJinS2', 2, 1, 1654830559),
(15, 'Fanny permana sujatmiko', 'permanafany94@gmail.com', 'default.jpg', '$2y$10$YnbIh5rsiZU1xpsmKwmI1OsJnkHDK/5G.GCZ7rZ.MpjmhA6amWZ0m', 2, 1, 1654830756),
(16, 'Wanda Miftakhul Jannah', 'wmzzanna@gmail.com', 'default.jpg', '$2y$10$EeqFd8nufzEtHHoy0M7c.ukke.sgEdRtBSt1VWHl9t3t6pnrghQTO', 2, 1, 1654830834),
(17, 'Kamal Hasan', 'kmlabuhsn@gmail.com', 'default.jpg', '$2y$10$Bqg6khK.JUDkzjmWwBqJKerTbYrR4zcEoLT/XdoBfygEDFeF/gllK', 2, 1, 1654830834),
(18, 'RIAN DIAN RAGA', 'dianr857@gmail.com', 'default.jpg', '$2y$10$PqXAAWYKnghljFSZsUjDO.eP1kI//ApywG9KlxcX3af2p7E2XIenK', 2, 1, 1654831058),
(19, 'Sony wahyu sampurno', 'sonymagetan72@gmail.com', 'default.jpg', '$2y$10$Gz0S0JgR1GnGcceC5bJn.utYzcUW7moRKd.axBxD/NheUXU9/w/q2', 2, 1, 1654831313),
(20, 'Adi cahyono', 'cahyoadi0606@gmail.com', 'Screenshot_20220609-214812_One_UI_Home.jpg', '$2y$10$JkgXesLQZqezrJqczpsS5u1XqOwAHBaaHlHt9aBDpvnD6h5/nekUe', 2, 1, 1654831352),
(21, 'Avidian Bintang Pamungkas', 'avidianski@gmail.com', '3328.jpg', '$2y$10$HqHJLA0zhpBITK7OmTEEkOOxkckE3gPHYQCPRW40VqnYCXTzYcpwy', 2, 1, 1654831399),
(22, 'Taufik Dian Murseto', 'taufikdianmurseto97@gmail.com', 'default.jpg', '$2y$10$fPxT3r2VjfyLFcw/zwKRB.Rih4MxABHvyU8qjEfgvEKXUcU00qIXe', 2, 1, 1654833392);

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
(25, 4, 'Edit', 'test/edit?id_lb=', 'fas fa-fw fa-paperclip', 0);

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
(5, 11, 'baik', 'Baik', 'Baik', NULL, NULL, 'Baik', 'Baik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-02', NULL, NULL, NULL, NULL, 'Eka Sari Sulistyowati, SH. M.Kn.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 22, 'Baik', 'Baik', 'Baik', NULL, NULL, 'Baik', 'Mencukupi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, 'Bambang Riyanto, SH. M.Kn.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 17, 'Baik', 'Mecukupi', 'Mencukupi', NULL, NULL, 'bagus', 'Mendukung', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-13', NULL, NULL, NULL, NULL, 'Bambang Riyanto, SH. M.Kn.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 19, 'Baik', 'Baik', 'Baik', NULL, NULL, 'Baik', 'Cukup', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-06-04', NULL, NULL, NULL, NULL, 'Bambang Riyanto, SH. M.Kn.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  MODIFY `id_cap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `capital_a`
--
ALTER TABLE `capital_a`
  MODIFY `id_capi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `capital_b`
--
ALTER TABLE `capital_b`
  MODIFY `id_capi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `capital_cache`
--
ALTER TABLE `capital_cache`
  MODIFY `id_capi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cashflow_a`
--
ALTER TABLE `cashflow_a`
  MODIFY `id_cf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `cashflow_b`
--
ALTER TABLE `cashflow_b`
  MODIFY `id_cf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `collateral`
--
ALTER TABLE `collateral`
  MODIFY `id_col` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `collateral_tanah`
--
ALTER TABLE `collateral_tanah`
  MODIFY `id_col2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `condition`
--
ALTER TABLE `condition`
  MODIFY `id_con` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dummy`
--
ALTER TABLE `dummy`
  MODIFY `id_cf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `karakter`
--
ALTER TABLE `karakter`
  MODIFY `id_char` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `latar_belakang`
--
ALTER TABLE `latar_belakang`
  MODIFY `id_lb` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `riwayat_pinjaman`
--
ALTER TABLE `riwayat_pinjaman`
  MODIFY `id_rp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
