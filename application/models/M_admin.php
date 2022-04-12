<?php

class M_admin extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }

    public function tampil_data()
    {
        return $this->db->query("SELECT * FROM user");
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

    function ubah_data($data)
	{

		$id				= $this->input->post('id');
		$name	= $this->input->post('name');
		$email			= $this->input->post('email');
		$role_id			= $this->input->post('role_id');
		$is_active			= $this->input->post('is_active');

		$kondisi = array('id' => $id);

		$data = array(
			'name'	=> $name,
			'email'			=> $email,
			'role_id'		=> $role_id,
			'is_active'		=> $is_active
		);

		$this->db->update('user', $data, $kondisi);
		redirect('admin/user');
	}
}
