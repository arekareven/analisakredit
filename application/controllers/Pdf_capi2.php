<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pdf_capi2 extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_kredit');
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY
    }

    function index()
    {
        //kas debit
        $kasd = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Kas' && kode_jenis='D'");
        if (!empty($kasd->result())) {
            foreach ($kasd->result() as $row) {
                $array_kasd[] = $row->saldo;
            }
            $sum_kasd = array_sum($array_kasd);

            //kas kredit
            $kask = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Kas' && kode_jenis='K'");
            foreach ($kask->result() as $row) {
                $array_kask[] = $row->saldo;
            }
            $sum_kask = array_sum($array_kask);
            $tot_kas = $sum_kasd - $sum_kask;
        } else
            $tot_kas = 0;

        //tabungan debit
        $tabungand = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Tabungan' && kode_jenis='D'");
        if (!empty($tabungand->result())) {
            foreach ($tabungand->result() as $row) {
                $array_tabungand[] = $row->saldo;
            }
            $sum_tabungand = array_sum($array_tabungand);

            //tabungan kredit
            $tabungank = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Tabungan' && kode_jenis='K'");
            foreach ($tabungank->result() as $row) {
                $array_tabungank[] = $row->saldo;
            }
            $sum_tabungank = array_sum($array_tabungank);
            $tot_tabungan = $sum_tabungand - $sum_tabungank;
        } else
            $tot_tabungan = 0;

        //deposito debit
        $depositod = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Deposito' && kode_jenis='D'");
        if (!empty($depositod->result())) {
            foreach ($depositod->result() as $row) {
                $array_depositod[] = $row->saldo;
            }
            $sum_depositod = array_sum($array_depositod);

            //deposito kredit
            $depositok = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Deposito' && kode_jenis='K'");
            foreach ($depositok->result() as $row) {
                $array_depositok[] = $row->saldo;
            }
            $sum_depositok = array_sum($array_depositok);
            $tot_deposito = $sum_depositod - $sum_depositok;
        } else
            $tot_deposito = 0;

        //piutang debit
        $piutangd = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Piutang' && kode_jenis='D'");
        if (!empty($piutangd->result())) {
            foreach ($piutangd->result() as $row) {
                $array_piutangd[] = $row->saldo;
            }
            $sum_piutangd = array_sum($array_piutangd);

            //piutang kredit
            $piutangk = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Piutang' && kode_jenis='K'");
            foreach ($piutangk->result() as $row) {
                $array_piutangk[] = $row->saldo;
            }
            $sum_piutangk = array_sum($array_piutangk);
            $tot_piutang = $sum_piutangd - $sum_piutangk;
        } else
            $tot_piutang = 0;

        //peralatan debit
        $peralatand = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Peralatan' && kode_jenis='D'");
        if (!empty($peralatand->result())) {

            foreach ($peralatand->result() as $row) {
                $array_peralatand[] = $row->saldo;
            }
            $sum_peralatand = array_sum($array_peralatand);

            //peralatan kredit
            $peralatank = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Peralatan' && kode_jenis='K'");
            foreach ($peralatank->result() as $row) {
                $array_peralatank[] = $row->saldo;
            }
            $sum_peralatank = array_sum($array_peralatank);
            $tot_peralatan = $sum_peralatand - $sum_peralatank;
        } else
            $tot_peralatan = 0;

        //barang debit
        $barangd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Persediaan Barang Usaha 1' && kode_jenis='D'");
        if (!empty($barangd->result())) {
            foreach ($barangd->result() as $row) {
                $array_barangd[] = $row->saldo;
            }
            $sum_barangd = array_sum($array_barangd);
            $tot_barang = $sum_barangd;
        } else
            $tot_barang = 0;

        //barang2 debit
        $barang2d = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Persediaan Barang Usaha 2' && kode_jenis='D'");
        if (!empty($barang2d->result())) {

            foreach ($barang2d->result() as $row) {
                $array_barang2d[] = $row->saldo;
            }
            $sum_barang2d = array_sum($array_barang2d);
            $tot_barang2 = $sum_barang2d;
        } else
            $tot_barang2 = 0;

        //barang3 debit
        $barang3d = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Persediaan Barang Usaha 3' && kode_jenis='D'");
        if (!empty($barang3d->result())) {

            foreach ($barang3d->result() as $row) {
                $array_barang3d[] = $row->saldo;
            }
            $sum_barang3d = array_sum($array_barang3d);
            $tot_barang3 = $sum_barang3d;
        } else
            $tot_barang3 = 0;

        //sewa debit
        $sewad = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Sewa Dibayar Muka' && kode_jenis='D'");
        if (!empty($sewad->result())) {

            foreach ($sewad->result() as $row) {
                $array_sewad[] = $row->saldo;
            }
            $sum_sewad = array_sum($array_sewad);

            //sewa kredit
            $sewak = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Sewa Dibayar Muka' && kode_jenis='K'");
            foreach ($sewak->result() as $row) {
                $array_sewak[] = $row->saldo;
            }
            $sum_sewak = array_sum($array_sewak);
            $tot_sewa = $sum_sewad - $sum_sewak;
        } else
            $tot_sewa = 0;

        //lahan debit
        $lahand = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Lahan Garap' && kode_jenis='D'");
        if (!empty($lahand->result())) {

            foreach ($lahand->result() as $row) {
                $array_lahand[] = $row->saldo;
            }
            $sum_lahand = array_sum($array_lahand);

            //lahan kredit
            $lahank = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Lahan Garap' && kode_jenis='K'");
            foreach ($lahank->result() as $row) {
                $array_lahank[] = $row->saldo;
            }
            $sum_lahank = array_sum($array_lahank);
            $tot_lahan = $sum_lahand - $sum_lahank;
        } else
            $tot_lahan = 0;

        //gedung debit
        $gedungd = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Gedung / Ruko' && kode_jenis='D'");
        if (!empty($gedungd->result())) {

            foreach ($gedungd->result() as $row) {
                $array_gedungd[] = $row->saldo;
            }
            $sum_gedungd = array_sum($array_gedungd);

            //gedung kredit
            $gedungk = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Gedung / Ruko' && kode_jenis='K'");
            foreach ($gedungk->result() as $row) {
                $array_gedungk[] = $row->saldo;
            }
            $sum_gedungk = array_sum($array_gedungk);
            $tot_gedung = $sum_gedungd - $sum_gedungk;
        } else
            $tot_gedung = 0;

        //kendaraan debit
        $kendaraand = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Kendaraan Operasional' && kode_jenis='D'");
        if (!empty($kendaraand->result())) {

            foreach ($kendaraand->result() as $row) {
                $array_kendaraand[] = $row->saldo;
            }
            $sum_kendaraand = array_sum($array_kendaraand);

            //kendaraan kredit
            $kendaraank = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Kendaraan Operasional' && kode_jenis='K'");
            foreach ($kendaraank->result() as $row) {
                $array_kendaraank[] = $row->saldo;
            }
            $sum_kendaraank = array_sum($array_kendaraank);
            $tot_kendaraan = $sum_kendaraand - $sum_kendaraank;
        } else
            $tot_kendaraan = 0;

        //lain debit
        $laind = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Lain - lain' && kode_jenis='D'");
        if (!empty($laind->result())) {

            foreach ($laind->result() as $row) {
                $array_laind[] = $row->saldo;
            }
            $sum_laind = array_sum($array_laind);

            //lain kredit
            $laink = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Lain - lain' && kode_jenis='K'");
            foreach ($laink->result() as $row) {
                $array_laink[] = $row->saldo;
            }
            $sum_laink = array_sum($array_laink);
            $tot_lain = $sum_laind - $sum_laink;
        } else
            $tot_lain = 0;

        /*
        //tanah debit
        $tanahd = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Tanah' && kode_jenis='D'");
        if (!empty($tanahd->result())) {

            foreach ($tanahd->result() as $row) {
                $array_tanahd[] = $row->saldo;
            }
            $sum_tanahd = array_sum($array_tanahd);

            //tanah kredit
            $tanahk = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Tanah' && kode_jenis='K'");
            foreach ($tanahk->result() as $row) {
                $array_tanahk[] = $row->saldo;
            }
            $sum_tanahk = array_sum($array_tanahk);
            $tot_tanah = $sum_tanahd - $sum_tanahk;
        } else
        $tot_tanah = 0;

        //bangunan debit
        $bangunand = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Bangunan' && kode_jenis='D'");
        if (!empty($bangunand->result())) {

            foreach ($bangunand->result() as $row) {
                $array_bangunand[] = $row->saldo;
            }
            $sum_bangunand = array_sum($array_bangunand);

            //bangunan kredit
            $bangunank = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Bangunan' && kode_jenis='K'");
            foreach ($bangunank->result() as $row) {
                $array_bangunank[] = $row->saldo;
            }
            $sum_bangunank = array_sum($array_bangunank);
            $tot_bangunan = $sum_bangunand - $sum_bangunank;
        } else
        $tot_bangunan = 0;

        //kendaraann debit
        $kendaraannd = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Kendaraan' && kode_jenis='D'");
        if (!empty($kendaraannd->result())) {

            foreach ($kendaraannd->result() as $row) {
                $array_kendaraannd[] = $row->saldo;
            }
            $sum_kendaraannd = array_sum($array_kendaraannd);

            //kendaraann kredit
            $kendaraannk = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Kendaraan' && kode_jenis='K'");
            foreach ($kendaraannk->result() as $row) {
                $array_kendaraannk[] = $row->saldo;
            }
            $sum_kendaraannk = array_sum($array_kendaraannk);
            $tot_kendaraann = $sum_kendaraannd - $sum_kendaraannk;
        } else
        $tot_kendaraann = 0;

        //inventaris debit
        $inventarisd = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Inventaris' && kode_jenis='D'");
        if (!empty($inventarisd->result())) {

            foreach ($inventarisd->result() as $row) {
                $array_inventarisd[] = $row->saldo;
            }
            $sum_inventarisd = array_sum($array_inventarisd);

            //inventaris kredit
            $inventarisk = $this->db->query("SELECT * FROM cashflow_b WHERE nama_perkiraan= 'Inventaris' && kode_jenis='K'");
            foreach ($inventarisk->result() as $row) {
                $array_inventarisk[] = $row->saldo;
            }
            $sum_inventarisk = array_sum($array_inventarisk);
            $tot_inventaris = $sum_inventarisd - $sum_inventarisk;
        } else
        $tot_inventaris = 0;
        */

        //hutang debit
        $hutangd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Jangka Pendek' && kode_jenis='K'");
        if (!empty($hutangd->result())) {

            foreach ($hutangd->result() as $row) {
                $array_hutangd[] = $row->saldo;
            }
            $sum_hutangd = array_sum($array_hutangd);
            $tot_hutang = $sum_hutangd;
        } else
            $tot_hutang = 0;

        //hutang debit
        $hutangd2 = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Jangka Panjang' && kode_jenis='K'");
        if (!empty($hutangd2->result())) {

            foreach ($hutangd2->result() as $row) {
                $array_hutangd2[] = $row->saldo;
            }
            $sum_hutangd2 = array_sum($array_hutangd2);
            $tot_hutang = $sum_hutangd2;
        } else
            $tot_hutang2 = 0;

        //hutang debit
        $hutangd3 = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Lain' && kode_jenis='K'");
        if (!empty($hutangd3->result())) {

            foreach ($hutangd3->result() as $row) {
                $array_hutangd3[] = $row->saldo;
            }
            $sum_hutangd3 = array_sum($array_hutangd3);
            $tot_hutang = $sum_hutangd3;
        } else
            $tot_hutang3 = 0;

        //hutang debit
        $hutangd4 = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Dagang' && kode_jenis='K'");
        if (!empty($hutangd4->result())) {

            foreach ($hutangd4->result() as $row) {
                $array_hutangd4[] = $row->saldo;
            }
            $sum_hutangd4 = array_sum($array_hutangd4);
            $tot_hutang = $sum_hutangd4;
        } else
            $tot_hutang4 = 0;


        //------------------------------------------------------------------------------------------------------------

        //Pemasukan
        $pemasukan = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '4.1'");
        if (!empty($pemasukan->result())) {

            foreach ($pemasukan->result() as $row) {
                $array_pemasukan[] = $row->saldo;
            }
            $sum_pemasukan = array_sum($array_pemasukan);
        } else
            $sum_pemasukan = 0;

        //Pengeluaran
        $pengeluaran = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.1' OR MID(kode_perkiraan,1,3) ='5.2' OR MID(kode_perkiraan,1,3) = '5.3'");
        if (!empty($pengeluaran->result())) {

            foreach ($pengeluaran->result() as $row) {
                $array_pengeluaran[] = $row->saldo;
            }
            $sum_pengeluaran = array_sum($array_pengeluaran);
            $surplus_usaha = $sum_pemasukan - $sum_pengeluaran;
        } else
            $sum_pengeluaran = 0;
        $surplus_usaha = 0;

        //Pengeluaran lain, problem = jika tidak ada data pengeluaran lain $array_penegeluaran_lain akan error karena dianggap kosong
        $pengeluaran_lain = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.4'");
        if (!empty($pengeluaran_lain->result())) {

            foreach ($pengeluaran_lain->result() as $row) {
                $array_pengeluaran_lain[] = $row->saldo;
            }
            $sum_pengeluaran_lain = array_sum($array_pengeluaran_lain);
        }

        //Pengeluaran angsuran, problem = jika tidak ada data pengeluaran angsuran $array_penegeluaran_angsuran akan error karena dianggap kosong
        $pengeluaran_angsuran = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.5'");
        if (!empty($pengeluaran_angsuran->result())) {

            foreach ($pengeluaran_angsuran->result() as $row) {
                $array_pengeluaran_angsuran[] = $row->saldo;
            }
            $sum_pengeluaran_angsuran = array_sum($array_pengeluaran_angsuran);

            //Rugi laba, problem = jika tidak ada data pengeluaran lain / data pengeluaran angsuran akan error karena dianggap kosong
            $rugi_laba = $sum_pemasukan - ($sum_pengeluaran + $sum_pengeluaran_lain + $sum_pengeluaran_angsuran);
        } else
            $rugi_laba = 0;


        //PDF CAPITAL
        $pdf = new FPDF('P', 'mm', 'Letter');
        $pdf->SetAutoPageBreak(true);
        // membuat halaman baru
        $pdf->AddPage();
        // margin
        $pdf->SetMargins(10, 10, 10);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times', 'B', 16);
        // mencetak string 
        $id_lb = $_GET['id_lb'];
        $lb = $this->db->query("SELECT * FROM capital_b 
                                        JOIN latar_belakang ON capital_b.id_lb=latar_belakang.id_lb
                                        WHERE capital_b.id_lb='$id_lb'");
        foreach ($lb->result() as $data) {
            $hasil_kas = $data->kas + $tot_kas;
            $hasil_tabungan = $data->tabungan + $tot_tabungan;
            $hasil_deposito = $data->deposito + $tot_deposito;
            $hasil_piutang = $data->piutang + $tot_piutang;
            $hasil_peralatan = $data->peralatan + $tot_peralatan;
            $hasil_barang = $data->barang + $tot_barang;
            $hasil_barang2 = $data->barang2 + $tot_barang2;
            $hasil_barang3 = $data->barang3 + $tot_barang3;
            $hasil_sewa = $data->sewa + $tot_sewa;
            $hasil_lahan = $data->lahan + $tot_lahan;
            $hasil_gedung = $data->gedung + $tot_gedung;
            $hasil_kendaraan = $data->operasional + $tot_kendaraan;
            $hasil_lain = $data->lain + $tot_lain;
            $hasil_hutang = $data->hutang_jpk + $tot_hutang;
            $hasil_hutang2 = $data->hutang_jpg + $tot_hutang2;
            $hasil_hutang3 = $data->hutang_lain + $tot_hutang3;
            $hasil_hutang4 = $data->hutang_dagang + $tot_hutang4;
            $aktiva_lancar = $hasil_kas + $hasil_tabungan + $hasil_deposito + $hasil_piutang + $hasil_peralatan + $hasil_barang +
                $hasil_barang2 + $hasil_barang3 + $hasil_sewa + $hasil_lahan + $hasil_gedung + $hasil_kendaraan + $hasil_lain;
            $aktiva_tetap = $data->tanah + $data->bangunan + $data->kendaraan + $data->inventaris + $data->lain2;
            $hutang = $data->hutang_jpk + $data->hutang_jpg + $data->hutang_lain + $data->hutang_dagang;
            $aset = $aktiva_tetap + $aktiva_lancar;
            $modal = $aset - ($hutang + $aktiva_tetap + $rugi_laba);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, '3. CAPITAL (sebelum memperoleh kredit)', 0, 1, '');
            $pdf->Cell(5, 2, '', 0, 1);
            $pdf->Cell(15, 5.5, 'CIF', 0, 0, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->cif_bank, 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(15, 5.5, 'Nama', 0, 0, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->nama_debitur, 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(180, 5.5, 'NERACA', 0, 1, 'C');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(180, 5.5, 'Usaha ' . $data->nama_debitur, 0, 1, 'C');
            $pdf->Cell(180, 5.5, 'Per ' . date('M Y'), 0, 1, 'C');

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(100, 5.5, 'ASET', 0, 0, '');
            $pdf->Cell(0, 5.5, 'KEWAJIBAN', 0, 1, '');
            $pdf->Line(10, 50, 205, 50);
            $pdf->Line(110, 50, 110, 194);
            $pdf->Cell(100, 5.5, 'Aktiva Lancar', 0, 0, '');
            $pdf->Cell(49, 5.5, 'Hutang', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 5.5, 'Kas', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($hasil_kas), 0, 0);
            $pdf->Cell(44, 5.5, 'Hutang Jangka Pendek', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($hasil_hutang), 0, 1);
            $pdf->Cell(44, 5.5, 'Simp Bank -Tabungan', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->tabungan), 0, 0);
            $pdf->Cell(44, 5.5, '(1 -3 Tahun)', 0, 1, '');
            $pdf->Cell(44, 5.5, '                   -Deposito', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->deposito), 0, 0, '');
            $pdf->Cell(44, 5.5, 'Hutang Jangka Panjang', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($hasil_hutang2), 0, 1);
            $pdf->Cell(44, 5.5, 'Piutang ', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->piutang), 0, 0);
            $pdf->Cell(44, 5.5, '(> 3 Tahun)', 0, 1, '');
            $pdf->Cell(44, 5.5, 'Peralatan', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->peralatan), 0, 0);
            $pdf->Cell(44, 5.5, 'Hutang Lain', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($hasil_hutang3), 0, 1);
            $pdf->Cell(44, 5.5, 'Persediaan Brg Usaha 1', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($hasil_barang), 0, 0);
            $pdf->Cell(44, 5.5, 'Hutang Dagang', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($hasil_hutang4), 0, 1);
            $pdf->Cell(44, 5.5, 'Persediaan Brg Usaha 2', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($hasil_barang2), 0, 0);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(66, 5.5, 'Total Hutang', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($hutang), 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 5.5, 'Persediaan Brg Usaha 3', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($hasil_barang3), 0, 1);
            $pdf->Cell(44, 5.5, 'Sewa Dibayar Muka', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->sewa), 0, 0);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(66, 5.5, 'Laba / Rugi', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($rugi_laba), 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 5.5, 'Lahan Garap', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->lahan), 0, 1);
            $pdf->Cell(44, 5.5, 'Gedung / Ruko', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->gedung), 0, 0);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(66, 5.5, 'Modal Usaha', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($modal), 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 5.5, 'Kendaraan Operasional', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->operasional), 0, 1);
            $pdf->Cell(44, 5.5, 'Lain - lain', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->lain), 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(66, 7, 'Jumlah Aktiva Lancar', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($aktiva_lancar), 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 7, 'Aktiva Tetap', 0, 1, '');
            $pdf->Cell(44, 5.5, 'Tanah', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->tanah), 0, 1);
            $pdf->Cell(44, 5.5, 'Bangunan', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->bangunan), 0, 1);
            $pdf->Cell(44, 5.5, 'Kendaraan', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->kendaraan), 0, 1);
            $pdf->Cell(44, 5.5, 'Inventaris', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->inventaris), 0, 1);
            $pdf->Cell(44, 5.5, 'Lain - lain', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->lain2), 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(66, 5.5, 'Jumlah Aktiva Tetap', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(24, 5.5, number_format($aktiva_tetap), 0, 0);
            $pdf->Line(10, 173, 60, 173);
            $pdf->Line(60, 173, 86, 186);
            $pdf->Line(86, 186, 110, 186);
            $pdf->Line(86, 194, 110, 194);
            $pdf->Cell(66, 5.5, 'Harta', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($aktiva_tetap), 0, 1);
            $pdf->Line(110, 173, 160, 173);
            $pdf->Line(160, 173, 186, 186);
            $pdf->Line(186, 186, 210, 186);
            $pdf->Line(186, 194, 210, 194);
            $pdf->Cell(10, 15, '', 0, 1);
            $pdf->Cell(66, 5.5, 'TOTAL ASET', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(24, 5.5, number_format($aset), 0, 0);
            $pdf->Cell(66, 5.5, 'TOTAL KEWAJIBAN', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($aset), 0, 1);
            $pdf->Cell(10, 7, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, '4. CASH FLOW (sebelum memperoleh kredit)', 0, 1, '');
            $pdf->Cell(7, 5.5, 'No', 1, 0, 'C');
            $pdf->Cell(106, 5.5, 'Keterangan', 1, 0, 'C');
            $pdf->Cell(30, 5.5, 'Pemasukan', 1, 0, 'C');
            $pdf->Cell(30, 5.5, 'Pengeluaran', 1, 0, 'C');
            $pdf->Cell(30, 5.5, 'Jumlah', 1, 1, 'C');

            //Cashflow usaha 1
            $rp = $this->db->query("SELECT * FROM cashflow_a WHERE kode_perkiraan = '4.1.1'");
            if (!empty($rp->result())) {
                $pdf->SetFont('Times', '', 12);
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'USAHA 1', 1, 0, '');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 1, 'C');

                foreach ($rp->result() as $data) {
                    $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(30, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(30, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(30, 5.5, '', 1, 1, 'R');
                }
                $no = 0;
                $rp = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.1'");
                foreach ($rp->result() as $data) {
                    $no++;
                    $pdf->Cell(7, 5.5, $no, 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(30, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(30, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(30, 5.5, '', 1, 1, 'R');
                }
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'SURPLUS USAHA 1', 1, 0, '');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 1, 'C');
            } else {
            }

            //Cashflow usaha 2
            $rp2 = $this->db->query("SELECT * FROM cashflow_a WHERE kode_perkiraan = '4.1.2'");
            if (!empty($rp2->result())) {
                $pdf->SetFont('Times', '', 12);
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'USAHA 2', 1, 0, '');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 1, 'C');

                foreach ($rp2->result() as $data) {
                    $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(30, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(30, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(30, 5.5, '', 1, 1, 'R');
                }
                $no = 0;
                $rp2 = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.2'");
                foreach ($rp2->result() as $data) {
                    $no++;
                    $pdf->Cell(7, 5.5, $no, 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(30, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(30, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(30, 5.5, '', 1, 1, 'R');
                }
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'SURPLUS USAHA 2', 1, 0, '');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 1, 'C');
            } else {
            }

            //Cashflow usaha 3
            $rp3 = $this->db->query("SELECT * FROM cashflow_a WHERE kode_perkiraan = '4.1.3'");
            if (!empty($rp3->result())) {
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'USAHA 3', 1, 0, '');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 1, 'C');

                foreach ($rp3->result() as $data) {
                    $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(30, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(30, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(30, 5.5, '', 1, 1, 'R');
                }
                $no = 0;
                $rp3 = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.3'");
                foreach ($rp3->result() as $data) {
                    $no++;
                    $pdf->Cell(7, 5.5, $no, 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(30, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(30, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(30, 5.5, '', 1, 1, 'R');
                }
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'SURPLUS USAHA 3', 1, 0, '');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 1, 'C');
            } else {
            }

            //Surplus usaha
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(7, 5.5, '', 1, 0, 'C');
            $pdf->Cell(106, 5.5, 'JUMLAH PENDAPATAN DAN PENGELUARAN USAHA', 1, 0, '');
            $pdf->Cell(30, 5.5, number_format($sum_pemasukan), 1, 0, 'R');
            $pdf->Cell(30, 5.5, number_format($sum_pengeluaran), 1, 0, 'R');
            $pdf->Cell(30, 5.5, number_format($surplus_usaha), 1, 1, 'R');

            //Cashflow pengeluaran biaya lain
            $rp4 = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.4'");
            if (!empty($rp4->result())) {
                $pdf->SetFont('Times', '', 12);
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'BIAYA LAIN-LAIN', 1, 0, '');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 1, 'C');

                $no = 0;
                foreach ($rp4->result() as $data) {
                    $no++;
                    $pdf->Cell(7, 5.5, $no, 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(30, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(30, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(30, 5.5, '', 1, 1, 'R');
                }
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'JUMLAH BIAYA LAIN-LAIN', 1, 0, '');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, number_format($sum_pengeluaran_lain), 1, 1, 'R');
            } else {
            }

            //Cashflow pengeluaran angsuran
            $angsuran = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.5'");
            if (!empty($angsuran->result())) {
                $pdf->SetFont('Times', '', 12);
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'BIAYA ANGSURAN HUTANG', 1, 0, '');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 1, 'C');

                $no = 0;
                foreach ($angsuran->result() as $data) {
                    $no++;
                    $pdf->Cell(7, 5.5, $no, 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(30, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(30, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(30, 5.5, '', 1, 1, 'R');
                }
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'JUMLAH ANGSURAN HUTANG', 1, 0, '');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, '', 1, 0, 'C');
                $pdf->Cell(30, 5.5, number_format($sum_pengeluaran_angsuran), 1, 1, 'R');
            } else {
            }

            //Cashflow Rugi laba
            $pdf->Cell(7, 5.5, '', 1, 0, 'C');
            $pdf->Cell(106, 5.5, 'RUGI / LABA', 1, 0, '');
            $pdf->Cell(30, 5.5, '', 1, 0, 'C');
            $pdf->Cell(30, 5.5, '', 1, 0, 'C');
            $pdf->Cell(30, 5.5, number_format($rugi_laba), 1, 1, 'R');

            /*
            //Cashflow Rugi laba
            $pdf->Cell(7, 5.5, '', 1, 0, 'C');
            $pdf->Cell(106, 5.5, 'TEST', 1, 0, '');
            $pdf->Cell(30, 5.5, number_format($sum_kasd), 1, 0, 'C');
            $pdf->Cell(30, 5.5, number_format($sum_kask), 1, 0, 'C');
            $pdf->Cell(30, 5.5, '', 1, 1, 'R');
            */

            $pdf->Output();
        }
    }
}
