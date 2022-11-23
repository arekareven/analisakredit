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

    //---

	public function add_pengajuan()
	{
		$id_pengajuan = $this->input->post('id_pengajuan');

		$this->m_analisa->add_data_pengajuan($id_pengajuan);
	}

    function data_pengajuan(){
        $id_lb=$this->input->post('id_lb');
		$data=$this->m_analisa->pengajuan_list($id_lb);
		echo json_encode($data);
	}

	public function update_pengajuan()
	{
		$id_pengajuan = $this->input->post('id_pengajuan');
		$name_debitur = $this->input->post('name_debitur');
		$plafond = $this->input->post('plafon');
		$status		= $this->input->post('status');
		$catatan     = $this->input->post('catatan');
		$this->m_analisa->update_pengajuan($id_pengajuan,$name_debitur,$plafond, $status,$catatan);
	}
	
}
