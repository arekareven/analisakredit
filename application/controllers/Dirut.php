<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dirut extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dirut');
        $this->load->helper('url', 'download');
        $this->load->library(array('session'));
    }

    public function index()
    {
        $data['title'] = 'DIRUT';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_dirut->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/dirut', $data);
        $this->load->view('templates/footer');
    }
			
	public function update_resume()
	{
		$id_resume = $this->input->post('id_resume');
		$id_pengajuan = $this->input->post('id_pengajuan');
		$dirut = $this->input->post('dirut');

		$this->m_dirut->update_resume($id_resume,$dirut);
	}
		
	function get_resume()
	{
		// $id_resume = $this->input->get('id');
		$id_resume = $this->input->post('id_resume');
		$data = $this->m_dirut->get_resume_by_kode($id_resume);
		echo json_encode($data);
	}

    //---

	public function zoom_meeting()
	{
        // $id_pengajuan = $this->input->post('id_pengajuan');
		// $this->m_dirut->createMeeting($id_pengajuan);
		$this->m_dirut->generateJWTKey();
	}
}
