<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kabag extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kabag');
        $this->load->helper('url', 'download');
        $this->load->library(array('session'));
    }

    public function index()
    {
        $data['title'] = 'Analisa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_kabag->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/kabag', $data);
        $this->load->view('templates/footer');
    }


    public function edit()
    {
        $id_analisis = $this->input->post('id_analisis');
        $this->m_kabag->edit_data($id_analisis);
    }

    public function lakukan_download()
    {
        $file = $_GET['file'];
        force_download($file, NULL);
    }
}
