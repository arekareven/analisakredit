-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 Mei 2022 pada 11.46
-- Versi Server: 10.1.29-MariaDB
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
-- Struktur dari tabel `analis`
--

CREATE TABLE `analis` (
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `analis`
--

INSERT INTO `analis` (`nama`, `email`) VALUES
('Mahfud Ansori', ''),
('Sonny Wahyu Sampurno', ''),
('Vera Fernanda', 'vera@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `analisis`
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
-- Dumping data untuk tabel `analisis`
--

INSERT INTO `analisis` (`id_analisis`, `nama`, `nama_ao`, `file`, `catatan`, `status`) VALUES
(1, 'Vera Fernanda', 'Fatia Larasati', 'Yuliati29-03-22.docx', 'Lengkapi berkasnya.', 'Ditolak'),
(2, 'Vera Fernanda', 'Fatia Larasati', 'Yuliati06-04-22.docx', '', 'Diterima'),
(3, 'Vera Fernanda', 'Fatia Larasati', 'Vera11-04-22.docx', 'Cukup, Rapikan.', 'Diterima');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bismillah`
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
-- Dumping data untuk tabel `bismillah`
--

INSERT INTO `bismillah` (`id`, `id_lb`, `no1`, `no2`, `no3`, `no4`, `no5`, `keterangan1`, `keterangan2`, `keterangan3`, `keterangan4`, `keterangan5`, `keterangan6`, `pemasukan2`, `pemasukan3`, `pemasukan4`, `pemasukan5`, `pengeluaran2`, `pengeluaran3`, `pengeluaran4`, `pengeluaran5`, `saldo6`) VALUES
(2, 101, 'I', '', '1', '2', '', 'USAHA 1', 'Pendapatan usaha ', 'Pembelian stok', 'Biaya susut', '', 'SURPLUS USAHA 1', '360000000', '0', '0', '0', '0', '240000000', '25000000', '0', '95000000'),
(3, 101, 'II', '', '1', '2', '3', 'USAHA 2', 'Pendapatan usaha travel', 'Biaya perawatan', 'Biaya ganti ban', 'Biaya lain lain', 'SURPLUS USAHA 2', '56000000', '0', '0', '0', '0', '4000000', '6000000', '2000000', '44000000'),
(4, 101, 'V', '', '', '', '', 'BIAYA LAIN LAIN', 'Biaya hidup', 'Biaya Pendidikan', 'Biaya listrik', 'Biaya lain', 'JUMLAH BIAYA LAIN LAIN', '0', '0', '0', '0', '2500000', '350000', '500000', '1000000', '-4350000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `capacity`
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
-- Dumping data untuk tabel `capacity`
--

INSERT INTO `capacity` (`id_cap`, `id_lb`, `nama_usaha`, `sektor`, `bidang`, `alamat_usaha`, `status_usaha`, `tlp_usaha`, `tgl_mulai`, `tgl_nasabah`, `akta`, `tgl_akta`, `npwp`, `tgl_npwp`, `usaha_skrg`, `alokasi1`, `alokasi2`, `alokasi3`, `dana1`, `dana2`, `dana3`, `total`, `usaha_realisasi`) VALUES
(1, 6, 'Dagang ayam pedagang', 'perdagangan', 'Pedagang ayam potong', 'Pasar gorang gareng Kecamatan Kawedanan', 'milik sendiri', '0', '2015-02-14', '2018-02-14', '-', '0000-00-00', '-', '0000-00-00', 'Saat ini calon debitur memiliki usaha perdagangan ayam', 'Pembelian stok ayam', 'Pembelian 1 unit isuzu', 'Pelunasan pinjaman bank mandiri', '180735885', '450000000', '269264115', '900000000', 'Setelah memperoleh kredit dari BPR Ekadharma guna pembelian....'),
(2, 7, 'Dagang ayam pedagang', 'perdagangan', 'Pedagang ayam potong', 'Pasar gorang gareng', 'milik sendiri', '0', '2022-04-01', '2022-04-02', '-', '0000-00-00', '-', '0000-00-00', 'Saat ini calon debitur ........', 'Pembelian stok ayam', 'Pembelian 1 unnit isuzu', 'Pelunasan pinjaman bank mandiri', '12000000', '10000000', '3000000', '25000000', 'Setelah memperoleh .....');

-- --------------------------------------------------------

--
-- Struktur dari tabel `capital_a`
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
-- Dumping data untuk tabel `capital_a`
--

INSERT INTO `capital_a` (`id_capi`, `id_lb`, `kas`, `tabungan`, `deposito`, `piutang`, `peralatan`, `barang`, `barang2`, `barang3`, `sewa`, `lahan`, `gedung`, `operasional`, `lain`, `total_al`, `tanah`, `bangunan`, `kendaraan`, `inventaris`, `lain2`, `total_at`, `total_aset`, `hutang_jpk`, `hutang_jpg`, `hutang_lain`, `hutang_dagang`, `total_hutang`, `laba_rugi`, `modal`, `harta`, `total_kjb`) VALUES
(1, 6, '139219885', '18000000', '0', '250000000', '50000000', '195000000', '450000000', '0', '0', '450000000', '60000000', '1250000000', '0', '2862219885', '100000000', '250000000', '150000000', '0', '0', '500000000', '3362219885', '0', '900000000', '21422162', '0', '921422162', '214034500', '1726763223', '500000000', '3362219885'),
(2, 7, '5000000', '12000000', '1000000', '0', '1000000', '0', '0', '0', '20000', '2000000', '0', '0', '0', '21020000', '3000000', '1700000', '0', '0', '0', '4700000', '25720000', '0', '0', '0', '71000000', '71000000', '98000000', '0', '600000000', '769000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `capital_b`
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
-- Dumping data untuk tabel `capital_b`
--

INSERT INTO `capital_b` (`id_capi`, `id_lb`, `kas`, `tabungan`, `deposito`, `piutang`, `peralatan`, `barang`, `barang2`, `barang3`, `sewa`, `lahan`, `gedung`, `operasional`, `lain`, `total_al`, `tanah`, `bangunan`, `kendaraan`, `inventaris`, `lain2`, `total_at`, `total_aset`, `hutang_jpk`, `hutang_jpg`, `hutang_lain`, `hutang_dagang`, `total_hutang`, `laba_rugi`, `modal`, `harta`, `total_kjb`) VALUES
(2, 6, '5000000', '18000000', '0', '250000000', '50000000', '15000000', '0', '0', '0', '450000000', '60000000', '1250000000', '0', '2098000000', '100000000', '250000000', '150000000', '0', '0', '500000000', '2598000000', '0', '0', '291952277', '0', '291952277', '80550500', '1725497223', '500000000', '2598000000'),
(3, 7, '5000000', '12000000', '0', '0', '0', '3000000', '0', '0', '0', '11000000', '13000000', '0', '0', '44000000', '45000000', '32000000', '0', '0', '0', '77000000', '121000000', '0', '0', '5000000', '0', '5000000', '78000000', '45000000', '300000000', '428000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cashflow_a`
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

--
-- Dumping data untuk tabel `cashflow_a`
--

INSERT INTO `cashflow_a` (`id_cf`, `id_lb`, `no`, `keterangan`, `pemasukan`, `pengeluaran`, `saldo`) VALUES
(1, 6, 'I', 'USAHA 1', '0', '0', '0'),
(2, 6, '', 'SURPLUSUSAHA 1', '0', '0', '0'),
(3, 6, 'II', 'USAHA 2', '0', '0', '0'),
(4, 6, '', 'SURPLUSUSAHA 2', '0', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cashflow_b`
--

CREATE TABLE `cashflow_b` (
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
-- Struktur dari tabel `collateral`
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
-- Dumping data untuk tabel `collateral`
--

INSERT INTO `collateral` (`id_col`, `id_lb`, `roda`, `nopol`, `nama_stnk`, `alamat`, `type`, `jenis`, `tahun`, `warna`, `silinder`, `no_rangka`, `no_mesin`, `no_bpkb`, `milik`, `taksiran`, `nl`, `kondisi`) VALUES
(1, 6, '4 (Empat)', 'AE 7359 NA', 'Yuliati', 'Desa Simbatan Rt/Rw 03/03', 'Isuzu ', 'Mobil', 2014, 'Putih', '2771 cc', 'MHCNKR', 'M055107', 'O-05769918', 'Milik sendiri', '225000000', '150000000', 'baik'),
(2, 6, '4 (Empat)', 'AE 1391 NC', 'Markun', 'Desa Kuwonharjo', 'Honda Jazz', 'Mobil penumpang', 2013, 'Putih', '1496 cc', 'MHRG', 'L15a777', 'N-03487', 'Milik sendiri', '150000000', '135000000', 'Baik dan terawat'),
(3, 7, '2 (Dua)', 'AE 7359 NA', 'Yuliati', 'Kec Nguntoronadi', 'Isuzu ', 'Motor yyy', 2014, 'Putih', '2771 cc', 'MHCNKR', 'M055107', 'O-05769918', 'Milik sendiri', '56000000', '32000000', 'Baik'),
(4, 7, '6 (Enam)', 'AE 7359 NA', 'Yuliati', 'Kec Takeran', 'Isuzu ', 'Bus', 2014, 'Putih', '2771 cc', 'MHCNKR', 'M055107', 'O-05769918', 'Milik sendiri', '321000000', '31000000', 'Baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `collateral_tanah`
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
-- Dumping data untuk tabel `collateral_tanah`
--

INSERT INTO `collateral_tanah` (`id_col2`, `id_lb`, `jenis`, `nama`, `alamat`, `no_shm`, `lokasi`, `tgl_ukur`, `no_ukur`, `luas_t`, `luas_b`, `milik`, `fisik_jaminan`, `taksasi`, `pertimbangan`, `harga_t`, `harga_b`, `harga_t2`, `harga_b2`, `ht`) VALUES
(1, 6, 'non Pertanian', '1. Supriyadi 2. Lilik Sukarsih', 'Desa Sawojajar Rt/Rw 07/02', '1519', 'Kelurahan Demangan, kecamatan taman, Kota Madiun', '1997-06-02', '1306', '1470', '70', 'Jaminan milik sendiri an sendiri', 'Sebidang tanah pekarangan dengan kondisi saat ini di gunakan sebagai bengkel', '84', 'Karakter baik kemampuan ada jaminan cukup', '243000', '429000', '2000000', '1000000', '1650000000'),
(2, 6, 'Pertanian', 'Yatno', 'Desa sebelah', '789456', 'Desa seberang', '2022-04-01', '789445', '78', '55', 'Milik sendiri', 'Baik', '8', 'prospek menjanjikan', '12000', '1000', '12500', '1300', '15000'),
(3, 6, 'Non Pertanian', 'yanto', 'Desa sana', '456123', 'Desa sini', NULL, NULL, '88', '44', NULL, NULL, '6', 'mantap lah', '5000', '2500', '8000', '6400', '51000'),
(5, 7, 'Pertanian', 'Yatno', 'Desa sawojajar', '789456', 'Kelurahan Demangan', '2022-04-04', '789445', '78', '55', 'Milik sendiri', 'Sebidang tanah pekaranagn', '78', 'Baik', '12000', '1000', '12500', '1300', '3000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `condition`
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
-- Dumping data untuk tabel `condition`
--

INSERT INTO `condition` (`id_con`, `id_lb`, `kekuatan`, `kelemahan`, `peluang`, `ancaman`) VALUES
(1, 6, 'Usaha dagang ayam pedaging memiliki kekuatan usaha yang baik dimana ayam pedaging merupakan lauk pauk masyarakat pada umumnya', 'Adanya pesaing usaha sejenis yang dapat berpengaruh di pendapatan jika berpindahnya pelanggan yang biasa membeli dagangan', 'Usaha calon debitur memiliki lokasi yang strategis di jalan masuk pasar', 'jika berpindahnya pelanggan yang biasa membeli dagangan tersebut ke tempat usaha sejenis'),
(2, 7, 'Usaha dagang ayam pedaging memiliki kekuatan usaha......', 'Adanya pesaing usaha sejenis yang dapat berpengaruh .......', 'Usaha calon debitur memiliki lokasi yang strategis', 'Jika berpindahnya pelanggan yang biasa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dummy`
--

CREATE TABLE `dummy` (
  `id_cf` int(11) NOT NULL,
  `dari` int(11) DEFAULT NULL,
  `untuk` int(11) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL,
  `pemasukan` varchar(20) DEFAULT NULL,
  `pengeluaran` varchar(20) DEFAULT NULL,
  `saldo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dummy`
--

INSERT INTO `dummy` (`id_cf`, `dari`, `untuk`, `keterangan`, `pemasukan`, `pengeluaran`, `saldo`) VALUES
(1, 1, 1, 'Pendapatan usaha daging ayam pedaging', '270000000', NULL, '5'),
(3, 2, 1, 'Pendapatan usaha jasa travel', '42000000', NULL, '5'),
(4, 1, 1, 'Pembelian stok dagangan ayam pedaging', NULL, '12000', '5'),
(5, 1, 1, 'Susut bobot', NULL, '3000', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karakter`
--

CREATE TABLE `karakter` (
  `id_char` int(10) NOT NULL,
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
  `hp3` varchar(15) NOT NULL,
  `id_lb` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karakter`
--

INSERT INTO `karakter` (`id_char`, `info_pribadi`, `info_perilaku`, `info_keluarga`, `nm1`, `nm2`, `nm3`, `al1`, `al2`, `al3`, `hp1`, `hp2`, `hp3`, `id_lb`) VALUES
(1, 'bermoral, jujur, tepat jani,tanggung jawab,sabar', 'tekun,kreatif,tenang', 'harmonis,baik', 'Jhoni', 'Ariyanto', 'Joko', 'Desa Simbatan Rt/Rw 03/03 Kecamatan nguntoronadi', 'Desa Simbatan Rt/Rw 03/03 Kecamatan nguntoronadi', 'Desa Simbatan Rt/Rw 03/03 Kecamatan nguntoronadi', '085696311313', '081553368114', '085336327954', 6),
(4, '- Bermoral\r\n- Jujur\r\n- Sabar', '- Tekun\r\n- Kreatif\r\n- Tenang', '- Harmonis\r\n- relasi banyak', 'Jhoni', 'Ariyanto', 'Joko', 'Rt/Rw 05/04, Dsn. Kedungglagah 1, Ds. Sidorejo\r\nKec. Geneng', 'Rt/Rw 05/04, Dsn. Kedungglagah 1, Ds. Sidorejo\r\nKec. Geneng', 'Rt/Rw 05/04, Dsn. Kedungglagah 1, Ds. Sidorejo\r\nKec. Geneng', '085696311313', '081553368114', '085336327954', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `latar_belakang`
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
-- Dumping data untuk tabel `latar_belakang`
--

INSERT INTO `latar_belakang` (`id_lb`, `cif_bank`, `tgl_analisa`, `tgl_permohonan`, `plafon`, `jangka_waktu`, `sifat_kredit`, `suku_bunga`, `jenis_permohonan`, `tujuan_permohonan`, `ket_penggunaan`, `nama_debitur`, `status_kawin`, `ttl_nasabah`, `ktp`, `alamat_ktp_nasabah`, `domisili_nasabah`, `hp_nasabah`, `status_tt`, `pekerjaan_nasabah`, `tanggungan`, `pendidikan`, `jenis_kelamin`, `masa_laku`, `telp_kantor`, `lama_tinggal`, `nama_pasangan`, `ttl_pasangan`, `alamat_ktp_pasangan`, `domisili_pasangan`, `pekerjaan_pasangan`, `hp_pasangan`, `nama_keluarga`, `hubungan_keluarga`, `alamat_keluarga`, `hp_keluarga`, `pf1`, `pf2`, `pf3`, `pf4`, `pf5`, `st1`, `st2`, `st3`, `st4`, `st5`, `sd1`, `sd2`, `sd3`, `sd4`, `sd5`, `sj1`, `sj2`, `sj3`, `sj4`, `sj5`, `dt1`, `dt2`, `dt3`, `dt4`, `dt5`) VALUES
(6, '0000167', '2022-02-14', '2022-02-14', '1000000000', '120 Bulan', 'Pokok Bunga tiap Bulan', '12 % Pertahun', 'Ulangan', 'modal kerja', 'Pembelian mobil isuzu microbus th 2019', 'Yuliati', 'Menikah', 'Magetan, 03-11-1984', '3520174311840001', 'Desa Simbatan Rt/Rw 03/03 Kecamatan Nguntoronadi kabupaten Magetan', 'Desa Simbatan Rt/Rw 03/03 Kecamatan Nguntoronadi kabupaten Magetan', '081335339875', 'Milik Sendiri', 'Wiraswasta', '2 Orang', 'SMA', 'Perempuan', 'Seumur Hidup', '0', '15 Tahun', 'Wardi', 'Magetan, 27-11-1979', 'Desa Simbatan Rt/Rw 03/03 Kecamatan Nguntoronadi kabupaten Magetan', 'Desa Simbatan Rt/Rw 03/03 Kecamatan Nguntoronadi kabupaten Magetan', 'Perdagangan', '0', 'Yoyok', 'Saudara Tidak Sekandung', 'Desa Simbatan Rt/Rw 03/03 Kecamatan Nguntoronadi kabupaten Magetan', '085807277785', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '0000168', '2022-04-11', '2022-04-11', '1000000000', '120 Bulan', 'Pokok Bunga tiap Bulan', '12 % Pertahun', 'Ulangan', 'modal kerja', 'Pembelian kendaraan', 'Vera', 'Menikah', 'Magetan, 03-11-1984', '3520174311840002', 'Rt/Rw 05/04, Dsn. Kedungglagah 1, Ds. Sidorejo\r\nKec. Geneng', 'Rt/Rw 05/04, Dsn. Kedungglagah 1, Ds. Sidorejo\r\nKec. Geneng', '081335339875', 'Milik Sendiri', 'Wiraswasta', '3 Orang', 'S1', 'Perempuan', 'Seumur Hidup', '0', '5 Tahun', 'Wardi', 'Magetan, 27-11-1979', 'Rt/Rw 05/04, Dsn. Kedungglagah 1, Ds. Sidorejo\r\nKec. Geneng', 'Rt/Rw 05/04, Dsn. Kedungglagah 1, Ds. Sidorejo\r\nKec. Geneng', 'Perdagangan', '0', 'Muhammad Hasan', 'Saudara Tidak Sekandung', 'Rt/Rw 05/04, Dsn. Kedungglagah 1, Ds. Sidorejo\r\nKec. Geneng', '085807277785', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notaris`
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
-- Dumping data untuk tabel `notaris`
--

INSERT INTO `notaris` (`notaris`, `provisi`, `administrasi`, `asuransi`, `materai`, `apht`, `skmht`, `titipan`, `fiduciare`, `legalisasi`, `lain`, `roya`, `proses`, `sertifikat`, `akta`, `pendaftaran`, `plotting`) VALUES
('Bambang Riyanto, SH. M.Kn.', '5250000', '5250000', '0', '10000', '1920000', '100000', '0', '1270000', '500000', '0', '0', '400000', '150000', '400000', '50000', '0'),
('Eka Sari Sulistyowati, SH. M.Kn.', '1150000', '1150000', '0', '18000', '1920000', '100000', '0', '0', '500000', '0', '1000000', '280000', '250000', '1000000', '400000', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_pinjaman`
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
-- Dumping data untuk tabel `riwayat_pinjaman`
--

INSERT INTO `riwayat_pinjaman` (`id_rp`, `id_lb`, `plafond`, `status`, `saldo`, `sejarah`, `data`) VALUES
(18, 6, '40000000', 'Lunas', '0', 'Baik', 'Terlampir'),
(19, 6, '150000000', 'Lunas', '0', 'Baik', 'Terlampir'),
(20, 7, '40000000', 'Lunas', '0', 'Baik', 'Terlampir'),
(21, 7, '13000000', 'Lunas', '0', 'Baik', 'Terlampir'),
(22, 7, '25000000', 'Lunas', '0', 'Baik', 'Terlampir'),
(23, 7, '40000000', 'Lunas', '0', 'Baik', 'Terlampir'),
(24, 7, '25000000', 'Lunas', '0', 'Baik', 'Terlampir'),
(25, 7, '13000000', 'Lunas', '0', 'Baik', 'Terlampir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'Fatia Larasati', 'fatia@gmail.com', 'art-2436545__340.jpg', '$2y$10$iHy9BJuSIDxiVVs53HWea.CdVTWGxQVvjIn403kpBdfISGRWn.PUS', 2, 1, 1644812162),
(6, 'hasantiro', 'admin@gmail.com', 'download.png', '$2y$10$6NxAuuzqcTQZwQVMhilsnOV0Mpm43owg7aPh4l.rs/i6OD7Kaf1Mu', 1, 1, 1644812241),
(7, 'Vera Fernanda', 'vera@gmail.com', 'WhatsApp_Image_2022-03-03_at_20_50_06-removebg-preview.png', '$2y$10$l54DzLz7/2Cj.VkJYooo3eqwIQeJrcSa2a4cC6YlgPM2LR6tUCQHm', 3, 1, 1646887061),
(8, 'Reno Febrian', 'reno@gmail.com', 'default.jpg', '$2y$10$708AN740PJjWkPPMCKybm.7tsdt3vTi5WSkC9jRsPRwmjuepb2VMW', 4, 1, 1647315996),
(9, 'Test', 'test@gmail.com', 'default.jpg', '$2y$10$OfDZBPorrEJ12sYTrMxGMu3T9hfG.KbDrahwm8fdDTIR7lwIK0LMC', 5, 1, 1648089117);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
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
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
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
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Analis'),
(4, 'Kabag'),
(5, 'Tester');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
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
-- Dumping data untuk tabel `user_sub_menu`
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
(24, 8, 'Testing', 'dummy', 'fas fa-fw fa-vial', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `usulan`
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
-- Dumping data untuk tabel `usulan`
--

INSERT INTO `usulan` (`id_usulan`, `id_lb`, `character`, `capacity`, `capital`, `kel_hutang`, `kel_angsuran`, `coe`, `collateral`, `plafond`, `sifat`, `jenis`, `tujuan`, `sektor`, `waktu`, `bunga`, `angsuran`, `denda`, `realisasi`, `tanggungan`, `likuidasi`, `lainnya`, `jaminan`, `notaris`, `provisi`, `administrasi`, `asuransi`, `materai`, `apht`, `skmht`, `titipan`, `fiduciare`, `legalisasi`, `lain`, `roya`, `proses`, `sertifikat`, `akta`, `pendaftaran`, `plotting`) VALUES
(1, 6, 'Baik', 'Baik', 'Baik', NULL, NULL, 'Baik', 'Cukup', '700000000', 'Pokok Bunga tiap bulan', 'Ulangan', 'Modal Kerja', 'perdagangan', '96 bulan', '12.5', '14583333', '29167', '2022-04-01', '150000000', '800000000', '0', 'Bus Merk Isuzu', 'Bambang Riyanto, SH. M.Kn.', '5250000', '5250000', '0', '10000', '1920000', '100000', '0', '1270000', '500000', '', '0', '400000', '150000', '', '50000', '0'),
(2, 7, 'Baik', 'Baik', 'Baik', NULL, NULL, 'Baik', 'Cukup', '700000000', 'Pokok Bunga tiap bulan', 'Ulangan', 'Modal Kerja', 'perdagangan', '96 bulan', '12.5', '14583333', '29167', '2022-04-12', '150000000', '800000000', '0', 'Bus Merk Isuzu', 'Eka Sari Sulistyowati, SH. M.Kn.', '1150000', '1150000', '0', '18000', '1920000', '100000', '0', '0', '500000', '', '1000000', '280000', '250000', '', '400000', '0');

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
  ADD UNIQUE KEY `id_lb` (`id_lb`);

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
  MODIFY `id_analisis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bismillah`
--
ALTER TABLE `bismillah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `capacity`
--
ALTER TABLE `capacity`
  MODIFY `id_cap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `capital_a`
--
ALTER TABLE `capital_a`
  MODIFY `id_capi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `capital_b`
--
ALTER TABLE `capital_b`
  MODIFY `id_capi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cashflow_a`
--
ALTER TABLE `cashflow_a`
  MODIFY `id_cf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cashflow_b`
--
ALTER TABLE `cashflow_b`
  MODIFY `id_cf` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collateral`
--
ALTER TABLE `collateral`
  MODIFY `id_col` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `collateral_tanah`
--
ALTER TABLE `collateral_tanah`
  MODIFY `id_col2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `condition`
--
ALTER TABLE `condition`
  MODIFY `id_con` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dummy`
--
ALTER TABLE `dummy`
  MODIFY `id_cf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `karakter`
--
ALTER TABLE `karakter`
  MODIFY `id_char` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `latar_belakang`
--
ALTER TABLE `latar_belakang`
  MODIFY `id_lb` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `riwayat_pinjaman`
--
ALTER TABLE `riwayat_pinjaman`
  MODIFY `id_rp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `capacity`
--
ALTER TABLE `capacity`
  ADD CONSTRAINT `capacity_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `capital_a`
--
ALTER TABLE `capital_a`
  ADD CONSTRAINT `capital_a_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `capital_b`
--
ALTER TABLE `capital_b`
  ADD CONSTRAINT `capital_b_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cashflow_a`
--
ALTER TABLE `cashflow_a`
  ADD CONSTRAINT `cashflow_a_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cashflow_b`
--
ALTER TABLE `cashflow_b`
  ADD CONSTRAINT `cashflow_b_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `collateral`
--
ALTER TABLE `collateral`
  ADD CONSTRAINT `collateral_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `collateral_tanah`
--
ALTER TABLE `collateral_tanah`
  ADD CONSTRAINT `collateral_tanah_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `condition`
--
ALTER TABLE `condition`
  ADD CONSTRAINT `condition_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `karakter`
--
ALTER TABLE `karakter`
  ADD CONSTRAINT `karakter_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_pinjaman`
--
ALTER TABLE `riwayat_pinjaman`
  ADD CONSTRAINT `riwayat_pinjaman_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `usulan`
--
ALTER TABLE `usulan`
  ADD CONSTRAINT `usulan_ibfk_1` FOREIGN KEY (`id_lb`) REFERENCES `latar_belakang` (`id_lb`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usulan_ibfk_2` FOREIGN KEY (`notaris`) REFERENCES `notaris` (`notaris`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
