<?php

class M_condition extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
    }

    public function insert($data)
    {
        $insert = $this->db->insert_batch('condition', $data);
        if ($insert) {
            return true;
        }
    }

    public function tampil_data()
    {
        return $this->db->query("SELECT * FROM `condition` ORDER BY id_con DESC LIMIT 1");
    }

    public function add_data($data)
    {
        $id_lb          = $this->input->post('id_lb');
        $kekuatan     = $this->input->post('kekuatan');
        $kelemahan     = $this->input->post('kelemahan');
        $peluang         = $this->input->post('peluang');
        $ancaman         = $this->input->post('ancaman');

        $data = array(
            'id_lb'         => $id_lb,
            'kekuatan'    => $kekuatan,
            'kelemahan'    => $kelemahan,
            'peluang'        => $peluang,
            'ancaman'        => $ancaman,
        );
        $this->db->insert('condition', $data);
        redirect('condition?id_lb=' . $id_lb);
    }
}
