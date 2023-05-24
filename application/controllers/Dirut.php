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
	public function kalender()
	{
		$data['title'] = 'Kalender';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();		
		
		$data['result'] = $this->db->get("pengajuan")->result();

		foreach ($data['result'] as $key => $value) {
			$data['data'][$key]['title'] = $value->name_debitur;
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
		//input tanggal dan link zoom ke database
		$id_pengajuan = $this->input->post('id_pengajuan');
		$zoom    = $this->input->post('jenis');
		$waktu    = $this->input->post('waktu');
		if($zoom == 0){
			$data = array(
				'link_zoom'    => "Offline",
				'waktu_zoom'		=> $waktu
			);
			
			$this->db->where('id_pengajuan', $id_pengajuan);
			$this->db->update('pengajuan', $data);
			// die(var_dump('berhasil hore hore'));
		}else {
			// die(var_dump('lalalala'));
			$this->m_dirut->createMeeting($id_pengajuan);

		}

		// $this->m_dirut->generateJWTKey();
	}
}
