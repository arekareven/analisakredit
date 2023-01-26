<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kacab extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kacab');
        $this->load->helper('url', 'download');
        $this->load->library(array('session'));
    }

    public function index()
    {
        $data['title'] = 'Analisa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_kacab->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/kacab', $data);
        $this->load->view('templates/footer');
    }

    //---

	public function zoom_meeting()
	{
        $id_pengajuan = $this->input->post('id_pengajuan');
		$this->m_kacab->createMeeting($id_pengajuan);
	}
}
