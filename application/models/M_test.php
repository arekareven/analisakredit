<?php

class M_test extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper(array('url'));
    }

    public function data_select()
    {
        return $this->db->get('notaris');
    }

    public function data_perkiraan()
    {
        return $this->db->query("SELECT * FROM perkiraan WHERE LENGTH(kode_perkiraan) > 3");
    }
    
    public function edit_rw($id_lb)
    {
        return $this->db->query("SELECT * FROM riwayat_pinjaman WHERE id_lb=$id_lb");
    }

    public function edit_capa($id_lb)
    {
        return $this->db->query("SELECT * FROM capacity WHERE id_lb=$id_lb");
    }

    public function edit_capi($id_lb)
    {
        return $this->db->query("SELECT * FROM capital_b WHERE id_lb=$id_lb");
    }

    public function edit_cash($id_lb)
    {
        return $this->db->query("SELECT * FROM cashflow_b WHERE id_lb=$id_lb");
    }

    public function edit_collt($id_lb)
    {
        return $this->db->query("SELECT * FROM collateral_tanah WHERE id_lb=$id_lb");
    }

    public function edit_collk($id_lb)
    {
        return $this->db->query("SELECT * FROM collateral WHERE id_lb=$id_lb");
    }

    public function edit_usulan($id_lb)
    {
        return $this->db->query("SELECT * FROM usulan WHERE id_lb=$id_lb");
    }

    function cari($id)
    {
        $query = $this->db->get_where('perkiraan', array('kode_perkiraan' => $id));
        return $query;
    }

    public function add_data($data)
    {
        $id_cf = $this->input->post('id_cf');
        $id_lb = $this->input->post('id_lb');
        $kode_perkiraan = $this->input->post('kode_perkiraan');
        $kode_perkiraan2 = $this->input->post('kode_perkiraan2');
        $nama_perkiraan = $this->input->post('nama_perkiraan');
        $nama_perkiraan2 = $this->input->post('nama_perkiraan2');
        $keterangan = $this->input->post('keterangan');
        $saldo = $this->input->post('saldo');
        $kode_jenis = 'K';
        $kode_jenis2 = 'D';
        $jenis = $this->input->post('jenis');

        $data = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan,
            'nama_perkiraan'    => $nama_perkiraan,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis,
            'jenis'        => $jenis,
        );

        $data2 = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan2,
            'nama_perkiraan'    => $nama_perkiraan2,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis2,
            'jenis'        => $jenis,
        );

        $this->db->insert('cashflow_b', $data);
        $this->db->insert('cashflow_b', $data2);
    }

    public function add_data2($data)
    {
        $id_cf = $this->input->post('id_cf');
        $id_lb = $this->input->post('id_lb');
        $kode_perkiraan = $this->input->post('kode_perkiraanp');
        $kode_perkiraan2 = $this->input->post('kode_perkiraanp2');
        $nama_perkiraan = $this->input->post('nama_perkiraanp');
        $nama_perkiraan2 = $this->input->post('nama_perkiraanp2');
        $keterangan = $this->input->post('keteranganp');
        $saldo = $this->input->post('saldop');
        $kode_jenis = 'K';
        $kode_jenis2 = 'D';
        $jenis = $this->input->post('jenisp');

        $data = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan,
            'nama_perkiraan'    => $nama_perkiraan,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis,
            'jenis'        => $jenis,
        );

        $data2 = array(
            'id_cf'         => $id_cf,
            'id_lb'         => $id_lb,
            'kode_perkiraan'    => $kode_perkiraan2,
            'nama_perkiraan'    => $nama_perkiraan2,
            'keterangan'        => $keterangan,
            'saldo'        => $saldo,
            'kode_jenis'        => $kode_jenis2,
            'jenis'        => $jenis,
        );

        $this->db->insert('cashflow_b', $data);
        $this->db->insert('cashflow_b', $data2);
    }
}
