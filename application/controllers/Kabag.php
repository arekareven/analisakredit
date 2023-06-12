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

	public function kalender()
	{
		$data['title'] = 'Kalender';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$name = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $a = $name['kantor'];
		// die(var_dump($a));
		
		
		$data['result'] = $this->db->query("SELECT * FROM pengajuan WHERE kantor='$a'")->result();	
		// die(var_dump($data['result']));
		
		// $data['result'] = $this->db->get("pengajuan")->result();	

		foreach ($data['result'] as $key => $value) {
			$data['data'][$key]['title'] = "Komite ".$value->name_debitur;
			$data['data'][$key]['start'] = $value->waktu_zoom;
			$data['data'][$key]['url'] = $value->link_zoom;
			$data['data'][$key]['backgroundColor'] = "#00a65a";
		}
		

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('kredit/calendar', $data);
		$this->load->view('templates/footer');
	}
		
	public function update_resume()
	{
		$id_lb = $this->input->post('id_lb');
		$kabag = $this->input->post('kabag');

		$this->m_kabag->update_resume($id_lb,$kabag);
	}
		
	function get_resume()
	{
		$id_lb = $this->input->get('id');
		// $id_resume = $this->input->post('id_resume');
		$data = $this->m_kabag->get_resume_by_kode($id_lb);
		echo json_encode($data);
	}

}
