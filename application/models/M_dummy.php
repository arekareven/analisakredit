<?php

class M_dummy extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }

    public function tampil_data()
	{
		return $this->db->query("SELECT * FROM dummy");
	}

    public function add_data()
	{
		$id_cf			= $this->input->post('id_cf');
		$dari		= $this->input->post('dari');
		$untuk     = $this->input->post('untuk');
		$keterangan      		= $this->input->post('keterangan');
		$pemasukan      	= $this->input->post('pemasukan');

		$data = array(

			'id_cf'	    	=> $id_cf,
			'dari'	    => $dari,
			'untuk'	=> $untuk,
			'keterangan'	    	=> $keterangan,
			'pemasukan'	    => $pemasukan
		);
		$this->db->insert('dummy', $data);
		redirect('dummy');
	}
}
