<?php

class M_agunan extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
	}
	
	
	public function tampil_data()
	{
		$db2 = $this->load->database('database_kedua', TRUE);
		return $db2->get('agunan');
	}

}
