<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_test');
    }

    public function index()
    {
        $data['id_lb'] = $_GET['id_lb'];
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['select'] = $this->m_test->data_select();
        $data['perkiraan'] = $this->m_test->data_perkiraan();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/test', $data);
        $this->load->view('templates/footer');
    }

    public function cari()
    {
        $kode_perkiraan = $_GET['kode_perkiraan'];
        $cari = $this->m_test->cari($kode_perkiraan)->result();
        echo json_encode($cari);
    }

    public function add()
    {
        $id_cf = $this->input->post('id_cf');
        $this->m_test->add_data($id_cf);
    }

    public function add2()
    {
        $id_cf = $this->input->post('id_cf');
        $this->m_test->add_data2($id_cf);
    }
}
