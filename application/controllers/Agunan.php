<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Agunan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_agunan');
		$this->load->helper('url');
		$this->load->library(array('session'));
	}

	public function index()
	{
		$data['title'] = 'Daftar Agunan';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$user = $this->session->userdata('email');
		$data['query'] = $this->m_agunan->tampil_data($user);

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('mineka/agunan', $data);
		$this->load->view('templates/footer');
	}

}
