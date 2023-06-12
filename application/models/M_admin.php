<?php

class M_admin extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }

	public function add_role(){
		
        $role	= $this->input->post('role');
		
		$data = array(
			'role'	    	=> $role
		);

		$this->db->insert('user_role', $data);
		redirect('admin/role');
	}

    public function tampil_data()
    {
        return $this->db->query("SELECT * FROM user");
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
