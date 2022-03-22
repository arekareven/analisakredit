<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Html2pdf extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('m_pdf');
    }

    public function index()
    {
        $data['siswa'] = $this->m_pdf->view_row();
        $this->load->view('preview', $data);
    }

    public function cetak()
    {
        ob_start();
        $data['siswa'] = $this->m_pdf->view_row();
        $this->load->view('print', $data);
        $html = ob_get_contents();
        ob_end_clean();

        require './assets/html2pdf/autoload.php';

        $pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data .pdf', 'D');
    }
}
