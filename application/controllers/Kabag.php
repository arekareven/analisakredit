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

    //---

	public function update_pengajuan()
	{
		$id_pengajuan = $this->input->post('id_pengajuan');
		$status		= $this->input->post('status');
		$catatan     = $this->input->post('catatan');
		$this->m_kabag->update_pengajuan($id_pengajuan, $status,$catatan);
	}
}
