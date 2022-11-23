<?php

class M_capacity extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
    }

    public function insert($data)
    {
        $insert = $this->db->insert_batch('capacity', $data);
        if ($insert) {
            return true;
        }
    }
    
    //CRUD dengan jquery Ajax
    function capa_list($id_lb)
    {
        $hasil = $this->db->query("SELECT * FROM capacity WHERE id_lb=$id_lb");
        return $hasil->result();
    }

    function get_capa_by_kode($id_cap)
    {
        $hsl = $this->db->query("SELECT * FROM capacity WHERE id_cap='$id_cap'");
        if ($hsl->num_rows() > 0) {
            foreach ($hsl->result() as $data) {
                $hasil = array(
                    'id_cap' => $data->id_cap,
                    'id_lb' => $data->id_lb,
                    'nama_usaha' => $data->nama_usaha,
                    'sektor' => $data->sektor,
                    'bidang' => $data->bidang,
                    'alamat_usaha' => $data->alamat_usaha,
                    'status_usaha' => $data->status_usaha,
                    'tlp_usaha' => $data->tlp_usaha,
                    'tgl_mulai' => $data->tgl_mulai,
                    'tgl_nasabah' => $data->tgl_nasabah,
                    'akta' => $data->akta,
                    'tgl_akta' => $data->tgl_akta,
                    'npwp' => $data->npwp,
                    'tgl_npwp' => $data->tgl_npwp,
                    'usaha_skrg' => $data->usaha_skrg,
                    'alokasi1' => $data->alokasi1,
                    'alokasi2' => $data->alokasi2,
                    'alokasi3' => $data->alokasi3,
                    'dana1' => $data->dana1,
                    'dana2' => $data->dana2,
                    'dana3' => $data->dana3,
                    'total' => $data->total,
                    'usaha_realisasi' => $data->usaha_realisasi
                );
            }
        }
        return $hasil;
    }

    public function update_capa($id_cap, $nama_usaha, $sektor, $bidang, $alamat_usaha, $status_usaha, $tlp_usaha, $tgl_mulai, $tgl_nasabah, $akta, $tgl_akta, $npwp, $tgl_npwp, $usaha_skrg, $alokasi1, $alokasi2, $alokasi3, $dana1, $dana2, $dana3, $total, $usaha_realisasi)
    {
        $hasil = $this->db->query("UPDATE capacity SET nama_usaha='$nama_usaha',sektor='$sektor',bidang='$bidang',
                                                    alamat_usaha='$alamat_usaha',status_usaha='$status_usaha',tlp_usaha='$tlp_usaha',
                                                    tgl_mulai='$tgl_mulai',tgl_nasabah='$tgl_nasabah',akta='$akta',
                                                    tgl_akta='$tgl_akta',npwp='$npwp',tgl_npwp='$tgl_npwp',
                                                    usaha_skrg='$usaha_skrg',alokasi1='$alokasi1',alokasi2='$alokasi2', 
                                                    alokasi3='$alokasi3',dana1='$dana1',dana2='$dana2', 
                                                    dana3='$dana3',total='$total',usaha_realisasi='$usaha_realisasi' 
                                                    WHERE id_cap='$id_cap'");
        return $hasil;
    }

    function delete_capa($id_cap)
    {
        $hasil = $this->db->query("DELETE FROM capacity WHERE id_cap='$id_cap'");
        return $hasil;
    }
    //END CRUD dengan jquery Ajax

    function cek_id($id_cap)
	{
		$query = array('id_cap' => $id_cap);
		return $this->db->get_where('capacity', $query);
	}

    public function tampil_data()
    {
        return $this->db->query("SELECT * FROM capacity ORDER BY id_cap DESC LIMIT 1");
    }

    public function add_data($data)
    {
        $id_lb          = $this->input->post('id_lb');
        $nama_usaha     = $this->input->post('nama_usaha');
        $sektor         = $this->input->post('sektor');
        $bidang         = $this->input->post('bidang');
        $status_usaha   = $this->input->post('status_usaha');
        $alamat_usaha   = $this->input->post('alamat_usaha');
        $tlp_usaha      = $this->input->post('tlp_usaha');
        $tgl_mulai      = $this->input->post('tgl_mulai');
        $tgl_nasabah    = $this->input->post('tgl_nasabah');
        $akta           = $this->input->post('akta');
        $tgl_akta       = $this->input->post('tgl_akta');
        $npwp           = $this->input->post('npwp');
        $tgl_npwp       = $this->input->post('tgl_npwp');
        $usaha_skrg     = $this->input->post('usaha_skrg');
        $alokasi1     = $this->input->post('alokasi1');
        $alokasi2     = $this->input->post('alokasi2');
        $alokasi3     = $this->input->post('alokasi3');
        $dana1     = $this->input->post('dana1');
        $dana2     = $this->input->post('dana2');
        $dana3     = $this->input->post('dana3');
        $total = $this->input->post('dana1') + $this->input->post('dana2') + $this->input->post('dana3');
        $usaha_realisasi     = $this->input->post('usaha_realisasi');

        $data = array(
            'id_lb'         => $id_lb,
            'nama_usaha'    => $nama_usaha,
            'sektor'        => $sektor,
            'bidang'        => $bidang,
            'status_usaha'  => $status_usaha,
            'alamat_usaha'  => $alamat_usaha,
            'tlp_usaha'     => $tlp_usaha,
            'tgl_mulai'     => $tgl_mulai,
            'tgl_nasabah'   => $tgl_nasabah,
            'akta'          => $akta,
            'tgl_akta'      => $tgl_akta,
            'npwp'          => $npwp,
            'tgl_npwp'      => $tgl_npwp,
            'usaha_skrg'    => $usaha_skrg,
            'alokasi1'    => $alokasi1,
            'alokasi2'    => $alokasi2,
            'alokasi3'    => $alokasi3,
            'dana1'    => $dana1,
            'dana2'    => $dana2,
            'dana3'    => $dana3,
            'total'    => $total,
            'usaha_realisasi'    => $usaha_realisasi,
        );
        $this->db->insert('capacity', $data);
        /*redirect('capacity?id_lb=' . $id_lb);
        redirect('capacity/templateword?id_lb=' . $id_lb);*/
    }

    public function edit_data($data)
    {
        $id_cap          = $this->input->post('id_cap');
        $id_lb          = $this->input->post('id_lb');
        $nama_usaha     = $this->input->post('nama_usaha');
        $sektor         = $this->input->post('sektor');
        $bidang         = $this->input->post('bidang');
        $status_usaha   = $this->input->post('status_usaha');
        $alamat_usaha   = $this->input->post('alamat_usaha');
        $tlp_usaha      = $this->input->post('tlp_usaha');
        $tgl_mulai      = $this->input->post('tgl_mulai');
        $tgl_nasabah    = $this->input->post('tgl_nasabah');
        $akta           = $this->input->post('akta');
        $tgl_akta       = $this->input->post('tgl_akta');
        $npwp           = $this->input->post('npwp');
        $tgl_npwp       = $this->input->post('tgl_npwp');
        $usaha_skrg     = $this->input->post('usaha_skrg');
        $alokasi1     = $this->input->post('alokasi1');
        $alokasi2     = $this->input->post('alokasi2');
        $alokasi3     = $this->input->post('alokasi3');
        $dana1     = $this->input->post('dana1');
        $dana2     = $this->input->post('dana2');
        $dana3     = $this->input->post('dana3');
        $usaha_realisasi     = $this->input->post('usaha_realisasi');
        
		$kondisi = array('id_cap' => $id_cap );

        $data = array(
            'id_lb'         => $id_lb,
            'nama_usaha'    => $nama_usaha,
            'sektor'        => $sektor,
            'bidang'        => $bidang,
            'status_usaha'  => $status_usaha,
            'alamat_usaha'  => $alamat_usaha,
            'tlp_usaha'     => $tlp_usaha,
            'tgl_mulai'     => $tgl_mulai,
            'tgl_nasabah'   => $tgl_nasabah,
            'akta'          => $akta,
            'tgl_akta'      => $tgl_akta,
            'npwp'          => $npwp,
            'tgl_npwp'      => $tgl_npwp,
            'usaha_skrg'    => $usaha_skrg,
            'alokasi1'    => $alokasi1,
            'alokasi2'    => $alokasi2,
            'alokasi3'    => $alokasi3,
            'dana1'    => $dana1,
            'dana2'    => $dana2,
            'dana3'    => $dana3,
            'usaha_realisasi'    => $usaha_realisasi,
        );
        $this->db->update('capacity', $data,$kondisi);
        redirect('test/edit?id_lb='.$id_lb);
    }
}
