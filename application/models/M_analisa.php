<?php

class M_analisa extends CI_Model
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
        return $this->db->query("SELECT * FROM analisis WHERE nama='$a'");
    }

    function edit_data($data)
    {

        $id_analisis                = $this->input->post('id_analisis');
        $catatan    = $this->input->post('catatan');
        $status            = $this->input->post('status');

        $kondisi = array('id_analisis' => $id_analisis);

        $data = array(
            'catatan'    => $catatan,
            'status'            => $status
        );

        $this->db->update('analisis', $data, $kondisi);
        redirect('analisa');
    }
}
