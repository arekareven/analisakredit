<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Condition extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_condition');
        $this->load->helper('url');
        $this->load->library(array('session'));
    }

    public function index()
    {
        $data['id_lb'] = $_GET['id_lb'];
        $data['title'] = 'Condition';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_condition->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/condition', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $id_con = $this->input->post('id_con');
        $this->m_condition->add_data($id_con);
    }

    public function next()
    {
        $id_lb = $_GET['id_lb'];
        redirect('collateral?id_lb=' . $id_lb);
    }

    public function templateword()
    {
        $next = $this->db->query("SELECT * FROM latar_belakang ORDER BY id_lb DESC LIMIT 1");
        foreach ($next->result() as $row) {
            require 'vendor/autoload.php';
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor("C:/xampp/htdocs/minpro/cache/".$row->nama_debitur.date('d-m-y').".docx");
        }
        $id_con = $_GET['id_con'];
        $surat = $this->db->query("SELECT * FROM `condition` WHERE id_con='$id_con'");
        foreach ($surat->result() as $row) {

            $templateProcessor->setValues([
                'kekuatan'    => $row->kekuatan,
                'kelemahan'        => $row->kelemahan,
                'peluang'        => $row->peluang,
                'ancaman'  => $row->ancaman
            ]);
            foreach ($next->result() as $row) {
                $pathToSave = "C:/xampp/htdocs/minpro/cache/".$row->nama_debitur.date('d-m-y').".docx";
                $templateProcessor->saveAs($pathToSave);
            }
            redirect('condition/next?id_lb=' . $row->id_lb);
        }
    }
}
