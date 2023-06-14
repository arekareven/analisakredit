<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pdf_all extends CI_Controller
{
    function __construct()
    {
        parent::__construct();        
        $this->load->model('m_capital');
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }

    function index()
    {
        $pdf = new FPDF('P', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // margin
        $pdf->SetMargins(10, 10, 10);
        // mencetak string 
        $id_lb = $_GET['id_lb'];

        //LATAR BELAKANG
        $lb = $this->db->query("SELECT * FROM latar_belakang WHERE id_lb='$id_lb'");
        foreach ($lb->result() as $data) {
            $pdf->SetFont('Times', 'B', 16);
            $pdf->Cell(0, 5.5, 'ANALISA KREDIT', 0, 1, 'C');
            $pdf->Cell(5, 5.5, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, 'LATAR BELAKANG CALON DEBITUR', 0, 1, '');
            $pdf->Cell(49, 5.5, 'CIF', 0, 0, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->id_lb, 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(49, 5.5, 'Tgl Permohonan', 0, 0, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, date('d-m-Y', strtotime($data->tgl_permohonan)), 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(49, 5.5, 'Tgl Analisa', 0, 0, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, date('d-m-Y', strtotime($data->tgl_analisa)), 0, 1);
            $pdf->Cell(5, 5.5, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, 'I. DATA PERMOHONAN', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, 'Plafond Yang Dimohon', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->plafon), 0, 1);
            $pdf->Cell(49, 5.5, 'Jangka Waktu', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->jangka_waktu.' Bulan', 0, 1);
            $pdf->Cell(49, 5.5, 'Sifat Kredit', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->sifat_kredit, 0, 1);
            $pdf->Cell(49, 5.5, 'Jenis Permohonan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->jenis_permohonan, 0, 1);
            $pdf->Cell(49, 5.5, 'Tujuan Penggunaan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tujuan_permohonan, 0, 1);
            $pdf->Cell(49, 5.5, 'Keterangan Penggunaan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->ket_penggunaan, 0, 1);
            $pdf->Cell(5, 5.5, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, 'II. DATA DIRI NASABAH', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, 'Nama Debitur', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->nama_debitur, 0, 0);
            $pdf->Cell(35, 5.5, 'Tanggungan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tanggungan.' orang', 0, 1);

            $pdf->Cell(49, 5.5, 'Status Perkawinan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->status_kawin, 0, 0);
            $pdf->Cell(35, 5.5, 'Pendidikan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->pendidikan, 0, 1);

            $pdf->Cell(49, 5.5, 'Tempat, Tgl Lahir', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->ttl_nasabah, 0, 0);
            $pdf->Cell(35, 5.5, 'Jenis Kelamin', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->jenis_kelamin, 0, 1);

            $pdf->Cell(49, 5.5, 'No. KTP', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->ktp, 0, 0);
            $pdf->Cell(35, 5.5, 'Masa Laku', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->masa_laku, 0, 1);

            $pdf->Cell(49, 5.5, 'No. Telp/HP', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->hp_nasabah, 0, 0);
            $pdf->Cell(35, 5.5, 'No. Telp. Kantor', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->telp_kantor, 0, 1);

            $pdf->Cell(49, 5.5, 'Status Tempat Tinggal', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->status_tt, 0, 0);
            $pdf->Cell(35, 5.5, 'Lama Tinggal', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->lama_tinggal.' tahun', 0, 1);

            $pdf->Cell(49, 5.5, 'Pekerjaan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->pekerjaan_nasabah, 0, 1);

            $pdf->Cell(49, 5.5, 'Alamat Sesuai KTP', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->MultiCell(0, 5.5, $data->alamat_ktp_nasabah);
            $pdf->Cell(49, 5.5, 'Alamat Domisili', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->MultiCell(0, 5.5, $data->domisili_nasabah);
            $pdf->Cell(5, 5.5, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, 'III. DATA SUAMI / ISTRI', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, 'Nama Istri/Suami', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->nama_pasangan, 0, 1);
            $pdf->Cell(49, 5.5, 'Tempat, Tgl Lahir', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->ttl_pasangan, 0, 1);
            $pdf->Cell(49, 5.5, 'Alamat Sesuai KTP', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->MultiCell(0, 5.5, $data->alamat_ktp_pasangan);
            $pdf->Cell(49, 5.5, 'Alamat Domisili', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->MultiCell(0, 5.5, $data->domisili_pasangan);
            $pdf->Cell(49, 5.5, 'Profesi Istri/Suami', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->pekerjaan_pasangan, 0, 1);
            $pdf->Cell(49, 5.5, 'No. Telp/HP', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->hp_pasangan, 0, 1);
            $pdf->Cell(5, 5.5, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, 'IV. DATA EMERGENCY CONTACT (KELUARGA TIDAK SERUMAH)', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, 'Nama Lengkap', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->nama_keluarga, 0, 1);
            $pdf->Cell(49, 5.5, 'Hubungan Keluarga', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->hubungan_keluarga, 0, 1);
            $pdf->Cell(49, 5.5, 'Alamat Rumah', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->MultiCell(0, 5.5, $data->alamat_keluarga);
            $pdf->Cell(49, 5.5, 'No. Telp/HP', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->hp_keluarga, 0, 1);
            $pdf->Cell(5, 5.5, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, 'V. RIWAYAT PINJAMAN', 0, 1, '');
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(10, 5.5, 'No', 1, 0, 'C');
            $pdf->Cell(37, 5.5, 'Plafond (Rp.)', 1, 0, 'C');
            $pdf->Cell(37, 5.5, 'Status', 1, 0, 'C');
            $pdf->Cell(37, 5.5, 'Saldo (Rp.)', 1, 0, 'C');
            $pdf->Cell(37, 5.5, 'Sejarah', 1, 0, 'C');
            $pdf->Cell(37, 5.5, 'Data', 1, 1, 'C');
            $pdf->SetFont('Times', '', 12);

            $no = 0;
            $id_lb = $_GET['id_lb'];
            $rp = $this->db->get_where('riwayat_pinjaman', array('id_lb' => $id_lb))->result();
            foreach ($rp as $data) {
                $no++;
                $pdf->Cell(10, 5.5, $no, 1, 0, 'C');
                $pdf->Cell(37, 5.5,number_format($data->plafond), 1, 0, 'C');
                $pdf->Cell(37, 5.5, $data->status, 1, 0, 'C');
                $pdf->Cell(37, 5.5,number_format($data->saldo), 1, 0, 'C');
                $pdf->Cell(37, 5.5, $data->sejarah, 1, 0, 'C');
                $pdf->Cell(37, 5.5, $data->data, 1, 1, 'C');
            }

        }

        //CHARACTER
        $pdf->AddPage();
        $lb = $this->db->query("SELECT * FROM karakter WHERE id_lb='$id_lb'");
        foreach ($lb->result() as $data) {
            $pdf->SetFont('Times', '', 12);
            $pdf->MultiCell(0,5.5, 'Atas permohonan yang diajukan tersebut, setelah kami lakukan analisa melalui Aspek 6C, hasilnya adalah sebagai berukut :');
            $pdf->Cell(5, 5.5, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, 'I. CHARACTER', 0, 1, '');
            $pdf->Cell(79, 5.5, 'Informasi Pribadi', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->MultiCell(0, 5.5, $data->info_pribadi);
            $pdf->Cell(5, 5.5, '', 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(49, 5.5, 'Informasi Perilaku', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->MultiCell(0, 5.5, $data->info_perilaku);
            $pdf->Cell(5, 5.5, '', 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(49, 5.5, 'Informasi Keluarga', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->MultiCell(0, 5.5, $data->info_keluarga);
            $pdf->Cell(5, 5.5, '', 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(49, 5.5, 'Informasi Karakter', 0, 1, '');
            $pdf->Cell(5, 5.5, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(7, 5.5, 'No', 1, 0, 'C');
            $pdf->Cell(30, 5.5, 'Nama', 1, 0, 'C');
            $pdf->Cell(120, 5.5, 'Alamat', 1, 0, 'C');
            $pdf->Cell(30, 5.5, 'Tlp. / HP', 1, 1, 'C');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(7, 5.5, '1', 1, 0, 'C'); 
            $pdf->Cell(30, 5.5, $data->nm1, 1, 0, '');
            $pdf->Cell(120, 5.5, $data->al1,1,0);
            $pdf->Cell(30, 5.5, $data->hp1, 1, 1, '');
            $pdf->Cell(7, 5.5, '2', 1, 0, 'C');
            $pdf->Cell(30, 5.5, $data->nm2, 1, 0, '');
            $pdf->Cell(120, 5.5, $data->al2,1,0);
            $pdf->Cell(30, 5.5, $data->hp2, 1, 1, '');
            $pdf->Cell(7, 5.5, '3', 1, 0, 'C');
            $pdf->Cell(30, 5.5, $data->nm3, 1, 0, '');
            $pdf->Cell(120, 5.5, $data->al3, 1, 0);
            $pdf->Cell(30, 5.5, $data->hp3, 1, 1, '');

        }

        //CASHFLOW SEBELUM
        $pdf->AddPage();
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
            $pdf->Cell(28, 5.5, number_format($this->rugiLaba()), 1, 1, 'R');

        }

        //CASHFLOW SETELAH
        $pdf->AddPage();
		$lb = $this->db->query("SELECT * FROM capital_a 
        JOIN latar_belakang ON capital_a.id_lb=latar_belakang.id_lb
        WHERE capital_a.id_lb='$id_lb'");
        foreach ($lb->result() as $data) {

            $capital = array(
            'id_lb'         => $id_lb,
            'kas'    => $data->kas + $this->kas_cs(),
            'tabungan'        => $data->tabungan + $this->tabungan_cs(),
            'deposito'        => $data->deposito + $this->deposito_cs(),
            'piutang'  => $data->piutang + $this->piutang_cs(),
            'peralatan'  => $data->peralatan + $this->peralatan_cs(),
            'barang'     => $data->barang + $this->barang1_cs(),
            'barang2'     => $data->barang2 + $this->barang2_cs(),
            'barang3'     => $data->barang3 + $this->barang3_cs(),
            'sewa'     => $data->sewa + $this->sewa_cs(),
            'lahan'   => $data->lahan + $this->lahan_cs(),
            'gedung'          => $data->gedung + $this->gedung_cs(),
            'operasional'      => $data->operasional + $this->operasional_cs(),
            'lain'          => $data->lain + $this->Lain_cs(),
            'total_al'      => $this->aktivaLancar_cs(),
            'tanah'    => $data->tanah + $this->tanah_cs(),
            'bangunan'    => $data->bangunan + $this->bangunan_cs(),
            'kendaraan'    => $data->kendaraan + $this->kendaraan_cs(),
            'inventaris'    => $data->inventaris + $this->inventaris_cs(),
            'lain2'    => $data->lain2 + $this->lain2_cs(),
            'total_at'    => $this->aktivaTetap_cs(),
            'hutang_jpk'    => $data->hutang_jpk + $this->hutangPendek_cs(),
            'hutang_jpg'    => $data->hutang_jpg + $this->hutangPanjang_cs(),
            'hutang_dagang'    => $data->hutang_dagang + $this->hutangDagang_cs(),
            'hutang_lain'    => $data->hutang_lain + $this->hutangLain_cs(),
            'laba_rugi'    => $this->surplus_cs(),
            'modal'    => $this->modal_cs(),
            'harta'    => $this->aktivaTetap_cs(),
            'total_hutang'    => $this->totalHutang_cs(),
            'total_aset'    => $this->aset_cs(),
            'total_kjb'    => $this->aset_cs(),
            'total_angsuran'    => $this->kreditAngsuran_cs(),
            );

            $query = $this->m_capital->cek_idlb($id_lb)->num_rows();
            if (empty($query)) {
            $this->db->insert('capital_cache', $capital);
            } else {
            $this->db->where('id_lb', $id_lb);
            $this->db->update('capital_cache', $capital);
            }

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, '3. CAPITAL (setelah memperoleh kredit)', 0, 1, '');
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
            $musiman = $data->musiman;
            $time = strtotime(date('M Y'));
            $pdf->Cell(180, 5.5, 'Per ' . date('M Y', strtotime(+$musiman . ' month', $time)), 0, 1, 'C');

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
            $pdf->Cell(46, 5.5, number_format($data->kas + $this->kas_cs()), 0, 0);
            $pdf->Cell(44, 5.5, 'Hutang Jangka Pendek', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->hutang_jpk + $this->hutangPendek_cs()), 0, 1);
            $pdf->Cell(44, 5.5, 'Simp Bank -Tabungan', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->tabungan + $this->tabungan_cs()), 0, 0);
            $pdf->Cell(44, 5.5, '(1 -3 Tahun)', 0, 1, '');
            $pdf->Cell(44, 5.5, '                   -Deposito', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->deposito + $this->deposito_cs()), 0, 0, '');
            $pdf->Cell(44, 5.5, 'Hutang Jangka Panjang', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->hutang_jpg + $this->hutangPanjang_cs()), 0, 1);
            $pdf->Cell(44, 5.5, 'Piutang ', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->piutang + $this->piutang_cs()), 0, 0);
            $pdf->Cell(44, 5.5, '(> 3 Tahun)', 0, 1, '');
            $pdf->Cell(44, 5.5, 'Peralatan', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->peralatan + $this->peralatan_cs()), 0, 0);
            $pdf->Cell(44, 5.5, 'Hutang Lain', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->hutang_lain + $this->hutangLain_cs()), 0, 1);
            $pdf->Cell(44, 5.5, 'Persediaan Brg Usaha 1', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->barang + $this->barang1_cs()), 0, 0);
            $pdf->Cell(44, 5.5, 'Hutang Dagang', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->hutang_dagang + $this->hutangDagang_cs()), 0, 1);
            $pdf->Cell(44, 5.5, 'Persediaan Brg Usaha 2', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->barang2 + $this->barang2_cs()), 0, 0);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(60, 5.5, 'Total Hutang', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($this->totalHutang_cs()), 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 5.5, 'Persediaan Brg Usaha 3', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->barang3 + $this->barang3_cs()), 0, 1);
            $pdf->Cell(44, 5.5, 'Sewa Dibayar Muka', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->sewa + $this->sewa_cs()), 0, 0);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(60, 5.5, 'Laba / Rugi', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($this->rugiLaba_cs()), 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 5.5, 'Lahan Garap', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->lahan + $this->lahan_cs()), 0, 1);
            $pdf->Cell(44, 5.5, 'Gedung / Ruko', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->gedung + $this->gedung_cs()), 0, 0);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(60, 5.5, 'Modal Usaha', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $modal = $this->modal_cs();
            if ($modal < 0) {
            $modal = $modal * -1;
            $modal = '(' . number_format($modal) . ')';
            } else
            $modal = number_format($modal);
            $pdf->Cell(46, 5.5,  $modal, 0, 1);
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(44, 5.5, 'Kendaraan Operasional', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->operasional + $this->operasional_cs()), 0, 1);
            $pdf->Cell(44, 5.5, 'Lain - lain', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->lain + $this->Lain_cs()), 0, 1);
            $pdf->SetFont('Times', 'B', 12);
			$pdf->Cell(60, 7, 'Jumlah Aktiva Produktif', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($this->aktivaLancar_cs()), 0, 1);
            $pdf->SetFont('Times', '', 12);
			$pdf->Cell(44, 7, 'Aktiva Lainnya', 0, 1, '');
            $pdf->Cell(44, 5.5, 'Tanah', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->tanah + $this->tanah_cs()), 0, 1);
            $pdf->Cell(44, 5.5, 'Bangunan', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->bangunan + $this->bangunan_cs()), 0, 1);
            $pdf->Cell(44, 5.5, 'Kendaraan', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->kendaraan + $this->kendaraan_cs()), 0, 1);
            $pdf->Cell(44, 5.5, 'Inventaris', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->inventaris + $this->inventaris_cs()), 0, 1);
            $pdf->Cell(44, 5.5, 'Lain - lain', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($data->lain2 + $this->lain2_cs()), 0, 1);
            $pdf->SetFont('Times', 'B', 12);
			$pdf->Cell(60, 5.5, 'Jumlah Aktiva Lainnya', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(30, 5.5, number_format($this->aktivaTetap_cs()), 0, 0);
            $pdf->Line(10, 173, 60, 173);
            $pdf->Line(60, 173, 80, 186);
            $pdf->Line(80, 186, 110, 186);
            $pdf->Line(80, 194, 110, 194);
            $pdf->Cell(60, 5.5, 'Harta', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($this->aktivaTetap_cs()), 0, 1);
            $pdf->Line(110, 173, 160, 173);
            $pdf->Line(160, 173, 180, 186);
            $pdf->Line(180, 186, 210, 186);
            $pdf->Line(180, 194, 210, 194);
            $pdf->Cell(10, 15, '', 0, 1);
            $pdf->Cell(60, 5.5, 'TOTAL ASET', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(30, 5.5, number_format($this->aset_cs()), 0, 0);
            $pdf->Cell(60, 5.5, 'TOTAL KEWAJIBAN', 0, 0, '');
            $pdf->Cell(10, 5.5, 'Rp.', 0, 0, '');
            $pdf->Cell(46, 5.5, number_format($this->aset_cs()), 0, 1);
            $pdf->Cell(10, 7, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, '4. CASH FLOW (setelah memperoleh kredit)', 0, 1, '');
            $pdf->Cell(7, 5.5, 'No', 1, 0, 'C');
            $pdf->Cell(106, 5.5, 'Keterangan', 1, 0, 'C');
            $pdf->Cell(28, 5.5, 'Pemasukan', 1, 0, 'C');
            $pdf->Cell(28, 5.5, 'Pengeluaran', 1, 0, 'C');
            $pdf->Cell(28, 5.5, 'Jumlah', 1, 1, 'C');

            //Cashflow usaha 1
            $rp = $this->db->query("SELECT * FROM cashflow_a WHERE kode_perkiraan = '4.1.1' && id_lb='$id_lb'");
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
            $rp = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.1' && id_lb='$id_lb'");
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
            $rp2 = $this->db->query("SELECT * FROM cashflow_a WHERE kode_perkiraan = '4.1.2' && id_lb='$id_lb'");
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
            $rp2 = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.2' && id_lb='$id_lb'");
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
            $rp3 = $this->db->query("SELECT * FROM cashflow_a WHERE kode_perkiraan = '4.1.3' && id_lb='$id_lb'");
            if (!empty($rp3->result())) {
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
            $rp3 = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.3' && id_lb='$id_lb'");
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

            //Cashflow lain/gaji
            $lg = $this->db->query("SELECT * FROM cashflow_a WHERE kode_perkiraan = '4.1.4' && id_lb='$id_lb'");
            if (!empty($lg->result())) {
            $pdf->Cell(7, 5.5, '', 1, 0, 'C');
            $pdf->Cell(106, 5.5, 'PENDAPATAN LAIN / GAJI', 1, 0, '');
            $pdf->Cell(28, 5.5, '', 1, 0, 'C');
            $pdf->Cell(28, 5.5, '', 1, 0, 'C');
            $pdf->Cell(28, 5.5, '', 1, 1, 'C');

            foreach ($lg->result() as $data) {
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
            $pdf->Cell(28, 5.5, number_format($this->debit_cs()), 1, 0, 'R');
            $pdf->Cell(28, 5.5, number_format($this->tot_kredit_cs()), 1, 0, 'R');
            $pdf->Cell(28, 5.5, number_format($this->surplus_cs()), 1, 1, 'R');

            //Cashflow pengeluaran biaya lain
            $rp4 = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.4' && id_lb='$id_lb'");
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
            $pdf->Cell(28, 5.5, number_format($this->kreditLain_cs()), 1, 1, 'R');
            } else {
            }

            //Cashflow pengeluaran angsuran
            $angsuran = $this->db->query("SELECT * FROM cashflow_a WHERE MID(kode_perkiraan,1,3) = '5.5' && id_lb='$id_lb'");
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
            $pdf->Cell(28, 5.5, number_format($this->kreditAngsuran_cs()), 1, 1, 'R');
            } else {
            }

            //Cashflow Rugi laba
            $pdf->Cell(7, 5.5, '', 1, 0, 'C');
            $pdf->Cell(106, 5.5, 'RUGI / LABA', 1, 0, '');
            $pdf->Cell(28, 5.5, '', 1, 0, 'C');
            $pdf->Cell(28, 5.5, '', 1, 0, 'C');
            $pdf->Cell(28, 5.5, number_format($this->rugiLaba_cs()), 1, 1, 'R');

        }

        //CASHFLOW LAIN  
        $rp = $this->db->query("SELECT * FROM cashflow_lain WHERE id_lb='$id_lb'");
        if (!empty($rp->result())) {
                $pdf->AddPage();         
                $pdf->SetFont('Times', 'B', 12);
                $pdf->Cell(79, 5.5, '* Keuangan Lain', 0, 1, '');
                $pdf->Cell(79, 5.5, '', 0, 1, '');
                $pdf->Cell(7, 5.5, 'No', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'Keterangan', 1, 0, 'C');
                $pdf->Cell(28, 5.5, 'Pemasukan', 1, 0, 'C');
                $pdf->Cell(28, 5.5, 'Pengeluaran', 1, 0, 'C');
                $pdf->Cell(28, 5.5, 'Jumlah', 1, 1, 'C');
        
            
            //Cashflow usaha 1
            $rp = $this->db->query("SELECT * FROM cashflow_lain WHERE kode_perkiraan = '4.1.1' && id_lb='$id_lb'");
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
                $rp = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '5.1' && id_lb='$id_lb'");
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
            $rp2 = $this->db->query("SELECT * FROM cashflow_lain WHERE kode_perkiraan = '4.1.2' && id_lb='$id_lb'");
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
                $rp2 = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '5.2' && id_lb='$id_lb'");
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
            $rp3 = $this->db->query("SELECT * FROM cashflow_lain WHERE kode_perkiraan = '4.1.3' && id_lb='$id_lb'");
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
                $rp3 = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '5.3' && id_lb='$id_lb'");
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

            //Cashflow lain/gaji
            $lg = $this->db->query("SELECT * FROM cashflow_lain WHERE kode_perkiraan = '4.1.4' && id_lb='$id_lb'");
            if (!empty($lg->result())) {
                
                $pdf->SetFont('Times', '', 12);
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'PENDAPATAN LAIN / GAJI', 1, 0, '');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 1, 'C');

                foreach ($lg->result() as $data) {
                    $pdf->SetFont('Times', '', 12);
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
            $pdf->Cell(28, 5.5, number_format($this->debit_cl()), 1, 0, 'R');
            $pdf->Cell(28, 5.5, number_format($this->tot_kredit_cl()), 1, 0, 'R');
            $pdf->Cell(28, 5.5, number_format($this->surplus_cl()), 1, 1, 'R');

            //Cashflow pengeluaran biaya lain
            $rp4 = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '5.4' && id_lb='$id_lb'");
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
                $pdf->Cell(28, 5.5, number_format($this->kreditLain_cl()), 1, 1, 'R');
            } else {
            }

            //Cashflow pengeluaran angsuran
            $angsuran = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '5.5' && id_lb='$id_lb'");
            if (!empty($angsuran->result())) {
                
                $pdf->Cell(7, 5.5, '', 1, 0, 'C');
                $pdf->Cell(106, 5.5, 'BIAYA ANGSURAN HUTANG', 1, 0, '');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 0, 'C');
                $pdf->Cell(28, 5.5, '', 1, 1, 'C');

                $no = 0;
                foreach ($angsuran->result() as $data) {
                    $no++;
                    $pdf->SetFont('Times', '', 12);
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
                $pdf->Cell(28, 5.5, number_format($this->kreditAngsuran_cl()), 1, 1, 'R');
            } else {
            }

            //Cashflow Rugi laba
            $pdf->Cell(7, 5.5, '', 1, 0, 'C');
            $pdf->Cell(106, 5.5, 'RUGI / LABA', 1, 0, '');
            $pdf->Cell(28, 5.5, '', 1, 0, 'C');
            $pdf->Cell(28, 5.5, '', 1, 0, 'C');
            
            $pdf->Cell(28, 5.5, number_format($this->rugiLaba_cl()), 1, 1, 'R');

        } else {
        } 

        //CONDITION
        $pdf->AddPage();
        $lb = $this->db->query("SELECT * FROM `condition` WHERE id_lb='$id_lb'");
        foreach ($lb->result() as $data) {
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, '5. CONDITION OF ECOMOMY', 0, 1, '');
            $pdf->Cell(5, 5.5, '', 0, 1);
            $pdf->Cell(79, 5.5, '1. Kekuatan', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->MultiCell(0, 5.5, $data->kekuatan);
            $pdf->Cell(5, 5.5, '', 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, '2. Kelemahan', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->MultiCell(0, 5.5, $data->kelemahan);
            $pdf->Cell(5, 5.5, '', 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, '3. Peluang', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->MultiCell(0, 5.5, $data->peluang);
            $pdf->Cell(5, 5.5, '', 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, '4. Ancaman', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->MultiCell(0, 5.5, $data->ancaman);

        }

        //COLLATERAL
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 12);
        $pdf->Cell(79, 5.5, '6. COLLATERAL (JAMINAN)', 0, 1, '');
        $pdf->Cell(5, 5.5, '', 0, 1);
        $no = 0;
        $lb = $this->db->get_where('collateral_tanah', array('id_lb' => $id_lb))->result();
        foreach ($lb as $data) {

            $taksiran_sppt_tanah = $data->luas_t * $data->harga_t;

            $taksiran_sppt_bangunan = $data->luas_b  * $data->harga_b;

            $taksiran_pasar_tanah = $data->luas_t  * $data->harga_t2;

            $taksiran_pasar_bangunan = $data->luas_b  * $data->harga_b2;

            $taksasi = ($taksiran_pasar_tanah + $taksiran_pasar_bangunan) * ($data->taksasi/100);

            $ht = $data->ht  * (125 / 100);

            $no++;
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, $no . '. Sebidang tanah ' . $data->jenis . ' dengan kondisi :', 0, 1, '');
            $pdf->Cell(5, 5.5, '', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, 'Nama Pemilik', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->nama, 0, 1);
            $pdf->Cell(49, 5.5, 'Alamat Pemilik', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->alamat, 0, 1);
            $pdf->Cell(49, 5.5, 'No. SHM', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->no_shm, 0, 1);
            $pdf->Cell(49, 5.5, 'Lokasi Jaminan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->lokasi, 0, 1);
            $pdf->Cell(49, 5.5, 'Tanggal Surat Ukur', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, date('d-m-Y', strtotime($data->tgl_ukur)), 0, 1);
            $pdf->Cell(49, 5.5, 'No. di Surat Ukur', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->no_ukur, 0, 1);
            $pdf->Cell(49, 5.5, 'Luas Tanah', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(10, 5.5, $data->luas_t, 0, 0);
            $pdf->Cell(49, 5.5, 'M2', 0, 1, '');
            $pdf->Cell(49, 5.5, 'Kepemilikan	', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->milik, 0, 1);
            $pdf->Cell(49, 5.5, 'Keterangan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->MultiCell(0, 5.5, $data->fisik_jaminan);
            $pdf->Cell(5, 5.5, '', 0, 1, '');

            $pdf->Cell(49, 5.5, 'Taksiran Harga', 0, 1, '');
            $pdf->Cell(49, 5.5, '- Sebidang tanah ' . $data->jenis . ' :', 0, 1, '');
            $pdf->Cell(49, 5.5, 'Taksiran harga didasarkan SPPT :', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Luas Tanah ' . $data->luas_t . ' M2 x Rp. ' . number_format($data->harga_t) . ',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($taksiran_sppt_tanah) . ',-', 0, 1, 'R');
            $pdf->Cell(89, 5.5, 'Luas Bangunan ' . $data->luas_b . ' M2 x Rp. ' . number_format($data->harga_b) . ',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($taksiran_sppt_bangunan) . ',-', 0, 1, 'R');
            $pdf->Cell(25, 5.5, '', 0, 1, '');

            $pdf->Cell(49, 5.5, 'Taksiran harga didasarkan Harga Pasar :', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Luas Tanah ' . $data->luas_t . ' M2 x Rp. ' . number_format($data->harga_t2) . ',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($taksiran_pasar_tanah) . ',-', 0, 1, 'R');
            $pdf->Cell(89, 5.5, 'Luas Bangunan ' . $data->luas_b . ' M2 x Rp. ' . number_format($data->harga_b2) . ',-', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($taksiran_pasar_bangunan) . ',-', 0, 1, 'R');
            $pdf->Cell(25, 5.5, '', 0, 1, '');

            $pdf->Cell(49, 5.5, 'Taksiran Harga Bank adalah', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Rp. ' . number_format($taksiran_pasar_tanah + $taksiran_pasar_bangunan) . ',- x '. $data->taksasi.' %', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($taksasi) . ',-', 0, 1, 'R');
            $pdf->Cell(25, 5.5, '', 0, 1, '');

            $pdf->Cell(89, 5.5, 'HT Rp. ' . number_format($data->ht) . ',- x 125%', 0, 0, '');
            $pdf->Cell(25, 5.5, '= Rp.', 0, 0, '');
            $pdf->Cell(20, 5.5, number_format($ht) . ',-', 0, 1, 'R');
            $pdf->Cell(25, 5.5, '', 0, 1, '');

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(89, 5.5, 'Harga Tanah Rp. ' . number_format($taksiran_pasar_tanah) . ',-', 0, 1, '');
            $pdf->Cell(89, 5.5, 'SPPT Rp. ' . number_format($taksiran_sppt_tanah) . ',-', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Taksasi Rp. ' . number_format($taksasi) . ',-', 0, 1, '');

            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, '', 0, 1, '');
            $pdf->Cell(49, 5.5, 'Usulan :', 0, 1, '');
            $pdf->MultiCell(0, 5.5, $data->usulan);
            $pdf->Cell(49, 5.5, '', 0, 1, '');
            $pdf->Cell(49, 5.5, '', 0, 1, '');

        }

        $pdf->AddPage();
        $lb = $this->db->get_where('collateral', array('id_lb' => $id_lb))->result();
        foreach ($lb as $data) {
            
            $taksasi_kendaraan = $data->taksiran  * (70 / 100);

            $no++;
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, $no . '. Kendaraan bermotor roda ' . $data->roda, 0, 1, '');
            $pdf->Cell(5, 5.5, '', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, 'Nomor Polisi', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->nopol, 0, 1);
            $pdf->Cell(49, 5.5, 'Nama di STNK', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->nama_stnk, 0, 1);
            $pdf->Cell(49, 5.5, 'Alamat', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->alamat, 0, 1);
            $pdf->Cell(49, 5.5, 'Merk / Type', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->type, 0, 1);
            $pdf->Cell(49, 5.5, 'Jenis / Model', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->jenis, 0, 1);
            $pdf->Cell(49, 5.5, 'Tahun', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tahun, 0, 1);
            $pdf->Cell(49, 5.5, 'Warna', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->warna, 0, 1);
            $pdf->Cell(49, 5.5, 'Isi Silinder	', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->silinder, 0, 1);
            $pdf->Cell(49, 5.5, 'No. Rangka', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->no_rangka, 0, 1);
            $pdf->Cell(49, 5.5, 'No. Mesin', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->no_mesin, 0, 1);
            $pdf->Cell(49, 5.5, 'No. BPKB', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->no_bpkb, 0, 1);
            $pdf->Cell(49, 5.5, 'Kepemilikan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->milik, 0, 1);
            $pdf->Cell(5, 5.5, '', 0, 1, '');

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(89, 5.5, 'Harga pasaran Rp. ' . number_format($data->taksiran) . ',-', 0, 1, '');
            $pdf->Cell(89, 5.5, 'Taksasi harga bank Rp. ' . number_format($taksasi_kendaraan) . ',-', 0, 1, '');
            $pdf->Cell(89, 5.5, '', 0, 1, '');

            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(89, 5.5, 'NL Rp. ' . number_format($data->nl) . ',-', 0, 1, '');
            $pdf->Cell(89, 5.5, '', 0, 1, '');

            $pdf->Cell(49, 5.5, 'Usulan :', 0, 1, '');
            $pdf->MultiCell(0, 5.5, $data->usulan);
            $pdf->Cell(49, 5.5, '', 0, 1, '');
            $pdf->Cell(49, 5.5, '', 0, 1, '');
        }

        //USULAN
        $id_lb = $_GET['id_lb'];
		$pdf->AddPage();
		$dbusulan = $this->db->query("SELECT * FROM usulan JOIN latar_belakang ON usulan.id_lb=latar_belakang.id_lb
                                        JOIN cashflow_b ON usulan.id_lb=cashflow_b.id_lb
                                        JOIN capital_b ON usulan.id_lb=capital_b.id_lb
                                        WHERE usulan.id_lb='$id_lb'")->result();
		// die(print_r($dbusulan[0]));										
		foreach ($dbusulan as $data) {
			$provisi = $data->plafond_usulan * ($data->provisi / 100);
			$administrasi = $data->plafond_usulan * ($data->administrasi / 100);
			$biaya = $provisi + $administrasi + $data->asuransi + $data->materai + $data->apht + $data->skmht + $data->titipan + $data->fiduciare + $data->legalisasi + $data->roya + $data->lainnya;
			
			$pdf->SetFont('Times', 'B', 12);
			$pdf->Cell(79, 5.5, '7. USULAN KREDIT', 0, 1, '');
			$pdf->Cell(49, 5.5, '', 0, 1, '');
			$pdf->SetFont('Times', '', 12);
			$pdf->Cell(49, 5.5, 'Berdasarkan Hasil Analisa diatas dapat kami simpulkan :', 0, 1, '');
			$pdf->Cell(69, 5.5, '1. Character', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->character, 0, 1);
			$pdf->Cell(69, 5.5, '2.	Capacity', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->capacity, 0, 1);
			$pdf->Cell(69, 5.5, '3.	Capital', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->capital, 0, 1);
			$pdf->Cell(69, 5.5, '4.	Cash Flow', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 1, '');
			if($data->tujuan_permohonan == "Konsumtif"){
				$pdf->Cell(69, 5.5, 'Hutang Rp. ' . number_format($data->total_hutang) . ' atau ' . number_format($this->persenKonsumtif(), 2)  . ' % dari Total Aset Rp. ' . number_format($data->total_aset), 0, 1, '');
				$pdf->SetFont('Times', 'B', 12);
				$pdf->Cell(69, 5.5, $this->statusKonsumtif(), 1, 1, 'C');
				$pdf->SetFont('Times', '', 12);
			}else{
				$pdf->Cell(69, 5.5, 'Hutang Rp. ' . number_format($data->total_hutang) . ' atau ' . number_format($this->persen1(), 2)  . ' % dari Aset Produktif Rp. ' . number_format($data->total_al), 0, 1, '');
				$pdf->SetFont('Times', 'B', 12);
				$pdf->Cell(69, 5.5, $this->status1(), 1, 1, 'C');
				$pdf->SetFont('Times', '', 12);
			}
			$pdf->Cell(69, 5.5, '<= 50 % Layak', 0, 0, '');
			$pdf->Cell(5, 5.5, ' > 50 % Tidak Layak', 0, 0, '');
			$pdf->Cell(69, 5.5, '', 0, 1, '');
			$pdf->Cell(69, 5.5, 'Total Angsuran Pinjaman Rp. ' . number_format($this->angsuran()) . ' atau ' . number_format($this->persen2(), 2)  . ' % dari Laba Operasional/Pendapatan Rp. ' . number_format($this->labaRugi()), 0, 1, '');
			$pdf->SetFont('Times', 'B', 12);
			$pdf->Cell(69, 5.5, $this->status2(), 1, 1, 'C');
			$pdf->SetFont('Times', '', 12);
			$pdf->Cell(69, 5.5, '<= 60 % Layak', 0, 0, '');
			$pdf->Cell(5, 5.5, ' > 60 % Tidak Layak', 0, 0, '');
			$pdf->Cell(69, 5.5, '', 0, 1, '');
			$pdf->Cell(69, 5.5, '5. Condition Of Economy', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->coe, 0, 1);
			$pdf->Cell(69, 5.5, '6.	Collateral', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->collateral, 0, 1);
			$pdf->Cell(5, 5.5, '', 0, 1);
			$pdf->Cell(79, 5.5, 'Sehingga kami mengusulkan sebagai berikut :', 0, 1, '');
			$pdf->Cell(69, 5.5, 'Plafond', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->plafond_usulan), 0, 1);
			$pdf->Cell(69, 5.5, 'Jenis Angsuran', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->sifat_kredit, 0, 1);
			$pdf->Cell(69, 5.5, 'Jenis Kredit', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->jenis_permohonan, 0, 1);
			$pdf->Cell(69, 5.5, 'Tujuan kredit', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->tujuan_permohonan, 0, 1);
			$pdf->Cell(69, 5.5, 'Jangka Waktu', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->waktu . ' Bulan', 0, 1);
			$pdf->Cell(69, 5.5, 'Bunga', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->bunga, 0, 1);
			$pdf->Cell(69, 5.5, 'Tanggal Realisasi', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(5, 5.5, '', 0, 1, '');
			$pdf->Cell(69, 5.5, 'Notaris', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, $data->notaris, 0, 1);
			$pdf->Cell(5, 5.5, '', 0, 1, '');

			$pdf->Cell(55, 5.5, 'Provisi', 0, 0, '');
			$pdf->Cell(14, 5.5, $data->provisi . '%', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($provisi), 0, 1);
			$pdf->Cell(55, 5.5, 'Administrasi', 0, 0, '');
			$pdf->Cell(14, 5.5, $data->administrasi . '%', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($administrasi), 0, 1);
			$pdf->Cell(69, 5.5, 'Asuransi', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->asuransi), 0, 1);
			$pdf->Cell(69, 5.5, 'Materai', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->materai), 0, 1);
			$pdf->Cell(69, 5.5, 'APHT', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->apht), 0, 1);
			$pdf->Cell(69, 5.5, 'SKMHT', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->skmht), 0, 1);
			$pdf->Cell(69, 5.5, 'Peningkatan dari SKMHT ke APHT', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->titipan), 0, 1);
			$pdf->Cell(69, 5.5, 'Fiduciare Didaftarkan', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->fiduciare), 0, 1);
			$pdf->Cell(69, 5.5, 'Legalisasi / Perjanjian Kredit Notariil', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->legalisasi), 0, 1);
			$pdf->Cell(69, 5.5, 'Lainnya', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->lainnya), 0, 1);
			$pdf->Cell(69, 5.5, 'Roya', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($data->roya), 0, 1);
			$pdf->SetFont('Times', 'B', 12);
			$pdf->Cell(69, 5.5, 'Total Biaya', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 0, '');
			$pdf->Cell(0, 5.5, 'Rp. ' . number_format($biaya), 0, 1);

			$pdf->Cell(69, 5.5, 'Realisasi oleh', 0, 0, '');
			$pdf->Cell(5, 5.5, ':', 0, 1, '');
			$pdf->Cell(5, 5.5, '', 0, 1, '');
			$pdf->SetFont('Times', 'B', 12);
			$pdf->Cell(10, 5.5, 'No', 1, 0, 'C');
			$pdf->Cell(100, 5.5, 'Nama', 1, 0, 'C');
			$pdf->Cell(80, 5.5, 'Sebagai', 1, 1, 'C');
			$pdf->SetFont('Times', '', 12);

			$no = 0;
			$id_lb = $_GET['id_lb'];
			$rp = $this->db->get_where('realisasi', array('id_lb' => $id_lb))->result();
			foreach ($rp as $data) {
				$no++;
				$pdf->Cell(10, 5.5, $no, 1, 0, 'C');
				$pdf->Cell(100, 5.5, $data->oleh, 1, 0, 'L');
				$pdf->Cell(80, 5.5, $data->sebagai, 1, 1, 'L');
			}
			break;
        }
		
        //Jaminan
		$pdf->AddPage();
		$jaminan = $this->db->get_where('pengajuan', array('id_lb' => $id_lb))->result();
		foreach ($jaminan as $data) {
		$pdf->Image('./upload/file/jaminan/'.$data->file, 60, 30, 90, 0, 'PNG');
		$pdf->Output( 'I','all.pdf');
		}

    }

	//Cashflow

	function debit_cl()
	{
		//Pemasukan
		$id_lb = $_GET['id_lb'];
		$debit = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '4.1' && id_lb='$id_lb'");
		if (!empty($debit->result())) {

			foreach ($debit->result() as $row) {
				$array_debit[] = $row->saldo;
			}
			$sum_debit = array_sum($array_debit);
		} else
			$sum_debit = 0;
		return $sum_debit;
	}

	function kredit_cl()
	{
		//Pengeluaran
		$id_lb = $_GET['id_lb'];
		$kredit = $this->db->query("SELECT * FROM cashflow_lain WHERE id_lb='$id_lb' && MID(kode_perkiraan,1,3) = '5.1'");
		if (!empty($kredit->result())) {

			foreach ($kredit->result() as $row) {
				$array_kredit[] = $row->saldo;
			}
			$sum_kredit = array_sum($array_kredit);
		} else
			$sum_kredit = 0;
		return $sum_kredit;
	}

	function kredit2_cl()
	{
		//Pengeluaran
		$id_lb = $_GET['id_lb'];
		$kredit = $this->db->query("SELECT * FROM cashflow_lain WHERE id_lb='$id_lb' && MID(kode_perkiraan,1,3) ='5.2'");
		if (!empty($kredit->result())) {

			foreach ($kredit->result() as $row) {
				$array_kredit[] = $row->saldo;
			}
			$sum_kredit = array_sum($array_kredit);
		} else
			$sum_kredit = 0;
		return $sum_kredit;
	}

	function kredit3_cl()
	{
		//Pengeluaran
		$id_lb = $_GET['id_lb'];
		$kredit = $this->db->query("SELECT * FROM cashflow_lain WHERE id_lb='$id_lb' && MID(kode_perkiraan,1,3) = '5.3'");
		if (!empty($kredit->result())) {

			foreach ($kredit->result() as $row) {
				$array_kredit[] = $row->saldo;
			}
			$sum_kredit = array_sum($array_kredit);
		} else
			$sum_kredit = 0;
		return $sum_kredit;
	}

	function tot_kredit_cl()
	{
		$sum_kredit = $this->kredit_cl() + $this->kredit2_cl() + $this->kredit3_cl();
		return $sum_kredit;
	}

	function surplus_cl()
	{
		//Pengeluaran
		$surplus = $this->debit_cl() - $this->tot_kredit_cl();
		return $surplus;
	}

	function kreditLain_cl()
	{
		//Pemasukan
		$id_lb = $_GET['id_lb'];
		$kreditLain = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '5.4' && id_lb='$id_lb'");
		if (!empty($kreditLain->result())) {

			foreach ($kreditLain->result() as $row) {
				$array_kreditLain[] = $row->saldo;
			}
			$sum_kreditLain = array_sum($array_kreditLain);
		} else
			$sum_kreditLain = 0;
		return $sum_kreditLain;
	}

	function kreditAngsuran_cl()
	{
		//Pemasukan
		$id_lb = $_GET['id_lb'];
		$kreditAngsuran = $this->db->query("SELECT * FROM cashflow_lain WHERE MID(kode_perkiraan,1,3) = '5.5' && id_lb='$id_lb'");
		if (!empty($kreditAngsuran->result())) {

			foreach ($kreditAngsuran->result() as $row) {
				$array_kreditAngsuran[] = $row->saldo;
			}
			$sum_kreditAngsuran = array_sum($array_kreditAngsuran);
		} else
			$sum_kreditAngsuran = 0;
		return $sum_kreditAngsuran;
	}

	function rugiLaba_cl()
	{
		//Pemasukan
		$rugiLaba = $this->debit_cl() - ($this->tot_kredit_cl() + $this->kreditLain_cl() + $this->kreditAngsuran_cl());
		return $rugiLaba;
	}
    

    //******************************************************* */
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

   //********************************************************* */
function debit_cs()
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

function kredit_cs()
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

function kredit2_cs()
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

function kredit3_cs()
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

function tot_kredit_cs()
{
    $sum_kredit = $this->kredit() + $this->kredit2() + $this->kredit3();
    return $sum_kredit;
}

function surplus_cs()
{
    //Pengeluaran
    $surplus = $this->debit() - $this->tot_kredit();
    return $surplus;
}

function kreditLain_cs()
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

function kreditAngsuran_cs()
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

function rugiLaba_cs()
{
    //Pemasukan
    $rugiLaba = $this->debit() - ($this->tot_kredit() + $this->kreditLain() + $this->kreditAngsuran());
    return $rugiLaba;
}

//Capital
function kas_cs()
{
    //kas debit
    $id_lb = $_GET['id_lb'];
    $kas = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Kas' && jenis='hutang' && id_lb='$id_lb'");
    if (!empty($kas->result())) {
        foreach ($kas->result() as $row) {
            $array_kas[] = $row->saldo;
        }
        $sum_kas = array_sum($array_kas);
    } else {
        $sum_kas = 0;
    }
    return $sum_kas;
}

function tabungan_cs()
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

function deposito_cs()
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

function piutang_cs()
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

function peralatan_cs()
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

function barang1_cs()
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

function barang2_cs()
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

function barang3_cs()
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

function sewa_cs()
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

function lahan_cs()
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

function gedung_cs()
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

function operasional_cs()
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

function Lain_cs()
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

function tanah_cs()
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

function bangunan_cs()
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

function kendaraan_cs()
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

function inventaris_cs()
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

function lain2_cs()
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

function hutangPendek_cs()
{
    //hutangPendek debit
    $id_lb = $_GET['id_lb'];
    $hutangPendekd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Jangka Pendek' && kode_jenis='D' && id_lb='$id_lb'");
    $hutangPendekk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Jangka Pendek' && kode_jenis='K' && id_lb='$id_lb'");
    $p_hutangPendekd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Pelunasan Hutang Jangka Pendek' && kode_jenis='D' && id_lb='$id_lb'");
    $p_hutangPendekk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Pelunasan Hutang Jangka Pendek' && kode_jenis='K' && id_lb='$id_lb'");
    $ba_hutangPendekd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Biaya Angsuran Hutang Jangka Pendek' && kode_jenis='D' && id_lb='$id_lb'");
    $ba_hutangPendekk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Biaya Angsuran Hutang Jangka Pendek' && kode_jenis='K' && id_lb='$id_lb'");

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

    if (!empty($p_hutangPendekd->result())) {
        foreach ($p_hutangPendekd->result() as $row) {
            $array_p_hutangPendekd[] = $row->saldo;
        }
        $sum_p_hutangPendekd = array_sum($array_p_hutangPendekd);
    } else
        $sum_p_hutangPendekd = 0;

    if (!empty($p_hutangPendekk->result())) {
        //hutangPendek kredit
        foreach ($p_hutangPendekk->result() as $row) {
            $array_p_hutangPendekk[] = $row->saldo;
        }
        $sum_p_hutangPendekk = array_sum($array_p_hutangPendekk);
    } else
        $sum_p_hutangPendekk = 0;

    if (!empty($ba_hutangPendekd->result())) {
        foreach ($ba_hutangPendekd->result() as $row) {
            $array_ba_hutangPendekd[] = $row->saldo;
        }
        $sum_ba_hutangPendekd = array_sum($array_ba_hutangPendekd);
    } else
        $sum_ba_hutangPendekd = 0;

    if (!empty($ba_hutangPendekk->result())) {
        //hutangPendek kredit
        foreach ($ba_hutangPendekk->result() as $row) {
            $array_ba_hutangPendekk[] = $row->saldo;
        }
        $sum_ba_hutangPendekk = array_sum($array_ba_hutangPendekk);
    } else
        $sum_ba_hutangPendekk = 0;

    $tot_hutangPendek = ($sum_hutangPendekk - $sum_hutangPendekd) + ($sum_p_hutangPendekk - $sum_p_hutangPendekd) + ($sum_ba_hutangPendekk - $sum_ba_hutangPendekd);
    return $tot_hutangPendek;
}

function hutangPanjang_cs()
{
    //hutangPanjang debit
    $id_lb = $_GET['id_lb'];
    $hutangPanjangd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Jangka Panjang' && kode_jenis='D' && id_lb='$id_lb'");
    $hutangPanjangk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Jangka Panjang' && kode_jenis='K' && id_lb='$id_lb'");
    $p_hutangPanjangd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Pelunasan Hutang Jangka Panjang' && kode_jenis='D' && id_lb='$id_lb'");
    $p_hutangPanjangk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Pelunasan Hutang Jangka Panjang' && kode_jenis='K' && id_lb='$id_lb'");
    $ba_hutangPanjangd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Biaya Angsuran Hutang Jangka Panjang' && kode_jenis='D' && id_lb='$id_lb'");
    $ba_hutangPanjangk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Biaya Angsuran Hutang Jangka Panjang' && kode_jenis='K' && id_lb='$id_lb'");

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

    if (!empty($p_hutangPanjangd->result())) {
        foreach ($p_hutangPanjangd->result() as $row) {
            $array_p_hutangPanjangd[] = $row->saldo;
        }
        $sum_p_hutangPanjangd = array_sum($array_p_hutangPanjangd);
    } else
        $sum_p_hutangPanjangd = 0;

    if (!empty($p_hutangPanjangk->result())) {
        //hutangPanjang kredit
        foreach ($p_hutangPanjangk->result() as $row) {
            $array_p_hutangPanjangk[] = $row->saldo;
        }
        $sum_p_hutangPanjangk = array_sum($array_p_hutangPanjangk);
    } else
        $sum_p_hutangPanjangk = 0;

    if (!empty($ba_hutangPanjangd->result())) {
        foreach ($ba_hutangPanjangd->result() as $row) {
            $array_ba_hutangPanjangd[] = $row->saldo;
        }
        $sum_ba_hutangPanjangd = array_sum($array_ba_hutangPanjangd);
    } else
        $sum_ba_hutangPanjangd = 0;

    if (!empty($ba_hutangPanjangk->result())) {
        //hutangPanjang kredit
        foreach ($ba_hutangPanjangk->result() as $row) {
            $array_ba_hutangPanjangk[] = $row->saldo;
        }
        $sum_ba_hutangPanjangk = array_sum($array_ba_hutangPanjangk);
    } else
        $sum_ba_hutangPanjangk = 0;

    $tot_hutangPanjang = ($sum_hutangPanjangk - $sum_hutangPanjangd) + ($sum_p_hutangPanjangk - $sum_p_hutangPanjangd) + ($sum_ba_hutangPanjangk - $sum_ba_hutangPanjangd);
    return $tot_hutangPanjang;
}

function hutangLain_cs()
{
    //hutangLain debit
    $id_lb = $_GET['id_lb'];
    $hutangLaind = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Lain' && kode_jenis='D' && id_lb='$id_lb'");
    $hutangLaink = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Lain' && kode_jenis='K' && id_lb='$id_lb'");
    $p_hutangLaind = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Pelunasan Hutang Lain' && kode_jenis='D' && id_lb='$id_lb'");
    $p_hutangLaink = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Pelunasan Hutang Lain' && kode_jenis='K' && id_lb='$id_lb'");
    $ba_hutangLaind = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Biaya Angsuran Hutang Lain' && kode_jenis='D' && id_lb='$id_lb'");
    $ba_hutangLaink = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Biaya Angsuran Hutang Lain' && kode_jenis='K' && id_lb='$id_lb'");

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

    if (!empty($p_hutangLaind->result())) {
        foreach ($p_hutangLaind->result() as $row) {
            $array_p_hutangLaind[] = $row->saldo;
        }
        $sum_p_hutangLaind = array_sum($array_p_hutangLaind);
    } else
        $sum_p_hutangLaind = 0;

    if (!empty($p_hutangLaink->result())) {

        //hutangLain kredit
        foreach ($p_hutangLaink->result() as $row) {
            $array_p_hutangLaink[] = $row->saldo;
        }
        $sum_p_hutangLaink = array_sum($array_p_hutangLaink);
    } else
        $sum_p_hutangLaink = 0;

    if (!empty($ba_hutangLaink->result())) {

        //angsuran hutangLain kredit
        foreach ($ba_hutangLaink->result() as $row) {
            $array_ba_hutangLaink[] = $row->saldo;
        }
        $sum_ba_hutangLaink = array_sum($array_ba_hutangLaink);
    } else
        $sum_ba_hutangLaink = 0;

    if (!empty($ba_hutangLaind->result())) {

        //angsuran hutangLain kredit
        foreach ($ba_hutangLaind->result() as $row) {
            $array_ba_hutangLaind[] = $row->saldo;
        }
        $sum_ba_hutangLaind = array_sum($array_ba_hutangLaind);
    } else
        $sum_ba_hutangLaind = 0;

    $tot_hutangLain = ($sum_hutangLaink - $sum_hutangLaind) + ($sum_p_hutangLaink - $sum_p_hutangLaind) + ($sum_ba_hutangLaink - $sum_ba_hutangLaind);
    return $tot_hutangLain;
}

function hutangDagang_cs()
{
    //hutangDagang debit
    $id_lb = $_GET['id_lb'];
    $hutangDagangd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Dagang' && kode_jenis='D' && id_lb='$id_lb'");
    $hutangDagangk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Hutang Dagang' && kode_jenis='K' && id_lb='$id_lb'");
    $p_hutangDagangd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Pelunasan Hutang Dagang' && kode_jenis='D' && id_lb='$id_lb'");
    $p_hutangDagangk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Pelunasan Hutang Dagang' && kode_jenis='K' && id_lb='$id_lb'");
    $ba_hutangDagangd = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Biaya Angsuran Hutang Dagang' && kode_jenis='D' && id_lb='$id_lb'");
    $ba_hutangDagangk = $this->db->query("SELECT * FROM cashflow_a WHERE nama_perkiraan= 'Biaya Angsuran Hutang Dagang' && kode_jenis='K' && id_lb='$id_lb'");

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

    if (!empty($p_hutangDagangd->result())) {
        foreach ($p_hutangDagangd->result() as $row) {
            $array_p_hutangDagangd[] = $row->saldo;
        }
        $sum_p_hutangDagangd = array_sum($array_p_hutangDagangd);
    } else
        $sum_p_hutangDagangd = 0;

    if (!empty($p_hutangDagangk->result())) {
        //hutangDagang kredit
        foreach ($p_hutangDagangk->result() as $row) {
            $array_p_hutangDagangk[] = $row->saldo;
        }
        $sum_p_hutangDagangk = array_sum($array_p_hutangDagangk);
    } else
        $sum_p_hutangDagangk = 0;

    if (!empty($ba_hutangDagangd->result())) {
        foreach ($ba_hutangDagangd->result() as $row) {
            $array_ba_hutangDagangd[] = $row->saldo;
        }
        $sum_ba_hutangDagangd = array_sum($array_ba_hutangDagangd);
    } else
        $sum_ba_hutangDagangd = 0;

    if (!empty($ba_hutangDagangk->result())) {
        //hutangDagang kredit
        foreach ($ba_hutangDagangk->result() as $row) {
            $array_ba_hutangDagangk[] = $row->saldo;
        }
        $sum_ba_hutangDagangk = array_sum($array_ba_hutangDagangk);
    } else
        $sum_ba_hutangDagangk = 0;

    $tot_hutangDagang = ($sum_hutangDagangk - $sum_hutangDagangd) + ($sum_p_hutangDagangk - $sum_p_hutangDagangd) + ($sum_ba_hutangDagangk - $sum_ba_hutangDagangd);
    return $tot_hutangDagang;
}

function totalHutang_cs()
{

    $id_lb = $_GET['id_lb'];
    $lb = $this->db->query("SELECT * FROM capital_a WHERE id_lb='$id_lb'");
    foreach ($lb->result() as $data) {
        $totalHutang = ($data->hutang_jpk + $this->hutangPendek_cs()) + ($data->hutang_jpg + $this->hutangPanjang_cs()) + ($data->hutang_lain + $this->hutangLain_cs()) +
            ($data->hutang_dagang + $this->hutangDagang_cs());
    }
    return $totalHutang;
}

function aktivaLancar_cs()
{
    $id_lb = $_GET['id_lb'];
    $lb = $this->db->query("SELECT * FROM capital_a WHERE id_lb='$id_lb'");
    foreach ($lb->result() as $data) {

        $aktivaLancar = ($data->kas + $this->kas_cs()) + ($data->tabungan + $this->tabungan_cs()) + ($data->deposito + $this->deposito_cs()) +
            ($data->piutang + $this->piutang_cs()) + ($data->peralatan + $this->peralatan_cs()) + ($data->barang + $this->barang1_cs()) +
            ($data->barang2 + $this->barang2_cs()) + ($data->barang3 + $this->barang3_cs()) + ($data->sewa + $this->sewa_cs()) + ($data->lahan + $this->lahan_cs()) +
            ($data->gedung + $this->gedung_cs()) + ($data->operasional + $this->operasional_cs()) + ($data->lain + $this->Lain_cs());
    }
    return $aktivaLancar;
}

function aktivaTetap_cs()
{
    $id_lb = $_GET['id_lb'];
    $lb = $this->db->query("SELECT * FROM capital_a WHERE id_lb='$id_lb'");
    foreach ($lb->result() as $data) {

        $aktivaTetap = ($data->tanah + $this->tanah_cs()) + ($data->bangunan + $this->bangunan_cs()) + ($data->kendaraan + $this->kendaraan_cs()) +
            ($data->inventaris + $this->inventaris_cs()) + ($data->lain2 + $this->lain2_cs());
    }
    return $aktivaTetap;
}

function aset_cs()
{
    $aset = $this->aktivaLancar() + $this->aktivaTetap();
    return $aset;
}

function modal_cs()
{
    $modal = $this->aset() - ($this->rugiLaba() + $this->aktivaTetap() + $this->totalHutang());

    return $modal;
}

//***************************** */
	
function status1()
{
	if ($this->persen1() <= 50) {
		$status = 'Layak';
	} else {
		$status = 'Tidak Layak';
	}
	return $status;
}
	
function statusKonsumtif()
{
	if ($this->persenKonsumtif() <= 50) {
		$status = 'Layak';
	} else {
		$status = 'Tidak Layak';
	}
	return $status;
}

function persen1()
{
	$id_lb = $_GET['id_lb'];
	$lb = $this->db->query("SELECT * FROM cashflow_b 
									JOIN capital_b 
									ON cashflow_b.id_lb=capital_b.id_lb
									WHERE cashflow_b.id_lb='$id_lb'");
	foreach ($lb->result() as $data) {
		$persen = ($data->total_hutang / $data->total_al) * 100;
		return $persen;
	}
}

function persenKonsumtif()
{
	$id_lb = $_GET['id_lb'];
	$lb = $this->db->query("SELECT * FROM cashflow_b 
									JOIN capital_b 
									ON cashflow_b.id_lb=capital_b.id_lb
									WHERE cashflow_b.id_lb='$id_lb'");
	foreach ($lb->result() as $data) {
		$persen = ($data->total_hutang / $data->total_aset) * 100;
		return $persen;
	}
}

function angsuran()
{
	$id_lb = $_GET['id_lb'];
	$angsuran = $this->db->query("SELECT * FROM capital_cache WHERE id_lb='$id_lb'");
	foreach ($angsuran->result() as $data) {
		$angsuran = $data->total_angsuran;
	}
	return $angsuran;
}

function labaRugi()
{
	$id_lb = $_GET['id_lb'];
	$labaRugi = $this->db->query("SELECT * FROM capital_cache WHERE id_lb='$id_lb'");
	foreach ($labaRugi->result() as $data) {
		$labaRugi = $data->laba_rugi;
	}
	return $labaRugi;
}

function persen2()
{
	$persen = ($this->angsuran() / $this->labaRugi()) * 100;
	return $persen;
}

function status2()
{
	if ($this->persen2() <= 60) {
		$status = 'Layak';
	} else {
		$status = 'Tidak Layak';
	}
	return $status;
}


}
