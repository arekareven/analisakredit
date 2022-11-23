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
        // setting margin 
        $pdf->SetMargins(15, 20, 20);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times', 'B', 16);
        // mencetak string 
        $id_lb = $_GET['id_lb'];
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


            $pdf->Output('Character','I');
        }
    }
}
