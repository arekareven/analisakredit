<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pdf_coe extends CI_Controller
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
        $pdf->SetMargins(20, 20, 20);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times', 'B', 16);
        // mencetak string 
        $id_lb = $_GET['id_lb'];
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

            $pdf->Output();
        }
    }
}
