<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cashflow extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_cashflow');
        $this->load->helper('url');
        $this->load->library(array('session'));
    }

    /*
    public function index()
    {
        $data['title'] = 'Latar Belakang';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_cashflow->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/lb', $data);
        $this->load->view('templates/footer');
    }
    */

    public function add()
    {
        $id_cf = $this->input->post('id_cf');

        $this->m_cashflow->add_data($id_cf);
    }

    public function edit()
    {
        $id_lb = $this->input->post('id_lbcp');
        $kode = $this->input->post('kodecp');

        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_a');

        $this->m_cashflow->edit_data($kode);
    }
    
    public function hapusCashflowsPendapatan()
	{
		$idt = $this->input->post('idHapusCashflowsPendapatan');        
		$id_lb = $this->input->post('id_lb');
		$this->m_cashflow->hapusCashflowsPendapatan($idt, $id_lb);
	}

    public function add2()
    {
        $id_cf = $this->input->post('id_cf');
        $this->m_cashflow->add_data2($id_cf);
    }
    
    public function editp()
    {
        $id_lb = $this->input->post('id_lbcpe');
        $kode = $this->input->post('kodecpe');

        $this->db->where(array('id_lb' => $id_lb));
        $this->db->where(array('kode' => $kode));
        $this->db->delete('cashflow_a');

        $this->m_cashflow->edit_datap($kode);
    }
        
    public function hapusCashflowsPengeluaran()
	{
		$idt = $this->input->post('idHapusCashflowsPengeluaran');        
		$id_lb = $this->input->post('id_lb');
		$this->m_cashflow->hapusCashflowsPengeluaran($idt, $id_lb);
	}

    public function add_hutang()
    {
        $id_cf = $this->input->post('id_cf');
        $this->m_cashflow->add_data_hutang($id_cf);
    }

    public function templateword()
    {
        $id_lb = $_GET['id_lb'];
        $next = $this->db->query("SELECT * FROM latar_belakang WHERE id_lb='$id_lb'");
        foreach ($next->result() as $row) {
            require 'vendor/autoload.php';
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx");
        }

        $surat = $this->db->query("SELECT * FROM cashflow_b WHERE id_lb='$id_lb'");
        foreach ($surat->result() as $row) {

            $replacements = array();
            foreach ($surat->result() as $row) {

                $replacements[] = array(
                    'no_cf'    => $row->no,
                    'ket_cf'    => $row->keterangan,
                    'pemasukan'        => number_format($row->pemasukan),
                    'pengeluaran'        => number_format($row->pengeluaran),
                    'saldo_cf'  => number_format($row->saldo)
                );
            }
            $templateProcessor->cloneRowAndSetValues('no_cf', $replacements);

            foreach ($next->result() as $row) {
                $pathToSave = "C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx";
                $templateProcessor->saveAs($pathToSave);
            }
            redirect('test?id_lb=' . $id_lb);
        }
    }

    public function templateword2()
    {
        $id_lb = $_GET['id_lb'];
        $next = $this->db->query("SELECT * FROM latar_belakang WHERE id_lb='$id_lb'");
        foreach ($next->result() as $row) {
            require 'vendor/autoload.php';
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx");
        }

        $surat = $this->db->query("SELECT * FROM cashflow_a WHERE id_lb='$id_lb'");
        foreach ($surat->result() as $row) {

            $replacements = array();
            foreach ($surat->result() as $row) {

                $replacements[] = array(
                    'no_cf_'    => $row->no,
                    'ket_cf_'    => $row->keterangan,
                    'pemasukan_'        => number_format($row->pemasukan),
                    'pengeluaran_'        => number_format($row->pengeluaran),
                    'saldo_cf_'  => number_format($row->saldo)
                );
            }
            $templateProcessor->cloneRowAndSetValues('no_cf_', $replacements);

            foreach ($next->result() as $row) {
                $pathToSave = "C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx";
                $templateProcessor->saveAs($pathToSave);
            }
            redirect('test?id_lb=' . $id_lb);
        }
    }
}
