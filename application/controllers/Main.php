<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_main');
    }

    public function cari()
    {
        $kode_perkiraan = $_GET['kode_perkiraan'];
        $cari = $this->m_main->cari($kode_perkiraan)->result();
        echo json_encode($cari);
    }

    public function index()
    {
        $id_lb = $_GET['id_lb'];
        $data['id_lb'] = $_GET['id_lb'];
        $data['title'] = 'Halaman Input Data';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        // $data['select'] = $this->m_main->data_select();
		
		$kantor = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
		// var_dump($kantor['kantor']);
		// die;
        $data['analis'] = $this->m_main->data_analis($kantor['kantor']);
        $data['pengajuan'] = $this->m_main->data_pengajuan($id_lb);
        $data['perkiraan'] = $this->m_main->data_perkiraan();
        // $data['cashflow'] = $this->m_main->edit_cash($id_lb);
        // $data['cashflowp'] = $this->m_main->edit_cashp($id_lb);

        $data['kode'] = $this->m_main->get_kode($id_lb);
        $data['kode2'] = $this->m_main->get_kode2($id_lb);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/main', $data);
        $this->load->view('templates/footer');
    }
}
