<?php

class M_analisis extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url', 'download'));
    }

    public function tampil_data()
    {
        $user = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $a = $user['name'];
        return $this->db->query("SELECT * FROM analisis WHERE nama_ao='$a'");
    }

    public function data_analis()
    {
        return $this->db->get('analis');
    }

    function edit_data($data)
    {

        $id_analisis                = $this->input->post('id_analisis');
        $nama    = $this->input->post('nama');

        $kondisi = array('id_analisis' => $id_analisis);

        $data = array(
            'nama'    => $nama
        );

        $this->db->update('analisis', $data, $kondisi);
        redirect('analisis');
    }

    function hapus_data($id_analisis)
	{
		$this->db->where(array('id_analisis' => $id_analisis));
		$this->db->delete('analisis');
		redirect('analisis');
	}
}
