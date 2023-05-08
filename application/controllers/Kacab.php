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
        $data['title'] = 'KACAB';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_kacab->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/kacab', $data);
        $this->load->view('templates/footer');
    }
			
	public function update_resume()
	{
		$id_resume = $this->input->post('id_resume');
		$id_pengajuan = $this->input->post('id_pengajuan');
		$kacab = $this->input->post('kacab');

		$this->m_kacab->update_resume($id_resume,$kacab);
	}
		
	function get_resume()
	{
		// $id_resume = $this->input->get('id');
		$id_resume = $this->input->post('id_resume');
		$data = $this->m_kacab->get_resume_by_kode($id_resume);
		echo json_encode($data);
	}

    //---

	public function zoom_meeting()
	{
        $id_pengajuan = $this->input->post('id_pengajuan');
		$this->m_kacab->createMeeting($id_pengajuan);
	}
}
