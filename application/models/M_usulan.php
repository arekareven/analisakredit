<?php

class M_usulan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
    }

    public function insert($data)
    {
        $insert = $this->db->insert_batch('usulan', $data);
        if ($insert) {
            return true;
        }
    }

    public function tampil_data($id_lb)
    {
        return $this->db->query("SELECT * FROM usulan WHERE id_lb='$id_lb'");
    }

    public function data_select()
    {
        return $this->db->get('notaris');
    }

    public function data_analis()
    {
        return $this->db->get('analis');
    }

    function cari($id)
    {
        $query = $this->db->get_where('notaris', array('notaris' => $id));
        return $query;
    }

    public function add_data($data)
    {
        $id_lb          = $this->input->post('id_lb');
        $character     = $this->input->post('character');
        $capacity         = $this->input->post('capacity');
        $capital         = $this->input->post('capital');
        $coe         = $this->input->post('coe');
        $collateral   = $this->input->post('collateral');
        $plafond   = $this->input->post('plafond');
        $sifat      = $this->input->post('sifat');
        $jenis      = $this->input->post('jenis');
        $tujuan    = $this->input->post('tujuan');
        $sektor           = $this->input->post('sektor');
        $waktu       = $this->input->post('waktu');
        $bunga           = $this->input->post('bunga');
        $angsuran       = $this->input->post('angsuran');
        $denda     = $this->input->post('denda');
        $realisasi     = $this->input->post('realisasi');
        $tanggungan     = $this->input->post('tanggungan');
        $likuidasi     = $this->input->post('likuidasi');
        $lainnya     = $this->input->post('lainnya');
        $jaminan     = $this->input->post('jaminan');
        $notaris     = $this->input->post('notaris');
        $provisi     = $this->input->post('provisi');
        $administrasi     = $this->input->post('administrasi');
        $asuransi     = $this->input->post('asuransi');
        $materai     = $this->input->post('materai');
        $apht     = $this->input->post('apht');
        $skmht     = $this->input->post('skmht');
        $titipan     = $this->input->post('titipan');
        $fiduciare     = $this->input->post('fiduciare');
        $legalisasi     = $this->input->post('legalisasi');
        $lain     = $this->input->post('lain');
        $roya     = $this->input->post('roya');
        $proses     = $this->input->post('proses');
        $sertifikat     = $this->input->post('sertifikat');
        $akta     = $this->input->post('akta');
        $pendaftaran     = $this->input->post('pendaftaran');
        $plotting     = $this->input->post('plotting');

        $data = array(
            'id_lb'         => $id_lb,
            'character'    => $character,
            'capacity'        => $capacity,
            'capital'        => $capital,
            'coe'        => $coe,
            'collateral'  => $collateral,
            'plafond'  => $plafond,
            'sifat'     => $sifat,
            'jenis'     => $jenis,
            'tujuan'   => $tujuan,
            'sektor'          => $sektor,
            'waktu'      => $waktu,
            'bunga'          => $bunga,
            'angsuran'      => $angsuran,
            'denda'    => $denda,
            'realisasi'    => $realisasi,
            'tanggungan'    => $tanggungan,
            'likuidasi'    => $likuidasi,
            'lainnya'    => $lainnya,
            'jaminan'    => $jaminan,
            'notaris'    => $notaris,
            'provisi'    => $provisi,
            'administrasi'    => $administrasi,
            'asuransi'    => $asuransi,
            'materai'    => $materai,
            'apht'    => $apht,
            'skmht'    => $skmht,
            'titipan'    => $titipan,
            'fiduciare'    => $fiduciare,
            'legalisasi'    => $legalisasi,
            'lain'    => $lain,
            'roya'    => $roya,
            'proses'    => $proses,
            'sertifikat'    => $sertifikat,
            'akta'    => $akta,
            'pendaftaran'    => $pendaftaran,
            'plotting'    => $plotting
        );
        $this->db->insert('usulan', $data);
        redirect('usulan/templateword?id_lb=' . $id_lb);
    }

    /*
    public function add_analis($data)
    {
        $id_analisis          = $this->input->post('id_analisis');
        $nama_ao     = $this->input->post('nama_ao');
        $nama         = $this->input->post('nama');
        $file         = "cache/".$row->nama_debitur.date('d-m-y').".docx";
        $coe         = 'coe';

        $data = array(
            'id_analisis'         => $id_analisis,
            'nama_ao'    => $nama_ao,
            'nama'        => $nama,
            'file'        => $file,
            'coe'        => $coe
        );
        $this->db->insert('analisis', $data);
        redirect('analisis');
    }
    */
}
