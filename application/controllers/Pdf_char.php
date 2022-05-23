<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pdf_char extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf'); // MEMANGGIL LIBRARY YANG KITA BUAT TADI
    }

    function index()
    {
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->SetAutoPageBreak(false);
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times', 'B', 16);
        // mencetak string 
        $id_char = $_GET['id_char'];
        $lb = $this->db->query("SELECT * FROM latar_belakang WHERE id_char='$id_char'");
        foreach ($lb->result() as $data) {
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(0, 5.5, 'Atas permohonan yang diajukan tersebut, setelah kami lakukan analisa melalui Aspek 6C, hasilnya adalah sebagai berukut :', 0, 1, 'C');
            $pdf->Cell(5, 5.5, '', 0, 1);

            $pdf->SetFont('Times', 'B', 12);
            $pdf->Cell(79, 5.5, 'I. CHARACTER', 0, 1, '');
            $pdf->Cell(79, 5.5, 'Informasi Pribadi', 0, 1, '');
            $pdf->SetFont('Times', '', 12);
            $pdf->Cell(0, 5.5, $data->info_pribadi, 0, 1);
            $pdf->Cell(49, 5.5, 'JInformasi Perilaku', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->info_perilaku, 0, 1);
            $pdf->Cell(49, 5.5, 'Informasi Keluarga', 0, 0, '');
            $pdf->Cell(0, 5.5, $data->info_keluarga, 0, 1);
            $pdf->Cell(49, 5.5, 'Informasi Karakter', 0, 0, '');

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


            $pdf->Output();
        }
    }
}
