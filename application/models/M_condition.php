<?php

class M_condition extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
    }
    
    //CRUD dengan jquery Ajax
    function con_list($id_lb)
    {
        $hasil = $this->db->query("SELECT * FROM `condition` WHERE id_lb='$id_lb'");
        return $hasil->result();
    }

    function get_con_by_kode($id_con)
    {
        $hsl = $this->db->query("SELECT * FROM `condition` WHERE id_con='$id_con'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'id_con' => $data->id_con,
                    'id_lb' => $data->id_lb,
                    'kekuatan' => $data->kekuatan,
                    'kelemahan' => $data->kelemahan,
                    'peluang' => $data->peluang,
                    'ancaman' => $data->ancaman,
                );
            }
        }
        return $hasil;
    }

    public function update_con($id_con, $kekuatan, $kelemahan, $peluang, $ancaman)
    {
        $hasil = $this->db->query("UPDATE `condition` SET kekuatan='$kekuatan',kelemahan='$kelemahan',
                                                    peluang='$peluang',ancaman='$ancaman'
                                                    WHERE id_con='$id_con'");
        return $hasil;
    }

    function delete_con($id_con)
    {
        $hasil = $this->db->query("DELETE FROM `condition` WHERE id_con='$id_con'");
        return $hasil;
    }
    //END CRUD dengan jquery Ajax

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


    function cek_id($id_con)
    {
        $query = array('id_con' => $id_con);
        return $this->db->get_where('condition', $query);
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
        /*redirect('condition?id_lb=' . $id_lb);
        redirect('condition/templateword?id_lb=' . $id_lb);*/
    }

    public function edit_data($data)
    {
        $id_con          = $this->input->post('id_con');
        $id_lb          = $this->input->post('id_lb');
        $kekuatan     = $this->input->post('kekuatan');
        $kelemahan     = $this->input->post('kelemahan');
        $peluang         = $this->input->post('peluang');
        $ancaman         = $this->input->post('ancaman');
        
		$kondisi = array('id_con' => $id_con );

        $data = array(
            'kekuatan'    => $kekuatan,
            'kelemahan'    => $kelemahan,
            'peluang'        => $peluang,
            'ancaman'        => $ancaman,
        );
        $this->db->update('condition', $data,$kondisi);
        redirect('test/edit?id_lb=' . $id_lb);
        /*redirect('condition?id_lb=' . $id_lb);
        redirect('condition/templateword?id_lb=' . $id_lb);*/
    }
}
