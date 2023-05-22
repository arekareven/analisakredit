<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calendar extends CI_Controller
{

	public function __construct() {
		parent::__construct();
		$this->load->database();
	 }
	 
	public function index()
	{
		$data['result'] = $this->db->get("pengajuan")->result();

		foreach ($data['result'] as $key => $value) {
			$data['data'][$key]['title'] = "Komite ".$value->name_debitur;
			$data['data'][$key]['start'] = $value->waktu_zoom;
			$data['data'][$key]['backgroundColor'] = "#00a65a";
		}
		
		$this->load->view('kredit/calendar', $data);
	}
}
