<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dummy extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dummy');
    }

    public function index()
    {
        $data['title'] = 'DUMMY';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['select'] = $this->m_dummy->data_select();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dummy/dummy', $data);
        $this->load->view('templates/footer');
    }

    public function templateword()
    {
        require 'vendor/autoload.php';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/uji.docx");

        $no            = $_POST['no'];
        $keterangan    = $_POST['keterangan'];
        $pemasukan     = $_POST['pemasukan'];
        $pengeluaran   = $_POST['pengeluaran'];
        $saldo         = $_POST['saldo'];

        if ($saldo == "") {
            $saldo = 0;
        }

        $total = count($keterangan);

        for ($i = 0; $i < $total; $i++) {
            $data[] = array(

                'no'            => $no[$i],
                'keterangan'    => $keterangan[$i],
                'pemasukan'     => number_format($pemasukan[$i]),
                'pengeluaran'   => number_format($pengeluaran[$i]),
                'saldo'         => number_format($saldo[$i])
            );
        }
        $templateProcessor->cloneRowAndSetValues('no', $data);

        $pathToSave = "C:/xampp/htdocs/analisakredit/cache/uji.docx";
        $templateProcessor->saveAs($pathToSave);
        redirect('dummy');
    }
}
