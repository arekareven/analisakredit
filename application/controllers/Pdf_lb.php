<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pdf_lb extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }
    function index()
    {
        error_reporting(0); // AGAR ERROR MASALAH VERSI PHP TIDAK MUNCUL
        $pdf = new FPDF('P', 'mm', 'Letter');
        $pdf->AddPage();
        $lb = $this->db->get('latar_belakang')->result();
        foreach ($lb as $data) {
            $pdf->SetFont('Times', 'B', 16);
            $pdf->Cell(0, 5.5, 'ANALISA KREDIT', 0, 1, 'C');
            $pdf->Cell(5, 5.5, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, 'LATAR BELAKANG CALON DEBITUR', 0, 1, '');
            $pdf->Cell(49, 5.5, 'CIF', 0, 0, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->cif_bank, 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(49, 5.5, 'Tgl Permohonan', 0, 0, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_permohonan, 0, 1);
            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(49, 5.5, 'Tgl Analisa', 0, 0, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(5, 5.5, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, 'I. DATA PERMOHONAN', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, 'Plafond Yang Dimohon', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(49, 5.5, 'Jangka Waktu', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(49, 5.5, 'Sifat Kredit', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(49, 5.5, 'Jenis Permohonan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(49, 5.5, 'Tujuan Penggunaan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(49, 5.5, 'Keterangan Penggunaan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(5, 5.5, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, 'II. DATA DIRI NASABAH', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, 'Nama Debitur', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->tgl_analisa, 0, 0);
            $pdf->Cell(35, 5.5, 'Tanggungan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);

            $pdf->Cell(49, 5.5, 'Status Perkawinan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->tgl_analisa, 0, 0);
            $pdf->Cell(35, 5.5, 'Pendidikan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);

            $pdf->Cell(49, 5.5, 'Tempat, Tgl Lahir', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->tgl_analisa, 0, 0);
            $pdf->Cell(35, 5.5, 'Jenis Kelamin', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);

            $pdf->Cell(49, 5.5, 'No. KTP', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->tgl_analisa, 0, 0);
            $pdf->Cell(35, 5.5, 'Masa Laku', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);

            $pdf->Cell(49, 5.5, 'No. Telp/HP', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->tgl_analisa, 0, 0);
            $pdf->Cell(35, 5.5, 'No. Telp. Kantor', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);

            $pdf->Cell(49, 5.5, 'Status Tempat Tinggal', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->tgl_analisa, 0, 0);
            $pdf->Cell(35, 5.5, 'Lama Tinggal', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);

            $pdf->Cell(49, 5.5, 'Pekerjaan', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(59, 5.5, $data->tgl_analisa, 0, 1);

            $pdf->Cell(49, 5.5, 'Alamat Sesuai KTP', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(49, 5.5, 'Alamat Domisili', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(5, 5.5, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, 'III. DATA SUAMI / ISTRI', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, 'Nama Istri/Suami', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(49, 5.5, 'Tempat, Tgl Lahir', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(49, 5.5, 'Alamat Sesuai KTP', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(49, 5.5, 'Alamat Domisili', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(49, 5.5, 'Profesi Istri/Suami', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(49, 5.5, 'No. Telp/HP', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(5, 5.5, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, 'IV. DATA EMERGENCY CONTACT (KELUARGA TIDAK SERUMAH)', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(49, 5.5, 'Nama Lengkap', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(49, 5.5, 'Hubungan Keluarga', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(49, 5.5, 'Alamat Rumah', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(49, 5.5, 'No. Telp/HP', 0, 0, '');
            $pdf->Cell(5, 5.5, ':', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->tgl_analisa, 0, 1);
            $pdf->Cell(5, 5.5, '', 0, 1);
        }


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
        $rp = $this->db->get('riwayat_pinjaman')->result();
        foreach ($rp->result() as $data[]) {
            $no++;
            $pdf->Cell(10, 5.5, $no, 1, 0, 'C');
            $pdf->Cell(37, 5.5, $data->plafond[], 1, 0, 'C');
            $pdf->Cell(37, 5.5, $data->status[], 1, 0, 'C');
            $pdf->Cell(37, 5.5, $data->saldo[], 1, 0, 'C');
            $pdf->Cell(37, 5.5, $data->sejarah[], 1, 0, 'C');
            $pdf->Cell(37, 5.5, $data->data[], 1, 0, 'C');
            $pdf->Output();
        }
    }
}
