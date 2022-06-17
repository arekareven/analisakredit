<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Capacity extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_capacity');
        $this->load->helper('url');
        $this->load->library(array('session'));
    }

    public function index()
    {
        $data['id_lb'] = $_GET['id_lb'];
        $data['title'] = 'Capacity';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_capacity->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/capacity', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $id_cap = $this->input->post('id_cap');
        $query = $this->m_capacity->cek_id($id_cap)->num_rows();
        if (empty($query))
            $this->m_capacity->add_data($id_cap);
        else
            $this->m_capacity->edit_data($id_cap);
    }

    public function next()
    {
        $id_lb = $_GET['id_lb'];
        redirect('capital?id_lb=' . $id_lb);
    }

    public function templateword()
    {
        $id_lb = $_GET['id_lb'];
        require 'vendor/autoload.php';
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/analisakredit/capacity.docx");
        $surat = $this->db->query("SELECT * FROM capacity WHERE id_lb='$id_lb'");
        foreach ($surat->result() as $row) {
            if($row->tgl_mulai == '0000-00-00'){
                $tgl_mulai = '-';
            } else {
                $tgl_mulai = date('d-m-Y', strtotime($row->tgl_mulai));
            }
            
            if($row->tgl_nasabah == '0000-00-00'){
                $tgl_nasabah = '-';
            } else {
                $tgl_nasabah = date('d-m-Y', strtotime($row->tgl_nasabah));
            }
            
            if($row->tgl_akta == '0000-00-00'){
                $tgl_akta = '-';
            } else {
                $tgl_akta = date('d-m-Y', strtotime($row->tgl_akta));
            }
            
            if($row->tgl_npwp == '0000-00-00'){
                $tgl_npwp = '-';
            } else {
                $tgl_npwp = date('d-m-Y', strtotime($row->tgl_npwp));
            }

            $templateProcessor->setValues([
                'nama_usaha'    => $row->nama_usaha,
                'sektor'        => $row->sektor,
                'bidang'        => $row->bidang,
                'status_usaha'  => $row->status_usaha,
                'alamat_usaha'  => $row->alamat_usaha,
                'tlp_usaha'     => $row->tlp_usaha,
                'tgl_mulai'     => $tgl_mulai,
                'tgl_nasabah'   => $tgl_nasabah,
                'akta'          => $row->akta,
                'tgl_akta'      => $tgl_akta,
                'npwp'          => $row->npwp,
                'tgl_npwp'      => $tgl_npwp,
                'usaha_skrg'    => $row->usaha_skrg,
                'alokasi1'    => $row->alokasi1,
                'alokasi2'    => $row->alokasi2,
                'alokasi3'    => $row->alokasi3,
                'dana1'    => number_format($row->dana1),
                'dana2'    => number_format($row->dana2),
                'dana3'    => number_format($row->dana3),
                'total'    => number_format($row->total),
                'usaha_realisasi'    => $row->usaha_realisasi,
            ]);
            $next = $this->db->query("SELECT * FROM latar_belakang WHERE id_lb='$id_lb'");
            foreach ($next->result() as $row) {
                $pathToSave = "C:/xampp/htdocs/analisakredit/cache/" . $row->nama_debitur . date('d-m-y') . ".docx";
                $templateProcessor->saveAs($pathToSave);
                force_download('C:/xampp/htdocs/analisakredit/cache/' . $row->nama_debitur . date('d-m-y') . '.docx', NULL);
                @unlink('C:/xampp/htdocs/analisakredit/cache/' . $row->nama_debitur . date('d-m-y') . '.docx');
            }
            /*redirect('capacity/next?id_lb=' . $row->id_lb);*/
        }
        redirect('test?id_lb=' . $row->id_lb);
    }
}
