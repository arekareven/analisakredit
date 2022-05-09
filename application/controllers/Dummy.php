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
        $data['query2'] = $this->m_dummy->tampil_data2();

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

    public function add2()
    {
        $this->m_dummy->add_data2();
    }

    public function add3()
    {
        $this->m_dummy->add_data3();
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
        $i = 1;
        foreach ($surat->result() as $row) {
            $total[] = $row->pemasukan;
            $sum = array_sum($total);

            $replacements[] = array(
                'no'    => $i,
                'keterangan'    => $row->keterangan,
                'pemasukan'        => number_format($row->pemasukan),
                'pengeluaran'        => number_format($row->pengeluaran),
                'total'  => number_format($sum)
            );
            $i++;
        }
        $templateProcessor->cloneBlock('test', count($replacements), true, false, $replacements);

        $pathToSave = "C:/xampp/htdocs/analisakredit/cache/uji.docx";
        $templateProcessor->saveAs($pathToSave);

        redirect('dummy');
    }

    public function templateword3()
    {
        $id_lb = $_GET['id_lb'];
        require 'vendor/autoload.php';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/uji.docx");

        $surat = $this->db->query("SELECT * FROM bismillah WHERE id_lb='$id_lb' AND no1='I' OR no1='II' OR no1='III' OR no1='IV'");

        $replacements = array();
        $i = 1;
        foreach ($surat->result() as $row) {

            $replacements[] = array(
                'no1'        => $row->no1,
                'no2'    => $row->no2,
                'no3'            => $row->no3,
                'no4'        => $row->no4,
                'no5'        => $row->no5,
                'keterangan1'        => $row->keterangan1,
                'keterangan2'        => $row->keterangan2,
                'keterangan3'        => $row->keterangan3,
                'keterangan4'        => $row->keterangan4,
                'keterangan5'        => $row->keterangan5,
                'keterangan6'        => $row->keterangan6,
                'pemasukan2'        => number_format($row->pemasukan2),
                'pemasukan3'        => number_format($row->pemasukan3),
                'pemasukan4'        => number_format($row->pemasukan4),
                'pemasukan5'        => number_format($row->pemasukan5),
                'pengeluaran2'        => number_format($row->pengeluaran2),
                'pengeluaran3'        => number_format($row->pengeluaran3),
                'pengeluaran4'        => number_format($row->pengeluaran4),
                'pengeluaran5'        => number_format($row->pengeluaran5),
                'saldo6'        => number_format($row->saldo6),
            );

            $templateProcessor->setValues([
                'kekuatan'    => $row->kekuatan,
                'kelemahan'        => $row->kelemahan,
                'peluang'        => $row->peluang,
                'ancaman'  => $row->ancaman
            ]);

            $i++;
        }
        $templateProcessor->cloneBlock('bismillah', count($replacements), true, false, $replacements);

        $pathToSave = "C:/xampp/htdocs/analisakredit/cache/uji.docx";
        $templateProcessor->saveAs($pathToSave);

        redirect('dummy');
    }


    public function templateword4()
    {
        $id_lb = $_GET['id_lb'];
        require 'vendor/autoload.php';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/cache/uji.docx");

        $surat = $this->db->query("SELECT * FROM bismillah WHERE id_lb='$id_lb' AND no1='V' OR no1='VI' OR no1='VII' OR no1='VIII'");

        $replacements = array();
        $i = 1;
        foreach ($surat->result() as $row) {

            $replacements[] = array(
                'no1'        => $row->no1,
                'no2'    => $row->no2,
                'no3'            => $row->no3,
                'no4'        => $row->no4,
                'no5'        => $row->no5,
                'keterangan1'        => $row->keterangan1,
                'keterangan2'        => $row->keterangan2,
                'keterangan3'        => $row->keterangan3,
                'keterangan4'        => $row->keterangan4,
                'keterangan5'        => $row->keterangan5,
                'keterangan6'        => $row->keterangan6,
                'pemasukan2'        => number_format($row->pemasukan2),
                'pemasukan3'        => number_format($row->pemasukan3),
                'pemasukan4'        => number_format($row->pemasukan4),
                'pemasukan5'        => number_format($row->pemasukan5),
                'pengeluaran2'        => number_format($row->pengeluaran2),
                'pengeluaran3'        => number_format($row->pengeluaran3),
                'pengeluaran4'        => number_format($row->pengeluaran4),
                'pengeluaran5'        => number_format($row->pengeluaran5),
                'saldo6'        => number_format($row->saldo6),
            );
            $i++;
        }
        $templateProcessor->cloneBlock('bismillah2', count($replacements), true, false, $replacements);

        $pathToSave = "C:/xampp/htdocs/analisakredit/cache/uji.docx";
        $templateProcessor->saveAs($pathToSave);

        redirect('dummy');
    }
}
