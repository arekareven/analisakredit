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
        $this->load->view('kredit/dummy', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['id_lb'] = $_GET['id_lb'];
        $id_lb = $_GET['id_lb'];
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['select'] = $this->m_test->data_select();
        $data['perkiraan'] = $this->m_test->data_perkiraan();
        $data['rw'] = $this->m_test->edit_rw($id_lb);
        $data['capacity'] = $this->m_test->edit_capa($id_lb);
        $data['capital'] = $this->m_test->edit_capi($id_lb);
        $data['cashflow'] = $this->m_test->edit_cash($id_lb);
        $data['collateralt'] = $this->m_test->edit_collt($id_lb);
        $data['collateralk'] = $this->m_test->edit_collk($id_lb);
        $data['usulan'] = $this->m_test->edit_usulan($id_lb);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/edit', $data);
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
