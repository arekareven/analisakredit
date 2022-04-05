<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analisa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_analisa');
        $this->load->helper('url', 'download');
        $this->load->library(array('session'));
    }

    public function index()
    {
        $data['title'] = 'Analisa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_analisa->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/analisa', $data);
        $this->load->view('templates/footer');
    }


    public function edit()
    {
        $id_analisis = $this->input->post('id_analisis');
        $this->m_analisa->edit_data($id_analisis);
    }

    public function lakukan_download()
    {
        $file = $_GET['file'];
        force_download('cache/' . $file, NULL);
    }

    public function next()
    {
        $id_lb = $_GET['id_lb'];
        redirect('analisa?id_lb=' . $id_lb);
    }
}
