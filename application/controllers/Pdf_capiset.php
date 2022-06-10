<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pdf_capiset extends CI_Controller
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
        $lb = $this->db->query("SELECT * FROM capital_a 
                                        JOIN latar_belakang ON capital_a.id_lb=latar_belakang.id_lb
                                        WHERE capital_a.id_lb='$id_lb'");
        foreach ($lb->result() as $data) {

            $capital = array(
                'id_lb'         => $id_lb,
                'kas'    => $data->kas + $this->kas(),
                'tabungan'        => $data->tabungan + $this->tabungan(),
                'deposito'        => $data->deposito + $this->deposito(),
                'piutang'  => $data->piutang + $this->piutang(),
                'peralatan'  => $data->peralatan + $this->peralatan(),
                'barang'     => $data->barang + $this->barang1(),
                'barang2'     => $data->barang2 + $this->barang2(),
                'barang3'     => $data->barang3 + $this->barang3(),
                'sewa'     => $data->sewa + $this->sewa(),
                'lahan'   => $data->lahan + $this->lahan(),
                'gedung'          => $data->gedung + $this->gedung(),
                'operasional'      => $data->operasional + $this->operasional(),
                'lain'          => $data->lain + $this->Lain(),
                'total_al'      => $this->aktivaLancar(),
                'tanah'    => $data->tanah + $this->tanah(),
                'bangunan'    => $data->bangunan + $this->bangunan(),
                'kendaraan'    => $data->kendaraan + $this->kendaraan(),
                'inventaris'    => $data->inventaris + $this->inventaris(),
                'lain2'    => $data->lain2 + $this->lain2(),
                'total_at'    => $this->aktivaTetap(),
                'hutang_jpk'    => $data->hutang_jpk + $this->hutangPendek(),
                'hutang_jpg'    => $data->hutang_jpg + $this->hutangPanjang(),
                'hutang_dagang'    => $data->hutang_dagang + $this->hutangDagang(),
                'hutang_lain'    => $data->hutang_lain + $this->hutangLain(),
                'laba_rugi'    => $this->rugiLaba(),
                'modal'    => $this->modal(),
                'harta'    => $this->aktivaTetap(),
                'total_hutang'    => $this->totalHutang(),
                'total_aset'    => $this->aset(),
                'total_kjb'    => $this->aset(),
                'total_angsuran'    => $this->kreditAngsuran(),
            );

            $query = $this->m_capital->cek_idlb($id_lb)->num_rows();
            if (empty($query))
                $this->db->insert('capital_cache', $capital);
            else
                $this->db->update('capital_cache', $capital);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, '3. CAPITAL (setelah memperoleh kredit)', 0, 1, '');
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
            $pdf->Cell(46, 5.5, number_format($data->kas + $this->kas()), 0, 0);
            $pdf->Cell(44, 5.5, 'Hutang Jangka Pendek', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->hutang_jpk + $this->hutangPendek()), 0, 1);
            $pdf->Cell(44, 5.5, 'Simp Bank -Tabungan', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->tabungan + $this->tabungan()), 0, 0);
            $pdf->Cell(44, 5.5, '(1 -3 Tahun)', 0, 1, '');
            $pdf->Cell(44, 5.5, '                   -Deposito', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->deposito + $this->deposito()), 0, 0, '');
            $pdf->Cell(44, 5.5, 'Hutang Jangka Panjang', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->hutang_jpg + $this->hutangPanjang()), 0, 1);
            $pdf->Cell(44, 5.5, 'Piutang ', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->piutang + $this->piutang()), 0, 0);
            $pdf->Cell(44, 5.5, '(> 3 Tahun)', 0, 1, '');
            $pdf->Cell(44, 5.5, 'Peralatan', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->peralatan + $this->peralatan()), 0, 0);
            $pdf->Cell(44, 5.5, 'Hutang Lain', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->hutang_lain + $this->hutangLain()), 0, 1);
            $pdf->Cell(44, 5.5, 'Persediaan Brg Usaha 1', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->barang + $this->barang1()), 0, 0);
            $pdf->Cell(44, 5.5, 'Hutang Dagang', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->hutang_dagang + $this->hutangDagang()), 0, 1);
            $pdf->Cell(44, 5.5, 'Persediaan Brg Usaha 2', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->barang2 + $this->barang2()), 0, 0);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(66, 5.5, 'Total Hutang', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($this->totalHutang()), 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 5.5, 'Persediaan Brg Usaha 3', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->barang3 + $this->barang3()), 0, 1);
            $pdf->Cell(44, 5.5, 'Sewa Dibayar Muka', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->sewa + $this->sewa()), 0, 0);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(66, 5.5, 'Laba / Rugi', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($this->rugiLaba()), 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 5.5, 'Lahan Garap', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->lahan + $this->lahan()), 0, 1);
            $pdf->Cell(44, 5.5, 'Gedung / Ruko', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->gedung + $this->gedung()), 0, 0);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(66, 5.5, 'Modal Usaha', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, $this->modal(), 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 5.5, 'Kendaraan Operasional', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->operasional + $this->operasional()), 0, 1);
            $pdf->Cell(44, 5.5, 'Lain - lain', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->lain + $this->Lain()), 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(66, 7, 'Jumlah Aktiva Lancar', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($this->aktivaLancar()), 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 7, 'Aktiva Tetap', 0, 1, '');
            $pdf->Cell(44, 5.5, 'Tanah', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->tanah + $this->tanah()), 0, 1);
            $pdf->Cell(44, 5.5, 'Bangunan', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->bangunan + $this->bangunan()), 0, 1);
            $pdf->Cell(44, 5.5, 'Kendaraan', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->kendaraan + $this->kendaraan()), 0, 1);
            $pdf->Cell(44, 5.5, 'Inventaris', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->inventaris + $this->inventaris()), 0, 1);
            $pdf->Cell(44, 5.5, 'Lain - lain', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->lain2 + $this->lain2()), 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(66, 5.5, 'Jumlah Aktiva Tetap', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(24, 5.5, number_format($this->aktivaTetap()), 0, 0);
            $pdf->Line(10, 173, 60, 173);
            $pdf->Line(60, 173, 86, 186);
            $pdf->Line(86, 186, 110, 186);
            $pdf->Line(86, 194, 110, 194);
            $pdf->Cell(66, 5.5, 'Harta', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($this->aktivaTetap()), 0, 1);
            $pdf->Line(110, 173, 160, 173);
            $pdf->Line(160, 173, 186, 186);
            $pdf->Line(186, 186, 210, 186);
            $pdf->Line(186, 194, 210, 194);
            $pdf->Cell(10, 15, '', 0, 1);
            $pdf->Cell(66, 5.5, 'TOTAL ASET', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(24, 5.5, number_format($this->aset()), 0, 0);
            $pdf->Cell(66, 5.5, 'TOTAL KEWAJIBAN', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($this->aset()), 0, 1);
            $pdf->Cell(10, 7, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, '4. CASH FLOW (setelah memperoleh kredit)', 0, 1, '');
            $pdf->Cell(7, 5.5, 'No', 1, 0, 'C');
            $pdf->Cell(106, 5.5, 'Keterangan', 1, 0, 'C');
            $pdf->Cell(30, 5.5, 'Pemasukan', 1, 0, 'C');
            $pdf->Cell(30, 5.5, 'Pengeluaran', 1, 0, 'C');
            $pdf->Cell(30, 5.5, 'Jumlah', 1, 1, 'C');

            //Cashflow usaha 1
            $rp = $this->db->query("SELECT * FROM cashflow_a WHERE kode_perkiraan = '4.1.1' && id_lb='$id_lb'");
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
                $rp = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.1' && id_lb='$id_lb'");
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
            $rp2 = $this->db->query("SELECT * FROM cashflow_a WHERE kode_perkiraan = '4.1.2' && id_lb='$id_lb'");
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
                $rp2 = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.2' && id_lb='$id_lb'");
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
            $rp3 = $this->db->query("SELECT * FROM cashflow_a WHERE kode_perkiraan = '4.1.3' && id_lb='$id_lb'");
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
                $rp3 = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.3' && id_lb='$id_lb'");
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
            $pdf->Cell(30, 5.5, number_format($this->debit()), 1, 0, 'R');
            $pdf->Cell(30, 5.5, number_format($this->tot_kredit()), 1, 0, 'R');
            $pdf->Cell(30, 5.5, number_format($this->surplus()), 1, 1, 'R');

            //Cashflow pengeluaran biaya lain
            $rp4 = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.4' && id_lb='$id_lb'");
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
                $pdf->Cell(30, 5.5, number_format($this->kreditLain()), 1, 1, 'R');
            } else {
            }

            //Cashflow pengeluaran angsuran
            $angsuran = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.5' && id_lb='$id_lb'");
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
                $pdf->Cell(30, 5.5, number_format($this->kreditAngsuran()), 1, 1, 'R');
            } else {
            }

            //Cashflow Rugi laba
            $pdf->Cell(7, 5.5, '', 1, 0, 'C');
            $pdf->Cell(106, 5.5, 'RUGI / LABA', 1, 0, '');
            $pdf->Cell(30, 5.5, '', 1, 0, 'C');
            $pdf->Cell(30, 5.5, '', 1, 0, 'C');
            $pdf->Cell(30, 5.5, number_format($this->rugiLaba()), 1, 1, 'R');

            $pdf->Output();
        }
    }

    //Cashflow

    function debit()
    {
        //Pemasukan
        $id_lb = $_GET['id_lb'];
        $debit = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '4.1' && id_lb='$id_lb'");
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
        $kredit = $this->db->query("SELECT * FROM cashflow_a WHERE id_lb='$id_lb' && MID(kode_perkiraan,1,3) = '5.1'");
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
        $kredit = $this->db->query("SELECT * FROM cashflow_a WHERE id_lb='$id_lb' && MID(kode_perkiraan,1,3) ='5.2'");
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
        $kredit = $this->db->query("SELECT * FROM cashflow_a WHERE id_lb='$id_lb' && MID(kode_perkiraan,1,3) = '5.3'");
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
        $kreditLain = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.4' && id_lb='$id_lb'");
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
        $kreditAngsuran = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.5' && id_lb='$id_lb'");
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
        $rugiLaba = $this->debit() - ($this->kredit() + $this->kreditLain() + $this->kreditAngsuran());
        return $rugiLaba;
    }


    //Capital
    function kas()
    {
        //kas debit
        $id_lb = $_GET['id_lb'];
        $kasd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Kas' && kode_jenis='D' && id_lb='$id_lb'");
        $kask = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Kas' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($kasd->result())) {
            foreach ($kasd->result() as $row) {
                $array_kasd[] = $row->saldo;
            }
            $sum_kasd = array_sum($array_kasd);
        } else
            $sum_kasd = 0;

        if (!empty($kask->result())) {
            //kas kredit
            foreach ($kask->result() as $row) {
                $array_kask[] = $row->saldo;
            }
            $sum_kask = array_sum($array_kask);
        } else
            $sum_kask = 0;

        $tot_kas = $sum_kasd - $sum_kask;
        return $tot_kas;
    }

    function tabungan()
    {
        //tabungan debit
        $id_lb = $_GET['id_lb'];
        $tabungand = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Tabungan' && kode_jenis='D' && id_lb='$id_lb'");
        $tabungank = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Tabungan' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($tabungand->result())) {
            foreach ($tabungand->result() as $row) {
                $array_tabungand[] = $row->saldo;
            }
            $sum_tabungand = array_sum($array_tabungand);
        } else
            $sum_tabungand = 0;

        if (!empty($tabungank->result())) {
            //tabungan kredit
            foreach ($tabungank->result() as $row) {
                $array_tabungank[] = $row->saldo;
            }
            $sum_tabungank = array_sum($array_tabungank);
        } else
            $sum_tabungank = 0;

        $tot_tabungan = $sum_tabungand - $sum_tabungank;
        return $tot_tabungan;
    }

    function deposito()
    {
        //deposito debit
        $id_lb = $_GET['id_lb'];
        $depositod = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Deposito' && kode_jenis='D' && id_lb='$id_lb'");
        $depositok = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Deposito' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($depositod->result())) {
            foreach ($depositod->result() as $row) {
                $array_depositod[] = $row->saldo;
            }
            $sum_depositod = array_sum($array_depositod);
        } else
            $sum_depositod = 0;

        if (!empty($depositok->result())) {
            //deposito kredit
            foreach ($depositok->result() as $row) {
                $array_depositok[] = $row->saldo;
            }
            $sum_depositok = array_sum($array_depositok);
        } else
            $sum_depositok = 0;

        $tot_deposito = $sum_depositod - $sum_depositok;
        return $tot_deposito;
    }

    function piutang()
    {
        //piutang debit
        $id_lb = $_GET['id_lb'];
        $piutangd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'piutang' && kode_jenis='D' && id_lb='$id_lb'");
        $piutangk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'piutang' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($piutangd->result())) {
            foreach ($piutangd->result() as $row) {
                $array_piutangd[] = $row->saldo;
            }
            $sum_piutangd = array_sum($array_piutangd);
        } else
            $sum_piutangd = 0;

        if (!empty($piutangk->result())) {
            //piutang kredit
            foreach ($piutangk->result() as $row) {
                $array_piutangk[] = $row->saldo;
            }
            $sum_piutangk = array_sum($array_piutangk);
        } else
            $sum_piutangk = 0;

        $tot_piutang = $sum_piutangd - $sum_piutangk;
        return $tot_piutang;
    }

    function peralatan()
    {
        //peralatan debit
        $id_lb = $_GET['id_lb'];
        $peralatand = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Peralatan' && kode_jenis='D' && id_lb='$id_lb'");
        $peralatank = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Peralatan' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($peralatand->result())) {
            foreach ($peralatand->result() as $row) {
                $array_peralatand[] = $row->saldo;
            }
            $sum_peralatand = array_sum($array_peralatand);
        } else
            $sum_peralatand = 0;

        if (!empty($peralatank->result())) {
            //peralatan kredit
            foreach ($peralatank->result() as $row) {
                $array_peralatank[] = $row->saldo;
            }
            $sum_peralatank = array_sum($array_peralatank);
        } else
            $sum_peralatank = 0;

        $tot_peralatan = $sum_peralatand - $sum_peralatank;
        return $tot_peralatan;
    }

    function barang1()
    {
        //barang1 debit
        $id_lb = $_GET['id_lb'];
        $barang1d = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Persediaan Barang Usaha 1' && kode_jenis='D' && id_lb='$id_lb'");
        $barang1k = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Persediaan Barang Usaha 1' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($barang1d->result())) {
            foreach ($barang1d->result() as $row) {
                $array_barang1d[] = $row->saldo;
            }
            $sum_barang1d = array_sum($array_barang1d);
        } else
            $sum_barang1d = 0;

        if (!empty($barang1k->result())) {
            //barang1 kredit
            foreach ($barang1k->result() as $row) {
                $array_barang1k[] = $row->saldo;
            }
            $sum_barang1k = array_sum($array_barang1k);
        } else
            $sum_barang1k = 0;

        $tot_barang1 = $sum_barang1d - $sum_barang1k;
        return $tot_barang1;
    }

    function barang2()
    {
        //barang2 debit
        $id_lb = $_GET['id_lb'];
        $barang2d = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Persediaan Barang Usaha 2' && kode_jenis='D' && id_lb='$id_lb'");
        $barang2k = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Persediaan Barang Usaha 2' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($barang2d->result())) {
            foreach ($barang2d->result() as $row) {
                $array_barang2d[] = $row->saldo;
            }
            $sum_barang2d = array_sum($array_barang2d);
        } else
            $sum_barang2d = 0;

        if (!empty($barang2k->result())) {
            //barang2 kredit
            foreach ($barang2k->result() as $row) {
                $array_barang2k[] = $row->saldo;
            }
            $sum_barang2k = array_sum($array_barang2k);
        } else
            $sum_barang2k = 0;

        $tot_barang2 = $sum_barang2d - $sum_barang2k;
        return $tot_barang2;
    }

    function barang3()
    {
        //barang3 debit
        $id_lb = $_GET['id_lb'];
        $barang3d = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Persediaan Barang Usaha 3' && kode_jenis='D' && id_lb='$id_lb'");
        $barang3k = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Persediaan Barang Usaha 3' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($barang3d->result())) {
            foreach ($barang3d->result() as $row) {
                $array_barang3d[] = $row->saldo;
            }
            $sum_barang3d = array_sum($array_barang3d);
        } else
            $sum_barang3d = 0;

        if (!empty($barang3k->result())) {

            //barang3 kredit
            foreach ($barang3k->result() as $row) {
                $array_barang3k[] = $row->saldo;
            }
            $sum_barang3k = array_sum($array_barang3k);
        } else
            $sum_barang3k = 0;

        $tot_barang3 = $sum_barang3d - $sum_barang3k;
        return $tot_barang3;
    }

    function sewa()
    {
        //sewa debit
        $id_lb = $_GET['id_lb'];
        $sewad = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Sewa Dibayar Dimuka' && kode_jenis='D' && id_lb='$id_lb'");
        $sewak = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Sewa Dibayar Dimuka' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($sewad->result())) {
            foreach ($sewad->result() as $row) {
                $array_sewad[] = $row->saldo;
            }
            $sum_sewad = array_sum($array_sewad);
        } else
            $sum_sewad = 0;

        if (!empty($sewak->result())) {
            //sewa kredit
            foreach ($sewak->result() as $row) {
                $array_sewak[] = $row->saldo;
            }
            $sum_sewak = array_sum($array_sewak);
        } else
            $sum_sewak = 0;

        $tot_sewa = $sum_sewad - $sum_sewak;
        return $tot_sewa;
    }

    function lahan()
    {
        //lahan debit
        $id_lb = $_GET['id_lb'];
        $lahand = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Lahan Garap' && kode_jenis='D' && id_lb='$id_lb'");
        $lahank = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Lahan Garap' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($lahand->result())) {
            foreach ($lahand->result() as $row) {
                $array_lahand[] = $row->saldo;
            }
            $sum_lahand = array_sum($array_lahand);
        } else
            $sum_lahand = 0;

        if (!empty($lahank->result())) {
            //lahan kredit
            foreach ($lahank->result() as $row) {
                $array_lahank[] = $row->saldo;
            }
            $sum_lahank = array_sum($array_lahank);
        } else
            $sum_lahank = 0;

        $tot_lahan = $sum_lahand - $sum_lahank;
        return $tot_lahan;
    }

    function gedung()
    {
        //gedung debit
        $id_lb = $_GET['id_lb'];
        $gedungd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Gedung / Ruko' && kode_jenis='D' && id_lb='$id_lb'");
        $gedungk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Gedung / Ruko' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($gedungd->result())) {
            foreach ($gedungd->result() as $row) {
                $array_gedungd[] = $row->saldo;
            }
            $sum_gedungd = array_sum($array_gedungd);
        } else
            $sum_gedungd = 0;

        if (!empty($gedungk->result())) {
            //gedung kredit
            foreach ($gedungk->result() as $row) {
                $array_gedungk[] = $row->saldo;
            }
            $sum_gedungk = array_sum($array_gedungk);
        } else
            $sum_gedungk = 0;

        $tot_gedung = $sum_gedungd - $sum_gedungk;
        return $tot_gedung;
    }

    function operasional()
    {
        //operasional debit
        $id_lb = $_GET['id_lb'];
        $operasionald = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Kendaraan Operasional' && kode_jenis='D' && id_lb='$id_lb'");
        $operasionalk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Kendaraan Operasional' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($operasionald->result())) {
            foreach ($operasionald->result() as $row) {
                $array_operasionald[] = $row->saldo;
            }
            $sum_operasionald = array_sum($array_operasionald);
        } else
            $sum_operasionald = 0;

        if (!empty($operasionalk->result())) {

            //operasional kredit
            foreach ($operasionalk->result() as $row) {
                $array_operasionalk[] = $row->saldo;
            }
            $sum_operasionalk = array_sum($array_operasionalk);
        } else
            $sum_operasionalk = 0;

        $tot_operasional = $sum_operasionald - $sum_operasionalk;
        return $tot_operasional;
    }

    function Lain()
    {
        //lain debit
        $id_lb = $_GET['id_lb'];
        $laind = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Lain - Lain' && kode_jenis='D' && id_lb='$id_lb'");
        $laink = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Lain - Lain' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($laind->result())) {
            foreach ($laind->result() as $row) {
                $array_laind[] = $row->saldo;
            }
            $sum_laind = array_sum($array_laind);
        } else
            $sum_laind = 0;

        if (!empty($laink->result())) {

            //lain kredit
            foreach ($laink->result() as $row) {
                $array_laink[] = $row->saldo;
            }
            $sum_laink = array_sum($array_laink);
        } else
            $sum_laink = 0;

        $tot_lain = $sum_laind - $sum_laink;
        return $tot_lain;
    }

    function tanah()
    {
        //tanah debit
        $id_lb = $_GET['id_lb'];
        $tanahd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Tanah' && kode_jenis='D' && id_lb='$id_lb'");
        $tanahk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Tanah' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($tanahd->result())) {
            foreach ($tanahd->result() as $row) {
                $array_tanahd[] = $row->saldo;
            }
            $sum_tanahd = array_sum($array_tanahd);
        } else
            $sum_tanahd = 0;

        if (!empty($tanahk->result())) {

            //tanah kredit
            foreach ($tanahk->result() as $row) {
                $array_tanahk[] = $row->saldo;
            }
            $sum_tanahk = array_sum($array_tanahk);
        } else
            $sum_tanahk = 0;

        $tot_tanah = $sum_tanahd - $sum_tanahk;
        return $tot_tanah;
    }

    function bangunan()
    {
        //bangunan debit
        $id_lb = $_GET['id_lb'];
        $bangunand = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Bangunan' && kode_jenis='D' && id_lb='$id_lb'");
        $bangunank = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Bangunan' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($bangunand->result())) {
            foreach ($bangunand->result() as $row) {
                $array_bangunand[] = $row->saldo;
            }
            $sum_bangunand = array_sum($array_bangunand);
        } else
            $sum_bangunand = 0;

        if (!empty($bangunank->result())) {
            //bangunan kredit
            foreach ($bangunank->result() as $row) {
                $array_bangunank[] = $row->saldo;
            }
            $sum_bangunank = array_sum($array_bangunank);
        } else
            $sum_bangunank = 0;

        $tot_bangunan = $sum_bangunand - $sum_bangunank;
        return $tot_bangunan;
    }

    function kendaraan()
    {
        //kendaraan debit
        $id_lb = $_GET['id_lb'];
        $kendaraand = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Kendaraan Pribadi' && kode_jenis='D' && id_lb='$id_lb'");
        $kendaraank = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Kendaraan Pribadi' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($kendaraand->result())) {
            foreach ($kendaraand->result() as $row) {
                $array_kendaraand[] = $row->saldo;
            }
            $sum_kendaraand = array_sum($array_kendaraand);
        } else
            $sum_kendaraand = 0;

        if (!empty($kendaraank->result())) {

            //kendaraan kredit
            foreach ($kendaraank->result() as $row) {
                $array_kendaraank[] = $row->saldo;
            }
            $sum_kendaraank = array_sum($array_kendaraank);
        } else
            $sum_kendaraank = 0;

        $tot_kendaraan = $sum_kendaraand - $sum_kendaraank;
        return $tot_kendaraan;
    }

    function inventaris()
    {
        //inventaris debit
        $id_lb = $_GET['id_lb'];
        $inventarisd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Inventaris' && kode_jenis='D' && id_lb='$id_lb'");
        $inventarisk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Inventaris' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($inventarisd->result())) {
            foreach ($inventarisd->result() as $row) {
                $array_inventarisd[] = $row->saldo;
            }
            $sum_inventarisd = array_sum($array_inventarisd);
        } else
            $sum_inventarisd = 0;

        if (!empty($inventarisk->result())) {

            //inventaris kredit
            foreach ($inventarisk->result() as $row) {
                $array_inventarisk[] = $row->saldo;
            }
            $sum_inventarisk = array_sum($array_inventarisk);
        } else
            $sum_inventarisk = 0;

        $tot_inventaris = $sum_inventarisd - $sum_inventarisk;
        return $tot_inventaris;
    }

    function lain2()
    {
        //lain debit
        $id_lb = $_GET['id_lb'];
        $laind = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Lain - lain' && kode_jenis='D' && id_lb='$id_lb'");
        $laink = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Lain - lain' && kode_jenis='K' && id_lb='$id_lb'");
        if (!empty($laind->result())) {
            foreach ($laind->result() as $row) {
                $array_laind[] = $row->saldo;
            }
            $sum_laind = array_sum($array_laind);
        } else
            $sum_laind = 0;

        if (!empty($laink->result())) {
            //lain kredit
            foreach ($laink->result() as $row) {
                $array_laink[] = $row->saldo;
            }
            $sum_laink = array_sum($array_laink);
        } else
            $sum_laink = 0;

        $tot_lain = $sum_laind - $sum_laink;
        return $tot_lain;
    }

    function hutangPendek()
    {
        //hutangPendek debit
        $id_lb = $_GET['id_lb'];
        $hutangPendekd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Jangka Pendek' && kode_jenis='D' && id_lb='$id_lb'");
        $hutangPendekk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Jangka Pendek' && kode_jenis='K' && id_lb='$id_lb'");

        if (!empty($hutangPendekd->result())) {
            foreach ($hutangPendekd->result() as $row) {
                $array_hutangPendekd[] = $row->saldo;
            }
            $sum_hutangPendekd = array_sum($array_hutangPendekd);
        } else
            $sum_hutangPendekd = 0;


        if (!empty($hutangPendekk->result())) {
            //hutangPendek kredit
            foreach ($hutangPendekk->result() as $row) {
                $array_hutangPendekk[] = $row->saldo;
            }
            $sum_hutangPendekk = array_sum($array_hutangPendekk);
        } else
            $sum_hutangPendekk = 0;

        $tot_hutangPendek = $sum_hutangPendekk - $sum_hutangPendekd;
        return $tot_hutangPendek;
    }

    function hutangPanjang()
    {
        //hutangPanjang debit
        $id_lb = $_GET['id_lb'];
        $hutangPanjangd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Jangka Panjang' && kode_jenis='D' && id_lb='$id_lb'");
        $hutangPanjangk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Jangka Panjang' && kode_jenis='K' && id_lb='$id_lb'");

        if (!empty($hutangPanjangd->result())) {
            foreach ($hutangPanjangd->result() as $row) {
                $array_hutangPanjangd[] = $row->saldo;
            }
            $sum_hutangPanjangd = array_sum($array_hutangPanjangd);
        } else
            $sum_hutangPanjangd = 0;


        if (!empty($hutangPanjangk->result())) {
            //hutangPanjang kredit
            foreach ($hutangPanjangk->result() as $row) {
                $array_hutangPanjangk[] = $row->saldo;
            }
            $sum_hutangPanjangk = array_sum($array_hutangPanjangk);
        } else
            $sum_hutangPanjangk = 0;

        $tot_hutangPanjang = $sum_hutangPanjangk - $sum_hutangPanjangd;
        return $tot_hutangPanjang;
    }

    function hutangLain()
    {
        //hutangLain debit
        $id_lb = $_GET['id_lb'];
        $hutangLaind = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Lain' && kode_jenis='D' && id_lb='$id_lb'");
        $hutangLaink = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Lain' && kode_jenis='K' && id_lb='$id_lb'");

        if (!empty($hutangLaind->result())) {
            foreach ($hutangLaind->result() as $row) {
                $array_hutangLaind[] = $row->saldo;
            }
            $sum_hutangLaind = array_sum($array_hutangLaind);
        } else
            $sum_hutangLaind = 0;


        if (!empty($hutangLaink->result())) {

            //hutangLain kredit
            foreach ($hutangLaink->result() as $row) {
                $array_hutangLaink[] = $row->saldo;
            }
            $sum_hutangLaink = array_sum($array_hutangLaink);
        } else
            $sum_hutangLaink = 0;

        $tot_hutangLain = $sum_hutangLaink - $sum_hutangLaind;
        return $tot_hutangLain;
    }

    function hutangDagang()
    {
        //hutangDagang debit
        $id_lb = $_GET['id_lb'];
        $hutangDagangd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Dagang' && kode_jenis='D' && id_lb='$id_lb'");
        $hutangDagangk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Dagang' && kode_jenis='K' && id_lb='$id_lb'");

        if (!empty($hutangDagangd->result())) {
            foreach ($hutangDagangd->result() as $row) {
                $array_hutangDagangd[] = $row->saldo;
            }
            $sum_hutangDagangd = array_sum($array_hutangDagangd);
        } else
            $sum_hutangDagangd = 0;


        if (!empty($hutangDagangk->result())) {
            //hutangDagang kredit
            foreach ($hutangDagangk->result() as $row) {
                $array_hutangDagangk[] = $row->saldo;
            }
            $sum_hutangDagangk = array_sum($array_hutangDagangk);
        } else
            $sum_hutangDagangk = 0;

        $tot_hutangDagang = $sum_hutangDagangk - $sum_hutangDagangd;
        return $tot_hutangDagang;
    }

    function totalHutang()
    {

        $id_lb = $_GET['id_lb'];
        $lb = $this->db->query("SELECT * FROM capital_a WHERE id_lb='$id_lb'");
        foreach ($lb->result() as $data) {
            $totalHutang = ($data->hutang_jpk + $this->hutangPendek()) + ($data->hutang_jpg + $this->hutangPanjang()) + ($data->hutang_lain + $this->hutangLain()) +
                ($data->hutang_dagang + $this->hutangDagang());
        }
        return $totalHutang;
    }

    function aktivaLancar()
    {
        $id_lb = $_GET['id_lb'];
        $lb = $this->db->query("SELECT * FROM capital_a WHERE id_lb='$id_lb'");
        foreach ($lb->result() as $data) {

            $aktivaLancar = ($data->kas + $this->kas()) + ($data->tabungan + $this->tabungan()) + ($data->deposito + $this->deposito()) +
                ($data->piutang + $this->piutang()) + ($data->peralatan + $this->peralatan()) + ($data->barang + $this->barang1()) +
                ($data->barang2 + $this->barang2()) + ($data->barang3 + $this->barang3()) + ($data->sewa + $this->sewa()) + ($data->lahan + $this->lahan()) +
                ($data->gedung + $this->gedung()) + ($data->operasional + $this->operasional()) + ($data->lain + $this->Lain());
        }
        return $aktivaLancar;
    }

    function aktivaTetap()
    {
        $id_lb = $_GET['id_lb'];
        $lb = $this->db->query("SELECT * FROM capital_a WHERE id_lb='$id_lb'");
        foreach ($lb->result() as $data) {

            $aktivaTetap = ($data->tanah + $this->tanah()) + ($data->bangunan + $this->bangunan()) + ($data->kendaraan + $this->kendaraan()) +
                ($data->inventaris + $this->inventaris()) + ($data->lain2 + $this->lain2());
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
        if ($modal < 0) {
            $modal = $modal * -1;
            $modal = '(' . number_format($modal) . ')';
        }
        return $modal;
    }
}
