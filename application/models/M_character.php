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

    function cek_id($id_char)
    {
        $query = array('id_char' => $id_char);
        return $this->db->get_where('karakter', $query);
    }

    function cek_id_rp($id_rp)
    {
        $query = array('id_rp' => $id_rp);
        return $this->db->get_where('riwayat_pinjaman', $query);
    }

    public function tampil_data($id_lb)
    {
        return $this->db->query("SELECT * FROM karakter WHERE id_lb='$id_lb'");
    }

    public function tampil_data2($id_lb)
    {
        return $this->db->query("SELECT * FROM riwayat_pinjaman WHERE id_lb='$id_lb'");
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
            'nm1'                => ucwords($nm1),
            'nm2'                => ucwords($nm2),
            'nm3'                => ucwords($nm3),
            'al1'                => $al1,
            'al2'                => $al2,
            'al3'                => $al3,
            'hp1'                => $hp1,
            'hp2'                => $hp2,
            'hp3'                => $hp3,
        );
        $this->db->insert('karakter', $data);
    }

    public function edit_data($data)
    {
        $id_char  = $this->input->post('id_char');
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
        
		$kondisi = array('id_char' => $id_char);

        $data = array(
            'info_pribadi'            => $info_pribadi,
            'info_perilaku'        => $info_perilaku,
            'info_keluarga'    => $info_keluarga,
            'nm1'                => ucwords($nm1),
            'nm2'                => ucwords($nm2),
            'nm3'                => ucwords($nm3),
            'al1'                => $al1,
            'al2'                => $al2,
            'al3'                => $al3,
            'hp1'                => $hp1,
            'hp2'                => $hp2,
            'hp3'                => $hp3,
        );
        $this->db->update('karakter', $data,$kondisi);
        redirect('test/edit?id_lb=' . $id_lb);
    }

    public function add_data_rw($data)
    {
        $id_lb  = $this->input->post('id_lb');
        $plafond  = $this->input->post('plafond');
        $status = $this->input->post('status');
        $saldo = $this->input->post('saldo');
        $sejarah           = $this->input->post('sejarah');
        $data           = $this->input->post('data');

        $data = array(
            'id_lb'            => $id_lb,
            'plafond'            => $plafond,
            'status'        => $status,
            'saldo'    => $saldo,
            'sejarah'                => $sejarah,
            'data'                => $data
        );
        $this->db->insert('riwayat_pinjaman', $data);
    }

    public function edit_data_rw($data)
    {
        $id_rp  = $this->input->post('id_rp');
        $id_lb  = $this->input->post('id_lb');
        $plafond  = $this->input->post('plafond');
        $status = $this->input->post('status');
        $saldo = $this->input->post('saldo');
        $sejarah           = $this->input->post('sejarah');
        $data           = $this->input->post('data');
        
		$kondisi = array('id_rp' => $id_rp );

        $data = array(
            'plafond'            => $plafond,
            'status'        => $status,
            'saldo'    => $saldo,
            'sejarah'                => $sejarah,
            'data'                => $data
        );
        $this->db->update('riwayat_pinjaman', $data,$kondisi);
        redirect('test/edit?id_lb=' . $id_lb);
    }
}
