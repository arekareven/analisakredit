<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pdf_capiseb extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_capital');
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY
    }

    function index()
    {
        //PDF CAPITAL
        $pdf = new FPDF('P', 'mm', 'Letter');
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

            $capital = array(
                'id_lb'         => $id_lb,
                'kas'    => $data->kas ,
                'tabungan'        => $data->tabungan,
                'deposito'        => $data->deposito,
                'piutang'  => $data->piutang,
                'peralatan'  => $data->peralatan,
                'barang'     => $data->barang,
                'barang2'     => $data->barang2,
                'barang3'     => $data->barang3,
                'sewa'     => $data->sewa,
                'lahan'   => $data->lahan,
                'gedung'          => $data->gedung,
                'operasional'      => $data->operasional,
                'lain'          => $data->lain,
                'total_al'      => $this->aktivaLancar(),
                'tanah'    => $data->tanah,
                'bangunan'    => $data->bangunan,
                'kendaraan'    => $data->kendaraan,
                'inventaris'    => $data->inventaris,
                'lain2'    => $data->lain2,
                'total_at'    => $this->aktivaTetap(),
                'hutang_jpk'    => $data->hutang_jpk,
                'hutang_jpg'    => $data->hutang_jpg,
                'hutang_dagang'    => $data->hutang_dagang,
                'hutang_lain'    => $data->hutang_lain,
                'laba_rugi'    => $this->rugiLaba(),
                'modal'    => $this->modal(),
                'harta'    => $this->aktivaTetap(),
                'total_hutang'    => $this->totalHutang(),
                'total_aset'    => $this->aset(),
                'total_kjb'    => $this->aset()
            );

            $query = $this->m_capital->cek_nolb($id_lb)->num_rows();
            if (empty($query)){
                $this->db->insert('capital_a', $capital);
            }
            else{
				$this->db->where('id_lb', $id_lb);
                $this->db->update('capital_a', $capital);
            }

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, '3. CAPITAL (sebelum memperoleh kredit)', 0, 1, '');
            $pdf->Cell(5, 2, '', 0, 1);
            $pdf->Cell(15, 5.5, 'CIF', 0, 0, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->id_lb, 0, 1);
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
            $pdf->Cell(100, 5.5, 'Aktiva Produktif', 0, 0, '');
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
            $pdf->Cell(60, 5.5, 'Total Hutang', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($this->totalHutang()), 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 5.5, 'Persediaan Brg Usaha 3', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->barang3), 0, 1);
            $pdf->Cell(44, 5.5, 'Sewa Dibayar Muka', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->sewa), 0, 0);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(60, 5.5, 'Laba / Rugi', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($this->rugiLaba()), 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 5.5, 'Lahan Garap', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->lahan), 0, 1);
            $pdf->Cell(44, 5.5, 'Gedung / Ruko', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->gedung), 0, 0);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(60, 5.5, 'Modal Usaha', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $modal = $this->modal();
            if ($modal < 0) {
                $modal = $modal * -1;
                $modal = '(' . number_format($modal) . ')';
            } else
                $modal = number_format($modal);
            $pdf->Cell(46, 5.5, $modal, 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 5.5, 'Kendaraan Operasional', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->operasional), 0, 1);
            $pdf->Cell(44, 5.5, 'Lain - lain', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->lain), 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(60, 7, 'Jumlah Aktiva Produktif', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($this->aktivaLancar()), 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 7, 'Aktiva Lainnya', 0, 1, '');
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
            $pdf->Cell(60, 5.5, 'Jumlah Aktiva Lainnya', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(30, 5.5, number_format($this->aktivaTetap()), 0, 0);
            $pdf->Line(10, 173, 60, 173);
            $pdf->Line(60, 173, 80, 186);
            $pdf->Line(80, 186, 110, 186);
            $pdf->Line(80, 194, 110, 194);
            $pdf->Cell(60, 5.5, 'Harta', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($this->aktivaTetap()), 0, 1);
            $pdf->Line(110, 173, 160, 173);
            $pdf->Line(160, 173, 180, 186);
            $pdf->Line(180, 186, 210, 186);
            $pdf->Line(180, 194, 210, 194);
            $pdf->Cell(10, 15, '', 0, 1);
            $pdf->Cell(60, 5.5, 'TOTAL ASET', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(30, 5.5, number_format($this->aset()), 0, 0);
            $pdf->Cell(60, 5.5, 'TOTAL KEWAJIBAN', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($this->aset()), 0, 1);
            $pdf->Cell(10, 7, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, '4. CASH FLOW (sebelum memperoleh kredit)', 0, 1, '');
            $pdf->Cell(7, 5.5, 'No', 1, 0, 'C');
            $pdf->Cell(106, 5.5, 'Keterangan', 1, 0, 'C');
            $pdf->Cell(28, 5.5, 'Pemasukan', 1, 0, 'C');
            $pdf->Cell(28, 5.5, 'Pengeluaran', 1, 0, 'C');
            $pdf->Cell(28, 5.5, 'Jumlah', 1, 1, 'C');

            //Cashflow usaha 1
            $rp = $this->db->query("SELECT * FROM cashflow_b WHERE kode_perkiraan = '4.1.1' && id_lb='$id_lb'");
            if (!empty($rp->result())) {
                $pdf->SetFont('Times', '', 12);
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'USAHA 1', 1, 0, '');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 1, 'C');

                foreach ($rp->result() as $data) {
                    $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(28, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(28, 5.5, '', 1, 1, 'R');
                }
                $no = 0;
                $rp = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '5.1' && id_lb='$id_lb'");
                foreach ($rp->result() as $data) {
                    $no++;
                    $pdf->Cell(7, 5.5, $no, 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(28, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(28, 5.5, '', 1, 1, 'R');
                }
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'SURPLUS USAHA 1', 1, 0, '');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 1, 'C');
            } else {
            }

            //Cashflow usaha 2
            $rp2 = $this->db->query("SELECT * FROM cashflow_b WHERE kode_perkiraan = '4.1.2' && id_lb='$id_lb'");
            if (!empty($rp2->result())) {
                $pdf->SetFont('Times', '', 12);
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'USAHA 2', 1, 0, '');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 1, 'C');

                foreach ($rp2->result() as $data) {
                    $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(28, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(28, 5.5, '', 1, 1, 'R');
                }
                $no = 0;
                $rp2 = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '5.2' && id_lb='$id_lb'");
                foreach ($rp2->result() as $data) {
                    $no++;
                    $pdf->Cell(7, 5.5, $no, 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(28, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(28, 5.5, '', 1, 1, 'R');
                }
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'SURPLUS USAHA 2', 1, 0, '');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 1, 'C');
            } else {
            }

            //Cashflow usaha 3
            $rp3 = $this->db->query("SELECT * FROM cashflow_b WHERE kode_perkiraan = '4.1.3' && id_lb='$id_lb'");
            if (!empty($rp3->result())) {
                $pdf->SetFont('Times', '', 12);
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'USAHA 3', 1, 0, '');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 1, 'C');

                foreach ($rp3->result() as $data) {
                    $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(28, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(28, 5.5, '', 1, 1, 'R');
                }
                $no = 0;
                $rp3 = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '5.3' && id_lb='$id_lb'");
                foreach ($rp3->result() as $data) {
                    $no++;
                    $pdf->Cell(7, 5.5, $no, 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(28, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(28, 5.5, '', 1, 1, 'R');
                }
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'SURPLUS USAHA 3', 1, 0, '');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 1, 'C');
            } else {
            }

            //Cashflow gaji 
            $gaji = $this->db->query("SELECT * FROM cashflow_b WHERE kode_perkiraan = '4.1.4' && id_lb='$id_lb'");
            if (!empty($gaji->result())) {
                $pdf->SetFont('Times', '', 12);
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'PENDAPATAN LAIN / GAJI', 1, 0, '');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 1, 'C');

                foreach ($gaji->result() as $data) {
                    $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(28, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(28, 5.5, '', 1, 1, 'R');
                }
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'SURPLUS PENDAPATAN LAIN', 1, 0, '');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 1, 'C');
            } else {
            }

            //Surplus usaha
            $pdf->Cell(7, 5.5, '', 1, 0, 'C');
            $pdf->Cell(106, 5.5, 'JUMLAH PENDAPATAN DAN PENGELUARAN USAHA', 1, 0, '');
            $pdf->Cell(28, 5.5, number_format($this->debit()), 1, 0, 'R');
            $pdf->Cell(28, 5.5, number_format($this->tot_kredit()), 1, 0, 'R');
            $pdf->Cell(28, 5.5, number_format($this->surplus()), 1, 1, 'R');

            //Cashflow pengeluaran biaya lain
            $rp4 = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '5.4' && id_lb='$id_lb'");
            if (!empty($rp4->result())) {
                $pdf->SetFont('Times', '', 12);
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'BIAYA LAIN-LAIN', 1, 0, '');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 1, 'C');

                $no = 0;
                foreach ($rp4->result() as $data) {
                    $no++;
                    $pdf->Cell(7, 5.5, $no, 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(28, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(28, 5.5, '', 1, 1, 'R');
                }
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'JUMLAH BIAYA LAIN-LAIN', 1, 0, '');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, number_format($this->kreditLain()), 1, 1, 'R');
            } else {
            }

            //Cashflow pengeluaran angsuran
            $angsuran = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '5.5' && id_lb='$id_lb'");
            if (!empty($angsuran->result())) {
                $pdf->SetFont('Times', '', 12);
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'BIAYA ANGSURAN HUTANG', 1, 0, '');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 1, 'C');

                $no = 0;
                foreach ($angsuran->result() as $data) {
                    $no++;
                    $pdf->Cell(7, 5.5, $no, 1, 0, 'C');
                    $pdf->Cell(106, 5.5, $data->keterangan, 1, 0, '');
                    $pdf->Cell(28, 5.5, '', 1, 0, 'R');
                    $pdf->Cell(28, 5.5, number_format($data->saldo), 1, 0, 'R');
                    $pdf->Cell(28, 5.5, '', 1, 1, 'R');
                }
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'JUMLAH ANGSURAN HUTANG', 1, 0, '');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, number_format($this->kreditAngsuran()), 1, 1, 'R');
            } else {
            }

            //Cashflow Rugi laba
            $pdf->Cell(7, 5.5, '', 1, 0, 'C');
            $pdf->Cell(106, 5.5, 'RUGI / LABA', 1, 0, '');
            $pdf->Cell(28, 5.5, '', 1, 0, 'C');
            $pdf->Cell(28, 5.5, '', 1, 0, 'C');
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(28, 5.5, number_format($this->rugiLaba()), 1, 1, 'R');

            $pdf->Output('Capital & Cashflow Awal','I');
        }
    }

    //Cashflow

    function debit()
    {
        //Pemasukan
        $id_lb = $_GET['id_lb'];
        $debit = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '4.1' && id_lb='$id_lb'");
        if (!empty($debit->result())) {

            foreach ($debit->result() as $row) {
                $array_debit[] = $row->saldo;
            }
            $sum_debit = array_sum($array_debit);
        } else
            $sum_debit = 0;
        return $sum_debit;
    }

    function kredit()
    {
        //Pengeluaran
        $id_lb = $_GET['id_lb'];
        $kredit = $this->db->query("SELECT * FROM cashflow_b WHERE id_lb='$id_lb' && MID(kode_perkiraan,1,3) = '5.1'");
        if (!empty($kredit->result())) {

            foreach ($kredit->result() as $row) {
                $array_kredit[] = $row->saldo;
            }
            $sum_kredit = array_sum($array_kredit);
        } else
            $sum_kredit = 0;
        return $sum_kredit;
    }

    function kredit2()
    {
        //Pengeluaran
        $id_lb = $_GET['id_lb'];
        $kredit = $this->db->query("SELECT * FROM cashflow_b WHERE id_lb='$id_lb' && MID(kode_perkiraan,1,3) ='5.2'");
        if (!empty($kredit->result())) {

            foreach ($kredit->result() as $row) {
                $array_kredit[] = $row->saldo;
            }
            $sum_kredit = array_sum($array_kredit);
        } else
            $sum_kredit = 0;
        return $sum_kredit;
    }

    function kredit3()
    {
        //Pengeluaran
        $id_lb = $_GET['id_lb'];
        $kredit = $this->db->query("SELECT * FROM cashflow_b WHERE id_lb='$id_lb' && MID(kode_perkiraan,1,3) = '5.3'");
        if (!empty($kredit->result())) {

            foreach ($kredit->result() as $row) {
                $array_kredit[] = $row->saldo;
            }
            $sum_kredit = array_sum($array_kredit);
        } else
            $sum_kredit = 0;
        return $sum_kredit;
    }

    function tot_kredit()
    {
        $sum_kredit = $this->kredit() + $this->kredit2() + $this->kredit3();
        return $sum_kredit;
    }

    function surplus()
    {
        //Pengeluaran
        $surplus = $this->debit() - $this->tot_kredit();
        return $surplus;
    }

    function kreditLain()
    {
        //Pemasukan
        $id_lb = $_GET['id_lb'];
        $kreditLain = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '5.4' && id_lb='$id_lb'");
        if (!empty($kreditLain->result())) {

            foreach ($kreditLain->result() as $row) {
                $array_kreditLain[] = $row->saldo;
            }
            $sum_kreditLain = array_sum($array_kreditLain);
        } else
            $sum_kreditLain = 0;
        return $sum_kreditLain;
    }

    function kreditAngsuran()
    {
        //Pemasukan
        $id_lb = $_GET['id_lb'];
        $kreditAngsuran = $this->db->query("SELECT * FROM cashflow_b WHERE MID(kode_perkiraan,1,3) = '5.5' && id_lb='$id_lb'");
        if (!empty($kreditAngsuran->result())) {

            foreach ($kreditAngsuran->result() as $row) {
                $array_kreditAngsuran[] = $row->saldo;
            }
            $sum_kreditAngsuran = array_sum($array_kreditAngsuran);
        } else
            $sum_kreditAngsuran = 0;
        return $sum_kreditAngsuran;
    }

    function rugiLaba()
    {
        //Pemasukan
        $rugiLaba = $this->debit() - ($this->tot_kredit() + $this->kreditLain() + $this->kreditAngsuran());
        return $rugiLaba;
    }


    function totalHutang()
    {

        $id_lb = $_GET['id_lb'];
        $lb = $this->db->query("SELECT * FROM capital_b WHERE id_lb='$id_lb'");
        foreach ($lb->result() as $data) {
            $totalHutang = $data->hutang_jpk + $data->hutang_jpg + $data->hutang_lain + $data->hutang_dagang;
        }
        return $totalHutang;
    }

    function aktivaLancar()
    {
        $id_lb = $_GET['id_lb'];
        $lb = $this->db->query("SELECT * FROM capital_b WHERE id_lb='$id_lb'");
        foreach ($lb->result() as $data) {

            $aktivaLancar = $data->kas + $data->tabungan + $data->deposito + $data->piutang + $data->peralatan + $data->barang +
            $data->barang2 + $data->barang3 + $data->sewa + $data->lahan +
            $data->gedung + $data->operasional + $data->lain;
        }
        return $aktivaLancar;
    }

    function aktivaTetap()
    {
        $id_lb = $_GET['id_lb'];
        $lb = $this->db->query("SELECT * FROM capital_b WHERE id_lb='$id_lb'");
        foreach ($lb->result() as $data) {

            $aktivaTetap = $data->tanah  + $data->bangunan + $data->kendaraan  +
                $data->inventaris + $data->lain2 ;
        }
        return $aktivaTetap;
    }

    function aset()
    {
        $aset = $this->aktivaLancar() + $this->aktivaTetap();
        return $aset;
    }

    function modal()
    {
        $modal = $this->aset() - ($this->rugiLaba() + $this->aktivaTetap() + $this->totalHutang());
        return $modal;
    }
}
