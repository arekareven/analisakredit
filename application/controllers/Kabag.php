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
        $data['title'] = 'KABAG';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['query'] = $this->m_kabag->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kredit/kabag', $data);
        $this->load->view('templates/footer');
    }
		
	public function update_resume()
	{
		$id_resume = $this->input->post('id_resume');
		$id_pengajuan = $this->input->post('id_pengajuan');
		$kabag = $this->input->post('kabag');

		$this->m_kabag->update_resume($id_resume,$kabag);
	}
		
	function get_resume()
	{
		// $id_resume = $this->input->get('id');
		$id_resume = $this->input->post('id_resume');
		$data = $this->m_kabag->get_resume_by_kode($id_resume);
		echo json_encode($data);
	}

}
