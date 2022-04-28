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
        $data['query'] = $this->m_dummy->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dummy/dummy', $data);
        $this->load->view('templates/footer');
    }

    public function bismillah()
    {
        $data['title'] = 'DUMMY';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('dummy/bismillah', $data);
    }

    public function add()
    {
        $this->m_dummy->add_data();
    }

    public function dummy()
    {
        $saldo = $_GET['saldo'];
        $surat = $this->db->query("SELECT * FROM dummy WHERE saldo='$saldo'");


        foreach ($surat->result() as $row) {
            $total[] = $row->pemasukan;
        }
        $sum = array_sum($total);
        var_dump($sum);
        die;
    }


    public function templateword()
    {
        /*
        $saldo ini adalah data dummy dari $id_lb
        */
        $saldo = $_GET['saldo'];
        require 'vendor/autoload.php';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/uji.docx");

        $surat = $this->db->query("SELECT * FROM dummy WHERE saldo='$saldo'");

        foreach ($surat->result() as $row) {
            $total[] = $row->pemasukan;
        }
        $sum = array_sum($total);

        foreach ($surat->result() as $row) {

            $replacements = array();
            foreach ($surat->result() as $row) {

                $replacements[] = array(
                    'keterangan'    => $row->keterangan,
                    'pemasukan'        => number_format($row->pemasukan),
                    'pengeluaran'        => number_format($row->pengeluaran),
                    'total'  => number_format($sum)
                );
            }
            $templateProcessor->cloneRowAndSetValues('keterangan', $replacements);

            $pathToSave = "C:/xampp/htdocs/analisakredit/cache/uji.docx";
            $templateProcessor->saveAs($pathToSave);
            redirect('dummy');
        }
    }

    public function templateword2()
    {
        $saldo = $_GET['saldo'];
        require 'vendor/autoload.php';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/uji.docx");

        $surat = $this->db->query("SELECT * FROM dummy WHERE saldo='$saldo'");

        /*
        foreach ($surat->result() as $row) {
            $total[] = $row->pemasukan;
        }
        $sum = array_sum($total);
        */

        $replacements = array();
        $no = 1;
        foreach ($surat->result() as $row) {
            $total[] = $row->pemasukan;
            $sum = array_sum($total);

            $replacements[] = array(
                'no'    => $no,
                'keterangan'    => $row->keterangan,
                'pemasukan'        => number_format($row->pemasukan),
                'pengeluaran'        => number_format($row->pengeluaran),
                'total'  => number_format($sum)
            );
            $no++;
        }
        $templateProcessor->cloneBlock('test', count($replacements), true, false, $replacements);

        $pathToSave = "C:/xampp/htdocs/analisakredit/cache/uji.docx";
        $templateProcessor->saveAs($pathToSave);

        redirect('dummy');
    }
}
