<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Capital extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_capital');
        $this->load->helper('url');
        $this->load->library(array('session'));
    }

    public function index()
    {
        $data['id_lb'] = $_GET['id_lb'];
        $data['title'] = 'Capital Sebelum Kredit';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_capital->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/capital', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $id_capi = $this->input->post('id_capi');
        $this->m_capital->add_data($id_capi);
    }

    public function add2()
    {
        $id_capi = $this->input->post('id_capi');
        $this->m_capital->add_data2($id_capi);
    }

    public function index2()
    {
        $data['id_lb'] = $_GET['id_lb'];
        $data['title'] = 'Capital Setelah Kredit';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_capital->tampil_data2();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/capital2', $data);
        $this->load->view('templates/footer');
        /*
        $id_lb = $_GET['id_lb'];
        redirect('capital?id_lb=' . $id_lb);
        */
    }

    public function next()
    {
        $id_lb = $_GET['id_lb'];
        redirect('condition?id_lb=' . $id_lb);
    }

    public function templateword()
    {
        $next = $this->db->query("SELECT * FROM latar_belakang ORDER BY id_lb DESC LIMIT 1");
        foreach ($next->result() as $row) {
            require 'vendor/autoload.php';
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/minpro/cache/".$row->nama_debitur.date('d-m-y').".docx");
        }
        $id_capi = $_GET['id_capi'];
        $surat = $this->db->query("SELECT * FROM capital_b WHERE id_capi='$id_capi'");
        foreach ($surat->result() as $row) {

            $templateProcessor->setValues([
                'kas'    => number_format($row->kas),
                'tabungan'        => number_format($row->tabungan),
                'deposito'        => number_format($row->deposito),
                'piutang'  => number_format($row->piutang),
                'peralatan'  => number_format($row->peralatan),
                'barang'     => number_format($row->barang),
                'barang2'     => number_format($row->barang2),
                'barang3'     => number_format($row->barang3),
                'sewa'     => number_format($row->sewa),
                'lahan'   => number_format($row->lahan),
                'gedung'          => number_format($row->gedung),
                'operasional'      => number_format($row->operasional),
                'lain'          => number_format($row->lain),
                'total_al'      => number_format($row->total_al),
                'tanah'    => number_format($row->tanah),
                'bangunan'    => number_format($row->bangunan),
                'kendaraan'    => number_format($row->kendaraan),
                'inventaris'    => number_format($row->inventaris),
                'lain2'    => number_format($row->lain2),
                'total_at'    => number_format($row->total_at),
                'hutang_jpk'    => number_format($row->hutang_jpk),
                'hutang_jpg'    => number_format($row->hutang_jpg),
                'hutang_lain'    => number_format($row->hutang_lain),
                'hutang_dagang'    => number_format($row->hutang_dagang),
                'total_hutang'    => number_format($row->total_hutang),
                'laba_rugi'    => number_format($row->laba_rugi),
                'modal'    => number_format($row->modal),
                'harta'    => number_format($row->harta),
                'total_kjb'    => number_format($row->total_kjb),
                'total_aset'    => number_format($row->total_aset)
            ]);
            foreach ($next->result() as $row) {
                $pathToSave = "C:/xampp/htdocs/minpro/cache/".$row->nama_debitur.date('d-m-y').".docx";
                $templateProcessor->saveAs($pathToSave);
            }
            redirect('capital/index2?id_lb=' . $row->id_lb);
        }
    }

    public function templateword2()
    {
        $next = $this->db->query("SELECT * FROM latar_belakang ORDER BY id_lb DESC LIMIT 1");
        foreach ($next->result() as $row) {
            require 'vendor/autoload.php';
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/minpro/cache/".$row->nama_debitur.date('d-m-y').".docx");
        }
        $id_capi = $_GET['id_capi'];
        $surat = $this->db->query("SELECT * FROM capital_a WHERE id_capi='$id_capi'");
        foreach ($surat->result() as $row) {

            $templateProcessor->setValues([
                'kas_'    => number_format($row->kas),
                'tabungan_'        => number_format($row->tabungan),
                'deposito_'        => number_format($row->deposito),
                'piutang_'  => number_format($row->piutang),
                'peralatan_'  => number_format($row->peralatan),
                'barang_'     => number_format($row->barang),
                'barang2_'     => number_format($row->barang2),
                'barang3_'     => number_format($row->barang3),
                'sewa_'     => number_format($row->sewa),
                'lahan_'   => number_format($row->lahan),
                'gedung_'          => number_format($row->gedung),
                'operasional_'      => number_format($row->operasional),
                'lain_'          => number_format($row->lain),
                'total_al_'      => number_format($row->total_al),
                'tanah_'    => number_format($row->tanah),
                'bangunan_'    => number_format($row->bangunan),
                'kendaraan_'    => number_format($row->kendaraan),
                'inventaris_'    => number_format($row->inventaris),
                'lain2_'    => number_format($row->lain2),
                'total_at_'    => number_format($row->total_at),
                'hutang_jpk_'    => number_format($row->hutang_jpk),
                'hutang_jpg_'    => number_format($row->hutang_jpg),
                'hutang_lain_'    => number_format($row->hutang_lain),
                'hutang_dagang_'    => number_format($row->hutang_dagang),
                'total_hutang_'    => number_format($row->total_hutang),
                'laba_rugi_'    => number_format($row->laba_rugi),
                'modal_'    => number_format($row->modal),
                'harta_'    => number_format($row->harta),
                'total_kjb_'    => number_format($row->total_kjb),
                'total_aset_'    => number_format($row->total_aset)
            ]);
            foreach ($next->result() as $row) {
                $pathToSave = "C:/xampp/htdocs/minpro/cache/".$row->nama_debitur.date('d-m-y').".docx";
                $templateProcessor->saveAs($pathToSave);
            }
            redirect('capital/next?id_lb=' . $row->id_lb);
        }
    }
}
