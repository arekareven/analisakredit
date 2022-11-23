<?php

class M_kabag extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'download'));
    }
    		
	public function update_pengajuan($id_pengajuan, $status, $catatan)
	{
		$this->db->query("UPDATE pengajuan SET `status`='$status', catatan='$catatan' WHERE id_pengajuan='$id_pengajuan'");
		redirect('analisa');
	}

    public function tampil_data()
    {
        return $this->db->query("SELECT * FROM pengajuan WHERE `status`='Direkomendasi'");
        /*
        return $this->db->query("SELECT * FROM analisis WHERE nama='$a' AND status='Ditinjau'");
        */
    }
}
