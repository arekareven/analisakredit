<?php

class M_user extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
	}
	
	
	public function tampil_data()
	{		
		$name = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $a = $name['name'];
		// die(var_dump($a));

		$data['result'] = $this->db->get("pengajuan")->result();		

		foreach ($data['result'] as $key => $value) {
			$data['data'][$key]['title'] = "Komite ".$value->name_debitur;
			$data['data'][$key]['start'] = $value->waktu_zoom;
			$data['data'][$key]['backgroundColor'] = "#00a65a";
		}

		return $data;
	}

}
