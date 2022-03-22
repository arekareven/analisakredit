<?php

class M_character extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
    }

    public function insert($data)
    {
        $insert = $this->db->insert_batch('karakter', $data);
        if ($insert) {
            return true;
        }
    }

    public function tampil_data()
    {
        return $this->db->query("SELECT * FROM karakter ORDER BY id_char DESC LIMIT 1");
    }

    public function add_data($data)
    {
        $id_lb  = $this->input->post('id_lb');
        $info_pribadi  = $this->input->post('info_pribadi');
        $info_perilaku = $this->input->post('info_perilaku');
        $info_keluarga = $this->input->post('info_keluarga');
        $nm1           = $this->input->post('nm1');
        $nm2           = $this->input->post('nm2');
        $nm3           = $this->input->post('nm3');
        $al1        = $this->input->post('al1');
        $al2        = $this->input->post('al2');
        $al3        = $this->input->post('al3');
        $hp1        = $this->input->post('hp1');
        $hp2        = $this->input->post('hp2');
        $hp3        = $this->input->post('hp3');

        $data = array(

            'id_lb'            => $id_lb,
            'info_pribadi'            => $info_pribadi,
            'info_perilaku'        => $info_perilaku,
            'info_keluarga'    => $info_keluarga,
            'nm1'                => $nm1,
            'nm2'                => $nm2,
            'nm3'                => $nm3,
            'al1'                => $al1,
            'al2'                => $al2,
            'al3'                => $al3,
            'hp1'                => $hp1,
            'hp2'                => $hp2,
            'hp3'                => $hp3,
        );
        $this->db->insert('karakter', $data);
        redirect('character/view');
    }
}
