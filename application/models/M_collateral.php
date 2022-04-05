<?php

class M_collateral extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
    }

    public function insert($data)
    {
        $insert = $this->db->insert_batch('collateral', $data);
        if ($insert) {
            return true;
        }
    }

    public function tampil_data($id_lb)
    {
        return $this->db->query("SELECT * FROM collateral WHERE id_lb='$id_lb'");
    }

    public function tampil_data2($id_lb)
    {
        return $this->db->query("SELECT * FROM collateral_tanah WHERE id_lb='$id_lb'");
    }

    public function add_data($data)
    {
        $id_lb          = $this->input->post('id_lb');
        $roda          = $this->input->post('roda');
        $nopol     = $this->input->post('nopol');
        $nama_stnk         = $this->input->post('nama_stnk');
        $alamat         = $this->input->post('alamat');
        $type   = $this->input->post('type');
        $jenis   = $this->input->post('jenis');
        $tahun      = $this->input->post('tahun');
        $warna      = $this->input->post('warna');
        $silinder    = $this->input->post('silinder');
        $no_rangka           = $this->input->post('no_rangka');
        $no_mesin       = $this->input->post('no_mesin');
        $no_bpkb           = $this->input->post('no_bpkb');
        $milik       = $this->input->post('milik');
        $taksiran     = $this->input->post('taksiran');
        $nl     = $this->input->post('nl');
        $kondisi     = $this->input->post('kondisi');

        $data = array(
            'id_lb'         => $id_lb,
            'roda'         => $roda,
            'nopol'    => $nopol,
            'nama_stnk'        => $nama_stnk,
            'alamat'        => $alamat,
            'type'  => $type,
            'jenis'  => $jenis,
            'tahun'     => $tahun,
            'warna'     => $warna,
            'silinder'   => $silinder,
            'no_rangka'          => $no_rangka,
            'no_mesin'      => $no_mesin,
            'no_bpkb'          => $no_bpkb,
            'milik'      => $milik,
            'taksiran'    => $taksiran,
            'nl'    => $nl,
            'kondisi'    => $kondisi
        );
        $this->db->insert('collateral', $data);
        redirect('collateral/templateword?id_lb=' . $id_lb);
    }

    public function add_data2($data)
    {
        $id_lb          = $this->input->post('id_lb');
        $jenis     = $this->input->post('jenis');
        $nama         = $this->input->post('nama');
        $alamat         = $this->input->post('alamat');
        $no_shm   = $this->input->post('no_shm');
        $lokasi      = $this->input->post('lokasi');
        $tgl_ukur      = $this->input->post('tgl_ukur');
        $no_ukur    = $this->input->post('no_ukur');
        $milik       = $this->input->post('milik');
        $fisik_jaminan           = $this->input->post('fisik_jaminan');
        $luas_t           = $this->input->post('luas_t');
        $luas_b           = $this->input->post('luas_b');
        $harga_t           = $this->input->post('harga_t');
        $harga_b           = $this->input->post('harga_b');
        $harga_t2           = $this->input->post('harga_t2');
        $harga_b2           = $this->input->post('harga_b2');
        $ht           = $this->input->post('ht');
        $taksasi           = $this->input->post('taksasi');
        $pertimbangan     = $this->input->post('pertimbangan');

        $data = array(
            'id_lb'         => $id_lb,
            'jenis'    => $jenis,
            'nama'        => $nama,
            'alamat'        => $alamat,
            'no_shm'  => $no_shm,
            'lokasi'     => $lokasi,
            'tgl_ukur'     => $tgl_ukur,
            'no_ukur'   => $no_ukur,
            'milik'      => $milik,
            'fisik_jaminan'          => $fisik_jaminan,
            'luas_t'          => $luas_t,
            'luas_b'          => $luas_b,
            'harga_t'          => $harga_t,
            'harga_b'          => $harga_b,
            'harga_t2'          => $harga_t2,
            'harga_b2'          => $harga_b2,
            'ht'          => $ht,
            'taksasi'    => $taksasi,
            'pertimbangan'    => $pertimbangan
        );
        $this->db->insert('collateral_tanah', $data);
        /*redirect('collateral?id_lb=' . $id_lb);*/
        redirect('collateral/templateword2?id_lb=' . $id_lb);
    }
}
