<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pdf_capi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_kredit');
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY
    }

    function index()
    {
        //Pemasukan
        $pemasukan = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '4.1'");
        foreach ($pemasukan->result() as $row) {
            $array_pemasukan[] = $row->saldo;
        }
        $sum_pemasukan = array_sum($array_pemasukan);

        //Pengeluaran
        $pengeluaran = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '5.1'&&'5.2'&&'5.3'");
        foreach ($pengeluaran->result() as $row) {
            $array_pengeluaran[] = $row->saldo;
        }
        $sum_pengeluaran = array_sum($array_pengeluaran);
        $surplus_usaha = $sum_pemasukan - $sum_pengeluaran;

        //Pengeluaran lain, problem = jika tidak ada data pengeluaran lain $array_penegeluaran_lain akan error karena dianggap kosong
        $pengeluaran_lain = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '5.4'");
        foreach ($pengeluaran_lain->result() as $row) {
            $array_pengeluaran_lain[] = $row->saldo;
        }
        $sum_pengeluaran_lain = array_sum($array_pengeluaran_lain);

        //Pengeluaran angsuran, problem = jika tidak ada data pengeluaran angsuran $array_penegeluaran_angsuran akan error karena dianggap kosong
        $pengeluaran_angsuran = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '5.5'");
        foreach ($pengeluaran_angsuran->result() as $row) {
            $array_pengeluaran_angsuran[] = $row->saldo;
        }
        $sum_pengeluaran_angsuran = array_sum($array_pengeluaran_angsuran);

        //Rugi laba, problem = jika tidak ada data pengeluaran lain / data pengeluaran angsuran akan error karena dianggap kosong
        $rugi_laba = $sum_pemasukan - ($sum_pengeluaran + $sum_pengeluaran_lain + $sum_pengeluaran_angsuran);


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
            $modal = $data->total_aset - ($data->total_hutang + $data->total_at + $rugi_laba);

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
            $pdf->Cell(46, 5.5, number_format($data->kas), 0, 0);
            $pdf->Cell(44, 5.5, 'Hutang Jangka Pendek', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->hutang_jpk), 0, 1);
            $pdf->Cell(44, 5.5, 'Simp Bank -Tabungan', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->tabungan), 0, 0);
            $pdf->Cell(44, 5.5, '(1 -3 Tahun)', 0, 1, '');
            $pdf->Cell(44, 5.5, '                   -Deposito', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->deposito), 0, 0, '');
            $pdf->Cell(44, 5.5, 'Hutang Jangka Panjang', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->hutang_jpg), 0, 1);
            $pdf->Cell(44, 5.5, 'Piutang ', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->piutang), 0, 0);
            $pdf->Cell(44, 5.5, '(> 3 Tahun)', 0, 1, '');
            $pdf->Cell(44, 5.5, 'Peralatan', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->peralatan), 0, 0);
            $pdf->Cell(44, 5.5, 'Hutang Lain', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->hutang_lain), 0, 1);
            $pdf->Cell(44, 5.5, 'Persediaan Brg Usaha 1', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->barang), 0, 0);
            $pdf->Cell(44, 5.5, 'Hutang Dagang', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->hutang_dagang), 0, 1);
            $pdf->Cell(44, 5.5, 'Persediaan Brg Usaha 2', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->barang2), 0, 0);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(66, 5.5, 'Total Hutang', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->total_hutang), 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 5.5, 'Persediaan Brg Usaha 3', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->barang3), 0, 1);
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
            $pdf->Cell(46, 5.5, number_format($data->total_al), 0, 1);
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
            $pdf->Cell(24, 5.5, number_format($data->total_at), 0, 0);
            $pdf->Line(10, 173, 60, 173);
            $pdf->Line(60, 173, 86, 186);
            $pdf->Line(86, 186, 110, 186);
            $pdf->Line(86, 194, 110, 194);
            $pdf->Cell(66, 5.5, 'Harta', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->total_at), 0, 1);
            $pdf->Line(110, 173, 160, 173);
            $pdf->Line(160, 173, 186, 186);
            $pdf->Line(186, 186, 210, 186);
            $pdf->Line(186, 194, 210, 194);
            $pdf->Cell(10, 15, '', 0, 1);
            $pdf->Cell(66, 5.5, 'TOTAL ASET', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(24, 5.5, number_format($data->total_aset), 0, 0);
            $pdf->Cell(66, 5.5, 'TOTAL KEWAJIBAN', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->total_aset), 0, 1);
            $pdf->Cell(10, 7, '', 0, 1);


            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, '4. CASH FLOW (sebelum memperoleh kredit)', 0, 1, '');
            $pdf->Cell(7, 5.5, 'No', 1, 0, 'C');
            $pdf->Cell(106, 5.5, 'Keterangan', 1, 0, 'C');
            $pdf->Cell(30, 5.5, 'Pemasukan', 1, 0, 'C');
            $pdf->Cell(30, 5.5, 'Pengeluaran', 1, 0, 'C');
            $pdf->Cell(30, 5.5, 'Jumlah', 1, 1, 'C');

            //Cashflow usaha 1
            $rp = $this->db->query("SELECT * FROM cashflow_b WHERE kode_perkiraan = '4.1.1'");
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
                $rp = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '5.1'");
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
            $rp2 = $this->db->query("SELECT * FROM cashflow_b WHERE kode_perkiraan = '4.1.2'");
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
                $rp2 = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '5.2'");
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
            $rp3 = $this->db->query("SELECT * FROM cashflow_b WHERE kode_perkiraan = '4.1.3'");
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
                $rp3 = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '5.3'");
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
            $pdf->Cell(7, 5.5, '', 1, 0, 'C');
            $pdf->Cell(106, 5.5, 'JUMLAH PENDAPATAN DAN PENGELUARAN USAHA', 1, 0, '');
            $pdf->Cell(30, 5.5, number_format($sum_pemasukan), 1, 0, 'R');
            $pdf->Cell(30, 5.5, number_format($sum_pengeluaran), 1, 0, 'R');
            $pdf->Cell(30, 5.5, number_format($surplus_usaha), 1, 1, 'R');

            //Cashflow pengeluaran biaya lain
            $rp4 = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '5.4'");
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
            $angsuran = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '5.5'");
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

            $pdf->Output();
        }
    }
}
