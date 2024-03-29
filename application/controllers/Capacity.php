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
    
    //CRUD dengan jquery Ajax
    function data_capa()
    {
        $id_lb = $this->input->post('id_lb');
        $data = $this->m_capacity->capa_list($id_lb);
        echo json_encode($data);
    }

    function get_capa()
    {
        $id_cap = $this->input->get('id');
        $data = $this->m_capacity->get_capa_by_kode($id_cap);
        echo json_encode($data);
    }

    public function update_capa()
    {
        $id_cap = $this->input->post('id_cap');
        $nama_usaha            = $this->input->post('nama_usaha');
        $sektor        = $this->input->post('sektor');
        $bidang     = $this->input->post('bidang');
        $alamat_usaha              = $this->input->post('alamat_usaha');
        $status_usaha          = $this->input->post('status_usaha');
        $tlp_usaha          = $this->input->post('tlp_usaha');
        $tgl_mulai          = $this->input->post('tgl_mulai');
        $tgl_nasabah          = $this->input->post('tgl_nasabah');
        $akta          = $this->input->post('akta');
        $tgl_akta          = $this->input->post('tgl_akta');
        $npwp          = $this->input->post('npwp');
        $tgl_npwp          = $this->input->post('tgl_npwp');
        $usaha_skrg     = $this->input->post('usaha_skrg');
        $alokasi1     = $this->input->post('alokasi1');
        $alokasi2     = $this->input->post('alokasi2');
        $alokasi3     = $this->input->post('alokasi3');
        $dana1     = $this->input->post('dana1');
        $dana2     = $this->input->post('dana2');
        $dana3     = $this->input->post('dana3');
        $total = $dana1 + $dana2 + $dana3;
        $usaha_realisasi     = $this->input->post('usaha_realisasi');
        $data = $this->m_capacity->update_capa($id_cap, $nama_usaha, $sektor, $bidang, $alamat_usaha, $status_usaha, $tlp_usaha, $tgl_mulai, $tgl_nasabah, $akta, $tgl_akta, $npwp, $tgl_npwp, $usaha_skrg, $alokasi1, $alokasi2, $alokasi3, $dana1, $dana2, $dana3, $total, $usaha_realisasi);
        echo json_encode($data);
    }

    function delete_capa()
    {
        $id_cap = $this->input->post('kode');
        $data = $this->m_capacity->delete_capa($id_cap);
        echo json_encode($data);
    }
    //End CRUD Jquery Ajax

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
                // 'dana1'    => number_format($row->dana1),
                // 'dana2'    => number_format($row->dana2),
                // 'dana3'    => number_format($row->dana3),
                // 'total'    => number_format($row->total),
                'dana1'    => $row->dana1,
                'dana2'    => $row->dana2,
                'dana3'    => $row->dana3,
                'total'    => $row->total,
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
        redirect('main?id_lb=' . $row->id_lb);
    }

}
