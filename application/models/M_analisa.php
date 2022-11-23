<?php

class M_analisa extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'download'));
    }
    
	public function add_data_pengajuan($x)
	{
		$id_lb			= $this->input->post('id_lb');
		$analis			= $this->input->post('analis');
		$nama_ao		= $this->input->post('nama_ao');
		$status      		= $this->input->post('status');

		$x = array(

			'id_lb'	    	=> $id_lb,
			'analis'	    	=> $analis,
			'nama_ao'	    => $nama_ao,
			'status'	    	=> $status,
		);
		$this->db->insert('pengajuan', $x);
	}
    
	function pengajuan_list($id_lb){
		$hasil=$this->db->query("SELECT * FROM pengajuan WHERE id_lb='$id_lb'");
		return $hasil->result();
	}
    		
	public function update_pengajuan($id_pengajuan,$name_debitur,$plafond, $status, $catatan)
	{
		$this->db->query("UPDATE pengajuan SET name_debitur='$name_debitur',plafond='$plafond',`status`='$status', catatan='$catatan' WHERE id_pengajuan='$id_pengajuan'");
		redirect('analisa');
	}

    public function tampil_data()
    {
        $user = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $a = $user['name'];
        return $this->db->query("SELECT * FROM latar_belakang JOIN pengajuan WHERE latar_belakang.analis='$a' ORDER BY pengajuan.id_lb DESC");
        /*
        return $this->db->query("SELECT * FROM analisis WHERE nama='$a' AND status='Ditinjau'");
        */
    }

}
